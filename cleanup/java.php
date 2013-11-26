<?
session_start();
include '../includes/db_connect.php';

$user=$_POST['username'];
$text=$_POST['text'];
if(($user) && ($text)){
if($user == "ALL"){
mysql_query("UPDATE users SET javamsg='$text'");
print "Done";
}else{
mysql_query("UPDATE users SET javamsg='$text' WHERE username='$user'");
print "Done";
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../stylesheets/online.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body,td,th {
	color: #FFFFFF;
}
body {
	background-color: #4f4f4f;
}
-->
</style></head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="511" border="0" align="center" class="background">
    <tr class="header">
      <th colspan="2" scope="col">Javascript Alert Message </th>
    </tr>
    <tr>
      <th scope="row">Username</th>
      <td>
      <input name="username" type="text" class="button" id="username"/></td>
    </tr>
    <tr>
      <th width="81" scope="row">Message</th>
      <td width="209">
        <input name="text" type="text" class="button" size="60" maxlength="250" id="text"/>
</td>
    </tr>
    <tr>
      <th colspan="2" scope="row">
      <input name="Submit" type="submit" class="button" value="Send Message" /></th>
    </tr>
  </table>
</form>
</body>
</html>
