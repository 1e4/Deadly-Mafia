<?php

$mysql_server = "localhost";

$mysql_user = "rayer_game";

$mysql_password = "password";

$mysql_database = "rayer_game";

 

$connection = mysql_connect("$mysql_server","$mysql_user","$mysql_password") or die ("Unable to connect to MySQL server.");

$db = mysql_select_db("$mysql_database") or die ("Unable to select requested database.");



?>