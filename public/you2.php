<?php session_start(); include_once"includes/db_connect.php"; include_once"includes/functions.php"; logincheck(); 
$username=$_SESSION['username'];
$query=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($query);

$query1=mysql_query("SELECT * FROM user_info WHERE username='$username'");
$info=mysql_fetch_object($query1);




$currank=$fetch->rank;
$rankp = $fetch->rankpoints;

if ($currank == "Tramp"){
$max = "100";
$old="1";
}elseif ($currank == "Paper Kid"){
$max = "200";
$old="100";
}elseif ($currank == "Theif"){
$max = '400';
$old="200";
}elseif ($currank == "Robber"){
$max = '800';
$old="400";

}elseif ($currank == "Gangster"){
$max = '3000';
$old="800";

}elseif ($currank == "Associate"){
$max = '5000';
$old="3000";

}elseif ($currank == "Piciotto"){
$max = '9000';
$old="5000";
}elseif ($currank == "Made Man"){
$max = '15000';
$old="9000";

}elseif ($currank == "Capo"){
$max = '20000';
$old="15000";

}elseif ($currank == "Consigliere"){
$max = '28000';
$old="20000";

}elseif ($currank == "Underboss"){
$max = '38000';
$old="28000";

}elseif ($currank == "Druglord"){
$max = '50000';
$old="38000";

}elseif ($currank == "Godfather"){
$max = '100000000';
$old="50000";

}
$percent = round((($rankp-$old)/($max-$old))*100);
?>


<html>


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
            <?php  if ($fetch->lastcrime <= time()){ echo "<font color=green>Ready</font>"; }else{   echo "".maketime($fetch->lastcrime).""; } ?>
          </td>
        </tr>
        <tr> 
          <td ><strong>Gta</strong></td>
          <td > 
            <?php  if ($fetch->lastgta <= time()){ echo "<font color=green>Ready</font>"; }else{   echo "".maketime($fetch->lastgta).""; } ?>
          </td>
        </tr>
        <tr> 
          <td height="11"><strong>Organised crime</strong></td>
          <td height="11"> 
            <?php  if ($fetch->last_oc  <= time()){ echo "<font color=green>Ready</font>"; }else{   echo "".maketime($fetch->last_oc ).""; } ?>
          </td>
        </tr>
        <tr> 
          <td height="11"><strong>Extortion</strong></td>
          <td height="11"> 
            <?php if ($fetch->last_ext < time()){ echo "<font color=green>Ready</font>"; }else{ echo "".maketime($fetch->last_ext).""; } ?>
          </td>
        </tr>
        <tr> 
          <td height="11"><strong>Order</strong></td>
          <td height="11"> 
            <?php if ($fetch->last_order < time()){ echo "<font color=green>Ready</font>"; }else{ echo "".maketime($fetch->last_order).""; } ?>
          </td>
        </tr>
        <tr> 
          <td height="5"><strong>Next kill attempt</strong></td>
          <td height="5"> 
            <?php if ($fetch->last_kill < time()){ echo "<font color=green>Ready</font>"; }else{ echo "".maketime($fetch->last_kill).""; } ?>
          </td>
        </tr>
        <tr> 
          <td height="3"><strong>Next race</strong></td>
          <td height="3"> 
            <?php if ($fetch->last_race < time()){ echo "<font color=green>Ready</font>"; }else{ echo "".maketime($fetch->last_race).""; } ?>
          </td>
        </tr>
        <tr> 
          <td height="3"><strong>Next flight</strong></td>
          <td height="3"> 
            <?php if ($fetch->lasttravel < time()){ echo "<font color=green>Ready</font>"; }else{ echo "".maketime($fetch->lasttravel).""; } ?>
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
                <td height="11"><strong>Safe</strong></td>
                <td height="11"><?php echo "$fetch->protection"; ?></td>
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
                <td width="188" ><strong>User id</strong></td>
                <td width="173">#<?php echo "$fetch->id"; ?></td>
              </tr>
              <tr> 
                <td ><strong>Username</strong></td>
                <td><?php echo "$fetch->username"; ?></td>
              </tr>
              <tr> 
                <td ><strong>Money</strong></td>
                <td >&pound;<?php echo "".makecomma($fetch->money).""; ?></td>
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
          <td height="25" valign="top"> <table width="<?php echo "$percent"; ?>%" border="1" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
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
          <td height="25" valign="top"><table width="<?php echo "$fetch->energy"; ?>%" border="1" cellpadding="2" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
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
          <td height="25" valign="top"> <table width="<?php echo "$fetch->health"; ?>%" border="1" cellpadding="2" cellspacing="0" bordercolor=black class=thinline>
              <tr> 
                <td width="18"><?php echo "$fetch->health"; ?>%</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td height="44">&nbsp;</td>
    <td><table width="100%" border="1" class=thinline  cellpadding="2" cellspacing="0" bordercolor="black">
        <!--DWLayoutTable-->
        <tr> 
          <td width="370" background="includes/grad.jpg" valign="top"><div align="center">Clock 
              tower </div></td>
        </tr>
        <tr> 
          <td height="25" valign="top"><center><? echo gmdate('Y-m-d h:i:s'); ?></center> </td>
        </tr>
      </table></td>
  </tr>
</table>
<div align="center"></div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>



