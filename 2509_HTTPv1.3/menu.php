<?

$styleUl_row = "ul d-flex justify-content-between";
$styleUl_column = "ul d-flex justify-content-between flex-column w-50";

$styleLi_row = "li w-100 d-flex";
$styleLi_column = "li w-100 d-flex";

$styleA = "a text-decoration-none text-white-50 h3 p-2 w-100 text-center bg-success";

function showUl($styleUl)
{
    $ul = [
        'attributes' => [
            'class' => $styleUl,
            'id' => '1',
        ],
    ];
    return $ul;
}

function showUlElements($styleLi, $styleA)
{
    $arr = [
        [
            'li' => [
                'attributes' => [
                    'class' => $styleLi,
                    'id' => '1',
                ],
            ],
            'a' => [
                'title' => 'Новости',
                'attributes' => [
                    'class' => $styleA,
                    'id' => '1',
                    'href' => '?page=news',
                ],
            ]
        ],
        [
            'li' => [
                'attributes' => [
                    'class' => $styleLi,
                    'id' => '1',
                ],
            ],
            'a' => [
                'title' => 'О нас',
                'attributes' => [
                    'id' => '1',
                    'class' => $styleA,
                    'href' => '?page=about',
                ],
            ]
        ],
        [
            'li' => [
                'attributes' => [
                    'class' => $styleLi,
                    'id' => '1',
                ],
            ],
            'a' => [
                'title' => 'Контакты',
                'attributes' => [
                    'id' => '1',
                    'class' => $styleA,
                    'href' => '?page=contact',
                ],
            ]
        ],
        [
            'li' => [
                'attributes' => [
                    'class' => $styleLi,
                    'id' => '1',
                ],
            ],
            'a' => [
                'title' => 'Личный кабинет',
                'attributes' => [
                    'id' => '1',
                    'class' => $styleA,
                    'href' => '?page=login',
                ],
            ]
        ],
    
    ];
    return $arr;
}


function myMenu(?array $data = null, array $parent = []): string
{
    $showAttr = function (array $attributes = []) {
        // $result = '';
        // if (!is_null($attributes) && is_array($attributes)) {
        //     foreach ($attributes as $attrKey => $attrValue) {
        //         if (!empty($attrValue)) {
        //             $result .= ((is_int($attrKey)) ? " $attrValue" : " $attrKey='$attrValue'");
        //         }
        //     }
        // }
        $result = implode(' ', array_map(function ($key, $val) {
            return " $key='$val'";
        }, array_keys($attributes), array_values($attributes)));
        return $result;
        // ВТОРОЙ ВАРИАНТ
        // array_walk();
    };

    $result = '';

    $result .= "<ul" . ((!is_null($parent)) ? $showAttr($parent['attributes']) : "") . ">";

    foreach ($data as $part) {

        $result .= "<li"
            . $showAttr($part['li']['attributes'])
            . "'><a"
            . $showAttr($part['a']['attributes'])
            . ">"
            . $part['a']['title']
            . "</a></li>";

    }
    $result .= "</ul>";
    return $result;
}

/* 
изменения от 22.09.23
*/

// $content = [
//     'news' => [
//         'content' => [
//             'directory' => 'pages/',
//             'files' => [
//                 [
//                     'fileName' => 'page1',
//                     'extension' => 'php',
//                 ],
//                 [
//                     'fileName' => 'page11',
//                     'extension' => 'php',
//                 ],
//             ],
//         ],
//         'styles' => [
//             'directory' => 'css/',
//             'files' => [
//                 [
//                     'fileName' => 'news',
//                     'extension' => 'css',
//                 ],
//             ],   
//         ],
//         'scripts' => [
//             'directory' => 'js/',
//             'files' => [
//                 [
//                     'connectMethod' => 'header',
//                     'fileName' => 'news',
//                     'extension' => 'js',
//                 ],
//             ],   
//         ],
//     ]
// ];

$content = [
    'news' => [
        'files' => [
            'pages/page1.php',
            'pages/page11.php',
        ],
        'styles' => [
            'css/news.css',
            'css/main.css', 
        ],
        'scripts' => [
            // 1 - HEADER / 0 - end BODY
            [
                'connectMethod' => 1,
                'fileName' => 'js/news.js',
            ],
            [
                'connectMethod' => 0,
                'fileName' => 'js/news.js',
            ],
        ],
    ]
];

// var_dump(scandir('pages'));


/* 
---
--- Новый вариант
--- (мне сказали, что у меня в этом велосипеде застрянут ноги)
*/

// $styles = [
//     'a' => [
//         0 => 'a text-decoration-none bg-success',
//         1 => 'a text-decoration-none bg-danger',
//     ],
//     'li' => 'li w-100 d-flex',
//     'ul' => "ul d-flex justify-content-between",
// ];

// $elements = [
//     'ul' => [
//         'title' => [
//             [
//                 'li' => [
//                     'title' => [
//                         'a' => [
//                             'title' => 'Новости',
//                             'attributes' => [
//                                 'class' => $styles['a'],
//                                 'id' => '1',
//                                 'href' => '?page=news',
//                             ],
//                         ]
//                     ],
//                     'attributes' => [
//                         'class' => $styles['li'],
//                         'id' => '1',
//                     ],
//                 ],
//             ],
//             [
//                 'li' => [
//                     'title' => [
//                         'a' => [
//                             'title' => 'Новости',
//                             'attributes' => [
//                                 'class' => $styles['a'],
//                                 'id' => '1',
//                                 'href' => '?page=news',
//                             ],
//                         ]
//                     ],
//                     'attributes' => [
//                         'class' => $styles['li'],
//                         'id' => '1',
//                     ],
//                 ],
//             ],
//         ],
//         'attributes' => [
//             'class' => $styles['ul'],
//             'id' => '1',
//         ],
//     ]
// ]

// function testMenu(array $styles = null) {
//     var_dump($styles);
// }
// testMenu($styles);

