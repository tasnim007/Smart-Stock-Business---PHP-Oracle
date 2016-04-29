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
<?php

$old=$_POST['old'];
$new=$_POST['new'];
$con=$_POST['con'];

//echo $old." ".$new." ".$con;

$id= $_SESSION['id'];
// Select Data...
	$sql="select * from client where CLIENTID='{$id}'";

   $s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   
   while (oci_fetch($s)) {
		
		$pass=oci_result($s, "PASSWARD");
		
		}
	
	if($old!=$pass){
		echo "You entered wrong old passward. Please enter correct passward.";
	}	
	
	elseif($new!=$con){
		echo "New passward and confirm passward not matched.Please enter correct passward.";
	}
	
	else{
		$sql="update client 
		      set PASSWARD='{$new}'
			  where CLIENTID='{$id}'";
	    $s = oci_parse($c,$sql );
	    oci_execute($s, OCI_DEFAULT);
		
		echo "You successfully change your passward.";
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