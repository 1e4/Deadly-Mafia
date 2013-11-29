<?php
session_start();

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

$ud=mysql_num_rows(mysql_query("SELECT * FROM users"));

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
$result11111swiss = mysql_query("SELECT money FROM swiss");
	$moneyswiss = 0;
	while($rowswiss=mysql_fetch_array($result11111swiss)){
		$moneyswiss+=$rowswiss[0];
	}
?>


<html>
<head>
<title>Game Stats</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel=stylesheet href=includes/test.css type=text/css>

</head>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="2">
  <!--DWLayoutTable-->
  <tr>
    <td  height="202" colspan="2" valign="top"><table width="100%" border="1" cellpadding="0" cellspacing="0" class=thinline bordercolor="000000">
      <tr>
        <td height="20" colspan="2" background="includes/grad.jpg"><center>
            <strong>Site Statistics</strong>
        </center></td>
      </tr>
      <!--DWLayoutTable-->
      <tr>
        <td width="165" height="25" bgcolor="#666666"><span class="style1">Total users</span></td>
        <td width="170" bgcolor="#666666"><span class="style1"><?php echo "".makecomma($ud).""; ?></span></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#666666"><span class="style1">Most ever online</span></td>
        <td height="25" bgcolor="#666666"><span class="style1"><?php echo "$site->online"; ?></span></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#666666"><span class="style1">Money in game</span></td>
        <td height="25" bgcolor="#666666"><span class="style1"><?php echo "&pound;".makecomma($moneytot)." (Aprox &pound;".makecomma($per_user)."Per user.)"; ?></span></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#666666"><span class="style1">Total forum topics</span></td>
        <td height="25" bgcolor="#666666"><span class="style1">
          <?php if($totaltopics == 1){ echo "$totaltopics Topic"; }else{ echo "$totaltopics Topics "; }
			 $percent_tops=round($totaltopics / $nums, 2); echo "($percent_tops Per user)";
			?>
        </span></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#666666"><span class="style1">Users dead</span></td>
        <td height="25" bgcolor="#666666"><span class="style1"><?php echo "$dead"; ?></span></td>
      </tr>
      <tr>
        <td height="25" bgcolor="#666666"><span class="style1">Total Attempts</span></td>
        <td height="25" bgcolor="#666666"><span class="style1"><?php echo "$attempts"; ?></span></td>
      </tr>
    </table></td>
  </tr>
  <tr> 
    <td  height="174" colspan="2" valign="top"><table width="100%" border="1" cellpadding="0" cellspacing="0" class=thinline bordercolor="000000">
        <tr>
          <td height="20" colspan="4" background="includes/grad.jpg"><center>
              <strong>Bullet Factories</strong>
          </center></td>
        </tr>
        <!--DWLayoutTable-->
        <tr bgcolor=#666666>
          <td width="84" class=tip><div align="center" class="style1">Owner</div></td>
          <td width="92" class=tip><div align="center" class="style1">Location</div></td>
          <td width="97" class=tip><div align="center" class="style1">Price</div></td>
          <td width="65" class=tip><div align="center" class="style1">Stock</div></td>
        </tr>
        <?
		$a=mysql_query("SELECT * FROM bf ORDER BY stock DESC");
		while($b=mysql_fetch_object($a)){
		echo "<tr><td bgcolor=666666><a href='profile.php?viewuser=$b->owner'>$b->owner</a></td><td bgcolor=666666>$b->location</td><td bgcolor=666666>&pound;".makecomma($b->price)."</td><td bgcolor=666666>".makecomma($b->stock)."</td></tr>";
		 
		}
		?>
    </table></td>
  </tr>
  <tr> 
    <td width="48%" height="34" valign="top"> <table width="100%" border="1" cellpadding="0" cellspacing="0" class=thinline bordercolor="000000">
      <tr>
        <td height="20" colspan="3" background="includes/grad.jpg"><center>
            <strong>Last 15 Registered</strong>
        </center>          </td>
      </tr>
        <!--DWLayoutTable-->
        <tr bgcolor=#666666 > 
          <td width="109"  class=tip><div align="center" class="style1">Username</div></td>
          <td width="105" class=tip><div align="center" class="style1">Rank</div></td>
          <td  width="126" class=tip><div align="center" class="style1">Date/time</div></td>
        </tr>
		   <?
	   $c=mysql_query("SELECT * FROM users ORDER BY id DESC LIMIT 15");
	   while($d=mysql_fetch_object($c)){
	   echo "<tr><td bgcolor=666666><a href='profile.php?viewuser=$d->username'>$d->username</a></td><td bgcolor=666666><font color=white>$d->rank</td><td bgcolor=666666>$d->regged</td></tr>";
	   
	   
	   
	   }
	   ?>
		
		
      </table></td>
    <td width="52%" valign="top"><table width="100%" border="1" cellpadding="0" cellspacing="0" class=thinline bordercolor="000000">
      <tr>
        <td height="20" colspan="3" background="includes/grad.jpg"><center>
            <strong>Last 15 Killed</strong>
        </center>          </td>
      </tr>
        <!--DWLayoutTable-->
        <tr bgcolor=#666666> 
          <td width="109"  class=tip><div align="center" class="style1">Username</div></td>
          <td width="105" class=tip><div align="center" class="style1">Rank</div></td>
          <td width="126" class=tip><div align="center" class="style1">Date/time</div></td>
        </tr>
      <?
	   $e=mysql_query("SELECT attempts.target, users.rank, attempts.date, attempts.id FROM attempts LEFT JOIN `users` ON (attempts.target = users.username) WHERE attempts.outcome='Dead' ORDER BY attempts.id DESC LIMIT 15");
	   while($f=mysql_fetch_object($e)){
	   //$dae=mysql_fetch_object(mysql_query("SELECT * FROM attempts WHERE target='$f->username' AND outcome='Dead' ORDER BY id DESC LIMIT 15"));
	   echo "<tr><td bgcolor=666666><a href='profile.php?viewuser=$f->target'><font color=white>$f->target</a></td><td bgcolor=666666>$f->rank</td><td bgcolor=666666>$f->date</td></tr>";
	   
	   
	   
	   }
	   ?>
		
	   
	   
	   
	   
      </table></td>
  </tr>
  <tr>
    <td height="16" valign="top"><table width="100%" border="1" cellpadding="0" cellspacing="0" class=thinline bordercolor="000000">
      <tr>
        <td colspan="3" background="includes/grad.jpg" height="21"><center>
            <strong>Stats for Keno</strong>
        </center></td>
      </tr>
      <!--DWLayoutTable-->
      <tr bgcolor=#666666>
        <td width="109"  class=tip><div align="center" class="style1">Owner</div></td>
        <td width="105" class=tip><div align="center" class="style1">Location</div></td>
        <td width="126" class=tip><div align="center" class="style1">Change</div></td>
      </tr>
      <?
		$keno=mysql_query("SELECT * FROM casinos WHERE casino='keno' ORDER BY profit DESC");
		while($keno_fetch=mysql_fetch_object($keno)){
		if ($keno_fetch->profit <= "0"){ $font_keno="<font color=red>&pound;".makecomma($keno_fetch->profit)."</font>"; }else{ $font_keno="<font color=lime>+&pound;".makecomma($keno_fetch->profit)."</font>"; }
		echo "<tr><td bgcolor=666666><a href='profile.php?viewuser=$keno_fetch->owner'>$keno_fetch->owner</a></td><td bgcolor=666666><font color=white>$keno_fetch->location</td><td bgcolor=666666>$font_keno</td></tr>";
		
		}
		?>
    </table></td>
    <td valign="top"><table width="100%" border="1" cellpadding="0" cellspacing="0" class=thinline bordercolor="000000">
      <tr>
        <td height="20" colspan="3" background="includes/grad.jpg"><center>
            <strong>Stats for Roulette</strong>
        </center></td>
      </tr>
      <!--DWLayoutTable-->
      <tr bgcolor=#666666>
        <td width="109"  class=tip><div align="center" class="style1">Owner</div></td>
        <td width="105" class=tip><div align="center" class="style1">Location</div></td>
        <td width="126" class=tip><div align="center" class="style1">Change</div></td>
      </tr>
      <?
		$roulette=mysql_query("SELECT * FROM casinos WHERE casino='Roulette' ORDER BY profit DESC");
		while($roulette_fetch=mysql_fetch_object($roulette)){
		if ($roulette_fetch->profit <= "0"){ $font_roulette="<font color=red>&pound;".makecomma($roulette_fetch->profit)."</font>"; }else{ $font_roulette="<font color=lime>+&pound;".makecomma($roulette_fetch->profit)."</font>"; }
		echo "<tr><td bgcolor=666666><a href='profile.php?viewuser=$roulette_fetch->owner'>$roulette_fetch->owner</a></td><td bgcolor=666666><font color=white>$roulette_fetch->location</td><td bgcolor=666666>$font_roulette</td></tr>";
		
		}
		?>
    </table></td>
  </tr>
  <tr>
    <td height="16" valign="top"><table width="100%" border="1" cellpadding="0" cellspacing="0" class=thinline bordercolor="000000">
      <tr>
        <td height="20" colspan="3" background="includes/grad.jpg"><center>
            <strong>Stats for Race Track</strong>
        </center>
          <div align="center"></div></td>
      </tr>
      <!--DWLayoutTable-->
      <tr bgcolor=#666666>
        <td width="109" class=tip><div align="center" class="style1">Owner</div></td>
        <td width="105" class=tip><div align="center" class="style1">Location</div></td>
        <td width="126" class=tip><div align="center" class="style1">Change</div></td>
      </tr>
      <?
		$race=mysql_query("SELECT * FROM race  ORDER BY profit DESC");
		while($race_fetch=mysql_fetch_object($race)){
		if ($race_fetch->profit <= "0"){ $font_race="<font color=red>&pound;".makecomma($race_fetch->profit)."</font>"; }else{ $font_race="<font color=lime>+&pound;".makecomma($race_fetch->profit)."</font>"; }
		echo "<tr><td bgcolor=666666><a href='profile.php?viewuser=$race_fetch->owner'>$race_fetch->owner</a></td><td bgcolor=666666><font color=white>$race_fetch->location</td><td bgcolor=666666>$font_race</td></tr>";
		
		}
		?>
    </table></td>
    <td valign="top"><table width="100%" border="1" cellpadding="0" cellspacing="0" class=thinline bordercolor="000000">
      <tr>
        <td height="20" colspan="3" background="includes/grad.jpg"><center>
            <strong>Stats for Black Jack</strong>
        </center>
          <div align="center"></div></td>
      </tr>
      <!--DWLayoutTable-->
      <tr bgcolor=#666666>
        <td width="109" class=tip><div align="center" class="style1">Owner</div></td>
        <td width="105" class=tip><div align="center" class="style1">Location</div></td>
        <td width="126" class=tip><div align="center" class="style1">Change</div></td>
      </tr>
      <?
		$bj=mysql_query("SELECT * FROM bj ORDER BY bjearnings DESC");
		while($bj_fetch=mysql_fetch_object($bj)){
		if ($bj_fetch->bjearnings <= "0"){ $font_bj="<font color=red>&pound;".makecomma($bj_fetch->bjearnings)."</font>"; }else{ $font_bj="<font color=lime>+&pound;".makecomma($bj_fetch->bjearnings)."</font>"; }
		echo "<tr><td bgcolor=666666><a href='profile.php?viewuser=$bj_fetch->bjowner'>$bj_fetch->bjowner</a></td><td bgcolor=666666><font color=white>$bj_fetch->country</td><td bgcolor=666666>$font_bj</td></tr>";
		
		}
		?>
    </table></td>
  </tr>
  <tr> 
    <td height="16" valign="top"><table width="100%" border="1" cellpadding="0" cellspacing="0" class=thinline bordercolor="000000">
      <tr>
        <td height="20" colspan="3" background="includes/grad.jpg"><center>
            <strong>Stats for Slots</strong>
        </center></td>
      </tr>
      <!--DWLayoutTable-->
      <tr bgcolor=#666666>
        <td width="109" height="21"  class=tip><div align="center" class="style1">Owner</div></td>
        <td width="105" class=tip><div align="center" class="style1">Location</div></td>
        <td width="126" class=tip><div align="center" class="style1">Change</div></td>
      </tr>
      <?
		$slots=mysql_query("SELECT * FROM casinos WHERE casino='Slots' ORDER BY profit DESC");
		while($slots_fetch=mysql_fetch_object($slots)){
		if ($slots_fetch->profit <= "0"){ $font="<font color=red>-&pound;".makecomma($slots_fetch->profit)."</font>"; }else{ $font="<font color=lime>+&pound;".makecomma($slots_fetch->profit)."</font>"; }
		echo "<tr><td bgcolor=666666><a href='profile.php?viewuser=$slots_fetch->owner'>$slots_fetch->owner</a></td><td bgcolor=666666><font color=white>$slots_fetch->location</td><td bgcolor=666666>$font</td></tr>";
		
		}
		?>
    </table></td>
</tr>
   <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td></tr>
  <tr> 
    <td height="17" valign="top">&nbsp;</td>
	  
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php require_once "includes/footer.php"; ?>