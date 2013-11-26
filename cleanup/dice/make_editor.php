<?
include "functions.php";
logincheck();
$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

$userlevel=$fetch->userlevel;

$musername=$_POST['musername'];

if($musername){
if($userlevel == 0){

}else{

mysql_query("UPDATE users SET editor='1' WHERE username='$musername'");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Made $musername newspaper editor', '$userlevel')");


print "$musername is now a newspaper editor";

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
  <p align="center">Username To Make Editor: 
    <input type="text" name="musername">
    </p>
  <p align="center">
    <input type="submit" value="Make Newspaper Editor">
    </p>
</form>
</html>