<?php 
session_start(); 
include_once"includes/db_connect.php";
include_once"includes/functions.php";
logincheck();

?>
<HTML><HEAD><TITLE>Empire2010</TITLE>


<style type="text/css">
<!--
.style1 {color: #0000FF}
.style9 {
	color: #FF0000;
	font-weight: bold;
	font-size: 24px;
}
-->
</style>
<body>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class=thinline bordercolor="black">
  <!--DWLayoutTable-->
  <tr>
    <td background="includes/grad.jpg" colspan="3"><div align="center">Information for slots</div></td>
  </tr>
  <tr bgcolor=white>
    <td width="109"  class=tip>Owner</td>
    <td width="105" class=tip>Location</td>
    <td width="126" class=tip>Change</td>
  </tr>
  <?
		$slots=mysql_query("SELECT * FROM casinos WHERE casino='Slots' ORDER BY profit DESC");
		while($slots_fetch=mysql_fetch_object($slots)){
		if ($slots_fetch->profit <= "0"){ $font="<font color=red>-&pound;".makecomma($slots_fetch->profit)."</font>"; }else{ $font="<font color=green>+&pound;".makecomma($slots_fetch->profit)."</font>"; }
		echo "<tr><td><a href='profile.php?viewuser=$slots_fetch->owner'>$slots_fetch->owner</a></td><td>$slots_fetch->location</td><td>$font</td></tr>";
		
		}
		?>
</table>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class=thinline bordercolor="black">
  <!--DWLayoutTable-->
  <tr>
    <td background="includes/grad.jpg" colspan="3"><div align="center">Information for RPS</div></td>
  </tr>
  <tr bgcolor=white>
    <td width="109"  class=tip>Owner</td>
    <td width="105" class=tip>Location</td>
    <td width="126" class=tip>Change</td>
  </tr>
  <?
		$rps=mysql_query("SELECT * FROM casinos WHERE casino='RPS' ORDER BY profit DESC");
		while($rps_fetch=mysql_fetch_object($rps)){
		if ($rps_fetch->profit <= "0"){ $font_rps="<font color=red>&pound;".makecomma($rps_fetch->profit)."</font>"; }else{ $font_rps="<font color=green>+&pound;".makecomma($rps_fetch->profit)."</font>"; }
		echo "<tr><td><a href='profile.php?viewuser=$rps_fetch->owner'>$rps_fetch->owner</a></td><td>$rps_fetch->location</td><td>$font_rps</td></tr>";
		
		}
		?>
</table>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class=thinline bordercolor="black">
  <!--DWLayoutTable-->
  <tr>
    <td background="includes/grad.jpg" colspan="3"><div align="center">Information for the race track </div></td>
  </tr>
  <tr bgcolor=white>
    <td width="109" class=tip>Owner</td>
    <td width="105" class=tip>Location</td>
    <td width="126" class=tip>Change</td>
  </tr>
  <?
		$race=mysql_query("SELECT * FROM casinos WHERE casino='Race' ORDER BY profit DESC");
		while($race_fetch=mysql_fetch_object($race)){
		if ($race_fetch->profit <= "0"){ $font_race="<font color=red>&pound;".makecomma($race_fetch->profit)."</font>"; }else{ $font_race="<font color=green>+&pound;".makecomma($race_fetch->profit)."</font>"; }
		echo "<tr><td><a href='profile.php?viewuser=$race_fetch->owner'>$race_fetch->owner</a></td><td>$race_fetch->location</td><td>$font_race</td></tr>";
		
		}
		?>
</table>
<p>&nbsp;</p>
</body>

</html>





