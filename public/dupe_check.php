<?
/////////// MODERN MAFIA AUTO DUPE SCANNER HUMAN INTERFACE \\\\\\\\\\\\\\\\\\
include_once 'functions.php';
$fetch=mysql_fetch_object(mysql_query("SELECT username,userlevel FROM users WHERE username='$username'"));
$action=$_GET['action'];
$id=$_GET['id'];

$sql=mysql_query("SELECT * FROM dupe_list");

if($userlevel =="0"){
print "You are not autorised to use this aspect of the game !";
exit();
}else{

if($action == "ban_one"){
mysql_query("UPDATE users SET status='Banned' WHERE username='$id'");
mysql_query("DELETE FROM dupe_list WHERE username='$id'");
print "$id has been banned for duping";
}elseif($action == "ban_all"){
$query=mysql_query("SELECT username FROM users WHERE ip='$id'");
while($while = mysql_fetch_object($query)){
mysql_query("UPDATE users SET status='Banned' WHERE username='$while->username'");
}
mysql_query("DELETE FROM dupe_list WHERE ip='$id'");
print "all accounts with IP $id have been banned for duping";
}elseif($action == "warn_one"){
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read`) 
VALUES (
'', '$id', 'DUPE SCANNER', 'Your account has been found the have the same IP as 1 or more other accounts. This may be becasue you have logged 2 accounts in from the same internet connection. This is your first and last warning. If you feel there has been a mistake please E-Mail a  member of staff.', '$date', '0'
)")or die(mysql_error);
print "$id has been warned.";
}elseif($action == "warn_all"){
$query=mysql_query("SELECT username FROM users WHERE ip='$id'");
while($while = mysql_fetch_object($query)){
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` ) 
VALUES (
'', '$while->username', 'DUPE SCANNER', 'Your account has been found the have the same IP as 1 or more other accounts. This may be becasue you have logged 2 accounts in from the same internet connection. This is your first and last warning. If you feel there has been a mistake please E-Mail a  member of staff.', '$date', '0'
)")or die(mysql_error());
}
print "All accounts with IP $id Have Been Warned.";
}elseif($action == "warn_list"){
$query=mysql_query("SELECT dupe FROM dupe_list");
while($while = mysql_fetch_object($query)){
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read`) 
VALUES (
'', '$while->dupe', 'DUPE SCANNER', 'Your account has been found the have the same IP as 1 or more other accounts. This may be becasue you have logged 2 accounts in from the same internet connection. This is your first and last warning. If you feel there has been a mistake please E-Mail a  member of staff.', '$date', '0'
)")or die(mysql_error);
}
print "All Accounts Have Been Warned.";
}


}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
a:visited {
	color: #000000;
}
-->
</style></head>

<body>
<table width="775" height="48" border="1" bordercolor="#000000">
  <tr>
    <td width="55" height="21">ID</td>
    <td width="130">Username</td>
    <td width="162">Number Of Dupes Found </td>
    <td width="100">IP</td>
	<td width="306">Action</td>
  </tr>
  <? while($dupe = mysql_fetch_object($sql)){ ?>
  <tr>
    <td><? print"$dupe->id"; ?></td>
    <td><? print"$dupe->dupe"; ?></td>
    <td><? print"$dupe->number"; ?></td>
    <td><? print"$dupe->ip"; ?></td>
	<td><? print"<a href=?action=ban_one&id=$dupe->dupe>Ban This Account</a>
	<br>
	<a href=?action=warn_one&id=$dupe->dupe>Send Warning To This Account</a>
	<br>
	<a href=?action=ban_all&id=$dupe->ip>Ban All Accounts</a>
	<br>
	<a href=?action=warn_all&id=$dupe->ip>Warn All Accounts</a>"; ?></td>
  </tr>
  <? }?>
</table>
<p>Dupe list is updated at 12AM (midnight) every weekday.</p>
<p>Monitering the list is highly recommended before taking any action.</p>
<p>If in doubt warn the account. ALL accounts must be warned before the are banned. <? print "<a href=?action=warn_list>Click Here To Warn The Whole List</a>" ?> </p>
</body>
</html>
