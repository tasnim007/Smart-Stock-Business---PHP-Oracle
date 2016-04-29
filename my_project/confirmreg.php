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


<?php

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gen=$_POST['gen'];
$ad=$_POST['ad'];
$dob=$_POST['dob'];
$phn=$_POST['phn'];
$mail=$_POST['mail'];
$occ=$_POST['occ'];
$nationality=$_POST['nationality'];
$bo=$_POST['bo'];
$balance=$_POST['balance'];
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$acctype='A';
$plimit=$balance-500;
$maxwithdraw=$balance-500;

//echo $fname." ".$lname." ".$gen." ".$ad." ".$dob." ".$phn." ".$mail." ".$bo." ".$balance." ".$uname." ".$pass." ";


    // Insert data into table...
	$sql="INSERT INTO 
	temp_client(FNAME,LNAME,ACCTYPE,BOACCNO,GENDER,USERNAME,PASSWARD,DATEOFBIRTH,ADDRESS,PHONENO,EMAIL,ACCBALANCE,PURCHASELIMIT,MAXWITHDRAW,OCCUPATION,NATIONALITY)
	VALUES ('{$fname}','{$lname}','{$acctype}','{$bo}','{$gen}','{$uname}','{$pass}','{$dob}','{$ad}','{$phn}','{$mail}','{$balance}','{$plimit}','{$maxwithdraw}','{$occ}','{$nationality}')";
   $s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   
   echo "Your request is under process. ";
 

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