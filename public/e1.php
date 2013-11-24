<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
include"includes/smile.php";
logincheck();
$username=$_SESSION['username'];;
echo "$style"; 
$edi=strip_tags($_GET['edi']);
if (!$edi){
$edition = "1";
}else{
$edi=strip_tags($_GET['edi']);
}
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel=stylesheet href=includes/in.css type=text/css>
<style type="text/css">
<!--
.style11 {color: #009900}
.style12 {color: #FF0000}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="3" cellpadding="0">
  <tr> 
    <td colspan="2"><table class=thinline width="100%" border="1" cellspacing="0" cellpadding="0" rules=none >
        <tr> 
          <td background=includes/grad.jpg><center>
              Editions 1, <a href="paper.php">2</a> 
          </center></td>
        </tr>
<tr bgcolor=black><td height=1 colspan=3></td></tr>
        <tr> 
          <td> <center class="style12">
            1
          </center></td>
        </tr>
        <tr> 
          <td height=30>
            <p align="center">The Major Reset</p>
            <p>Empire2010 has undergone some serious &lsquo;surgery&rsquo; in the last 4 days. The admins have been working their socks off to fix bugs and add further features. You may notice some changes automatically and some may take a bit longer to discover. The moderators have also worked hard in the last 4 days testing new and old features to see if there are any more bugs to be found. We have had additional help from 2 great players. One of the HDOs named Squirrel has come up with some great ideas and problem solving solutions. Pimpinfrog has also help with testing and has been some good help. Have we done enough to stop Pimpinfrog from saying he is quitting for good? </p>
            <p>Yes these two players have helped but if you take absolutely nothing from this article. I will want you to know 1 thing, which is that these 2 have not and will not be given any kind of advantage over the rest of the Empire2010 world.</p>
            <p>If you are still reading this I thank you.</p>
            <p>If you are new to the game you will obviously not notice any changes but we all hope you become long-term players and really fit into out community and don&rsquo;t be afraid of the staff. We are friendly and are very willing to help you. What both Admins and Mods are anticipating is a much longer round than the second so you all get the chance to attempt to sit on the throne and play our game your way (your way does not mean exploiting, scamming or duping :P). </p>
            <p>To finish off I thought I&rsquo;d leave you with some highlights of the second round:</p>
            <p>&#61656; Revenger is appointed moderator<br>
            &#61656; Project Zero are created by vengencex. Things pick up and look hopeful until they are killed off and never recreated.<br>
            &#61656; The Agency are introduced by Highbury and shortly become the richest crew on Empire2010<br>
            &#61656; Reprisal quits as Moderator.<br>
            &#61656; Bamboe was hired as Moderator.<br>
            &#61656; Squirrel became a Help Desk Operator.<br>
            &#61656; Vengencex is appointed as mod, Monkeyavenger is promoted to admin and Theismay is promoted to head mod.<br>
            &#61656; A massive killing spree by Pimpinfrog, Highbury and Squirrel (apologies if I got the wrong people :P) kill all active players!<br>
            &#61656; Empire2010 has a major reset.</p>
            <p>Well that is it for this episode folks and we hope you tune in same time, same channel next week! OK this isn&rsquo;t quite television but on behalf of all the staff here at Empire2010 we hope you enjoy the new round and we hope you accomplish all your goals.</p>
            <p><span class="style11">-=vengencex=-</span><br>
            </p>
            <p></p>
          <p align="left">&nbsp; </p></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="50%"><?php $it = mysql_query("SELECT * FROM paper WHERE edition='$edi' AND align='Left'");
	 while($info = mysql_fetch_object($it)){


	echo "
<table width=100% border=1 cellspacing=0 cellpadding=2 class=thinline bordercolor=black>
        <tr>
          <td background=includes/grad.jpg><center>$info->title</center></td>
        </tr>
        <tr>
          <td>".replace($info->news)." <br> Written by: <a href='profile.php?viewuser=$info->by'>$info->by</a></td>
        </tr>
      </table><p>"; }
?> </td>
    <td width="50%"> <? $it1 = mysql_query("SELECT * FROM paper WHERE edition='$edi' AND align='Right'");
	 while($info1 = mysql_fetch_object($it1)){


	echo "
<table width=100% border=1 cellspacing=0 cellpadding=2 class=thinline bordercolor=black>
        <tr>
          <td background=includes/grad.jpg><center>$info1->title</center></td>
        </tr>
        <tr>
          <td>".replace($info1->news)." <br> Written by: <a href='profile.php?viewuser=$info1->by'>$info1->by</a></td>
        </tr>
      </table><p>"; }
?> </td>
  </tr>

</table>

</body>
</html>

