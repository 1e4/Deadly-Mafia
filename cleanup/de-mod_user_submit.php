<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

?>


<html>
Only the Admins and are allowed to De-Mod Mods. Actions are logged..<br><br>
<form method="post" action="de-mod_user.php">
Which Mod Do you want to De-Mod: <input type="text" name="mod"><br>
<input type="submit" value="De-Mod this Mod">
</form>
</html>