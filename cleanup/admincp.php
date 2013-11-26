<?php

session_start();

include "includes/db_connect.php";

include "includes/functions.php";

$username=$_SESSION['username']; 
if($info->userlevel=='3'){

die("<center><h3>You are not Authorized to View This Page</h3></center>");

}

if($info->userlevel=='2'){

die("<center><h3>You are not Authorized to View This Page</h3></center>");

}

if($info->userlevel=='1'){

die("<center><h3>You are not Authorized to View This Page</h3></center>");

}

if($info->userlevel=='0'){

die("<center><h3>You are not Authorized to View This Page</h3></center>");

}



echo "$style"; 

$gradient="images/topic.jpg";

$td_border="black";



if ($fetch->userlevel != "0"){

if ($fetch->userlevel != "1"){

if (strip_tags($_GET['op']) == "dupe"){



}elseif (strip_tags($_GET['op']) == "ban"){

if(strip_tags($_POST['Ban']) && strip_tags($_POST['ban_username']) && strip_tags($_POST['ban_reason'])){

$time=strip_tags($_POST['time']);

$ban_rank = strip_tags($_POST['ban_rank']);

$ban_username = strip_tags($_POST['ban_username']);

$ban_reason = strip_tags($_POST['ban_reason']);

if(!$time){

		$type = "0";

		$time_for = "Forever";





	}elseif($time){

		$type = "1";

				$time_for = time() + (86400*$time);

	

}

$check = mysql_num_rows(mysql_query("SELECT username FROM users WHERE username='$ban_username'"));



if ($check == "0") {

	echo "No such user";

}elseif ($check != "0") {



mysql_query("INSERT INTO `ban` (`id`, `username`, `by`, `type`, `reason`, `rank`,`length`) VALUES ('', '$ban_username', '$username', '$type', '$ban_reason', '$ban_rank' ,'$time_for')");





mysql_query("UPDATE users SET status='Banned' WHERE username='$ban_username'"); 

	echo "<td><font color=red>That user is now banned!</font></td>";

				



}} ?>











<form name="form1" method="post" action="?op=ban">

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

            <td width="50%">Rank</td>

            <td width="50%"><input name="ban_rank" type="text" id="ban_username"></td>

          </tr>





          <tr> 

            <td>Length(Leave blank for permanent ban).</td>

            <td><input name="time" type="text" id="time">

              Days</td>

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

<?



}elseif (strip_tags($_GET['op']) == "lvlc"){

$uname=strip_tags($_POST['jjj']);

$ulevel=strip_tags($_POST['userlevel']);

$state=strip_tags($_POST['state']);

$flow=strip_tags($_POST['flow']);

$cash=strip_tags($_POST['cash']);



if($uname && $ulevel && $state){

if($ulevel!="0" && $ulevel!="1" && $ulevel!="2"){ die("Can't do!");}

if($state!='Alive' && $state!='Banned' && $state!='Dead'){ die("Can't do!!");}

if($ulevel!=0 && $fetch->userlevel!=2){ die("You're not allowed to promote this person!");}

if($flow=='0' || $flow=='1'){

	if($cash){

		if($flow==0){

		mysql_query("UPDATE users SET money=money+$cash WHERE username='$uname'");

		print"Succesfully gave $cash to $uname!";

		}else{

		mysql_query("UPDATE users SET money=money-$cash WHERE username='$uname'");

		print"Succesfully took $cash from $uname!";

		}

	}

}



if($uname!="Error"){

mysql_query("UPDATE users SET userlevel='$ulevel' WHERE username='$uname'") or die("Can't do!!!");

mysql_query("UPDATE users SET status='$state' WHERE username='$uname'") or die("Can't do!!!!");

print"Succesfully changed state to $state and userlevel to $ulevel from $uname!";

}

}



?>

<form name="form1" method="post" action="?op=lvlc">

  <table width="67%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">

    <tr> 

      <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">

          <strong>Change Userlevel</strong> </center></td>

    </tr>

    <tr> 

      <td><table width="100%" border="0" cellspacing="3" cellpadding="0">

          <tr> 

            <td width="50%">Username</td>

            <td width="50%">

            <input name="jjj" type="text" id="ban_username" size="20"></td>

          </tr>

          <tr> 

            <td width="50%">Cash</td>

            <td width="50%">

            <input name="cash" type="text" id="cashflow" size="20"></td>

	    <select size="1" name="flow">

            <option value="0">Give</option>

            <option value="1">Take</option>

	    </select>

          </tr>

          <tr> 

            <td>Userlevel:</td>

            <td><select size="1" name="userlevel">

            <option value="0">Player</option>

            <option value="1">Moderator</option>

            <option value="2">Admin</option>

            </select></td>

          </tr>

          <tr> 

            <td>State:</td>

            <td><select size="1" name="state">

            <option value="Alive">Alive</option>

            <option value="Banned">Banned</option>

            <option value="Dead">Dead</option>

            </select></td>

          </tr>

          <tr> 

            <td>&nbsp;</td>

            <td>

            <input name="change" type="submit" id="Ban" value="Change level!"></td>

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

<?php







}elseif (strip_tags($_GET['op']) == "war"){

if (strip_tags($_POST['warning_username']) && strip_tags($_POST['warning_msg'])){

$warning_username=strip_tags($_POST['warning_username']);

$warning_msg=strip_tags($_POST['warning_msg']);

$check=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$warning_username'"));

if ($check =="0"){

echo "No such user!";

}elseif($check !="0"){

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 

VALUES (

'', '<font colour=blue>$warning_username</font>', '$warning_username', '$warning_msg You Have BEEN warned!', '$date', '0', '0', '0'

)");

echo "Warning Issued";





}}



?>

<form action="?op=war" method=POST>

<table width="67%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">

  <tr> 

    <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">

        <strong>Send warning</strong> 

      </center></td>

  </tr>

  <tr> 

    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">

        <tr> 

          <td colspan="2">This will send an offical warning into the users inbox.</td>

        </tr>

        <tr> 

          <td width="49%">Username:</td>

          <td width="51%"><input name="warning_username" type="text" maxlength="40"></td>

        </tr>

        <tr> 

          <td>Message:</td>

          <td><input name="warning_msg" type="text" maxlength="100"></td>

        </tr>

        <tr> 

          <td colspan="2"><div align="center">

              <input name="Send" type="submit" id="Send" value="Send warning">

            </div></td>

        </tr>

      </table></td>

  </tr>

</table></form><?





}elseif (strip_tags($_GET['op']) == "forum"){

if (strip_tags($_POST['dall']) && strip_tags($_POST['dallbut'])){

$dall=strip_tags($_POST['dall']);

$check=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$dall'"));

if ($check =="0"){

echo "No such user!";

}elseif($check !="0"){

mysql_query("DELETE FROM topics WHERE username='$dall'");

echo "".mysql_affected_rows()." topics deleted";

mysql_query("DELETE FROM replys WHERE username='$dall'");



echo "".mysql_affected_rows()." replys deleted";



}}elseif (strip_tags($_POST['stick']) && strip_tags($_POST['sticky_but'])){

$stick=strip_tags($_POST['stick']);



$check1=mysql_query("SELECT * FROM topics WHERE id='$stick'");

$check=mysql_num_rows($check1);

$chech=mysql_fetch_object($check1);

$new_tit="<b>$chech->title</b>";



if ($check == "0"){

echo "Invalid ID";

}elseif($check != "0"){

mysql_query("UPDATE topics SET sticky='1', lastreply='999999999999999', title='$new_tit' WHERE id='$stick'");

echo "Sticky topic made";



}}elseif (strip_tags($_POST['lock']) && strip_tags($_POST['locky_but'])){

$lock=strip_tags($_POST['lock']);



$check=mysql_num_rows(mysql_query("SELECT * FROM topics WHERE id='$lock'"));

if ($check == "0"){

echo "Invalid ID";

}elseif($check != "0"){

mysql_query("UPDATE topics SET locked='1' WHERE id='$lock'");

echo "Topic locked";



}}





?><form action="?op=forum" method=POST>

<table width="67%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">

  <tr> 

    <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">

        <strong>Forum options</strong> 

      </center></td>

  </tr>

  <tr> 

    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">

        <tr> 

          <td colspan="2"><div align="center">Delete all posts/topics made by 

              a user</div></td>

        </tr>

        <tr> 

          <td width="49%">Username:</td>

          <td width="51%"><input name="dall" type="text" maxlength="40"> 

            <input name="dallbut" type="submit" id="Send22" value="Delete"></td>

        </tr>

        <tr> 

          <td colspan="2"><div align="center">Make a sticky topic</div>

            <div align="center"> </div></td>

        </tr>

        <tr> 

          <td>Topic ID</td>

           <td><input name="Sticky" type="text" id="lock_id"> <input name="Sticky_but" type="submit" id="Stick" value="Sticky"></td>

        </tr>

        <tr> 

          <td colspan="2"><div align="center">Lock a topic</div></td>

        </tr>

        <tr> 

          <td>Topic ID</td>

          <td><input name="lock" type="text" id="lock_id"> <input name="locky_but" type="submit"id="Stick" value="Lock"></td>

        </tr>

      </table></td>

  </tr>

</table></form>

<?





}









?>





<html>

<head>

<title>Untitled Document</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>



<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">


<center><table width=50% border=1 cellspacing=0 bordercolor=black>
  <tr> 

    <td height=22 background="images/bg3.bmp"><center class="TableHeading">

        <strong><font size=5>AdminCP</strong> 

      </center></td>

  </tr>

  <tr> 

    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">

        <tr> 

          <td>&nbsp;</td>

        </tr>



<tr><td>

<?php if ($fetch->userlevel != "0"){

echo "

  <tr>

    <td><a href=\"whokilled.php\" target=\"main\"><center><b><font color=white></font></center></a></td>

  <tr>";

}

?>





<tr><td><a href=dupeschecks.php><center><b><font size=2><font color=white>Dupe check</a></td>

        </tr>

        <tr> 

         <td><a href="kill_logs.php"><center><b><font size=2><font color=white>Kill Logs</a></td>

        </tr>

<tr>

<tr>

          <td><a href="bank_transfers_submit.php"><center><b><font size=2><font color=white>Check Money Transfers</a></td>

        </tr>
<tr> 
<tr> 

         <td><a href="kill_user_submit.php"><center><b><font size=2><font color=white>Modkill</a></td>

        </tr>

<tr>

         <td><a href="revive_user_submit.php"><center><b><font color=white><font size=2>Revive</a></td>

        </tr>
<tr>

          <td><a href="?op=ban"><center><b><font color=white><font size=2>Ban A User</a></td>

        </tr>
        <tr> 

          <td><a href="?op=war"><center><b><font size=2><font color=white>Send warning</a></td>

        </tr>

        <tr> 

          <td><a href="?op=forum"><center><b><font color=white><font size=2>Forum options</a></td>

        </tr>

        <tr> 

          <td><a href="oeticket.php"><center><b><font size=2><font color=white>Helpdesk</a></td>

        </tr>



 <tr> 

          <td><a href="clear_profile_submit.php"><center><b><font color=white><font size=2>Clear a Profile</a></td>

        </tr>

          <td><a href="health_increase_submit.php"><center><b><font color=white><font size=2>Give 1000% HP</a></td>

        </tr>



<tr>

              <td><a href="give_points_submit.php"><center><b><font color=white><font size=2>Give Points</a></td>

        </tr>





<tr>

              <td><a href="give_bullets_submit.php"><center><b><font color=white><font size=2>Give Bullets</a></td>

        </tr>

<tr>

              <td><a href="give_health_submit.php"><center><b><font size=2 color=white>Give Health</a></td>

        </tr>





<tr>

              <td><a href="give_money_submit.php"><center><b><font color=white><font size=2>Give Money</a></td>

        </tr>





  <tr>

              <td><a href="take_money_submit.php"><center><b><font color=white><font size=2>Take Money</a></td>

        </tr>

    

      

<td><a href="view_user_mail_submit.php"><center><b><font size=2><font color=white>View Last Sent Mail By User</a></td>

        </tr>

        <tr>

         <td><a href="view_user_received_submit.php"><center><b><font color=white><font size=2>View Last Received Mail By User</a></td>

        </tr>

        <tr>

         <td><a href="ownerusersubmit.php"><center><b><font size=2><font color=white><font color=white>Make user Admin</a></td>

        </tr>









         <tr>

         <td><a href="mod_user_submit.php"><center><b><font size=2><font color=white>Make user Mod</a></td>

        </tr>







<tr>


         <td><a href="de-mod_user_submit.php"><center><b><font color=white><font size=2>De-Mod a Mod</a></td>

        </tr>

<tr>

         <td><a href="hdo_user_submit.php"><center><b><font size=2><font color=white>Make user HDOP</a></td>

        </tr>

<tr>

<tr>

         <td><a href="de-hdo_user_submit.php"><center><b><font size=2><font color=white>Sack a HDOP</a></td>

        </tr>

<tr>

         <td><a href="forummod_submit.php"><center><b><font size=2><font color=white>Make a User a Forum Mod</a></td>

        </tr>

<tr>

         <td><a href="sack_forummod.php"><center><b><font size=2><font color=white>Sack a Forum Mod</a></td>

        </tr>

<tr>

         <td><a href="view_user_stats_submit.php"><center><b><font size=2><font color=white>View a User's Stats</a></td>

        </tr>



<tr>

         <td><a href="ghost_mode.php"><center><b><font size=2><font color=white>Ghost Mode</a></td>

        </tr>


<tr>



      </table></td>

  </tr>

</table>

<p>&nbsp;</p>

<p>&nbsp;</p>



<? }} ?>

