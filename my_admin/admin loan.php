<?php
session_start();
if (!(isset($_SESSION['adminid']) && $_SESSION['adminid'] != '')) {
	header("Location: admin login.php");
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
		 <h1>Smart stock business	</h1>
     
	</div>
	<!-- end #header -->
</div>
<!-- end #bg1 -->
<div id="bg2">
  <div id="header2">
		<div id="menu">

			<ul>
			 <li><a href="admin personal info.php">My Statements</a></li>
			   <li><a href="admin client info.php">Client Info</a></li>
              <li><a href="admin buy order.php">Trading</a></li>
              <li><a href="admin deposit order.php">Transaction</a></li>
              <li><div id = "now"><a href="admin loan.php">Loan</a></div></li>
         	 
              <li><a href="admin logout.php">Log out</a></li>
			</ul>
		</div>
  </div>
	<!-- end #header2 -->
</div>
<!-- end #bg2 -->


<div id = "sidebar">
        	<ul>
            <li><a href="admin loan.php">Loan</a></li>
            <li><a href="admin loan pay.php">Confirm Loan pay</a></li>
           
           
             </ul>
        </div>




<div id="container">
<?php
   include("connect.php"); 
?> 

<?php

$id= $_SESSION['id'];
//echo $id;

// Select Data...
	$sql="select * from loan ";

   $s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   
 ?>
   

<h2>Loan :</h2>

		 <table id="ctl00_MSPlace_GVr" style="color: Black; background-color: 
White; border: 2px none rgb(153, 153, 153); font-size: small; 
font-weight: normal; border-collapse: collapse; z-index: 1; left: 0px; 
top: 0px; height: 147px; width: 612px;" border="2" cellpadding="3" 
cellspacing="0" rules="all">
		<tbody><tr style="color: White; background-color: Black; border-style:
 ridge; font-weight: bold;" valign="middle" align="center">
			<th scope="col">Loan id</th>
			<th scope="col">Client id</th>
			<th scope="col">Loan date</th>
			<th scope="col">Amount</th>
			<th scope="col">Last date of payment</th>
			
			
		</tr>
 
<?php   

while (oci_fetch($s)) {
	
		$odate=oci_result($s, "LOANDATE");
		$loanid=oci_result($s, "LOANID");
		$clientid=oci_result($s, "CLIENTID");
		$amount=oci_result($s, "AMOUNT");
		
		
		// Select Data...
		$sql="select add_months(to_date('$odate', 'dd-MM-yyyy'),6) as LDATE from dual";
		$s = oci_parse($c,$sql );
	   oci_execute($s, OCI_DEFAULT);
	   while (oci_fetch($s)) {
			$ldate=oci_result($s, "LDATE");
	   }
	
//	echo	$odate." ".$orderid." ".$shareid." ".$ordername." ".$quantity." ".$rate;	
      echo '<tr style="border: 1px solid Black;">';
		echo	'<td>';
		echo	$loanid;
		echo '</td>';
		echo '<td>';
		echo $clientid;
		echo '</td>';
		echo '<td>';
		echo $odate;
		echo '</td>';
		echo '<td>';
		echo $amount;
		echo '</td>';
		echo '<td>';
		echo $ldate;
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
			
		</tr>
	</tbody></table>
		</div>


</div>

<!-- end #bg3 -->
<div id="footer">

	<p>(c) 2008 Sitename.com. Design by <a href="http://www.nodethirtythree.com/">nodeThirtyThree</a> + <a href="http://www.freewpthemes.net/">Free CSS Templates</a></p>
</div>
<!-- end #footer -->
</body>
</html>