CREATE OR REPLACE PACKAGE package_buy_order
IS
	total_temp NUMBER(10,0);
	in_orderid_temp NUMBER(10,0);
	
	FUNCTION func_buy_order_check(in_clientid IN NUMBER,in_shareid IN NUMBER,in_quantity IN NUMBER,in_rate IN NUMBER) RETURN INTEGER;
	FUNCTION func_check_buyer_owns(in_clientid IN NUMBER,in_shareid IN NUMBER) RETURN INTEGER;
   	PROCEDURE proc_tr_derived_buy_order(in_shareid IN NUMBER,in_sharename IN VARCHAR2,in_rate IN NUMBER);
   	PROCEDURE proc_tr_buy_order(in_orderid IN NUMBER,in_clientid IN NUMBER,in_shareid IN NUMBER,in_sharename IN VARCHAR2,in_quantity IN NUMBER,in_rate IN NUMBER);
	PROCEDURE proc_insert_into_buy_order(in_clientid IN NUMBER,in_shareid IN NUMBER,in_sharename in VARCHAR2,in_quantity IN NUMBER,in_rate IN NUMBER,out_flag OUT INTEGER);
END package_buy_order;
/


CREATE OR REPLACE PACKAGE BODY package_buy_order
IS
	
FUNCTION func_buy_order_check(in_clientid IN NUMBER,in_shareid IN NUMBER,in_quantity IN NUMBER,in_rate IN NUMBER)
	RETURN INTEGER
	AS
	flag INTEGER:=0;
	x NUMBER(10,0);
	total NUMBER(15,5);
	placed_total NUMBER(15,5):=0;
	lot NUMBER(10,0);
	
	BEGIN
		select client.purchaselimit into total 
		from client
		where client.clientid=in_clientid;  

		select owned_share.marketlot into lot
		from owned_share
		where owned_share.shareid=in_shareid;  
		
		select COUNT(*) into x
		from buy_order
		where buy_order.clientid=in_clientid;
		IF x>0
			THEN	select SUM(buy_order.quantity*buy_order.rate) into placed_total 
					from buy_order
					where buy_order.clientid=in_clientid;
		END IF;
				
		IF in_quantity*in_rate + placed_total  <= total and mod(in_quantity,lot)=0
			THEN	flag :=1;
		ELSE	flag :=0;
		END IF;
			
		RETURN(flag);
	END;
	
	
	
	FUNCTION func_check_buyer_owns(in_clientid IN NUMBER,in_shareid IN NUMBER)
	RETURN INTEGER
	AS
	update_or_insert_owns INTEGER:=1;   /*update->0,insert->1*/
	x NUMBER(10,0);
  	
	BEGIN
	select owns.clientid into x from owns 
	where owns.clientid=in_clientid and owns.shareid=in_shareid;
	IF SQL%FOUND
		THEN update_or_insert_owns:=0;
	END IF;
	RETURN(update_or_insert_owns);
	EXCEPTION
	WHEN NO_DATA_FOUND THEN
	RETURN(update_or_insert_owns);
	END;

	
   	PROCEDURE proc_tr_derived_buy_order(in_shareid IN NUMBER,in_sharename IN VARCHAR2,in_rate IN NUMBER)
	AS
	CURSOR cur_temp_sell_order is
	SELECT *from temp_sell_order;
	
	BEGIN
	FOR row_calc in cur_temp_sell_order
	LOOP
	insert into selling_history(clientid,shareid,tradingdate,sharename,quantity,rate,totalamount)
	values(row_calc.clientid,in_shareid,sysdate,in_sharename,row_calc.update_val,in_rate,row_calc.update_val*in_rate);
	update owns
	set owns.quantity=owns.quantity-row_calc.update_val,owns.totalvalue=owns.totalvalue-in_rate*row_calc.update_val
	where owns.clientid=row_calc.clientid and owns.shareid=in_shareid;
	update client
	set client.accbalance=client.accbalance+in_rate*row_calc.update_val,client.purchaselimit=client.purchaselimit+in_rate*row_calc.update_val,client.maxwithdraw=client.maxwithdraw+in_rate*row_calc.update_val
	where client.clientid=row_calc.clientid;
	END LOOP;
	END;


	
	PROCEDURE proc_tr_buy_order(in_orderid IN NUMBER,in_clientid IN NUMBER,in_shareid IN NUMBER,in_sharename IN VARCHAR2,in_quantity IN NUMBER,in_rate IN NUMBER)
	AS
	total_available NUMBER(10,0):=0;
	tempval_for_fraction NUMBER(10,0):=0;
	update_or_insert_owns INTEGER:=-1; 
	CURSOR cur_sell_order is
	SELECT *from sell_order
	WHERE sell_order.shareid=in_shareid and sell_order.rate=in_rate;

	BEGIN
	FOR row_calc in cur_sell_order
	LOOP
	IF in_quantity-total_available>0
		THEN
			IF row_calc.quantity<=in_quantity-total_available
				THEN total_available:=total_available+row_calc.quantity;
				     insert into temp_sell_order 
				     values(row_calc.orderid,row_calc.clientid,1,row_calc.quantity);	
			ELSE  
				tempval_for_fraction:=in_quantity-total_available;
				total_available:=in_quantity;
				insert into temp_sell_order 
				values(row_calc.orderid,row_calc.clientid,0,tempval_for_fraction);	
			END IF;
	END IF;
	END LOOP;
	
	IF total_available>0
		THEN
			total_temp:=total_available;
			in_orderid_temp:=in_orderid;
			
			insert into buying_history(clientid,shareid,tradingdate,sharename,quantity,rate,totalamount)
			values(in_clientid,in_shareid,sysdate,in_sharename,total_available,in_rate,total_available*in_rate);
			
			update_or_insert_owns:=func_check_buyer_owns(in_clientid,in_shareid);
			
			IF update_or_insert_owns=0
				THEN	update owns
						set owns.quantity=owns.quantity+total_available,owns.totalvalue=owns.totalvalue+in_rate*total_available
						where owns.clientid=in_clientid and owns.shareid=in_shareid;
						update client
						set client.accbalance=client.accbalance-in_rate*total_available,client.purchaselimit=client.purchaselimit-in_rate*total_available,client.maxwithdraw=client.maxwithdraw-in_rate*total_available
						where client.clientid=in_clientid;
			ELSIF	update_or_insert_owns=1
				THEN	insert into owns(clientid,shareid,quantity,totalvalue) 
						values(in_clientid,in_shareid,total_available,in_rate*total_available);
						update client
						set client.accbalance=client.accbalance-in_rate*total_available,client.purchaselimit=client.purchaselimit-in_rate*total_available,client.maxwithdraw=client.maxwithdraw-in_rate*total_available
						where client.clientid=in_clientid;
			END IF;

			proc_tr_derived_buy_order(in_shareid,in_sharename,in_rate);

			delete from sell_order
			where sell_order.orderid IN 
				(select temp_sell_order.orderid 
				 from temp_sell_order
				 where  up_del=1);

			update sell_order
			set sell_order.quantity=sell_order.quantity-tempval_for_fraction
			where sell_order.orderid IN 
				(select temp_sell_order.orderid 
				 from temp_sell_order
				 where  up_del=0);
				 
			delete from temp_sell_order;	
	END IF;
	END;
	

	PROCEDURE proc_insert_into_buy_order(in_clientid IN NUMBER,in_shareid IN NUMBER,in_sharename in VARCHAR2,in_quantity IN NUMBER,in_rate IN NUMBER,out_flag OUT INTEGER)
	AS
	
	BEGIN
	
	out_flag:=func_buy_order_check(in_clientid,in_shareid,in_quantity,in_rate);
	
	IF out_flag = 1
		THEN	insert into buy_order(clientid,shareid,sharename,orderdate,quantity,rate)
				values(in_clientid,in_shareid,in_sharename,sysdate,in_quantity,in_rate);
				IF total_temp>0
					THEN 	IF total_temp=in_quantity
								THEN	delete from buy_order 
										where buy_order.orderid=in_orderid_temp;
							ELSE
								update buy_order
								set buy_order.quantity=buy_order.quantity-total_temp
								where buy_order.orderid=in_orderid_temp;
							END IF;	
							total_temp:=-1;
							in_orderid_temp:=-1;
				END IF;	
	END IF;
	END;
	
END package_buy_order;
/

CREATE OR REPLACE TRIGGER tr_buy_order_bidding
AFTER INSERT ON buy_order
FOR EACH ROW
BEGIN	

package_buy_order.proc_tr_buy_order(:new.orderid,:new.clientid,:new.shareid,:new.sharename,:new.quantity,:new.rate);

END;
/









CREATE OR REPLACE PACKAGE package_sell_order
IS
	total_temp NUMBER(10,0);
	in_orderid_temp NUMBER(10,0);
	
	FUNCTION func_sell_order_check(in_clientid IN NUMBER,in_shareid IN NUMBER,in_quantity IN NUMBER,in_rate IN NUMBER) RETURN INTEGER;
   	FUNCTION func_check_buyer_owns(in_clientid IN NUMBER,in_shareid IN NUMBER) RETURN INTEGER;
	PROCEDURE proc_tr_derived_sell_order(in_shareid IN NUMBER,in_sharename IN VARCHAR2,in_rate IN NUMBER);
   	PROCEDURE proc_tr_sell_order(in_orderid IN NUMBER,in_clientid IN NUMBER,in_shareid IN NUMBER,in_sharename IN VARCHAR2,in_quantity IN NUMBER,in_rate IN NUMBER);
	PROCEDURE proc_insert_into_sell_order(in_clientid IN NUMBER,in_shareid IN NUMBER,in_sharename in VARCHAR2,in_quantity IN NUMBER,in_rate IN NUMBER,out_flag OUT INTEGER);
END package_sell_order;
/

	
CREATE OR REPLACE PACKAGE BODY package_sell_order
IS

	FUNCTION func_sell_order_check(in_clientid IN NUMBER,in_shareid IN NUMBER,in_quantity IN NUMBER,in_rate IN NUMBER)
	RETURN INTEGER
	AS
	flag INTEGER:=0;
	total NUMBER(15,5);
	lot NUMBER(10,0);
	BEGIN
		select owns.quantity into total 
		from owns
		where owns.clientid=in_clientid and owns.shareid=in_shareid;  
		IF SQL%FOUND 
			THEN 
				select owned_share.marketlot into lot
				from owned_share
				where owned_share.shareid=in_shareid;  
				
				IF in_quantity <= total and mod(in_quantity,lot)=0
					THEN	flag :=1;
				ELSE	flag :=0;
				END IF;
		END IF;
		RETURN(flag);
		EXCEPTION
		WHEN NO_DATA_FOUND THEN
		RETURN(flag);
	END;
	
	
	
	FUNCTION func_check_buyer_owns(in_clientid IN NUMBER,in_shareid IN NUMBER)
	RETURN INTEGER
	AS
	update_or_insert_owns INTEGER:=1;   /*update->0,insert->1*/
	x NUMBER(10,0);
  	
	BEGIN
	select owns.clientid into x from owns 
	where owns.clientid=in_clientid and owns.shareid=in_shareid;
	IF SQL%FOUND
		THEN update_or_insert_owns:=0;
	END IF;
	RETURN(update_or_insert_owns);
	EXCEPTION
	WHEN NO_DATA_FOUND THEN
	RETURN(update_or_insert_owns);
	END;

	
	
	PROCEDURE proc_tr_derived_sell_order(in_shareid IN NUMBER,in_sharename IN VARCHAR2,in_rate IN NUMBER)
	AS
	update_or_insert_owns INTEGER:=-1; 
	CURSOR cur_temp_buy_order is
	SELECT *from temp_buy_order;
	
	BEGIN
	FOR row_calc in cur_temp_buy_order
	LOOP
	insert into buying_history(clientid,shareid,tradingdate,sharename,quantity,rate,totalamount)
		values(row_calc.clientid,in_shareid,sysdate,in_sharename,row_calc.update_val,in_rate,row_calc.update_val*in_rate);
	
	update_or_insert_owns:=func_check_buyer_owns(row_calc.clientid,in_shareid);
	
	IF update_or_insert_owns=0
		THEN	update owns
				set owns.quantity=owns.quantity+row_calc.update_val,owns.totalvalue=owns.totalvalue+in_rate*row_calc.update_val
				where owns.clientid=row_calc.clientid and owns.shareid=in_shareid;
				update client
				set client.accbalance=client.accbalance-in_rate*row_calc.update_val,client.purchaselimit=client.purchaselimit-in_rate*row_calc.update_val,client.maxwithdraw=client.maxwithdraw-in_rate*row_calc.update_val
				where client.clientid=row_calc.clientid;

	ELSIF	update_or_insert_owns=1
		THEN	insert into owns(clientid,shareid,quantity,totalvalue) 
				values(row_calc.clientid,in_shareid,row_calc.update_val,in_rate*row_calc.update_val);
				update client
				set client.accbalance=client.accbalance-in_rate*row_calc.update_val,client.purchaselimit=client.purchaselimit-in_rate*row_calc.update_val,client.maxwithdraw=client.maxwithdraw-in_rate*row_calc.update_val
				where client.clientid=row_calc.clientid;
	END IF;
	END LOOP;
	END;
	
	
	
	PROCEDURE proc_tr_sell_order(in_orderid IN NUMBER,in_clientid IN NUMBER,in_shareid IN NUMBER,in_sharename IN VARCHAR2,in_quantity IN NUMBER,in_rate IN NUMBER)
	AS
	total_available NUMBER(10,0):=0;
	tempval_for_fraction NUMBER(10,0):=0;
	CURSOR cur_buy_order is
	SELECT *from buy_order
	WHERE buy_order.shareid=in_shareid and buy_order.rate=in_rate;

	BEGIN
	FOR row_calc in cur_buy_order
	LOOP
	IF in_quantity-total_available>0
		THEN
			IF row_calc.quantity<=in_quantity-total_available
				THEN total_available:=total_available+row_calc.quantity;
				     insert into temp_buy_order 
				     values(row_calc.orderid,row_calc.clientid,1,row_calc.quantity);	
			ELSE  
				tempval_for_fraction:=in_quantity-total_available;
				total_available:=in_quantity;
				insert into temp_buy_order 
				values(row_calc.orderid,row_calc.clientid,0,tempval_for_fraction);	
			END IF;
	END IF;
	END LOOP;
	
	IF total_available>0
		THEN
			total_temp:=total_available;
			in_orderid_temp:=in_orderid;
			
			insert into selling_history(clientid,shareid,tradingdate,sharename,quantity,rate,totalamount)
			values(in_clientid,in_shareid,sysdate,in_sharename,total_available,in_rate,total_available*in_rate);
			
			update owns
			set owns.quantity=owns.quantity-total_available,owns.totalvalue=owns.totalvalue-in_rate*total_available
			where owns.clientid=in_clientid and owns.shareid=in_shareid;
			update client
			set client.accbalance=client.accbalance+in_rate*total_available,client.purchaselimit=client.purchaselimit+in_rate*total_available,client.maxwithdraw=client.maxwithdraw+in_rate*total_available
			where client.clientid=in_clientid;
			
			proc_tr_derived_sell_order(in_shareid,in_sharename,in_rate);

			delete from buy_order
			where buy_order.orderid IN 
				(select temp_buy_order.orderid 
				 from temp_buy_order
				 where  up_del=1);

			update buy_order
			set buy_order.quantity=buy_order.quantity-tempval_for_fraction
			where buy_order.orderid IN 
				(select temp_buy_order.orderid 
				 from temp_buy_order
				 where  up_del=0);
				 
			delete from temp_buy_order;	
	END IF;
	END;
	
	
	
	PROCEDURE proc_insert_into_sell_order(in_clientid IN NUMBER,in_shareid IN NUMBER,in_sharename in VARCHAR2,in_quantity IN NUMBER,in_rate IN NUMBER,out_flag OUT INTEGER)
	AS
	
	
	BEGIN
	out_flag:=func_sell_order_check(in_clientid,in_shareid,in_quantity,in_rate);
	IF out_flag = 1
		THEN	insert into sell_order(clientid,shareid,sharename,orderdate,quantity,rate)
				values(in_clientid,in_shareid,in_sharename,sysdate,in_quantity,in_rate);	
				IF total_temp>0
					THEN 	
					IF total_temp=in_quantity
					THEN	delete from sell_order 
							where sell_order.orderid=in_orderid_temp;
					ELSE
						update sell_order
						set sell_order.quantity=sell_order.quantity-total_temp
						where sell_order.orderid=in_orderid_temp;
					END IF;	
					total_temp:=-1;
					in_orderid_temp:=-1;
				END IF;	
	END IF;
	END;
	END package_sell_order;
	/
	
	
	CREATE OR REPLACE TRIGGER tr_sell_order_bidding
	AFTER INSERT ON sell_order
	FOR EACH ROW
	
	BEGIN	
	package_sell_order.proc_tr_sell_order(:new.orderid,:new.clientid,:new.shareid,:new.sharename,:new.quantity,:new.rate);
	END;
	/
	
	











CREATE OR REPLACE FUNCTION func_cancel_order_check(in_orderid IN number,in_type IN varchar2)
RETURN integer
AS
flag integer:=-1;
order_no NUMBER(10,0);

BEGIN 
	IF in_type='buy'
		THEN
			select buy_order.orderid  into order_no
			from buy_order 
			where buy_order.orderid=in_orderid;
	ELSE
		select sell_order.orderid  into order_no
		from sell_order 
		where sell_order.orderid=in_orderid;
	END IF;
	IF SQL%FOUND 
		THEN flag:=1;
	END IF;
	RETURN(flag);
	EXCEPTION
	WHEN NO_DATA_FOUND THEN
	RETURN(flag);
END;
/
show errors;


CREATE OR REPLACE FUNCTION func_withdraw_order_check(in_clientid IN number,in_amount IN number)
RETURN integer
AS
flag integer:=0;
max_withdraw NUMBER(15,5);

BEGIN

	select client.maxwithdraw into max_withdraw
	from client
	where client.clientid=in_clientid;  

	IF in_amount <= max_withdraw 
		THEN	flag :=1;
	ELSE	flag :=0;
	END IF;
	
		
RETURN(flag);
END;
/
show errors;





CREATE OR REPLACE PROCEDURE proc_withdraw_order_check(in_clientid IN number,in_amount IN number,out_flag OUT integer)
AS


BEGIN
		out_flag:=func_withdraw_order_check(in_clientid,in_amount);
		IF out_flag = 1
		THEN	
			insert into withdraw_order(clientid ,orderdate, amount)
			values(in_clientid,sysdate,in_amount);

			update client
			set client.accbalance=client.accbalance-in_amount,
			    client.purchaselimit=client.purchaselimit-in_amount,
			    client.maxwithdraw = client.maxwithdraw-in_amount
			 where client.clientid=in_clientid ;
		END IF;
END;
/
show errors;


CREATE OR REPLACE FUNCTION func_deposit_order_check(in_clientid IN number,in_amount IN number)
RETURN integer
AS
flag integer:=1;

BEGIN
	
		
RETURN(flag);
END;
/
show errors;





CREATE OR REPLACE PROCEDURE proc_deposit_order_check(in_clientid IN number,in_amount IN number,out_flag OUT integer)
AS


BEGIN
		out_flag:=func_deposit_order_check(in_clientid,in_amount);
		IF out_flag = 1
		THEN	
			insert into deposit_order(clientid ,orderdate, amount)
			values(in_clientid,sysdate,in_amount);

			update client
			set client.accbalance=client.accbalance+in_amount,
			    client.purchaselimit=client.purchaselimit+in_amount,
			    client.maxwithdraw = client.maxwithdraw+in_amount
			 where client.clientid=in_clientid ;
		END IF;
END;
/
show errors;



CREATE OR REPLACE PACKAGE package_loan
IS

	FUNCTION func_loancheck(in_clientid IN number,in_amount IN number) RETURN integer;
	PROCEDURE proc_loancheck(in_clientid IN number,in_amount IN number);
	PROCEDURE proc_loanpayment(in_clientid IN number,in_amount IN number);
END package_loan;
/

CREATE OR REPLACE PACKAGE package_loan
IS

	FUNCTION func_loancheck(in_clientid IN number,in_amount IN number) RETURN integer;
	PROCEDURE proc_loan(in_clientid IN number,in_amount IN number,out_flag OUT integer);
	PROCEDURE proc_loanpayment(in_clientid IN number,in_amount IN number);
END package_loan;
/

CREATE OR REPLACE PACKAGE BODY package_loan
IS

	FUNCTION func_loancheck(in_clientid IN number,in_amount IN number)
	RETURN integer
	AS
	flag integer:=0;
	total NUMBER(15,5);
	taken_loan NUMBER(15,5):=0;
	x integer(10,0);
	y integer(10,0);
	BEGIN
		select COUNT(*) into x
		from owns
		where owns.clientid=in_clientid;
		IF	x>0
			THEN 	select SUM(owns.totalvalue) into total 
					from owns
					where owns.clientid=in_clientid;   
					total:=total/2.00000;
					select COUNT(*) into y
					from loan
					where loan.clientid=in_clientid;
					IF	y>0
						THEN select SUM(loan.amount) into taken_loan
							 from loan
							 where loan.clientid=in_clientid;
					END IF;
					IF in_amount+taken_loan <= total
						THEN	flag :=1;
					ELSE	flag :=0;
					END IF;
		END IF;
		RETURN(flag);
	END;

	PROCEDURE proc_loan(in_clientid IN number,in_amount IN number,out_flag OUT integer)
	AS
	
	BEGIN
			out_flag:=func_loancheck(in_clientid,in_amount);
			IF out_flag = 1
			THEN	
				insert into loan(clientid,amount,loandate)
				values(in_clientid,in_amount,sysdate);
				update client
				set accbalance=accbalance+in_amount,purchaselimit=purchaselimit+in_amount
				where client.clientid=in_clientid;
			END IF;
	END;

	PROCEDURE proc_loanpayment(in_clientid IN number,in_amount IN number)
	AS
	total_paid NUMBER(15,5):=0;
	fractional_paid NUMBER(15,5):=0;
	CURSOR cur_loanpayment IS
	SELECT *from loan
	WHERE loan.clientid=in_clientid;
	BEGIN
	FOR row_calc in cur_loanpayment
	LOOP
	IF in_amount-total_paid>0
		THEN
			IF row_calc.amount<=in_amount-total_paid
				THEN total_paid:=total_paid+row_calc.amount;
					 insert into temp_loanpayment
					 values(row_calc.loanid,1);	
			ELSE  
				fractional_paid:=in_amount-total_paid;
				total_paid:=in_amount;
				insert into temp_loanpayment
				values(row_calc.loanid,0);	
			END IF;
	END IF;
	END LOOP;
	delete from loan
	where loan.loanid IN (select temp_loanpayment.loanid 
						  from temp_loanpayment
						  where temp_loanpayment.up_del=1);
	update loan
	set loan.amount=loan.amount-fractional_paid
	where loan.loanid IN (select temp_loanpayment.loanid 
						  from temp_loanpayment
						  where temp_loanpayment.up_del=0);
	delete from temp_loanpayment;
	END;
	
END package_loan;
/










