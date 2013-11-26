<?php session_start(); include "includes/db_connect.php"; include"includes/functions.php"; logincheck();
$username=$_SESSION['username'];
$query=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($query);
$inbox_msg=mysql_num_rows(mysql_query("SELECT * FROM `inbox` WHERE `read`='0' AND `to`='$username'"));



?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body><meta http-equiv="refresh" content="250">
<?php if ($inbox_msg != "0"){ echo "<a href=inbox.php target=middle><img border=0 src=images/newmail.jpg align=left  width=122 height=80></a> "; }else{ echo "<img src=images/nomail.jpg align=left width=122 height=80>"; } ?>
</body>
</html>
