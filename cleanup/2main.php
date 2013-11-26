<html><head><title>2010: Empire</title>
<META content="Put text here" name=classification>
<META content="Sheldon West" name=Author>
<META content="Layout is Copyright © http://www.gnext.vze.com" name=copyright>
<META content="Your Keywords here" name=keywords>
<META content="Your Site Description here" name=description>

<STYLE type=text/css>
BODY {
	SCROLLBAR-FACE-COLOR: #000000; SCROLLBAR-HIGHLIGHT-COLOR: #ffffff; SCROLLBAR-SHADOW-COLOR: #2e425a; SCROLLBAR-3DLIGHT-COLOR: #2e425a; SCROLLBAR-ARROW-COLOR: #bccbdc; SCROLLBAR-TRACK-COLOR: #2e425a; SCROLLBAR-DARKSHADOW-COLOR: #000000; BACKGROUND-COLOR: #000000
}
A:link {
	COLOR: #bccbdc; TEXT-DECORATION: none
}
A:active {
	COLOR: #bccbdc; TEXT-DECORATION: none
}
A:visited {
	COLOR: #bccbdc; TEXT-DECORATION: none
}
A:hover {
	COLOR: #597795; TEXT-DECORATION: underline
}
</STYLE>
</head>



<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$viewuser=$_GET['viewuser'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
?>

<BODY text=white bottomMargin=0 vLink=white link=#bccbdc bgColor=black 
leftMargin=0 topMargin=0 rightMargin=0>

<div align="center">

<table width="710" border="0" cellspacing="0" cellpadding="0" valign="top">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<table width="750" height="100%" border="0" cellspacing="0" cellpadding="0" valign="top">
  <tr>
    <td width="130" valign="top"><br>
      <table align="center" width="130" border="1" bordercolor="#3399cc" "cellspacing="0" cellpadding="0" valign="top">
        <tr> 
          <td height="20" bgcolor="#336699" valign="center"><font face="verdana" size="2">
						: Navigation :</font></td>
        </tr>
        <tr> 
          <td valign="top"> 
            <p><font face="verdana" size="1.5">
              
- <a href="main.php">Home</a><BR>
- <a href="?act=contact">Contact Us</a><BR>
- <a href="?act=affiliation">Affiliation</a><BR>
- <a href="?act=link">Link To Us</a><BR>
- <a href="?act=advertise">Advertise</a><br>
- <a href="?act=memberlist">Members</a>
							
               </font></p>
            </td>
        </tr>
      </table>

      <br>
      <table align="center" width="130" border="1" bordercolor="#3399cc" "cellspacing="0" cellpadding="0" valign="top">
        <tr> 
          <td height="20" bgcolor="#336699" valign="center"><font face="verdana" size="2">
					: Your Money :</font></td>
        </tr>
        <tr> 
          <td valign="top"> 
            <p><font face="verdana" size="1.5">
              
- <a href="?act=deposit">Deposit</a><br>
- <a href="?act=withdraw">Withdraw</a><BR>
- <a href="?act=send">Send</a><BR>
             </font></p>
          </td>
        </tr>
      </table>
     <BR>
      

      <table align="center" width="130" border="1" bordercolor="#3399cc" "cellspacing="0" cellpadding="0" valign="top">
        <tr> 
          <td height="20" bgcolor="#336699" valign="center"><font face="verdana" size="2">
					: Crime :</font></td>
        </tr>
        <tr> 
          <td valign="top"> 
            <p><font face="verdana" size="1.5">
              
- <a href="?act=banks">Banks</a><br>
- <a href="?act=bulletsfac">Bullets Factory</a><br>
- <a href="?act=cartheft">Car Theft</a><BR>
- <a href="?act=chase">Chase</a><BR>
- <a href="?act=crime">Crimes</a><BR>
- <a href="?act=extortion">Extortion</a><BR>
- <a href="?act=garage">Garage</a><BR>
- <a href="?act=missions">Missions</a><BR>
- <a href="?act=organisedcrime">Organised Crime</a><br>
- <a href="?act=truck heist">Truck Heist</a><br>			
- <a href="?act=weaponfactory">Weapon Factory</a>	
             </font></p>
          </td>
        </tr>
      </table>
     <BR>
      
      <table align="center" width="130" border="1" bordercolor="#3399cc" "cellspacing="0" cellpadding="0" valign="top">
        <tr> 
          <td height="20" bgcolor="#336699" valign="center"><font face="verdana" size="2">: Gambling :</font></td>
        </tr>
        <tr> 
          <td valign="top"> 
            <p><font face="verdana" size="1.5">
              - <a href="?act=casinos">Casinos </a><br>
              - <a href="?act=slots">Slots </a><BR>
              - <a href="?act=roulette">Roulette </a><BR>
              - <a href="#">Links </a><BR>
              - <a href="#">Links </a><BR>
              - <a href="#">Links </a><BR>
              - <a href="#">Links </a><BR>
          </font></p>
          </td>
        </tr>
      </table>
      <br>
    </td>
    <td width="482" valign="top"> 
      <center>
        <font face="verdana" size="1"><br>
      </font> 
				<iframe src="http://view.atdmt.com/CHI/iview/hypcnjcp0360000006chi/direct;wi.468;hi.60/01?click=http://www.hypemakers.net/azjeans/go/v/a/adv/1815/redir/" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" topmargin="0" leftmargin="0" allowtransparency="true" width="468" height="60">
<script language="JavaScript" type="text/javascript">
document.write('<a href="http://www.hypemakers.net/azjeans/go/v/a/adv/1815/redir/http://clk.atdmt.com/CHI/go/hypcnjcp0360000006chi/direct;wi.468;hi.60/01/" target="_blank"><img src="http://view.atdmt.com/CHI/view/hypcnjcp0360000006chi/direct;wi.468;hi.60/01/"/></a>');
</script><noscript>
</noscript></iframe>
      </center>
      <br>
      <table align="center" width="480" border="1" bordercolor="#3399cc" cellspacing="1" cellpadding="1" valign="top">


<?php


if(! $act) { 
require("intro.php");
}
if ($act=="casinos") { 
require("casinos.php");
}
if ($act=="banks") { 
require("banks.php");
}
if ($act=="rob") { 
require("rob.php");
}
if ($act=="robabank") { 
require("robabank.php");
}
if ($act=="send") { 
require("send.php");
}
if ($act=="sendingmoney") { 
require("sendingmoney.php");
}
if ($act=="withdraw") { 
require("withdraw.php");
}
if ($act=="deposit") { 
require("deposit.php");
}
if ($act=="die") { 
require("die.php");
}
if ($act=="bulletsfac") { 
require("bulletsfac.php");
}
if ($act=="buyingbullets") { 
require("buyingbullets.php");
}
if ($act=="memberlist") { 
require("list.php");
}
if ($act=="slots") { 
require("slots.php");
}
if ($act=="spinslots") { 
require("spinslots.php");
}
if ($act=="roulette") { 
require("roulette.php");
}
if ($act=="spinroulette") { 
require("spinroulette.php");
}
if ($act=="crime") { 
require("crime.php");
}
if ($act=="commitcrime") { 
require("commitcrime.php");
}
if ($act=="cartheft") { 
require("cars.php");
}
if ($act=="stealcar") { 
require("stealcar.php");
}
?>


      </table>


<br>
      <table align="center" width="480" border="1" bordercolor="#3399cc" cellspacing="1" cellpadding="1" valign="top">
        <tr> 
          <td height="20" valign="center">&nbsp;</td>
        </tr>
      </table>
      <br>

    <td width="130" valign="top"><br>
      <br>
      <table align="center" width="130" border="1" bordercolor="#3399cc" "cellspacing="0" cellpadding="0" valign="top">
        <tr> 
          <td height="20" bgcolor="#336699" valign="center"><font face="verdana" size="2">: Shoutbox :</font></td>
        </tr>
        <tr> 
          <td valign="top"> 
            <p><font face="verdana" size="1.5">
              <iframe src="http://261258.myshoutbox.com/" width="120" height="200" frameborder="0" allowTransparency="true"></iframe>
             </font></p>
          </td>
        </tr>
      </table>
	<br>
      <table align="center" width="130" border="1" bordercolor="#3399cc" "cellspacing="0" cellpadding="0" valign="top">
        <tr> 
          <td height="20" bgcolor="#336699" valign="center"><font face="verdana" size="2">: Affiliates :
            </font></td>
        </tr>
        <tr> 
          <td valign="top"> 
            <p><font face="verdana" size="1.5"><div align="center">
             <a href="http://www.confusedgames.com" target="_blank"> </a><br>
              <a href="http://www.the-games-matrix.co.uk/">The Games Matrix </a><BR>
              <a href="?act=affiliation">Your site here </a><BR>
              <a href="?act=affiliation">Your site here </a><BR>
              <a href="?act=affiliation">Your site here </a><BR>
              <a href="?act=affiliation">Your site here </a><BR>
              <a href="?act=affiliation">Your site here </a><BR></div>
             </font></p>
          </td>
        </tr></table></td></tr></table>
</body></html>










































