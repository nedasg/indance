<?php

$url_arr = array_filter(explode('/', $_SERVER["DOCUMENT_ROOT"]));
array_pop($url_arr);
$url_arr[] = 'db_files';
$db_files = '/' . implode('/', $url_arr) . '/';

define('USERS_FILE', $db_files . 'logindance.json');
define('REG_FILE', $db_files . 'regs.json');

require_once $INC_DIR . 'functions/form.php';
require_once $INC_DIR . 'functions/file.php';
require $INC_DIR . 'functions/app.php';
