<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

if ($info->hdop == '0'){
die("<font size=3 color=white><center><b>You don`t have a HDOP!");
}

?>


<html>
<form method="post" action="de-hdo_user.php">
Which HDO Do you want to Sack?: <input type="text" name="mod"><br>
<input type="submit" value="Sack this HDO">
</form>
</html>