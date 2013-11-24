<?php
session_start();
include_once"includes/db_connect.php";
if (strip_tags($_GET['logout']) == "yes"){
session_destroy();
}elseif (isset($_SESSION['username'])){
header("Location: powder.php");
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



        header("Location: powder.php"); 
   
} else { 
    $message= "You could not be logged in.<br />"; 
   
}}}
?> 
<html>
<head>
<title>The Mafia V2.2  ::Beta::</title>
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
.style17 {color: #0099FF}
.style18 {color: #00FF00}
.style19 {color: #FF0000; }
-->
</style>
</head>

<body><? $timenow=time();
$select =mysql_query("SELECT * FROM users WHERE online > '$timenow' ORDER by id");
$num = mysql_num_rows($select); ?>
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
  <table width="500" height="578" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="578" background="includes/loginimage.jpg"><p>&nbsp;</p>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p><strong> </strong></p>
      <div align="center"><strong>We Are Open </strong>      </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p align="center">&nbsp;</p>
      <p align="center"><span class="style14"><span class="style16"><a href="register.php" class="style14">Register</a></span></span></p>
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
        <div align="center"><!--Begin GameSites200 Vote-->
          <p>
            <input name="Submit" type="submit" id="Submit" value="Enter!">
            <br>
  <a href="http://www.gamesites200.com/mpog/"><img src="http://www.gamesites200.com/track.gif" alt="MMORPG / MPOG Top 200 - Free and Paid Online Games" border="0"></a></p>
          <!--End Game Sites 200 Code-->

<p>
<!-- Begin Gtop100 voting code -->
<!-- End Gtop100 voting code -->
<p>
<!-- Begin TopGameSites voting code -->
<noscript><a href="http://www.topgamesites.net"></a>
</noscript>
<!-- End TopGameSites voting code -->
        </div>
      </form>    </td>
  </tr>
</table>
<p align="center">The Mafia Is being RESET. </p>
<p align="center" class="style18">YOU CAN NOW PRE-REGISTER READ DETAILS TO DO SO </p>
<p align="center">To pre register, simply click on register and sign up. This will reserve your username and entitle you to double starting cash when the game begins</p>
<p align="center">You can also refer people after you have pre-registerd. For every person you refer you will get 100Bullets. All will be checked, so dont try to dupe, to refer</p>
<p align="center">use the link below.   </p>
<p align="center" class="style17">http://www.fluidsolutions.info/mafia/register.php?ref=<span class="style18">YOURUSERNAME</span></p>
<p align="center" class="style17">~Fluid~</p>
<p align="center" class="style17">Oh - and click on the links below, its the best thing you can do to the game bar donating :) </p>
<p align="center" class="style19">&nbsp;</p>
  <p align="right"><span style="width: 88px; height: 55;"><a href="http://www.gtop100.com/in.php?site=5397" title="MMORPG / MPOG" target="_blank"><img src="http://www.gtop100.com/images/nvotebutton.jpg" border="0" alt="Top 100 MMORPG / MPOG sites" style="float: left; clear: all;" /></a></span>  <a href="http://www.gamesites200.com/mpog/in.php?id=627"><img src="http://www.gamesites200.com/mpog/vote.gif" alt="Vote on the MMORPG / MPOG Top 200" border="0"></a>
      <a href="http://www.topgamesites.net" title="Free MMORPG / MPOG Games" target="_blank"><img src="http://www.topgamesites.net/images/22.jpg" border="0" alt="Top 100 MMORPG / MPOG sites" /></a>  </p>
</body>
</html>








