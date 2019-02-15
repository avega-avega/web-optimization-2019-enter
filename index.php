<?php
require_once 'getGreenPixelCount.php';
require_once 'getImgProperties.php';
require_once 'getFileList.php';

$data_dir = 'input_data';

$start = microtime(true);
$file_list = getFileList($data_dir);

foreach ($file_list as $value) {

    $file_type = mime_content_type(realpath($value));

    if ($file_type === 'image/jpeg' || $file_type === 'image/png') {

        echo basename($value);

        $img_properties = getImgProperties($value);

        $green_pixel_count = 0;
        for ($x = 0; $x < $img_properties['width']; $x++) {
            for ($y = 0; $y < $img_properties['height']; $y++) {
                getGreenPixelCount($value, $file_type, $x, $y);
            }
        }

        $green_pixel_ratio = ($green_pixel_count / $img_properties['pixels']);

        if ($green_pixel_ratio > $img_properties['side_ratio']){
            echo " Да\n";
        } else {
            echo " Нет\n";
        }

        $green_pixel_count = 0;
    }

}

echo 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.'."\n";