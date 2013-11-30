<?php 

include_once "./includes/functions.php";

$user->handleLoginCheck();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Deadly Mafia</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
        <frameset  rows="106,*" border="0">
            <frame name="littlebanner" src="banner.html" marginwidth="2" marginheight="2" scrolling="no" frameborder="0">
            <frameset  rows="30,*" border="0">
            <frame name="littlebanner1" src="statbar.php" marginwidth="2" marginheight="2" scrolling="no" frameborder="0">
        <frameset  cols="173,*" border="1">
            <frame name="menu" src="menu.php" marginwidth="0" marginheight="2" scrolling="auto" frameborder="0" noresize>
            <frame name="main" src="main.php" marginwidth="4" marginheight="5" scrolling="auto" frameborder="0" noresize>
        </frameset>
                
        <noframes>Try Chrome or Firefox... might work a little better</noframes>
</html>