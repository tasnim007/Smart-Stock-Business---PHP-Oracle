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
               <li><div id = "now"><a href="loan.php">Loan</a></div></li>
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
        	<ul>
            
            <li><a href="loan.php">Loan</a></li>
            
           
            <li><a href="loan statement.php">Loan Statement</a></li>
            
            <li><a href="loan payment.php">Loan Payment</a></li>
                        </ul>
        </div>
<div id="container">

<h2>Loan</h2>

		<form name="reqform" id="form2" action="confirm_loan.php" method="post">	
		
<fieldset>
		
			
            <p>
					<span id="ctl00_MSPlace_Label21" style="color: White; 
font-family: Arial; font-size: small; font-weight: normal; 
text-decoration: none; z-index: 1; left: 315px; top: -1px; width: 70px; 
height: 20px;">  Date: </span>
<?php
$dt= date("d/m/Y") ;
?>
<input type="text" name="date" id="date" value="<?php print $dt; ?>" size="30" style="top: 24px; left: 315px; width: 100px;" />
				</p>
            
               
           
    
          
              
           <p>
  
              
               <span id="ctl00_MSPlace_Label20" style="color: White; 
font-family: Arial; font-size: small; font-weight: normal; 
text-decoration: none; z-index: 1; left: 233px; top: -2px; width: 74px; 
height: 21px;">	Amount (Tk.): </span>
              
               <input name="amount" 
id="amount" style="font-size: small; z-index: 1; top: 
24px; width: 70px; left: 233px; text-align: left;" type="text">
         
           </p>   
    
            <p class="submit"><button type="submit">Submit</button>       

       
             
                       
       			</fieldset>
						
		</form>	
</div>

<!-- end #bg3 -->

<!-- end #footer -->
</body>
</html>