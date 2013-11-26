<?
include "functions.php";
logincheck();
$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$mod=$_POST['mod'];
if($mod){
if($userlevel == 0){

}else{

mysql_query("UPDATE users SET userlevel='1' WHERE username='$mod'");

mysql_query("UPDATE users SET rank='Moderator' WHERE username='$mod'");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', '$mod', '$username', 'You Have Been Made Into A Moderator', '$date', '0', '0', '')");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Made $mod a Moderator', '$userlevel')");

print "You made $mod a Moderator ";

}}

?>

<html><style type="text/css">
<!--
body,td,th {
	color: #990000;
}
body {
	background-color: #999999;
}
-->
</style>
<div align="center">Please think before you Mod any user (Every time you do it is logged).<br>
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