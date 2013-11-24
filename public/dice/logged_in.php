<?
$page="123log";


include "functions.php";
logincheck();
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$userlevel=$fetch->userlevel;
$server = rand(1,5);
$con = rand(5,25);
if($userlevel > "0"){

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>The Mafia CP <? print"$fetch->username"; ?> </title>
</head>

<frameset rows="*" cols="250,*" framespacing="0" frameborder="no" border="0">
  <frame src="menu.php" name="leftFrame" scrolling="yes" noresize="noresize" id="leftFrame" title="nav" />
  <frame src="main.php " name="mainFrame" id="mainFrame" title="middle" />
</frameset>
<noframes><body>
</body>
</noframes></html>
<? } ?>