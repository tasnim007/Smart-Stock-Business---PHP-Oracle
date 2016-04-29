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
			  <li><a href="My state.php">My Statements</a></li>
			   <li><a href="money requisition.php">Money Reqisition</a></li>
              <li><div id = "now"><a href="Mis.php">Miscellaneous</a></div></li>
              <li><a href="E-trading.php">E-Trading</a></li>
              <li><a href="Market info.php">Market information</a></li>
         	  <li><a href="help.php">Help</a></li>
              <li><a href="login.php">Log out</a></li>
			</ul>
		</div>

	</div>
	<!-- end #header2 -->
</div>
<!-- end #bg2 -->

<div id = "sidebar">
        	<ul>
            
             <li><a href="money requisition.php">Money requisition</a></li>
             
            <li><a href="Change password.php">Change  password</a></li>
            <li><a href="Last 10 login.php">Last 10 login</a></li>
            
             <li><a href="My favourite scrip.php">My favourite scrip</a></li>
           
            
             </ul>
 </div>
            
        
<div id="container">

<h2>Last 10 login :</h2>				
<table 
id="ctl00_MSPlace_GVr" style="color: Black; background-color: White; 
border: 2px none rgb(153, 153, 153); font-size: small; font-weight: 
normal; border-collapse: collapse; z-index: 1; left: 0px; top: 0px; 
height: 147px; width: 229px;" border="2" cellpadding="3" cellspacing="0"
 rules="all">
			<tr style="color: White; background-color: Black; 
border-style: ridge; font-weight: bold;" valign="middle" align="center">
				<th scope="col">Login Date &amp; Time</th>
			</tr><tr style="border: 1px solid Black;">
				<td>12/14/2011 4:24:00 PM</td>
			</tr><tr style="background-color: White; border: 1px solid Black;">
				<td>12/14/2011 4:20:00 PM</td>
			</tr><tr style="border: 1px solid Black;">
				<td>12/14/2011 4:13:00 PM</td>
			</tr><tr style="background-color: White; border: 1px solid Black;">
				<td>12/14/2011 3:43:00 AM</td>
			</tr><tr style="border: 1px solid Black;">
				<td>12/12/2011 7:44:00 AM</td>
			</tr><tr style="background-color: White; border: 1px solid Black;">
				<td>12/11/2011 3:14:00 PM</td>
			</tr><tr style="border: 1px solid Black;">
				<td>12/9/2011 12:49:00 AM</td>
			</tr><tr style="background-color: White; border: 1px solid Black;">
				<td>12/7/2011 11:42:00 AM</td>
			</tr><tr style="border: 1px solid Black;">
				<td>12/7/2011 4:22:00 AM</td>
			</tr><tr style="background-color: White; border: 1px solid Black;">
				<td>12/7/2011 3:26:00 AM</td>
			</tr>
		</table>
	
          
    <font style="color: rgb(255, 255, 255); font-weight: bold;">
                <span id="ctl00_MSPlace_Label12" style="color: Black; 
font-family: Arial Narrow;">If You Find any Confusing Log-In, Please 
Change Your Password Immediately to Avoid any Un-authorize Access.</span>
              
    
</font></div>


<!-- end #bg3 -->

<!-- end #footer -->
</body>
</html>