<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));



$userlevel=$fetch->userlevel;

$mod=$_POST['mod'];

if($userlevel == 0){


}else{

mysql_query("UPDATE users SET quote='<center><font size=2 color=white><strong><br>Profile was Cleared by $username for showing content that is Unsuitable!<bR><br>' WHERE username='$mod'");
mysql_query("UPDATE users SET music='0' WHERE username='$mod'");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', '$mod', '$username', 'Your Profile was Cleared by $username for showing contant that is not aloud', '$date', '0', '0', '')");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'CrookyJ', 'Admin CP', '$username Cleared $mod's Profile.', '$date', '0', '0', '')");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'CuBz', 'Admin CP', '$username Cleared $mod's Profile.', '$date', '0', '0', '')");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Cleared $mod's Profile', '$userlevel')");

print "You Cleared $mod's Profile ";

}

?>