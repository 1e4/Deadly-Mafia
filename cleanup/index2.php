<?php
session_start();
include_once"includes/db_connect.php";
if (strip_tags($_GET['logout']) == "yes"){
session_destroy();
}elseif (isset($_SESSION['username'])){
header("Location: logged_in.php");
exit();
}

if ($_POST['Submit'] && strip_tags($_POST['username']) && strip_tags($_POST['password'])){
$username = addslashes(strip_tags($_POST['username'])); 
$password = addslashes(strip_tags($_POST['password']));

$ip = $REMOTE_ADDR;




///check INFO

$sql = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password' AND activated='1' LIMIT 1"); 


$login_check = mysql_num_rows($sql); 
$inf = mysql_fetch_object($sql); 
if ($login_check == "0"){
$message="You could not be logged in";
}elseif ($login_check != "0"){


if ($login_check > "0"){
if ($inf->status == "Dead"){
include_once"dead.php";
exit();

}
if ($inf->status == "Banned"){
$encoded=md5(strtolower($username));
header("Location: banned.php?banned=$username&encoded=$encoded"); 
exit();

}
       
        session_register('username'); 
        $_SESSION['username'] = $inf->username; 
       

       
       
         $timestamp = time()+60; 
mysql_query("UPDATE users SET online='$timestamp' WHERE username='$username'");
        
mysql_query("UPDATE users SET l_ip='$ip' WHERE username='$username'");



        header("Location: logged_in.php"); 
   
} else { 
    $message= "You could not be logged in.<br />"; 
   
}}}
?> 
<html>
<head>
<title>The Mafia V2</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="includes/in.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
A:link,  { 
   COLOR:#999999;
   font-family:"Arial", serif;
   FONT-WEIGHT:bold;font-size:12px;
   TEXT-DECORATION:none}
body {
	background-color: #000000;
	background-image: url();
}
.style4 {font-size: 18px}
.style9 {color: #000000}
.style13 {color: #FFFFFF}
.style14 {
	color: #000000;
	font-weight: bold;
	font-family: Geneva, Arial, Helvetica, sans-serif;
}
.style16 {color: #CCCCCC}
.style18 {
	color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<tr>
  <td></td>
</tr>
<table width="136" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class="thinline">
  <tr>
    <td height="20" background="includes/bg1.jpg"><center>
      Gangsters Online
    </center></td>
  </tr>
  <tr>
    <td bgcolor="#999999"><div align="center"><font color="#0000FF"><?php echo "$num"; ?></font> </div></td>
  </tr>
</table>
<div align="center">
    <table width="500" height="500" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td background="includes/loginimage.jpg"><p>&nbsp;</p>
          <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p align="center">&nbsp;</p>
        <p align="center"><span class="style14"><span class="style16"><a href="register2.php" class="style14">Register</a></span></span></p>
        <p align="center" class="style14"><span class="style9"><span class="style13"><a href="lost.php"></a></span></span><span class="style16"><a href="lost.php">Lost Password</a></span></p>
        <form action='index.php' method='post'>
          <table width="136" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class="thinline">
            <tr>
              <td height="20" background="includes/bg1.jpg"><center>
                Gangster Name
              </center></td>
            </tr>
            <tr>
              <td bgcolor="#999999"><div align="center">
                <input name="username" type="text" id="username" value="<?php if (strip_tags($_GET['l'])){ echo "$l"; } ?>" size="15" maxlength="40">
              </div></td>
            </tr>
          </table>
        <table width="136" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class="thinline">
          <tr>
            <td height="20" background="includes/bg1.jpg"><center>
              Password
              </center></td>
            </tr>
          <tr>
            <td bgcolor="#999999"><div align="center"> <span class="style4">
              <input name="password" type="password" class="thinline" id="password2" value="<?php if (strip_tags($_GET['pw'])){ echo "$pw"; } ?>" size="15" maxlength="40">
              </span></div></td>
            </tr>
          </table>
          <label></label>
          <div align="center">
            <input type="submit" name="Submit" value="Enter!">
          </div>
        </form>      </td>
    </tr>
    </table>
    <p class="style18">We Recommend you use FireFox</p>
    <p class="style18"><a href="http://www.firefox.com"><img src="/public_html/images/ff1.jpg" border="0"></a></p>
</div>
</body>
</html>







