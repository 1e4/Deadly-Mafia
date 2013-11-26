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
$username = $_POST['username']; 
$password = $_POST['password'];
$username = strip_tags($username);
$password = strip_tags($password);
$ip = $REMOTE_ADDR;




///check INFO
$sql = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password' AND activated='1' LIMIT 1"); 
$login_check = mysql_num_rows($sql); 
$inf = mysql_fetch_object($sql); 

if ($login_check > "0"){
if ($inf->status == "Dead"){
include_once"dead.php";
exit();

}
       
        session_register('username'); 
        $_SESSION['username'] = $inf->username; 
       

       
       
         $timestamp = time()+60; 
mysql_query("UPDATE users SET online='$timestamp' WHERE username='$username'");
        
mysql_query("UPDATE users SET l_ip='$domain' WHERE username='$username'");



        header("Location: logged_in.php"); 
   
} else { 
    $message= "You could not be logged in.<br />"; 
   
}}
?> 
<html>
<head>
<title>a try</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #FFFFFF;
}


body  { 
	color: white;
	font-family: arial;
	background-color: #333333;
	scrollbar-face-color: #333333; 
	scrollbar-shadow-color: #ffffff; 
	scrollbar-highlight-color: #333333; 
	scrollbar-3dlight-color: #ffffff; 
	scrollbar-darkshadow-color: #333333; 
	scrollbar-track-color: #333333; 
	scrollbar-arrow-color: #ffffff; 


font-size: 12px; }

td.header  {  
  font-size: 15px;  
  font-family: Verdana, Arial, Helvetica, sans-serif;
  color: #FFFFFF;
  background-image: url(includes/grad.jpg);

 }
td.tip  {  
  font-size: 12px;  
font-family: arial;
  color: #000000;

 }

   
a{text-decoration:none; color:white; font-size: 12px;}
a:link{text-decoration:none; color:white; font-size: 12px;}
a:visited{text-decoration:none; color:white; font-size: 12px;}
a:hover{text-decoration:underline; color:white; font-size: 12px;}
a:active{text-decoration:none color:white; font-size: 12px;}

INPUT{
	
	font-size: 11px;
	color: #black;
	background-color: #A74141;
	border-style: solid;
	border-color: #ffffff;
	border-width: 1px;
	
}
table.thinline {
   border-collapse:collapse;
   border:1px solid #000000;
   align:center;
   margin-left:auto;
   margin-right:auto;
   background-color: #666666;
   font-size: 12px;
}

-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (a try.psd) -->
<table id="Table_01" width="978" height="600" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr> 
    <td width="590" rowspan="2"> <img src="images/images/a-try_01.gif" width="590" height="98" alt=""></td>
    <td width="387" height="23" valign="top"> <br> </td>
    <td width="1"></td>
  </tr>
  <tr> 
    <td valign="top"><img src="images/images/a-try_02.gif" width="210" height="23" alt=""></td>
    <td height="75"></td>
  </tr>
  <tr> 
    <td rowspan="6"><div align="center"><a href="register.php"><img src="images/login1.jpg" alt="" width="500" height="400" border="0"></a></div></td>
    <td valign="top"><form name="form2" method="post" action="">
        <table width="400" border="1" cellpadding="0" cellspacing="0" class=thinline rules=none>
          <tr> 
            <td height="20" class=header><div align="center">Login</div></td>
          </tr>
          <tr bgcolor=black>
            <td height=1 colspan=3></td>
          </tr>
          <tr> 
            <td align="center" valign="top"><table width="100%"  border="0" cellspacing="1" cellpadding="1">
                <tr> 
                  <td colspan="2"><div align="center"><font color=red>
                      <? echo "$message"; ?>
                      </font></div></td>
                </tr>
                <tr> 
                  <td width="25%">Username:</td>
                  <td width="75%"><input name="username" type="text" id="username" value="" size="30" maxlength="40"></td>
                </tr>
                <tr> 
                  <td>Password:</td>
                  <td><input name="password" type="password" id="password2" size="30" maxlength="40"></td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                  <td><input type="submit" name="Submit" value="Login"></td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
          </tr>
        </table>
      </form></td>
    <td height="99" rowspan="2"></td>
  </tr>
  <tr>
    <td valign="top"><form name="form1" method="post" action="">
      </form></td>
  </tr>
  <tr> 
    <td rowspan="2" valign="top"> <img src="images/images/a-try_05.gif" width="210" height="24" alt=""></td>
    <td height="2"></td>
  </tr>
  <tr> 
    <td height="22"></td>
  </tr>
  <tr> 
    <td rowspan="3" valign="top" style="padding-left:2px "><p align="center"><span class="style1"><br>
        You wake up with a trunciating headache, as your eyes faintly open you 
        see people, 2 of them all looking at you. Dressed in white, you dont know 
        were you are, whats happened. All you know is that somethings gone wrong 
        and that you shouldnt be here.<br>
        Its obvious someone has done this, somone has put you were you are, but 
        they obviously didnt compleate their job.<br>
        You need to make it right, enter the world of wars and crews to get your 
        revenge and power back.<br>
        THIS IS MAFIAWARZ<br>
        <br>
        <a href="reister.php">Register </a>| <a href="index.php">Login</a> | <a href="lost.php">Lost 
        password</a> | <a href="faq.php">Faq</a></span></p></td>
    <td height="150"></td>
  </tr>
  <tr> 
    <td height="165"></td>
  </tr>
  <tr> 
    <td height="84" valign="top"><div align="center" class="style1"></div></td>
    <td></td>
  </tr>
  <tr> 
    <td height="64" colspan="2"><!--DWLayoutEmptyCell-->&nbsp; </td>
    <td></td>
  </tr>
  <tr> 
    <td height="0"></td>
    <td></td>
    <td></td>
  </tr>
</table>
<!-- End ImageReady Slices -->
</body>
</html>