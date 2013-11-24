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
              Editions <a href="e1.php">1</a>,2,<a href="paper.php">3</a>          </center></td>
        </tr>
<tr bgcolor=black><td height=1 colspan=3></td></tr>
        <tr> 
          <td> <center class="style12">
            2
          </center></td>
        </tr>
        <tr> 
          <td height=30>
            <p align="center">Vote for Empire2010</p>
            <p>Please vote for Empire2010. It is not just some cheap scam to make the staff look good&hellip; honest&hellip;I promise come on do I ever lie to you lot? 8-) The reason we want YOU to vote for Empire2010 is to make the game better. If we get enough of you to click once, just once a day so that we can watch Empire2010 rise up the gaming table we will gain publicity. No not the publicity celebrities get but the publicity that means more players sign up to play this kick ass game! </p>
            <p>This is one of the biggest things you can do behind referring players to get Empire2010 the recognition it needs. People who are hunting for new games are not going to look at the games positioned 100-200 but will be looking more at the games ranked between 1-50. Lets remember that every time we log in the first thing we should do is vote! If we don&rsquo;t rise rapidly soon I will waste all my time EMing you very kind people to make sure you have voted! That is the last thing I need to be doing because the amount of ermm work I have already is crazy&hellip;yep that&rsquo;s right I occasionally work for you people. Mosphaitus has got his own slaves ahhh! He will kill us if we have to EM you rather than do the other ermm jobs. </p>
            <p>So the point to this article is unless you want your loved vengencex to take the gun to the head vote and get this game flying sky high! Just think in a year&rsquo;s time (and yes we will make sure this game is flying in a years time) you could say you helped create Empire2010. You can say you voted and helped us rise up the table!</p>
            <p>Wow another article don&rsquo;t believe it but anyway don&rsquo;t do it for me.<br>
              Don&rsquo;t do it for the staff.<br>
              Don&rsquo;t do it for superman.<br>
              Do it for yourself and the future of Empire2010.</p>
            <p>Thank you<br>
              Oh yeh, the link!</p>
            <p>http://www.gamesites200.com/mpog/vote.php?id=2763<br>
            </p>
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

