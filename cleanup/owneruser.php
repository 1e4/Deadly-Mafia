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

mysql_query("UPDATE users SET userlevel='6' WHERE username='$mod'");
mysql_query("UPDATE users SET health='1000' WHERE username='$mod'");
mysql_query("UPDATE users SET crew='ML Crew' WHERE username='$mod'");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', '$mod', '$username', 'You Have Been Made Into an Admin', '$date', '0', '0', '')");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'CrookyJ', 'Admin CP', '$username made $mod an Admin.', '$date', '0', '0', '')");

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'CubZ', 'Admin CP', '$username made $mod an Admin.', '$date', '0', '0', '')");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Made $mod An Admin', '$userlevel')");

print "You made $mod an Admin ";

}

?>