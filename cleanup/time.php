<?php session_start(); include_once "includes/db_connect.php";  include_once "includes/functions.php"; logincheck(); 
$username=$_SESSION['username'];
$query=mysql_query("SELECT * FROM users WHERE username='$username' LIMIT 1");
$fetch=mysql_fetch_object($query);
echo "$style";
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<?php
 $gen = gmdate('Y-m-d h:i:s'); 
?>


<body>
<table width="68%" border="1" align="center" cellpadding="0" cellspacing="0"   bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
  <tr>
    <td height=22 background=<?php echo "$gradient"; ?>><center class=TableHeading>Current game time</center></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="3">
        <tr> 
          <td colspan="2">The game time is in GMT (greenwhich mean time) this 
            is what all the bullet factorys etc.. will abide by. If you do not 
            use GMT as your time. Then please feel free to use the <a href="statsconsole.php?open=yes">Stats 
            console</a> which will keep you up to date on your stats while surfing 
            other pages, along with the time, so you dont miss your bullets.</td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr> 
          <td width="44%">Current time: </td>
          <td width="56%"> <?php echo "$gen"; ?>
&nbsp;</td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
