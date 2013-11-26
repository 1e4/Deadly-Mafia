<?
include "functions.php";
logincheck();


$select=mysql_query("SELECT * FROM users WHERE username='$username'");
$p=mysql_fetch_object($select);

$userlevel=$p->userlevel;

$mass_msg=strip_tags($_POST['mass_msg']);

if($userlevel == 2 || $userlevel == 1){

if($mass_msg){

$total=0;

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Sent A Message to all users', '$userlevel')");

$select_all=mysql_query("SELECT * FROM users WHERE status='Alive'");

while($send_to=mysql_fetch_object($select_all)){
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read`) 
VALUES (
'', '$send_to->username', '$username', '$mass_msg', '$date', '0')");
$total++;
}

echo "$total messages sent";

}else{


}
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
Message To Send: <textarea name="mass_msg" cols="40" rows="7" id="mass_msg"></textarea>
<input type="submit" value="Message All Users">
</form>
</html>