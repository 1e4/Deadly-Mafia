<?

session_start();



include "db_connect.php";



include "functions.php";



logincheck();



?>





<html>

<font size=3 color=white><B> Only clear profiles with UnAcceptable things on them!.</font><br><br>

<form method="post" action="clear_profile.php">

Owner of Porofile: <input type="text" name="mod"><br>

<input type="submit" value="Clear Profile">

</form>

</html>

