<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

?>


<html>
<form method="post" action="health_increase.php">
Username To Put Health to 1000%: <input type="text" name="revive"><br>
<input type="submit" value="Give User 1000% HP">
</form>
</html>