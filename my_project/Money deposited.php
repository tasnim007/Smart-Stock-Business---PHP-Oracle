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
		 <h1>Smart stock business</h1>
     
	</div>
	<!-- end #header -->
</div>
<!-- end #bg1 -->
<div id="bg2">
  <div id="header2">
		<div id="menu">

			<ul>
			 <li><a href="personal info.php">My Statements</a></li>
             <li><a href="E-trading.php">E-Trading</a></li>
			   <li><div id = "now"><a href="money requisition.php">Money Reqisition</a></div></li>
               <li><a href="loan.php">Loan</a></li>
              <li><a href="Mis.php">Miscellaneous</a></li>
           
         	  <li><a href="help.php">Help</a></li>
              <li><a href="logout.php">Log out</a></li>
			</ul>
		</div>

	</div>
	<!-- end #header2 -->
</div>
<!-- end #bg2 -->
<div id = "sidebar">
        	<ul>
           <li><a href="money requisition.php">Money Reqisition</a></li>
            <li><a href="Money deposited.php">Money Deposited</a></li>
             <li><a href="Money withdrawn.php">Money Withdrawn</a></li>
           
             </ul>
        </div>
<div id="container">

<?php
   include("connect.php"); 
?> 

<?php

$id= $_SESSION['id'];

// Select Data...
	$sql="select * from deposit_order where CLIENTID='{$id}'";

   $s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   
 ?>
   

<h2>Money deposited :</h2>

		 <table id="ctl00_MSPlace_GVr" style="color: Black; background-color: 
White; border: 2px none rgb(153, 153, 153); font-size: small; 
font-weight: normal; border-collapse: collapse; z-index: 1; left: 0px; 
top: 0px; height: 147px; width: 612px;" border="2" cellpadding="3" 
cellspacing="0" rules="all">
		<tbody><tr style="color: White; background-color: Black; border-style:
 ridge; font-weight: bold;" valign="middle" align="center">
			<th scope="col">Order Date</th>
			<th scope="col">Order No.</th><th scope="col">Amount</th>
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
	$sql="select sum(amount) as TOT from deposit_order where CLIENTID='{$id}'";
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
		</div>


</div>

	
    
</div>

</body>
</html>