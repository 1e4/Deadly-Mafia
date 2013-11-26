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
$reg_password = $_POST['reg_password']; 


$email = $_POST['email'];
$email1 = $_POST['email1']; 
$location=strip_tags($_POST['location']); 
$reg_username=trim($reg_username);
$gender=trim($gender);
$reg_password=trim($reg_password);




$today = gmdate('Y-m-d h:i:s');


$reg_username = stripslashes($reg_username); 
$email = stripslashes($email); 
$quote = stripslashes($quote); 
$reg_username = strip_tags($reg_username); 
$gender = strip_tags($gender); 
$email = strip_tags($email); 




if((!$reg_username) || (!$email) || (!$location)){ 
$message="Fill in all fields";
}else{
if ($email != $email1){
$message="Emails do not match";
}elseif ($email == $email1){



if (ereg('[^A-Za-z0-9_]', $reg_username)) {  $message="Usernames can only contain letters and numbers. NO SPACES!";
}elseif (!ereg('[^A-Za-z0-9_]', $reg_username)) { 


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
        $message= "This email address has already been used by another gangster!"; 
        unset($email); 
    } 
    if($username_check > 0){ 
        $message="Your desired username is already in use!"; 
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
////japan////
$city="Cambridgeshire";
}elseif ($location == 'Spain'){
$Spain[0] = rand(149,259);
$Spain[1] = rand(113,582);
$Spain[2] = rand(12,74);
$Spain[3] = rand(82,150);
$Spain[4] = rand(1700,2832);
///colombia///
$city="Chiba";
$implodething = implode("-", $Spain);
}elseif ($location == 'Italy'){
$Italy[0] = rand(31,301);
$Italy[1] = rand(80,397);
$Italy[2] = rand(23,118);
$Italy[3] = rand(90,123);
$Italy[4] = rand(316,812);
///usa////
$city="Bogota";
$implodething = implode("-", $Italy);
}elseif ($location == 'France'){
$France[0] = rand(51,104);
$France[1] = rand(90,412);
$France[2] = rand(60,192);
$France[3] = rand(98,116);
$France[4] = rand(472,1003);
$city="Bogota";
///safrica////
$implodething = implode("-", $France);
$city="New York";
}elseif ($location == 'Sweden'){
$Sweden[0] = rand(78,112);
$Sweden[1] = rand(170,194);
$Sweden[2] = rand(118,132);
$Sweden[3] = rand(110,506);
$Sweden[4] = rand(1500,1703);

//mexico//

$implodething = implode("-", $Sweden);
$city="Alberton";
}elseif ($location == 'Portugal'){
$Portugal[0] = rand(70,159);
$Portugal[1] = rand(33,68);
$Portugal[2] = rand(110,191);
$Portugal[3] = rand(12,19);
$Portugal[4] = rand(1001,1308);
$implodething = implode("-", $Portugal);
$city="Acapulco";

}elseif ($location == 'Italy'){
$mexico[0] = rand(70,159);
$mexico[1] = rand(33,68);
$mexico[2] = rand(110,191);
$mexico[3] = rand(12,19);
$mexico[4] = rand(1001,1308);
$implodething = implode("-", $mexico);
$city="Acapulco";

}elseif ($location == 'Cuba'){
$mexico[0] = rand(70,159);
$mexico[1] = rand(33,68);
$mexico[2] = rand(110,191);
$mexico[3] = rand(12,19);
$mexico[4] = rand(1001,1308);
$implodething = implode("-", $mexico);
$city="Acapulco";

}elseif ($location == 'Madagscar'){
$mexico[0] = rand(70,159);
$mexico[1] = rand(33,68);
$mexico[2] = rand(110,191);
$mexico[3] = rand(12,19);
$mexico[4] = rand(1001,1308);
$implodething = implode("-", $mexico);
$city="Acapulco";
}


$ip = $_SERVER['REMOTE_ADDR'];

mysql_query("INSERT INTO `user_info` ( `id` , `username`) 
VALUES (
'', '$reg_username')");


mysql_query("INSERT INTO `users` ( `biketheft` , `id` , `username` , `password` , `activated` , `rank` , `rankpoints` , `online` , `money` , `crimechance` , `btachance` , `lastcrime` , `userlevel` , `lasttop` , `status` , `regged` , `layout` , `email` , `quote` , `image` , `location` , `bullets` , `gtachance` , `lastgta` , `lasttravel` , `bank` , `banktime` , `last_race` , `street` , `music` , `crew` , `get_away_time` , `get_away` , `health` , `last_ext` , `lasttran` , `drugprices` , `drugs` , `l_ip` , `r_ip` , `crew_invite` , `referral` , `weapon` , `mission` , `points` , `lpv` , `page` , `editor` , `helper` , `food_chance` , `last_food` , `last_order` , `freinds` , `protection` , `plane` , `married` , `oc` , `last_oc` , `atm` , `last_bank` , `last_attempted` , `last_kill` , `ver_code` , `last_script_check` , `global` , `poll` , `clicks` , `click_rate` , `tut` , `drugs_from` , `total_drugs_mission` , `city` , `notes` , `last_chase` , `choice` , `bar` , `backfire` , `exp` , `level` , `last_train` , `jewl` , `jail_able` , `jail_until` , `lang` , `mem_gym` , `dealing` , `gtas` , `crimes` , `hackchance` , `hacks` , `lasthack` , `forummod` , `forum_ban` , `crewacc` , `crewrecruit` , `casinos` , `profilebg` , `Gender` , `lastbta` , `running` , `ghostmode` , `avatar` , `referpoints` , `marry` , `crewappl` , `userlvl` , `forumpic` , `octime` , `ocleader` , `ocpost` , `ocid` , `ocstatus` , `bj` )
VALUES (
'0-0-0-0-0', '', '$reg_username', '$reg_password', '1', 'Scruff', '0', '', '10000', '0-0-0-0-0-0-0', '0-0-0', '', '0', '', 'Alive', 'NOW( )', '17', '$email', '', 'Images/default.jpg', '$location', '0', '0-0-0-0-0', '', '', '0', '', '', '0', '', '0', '', '0', '100', '', '', '100-100-100-100-100', '0-0-0-0-0', '', '$ip', '0', '0', 'None', '1', '0', '', '', '0', '0', '0-0-0', '', '', 'None', 'None', 'None', '0', '0', '', 'False', '', '', '', '456', '', '0', '', '0', '', '0', '', '0', '', '', '', '0', '1', '0', '0', '0', '', '', '0', '', 'English', '0', '0', '0', '0', '0-0-0-0-0', '0', '0', '0', '0', '1', '0', '0', '0', 'Unknown', '', '0', '0', 'images/default.gif', '0', '', '', '1', 'http://www.amafialife.com/mafia/images/noav.jpg', NOW( ) , 'No', '', '0', '', '0'
)");

     $userid = mysql_insert_id();
    
   $message= 'Account created, <a href="index.php">You may now log in.</a> '; 
} }}}}}

?>


<html>
<head>
<title>Mafia Life</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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
<!-- ImageReady Slices (a try.psd) --><br><br><BR>
<font size=5 color=white><b><center>Anyone that Registers at School will be Modkilled <br>as you will have the same IP as other people that register at your school
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
            <td background="includes/grad.jpg"><div align="center">Register With The Ip <?php echo $ip ?></div></td>
          </tr>
          <tr bgcolor=black> 
            <td height=1 colspan=3></td>
          </tr>
          <tr> 
            <td align="center" valign="top"><table width="100%"  border="0" cellspacing="1" cellpadding="1">
                <tr> 
                  <td colspan="2"><div align="center"><font color=red> 
                      <? echo "$message"; ?><br><BR>
                      </font></div></td>
                </tr>
                <tr> 
                  <td width="25%">Username:</td>
                  <td width="75%"><input name="reg_username" type="text" id="reg_username" value="" size="30" maxlength="17"></td>
                </tr>
                <tr> 
                  <td width="25%">Password:</td>
                  <td width="75%"><input name="reg_password" type="password" id="reg_password value="" size="30" maxlength="40"></td>
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
                  <td height="20">Gender:</td>
                  <td>Pick your gender on "Edit Profile" when you login!</option>
                      
                  </td>
                </tr>
                <tr> 
                  <td height="20">Starting location:</td>
                  <td><select name="location" id="starting" >
                      <option value="England">England</option>
                      <option value="Japan">Japan</option>
                      <option value="Colombia">colombia </option>
                      <option value="Mexico">mexico</option>
                      <option value="South Africa">south africa</option>
                      <option value="Usa">usa</option>

                  </td>
                </tr>

                <tr> 
                  <td>&nbsp;</td>
                  <td><input type="submit" name="Submit" value="Register"></td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
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
        <div align="center"><a href="index.php">Login</a> |</div>
      </form></td>
    <td></td>
  </tr>
  <tr> 
    <td height="487"></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
</table>

</body>
</html>
