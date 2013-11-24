<?
session_start();

include "includes/db_connect.php";

include "includes/functions.php";

logincheck();

if ($userlevel == '0' || $userlevel == '2'){
die("");
}

?>


<html>
<form method="post" action="bank_transfers.php">
Username: <input type="text" name="search_username"><br><br>
<input type="submit" value="View Bank Transfers For A User">
</form>
</html>