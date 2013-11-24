<?

session_start();



include "db_connect.php";



include "functions.php";



logincheck();



?>





<html>

<form method="post" action="forummod.php">

Username To Make Forum Mod: <input type="text" name="mod"><br>

<input type="submit" value="Make User Forum Mod">

</form>

</html>