<?php
session_start();
include_once"includes/db_connect.php";
if (isset($_SESSION['username'])){
header("Location: logged_in.php");
exit();
}

$from_user=strip_tags($_POST['ref']);
if ($_POST['Submit']){

// Define post fields into simple variables 
$reg_username = $_POST['reg_username']; 

$email = $_POST['email'];
$email1 = $_POST['email1']; 
$location=strip_tags($_POST['location']); 
$reg_username=trim($reg_username);

$today = gmdate('Y-m-d h:i:s');


$reg_username = stripslashes($reg_username); 
$email = stripslashes($email); 
$quote = stripslashes($quote); 
$reg_username = strip_tags($reg_username); 
$email = strip_tags($email); 




if((!$reg_username) || (!$email) || (!$location)){ 
$message="Fill in all fields";
}else{
if ($email != $email1){
$message="Emails do not match";
}elseif ($email == $email1){

if (ereg('[^A-Za-z]', $reg_username)) {  $message="Your username can only contain letters.";
}elseif (!ereg('[^A-Za-z]', $reg_username)) { 


if (strlen($reg_username) <= 3 || strlen($reg_username) >= 40){
$message= "Username too big or small.";
}elseif (strlen($reg_username) > 3 || strlen($reg_username) < 40){


$sql_email_check = mysql_query("SELECT email FROM users 
            WHERE email='$email' AND status='Alive'"); 
$sql_username_check = mysql_query("SELECT username FROM users 
            WHERE username='$reg_username'"); 

$email_check = mysql_num_rows($sql_email_check); 
$username_check = mysql_num_rows($sql_username_check); 

if(($email_check > 0) || ($username_check > 0)){ 
    echo "Im sorry but there has been an error please read on..<br />"; 
    if($email_check > 0){ 
        $message= "Your email address is already in use, trying to dupe are we?!"; 
        unset($email); 
    } 
    if($username_check > 0){ 
        $message="That username is taken"; 
        unset($reg_username); 
    } 
  
   
}else{


if ($location == 'England'){
$uk[0] = rand(51,104);
$uk[1] = rand(90,412);
$uk[2] = rand(68,296);
$uk[3] = rand(23,47);
$uk[4] = rand(2705,3312);
$implodething = implode("-", $uk);
////china////
$city="Cambridgeshire";
}elseif ($location == 'China'){
$china[0] = rand(149,259);
$china[1] = rand(113,582);
$china[2] = rand(12,74);
$china[3] = rand(82,150);
$china[4] = rand(1700,2832);
///russia///
$city="Chiba";
$implodething = implode("-", $china);
}elseif ($location == 'Russia'){
$russia[0] = rand(31,301);
$russia[1] = rand(80,397);
$russia[2] = rand(23,118);
$russia[3] = rand(90,123);
$russia[4] = rand(316,812);
///usa////
$city="Bogota";
$implodething = implode("-", $russia);
}elseif ($location == 'Usa'){
$usa[0] = rand(51,104);
$usa[1] = rand(90,412);
$usa[2] = rand(60,192);
$usa[3] = rand(98,116);
$usa[4] = rand(472,1003);
$city="Bogota";
///sarabia////
$implodething = implode("-", $usa);
$city="New York";
}elseif ($location == 'Saudi Arabia'){
$sarabia[0] = rand(78,112);
$sarabia[1] = rand(170,194);
$sarabia[2] = rand(118,132);
$sarabia[3] = rand(110,506);
$sarabia[4] = rand(1500,1703);

//panama//

$implodething = implode("-", $sarabia);
$city="Alberton";
}elseif ($location == 'Panama'){
$panama[0] = rand(70,159);
$panama[1] = rand(33,68);
$panama[2] = rand(110,191);
$panama[3] = rand(12,19);
$panama[4] = rand(1001,1308);
$implodething = implode("-", $panama);
$city="Acapulco";
}



$ip = $_SERVER['REMOTE_ADDR'];

$random_password22=rand(11111,99999999);

mysql_query("INSERT INTO `user_info` ( `id` , `username`) 
VALUES (
'', '$reg_username')");

mysql_query("INSERT INTO `users` ( `id` , `username` , `password` , `activated` , `money` , `online` , `crimechance` , `lastcrime` , `rankpoints` , `userlevel` , `lasttop` , `status` , `regged` , `rank` , `layout` , `email` , `quote` , `image` , `location` , `bullets` , `gtachance` , `lastgta` , `lasttravel` , `bank` , `banktime` , `last_race` , `music` , `crew` , `get_away_time` , `get_away` , `health` , `energy` , `last_ext` , `lasttran` , `drugprices` , `drugs` , `l_ip` , `r_ip` , `crew_invite` , `referral` , `weapon` , `mission` , `points` , `lpv` , `page` , `editor` , `food_chance` , `last_food` , `last_order` , `freinds` , `protection` , `plane` , `married` , `oc` , `last_oc` , `atm` , `last_bank` , `last_attempted` , `last_kill` , `ver_code` , `last_script_check` , `global` , `poll` , `clicks` , `click_rate` , `tut` , `drugs_from` , `total_drugs_mission` , `city` ) 
VALUES (
'', '$reg_username', '$random_password22', '0', '1500', '', '0-0-0-0-0-0-0', '', '0', '0', '', 'Alive', '$today', 'Tramp', '0', '$email', 'No quote', 'images/default.jpg', '$location', '0', '0-0-0', '', '', '0', '', '', '', '0', '', '0', '100', '100', '', '', '0-0-0-0-0', '0-0-0-0-0', '127.0.0.1', '$ip', '0', '0', 'None', '1', '0', '', '', '0', '0-0-0', '', '', 'None', 'None', 'None', '', '0', '', 'False', '', '', '', '456', '', '0', '', '0', '', '0', '', '0', '$city'
)");





     $userid = mysql_insert_id();
    // Let's mail the user! 
    $subject = "Empire2010!"; 
    $message = "Dear $reg_username, 
    Hello $reg_username , you are now on the Empire2010.com Database
  
    To activate your Account, 
    please click here: http://www.empire2010.com/activate.php?id=$userid&code=$random_password22&r=$from_user
     
    Once you activate your memebership, you will be able to login 
    with the following information: 
    Username: $reg_username 
    Password: $random_password22 
     
    Thanks! 
    Empire2010 staff.
     
    This is an automated response, please do not reply!"; 
     
    mail($email, $subject, $message, 
        "From: Empire2010<empireteam@empire2010.com>"); 
   $message= 'Account created, check email. '; 
} }}}}}

?>


<html>
<head>
<title>Empire2010</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="includes/in.css" rel="stylesheet" type="text/css">
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
<table width="402" height="600" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">
  <!--DWLayoutTable-->
  <tr> 
    <td width="211" height="98">&nbsp;</td>
    <td width="401">&nbsp;</td>
    <td width="366">&nbsp;</td>
  </tr>
  <tr> 
    <td height="189">&nbsp;</td>
    <td valign="top"><form name="form2" method="post" action="">
        <table width="400" border="1" cellpadding="0" cellspacing="0" class=thinline rules=none>
          <tr> 
            <td background="includes/grad.jpg"><div align="center">Register</div></td>
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
                  <td width="75%"><input name="reg_username" type="text" id="reg_username" value="" size="30" maxlength="40"></td>
                </tr>
                <tr> 
                  <td>Email address:</td>
                  <td><input name="email" type="text" id="username3" value="" size="30" ></td>
                </tr>
                <tr> 
                  <td>Confirm email:</td>
                  <td><input name="email1" type="text" id="email" value="" size="30"></td>
                </tr>
                <tr> 
                  <td height="20">Starting location:</td>
                  <td><select name="location" id="starting" >
                      <option value="England">England</option>
                      <option value="China">China</option>
                      <option value="Russia">Russia</option>
                      <option value="Usa">Usa </option>
                      <option value="Saudi Arabia">Saudi Arabia </option>
					   <option value="Panama">Panama </option>
                       </select> <input type=hidden name="ref" value="<?php echo "$_GET[ref]"; ?>"> 
                  </td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                  <td><input type="submit" name="Submit" value="Register"></td>
                </tr>
                <tr> 
                  <td colspan="2">By registering you agree to the<a href="tos.html"> terms of service</a>.</td>
                </tr>
              </table></td>
          </tr>
        </table>
      </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td height="14"></td>
    <td valign="top"><form name="form1" method="post" action="">
        <div align="center"><a href="index.php">Login</a> | <a href="lost.php">Lost 
          password </a></div>
      </form></td>
    <td></td>
  </tr>
  <tr> 
    <td height="487"></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
</table>
<!-- End ImageReady Slices -->
</body>
</html>
