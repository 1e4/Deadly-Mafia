<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
///////MONEY IN GAME AND PER USER

$result11111 = mysql_query("SELECT money, bank FROM users WHERE userlevel='0'");
	$moneytot = 0;
	while($row=mysql_fetch_array($result11111)){
		$moneytot+=$row[0]+$row[1];
	}
		$nums=mysql_num_rows($result11111); 
	$per_user = round($moneytot / $nums);
///END
////SITE STATS
$site=mysql_fetch_object(mysql_query("SELECT * FROM site_stats WHERE id='1'"));
////END
////FORUM TOPICS
$totaltopics = mysql_num_rows(mysql_query("SELECT id FROM topics"));
//?END
/////USERS DEAD
$dead= mysql_num_rows(mysql_query("SELECT username FROM users WHERE status = 'Dead'"));
/////TOTAL ATTEMPTS
$attempts= mysql_num_rows(mysql_query("SELECT id FROM attempts WHERE outcome = 'Survived'"));
///?END
$swiss=mysql_fetch_object(mysql_query("SELECT SUM(money)AS total FROM swiss GROUP BY money"));
?>


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
  <!--DWLayoutTable-->
  <tr> 
    <td  height="202" valign="top"><table width="100%" border="1" cellpadding="2" cellspacing="0" class=thinline bordercolor="black">
        <!--DWLayoutTable-->
        <tr> 
          <td background="includes/grad.jpg" colspan="2"><div align="center">Site 
              stats</div></td>
        </tr>
        <tr> 
          <td width="165" height="25">Total users</td>
          <td width="170"><?php echo "".makecomma($nums).""; ?></td>
        </tr>
        <tr> 
          <td height="25">Most ever online</td>
          <td height="25"><?php echo "$site->online"; ?></td>
        </tr>
        <tr> 
          <td height="25">Money in game</td>
          <td height="25"><?php echo "£".makecomma($moneytot)." (Aprox £".makecomma($per_user)."Per user.)"; ?></td>
        </tr>
        <tr> 
          <td height="25">Total forum topics</td>
          <td height="25"><?php if($totaltopics == 1){ echo "$totaltopics Topic"; }else{ echo "$totaltopics Topics "; }
			 $percent_tops=round($totaltopics / $nums, 2); echo "($percent_tops Per user)";
			?></td>
        </tr>
        <tr> 
          <td height="25">Money in swiss bank</td>
          <td height="25"><?php echo "£".makecomma($swiss->total).""; ?></td>
        </tr>
        <tr> 
          <td height="25">Users dead</td>
          <td height="25"><?php echo "$dead"; ?></td>
        </tr>
        <tr> 
          <td height="25">Total Attempts</td>
          <td height="25"><?php echo "$attempts"; ?></td>
        </tr>
      </table> </td>
    <td    valign="top"><table width="100%" border="1" cellpadding="2" cellspacing="0" class=thinline bordercolor="black">
        <!--DWLayoutTable-->
        <tr> 
          <td background="includes/grad.jpg" colspan="4"><div align="center">Bullet 
              factorys</div></td>
        </tr>
        <tr bgcolor=white> 
          <td width="84" class=tip>Owner</td>
          <td width="92" class=tip>Location</td>
          <td width="97" class=tip>Price</td>
          <td width="65" class=tip>Stock</td>
        </tr>
		<?
		$a=mysql_query("SELECT * FROM bf ORDER BY stock DESC");
		while($b=mysql_fetch_object($a)){
		echo "<tr><td><a href='profile.php?viewuser=$b->owner'>$b->owner</a></td><td>$b->location</td><td>£".makecomma($b->price)."</td><td>".makecomma($b->stock)."</td></tr>";
		 
		}
		?>
		
		
      </table></td>
  </tr>
  <tr> 
    <td height="34" valign="top"> <table width="100%" border="1" cellpadding="2" cellspacing="0" class=thinline bordercolor="black">
        <!--DWLayoutTable-->
        <tr> 
          <td background="includes/grad.jpg" colspan="3"><div align="center">Last 
              15 registered</div></td>
        </tr>
        <tr bgcolor=white> 
          <td width="109"  class=tip>Username</td>
          <td width="105" class=tip>Rank</td>
          <td width="126" class=tip>Date/time</td>
        </tr>
		   <?
	   $c=mysql_query("SELECT * FROM users ORDER BY id DESC LIMIT 15");
	   while($d=mysql_fetch_object($c)){
	   echo "<tr><td><a href='profile.php?viewuser=$d->username'>$d->username</a></td><td>$d->rank</td><td>$d->regged</td></tr>";
	   
	   
	   
	   }
	   ?>
		
		
      </table></td>
    <td valign="top"><table width="100%" border="1" cellpadding="2" cellspacing="0" class=thinline bordercolor="black">
        <!--DWLayoutTable-->
        <tr> 
          <td background="includes/grad.jpg" colspan="3"><div align="center">Last 
              15 killed</div></td>
        </tr>
        <tr bgcolor=white> 
          <td width="109"  class=tip>Username</td>
          <td width="105" class=tip>Rank</td>
          <td width="126" class=tip>Date/time</td>
        </tr>
      <?
	   $e=mysql_query("SELECT * FROM users WHERE status='Dead' ORDER BY id DESC LIMIT 15");
	   while($f=mysql_fetch_object($e)){
	   $dae=mysql_fetch_object(mysql_query("SELECT * FROM attempts WHERE target='$f->username' AND outcome='Dead'"));
	   echo "<tr><td><a href='profile.php?viewuser=$f->username'>$f->username</a></td><td>$f->rank</td><td>$dae->date</td></tr>";
	   
	   
	   
	   }
	   ?>
		
	   
	   
	   
	   
      </table></td>
  </tr>
  <tr> 
    <td height="16" valign="top"><table width="100%" border="1" cellpadding="2" cellspacing="0" class=thinline bordercolor="black">
        <!--DWLayoutTable-->
        <tr> 
          <td background="includes/grad.jpg" colspan="3"><div align="center">Information 
              for slots</div></td>
        </tr>
        <tr bgcolor=white> 
          <td width="109"  class=tip>Owner</td>
          <td width="105" class=tip>Location</td>
          <td width="126" class=tip>Change</td>
        </tr>
		<?
		$slots=mysql_query("SELECT * FROM casinos WHERE casino='Slots' ORDER BY profit DESC");
		while($slots_fetch=mysql_fetch_object($slots)){
		if ($slots_fetch->profit <= "0"){ $font="<font color=red>-£".makecomma($slots_fetch->profit)."</font>"; }else{ $font="<font color=lightgreen>+£".makecomma($slots_fetch->profit)."</font>"; }
		echo "<tr><td><a href='profile.php?viewuser=$slots_fetch->owner'>$slots_fetch->owner</a></td><td>$slots_fetch->location</td><td>$font</td></tr>";
		
		}
		?>
		
		
      </table></td>
    <td valign="top"><table width="100%" border="1" cellpadding="2" cellspacing="0" class=thinline bordercolor="black">
        <!--DWLayoutTable-->
        <tr> 
          <td background="includes/grad.jpg" colspan="3"><div align="center">Information 
              for RPS</div></td>
        </tr>
        <tr bgcolor=white> 
          <td width="109"  class=tip>Owner</td>
          <td width="105" class=tip>Location</td>
          <td width="126" class=tip>Change</td>
        </tr>
		
			<?
		$rps=mysql_query("SELECT * FROM casinos WHERE casino='RPS' ORDER BY profit DESC");
		while($rps_fetch=mysql_fetch_object($rps)){
		if ($rps_fetch->profit <= "0"){ $font_rps="<font color=red>£".makecomma($rps_fetch->profit)."</font>"; }else{ $font_rps="<font color=lightgreen>+£".makecomma($rps_fetch->profit)."</font>"; }
		echo "<tr><td><a href='profile.php?viewuser=$rps_fetch->owner'>$rps_fetch->owner</a></td><td>$rps_fetch->location</td><td>$font_rps</td></tr>";
		
		}
		?>
      </table></td>
  </tr>
  <tr> 
    <td height="17" valign="top"><table width="100%" border="1" cellpadding="2" cellspacing="0" class=thinline bordercolor="black">
        <!--DWLayoutTable-->
        <tr> 
          <td background="includes/grad.jpg" colspan="3"><div align="center">Information 
              for the race track </div></td>
        </tr>
        <tr bgcolor=white> 
          <td width="109" class=tip>Owner</td>
          <td width="105" class=tip>Location</td>
          <td width="126" class=tip>Change</td>
        </tr>
		
			<?
		$race=mysql_query("SELECT * FROM casinos WHERE casino='Race' ORDER BY profit DESC");
		while($race_fetch=mysql_fetch_object($race)){
		if ($race_fetch->profit <= "0"){ $font_race="<font color=red>£".makecomma($race_fetch->profit)."</font>"; }else{ $font_race="<font color=lightgreen>+£".makecomma($race_fetch->profit)."</font>"; }
		echo "<tr><td><a href='profile.php?viewuser=$race_fetch->owner'>$race_fetch->owner</a></td><td>$race_fetch->location</td><td>$font_race</td></tr>";
		
		}
		?>
		
		
      </table></td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
</table>
</body>
</html>
