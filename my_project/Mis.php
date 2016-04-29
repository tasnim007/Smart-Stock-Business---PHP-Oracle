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
			 <li><a href="personal info.php">My Statements</a></li>
             <li><a href="E-trading.php">E-Trading</a></li>
			   <li><a href="money requisition.php">Money Reqisition</a></li>
               <li><a href="loan.php">Loan</a></li>
              <li><div id = "now"><a href="Mis.php">Miscellaneous</a></div></li>
           
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
            <li><a href="Mis.php">Last Price Of Shares</a></li>
            
            
           
             </ul>
        </div>




<div id="container">
<?php
   include("connect.php"); 
?> 


   

<h2>Last Price Of Shares:</h2>

		 <table id="ctl00_MSPlace_GVr" style="color: Black; background-color: 
White; border: 2px none rgb(153, 153, 153); font-size: small; 
font-weight: normal; border-collapse: collapse; z-index: 1; left: 0px; 
top: 0px; height: 147px; width: 612px;" border="2" cellpadding="3" 
cellspacing="0" rules="all">
	  <tbody><tr style="color: White; background-color: Black; border-style:
 ridge; font-weight: bold;" valign="middle" align="center">
			<th scope="col">Share Name</th>
			<th scope="col">Latest</th>
			<th scope="col">High</th>
			<th scope="col">Low</th>
			<th scope="col">YCP</th>
			<th scope="col">Change</th>
			<th scope="col">Trade</th>
			
			<th scope="col">Volume</th>
			
		</tr>
		
		
<?php
	$excel_app = new COM("Excel.application") or Die ("Did not connect");
	$Workbook = $excel_app->Workbooks->Open('C:\xampp\htdocs\xampp\book.xlsx') or Die('Did not open filename');
	$Worksheet = $Workbook->Worksheets(1);
	$Worksheet->activate;
	//C:\xampp\phpmyadmin\Book1.xlsx'
	$n = "\n";
	$i = 3;
	while($i != 264)  
	{  
		$sharename= $Worksheet->Cells->Item($i,1);
	  $latest= $Worksheet->Cells->Item($i,2);
	  $high= $Worksheet->Cells->Item($i,3);
	  $low=$Worksheet->Cells->Item($i,4);
	  $ycp= $Worksheet->Cells->Item($i,5);
	  $change= $Worksheet->Cells->Item($i,6);
	  $trade= $Worksheet->Cells->Item($i,7);
	   $volume= $Worksheet->Cells->Item($i,8);

		 echo '<tr style="border: 1px solid Black;">';
		echo	'<td>';
		echo	$sharename;
		echo '</td>';
		echo '<td>';
		echo $latest;
		echo '</td>';
		echo '<td>';
		echo $high;
		echo '</td>';
		echo '<td>';
		echo $low;
		echo '</td>';
		echo '<td>';
		echo $ycp;
		echo '</td>';
		echo '<td>';
		echo $change;
		echo '</td>';
		echo '<td >';
		echo $trade;
		echo '</td>';
		echo '<td >';
		echo $volume;
		echo '</td>';
		echo '</tr>';
		
		
		$i++;  
	}
?>		
		
		
 

        
        <tr style="background-color: rgb(204, 204, 204);">
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tbody></table>
		</div>


</div>

<!-- end #bg3 -->
<div id="footer">

	<p>(c) 2008 Sitename.com. Design by <a href="http://www.nodethirtythree.com/">nodeThirtyThree</a> + <a href="http://www.freewpthemes.net/">Free CSS Templates</a></p>
</div>
<!-- end #footer -->
</body>
</html>