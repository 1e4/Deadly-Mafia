<html>
<head>
<title>Members' Section</title>
</head>

<body>

<?php
if (!isset($_COOKIE['loggedin'])) die("You are not logged in!");
$mysite_username = $HTTP_COOKIE_VARS["mysite_username"]; 
echo "you are logged in as $mysite_username.<p>";
?>

<body onload="javascript:document.links[0].click();">
<p>
<a href="http://www.empire2010.com">You are automatically being redirected. If you are not
automatically forwarded, please click here to enter.</a></p>


</body>
</html>
