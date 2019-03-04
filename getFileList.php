<?php

namespace Test;

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
                asort($img_list);
            }
        }
        closedir($handle);

        return $img_list;
    }

}