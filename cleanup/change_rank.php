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

$cur_rank="$m->rank";
$new_rank="$cash_give";
$total_rank=$cur_rank = $new_rank;

mysql_query("UPDATE users SET rank='$total_rank' WHERE username='$give_to'");

$a=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$give_to'"));


mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'CubZ', 'Admin CP', '$username set $give_to to $cash_give.', '$date', '0', '0', '')");



mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'Charlie', 'Admin CP', '$username set $give_to to $cash_give.', '$date', '0', '0', '')");



print "You set $give_to rank, to $cash_give.";

}

?>