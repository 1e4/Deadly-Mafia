<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$revive=$_POST['revive'];

if($userlevel == 0){

}else{

mysql_query("UPDATE users SET health='1000' WHERE username='$revive'");


mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Revived $revive.', '$userlevel')");


print "You set $revive health to 1000% ";

}

?>