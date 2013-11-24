<?
include "functions.php";
logincheck();
$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$helper=$_POST['helper'];
if($helper){
if($userlevel == 0 || $userlevel == 1){

}else{

mysql_query("UPDATE users SET helper='1' WHERE username='$helper'");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', '$helper', 'AdminCP', 'You Have Been Made Into A In Game Helper', '$date', '0', '0', '')");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Made $helper a helper', '$userlevel')");

print "You made $helper an Helper ";

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
<form method="post" action="">
  <div align="center">Username To Make Helper: 
    <input type="text" name="helper">
    <br>
    <input type="submit" value="Make User Helper">
  </div>
</form>
</html>