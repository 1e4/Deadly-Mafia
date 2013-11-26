<?php 
session_start();
include_once"includes/db_connect.php";
include_once"includes/functions.php";
logincheck();
$username=$_SESSION['username'];
srand((double)microtime()*1000000); 
$string = md5(rand(0,9999)); 
$verify_string = substr($string, 3, 4);

$code = $verify_string;
mysql_query("UPDATE users SET ver_code='$code' WHERE username='$username'");
$n1=rand(5,15);
$n2=rand(5,15);
$n3=rand(5,15);
//random_number.php 
$img_number = imagecreate(100,50); 
$white = imagecolorallocate($img_number,255,255,255); 
$black = imagecolorallocate($img_number,0,0,0); 
$grey_shade = imagecolorallocate($img_number,204,204,204); 

imagefill($img_number,0,0,$grey_shade); 

ImageRectangle($img_number,0,0,99,49,$black); 


for($x = 0; $x < 100; $x += 20)
    {
        ImageLine($img_number, $x, 50, $x + 15, 0, $white);
    }
for($z = 0; $z < 50; $z += 10)
    {
        ImageLine($img_number, $z, 100, $z + 15, 0, $white);
    }

ImageString($img_number, 50, 50, 15, "$code", $black);

header("Content-type: image/jpeg"); 
imagejpeg($img_number); 
imagedestroy($img_number);


?> 
