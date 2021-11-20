<?php
/*
 * Вывод чисел без использования тела цикла
 */
    $title = 'Без тела';
    $h4 = 'Цикл for без тела:';
    $strResult = '';
    // цикл без тела
    for ($i = 0; $i <= 9; $strResult .= "$i ", $i++) {
        // здесь пусто !
    };
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
<h4><?= $h4 ?></h4>
<hr>
<p>
    Вывести с помощью цикла for числа от 0 до 9, НЕ используя тело цикла. <br>
    Выглядеть это должно так: for (…){ // здесь пусто} <br>
</p>
<hr>
<h4>Решение:</h4>
    <span>for ($i = 0; $i <= 9; print("$i "), $i++) {...};</span>
    <hr>
    <span><?= $strResult ?></span>
<hr>
<?php
    // возврат на предыдущую страницу
    if ( !empty($_SERVER['HTTP_REFERER']) ) {
        echo '<a href="' . $_SERVER['HTTP_REFERER'] . '" title="Назад"><< Назад</a>';
    }
    echo '<hr>';
?>
</body>
</html>