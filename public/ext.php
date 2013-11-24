<?php session_start(); include_once"includes/db_connect.php"; include_once"includes/functions.php"; logincheck(); include_once"includes/jail_check.php";
$username=$_SESSION['username'];
include_once"probe.php";
include_once"ext.php";
$page="ext.php";


$query=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($query);
echo "$style";
if ($fetch->last_ext > time()){
echo "You need to wait ".maketime($fetch->last_ext)." untill you can Extort again";
exit();
}


if (strip_tags($_POST['go'])){
$get_past=rand(28,478);
if ($get_past > 399){

$total_users=mysql_num_rows(mysql_query("SELECT * FROM users"));
$random=rand(1,$total_users);


$gutted=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE id='$random' AND money != '0' AND username !='$username' AND rank='$fetch->rank'"));

if (!$gutted){
$loose="1";
}else{
$loose="0";
}

}else{
$loose="1";
}
if ($loose == "1"){
$time=time() + (60 * 3);
$new_rank = rand(1,6) + $fetch->rankpoints;
mysql_query("UPDATE users SET last_ext='$time', rankpoints='$new_rank' WHERE username='$username'");
}elseif ($loose == "0"){

$get=rand(3,6);
$your =round($gutted->money / $get);
$your_money = $fetch->money + round($gutted->money / $get);
$ther_money = $gutted->money - round($gutted->money / $get);
$time=time() + (60 * 3);
$new_rank=$fetch->rankpoints + rand(1,20);
mysql_query("UPDATE users SET money='$your_money',last_ext='$time', rankpoints='$new_rank' WHERE username='$username'");
mysql_query("UPDATE users SET money='$ther_money' WHERE username='$gutted->username'");
loose_energy();
$an=rand(1,3);
if ($an == "1"){
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` , `witness` , `witness_per` ) 
VALUES (
'', '$gutted->username', '$gutted->username', '$username stole £".makecomma($your)." was stolen from you. What you guna do about it ?.', '$date', '0', '0', '0', '0', ''
)");
}else{
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` , `witness` , `witness_per` ) 
VALUES (
'', '$gutted->username', '$gutted->username', '£".makecomma($your)." was stolen from you. But you do not know who it was.', '$date', '0', '0', '0', '0', ''
)");
}


}


///SUBMIT CLOSE
}




?>


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg">
<table width="75%" height="269" border="1" align="center" cellpadding="2" cellspacing="0" class=thinline bordercolor=black>
  <tr> 
    <td background="includes/grad.jpg"> <center class=bold>
        Extortion: 
      </center></td>
  </tr>

  <tr> 
    <td height="245">
<table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr> 
          <td width="36%"><div align="center"><img src="images/pickpocket.jpg" width="144" height="170"></div></td>
        </tr>
        <tr>
          <td><?php if ($loose == "0"){ echo "<center>You Extorted £".makecomma($your)." from <b><a href='profile.php?viewuser=$gutted->username'>$gutted->username</a></b>. Theres a chance that he could find out.</center>";
 }elseif ($loose == "1"){ echo "<center>You didn't manage to get anything.</center>"; } ?></td>
        </tr>
        <tr> 
          <td height="49" colspan="3"> <div align="center"> 
              <form name="form1" method="post" action="">
                <input name="go" type="submit" id="go" value="Go for it!" background="submit.jpg">
              </form>
            </div></td>
        </tr>
      </table> </td>
  </tr>
</table>
</body>
</html>
