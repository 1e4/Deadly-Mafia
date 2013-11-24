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
<META HTTP-EQUIV="Refresh"
CONTENT="45; URL=stats.php">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel=stylesheet href=includes/test.css type=text/css>

<title>Untitled Document</title>
</head>

<body>
<table width="100%" height="39" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="108" height="39" background="images/Statsbg.jpg"><div align="center" class="style9 style12"><span class="style10">Rank:</span> <?php echo "$fetch->rank"; ?></div></td>
    <td width="136" background="images/Statsbg.jpg" class="style1"><div align="center" class="style13"><span class="style10">Crew:</span>      
        <?php if ($info->crew == "0"){ echo "None"; }else{ echo "$info->crew"; } ?> 
    </div></td>
    <td width="119" background="images/Statsbg.jpg" class="style1"><div align="center" class="style13"><span class="style10">Gun:</span><span class="style14"> <?php echo "$info->weapon"; ?><?php echo "($fetch->bullets)"; ?></span></div></td>
    <td width="113" background="images/Statsbg.jpg" class="style1"><div align="center" class="style13"><span class="style10">Protection:</span> <?php echo "$info->protection"; ?></div></td>
    <td width="153" background="images/Statsbg.jpg" class="style1"><div align="center" class="style13"><span class="style10">Cash:</span> <?php echo money_format('%n',$info->money); ?></span></div></div></td><td width="1" background="images/Statsbg.jpg"></div><td width="1" background="images/Statsbg.jpg"></td>
    <td width="130" background="images/Statsbg.jpg" bgcolor="#000000" class="style1"><div align="center" class="style13"><span class="style10">Location:</span><span class="style14"> <?php echo "$fetch->location"; ?></span></div></td>
    <td width="117" background="images/Statsbg.jpg" class="style1"><div align="center" class="style9">
      <span class="style12">
        <a href="inbox.php" target="mainFrame"><img src="images/mail1.jpg" width="16" height="11" border="0" /></a>
        <?php 
$check = mysql_query("SELECT * FROM `inbox` WHERE `read`='0' AND `to`='$username'");
$inbox=mysql_num_rows($check);

?>
          <?php if ($inbox > 0){ echo "<span  style=FONT-WEIGHT:bold><a href=inbox.php



 target=mainFrame><font color=blue> $fetch->username </font><font color=white> Message(s) ($inbox)</a></font></span>"; } ?>  
      </span>&nbsp;</div></td>
    <td width="130" background="images/Statsbg.jpg" class="style1"><div align="center" class="style13"><span class="style10"><img src="http://www.operationmafia.co.uk/tinc?key=53RV3fiE"</span> 
    <?php
$gen = gmdate("  H:i:s ") ;

?> </div></td>
    <td width="185" background="images/Statsbg.jpg" class="style1"><div align="center">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="100%"><table width="95%" border="0" align="left" cellpadding="0" cellspacing="0">
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
      </table>
    </div></td>
    <td width="38" background="images/Statsbg.jpg" class="style1"><div align="center"><a href="stats.php" target="topFrame1"><img src="images/refresh1.gif" width="27" height="30" border="0" /></a></div></td>
  </tr>
</table>
</body>
</html>
<?  mysql_close(); ?>