<?php

## 1. Функция обработки изображения
## 2. Функция нахождения наибольшего цвета
#$image_path = "input_data/02.jpg";
#$image_path = "input_data/0.png";
//$image_path = "1.txt";
$image_path = "/home/avega/Work/popov-web-test/input_data/01.jpg";

$green_pixel_count = 0;

function getGreenPixelCount (string $image_path, int $x, int $y): int
{
    global $green_pixel_count;

    $image = @imagecreatefromjpeg($image_path);
    $rgb = imagecolorat($image, $x , $y);
    $colors = imagecolorsforindex ($image, $rgb);

    if ($colors["green"] > $colors["red"] && $colors["green"] > $colors["blue"]) {
        $green_pixel_count++;
    }
    imagedestroy($image);
    return $green_pixel_count;
}

//if mime_content_type($image_path);
getGreenPixelCount($image_path, 0, 0);
echo "\n";





echo realpath($image_path)."\n";
//print_r($img_p);
//echo "$img_p[0]\n";
//echo "$img_p[1]\n";
//
//if ($img_p[0] > $img_p[1]) {
//    echo ($img_p[1] / $img_p[0])."\n";
//} elseif ($img_p[0] === $img_p[1]){
//    echo "1\n";
//} else {
//    echo ($img_p[0] / $img_p[1])."\n";
//}