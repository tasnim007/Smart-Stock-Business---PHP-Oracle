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
            
             </ul>
        </div>
<div id="container">

<?php
   include("connect.php"); 
?> 

<?php

$id= $_SESSION['adminid'];
$loanpayid=$_GET['loanpayid'];

$_SESSION['loanpayid'] = $loanpayid;
//echo $loanpayid;

// Select Data...
	$sql="select * from loan_pay where LOANPAYID='{$loanpayid}'";

   $s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   
  while (oci_fetch($s)) {
		
		
		$ldate=oci_result($s, "LDATE");
		$clientid=oci_result($s, "CLIENTID");
		$amount=oci_result($s, "AMOUNT");
		
		} 
   
 //  echo $id." ".$fname." ".$lname." ".$gender." ".$address." ".$dob." ".$phn." ".$email." ".$nationality." ".$occ." ".$bo." ".$username." ";
 //  echo $occ;
   
   
  ?>

<h2>Loan pay info :</h2>

		 <table class="style1" style="width: 80%;">
                <tbody><tr>
                    <td width="25%" class="style8">&nbsp;</td>
                    <td width="75%">&nbsp;
                        </td>
                </tr>
                  <tr>
                    <td class="style8"><font style="color: rgb(255, 255, 255); 
font-weight: bold;"> <span id="ctl00_MSPlace_Label5" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 0px; width: 217px; height: 19px;">Date:</span> </font></td>
                    <td><font style="color: rgb(255, 255, 255); 
font-weight: bold;"> <span id="ctl00_MSPlace_Nam" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: normal; 
text-decoration: none; z-index: 1; left: 225px; top: 0px; width: 350px; 
height: 19px;">
                      <?php
echo $ldate;
?>
                    </span> </font></td>
                  </tr>
                  
                  <tr>
                    <td class="style8"><font style="color: rgb(255, 255, 255); 
font-weight: bold;"> <span id="ctl00_MSPlace_Label5" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 0px; width: 217px; height: 19px;">Loan pay id:</span> </font></td>
                    <td><font style="color: rgb(255, 255, 255); 
font-weight: bold;"> <span id="ctl00_MSPlace_Nam" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: normal; 
text-decoration: none; z-index: 1; left: 225px; top: 0px; width: 350px; 
height: 19px;">
                      <?php
echo $loanpayid;
?>
                    </span> </font></td>
                  </tr>
                  
                <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label7" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 30px; width: 217px; height: 19px;">Client id: :</span>
                        </font>
                    </td>
                    <td>
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_FNam" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: normal; 
text-decoration: none; z-index: 1; left: 225px; top: 30px; width: 350px;
 height: 19px;">
 <?php
echo $clientid;
?>
 </span>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label8" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 60px; width: 217px; height: 19px;">Amountr :</span>
                        </font>
                    </td>
                    <td>
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_MNam" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: normal; 
text-decoration: none; z-index: 1; left: 225px; top: 60px; width: 350px;
 height: 19px;">
 <?php
echo $amount;
?>
 </span>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td class="style8">&nbsp;
                        </td>
                    <td>&nbsp;
                        </td>
                </tr>
                
                
                               
            </tbody></table>
		
		
		
		
	<form action="admin confirm loan pay.php" method="POST">
	

	<!--            two submit button            -->
	<input type="submit" name="approve" value="Approve">
	<input type="submit" name="reject" value="Reject">
</form>		
			
		

	    
   

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