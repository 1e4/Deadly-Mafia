<?
$colour=$_GET['c'];
$img_number = imagecreate(40,40); 
if ($colour == "w"){
$a = imagecolorallocate($img_number,255,255,255); 
}elseif ($colour == "b"){
$a = imagecolorallocate($img_number,0,0,0); 
}elseif ($colour == "g"){
$a = imagecolorallocate($img_number,204,204,204); 
}

imagefill($img_number,0,0,$a); 
header("Content-type: image/jpeg"); 
imagejpeg($img_number); 
imagedestroy($img_number);

?>