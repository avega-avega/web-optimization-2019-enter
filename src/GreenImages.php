<?php
/**
 * Created by PhpStorm.
 * User: avega
 * Date: 3/4/19
 * Time: 7:57 AM
 */

namespace Acme;


class GreenImages
{
//    public $dir = '';


    function getFileList()
    {

        global $img_list;
        if ($handle = opendir("src/input_data")) {
            while (false !== ($file = readdir($handle))) {
                if ($file !== '.' && $file !== '..') {
                    $img_list[] = realpath("src/input_data"."/$file");
                    asort($img_list);
                }
            }
//            asort($img_list);
            closedir($handle);

//            print_r($img_list);

            foreach ($img_list as $value) {

                $file_type = mime_content_type(realpath($value));
//                echo basename($value);

                if ($file_type === 'image/jpeg' || $file_type === 'image/png') {
//                    $green_pixel_count = 0;

                    $properties = getimagesize($value);

                    $pixel_count  = ($properties[0] * $properties[1]);

                    if ($properties[0] > $properties[1]) {
                        $side_ratio = ($properties[1] / $properties[0]);
                    } else {
                        $side_ratio = ($properties[0] / $properties[1]);
                    }


                    $img_properties = array(
                        'width'      => $properties[0],
                        'height'     => $properties[1],
                        'pixels'     => $pixel_count,
                        'side_ratio' => $side_ratio
                    );


                    if ($file_type === 'image/jpeg') {
                        $image = @imagecreatefromjpeg($value);
                    } else {
                        $image = @imagecreatefrompng($value);
                    }

                    $green_pixel_count = 0;

                    for ($x = 0; $x < $properties[0]; $x++) {
                        for ($y = 0; $y < $properties[1]; $y++) {

                            $rgb = imagecolorat($image, $x , $y);
                            $colors = imagecolorsforindex ($image, $rgb);

                            if ($colors['green'] > $colors['red'] && $colors['green'] > $colors['blue']) {
                                $green_pixel_count++;
                            }
                        }
                    }
                    imagedestroy($image);

                    $green_pixel_ratio = ($green_pixel_count / $img_properties['pixels']);

//                    if ($green_pixel_ratio > $img_properties['side_ratio']){
//                        echo " Да\n";
//                    } else {
//                        echo " Нет\n";
//                    }

//                    $green_pixel_count = 0;
                }
//                else {
//                    echo " Недопустимый формат\n";
//                }

            }

        }

    }

}

//
//$file_list = new GreenImages();
//$file_list->getFileList();


