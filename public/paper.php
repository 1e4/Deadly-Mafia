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
.style12 {color: #FF0000}
.style13 {color: #0000FF}
.style14 {color: #00CC66}
.style15 {color: #990000}
.style16 {color: #FFFFFF}
.style17 {color: #333333}
.style18 {color: #00FF00; }
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="3" cellpadding="0">
  <tr> 
    <td colspan="2"><table class=thinline width="100%" border="1" cellspacing="0" cellpadding="0" rules=none >
        <tr> 
          <td background=includes/grad.jpg><center>
              Editions <a href="e1.php">1</a>,<a href="ed2.php">2</a>,3
          </center></td>
        </tr>
<tr bgcolor=black><td height=1 colspan=3></td></tr>
        <tr> 
          <td> <center class="style12">
            3
          </center></td>
        </tr>
        <tr> 
          <td height=30>
            <p align="center" class="style13">Interview</p>
            <p>Here is the 3rd article for the International and in this edition we&rsquo;ve had enough of vengencex, you&rsquo;ve got me instead, hmguest. * Cool player * Right this is all about you. You are the people who make the game, you are the people who can make the game better, you are Empire2010. * Crowd cheers Horray! * Enough of that now I&rsquo;m beginning to sound like vengencex now, believe me that&rsquo;s a bad thing.</p>
            <p><br>
            Now here is an interview with one of our HDOs, Squirrel on Empire2010:</p>
            <p><span class="style15"><br>
              hmguest says:</span><br>
              <span class="style16">Hello Squirrel, what do you think of Empire now? </span><br>
              <span class="style13">Squirrel says:</span><br>
              <span class="style17">Hey, I think it is a good game but it still need to have more players. I think that after this recent reset and the improvements made to Empire has made it a much more fun and enjoyable game, hopefully now we will get the number of players that is needed and it deserves.</span><br>
              <span class="style15">hmguest says:</span><span class="style16"><br>
              And what does Empire2010 have that other Mafia based games do not have?</span><br>
              <span class="style13">Squirrel says:</span><br>
              <span class="style17">That really is an impossible question to answer. I have not been on every other mafia game. One outstanding thing about Empire is that is the new features to do with the crews.</span><br>
              <span class="style15">hmguest says:</span><br>
              <span class="style16">I've heard many stories about you and it seems that you find the game not so much easy but you&rsquo;re capable of being good at it. Is it buying points that makes you successful?</span><br>
              <span class="style13">Squirrel says:</span><br>
              <span class="style17">This reset is the first time in which I have bought points. I have shown that I can be good without them, I just decided that to both support Empire and to help myself have a easier ride I would buy some this reset.</span><br>
              <span class="style15">hmguest says:</span><br>
              <span class="style16">Some people say that buying points in a waste of cash and is stupid. What is your thoughts about it?</span><br>
              <span class="style13">Squirrel says:</span><br>
              <span class="style17">I think that I have got a lot out of this game and therefore I ought to give something back. Also points tend to be very hard to come by and therefore quite valuable, which give another incentive to buy them.</span><br>
              <span class="style15">hmguest says:</span><br>
              <span class="style16">Do you have any future plans with the game?</span><br>
              <span class="style13">Squirrel says:</span><br>
              <span class="style17">I have many things which I would wish to do. None of which I would like to tell the general public.</span><br>
            </p>
            <p>I would like to thank you very much for your time Squirrel. I hope this gives you an insight to how a great player works. Squirrel as we know is a very well known player on Empire2010 in I know that in many people&rsquo;s eyes is a great roll model to becoming a great player on this game.</p>
            <p>I hope you have enjoyed my article and there are many more to come.</p>
            <p>Thanks for reading.</p>
            <p class="style14">hmguest<br>
            </p>
            <p class="style18"><a href="http://www.gamesites200.com/mpog/vote.php?id=2763">Remember to vote~ Click here </a> </p>
            <p align="center">&nbsp;
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

