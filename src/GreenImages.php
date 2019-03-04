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

    public function getFileList($input_data): array
    {
        global $img_list;
        if ($handle = opendir($input_data)) {
            while (false !== ($file = readdir($handle))) {
                if ($file !== '.' && $file !== '..') {
                    $img_list[] = realpath($input_data . "/$file");
                }
            }
            asort($img_list);
            closedir($handle);
        }

        return $img_list;
    }

    public function getImageProperties($img_path): array
    {
        $file_type = mime_content_type(realpath($img_path));

        if ($file_type === 'image/jpeg' || $file_type === 'image/png') {

            $properties = getimagesize($img_path);

            $pixel_count = ($properties[0] * $properties[1]);

            if ($properties[0] > $properties[1]) {
                $side_ratio = ($properties[1] / $properties[0]);
            } else {
                $side_ratio = ($properties[0] / $properties[1]);
            }

            $img_properties = array('width'      => $properties[0],
                                    'height'     => $properties[1],
                                    'pixels'     => $pixel_count,
                                    'side_ratio' => $side_ratio,
                                    'file_type'  => $file_type);

            return $img_properties;
        }
    }


    public function greenPixelCount (array $img_properties, string $img_path):int
    {
        if ($img_properties['file_type'] === 'image/jpeg') {
            $image = @imagecreatefromjpeg($img_path);
        } else {
            $image = @imagecreatefrompng($img_path);
        }

        $green_pixel_count = 0;

        for ($x = 0; $x < $img_properties['width']; $x++) {
            for ($y = 0; $y < $img_properties['height']; $y++) {

                $rgb = imagecolorat($image, $x, $y);
                $colors = imagecolorsforindex($image, $rgb);

                if ($colors['green'] > $colors['red'] && $colors['green'] > $colors['blue']) {
                    $green_pixel_count++;
                }
            }
        }
        imagedestroy($image);

        return $green_pixel_count;
    }

}