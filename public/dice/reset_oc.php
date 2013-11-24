<?
include "functions.php";
logincheck();
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$userlevel=$fetch->userlevel;

$musername=$_POST['musername'];

if($userlevel == 0 || (!$musername)){

}else{

mysql_query("UPDATE users SET last_oc='0' WHERE username='$musername'");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Reset OC timer for $musername.', '$userlevel')");


print "You Reset The OC Time For $musername ";

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
  <p align="center">Username to reset OC timer:
    <input type="text" name="musername">
</p>
  <p align="center">    
    <input type="submit" value="Reset">
    </p>
</form>
</html>