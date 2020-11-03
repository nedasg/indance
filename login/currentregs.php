<?php
require_once 'bootstrap.php';
session_start();
$user = $_SESSION['user_name'] ?? false;
$session_id = $_SESSION['session_id'] ?? false;

switch ($user) {
    case "Aurimas Anužis":
        $user_kieno = 'Aurimo';
        $user_kreip = 'Aurimai';
        $user_su_kuo = 'Aurimu Anužiu';
        $stilius[] = 'Pramoginiai šokiai';
        $stiliai = ['Lotynų Amerikos', 'Pramoginiai šokiai'];
        $mokytojai[] = 'Aurimas Anužis';
        $user_default_address = 'Tauro g. 20';
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
        $user_default_address = 'Lukiškių skg. 5';
        break;
    case "Aira Anužė":
        $user_kieno = 'Airos';
        $user_kreip = 'Aira';
        $user_su_kuo = 'Aira Anuže';
        $stilius[] = 'Solo Latino';
        $stiliai = ['Solo Elegante', 'Solo Latino'];
        $mokytojai[] = 'Aira Anužė';
        $user_default_address = 'default';
        break;
};

function generateRegs($existing_regs, $user_su_kuo) {
    foreach ($existing_regs as $reg_index => $reg_data) {
        $forms[$reg_index] = [
            'fields' => [
                'stilius' => [
                    'label' => '',
                    'type' => 'hidden',
                    'validate' => [
                        'validate_not_empty',
                    ]
                ],
                'special' => [
                    'label' => '',
                    'type' => 'hidden',
                    'validate' => [
                        'validate_not_empty',
                    ]
                ],
                'lygis' => [
                    'label' => '',
                    'type' => 'hidden',
                    'validate' => [
                        'validate_not_empty',
                    ]
                ],
                'mokytojas' => [
                    'label' => '',
                    'type' => 'hidden',
                    'validate' => [
                        'validate_not_empty',
                    ]
                ],
                'adr' => [
                    'label' => '',
                    'type' => 'hidden',
                    'validate' => [
                        'validate_not_empty',
                    ]
                ],
                'miestas' => [
                    'label' => '',
                    'type' => 'hidden',
                    'validate' => [
                        'validate_not_empty',
                    ]
                ],
                'k_sav' => [
                    'label' => '',
                    'type' => 'hidden',
                    'validate' => [
                        'validate_not_empty',
                    ]
                ],
                'sav_d' => [
                    'label' => '',
                    'type' => 'hidden',
                    'validate' => [
                    ]
                ],
                'val' => [
                    'label' => '',
                    'type' => 'hidden',
                    'validate' => [
                        'validate_not_empty',
                    ]
                ],
                'min' => [
                    'label' => '',
                    'type' => 'hidden',
                    'validate' => [
                        'validate_not_empty',
                    ]
                ],
                'nuo_men' => [
                    'label' => '',
                    'type' => 'hidden',
                    'validate' => [
                        'validate_not_empty',
                    ]
                ],
                'nuo_d' => [
                    'label' => '',
                    'type' => 'hidden',
                    'validate' => [
                        'validate_not_empty',
                    ]
                ],
                'iki_men' => [
                    'label' => '',
                    'type' => 'hidden',
                    'validate' => [
                        'validate_not_empty',
                    ]
                ],
                'iki_d' => [
                    'label' => '',
                    'type' => 'hidden',
                    'validate' => [
                        'validate_not_empty',
                    ]
                ],
                'kaina' => [
                    'label' => '',
                    'type' => 'hidden',
                    'validate' => [
                        'validate_not_empty',
                    ]
                ],
                'su_nuol' => [
                    'label' => '',
                    'type' => 'hidden',
                    'validate' => [
                        'validate_not_empty',
                    ]
                ]
//               ,
//                'lygis' => [
//                    'label' => '',
//                    'type' => 'hidden',
//                    'validate' => [
//                        'validate_not_empty',
//                    ]
//                ]
            ],
            'buttons' => [
                'edit' => [
                    'text' => 'Redaguoti',
                    'value' => $reg_index
                ],
                'delete' => [
                    'text' => 'Ištrinti',
                    'value' => $reg_index
                ]
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
                'value' => ''
            ]
        ];

        generateOutputText($forms, $reg_index, $reg_data, $user_su_kuo); // app.php
    }
    
    if (isset($forms)) {
        return $forms;
    } else {
        return false;
    };
}

$sessid_check = sessid_check();

// Šitas if'as išrenka registracijų faile esančias formas pagal 
// $_SESSION'e už'save'intą ['user_name'], tada pa'call'ina 
// generateRegs() funkciją, kuri gražina išspausdinimui į HTML 
// paruoštą tų formų masyvą
if (isset($_SESSION['user_name']) && $sessid_check) {
    $existing_regs = file_to_array(REG_FILE);

    if (!empty($existing_regs)) {
        $user_regs = [];

        foreach ($existing_regs as $key => $value) {
            if (in_array($user, $value)) {
                $user_regs[] = $existing_regs[$key];
            }
        };

        $forms = generateRegs($user_regs, $user_su_kuo);
    }
}

$show_forms = !empty($forms) ? true : false;
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
        <title>Aktyvios <?php print $user_kieno; ?> registracijos</title>
    </head>
    <body>
        <div class="layout">
            <div class="content-left">
                <!-- Navigation -->    
                <?php require 'objects/navigation.php'; ?>        

                <!-- Content -->    
                <?php if ($show_forms): ?>
                    <h5 class="main-msg"><?php print $user_kreip; ?>, dabar aktyvūs tavo skelbimai:</h5>
                    <!-- Form -->        
                    <?php require 'objects/currentforms.php'; ?>
                <?php else: ?>
                    <?php if (isset($_SESSION['user_name'])): ?>
                        <h5><?php print $user_kreip; ?>, nėra/nebėra nė vienos aktyvios tavo registracijos!</h5>
                        <h5><a href="/login/editregs.php">Paskelbti naują!</a></h5>
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
            $('.forms-container').css("visibility", "visible").hide().fadeIn(200);;
        });
    </script>
</html>