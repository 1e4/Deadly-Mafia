<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

?>


<html>
<form method="post" action="view_user_info.php">
Username: <input type="text" name="musername">
<input type="submit" value="view">
</form>
</html>