<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="main.css" rel="stylesheet" >
  </head>
    <title>Document</title>
</head>
<body>
    <header>
   
       <!-- <li class = "it1"><a href="#">Главная</a></li>
       <li class = "it1"><a href="#">Контакты</a></li>
        <li class = "it1"><a href="#">О Нас</a></li>
        <li class = "it1"><a href="#">Настройки</a></li> -->
    </ul>
    

    <?php 
        $ul = [
            [
                'attributes' => [
                    'class' => 'list-item',
                ],
                'label' =>[
                    'value' => 'Главная',
                    'attributes' => [
                        'href' => "#"
                    ],
                ],

            ],
            [
                'attributes' => [
                    'class' => 'list-item',
                ],
                'label' =>[
                    'value' => 'Настойки',
                    'attributes' => [
                        'href' => "#"
                    ],
                ],

            ],
            [
                'attributes' => [
                    'class' => 'list-item',
                ],
                'label' =>[
                    'value' => 'О нас',
                    'attributes' => [
                        'href' => "#"
                    ],
                ],
            ],
            [
                'attributes' => [
                    'class' => 'list-item',
                ],
                'label' =>[
                    'value' => 'Контакты',
                    'attributes' => [
                        'href' => "#"
                    ],
                ],
            ],    
        ]
    ?>
   
    <?php
    $s = '<ul>';
 
    foreach($ul as $li) {
       $s .= '<li ';
        foreach($li['attributes'] as $key => $val) {
            $s .=  $key . '=' . "'$val' ";
        }
        $s .= '><a ';
        foreach($li['label']['attributes'] as $key => $val) {
            $s .=  $key . '=' . "'$val' ";
        }
        $s .= '>';
        $s .= $li['label']['value'];
        $s .='</a></li>';
    }
    $s .= '</ul>';
    echo $s ;
    ?>
   </header>



</body>
</html>