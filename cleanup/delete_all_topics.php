<?

include "functions.php";
logincheck();
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$userlevel=$fetch->userlevel;

$musername=$_POST['musername'];

if($userlevel == 0 || (!$musername)){

}else{

mysql_query("DELETE FROM topics WHERE username='$musername'");

mysql_query("DELETE FROM topics WHERE username='$musername'");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'deleted all topics and posts by $musername.', '$userlevel')");

print "You deleted all topics and posts by $musername";

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
  <p align="center">This will delete all topics and post made by a certain user. </p>
  <p align="center">Username:
    <input type="text" name="musername">
  </p>
  <p align="center">
    <input type="submit" value="Delete">
  </p>
</form>
</html>
