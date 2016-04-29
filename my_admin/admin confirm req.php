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

$id= $_SESSION['newclient'];

if($_POST['approve'] == 'Approve') {
	

// Select Data...
	$sql="select * from temp_client where CLIENTID='{$id}'";

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
		$balance=oci_result($s, "ACCBALANCE");
		$username=oci_result($s, "USERNAME");
		$pass=oci_result($s, "PASSWARD");
		
		$acctype='A';
		$plimit=$balance-500;
		$maxwithdraw=$balance-500;
		} 
		
			// Insert data into table...
		$sql="INSERT INTO 
		client(FNAME,LNAME,ACCTYPE,BOACCNO,GENDER,USERNAME,PASSWARD,DATEOFBIRTH,ADDRESS,PHONENO,EMAIL,ACCBALANCE,PURCHASELIMIT,MAXWITHDRAW,OCCUPATION,NATIONALITY)
		VALUES ('{$fname}','{$lname}','{$acctype}','{$bo}','{$gender}','{$username}','{$pass}','{$dob}','{$address}','{$phn}','{$email}','{$balance}','{$plimit}','{$maxwithdraw}','{$occ}','{$nationality}')";
	   $s = oci_parse($c,$sql );
	   oci_execute($s, OCI_DEFAULT);
	   
	   
	   
	   //Insert initial balance into deposit_order
	   $sql="SELECT * from client WHERE EMAIL='{$email}'";
	   $s = oci_parse($c,$sql );
	   oci_execute($s, OCI_DEFAULT);
	   
	   while (oci_fetch($s)) {
			$clientid=oci_result($s, "CLIENTID");
	   }
	   
	
		
		   $sql="begin
			proc_deposit_order_check(:bind1, :bind2,:bind3);
		end;";
	$s = oci_parse($c,$sql );
	oci_bind_by_name($s, ":bind1", $clientid);
	oci_bind_by_name($s, ":bind2", $balance);
	oci_bind_by_name($s, ":bind3", $out_var, 5); // 5 is the return length
  
	oci_execute($s, OCI_DEFAULT);
 
	   
	   
	   
	 //  echo "Request no ".$id."approved";
	 
	 

}

else if($_POST['reject'] == 'Reject') {
		
	 //  echo "Request no ".$id."rejected";
	 
	 
	 
}

//Delete from table
	   $sql="DELETE FROM temp_client WHERE CLIENTID='{$id}'";
		$s = oci_parse($c,$sql );
	   oci_execute($s, OCI_DEFAULT);
	   
	   // Commit to save changes...
   oci_commit($c);
 
   // Logoff from Oracle...
   oci_free_statement($s);
   oci_close($c);
	   
	   
	   
	   header("Location: admin new req.php");

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