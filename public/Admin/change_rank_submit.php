<?

session_start();



include "db_connect.php";



include "functions.php";



logincheck();



?>





<html>

<form method="post" action="change_rank.php">

Username: <input type="text" name="give_to">

change to: <SELECT>

<OPTION>Scruff

<OPTION>Scum Bag

<OPTION>Chav

<OPTION>Godfather

<OPTION>Legend

<OPTION>Official ML God

</SELECT

><input type="submit" value="Update Rank">

</form>

</html>