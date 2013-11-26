<?
include "functions.php";
logincheck();
$username=$_SESSION['username'];

$select=mysql_query("SELECT * FROM users WHERE username='$username'");
$p=mysql_fetch_object($select);
$date=gmdate;
$to_who=$_POST['username'];
$msg=strip_tags($_POST['msg']);

$userlevel=$p->userlevel;

$cock="0";

if(!$to_who){
$cock="1";
}else{

}

if($userlevel == "0" || $cock == "1"){

}else{

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES (
'', '$to_who', 'The Mafia Staff', '$msg', '$date', '0', '0', ''
)")or die(mysql_error);


mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', '$username sent a warning to $to_who', '$userlevel')")or die(mysql_error);

print "Warning Sent";
}


?>


<style type="text/css">
<!--
body,td,th {
	color: #990000;
}
body {
	background-color: #999999;
}
-->
</style>

<html>
<form method="post" action="">
  <p align="center">
    Username: 
    <input name="username" type="text" id="username" maxlength="40">
  </p>
  <p align="center">Message To Send: <br>
    <textarea name="msg" cols="40" rows="8" id="msg"></textarea>
    <br>
    <br>
    <input type="submit" value="Warn User">
    </p>
</form>
</html>