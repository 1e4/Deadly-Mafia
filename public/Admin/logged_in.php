<?
include "functions.php";
logincheck();
$fetch=mysql_fetch_object(mysql_query("SELECT userlevel FROM users WHERE username='$username'"));
$userlevel=$fetch->userlevel;
$server = rand(1,5);
$con = rand(5,25);
if($userlevel > "0"){

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="Javascript">
<!-- 
// please keep these lines on when you copy the source
// made by: Nicolas - http://www.javascript-page.com

if (top.location != self.location) {
top.location = self.location.href
}

//--> 
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: Rising Nations :: <? print"$fetch->username"; ?> Logged In @ Management Center On Server <? print "$server // Server Speed: $con Mbps \\"; ?></title>

</head>

<frameset rows="*" cols="250,*" framespacing="0" frameborder="no" border="0">
  <frame src="/MANAGEMENT_CENTER/menu.php" name="leftFrame" scrolling="yes" noresize="noresize" id="leftFrame" title="nav" />
  <frame src="/MANAGEMENT_CENTER/main.php" name="mainFrame" id="mainFrame" title="middle" />
</frameset>
<noframes><body>
</body>
</noframes></html>
<? } ?>