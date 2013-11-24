<?php
Header("Content-type: image/png");

$lat = "30.323136";
$long = "-97.373748";

function getlocationcoords($lat, $lon, $width, $height)
{
    $x = (($lon + 180) * ($width / 360));
    $y = ((($lat * -1) + 90) * ($height / 180));
    return array("x"=>round($x),"y"=>round($y));
}

// Create a blank image.
$im = imagecreate(2048,1024);

// Allocate the colors we need.
$black = imagecolorallocate ($im, 0,0,0);
$red = imagecolorallocate ($im, 255,0,0);

// Fill the entire image with black pixels.
imagefill($im,0,0,$black);

// Convert our coordinated into pixel notation.
$pt = getlocationcoords($lat, $long, 2048, 1024);

// Flip a single red pixel.
imagesetpixel($im,$pt["x"],$pt["y"],$red);

// Take all the remaining black pixels and make them transparent.
ImageColorTransparent($im,$black);

// Create the image.
imagepng($im,'',100);

// Destroy the image and clear up the memory.
imagedestroy($im);
?>