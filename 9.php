<?php
/*
 * Здесь мы производим транслитерацию
 */
// Массив транслитерации
$arrTransliteration = [
    'а' => 'a', 'A' => 'A',
    'б' => 'b', 'Б' => 'B',
    'в' => 'v', 'В' => 'V',
    'г' => 'g', 'Г' => 'G',
    'д' => 'd', 'Д' => 'D',
    'е' => 'e', 'Е' => 'E',
    'ё' => 'ye', 'Ё' => 'Ye',
    'ж' => 'zh', 'Ж' => 'Zh',
    'з' => 'z', 'З' => 'Z',
    'и' => 'i', 'И' => 'I',
    'й' => 'y', 'Й' => 'Y',
    'к' => 'k', 'К' => 'K',
    'л' => 'l', 'Л' => 'K',
    'м' => 'm', 'М' => 'M',
    'н' => 'n', 'Н' => 'N',
    'о' => 'o', 'О' => 'O',
    'п' => 'p', 'П' => 'P',
    'р' => 'r', 'Р' => 'R',
    'с' => 's', 'С' => 'S',
    'т' => 't', 'Т' => 'T',
    'у' => 'u', 'У' => 'U',
    'ф' => 'f', 'Ф' => 'F',
    'х' => 'kh', 'Х' => 'Kh',
    'ц' => 'ts', 'Ц' => 'Ts',
    'ч' => 'ch', 'Ч' => 'Ch',
    'ш' => 'sh', 'Ш' => 'Sh',
    'щ' => 'shch', 'Щ' => 'Shch',
    'ъ' => '', 'Ъ' => '',
    'ы' => 'y', 'Ы' => 'Y',
    'ь' => '', 'Ь' => '',
    'э' => 'e', 'Э' => 'E',
    'ю' => 'yu' , 'Ю' => 'Yu',
    'я' => 'ya' , 'Я' => 'Ya',
];

    //  Функция преобразования строки в массив, поддерживает UTF-8
    function mbStrSplit($string):array
    {
        return preg_split('/(?<!^)(?!$)/u', $string);
    }
    // Функция транслитерации строки, возвращает преобразованную строку
    function fTransliteration(
        $arrTransliteration,  // массив транслитерации
        $strRus = ''          // строка, к которой применяется транслитерация
    ):string
    {
        $strLat = '';
        $arrRus = mbStrSplit($strRus);
        foreach ($arrRus as $symRus) {
            // Если ключ присутствует в массиве транслитерации
            if (array_key_exists($symRus, $arrTransliteration)) {
                // заменим его на символ транслитерации
                $strLat .= $arrTransliteration[$symRus];
            } else {
                // оставим как есть, значит это не кириллица, а другой символ, который не следует заменять
                $strLat .= $symRus;
            }
        }
        return $strLat;
    }

/*
 * Здесь мы производим замену пробелов символов подчеркивания
 */
    // Функция преобразования строки в массив, поддерживает UTF-8
    function mbStrSplit($string):array
    {
        return preg_split('/(?<!^)(?!$)/u', $string);
    }
    /*
    * Функция замены в строке символов
    * В качестве параметра получает строку, возвращает преобразованную строку,
    * в которой произведена замена символов
    */
    function fReplace(
        $strIn,             // строка для замены
        $charOld = '',      // что необходимо заменить
        $charNew = ''       // на что заменить
    ):string
    {
        $arrStr = mbStrSplit($strIn);
        $strReturn = '';
        foreach ($arrStr as $strValue) {
            if ($strValue == $charOld) {
                $strValue = $charNew;
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
    $strOut = fReplace($strIn, ' ', '_');
    // выводим транслитерацию
    if (!empty($strOut)) {
        echo "<p><b>Исходная строка:</b> $strIn</p>";
        echo "<p><b>Строка после замены:</b> $strOut</p>";
        echo '<hr>';
    }
}
?>
