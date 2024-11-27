<?php
$num1 = isset($_GET['num1']) ? intval($_GET['num1']) : 1;
$num2 = isset($_GET['num2']) ? intval($_GET['num2']) : 1;
$num3 = isset($_GET['num3']) ? intval($_GET['num3']) : 1;

$image = imagecreatetruecolor(500, 200);

$blue = imagecolorallocate($image, 25, 25, 255);
$green = imagecolorallocate($image, 50, 50, 200);
$red = imagecolorallocate($image, 75, 75, 150);
$background_color = imagecolorallocate($image, 255, 255, 255);

imagefill($image, 0, 0, $background_color);

imagefilledrectangle($image, 10, 30, 10 + $num1 * 100, 80, $blue);
imagefilledrectangle($image, 10, 90, 10 + $num2 * 100, 140, $green);
imagefilledrectangle($image, 10, 150, 10 + $num3 * 100, 200, $red);

header('Content-Type: image/png');
imagepng($image);

imagedestroy($image);