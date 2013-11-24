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

$cur_money="$m->points";
$new_money="$cash_give";
$total_money=$cur_money + $new_money;

mysql_query("UPDATE users SET points='$total_money' WHERE username='$give_to'");

$a=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$give_to'"));

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Gave $give_to £$cash_give ', '$userlevel')");

print "You gave $give_to $cash_give Points. He now has $a->points";

}

?>