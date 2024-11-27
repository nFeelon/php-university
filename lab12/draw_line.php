<?php
$length = isset($_GET['length']) ? intval($_GET['length']) : 100;
$style = isset($_GET['style']) ? $_GET['style'] : 'solid';
$color_hex = isset($_GET['color']) ? $_GET['color'] : '#000000';
$thickness = isset($_GET['thickness']) ? intval($_GET['thickness']) : 5;

list($red, $green, $blue) = sscanf($color_hex, "#%02x%02x%02x");

$width = max($length + 20, 200);
$height = max($thickness + 20, 100);

$image = imagecreatetruecolor($width, $height);
$background_color = imagecolorallocate($image, 255, 255, 255);
$line_color = imagecolorallocate($image, $red, $green, $blue);

imagefill($image, 0, 0, $background_color);

imagesetthickness($image, $thickness);

switch ($style) {
    case 'solid':
        imageline($image, 10, $height / 2, 10 + $length, $height / 2, $line_color);
        break;

    case 'dashed':
        $dash_length = 10;
        $gap_length = 5;
        $x = 10;
        while ($x < 10 + $length) {
            $end_x = min($x + $dash_length, 10 + $length);
            imageline($image, $x, $height / 2, $end_x, $height / 2, $line_color);
            $x += $dash_length + $gap_length;
        }
        break;

    case 'dotted':
        for ($x = 10; $x < 10 + $length; $x += $thickness * 2) {
            imagefilledellipse($image, $x, $height / 2, $thickness, $thickness, $line_color);
        }
        break;

    case 'double':
        imageline($image, 10, $height / 2 - $thickness, 10 + $length, $height / 2 - $thickness, $line_color);
        imageline($image, 10, $height / 2 + $thickness, 10 + $length, $height / 2 + $thickness, $line_color);
        break;
}

header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
