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
  <h1>7 Tips for Investor Who Are In The Stock Market For The First Time </h1>
  <p>1. Start Small <br />
    2. Essential Funds Should Not Be Used <br />
    3. Don't Let Emotions Rule <br />
    4. Research Before Putting In The Money <br />
    5. Be Realistic <br />
    6. Seek Help From Expert <br />
    7. Embrace and Learn From Failures</p>
  <br />
  <h2>Warren Buffet, the second richest man - His Interesting Apects Of Life.</h2>
  <p>
1. He bought his first share at age 11 and he now regrets that he started too late! <br />
2. He bought a small farm at age 14 with savings from delivering newspapers. <br />
3. He still lives in the same small 3-bedroom house in mid-town Omaha , that he bought after he
got married 50 years ago. He says that he has everything he needs in that house. His house does
not have a wall or a fence. <br />
4. He drives his own car everywhere and does not have a driver or security people around him. <br />
5. He never travels by private jet, although he owns the world's largest private jet company. <br />
6. His company, Berkshire Hathaway, owns 63 companies. He writes only one letter each year to
the CEOs of these companies, giving them goals for the year. He never holds meetings or calls
them on a regular basis. He has given his CEO's only two rules. Rule number 1: do not lose
anyof your share holder's money. Rule number 2: Do not forget rule number 1. <br />
7. He does not socialize with the high society crowd. His past timeafter he gets home is to make
himself some pop corn and watch Television. <br />
8. Bill Gates, the world's richest man met him for the first time only 5 years ago. Bill Gates did not
think he had anything in common with Warren Buffet. So he had scheduled his meeting only for
half hour. But when Gates met him, the meeting lasted for ten hours and Bill Gates became a
devotee of Warren Buffet. <br />
9. Warren Buffet does not carry a cell phone, nor has a computer on his desk. <br /> <br />

<b>His advice to young people: "Stay away from credit cards and invest in yourself and Remember:</b>

A. Money doesn't create man but it is the man who created money. <br />
B. Live your life as simple as you are. <br />
C. Don't do what others say, just listen them, but do what you feel good. <br />
D. Don't go on brand name; just wear those things in which u feel comfortable. <br />
E. Don't waste your money on unnecessary things; just spend on them who really in need rather. <br />
F. After all it's your life then why give chance to others to rule our life." <br />
</p>
  <p>&nbsp;</p>

</div>

</div>

	
    
</div>

</body>
</html>