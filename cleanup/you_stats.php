<?php session_start(); include_once"includes/db_connect.php"; include_once"includes/functions.php"; logincheck(); 
$username=$_SESSION['username'];
$query=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($query);

$query1=mysql_query("SELECT * FROM user_info WHERE username='$username'");
$info=mysql_fetch_object($query1);




$currank=$fetch->rank;
$rankp = $fetch->rankpoints;

if ($currank == "Tramp"){
$max = "90";
$old="0";
}elseif ($currank == "Paper Kid"){
$max = '120';
$old="90";
}elseif ($currank == "Theif"){
$max = '220';
$old="120";
}elseif ($currank == "Robber"){
$max = '350';
$old="220";
}elseif ($currank == 'Gangster'){
$max = '460';
$old="350";
}elseif ($currank == "Hitman"){
$max = '880';
$old="460";
}elseif ($currank == "Consultant"){
$max = '1000';
$old="880";
}elseif ($currank == "Assassin"){
$max = '1300';
$old="1000";
}elseif ($currank == "Made Man"){
$max = '3500';
$old="1300";
}elseif ($currank == "Bouncer"){
$max = '6500';
$old="3500";

}elseif ($currank == "Club Owner"){
$max = '9500';
$old="6500";
}elseif ($currank == "Druglord"){
$max = '10900';
$old="9500";

}elseif ($currank == "Boss"){
$max = '11800';
$old="10900";
}elseif ($currank == "Respectable Boss"){
$max = '12000';
$old="11800";
}elseif ($currank == "Honored Boss"){
$max = '13500';
$old="12000";
}elseif ($currank == "Cugine"){
$max = '14500';
$old="13500";

}elseif ($currank == "Godfather"){
$max = '16000';
$old="14500";
}elseif ($currank == "Legendary Godfather"){
$max = '18000';
$old="16000";
}elseif ($currank == "Don"){
$max = '39000';
} 
$percent = round((($rankp-$old)/($max-$old))*100);
?>


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<table width="755" border="0" align="center" cellpadding="0" cellspacing="3">
  <!--DWLayoutTable-->
  <tr> 
    <td width="370" height="174" valign="top"><table width="100%" border="1" cellpadding="2" class=thinline cellspacing="0" bordercolor="black">
        <!--DWLayoutTable-->
        <tr> 
          <td background="includes/grad.jpg" colspan="2"><div align="center">Waiting 
              times</div></td>
        </tr>
        <tr> 
          <td width="184" ><strong>Crime</strong></td>
          <td width="177"> 
            <?php  if ($fetch->lastcrime <= time()){ echo "Ready"; }else{   echo "".maketime($fetch->lastcrime).""; } ?>
          </td>
        </tr>
        <tr> 
          <td ><strong>Gta</strong></td>
          <td > 
            <?php  if ($fetch->lastgta <= time()){ echo "Ready"; }else{   echo "".maketime($fetch->lastgta).""; } ?>
          </td>
        </tr>
        <tr> 
          <td height="11"><strong>Organised crime</strong></td>
          <td height="11"> 
            <?php  if ($fetch->get_away_time <= time()){ echo "Ready"; }else{   echo "".maketime($fetch->get_away_time).""; } ?>
          </td>
        </tr>
        <tr> 
          <td height="11"><strong>Extortion</strong></td>
          <td height="11"> 
            <?php if ($fetch->last_ext < time()){ echo "Ready"; }else{ echo "".maketime($fetch->last_ext).""; } ?>
          </td>
        </tr>
        <tr> 
          <td height="11"><strong>Order</strong></td>
          <td height="11"> 
            <?php if ($fetch->last_order < time()){ echo "Ready"; }else{ echo "".maketime($fetch->last_order).""; } ?>
          </td>
        </tr>
        <tr> 
          <td height="5"><strong>Next kill attempt</strong></td>
          <td height="5"> 
            <?php if ($fetch->last_kill < time()){ echo "Ready"; }else{ echo "".maketime($fetch->last_kill).""; } ?>
          </td>
        </tr>
        <tr> 
          <td height="3"><strong>Next race</strong></td>
          <td height="3"> 
            <?php if ($fetch->last_race < time()){ echo "Ready"; }else{ echo "".maketime($fetch->last_race).""; } ?>
          </td>
        </tr>
        <tr> 
          <td height="3"><strong>Next flight</strong></td>
          <td height="3"> 
            <?php if ($fetch->lasttravel < time()){ echo "Ready"; }else{ echo "".maketime($fetch->lasttravel).""; } ?>
          </td>
        </tr>
      </table></td>
    <td width="376" valign="top"><table width="100%" border="1" cellpadding="2" class=thinline cellspacing="0" bordercolor="black">
        <!--DWLayoutTable-->
        <tr> 
          <td background="includes/grad.jpg" colspan="2"><div align="center">Counters</div></td>
        </tr>
        <tr> 
          <td width="184" ><strong>Crimes</strong></td>
          <td width="177"><?php echo "".makecomma($info->crimes).""; ?></td>
        </tr>
        <tr> 
          <td ><strong>Gta's</strong></td>
          <td ><?php echo "".makecomma($info->gtas).""; ?></td>
        </tr>
        <tr> 
          <td height="11"><strong>Organised crimes</strong></td>
          <td height="11"><?php echo "".makecomma($info->ocs).""; ?></td>
        </tr>
        <tr> 
          <td height="11"><strong>Kills</strong></td>
          <td height="11"><?php echo "".makecomma($info->kill_skill).""; ?></td>
        </tr>
        <tr> 
          <td height="11"><strong>Races</strong></td>
          <td height="11"><?php echo "".makecomma($info->street).""; ?></td>
        </tr>
        <tr> 
          <td height="5"><strong>Orders</strong></td>
          <td height="5"><?php echo "".makecomma($info->orders).""; ?></td>
        </tr>
        <tr> 
          <td height="3"><strong>Extortion's</strong></td>
          <td height="3"><?php echo "".makecomma($info->ext).""; ?></td>
        </tr>
        <tr> 
          <td height="3"><strong>Referrals</strong></td>
          <td height="3"><?php echo "$fetch->referral"; ?></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="138" valign="top"><table width="100%" height="138" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr> 
          <td width="375" height="138"><table width="100%" border="1" cellpadding="2" class=thinline cellspacing="0" bordercolor="black">
              <!--DWLayoutTable-->
              <tr> 
                <td background="includes/grad.jpg" colspan="2"><div align="center">Inventory</div></td>
              </tr>
              <tr> 
                <td width="184" ><strong>Weapon</strong></td>
                <td width="177"><?php echo "$fetch->weapon"; ?></td>
              </tr>
              <tr> 
                <td ><strong>Protection</strong></td>
                <td ><?php echo "$fetch->protection"; ?></td>
              </tr>
              <tr> 
                <td height="11"><strong>Plane</strong></td>
                <td height="11"><?php echo "$fetch->plane"; ?></td>
              </tr>
              <tr> 
                <td height="5"><strong>Bullets</strong></td>
                <td height="5"><?php echo "".makecomma($fetch->bullets).""; ?></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr> 
          <td width="380" height="138"><table class=thinline width="100%" border="1" cellpadding="2" cellspacing="0" bordercolor="black">
              <!--DWLayoutTable-->
              <tr> 
                <td colspan="2" background="includes/grad.jpg"><div align="center">Your 
                    information</div></td>
              </tr>
              <tr> 
                <td width="188" ><strong>Money</strong></td>
                <td width="173" >&pound;<?php echo "".makecomma($fetch->money).""; ?></td>
              </tr>
              <tr> 
                <td ><strong>Registered date</strong></td>
                <td ><?php echo "$fetch->regged"; ?></td>
              </tr>
              <tr> 
                <td ><strong>Rank</strong></td>
                <td ><?php echo "$fetch->rank"; ?></td>
              </tr>
              <tr> 
                <td ><strong>Location</strong></td>
                <td ><?php echo "$fetch->location"; ?></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="48" valign="top"> <table width="100%" border="1" class=thinline  cellpadding="2" cellspacing="0" bordercolor="black">
        <!--DWLayoutTable-->
        <tr> 
          <td width="370" background="includes/grad.jpg" valign="top"><div align="center">Rank 
              progress</div></td>
        </tr>
        <tr> 
          <td height="25" valign="top"> <table width="<?php echo "$percent"; ?>%" border="1" cellpadding="2" cellspacing="5" bordercolor="#999999" bgcolor="#000033">
              <tr> 
                <td width="18"><?php echo "$percent"; ?>%</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td valign="top"><table width="100%" border="1" class=thinline  cellpadding="2" cellspacing="0" bordercolor="black">
        <!--DWLayoutTable-->
        <tr> 
          <td width="376" background="includes/grad.jpg" valign="top"><div align="center">Energy</div></td>
        </tr>
        <tr> 
          <td height="25" valign="top"> <table width="<?php echo "$fetch->energy"; ?>%" border="1" cellpadding="2" cellspacing="5" bordercolor="#999999" bgcolor="#000033">
              <tr> 
                <td width="18"><?php echo "$fetch->energy"; ?>%</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="32"><table width="100%" border="1" class=thinline  cellpadding="2" cellspacing="0" bordercolor="black">
        <!--DWLayoutTable-->
        <tr> 
          <td width="370" background="includes/grad.jpg" valign="top"><div align="center">Health</div></td>
        </tr>
        <tr> 
          <td height="25" valign="top"> <table width="<?php echo "$fetch->health"; ?>%" border="1" cellpadding="2" cellspacing="5" bordercolor="#999999" bgcolor="#000033">
              <tr> 
                <td width="18"><?php echo "$fetch->health"; ?>%</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td><table width="100%" border="1" class=thinline  cellpadding="2" cellspacing="0" bordercolor="black">
      <!--DWLayoutTable-->
      <tr>
        <td width="370" background="includes/grad.jpg" valign="top"><div align="center">Health</div></td>
      </tr>
      <tr>
        <td height="60" valign="top"> <div align="center">
          <table width="<?php echo "$fetch->health"; ?>%" border="1" cellpadding="2" cellspacing="5" bordercolor="#999999" bgcolor="#000033">
            <tr>
              <td width="18"><? echo gmdate('Y-m-d h:i:s'); ?></td>
            </tr>
          </table>
        </div></td>
      </tr>
    </table></td>
  </tr>
</table>
<div align="center"></div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>


