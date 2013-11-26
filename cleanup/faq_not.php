<?php
session_start();
header("Cache-control: private"); 
include_once"includes/db_connect.php";

if (isset($_SESSION['username'])){
header("Location: logged_in.php");
exit();
}


if ($_POST['submit']){
$username = $_POST['username']; 
$password = $_POST['password'];
$username = strip_tags($username);
$password = strip_tags($password);
$ip = $REMOTE_ADDR;


$username=strtolower($username);

if((!$username) || (!$password)){ 
    echo "You have not submitted one or more fields <br />"; 
}else{



///check INFO
$sql = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password' AND activated='1' LIMIT 1"); 
$login_check = mysql_num_rows($sql); 
$inf = mysql_fetch_object($sql); 

if ($login_check > "0"){
if ($inf->status == "Dead"){
include_once"dead.php";
exit();

}
        ini_set(session.cookie_lifetime, "3600");
        session_register('username'); 
        $_SESSION['username'] = $inf->username; 
       

       
       
         $timestamp = time()+60; 
mysql_query("UPDATE users SET online='$timestamp' WHERE username='$username'");
        
mysql_query("UPDATE users SET l_ip='$domain' WHERE username='$username'");



        header("Location: logged_in.php"); 
   
} else { 
    echo "You could not be logged in.<br />"; 
    include_once 'index.php'; 
}}}
?> 


<HTML><HEAD><TITLE>MafiaWarz</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<type=text/css rel=stylesheet href=includes/trad1.css type=text/css>

<STYLE>
BODY {
	BACKGROUND-POSITION: right bottom;
	BACKGROUND-ATTACHMENT: fixed;
	BACKGROUND-IMAGE: ;
	BACKGROUND-REPEAT: no-repeat;
	background-color: #CCCCCC;
}
.style1 {
	color: #000000;
	font-weight: bold;
}
.style2 {
	color: #000044;
	font-size: 12px;
	font-weight: bold;
}
.style4 {color: #880000}
.style5 {color: #770000}
.style6 {color: #880000; font-size: 18px; }
.style7 {color: #000000; font-size: 12px; font-weight: normal; }
</STYLE>

<META content="MSHTML 6.00.2900.2604" name=GENERATOR></HEAD>
<BODY bottomMargin=0 leftMargin=0 topMargin=0 
onload="if(window.top != window.self)top.location='game-login.php'" 
rightMargin=0>
<TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR height=100>
    <TD>
      <TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD vAlign=bottom>
            <H1><img src="images/tst1.jpg" width="986" height="99"> </H1>
            <TABLE height=20 cellSpacing=0 cellPadding=0 
            background="" 
            border=0>
              <TBODY>
              <TR>
                <TD 
                width=149 align="middle" bgcolor="#999999" onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='#999999';"
                style="BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid"><A 
                  title="Welcome" 
                  href="http://www.mafiawarz.com"><FONT color=#000000><B>About 
                  mafia warz</B></FONT></A></TD>
                <TD 
                width=149 align="middle" bgcolor="#999999" onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='#999999';"
                style="BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid"><A 
                  title="Register now for free! " 
                  href="login.php"><FONT 
                  color=#000000><strong>Login</strong></FONT></A></TD>
                <TD 
                width=149 align=middle bgcolor="#999999" onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='#999999';"
                style="BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid"><A 
                  title="Login!" 
                  href="register.php"><FONT 
                  color=#000000><strong>Register</strong></FONT></A></TD>
              </TR></TBODY></TABLE></TD>
      </TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD style="BORDER-TOP: #000000 1px solid">
      <TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD vAlign=top width=160>
            <TABLE width=150 height="85" border=0 cellPadding=0 cellSpacing=0>
              <TBODY>
              <TR bgColor=#303030 height=20>
                <TD bgcolor="#999999" onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='#999999';" 
                style="BORDER-RIGHT: #000000 1px solid; BORDER-BOTTOM: #000000 1px solid"><span class="style2"><a href="http://www.mafiawarz.com"> Welcome</a></span></TD>
              </TR>
              <TR bgColor=#303030 height=20>
                <TD bgcolor="#999999" onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='#999999';" 
                style="BORDER-RIGHT: #000000 1px solid; BORDER-BOTTOM: #000000 1px solid"><A 
                  href="story.php" 
                  title="Read the story" class="style2">The Story</A></TD>
              </TR>
              <TR bgColor=#303030 height=20>
                <TD bgcolor="#999999" onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='#999999';" 
                style="BORDER-RIGHT: #000000 1px solid; BORDER-BOTTOM: #000000 1px solid"><a href="faq_not.php" class="style2">F.A.Q</a></TD>
              </TR>
              <TR bgColor=#303030 height=20>
                <TD bgcolor="#999999" onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='#999999';" 
                style="BORDER-RIGHT: #000000 1px solid; BORDER-BOTTOM: #000000 1px solid"><a href="contact.php" class="style2">Contact</a></TD>
              </TR>
              <TR bgColor=#303030 height=20>
                <TD height="21" bgcolor="#999999" onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='#999999';" 
                style="BORDER-RIGHT: #000000 1px solid; BORDER-BOTTOM: #000000 1px solid"><a href="screens.php" class="style2">Screen shots </a></TD>
              </TR></TBODY></TABLE>
            <BR></TD>
          <TD width="830" vAlign=top>
            <TABLE cellSpacing=0 cellPadding=0 align=right border=0>
              <TBODY>
              <TR height=20>
                <TD width=25></TD></TR></TBODY></TABLE>
            <BR>
            <TABLE width="99%">
              <!--DWLayoutTable-->
              <TBODY>
              <TR vAlign=top>
                <TD width="747" height="184" valign="top" style="TEXT-ALIGN: justify">
                  <BLOCKQUOTE style="MARGIN: 10px">
                      <H1 align="center" class="style6">FAQ (To be updated) </H1>
                      <p align="center">General<br>
  +Site Updates<br>
  +Gangsters Online<br>
  +G News<br>
  +Your Crew<br>
  +Find Gangster<br>
  +Airport<br>
  +The park <br>
  +Kill<br>
  +The Underground<br>
  +Sell<br>
  +Most Wanted <br>
  +Territory<br>
  +Donate<br>
  +Countries<br>
  +Attempts<br>
  +The penitentiary <br>
  +The Restaurant</p>
                      <p align="center"><br>
  Work</p>
                      <p align="center">+Company<br>
  +Job<br>
  +Employers<br>
  +Income/Outcome<br>
  +Start a Company </p>
                      <p align="center">Communication </p>
                      <p align="center">+Inbox<br>
  +Saved<br>
  +Send message<br>
  +Main Forum<br>
  +Crew Forum</p>
                      <p align="center"><br>
  Crime Scene </p>
                      <p align="center">+Ammo Hut <br>
  +Car Jack<br>
  +Drugs<br>
  +Garage<br>
  +Crimes<br>
  +Bank<br>
  +Missions<br>
  +Oc<br>
  +Getaway<br>
  +Extortion</p>
                      <p align="center"><br>
  Cars </p>
                      <p align="center">+Street race<br>
  +Tha Depot<br>
  +Dealership</p>
                      <p align="center"><br>
  Casino </p>
                      <p align="center">+Russian Roulette<br>
  +R P S<br>
  +Slots<br>
  +Race Track<br>
  +BlackJack<br>
  +Roulette<br>
  +Lottery<br>
  +Chance</p>
                      <p align="center">User</p>
                      <p align="center">+Your Profile <br>
  +Your Stats<br>
  +Rank Bar<br>
  +Main<br>
  +Faq<br>
  +Statistics <br>
  +Clock tower <br>
  +logout</p>
                      <p align="center"><br>
  -------------------------------------------------------------------------------------------</p>
                      <p align="center">Site Updates :</p>
                      <p align="center">This is where you find out the latest updates done to the game.</p>
                      <p align="center">-------------------------------------------------------------------------------------------</p>
                      <p align="center">Gangsters Online :</p>
                      <p align="center">This is where you can view who is online ( For 5 minutes )</p>
                      <p align="center">-------------------------------------------------------------------------------------------</p>
                      <p align="center">G News :</p>
                      <p align="center">This is the games newspaper: it is full of interviews, stories, advertisements, etc. <br>
  It comes out in editions and is written by an Editor.</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Your Crew :</p>
                      <p align="center">This is where you can manage your OWN crew ; This is where you can view the crew you are in.</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Find Gangster :</p>
                      <p align="center">This is where you can search for a player.</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Airport :</p>
                      <p align="center">This is where you can travel to different destinations in the game.<br>
  if you own the airport you can control what price you are charging for the journey.</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">The Park :</p>
                      <p align="center">This is where you can trade drugs with other players of the game.</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Kill :</p>
                      <p align="center">This is where you search and kill any player on the game.<br>
  If you fail you have to wait for four hours until you can shoot that person again.</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">The Underground :</p>
                      <p align="center">This is where you can buy various items (Weapons, Protection, etc.).</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Sell :</p>
                      <p align="center">This is where you can sell various items in exchange for money.</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Most Wanted :</p>
                      <p align="center">This is a list of people who are wanted dead and you will be rewarded with cash if you succeed. <br>
  You can add someone to the list.</p>
                      <p align="center">-----------------------------------------------------------------------------------------------</p>
                      <p align="center">Territory :</p>
                      <p align="center">This is where you buy territory and you can attack someone else.<br>
  After a period of time you will receive money you have made when people have stayed in your territory.</p>
                      <p align="center">------------------------------------------------------------------------------------------------</p>
                      <p align="center">Donate :</p>
                      <p align="center">Pretty Obvious. Donate REAL money in exchange for items on the game.</p>
                      <p align="center">------------------------------------------------------------------------------------------------</p>
                      <p align="center">Countries :</p>
                      <p align="center">You can see who owns what businesses, casinos and bullet factories.</p>
                      <p align="center">----------------------------------------------------------------------------------------------------</p>
                      <p align="center">Attempts :</p>
                      <p align="center">Last Attempts on your life. And last attempts on killing someone.</p>
                      <p align="center">----------------------------------------------------------------------------------------------------</p>
                      <p align="center">The Penitentiary :</p>
                      <p align="center">A jail for people who got caught doing crimes etc..</p>
                      <p align="center">---------------------------------------------------------------------------------------------</p>
                      <p align="center">The Restaurant :</p>
                      <p align="center">This is where you can buy snacks to make your health rise.</p>
                      <p align="center">---------------------------------------------------------------------------------------------</p>
                      <p align="center">WORK</p>
                      <p align="center">---------------------------------------------------------------------------------------------</p>
                      <p align="center">Company : ********** Here **************</p>
                      <p align="center">------------------------------------------------------------------------------------------------</p>
                      <p align="center">Job : ********** Here ************</p>
                      <p align="center">-----------------------------------------------------------------------------------------------</p>
                      <p align="center">Employers : ************ Here *********</p>
                      <p align="center">---------------------------------------------------------------------------------------------</p>
                      <p align="center">Income/Outcome : *********** Here ********</p>
                      <p align="center">---------------------------------------------------------------------------------------------</p>
                      <p align="center">Start a Company : ********** Here **********</p>
                      <p align="center">---------------------------------------------------------------------------------------------</p>
                      <p align="center">COMMUNICATION</p>
                      <p align="center">---------------------------------------------------------------------------------------------</p>
                      <p align="center">Inbox :</p>
                      <p align="center">This is where you can view all your messages from other members.</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Saved :</p>
                      <p align="center">This is where all your saved messages are so you can view them again.</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Send Message :</p>
                      <p align="center">This is where you can send messages to other members.</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Main Furum :</p>
                      <p align="center">This is where all the members in the game can talk to each other.</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Crew Furum :</p>
                      <p align="center">This is where if you are in a crew you can talk to members who are in the same crew as yours.</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">CRIME SCENE</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Ammo Hut :</p>
                      <p align="center">This is where you can buy bullets / ammo to kill players on the game.</p>
                      <p align="center">-------------------------------------------------------------------------------------------</p>
                      <p align="center">Car Jack :</p>
                      <p align="center">This is where you can rob Cars ; IT HELPS YOU RANK.</p>
                      <p align="center">-------------------------------------------------------------------------------------------</p>
                      <p align="center">Drugs :</p>
                      <p align="center">This is where you can buy drugs so you can sell it in another country for profit.</p>
                      <p align="center">-------------------------------------------------------------------------------------------</p>
                      <p align="center">Garage :</p>
                      <p align="center">This is where you can sell / drop or show info of the car selected.</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Crimes :</p>
                      <p align="center">This is where you can do petty crimes and earn a small amount of cash. THIS HELPS YOU RANK.</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Bank :</p>
                      <p align="center">This is where you can withdraw / deposit and send money to other members but it will take of 10%<br>
  The point of depositing money is so you can receive 10% of how much you put in and also stop <br>
  you from getting extorted.</p>
                      <p align="center">------------------------------------------------------------------------------------------------</p>
                      <p align="center">Missions :</p>
                      <p align="center">This is where you can do little missions to help you rank and to earn some cash.</p>
                      <p align="center">----------------------------------------------------------------------------------------------</p>
                      <p align="center">Oc :</p>
                      <p align="center">An Oc is when a group of 4 people join together to do a big bank job this consists on<br>
  a weapons expert, demolition expert a driver and the leader.<br>
  There is a nice amount of money to be earned here and good ranking so take your shot :).</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Getaway :</p>
                      <p align="center">This is where two people join together and do a small OC.</p>
                      <p align="center">---------------------------------------------------------------------------------------------</p>
                      <p align="center">Extortion :</p>
                      <p align="center">This is where you have a chance to make some good money by robbing other members. :) </p>
                      <p align="center">BUT THE CHANCES ARE SLIM!</p>
                      <p align="center">-----------------------------------------------------------------------------------------------</p>
                      <p align="center">CARS</p>
                      <p align="center">---------------------------------------------------------------------------------------------</p>
                      <p align="center">Street Race :</p>
                      <p align="center">This is where you can test You car see if it really deserves to be on the road.<br>
  Race members for money :)</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Tha Depot:</p>
                      <p align="center">This is where you can kit up your car to the full by buying spoilers, motor upgrades esc.</p>
                      <p align="center">---------------------------------------------------------------------------------------------</p>
                      <p align="center">Dealership :</p>
                      <p align="center">This is where you can buy or sell your car.</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">CASINO</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Russian Roulette :</p>
                      <p align="center">This is a VERY dangerous game to play as you are risking you life for a random sum of money pull the trigger and try your luck!!<br>
  You have to be ranked BOSS to play.</p>
                      <p align="center">THIS WILL KILL YOUR ACCOUNT IF YOU LOOSE SO DONT COMPLAIN!!</p>
                      <p align="center">-------------------------------------------------------------------------------------------------</p>
                      <p align="center">R P S ( Rock Paper Scissors ):</p>
                      <p align="center">R P S is just a simple rock paper scissors game bet some money and have a go :).</p>
                      <p align="center">---------------------------------------------------------------------------------------------</p>
                      <p align="center">Slots :</p>
                      <p align="center">This is your normal slot game bet some money and pull the handle :)</p>
                      <p align="center">---------------------------------------------------------------------------------------------</p>
                      <p align="center">Race Track :</p>
                      <p align="center">This is your local race track bet on the dogs and horses and try your luck :)</p>
                      <p align="center">--------------------------------------------------------------------------------------------</p>
                      <p align="center">Blackjack :</p>
                      <p align="center">Bet on a good game of cards and see if you have the winning hand :)</p>
                      <p align="center">---------------------------------------------------------------------------------------------</p>
                      <p align="center">Roulette :</p>
                      <p align="center">Watch the ball spin as you bet money on a number, colour or odd and even numbers Good Luck!</p>
                      <p align="center">----------------------------------------------------------------------------------------------</p>
                      <p align="center">Lottery :</p>
                      <p align="center">This is the famous lottery this is where most of the members on game buy some tickets to try there luck at winning the big lotto jackpot :)</p>
                      <p align="center">-----------------------------------------------------------------------------------------------</p>
                      <p align="center">Chance : ****************** Chance Here *******************</p>
                      <p align="center">------------------------------------------------------------------------------------------------</p>
                      <p align="center">USER</p>
                      <p align="center">----------------------------------------------------------------------------------------------</p>
                      <p align="center">Your Profile :</p>
                      <p align="center">This is where you control your whole user you can change your password, skins of the game, <br>
  your quote esc.</p>
                      <p align="center">----------------------------------------------------------------------------------------------</p>
                      <p align="center">Your Stats :</p>
                      <p align="center">This is where you can view how much money and what rank you are on THIS IS WHERE ALL YOUR INFO IS ON YOUR USER!</p>
                      <p align="center">-----------------------------------------------------------------------------------------------------</p>
                      <p align="center">Rank Bar :</p>
                      <p align="center">This is where you can view how much % you have left to the next rank.</p>
                      <p align="center">----------------------------------------------------------------------------------------------------</p>
                      <p align="center">Main :</p>
                      <p align="center">This leads you to the games main page.</p>
                      <p align="center">---------------------------------------------------------------------------------------------</p>
                      <p align="center">FAQ :</p>
                      <p align="center">This is what tells you about the game.</p>
                      <p align="center">------------------------------------------------------------------------------------------------------</p>
                      <p align="center">Statistics :</p>
                      <p align="center">This shows information about the game like the last 10 signup's and how much money is in the game esc.</p>
                      <p align="center">-------------------------------------------------------------------------------------------------------</p>
                      <p align="center">Clock Tower :</p>
                      <p align="center">This is where you can view the date and time.</p>
                      <p align="center">--------------------------------------------------------------------------------------------------------</p>
                      <p align="center">Logout :</p>
                      <p align="center">This is where you can log out of the game. ( Do you really want to )</p>
                      <p align="center">--------------------------------------------------------------------------------------------------------</p>
                      <p align="center"><br>
  RANKS HERE ******************************************</p>
                      <p align="center"></p>
                      <p align="center">-------------------------------------------------------------------------------------------------</p>
                      <p align="center">MONEY STATEMENTS HERE *********************************</p>
                      <p align="center">-------------------------------------------------------------------------------------------------</p>
                      <p align="center">Smilies</p>
                      <div align="center">
                        <table width="610" border="0">
                            <tr>
                              <td width="59">:sup:</td>
                              <td width="32"><img src="Smiles\thumbsup.gif"></td>
                              <td width="386">&nbsp;</td>
                              <td width="65">:lmao:</td>
                              <td width="46"><img src="Smiles\lmao.gif"></td>
                            </tr>
                            <tr>
                              <td>:D</td>
                              <td><img src="Smiles\v.happy.gif"></td>
                              <td>&nbsp;</td>
                              <td>:|</td>
                              <td><img src="Smiles\roll.gif"></td>
                            </tr>
                            <tr>
                              <td>:P</td>
                              <td><img src="Smiles\tongue.gif"></td>
                              <td>&nbsp;</td>
                              <td>:hang:</td>
                              <td><img src="Smiles\hang.gif"></td>
                            </tr>
                            <tr>
                              <td>:%</td>
                              <td><img src="Smiles\pukeface.gif"></td>
                              <td>&nbsp;</td>
                              <td>:tut:</td>
                              <td><img src="Smiles\naughty.gif"></td>
                            </tr>
                            <tr>
                              <td>:!:</td>
                              <td><img src="Smiles\!.gif"></td>
                              <td>&nbsp;</td>
                              <td>:beer:</td>
                              <td><img src="Smiles\burp.gif"></td>
                            </tr>
                            <tr>
                              <td>:)</td>
                              <td><img src="Smiles\smile.gif"></td>
                              <td>&nbsp;</td>
                              <td>:buck:</td>
                              <td><img src="Smiles\buckfush.gif"></td>
                            </tr>
                            <tr>
                              <td>:(</td>
                              <td><img src="Smiles\sad.gif"></td>
                              <td>&nbsp;</td>
                              <td>:dry:</td>
                              <td><img src="Smiles\dry.gif"></td>
                            </tr>
                            <tr>
                              <td>:8</td>
                              <td><img src="Smiles\cool.gif"></td>
                              <td>&nbsp;</td>
                              <td>:omg:</td>
                              <td><img src="Smiles\ohmy.gif"></td>
                            </tr>
                            <tr>
                              <td>:chair:</td>
                              <td><img src="Smiles\chair.gif"></td>
                              <td>&nbsp;</td>
                              <td>:oops:</td>
                              <td><img src="Smiles\oops.gif"></td>
                            </tr>
                            <tr>
                              <td>:ha:</td>
                              <td><img src="Smiles\laugh.gif"></td>
                              <td>&nbsp;</td>
                              <td>:cheers:</td>
                              <td><img src="Smiles\cheers.gif"></td>
                            </tr>
                            <tr>
                              <td>:hm:</td>
                              <td><img src="Smiles\wacko.gif"></td>
                              <td>&nbsp;</td>
                              <td>:blush</td>
                              <td><img src="Smiles\blush.gif"></td>
                            </tr>
                            <tr>
                              <td>;)</td>
                              <td><img src="Smiles\wink2.gif"></td>
                              <td>&nbsp;</td>
                              <td>:boxer:</td>
                              <td><img src="Smiles\box.gif"></td>
                            </tr>
                            <tr>
                              <td>:coffee:</td>
                              <td><img src="Smiles\coffee.gif"></td>
                              <td>&nbsp;</td>
                              <td>:hug:</td>
                              <td><img src="Smiles\hug.gif"></td>
                            </tr>
                            <tr>
                              <td>:ninja:</td>
                              <td><img src="Smiles\ninja.gif"></td>
                              <td>&nbsp;</td>
                              <td>:alcoholic:</td>
                              <td><img src="Smiles\alcoholic.gif"></td>
                            </tr>
                            <tr>
                              <td>:bnna:</td>
                              <td><img src="Smiles\bnna.gif"></td>
                              <td>&nbsp;</td>
                              <td>:banned:</td>
                              <td><img src="Smiles\banned.gif"></td>
                            </tr>
                            <tr>
                              <td>:bastard:</td>
                              <td><img src="Smiles\bastard.gif"></td>
                              <td>&nbsp;</td>
                              <td>:beye:</td>
                              <td><img src="Smiles\beye.gif"></td>
                            </tr>
                            <tr>
                              <td>:fuk:</td>
                              <td><img src="Smiles\fuk.gif"></td>
                              <td>&nbsp;</td>
                              <td>:help:</td>
                              <td><img src="Smiles\help.gif"></td>
                            </tr>
                            <tr>
                              <td>:huh:</td>
                              <td><img src="Smiles\huh.gif"></td>
                              <td>&nbsp;</td>
                              <td>:nono:</td>
                              <td><img src="Smiles\nono.gif"></td>
                            </tr>
                            <tr>
                              <td>:spite:</td>
                              <td><img src="Smiles\spite.gif"></td>
                              <td>&nbsp;</td>
                              <td>:superman:</td>
                              <td><img src="Smiles\superman.gif"></td>
                            </tr>
                            <tr>
                              <td>:taunt:</td>
                              <td><img src="Smiles\taunt.gif"></td>
                              <td>&nbsp;</td>
                              <td>:yahoo:</td>
                              <td><img src="Smiles\yahoo.gif" /></td>
                            </tr>
                                              </table>
                      </div>
                      <p align="center">smilie list made by ceptic (more to come soon) </p>
                      <div align="center">HOPE THIS HELPS AND ENJOY!!!
                      </div>
                      <p align="center"></p>
                      <p align="center"><br>
  Created By Bloodomen999</p>
                      <H1 align="center" class="style7">&nbsp;</H1>
                      </BLOCKQUOTE></TD>
                <TD width="63">&nbsp;</TD>
              </TR>
              </TBODY></TABLE>
      <BLOCKQUOTE></BLOCKQUOTE></TD></TR></TBODY></TABLE></TD>
  </TR>
  <TR>
    <TD 
    height=20 align=right bordercolor="#000000" bgcolor="999999"><A href="" target=_blank><FONT 
      color=#cccccc size=1></FONT></A>
      <CENTER>
      &copy;Kja-solutions gaming network All rights reserved
      </CENTER></TD>
</TR></TBODY></TABLE></BODY></HTML></form>
