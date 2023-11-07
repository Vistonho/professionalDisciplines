<?php   
    $form = [
        'tag'=> [
            'input' => [
                'attributes' => [
                    'type' => 'text',
                    'value' => null,
                    'maxlength' => 35,
                    'placeholder' => 'Retr0',
                    // 'required' => null,
                ],  
                'one' => true,
            ],
            
        ],
        'tag2'=> [
            'input' => [
                'attributes' => [
                    'type' => 'email',
                    'value' => null,
                    'maxlength' => 35,
                    'placeholder' => 'E-mail',
                    // 'required' => null,
                ],  
                'one' => true,
            ],
            
        ],
        'tag3'=> [
            'input' => [
                'attributes' => [
                    'type' => 'password',
                    'value' => null,
                    'maxlength' => 35,
                    'placeholder' => 'Password',
                    'required',
                ],  
                'one' => true,
            ],
        ],
        'tag4'=> [
            'textarea' => [
                'attributes' => [
                    'value' => null,
                    'maxlength' => 128,
                    'placeholder' => 'Textarea',
                ], 
                'one' => false, 
            ],
        ],
        'tag5'=> [
            'button' => [
                'attributes' => [
                    'type' => 'submit',
                    
                ],
                'value' => 'Отправить',  
                'one' => false,
            ],
        ],
    ];
?> 
<form>
    <?php
        foreach($form as $key => $val) :?>
        <?php 
            foreach($val as $key2 => $val2) : ?>
            <?= '<div><'.$key2 ?>
            <?php
                    foreach($val2 as $key3 => $val3) :
                        if($key3 == 'attributes'):
                            foreach($val3 as $key4 => $val4): ?>
                                <?= (!is_numeric($key4)) ? $key4.'="'.$val4.'"' : $val4 ?>
            <?php
                            endforeach;
                        else : ?>
                            <?= ($key3 == 'value' || ($key3 == 'one' && $val3 == false)) ? '>'.$val3.'</'.$key2.'>' : '/>';
                            break;
                        endif;
                    endforeach;
            endforeach;
        ?>
        </div>
    <?php
        endforeach;
    ?>
</form>