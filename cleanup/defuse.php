<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Russian Roulette</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="file:///C|/Documents%20and%20Settings/J/My%20Documents/My%20Received%20Files/includes/in.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style2 {color: #FFFF00}
.style3 {color: #FF0000}
-->
</style>
</head>

<body>
<table width="100%"  border="0" cellpadding="0" cellspacing="0" bordercolor="#0099FF" class="thinline">
  <tr>
    <td colspan="5" class="header">RussianRoulette</td>
  </tr>
  <tr>
    <td colspan="5"><blockquote>
        <p><br>
        You either win big or loose your life! </p>
        <p class="style3"> NOTE: YOUR ACCOUNT CAN BE KILLED DURING ATTEMPTING THIS. IF YOU DIE YOU WILL NOT BE REVIVED! </p>
        <p class="style2">&nbsp;</p>
    </blockquote>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td class="header">Status:</td>
    <td>You must be Gangster to play </td>
    <td class="header"><a href="defuse2.php">Play Russian Roulette </a>(This starts the game) </td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<br>