<?php
$radius = isset($_GET['circle_radius']) ? intval($_GET['circle_radius']) : 50;
$fill_color_hex = isset($_GET['circle_fill_color']) ? $_GET['circle_fill_color'] : '#FF0000';
$border_thickness = isset($_GET['circle_border_thickness']) ? intval($_GET['circle_border_thickness']) : 1;
$border_color_hex = isset($_GET['circle_border_color']) ? $_GET['circle_border_color'] : '#000000';

list($fill_r, $fill_g, $fill_b) = sscanf($fill_color_hex, "#%02x%02x%02x");
list($border_r, $border_g, $border_b) = sscanf($border_color_hex, "#%02x%02x%02x");

$image_size = ($radius + $border_thickness + 2) * 2;
$image = imagecreatetruecolor($image_size, $image_size);

$background_color = imagecolorallocate($image, 255, 255, 255);
$fill_color = imagecolorallocate($image, $fill_r, $fill_g, $fill_b);
$border_color = imagecolorallocate($image, $border_r, $border_g, $border_b);

imagefill($image, 0, 0, $background_color);

imagefilledellipse($image, $image_size / 2, $image_size / 2, $radius * 2 + $border_thickness * 2, $radius * 2 + $border_thickness * 2, $border_color);

imagefilledellipse($image, $image_size / 2, $image_size / 2, $radius * 2, $radius * 2, $fill_color);

header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
?>