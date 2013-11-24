<?php
session_start();
$username=$_SESSION['username'];
include_once "db_connect.php";
include_once "functions.php";
logincheck();

$fetch_info=mysql_fetch_object(mysql_query("SELECT * FROM user_info WHERE username='$username'"));


if(rand(1,30)> "22" &&  $fetch_info->jail_able == "0"){

if ($reason == "Crime"){
$length=rand(30,60) + time();
$quote = "Crime";
}elseif ($reason ==  "GTA"){
$length=rand(60,120) + time();
$quote="Gta";
}elseif ($reason == "Jail busting"){
$length=rand(120,140) + time();
$quote="Jail busting";
}elseif ($reason == "Food crime"){
$length=rand(120,140) + time();
$quote="Food crime";
}



		$crimes = mysql_query("SELECT location FROM users WHERE username='$username'");
$check = mysql_fetch_object($crimes);

mysql_query("INSERT INTO `jail` (`id`,`username`, `time_left`,`reason`,`location`) VALUES ('', '$username', '$length', '$reason', '$check->location');") or die (mysql_error());
		 
		 if ($reason == "Jail busting"){
echo "<font size=5><font color=white><center>You got caught jail busting your in jail for ".maketime($length)."</font>";
exit();
}else{
		 echo "<font size=2><font color=red> <center>You were caught doing a $quote you are now in jail for ".maketime($length)."</font>";
		 exit();
	}}
?>