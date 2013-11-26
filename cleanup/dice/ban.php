<?php

include "functions.php";
logincheck();
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$userlevel=$fetch->userlevel;

if($userlevel > "0"){

$ban=$_POST['ban_username'];
$time=$_POST['time'];
$reason=$_POST['reason'];
$type=$ban;

if(!$ban){
}else{
mysql_query("UPDATE users SET status='Banned' WHERE username='$ban'");

mysql_query("INSERT INTO `ban` (`id`, `username`, `by`, `type`, `reason`, `length`) VALUES ('', '$ban', '$username', '$type', '$ban_reason', '$time')");

mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Banned $ban_username for reason $ban_reason', '$userlevel')");

print "You banned $ban.";
echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=ban.php\">";
}


?>

<style type="text/css">
<!--
body,td,th {
	color: #990000;
}
body {
	background-color: #999999;
}
-->
</style><form name="form1" method="post" action="">
  <table width="67%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">
    <tr> 
      <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">
          <strong>Ban a user</strong> </center></td>
    </tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
          <tr> 
            <td width="50%">Username</td>
            <td width="50%"><input name="ban_username" type="text" id="ban_username"></td>
          </tr>
          <tr> 
            <td>Length(Levae blank for permanent ban).</td>
            <td><input name="time" type="text" id="time">
              Hours</td>
          </tr>
          <tr> 
            <td>Reason</td>
            <td><textarea name="ban_reason" cols="40" rows="7" id="ban_reason"></textarea></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><input name="Ban" type="submit" id="Ban" value="Ban this user"></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
<p><br>
  <br>
</p>
</body>
</html>
<? } ?>