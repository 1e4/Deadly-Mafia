<?php 

include_once"includes/db_connect.php";

include_once"includes/functions.php";

logincheck();

$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));



?>

<html>

<head>

<title>.:Murder Mafia!:.</title>

</head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">



</head>



<frameset  rows="106,*" border="0">

<frame name="littlebanner" src="Banner.html" marginwidth="2" marginheight="2" scrolling="no" frameborder="0">



<frameset  rows="30,*" border="0">

<frame name="littlebanner1" src="min3i.php" marginwidth="2" marginheight="2" scrolling="no" frameborder="0">



<frameset  cols="173,*" border="1">

<frame name="menu" src="Menu.php" marginwidth="0" marginheight="2" scrolling="auto" frameborder="0" noresize>



<frame name="main" src="main.php" marginwidth="4" marginheight="5" scrolling="auto" frameborder="0" noresize>

</frameset><noframes></noframes>



</html>













