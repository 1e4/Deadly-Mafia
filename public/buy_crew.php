<?
session_start();

include_once"includes/functions.php";
logincheck();

$crewname=$_POST['crewname'];

$user=mysql_fetch_object(mysql_query("SELECT money,crew,apply,rank FROM users WHERE username='$username'"));

$totalcrews=mysql_num_rows(mysql_query("SELECT * FROM crews"));

$others=mysql_num_rows(mysql_query("SELECT * FROM crews WHERE boss='$username'"));

if($crewname){
$check=mysql_query("SELECT name FROM crews WHERE name='$check'");
$check_num=mysql_num_rows($check);
if($check_num != "0"){
print "That crew name is already taken";
}else{
if($user->money < 20000000){
print "You dont have enough money to buy a crew";
}else{
if($user->crew != "0"){
print "You must leave your current crew before you can make your own";
}else{
if($user->rank == 'Scum' || $user->rank == 'Tramp' || $user->rank == 'Chav' || $user->rank == 'Vandal' || $user->rank == 'Agent' || $user->rank == 'Business Man' ){
print"You must be Hitman + to make your own crew.";
}else{
mysql_query("INSERT INTO `crews` (`id`, `name`, `boss`, `underboss`, `money`, `bullets`, `recruiting`) VALUES ('', '$crewname', '$username', '0', '0', '0', '1');");
mysql_query("UPDATE users SET crew='$crewname' WHERE username='$username'");
$new_money=$user->money-20000000;
mysql_query("UPDATE users SET money='$new_money' WHERE username='$username'");
mysql_query("UPDATE users SET apply='0' WHERE username='$username'");
print "You have bought a crew. Please logout and login again to reload your menu.";
}}}}}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="includes/test.css" rel="stylesheet" type="text/css">

</head>

<body background="http://i111.photobucket.com/albums/n152/cl_bullet/background.jpg"><form id="form1" name="form1" method="post" action="">
<table width="585" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" bgcolor="#666666" class="background">
  <tr class="header">
    <th background="includes/grad.jpg" scope="col">Buy A Crew </th>
  </tr>
  <tr>
    <th height="65" bgcolor="#666666" scope="row"><p class="style1">Crews cost &pound;20,000,000 to create. You are allowed unlimited members, and your crew will last until all members are killed </p>
      <p class="style1">There Are Only 10 crews allowed at a time. </p>
      <p class="style1">To create a crew you must be rank Hitman or higher. </p>    </th>
  </tr>
  <? if($others == "0"){ ?>
 <? if($totalcrews < 10){ ?>
  <tr class="header">
    <th bgcolor="#666666" scope="row"><span class="style1"><strong>Purchasing</strong></span></th>
  </tr>
  <tr>
    <th bgcolor="#666666" scope="row"><span class="style1"><strong>
      Crew Name<span class="style2">:
        <input name="crewname" type="text" class="button" />     
      </span></strong></span></th>
  </tr>
  <tr>
    <th bgcolor="#666666" scope="row"><input name="Submit" type="submit" class="button " value="Purchase" /></th>
  </tr>
  <? }else{ ?>
    
    <tr class="background">
      <th bgcolor="#666666" scope="row"><span class="style1"><strong>There are no crew spaces left !</strong></span></th>
    </tr>
  <? } ?>
  <? }else{ ?>
      
    <tr class="background">
      <th bgcolor="#666666" scope="row"><span class="style1"><strong>You already own a crew !</strong></span></th>
    </tr>
  <? } ?>
</table> 
</form>    
</body>
</html>
<? include 'includes/footer.php'; ?>