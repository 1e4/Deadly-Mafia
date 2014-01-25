<?php 

include_once "./includes/functions.php";

$user->handleLoginCheck();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Deadly Mafia</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?=$style?>
    </head>
        <frameset  rows="100,*" border="0">
            <frame name="littlebanner" src="top.php" marginwidth="0" marginheight="0" scrolling="no" frameborder="0">
            <frameset  rows="40,*" border="0">
            <frame name="littlebanner1" src="statbar.php" marginwidth="0" marginheight="0" scrolling="no" frameborder="0">
        <frameset  cols="173,*" border="0">
            <frame name="menu" src="menu.php" marginwidth="0" marginheight="0" scrolling="auto" frameborder="0">
            <frame name="main" src="news.php" marginwidth="0" marginheight="0" scrolling="auto" frameborder="0">

                
        <noframes>Try Chrome or Firefox... might work a little better</noframes>
</html>