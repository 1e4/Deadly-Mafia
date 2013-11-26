<?
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
echo "$style"; 
?>

<html>
<form method="post" action="change_rank.php">
Username: <input type="text" name="give_to">
change to: <SELECT>
<OPTION>Scum
<OPTION>Tramp
<OPTION>Chav
<OPTION>Vandal
<OPTION>Buisness Man
<OPTION>Hitman
<OPTION>Agent
<OPTION>Boss
<OPTION>Assassin
<OPTION>Godfather
<OPTION>Global Threat
<OPTION>World Dominator
<OPTION>Untouchable Godfather
<OPTION>Legend
<OPTION>Official Bliss Godfather
</SELECT
<input type="submit" value="Update Rank">
</form>
</html>