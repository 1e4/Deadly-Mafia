<?php session_start(); include "includes/db_connect.php"; include"includes/functions.php"; logincheck();
$username=$_SESSION['username'];
$query=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($query);



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="includes/in.css" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>

  <style type="text/css">
<!--
body {
	background-color: #454545;
}
.style1 {color: #FFFFFF}
-->
  </style></head>

<body>
<div align="left">
  <div id="Layer1" style="position:absolute; left:2px; top:4px; width:795px; height:65px; z-index:1">
    <div align="center"><span class="style1"><img src="TopBanner.jpg" width="800" height="80"> </span></div>
  </div>
</div>
</body>
</html>
