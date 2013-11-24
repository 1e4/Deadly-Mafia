<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

if ($info->hdop == '1'){
die("<font size=3><b><center>You Already Have a HDOP! Sack him/her to make another one!");
}

?>


<html>
<form method="post" action="hdo_user.php">
Username To Make HDOP: <input type="text" name="mod"><br>
<input type="submit" value="Make User HDOP">
</form>
</html>