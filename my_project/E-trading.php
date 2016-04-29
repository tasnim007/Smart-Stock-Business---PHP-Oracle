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
             <li><div id = "now"><a href="E-trading.php">E-Trading</a></div></li>
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
        	<ul>
            <li><a href="E-trading.php">E-Trading</a></li>
            <li><a href="buy order.php">Buy Order</a></li>
            <li><a href="sell order.php">Sell Order</a></li>
            <li><a href="buying history.php">Buying History</a></li>
            <li><a href="selling history.php">Selling History</a></li>
            <li><a href="placed buy order.php">Placed Buy Order</a></li>
             <li><a href="placed sell order.php">Placed Sell Order</a></li>
            
           
             </ul>
        </div>




<div id="container">

<h2>Online Order Place</h2>

		<form  name="tradingform" id="form2" action="confirm_etrading.php"  method="post">	
		
<fieldset>
 
          
           
            <p>
					<span id="ctl00_MSPlace_Label21" style="color: White; 
font-family: Arial; font-size: small; font-weight: normal; 
text-decoration: none; z-index: 1; left: 315px; top: -1px; width: 70px; 
height: 20px;">Order Date: </span>
<?php
$dt= date("d/m/Y") ;
?>
<input type="text" name="date" id="date" value="<?php print $dt; ?>" size="30" style="top: 24px; left: 315px; width: 100px;" />

		 </p>
            
               
           <p>
  
              
               <span id="ctl00_MSPlace_Label15" style="color: White; 
font-family: Arial; font-size: small; font-weight: normal; 
text-decoration: none; z-index: 1; left: 0px; top: -1px; width: 64px; 
height: 21px;">Scrip: </span>

                
               <select name="scrip" 
id="scrip" style="width: 130px; left: 0px; top: 
25px;">
		<option selected="selected" value="-Select-">-Select-</option>
		<option value="21027">1JANATAMF</option>
		<option value="21009">1STBSRS</option>
		<option value="21001">1STICB</option>
		<option value="21017">1STPRIMFMF</option>
		<option value="21002">2NDICB</option>
		<option value="21003">3RDICB</option>
		<option value="21004">4THICB</option>
		<option value="21005">5THICB</option>
		<option value="21006">6THICB</option>
		<option value="21007">7THICB</option>
		<option value="21008">8THICB</option>
		<option value="22002">ABBANK</option>
		<option value="13003">ACI</option>
		<option value="13021">ACIFORMULA</option>
		<option value="40002">ACIZCBOND</option>
		<option value="13024">ACTIVEFINE</option>
		<option value="16004">AFTABAUTO</option>
		<option value="24006">AGNISYSL</option>
		<option value="21032">AIBL1STIMF</option>
		<option value="21010">AIMS1STMF</option>
		<option value="22012">ALARABANK</option>
		<option value="12017">ALLTEX</option>
		<option value="32010">ALPHATOBA</option>
		<option value="13007">AMBEEPHA</option>
		<option value="14005">AMCL(PRAN)</option>
		<option value="12025">ANLIMAYARN</option>
		<option value="16003">ANWARGALV</option>
		<option value="17002">APEXADELFT</option>
		<option value="14001">APEXFOODS</option>
		<option value="12004">APEXSPINN</option>
		<option value="17001">APEXTANRY</option>
		<option value="12003">APEXWEAV</option>
		<option value="32002">ARAMIT</option>
		<option value="15005">ARAMITCEM</option>
		<option value="11035">ASIAINS</option>
		<option value="11022">ASIAPACINS</option>
		<option value="16001">AZIZPIPES</option>
		<option value="14018">BANGAS</option>
		<option value="22022">BANKASIA</option>
		<option value="17009">BATASHOE</option>
		<option value="32009">BATBC</option>
		<option value="25020">BAYLEASING</option>
		<option value="24004">BDCOM</option>
		<option value="25014">BDFINANCE</option>
		<option value="16013">BDLAMPS</option>
		<option value="24002">BDONLINE</option>
		<option value="16009">BDTHAI</option>
		<option value="16017">BDWELDING</option>
		<option value="14021">BEACHHATCH</option>
		<option value="13023">BEACONPHAR</option>
		<option value="20011">BEDL</option>
		<option value="13020">BERGERPBL</option>
		<option value="32003">BEXIMCO</option>
		<option value="12011">BEXTEX</option>
		<option value="11010">BGIC</option>
		<option value="25011">BIFC</option>
		<option value="20003">BOC</option>
		<option value="22029">BRACBANK</option>
		<option value="40003">BRACSCBOND</option>
		<option value="32004">BSC</option>
		<option value="16022">BSRMSTEEL</option>
		<option value="13005">BXPHARMA</option>
		<option value="12008">BXSYNTH</option>
		<option value="11006">CENTRALINS</option>
		<option value="22006">CITYBANK</option>
		<option value="11028">CITYGENINS</option>
		<option value="15001">CONFIDCEM</option>
		<option value="11029">CONTININS</option>
		<option value="14006">CTGVEG</option>
		<option value="12037">DACCADYE</option>
		<option value="24007">DAFODILCOM</option>
		<option value="25018">DBH</option>
		<option value="21023">DBH1STMF</option>
		<option value="10001">DELTALIFE</option>
		<option value="12023">DELTASPINN</option>
		<option value="20005">DESCO</option>
		<option value="32018">DESHBANDHU</option>
		<option value="22014">DHAKABANK</option>
		<option value="11038">DHAKAINS</option>
		<option value="22017">DUTCHBANGL</option>
		<option value="11014">EASTERNINS</option>
		<option value="11015">EASTLAND</option>
		<option value="22025">EBL</option>
		<option value="21018">EBL1STMF</option>
		<option value="21035">EBLNRBMF</option>
		<option value="16015">ECABLES</option>
		<option value="18002">EHL</option>
		<option value="22026">EXIMBANK</option>
		<option value="10005">FAREASTLIF</option>
		<option value="25017">FASFIN</option>
		<option value="11007">FEDERALINS</option>
		<option value="32014">FHDIL</option>
		<option value="14022">FINEFOODS</option>
		<option value="22033">FIRSTSBANK</option>
		<option value="25004">FLEASEINT</option>
		<option value="23004">FUWANGCER</option>
		<option value="14017">FUWANGFOOD</option>
		<option value="16021">GOLDENSON</option>
		<option value="26001">GP</option>
		<option value="32006">GQBALLPEN</option>
		<option value="21013">GRAMEEN1</option>
		<option value="21016">GRAMEENS2</option>
		<option value="21028">GREENDELMF</option>
		<option value="11003">GREENDELT</option>
		<option value="19009">HAKKANIPUL</option>
		<option value="15002">HEIDELBCEM</option>
		<option value="12024">HRTEX</option>
		<option value="40001">IBBLPBOND</option>
		<option value="13013">IBNSINA</option>
		<option value="25001">ICB</option>
		<option value="21014">ICB1STNRB</option>
		<option value="21015">ICB2NDNRB</option>
		<option value="21026">ICB3RDNRB</option>
		<option value="21011">ICBAMCL1ST</option>
		<option value="21019">ICBAMCL2ND</option>
		<option value="21020">ICBEPMF1S1</option>
		<option value="21012">ICBISLAMIC</option>
		<option value="25002">IDLC</option>
		<option value="22010">IFIC</option>
		<option value="21024">IFIC1STMF</option>
		<option value="21030">IFILISLMF1</option>
		<option value="25015">ILFSL</option>
		<option value="32007">IMAMBUTTON</option>
		<option value="24005">INTECH</option>
		<option value="25012">IPDC</option>
		<option value="22008">ISLAMIBANK</option>
		<option value="25009">ISLAMICFIN</option>
		<option value="11036">ISLAMIINS</option>
		<option value="24003">ISNLTD</option>
		<option value="22028">JAMUNABANK</option>
		<option value="20007">JAMUNAOIL</option>
		<option value="11005">JANATAINS</option>
		<option value="16014">KAY&amp;QUE</option>
		<option value="13017">KEYACOSMET</option>
		<option value="13019">KEYADETERG</option>
		<option value="20010">KPCL</option>
		<option value="15009">LAFSURCEML</option>
		<option value="25010">LANKABAFIN</option>
		<option value="17008">LEGACYFOOT</option>
		<option value="13012">LIBRAINFU</option>
		<option value="21037">LRMF1</option>
		<option value="12036">MAKSONSPIN</option>
		<option value="12039">MALEKSPIN</option>
		<option value="13022">MARICO</option>
		<option value="21033">MBL1STMF</option>
		<option value="15003">MEGHNACEM</option>
		<option value="10006">MEGHNALIFE</option>
		<option value="22023">MERCANBANK</option>
		<option value="11034">MERCINS</option>
		<option value="12035">METROSPIN</option>
		<option value="15010">MICEMENT</option>
		<option value="25005">MIDASFIN</option>
		<option value="19008">MIRACLEIND</option>
		<option value="12033">MITHUNKNIT</option>
		<option value="20012">MJLBD</option>
		<option value="23001">MONNOCERA</option>
		<option value="12015">MONNOFABR</option>
		<option value="20008">MPETROLEUM</option>
		<option value="22018">MTBL</option>
		<option value="10002">NATLIFEINS</option>
		<option value="16023">NAVANACNG</option>
		<option value="22003">NBL</option>
		<option value="22016">NCCBANK</option>
		<option value="25019">NHFIL</option>
		<option value="11021">NITOLINS</option>
		<option value="11032">NORTHRNINS</option>
		<option value="32005">NPOLYMAR</option>
		<option value="14010">NTC</option>
		<option value="18006">OCL</option>
		<option value="16005">OLYMPIC</option>
		<option value="22021">ONEBANKLTD</option>
		<option value="13008">ORIONINFU</option>
		<option value="15008">PADMACEM</option>
		<option value="20002">PADMAOIL</option>
		<option value="11027">PARAMOUNT</option>
		<option value="11002">PEOPLESINS</option>
		<option value="21025">PF1STMF</option>
		<option value="11013">PHENIXINS</option>
		<option value="25016">PHOENIXFIN</option>
		<option value="21031">PHPMF1</option>
		<option value="11017">PIONEERINS</option>
		<option value="25006">PLFSL</option>
		<option value="21029">POPULAR1MF</option>
		<option value="10004">POPULARLIF</option>
		<option value="20006">POWERGRID</option>
		<option value="11011">PRAGATIINS</option>
		<option value="10008">PRAGATILIF</option>
		<option value="22031">PREMIERBAN</option>
		<option value="25008">PREMIERLEA</option>
		<option value="21022">PRIME1ICBA</option>
		<option value="22013">PRIMEBANK</option>
		<option value="25007">PRIMEFIN</option>
		<option value="11016">PRIMEINSUR</option>
		<option value="10009">PRIMELIFE</option>
		<option value="12002">PRIMETEX</option>
		<option value="10007">PROGRESLIF</option>
		<option value="11037">PROVATIINS</option>
		<option value="22007">PUBALIBANK</option>
		<option value="16002">QSMDRYCELL</option>
		<option value="14012">RAHIMAFOOD</option>
		<option value="23006">RAKCERAMIC</option>
		<option value="16016">RANFOUNDRY</option>
		<option value="14023">RDFOOD</option>
		<option value="13006">RECKITTBEN</option>
		<option value="21036">RELIANCE1</option>
		<option value="11004">RELIANCINS</option>
		<option value="11033">REPUBLIC</option>
		<option value="12038">RNSPIN</option>
		<option value="22005">RUPALIBANK</option>
		<option value="11001">RUPALIINS</option>
		<option value="10010">RUPALILIFE</option>
		<option value="12031">SAFKOSPINN</option>
		<option value="12030">SAIHAMTEX</option>
		<option value="16020">SALAMCRST</option>
		<option value="13025">SALVOCHEM</option>
		<option value="17007">SAMATALETH</option>
		<option value="18004">SAMORITA</option>
		<option value="11012">SANDHANINS</option>
		<option value="18005">SAPORTL</option>
		<option value="21034">SEBL1STMF</option>
		<option value="22030">SHAHJABANK</option>
		<option value="22027">SIBL</option>
		<option value="16019">SINGERBD</option>
		<option value="19006">SINOBANGLA</option>
		<option value="11024">SONARBAINS</option>
		<option value="22015">SOUTHEASTB</option>
		<option value="23005">SPCERAMICS</option>
		<option value="18001">SPCERAMICS-1</option>
		<option value="12034">SQUARETEXT</option>
		<option value="13002">SQURPHARMA</option>
		<option value="23003">STANCERAM</option>
		<option value="11031">STANDARINS</option>
		<option value="22020">STANDBANKL</option>
		<option value="20004">SUMITPOWER</option>
		<option value="11030">TAKAFULINS</option>
		<option value="12032">TALLUSPIN</option>
		<option value="20009">TITASGAS</option>
		<option value="21021">TRUSTB1MF</option>
		<option value="22032">TRUSTBANK</option>
		<option value="22004">UCBL</option>
		<option value="25013">UNIONCAP</option>
		<option value="18007">UNITEDAIR</option>
		<option value="32001">USMANIAGL</option>
		<option value="22024">UTTARABANK</option>
		<option value="25003">UTTARAFIN</option>
		<option value="12040">ZAHINTEX</option>

	</select>
        </p>
<p>    
               <span id="ctl00_MSPlace_Label13" style="color: White; 
font-family: Arial; font-size: small; font-weight: normal; 
text-decoration: none; z-index: 1; left: 85px; top: -1px; width: 58px; 
height: 21px;">Buy/Sale:</span>

    
               <select name="tradetype" 
id="tradetype" style="width: 70px; left: 85px; top: 25px;">
		<option selected="selected" value="buy">Buy</option>
		<option value="sell">Sell</option>

	</select>
     
      </p>
    
           <p>
  
            
               <span id="ctl00_MSPlace_Label18" style="color: White; 
font-family: Arial; font-size: small; font-weight: normal; 
text-decoration: none; z-index: 1; left: 149px; top: -1px; width: 63px; 
height: 21px; right: 763px;">Quantity: </span>
   
               <input name="quantity" 
id="quantity" style="font-size: small; z-index: 1; left: 
149px; top: 24px; width: 70px; text-align: left;" type="text">
        
           </p>
              
           <p>
  
              
               <span id="ctl00_MSPlace_Label20" style="color: White; 
font-family: Arial; font-size: small; font-weight: normal; 
text-decoration: none; z-index: 1; left: 233px; top: -2px; width: 74px; 
height: 21px;">Rate: </span>
              
               <input name="rate" 
id="rate" style="font-size: small; z-index: 1; top: 
24px; width: 70px; left: 233px; text-align: left;" type="text">
         
           </p>   
    
            <p class="submit" ><button type="submit" align="left">Submit</button>       

        </p>
             
                     
        
            
          
     
              <table style="width: 100%;">
  
              
              <tbody><tr>
  
              
                  <td class="style31">
  
             

                  <td class="style32">&nbsp;
                </td>
           

    
                  <td>&nbsp;
  

              
                </td>
           
           

    
              </tr>
           
  

    
              <tr>
                  <td class="style31">
  

              
                      <span id="ctl00_MSPlace_lblCaption" style="color: 
rgb(0, 0, 153); font-family: Arial; font-weight: bold; z-index: 1; left:
 351px; top: 58px; width: 216px; height: 94px;"></span>
  

                      &nbsp;</td>
                  <td class="style32">&nbsp;
                </td>
                  <td>&nbsp;
                          
                     
                          
                </td>
              </tr>
           
           
   
    
              
           
           
    
    
              <tr>
                  <td class="style31">&nbsp;
                  

    
               
                </td>
                  <td class="style32">&nbsp;
                </td>
                  <td>&nbsp;
  

    
              
                </td>
              </tr>
           
           
    
  

    
          </tbody></table>
          
                       
               <!---    --------------------------------------------------------------------------------- -->   
		  </fieldset>
						
		</form>	
</div>

<!-- end #bg3 -->
<div id="footer">

	<p>(c) 2008 Sitename.com. Design by <a href="http://www.nodethirtythree.com/">nodeThirtyThree</a> + <a href="http://www.freewpthemes.net/">Free CSS Templates</a></p>
</div>
<!-- end #footer -->
</body>
</html>