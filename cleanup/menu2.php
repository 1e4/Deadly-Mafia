<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$viewuser=$_GET['viewuser'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
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



<style type="text/css">
<!--
.style2 {color: #0000FF}
.style2 {color: #FFFFFF}
.style3 {color: #000000}
-->
</style>
<table width="100%" height="1081" border="0" align=top cellpadding="0" cellspacing="2">
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td background="includes/grad.jpg"> 
            <div align="center"><strong>Main</strong> </div></div></td>
        </tr>
        <tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="main.php" target="middle"><span class="style3">&raquo;</span>News</a></td>
        </tr>
        <tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="countrys.php" target="middle"><span class="style3">&raquo;Countries</span></a></td>
        </tr>
        <tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="Dailnews.php" target="middle"><span class="style3">&raquo;</span>Daily Newspaper
            </a></td>
        </tr>
        <?php if ($fetch->userlevel != "0"){
echo "
  <tr> 
    <td><a href=\"MODcP.php\" target=\"middle\">»ModCp</a></td>
  <tr>";
}
?> 
       </tr> <?php if ($fetch->helper != "0"){
echo "
  <tr> 
    <td><a href=\"oeticket.php\" target=\"middle\">»HDO Corner</a></td>
  <tr>";
}
?>
        <tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="user.php" target="middle"><span class="style3">&raquo;Edit profile</span> </a></td>
        </tr>
        <tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="faq.php" target="middle" class="style3">&raquo;Faq</a> </td>
        <tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="search.php" target="middle"><span class="style3">&raquo;</span>Find Gangsters</a></td>
        </tr>
        <tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="online.php" target="middle"><span class="style3">&raquo;Gangsters Online</span></a></td>
        </tr>
        <tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="paper.php" target="middle"><span>&raquo;</span>Newspaper</a></td>
        </tr>
        <tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="stats.php" target="middle"><span class="style3">&raquo;Statistics</span></a></td>
        </tr>
        <tr> 
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="items.php" target="middle"><span class="style3">&raquo;Your items</span></a></td>
        </tr>
        <tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="crew.php" target="middle"><span class="style3">&raquo;Create A Crew </span></a></td>
        </tr>
		<tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="donate.php" target="middle"><span class="style3">&raquo;Donate</span></a></td>
        </tr>
		<tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="points.php" target="middle"><span class="style3">&raquo;Points</span></a></td>
        </tr>
		<tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="you.php" target="middle"><span class="style3">&raquo;Your Stats</span></a></td>
        </tr>
		<tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="paper.php" target="middle"><span class="style3">&raquo;The International</span></a></td>
        </tr>
		</table>
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td align="center" background="includes/grad.jpg"><div align="center">Messaging</div></td>
        </tr>
        <tr>
          <td bordercolor="#999999" class="submit" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="inbox.php" target="middle" class="style3">&raquo;Inbox</a></td>
        </tr>
        <tr> 
          <td bordercolor="#999999" class="submit" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="saved.php" target="middle"><span class="style3">&raquo;Saved</span></a></td>
        </tr>
        <tr> 
          <td bordercolor="#999999" class="submit" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="send.php" target="middle" class="style2"><span class="style3">&raquo;Send 
            message</span></a></td>
        </tr>
        <tr> 
          <td bordercolor="#999999" class="submit" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="forum_frame.php?forum=main" target="middle"><span class="style3">&raquo;Game 
            Forum</span></a></td>
	    <tr> 
          <td bordercolor="#999999" class="submit" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="forum_frame.php?forum=off" target="middle"><span class="style3">&raquo;Off Topic Forum </span></a></td>
        </tr>
        <tr> 
          <td bordercolor="#999999" class="submit" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="chat.php" target="middle" class="style3">&raquo;Mafia Club </a></td>
        </tr>
        <tr> 
          <td bordercolor="#999999" class="submit" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="includes/javchat/" target="_PARENT"><span class="style3">&raquo;Irc 
            Chat</span></a></td>
        </tr>
        <?php if ($fetch->crew != "0"){ echo "  <tr> <td> <a href=crewtest.php target=middle>&raquo;Crew Forum</a><br></td>
  </tr>"; } ?>
        <tr> 
          <td height="49" bordercolor="#999999" class="submit" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <p><a href="ticket.php" target="middle"><span class="style3">&raquo;Helpdesk</span></a></p>
          <p>&nbsp;</p></td>
        </tr>
		
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
      <tr>
        <td background="includes/grad.jpg"><div align="center">Actions and Outlets </div></td>
      </tr>
	  <tr>
        <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="fly.php" target="middle" class="style3">&raquo;Airport</a></td>
      </tr>
      <tr>
        <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="bf.php" target="middle" class="style3">&raquo;Bullets</a></td>
      </tr>
      <tr>
	    <tr>
        <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onMouseOut="this.style.background='';"><p><a href="safe.php" target="middle" class="style3">&raquo;Safehouse</a>
         </td>
      </tr>
      
      <tr>
        <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="mission.php" target="middle" class="style3">&raquo;Missions</a></td>
      </tr>
     
     	
	  
      <tr>
        <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="arm.php" target="middle"><span class="style3">&raquo;Arm Wrestling</span></a></td>
      </tr>
      <tr>
        <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="crews.php" target="middle" class="style3">&raquo;Crews</a></td>
      </tr>
	  
        <tr> 
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="streetracing.php" target="middle" class="style3">&raquo;Street 
            race</a></td>
        </tr>
        <tr> 
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="depot.php" target="middle"><span class="style3">&raquo;Car Modification </span></a></td>
        </tr>
        <tr> 
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="dealership.php" target="middle" class="style3">&raquo;Car Dealership </a></td>
        </tr>
		 <tr> 
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="bar.php" target="middle"><span class="style3">&raquo;The 
            Bar</span></a></td>
        </tr>
        <tr> 
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="hospital.php" target="middle"><span class="style3">&raquo;</span>The 
            Hospital</a></td>
        </tr>
		<tr> 
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="rest.php" target="middle"><span class="style3">&raquo;</span>The 
           Restraunt</a></td>
        </tr>
		<td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="attempt.php" target="middle"><span class="style3">&raquo;</span>Attempts</a></td>
        </tr>
        <tr> 
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="jail.php" target="middle"><span class="style3">&raquo;Jail</span></a> 
          </td>
	    <tr> 
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="kill.php" target="middle"><span class="style3">&raquo;Kill</span></a></td>
	    <tr> 
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="hitlist.php" target="middle"><span class="style3">&raquo;Hitlist</span></a></td>
	    <tr> 
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="auctions.php" target="middle"><span class="style3">&raquo;Auctions</span></a></td>
	    <tr> 
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="buy.php" target="middle"><span class="style3">&raquo;Buy</span></a></td>
	    <tr> 
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="sell.php" target="middle"><span class="style3">&raquo;Sell</span></a></td>
    </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td background="includes/grad.jpg"><div align="center">Money</div></td>
        </tr>
        <tr>
        <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="crime.php" target="middle"><span class="style3">&raquo;Crimes</span></a></td>
      </tr>
	  <tr>
        <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="chase.php" target="middle"><span class="style3">&raquo;Car Chase</span></a></td>
      </tr>
	   <tr>
        <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="ext.php" target="middle" class="style3">&raquo;Pickpocket</a></td>
      </tr>
	  <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="jack.php" target="middle"><span class="style3">&raquo;Steal A Car</span></a></td>
      </tr>
      <tr>
        <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="drugs.php" target="middle" class="style3">&raquo;Drugs</a></td>
      </tr>
            <tr>
        <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onMouseOut="this.style.background='';"><p><a href="bank.php" target="middle" class="style3">&raquo;National Bank</a>
         </td>
		 <tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="garage.php" target="middle"><span class="style3">&raquo;Garage</span></a></td>
        </tr>
		 <tr>
        <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="oc.php" target="middle"><span class="style3">&raquo;Organised Crime </span></a></td>
      </tr>
	  <tr>
        <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="stocks.php" target="middle" class="style3">&raquo;Stock Market</a></td>
      </tr>
	    <tr>
        <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="defuse.php" target="middle" class="style3">&raquo;Russian Roulette</a></td>
      </tr>
	  <tr>
        <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="swiss.php" target="middle"><span class="style3">&raquo;Swiss Bank</span></a></td>
      </tr>
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td background="includes/grad.jpg"><div align="center">Casinos 
            </div></td>
        </tr>
		<tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="keno.php" target="middle"><span class="style3">&raquo;Keno</span></a></td>
        </tr>
		<tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="race.php" target="middle"><span class="style3">&raquo;Race Track</span></a></td>
        </tr>
		<tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="roulette.php" target="middle"><span class="style3">&raquo;Roulette</span></a></td>
        </tr>
        <tr>
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="rps.php" target="middle"><span class="style3">&raquo;R 
            P S</span></a></td>
        </tr>
        <tr> 
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="slots.php" target="middle" class="style3">&raquo;Slots</a></td>
        </tr>
        
		<tr>
        </tr>
		<tr> 
          <td bordercolor="#999999" onMouseOver="this.style.background='white';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="lotto.php" target="middle" class="style3">&raquo;Lottery</a></td>
        </tr>
		
        
      </table></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
</table>
<div id="menu1"></div>


