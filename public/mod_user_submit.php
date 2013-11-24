<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

?>


<html>
<form method="post" action="make_mod.php">
Username To Make Mod: <input type="text" name="mod"><br>
<input type="submit" value="Make User Mod">
</form>
</html>