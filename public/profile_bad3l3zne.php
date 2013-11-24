<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
include"includes/smile.php";
logincheck();
$username=$_SESSION['username'];
$viewuser=$_GET['viewuser'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$viewuser'"));
if (!$fetch){
echo "No such user";
exit();
}


?><!--MMDW 1 -->
<html>
<head>
<title>Untitled Document</title>
<meta mmdw=0 http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link mmdw=1 href="includes/in.css" rel="stylesheet" type="text/css">
</head>
<embed mmdw=2 src="<?php echo "".addslashes($fetch->music).""; ?>" width=0 height=0 play=true loop=true quality=high>
</embed>
<body>
<!--MMDW 2 --><?php $donater=mysql_num_rows(mysql_query("SELECT * FROM donaters WHERE username='$viewuser'"));
if ($donater != "0"){
echo "
<a href=donate.php><img src=\"images/donater.gif\" border=0 style=\"position: absolute; top: 10px; right: 30px; filter:alpha(Opacity=90);\"></a>
";
}
?><!--MMDW 3 -->
<table mmdw=3 width="72%" border="1" align="center" cellpadding="5" cellspacing="3" bordercolor=#000000>
  <tr > 
    <td mmdw=4 colspan="2" class=header><div mmdw=5 align="center">User profile</div></td>
  </tr>
  <tr mmdw=6 bgcolor=white> 
    <td mmdw=7 colspan="2" class=tip><div mmdw=8 align="center">User information for <!--MMDW 4 --><?php echo "$viewuser"; ?><!--MMDW 5 --></div></td>
  </tr>
  <tr> 
    <td mmdw=9 colspan="2"><div mmdw=10 align="center"><img mmdw=11 src=<?php echo "$fetch->image"; ?>></div></td>
  </tr>
  <tr> 
    <td mmdw=12 width="50%" bgcolor="#666666">Username:</td>
    <td mmdw=13 width="50%"><!--MMDW 6 --><?php echo "<a href='send.php?fromper=$viewuser'>$viewuser</a>"; ?><!--MMDW 7 --> 
      | <a mmdw=14 href="?friend=1&viewuser=<?php echo "$viewuser"; ?>">Add to your 
      friends list</a> | <a mmdw=15 href="?block=1&viewuser=<?php echo "$viewuser"; ?>">Block 
      </a></td>
  </tr>
  <tr> 
    <td mmdw=16 bgcolor="#666666">Status:</td>
    <td> 
      <!--MMDW 8 --><?php
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

           echo "$fetch->status ($state - $fetch->choice)"; ?><!--MMDW 9 -->
    </td>
  </tr>
  <tr> 
    <td mmdw=17 bgcolor="#666666">Wealth:</td>
    <td>
      <!--MMDW 10 --><?php
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
?><!--MMDW 11 -->
    </td>
  </tr>
  <tr> 
    <td mmdw=18 bgcolor="#666666">Rank:</td>
    <td><!--MMDW 12 --><?php echo "$fetch->rank"; ?><!--MMDW 13 --></td>
  </tr>
  <tr> 
    <td mmdw=19 bgcolor="#666666">OC status:</td>
    <td>
      <!--MMDW 14 --><?php 

$selects = mysql_query("SELECT * FROM users WHERE username = '$viewuser'");
$is = mysql_fetch_object($selects);
if ($is->last_oc > time()){
$status="Not ready";
}else{
$status="Ready";
}
echo "$status"; ?><!--MMDW 15 -->
    </td>
  </tr>
  <tr> 
    <td mmdw=20 bgcolor="#666666">Registered on:</td>
    <td>
      <!--MMDW 16 --><?php echo "$fetch->regged";  ?><!--MMDW 17 -->
    </td>
  </tr>
  <tr> 
    <td mmdw=21 bgcolor="#666666">Crew:</td>
    <td>
      <!--MMDW 18 --><?php if ($fetch->crew == "0"){ echo "None"; }else{ echo "$fetch->crew"; } ?><!--MMDW 19 -->
    </td>
  </tr>
  <tr mmdw=22 bgcolor="#666666"> 
    <td mmdw=23 colspan="2"><!--MMDW 20 --><?php echo "".replace($fetch->quote).""; ?><!--MMDW 21 --></td>
  </tr>
</table>
<td mmdw=24 bgcolor="#666666">&nbsp;</td>
    <td>&nbsp;</td>
</body>
</html>
<!-- MMDW:success -->