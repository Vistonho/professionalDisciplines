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