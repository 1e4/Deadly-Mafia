<?
session_start();
include_once "includes/db_connect.php";
include_once"includes/functions.php";
logincheck();

$apply=$_POST['apply'];
$leave=$_POST['leave'];

$user=mysql_fetch_object(mysql_query("SELECT username,crew FROM users WHERE username='$username'"));

$crew=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$user->crew'"));

$crews_query=mysql_query("SELECT * FROM crews ORDER by id ASC");

$opt=mysql_query("SELECT name FROM crews WHERE recruiting='1' ORDER by id DESC");

if($user->crew == "0"){
$name="None";
$boss="None";
$underboss="None";
}

if($crew->name == "0"){
$name="None";
}else{
$name=$crew->name;
}
if($crew->boss == "0"){
$boss="None";
}else{
$boss=$crew->boss;
}
if($crew->underboss == "0"){
$underboss="None";
}else{
$underboss=$crew->underboss;
}

if(($apply) && $user->crew == "0"){
mysql_query("UPDATE users SET apply='$apply' WHERE username='$username'");
print "Application submitted";
}elseif(($apply) && $user->crew != "0"){
print "You must leave your current crew before you can apply for another.";
}

if($leave){
if($crew->boss == $username){
print"You must hand over control of your crew before you can leave.";
}else{
if($crew->underboss == $username){
mysql_query("UPDATE crews SET underboss='0' WHERE crew='$user->crew'");
mysql_query("UPDATE users SET crew='0' AND apply='0' WHERE username='$username'");
print"You left your crew";
}else{
mysql_query("UPDATE users SET crew='0' AND apply='0' WHERE username='$username'");
print"You left your crew";
}}}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="includes/test.css" rel="stylesheet" type="text/css">

</head>

<body>
<table width="300" border="1" align="center" cellspacing="0" bordercolor="#000000" class="background">
  <tr class="header">
    <th background="includes/grad.jpg" scope="col"><span class="style3">Crew Status </span></th>
  </tr>
  <tr>
    <th bgcolor="#666666" scope="row"><p class="style3">Current Crew: <? print"$name"; ?></p>      <p class="style3">Boss: <? print"$boss"; ?></p>      <p class="style3">Underboss: <? print"$underboss"; ?></p>
      <p class="style3"><a href="crew_cp.php">Crew Bosses And Underbosses Click here for the controls for crews </a></p></th>
  </tr>
  <tr>
    <th bgcolor="#666666" scope="row"><form action="" method="post" name="form2" class="style3" id="form2">
	        <input name="leave" type="hidden" value="leave" />
      <input name="Submit2" type="submit" class="button" value="Leave Crew" />
    </form></th>
  </tr>
</table>
<p>&nbsp;</p>
<table width="733" border="1" align="center" cellspacing="0" bordercolor="#000000" class="background">
  <tr class="header">
    <th colspan="4" background="includes/grad.jpg" scope="col"><span class="style3">Crews</span></th>
  </tr>
  <tr bgcolor="#999999">
    <th width="190" bgcolor="#666666" class="top_ov_d_table style3" scope="row">Crew Name </th>
    <th width="210" bgcolor="#666666" class="top_ov_d_table style3" scope="row">Boss</th>
    <th width="199" bgcolor="#666666" class="top_ov_d_table style3" scope="row">Underboss</th>
    <th width="114" bgcolor="#666666" class="top_ov_d_table style3" scope="row">Members</th>
  </tr>
<? while($crews = mysql_fetch_object($crews_query)){ 
$num=mysql_num_rows(mysql_query("SELECT username FROM users WHERE crew='$crews->name'"));
?>
  <tr bgcolor="#999999">
    <th bgcolor="#666666" class="background" scope="row"><span class="style3"><? print "<a href='crewprofile.php?viewcrew=$crews->name'>$crews->name"; ?></span></th>
    <th bgcolor="#666666" class="background" scope="row"><span class="style3"><? print "$crews->boss"; ?></span></th>
    <th bgcolor="#666666" class="background" scope="row"><span class="style3"><? print "$crews->underboss"; ?></span></th>
 <th bgcolor="#666666" class="background" scope="row"><span class="style3"><?     
  
   <? } ?>
</table>
<p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="">
<table width="300" border="1" align="center" cellspacing="0" bordercolor="#000000" bgcolor="#999999" class="background">
  <tr class="header">
    <th background="includes/grad.jpg" scope="col"><span class="style3">Crew Aplications </span></th>
  </tr>
  <tr>
    <th bgcolor="#666666" scope="row"><span class="style3">Crew: 
          <select name="apply" class="button">
            <? while($option = mysql_fetch_object($opt)){ ?>
            <option value="<? print"$option->name"; ?>">name"; ?>"><? print"$option->name"; ?></option>
            <? } ?>
          </select>
    </span></th>
  </tr>
  <tr>
    <th bgcolor="#666666" scope="row"><input name="Submit" type="submit" class="button " value="Apply" /></th>
  </tr>
</table>
      </form>
<p>&nbsp;</p>
</body>
</html>
<? include 'includes/footer.php'; ?>