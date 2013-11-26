<?php

session_start();

include_once"includes/db_connect.php";

if (isset($_SESSION['username'])){

header("Location: powder.php");

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

$reg_password=trim($reg_password);



$today = gmdate('Y-m-d H:i:s');





$reg_username = stripslashes($reg_username); 

$reg_password = stripslashes($reg_password); 

$email = stripslashes($email); 

$quote = stripslashes($quote); 

$reg_username = strip_tags($reg_username); 

$reg_password = strip_tags($reg_password); 

$email = strip_tags($email); 









if((!$reg_username) || (!$reg_password) || (!$email) || (!$location)){ 

$message="Fill in all fields";

}else{

if ($email != $email1){

$message="Emails do not match";

}elseif ($email == $email1){



if (ereg('[^A-Za-z^0-9]', $reg_username)) {  $message="Error.";

}elseif (!ereg('[^A-Za-z^0-9]', $reg_username)) { 





if (strlen($reg_username) <= 2 || strlen($reg_username) >= 40){

$message= "Username too big or small.";

}elseif (strlen($reg_username) > 2 || strlen($reg_username) < 40){





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





if ($location == 'London'){

$uk[0] = rand(51,104);

$uk[1] = rand(90,412);

$uk[2] = rand(68,296);

$uk[3] = rand(23,47);

$uk[4] = rand(2705,3312);

$implodething = implode("-", $uk);

////china////

$city="Cambridgeshire";

}elseif ($location == 'New York'){

$china[0] = rand(149,259);

$china[1] = rand(113,582);

$china[2] = rand(12,74);

$china[3] = rand(82,150);

$china[4] = rand(1700,2832);

///russia///

$city="Chiba";

$implodething = implode("-", $china);

}elseif ($location == 'Beijing'){

$russia[0] = rand(31,301);

$russia[1] = rand(80,397);

$russia[2] = rand(23,118);

$russia[3] = rand(90,123);

$russia[4] = rand(316,812);

///usa////

$city="Bogota";

$implodething = implode("-", $russia);

}elseif ($location == 'Rome'){

$usa[0] = rand(51,104);

$usa[1] = rand(90,412);

$usa[2] = rand(60,192);

$usa[3] = rand(98,116);

$usa[4] = rand(472,1003);

$city="Bogota";

///sarabia////

$implodething = implode("-", $usa);

$city="New York";

}elseif ($location == 'Moscow'){

$sarabia[0] = rand(78,112);

$sarabia[1] = rand(170,194);

$sarabia[2] = rand(118,132);

$sarabia[3] = rand(110,506);

$sarabia[4] = rand(1500,1703);



//panama//



$implodething = implode("-", $sarabia);

$city="Alberton";

}elseif ($location == 'Bogota'){

$panama[0] = rand(70,159);

$panama[1] = rand(33,68);

$panama[2] = rand(110,191);

$panama[3] = rand(12,19);

$panama[4] = rand(1001,1308);

$implodething = implode("-", $panama);

$city="Acapulco";

}







$ip = $_SERVER['REMOTE_ADDR'];





mysql_query("INSERT INTO `user_info` ( `id` , `username`) 

VALUES (

'', '$reg_username')");



mysql_query("INSERT INTO `users` ( `id` , `username` , `password` , `activated` , `money` , `online` , `crimechance` , `lastcrime` , `rankpoints` , `userlevel` , `lasttop` , `status` , `regged` , `rank` , `layout` , `email` , `quote` , `image` , `location` , `bullets` , `gtachance` , `lastgta` , `lasttravel` , `bank` , `banktime` , `last_race` , `music` , `crew` , `get_away_time` , `get_away` , `health` , `energy` , `last_ext` , `lasttran` , `drugprices` , `drugs` , `l_ip` , `r_ip` , `crew_invite` , `referral` , `weapon` , `mission` , `points` , `lpv` , `page` , `editor` , `food_chance` , `last_food` , `last_order` , `freinds` , `protection` , `plane` , `married` , `oc` , `last_oc` , `atm` , `last_bank` , `last_attempted` , `last_kill` , `ver_code` , `last_script_check` , `global` , `poll` , `clicks` , `click_rate` , `tut` , `drugs_from` , `total_drugs_mission` , `city` ) 

VALUES (

'', '$reg_username', '$reg_password', '1', '5000', '', '0-0-0-0-0-0-0', '', '0', '0', '', 'Alive', '$today', 'Scum', '0', '$email', 'No quote', 'images/default.jpg', '$location', '0', '0-0-0', '', '', '0', '', '', '', '0', '', '0', '100', '100', '', '', '0-0-0-0-0', '0-0-0-0-0', '127.0.0.1', '$ip', '0', '0', 'None', '1', '0', '', '', '0', '0-0-0', '', '', 'None', 'None', 'None', '', '0', '', 'False', '', '', '', '456', '', '0', '', '0', '', '0', '', '0', '$city'

)");











     $userid = mysql_insert_id();

    // Let's mail the user! 

    $subject = "Deadly Mafia"; 

    $message = "Dear $reg_username, 

    Hello $reg_username , you are now ready to play Deadly Mafia

  

    Thank You for Joining Deadly Mafia

    with the following information: 

    Username: $reg_username 

    Password: $random_password22 

     

	

    Thanks! 

    Deadly Mafia Staff 

    ~ Mr. MGS ~ Fibanachi



	

     

    "; 

     

    mail($email, $subject, $message, 

        "From: Deadly Mafia<shuheb@blueyonder.co.uk>"); 

   $message= 'Success! You can Now Login! Also an email has been sent with your details!. '; 

} }}}}}



?>





<html>

<head>

<title>Deadly Mafia :: Register</title>

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

<style type="text/css">

<!--

body {

	background-color: #454545;

}

.style1 {color: #FFFFFF}

-->

</style></head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<!-- ImageReady Slices (a try.psd) -->

<table width="532" height="600" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01">

  <!--DWLayoutTable-->

  <tr> 

    <td width="4" height="98">&nbsp;</td>

    <td width="400">&nbsp;</td>

    <td width="128">&nbsp;</td>

  </tr>

  <tr> 

    <td height="189">&nbsp;</td>

    <td valign="top"><form name="form2" method="post" action="">

        <table width="400" border="1" cellpadding="0" cellspacing="0" class=thinline rules=none>

          <tr> 

            <td background="includes/grad.jpg"><div align="center">Sign Up To 

				Murder Mafia </div></td>

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

                  <td>&nbsp;</td>

                  <td>&nbsp;</td>

                </tr>

                <tr> 

                  <td width="25%"><span class="style1">UserName :</span></td>

                  <td width="75%"><input name="reg_username" type="text" id="reg_username" value="" size="20" maxlength="40"></td>

                </tr>

<tr> 

                  <td width="25%"><span class="style1">Password :</span></td>

                  <td width="75%"><input name="reg_password" type="password" id="reg_password" value="" size="20"></td>

                </tr>

                <tr> 

                  <td><span class="style1">Email address:</span></td>

                  <td><input name="email" type="text" id="username3" value="" size="25" ></td>

                </tr>

                <tr> 

                  <td><span class="style1">Confirm email:</span></td>

                  <td><input name="email1" type="text" id="email" value="" size="25"></td>

                </tr>

                <tr> 

                  <td height="20"><span class="style1">Starting location:</span></td>

                  <td><select name="location" id="starting" >

                      <option value="London">London</option>

                      <option value="New York">New York</option>

                      <option value="Beijing">Beijing</option>

                      <option value="Rome">Rome</option>

                      <option value="Moscow">Moscow</option>

					   <option value="Bogota">Bogota</option>

                       </select> <input type=hidden name="ref" value="<?php echo "$_GET[ref]"; ?>">                  </td>

                </tr>

                <tr> 

                  <td>&nbsp;</td>

                  <td>&nbsp;</td>

                </tr>

                <tr> 

                  <td colspan="2"><span class="style1">By registering you agree to the<a href="tos.html"> terms of service</a>.</span></td>

                </tr>

              </table>

              <p>

                <textarea name="textarea" cols="50" rows="10">Welcome to Murder Mafia an online text based gangster game, by signing up you agree to the terms of service, breeching these rules will result in being modkilled or banned.



1) Registering



* The email address you supply is accurate and your own

*The email address cannot be changed on your account once you have registered with it



2) The Right to alter the game



* The Admins -  Have the right to alter,change,delete parts of the game whenever it is necessary, this could mean a loss in database statistics or downtime from the server



3) Dupes



* You cannot have one more than 1 Murder Mafia account, having more is known as duplicating or duping.

5) Spamming and Advertising

* Spamming Murder Mafia or the link of another game in our forums is not allowed and will result in a modkill and possibly banned, also advertising Murder Mafia on another game is not alowed, If you are seen advertising on other games or reported you will be warned, if you carry on it will result to modkill. 



6) Abuse to Staff and Racism



* Any foul language and or abusive behaviour as well as threatning Moderators or Admins is a bannable offence.

* Shooting at Staff Members be it Mods or Admins is a modkillable offence

* Racism, is simply unacceptable and results in an immiediate lifetime ban.



7) Exploitation



*Using Bugs and Exploits in Murder Mafia is not allowed, any users found doing this will be life time banned, if you find any report them to Admins and Mods, rewards may be given for the degree of helpfullness (Points). 



8) Passwords

* Your password should be kept secret from others and one that its not easily guessed. Murder Mafia is not responsible for any loss of game items if you didn't keep your password to yourself. You agree to kill the session of playing by clicking logout after you no longer want to play. You are responsible for you password.



9) Points



* When you buy points from the Admins - You agree not to sell them for anything but in game items. All points bought with real money will be given to your new account after a reset. I.E. your points from the previous reset are refunded. Points are given as rewards for a donation made to the game, they are not technically purchased so refunds may not be given.


10) Account Suspension and Termination



* Your account may be suspended and or terminated at any time with no reason to be given by the Mods or Admins



11) Murder Mafia staff Discretion



* The Tos (Terms of Service) may not cover every situation that Murder Mafia faces so the staff may use their disrection on a matter to decide what to do and will not need answer to the player. I.E a judgment or decision may be made to maximise social benefit within the game



By Logging In you agree to the Terms of Service.



Murder Mafia Staff  - Have Fun Playing!</textarea>

              </p>

              <p>

                <input name="Submit" type="submit" id="Submit" value="I accept">

                <input type="submit" value="I do not accept">

</p></td>

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

