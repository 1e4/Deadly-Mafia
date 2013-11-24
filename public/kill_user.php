<?
include "functions.php";

logincheck();

$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$kill=$_POST['kill'];

$cock="0";

if(!$kill){
$cock="1";
}

if($userlevel == 0 || $cock == "1"){

}else{

if($kill == "Ben" || $kill == "Chubbs"){
print "U PRICK YOU CANT KILL ME";

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', '$username Tryed To Kill $kill', '$userlevel')");

}

mysql_query("UPDATE users SET status='Dead' WHERE username='$kill'");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', '$username Killed $kill', '$userlevel')");

print "You killed $kill ";

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
<div align="center">Please think before you kill any user.<br>
  <br>
</div>
<form method="post" action="">
  <div align="center">Username To Kill: 
    <input type="text" name="kill">
    <br>
    <input type="submit" value="Kill User">
  </div>
</form>
</html>