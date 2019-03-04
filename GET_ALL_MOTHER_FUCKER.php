<?php
namespace AveGa;

class GET_ALL_MOTHER_FUCKER{

   public function getFileList(string $dir): array
    {
        if ($handle = opendir($dir)) {
            while (false !== ($file = readdir($handle))) {
                if ($file !== '.' && $file !== '..') {
                    $img_list[] = realpath("$dir/$file");
                    asort($img_list);
                }
            }
            closedir($handle);

            return $img_list;
        }

    }

    public function getGreenPixelCount (string $image_path,
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

    public function getImgProperties(string $image_path): array
    {
        $properties = getimagesize($image_path);

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

        return $img_properties;

    }



}
