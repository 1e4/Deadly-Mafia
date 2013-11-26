<?php
session_start();
include "includes/db_connect.php";
include "includes/functions.php";
logincheck();
$username=$_SESSION['username'];
$viewuser=$_GET['viewuser'];
$id=$_GET['crewsid'];




$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "120"){
echo "<a href=\"forum_frame.php?forum=c1\" target=\"middle\" >Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "121"){
echo "<a href=\"forum_frame.php?forum=c3\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "122"){
echo "<a href=\"forum_frame.php?forum=c4\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "123"){
echo "<a href=\"forum_frame.php?forum=c5\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "124"){
echo "<a href=\"forum_frame.php?forum=c6\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "125"){
echo "<a href=\"forum_frame.php?forum=c7\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "126"){
echo "<a href=\"forum_frame.php?forum=c8\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "127"){
echo "<a href=\"forum_frame.php?forum=c9\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "128"){
echo "<a href=\"forum_frame.php?forum=c10\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "129"){
echo "<a href=\"forum_frame.php?forum=c11\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "130"){
echo "<a href=\"forum_frame.php?forum=c12\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "131"){
echo "<a href=\"forum_frame.php?forum=c13\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "132"){
echo "<a href=\"forum_frame.php?forum=c14\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "133"){
echo "<a href=\"forum_frame.php?forum=c15\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "134"){
echo "<a href=\"forum_frame.php?forum=c16\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "135"){
echo "<a href=\"forum_frame.php?forum=c17\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "136"){
echo "<a href=\"forum_frame.php?forum=c18\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "137"){
echo "<a href=\"forum_frame.php?forum=c19\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
$fetch1=mysql_fetch_object(mysql_query("SELECT * FROM users WHERE username='$username'"));
$fetch2=mysql_fetch_object(mysql_query("SELECT * FROM crews WHERE name='$fetch1->crew'"));
if ($fetch2->id == "138"){
echo "<a href=\"forum_frame.php?forum=c20\" target=\"middle\">The Crew Forum</a>";
}else{
echo "";}
?>

