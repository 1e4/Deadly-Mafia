<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$viewuser=$_GET['viewuser'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$viewuser'"));
echo "$style"; 
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<embed src="<?php echo "$fetch->music"; ?>" width=0 height=0 play=true loop=true quality=high>
</embed>
<body>

	
<table width="74%" border="1" align="center" cellpadding="0" cellspacing="0"  bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td colspan="2" height=22 background=<?php echo "$gradient"; ?>><center class=TableHeading>User information for: <?php echo "$fetch->username"; ?></center></td>
  </tr>
  <tr> 
    <td width="56%" height="58"> 
      <table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td width="51%" height="23">User ID:</td>
          <td width="49%" height="23">&nbsp; <?php echo "$fetch->id"; ?></td>
        </tr>
        <tr> 
          <td height="10">Username:</td>
          <td height="10"><?php echo "<a href=send.php?fromper=$fetch->username>$fetch->username</a>"; if ($fetch->userlevel == "1"){ echo "/Moderator"; }elseif ($fetch->userlevel == "2"){ echo "/Administrator"; }  ?></td>
        </tr>
        <tr> 
          <td height="4">Status:</td>
          <td height="4"> 
            <?php
$time_min=time() - (60 * 1);
$time_five=time() - (60 * 5);
$time_day=time() - (3600 * 24);
$time_week=time() - (3600 * 24 * 7);

if ($fetch->online > $time_min){
$state="Active";
}elseif ($fetch->online > $time_five){
$state="Busy";
}elseif ($fetch->online > $time_day){
$state="Offline day or less";
}elseif ($fetch->online > $time_week){
$state="Inactive";
}

           echo "$fetch->status ($state)"; ?>
          </td>
        </tr>
        <tr> 
          <td height="0">Rank:</td>
          <td height="0"><?php echo "$fetch->rank"; ?></td>
        </tr>
        <tr> 
          <td height="-1">Crew:</td>
          <td height="-1"> 
            <?php if ($fetch->crew == "0"){ echo "None"; }else{ echo "$fetch->crew"; } ?>
          </td>
        </tr>
        <tr> 
          <td height="-5">OC status: </td>
          <td> 
            <?php 

$selects = mysql_query("SELECT * FROM users WHERE username = '$viewuser'");
$is = mysql_fetch_object($selects);
if ($is->last_oc > time()){
$status="Not ready";
}else{
$status="Ready";
}
echo "$status"; ?>
          </td>
        </tr>
        <tr> 
          <td height="-4">Getaway</td>
          <td> 
            <?php 

$selects_g= mysql_query("SELECT * FROM users WHERE username = '$viewuser'");
$is_g = mysql_fetch_object($selects_g);
if ($is_g->get_away_time > time()){
$status1="Not ready";
}else{
$status1="Ready";
}
echo "$status1"; ?>
          </td>
        </tr>
        <tr> 
          <td height="-4">Order time</td>
          <td> 
            <?php 

$selects_gl= mysql_query("SELECT * FROM users WHERE username = '$viewuser'");
$is_gl = mysql_fetch_object($selects_gl);
if ($is_gl->last_order > time()){
$status1l="Not ready";
}else{
$status1l="Ready";
}
echo "$status1l"; ?>
          </td>
        </tr>
        <tr>
          <td height="0">Wealth</td>
          <td>
            <?php
		if ($fetch->money >= "0" && $fetch->money < "5000"){ $wealth = "Street Rat"; }
		elseif ($fetch->money >= "5000" && $fetch->money < "10000"){ $wealth = "Skank"; }
		elseif ($fetch->money >= "10000" && $fetch->money < "50000"){ $wealth = "Poor"; }
		elseif ($fetch->money >= "50000" && $fetch->money < "100000"){ $wealth = "A Nobody"; }	 
		elseif ($fetch->money >= "100000" && $fetch->money < "500000"){ $wealth = "Good wage"; }
		elseif ($fetch->money >= "500000" && $fetch->money < "2000000"){ $wealth = "Wealthy"; }
		elseif ($fetch->money >= "2000000" && $fetch->money < "5000000"){ $wealth = "Business man"; }
		elseif ($fetch->money >= "5000000" && $fetch->money < "10000000"){ $wealth = "Rich bast***"; }
		elseif ($fetch->money >= "10000000" && $fetch->money < "50000000"){ $wealth = "One rich fuc***"; }
		elseif ($fetch->money >= "50000000"){ $wealth = "Richer than god"; }
echo "$wealth";
?>
          </td>
        </tr>
      </table></td>
    <td width="44%"> <img src=<?php echo "$fetch->image"; ?> width=200 height=200></td>
  </tr>
  <tr> 
    <td height="133" colspan="2"><b>Quote:</b><p><?php echo "".replace($fetch->quote).""; ?></td>
  </tr>
</table>
</body>
</html>
