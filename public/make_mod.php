<?
session_start();
include_once "includes/db_connect.php";
include_once"includes/functions.php";
logincheck();
include_once "includes/jail_check.php";
if ($info->userlevel=='0'){
die("");
}

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$mod=$_POST['mod'];
if($mod){
if($userlevel == 0){

}else{

mysql_query("UPDATE users SET userlevel='2' WHERE username='$mod'");

mysql_query("UPDATE users SET rank='Moderator' WHERE username='$mod'");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', '$mod', '$username', 'You Have Been Made Into A Moderator', '$date', '0', '0', '')");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Made $mod a Moderator', '$userlevel')");

print "<b>You made $mod a Moderator</b> ";

}}

?>

<html><style type="text/css">
<!--
body,td,th {
	color: #FFF5EE;
}
body {
	background-color: #555555;
}
-->
</style>
<div align="center"><b>Please think before you Mod any user (Every time you do it is logged).</b><br>
  <br>
</div>
<form method="post" action="">
  <div align="center">Username To Make Moderator: 
    <input type="text" name="mod">
    <br>
    <input type="submit" value="Make User Moderator">
  </div>
</form>
</html>