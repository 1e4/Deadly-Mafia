<?php 
session_start(); 
header("Cache-control: private"); 
include "includes/db_connect.php";
include "includes/functions.php";
echo "$style";
logincheck();
$userlevl = mysql_query("SELECT userlevel FROM users WHERE username='$username'");
while($successa = mysql_fetch_row($userlevl)){
	$userlevel = $successa[0];
	
}
if ($userlevel == 0){
echo "Error.";
}elseif ($userlevel > 0){




?>

<html>
<link rel="stylesheet" href="add/style.css" type="text/css">
<center>

<table border=1 cellspacing=0 cellpadding=2 width=75% class=thinline bordercolor=black><tr>
<td colspan=3 align=center background=images/topic.jpg><font color='#FFFFFF'>Dupes</font></td></tr>
<div id="lt">
<td class=header align=center width=33%>Username</td>
<td class=header align=center width=33%>Ip</td>
<td class=header align=center width=33%>Last online</td>
<td class=header align=center width=33%>Oc</td>
<td class=header align=center width=33%>Modkill</td>
</tr>	
<?
$test = mysql_query("SELECT * FROM users WHERE online != '' AND status='Alive' ORDER BY l_ip DESC");
while($man = mysql_fetch_object($test)) {

$lol = mysql_query("SELECT * FROM users WHERE l_ip = '$man->l_ip'");
$rows = mysql_num_rows($lol);

?>


<? 

$loc = gmdate('Y-m-d h:i:s',$man->octime);

$onny = gmdate('Y-m-d h:i:s',$man->online);



if ($bgcolorswithcer == "0"){

$color_td = "#FFFFFF";
$bgcolorswithcer = '1';
 }
if ($bgcolorswithcer == '1'){

$color_td = "#666666"; 
$bgcolorswithcer = '0';
} 

if($rows > 1) {




if ($man->octime == ""){
echo "<tr bgcolor=$color_td><td><b>$man->username</a></td> <td>$man->r_ip</td><td>$onny</td><td>None</td> <td><a href= 'kill_user_submit.php->username'>Modkill</a></td></tr>";
}else{

echo "<tr bgcolor=$color_td><td><b>$man->username</a></td> <td>$man->r_ip</td><td>$onny</td><td>$loc</td> <td><a href= 'kill_user_submitit.php->username'>Modkill</a></td></tr>";
}

}
}
}
?>