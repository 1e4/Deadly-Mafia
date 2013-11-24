<?
include "functions.php";
logincheck();
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$userlevel=$fetch->userlevel;

$give_to=$_POST['give_to'];
$cash_give=$_POST['cash_give'];

if($userlevel == 0 || $userlevel == 1){
}else{

if(!$give_to){
}else{
$m=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$give_to'"));

$cur_money="$m->bullets";
$new_money="$cash_give";
$total_money=$cur_money + $new_money;

mysql_query("UPDATE users SET bullets='$total_money' WHERE username='$give_to'");
$a=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$give_to'"));

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Gave $give_to $cash_give bullets', '$userlevel')");

print "You gave $give_to $cash_give they now have $a->bullets bullets";

}}



?>

<html><style type="text/css">
<!--
body,td,th {
	color: #990000;
}
body {
	background-color: #999999;
}
-->
</style>
<form method="post" action="">
  <p align="center">Username: 
    <input type="text" name="give_to">
</p>
  <p align="center">Amount: 
    <input type="text" name="cash_give">
    </p>
  <p align="center">
    <input type="submit" value="Update Bullets">
      </p>
</form>
</html>