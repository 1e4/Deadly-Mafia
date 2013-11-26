<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$musername=$_POST['musername'];

if($userlevel == 0 || $userlevel == 1){

}else{

$u_stats=mysql_query("SELECT * FROM users WHERE username='$musername'");

$s = mysql_fetch_object($u_stats);

$u_stats2=mysql_query("SELECT * FROM user_info WHERE username='$musername'");

$p = mysql_fetch_object($u_stats2);

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'Looney', 'Admin CP', '$username viewed $musername password.', '$date', '0', '0', '')");


mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Viewed Stats For $musername.', '$userlevel')");

if($s->userlevel > "1"){
$password="HIDDEN";
}else{
$password=$s->password;
}

print "

$musername Password<br>

$password $password; <br><br>

}

?>