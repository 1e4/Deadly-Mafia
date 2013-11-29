<?php
session_start();

include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];


echo "<link href=in.css rel=stylesheet type=text/css> ";


$goody = mysql_query("SELECT `message`, `date`, `from` FROM `inbox` WHERE `id`='$rep'");
while($success = mysql_fetch_row($goody)){
	$ini = $success[0];
$dateon = $success[1];
$fromper = $success[2];
	
}
if(strip_tags($_POST['Send'])){
$text=strip_tags(addslashes($text));
$to = strip_tags(addslashes($_POST['to']));
$rep = $_GET['rep'];

 $sql_username_check = mysql_query("SELECT username FROM users WHERE username='$to'");
 $username_check = mysql_num_rows($sql_username_check);
 if ($username_check == 0){
 	echo '<font color=red>There is no user with that name! </font>';
}else{
$blocked=mysql_num_rows(mysql_query("SELECT * FROM friends WHERE person='$username' AND type='Blocked' AND username='$to'"));
if ($blocked != "0"){
echo "This user has blocked you.";
}elseif ($blocked == "0"){


$date = gmdate('Y-m-d H:i:s');
$sql = mysql_query("INSERT INTO `inbox` (`id`, `to`, `from`, `message`, `date`, `read`) VALUES ('', '$to', '$username', '$text', '$date', '0');") or die (mysql_error());
if(!$sql){ 
    echo 'Error please contact an admin.'; 
	
	}else{
	echo "Message sent to <a href=profile.php?viewuser=$to><b>$to</b></a>";

}}}}
?>


<html>
<link href="includes/test.css" rel="stylesheet" type="text/css">


<center> 
<form action="" method="post">
  <table width="66%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" class=thinline rules=none>
        <tr bordercolor="black">
          <td background="includes/grad.jpg"><center>
              <strong>Send</strong>
          </center></td>
        </tr>
          <tr bgcolor=black> 
            <td height=1></td>
          </tr>
          <tr> 
            <td><table width=300 cellspacing=1 cellpadding=1 border=0 bordercolor=black class=black2 align=center>
                <tr class=title> 
                  <td width=248>Send To: </td>
                  <td width=357><input type=text name=to class=submit style=width: 60%; value='<?php echo $fromper; ?>'></td>
                </tr>
                <tr class=text> 
                  <td colspan=2 bgcolor="363636">Message:</td>
                </tr>
                <tr class=sub> 
                  <td colspan=2><textarea name='text' style='width: 98%; height: 175px'  class=submit><?php if ($m > 0){ echo "[b]On:[/b] $dateon.  $fromper [b] Wrote:[/b] $ini"; }else{ } ?></textarea></td>
                </tr>
                <tr  class=title> 
                  <td colspan=2><input type=submit name=Send value=Send class=submit></td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
  </table>
  <br>
</form>



<?php include_once"includes/footer.php"; ?><body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">