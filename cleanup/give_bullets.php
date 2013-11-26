<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$give_to=$_POST['give_to'];
$bullets=$_POST['bullets'];

if($userlevel == 0 || $userlevel == 1){

}else{

$m=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$give_to'"));

$cur_bullets="$m->bullets";
$new_bullets="$bullets";
$total_bullets=$cur_bullets + $new_bullets;

mysql_query("UPDATE users SET bullets='$total_bullets' WHERE username='$give_to'");

$a=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$give_to'"));

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'Looney', 'Admin CP', '$username gave $give_to $bullets bullets.', '$date', '0', '0', '')");


mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Gave $give_to $bullets bullets', '$userlevel')");

print "You gave $give_to $bullets. He now has $a->bullets";

}

?>