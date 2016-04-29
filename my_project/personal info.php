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
		
		$id=oci_result($s, "CLIENTID");
		$fname=oci_result($s, "FNAME");
		$lname=oci_result($s, "LNAME");
		$gender=oci_result($s, "GENDER");
		$address=oci_result($s, "ADDRESS");
		$dob=oci_result($s, "DATEOFBIRTH");
		$phn=oci_result($s, "PHONENO");
		$email=oci_result($s, "EMAIL");
		$nationality=oci_result($s, "NATIONALITY");
		$occ=oci_result($s, "OCCUPATION");
		$bo=oci_result($s, "BOACCNO");
		$username=oci_result($s, "USERNAME");
		} 
   
 //  echo $id." ".$fname." ".$lname." ".$gender." ".$address." ".$dob." ".$phn." ".$email." ".$nationality." ".$occ." ".$bo." ".$username." ";
 //  echo $occ;
   
   
  ?>

<h2>Personal info :</h2>

		 <table class="style1" style="width: 80%;">
                <tbody><tr>
                    <td width="25%" class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label41" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: bold; 
text-decoration: underline; z-index: 1; left: 0px; top: 330px; width: 
217px; height: 19px;">Investor Details :</span>
                        </font></font>
                    </td>
                    <td width="75%">&nbsp;
                        </td>
                </tr>
                <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label5" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 0px; width: 217px; height: 19px;">First Name:</span>
                        </font>
                    </td>
                    <td>
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Nam" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: normal; 
text-decoration: none; z-index: 1; left: 225px; top: 0px; width: 350px; 
height: 19px;">
<?php
echo $fname;
?>
</span>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label7" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 30px; width: 217px; height: 19px;">Last Name: :</span>
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
echo $lname;
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
none; z-index: 1; left: 0px; top: 60px; width: 217px; height: 19px;">Gender :</span>
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
echo $gender;
?>
 </span>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label9" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 90px; width: 217px; height: 19px;">Address :</span>
                        </font>
                    </td>
                    <td>
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_PAdd" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: normal; 
text-decoration: none; z-index: 1; left: 225px; top: 90px; width: 350px;
 height: 19px;">
 <?php
echo $address;
?>
 </span>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label42" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 180px; width: 217px; height: 19px;">Date
 of Birth :</span>
                        </font></font>
                    </td>
                    <td>
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_doB" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: normal; 
text-decoration: none; z-index: 1; left: 225px; top: 180px; width: 
217px; height: 19px;">
<?php
echo $dob;
?>
</span>
                        </font></font>
                    </td>
                </tr>
                <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label10" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 180px; width: 217px; height: 19px;">Phone
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
echo $phn;
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
                        <span id="ctl00_MSPlace_Label12" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 210px; width: 217px; height: 19px;">Occupation
 :</span>
                        </font>
                    </td>
                    <td>
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Occu" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: normal; 
text-decoration: none; z-index: 1; left: 225px; top: 210px; width: 
217px; height: 19px;">
<?php
echo $occ;
?>
</span>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label14" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 240px; width: 217px; height: 19px;">Nationality
 :</span>
                        </font></td>
                    <td>
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Nat" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: normal; 
text-decoration: none; z-index: 1; left: 225px; top: 240px; width: 
217px; height: 19px;">
<?php
echo $nationality;
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
                <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label31" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: bold; 
text-decoration: underline; z-index: 1; left: 0px; top: 690px; width: 
217px; height: 19px;">Account Details :</span>
                        </font>
                    </td>
                    <td>&nbsp;
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
                    <td class="style8">&nbsp;
                        </td>
                    <td>&nbsp;
                        </td>
                </tr>
            </tbody></table>
		</div>
               

</div>

	
    
</div>

</body>
</html>