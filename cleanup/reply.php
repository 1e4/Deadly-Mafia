<?
session_start();
include "includes/db_connect.php"; 
include "includes/functions.php";
include"includes/smile.php";
logincheck();
$forum=$_GET['forum'];
$username=$_SESSION['username'];
$viewtopic = $_GET['viewtopic'];



if (!$viewtopic){
$viewtopic = "1";
}

if(strip_tags($_POST['Submit']) && strip_tags($_POST['reply_text']) && $forum && $viewtopic){

$reply_text = strip_tags($_POST['reply_text']);

$topic_info=mysql_fetch_object(mysql_query("SELECT * FROM topics WHERE  id='$viewtopic' AND forum='$forum'"));


if ($topic_info->sticky == "1"){
$lastreplytime = $topic_info->lastreply;
}elseif ($stikornot == "0"){
$lastreplytime = time();
}
if ($topic_info->locked == "1"){
echo "This topic is locked.";
exit();
}


$date = gmdate('Y-m-d h:i:s');





if ($crew == "1" && $fetch->crew != "0"){
mysql_query("INSERT INTO `replys` (`id`, `username`, `text`, `forum`, `idto`,`made`,`crew`) VALUES ('', '$username', '$reply_text', '$forum', '$viewtopic','$date','$fetch->crew');") or die (mysql_error());
}else{
mysql_query("INSERT INTO `replys` (`id`, `username`, `text`, `forum`, `idto`,`made`) VALUES ('', '$username', '$reply_text', '$forum', '$viewtopic','$date');") or die (mysql_error());

}
mysql_query("UPDATE `users` SET `posts` = `posts`+1 WHERE username='$username'");

			mysql_query("UPDATE topics SET lastreply='$lastreplytime' WHERE id='$viewtopic'");
echo "

<SCRIPT LANGUAGE='JavaScript'>
window.location='forum_view.php?forum=$forum&viewtopic=$viewtopic';
</script>";

}


?>



<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<body>
<form name="form1" method="post" action="">
  <table width=551 border=1 align="center" cellpadding=2 cellspacing=0 class=thinline rules=none>
    <tr> 
      <td class=header><div align="center">Forum</div></td>
    </tr>
    <tr> 
      <td bgcolor=black height=1></td>
    </tr>
    <tr bgcolor=white> 
      <td align=center class=tip>Fill in all fields.</td>
    </tr>
    <tr> 
      <td bgcolor=black height=2></td>
    </tr>
    <tr> 
      <td height="41"><table width="100%" border="0" cellspacing="3" cellpadding="0">
          <tr> 
            <td width="38%">Message:</td>
            <td width="62%"><textarea name="reply_text" cols="60" rows="10" id="reply_text"></textarea></td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="Submit"></td>
          </tr>
          <input type="hidden" name="forum" value="<?php echo "$forum"; ?>">
        </table></td>
    </tr>
    <tr> 
      <td bgcolor=black height=2></td>
    </tr>
    <tr bgcolor=white> 
      <td align=right ><a href='javascript:history.goback(-1)'><font color="#000000">Back</font></a></td>
    </tr>
  </table>
</form>
</body>
</html>
