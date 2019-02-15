<?php
/**
 * @param string $image_path
 * @param string $file_type
 * @param int $width
 * @param int $height
 * @return int
 */
function getGreenPixelCount (string $image_path,
                             string $file_type,
                             int $width,
                             int $height): int
{
    global $green_pixel_count;

    if ($file_type === 'image/jpeg') {
        $image = @imagecreatefromjpeg($image_path);
    } else {
        $image = @imagecreatefrompng($image_path);
    }

    for ($x = 0; $x < $width; $x++) {
        for ($y = 0; $y < $height; $y++) {

            $rgb = imagecolorat($image, $x , $y);
            $colors = imagecolorsforindex ($image, $rgb);

            if ($colors['green'] > $colors['red'] && $colors['green'] > $colors['blue']) {
                $green_pixel_count++;
            }
        }
    }
    imagedestroy($image);

    return $green_pixel_count;
}
