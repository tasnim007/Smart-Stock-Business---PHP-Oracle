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

// Select Data...
	$sql="select * from client where CLIENTID='{$id}'";

   $s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);

  
  
   while (oci_fetch($s)) {
		
		$balance=oci_result($s, "ACCBALANCE");
		$plimit=oci_result($s, "PURCHASELIMIT");
		$max=oci_result($s, "MAXWITHDRAW");
		
		} 
   
 //  echo $id." ".$fname." ".$lname." ".$gender." ".$address." ".$dob." ".$phn." ".$email." ".$nationality." ".$occ." ".$bo." ".$username." ";
 //  echo $occ;
   
   
  ?>

<h2>Financial statement :</h2>
 
 <table width="72%" class="style1" style="width: 80%;">
                <tbody><tr>
                    <td width="31%" class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label41" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: bold; 
; z-index: 1; left: 0px; top: 330px; width: 
217px; height: 19px;">Current Account Balance :</span>
                        </font></font>
                    </td>
                    <td width="69%">
<?php
echo $balance;
?>
                        </td>
                </tr>
                
                <tr>
                    <td width="31%" class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label41" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: bold; 
 z-index: 1; left: 0px; top: 330px; width: 
217px; height: 19px;">Purchase Limit :</span>
                        </font></font>
                    </td>
                    <td width="69%">
<?php
echo $plimit;
?>
                        </td>
                </tr>
                <tr>
                    <td width="31%" class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label41" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: bold; 
 z-index: 1; left: 0px; top: 330px; width: 
217px; height: 19px;">Maximum Withdraw :</span>
                        </font></font>
                    </td>
                    <td width="69%">
                    
<?php
echo $max;
?>
                        </td>
                </tr>
                
                
                
               
               
                
                <tr>
                    <td class="style8">&nbsp;
                        </td>
                    <td>&nbsp;
                        </td>
                </tr>
            </tbody></table>
<font style="color: rgb(255, 255, 255); font-weight: bold;">   
 
</font></div>

</div>
               
        
	

</div>
	
    
</div>

</body>
</html>