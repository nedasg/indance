<?php
mb_internal_encoding('UTF-8');

function sessid_check() {
    if (isset($_SESSION['user_name'])) {
        $users_array = file_to_array(USERS_FILE);
        foreach ($users_array as &$user) {
            if ($user['user_name'] === $_SESSION['user_name']) {
                if (!empty($user['session_id'])) {
                    if ($user['session_id'] === session_id()) {
                        return true;
                    }
                }
            }
        }
    }

    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, 
                $params["path"], $params["domain"], 
                $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    
    return false;
}

function generateOutputText(&$forms, $reg_index, $reg_data, $user_su_kuo) {
    foreach ($reg_data as $key => $value) {
        is_array($value) ? $text = implode(' ir ', $value) : $text = $value;
        $forms[$reg_index]['fields'][$key]['value'] = $value;
        switch ($key) {
            case 'stilius':
                $output_formed = $text;
                $forms[$reg_index]['fields'][$key]['text'] = $output_formed;
                $forms[$reg_index]['fields'][$key]['css_class'] = 'input-big';
                break;
            case 'special':
                $output_formed = !is_null($text) ? $text : null;
                !is_null($output_formed) ? $forms[$reg_index]['fields']['stilius']['text'] .= " | $output_formed" : false;
                $forms[$reg_index]['fields'][$key]['text'] = $output_formed;
                $forms[$reg_index]['fields'][$key]['css_class'] = 'input-big hide';
                break;
            case 'mokytojas':
                $output_formed = 'su ' . $user_su_kuo;
                $forms[$reg_index]['fields'][$key]['text'] = $output_formed;
                $forms[$reg_index]['fields'][$key]['css_class'] = 'input-big';
                break;
            case 'adr':
                $output_formed = $text . ', Vilniuje.';
                $forms[$reg_index]['fields'][$key]['text'] = $output_formed;
                $forms[$reg_index]['fields'][$key]['css_class'] = 'input-big hide';
                break;
            case 'miestas':
                $adr_added = $forms[$reg_index]['fields']['adr']['value'];
                $output_formed = $adr_added . ', ' . $text;
                $forms[$reg_index]['fields'][$key]['text'] = $output_formed;
                $forms[$reg_index]['fields'][$key]['css_class'] = 'input-big';
                break;
            case 'k_sav':
                $output_formed = $value . ' k./sav.:';
                $forms[$reg_index]['fields'][$key]['text'] = $output_formed;
                $forms[$reg_index]['fields'][$key]['css_class'] = 'input-big';
                break;
            case 'sav_d':
                $output_formed = $text;
                $forms[$reg_index]['fields'][$key]['text'] = $output_formed;
                $forms[$reg_index]['fields'][$key]['css_class'] = 'input-big';
                break;
            case 'val':
                $output_formed = $text . ' val.&nbsp;';
                $forms[$reg_index]['fields'][$key]['text'] = $output_formed;
                $forms[$reg_index]['fields'][$key]['css_class'] = 'input-small align-right';
                break;
            case 'min':
                $output_formed = $text . ' min.';
                $forms[$reg_index]['fields'][$key]['text'] = $output_formed;
                $forms[$reg_index]['fields'][$key]['css_class'] = 'input-small align-left';
                break;
            case 'nuo_men':
                $output_formed = 'Pradžia: ' . $text . ' mėn.';
                $forms[$reg_index]['fields'][$key]['text'] = $output_formed;
                $forms[$reg_index]['fields'][$key]['css_class'] = 'input-small align-right hide';
                break;
            case 'nuo_d':
                $month_added = mb_strtolower($forms[$reg_index]['fields']['nuo_men']['value']);
                $output_formed = 'nuo ' . $month_added . ' ' . $text . ' d.';
                $forms[$reg_index]['fields'][$key]['text'] = $output_formed;
                $forms[$reg_index]['fields'][$key]['css_class'] = 'input-big';
                break;
            case 'iki_men':
                $output_formed = 'Iki ' . $text . ' mėn.';
                $forms[$reg_index]['fields'][$key]['text'] = $output_formed;
                $forms[$reg_index]['fields'][$key]['css_class'] = 'input-small align-right hide';
                break;
            case 'iki_d':
                $month_added = mb_strtolower($forms[$reg_index]['fields']['iki_men']['value']);
                if (!is_null($month_added) && !is_null($text)) {
                    $output_formed = 'iki ' . $month_added . ' ' . $text . ' d.';
                } else {
                    $output_formed = null;
                }
                $forms[$reg_index]['fields'][$key]['text'] = $output_formed;
                $forms[$reg_index]['fields'][$key]['css_class'] = 'input-big';
                $forms[$reg_index]['fields'][$key]['css_class'] .= is_null($output_formed) ? ' hide' : false;
                break;
            case 'kaina':
                $output_formed = 'Kaina (1 žm. už 4 sav.): ' . $text . ' eur.';
                $forms[$reg_index]['fields'][$key]['text'] = $output_formed;
                $forms[$reg_index]['fields'][$key]['css_class'] = 'input-big';
                break;
            case 'su_nuol':
                $output_formed = 'Studentams (1 žm. už 4 sav.): ' . $text . ' eur.';
                $forms[$reg_index]['fields'][$key]['text'] = $output_formed;
                $forms[$reg_index]['fields'][$key]['css_class'] = 'input-big';
                break;
            case 'lygis':
                $output_formed = mb_strtoupper($text);
                $forms[$reg_index]['fields'][$key]['text'] = $output_formed;
                $forms[$reg_index]['fields'][$key]['css_class'] = 'input-big';
                break;
        }
    }
}

?>