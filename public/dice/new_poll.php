<?
include "functions.php";
logincheck();
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$userlevel=$fetch->userlevel;

$title=$_POST['title'];
$op1=$_POST['op1'];
$op2=$_POST['op2'];
$op3=$_POST['op3'];


if($userlevel == "2"  && ($title)){

if(!$title || !$op1 || !$op2 || !op3){
print"you must enter all the info";
}else{

mysql_query("UPDATE polls SET title='$title' WHERE id='1'");
mysql_query("UPDATE polls SET op1='$op1' WHERE id='1'");
mysql_query("UPDATE polls SET op2='$op2' WHERE id='1'");
mysql_query("UPDATE polls SET op3='$op3' WHERE id='1'");
mysql_query("UPDATE polls SET v1='0' WHERE id='1'");
mysql_query("UPDATE polls SET v2='0' WHERE id='1'");
mysql_query("UPDATE polls SET v3='0' WHERE id='1'");
mysql_query("UPDATE users SET poll='0'");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'New Poll', '$userlevel')");

print"Poll settings updated <br><br>Users poll settings updated <br><br>Votes Configured";
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
Poll Title:<input type="text" name="title"><br><br>
Option 1:<input type="text" name="op1"><br><br>
Option 2:<input type="text" name="op2"><br><br>
Option 3:<input type="text" name="op3"><br><br>
<input type="submit" value="Make New Poll"><br>
</form>
</html>