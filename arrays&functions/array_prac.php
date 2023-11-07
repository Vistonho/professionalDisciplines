<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>

<body>
    <!-- <form action="">
        <input type="text" disabled>
        <button type="submit"></button>
    </form> -->

    <?php
    $formElements = [
        [
            'tag' => 'form',
            'closing' => true,
            'value' => '',
            'attributes' => [
                'action' => '',
                'id' => '',
                'class' => 'frm',
                'name' => '',
                'method' => 'POST',
            ]
        ],
        [
            'tag' => 'input',
            'closing' => false,
            'value' => '',
            'parent' => 'form',
            'child' => '',
            'attributes' => [
                'type' => 'text',
                'id' => '',
                'class' => 'inpt',
                'name' => '',
                'value' => 'yourname',
                'required',
                'disabled',
            ]
        ],
        [
            'tag' => 'select',
            'closing' => true,
            'value' => '',
            'connection' => 'a',
            'attributes' => [
                'type' => 'text',
                'id' => '',
                'class' => 'inpt',
                'name' => '',
                'value' => 'yourname',
            ]
        ],
        [
            'tag' => 'option',
            'closing' => true,
            'value' => 'monkey',
            'connection' => 'a',
            'attributes' => [
                'id' => '',
                'class' => '',
                'selected' => '',
                'value' => 'monkey',
                // 'disabled',
            ]
        ],
        [
            'tag' => 'option',
            'closing' => true,
            'value' => 'chicken',
            'connection' => 'a',
            'attributes' => [
                'id' => '',
                'class' => '',
                'selected' => '',
                'value' => 'chicken',
                // 'disabled',
            ]
        ],
        [
            'tag' => 'button',
            'closing' => true,
            'value' => 'Button',
            'attributes' => [
                'type' => 'submit',
                'id' => '',
                'class' => 'btn',
                'name' => '',
                'value' => '',
            ]
        ],
        [
            'tag' => 'select',
            'closing' => true,
            'value' => '',
            'connection' => 'b',
            'attributes' => [
                'type' => 'text',
                'id' => '',
                'class' => 'inpt',
                'name' => '',
                'value' => 'yourname',
            ]
        ],
        [
            'tag' => 'option',
            'closing' => true,
            'value' => 'dog',
            'connection' => 'b',
            'attributes' => [
                'id' => '',
                'class' => '',
                'selected' => '',
                'value' => 'dog',
                // 'disabled',
            ]
        ],
    ];

    function showForm($data)
    {
        $tags = [];
        $form = [];
    
        $selects = [];
    
        //формирование каждого тега
        foreach ($data as $element) {
            $tag = [];
            $result = "<" . $element['tag'];
    
            if (isset($element['attributes']) && is_array($element['attributes'])) {
                foreach ($element['attributes'] as $attribute => $attrValue) {
                    if (!empty($attrValue)) {
                        $result .= ((is_int($attribute)) ? " $attrValue" : " $attribute='$attrValue'");
                    }
                }
            }
            
            if ($element['closing']) {
                $result .= ">";
                $tag[] = $result;
                $tag[] = (isset($element['value'])) ? $element['value'] : '';
                $tag[] = "</" . $element['tag'] . ">";
            } else {
                $result .= " />";
                $tag[] = $result;
            }
    
            if ($element['tag'] == 'form') {
                $form = $tag;
            } elseif ($element['tag'] == 'select') {
                $selects[] = [
                    'connection' => $element['connection'],
                    $tag,
                ];
            } elseif ($element['tag'] == 'option') {
                foreach ($selects as $key => $select) {
                    if ($select['connection'] == $element['connection']) {
                        (is_string($selects[$key][0][1])) ? ($selects[$key][0][1] .= implode('', $tag)) : ($selects[$key][0][1] = implode('', $tag));
                    }
                }
            } else {
                $tags[] = $tag;
            }
        }
    
    
        // var_dump($selects);
        // die;
    
        //сбор тега SELECT 
        // $options = [];
        // foreach($tags as $tag)
        // {
        //     foreach($tag as $part)
        //     {
        //         $strTags .= $part;
        //     }
        // }
        
        //формирование тега SELECT
        $strSelect = '';
        foreach ($selects as $select) {
            foreach ($select as $key => $part) {
                if (is_int($key))
                {
                    $part = implode('', $part);
                    $strSelect .= $part;
                }
            }
        }
    
        //формирование тега FORM
        $strTags = '';
        foreach ($tags as $tag) {
            foreach ($tag as $part) {
                $strTags .= $part;
            }
        }
        $form[1] = $strTags . $strSelect;
        $form = implode('', $form);
    
        return $form;
    
        // $result = '';
        // foreach($formElements as $element)
        // {
        //     $result .= "<" . $element['tag'];
        //     if (isset($element['attributes']) && is_array($element['attributes'])) {
        //         foreach ($element['attributes'] as $attribute => $attrValue)
        //         {
        //             if (!empty($attrValue) )
        //             {
        //                 $result .= ((is_int($attribute)) ? " $attrValue" : " $attribute='$attrValue'");
        //             }
        //         }
        //     }
        //     if ($element['closing'])
        //     {
        //         $result .= ">" 
        //         . ((isset($element['value'])) ? $element['value'] : '')
        //         . "</" . $element['tag'] . ">";
        //     } else {
        //         $result .= " />"
        //         . ((isset($element['value'])) ? $element['value'] : ''); 
        //     }
        // }
    }

    echo(showForm($formElements));
    
    ?>
</body>

</html>