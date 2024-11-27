<?php
$imagePath = isset($_GET['image']) ? $_GET['image'] : null;
$effect = isset($_GET['effect']) ? $_GET['effect'] : null;

if ($imagePath && $effect) {
    $image = imagecreatefromjpeg($imagePath);

    switch ($effect) {
        case 'invert':
            imagefilter($image, IMG_FILTER_NEGATE);
            break;
        case 'grayscale':
            imagefilter($image, IMG_FILTER_GRAYSCALE);
            break;
        case 'highlight':
            imagefilter($image, IMG_FILTER_BRIGHTNESS, 50);
            break;
        case 'emboss':
            imagefilter($image, IMG_FILTER_EMBOSS);
            break;
        case 'pixelize':
            imagefilter($image, IMG_FILTER_PIXELATE, 10);
            break;
    }

    header('Content-Type: image/jpeg');
    imagejpeg($image);
    imagedestroy($image);
}
?>
