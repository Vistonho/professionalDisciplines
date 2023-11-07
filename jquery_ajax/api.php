<?php
const FILE_NAME = 'data.log';

$res = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo json_encode(true);
    // var_dump($_GET, $_POST);

    // var_dump($_POST['method']);die;

    if (isset($_POST['method'])) {
        switch ($_POST['method']) {
            case 'get-count':
                if (file_exists(FILE_NAME)) {
                    $res = (int)file_get_contents(FILE_NAME);
                } else {
                    $res = 0;
                    file_put_contents(FILE_NAME, 0);
                }
                break;
            case 'set-count':
                if (file_exists(FILE_NAME)) {
                    $res = (int)file_get_contents(FILE_NAME);
                    $res++;
                    file_put_contents(FILE_NAME, $res);
                } else {
                    $res = 1;
                    file_put_contents(FILE_NAME, 0);
                }
                break;
            case 'reset-count':
                if (file_exists(FILE_NAME)) {
                    $res = (int)file_get_contents(FILE_NAME);
                    $res = 0;
                    file_put_contents(FILE_NAME, $res);
                } else {
                    $res = 0;
                    file_put_contents(FILE_NAME, 0);
                }
                break;
        }
    }
}

echo json_encode($res);
