<?php

$mysql_server = "localhost";

$mysql_user = "rayer_game";

$mysql_password = "password";

$mysql_database = "rayer_game";

$timeoutseconds = 300000; 



$connection = mysql_connect("$mysql_server","$mysql_user","$mysql_password") or die ("<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=../offline.php\">");



$db = mysql_select_db("$mysql_database") or die ("<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0; URL=../offline.php\">");





?>