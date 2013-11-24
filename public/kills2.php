<?php 

include_once"includes/db_connect.php";

/* ---------------------------------------------------------------------------------------- */ 
/* ----------------------------------JAIL CHECK-------------------------------------------- */ 
/* ---------------------------------------------------------------------------------------- */ 

$result = mysql_query("SELECT jailed FROM user_stats WHERE username = '$u'"); 
$jailed = mysql_fetch_array($result); 

if ($jailed[jailed] == 'yes') { 
$result = mysql_query("SELECT arrested FROM jail WHERE username = '$u'"); 

$timearrested = mysql_fetch_array($result); 
$now = time(U); 
$timein = $now - $timearrested[0]; 


$result = mysql_query("SELECT rank_id FROM user_stats WHERE username='$u'"); 
$rank = mysql_fetch_array($result); 

switch ($rank[0]) { 
case 1: 
  $jailtime = 60; 
  break; 
case 2: 
  $jailtime = 80; 
  break; 
case 3: 
  $jailtime = 100; 
  break; 
case 4: 
  $jailtime = 120; 
  break; 
case 5: 
  $jailtime = 140; 
  break; 
case 6: 
  $jailtime = 160; 
  break; 
case 7: 
  $jailtime = 180; 
  break; 
case 8: 
  $jailtime = 200; 
  break; 
case 9: 
  $jailtime = 220; 
  break; 
case 10: 
  $jailtime = 240; 
  break; 
} 

if ($jailtime <= $timein) { 
mysql_query("DELETE FROM jail WHERE username='$u'"); 
mysql_query("UPDATE user_stats SET jailed='no' WHERE username='$u'"); 
$timeleft = '0'; 

} else { 

$timeleft = $jailtime - $timein; 

if ($timeleft == NULL) { 
$timeleft = '0'; 
} 

} 


echo "You're in jail! It is $timeleft seconds before you are released."; 
/* echo "<br >"; 
echo 'You have ', "$timeleft[0]", ' seconds left in jail';   */ 

exit(); 

   } // End main submit conditional 

/* ---------------------------------------------------------------------------------------- */ 
/* ----------------------------------JAIL CHECK-------------------------------------------- */ 
/* ---------------------------------------------------------------------------------------- */ 

if (isset($_GET['removeid'])) { 
$removeid = $_GET['removeid']; 
$result = mysql_query("SELECT * FROM searches WHERE id='$removeid'"); 
$row = mysql_fetch_array($result); 

if ($result) { 

if ($row[username] == $u) { 
mysql_query("DELETE FROM searches WHERE id='$removeid'"); 
echo "<center><br />Search removed!<br /></center>"; 
} else { 
echo "<center><br />You did not start this search!<br /></center>"; 
} 

} else { 
echo "<center><br />Invalid Search ID!<br /></center>"; 
} 
} 



if (isset($_POST['search'])) { 

$result = mysql_query("SELECT price FROM searchdevices WHERE id = '$_POST[device]'"); 
$price = mysql_fetch_array($result); 

$result = mysql_query("SELECT money FROM user_stats WHERE username='$u'"); 
$money = mysql_fetch_array($result); 

$result = mysql_query("SELECT membergroup FROM members WHERE username='$_POST[searchtarget]'"); 
$row = mysql_fetch_array($result); 

if ($row) { 
if (is_numeric($_POST[searchtime])&& $_POST[searchtime] >=1) { 
if ($money[0] >= $price[0]) { 
mysql_query("UPDATE user_stats SET money=money-$price[0] WHERE username='$u'"); 
$result = mysql_query("SELECT username FROM members WHERE username='$_POST[searchtarget]'"); 
$meep = mysql_fetch_array($result); 
$searchtarget = $meep[0]; 
$now = time(U); 
mysql_query("INSERT INTO searches (length, start, username, target, device) VALUES ('$_POST[searchtime]','$now','$u','$searchtarget','$_POST[device]')"); 
echo "<center><br />Searching for $searchtarget is now activated!<br /></center>"; 
} else { 
        echo "<center><br />You cannot afford that search!<br /></center>"; 
} 

} else { 
        echo "<center><br />Invalid search length!<br /></center>"; 
} 

} else { 
        echo "<center><br />User does not exist!<br /></center>"; 
} 
} 

if (isset($_POST['submit'])) { 
$target = $_POST[target]; 
$result = mysql_query("SELECT * FROM searches WHERE username='$u' AND target='$target' AND found='yes'"); 
$num = mysql_num_rows($result); 

if ($num < 1) { 
echo "<center><br />You must first find the person before shooting them!<br /></center>"; 
} else { 

$result = mysql_query("SELECT shoottime FROM user_stats WHERE username='$u'"); 
$shoottime = mysql_fetch_array($result); 
$now = time(U); 
$time_diff = $now - $shoottime[0]; 
$time_left = 3600 - $time_diff; 

if ($time_diff < 3600) { 

$hours = floor($time_left/3600); $remainder1 = $time_left%3600; $minutes = floor($remainder1/60); $seconds = $remainder1%60; 
if ($hours < 10) 
  $hours = "0" . "$hours"; 
if ($minutes < 10) 
$minutes = "0" . "$minutes"; 
if ($seconds < 10) 
$seconds = "0" . "$seconds"; 
echo "<center><br />You must wait $hours:$minutes:$seconds before you can shoot again!<br /></center>"; 
} else { 

   if (strlen($_POST['target']) > 0) { 
  $target = $_POST['target']; 
$result = mysql_query("SELECT * FROM members WHERE username='$target'"); 
  $row = mysql_fetch_array($result); 
  if ($row) { 
  if ($row[dead] != 'yes') { 
          if ($target == 'MattD') { 
        $t = NULL; 
  echo "<center><br />Killing an admin eh?  Original...<br /></center>"; 
} else { 
  $t = 1; 
  } 
  } else { 
  $t = NULL; 
  echo "<center><br />That user is already dead!<br /></center>"; 
  } 
  } else { 
$t = NULL; 
     echo "<center><br />Username does not exist!<br /></center>"; 
  } 
  } else { 
  $t = NULL; 
  echo "<center><br />You forgot to enter a target!<br /></center>"; 
  } 

  if (strlen($_POST['bullets']) > 0) { 
  if (is_numeric($_POST['bullets']) && $_POST['bullets'] >= 1) { 
  $b = 1; 
  } else { 
  $b = NULL; 
  echo "Invalid amount of bullets!"; 
  } 
  } else { 
  $b = NULL; 
     echo "Invalid amount of bullets!"; 
  } 



if ($t == 1 && $b == 1) { 

$base_num = 35000; 

$result = mysql_query("SELECT rank_id FROM user_stats WHERE username='$u'"); 
$user_rank = mysql_fetch_array($result); 

$user_gun = $_POST['weapons']; 
$target = $_POST['target']; 
$bullets = $_POST['bullets']; 

$result = mysql_query("SELECT current_city FROM user_stats WHERE username='$u'"); 
$user_loc = mysql_fetch_array($result); 

$result = mysql_query("SELECT current_city FROM user_stats WHERE username='$target'"); 
$target_loc = mysql_fetch_array($result); 

if ($user_loc[0] == $target_loc[0]) { 

$result = mysql_query("SELECT bullets FROM user_stats WHERE username='$u'"); 
$userbullets = mysql_fetch_array($result); 

if ($userbullets[0] >= $bullets) { 


$result = mysql_query("SELECT rank_id FROM user_stats WHERE username='$target'"); 
$target_rank = mysql_fetch_array($result); 


$result = mysql_query("SELECT * FROM inventory_items WHERE owner='$target' AND type='protection'"); 

if (mysql_num_rows($result) > 0) { 

   while ($row = mysql_fetch_array($result)) { 
   $result2 = mysql_query("SELECT strength FROM protections WHERE id='$row[type_id]'"); 
   $egg = mysql_fetch_array($result2); 
  $target_protection[] = $egg[0]; 
} 

} else { 
$target_protection[] = 1; 
} 

$tp = array_sum($target_protection); 

$required_bullets = $base_num/$user_rank[0]; 
$required_bullets = $required_bullets/$user_gun; 
$required_bullets = $required_bullets*$target_rank[0]; 
$required_bullets = $required_bullets*$tp; 

$damage = $bullets/$required_bullets; 
$damage = $damage*100; 

/* echo "User Rank: $user_rank[0]<br /> 
User Weapon: $user_gun<br /> 
Target Rank: $target_rank[0]<br /> 
Target Protection: $tp<br /> 
<br /> 
Required Bullets: $required_bullets<br /> 
Bullets Shot: $bullets<br /> 
<br /> 
Damage Caused: $damage% 
"; */ 

    $now = time(U); 
mysql_query("UPDATE user_stats SET shoottime='$now' WHERE username='$u'"); 

$result = mysql_query("SELECT health FROM user_stats WHERE username='$target'"); 
$target_health = mysql_fetch_array($result); 

  $result = mysql_query("SELECT gender FROM user_stats WHERE username = '$target'"); 
$gender = mysql_fetch_array($result); 

if ($gender[0] == Female) { 
$gen = 'She'; 
} else { 
$gen = 'He'; 
} 

mysql_query("UPDATE user_stats SET bullets=bullets-$bullets WHERE username='$u'"); 

if ($damage >= $target_health[0]) { 


mysql_query("UPDATE members SET dead = 'yes' WHERE username = '$target'"); 
mysql_query("INSERT INTO deaths (victim, killer, bullets, date) VALUES ('$target','$u','$bullets',NOW())"); 
                       mysql_query("INSERT INTO attempts (date, shot, shooter, died) VALUES (NOW(),'$u','$target','yes')"); 

echo "<center>You shot $bullets bullets at $target. $gen died<br /></center>"; 

$time = date('Y-m-d H:i:s'); 
$m = "You witnessed <b>$u</b> kill <b>$target<b>!"; 

$mess = "<center>You shot $bullets bullets at $target. $gen died. "; 

/* Too tired to fix this :o 

$queryblah  = "SELECT propertyid FROM properties WHERE username='$target'"; 
$resultblah = mysql_query($queryblah); 
$propertyid = mysql_fetch_array($resultblah); 
if ($properyid) { 
$queryblah  = "UPDATE properties SET owner='$u' WHERE propertyid='$properyid'"; 
$resultblah = mysql_query($queryblah); 

$queryblah  = "SELECT type FROM properties WHERE propertyid ='$propertyid "; 
$resultblah = mysql_query($queryblah); 
$propertygained = mysql_fetch_array($resultblah); 

$mess .= "You took there $property gained"; 
} 
echo "$mess <br /></center>"; 

*/ 

$result = mysql_query("SELECT username FROM online_status WHERE status='1' AND username != '$u' ORDER BY RAND() LIMIT 1"); 
$row = mysql_fetch_array($result); 
mysql_query("INSERT INTO messages (message, sent_date, sender, recipient, folder) VALUES ('$m', '$time', '$row[0]', '$row[0]', 'other')"); 

$result = mysql_query("SELECT username FROM online_status WHERE status='1' AND username != '$u' AND username != '$row[0]' ORDER BY RAND() LIMIT 1"); 
$row = mysql_fetch_array($result); 
mysql_query("INSERT INTO messages (message, sent_date, sender, recipient) VALUES ('$m', '$time', '$row[0]', '$row[0]')"); 
$query = "INSERT INTO attempts (date, shot, shooter, died) VALUES (NOW(),'$target','$u', Yes)"; 
// Insert attempts into database 
$result2 = mysql_query ($query); 

  } else { 

mysql_query("UPDATE user_stats SET health = health-$damage WHERE username = '$target'"); 
echo "<center>You shot $bullets bullets at $target. $gen survived!<br /></center>"; 
$damage = number_format($damage); 
$time = date('Y-m-d H:i:s'); 
$m = "<b>$u</b> shot at you with <b>$bullets</b> bullets! You survived and lost <b>$damage%</b> health."; 

$query = "INSERT INTO messages (message, sent_date, sender, recipient, folder) VALUES ('$m', '$time', '$target', '$target', '$folder')"; // Insert message into database 
$result3 = mysql_query ($query); 

$query = "INSERT INTO attempts (date, shot, shooter, died) VALUES (NOW(),'$target','$u', No)"; 
// Insert attempts into database 
$result4 = mysql_query ($query); 


} 
} else { 
        echo "<center><br />You don't have that many bullets!<br /></center>"; 
} 

} else { 
        echo "<center><br />You must be in the same location as the target to shoot them!<br /></center>"; 
} 
} 
} 

} 
} 
?> 
<?=$message?><br /> 
<form action="kill.php" method="post"> 
<table border="0" width="80%" align="center" cellspacing="0" style="background-color: black; border: 1px solid black;"> 
<tr> 
<td colspan="2" class="maintd2"><b>Kill</b></td> 
</tr> 
<tr> 
<td width='50%' align='right' style='background-color: #666;'><b>Weapon: </b></td> 
<td colspan=align="left" style="background-color: #666;"> 
<select name='weapons'> 
<?php 
$result = mysql_query("SELECT * FROM inventory_items WHERE owner='$u' AND type='gun'"); 

while ($row = mysql_fetch_array($result)) { 
$result2 = mysql_query("SELECT name FROM weapons WHERE id='$row[type_id]'"); 
$name = mysql_fetch_array($result2); 
$boom = mysql_query("SELECT strength FROM weapons WHERE id='$row[type_id]'"); 
$meeeh = mysql_fetch_array($boom); 
echo "<option value='$meeeh[0]'>$name[0]</option>"; 
} 
?> 
</select> 
</td> 
</tr> 
<tr> 
<td width='50%' align='right' style='background-color: #666;'><b>Target: </b></td> 
<td width='50%' align='left' style='background-color: #666;'><input type="text" name="target" size="20" maxlength="40"  class='textbox' /></td> 
</tr> 
<tr> 
<td width='50%' align='right' style='background-color: #666;'><b>Bullets: </b></td> 
<td width='50%' align='left' style='background-color: #666;'><input type="text" name="bullets" size="20" maxlength="40"  class='textbox' /></td> 
</tr> 
<tr> 
<td colspan='2' align='center' valign='center' style='background-color: #666;'><input type='submit' name='submit' value='Kill!' class='button' /></td> 
</tr> 
<tr> 

<td colspan='2' align='center' valign='center' style='background-color: #666;'> </td> 
</tr> 
<tr> 
<td colspan="2" class="maintd2" style="border-top: 1px solid black; border-bottom: 1px solid black;";><b>Searches</b></td> 
</tr> 
<tr> 
<td colspan='2' align='center' valign='center' style='background-color: #666;'><br /><b>Target:</b> <input type='text' name='searchtarget' class='textbox' />   <b>Tracking Device:</b> <select name='device'><?php $result = mysql_query("SELECT * FROM searchdevices"); while ($row = mysql_fetch_array($result)) { $price = number_format($row[price]); echo "<option value='$row[id]'>$row[name] - \$$price</option>"; } ?></select>   <b>Search Time:</b> <input type='text' name='searchtime' size='1' maxlength='1'  class='textbox' />   <input type='submit' name='search' value='Search' class='button'/><br /><br /></td> 
</tr> 
<tr> 
<td colspan="2" align="center" style="background-color: #666; padding: 3px;"> 
<table border='0' cellpadding='0' cellspacing='1' width='80%' align='center' style='background-color: #000000;'> 
  <tr> 
   <td class="maintd2"><b>Device Used</b></td><td class="maintd2"><b>Target</b></td><td class="maintd2"><b>Hours</b></td><td class="maintd2"><b>Time Left</b></td><td class="maintd2"><b>Status</b></td><td class="maintd2"><b>Remove</b></td> 
   </tr> 

   <?php 

                       $result = mysql_query("SELECT * FROM searches WHERE username='$u'"); 
   while ($row = mysql_fetch_array($result)) { 

   $now = time(U); 
   $newnum = $row[start] + ($row[length] * 3600) + 18000; 

if ($now > $newnum) { 
   mysql_query("DELETE FROM searches WHERE id='$row[id]'"); 

} 

   $start = $row[start]; 
   $addedtime = $row[length] * 3600; 

   $end = $start + $addedtime; 

   $now = time(U); 


   if ($now < $end) { 
   $timeleft = $end - $now; 

   $hours = floor($timeleft/3600); $remainder1 = $timeleft%3600; $minutes = floor($remainder1/60); $seconds = $remainder1%60; 
if ($hours < 10) 
       $hours = "0" . "$hours"; 
   if ($minutes < 10) 
$minutes = "0" . "$minutes"; 
  if ($seconds < 10) 

$seconds = "0" . "$seconds"; 
$timeleft = "$hours:$minutes:$seconds"; 


} else { 
$timeleft = "00:00:00"; 

$rand = mt_rand(1,10); 


$thenumber = $row[device] + $row[length]; 

if ($rand <= $thenumber) { 
if ($row[found] == NULL) { 
   mysql_query("UPDATE searches SET found='yes' WHERE id='$row[id]'"); 
} 
    } else { 
    if ($row[found] == NULL) { 
    mysql_query("UPDATE searches SET found='no' WHERE id='$row[id]'"); 
                     } 
  } 
} 

$result2 = mysql_query("SELECT name FROM searchdevices WHERE id='$row[device]'"); 
$devicename = mysql_fetch_array($result2); 

     echo " 
   <tr> 
     <td class='subtd2'>$devicename[0]</td><td class='subtd2'><a href='profile.php?user=$row[target]'>$row[target]</a></td><td class='subtd2'>$row[length]</td><td class='subtd2'>$timeleft</td><td class='subtd2'>"; if ($row[found] == yes) { $result2 = mysql_query("SELECT current_city FROM user_stats WHERE username='$row[target]'"); $row2 = mysql_fetch_array($result2); $result2 = mysql_query("SELECT countryname FROM countries WHERE cid='$row2[0]'"); $row2 = mysql_fetch_array($result2); echo "Found in $row2[0]"; } elseif ($row[found] == no) { echo "Expired"; } else { echo "Searching..."; } echo "</td><td class='subtd2'><a href='kill.php?removeid=$row[id]'>Remove</a></td> 
   </tr> 

     "; 

   } 

   ?> 

  </table> 
</td> 
</tr> 


</table> 
</form> 
</body> 
</html> 