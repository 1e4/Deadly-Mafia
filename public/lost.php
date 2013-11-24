<link href="includes/in.css" rel="stylesheet" type="text/css">
<?php //module for password retrieval
 include_once 'includes/db_connect.php';
 if(isset($_POST['submit']) && $_POST['email'] && $_POST['user']) {
   
 $email=strip_tags($_POST['email']);
$user=strip_tags($_POST['user']);
$new_pass=round(rand(1000,9999999) - rand(1,100) / 3 +2 -100);
$check=mysql_query("SELECT * FROM users WHERE email='$email' AND username='$user'");
$num =mysql_num_rows($check);
$fetch=mysql_fetch_object($check);


if ($num == "0"){
echo "No such email.";
}else{

mysql_query("UPDATE users SET password='$new_pass' WHERE email='$email' AND username='$user'");

   
    // Let's mail the user! 
    $subject = "New password at Gangster Bliss!"; 
    $message = "Dear $fetch->username, 
    Hello $reg_username , Your password is $new_pass
  
     
    Good Luck! 
    Charlie ~ Gangster Bliss Admin
     
    This is an automated response, please do not reply!"; 
     
    mail($email, $subject, $message, 
        "From: Charlie<s-N-1-p-3-r-Z@hotmail.co.uk>"); 
    echo 'A email has been sent with your password.'; 




}}
?>

 <style type="text/css">
<!--
body,td,th {
	color: #FFFFFF;
}
.style1 {color: #000000}
.style2 {color: #FFFFFF}
-->
 </style><br><center><form action='' method='post'><font color='#FFFFFF' face='Arial, Helvetica, sans-serif' size=2>
   
<table class=thinline width=50% cellspacing=0 cellpadding=2 class=thinline bordercolor=black><tr><td background=includes/grad.jpg bgcolor="#666666"><center class=bold>Lost Password</center></td></tr>
<tr><td bgcolor=black height=1></td></tr>
<tr>
  <td bgcolor="#666666"><center>

Please enter the email address you registered with and your username <br>
</font>
   <br>E-mail:</font> <span class="style1">
   <input type='text' name='email' size='20'>
   <br>
   <span class="style2">Username:   </span>
   <input type='text' name='user' size='20'>
   </span><br>
   <input type='submit' name='submit' value='submit'></form>
   <center></center>
   </td></tr></table><br>









