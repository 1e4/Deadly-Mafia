<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";
include_once "includes/jail_check.php";
include_once"probe.php";
logincheck();
$page="mission.php";
script_check($page);
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));




echo "<link rel=stylesheet href=includes/in.css type=text/css>";

?>

<html>
<head>
<title>::Gangster Bliss::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {color: #454545}
.style3 {
	font-family: "Times New Roman", Times, serif;
	font-style: italic;
	font-size: 16px;
	color: #333333;
}
a:link {
	color: #000000;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #000000;
}
a:active {
	text-decoration: none;
	color: #000000;
}
body {
	background-color: #363636;
}
-->
</style>
<!-- Copyright 2003 Macromedia, Inc. All rights reserved. -->
<!-- Copyright 2003 Macromedia, Inc. All rights reserved. -->
<!-- Copyright 2003 Macromedia, Inc. All rights reserved. -->
<!-- Copyright 2003 Macromedia, Inc. All rights reserved. -->
<!-- Copyright 2003 Macromedia, Inc. All rights reserved. -->
</head>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<table width="400" height="300" border="1" align="center" cellpadding="0" cellspacing="0" rules=none class=thinline>
  <tr> 
    <td background="images/bg3.bmp"><center>
        Missions
      </center></td>
  </tr>
<tr bgcolor=black><td height=1 colspan=3></td></tr>
  <tr> 
    <td height="319" background="letter.jpg"> <p><span class="style1"><font color="#454545">...</font></span>
      <?php 

if ($fetch->mission == "1"){ }?>
                              <span class="style3">Dear <? echo $fetch->username ?></span>
  </p>
    <p>&nbsp;</p>
    <p><font color="#454545">....</font><font color="#ffffff">.............................</font><a href="mission.php"><em>Open When you're ready </em></a></p>
    <p>&nbsp; </p>
    <p>
      <!-- MENU-LOCATION=NONE -->
</p></td>
  </tr>
</table>
<!-- MENU-LOCATION=NONE -->
<!-- MENU-LOCATION=NONE -->
<!-- MENU-LOCATION=NONE -->
<p>
  <!-- MENU-LOCATION=NONE -->
</p>
</body>
</html>

<?php include_once"includes/footer.php"; ?>

