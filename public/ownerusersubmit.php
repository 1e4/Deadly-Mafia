<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

?>


<html>
Only the Owners are allowed to make owners. Actions are logged..<br><br>
<form method="post" action="owneruser.php">
Username To Make Administrator: <input type="text" name="mod"><br>
<input type="submit" value="Make User Administrator">
</form>
</html>
