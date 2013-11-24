<?php


session_start();





include "db_connect.php";





include "functions.php";





logincheck();





?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">


<head>


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<title>Untitled Document</title>


</head>





<body>





<form method="post" action="dupe_search.php">


Ip: <input type="text" name="ip"><br>


<input type="submit" value="Find users with this ip!">


</form>


</body>


</html>


