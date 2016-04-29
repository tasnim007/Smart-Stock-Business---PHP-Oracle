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

$loanpayid= $_SESSION['loanpayid'];

if($_POST['approve'] == 'Approve') {
	

// Select Data...
	$sql="select * from loan_pay where LOANPAYID='{$loanpayid}'";

   $s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   
   while (oci_fetch($s)) {
		
		
		$ldate=oci_result($s, "LDATE");
		$clientid=oci_result($s, "CLIENTID");
		$amount=oci_result($s, "AMOUNT");
		} 
		
			// Insert data into table...
			
		$sql="begin
			package_loan.proc_loanpayment(:bind1, :bind2);
		end;";
	$s = oci_parse($c,$sql );
	oci_bind_by_name($s, ":bind1", $clientid);
	oci_bind_by_name($s, ":bind2", $amount);
	
  
	oci_execute($s, OCI_DEFAULT);
		
	   


}

else if($_POST['reject'] == 'Reject') {
		
	 //  echo "Request no ".$id."rejected";
	 
	 
	
}

//Delete from table
	   $sql="DELETE FROM loan_pay WHERE LOANPAYID='{$loanpayid}'";
		$s = oci_parse($c,$sql );
	   oci_execute($s, OCI_DEFAULT);
	   
	   oci_commit($c);
	   // Logoff from Oracle...
   oci_free_statement($s);
   oci_close($c);
	   
	    header("Location: admin loan pay.php");

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