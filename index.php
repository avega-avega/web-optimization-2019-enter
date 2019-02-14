<?php

## Конфигурационные парамтеры
$data_dir = 'input_data';



## Список файлов в папке
if ($handle = opendir("$data_dir")) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {

            $img_p = (getimagesize("$data_dir"."/"."$file"));
            if (empty($img_p)) {
                echo "$file is not images\n";
            } else {
                echo "$file\n";

                print_r($img_p);
                echo "$img_p[0]\n";
                echo "$img_p[1]\n";

                if ($img_p[0] > $img_p[1]) {
                    echo ($img_p[1] / $img_p[0])."\n";
                } elseif ($img_p[0] === $img_p[1]){
                    echo "1\n";
                } else {
                    echo ($img_p[0] / $img_p[1])."\n";
                }

            }



            # Вызов рабочих функций
        }
    }
    closedir($handle);
}

## #TODO: Проверка то, что это картинка, эксепшн
# - получить расширение файла
# - получить Mine-тип изображения




## Нахождение сторон


## Отношение сторон


## Общее число пикселей изображания


## Получение RGB


## Максимальный параметр RGB и счётчик


## Счётчик / пиксели


## Вывод
