<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$viewuser=$_GET['viewuser'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$usr=mysql_fetch_object(mysql_query("SELECT * FROM user_info WHERE username='$username'"));




if ($usr->lang == "English"){ include_once"includes/langs/English/menu.inc.php"; }elseif($usr->lang == "Dutch"){ include_once"includes/langs/Dutch/menu.inc.php"; }



?><head>
<script language="javascript">



function Ismell (){
	var del = confirm("Are you sure you want to log out?");
	if (del == true){
		var loc = "index.php?logout=yes";
		parent.top.location.href=loc;
	}
}
function Toggle(item) {
   obj=document.getElementById(item);
   visible=(obj.style.display!="none")
   key=document.getElementById("x" + item);
   if (visible) {
     obj.style.display="none";
   } else {
      obj.style.display="block";
   }
}
</script>



<link rel=stylesheet href=includes/in.css type=text/css>



<table width="100%" height="1081" border="0" align=top cellpadding="0" cellspacing="2">
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td background="includes/grad.jpg"> 
            <div align="center"><strong><?php echo "$_LANG[main]"; ?></strong> </div></div></td>
        </tr>
        <tr>
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="updates.php" target="middle"><span class="style3">&raquo;</span>Empire 2010 Updates </a></td>
        </tr>
        <?php if ($fetch->userlevel != "0"){
echo "
  <tr> 
    <td><a href=\"MODcP.php\" target=\"middle\">»$_LANG[modCP]</a></td>
  <tr>";
}
?>
        <tr> 
          <td  onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="online.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[online]"; ?></a></td>
        <tr> 
          <td  onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="paper.php" target="middle"><span>&raquo;</span><?php echo "$_LANG[TheInternational]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="poll.php" target="middle"><span class="style3">&raquo;</span>Vote ~ Coding</a></td>
        </tr>
        <tr> 
          <td  onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="crew.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[yourcrew]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="search.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[FindGangster]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="fly.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[airport]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="kill.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Kill]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="buy.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Undergrond]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="sell.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Sell]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="auctions.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Auctions]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="hitlist.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[mostwanted]"; ?></a></td>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="donate.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Donate]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="points.php" target="middle"><span class="style3">&raquo;</span>Buy 
            Points</a>sss</td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="countrys.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Countryies]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="attempt.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Attempts]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="jail.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Jail]"; ?></a> 
          </td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="rest.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[restaurant]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="bar.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Bar]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="hospital.php" target="middle"><span class="style3">&raquo;</span>Hospital</a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a target="middle"><span class="style3">&raquo;</span>Safe 
            House</a></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td align="center" background="includes/grad.jpg"><div align="center">Messages 
            </div></td>
        </tr>
        <tr>
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="inbox.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[inbox]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="saved.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Saved]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="send.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[send]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="forum_frame.php?forum=main" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Forum]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="chat.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[MafiaLounge]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="includes/javchat/" target="_PARENT"><span class="style3">&raquo;</span>Irc 
            Chat</a></td>
        </tr>
        <?php if ($fetch->crew != "0"){ echo "  <tr> <td> <a href=forum_frame.php?forum=crew target=middle>&raquo;$_LANG[CrewForum]</a><br></td>
  </tr>"; } ?>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="ticket.php" target="middle"><span class="style3">&raquo;</span>Helpdesk</a></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td background="includes/grad.jpg"><div align="center">Crime 
              scene</div></td>
        </tr>
        <tr>
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="bf.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[AmmoHut]"; ?></a> </td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="jack.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[CarJack]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="drugs.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Drugs]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="crime.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Crimes]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="bank.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Bank]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="swiss.php" target="middle"><span class="style3">&raquo;</span>Swiss 
            Bank</a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="mission.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Missions]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="oc.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[OC]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="Oc_2.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Getaway]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="ext.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Exstortion]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="arm.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Arm]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="bribe.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Bribery]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="turf.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Turf]"; ?></a></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td background="includes/grad.jpg"><div align="center">Cars 
            </div></td>
        </tr>
        <tr>
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="garage.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[garage]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="car_race.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Race]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="depot.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Depot]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="dealership.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[TheDealership]"; ?></a></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td background="includes/grad.jpg"><div align="center">Casino 
            </div></td>
        </tr>
        <tr>
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="rps.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[RPS]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="slots.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Slots]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="race.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[RaceTrack]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="lotto.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Lottery]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="Chance.php" target="middle"><span class="style3">&raquo;</span>Chance</a></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td background="includes/grad.jpg"> <div align="center">Your 
              Profile </div></td>
        </tr>
<tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="user.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[EditYourProfile]"; ?> 
           </a></td>
        </tr>

        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="you.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Stats]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="items.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Items]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="main.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Main]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="faq.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[FAQ]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="stats.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Gstats]"; ?></a> 
          </td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="referral.php" target="middle"><span class="style3">&raquo;</span><?php echo "$_LANG[Refferal]"; ?></a></td>
        </tr>
        <tr> 
          <td onmouseover="this.style.background='#CCCCCC';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="javascript:Ismell()"><span class="style3">&raquo;</span><?php echo "$_LANG[Logout]"; ?></a></td>
        </tr>
      </table></td>
  </tr>
</table>
<div id="menu1"></div>

