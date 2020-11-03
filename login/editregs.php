<?php
require_once 'bootstrap.php';
session_start();
$user = $_SESSION['user_name'] ?? false;
$session_id = $_SESSION['session_id'] ?? false;

$week_days = ['Pirmadieniais', 'Antradieniais', 'Trečiadieniais', 'Ketvirtadieniais', 'Penktadieniais', 'Šeštadieniais', 'Sekmadieniais'];
$months = ['Sausio', 'Vasario', 'Kovo', 'Balandžio', 'Gegužės', 'Birželio', 'Liepos', 'Rugpjūčio', 'Rugsėjo', 'Spalio', 'Lapkričio', 'Gruodžio'];
$month_days = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31];
$hours = [10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22];
$minutes = ['0', 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55];
$adresai = ['Kareivių g. 2a', 'Viršuliškių skg. 28', 'Ozo g. 18 (PPC Ozas)', 'Jeruzalės g. ...', 'Justiniškių g. 8', 'S. Konarskio g. 34', 'Lukiškių skg. 5', 'Upės g. 9 (CUP)', 'Vilniaus g. 39', 'Vilniaus g. 32', 'Mokslininkų g. 12', 'Žirmūnų g. 106', 'Ukmergės g. 234a'];
sort($adresai);
$user_default_address = '';
$kainos = [20, 25, 30, 35, 40, 45, 50];

$stilius = [];
$miestas = ['Vilniuje'];
$mokytojai = [];

switch ($user) {
    case "Aurimas Anužis":
        $user_kieno = 'Aurimo';
        $user_kreip = 'Aurimai';
        $user_su_kuo = 'Aurimu Anužiu';
        $stilius[] = 'Pramoginiai šokiai';
        $stiliai = ['Lotynų Amerikos', 'Pramoginiai šokiai'];
        $mokytojai[] = 'Aurimas Anužis';
        $user_default_address = 'Kareivių g. 2a';
        break;
    case "Nedas Grigaliūnas":
        $user_kieno = 'Nedo';
        $user_kreip = 'Nedai';
        $user_su_kuo = 'Nedu Grigaliūnu';
        $stilius[] = 'Kubietiška salsa';
        $stiliai = ['Kubietiška salsa', 'Rueda de Casino'];
        $mokytojai[] = 'Nedas Grigaliūnas';
        $user_default_address = 'Upės g. 9 (CUP)';
        break;
    case "Elena Leonova":
        $user_kieno = 'Elenos';
        $user_kreip = 'Elena';
        $user_su_kuo = 'Elena Leonova';
        $stilius[] = 'Solo Latino';
        $stiliai = ['Solo Latino', 'Solo Latino (intensyviai)'];
        $mokytojai[] = 'Elena Leonova';
        $user_default_address = null;
        break;
    case "Aira Anužė":
        $user_kieno = 'Airos';
        $user_kreip = 'Aira';
        $user_su_kuo = 'Aira Anuže';
        $stilius[] = 'Solo Latino';
        $stiliai = ['Solo Elegante', 'Solo Latino'];
        $mokytojai[] = 'Aira Anužė';
        $user_default_address = null;
        break;
};

$reg_form_to_edit = [
    'fields' => [
        'stilius' => [
            'label' => '',
            'type' => 'radio',
            'required' => true,
            'value' => $stilius,
            'validate' => [
                'validate_not_empty',
            ]
        ],
        'mokytojas' => [
            'label' => '',
            'type' => 'radio',
            'required' => true,
            'value' => $mokytojai,
            'validate' => [
                'validate_not_empty',
            ]
        ],
        'sav_d' => [
            'label' => 'Savaitės dienomis:',
            'type' => 'checkbox',
            'required' => true,
            'name' => $week_days,
            'validate' => [
                'validate_not_empty',
            ]
        ],
        'val' => [
            'label' => 'Valanda:',
            'type' => 'select',
            'required' => true,
            'options' => $hours,
            'selected' => null,
            'css_class' => 'input-small',
            'validate' => [
                'validate_not_empty',
            ]
        ],
        'min' => [
            'label' => 'min.:',
            'type' => 'select',
            'required' => true,
            'options' => $minutes,
            'selected' => null,
            'css_class' => 'input-small',
            'validate' => [
                'validate_not_empty',
            ]
        ],
        'nuo_men' => [
            'label' => 'Nuo mėnesio:',
            'type' => 'select',
            'required' => true,
            'class' => '',
            'options' => $months,
            //'selected' => $months[date('n') - 1],
            'selected' => null,
            'css_class' => 'input-small',
            'validate' => [
                'validate_not_empty',
            ]
        ],
        'nuo_d' => [
            'label' => 'dienos:',
            'type' => 'select',
            'required' => true,
            'options' => $month_days,
            //'selected' => date('j'),
            'selected' => null,
            'css_class' => 'input-small',
            'validate' => [
                'validate_not_empty',
            ]
        ],
        'adr' => [
            'label' => 'Adresu:',
            'type' => 'select',
            'required' => true,
            'options' => $adresai,
            'selected' => $user_default_address,
            'css_class' => 'input-medium',
            'validate' => [
                'validate_not_empty',
            ]
        ],
        'special' => [
            'label' => 'Spec. pasiūlymas:',
            'type' => 'select',
            'required' => false,
            'options' => ['Intensyvus kursas!', 'Akcija!'],
            'selected' => null,
            'css_class' => 'input-medium display-none',
            'validate' => [
            ]
        ],
        'iki_men' => [
            'label' => 'Iki mėnesio:',
            'type' => 'select',
            'required' => false,
            'options' => $months,
            'selected' => null,
            'css_class' => 'input-small display-none',
            'validate' => [
            ]
        ],
        'iki_d' => [
            'label' => 'dienos:',
            'type' => 'select',
            'required' => false,
            'options' => $month_days,
            'selected' => null,
            'css_class' => 'input-small display-none',
            'validate' => [
            ]
        ],
        'kaina' => [
            'label' => 'Kaina:',
            'type' => 'select',
            'required' => true,
            'options' => $kainos,
            'selected' => null,
            'css_class' => 'input-small display-none',
            'validate' => [
            ]
        ],
        'su_nuol' => [
            'label' => 'Studentams:',
            'type' => 'select',
            'required' => true,
            'options' => $kainos,
            'selected' => null,
            'css_class' => 'input-small display-none',
            'validate' => [
            ]
        ],
        'lygis' => [
            'label' => 'Lygis:',
            'type' => 'select',
            'required' => false,
            'options' => ['Pradedantiems', 'Pažengusiems'],
            'selected' => 'Pradedantiems',
            'css_class' => 'input-small',
            'validate' => [
                'validate_not_empty',
            ]
        ],
        'miestas' => [
            'label' => 'Miestas:',
            'type' => 'radio',
            'required' => true,
            'value' => ['Vilnius'],
            'validate' => [
                'validate_not_empty',
            ]
//        'miestas' => [
//            'label' => '',
//            'type' => 'select',
//            'required' => false,
//            'options' => ['Vilniuje', 'Kaune'],
//            'selected' => 'Vilniuje',
//            'css_class' => 'input-small',
//            'validate' => [
//                'validate_not_empty',
//            ]
        ]
    ],
    'buttons' => [
        'submit' => [
            'text' => 'Paskelbti'
        ]
    ],
    'validate' => [
        'sessid_check',
        'validate_end_month_and_day',
        'validate_price_and_discount',
        'validate_special_offer_and_price',
        'validate_more_than_3ksav'
    ],
    'callbacks' => [
        'success' => [
            'form_success'
        ],
        'fail' => []
    ],
    'form_index' => [
        'type' => 'hidden',
        'name' => 'form_index',
        'value' => null
    ],
    'errors' => []
];

function choose_selected(&$field, $option_value) {
    if (isset($field['current_choice']) && $field['current_choice'] == $option_value) {
        $field['selected'] = $field['current_choice'];
        return 'selected';
    } elseif (count($field['options']) == 1) {
        return 'selected';
    } elseif ($field['selected'] == $option_value) {
        return 'selected';
    }

    return false;
}

function form_success($safe_input, &$form) {
    $form['form_index']['value'] = $safe_input['form_index'];
    unset($safe_input['action']);
    unset($safe_input['form_index']);

    foreach ($safe_input as $field_id => $field_value) {
        $form['fields'][$field_id]['current_choice'] = $field_value;
    }
}

$sessid_check = sessid_check();
$show_form = false;

if (isset($_SESSION['user_name']) && $sessid_check) {
    $show_form = true;
    //var_dump($sessid_check);

    if (!empty($_POST)) {
        $safe_input = get_safe_input($reg_form_to_edit);
        $form_success = validate_form($safe_input, $reg_form_to_edit);
        //var_dump($safe_input);

        // Kodas yra parašytas taip, kad editregs.php failas gali būti 
        // paleidžiamas ne tik tiesiogiai, bet ir submit'inant formą iš 
        // currentregs.php failo. Tokiu atveju, $_POST'as turi 
        // 'action' => 'edit' bei 'form_index' => 'kažkoks skaičius', 
        // kuris yra mokytojo turimų registracijų index'as. $_POST'o duomenys 
        // yra įrašomi į $reg_form_to_edit prieš išspausdinant formą html'e.
        // Nuo šio if'o prasideda atvejai, kai user'iui užpildžius 
        // editregs.php esančią formą, duomenys yra ne tik siunčiami į 
        // failą, bet ir įrašomi/redaguojami jame.
        if ($form_success && $safe_input['action'] != 'edit') {
            unset($safe_input['form_index']);
            
            $safe_input['k_sav'] = count($safe_input['sav_d']);
            if (!isset($safe_input['iki_men']) OR is_null($safe_input['iki_men'])) {
                $safe_input['iki_men'] = null;
            }
            if (!isset($safe_input['iki_d']) OR is_null($safe_input['iki_d'])) {
                $safe_input['iki_d'] = null;
            }
            if (!isset($safe_input['lygis']) OR is_null($safe_input['lygis'])) {
                $safe_input['lygis'] = 'pradedantiems';
            }
            if (!isset($safe_input['miestas']) OR is_null($safe_input['miestas'])) {
                $safe_input['miestas'] = 'Vilniuje';
            }
            if (!isset($safe_input['special']) OR is_null($safe_input['special'])) {
                $safe_input['special'] = null;
            }
            if (!isset($safe_input['kaina']) OR is_null($safe_input['kaina'])) {
                $safe_input['kaina'] = ($safe_input['k_sav'] < 2) ? 35 : 50;
            }
            if (!isset($safe_input['su_nuol']) OR is_null($safe_input['su_nuol'])) {
                $safe_input['su_nuol'] = ($safe_input['k_sav'] < 2) ? 30 : 40;
            }
            

            if (file_exists(REG_FILE)) {
                $regs_array = file_to_array(REG_FILE);
                $teacher_regs_array = [];

                // Iš visų failo masyvų, išimam tik su $user susijusius
                // masyvus. Juos sukeliam į naują $teacher_regs_array 
                // masyvą ir tuo pačiu pašalinam šiuos masyvus iš bendro 
                // ($regs_array) masyvo.
                foreach ($regs_array as $index => $reg_array) {
                    if (in_array($user, $reg_array)) {
                        $teacher_regs_array[] = $regs_array[$index];
                        unset($regs_array[$index]);
                    }
                }

                // Šitas if'as sukuria pagrindinius duomenis, kurie yra skirti
                // įrašymui į registracijų failą. Jeigu formos index'as 
                // ne skaičius (pvz. null), tai kuriama nauja forma. 
                // Jeigu formos index'as yra skaičius, tai jis reprezentuoja
                // formą, kurią reikia redaguoti arba ištrinti.
                $target_index = $reg_form_to_edit['form_index']['value'];
                if (is_numeric($target_index)) {
                    switch ($safe_input['action']) {
                        // Forma yra redaguojama (action - submit && is_numeric):
                        case 'submit':
                            unset($safe_input['action']);
                            $teacher_regs_array[$target_index] = $safe_input;
                            break;
                        // Forma yra pašalinama (action - delete && is_numeric): 
                        case 'delete':
                            unset($teacher_regs_array[$target_index]);
                            break;
                        // Kas tas default? ;)
                        default:
                            break;
                    }
                } else {
                    // Kuriama visiškai nauja forma (action - submit && is_not_numeric):
                    unset($safe_input['action']);
                    $regs_array[] = $safe_input;
                }

                // Jeigu, switch'o metu, $teacher_regs_array duomenys kažkaip
                // pasikeitė, tai dabar jie yra įrašomi į pagrindinį masyvą 
                // ($regs_array), kuris bus siunčiamas įrašymui į failą.
                foreach ($teacher_regs_array as $teacher_reg) {
                    $regs_array[] = $teacher_reg;
                };
            } else {
                // Jeigu failas pasirodė tuščias, tai sukuriam pagrindinį 
                // masyvą $regs_array ir priskiriam jam user'io unput'ą:
                unset($safe_input['action']);
                $regs_array = [$safe_input];
            }

            // Siunčiame $regs_array masyvą įrašymui į failą, tik prieš tai dar 
            // "sutvarkome" jį kad nebūtų gap'ų index'uose (array_values):
            array_to_file(array_values($regs_array), REG_FILE);
            header('Location: /login/currentregs.php');
            exit();
        }
    }
}
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cardo:400,700|Oswald" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0"/>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <title>Regs Editor INDANCE</title>
    </head>
    <body>
        <div class="layout">
            <div class="content-left">     
                <!-- Navigation -->    
                <?php require 'objects/navigation.php'; ?>
                <!-- Content -->    
                <?php if ($show_form): ?>
                    <?php if (!isset($safe_input['form_index'])): ?>
                        <h5 class="main-msg">Užpildyk formą naujam registracijos skelbimui</h5>
                    <?php else: ?>
                        <h5 class="main-msg">Esamos registracijos redagavimas</h5>
                    <?php endif; ?>
                    <!-- Form -->        
                    <?php require 'objects/editregform.php'; ?>
                <?php else: ?>
                    <?php if (isset($_SESSION['user_name'])): ?>
                        <h5>Ups, no form <a href="/login/currentregs.php">selected...</a></h5>
                    <?php elseif (!$sessid_check): ?>
                        <h5>Nenaudėli, buvai prisijungęs kažkur kitur?<br>Už tai dabar turi prisi'log'inti <a href="/login.php">čia</a> iš naujo!</h5>
                    <?php else: ?>
                        <h5>Kaip tu čia patekai? <a href="/login.php">Identifikuokis!</a></h5>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="content-right">
                <?php require 'calendar.php'; ?>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.forms-container').css("visibility", "visible").hide().fadeIn(200);
        });
    </script>
</html>