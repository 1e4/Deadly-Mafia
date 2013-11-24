<?php

$user = 'rayer_game';

$pass = 'password';

$host = 'localhost';

$db = 'rayer_game';



@mysql_connect($host,$user,$pass);

@mysql_select_db($db);

?>