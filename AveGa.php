<?php


use AveGa\GET_ALL_MOTHER_FUCKER;
//global $A;
$A = new GET_ALL_MOTHER_FUCKER();

class GetGet{

    function __construct($A){

    }

    public function getAll(){
//        $data_dir = 'input_data';


//        $A = new GET_ALL_MOTHER_FUCKER();
        $img_list = $A->getFileList('input_data');
//        $D = $A->getImgProperties($img_list);
//        $C = $A->getGreenPixelCount($img_list);

//        $file_list = getFileList($data_dir);

        foreach ($img_list as $value) {

            $file_type = mime_content_type(realpath($value));
            echo basename($value);

            if ($file_type === 'image/jpeg' || $file_type === 'image/png') {
                $green_pixel_count = 0;


                $img_properties = $A->getImgProperties($value);

                $A->getGreenPixelCount($value,
                    $file_type,
                    $img_properties['width'],
                    $img_properties['height']
                );

                $green_pixel_ratio = ($green_pixel_count / $img_properties['pixels']);

                if ($green_pixel_ratio > $img_properties['side_ratio']) {
                    echo " Да\n";
                } else {
                    echo " Нет\n";
                }

                //            $green_pixel_count = 0;
            } else {
                echo " Недопустимый формат\n";
            }

        }
    }

}

$B = new GetGet();
$B->getAll();