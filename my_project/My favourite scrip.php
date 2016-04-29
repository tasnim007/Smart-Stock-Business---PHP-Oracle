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
        	<ul>
            
            
             <li><a href="personal info.php">Personal info</a></li>
             <li><a href="Financial statement.php">Financial statement</a></li>
            <li><a href="Current stock statement.php">Current stock statement</a></li>
           
            <li><a href="report.php">Report</a></li>
          
           
            <li><a href="Change passward.php">Change passward</a></li>
            <li><a href="My favourite scrip.php">My favourite scrip</a></li>
           
                        </ul>
        </div>
<div id="container">

<h2>My favourite scrip :</h2>


		
			
           
					<span>Scrip: </span>

          
          <select name="ctl00$MSPlace$cmbScrip" 
id="ctl00_MSPlace_cmbScrip" style="left: 0px; top: 20px; height: 16px; 
width: 98px;">
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
				<option value="13018">ALAMINCHEM</option>
				<option value="22012">ALARABANK</option>
				<option value="80009">AL-HAJTEX</option>
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
				<option value="12020">ASHRAFTEX</option>
				<option value="11035">ASIAINS</option>
				<option value="11022">ASIAPACINS</option>
				<option value="80004">ATLASBANG</option>
				<option value="19001">AZAPR</option>
				<option value="16001">AZIZPIPES</option>
				<option value="14018">BANGAS</option>
				<option value="22022">BANKASIA</option>
				<option value="17009">BATASHOE</option>
				<option value="32009">BATBC</option>
				<option value="25020">BAYLEASING</option>
				<option value="13009">BCIL</option>
				<option value="16012">BDAUTOCA</option>
				<option value="24004">BDCOM</option>
				<option value="12018">BDDYE</option>
				<option value="25014">BDFINANCE</option>
				<option value="16013">BDLAMPS</option>
				<option value="16010">BDLUGGAGE</option>
				<option value="24002">BDONLINE</option>
				<option value="16009">BDTHAI</option>
				<option value="16017">BDWELDING</option>
				<option value="16006">BDZIPPER</option>
				<option value="14021">BEACHHATCH</option>
				<option value="13023">BEACONPHAR</option>
				<option value="20011">BEDL</option>
				<option value="14003">BENGALBISC</option>
				<option value="23002">BENGALFINE</option>
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
				<option value="12009">BXDEN</option>
				<option value="14004">BXFSH</option>
				<option value="13004">BXINF</option>
				<option value="12010">BXKNT</option>
				<option value="13005">BXPHARMA</option>
				<option value="12008">BXSYNTH</option>
				<option value="11006">CENTRALINS</option>
				<option value="12013">CHICTEX</option>
				<option value="22006">CITYBANK</option>
				<option value="11028">CITYGENINS</option>
				<option value="12028">CMCKAMAL</option>
				<option value="15001">CONFIDCEM</option>
				<option value="11029">CONTININS</option>
				<option value="14006">CTGVEG</option>
				<option value="12037">DACCADYE</option>
				<option value="12029">DACCADYE-1</option>
				<option value="24007">DAFODILCOM</option>
				<option value="25018">DBH</option>
				<option value="21023">DBH1STMF</option>
				<option value="10001">DELTALIFE</option>
				<option value="12023">DELTASPINN</option>
				<option value="20005">DESCO</option>
				<option value="32018">DESHBANDHU</option>
				<option value="22014">DHAKABANK</option>
				<option value="14008">DHAKAFISH</option>
				<option value="11038">DHAKAINS</option>
				<option value="80011">DSHGARME</option>
				<option value="12006">DULAMIACOT</option>
				<option value="22017">DUTCHBANGL</option>
				<option value="12019">DYNAMICTEX</option>
				<option value="12016">EAGLESTAR</option>
				<option value="11014">EASTERNINS</option>
				<option value="11015">EASTLAND</option>
				<option value="22025">EBL</option>
				<option value="21018">EBL1STMF</option>
				<option value="21035">EBLNRBMF</option>
				<option value="16015">ECABLES</option>
				<option value="18002">EHL</option>
				<option value="17005">EXCELSHOE</option>
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
				<option value="14015">GACHIHATA</option>
				<option value="14020">GBJVFOOD</option>
				<option value="80002">GLAXOSMITH</option>
				<option value="80008">GLOBALINS</option>
				<option value="12001">GMG</option>
				<option value="12027">GMKNT</option>
				<option value="16021">GOLDENSON</option>
				<option value="26001">GP</option>
				<option value="32006">GQBALLPEN</option>
				<option value="21013">GRAMEEN1</option>
				<option value="21016">GRAMEENS2</option>
				<option value="21028">GREENDELMF</option>
				<option value="11003">GREENDELT</option>
				<option value="14013">GULFOODS</option>
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
				<option value="80000">ICBIBANK</option>
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
				<option value="32016">JAGO</option>
				<option value="22028">JAMUNABANK</option>
				<option value="20007">JAMUNAOIL</option>
				<option value="11005">JANATAINS</option>
				<option value="32017">JBCL</option>
				<option value="80001">KARNAPHULI</option>
				<option value="16014">KAY&amp;QUE</option>
				<option value="13017">KEYACOSMET</option>
				<option value="13019">KEYADETERG</option>
				<option value="32015">KMTSI</option>
				<option value="13011">KOHINOOR</option>
				<option value="20010">KPCL</option>
				<option value="15009">LAFSURCEML</option>
				<option value="25010">LANKABAFIN</option>
				<option value="17008">LEGACYFOOT</option>
				<option value="17003">LEXCO</option>
				<option value="13012">LIBRAINFU</option>
				<option value="21037">LRMF1</option>
				<option value="12036">MAKSONSPIN</option>
				<option value="12039">MALEKSPIN</option>
				<option value="19004">MAQENTER</option>
				<option value="19002">MAQPAPER</option>
				<option value="13022">MARICO</option>
				<option value="21033">MBL1STMF</option>
				<option value="15003">MEGHNACEM</option>
				<option value="10006">MEGHNALIFE</option>
				<option value="14009">MEGHNASHRM</option>
				<option value="22023">MERCANBANK</option>
				<option value="11034">MERCINS</option>
				<option value="12035">METROSPIN</option>
				<option value="12005">MHOSSAIN</option>
				<option value="15010">MICEMENT</option>
				<option value="25005">MIDASFIN</option>
				<option value="19008">MIRACLEIND</option>
				<option value="12021">MITATEX</option>
				<option value="12033">MITHUNKNIT</option>
				<option value="20012">MJLBD</option>
				<option value="15007">MODERNCEM</option>
				<option value="80010">MODERNDYE</option>
				<option value="14014">MONAFOOD</option>
				<option value="23001">MONNOCERA</option>
				<option value="12015">MONNOFABR</option>
				<option value="19007">MONOSPOOL</option>
				<option value="20008">MPETROLEUM</option>
				<option value="22018">MTBL</option>
				<option value="10002">NATLIFEINS</option>
				<option value="16023">NAVANACNG</option>
				<option value="22003">NBL</option>
				<option value="22016">NCCBANK</option>
				<option value="25019">NHFIL</option>
				<option value="15004">NILOYCEM</option>
				<option value="11021">NITOLINS</option>
				<option value="80012">NORTHERN</option>
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
				<option value="13014">PERFUMCHM</option>
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
				<option value="80005">PURABIGEN</option>
				<option value="16002">QSMDRYCELL</option>
				<option value="14012">RAHIMAFOOD</option>
				<option value="23006">RAKCERAMIC</option>
				<option value="16016">RANFOUNDRY</option>
				<option value="14019">RANGAFOOD</option>
				<option value="14002">RASPIT</option>
				<option value="24001">RASPITDATA</option>
				<option value="14023">RDFOOD</option>
				<option value="13006">RECKITTBEN</option>
				<option value="21036">RELIANCE1</option>
				<option value="11004">RELIANCINS</option>
				<option value="11033">REPUBLIC</option>
				<option value="12038">RNSPIN</option>
				<option value="32008">ROSEHEAVEN</option>
				<option value="22005">RUPALIBANK</option>
				<option value="11001">RUPALIINS</option>
				<option value="10010">RUPALILIFE</option>
				<option value="12031">SAFKOSPINN</option>
				<option value="12030">SAIHAMTEX</option>
				<option value="12012">SAJIBKNIT</option>
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
				<option value="80007">SONARGAON</option>
				<option value="80007">SONARGAON-1</option>
				<option value="22015">SOUTHEASTB</option>
				<option value="23005">SPCERAMICS</option>
				<option value="18001">SPCERAMICS-1</option>
				<option value="12034">SQUARETEXT</option>
				<option value="13002">SQURPHARMA</option>
				<option value="12014">SREEPURTEX</option>
				<option value="23003">STANCERAM</option>
				<option value="11031">STANDARINS</option>
				<option value="22020">STANDBANKL</option>
				<option value="20004">SUMITPOWER</option>
				<option value="11030">TAKAFULINS</option>
				<option value="12032">TALLUSPIN</option>
				<option value="12026">TAMIJTEX</option>
				<option value="13001">TBL</option>
				<option value="20009">TITASGAS</option>
				<option value="14007">TRIPT</option>
				<option value="21021">TRUSTB1MF</option>
				<option value="22032">TRUSTBANK</option>
				<option value="22004">UCBL</option>
				<option value="80006">ULC</option>
				<option value="25013">UNIONCAP</option>
				<option value="18007">UNITEDAIR</option>
				<option value="80003">UNITEDINS</option>
				<option value="32001">USMANIAGL</option>
				<option value="22024">UTTARABANK</option>
				<option value="25003">UTTARAFIN</option>
				<option value="13015">WATACHEM</option>
				<option value="16008">WONDERTOYS</option>
				<option value="12040">ZAHINTEX</option>
				<option value="80013">ZEALBANGLA</option>

			</select> 
         
           <input name="ctl00$MSPlace$btnSubmit" value="Submit" 
id="ctl00_MSPlace_btnSubmit" style="z-index: 1; top: 19px; width: 75px; 
height: 24px; left: 140px;" type="submit">
    
     <input name="ctl00$MSPlace$btnRem" value="Remove" 
id="ctl00_MSPlace_btnRem" style="z-index: 1; top: 19px; width: 75px; 
height: 24px; left: 240px;" type="submit">
    
    
         <input name="ctl00$MSPlace$btnClear" value="Refresh" 
id="ctl00_MSPlace_btnClear" style="z-index: 1; top: 19px; width: 75px; 
height: 24px; left: 348px;" type="submit">

            <span id="ctl00_MSPlace_lblStatus" style="color: Red; 
font-family: Arial; font-size: small; font-weight: bold; 
text-decoration: none; z-index: 1; left: 449px; top: 19px; width: 274px;
 height: 21px;"></span>

     
          </font><div>			<table 
id="ctl00_MSPlace_GVr" style="color: Black; background-color: White; 
border: 2px none rgb(153, 153, 153); font-size: small; font-weight: 
normal; border-collapse: collapse; z-index: 1; left: 0px; top: 0px; 
height: 147px; width: 612px;" border="2" cellpadding="3" cellspacing="0"
 rules="all">
					<tbody><tr style="color: White; background-color: Black; 
border-style: ridge; font-weight: bold;" valign="middle" align="left">
						<th scope="col">Scrip CD.</th><th scope="col" align="right">Previous
 Close</th><th scope="col" align="right">Current Price</th><th 
scope="col" align="right">Change</th><th scope="col" align="right">High 
Price</th><th scope="col" align="right">Low Price</th><th scope="col" 
align="right">Face Value</th><th scope="col" align="right">Market Lot</th><th
 scope="col">Category</th><th scope="col">Last Trade Time</th>
					</tr><tr style="border: 1px solid Black;">
						<td style="color: Red; font-weight: bold;">ABBANK</td><td 
align="right">69.00</td><td align="right">67.90</td><td align="right">-1.10</td><td
 align="right">0.00</td><td align="right">0.00</td><td align="right">10</td><td
 align="right">50</td><td>CDBL-A</td><td>12/14/2011 3:29:32 PM</td>
					</tr><tr style="background-color: White; border: 1px solid Black;">
						<td style="color: Red; font-weight: bold;">BEXIMCO</td><td 
align="right">116.00</td><td align="right">114.60</td><td align="right">-1.40</td><td
 align="right">0.00</td><td align="right">0.00</td><td align="right">10</td><td
 align="right">100</td><td>CDBL-A</td><td>12/14/2011 3:29:32 PM</td>
					</tr><tr style="border: 1px solid Black;">
						<td style="color: Red; font-weight: bold;">UTTARABANK</td><td 
align="right">79.40</td><td align="right">77.30</td><td align="right">-2.10</td><td
 align="right">0.00</td><td align="right">0.00</td><td align="right">10</td><td
 align="right">25</td><td>CDBL-A</td><td>12/14/2011 3:29:33 PM</td>
					</tr>
				</tbody></table>

</div>
</div>

<!-- end #bg3 -->

<!-- end #footer -->
</body>
</html>