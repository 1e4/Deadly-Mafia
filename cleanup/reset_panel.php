<?
include "functions.php";
logincheck();
$username=$_SESSION['username'];
$fetch=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$userlevel=$fetch->userlevel;

$p=$_GET['opt'];


if($userlevel == "2"){

?><style type="text/css">
<!--
body,td,th {
	color: #990000;
}
body {
	background-color: #999999;
}
a:link {
	color: #990000;
}
a:visited {
	color: #990000;
}
a:hover {
	color: #993300;
}
a:active {
	color: #990000;
}
.style1 {font-weight: bold}
-->
</style>

<p align="center"><strong>ATTENTION: CLICKING ANY OF THE BELOW OPTIONS WILL COMPLETE THE ACTION WITHOUT CONFIRMATION </strong></p>
<p align="center">&nbsp;</p>
<p align="center"><span class="style1"><a href="?opt=users" target="_self">Reset Users</a></span></p>
<p align="center"><strong><a href="?opt=inbox" target="_self">Reset Inbox's</a></strong></p>
<p align="center"><strong><a href="?opt=forums" target="_self">Reset Forums</a></strong></p>
<p align="center"><strong><a href="?opt=garage" target="_self">Reset Garage</a></strong></p>
<p align="center"><strong><a href="?opt=attempts" target="_self">Reset Attempts</a></strong></p>
<p align="center"><strong><a href="?opt=auctions" target="_self">Reset Auctions</a></strong></p>
<p align="center"><strong><a href="?opt=ban" target="_self">Reset Ban List </a></strong></p>
<p align="center"><strong><a href="?opt=dealership" target="_self">Reset Dealerships</a></strong></p>
<p align="center"><strong><a href="?opt=chat" target="_self">Reset Chat</a></strong></p>
<p align="center"><strong><a href="?opt=crews" target="_self">Reset Crews</a></strong></p>
<p align="center"><strong><a href="?opt=friends" target="_self">Reset Friends List</a></strong></p>
<p align="center"><strong><a href="?opt=hitlist" target="_self">Reset Hitlist</a></strong></p>
<p align="center"><strong><a href="?opt=helpdesk" target="_self">Reset Helpdesk </a></strong></p>


<div align="center">
  <strong>
  <?

if($p == "users"){
mysql_query("TRUNCATE TABLE users");
mysql_query("TRUNCATE TABLE user_info");
print "Done";
}elseif($p == "inbox"){
mysql_query("TRUNCATE TABLE inbox")or die(mysql_error());
print "Done";
}elseif($p == "forums"){
mysql_query("TRUNCATE TABLE replys");
mysql_query("TRUNCATE TABLE topics");
print "Done";
}elseif($p == "garage"){
mysql_query("TRUNCATE TABLE garage");
print "Done";
}elseif($p == "attempts"){
mysql_query("TRUNCATE TABLE attempts");
print "Done";
}elseif($p == "auctions"){
mysql_query("TRUNCATE TABLE auctions");
mysql_query("TRUNCATE TABLE bidders");
print "Done";
}elseif($p == "ban"){
mysql_query("TRUNCATE TABLE ban");
print "Done";
}elseif($p == "dealership"){
mysql_query("TRUNCATE TABLE dealership");
print "Done";
}elseif($p == "chat"){
mysql_query("TRUNCATE TABLE chat");
print "Done";
}elseif($p == "crews"){
mysql_query("TRUNCATE TABLE crews");
print "Done";
}elseif($p == "friends"){
mysql_query("TRUNCATE TABLE friends");
print "Done";
}elseif($p == "hitlist"){
mysql_query("TRUNCATE TABLE hitlist");
print "Done";
}elseif($p == "helpdesk"){
mysql_query("TRUNCATE TABLE ticket");
print "Done";
}


}//end userlevel check

?>
  </strong></div>
