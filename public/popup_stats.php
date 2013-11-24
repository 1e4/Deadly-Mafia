<?php session_start();
include_once"includes/db_connect.php";
include_once"includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$info = mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
echo "$style"; 
?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body> 


<table width="34%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr> 
    <td height=22 background=<?php echo "$gradient"; ?> colspan="2"><div align="center">Your stats</div></td>
  </tr>
  <tr> 
    <td width="55%">Username:</td>
    <td width="45%"><?php echo "$info->username"; ?></td>
  </tr>
  <tr> 
    <td>ID:</td>
    <td><?php echo "$info->id"; ?></td>
  </tr>
  <tr> 
    <td>Money:</td>
    <td><?php echo "£".makecomma($info->money).""; ?></td>
  </tr>
  <tr> 
    <td>Location:</td>
    <td><?php echo "$info->location"; ?></td>
  </tr>
  <tr> 
    <td><em><a href="">Timers</a></em></td>
    <td><em><a href="">Game time</a></em></td>
  </tr>
</table>
</body>
</html>
