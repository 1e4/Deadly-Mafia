<?
include 'includes/db_connect.php';

$send=mysql_query("SELECT email FROM users ORDER by id DESC");
$tot=0;
while($object = mysql_fetch_object($send)){ 
    $subject = "The Mafia is online TONITE!"; 
    $message = " The-Mafia.us has been reset and is ready for a new round!

Playing will commence TONITE AT 7.30PM GMT!!

See you there! 

~Fluid "; 

mail($object->email, $subject, $message, "vheissu<vheissu@hotmail.co.uk>"); 
$tot=$tot+1;
print"$tot sent";
flush();
}

?>