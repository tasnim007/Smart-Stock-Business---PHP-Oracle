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


$sql="SELECT sysdate as SDATE from dual ";
		
$s = oci_parse($c,$sql );
oci_execute($s, OCI_DEFAULT);
while (oci_fetch($s)) {
			$orderdate=oci_result($s, "SDATE");
	   }


//$orderdate=$_POST['date'];
$amount=$_POST['amount'];
$clientid=$_SESSION['id'];


		$sql="INSERT INTO loan_pay(LDATE,CLIENTID,AMOUNT)
				VALUES ('{$orderdate}','{$clientid}','{$amount}')";
		
		$s = oci_parse($c,$sql );
		oci_execute($s, OCI_DEFAULT);
   
   echo "Your request is under process. ";

//echo $clientid." ".$_POST['date']." ".$_POST['reqtype']." ".$_POST['amount']." ";
	
/*	$sql="begin
			proc_loanpay(:bind1, :bind2,:bind3);
		end;";
	$s = oci_parse($c,$sql );
	oci_bind_by_name($s, ":bind1", $clientid);
	oci_bind_by_name($s, ":bind2", $amount);
	oci_bind_by_name($s, ":bind3", $out_var, 5); // 5 is the return length
  
	oci_execute($s, OCI_DEFAULT);
 
	
	if($out_var==0){
		echo	"Unable to process. ";
	}
	else{
		echo "Your request is under process. ";
	}
		
*/	

		


	
	
   
      
   
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