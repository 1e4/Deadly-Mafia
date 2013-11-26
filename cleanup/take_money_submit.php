<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

?>


<html>
<center>
<form method="post" action="take_money.php">
Username: <input type="text" name="give_to"><br /><br>
Amount   : <input type="text" name="cash_give"><br />
<center><br>
<input type="submit" value="Update Cash">
</form>
</html>