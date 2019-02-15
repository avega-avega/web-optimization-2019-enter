<?php

function getImgProperties(string $image_path): int
{
    $img_properties = getimagesize($image_path);


    return ($img_properties[0] * $img_properties[1]);

}
