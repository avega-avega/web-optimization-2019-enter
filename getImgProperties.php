<?php

/**
 * @param string $image_path
 * @return array
 */
function getImgProperties(string $image_path): array
{
    $properties = getimagesize($image_path);

    $pixel_count  = ($properties[0] * $properties[1]);
    $max = array_keys($properties, max($properties))[0];
    echo "Наибольший элемент: $max \n";
    $aspect_ratio = ($properties[0] * $properties[1]);

    $img_properties = array(
        'width'  => $properties[0],
        'height' => $properties[1],
        'pixels' => $pixel_count
    );

    return $img_properties;

}
