<?php

session_start();

include "db_connect.php";

include "functions.php";

logincheck();

$username=$_SESSION['username'];



if($info->userlevel=='1'){



die("<center><h3>You are not Authorized to View This Page</h3></center>");



}



if($info->userlevel=='0'){



die("<center><h3>You are not Authorized to View This Page</h3></center>");



}



echo "$style"; 

$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));

if ($fetch->helper != "0"){

if (strip_tags($_GET['op']) == "dupe"){



}elseif (strip_tags($_GET['op']) == "ban"){

if(strip_tags($_POST['Ban']) && strip_tags($_POST['ban_username']) && strip_tags($_POST['ban_reason'])){

$time=strip_tags($_POST['time']);

$ban_username = strip_tags($_POST['ban_username']);

$ban_reason = strip_tags($_POST['ban_reason']);

if(!$time){

		$type = "0";

		$time_for = "N/A";





	}elseif($time){

		$type = "1";

				$time_for = time() + (86400*$time);

	

}

$check = mysql_num_rows(mysql_query("SELECT username FROM users WHERE username='$ban_username'"));



if ($check == "0") {

	echo "No such user";

}elseif ($check != "0") {



mysql_query("INSERT INTO `ban` (`id`, `username`, `by`, `type`, `reason`, `length`) VALUES ('', '$ban_username', '$username', '$type', '$ban_reason', '$time_for')");





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

<?



}elseif (strip_tags($_GET['op']) == "lvlc"){



?>

<form name="form1" method="post" action="?op=clvl">

  <table width="67%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>

    <tr> 

      <td height=22 background="<?php echo"$gradient"; ?>&nbsp;<center class="TableHeading">

          Change userlevel</center></td>

    </tr>

    <tr> 

      <td><table width="100%" border="0" cellspacing="3" cellpadding="0">

          <tr> 

            <td width="50%">Username</td>

            <td width="50%">

            <input name="jjj" type="text" id="ban_username" size="20"></td>

          </tr>

          <tr> 

            <td>Userlevel:</td>

            <td><select size="1" name="userlevel">

            <option value="1">Player</option>

            <option value="2">Moderator</option>

            <option value="3">Admin</option>

            </select></td>

          </tr>

          <tr> 

            <td>State:</td>

            <td><select size="1" name="state">

            <option value="Banned">Banned</option>

            <option value="Alive">Alive</option>

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

          <td><input type="text" name="stick"> <input name="sticky_but" type="submit" id="Delete" value="Stick"></td>

        </tr>

        <tr> 

          <td colspan="2"><div align="center">Lock a topic</div></td>

        </tr>

        <tr> 

          <td>Topid ID</td>

          <td><input name="lock" type="text" id="lock_id"> <input name="locky_but" type="submit" id="Stick" value="Lock"></td>

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



<body>

<table width="67%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="<?php echo "$td_border"; ?>" bgcolor="<?php echo "$td_bg"; ?>">

  <tr> 

    <td height=22 background="<?php echo"$gradient"; ?>"><center class="TableHeading">

        <strong>HDO CP </strong> 

      </center></td>

  </tr>

  <tr> 

    <td><table width="100%" border="0" cellspacing="3" cellpadding="0">

        <tr> 

          <td width="100%">Welcome to the HDO Control Panel </td>

        </tr>

        <tr> 

          <td>&nbsp;</td>

        </tr>

        <tr> 

          <td><div align="center"><strong>HDO Options </strong></div></td>

        </tr>

        <tr> 

          <td>-<a href="?op=forum">Forum options</a></td>

        </tr>

        <tr> 

          <td>-<a href="oeticket.php">Ticket system</a></td>

        </tr>





      </table></td>

  </tr>

</table>

<p>&nbsp;</p>

<p>&nbsp;</p>



<? } ?>