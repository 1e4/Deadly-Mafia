<?
session_start();
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
include "includes/db_connect.php";
echo "$style";

?>




<html><head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr> 
    <td width="274" height="122" valign="top"><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
        <tr> 
          <td height="22" colspan="2" background="<?php echo "$gradient"; ?>"><center class="TableHeading">
              Top 5 Ranks </center></td>
        </tr>
        <tr> 
          <td width="127" height="10" valign="top">Username</td>
          <td width="136" valign="top">Rank</td>
        </tr>
        <?php
	$tsel = mysql_query("select * from `users` where `userlevel`='0' order by `rankpoints` desc limit 5");
	while ($top = mysql_fetch_array($tsel)) {
		print "<tr><td><a href=$GAME_SELF?p=view&view=$top[username]>$top[username]</a></td><td align=right>$top[rankpoints]</td></tr>";
		print "<b>MafiaWarz will be reset, this is just to have some fun!!!!</b>b";
	}
	?>
      </table></td>
    <td width="274" valign="top"><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
        <tr> 
          <td width="270" height="22" background="<?php echo "$gradient"; ?>">&nbsp;</td>
        </tr>
        <tr> 
          <td height="101" valign="top">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
