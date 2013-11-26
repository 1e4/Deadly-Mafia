<? 
include "functions.php";
logincheck();
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$userlevel=$fetch->userlevel;

if($userlevel > "0"){

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
a:link {
	color: #CCCCCC;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #CCCCCC;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
}
body {
	background-color: #999999;
}
-->
</style></head>

<body class="title">
 <p>User Controls</p>
 <? if($userlevel > "0"){ ?>
 <p class="menutext"><a href="view_user_stats.php" target="mainFrame">View User Stats</a></p>
  <? } ?>
 <p class="menutext"><a href="ban.php" target="mainFrame">Ban A User</a> </p>
 <p class="menutext"><a href="unban.php" target="mainFrame">Unban A User</a></p>
<? if($userlevel == "2"){ ?>
 <p class="menutext"><a href="edit_money.php" target="mainFrame">Give A User Money</a></p>
<? } ?>
<? if($userlevel == "2"){ ?>
 <p class="menutext"><a href="edit_points.php" target="mainFrame">Give A User Points</a> </p>
 <p>
   <? } ?>
 </p>
 <p>
   <? if($userlevel == "2"){ ?>
</p>
 <p class="menutext"><a href="edit_bullets.php" target="mainFrame">Give A User Bullets </a> </p>
 <? } ?>
<p class="menutext"><a href="kill_user.php" target="mainFrame">Kill A User</a></p>
 <p class="menutext"><a href="revive_user.php" target="mainFrame">Revive A User</a></p>
 <p class="menutext"><a href="warn.php" target="mainFrame">Warn A User </a></p>
 <p class="title">Userlevel Controls</p>
 <p class="menutext"><a href="make_editor.php" target="mainFrame">Make Newspaper Editor</a></p>
 <p class="menutext"><a href="hdo.php" target="mainFrame">Make HDO</a></p>
 <? if($userlevel == "2"){ ?>
 <p class="menutext"><a href="make_mod.php" target="mainFrame">Make Mod</a></p>
  <? } ?>
   <? if($userlevel == "2"){ ?>
 <p class="menutext"><a href="admin_user.php" target="mainFrame">Make Admin</a></p>
   <? } ?>
 <p class="menutext"><a href="remove_editor.php" target="mainFrame">Remove Newspaper Editor</a></p>
 <p class="menutext"><a href="unhelper_user.php" target="mainFrame">Remove HDO </a></p>
    <? if($userlevel == "2"){ ?>
 <p class="menutext"><a href="remove_user.php" target="mainFrame">Remove Mod </a></p>
 <p class="menutext"><a href="remove_user.php" target="mainFrame">Remove Admin</a> </p>
    <? } ?>
 <p class="title">Timer Controls</p>
 <p class="menutext"><a href="reset_oc.php" target="mainFrame">Reset OC Timer</a></p>
 <p class="menutext"><a href="reset_travel.php" target="mainFrame">Reset Travel Timer</a></p>
 <p class="menutext"><a href="reset_getaway.php" target="mainFrame">Reset Getaway Timer</a></p>
 <p class="menutext"><a href="reset_extortion.php" target="mainFrame">Reset Extortion Timer</a>  </p>
 <p class="title">Forum Controls</p>
 <p class="menutext"><a href="reset_forum.php" target="mainFrame">Reset A Forum</a></p>
 <p class="menutext"><a href="forum_ban.php" target="mainFrame">Ban A User From Forums</a></p>
 <p class="menutext"><a href="forum_unban.php" target="mainFrame">Unban A User From Forums </a></p>
 <p class="menutext"><a href="delete_all_topics.php" target="mainFrame">Delete All Topics/Posts By A User</a></p>
 <p class="menutext"><a href="hdo.php" target="mainFrame">Make A User A Forum Operator </a></p>
 <p class="title">Point Controls</p>
   <? if($userlevel == "2"){ ?>
 <p class="menutext"><a href="submit_code.php" target="mainFrame">Submit A Payment Code</a></p>
 <p class="menutext"><a href="edit_points.php" target="mainFrame">Give A User Points </a></p>
    <? } ?>
    <p class="title">Poll Controls</p>
 <p class="menutext"><a href="new_poll.php" target="mainFrame">Create A Poll</a></p>
 <p class="menutext"><a href="reset_votes.php" target="mainFrame">Reset All Users Votes</a></p>
 <p class="title">Helpdesk</p>
 <p class="menutext"><a href="oeticket.php" target="mainFrame">Ticket CP </a></p>
 
 <p class="title">Scans</p>
 <p class="menutext">Scan For Dupes</p>
 <p class="menutext">Scan For Possible Cheaters  </p>
 <p class="title">PM System Controls</p>
 <p class="menutext"><a href="view_sent_mail.php" target="mainFrame">View PM's Sent By A User</a></p>
 <p class="menutext"><a href="view_rec_mail.php" target="mainFrame">View PM's Recived By A User   </a></p>
 <p class="menutext"><a href="msg_users.php" target="mainFrame">Message All Users</a></p>
 <p class="menutext"><a href="msg_staff.php" target="mainFrame">Message All Staff</a></p>
 <p class="menutext">Reset A Users Inbox</p>
 <p class="menutext">Reset Saved Mail   </p>
 <p class="title">Reset Tools</p>
 <p class="menutext">Reset Money</p>
 <p class="menutext">Reset Inbox</p>
 <p class="menutext">Reset Forums</p>
 <p class="menutext">Reset Helpdesk</p>
 <p class="menutext">Reset Logs</p>
 <p class="menutext">Reset Chat</p>
 <p class="menutext">Reset Updates List        </p>
 <p class="title">Casino Controls</p>
 <p class="menutext">Drop A Casino</p>
 <p class="menutext">Modify A Casino Owner</p>
 <p class="menutext">Modify A Casino Max Bet </p>
 <p class="menutext">Disable A Casino    </p>
 <p class="title">Logs</p>
 <p class="title">
   <? if($userlevel == "2"){ ?>
 </p>
 <p class="menutext"><a href="admin_logs.php" target="mainFrame">Staff Actions</a></p>
    <? } ?>
    <? if($userlevel == "2"){ ?>  
 <p class="menutext"><a href="kill_logs.php" target="mainFrame">User Kills</a></p>
 <? } ?>
     <? if($userlevel == "2"){ ?>  
 <p class="menutext"><a href="bomb_logs.php" target="mainFrame">Bomb Squad</a></p>
 <? } ?>
 <p class="menutext">PM System</p>
 <p class="menutext"><a href="don_log.php" target="mainFrame">Donaters Logs </a></p>
 <p class="title">Other</p>
 <p class="menutext"><a href="main.php" target="mainFrame">Main Page </a></p>
 <p class="title"><a href="dupecheck.php" target="mainFrame">DuPeCheck</a></p>
 <p class="menutext">
   <? if($userlevel == "2"){ ?>
 </p>
 <p class="menutext"><a href="log_out_all.php" target="mainFrame">Logout All Users</a></p>
 <p class="menutext"><a href="site_status.php" target="mainFrame">Close Site</a></p>
 <p class="menutext"><a href="site_status.php">Set Site Status  </a></p>
 <p class="menutext">
   <? } ?>
 </p>
 <p class="menutext">Give Out Respect </p>
 <p class="menutext">Change The Banner Message </p>
<? if($username == "Ben" || $username == "Chubbs"){ ?>
 <p class="menutext"><a href="reset_panel.php" target="mainFrame">Reset Panel </a></p>
<? } ?>
</body>
</html>
<? } ?>