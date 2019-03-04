<?php

namespace Acme;
//require_once __DIR__.'/../vendor/autoload.php';

class Main
{
    const DATA_PATH = 'src/input_data';

    public function whoGreener():void
    {
        $A = new GreenImages();
        $file_list = $A->getFileList(self::DATA_PATH);

        foreach ($file_list as $img_path) {
            $image_properties = $A->getImageProperties($img_path);
            $green_pixel_count = $A->greenPixelCount($image_properties, $img_path);
            $green_pixel_ratio = ($green_pixel_count / $image_properties['pixels']);

            if ($green_pixel_ratio > $image_properties['side_ratio']) {
                echo basename($img_path)." Да\n";
            } else {
                echo basename($img_path)." Нет\n";
            }
        }
    }
}

$start = microtime(true);
$loader = new Main();
$loader->whoGreener();
echo microtime(true) - $start;
echo PHP_EOL;
