<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
if (strip_tags($_POST['button_friend']) && strip_tags($_POST['action_friend']) == "Add" || strip_tags($_POST['action_friend']) == "Remove"){
$action_friend=strip_tags($_POST['action_friend']);
$username_friend=strip_tags($_POST['username_friend']);

if ($action_friend == "Add"){ $exicst=mysql_query("SELECT * FROM users WHERE username='$username_friend'");
$nums=mysql_num_rows($exicst);
$adding=mysql_fetch_object($exicst);
if ($nums == "0" || $adding->status == "Dead" || $adding->status == "Banned"){
echo "No such user, Or specified user is dead.";
}elseif ($nums != "0" && $adding->status=="Alive"){
$already=mysql_num_rows(mysql_query("SELECT * FROM friends WHERE type='Friend' AND person='$username_friend' AND username='$username'"));
if ($already != "0"){
echo "This user is already your friend.";
}elseif ($already == "0"){


mysql_query("INSERT INTO `friends` ( `id` , `username` , `person` , `type` ) 
VALUES (
'', '$username', '$username_friend', 'Friend'
)");
echo "Friend has been added.";

}}}
elseif ($action_friend == "Remove"){

$exicst=mysql_query("SELECT * FROM users WHERE username='$username_friend'");
$nums=mysql_num_rows($exicst);
$adding=mysql_fetch_object($exicst);
if ($nums == "0" || $adding->status == "Dead" || $adding->status == "Banned"){
echo "No such user, Or specified user is dead.";
}elseif ($nums != "0" && $adding->status=="Alive"){
$already=mysql_num_rows(mysql_query("SELECT * FROM friends WHERE type='Friend' AND person='$username_friend' AND username='$username'"));
if ($already == "0"){
echo "This user is not your friend.";
}elseif ($already != "0"){
mysql_query("DELETE FROM friends WHERE type='Friend' AND person='$username_friend' AND username='$username'");
echo "Friend removed.";


}}}
}elseif (strip_tags($_POST['button_block']) && strip_tags($_POST['username_block']) && strip_tags($_POST['action_block']) == "Block" || strip_tags($_POST['action_block']) == "Unblock" ){
$action_block=strip_tags($_POST['action_block']);
$username_block=strip_tags($_POST['username_block']);

if ($action_block == "Block"){
$exicst=mysql_query("SELECT * FROM users WHERE username='$username_block'");
$nums=mysql_num_rows($exicst);
$adding=mysql_fetch_object($exicst);
if ($nums == "0" || $adding->status == "Dead" || $adding->status == "Banned"){
echo "No such user, Or specified user is dead.";
}elseif ($nums != "0" && $adding->status=="Alive"){
$already=mysql_num_rows(mysql_query("SELECT * FROM friends WHERE type='Blocked' AND person='$username_block' AND username='$username'"));
if ($already != "0"){
echo "This user had already been blocked.";
}elseif ($already == "0"){


mysql_query("INSERT INTO `friends` ( `id` , `username` , `person` , `type` ) 
VALUES (
'', '$username', '$username_block', 'Blocked'
)");
echo "User had been blocked.";

}}}
elseif ($action_block == "Unblock"){

$exicst=mysql_query("SELECT * FROM users WHERE username='$username_block'");
$nums=mysql_num_rows($exicst);
$adding=mysql_fetch_object($exicst);
if ($nums == "0" || $adding->status == "Dead" || $adding->status == "Banned"){
echo "No such user, Or specified user is dead.";
}elseif ($nums != "0" && $adding->status=="Alive"){
$already=mysql_num_rows(mysql_query("SELECT * FROM friends WHERE type='Blocked' AND person='$username_block' AND username='$username'"));
if ($already == "0"){
echo "This user is not blocked";
}elseif ($already != "0"){
mysql_query("DELETE FROM friends WHERE type='Blocked' AND person='$username_block' AND username='$username'");
echo "User unblocked.";


}}}}



?>




<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="includes/test.css" rel="stylesheet" type="text/css">
</head>

<body>
<form name="form1" method="post" action="">
  <table width="75%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr> 
      <td width="51%"><table width="100%" border="1" cellspacing="0" cellpadding="0" class=thinline rules=none>
          <tr> 
            <td background="includes/grad.jpg" class=header><div align="center">Add/Remove friend</div></td>
          </tr>
<tr bgcolor=black><td height=1 colspan=3></td></tr>
          <tr> 
            <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
              <tr>
                <td width="52%" height="37" bgcolor="#666666">Action: </td>
                <td width="48%" bgcolor="#666666"><select name="action_friend" id="action_friend">
                    <option value="Add">Add</option>
                    <option value="Remove">Remove</option>
                </select></td>
              </tr>
              <tr>
                <td bgcolor="#666666">Username:</td>
                <td bgcolor="#666666"><input name="username_friend" type="text" id="username_friend" maxlength="40"></td>
              </tr>
              <tr>
                <td bgcolor="#666666">&nbsp;</td>
                <td bgcolor="#666666"><input name="button_friend" type="submit" id="button_friend" value="Submit"></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      <td width="49%"><table width="100%" border="1" cellspacing="0" cellpadding="0" class=thinline rules=none>
          <tr> 
            <td background="includes/grad.jpg" class=header><div align="center">Block/Unblock a user</div></td>
          </tr>
          <tr> 
            <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
                <tr> 
                  <td width="52%" bgcolor="#666666">Action: </td>
                  <td width="48%" bgcolor="#666666"><select name="action_block">
                      <option value="Block">Block</option>
                      <option value="Unblock">Unblock</option>
                  </select></td>
                </tr>
                <tr> 
                  <td bgcolor="#666666">Username:</td>
                  <td bgcolor="#666666"><input name="username_block" type="text" maxlength="40"></td>
                </tr>
                <tr> 
                  <td bgcolor="#666666">&nbsp;</td>
                  <td bgcolor="#666666"><input type="submit" name="button_block" value="Submit"></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td width="51%"><table width="100%" border="1" cellspacing="0" cellpadding="0" class=thinline rules=none>
          <tr> 
            <td colspan="2" background="includes/grad.jpg" class=header><div align="center">Friends</div></td>
          </tr>
<tr bgcolor=black><td height=1 colspan=3></td></tr>
          <tr bgcolor=#999999> 
            <td width="53%" class=tip><div align="center">Username</div></td>
            <td width="47%" class=tip><div align="center">Status
              </div></td>
          </tr>
<tr bgcolor=black><td height=1 colspan=3></td></tr>
        <? $query_friends=mysql_query("SELECT * FROM friends WHERE username='$username' AND type='Friend'");
		$rows=mysql_num_rows($query_friends);
if ($rows == "0"){ echo "<tr><td colspan=2><center>No friends</center></td></tr>"; }
while($dip=mysql_fetch_object($query_friends)){
		$shitty=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$dip->person'"));
		if ($shitty->online >= time()){
		$status="<font color=blue>Online($shitty->status)</font>";
		}elseif ($shitty->online <= time()){
		$status="<font color=red>Offline($shitty->status)</font>";
		}


		echo " <tr> 
            <td> <table width=100% border=0 cellspacing=3 cellpadding=0>
                <tr>
                  <td><a href='profile.php?viewuser=$dip->person'>$dip->person</a></td></td>
                </tr>
              </table>
            <td><table width=100% border=0 cellspacing=3 cellpadding=0>
                <tr>
                  <td>$status</td>
                </tr>
              </table></td>
          </tr>";
		  }
		  ?>
        </table></td>
      <td><table width="100%" border="1" cellspacing="0" cellpadding="0" class=thinline rules=none>
          <tr> 
            <td colspan="2" background="includes/grad.jpg" class=header><div align="center">Blocked users</div></td>
          </tr>
         <tr bgcolor=black><td height=1 colspan=3></td></tr>
          <tr bgcolor=#999999> 
            <td width="53%" class=tip><div align="center">Username</div></td>
            <td width="47%" class=tip><div align="center">Status
              </div></td>
          </tr>
  <tr bgcolor=black><td height=1 colspan=3></td></tr>
          <? $query_evils=mysql_query("SELECT * FROM friends WHERE username='$username' AND type='Blocked'");
		$rows_evils=mysql_num_rows($query_evils);
if ($rows_evils == "0"){ echo "<tr><td colspan=2><center>No friends</center></td></tr>"; }
while($dip_evils=mysql_fetch_object($query_evils)){
		$shitty_evils=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$dip_evils->person'"));
		if ($shitty_evils->online >= time()){
		$status_evils="<font color=blue>Online($shitty_evils->status)</font>";
		}elseif ($shitty_evils->online <= time()){
		$status_evils="<font color=red>Offline($shitty_evils->status)</font>";
		}


		echo " <tr> 
            <td> <table width=100% border=0 cellspacing=3 cellpadding=0>
                <tr>
                  <td><a href='profile.php?viewuser=$dip_evils->person'>$dip_evils->person</a></td></td>
                </tr>
              </table>
            <td><table width=100% border=0 cellspacing=3 cellpadding=0>
                <tr>
                  <td>$status_evils</td>
                </tr>
              </table></td>
          </tr>";
		  }
		  ?>
        </table></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php require_once "includes/footer.php"; ?>