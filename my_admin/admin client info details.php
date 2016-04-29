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
			   <li><div id = "now"><a href="admin client info.php">Client Info</a></div></li>
              <li><a href="admin buy order.php">Trading</a></li>
              <li><a href="admin deposit order.php">Transaction</a></li>
              <li><a href="admin loan.php">Loan</a></li>
         	 
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
$clientid=$_GET['clientid'];
//echo $clientid;

// Select Data...
	$sql="select * from client where CLIENTID='{$clientid}'";

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
		$balance=oci_result($s, "ACCBALANCE");
		$plimit=oci_result($s, "PURCHASELIMIT");
		$max=oci_result($s, "MAXWITHDRAW");
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
                
                
 <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label31" style="color: 
rgb(0, 51, 0); font-family: Arial Narrow; font-weight: bold; 
text-decoration: underline; z-index: 1; left: 0px; top: 690px; width: 
217px; height: 19px;">Balance  Details :</span>
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
none; z-index: 1; left: 0px; top: 720px; width: 217px; height: 19px;">Balnce :</span>
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
echo $balance;
?>
</span>
                        </font></font>
                    </td>
                </tr>
                
                <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label32" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 720px; width: 217px; height: 19px;">Purchase limit:</span>
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
echo $plimit;
?>
</span>
                        </font></font>
                    </td>
                </tr>
                
                <tr>
                    <td class="style8">
                        <font style="color: rgb(255, 255, 255); 
font-weight: bold;">
                        <span id="ctl00_MSPlace_Label32" style="color: 
Black; font-family: Arial Narrow; font-weight: normal; text-decoration: 
none; z-index: 1; left: 0px; top: 720px; width: 217px; height: 19px;">Maximum withdraw :</span>
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
echo $max;
?>
</span>
                        </font></font>
                    </td>
                </tr>
                
                
                               
            </tbody></table>
		
		
		
		
		
		
		<?php
/**************************
***********************************/
?>	
				
<br/>
<br/>
<h3>Current Stock Statement :</h3>

<?php
/**************************
***********************************/
?>	
	

<?php


	$sql="select shareid from owns where CLIENTID='{$clientid}' ";
    $s = oci_parse($c,$sql );
    oci_execute($s, OCI_DEFAULT);
   
  
 ?>
 
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
		
		$sql="select sum(quantity) as TOT from owns where CLIENTID='{$clientid}' and SHAREID='{$shareid}' ";
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
		
		
		
<?php
/**************************
***********************************/
?>


<br/>
<br/>
<br/>
<h3>Loan Statement:</h3>

<?php
/**************************
***********************************/
?>
<?php

$id= $_SESSION['id'];

// Select Data...
	$sql="select * from loan where CLIENTID='{$id}'";

   $s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   

$i=0;
	while (oci_fetch($s)) {
	
		$odate=oci_result($s, "LOANDATE");
		$loanid=oci_result($s, "LOANID");
		$amount=oci_result($s, "AMOUNT");
		$i++;
	}
	
	if ($i==0){
		echo "You have no loan to pay.";
	}
	else{
		// Select Data...
		$sql="select add_months(to_date('$odate', 'dd-MM-yyyy'),6) as LDATE from dual";
		$s = oci_parse($c,$sql );
	   oci_execute($s, OCI_DEFAULT);
	   while (oci_fetch($s)) {
			$ldate=oci_result($s, "LDATE");
	   }
	   
	  
	   echo "Amount Of Loan :  ".$amount."<br />";
	   echo "Last Date of payment : ".$ldate."<br />";
   
   }
 //  echo $id." ".$fname." ".$lname." ".$gender." ".$address." ".$dob." ".$phn." ".$email." ".$nationality." ".$occ." ".$bo." ".$username." ";
 //  echo $occ;
   
   
  ?>


<?php
/**************************
***********************************/
?>

<br/>
<br/>		
<br/>
<br/>
<br/>
<br/>
<h2>Trading and Transaction History :</h2>



<?php
/**************************
***********************************/
?>
<br/>
<br/>
<h3>Placed Buy Order :</h3>	

<?php
/**************************
***********************************/
?>


<?php
	
  // echo $ldate;

	// Select Data...
	$sql="select * from buy_order where CLIENTID='{$clientid}' ";
    $s = oci_parse($c,$sql );
    oci_execute($s, OCI_DEFAULT);
	
?>


		 <table id="ctl00_MSPlace_GVr" style="color: Black; background-color: 
White; border: 2px none rgb(153, 153, 153); font-size: small; 
font-weight: normal; border-collapse: collapse; z-index: 1; left: 0px; 
top: 0px; height: 147px; width: 612px;" border="2" cellpadding="3" 
cellspacing="0" rules="all">
		<tbody><tr style="color: White; background-color: Black; border-style:
 ridge; font-weight: bold;" valign="middle" align="center">
			<th scope="col">Order Date</th>
			
			<th scope="col">Share id</th>
			<th scope="col">Share Name</th>
			<th scope="col">Quantity</th>
			<th scope="col">Rate</th>
			
		</tr>
 
<?php   

while (oci_fetch($s)) {
	
		$odate=oci_result($s, "ORDERDATE");
		$shareid=oci_result($s, "SHAREID");
		$sharename=oci_result($s, "SHARENAME");
		$quantity=oci_result($s, "QUANTITY");
		$rate=oci_result($s, "RATE");
		
	
//	echo	$odate." ".$orderid." ".$shareid." ".$sharename." ".$quantity." ".$rate;	
      echo '<tr style="border: 1px solid Black;">';
		echo	'<td>';
		echo	$odate;
		echo '</td>';
		
		echo '<td>';
		echo $shareid;
		echo '</td>';
		echo '<td>';
		echo $sharename;
		echo '</td>';
		echo '<td>';
		echo $quantity;
		echo '</td>';
		echo '<td >';
		echo $rate;
		echo '</td>';
		
		echo '</tr>';
		}
		
?>
        
        <tr style="background-color: rgb(204, 204, 204);">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			
		</tr>
	</tbody></table>

<?php
/**************************
***********************************/
?>	




<?php
/**************************
***********************************/
?>
<br/>
<br/>
<h3>Placed Sell Order :</h3>	

<?php
/**************************
***********************************/
?>


<?php
	
  // echo $ldate;

	// Select Data...
	$sql="select * from sell_order where CLIENTID='{$clientid}' ";
    $s = oci_parse($c,$sql );
    oci_execute($s, OCI_DEFAULT);
	
?>


		 <table id="ctl00_MSPlace_GVr" style="color: Black; background-color: 
White; border: 2px none rgb(153, 153, 153); font-size: small; 
font-weight: normal; border-collapse: collapse; z-index: 1; left: 0px; 
top: 0px; height: 147px; width: 612px;" border="2" cellpadding="3" 
cellspacing="0" rules="all">
		<tbody><tr style="color: White; background-color: Black; border-style:
 ridge; font-weight: bold;" valign="middle" align="center">
			<th scope="col">Order Date</th>
			
			<th scope="col">Share id</th>
			<th scope="col">Share Name</th>
			<th scope="col">Quantity</th>
			<th scope="col">Rate</th>
			
		</tr>
 
<?php   

while (oci_fetch($s)) {
	
		$odate=oci_result($s, "ORDERDATE");
		$shareid=oci_result($s, "SHAREID");
		$sharename=oci_result($s, "SHARENAME");
		$quantity=oci_result($s, "QUANTITY");
		$rate=oci_result($s, "RATE");
		
	
//	echo	$odate." ".$orderid." ".$shareid." ".$sharename." ".$quantity." ".$rate;	
      echo '<tr style="border: 1px solid Black;">';
		echo	'<td>';
		echo	$odate;
		echo '</td>';
		
		echo '<td>';
		echo $shareid;
		echo '</td>';
		echo '<td>';
		echo $sharename;
		echo '</td>';
		echo '<td>';
		echo $quantity;
		echo '</td>';
		echo '<td >';
		echo $rate;
		echo '</td>';
		
		echo '</tr>';
		}
		
?>
        
        <tr style="background-color: rgb(204, 204, 204);">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			
		</tr>
	</tbody></table>

<?php
/**************************
***********************************/
?>	








<?php
/**************************
***********************************/
?>
<br/>
<br/>
<h3>Share Buying History :</h3>	

<?php
/**************************
***********************************/
?>


<?php
	
  // echo $ldate;

	// Select Data...
	$sql="select * from buying_history where CLIENTID='{$clientid}' ";
    $s = oci_parse($c,$sql );
    oci_execute($s, OCI_DEFAULT);
	
?>


		 <table id="ctl00_MSPlace_GVr" style="color: Black; background-color: 
White; border: 2px none rgb(153, 153, 153); font-size: small; 
font-weight: normal; border-collapse: collapse; z-index: 1; left: 0px; 
top: 0px; height: 147px; width: 612px;" border="2" cellpadding="3" 
cellspacing="0" rules="all">
		<tbody><tr style="color: White; background-color: Black; border-style:
 ridge; font-weight: bold;" valign="middle" align="center">
			<th scope="col">Date</th>
			<th scope="col">Share id</th>
			<th scope="col">Share Name</th>
			<th scope="col">Quantity</th>
			<th scope="col">Rate</th>
			<th scope="col">Total Amount</th>
			
		</tr>
 
<?php   

while (oci_fetch($s)) {
	
		$odate=oci_result($s, "TRADINGDATE");
		$shareid=oci_result($s, "SHAREID");
		$sharename=oci_result($s, "SHARENAME");
		$quantity=oci_result($s, "QUANTITY");
		$rate=oci_result($s, "RATE");
		$total=oci_result($s, "TOTALAMOUNT");
	
//	echo	$odate." ".$orderid." ".$shareid." ".$sharename." ".$quantity." ".$rate;	
      echo '<tr style="border: 1px solid Black;">';
		echo	'<td>';
		echo	$odate;
		echo '</td>';
		
		echo '<td>';
		echo $shareid;
		echo '</td>';
		echo '<td>';
		echo $sharename;
		echo '</td>';
		echo '<td>';
		echo $quantity;
		echo '</td>';
		echo '<td >';
		echo $rate;
		echo '</td>';
		echo '<td >';
		echo $total;
		echo '</td>';
		echo '</tr>';
		}
		
?>
        
        <tr style="background-color: rgb(204, 204, 204);">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tbody></table>

<?php
/**************************
***********************************/
?>	

<br/>
<br/>
<h3>Share Selling History :</h3>	
<?php
/**************************
***********************************/
?>


<?php
	
   
  // echo $ldate;

	// Select Data...
	$sql="select * from selling_history where CLIENTID='{$clientid}' ";
    $s = oci_parse($c,$sql );
    oci_execute($s, OCI_DEFAULT);
	
?>


		 <table id="ctl00_MSPlace_GVr" style="color: Black; background-color: 
White; border: 2px none rgb(153, 153, 153); font-size: small; 
font-weight: normal; border-collapse: collapse; z-index: 1; left: 0px; 
top: 0px; height: 147px; width: 612px;" border="2" cellpadding="3" 
cellspacing="0" rules="all">
		<tbody><tr style="color: White; background-color: Black; border-style:
 ridge; font-weight: bold;" valign="middle" align="center">
			<th scope="col">Date</th>
			<th scope="col">Share id</th>
			<th scope="col">Share Name</th>
			<th scope="col">Quantity</th>
			<th scope="col">Rate</th>
			<th scope="col">Total Amount</th>
			
		</tr>
 
<?php   

while (oci_fetch($s)) {
	
		$odate=oci_result($s, "TRADINGDATE");
		$shareid=oci_result($s, "SHAREID");
		$sharename=oci_result($s, "SHARENAME");
		$quantity=oci_result($s, "QUANTITY");
		$rate=oci_result($s, "RATE");
		$total=oci_result($s, "TOTALAMOUNT");
	
//	echo	$odate." ".$orderid." ".$shareid." ".$sharename." ".$quantity." ".$rate;	
      echo '<tr style="border: 1px solid Black;">';
		echo	'<td>';
		echo	$odate;
		echo '</td>';
		
		echo '<td>';
		echo $shareid;
		echo '</td>';
		echo '<td>';
		echo $sharename;
		echo '</td>';
		echo '<td>';
		echo $quantity;
		echo '</td>';
		echo '<td >';
		echo $rate;
		echo '</td>';
		echo '<td >';
		echo $total;
		echo '</td>';
		echo '</tr>';
		}
		
?>
        
        <tr style="background-color: rgb(204, 204, 204);">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tbody></table>

<?php
/**************************
***********************************/
?>	



<br/>
<br/>
<h3>Money Deposit History :</h3>

<?php
/**************************
***********************************/
?>	

<?php



// Select Data...
	$sql="select * from deposit_order where CLIENTID='{$clientid}'";
   $s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   
 ?>
   



		 <table id="ctl00_MSPlace_GVr" style="color: Black; background-color: 
White; border: 2px none rgb(153, 153, 153); font-size: small; 
font-weight: normal; border-collapse: collapse; z-index: 1; left: 0px; 
top: 0px; height: 147px; width: 612px;" border="2" cellpadding="3" 
cellspacing="0" rules="all">
		<tbody><tr style="color: White; background-color: Black; border-style:
 ridge; font-weight: bold;" valign="middle" align="center">
			<th scope="col">Transaction Date</th>
			<th scope="col">Transaction No.</th><th scope="col">Amount</th>
		</tr>
 
<?php   

while (oci_fetch($s)) {
		
		$odate=oci_result($s, "ORDERDATE");
		$orderid=oci_result($s, "ORDERID");
		$amount=oci_result($s, "AMOUNT");
		
		echo '<tr style="border: 1px solid Black;">';
		echo	'<td>';
		echo	$odate;
		echo '</td>';
		echo '<td>';
		echo $orderid;
		echo '</td>';
		echo '<td align="right">';
		echo $amount;
		echo '</td>';
		echo '</tr>';
		}
?>
        
        <tr style="background-color: rgb(204, 204, 204);">
			<td>&nbsp;</td><td align="left">Total</td><td
 align="right">
 
 <?php

// Select Data...
	$sql="select sum(amount) as TOT from deposit_order where CLIENTID='{$clientid}' ";
	$s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   
   while (oci_fetch($s)) {
		$total=oci_result($s, "TOT");
   }
   echo $total;
   
 ?>


 </td>
		</tr>
	</tbody></table>
	




<?php
/**************************
***********************************/
?>	


<br/>
<br/>
<h3>Money Withdraw History :</h3>

<?php
/**************************
***********************************/
?>	
	
<?php



// Select Data...
	$sql="select * from withdraw_order where CLIENTID='{$clientid}'";
   $s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   
 ?>
   



		 <table id="ctl00_MSPlace_GVr" style="color: Black; background-color: 
White; border: 2px none rgb(153, 153, 153); font-size: small; 
font-weight: normal; border-collapse: collapse; z-index: 1; left: 0px; 
top: 0px; height: 147px; width: 612px;" border="2" cellpadding="3" 
cellspacing="0" rules="all">
		<tbody><tr style="color: White; background-color: Black; border-style:
 ridge; font-weight: bold;" valign="middle" align="center">
			<th scope="col">Transaction Date</th>
			<th scope="col">Transaction No.</th><th scope="col">Amount</th>
		</tr>
 
<?php   

while (oci_fetch($s)) {
		
		$odate=oci_result($s, "ORDERDATE");
		$orderid=oci_result($s, "ORDERID");
		$amount=oci_result($s, "AMOUNT");
		
		echo '<tr style="border: 1px solid Black;">';
		echo	'<td>';
		echo	$odate;
		echo '</td>';
		echo '<td>';
		echo $orderid;
		echo '</td>';
		echo '<td align="right">';
		echo $amount;
		echo '</td>';
		echo '</tr>';
		}
?>
        
        <tr style="background-color: rgb(204, 204, 204);">
			<td>&nbsp;</td><td align="left">Total</td><td
 align="right">
 
 <?php

// Select Data...
	$sql="select sum(amount) as TOT from withdraw_order where CLIENTID='{$clientid}' ";
	$s = oci_parse($c,$sql );
   oci_execute($s, OCI_DEFAULT);
   
   while (oci_fetch($s)) {
		$total=oci_result($s, "TOT");
   }
   echo $total;
   
 ?>


 </td>
		</tr>
	</tbody></table>
	
	
   
  <?php
/**************************
***********************************/
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