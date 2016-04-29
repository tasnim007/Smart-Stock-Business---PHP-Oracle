<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Smart stock business</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style1.css" rel="stylesheet" type="text/css" />

<script language="javascript">
<!--
function check() {
if (document.regform.fname.value=="" ||document.regform.lname.value==""||document.regform.gen.value==""
||document.regform.ad.value==""||document.regform.dob.value==""||document.regform.phn.value==""
||document.regform.mail.value==""||document.regform.bo.value==""||document.regform.balance.value==""
||document.regform.uname.value==""||document.regform.pass.value=="") {
alert("You did not fill up all the fields of the form.");
<?php
setcookie('formvalid',0,time()+(60*60));
?>


}
 else {
<?php
setcookie('formvalid',1,time()+(60*60));
?>
}
}
-->
</script>

</head>
<body>
<div id="bg1">
	<div id="header">
		 <h1>Smart stock business	</h1>
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

<h2>Form for registration</h2>

		<form name="admin regform" id="form2" action="admin confirmreg.php"  method="POST">	
		
			<h3><span>Enter the required information :</span></h3>

		
			<fieldset><legend>Fill up the form below :</legend>
			  <p>
					<label for="name">First Name </label>
					<input type="text" name="fname" id="fname" size="50" />
					
                    <label for="name">Last Name</label>
					<input type="text" name="lname" id="lname" size="50" />
			  </p>
               <p>
					<label for="gen">Gender</label>
					<input type="text" name="gen" id="gen" size="50" />
				</p>
                
                  <p>
				  <label for="ad">Address</label>
				  <input type="text" name="ad" id="ad" size="50" />
				</p>
                
				<p>
					<label for="B_date">Date of birth (DD-MON-YYYY i.e. 12-NOV-2011)</label>

					<input type="text" name="dob" id="dob" size="50" />
				</p>
                
                 <p>
				  <label for="tel">Phone no</label>
				  <input type="text" name="phn" id="phn" size="50" />
				</p>
                
                  <p>
				  <label for="mail">Email</label>
				  <input type="text" name="mail" id="mail" size="50" />
				</p>
                
                 
                
 <br />
 <br />               
				
              
 <br />
 <br />                  
              
                <p>
				  <label for="Uname">Username</label>
				  <input type="text" name="uname" id="uname" size="50" />
				</p>
                <p>
				  <label for="pass">Password </label>
					<input type="password" name="pass" id="pass" size="50" />
				</p>
             
             
  <br />
 <br />            
					
			<p class="submit">	
			<input type="submit" />
			
             </p>
							
			</fieldset>					
					
		</form>	
</div>

<!-- end #bg3 -->
<div id="footer">
Database project@2011
</div>
<!-- end #footer -->
</body>
</html>