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
include_once"banned.php"; 
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
<title>Admin Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="includes/in.css" rel="stylesheet" type="text/css">
</head>

<body>
<form action="" method="post">
<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr> 
    <td height="114" colspan="3" valign="top"> <table width="79%" border="0" align="center" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr> 
          <td width="770" height="78" valign="top" background="includes/Mafia.jpg"><!--DWLayoutEmptyCell-->&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="178" height="100">&nbsp;</td>
    <td width="402" valign="top"><table width="76%" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor="#999999" class=thinline>
        <!--DWLayoutTable-->
        <tr>
          <td colspan="2" background="includes/grad.jpg"><div align="center"><span class="bold">Login 
          to Mafia Legends </span></div></td>
        </tr>
        <tr>
          <td colspan="2" background="includes/grad.jpg"><div align="center"><?php echo "<font color=orange><b><center>$message</center><b></font>"; ?></div></td>
        </tr>
        <tr> 
          <td colspan="2" background="login1.jpg"><center class=bold>
            <div align="center">
              <p>User                </p>
              <p>
                <input name="username" type="text" id="username" value="<?php if (strip_tags($_GET['l'])){ echo "$l"; } ?>" size="15" maxlength="40">
              </p>
              <p>Pass</p>
              <p>
                <input name="password" type="password" id="password2" value="<?php if (strip_tags($_GET['pw'])){ echo "$pw"; } ?>" size="15" maxlength="40">
                  </p>
              <p>
                <input type="submit" name="Submit" value="Login">
              </p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <div align="center"><a href="register.php">Register</a> | <a href="lost.php">Lost password</a> | <a href="index.php">Login</a></div>
              <p>&nbsp;</p>
              <p>&nbsp;  </p>
            </div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
          </center></td>
        </tr>
<? if ($_POST){ ?> <tr><td width="198" colspan=2><div align="center">
  <div align="center"></div></td></tr> <? } ?>
        
      </table></td>
    <td width="190">&nbsp;</td>
  </tr>
  <tr> 
    <td height="14"></td>
    <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td></td>
  </tr></form>
  <tr>
    <td height="87"></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
</table>
</body>
</html>