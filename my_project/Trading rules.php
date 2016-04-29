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
              <li><a href="Mis.php">Miscellaneous</a></li>
           
         	  <li><div id = "now"><a href="help.php">Help</a></div></li>
              <li><a href="logout.php">Log out</a></li>
			</ul>
		</div>

	</div>
	<!-- end #header2 -->
</div>
<!-- end #bg2 -->

<div id = "sidebar">
        	<ul>
            <li><a href="Investment tips.php">Investment tips</a></li>
            <li><a href="Trading rules.php">Trading rules </a></li>
      
           <li><a href="http://www.dsebd.org">DSE</a></li>
            <li><a href="http://www.cse.com.bd/">CSE</a></li>
            
            <li><a href="http://www.londonstockexchange.com/home/homepage.htm">London Stock Exchange</a></li>
            <li><a href="http://www.bseindia.com/">Bombay Stock Exchange</a></li>
             <li><a href="http://www.sharemarketbasics.com/">Sharemarket Basics</a></li>
              <li><a href="http://www.jpmorgan.com/pages/jpmorgan">J.P Morgan </a></li>
                        </ul>
        </div>

<div id="container">

<h2>&nbsp;</h2>
 <p>
<b> Trading Session : </b>11:00 AM - 3:00 PM <br /><br />

<b>Settlement/Scrip Maturity :</b> After Purchase - 3rd working day for Category A,B,G,N and 9th working day for Category Z.<br /><br />

<b>A-category companies :</b> Companies, which are regular in holding the current annual general meetings and have declared dividend at the rate of ten percent or more in the last English calendar year.<br />
<b>B-category companies :</b> Companies, which are regular in holding the annual general meetings but have declare dividend below ten percent in the last English calendar year.<br />
<b>N-category companies :</b> All newly listed companies except Greenfield companies shall be placed under N-category companies for which the settlement procedure followed for B- category companies shall be applicable.<br />
<b>G- category companies (i.e. greenfield companies) :</b> Newly listed shares of those companies, which do not fall under any of the Categories mentioned above or below , shall be placed under G - category companies for which the settlement procedure followed for B- category companies shall be applicable.<br />
<b>Z- category companies :</b> Companies, which failed to hold the current annual general meetings or have failed to declare any dividend or have declared dividend but failed to pay it off within 60 days.<br />
 </p>
  <p>&nbsp;</p>

</div>

</div>

	
    
</div>

</body>
</html>