<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

?>


<html>
<form method="post" action="view_user_recieved.php">
Username: <input type="text" name="search_username"><br><br>
<input type="submit" value="View Last 30 Messages Recieved">
</form>
</html>