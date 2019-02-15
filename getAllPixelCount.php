<?php
$image_path = "/home/avega/Work/popov-web-test/input_data/01.jpg";
$image_path = "/home/avega/Work/popov-web-test/input_data/1.txt";

function getAllPixelCount($image_path){
    $img_properties = getimagesize($image_path);

    #TODO: Убрать проверку, когда добавится глобальная
    if (empty($img_properties)) {
        echo "is not images\n";
    } else {
    return ($img_properties[0] * $img_properties[1]);
    }

}

echo getAllPixelCount($image_path)."\n";
