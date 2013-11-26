<?
include 'functions.php';
logincheck();
$reason=$_POST['reason'];
$select=$_POST['select'];
$user=$_POST['user'];
$mysql=mysql_fetch_object(mysql_query("SELECT userlevel FROM users WHERE username='$username'"));
$userlevel="$mysql->userlevel";
if(($userlevel != "0") && ($reason) && ($select) && ($user)){
if($select == "perminant"){
$new_time="perminant";
}else{
$time=time();
$new_time=$time+$select;
}
mysql_query("UPDATE users SET status='Banned' WHERE username='$user'");
mysql_query("INSERT INTO `ban` ( `id` , `username` , `by` , `reason` , `length`) VALUES (
'', '$user', '$username', '$reason', '$new_time')");
mysql_query("INSERT INTO `log` ( `id` , `by` , `action` , `level` ) 
VALUES ('', '$username', 'Banned $user', '$userlevel')");
print "$user banned";
}else{
print "Please fill in all fields !";
}
if($userlevel != "0"){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../stylesheets/online.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body,td,th {
	color: #FFFFFF;
}
body {
	background-color: #4f4f4f;
}
-->
</style></head>
<body>
<form id="form1" name="form1" method="post" action="">
<table width="465" border="0" align="center" class="background">
  <tr class="header">
    <th width="334" scope="col">Ban A User</th>
  </tr>
  <tr>
    <th height="25" scope="row">
      
    Username:
        <input name="user" id="user"type="text" class="button"/>
        Ban Type:
      <select name="select" class="button">
        <option value="3600" selected="selected">1 Hour Ban</option>
        <option value="7200">2 Hour Ban</option>
        <option value="14400">4 Hour Ban</option>
        <option value="43200">12 Hour Ban</option>
        <option value="86400">1 Day Ban</option>
        <option value="172800">2 Day Ban</option>
        <option value="259200">3 Day Ban</option>
		<? if($userlevel == "2"){ ?>
        <option value="345600">4 Day Ban</option>
        <option value="432000">5 Day Ban</option>
        <option value="518400">6 Day Ban</option>
        <option value="604800">1 Week Ban</option>
        <option value="1209600">2 Week Ban</option>
        <option value="2419200">1 Month Ban</option>
        <option value="perminant">Perminant Ban</option>
		<? } ?>
      </select>
    </th>
  </tr>
  <tr>
    <th scope="row">
      Reason
      <textarea name="reason" id="reason" cols="70" rows="8" class="button"></textarea>
    </th>
  </tr>
  <tr>
    <th scope="row">
      <input name="Submit" type="submit" class="button" value="Ban" />
  </th>
  </tr>
</table>   
</form>
</body>
</html>
<? } ?>