<?php

$db_files = str_replace('indance', 'db_files', $_SERVER["DOCUMENT_ROOT"]);

define('USERS_FILE', $db_files . 'logindance.json');
define('REG_FILE', $db_files . 'regs.json');

require_once $INC_DIR . 'functions/form.php';
require_once $INC_DIR . 'functions/file.php';
require $INC_DIR . 'functions/app.php';
