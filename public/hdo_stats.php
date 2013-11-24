<?
include "includes/db_connect.php";
include 'includes/functions.php';
logincheck();

$hdo_sql=mysql_query("SELECT hdo_stat,username FROM users WHERE helper='1' ORDER by hdo_stat DESC");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="includes/test.css" rel="stylesheet" type="text/css">

<title>Untitled Document</title>

</head>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<p align="center" class="style1">Helpdesk Statsistics</p>
<table width="333" height="48" border="1" align="center" cellspacing="0" bordercolor="000000">
  <tr bordercolor="#000000">
    <td width="182" background="includes/grad.jpg"><div align="center">Username
    </div></td>
    <td width="141" background="includes/grad.jpg"><div align="center">Tickets Answered </div></td>
  </tr>

<? while($hdo = mysql_fetch_object($hdo_sql)){ ?>
  <tr bgcolor="#999999">
    <td height="21"><? print "$hdo->username"; ?>
    <div align="left"></div>    </td>
    <td><? print "$hdo->hdo_stat"; ?></td>
  </tr>
<? } ?>
</table>
<div align="center"></div>
</body>
</html>
