<?

$styleUl_row = "ul d-flex justify-content-between";
$styleUl_column = "ul d-flex justify-content-between flex-column w-50";

$styleLi_row = "li w-100 d-flex";
$styleLi_column = "li w-100 d-flex";

$styleA = "a text-decoration-none text-white-50 h3 p-2 w-100 text-center bg-success";

function addContent(string $page = null, string $typeContent = 'files', int $connectMethod = 1)
{
    $result = "";

    foreach (showUlElements() as $val) 
    {
        if ($val['page'] == $page) 
        {
            $data = $val['content'];
        }
    }

    if (isset($data[$typeContent])) {
        if ($typeContent == 'files') {
            foreach ($data[$typeContent] as $val) {
                include "$val";
            }
        }
        if ($typeContent == 'styles') {
            foreach ($data[$typeContent] as $val) {
                $result .= "<link rel='stylesheet' href='$val'>";
            }
        }
        if ($typeContent == 'scripts') {
            foreach ($data[$typeContent] as $val) {
                if ($val['connectMethod'] == $connectMethod) {
                    $result .= "<script "
                        . ($connectMethod ? 'defer' : '')
                        . " src='" . $val['fileName'] . "'></script>";
                }
            }
        }
    }

    return $result;
}

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

function showUlElements($styleLi = null, $styleA = null)
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
            ],
            'page' => 'news',
            'content' => [
                'files' => [
                    'pages/page1.php',
                ],
                'styles' => [
                    'css/news.css',
                ],
                'scripts' => [
                    // 1 - HEADER / 0 - end BODY
                    [
                        'connectMethod' => 1,
                        'fileName' => 'js/news.js',
                    ],
                    [
                        'connectMethod' => 0,
                        'fileName' => 'js/main.js',
                    ],
                ],
            ],
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
            ],
            'page' => 'about',
            'content' => [
                'files' => [
                    'pages/page2.php',
                ],
                'styles' => [
                    "css/about.css",
                    'multiplicTable.css',
                ],
                'scripts' => [
                    // 1 - HEADER / 0 - end BODY
                    [
                        'connectMethod' => 1,
                        'fileName' => 'js/contact.js',
                    ],
                    [
                        'connectMethod' => 0,
                        'fileName' => 'js/contact.js',
                    ],
                ],
            ],
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
            ],
            'page' => 'contact',
            'content' => [
                'files' => [
                    'pages/page3.php',
                ],
                'styles' => [
                    "css/contact.css",
                    'css/main.css',
                ],
                'scripts' => [
                    // 1 - HEADER / 0 - end BODY
                    [
                        'connectMethod' => 1,
                        'fileName' => 'js/contact.js',
                    ],
                    [
                        'connectMethod' => 0,
                        'fileName' => 'js/contact.js',
                    ],
                ],
            ],
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
            ],
            'page' => 'login',
            'content' => [
                'files' => [
                    'pages/page2.php',
                ],
                'styles' => [
                    "css/login.css",
                    'css/main.css',
                ],
                'scripts' => [
                    // 1 - HEADER / 0 - end BODY
                    [
                        'connectMethod' => 1,
                        'fileName' => 'js/contact.js',
                    ],
                    [
                        'connectMethod' => 0,
                        'fileName' => 'js/contact.js',
                    ],
                ],
            ],
        ],
    ];
    return $arr;
}


function myMenu(?array $data = null, array $parent = []): string
{
    $showAttr = fn(array $attributes = []) =>
        implode(' ', array_map(fn($key, $val) => " $key='$val'", array_keys($attributes), array_values($attributes)));

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