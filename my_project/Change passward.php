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
        	
        </div>
<div id="container">

<h2>Form for changing passward</h2>
<form name="changepassward" id="form2" action="confirmchangepassward.php" method="post">	
		
			<h3><span>Change password :</span></h3>

		
			<fieldset><legend>Contact form</legend>
				<p class="first">
					<label for="Old">Old password :</label>
					<input type="password" name="old" id="old" size="25" />
				</p>
				<p>
					<label for="New">New password : </label>

					<input type="password" name="new" id="new" size="25" />
				</p>
				<p>
					<label for="con">Confirm password :</label>
					<input type="password" name="con" id="con" size="25" />
				</p>																					
				<p>&nbsp;</p>					
				
				<p class="submit"><button type="submit">Send</button></p>		
							
			</fieldset>					
						
		</form>	
</div>

<!-- end #bg3 -->
<div id="footer">

	<p>Database project@2011</p>
</div>
<!-- end #footer -->
</body>
</html>