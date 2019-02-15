<?php
include 'getGreenPixelCount.php';
include 'getImgProperties.php';
include 'getFileList.php';

## Конфигурационные парамтеры
$data_dir = 'input_data';
//$image_path = "/home/avega/Work/popov-web-test/input_data/01.jpg";
$x = 10;
$y = 20;
$green_pixel_count = 0;

$file_list = getFileList($data_dir);
foreach ($file_list as &$value) {
    $file_type = mime_content_type(realpath($value));
    if ($file_type === 'image/jpeg' || $file_type === 'image/png') {
        echo $value."\n";

        echo getImgProperties($value);
        echo "\n";


        echo getGreenPixelCount($value, $file_type, $x, $y);
        echo "\n";

    }

}

//echo getAllPixelCount($image_path)."\n";
//echo getGreenPixelCount($image_path, $x, $y)."\n";
//print_r(getFileList($data_dir));