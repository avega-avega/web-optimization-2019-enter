<?php

function getGreenPixelCount (string $image_path, string $file_type, int $x, int $y): int
{
    global $green_pixel_count;

    if ($file_type === 'image/jpeg') {
        $image = @imagecreatefromjpeg($image_path);
    } else {
        $image = @imagecreatefrompng($image_path);
    }

    $rgb = imagecolorat($image, $x , $y);
    $colors = imagecolorsforindex ($image, $rgb);

    if ($colors['green'] > $colors['red'] && $colors['green'] > $colors['blue']) {
        $green_pixel_count++;
    }
    imagedestroy($image);

    return $green_pixel_count;
}