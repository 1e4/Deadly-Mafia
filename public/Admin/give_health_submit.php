<?

session_start();



include "db_connect.php";



include "functions.php";



logincheck();



?>





<html>

<form method="post" action="give_health.php">

Username: <input type="text" name="give_to">

Amount of Health: <input type="text" name="cash_give">

<input type="submit" value="Update Health">

</form>

</html>