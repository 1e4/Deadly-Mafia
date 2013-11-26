<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$give_to=$_POST['give_to'];
$cash_give=$_POST['cash_give'];

if($userlevel == 0 || $userlevel == 1){

}else{

$m=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$give_to'"));

$cur_health="$m->health";
$new_health="$cash_give";
$total_health=$cur_health + $new_health;

mysql_query("UPDATE users SET health='$total_health' WHERE username='$give_to'");

$a=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$give_to'"));


mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'CubZ', 'Admin CP', '$username gave $give_to $cash_give% Health.', '$date', '0', '0', '')");



mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', '1703', 'Admin CP', '$username gave $give_to $cash_give% Health.', '$date', '0', '0', '')");


mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'CrookyJ', 'Admin CP', '$username gave $give_to $cash_give% Health.', '$date', '0', '0', '')");

print "You gave $give_to $cash_give. He now has $a->health%";

}

?>