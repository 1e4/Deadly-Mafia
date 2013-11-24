<?
include "functions.php";
logincheck();
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$userlevel=$fetch->userlevel;

$main=$_POST['main'];
$off=$_POST['off'];
$class=$_POST['class'];
$crew=$_POST['crew'];

if($userlevel != "0"){

if($main){
//// if main button is clicked
mysql_query("DELETE FROM `topics` WHERE forum='main' AND locked='0' AND sticky='0'")or die(mysql_query());
mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Reset Main Forum.', '$userlevel')");
print "Done";
}elseif($off){
//// if off button is clicked
mysql_query("DELETE FROM topics WHERE forum='off_topic' AND locked='0' AND sticky='0'");
mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Reset Off Topic Forum.', '$userlevel')");
print "Done";
}elseif($class){
//// if class button is clicked
mysql_query("DELETE FROM topics WHERE forum='oc_forum' AND locked='0' AND sticky='0'");
mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Reset Classified Forum.', '$userlevel')");
print "Done";
}elseif($crew){
//// if crew button is clicked
print "Sorry this feature has been disabled.";
}

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

<form method="post" action="">
  <div align="center">
    <input type="hidden" name="main" value="1">
    <input type="submit" value="Reset Main Forum">
  </div>
</form>

<form method="post" action="">
  <div align="center">
    <input type="hidden" name="off" value="1">
    <input type="submit" value="Reset Off Topic Forum">
  </div>
</form>

<form method="post" action="">
  <div align="center">
    <input type="hidden" name="class" value="1">
    <input type="submit" value="Reset Classifieds Forum">
  </div>
</form>

<form method="post" action="">
  <div align="center">
    <input type="hidden" name="crew" value="1">
    <input type="submit" value="Reset Crew Forum">
  </div>
</form>
</html>