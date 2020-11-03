<?php
require_once $INC_DIR . 'bootstrap.php';

// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();

$users_array = file_to_array(USERS_FILE);

foreach ($users_array as $user_index => &$user) {
    if ($user['user_name'] === $_SESSION['user_name']) {
        if (!empty($user['session_id'])) {
            unset($users_array[$user_index]['session_id']);
            array_to_file($users_array, USERS_FILE);
        }
    }
}

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();

header('Location: /login.php');
exit();
?>