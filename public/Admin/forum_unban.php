<?
include "functions.php";
logincheck();
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$userlevel=$fetch->userlevel;

$musername=$_POST['musername'];

if($userlevel == 0 || (!$musername)){

}else{

mysql_query("UPDATE users SET forum_ban='0' WHERE username='$musername'");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Unbanned $musername From all forums.', '$userlevel')");


print "You unbanned $musername from all the forums ";

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
  <p align="center">Unban a user from forums :
    <input type="text" name="musername">
</p>
  <p align="center">    
    <input type="submit" value="Unban">
    </p>
</form>
</html>