<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
include"includes/smile.php";
logincheck();
$username=$_SESSION['username'];
$viewuser=$_GET['viewuser'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$viewuser'"));



?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>
<embed src="<?php echo "$fetch->music"; ?>" width=0 height=0 play=true loop=true quality=high>
</embed>
<body>
<?php $donater=mysql_num_rows(mysql_query("SELECT * FROM donaters WHERE username='$viewuser'"));
if ($donater != "0"){
echo "
<a href=donate.php><img src=\"images/donater.gif\" border=0 style=\"position: absolute; top: 10px; right: 30px; filter:alpha(Opacity=90);\"></a>
";
}
?>
<table width="72%" border="1" align="center" cellpadding="5" cellspacing="3" bordercolor=#000000>
  <tr > 
    <td colspan="2" class=header><div align="center">User profile</div></td>
  </tr>
  <tr bgcolor=white> 
    <td colspan="2" class=tip><div align="center">User information for <?php echo "$viewuser"; ?></div></td>
  </tr>
  <tr> 
    <td colspan="2"><div align="center"><img src=<?php echo "$fetch->image"; ?> width=200 height=200></div></td>
  </tr>
  <tr> 
    <td width="50%" bgcolor="#666666">Username:</td>
    <td width="50%"><?php echo "$viewuser"; ?> | <a href="?friend=1">Add to your 
      friends list</a> | <a href="?block=1">Block </a></td>
  </tr>
  <tr> 
    <td bgcolor="#666666">Status:</td>
    <td> 
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
    <td bgcolor="#666666">Marital status:</td>
    <td>
      <?php if ($fetch->married == "0"){ echo "Not married"; }else{ echo "$fetch->married"; } ?>
    </td>
  </tr>
  <tr> 
    <td bgcolor="#666666">Wealth:</td>
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
  <tr> 
    <td bgcolor="#666666">Rank:</td>
    <td><?php echo "$fetch->rank"; ?></td>
  </tr>
  <tr> 
    <td bgcolor="#666666">OC status:</td>
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
    <td bgcolor="#666666">Getaway status:</td>
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
    <td bgcolor="#666666">Order time:</td>
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
    <td bgcolor="#666666">Registered on:</td>
    <td><?php echo "$fetch->regged"; ?></td>
  </tr>
  <tr> 
    <td bgcolor="#666666">Crew:</td>
    <td>
      <?php if ($fetch->crew == "0"){ echo "None"; }else{ echo "$fetch->crew"; } ?>
    </td>
  </tr>
  <tr> 
    <td bgcolor="#666666">Total topics:</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td bgcolor="#666666">Friends:</td>
    <td><?php echo "$fetch->person"; ?></td>
  </tr>
  <tr bgcolor="#666666"> 
    <td colspan="2"><?php echo "".replace($fetch->quote).""; ?></td>
  </tr>
</table>
</body>
</html>
