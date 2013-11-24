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

mysql_query("UPDATE users SET userlevel='3' WHERE username='$mod'");

mysql_query("UPDATE users SET rank='Admin' WHERE username='$mod'");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', '$mod', '$username', 'You Have Been Made Into A Administrator', '$date', '0', '0', '')");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Made $mod a Administrator', '$userlevel')");

print "You made $mod a Administrator ";

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
<div align="center">Please think before you Admin any user (Every time you do it is logged).<br>
  <br>
</div>
<form method="post" action="">
  <div align="center">Username To Make Administrator: 
    <input type="text" name="mod">
    <br>
    <input type="submit" value="Make User Moderator">
  </div>
</form>
</html>