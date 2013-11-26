<?php
session_start(); 
include_once "db_connect.php";
$username=$_SESSION['username'];
echo "<link rel=stylesheet href=includes/in.css type=text/css>";

$query=mysql_query("SELECT * FROM users WHERE username='$username' LIMIT 1");
$info = mysql_fetch_object($query);
$don=mysql_num_rows(mysql_query("SELECT * FROM donaters WHERE username='$username'"));


function logincheck(){


if (!($_SESSION['username'])){
echo "
<SCRIPT LANGUAGE='JavaScript'>
window.location='index.php';

</script>
";
exit();
}}

?>