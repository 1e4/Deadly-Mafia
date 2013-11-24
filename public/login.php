<?php
ob_start();

include("config.php"); 

// connect to the mysql server 
$link = mysql_connect($server, $db_user, $db_pass) 
or die ("Could not connect to mysql because ".mysql_error()); 

// select the database 
mysql_select_db($database) 
or die ("Could not select database because ".mysql_error()); 

$match = "select id from $table where username = '".$_POST['username']."' 
and password = '".$_POST['password']."';"; 

$qry = mysql_query($match) 
or die ("Could not match data because ".mysql_error()); 
$num_rows = mysql_num_rows($qry); 

if ($num_rows <= 0) { 
echo "Sorry, there is no username $username with the specified password.<br>"; 
echo "<a href=http://www.empire2010.com/index.php>Try again</a>"; 
exit; 
} else { 

setcookie("loggedin", "TRUE", time()+(3600 * 24));
setcookie("mysite_username", "$username");
echo "You are now logged in!<br>"; 
echo"<meta http-equiv='refresh' content='1; url=http://www.empire2010.com/logginin2.php' />";
}
ob_end_flush();
?>




