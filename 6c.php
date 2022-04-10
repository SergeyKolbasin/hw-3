<?php
    // Функция вывода меню
    function generateMenu(
            array   $items = []
    ):string
    {
        $strMenu = '';      // html-код меню
        $strMenu .= '<ul>';
        foreach ($items as $item) {
            $strMenu .= '<li>';
            $strMenu .=  '<a href="' . $item['link'] . '">' . $item['title'] . '</a>';
            if(!empty($item['submenu'])) {
                $strMenu .= generateMenu($item['submenu']);
            }
            $strMenu .= '</li>';
        }
        $strMenu .= '</ul>';
        return $strMenu;
    }
    // Вложенный ассоциативный массив элементов меню
    $menu = [
        [
            'title' =>  'Портал',
            'link'  =>  '#',
            'submenu'   =>  [
                [
                    'title' =>  'Главная',
                    'link'  =>  '#',
                    'submenu'   =>  [
                        [
                            'title' =>  'Новости',
                            'link'  =>  '#'
                        ],
                        [
                            'title' =>  'Статьи',
                            'link'  =>  '#'
                        ],
                        [
                            'title' =>  'Советы',
                            'link'  =>  '#'
                        ],
                    ],
                ],
                [
                'title' =>  'Карта сайта',
                'link'  =>  '#',
                ],
            ]
        ],
        [
            'title' =>  'Об авторе',
            'link'  =>  '#',
            'submenu'   =>  [
                [
                    'title' =>  'ФИО',
                    'link'  =>  '#',
                ],
                [
                    'title' =>  'Возраст',
                    'link'  =>  '#',
                ],
                [
                    'title' =>  'e-mail',
                    'link'  =>  '#',
                ],
            ],
        ],
        [
            'title' =>  'Контакты',
            'link'  =>  '#',
            'submenu'   =>  [
                [
                    'title' =>  'Почтовый адрес',
                    'link'  =>  '#',
                ],
                [
                    'title' =>  'Телефон',
                    'link'  =>  '#',
                ],
                [
                    'title' =>  'e-mail',
                    'link'  =>  '#',
                ],
            ],
        ],
        [
            'title' =>  'Помощь',
            'link'  =>  '#',
            'submenu'   =>  [
                [
                    'title' =>  'О портале',
                    'link'  =>  '#',
                ],
                [
                    'title' =>  'Лицензия',
                    'link'  =>  '#',
                ],
            ],
        ],
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
    // вызов меню
    echo generateMenu($menu);
?>
<hr>
<h4>Подвал сайта</h4>
<hr>
</body>
</html>
