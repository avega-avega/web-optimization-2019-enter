<?php
require_once 'getGreenPixelCount.php';
require_once 'getImgProperties.php';
require_once 'getFileList.php';

$data_dir = 'input_data';

$start = microtime(true);
$file_list = getFileList($data_dir);

foreach ($file_list as $value) {

    $file_type = mime_content_type(realpath($value));
    echo basename($value);

    if ($file_type === 'image/jpeg' || $file_type === 'image/png') {
        $green_pixel_count = 0;


        $img_properties = getImgProperties($value);

        getGreenPixelCount( $value,
                            $file_type,
                            $img_properties['width'],
                            $img_properties['height']
                            );

        $green_pixel_ratio = ($green_pixel_count / $img_properties['pixels']);

        if ($green_pixel_ratio > $img_properties['side_ratio']){
            echo " Да\n";
        } else {
            echo " Нет\n";
        }

        $green_pixel_count = 0;
    } else {
        echo " - это не картинка\n";
    }

}

echo 'Время выполнения: '.round(microtime(true) - $start, 4).' сек.'."\n";
