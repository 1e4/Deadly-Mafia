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

<style type="text/css">
<!--
.style2 {color: #0000FF}
.style3 {color: #000000; }
.style4 {color: #FF0000}
.style5 {color: #009900}
.style6 {color: #CC6600}
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
            Edition 2 
          </center></td>
        </tr>
        <tr> 
          <td height=30>
            <p>Another week has passed in Empire 2010. Already Fenchurch has had his hands full but has bravely kept his ground. Grizz has been recruited to a temporary Admin, and his skills have greatly benefited Empire 2010. <br>
            All the Admins have been working non-stop and thanks to them, numerous Bugs / Exploits have been found and fixed, and most casino&rsquo;s, bullet factory&rsquo;s, Bar&rsquo;s and other money making properties have been checked for any errors and dropped to random people.</p>
            <p>Even though Empire 2010 has only recently come online, already 8 crews have been formed. <br>
              Fenchurch created the first one, in which only the Empire 2010 staff are allowed inside the crew, which has aptly been named &lsquo;Empire 2010 staff&rsquo;.</p>
            <p>&nbsp;</p>
            <p>There are a few rules in Empire 2010, which have been laid down by the Admins.</p>
            <p>1. Don&rsquo;t ask to become an Admin, Mod, Help Desk Op, or to become a writer in &lsquo;The International&rsquo;.<br>
              2. Don&rsquo;t ask to join the crew &ndash; &lsquo;Empire 2010 Staff&rsquo;.<br>
              3. No Racism! Any racist comments will result in a lifetime ban immediately.<br>
              4. No porn! Even if you enjoy looking at it, it doesn&rsquo;t mean we want to!<br>
              5. No spamming. Give people a fair chance in Empire 2010, and don&rsquo;t spam them! Spamming any Empire 2010 staff will result in a ban.</p>
            <p>&nbsp;</p>
            <p>Fenchurch has also recruited the very first Empire 2010 staff. A full list is below:</p>
            <p align="center" class="style2">Admins:</p>
            <p align="center">Fenchurch<br>
              Grizz</p>
            <p align="center" class="style4">Moderators</p>
            <p align="center">MonkeyAvenger (Head Moderator)<br>
              CampFreddy<br>
              TheIsMay<br>
              ToesOnTheNose</p>
            <p align="center" class="style5">Help Desk Operators:</p>
            <p align="center">---</p>
            <p align="center" class="style6">&lsquo;The International&rsquo; Article Writers:</p>
            <p align="center">---<br>
            </p>
            <p>Fenchurch has made these choices wisely. I know that the Moderators he has chosen, will help Empire 2010 to grow into a massive online multiplayer game. The Moderators will all do an excellent job keeping track of the forums and making sure everyone doesn&rsquo;t toe the line too much. Who knows? Maybe Fenchurch won&rsquo;t need to recruit any other Empire 2010 staff for a long while. Empire 2010 seems to be going fantastic so far. Slowly the game is progressing, each day more coding is done, and tested. Killing (One of the most important issues in the game) is being furiously coded and checked by Fenchurch.<br>
              Hopefully, after a few weeks all the serious Bug&rsquo;s / Exploits will be fixed, and the Admins will finally be able to sit back and enjoy the sun.<br>
            </p>
            <p>I managed to get an Interview with MonkeyAvenger, about his views on Empire 2010 and any features he would like in the future:<br>
            </p>
            <p class="style2">Phoenix</p>
            <p class="style3">What are your current views on Empire 2010?</p>
            <p class="style4">MonkeyAvenger: </p>
            <p> I think Empire 2010 has grown very quickly, I always knew it would that's why I chose to become a Moderator instead of a player. The main reason why I became a Moderator was to help my best Bootleggers friend Fenchurch. When he offered me money to be a mod I tried to refuse because I didn't think it was fair but Fenchurch insisted that I must.</p>
            <p>I have so much faith in this game I told Fenchurch aka FalloF if he needed any help money-wise I would try and provide some. I've never put any money into an online game before but I know what I put in can be made back in a matter of time.</p>
            <p>Are their any features you would like to have in Empire 2010, that you think may improve it?</p>
            <p>Yes there is, I would think it would be better for the players out there if we add more casinos (which is being worked on). The most important thing is what the players want. If they have any suggestions then I&rsquo;ll be glad to see them.</p>
            <p>Once again, thank you for your time MonkeyAvenger.</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>A few things you should remember:</p>
            <p>Don&rsquo;t argue with any Empire 2010 staff. They all make decisions fairly, and justly. Post wisely in forums, and take into account all the rules about Racism, Porn, Spamming etc. Have fun, take care, and once again, welcome to Empire 2010!</p>
            <p><span class="style2">~Phoenix</span><br>
            </p>
            <p>&nbsp;            </p>
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

