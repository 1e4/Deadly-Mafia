<?php
session_start();
include "db.php";
include "functions.php";
$username=$_SESSION['username'];

echo "<html>
<link rel='stylesheet' href='add/style.css' type='text/css'>
<center>";
if ($_POST['joindacrew']){
if ($crewc == '1'){

$ab1 = mysql_query("SELECT * FROM crews WHERE crewname='$real'");
$wiked1=mysql_numrows($ab1);

if ($wiked1 == '0'){
echo "Error.";
}else{
$theid = $_GET['theid'];
mysql_query("DELETE FROM pm WHERE id='$theid'");
mysql_query("UPDATE users SET crew='$real' WHERE username='$username'");
}}}


if ($_POST['Submit']){
$accept = $_GET['accept'];
$offer = $_POST['offer'];

if ($offer == '1'){
$position = $_GET['posi'];
$ab1 = mysql_query("SELECT * FROM oc WHERE id='$accept' AND weinvite='$username' OR eeinvite='$username' OR driverinvite='$username'");
$wiked1=mysql_numrows($ab1);
if ($wiked1 == 0){
echo "Error.";
}elseif ($wiked1 != 0){
mysql_query("UPDATE users SET oc='1' WHERE username='$username'");
mysql_query("UPDATE `oc` SET `$position`='$username' WHERE `id`='$accept'");
echo "Invite accepted you are now in the oc!";
}}}

$s = $_GET['s'];
if ($s){
$killshit = mysql_query("SELECT `from`, `msg`, `date` FROM pm WHERE id='$s'");
while($successa = mysql_fetch_row($killshit)){
	$from1 = $successa[0];
	$msg1 = $successa[1];
	$date1 = $successa[2];
}
$sql_user_check = mysql_query("SELECT * FROM pm WHERE id='$s' AND username='$username'");
$user_check = mysql_num_rows($sql_user_check);
if ($user_check == 0){
echo "Error.";
exit;
}else{
$sql = mysql_query("INSERT INTO `saved` (`id`, `username`, `from`, `msg`,`date`) VALUES ('', '$username', '$from1', '$msg1', '$date1');") or die (mysql_error());
mysql_query("DELETE FROM pm WHERE id='$s'");

}}


$d=$_GET['d'];

if($d){ 
	$id = $_POST['d'];
	
$sql_user_check = mysql_query("SELECT * FROM pm WHERE id='$d' AND username='$username'");
$user_check = mysql_num_rows($sql_user_check);
if ($user_check == 0){
echo "Error.";
exit;
}else{
echo "Message deleted! ";
	mysql_query("DELETE FROM pm WHERE id='$d'");
}
	
}
$da = $_GET['da'];
if ($da == yes){
mysql_query("DELETE FROM pm WHERE username='$username'");
echo "Messages deleted!";
}
echo "<table class=thinline width=50% cellspacing=0 cellpadding=2 rules=none>
<tr><td background=images/topic.jpg align=center><font color=#FFFFFF>Communication</font></td></tr><tr>
<td height=1 bgcolor=black colspan=2>
<tr><td>
<a href='msg.php?da=yes'><center>Delete All</a> - <a href='msg.php?da'>Blocked Users</a></tr></td></table>";
$query="SELECT * FROM pm WHERE username='$username' ORDER by date DESC";
$result=mysql_query($query);

$num=mysql_numrows($result);




$i=0;
while ($i < $num) {
$id=mysql_result($result,$i,"id");

$from=mysql_result($result,$i,"from");
$msg=mysql_result($result,$i,"msg");
$read=mysql_result($result,$i,"read");
$date=mysql_result($result,$i,"date");



echo "<table class=thinline width=600 cellspacing=0 cellpadding=2 rules=none><tr><td background=images/topic.jpg align=left><font color=#FFFFFF><b>Message From :</b> $from <b>Recived On :</b> $date</font></td></tr>
<tr><td bgcolor=black height=1></td></tr>
<tr><td>";

echo "".replace($msg)."<p>";


echo "<table width=140 border=0 cellspacing=0 cellpadding=0>
<tr><td width=70>
<td width=70><form name=form1 method=post action=msg.php?d=$id> <input name=Delete type=submit id=Delete value=Delete class=submit></form></td>
					
<td width=70><form name=form1 method=post action=send.php?r=$from&m=$id> <input name=Reply type=submit id=Reply value=Reply class=submit></form></td>
					
<td width=70><form name=form1 method=post action=msg.php?s=$id> <input name=Save type=submit id=Save value=Save class=submit></form></td>
<input name=theid type=hidden value=$id>
</tr>
</table>
</tr>

</td></tr></table><br>";

mysql_query(" UPDATE `pm` SET `read` = '1' WHERE `id` = '$id'");
 $i++;
}
if ($num == 0){
echo "<br><table class=thinline width=50% cellspacing=0 cellpadding=2 rules=none>
<tr><td background=images/topic.jpg align=center><font color=#FFFFFF>Communication</font></td></tr><tr>
<td height=1 bgcolor=black colspan=2>
<tr><td>No Messages Boss.";
}
?>






