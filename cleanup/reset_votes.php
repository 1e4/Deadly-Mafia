<?
include "functions.php";
logincheck();
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$userlevel=$fetch->userlevel;

$done=$_POST['reset'];

if($userlevel == "2" && ($done)){
mysql_query("UPDATE users SET poll='0'");
mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Reset Poll Votes', '$userlevel')");
print "Votes Reset";
}

?><style type="text/css">
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
  <div align="center">
  <input type="hidden" name="reset" value="1">
  <input type="submit" value="Reset Votes">
  <br>
  </div>
</form>
</html>