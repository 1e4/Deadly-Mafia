<?php

session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

$username=$_SESSION['username'];

$viewuser=$_GET['viewuser'];



$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

?>

<head>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link href="includes/test.css" rel="stylesheet" type="text/css">



<title>Untitled Document</title>



</head>



<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">

<p>



<table width="150" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td bacground="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg"><table width="93%" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr><td>

<?php if ($fetch->userlevel != "3"){

echo "

  <tr>

    <td><a href=\"Admin/AdminCp.php\" target=\"main\"><b><center>Admin Control Panel</font></center></a></td>

  <tr>";

}

?>

<tr><td>

<?php if ($fetch->userlevel != "2"){

echo "

  <tr>

    <td><a href=\"headM.php\" target=\"main\"><b><center>Moderator Control Panel</a></td>

  <tr>";

}


?>

<tr><td>

<?php if ($fetch->userlevel != "1"){

echo "<tr>

    <td><a href=\"FmoDcP.php\" target=\"main\"><b><center>Forum Control Panel</a></td>

  <tr>";

}

?>

</tr>



            <tr><td height="20" background="includes/grad.jpg"><div align="center" class="style1">Information </div></td>

          </tr>

          <tr>

            <td bgcolor="#000000" class="style3">





			<a href="Dailnews.php" target="main">&gt; News</a><br />

              <a href="faq.php" target="main">&gt; FAQ</a><br />

              <a href="online.php" target="main">&gt; Users Online</a> <br />

              <a href="search.php" target="main">&gt; Find Players</a><br />

              <a href="gamestats.php" target="main">&gt; Statistics</a><br />

              <a href="countrys.php" target="main">&gt; Domination</a><br />

              <a href="points.php" target="main">&gt; Points</a><br />

              <a href="hitlist.php" target="main">&gt; Hitlist</a><br />

			                <a href="top20.php" target="main">&gt; Most Wanted</a><br />

              <a href="mission1.php" target="main">&gt; Missions</a><br />

              <a href="user.php" target="main">&gt; Edit Profile</a><br />

              <a href="you.php" target="main">&gt; My Stats</a><br />

              <a href="notes.php" target="main">&gt; Notepad</a><br />



			                <a href="attempts.php" target="main">&gt; Attempts</a><br />

			                <a href="poll.php" target="main">&gt; Weekly Votes</a><br />





			  </td>

          </tr>

          <tr>

            <td height="20" background="includes/grad.jpg"><div align="center" class="style1">Communication</div></td>

          </tr>

          <tr>

            <td bgcolor="#000000" class="style3"><a href="inbox.php" target="main">&gt; Inbox</a><br />

              <a href="send.php" target="main">&gt; Send message</a><br />

              <a href="forum_frame.php?forum=main" target="main">&gt; Forum</a><br />

              <a href="ff2.php?forum=off" target="main">&gt; OC Forum</a><br />

              <a href="basic_table.php" target="main">&gt; Chat</a><br />

              <a href="ticket.php" target="main">&gt; Help Desk</a><br />

			  <a href="hdo_stats.php" target="main">&gt; HDOP Statistics</a><br />

              <a href="oeticket.php" target="main">&gt; HDOP Corner</a><br />

              <a href="crewforum.php" target="main">&gt; Crew Forum</a><br />

			  



			  </td>

          </tr>

          <tr>

            <td height="20" background="includes/grad.jpg" class="style1"><div align="center">Actions </div></td>

          </tr>

          <tr>

            <td bgcolor="#000000"><span class="style3"><a href="crime.php" target="main">&gt; Crimes</a><br />

                <a href="chase.php" target="main">&gt; Getaway</a><br />

                <a href="jack.php" target="main">&gt; GTA</a><br />

                <a href="jail.php" target="main">&gt; Jail</a><br />

                <a href="oc.php" target="main">&gt; OC</a><br />

                <a href="gym.php" target="main">&gt; Gym</a><br />

                <a href="ext.php" target="main">&gt; Extortion</a><br />

                <a href="drugs.php" target="main">&gt; Drug Cartel</a><br />

                <a href="fly.php" target="main">&gt; Travel</a><br />

                <a href="bf.php" target="main">&gt; Bullet Factory</a><br />

                <a href="bank.php" target="main">&gt; Bank</a><br />

                <a href="hospital.php" target="main">&gt; Hospital</a><br />

                <a href="kill.php" target="main">&gt; Search & Kill</a><br />

                <a href="saeeefe.php" target="main">&gt; Safehouse</a><br />

                <a href="crews.php" target="main">&gt; Crew</a><br />

                <a href="buy_crew.php" target="main">&gt; Make Crew</a><br />
                
                <a href="crew_cp.php" target="main">&gt; Crew Control Panel</a><br />
                
           		<a href="buy.php" target="main">&gt; Blackmarket</a><br />

                <a href="sauctions.php" target="main">&gt; Bidding Center</a><br />

                <a href="garage.php" target="main">&gt; Garage</a><br />

                <a href="streetracing.php" target="main">&gt; Street Race</a><br />

                <a href="dealership.php" target="main">&gt; Show Room</a><br />

                <a href="depot.php" target="main">&gt; Car Mods</a></span></td>

          </tr>

          <tr>

            <td height="20" background="includes/grad.jpg"><div align="center" class="style1">Gambling</div></td>

          </tr>

          <tr>

            <td bgcolor="#000000" class="style3"><a href="keno.php" target="main">&gt; Keno</a><br />

              <a href="blackjack.php" target="main">&gt; BlackJack</a><br />

              <a href="race.php" target="main">&gt; Race Track</a><br />

              <a href="roulette.php" target="main">&gt; Roulette</a><br />

              <a href="slots.php" target="main">&gt; Slots</a><br />

              <a href="lotto.php" target="main">&gt; Lottery</a><br/>

			  </tr></td>

            </table></td>

  </tr>

        </table></td>

      </tr>

          <tr>

            <td height="20" background="includes/grad.jpg"><div align="center" class="style1"> </div></td>

</table>

</body>

</html>

