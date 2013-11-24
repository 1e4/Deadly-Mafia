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
.style2 {color: #0000FF}
.style5 {color: #00CC00}
.style6 {color: #009900}
.style7 {color: #FF0000}
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
            Edition 4 
          </center></td>
        </tr>
        <tr> 
          <td height=30>
            <p><br>
            </p>
            <p>Recently In Empire2010!</p>
            <p> Well, interesting news involving MasacreX&rsquo;s recent death. It occurred recently when from what my sources tell me he was killed off by lack of energy to the blood stream after using macros for auto crimes/gtas. Masacre was a proud and Keene HDO here at our very own Empire2010. Questions I have been asking myself was, with Masacre becoming a HDO he was a higher target as that&rsquo;s the position next inline for immortal staff, So how could a HDO be so irresponsible as to use a cheat on a game he was staff at. Well being killed all the time and having to restart your gaming career can get annoying to see to often. Did he do this in an attempt to regain the power he had and avenge the bloodthirsty death? Well to the main point, Shouldn&rsquo;t HDO&rsquo;s be setting a good example as partly normal players? Using cheats to gain rank whilst being staff at the game should be dealt with seriously. I&rsquo;m not trying to say I should be able to go and cheat and get off lightly but being a noticed staff doesn&rsquo;t help the case at all.</p>
            <p> No-one is yet sure whether Masacre will return as a HDO. To be honest not many people are sure if he is allowed to be a HDO anymore. I was hoping I could get an interview with Masacre but that wasn&rsquo;t very successful.</p>
            <p class="style7">Disclaimer: The contents of this part of the article may be false and so I may not be held responsible</p>
            <p>It&rsquo;s a War Out There<br>
              Aimed at the 28th August 2005</p>
            <p> Today I witnessed 3 kills of 24 known kills by Reprisal. His recent rampage showed immense power and just how easy it is to be killed in the early poor stages of Empire2010. His steaming kills consisted of 24+ kills which is close to the record of most kills by one single player. Below I interviewed the power crazy Reprisal.</p>
            <p>Key:<br>
              <span class="style2">Me</span><br>
              <span class="style5">Rep</span></p>
            <p class="style2">Hello Rep thanks for your time in advance, this is live please do not swear ( Big brother humour O_O ).</p>
            <p class="style6">Lol, no problem.</p>
            <p class="style2">First question i have been itching to ask, How many bullets has your recent rampage burnt up so far?</p>
            <p class="style6">Boredom to be truthful, also hope to bring a bit more fun into the game aswell.</p>
            <p class="style2">Thanks, was there any kills you made as a grudge?</p>
            <p class="style6">A few, wont name them though, let them do there own dirty work, as all kills made today weren&rsquo;t just made by me.</p>
            <p class="style2">Ok cool, where has your insane power come from?</p>
            <p class="style6">My insane power? Define that a bit more</p>
            <p class="style2">Ar come on, I and many other know you have many bullets to spare and money also. You are one of the most powerful players at the moment. Take some time to explain how the power started and how it grew etc.</p>
            <p class="style6">Well Masacre told me about this game, me and him were partners from Bootleggers that made it big there, so we thought, new game, new people, new place to become powerful, so we both started after the game had just been released. We bought bullets everyday as many as possible, usually 10k plus a day, then I started picking up casinos as they dropped, me and mas wanted to get as many as possible from the start as it will help later on the game, my casino made money, which I converted into bullets too, then we met up with other old mates and grouped together to build us even stronger, and that about brings me to where I am atm.</p>
            <p class="style2">On the subject of Mas, Whoa what&rsquo;s happening with him? A HDO cheating, it&rsquo;s not making sense. You have anything you might want to say about that?</p>
            <p class="style6">Yea, one thing I&rsquo;m not sure about the situation of Mas as i don think he would cheat, he also tends to be lazy and could&rsquo;ve just simply forgot bout eating, I don&rsquo;t know though, I&rsquo;m not him, maybe you could ask him.</p>
            <p class="style2">Back to the subject. Do you think these killings will strike fear in others?</p>
            <p class="style6">Hmm I&rsquo;m not to sure, to some maybe, others maybe cause them to strike out too, would be pretty pointless against me as of what I have and what people seen I can do from boredom, what if I chose to do it for a purpose? Ill leave it to players conclusions, but other people may start to get shot or play serious, I say when game gets more popular, this will make things 'Exciting'.</p>
            <p><span class="style6">Which is what players play for.</span><br>
            </p>
            <p class="style2">Do you hope this will bring you more famous in months to come? Like people say, There&rsquo;s Reprisal he&rsquo;s a powerful player you should make friends with him etc etc?</p>
            <p class="style6">Don&rsquo;t know, possibly, I don&rsquo;t hope for anything, I hope for game to run smoothly so its more fun for the players, some respect would be nice though, but everyone has to own it there own way.</p>
            <p class="style2">Ok well some cool answers there and it was nice speaking to you, Thanks for your time again. Take care.</p>
            <p class="style2">Cheers, Cya around.</p>
            <p>Ok, that&rsquo;s my first article I have written for Empire2010. Hope you enjoyed reading, stay tuned in I will be writing plenty more in the near future. </p>
            <p>~Live your life as if every day&rsquo;s gonna be your last.<br>
              ~Jay-Z</p>
            <p>Empire2010 Article<br>
              By <span class="style2">ValeforX</span></p>
            <p></p>
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

