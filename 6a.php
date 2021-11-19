<?php
// Функция вывода меню
function generateMenu($items)
{
    echo '<ul>';
    foreach ($items as $item) {
        echo '<li>';
        echo '<a href="' . $item['link'] . '">' . $item['title'] . '</a>';
        if(!empty($item['submenu'])) {
            generateMenu($item['submenu']);
        }
        echo '</li>';
    }
    echo '</ul>';
}
// Вложенный ассоциативный массив элементов меню
$menu = [
/*    [
        'title' =>  'Главная',
        'link'  =>  '#'
    ],
    [
        'title' =>  'Контакты',
        'link'  =>  '#'
    ],*/
    [
        'title' =>  'Статьи',
        'link'  =>  '#',
        'submenu'   =>  [
            [
                'title' =>  'Котики',
                'link'  =>  '#',
            ],
            [
                'title' =>  'Собачки',
                'link'  =>  '#',
                'submenu'   =>  [
                    [
                        'title' =>  'Доберманы',
                        'link'  =>  '#'
                    ],
                    [
                        'title' =>  'Корги',
                        'link'  =>  '#'
                    ]
                ]
            ]
        ]
    ],
    [
        'title' =>  'Статьи',
        'link'  =>  '#',
        'submenu'   =>  [
            [
                'title' =>  'Котики',
                'link'  =>  '#',
            ],
            [
                'title' =>  'Собачки',
                'link'  =>  '#',
                'submenu'   =>  [
                    [
                        'title' =>  'Доберманы',
                        'link'  =>  '#'
                    ],
                    [
                        'title' =>  'Корги',
                        'link'  =>  '#'
                    ]
                ]
            ]
        ]
    ]


];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Меню</title>
</head>
<body>
<h4>Генерируемое меню:</h4>
<hr>
<p>
    В имеющемся шаблоне сайта заменить статичное меню (ul - li) на генерируемое через PHP.
    Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать,
    как можно реализовать меню с вложенными подменю? Попробовать его реализовать.</p>'
<hr>
<h4>Решение:</h4>
<h1>Главная страница сайта</h1>
<hr>
<h4><i>Меню сайта:</i></h4>

<?php
generateMenu($menu);
?>
<hr>
<h4>Подвал сайта</h4>
<hr>
</body>
</html>

