<?php
mb_internal_encoding('UTF-8');
$INC_DIR = $_SERVER["DOCUMENT_ROOT"] . "/login/";
require_once $INC_DIR . 'bootstrap.php';

function form_success($safe_input, $form) {
    session_start();

    $_SESSION['user_name'] = $safe_input['user_name'];
    $user_name = $safe_input['user_name'];
    $users_array = file_to_array(USERS_FILE);

    foreach ($users_array as &$user) {
        if ($user['user_name'] === $user_name) {
            if (!empty($user['session_id'])) {
                if ($user['session_id'] === session_id()) {
                    return true;
//                    print "SESSION_ID sutampa!";
                } else {
                    $user['session_id'] = session_id();
                    array_to_file($users_array, USERS_FILE);
//                    print "SESSION_ID pakeistas!";
                }
            } else {
                $user['session_id'] = session_id();
                array_to_file($users_array, USERS_FILE);
//                print "Naujas SESSION_ID įrašytas!";
            }
        }
    }

    return false;
}

function validate_login($safe_input, &$form) {
    $user_name = $safe_input['user_name'];
    $password = $safe_input['password'];

    if (file_exists(USERS_FILE)) {
        $users_array = file_to_array(USERS_FILE);
        foreach ($users_array as $user) {
            if ($user['user_name'] === $user_name && $user['password'] === $password) {

                return true;
            }
        }
    }

    $form['fields']['user_name']['error_msg'] = strtr('"Nepavyko prijungti @user"!', [
        '@user' => $user_name
    ]);
    $form['fields']['password']['error_msg'] = strtr('Kažkas negerai...', [
        '@user' => $user_name
    ]);

    return false;
}

function get_user_names() {
    if (file_exists(USERS_FILE)) {
        $users_array = file_to_array(USERS_FILE);
        return array_column($users_array, 'user_name');
    }
    return [];
}

$form = [
    'fields' => [
        'user_name' => [
            'label' => '',
            'type' => 'select',
            'options' => get_user_names(),
            'css_class' => 'input-big',
            'validate' => [
                'validate_not_empty',
            ]
        ],
        'password' => [
            'label' => '',
            'type' => 'password',
            'placeholder' => 'Password',
            'css_class' => 'input-big',
            'validate' => [
                'validate_not_empty'
            ]
        ],
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Login!'
        ]
    ],
    'validate' => [
        'validate_login'
    ],
    'callbacks' => [
        'success' => [
            'form_success'
        ],
        'fail' => []
    ],
    'errors' => []
];

$show_form = true;

if (!empty($_POST)) {
    $safe_input = get_safe_input($form);
    $form_success = validate_form($safe_input, $form);
    if ($form_success) {
        $show_form = false;
        header("Location: /login/currentregs.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="/login/css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" href="/login/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="/login/js/materialize.min.js"></script>
        <title>LogINDANCE</title>
    </head>
    <body>
        <div class="layout">
            <div class="content-left">
                <?php if ($show_form): ?>
                    <?php require $INC_DIR . 'objects/form.php'; ?>
                <?php endif; ?>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.forms-container').css("visibility", "visible").hide().fadeIn(200);
        });
    </script>
</html>