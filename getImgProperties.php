<?php
namespace Test;
/**
 * @param string $image_path
 * @return array
 */
function getImgProperties(string $image_path): array
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
