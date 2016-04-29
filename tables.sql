create table temp_client(
clientid number(10,0),
fname varchar2(20),
lname varchar2(20),
acctype varchar2(20),
boaccno varchar2(20),
gender varchar2(20),
passward varchar2(20),
dateofbirth date,
username varchar2(20),
address varchar2(20),
phoneno varchar2(20),
email varchar2(20),
accbalance number(15,5),
purchaselimit number(15,5),
maxwithdraw number(15,5),
occupation varchar2(30),
nationality varchar2(20),
PRIMARY KEY (clientid)
);

CREATE SEQUENCE seq_temp_client START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER tr_temp_client
BEFORE INSERT ON temp_client
FOR EACH ROW
BEGIN
    SELECT seq_temp_client.nextval INTO :new.clientid FROM dual;
END;
/


create table client(
clientid number(10,0),
fname varchar2(20),
lname varchar2(20),
acctype varchar2(20),
boaccno varchar2(20),
gender varchar2(20),
passward varchar2(20),
dateofbirth date,
username varchar2(20),
address varchar2(20),
phoneno varchar2(20),
email varchar2(20),
accbalance number(15,5),
purchaselimit number(15,5),
maxwithdraw number(15,5),
occupation varchar2(30),
nationality varchar2(20),
PRIMARY KEY (clientid)
);

CREATE SEQUENCE seq_client START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER tr_client
BEFORE INSERT ON client
FOR EACH ROW
BEGIN
    SELECT seq_client.nextval INTO :new.clientid FROM dual;
END;
/



create table owned_share(
shareid number(10,0),
sharename varchar2(20),
latestprice number(15,5),
facevalue number(15,5),
marketlot number(6),
PRIMARY KEY (shareid)		     
);



create table owns(
clientid number(10,0),
shareid number(10,0),
quantity number(10,0),
totalvalue number(15,5),
PRIMARY KEY (clientid,shareid),
FOREIGN KEY (clientid) REFERENCES client(clientid),
FOREIGN KEY (shareid) REFERENCES owned_share(shareid)	
);



create table sell_order(
orderid number(10,0),
clientid number(10,0),
shareid number(10,0),
sharename varchar2(20),
orderdate date,
quantity number(10,0),
rate number(15,5),
PRIMARY KEY (orderid),
FOREIGN KEY (clientid) REFERENCES client(clientid),
FOREIGN KEY (shareid) REFERENCES owned_share(shareid)				
);


CREATE SEQUENCE seq_sell_order START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER tr_sell_order
BEFORE INSERT ON sell_order
FOR EACH ROW
BEGIN
    SELECT seq_sell_order.nextval INTO :new.orderid FROM dual;
END;
/



create table buy_order(
orderid number(10,0),
clientid number(10,0),
shareid number(10,0),
sharename varchar2(20),
orderdate date,
quantity number(10,0),
rate number(15,5),
PRIMARY KEY (orderid),
FOREIGN KEY (clientid) REFERENCES client(clientid),
FOREIGN KEY (shareid) REFERENCES owned_share(shareid)
);


CREATE SEQUENCE seq_buy_order START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER tr_buy_order
BEFORE INSERT ON buy_order
FOR EACH ROW
BEGIN
    SELECT seq_buy_order.nextval INTO :new.orderid FROM dual;
END;
/



create table temp_buy_order(
orderid number(10,0),
clientid number(10,0),
up_del number(1,0),
update_val number(10,0),
PRIMARY KEY (orderid)
);

create table temp_sell_order(
orderid number(10,0),
clientid number(10,0),
up_del number(1,0),
update_val number(10,0),
PRIMARY KEY (orderid)
);


create table buying_history(
historyid number(10,0),
clientid number(10,0),
shareid number(10,0),
tradingdate date,
sharename varchar2(20),
quantity number(10,0),
rate number(15,5),
totalamount number(15,5),
PRIMARY KEY (historyid),
FOREIGN KEY (clientid) REFERENCES client(clientid)		
);


CREATE SEQUENCE seq_buying_history START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER tr_buying_history
BEFORE INSERT ON buying_history
FOR EACH ROW
BEGIN
    SELECT seq_buying_history.nextval INTO :new.historyid FROM dual;
END;
/



create table selling_history(
historyid number(10,0),
clientid number(10,0),
shareid number(10,0),
tradingdate date,
sharename varchar2(20),
quantity number(10,0),
rate number(15,5),
totalamount number(15,5),
PRIMARY KEY (historyid),
FOREIGN KEY (clientid) REFERENCES client(clientid)
);



CREATE SEQUENCE seq_selling_history START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER tr_selling_history
BEFORE INSERT ON selling_history
FOR EACH ROW
BEGIN
    SELECT seq_selling_history.nextval INTO :new.historyid FROM dual;
END;
/


create table deposit_order(
orderid number(10,0),
clientid number(10,0),
orderdate date,
amount number(10,0),
PRIMARY KEY (orderid),
FOREIGN KEY (clientid) REFERENCES client(clientid)
);

CREATE SEQUENCE seq_deposit_order START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER tr_deposit_order
BEFORE INSERT ON deposit_order
FOR EACH ROW
BEGIN
    SELECT seq_deposit_order.nextval INTO :new.orderid FROM dual;
END;
/





create table withdraw_order(
orderid number(10,0),
clientid number(10,0),
orderdate date,
amount number(10,0),
PRIMARY KEY (orderid),
FOREIGN KEY (clientid) REFERENCES client(clientid)			
);

CREATE SEQUENCE seq_withdraw_order START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER tr_withdraw_order
BEFORE INSERT ON withdraw_order
FOR EACH ROW
BEGIN
    SELECT seq_withdraw_order.nextval INTO :new.orderid FROM dual;
END;
/



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


create table loan_pay(
loanpayid	number(10,0),
clientid number(10,0),
amount number(15,5),
ldate date,
PRIMARY KEY (loanpayid),
FOREIGN KEY (clientid) REFERENCES client(clientid)	
);

CREATE SEQUENCE seq_loan_pay START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER tr_loan_pay
BEFORE INSERT ON loan_pay
FOR EACH ROW
BEGIN
    SELECT seq_loan_pay.nextval INTO :new.loanpayid FROM dual;
END;
/


create table admin(
adminid number(10,0),
fname varchar2(20),
lname varchar2(20),
gender varchar2(20),
passward varchar2(20),
dateofbirth date,
username varchar2(20),
address varchar2(20),
phoneno varchar2(20),
email varchar2(20),
PRIMARY KEY (adminid)
);

CREATE SEQUENCE seq_admin START WITH 1 INCREMENT BY 1;

CREATE OR REPLACE TRIGGER tr_admin
BEFORE INSERT ON admin
FOR EACH ROW
BEGIN
    SELECT seq_admin.nextval INTO :new.adminid FROM dual;
END;
/




drop table admin;

drop table client;
drop table temp_client;
drop table owned_share;
drop table owns;
drop table loan;
drop table buy_order;
drop table sell_order;
drop table buying_history;
drop table selling_history;
drop table deposit_order;
drop table withdraw_order;
drop table temp_buy_order;
drop table temp_sell_order;
drop table loan;
drop table loan_pay;
drop table temp_loanpayment;

drop sequence seq_admin;
drop sequence seq_loan;
drop sequence seq_client;
drop sequence seq_temp_client;
drop sequence seq_sell_order;
drop sequence seq_buy_order;
drop sequence seq_buying_history;
drop sequence seq_selling_history;
drop sequence seq_loan;
drop sequence seq_loan_pay;
drop sequence seq_deposit_order;
drop sequence seq_withdraw_order;