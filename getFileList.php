<?php

## Конфигурационные парамтеры
$data_dir = 'input_data';


/**
 * @param string $dir
 * @return array
 */
function getFileList(string $dir): array
{
    if ($handle = opendir($dir)) {
        while (false !== ($file = readdir($handle))) {
            if ($file !== '.' && $file !== '..') {
                $img_list[] = realpath("$dir/$file");
            }
        }
        closedir($handle);
        return $img_list;
    }
}

#print_r(getFileList($data_dir));
