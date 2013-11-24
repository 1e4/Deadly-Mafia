<?php
session_start();
$username=$_SESSION['username'];
include_once"includes/db_connect.php";
include_once"includes/functions.php"; 
logincheck();
$forum=$_GET['forum'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
if ($level == "0"){
if ($fetch->lasttop > time()){
echo "You need to wait for ".maketime($lasttopic)." untill you can make anouther topic<br>
Remove this limit by clicking here <a href='donate.php#plan1'>Here</a>";
}}
if (($level != '0') || (time() >= $lasttopic)){
$timer = gmdate('Y-m-d h:i:s');

if(strip_tags($_POST['Submit']) && strip_tags($_POST['title']) && strip_tags($_POST['topic_text'])){


$time = time()+ (60 * 5);

$title = strip_tags($_POST['title']);
$topic_text=strip_tags($_POST['topic_text']);
$forum=strip_tags($_POST['forum']);

if ($forum == "Crew" && $fetch->crew != "0"){
mysql_query("INSERT INTO `topics` (`id`, `username`, `title`, `topictext`, `forum`, `locked`, `sticky`, `lastreply`,`made`,`crew`) VALUES ('', '$username', '$title', '$topic_text', '$forum', '0', '0', '$time','$timer','$fetch->crew');") or die (mysql_error());
}else{
mysql_query("INSERT INTO `topics` (`id`, `username`, `title`, `topictext`, `forum`, `locked`, `sticky`, `lastreply`,`made`) VALUES ('', '$username', '$title', '$topic_text', '$forum', '0', '0', '$time','$timer');") or die (mysql_error());
}
mysql_query("UPDATE users SET lasttop='$time' WHERE username='$username'");
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=left.php?forum=$forum'>";


}



?>
<html>
<head>
<script language=JavaScript>
function so(dis)
{
for (i=0;i<dis.elements.length;i++){ 
	if (dis.elements[i].type=='submit')
	   dis.elements[i].style.visibility='hidden';
	}
	if(fs==false){
		 fs=true;
		 return true;
	}else
 		return false;
	}
	function goaway()
{
for(i=0;i<document.forms.length;i++)
 document.forms[i].onsubmit = function() {return so(this);};
}
</script>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="includes/test.css" rel="stylesheet" type="text/css">
</head>

<body onLoad="goaway();">
<form name="form1" method="post" action="">
  <table width=551 border=1 align="center" cellpadding=2 cellspacing=0 class=thinline rules=none>
    <tr> 
      <td class=header><div align="center">Forum</div></td>
    </tr>
    <tr> 
      <td bgcolor=black height=1></td>
    </tr>
    <tr> 
      <td bgcolor=black height=2></td>
    </tr>
    <tr> 
      <td height="41"><table width="100%" border="0" cellspacing="3" cellpadding="0">
          <tr> 
            <td width="38%">Topic title: </td>
            <td width="62%"><input name="title" type="text" id="title" maxlength="100"></td>
          </tr>
          <tr> 
            <td>Topic text:</td>
            <td><textarea name="topic_text" cols="60" rows="10" id="topic_text"></textarea></td>
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
<? } ?>