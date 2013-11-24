<?php
session_start();
include_once "includes/db_connect.php";
include_once"includes/functions.php";
logincheck(); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php echo "$fetch->notes"; ?>
</body>
</html>
