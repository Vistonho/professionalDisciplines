<?php

function createAttrString(array $attributes): string
{
    $result = implode(' ', array_map(function ($key, $val) {
        return " $key='$val'";
    }, array_keys($attributes), array_values($attributes)));

    return $result;
}

class Form
{
    // static $userForm = '';

    public static function Begin(array $array)
    {
        // static::$userForm .= createTag('form', $array, true);
        echo "<form " . createAttrString($array) . ">";

        return new self();
    }

    public static function end()
    {
        echo "</form>";
    }

    public function input(array $array)
    {
        return "<input" . createAttrString($array) . ">";
    }

    public function submit(array $array)
    {
        return "<input type='submit'" . createAttrString($array) . ">";
    }

    public function password(array $array)
    {
        return "<input type='password'" . createAttrString($array) . ">";
    }

    public function textarea(array $array)
    {
        return "<textarea" . createAttrString($array) . "></textarea>";
    }
}

$form = Form::Begin([
    'id' => 'form_id',
    'action' => 'file_name.php',
    'method' => 'post',
]);

// var_dump($form::$userForm);

echo $form->input([
    'type' => 'text',
    'value' => 'aaa'
]);

// вывод <input type='password'> на страницу
echo $form->password([
    'value' => 'aaa'
]);

// вывод <textarea> на страницу
echo $form->textarea([
    'value' => 'aaa',
    'placeholder' => '123'
]);

// вывод <input type='submit'> на страницу
echo $form->submit([
    'value' => 'Отправить форму'
]);

// вывод </form> на страницу
Form::end();
