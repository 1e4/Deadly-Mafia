<?
include "functions.php";
logincheck();
$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$admin=$_POST['admin'];
if($admin){
if($userlevel == 0 || $userlevel == 1){

}else{

mysql_query("UPDATE users SET userlevel='2' WHERE username='$admin'");

mysql_query("UPDATE users SET rank='Administrator' WHERE username='$admin'");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', '$admin', '$username', 'You Have Been Made Into An Administrator', '$date', '0', '0', '')");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Made $admin an admin', '$userlevel')");

print "You made $admin an administrator ";

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
<form method="post" action="admin_user.php">
  <div align="center">Username To Make Administrator: 
    <input type="text" name="admin">
    <br>
    <input type="submit" value="Make User Administrator">
  </div>
</form>
</html>