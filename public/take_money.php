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

$cur_money="$m->money";
$new_money="$cash_give";
$total_money=$cur_money - $new_money;

mysql_query("UPDATE users SET money='$total_money' WHERE username='$give_to'");

$a=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$give_to'"));


mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'Looney', 'Admin CP', '$username took from $give_to £$cash_give.', '$date', '0', '0', '')");


mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'took from $give_to £$cash_give ', '$userlevel')");

print "You took from $give_to £$cash_give. He now has £$a->money";

}

?>