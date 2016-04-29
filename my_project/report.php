<?php
session_start();
if (!(isset($_SESSION['id']) && $_SESSION['id'] != '')) {
	header("Location: login.php");
		exit();
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Smart stock business</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style1.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="bg1">
	<div id="header">
		 <h1>Brooker house name	</h1>
	</div>
</div>
<div id="bg2">
  <div id="header2">
		<div id="menu">
		</div>
	</div>
	<!-- end #header2 -->
</div>
<!-- end #bg2 -->
<div id="container">
<?php
  include("connect.php"); 
?> 

<h2>Report </h2>

<?php

	$id= $_SESSION['id'];
		
	// Select Data...
	$sql="select * from client where CLIENTID='{$id}'";
   $s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   
   while (oci_fetch($s)) {
		
		$id=oci_result($s, "CLIENTID");
		$fname=oci_result($s, "FNAME");
		$lname=oci_result($s, "LNAME");
		$email=oci_result($s, "EMAIL");
		$bo=oci_result($s, "BOACCNO");
		$username=oci_result($s, "USERNAME");
		$balance=oci_result($s, "ACCBALANCE");
		$plimit=oci_result($s, "PURCHASELIMIT");
		$max=oci_result($s, "MAXWITHDRAW");
		
		}

		$name=$fname." ".$lname;
   
 //  echo $id." ".$fname." ".$lname." ".$gender." ".$address." ".$dob." ".$phn." ".$email." ".$nationality." ".$occ." ".$bo." ".$username." ";
 //  echo $occ;
 
?>
<table class="style1" style="width: 80%;">
                <tbody>
                <tr>
                    <td width="25%" class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label5" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 0px; width: 217px; height: 19px;">Full Name:</span>
                        </font>
                    </td>
                    <td width="75%">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Nam" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: normal; 
text-decoration: none; z-index: 1; left: 225px; top: 0px; width: 350px; 
height: 19px;">
<?php
echo $name;
?>
</span>
                        </font>
                    </td>
                </tr>
                
                 <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label10" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 180px; width: 217px; height: 19px;">e-mail
 :</span>
                        </font>
                    </td>
                    <td>
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Ph" style="color: rgb(0,
 51, 0); font-family: Arial Narrow; font-weight: normal; 
text-decoration: none; z-index: 1; left: 225px; top: 180px; width: 
217px; height: 19px;">
<?php
echo $email;
?>
</span>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label32" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 720px; width: 217px; height: 19px;">Investor
 ID :</span>
                        </font>
                    </td>
                    <td>
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_InvID" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: normal; 
text-decoration: none; z-index: 1; left: 225px; top: 720px; width: 
217px; height: 19px;">
<?php
echo $id;
?>
</span>
                        </font></font>
                    </td>
                </tr>
                <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label34" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 750px; width: 217px; height: 19px;">BO
 ID :</span>
                        </font>
                    </td>
                    <td>
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_BOID" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: normal; 
text-decoration: none; z-index: 1; left: 225px; top: 750px; width: 
350px; height: 19px;">
<?php
echo $bo;
?>
</span>
                        </font>
                        </font>
                    </td>
                </tr>
               
               
                <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label40" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 840px; width: 217px; height: 19px;">Username
 :</span>

                        </font></td>
                    <td>
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_BrNam" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: normal; text-decoration: none; z-index: 1; left: 225px; top: 840px; width: 
350px; height: 19px; font-size: 14px;">
<?php
echo $username;
?>
</span>
                        </font></td>
                </tr>
                
                <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label40" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 840px; width: 217px; height: 19px;">Balance
 :</span>

                        </font></td>
                    <td>
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_BrNam" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: normal; text-decoration: none; z-index: 1; left: 225px; top: 840px; width: 
350px; height: 19px; font-size: 14px;">
<?php
echo $balance;
?>
</span>
                        </font></td>
                </tr>
                <tr>
                    <td class="style8">&nbsp;
                        </td>
                    <td>&nbsp;
                        </td>
                </tr>
            </tbody></table>
			
<?php
/**************************
***********************************/
?>	
				
<br/>
<br/>
<h3>Current Stock Statement :</h3>

<?php
/**************************
***********************************/
?>	
	

<?php


	$sql="select shareid from owns where CLIENTID='{$id}' ";
    $s = oci_parse($c,$sql );
    oci_execute($s, OCI_DEFAULT);
   
  
 ?>
 
 <table id="ctl00_MSPlace_GVr" style="color: Black; background-color: 
White; border: 2px none rgb(153, 153, 153); font-size: small; 
font-weight: normal; border-collapse: collapse; z-index: 1; left: 0px; 
top: 0px; height: 147px; width: 612px;" border="2" cellpadding="3" 
cellspacing="0" rules="all">
		<tbody><tr style="color: White; background-color: Black; border-style:
 ridge; font-weight: bold;" valign="middle" align="center">
			<th scope="col">Share id</th>
			<th scope="col">Share Name</th>
			<th scope="col">Quantity</th>
			
			
		</tr>
 
<?php   

while (oci_fetch($s)) {
		$shareid=oci_result($s, "SHAREID");
		
		$sql="select sum(quantity) as TOT from owns where CLIENTID='{$id}' and SHAREID='{$shareid}' ";
		$s2 = oci_parse($c,$sql );
		oci_execute($s2, OCI_DEFAULT);
		while (oci_fetch($s2)) {
			$total=oci_result($s2, "TOT");
			}
			
			
		$sql="select sharename from owned_share where SHAREID='{$shareid}' ";
		$s3 = oci_parse($c,$sql );
		oci_execute($s3, OCI_DEFAULT);
		while (oci_fetch($s3)) {
			$sharename=oci_result($s3, "SHARENAME");
			}	
		
		
		
	
//	echo	$odate." ".$orderid." ".$shareid." ".$ordername." ".$quantity." ".$rate;	
		echo '<tr style="border: 1px solid Black;">';
		
		echo '<td>';
		echo $shareid;
		echo '</td>';
		echo '<td>';
		echo $sharename;
		echo '</td>';
		echo '<td>';
		echo $total;
		echo '</td>';
		
		echo '</tr>';
		}
		
?>
        
        <tr style="background-color: rgb(204, 204, 204);">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			
		</tr>
	</tbody></table>
		
		
		
<?php
/**************************
***********************************/
?>


<br/>
<br/>
<br/>
<h3>Loan Statement:</h3>

<?php
/**************************
***********************************/
?>
<?php

$id= $_SESSION['id'];

// Select Data...
	$sql="select * from loan where CLIENTID='{$id}'";

   $s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   

$i=0;
	while (oci_fetch($s)) {
	
		$odate=oci_result($s, "LOANDATE");
		$loanid=oci_result($s, "LOANID");
		$amount=oci_result($s, "AMOUNT");
		$i++;
	}
	
	if ($i==0){
		echo "You have no loan to pay.";
	}
	else{
		// Select Data...
		$sql="select add_months(to_date('$odate', 'dd-MM-yyyy'),6) as LDATE from dual";
		$s = oci_parse($c,$sql );
	   oci_execute($s, OCI_DEFAULT);
	   while (oci_fetch($s)) {
			$ldate=oci_result($s, "LDATE");
	   }
	   
	  
	   echo "Amount Of Loan :  ".$amount."<br />";
	   echo "Last Date of payment : ".$ldate."<br />";
   
   }
 //  echo $id." ".$fname." ".$lname." ".$gender." ".$address." ".$dob." ".$phn." ".$email." ".$nationality." ".$occ." ".$bo." ".$username." ";
 //  echo $occ;
   
   
  ?>


<?php
/**************************
***********************************/
?>

<br/>
<br/>		
<br/>
<br/>
<br/>
<br/>
<h2>Trading and Transaction of last one month :</h2>

<?php
/**************************
***********************************/
?>
<br/>
<br/>
<h3>Share Buying History :</h3>	

<?php
/**************************
***********************************/
?>


<?php
	// Select Data...
	$sql="select add_months(to_date(sysdate, 'dd-MM-yyyy'),-1) as LDATE from dual";
	$s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   while (oci_fetch($s)) {
		$ldate=oci_result($s, "LDATE");
   }
   
  // echo $ldate;

	// Select Data...
	$sql="select * from buying_history where CLIENTID='{$id}' and TRADINGDATE > '{$ldate}'";
    $s = oci_parse($c,$sql );
    oci_execute($s, OCI_DEFAULT);
	
?>


		 <table id="ctl00_MSPlace_GVr" style="color: Black; background-color: 
White; border: 2px none rgb(153, 153, 153); font-size: small; 
font-weight: normal; border-collapse: collapse; z-index: 1; left: 0px; 
top: 0px; height: 147px; width: 612px;" border="2" cellpadding="3" 
cellspacing="0" rules="all">
		<tbody><tr style="color: White; background-color: Black; border-style:
 ridge; font-weight: bold;" valign="middle" align="center">
			<th scope="col">Date</th>
			<th scope="col">Share id</th>
			<th scope="col">Share Name</th>
			<th scope="col">Quantity</th>
			<th scope="col">Rate</th>
			<th scope="col">Total Amount</th>
			
		</tr>
 
<?php   

while (oci_fetch($s)) {
	
		$odate=oci_result($s, "TRADINGDATE");
		$shareid=oci_result($s, "SHAREID");
		$sharename=oci_result($s, "SHARENAME");
		$quantity=oci_result($s, "QUANTITY");
		$rate=oci_result($s, "RATE");
		$total=oci_result($s, "TOTALAMOUNT");
	
//	echo	$odate." ".$orderid." ".$shareid." ".$sharename." ".$quantity." ".$rate;	
      echo '<tr style="border: 1px solid Black;">';
		echo	'<td>';
		echo	$odate;
		echo '</td>';
		
		echo '<td>';
		echo $shareid;
		echo '</td>';
		echo '<td>';
		echo $sharename;
		echo '</td>';
		echo '<td>';
		echo $quantity;
		echo '</td>';
		echo '<td >';
		echo $rate;
		echo '</td>';
		echo '<td >';
		echo $total;
		echo '</td>';
		echo '</tr>';
		}
		
?>
        
        <tr style="background-color: rgb(204, 204, 204);">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tbody></table>

<?php
/**************************
***********************************/
?>	

<br/>
<br/>
<h3>Share Selling History :</h3>	
<?php
/**************************
***********************************/
?>


<?php
	
   
  // echo $ldate;

	// Select Data...
	$sql="select * from selling_history where CLIENTID='{$id}' and TRADINGDATE > '{$ldate}'";
    $s = oci_parse($c,$sql );
    oci_execute($s, OCI_DEFAULT);
	
?>


		 <table id="ctl00_MSPlace_GVr" style="color: Black; background-color: 
White; border: 2px none rgb(153, 153, 153); font-size: small; 
font-weight: normal; border-collapse: collapse; z-index: 1; left: 0px; 
top: 0px; height: 147px; width: 612px;" border="2" cellpadding="3" 
cellspacing="0" rules="all">
		<tbody><tr style="color: White; background-color: Black; border-style:
 ridge; font-weight: bold;" valign="middle" align="center">
			<th scope="col">Date</th>
			<th scope="col">Share id</th>
			<th scope="col">Share Name</th>
			<th scope="col">Quantity</th>
			<th scope="col">Rate</th>
			<th scope="col">Total Amount</th>
			
		</tr>
 
<?php   

while (oci_fetch($s)) {
	
		$odate=oci_result($s, "TRADINGDATE");
		$shareid=oci_result($s, "SHAREID");
		$sharename=oci_result($s, "SHARENAME");
		$quantity=oci_result($s, "QUANTITY");
		$rate=oci_result($s, "RATE");
		$total=oci_result($s, "TOTALAMOUNT");
	
//	echo	$odate." ".$orderid." ".$shareid." ".$sharename." ".$quantity." ".$rate;	
      echo '<tr style="border: 1px solid Black;">';
		echo	'<td>';
		echo	$odate;
		echo '</td>';
		
		echo '<td>';
		echo $shareid;
		echo '</td>';
		echo '<td>';
		echo $sharename;
		echo '</td>';
		echo '<td>';
		echo $quantity;
		echo '</td>';
		echo '<td >';
		echo $rate;
		echo '</td>';
		echo '<td >';
		echo $total;
		echo '</td>';
		echo '</tr>';
		}
		
?>
        
        <tr style="background-color: rgb(204, 204, 204);">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tbody></table>

<?php
/**************************
***********************************/
?>	



<br/>
<br/>
<h3>Money Deposit History :</h3>

<?php
/**************************
***********************************/
?>	

<?php



// Select Data...
	$sql="select * from deposit_order where CLIENTID='{$id}'and ORDERDATE > '{$ldate}'";
   $s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   
 ?>
   



		 <table id="ctl00_MSPlace_GVr" style="color: Black; background-color: 
White; border: 2px none rgb(153, 153, 153); font-size: small; 
font-weight: normal; border-collapse: collapse; z-index: 1; left: 0px; 
top: 0px; height: 147px; width: 612px;" border="2" cellpadding="3" 
cellspacing="0" rules="all">
		<tbody><tr style="color: White; background-color: Black; border-style:
 ridge; font-weight: bold;" valign="middle" align="center">
			<th scope="col">Transaction Date</th>
			<th scope="col">Transaction No.</th><th scope="col">Amount</th>
		</tr>
 
<?php   

while (oci_fetch($s)) {
		
		$odate=oci_result($s, "ORDERDATE");
		$orderid=oci_result($s, "ORDERID");
		$amount=oci_result($s, "AMOUNT");
		
		echo '<tr style="border: 1px solid Black;">';
		echo	'<td>';
		echo	$odate;
		echo '</td>';
		echo '<td>';
		echo $orderid;
		echo '</td>';
		echo '<td align="right">';
		echo $amount;
		echo '</td>';
		echo '</tr>';
		}
?>
        
        <tr style="background-color: rgb(204, 204, 204);">
			<td>&nbsp;</td><td align="left">Total</td><td
 align="right">
 
 <?php

// Select Data...
	$sql="select sum(amount) as TOT from deposit_order where CLIENTID='{$id}' and ORDERDATE > '{$ldate}'";
	$s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   
   while (oci_fetch($s)) {
		$total=oci_result($s, "TOT");
   }
   echo $total;
   
 ?>


 </td>
		</tr>
	</tbody></table>
	




<?php
/**************************
***********************************/
?>	


<br/>
<br/>
<h3>Money Withdraw History :</h3>

<?php
/**************************
***********************************/
?>	
	
<?php



// Select Data...
	$sql="select * from withdraw_order where CLIENTID='{$id}'and ORDERDATE > '{$ldate}'";
   $s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   
 ?>
   



		 <table id="ctl00_MSPlace_GVr" style="color: Black; background-color: 
White; border: 2px none rgb(153, 153, 153); font-size: small; 
font-weight: normal; border-collapse: collapse; z-index: 1; left: 0px; 
top: 0px; height: 147px; width: 612px;" border="2" cellpadding="3" 
cellspacing="0" rules="all">
		<tbody><tr style="color: White; background-color: Black; border-style:
 ridge; font-weight: bold;" valign="middle" align="center">
			<th scope="col">Transaction Date</th>
			<th scope="col">Transaction No.</th><th scope="col">Amount</th>
		</tr>
 
<?php   

while (oci_fetch($s)) {
		
		$odate=oci_result($s, "ORDERDATE");
		$orderid=oci_result($s, "ORDERID");
		$amount=oci_result($s, "AMOUNT");
		
		echo '<tr style="border: 1px solid Black;">';
		echo	'<td>';
		echo	$odate;
		echo '</td>';
		echo '<td>';
		echo $orderid;
		echo '</td>';
		echo '<td align="right">';
		echo $amount;
		echo '</td>';
		echo '</tr>';
		}
?>
        
        <tr style="background-color: rgb(204, 204, 204);">
			<td>&nbsp;</td><td align="left">Total</td><td
 align="right">
 
 <?php

// Select Data...
	$sql="select sum(amount) as TOT from withdraw_order where CLIENTID='{$id}' and ORDERDATE > '{$ldate}'";
	$s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   
   while (oci_fetch($s)) {
		$total=oci_result($s, "TOT");
   }
   echo $total;
   
 ?>


 </td>
		</tr>
	</tbody></table>
	
	
   
  <?php
/**************************
***********************************/
?>	
	    
   

</div>

<?php
// Commit to save changes...
   oci_commit($c);
 
   // Logoff from Oracle...
   oci_free_statement($s);
   oci_close($c);
 ?>

<!-- end #bg3 -->
<div id="footer">
Database project@2011
</div>
<!-- end #footer -->
</body>
</html>