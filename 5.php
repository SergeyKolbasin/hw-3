<?php
/*
 * Здесь мы производим замену пробелов символов подчеркивания
 */
    // Функция преобразования строки в массив, поддерживает UTF-8
    function mbStrSplit($string):array
    {
        return preg_split('/(?<!^)(?!$)/u', $string);
    }
    /*
    * Функция замены в строке пробелов на подчеркивания
    * В качестве параметра получает строку, возвращает преобразованную строку,
    * в которой пробелы заменены символом подчеркивания
    */
    function fReplaceSpaceUnderline($strSpace = ''):string
    {
        $arrStr = mbStrSplit($strSpace);
        $strReturn = '';
        foreach ($arrStr as $strValue) {
            if ($strValue == ' ') {
                $strValue = '_';
            }
            $strReturn .= $strValue;
        }
        return $strReturn;
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Замена</title>
</head>
<body>
<h4>Замена пробелов:</h4>
<hr>
<p>
    Напишите функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку. <br>
</p>
<hr>
<h4>Решение:</h4>
<!--Форма ввода строки для транслитерации-->
<fieldset>
    <legend>Замена пробелов</legend>
    <form action="" method="post">
        <p>
            <!--Отсутствует проверка наличия только кириллицы-->
            <label for="strIn">&nbsp;Исходная строка:</label>
            <input id="strIn" name="strIn" size="128" maxlength="128" type="text"
                   placeholder="Введите строку для замены"><br><br>
        </p>
        <input type="submit" value="Заменить">
    </form>
</fieldset>
<hr>
</body>
</html>

<?php
/*
 * Main
 */
// Получаем строку из поля ввода
if (isset($_POST['strIn'])) {
    $strIn = $_POST['strIn'];
    // заменяем
    $strOut = fReplaceSpaceUnderline($strIn);
    // выводим транслитерацию
    if (!empty($strOut)) {
        echo "<p><b>Исходная строка:</b> $strIn</p>";
        echo "<p><b>Строка после замены:</b> $strOut</p>";
        echo '<hr>';
    }
}
?>
