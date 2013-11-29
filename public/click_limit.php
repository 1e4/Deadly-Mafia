<?php
session_start(); 

include_once "includes/functions.php";
$username=$_SESSION['username'];
echo "$style";

$query=mysql_query("SELECT * FROM users WHERE username='$username' LIMIT 1");
$info = mysql_fetch_object($query);


$clicks="5";

if ($info->click_rate > time() && $info->clicks >= $clicks){
$left=$info->click_rate - time();
echo "<center class=TableHeading>You have reached your click limit. <br>Thsi click limit is applied so that you do not user up all the server resources<br>
You can increase the click limit per min by Donating or buying it from the referral shop.<br>
Time left: $left</center>";
exit();
}else{
mysql_query("UPDATE users SET clicks=clicks+1 WHERE username='$username'");


}
if ($info->click_rate <= time()){
$now=time()+60;
mysql_query("UPDATE users SET click_rate='$now',clicks='0' WHERE username='$username'");
}

?>
