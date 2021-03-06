<?php
/*
 *  С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
 *  0 – это ноль.
 *  1 – нечётное число.
 *  2 – чётное число.
 *  3 – нечётное число.
 *  … 10 – чётное число.
 */

    // Функция вывода чисел, возвращает строковый эквивалент результата
    function outNumber(
        $i = 0,             // начальное значение
        $j = 0              // конечное значение
    ):string
    {
        $result = '';    // результирующая строка
        $k = $i;         // счетчик цикла
        // проверка корректности вызова функции
        if ($i>$j) {
            return $result = 'Начальное значение чисел должно быть меньше конечного! <br>';
        }
        do {
            if ((($k % 2) == 0) && ($k != 0)) {
                $result .= "$k - четное число. <br>";
            } else if (($k % 2) != 0) {
                $result .= "$k - нечетное число. <br>";
            } else {
                $result .= "$k - это ноль. <br>";
            }
            $k++;
        } while ($k <= $j);
        return $result;
    }
$strResult = outNumber(0, 10);
$title = 'Цикл';
$h4 = 'Цикл do...while.';
?>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
<h4><?= $h4 ?></h4>
<hr>
<span><?= "Все числа от 0 до 10: <br> $strResult" ?>
<hr>
<?php
// возврат на предыдущую страницу
if ( !empty($_SERVER['HTTP_REFERER']) ) {
    echo '<a href="' . $_SERVER['HTTP_REFERER'] . '" title="Назад"><< Назад</a>';
}
?>
<hr>
</body>
</html>
