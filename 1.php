<?php
/*
    С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
 */
    $title = 'Цикл';
    $h4 = 'Цикл while.';
    $i = 0;                 // выводимые числа
    $strResult  =   '';     // результирующая строка для вывода
    while ($i<=100) {
        if ($i%3 == 0) {
            $strResult .= (string)$i . ' ';
        }
        $i++;
    }
    $strResult = rtrim($strResult);     // удаление последнего пробела
?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
    <h4><?= $h4 ?></h4>
    <span><?= "Все числа от 0 до 100, которые делятся на 3 без остатка: <br> $strResult" ?>
</body>
</html>
