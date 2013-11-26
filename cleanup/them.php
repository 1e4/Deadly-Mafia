<?php 
include_once"includes/db_connect.php";
include_once"includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

?>
<html>
<head>
<title>BeyondTheMafia</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<frameset rows="97,*" cols="*" framespacing="0" frameborder="no" border="0">
  <frameset rows="100,*" cols="*" framespacing="0" frameborder="NO" border="0">
    <frame src="file:///C|/Documents%20and%20Settings/J/Desktop/public_html/banner.php" name="topFrame1" scrolling="NO" noresize > 
   
  <frame src="file:///C|/Documents%20and%20Settings/J/Desktop/public_html/UntitledFrame-41"></frameset>
  
    <frameset rows="*" cols="200,*" framespacing="0" frameborder="NO" border="0">
      <frame src="file:///C|/Documents%20and%20Settings/J/Desktop/public_html/menu.php" name="leftFrame" noresize>
      <frame src="file:///C|/Documents%20and%20Settings/J/Desktop/public_html/main.php" name="middle">
    </frameset>
  
</frameset>
<noframes></noframes>




</html>


