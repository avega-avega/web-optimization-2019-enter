<?php
include 'getGreenPixelCount.php';
include 'getImgProperties.php';
include 'getFileList.php';




## Конфигурационные парамтеры
$data_dir = 'input_data';
//$image_path = "/home/avega/Work/popov-web-test/input_data/01.jpg";
$x = 10;
$y = 20;


$file_list = getFileList($data_dir);
foreach ($file_list as &$value) {

    $start = microtime(true);

    $file_type = mime_content_type(realpath($value));
    if ($file_type === 'image/jpeg' || $file_type === 'image/png') {
        echo $value . "\n";

        print_r(getImgProperties($value));
        $img_properties = getImgProperties($value);
        echo "\n";

        $green_pixel_count = 0;
        for ($x = 0; $x < $img_properties['width']; $x++) {
            for ($y = 0; $y < $img_properties['height']; $y++) {
                getGreenPixelCount($value, $file_type, $x, $y);
//                echo '.';
            }
        }
        echo $green_pixel_count."\n";
        echo ($green_pixel_count / $img_properties['pixels']);
        echo "\n";
        $green_pixel_count = 0;
        echo "\n";

    }
    echo 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.'."\n";

}


//echo getAllPixelCount($image_path)."\n";
//echo getGreenPixelCount($image_path, $x, $y)."\n";
//print_r(getFileList($data_dir));