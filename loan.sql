create table loan(
loanid	number(10,0),
clientid number(10,0),
amount number(15,5),
loandate date,
PRIMARY KEY (loanid),
FOREIGN KEY (clientid) REFERENCES client(clientid)	
);

create table temp_loanpayment(
loanid	number(10,0),
up_del number(1,0),
PRIMARY KEY (loanid)
);

CREATE SEQUENCE seq_loan START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER tr_loan
BEFORE INSERT ON loan
FOR EACH ROW
BEGIN
    SELECT seq_loan.nextval INTO :new.loanid FROM dual;
END;
/

CREATE OR REPLACE PACKAGE package_loan
IS

	FUNCTION func_loancheck(in_clientid IN number,in_amount IN number) RETURN integer;
	PROCEDURE proc_loancheck(in_clientid IN number,in_amount IN number,out_flag OUT integer);
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

	PROCEDURE proc_loancheck(in_clientid IN number,in_amount IN number,out_flag OUT integer)
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


/*****************************checking************************/





EXEC proc_loancheck(1,500);
select *from loan;
EXEC proc_loancheck(1,600);
select *from loan;
EXEC proc_loancheck(1,200);
select *from loan;


select func_loancheck(1,1000) from dual;
select accbalance,purchaselimit,maxwithdraw 
from client 
where clientid=1;
select *from loan
where clientid=1;



EXEC proc_loanpayment(1,1000);



