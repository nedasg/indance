<?php

function get_safe_input($form) {
    $filtro_parametrai = [];

    foreach ($form['fields'] as $field_id => $field) {
        if ($field['type'] != 'checkbox') {
            $filtro_parametrai[$field_id] = FILTER_SANITIZE_SPECIAL_CHARS;
        } else {
            foreach ($field['name'] as $key => $value) {
                $filtro_parametrai['sav_d'] = [
                    'filter' => FILTER_SANITIZE_STRING,
                    'flags' => FILTER_REQUIRE_ARRAY
                ];
            }
        }
    }

    $filtro_parametrai['action'] = FILTER_SANITIZE_SPECIAL_CHARS;
    $filtro_parametrai['form_index'] = FILTER_SANITIZE_SPECIAL_CHARS;

    return filter_input_array(INPUT_POST, $filtro_parametrai);
}

function validate_form($safe_input, &$form) {
    $success = true;
    foreach ($form['fields'] as $field_id => &$field) {
        foreach ($field['validate'] as $validator) {
            if (is_callable($validator)) {
                if (!$validator($safe_input[$field_id], $field, $safe_input)) {
                    $field['current_choice'] = '';
                    $success = false;
                    break;
                } else {
                    $field['current_choice'] = $safe_input[$field_id];
                }
            } else {
                //$form['callbacks']['fail']['errors_total'][] = "'$validator' funkcija nedeklaruota.";
                throw new Exception(strtr('Not callable @validator function', [
                    '@validator' => $validator
                ]));
            }
        }
    }
    if ($success) {
        $form['validate'] = $form['validate'] ?? [];

        foreach ($form['validate'] as $validator) {
            if (is_callable($validator)) {
                if (!$validator($safe_input, $form)) {
                    //$form['errors'][] = "'$validator' funkcija neleido įrašyti formos.";
                }
            } else {
                $form['errors'][] = "Nurodytas formos lygio validatorius '$validator', "
                        . "tačiau jis nedeklaruotas (funkcijos nėra).";
            }

            $success = empty($form['errors']) ? true : false;
        }
    }

    if ($success) {
        foreach ($form['callbacks']['success'] as $callback) {
            if (is_callable($callback)) {
                $callback($safe_input, $form);
            } else {
                throw new Exception(strtr('Not callable @function function', [
                    '@function' => $callback
                ]));
            }
        }
    } else {
        
    }

    return $success;
}

/**
 * Checks if field is empty
 * 
 * @param string $field_input
 * @param array $field $form Field
 * @return boolean
 */
function validate_not_empty($field_input, &$field, $safe_input) {
    if (!is_array($field_input)) {
        if (strlen($field_input) == 0) {
            $field['error_msg'] = 'error';
        } else {
            return true;
        }
    } else {
        if (count($field_input) == 0) {
            $field['error_msg'] = 'error';
        } else {
            return true;
        }
    }
}

/**
 * Checks if field is a number
 * 
 * @param string $field_input
 * @param array $field $form Field
 * @return boolean
 */
function validate_is_number($field_input, &$field, $safe_input) {
    if (!is_numeric($field_input)) {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field nera skaicius!', ['@field' => $field['label']
        ]);
    } else {
        return true;
    }
}

function logic_daznumas($safe_input, &$form) {
    if ($safe_input['k_sav'] != count($safe_input['sav_d'])) {
        $form['errors'][] = ' - Nėra logikos tarp pasirinktų savaitės dienų ir "kartų į savaitę" skaičiaus.';
        return false;
    }

    return true;
}

function logic_kaina($safe_input, &$form) {
    if ($safe_input['k_sav'] >= 2 && $safe_input['kaina'] >= 40 && $safe_input['su_nuol'] >= 35) {
        return true;
    } elseif ($safe_input['k_sav'] == 1 && $safe_input['kaina'] <= 30 && $safe_input['su_nuol'] <= 25) {
        return true;
    };

    $form['errors'][] = ' - Kaina neatitinka "kartų į savaitę" skaičiaus.';

    return false;
}

function validate_end_month_and_day($safe_input, &$form) {
    if (isset($safe_input['iki_men']) OR isset($safe_input['iki_d'])) {
        if (!is_null($safe_input['iki_men']) && !is_null($safe_input['iki_d'])) {
            return true;
        } elseif (is_null($safe_input['iki_men']) && is_null($safe_input['iki_d'])) {
            return true;
        } else {
            if (is_null($safe_input['iki_men'])) {
                $form['fields']['iki_d']['current_choice'] = $safe_input['iki_d'];
                $form['fields']['iki_men']['error_msg'] = 'error';
            } elseif (is_null($safe_input['iki_d'])) {
                $form['fields']['iki_men']['current_choice'] = $safe_input['iki_men'];
                $form['fields']['iki_d']['error_msg'] = 'error';
            }
            $form['errors'][] = ' - Jeigu pasirinkai pabaigos mėnesį/dieną, tai pasirink ir dieną/mėnesį.';
            return false;
        }
    }
}

function validate_price_and_discount($safe_input, &$form) {
    if (isset($safe_input['kaina']) OR isset($safe_input['su_nuol'])) {
        if (!is_null($safe_input['kaina']) && !is_null($safe_input['su_nuol'])) {
            return true;
        } elseif (is_null($safe_input['kaina']) && is_null($safe_input['su_nuol'])) {
            return true;
        } else {
            if (is_null($safe_input['kaina'])) {
                $form['fields']['su_nuol']['current_choice'] = $safe_input['su_nuol'];
                $form['fields']['kaina']['error_msg'] = 'error';
            } elseif (is_null($safe_input['su_nuol'])) {
                $form['fields']['kaina']['current_choice'] = $safe_input['kaina'];
                $form['fields']['su_nuol']['error_msg'] = 'error';
            }
            $form['errors'][] = ' - Jeigu pasirinkai kainą/nuolaidą, tai pasirink ir nuolaidą/kainą.';
            return false;
        }
    }
}

function validate_special_offer_and_price($safe_input, &$form) {
    if (isset($safe_input['special'])) {
        if (!is_null($safe_input['special'])) {
            if (is_null($safe_input['kaina'])) {
                $form['fields']['special']['current_choice'] = $safe_input['special'];
                $form['fields']['kaina']['error_msg'] = 'error';
                $form['errors'][] = ' - Specialus pasiūlymas? Nurodyk KAINĄ ir nuolaidą.';
                return false;
            } elseif (is_null($safe_input['su_nuol'])) {
                $form['fields']['special']['current_choice'] = $safe_input['special'];
                $form['fields']['su_nuol']['error_msg'] = 'error';
                $form['errors'][] = ' - Specialus pasiūlymas? Nurodyk kainą ir NUOLDAIDĄ.';
                return false;
            }
        }
    }

    return true;
}

function validate_more_than_3ksav($safe_input, &$form) {
    if (count($safe_input['sav_d']) > 2) {
        if (is_null($safe_input['kaina']) && is_null($safe_input['su_nuol'])) {
            $form['fields']['kaina']['error_msg'] = 'error';
            $form['fields']['su_nuol']['error_msg'] = 'error';
            $form['errors'][] = ' - Jeigu pasirinkai daugiau nei 2 k./sav., privalai nurodyti kainą.';
            return false;
        }
    }

    return true;
}
