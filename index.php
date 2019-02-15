<?php
require_once 'getGreenPixelCount.php';
require_once 'getImgProperties.php';
require_once 'getFileList.php';

$data_dir = 'input_data';

$start = microtime(true);
$file_list = getFileList($data_dir);

foreach ($file_list as &$value) {

    $file_type = mime_content_type(realpath($value));

    if ($file_type === 'image/jpeg' || $file_type === 'image/png') {
//        echo $value . "\n";

//        print_r(getImgProperties($value));

        $img_properties = getImgProperties($value);
//        echo "\n";

        $green_pixel_count = 0;
        for ($x = 0; $x < $img_properties['width']; $x++) {
            for ($y = 0; $y < $img_properties['height']; $y++) {
                getGreenPixelCount($value, $file_type, $x, $y);
//                echo '.';
            }
        }
//        echo $green_pixel_count."\n";

        $green_pixel_ratio = ($green_pixel_count / $img_properties['pixels']);
//        echo "Соотношение зелёных пикселей: $green_pixel_ratio \n";
//        echo "Cоотношение сторон: ";
//        echo $img_properties['side_ratio'];
//        echo "\n";


        $green_pixel_count = 0;
//        echo "\n";

        if ($green_pixel_ratio > $img_properties['side_ratio']){
            echo "$value Да\n";
        } else {
            echo "$value Нет\n";
        }

    }

}
echo 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.'."\n";