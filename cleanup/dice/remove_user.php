<?
include "functions.php";
logincheck();
$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$remove=$_POST['remove'];
if($remove){
if($userlevel == 0 || $userlevel == 1){

}else{

mysql_query("UPDATE users SET userlevel='0' WHERE username='$remove'");

mysql_query("UPDATE users SET rank='Civilian' WHERE username='$remove'");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', '$remove', 'AdminCP', 'Your Admin/Mod Status Has Been Removed', '$date', '0', '0', '')");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Removed Admin/Mod Status From $remove.', '$userlevel')");

print "You removed admin/mod status from $remove. They have been informed in a message, this message does not contain your name";

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
<div align="center">Note this will make an administrator or a moderator into a player.<br>
  <br>
</div>
<form method="post" action="">
  <div align="center">Username To Remove Admin/Mod status:
    <input type="text" name="remove">
    <br>
    <input type="submit" value="Remove Admin/Mod Status">
  </div>
</form>
</html>