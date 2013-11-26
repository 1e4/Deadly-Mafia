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

mysql_query("UPDATE users SET status='Alive' WHERE username='$revive'");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'CubZ', 'Admin CP', '$username revived $revive ', '$date', '0', '0', '')");


mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', '1703', 'Admin CP', '$username revived $revive ', '$date', '0', '0', '')");


mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'CrookyJ', 'Admin CP', '$username revived $revive ', '$date', '0', '0', '')");

print "You revived $revive And Reset there health to 100% ";

}

?>