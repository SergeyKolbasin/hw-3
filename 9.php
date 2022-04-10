<?php
/*
 * Общие переменные и функции
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
function mbStrSplit(
    string  $string = ''            // строка для преобразования
):array
{
    return preg_split('/(?<!^)(?!$)/u', $string);
}

    // Функция транслитерации строки, возвращает преобразованную строку
    function fTransliteration(
        array   $arrTransliteration = [],   // массив транслитерации
        string  $strRus = ''                // строка, к которой применяется транслитерация
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

    // Функция замены в строке символов, возвращает преобразованную строку
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

/*
 * Функция преобразования строки в URL
 */
function transformURL(
    $arrTransliteration = [],   // массив для транслитерации
    $strInput = '',             // входная строка для преобразования
    $charIn = '',               // какие символы необходимо заменить
    $charOut = ''               // на что заменить
):string
{
    // преобразуем в урл и возвращаем из функции
    return fReplace(fTransliteration($arrTransliteration, $strInput), $charIn,$charOut);
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Замена</title>
</head>
<body>
<h4>Преобразование в URL:</h4>
<hr>
<p>
    Напишите функцию, которая получает строку на русском языке, производит транслитерацию и замену пробелов на
    подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах). <br>
</p>
<hr>
<h4>Решение:</h4>
<!--Форма ввода строки для преобразования в URL-->
<fieldset>
    <legend>Преобразование в URL</legend>
    <form action="" method="post">
        <p>
            <!--Отсутствует проверка наличия только кириллицы-->
            <label for="strInput">&nbsp;Исходная строка:</label>
            <input id="strInput" name="strInput" size="128" maxlength="128" type="text"
                   placeholder="Введите строку для преобразования в URL"><br><br>
        </p>
        <input type="submit" value="Преобразовать">
    </form>
</fieldset>
<hr>
</body>
</html>

<?php
/*
 * Main
 */
$strInput = '';                 // входная строка
$strURL = '';                   // строка, преобразованная в URL
// Получаем строку из поля ввода
if (isset($_POST['strInput'])) {
    $strInput = $_POST['strInput'];
    // преобразуем в URL
    $strURL = transformURL($arrTransliteration, $strInput, ' ', '_');
    // выводим URL
    if (!empty($strURL)) {
        echo "<p><b>Исходная строка:</b> $strInput</p>";
        echo "<p><b>Строка после замены:</b> $strURL</p>";
        echo '<hr>';
    }
}
?>
