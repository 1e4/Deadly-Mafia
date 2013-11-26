<?
session_start();
include_once "includes/db_connect.php";
include_once"includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$query=mysql_query("SELECT * FROM users WHERE username='$username'");
$fetch=mysql_fetch_object($query);
$query1=mysql_query("SELECT * FROM user_info WHERE username='$username'");
$user=mysql_fetch_object($query1);



if (($_POST['change_pass']) && ($_POST['current_pass']) && ($_POST['new_pass']) && ($_POST['repeat_pass'])){

$current_pass=$_POST['current_pass'];
$new_pass=$_POST['new_pass'];
$repeat_pass=$_POST['repeat_pass'];
///STRIP
$current_pass = strip_tags($current_pass);
$new_pass=strip_tags($new_pass);
$repeat_pass=strip_tags($repeat_pass);



///check if they match

if ($current_pass == $fetch->password && $new_pass == $repeat_pass){
mysql_query("UPDATE users SET password='$new_pass' WHERE username='$username'");
echo "Your password has been changed!";
session_destroy();
echo "<script language=\"javascript\">
top.document.location.reload();
</script>";

}else{
echo "Your password could NOT be changed!";
}
}
if (($_POST['change_quote']) && ($_POST['quote'])){
$quote=strip_tags($_POST['quote']);

mysql_query("UPDATE users SET quote='$quote' WHERE username='$username'");
echo "Your quote has been updated";
}
if (($_POST['change_image']) && strip_tags($_POST['image'])){

$image=strip_tags($_POST['image']);

mysql_query("UPDATE users SET image='$image' WHERE username='$username'");
echo "Your image has been updated";
}
if (strip_tags($_POST['change_music']) && strip_tags($_POST['music'])){
$music=strip_tags($_POST['music']);

mysql_query("UPDATE users SET music='$music' WHERE username='$username'");
echo "Music has been changed";
}


if (strip_tags($_POST['lang_button']) && strip_tags($_POST['lang'])){
$lang=strip_tags($_POST['lang']);
if ($lang == "1"){ $new_lang="English"; }else{ $new_lang="Dutch"; }

mysql_query("UPDATE user_info SET lang='$new_lang' WHERE username='$username'");
echo "Language settings updated.";


}
if (strip_tags($_POST['respect_button']) && strip_tags($_POST['respect_amount']) && strip_tags($_POST['respect_an']) && strip_tags($_POST['respect_username'])){
$respect_amount=addslashes(strip_tags(intval($_POST['respect_amount'])));
$respect_an=strip_tags($_POST['respect_an']);


$respect_username=addslashes(strip_tags($_POST['respect_username']));

$respect_type=strip_tags($_POST['respect_type']);

	if ($respect_amount == 0 || !$respect_amount || ereg('[^0-9]',$respect_amount)){
	print "Invalid amount of respect points.";
	
}elseif ($respect_amount != 0 || $respect_amount || !ereg('[^0-9]',$respect_amount)){

if (strtolower($username) == strtolower($respect_username)){
echo "You cannot send respect to yourself.";
}elseif (strtolower($username) != strtolower($respect_username)){

$check=mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='$respect_username'"));
if ($check == "0"){
echo "No such user.";
}elseif ($check != "0"){


if ($user->respect < $respect_amount){
echo "You dont have enough resepect points to send.";
}elseif ($user->respect >= $respect_amount){

$new_points=$user->respect - $respect_amount;
mysql_query("UPDATE user_info SET respect='$new_points' WHERE username='$username'");

if ($respect_type == "1"){
mysql_query("UPDATE user_info SET respect_rec=respect_rec+$respect_amount WHERE username='$respect_username'");
}else{
mysql_query("UPDATE user_info SET respect_rec=respect_rec-$respect_amount WHERE username='$respect_username'");


}
echo "Respect points sent.";


if ($respect_an == "1"){
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` , `witness` , `witness_per` ) 
VALUES (
'', '$respect_username', '$respect_username', '$username sent you $respect_amount respect points!', '$date', '0', '0', '0', '0', ''
)");
}else{
mysql_query("INSERT INTO `inbox` ( `id` , `to` , `from` , `message` , `date` , `read` , `saved` , `event_id` , `witness` , `witness_per` ) 
VALUES (
'', '$respect_username', '$respect_username', 'Someone sent you $respect_amount respect points!', '$date', '0', '0', '0', '0', ''
)");
}


}}}}}


if ($fetch->rank == "Scum"){ $new_res="0"; }elseif($fetch->rank == "Tramp"){  $new_res="1"; }elseif($fetch->rank == "Pickpocket"){  $new_res="2"; }elseif($fetch->rank == "Vandal"){  $new_res="3";    }elseif($fetch->rank == "Arsonist"){  $new_res="4";   }elseif($fetch->rank == "Gangster"){  $new_res="5";  }elseif($fetch->rank == "Assassin"){  $new_res="6";
}elseif($fetch->rank == "Boss"){  $new_res="7"; }elseif($fetch->rank == "Respectable Boss"){  $new_res="8"; }elseif($fetch->rank == "Godfather"){  $new_res="9"; }elseif($fetch->rank == "Headhunter"){  $new_res="10"; }elseif($fetch->rank == "Don"){  $new_res="11"; } elseif($fetch->rank == "Autocrat"){  $new_res="12"; }


?><html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="javascript" type="text/javascript">
function AddEmoticon(text) {
	var txtarea = document.form.quote;
	text = ' ' + text + ' ';
	if (txtarea.createTextRange && txtarea.caretPos) {
		var caretPos = txtarea.caretPos;
		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? caretPos.text + text + ' ' : caretPos.text + text;
		txtarea.focus();
	} else {
		txtarea.value  += text;
		txtarea.focus();
	}
}
</script>
</head>

<body>
<form name="form" method="post" action="">
  <table width="84%" border="0" align="center" cellpadding="0" cellspacing="2" >
    <!--DWLayoutTable-->
    <tr> 
      <td colspan="2" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr> 
            <td width="321" height="152" valign="top">            <div align="center"></div>
            <div align="center">
              <table width="100%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="#000000" class=thinline>
                <!--DWLayoutTable-->
                <tr >
                  <td colspan="2" background="includes/grad.jpg"><div align="center" class=bold>Reputation points</div></td>
                </tr>
                <tr>
                  <td height="67" colspan="2">Your currently have <?php echo "$user->respect"; ?> respect points to send. Every week you will get <?php echo "$new_res"; ?> point which you can send to somone or keep for youself. </td>
                </tr>
                <tr bgcolor=white>
                  <td height="8" colspan="2" class=tip><div align="center">Give respect</div></td>
                </tr>
                <tr>
                  <td height="4" colspan="2"><p>You get <?php echo "$new_res"; ?> respect point every week to give out. These do NOT rollover.</p>
                      <p align="center">You can currently give <?php echo "$user->respect"; ?> out.</p></td>
                </tr>
                <tr>
                  <td  height="3">Amount:</td>
                  <td ><input name="respect_amount" type="text" id="respect_amount"></td>
                </tr>
                <tr>
                  <td  height="1">Username:</td>
                  <td><input name="respect_username" type="text" id="respect_username"></td>
                </tr>
                <tr>
                  <td height="0" colspan="2"><div align="center">
                      <input name="respect_type" type="radio" value="1" checked>
        Respect
        </div></td>
                </tr>
                <tr>
                  <td height="35"><input name="respect_button" type="submit" id="respect_button" value="Give"></td>
                  <td height="35"><select name="respect_an" id="respect_an">
                      <option value="1">Anonymous</option>
                      <option value="2">Not Anonymous</option>
                  </select></td>
                </tr>
              </table>
            </div></td>
          </tr>
          <tr> 
            <td height="19">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>
