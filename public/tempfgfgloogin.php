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
<title>..::Empire2010::..</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="includes/in.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
body {
	background-color: #000000;
	background-image: url();
}
.style4 {font-size: 18px}
.style6 {
	font-size: 14px;
	color: #FFFFFF;
	font-style: italic;
}
-->
</style>
</head>

<body>
<form action="" method="post">
<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr> 
    <td height="114" colspan="3" valign="top"> <table width="79%" border="0" align="center" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr> 
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="178" height="100">&nbsp;</td>
    <td width="402" valign="top" background="empbgg.jpeg"><div align="center">
      <p><img src="includes/banner.jpg" width="609" height="80"></p>
      <p align="center"><span class="style6">Username</span>        
        <input name="username" type="text" id="username" value="<?php if (strip_tags($_GET['l'])){ echo "$l"; } ?>" size="15" maxlength="40">
      </p>
      <p align="center" class="style4"><span class="style6">Password</span>        
        <input name="password" type="password" id="password2" value="<?php if (strip_tags($_GET['pw'])){ echo "$pw"; } ?>" size="15" maxlength="40">
      </p>
    </div>
    </td>
    <td width="190">&nbsp;</td>
  </tr>
  <tr> 
    <td height="14"></td>
    <td valign="top" bgcolor="#000000"><div align="center">
      <p>
        <input type="submit" name="Submit" value="Login">
</p>
      <table width="215" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class="thinline">
        <tr>
          <td colspan="3" background="includes/grad.jpg"><center>
        Not a member? |Forgotten ? |Waiting?
          </center></td>
        </tr>
        <tr>
          <td width="46"><div align="center"><a href="register.php">Register</a></div></td>
          <td width="78"><div align="center"><a href="lost.php">Lost password</a></div></td>
          <td width="71"><a href="act.php">Resend activation</a> </td>
        </tr>
      </table>
      <p>
        <?
				$timenow=time();
$select = mysql_query("SELECT * FROM users WHERE online > '$timenow' ORDER by id");
$num = mysql_num_rows($select);
 ?>
</p>
      <table width="136" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class="thinline">
        <tr>
          <td background="includes/grad.jpg"><center>
        Gangsters Online
          </center></td>
        </tr>
        <tr>
          <td><div align="center"><font color="#0000FF"><?php echo "$num"; ?></font> </div></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;          </p>
      <p class="style1">
      <p align="center">&nbsp;</p>
      </p>
      </div></td>
    <td></td>
  </tr>
</form>
  <tr>
    <td height="87"></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
</table>
</body>
</html>








