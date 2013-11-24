<?
include "functions.php";

logincheck();

$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$revive=$_POST['revive'];

$cock="0";

if(!$revive){
$cock="1";
}

if($userlevel == 0 || $userlevel == 1 || $cock == "1"){

}else{

mysql_query("UPDATE users SET status='Alive' WHERE username='$revive'");
mysql_query("UPDATE users SET health='100' WHERE username='$revive'");


mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Revived $revive.', '$userlevel')");


print "You revived $revive And Reset there health to 100% ";

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
  <div align="center">Username To Revive: 
    <input type="text" name="revive">
    <br>
    <input type="submit" value="Revive User">
  </div>
</form>
</html>