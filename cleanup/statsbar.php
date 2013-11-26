<?
session_start();
setlocale(LC_MONETARY, 'en_GB');
$username=$_SESSION['username'];
include_once"includes/db_connect.php";

$query=mysql_query("SELECT * FROM users WHERE username='$username' LIMIT 1");
$info = mysql_fetch_object($query);
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if ($info->health <= "0"){
mysql_query("UPDATE users SET status='Dead' WHERE username='$username'");
session_destroy();
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel=stylesheet href=includes/test.css type=text/css>

<title>Untitled Document</title>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p><div align="center">
<table width="500" border="2" cellspacing="0" bordercolor="#000000">
  <tr>
    <td bgcolor="#999999"><div align="center" class="style9 style12"><span class="style10">Rank:</span> <?php echo "$fetch->rank"; ?></div></td>
    <td bgcolor="#999999"><div align="center" class="style13"><span class="style10">Crew:</span>
          <?php if ($info->crew == "0"){ echo "None"; }else{ echo "$info->crew"; } ?>
    </div></td>
    <td bgcolor="#999999"><div align="center" class="style13"><span class="style10">Gun:</span><span class="style14"> <?php echo "$info->weapon"; ?><?php echo "($fetch->bullets)"; ?></span></div></td>
    <td bgcolor="#999999"><div align="center" class="style13"><span class="style10">Protection:</span> <?php echo "$info->protection"; ?></div></td>
    <td bgcolor="#999999"><div align="center" class="style13"><span class="style10">Cash:</span> <?php echo money_format('%n',$info->money); ?></span></div></td>
  </tr>
  <tr>
    <td bgcolor="#999999"><div align="center" class="style13"><span class="style10">Location:</span><span class="style14"> <?php echo "$fetch->location"; ?></span></div></td>
    <td bgcolor="#999999"><div align="center" class="style9"> <span class="style12"> <a href="inbox.php" target="mainFrame"></a>
            <?php 
$check = mysql_query("SELECT * FROM `inbox` WHERE `read`='0' AND `to`='$username'");
$inbox=mysql_num_rows($check);

?>
            <?php if ($inbox > 0){ echo "<span  style=FONT-WEIGHT:bold><a href=inbox.php



 target=mainFrame><font color=blue> $fetch->username </font><font color=white> Message(s) ($inbox)</a></font></span>"; } ?>
    </span>&nbsp;</div></td>
    <td bgcolor="#999999"><div align="center" class="style13"><span class="style10"><img src="http://www.operationmafia.co.uk/tinc?key=53RV3fiE"</span>
          <?php
$gen = gmdate("  H:i:s ") ;

?>
    </div></td>
    <td colspan="2" bgcolor="#999999"><table width="95%" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td width="44" class="style11">Health: </td>
        <td width="130"><table width="<?php echo "$info->health"; ?>%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
            <tr>
              <td background="images/hbg.jpg" class="style9"><div align="center"><?php echo "$info->health%"; ?></div></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table></span></span></span></span></span></span></span></span></span></span></span></div>
<p>&nbsp;</p>
</body>
</html>
<?  mysql_close(); ?>