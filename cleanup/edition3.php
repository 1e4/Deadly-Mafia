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
.style3 {color: #FF0000}
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
            Edition 3 
          </center></td>
        </tr>
        <tr> 
          <td height=30>
            <p>First of all, I&rsquo;d like to give a warm welcome to Valefor. One of the most powerful players on Empire 2010, who has agreed to join the &lsquo;The International&rsquo; as an article writer! Congratulations, and once again, welcome to the &lsquo;International&rsquo;. Unfortunately, he was shot and killed straight after the kill feature was up and running.</p>
            <p>As more and more people arrive in the dusty, blood filled world of Empire 2010, the game has become progressively more fierce and competitive. More money-making properties have been dropped to random people, who have become stinking rich within a few hours.<br>
              With the &lsquo;kill&rsquo; feature, now up on the shelves in mint condition, which has been accepted with glee from many players, who immediately brushed the dust from their guns and went straight to work.</p>
            <p>Organized crimes have been a mass item in the past week. In every forum, there is an ad for an oc. Most people have ranked up amazingly, in such short time. Everywhere I look, people are ranking up as if they&rsquo;re in drugs (some of them might be, I wouldn&rsquo;t be surprised). In fact, it&rsquo;s as if everyone on Empire 2010 is preparing for a war. Although crew wars aren&rsquo;t up yet, I imagine that very soon, crews will be taken over and sold.</p>
            <p>What else can I say? Not that much has happened in the past week. Grizz and Fenchurch have worked their *sses off, solving errors and bug&rsquo;s in the game. Grizz especially, has been a great help to Fenchurch. Both of them had the &lsquo;kill&rsquo; feature up in no time. But their still isn&rsquo;t any time to relax in the sun, plenty more work to do!</p>
            <p>More money-making properties will be handed out again this week to random people once again. </p>
            <p>2 people have been hitlisted by an anonymous player! He/she said in the hitlist topic &ndash; &lsquo;For when the &lsquo;kill&rsquo; feature is up&rsquo;. I have no idea who this player is, but he/she must have some grudge against the 2 players - Uzumakinaruto and Masacre! If they do die, they may become legendary as the first kills on Empire 2010! I&rsquo;ll be looking forward to see who dies first.</p>
            <p>Unfortunately, before either of them were shot to death after being beaten to a bloody pulp, they were rescued from the hitlist, either by themselves, or someone else who bought them off.</p>
            <p>After this, these 3 kills were made:</p>
            <p>You witnessed Uzumakinaruto kill Slash</p>
            <p>You witnessed David kill ThePresident</p>
            <p>You witnessed Reprisal kill MrPresident<br>
            </p>
            <p>More kills were made, but I don&rsquo;t have a record of them unfortunately. However, it shows how much the players liked the kill feature up and running!<br>
            </p>
            <p>One of the most surprising things about this week, is the trade in &lsquo;beers&rsquo;. People keep asking other to buy &lsquo;beers&rsquo; which cost around $50,000. The person who wants the beer, now pays the &lsquo;beer buyer&rsquo; between $100,000 - $300,000. You may make a lot of money from this, but at what cost?<br>
              Basically beers give a load of rank points to the person who receives the beer. You may think &lsquo;that&rsquo;s fine, $300,000 for some rank points! A great deal!&rsquo;. Your wrong. Fine, so some poor people make money out of this, but ultimately their money is useless when the person who receives the beer ranks at an alarming rate from a mixture of beer and organised crime. Then, with the &lsquo;kill&rsquo; feature now up, they will end up being the ruling players on Empire 2010. So once you&rsquo;ve read this friendly warning, be careful!</p>
            <p>&nbsp;</p>
            <p>This week, I interviewed Valefor. A powerful player who recently gave up his post as Admin. He was also killed this week. He doesn&rsquo;t regret it at all; the only thing he promises is revenge. A true hitman! </p>
            <p class="style3">What are your views on Empire2010 at the current time?</p>
            <p>Well, at the moment Empire2010 is looking strong. Now Fenchurch has got the basics of the game up and running, the game is really enjoyable. Staff are great. Players are tough. What more does a mafia game need?</p>
            <p class="style3">Are their any features in Empire 2010 that you think are bad, or don't suit it?</p>
            <p>As I look down the list. To be honest with you I cant see anything that looks like its useless or unused. But for the sake of having to pick one, Id say the &quot;Restaurant&quot; and &quot;Energy&quot; feature. It brings realism to the game because obviously in real life you lose energy. But personally I think it gets annoying and un-needed.</p>
            <p class="style3">Why did you give up your post as Admin? You had power, you were responsible, very helpful etc.</p>
            <p>This can go in article would be nice for people to see my point of view. Well as an admin, I loved trying to fix bugs that occurred. My best use was using the database to complete all the requests people needed that could only be done in the database. I think I was liked for that, as I was the only person that ever did it for them. But then one day an incident occurred. There was an exploiter gaining rank etc. He has now been banned, but since then I had database access taken away from me because of various things, most of them was not true but I do admit to having fun on Harlems slots, and I say that proudly. I don&rsquo;t like keeping secrets so that&rsquo;s out in the open now. After that I was an admin fixing things in Notepad and had EXACTLY the same privileges a Moderator did. The staff page no longer contained my username on there, Edition 2 article had my name missing off it (You weren&rsquo;t sure whether I was still Admin) But at the time I was. Eventually it really did feel like I wasn&rsquo;t being acknowledged as an Admin, so I decided to return to a normal player. Yes you may have guessed I&rsquo;m still hassled by players about various things and decisions I made, to this minute of writing this topic my experience on Empire2010 is NOT enjoyable at all.</p>
            <p>Hope that was detailed enough</p>
            <p>Thanks ~Valefor</p>
            <p>So as you can see, being an Admin, isn&rsquo;t easy at all. It can buy you hate from players, and also false friendship. All in all, being a normal player is a lot, lot easier then an Empire 2010 staff. We&rsquo;ll leave Admin&rsquo;s lives to the experts! </p>
            <p>I also managed to get an interview with Fenchurch, as well as some points about his life.<br>
            </p>
            <p>Fenchurch in his true form &ndash; Be careful, annoy him, and he&rsquo;ll find where you live, rape your face, shoot you in the head AND set you on fire if your still alive. Whoa!</p>
            <p>Real name: Tom (not revealing last name)</p>
            <p>Age: 16</p>
            <p>Country: England </p>
            <p>Hobbies: Football of course as well as going out.</p>
            <p>Friends: campfreddy (there are more, but there wasn&rsquo;t any point naming their real names)</p>
            <p>Dislike&rsquo;s: People touching their eyes</p>
            <p class="style2">Fenchurch, you've put in a massive amount in Empire 2010. Now that the 'kill' feature is up, what do you have in mind next?</p>
            <p>Well Kill was the main thing I knew I had to get done, at the very moment I&rsquo;m finishing the helpdesk and will be soon recruiting HDOs, I&rsquo;m also going to fix crew forums, street race and start work on some more casinos and other features players have in mind.</p>
            <p class="style2">Will you be recruiting any more Admins or Mod's? Do you feel you may need to in the future?</p>
            <p>Currently, I'm managing to cope with code work with the help of Grizz, as for the Mod situation I have 4 at the moment, although 1 is on holiday, I can see myself needing to hire more in the future as the game grows, but as for now I&rsquo;ve got a good team.</p>
            <p class="style2">How do you plan on finding Hdo's for Empire 2010?</p>
            <p>At the moment I&rsquo;m not to sure to be honest, I&rsquo;ve never been in the situation before. I will most probably choose players that I know and trust and that have played Empire since the start.</p>
            <p class="style2">Are you planning any major features for Empire 2010 in the future?</p>
            <p>Well there some idea I&rsquo;ve got stored away which ill integrate as the game progresses, major ones to do soon would be Roulette and Blackjack, I&rsquo;m also thinking of another big feature which is kind of like a lottery but not. Basically there is a safe, i.e. the thing u keep money in. There is a random 3 digit code to open the safe, it costs 50k for 1 code, every time someone buys a code 50k gets added to 
              the pot, but when someone gets the correct code they take it all and its back to 0 and a new code!</p>
            <p>Once again, thank you for your time Fenchurch.<br>
            </p>
            <p>Until next time readers!</p>
            <p><span class="style2">~Phoenixflame</span><br>
            </p>
            <p><br>
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

