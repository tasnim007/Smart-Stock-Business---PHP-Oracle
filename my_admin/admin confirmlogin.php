<?php 
session_start();
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
		 <h1>smart stock business	</h1>
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

$user=$_POST['username'];
$pass=$_POST['password'];

//echo " ".$user."   ".$pass." "."<br/>";

// Select Data...
	$sql="select * from admin where USERNAME='{$user}' and PASSWARD='{$pass}'";

   $s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   
 
   
   $i=0;
  while (oci_fetch($s)) {
		$i+=1;
		$id=oci_result($s, "ADMINID");
		$fname=oci_result($s, "FNAME");
		$lname=oci_result($s, "LNAME");
		} 
	if($i==1){
		$_SESSION['adminusername'] = $user;
		$_SESSION['adminid'] = $id;
		$_SESSION['adminfname']=$fname;
		//echo $_SESSION['adminusername']." ".$_SESSION['adminid']." ".$_SESSION['fname'];
		header("Location: admin personal info.php");
		exit();
		
	}
		
		
	else{
		echo "Invalid username or password";
	}	

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