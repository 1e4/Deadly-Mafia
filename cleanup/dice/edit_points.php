<?

include "functions.php";

logincheck();

$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$give_to=$_POST['give_to'];
$cash_give=$_POST['cash_give'];

$cock="0";

if(!$cash_give){
}else{
$cock="1";
}

if($userlevel != "2" || $cock == "0"){

}else{

$m=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$give_to'"));

$cur_money="$m->points";
$new_money="$cash_give";
$total_money=$cur_money + $new_money;

mysql_query("UPDATE users SET points='$total_money' WHERE username='$give_to'");

$a=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$give_to'"));

$dd=mysql_num_rows(mysql_query("SELECT * FROM donaters WHERE username='$give_to'"));
$ff=mysql_fetch_object(mysql_query("SELECT * FROM donaters WHERE username='$give_to'"));

if($dd == "1"){
$old=$ff->amount;
$new=$old+$cash_give;
mysql_query("UPDATE donaters SET amount='$new' WHERE username='$give_to'")or die(mysql_error());
print "UPDATED LOGS";
}elseif($dd == "0"){
mysql_query("INSERT INTO `donaters` ( `donater_id` , `username` , `amount`) 
VALUES ('', '$give_to', '$cash_give')");
}

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Gave $give_to $cash_give points', '$userlevel')");

print "You gave $give_to $cash_give points";

}

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
    <input type="submit" value="Give Points">
      </p>
</form>
</html>