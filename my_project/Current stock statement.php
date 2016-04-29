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
		 <h1>Smart stock business	</h1>
     
	</div>
	<!-- end #header -->
</div>
<!-- end #bg1 -->
<div id="bg2">
  <div id="header2">
		<div id="menu">

			<ul>
			 <li><div id = "now"><a href="personal info.php">My Statements</a></div></li>
             <li><a href="E-trading.php">E-Trading</a></li>
			   <li><a href="money requisition.php">Money Reqisition</a></li>
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
           <li><a href="personal info.php">Personal info</a></li>
             <li><a href="Financial statement.php">Financial statement</a></li>
            <li><a href="Current stock statement.php">Current stock statement</a></li>
           
            <li><a href="report.php">Report</a></li>
          
           
            <li><a href="Change passward.php">Change passward</a></li>
           
           
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

//	$sql="select shareid,sum(quantity) as qtity from owns where CLIENTID='{$id}' group by '{$id}'";

	$sql="select shareid from owns where CLIENTID='{$id}' ";
    $s = oci_parse($c,$sql );
    oci_execute($s, OCI_DEFAULT);
   
  
 ?>
   

<h2>Current Stock Statement :</h2>

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
		</div>


</div>

<!-- end #bg3 -->
<div id="footer">

	<p>(c) 2008 Sitename.com. Design by <a href="http://www.nodethirtythree.com/">nodeThirtyThree</a> + <a href="http://www.freewpthemes.net/">Free CSS Templates</a></p>
</div>
<!-- end #footer -->
</body>
</html>