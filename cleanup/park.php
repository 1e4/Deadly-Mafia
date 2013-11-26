<?php
session_start();
include_once "includes/db_connect.php";
include_once "includes/functions.php";

$a=mysql_query("SELECT * FROM users WHERE activated='0'");
while($b=mysql_fetch_object($a)){


 $subject = "Mafiawarz!"; 
    $message = "Dear $b->username, 
    Hello $reg_username , we now have your account in the mafiawarz database. 
    To access your account you need to click the link below.
  
    To activate your Account, 
    please click here: http://www.mafiawarz.com/activate.php?id=$b->id&code=$b->password&r=$from_user
     
    Once you activate your memebership, you will be able to login 
    with the following information: 
    Username: $b->username 
    Password: $b->password
     
    Thanks! 
    Mafiawarz staff.
     
    This is an automated response, please do not reply!"; 
     
    mail($email, $subject, $message, 
        "From: Mafiawarz<mafiawarz@mafiawarz.com>"); 

}



?>