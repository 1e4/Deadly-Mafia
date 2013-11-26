<?
session_start();
include_once "db_connect.php";
include_once"functions.php";
logincheck();

if ($info->userlevel=='0'){
die("");
}

$date = gmdate('Y-m-d h:i:s');



$username=$_SESSION['username'];
$page="Admimautokill.php";
$kill_username=strip_tags($_POST['kill_username']);
$reason=strip_tags($_POST['reason']);
if (strip_tags($_POST['kill_username'])){
mysql_query("UPDATE users SET status='Dead' WHERE username='$kill_username'");
///

mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'CubZ', '$username', '$username killed $kill_username ', '$date', '0', '0', '')");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', '1703', '$username', '$username killed $kill_username ', '$date', '0', '0', '')");
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` ) 
VALUES ('', 'CrookyJ', '$username', '$username killed $kill_username ', '$date', '0', '0', '')");

mysql_query("INSERT INTO `replys` ( `id` , `username` , `text` , `forum` , `idto` , `made` , `crew` ) 
VALUES ('', '$username', '<b><font color=black>Modkill<br><BR>$kill_username<BR><BR>$reason ', 'main', '1', '$date', '$crew')");

///
echo "$kill_username Is Now Dead!";
}
?>




<form name="form1" method="post" action="">
  <table width="76%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td>
<table width="100%" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
          <tr>
            <td colspan="2" background="includes/grad.jpg"><center>

                Admin Auto Kill </center></td>
          </tr>
          <tr>
            <td width="50%">Username:</td>
            <td width="50%"><input name="kill_username" type="text" id="kill_username3"></td>
          </tr>
<tr>
            <td width="50%">Reason:</td>
            <td width="50%"><input name="reason" type="text" id="reason"></td>
          </tr>
           <tr>
            <td>&nbsp;</td>
            <td><input name="kill_button" type="submit" id="kill_button3" value="Submit"></td>
          </tr>
        </table></td>
    </tr>
