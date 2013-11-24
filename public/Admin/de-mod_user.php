<?

session_start();



include "db_connect.php";



include "functions.php";



logincheck();



$username=$_SESSION['username'];



$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));







$userlevel=$fetch->userlevel;



$mod=$_POST['mod'];



if($userlevel == 0){





}else{



mysql_query("UPDATE users SET userlevel='0' WHERE username='$mod'");

mysql_query("UPDATE users SET health='100' WHERE username='$mod'");

mysql_query("UPDATE users SET crew='0' WHERE username='$mod'");



mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 

VALUES ('', '$mod', '$username', 'You Have Been De-Modded', '$date', '0', '0', '')");



mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 

VALUES ('', 'CrookyJ', 'Admin CP', '$username De-Modded $mod.', '$date', '0', '0', '')");



mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 

VALUES ('', 'CubZ', 'Admin CP', '$username De-Modded $mod.', '$date', '0', '0', '')");



mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 

VALUES ('', '$username', 'De-Modded $mod', '$userlevel')");



print "You have De-Mod $mod";



}



?>