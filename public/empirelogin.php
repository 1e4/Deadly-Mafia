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
A:link,  { 
   COLOR:#999999;
   font-family:"Arial", serif;
   FONT-WEIGHT:bold;font-size:12px;
   TEXT-DECORATION:none}
body {
	background-color: #999999;
	background-image: url();
}
.style4 {font-size: 18px}
.style9 {color: #000000}
.style11 {font-weight: bold; color: #CCCCCC; font-family: Rotator;}
.style12 {color: #000099}
-->
</style>
</head>

<body>
<form action="" method="post">
<table width="770" border="0" align="center" cellpadding="0" cellspacing="0">
<!--DWLayoutTable-->
  
  <div align="left"></div>
  <table width="715" border="0" cellspacing="1" cellpadding="1">
    <tr>
      <td height="117" colspan="2"><p align="center">&nbsp;
      </p>        <p align="center"><img src="Empirenew(1).jpg" width="700" height="150"><span class="style4"> </span></p></td>
    </tr>
    <tr>
      <td height="117"><table width="136" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class="thinline">
        <tr>
          <td background="includes/grad.jpg"><center>
        Gangster Name
          </center></td>
        </tr>
        <tr>
          <td><div align="center">
              <input name="username" type="text" id="username" value="<?php if (strip_tags($_GET['l'])){ echo "$l"; } ?>" size="15" maxlength="40">
          </div></td>
        </tr>
      </table>
        <div align="right"><br>
        </div>
        <table width="136" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class="thinline">
          <tr>
            <td background="includes/grad.jpg"><center>
        Password
            </center></td>
          </tr>
          <tr>
            <td><div align="center"> <span class="style4">
                <input name="password" type="password" id="password2" value="<?php if (strip_tags($_GET['pw'])){ echo "$pw"; } ?>" size="15" maxlength="40">
            </span></div></td>
          </tr>
        </table>
        <p align="center"><span class="style4"><span class="style11">
          <input type="submit" name="Submit" value="Login">
        </span></span></p></td>
      <td><p>
        <?
				$timenow=time();
$select = mysql_query("SELECT * FROM users WHERE online > '$timenow' ORDER by id");
$num = mysql_num_rows($select);
 ?>
      </p>
        <p class="style12">&nbsp; </p>
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
        <table width="136" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class="thinline">
          <tr>
            <td><center>
              </center>
                <div align="center" class="style9"><a href="register.php">Register</a> | <a href="lost.php">Lost Pass</a> </div>
                <p align="center">&nbsp;</p></td>
          </tr>
        </table>
        <table width="136" border="1" align="center" cellpadding="2" cellspacing="0" bordercolor=black class="thinline">
          <tr>
            <td><center>
              </center>
                <div align="center" class="style9">By logging in you agree to the <a href="tos.html">terms of service </a></div></td>
          </tr>
        </table>
      <p align="center" class="style4">&nbsp;</p></td>
    </tr>
  </table>
    <tr> 
    <td height="114" colspan="3" valign="top"> <table width="79%" border="0" align="center" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr> 
        </tr>
      </table>
      <div align="center"><span class="style4"><span class="style11">
      </span>
</span></div></td>
  </tr>
  <tr> 
    <td width="178" height="100">&nbsp;</td>
    <td width="402" valign="top" background="empbgg.jpeg"><div align="center">
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p align="center" class="style4">&nbsp;</p>
    </div>
    </td>
    <td width="190">&nbsp;</td>
  </tr>
  <tr> 
    <td valign="top" bgcolor="#000000"><div align="center">
                
      </p>
      </div></td>
    <td></td>
  </tr>
</form>
  <tr>
    <td></td>
  </tr>
</table>
</body>
</html>








