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



function Logout (){
	var del = confirm("Logging Out - Thanks For Playing, Come back soon!");
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
-->
body {background-color: #454545}
a{text-decoration:none; color:white; font-size: 10px;}
a:link{text-decoration:none; color:white; font-size: 10px;}
a:visited{text-decoration:none; color:white; font-size: 10px;}
a:hover{text-decoration:none; color:red; font-size: 10px;}
a:active{text-decoration:none color:white;
	font-size: 10px;
	text-decoration: none;
	color: red;
}
.style3 {color: #FFFFFF; font-weight: bold; }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><table width="100%" height="1081" border="0" align=top cellpadding="0" cellspacing="2">
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td background="includes/grad.jpg"> 
           <div align="center" class="style3">Main</div>
            </td>
        </tr>
        <tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="main.php" target="middle" class="style2">[x]News</a></td>
        </tr>
		 <tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="screens.php" target="middle" class="style2">[x]</a><span class="style2">FAQ</span></td>
        </tr>
		<tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="poll.php" target="middle" class="style2">[x]Poll</a></td>
        </tr>
        <tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="countrys.php" target="middle" class="style2">[x]Countries</a></td>
        </tr>
        <tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="Dailnews.php" target="middle" class="style2">[x]Updates
            </a></td>
        </tr>
        <?php if ($fetch->helper != "0"){
echo "
  <tr> 
    <td><a href=\"hDocP.php\" target=\"middle\">HDO Tools</a></td>
  <tr>";
}
?> 
     <?php if ($fetch->userlevel != "0"){
echo "
  <tr> 
    <td><a href=\"dice/logged_in.php\" target=\"midde\" >Staff Tools</a></td>
  <tr>";
}
?> 
   <?php if ($fetch->userlevel != "0"){
echo "
  <tr> 
    <td><a href=\"oeticket2.php\" target=\"midde\" >Points Requests</a></td>
  <tr>";
}
?> 
       
<?php if ($fetch->editor != "0"){
echo "
  <tr> 
    <td><a href=\"paperCP.php\" target=\"middle\">»NewsPaper CPanel</a></td>
  <tr>";
}
?>
        <tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="online.php" target="middle" class="style2">[x]Users Online</a></td>
        </tr>
                <tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="stats.php" target="middle" class="style2">[x]Statistics</a></td>
        </tr>
				</table>
				
				<tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td align="center" background="includes/grad.jpg"><div align="center" class="style3">Misc</div></td>
        </tr>
        <tr>
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="advertz.php" target="middle" class="style2">[x]Advertise</a></td>
        </tr>
        <tr> 
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="points.php" target="middle" class="style2">[x]Buy Points </a></td>
        </tr>
        <tr> 
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="ticket2.php" target="middle" class="style2">[x]Points Request </a></td>
        </tr>
        <tr> 
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="top20.php" target="middle" class="style2">[x]Top 25 Players</a></td>
	    <tr> 
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="jail.php" target="middle" class="style2">[x]Jail</a></td>
        </tr>
		<tr> 
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="ticket.php" target="middle" class="style2">[x]The Mafia Times </a></td>
        </tr>
        
        <?php if ($fetch->crew != "0"){ echo "  <tr> <td> <a href=crewtest.php target=middle>[x]Crew Forum</a><br></td>
  </tr>"; } ?>
		
      </table></td>
  </tr>
  	<tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td align="center" background="includes/grad.jpg"><div align="center" class="style3">Users</div></td>
        </tr>
        <tr>
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="advertz.php" target="middle" class="style2">[x]Edit Profile </a></td>
        </tr>
        <tr> 
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="points.php" target="middle" class="style2">[x]Add Friends </a></td>
        </tr>
        <tr> 
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="ticket2.php" target="middle" class="style2">[x]Find Users </a></td>
        </tr>
		<tr> 
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="attemps.php" target="middle" class="style2">[x]Kill Attempts </a></td>
        </tr>
        <tr> 
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="top20.php" target="middle" class="style2">[x]Grave Yard</a></td>
	    
        
        <?php if ($fetch->crew != "0"){ echo "  <tr> <td> <a href=crewtest.php target=middle>[x]Crew Forum</a><br></td>
  </tr>"; } ?>
		
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td align="center" background="includes/grad.jpg"><div align="center" class="style3">Messaging</div></td>
        </tr>
        <tr>
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="inbox.php" target="middle" class="style2">[x]Inbox</a></td>
        </tr>
        <tr> 
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="saved.php" target="middle" class="style2">[x]Saved</a></td>
        </tr>
        <tr> 
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="send.php" target="middle" class="style2">[x]Send 
            message</a></td>
        </tr>
        <tr> 
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="forum_frame.php?forum=main" target="middle" class="style2">[x]Game 
            Forum</a></td>
	    <tr> 
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="forum_frame.php?forum=off" target="middle" class="style2">[x]Off Topic Forum</a></td>
        </tr>
		<tr> 
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="ticket.php" target="middle" class="style2">[x]HelpDesk</a></td>
        </tr>
		<tr> 
          <td bordercolor="#454545" class="submit" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="hdo_stats.php" target="middle" class="style2">[x]HelpDesk Stats</a></td>
        </tr>
        
        <?php if ($fetch->crew != "0"){ echo "  <tr> <td> <a href=crewtest.php target=middle>[x]Crew Forum</a><br></td>
  </tr>"; } ?>
		
      </table></td>
  </tr>
   <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td background="includes/grad.jpg"><div align="center" class="style3">Money</div></td>
        </tr>
        <tr>
        <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="crime.php" target="middle" class="style2">[x]Crimes</a></td>
      </tr>
	  <tr>
        <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="chase.php" target="middle" class="style2">[x]Getaway</a></td>
      </tr>
	   
	    <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="jack.php" target="middle" class="style2">[x]Grand Theft Auto </a></td>
      </tr>
      <tr>
        <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="drugs.php" target="middle" class="style2">[x]Drugs</a></td>
      </tr>
            <tr>
        <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onMouseOut="this.style.background='';"><p class="style2"><a href="bank.php" target="middle">[x]The Bank </a></td>
		 <tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="missions.php" target="middle" class="style2">[x]Missions</a></td>
        </tr>
		 <tr>
        <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="oc.php" target="middle" class="style2">[x]Organised Crime </a></td>
      </tr>
	  <tr>
        <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="stocks.php" target="middle" class="style2">[x]Stock Market</a></td>
      </tr>
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
      <tr>
        <td background="includes/grad.jpg"><div align="center" class="style3">DownTown</div></td>
      </tr>
	  <tr>
        <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="fly.php" target="middle" class="style2">[x]Airport</a></td>
      </tr>
      <tr>
        <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="bf.php" target="middle" class="style2">[x]Bullet Factory </a></td>
      </tr>
     
     	
	  
      
      
      <tr>
        <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onMouseOut="this.style.background='';"><a href="crews.php" target="middle" class="style2">[x]Crews</a></td>
      </tr>
		 <tr> 
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="bar.php" target="middle" class="style2">[x]The 
            Bar</a></td>
        </tr>
        <tr> 
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="hospital.php" target="middle" class="style2">[x]The 
            Hospital</a></td>
        </tr><tr> 
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="kill.php" target="middle" class="style2">[x]Kill</a></td>
	    <tr> 
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="hitlist.php" target="middle" class="style2">[x]Hitlist</a></td>
	    <tr> 
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="auctions.php" target="middle" class="style2">[x]Auctions</a></td>
	    <tr> 
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="buy.php" target="middle" class="style2">[x]Buy</a></td>
	    <tr> 
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="sell.php" target="middle" class="style2">[x]Sell</a></td>
    </table></td>
  </tr>
 
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td background="includes/grad.jpg"><div align="center" class="style3">Cars</div></td>
        </tr>
		<tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="garage.php" target="middle" class="style2">[x]Garage</a></td>
        </tr>
		<tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="streetracing.php" target="middle" class="style2">[x]Street Race</a></td>
        </tr>
		<tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="dealership.php" target="middle" class="style2">[x]Show Room </a></td>
        </tr>
		<tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="depot.php" target="middle" class="style2">[x]Modifications</a></td>
        </tr>
		
        
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td background="includes/grad.jpg"><div align="center" class="style3">Casinos 
            </div></td>
        </tr>
		<tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="keno.php" target="middle" class="style2">[x]Keno</a></td>
        </tr>
		<tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="race.php" target="middle" class="style2">[x]Race Track</a></td>
        </tr>
		<tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="dice.php" target="middle" class="style2">[x]Dice</a></td>
        </tr>
		<tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="roulette.php" target="middle" class="style2">[x]Roulette</a></td>
        </tr>
        <tr> 
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="slots.php" target="middle" class="style2">[x]Slots</a></td>
        </tr>
        <tr> 
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="blackjack.php" target="middle" class="style2">[x]Blackjack</a></td>
        </tr>
		 <tr> 
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="scratchcard.php" target="middle" class="style2">[x]Scratch Cards </a></td>
        </tr>
		<tr> 
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="lotto.php" target="middle" class="style2">[x]Lottery</a></td>
        </tr>
		
        
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="#000000">
        <tr> 
          <td bordercolor="#454545" background="includes/grad.jpg"> <div align="center" class="style3">Other</div></td>
        </tr>


       
        <tr> 
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="notes.php" target="middle" class="style2">[x]Note Pad</a></td>
        </tr><tr> 
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="tos.php" target="middle" class="style2">[x]Terms Of Service</a></td>
        </tr>
        <tr>
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"><a href="referral.php" target="middle" class="style2">[x]Referral Prog</a></td>
        </tr>
       
        <tr> 
          <td bordercolor="#454545" onMouseOver="this.style.background='#454545'';this.style.cursor='hand';" onmouseout="this.style.background='';"> 
            <a href="javascript:Logout()" class="style2">[x]Logout</a></td>
        </tr>
      </table></td>
  </tr>
</table>
<div id="menu1"></div>


