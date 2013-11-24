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
.style1 {color: #FF0000}
.style2 {color: #0000FF}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="3" cellpadding="0">
  <tr> 
    <td colspan="2"><table class=thinline width="100%" border="1" cellspacing="0" cellpadding="0" rules=none >
        <tr> 
          <td background=includes/grad.jpg><center>
              Editions</center></td>
        </tr>
<tr bgcolor=black><td height=1 colspan=3></td></tr>
        <tr> 
          <td> <center>
            <?php
$it_edi = mysql_query("SELECT DISTINCT edition FROM paper");
	 while($info_edi = mysql_fetch_object($it_edi)){

 echo "<a href='?edi=$info_edi->edition'>Edition $info_edi->edition</a> / ";
}
?>
            Edition 1 
          </center></td>
        </tr>
        <tr> 
          <td height=30>
            <p>To the first weekly &ldquo;International&rdquo; you are all wondering why right a article when nothing special has happend in the first place well thats easy something did happen,</p>
            <p> Fenchurch released his first game together with:</p>
            <p><BR>
              Valefor - Admin, Coder <BR>
              MonkeyAvenger - Head Moderator, Play Tester <BR>
              campfreddy - Moderator <BR>
              theismay - Moderator <BR>
              toesonthenose - Moderator </p>
            <p>Welcome Ladies &amp; Gentelmen<BR>
              <BR>
              and what a splended day it was the game already has Crews, Casinos, Players but you shouldnt forget the Point buyers &ldquo;The President&rdquo; was the first Point Buyer in Empire2010 and the money Fenchurch got he used for his Server (Unlike BSF2000 who just sits on his lazy a*s) well to hell with it you all know BSF2000 the one the only scammer of the century the creator of &ldquo;Bootleggers&rdquo; well enough about that. I made this article to give all the newcomers and the players who already played a hug a cookie and a warm welcome to Empire2010!!<BR>
              <span class="style1">-ReQuiM</span></p>
            <p>&nbsp;</p>
            <p>------------------------------------------------------------------------------------------------------------------------------------------------------</p>
            <p>On the 11th of August 2005 i finally released the game after seemingly endless passages of time spent on flattening out all bugs and problems and making new features</p>
            <p>Ever since i played bootleggers a few years ago under the name Mosphaitus and then more recognisably FalloF i wanted a game of my own.</p>
            <p>There are still stuff to be fixed and things like kills to be finished but i released the game as i believed it was playable. On the first night i got over 37 members signed up which i was chuffed about, 24 hours later it was up to 87 and now at the time of writing this article it stands at 139.</p>
            <p>It just feels good to drop properties and see good old friends like Harlem,Masacre, Mrnobody, Reprisal, Scarlet and Dealer enjoying the game.</p>
            <p>I obviously needed a team so my first port of call was my best BL friend, Monkeyavenger he said yes when i asked him to be a mod without even thinking, i don't blame him lol. I then asked another good friend theismay, he also accepted, i asked Harlem but i thought he would rather play the which he did want to so i didn't make him mod. I then asked my school friend, dave (campfreddy) as i knew he had always wanted to be one and i knew he would be good, the same as my other friend zoe who thought it would be cool.</p>
            <p>I had my team and i just had to release and i did and let the journey begin!</p>
            <p><span class="style2">Fenchurch</span><br>
            </p>
            <p> <BR>
                                                                                                            </p></td>
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

