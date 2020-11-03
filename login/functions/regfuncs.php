<?php
//var_dump('<pre>');
//var_dump($output_regs);
//die();
function make_data($user_regs, $data_box) {
    $output_regs = [];
    foreach ($user_regs as $reg_index => $reg_data) {

        foreach ($data_box['styles'] as $style_data) {
            if (in_array($reg_data['stilius'], $style_data)) {
                $stilius = $style_data;
            }
        }

        foreach ($data_box['cities'] as $city_data) {
            if (in_array($reg_data['miestas'], $city_data)) {
                $miestas = $city_data;
            }
        }

        foreach ($data_box['levels'] as $level_data) {
            if (in_array($reg_data['lygis'], $level_data)) {
                $lygis = $level_data;
            }
        }

        foreach ($data_box['teachers'] as $teacher_data) {
            if (in_array($reg_data['mokytojas'], $teacher_data)) {
                $mokytojas = $teacher_data;
            }
        }
        
        foreach ($data_box['adrs'] as $adr_data) {
            if (in_array($reg_data['adr'], $adr_data)) {
                $adresas = $adr_data;
            }
        }

        if ($reg_data['k_sav'] > 1) {
            $sav_dienos = [];
            foreach ($reg_data['sav_d'] as $day) {
                foreach ($data_box['weekdays'] as $weekday_data) {
                    if (in_array($day, $weekday_data)) {
                        $sav_dienos[] = $weekday_data['short'];
                    }
                }
            }
            $sav_d = implode('/', $sav_dienos);
        } else {
            $sav_d = $reg_data['sav_d'][0];
        }

        $year = (int) date('Y');
        $this_month = (int) date('n');
        foreach ($data_box['months'] as $month_data) {
            if (in_array($reg_data['nuo_men'], $month_data)) {
                $nuo_men = $month_data;
            }
        }
        $nuo_men['num_full'] < $this_month ? $year++ : false;

        $k_sav = $reg_data['k_sav'];

        $nuo_d = [
            'short' => $reg_data['nuo_d'],
            'full' => $reg_data['nuo_d'] < 10 ? '0' . $reg_data['nuo_d'] : $reg_data['nuo_d']
        ];

        $val = [
            'short' => $reg_data['val'],
            'full' => $reg_data['val'] < 10 ? '0' . $reg_data['val'] : $reg_data['val']
        ];

        $min = [
            'short' => $reg_data['min'],
            'full' => $reg_data['min'] < 10 ? '0' . $reg_data['min'] : $reg_data['min']
        ];

//        $nuo_d_short = $reg_data['nuo_d'];
//        $val_short = $reg_data['val'];
//        $min_short = $reg_data['min'];
//        $nuo_d_full = $reg_data['nuo_d'] < 10 ? '0' . $reg_data['nuo_d'] : $reg_data['nuo_d'];
//        $val_full = $reg_data['val'] < 10 ? '0' . $reg_data['val'] : $reg_data['val'];
//        $min_full = $reg_data['min'] < 10 ? '0' . $reg_data['min'] : $reg_data['min'];

        $output_regs[$reg_index]['confirm'] = $stilius['abbr'] . ' ' .
                $miestas['abbr'] . ' ' .
                $adresas['full'] . ' ' .
                $lygis['abbr'] . ' ' .
                $year . '.' .
                $nuo_men['num_full'] . '.' .
                $nuo_d['full'] . ' ' .
                $val['full'] . '.' .
                $min['full'];
        $output_regs[$reg_index]['subject'] = $stilius['full'] . ' INDANCE - nuo ' .
                mb_strtolower($nuo_men['str_posted']) . ' ' .
                $nuo_d['short'] . ' d.';
        $output_regs[$reg_index]['daznumas'] = $k_sav > 1 ? $k_sav . ' kartus į savaitę' : $k_sav . ' kartą į savaitę';
        $output_regs[$reg_index]['kada'] = $sav_d . ' ' . $val['short'] . ' val.';
        $reg_data['min'] != 0 ? $output_regs[$reg_index]['kada'] .= ' ' . $min['short'] . ' min.' : false;

        $output_regs[$reg_index]['pradzia'] = 'Pradžia: ' . mb_strtolower($nuo_men['str_posted']) . ' ' . $nuo_d['short'] . ' d.';
        $output_regs[$reg_index]['mkt_data'] = $mokytojas;
        $output_regs[$reg_index]['adr'] = $adresas['full'] . ', ' . $miestas['full'];
        $output_regs[$reg_index]['adr_data'] = $adresas;
        $output_regs[$reg_index]['kaina'] = 'Kaina: ' . $reg_data['kaina'] . ' eur/žm./mėn.';
        $output_regs[$reg_index]['su_nuol'] = 'Studentams: ' . $reg_data['su_nuol'] . ' eur/žm./mėn.';
        $output_regs[$reg_index]['lygis_data'] = $lygis;
        $output_regs[$reg_index]['sort_criteria'] = $year . $nuo_men['num_full'] . $nuo_d['full'] . '_index_' . $reg_index . '_val_' . $val['full'];
    }

    $array_to_sort = array_column($output_regs, 'sort_criteria');
    sort($array_to_sort);
    $output_regs_sorted = [];

    foreach ($array_to_sort as $value) {
        foreach ($output_regs as $reg_values) {
            if (in_array($value, $reg_values)) {
                $output_regs_sorted[] = $reg_values;
            }
        }
    }

    //var_dump($output_regs_sorted);
    return $output_regs_sorted;
}

function array_to_file($array, $file) {
    $json_array = json_encode($array);
    return file_put_contents($file, $json_array);
}

function file_to_array($file) {
    if (file_exists($file)) {
        $string = file_get_contents($file);
        if ($string !== false) {
            return json_decode($string, true);
        } else {
            throw new Exception(strtr('@file not readable', [
                '@file' => $file
            ]));
        }
    } else {
        throw new Exception(strtr(' @file not exists', [
            '@file' => $file
        ]));
    }
}

function data_box() {
    $data_box = [
        'styles' => [
            'ballroom' => [
                'full' => 'Pramoginiai šokiai',
                'abbr' => 'PRAM'
            ],
            'cubana' => [
                'full' => 'Kubietiška salsa',
                'abbr' => 'CUB'
            ],
            'solo' => [
                'full' => 'Solo Latino',
                'abbr' => 'SOLO'
            ],
            'bachata' => [
                'full' => 'Bachata',
                'abbr' => 'BCH'
            ]
        ],
        'teachers' => [
            'aurimas' => [
                'full' => 'Aurimas Anužis',
                'fname' => 'Aurimas',
                'class' => 'aur',
                'link_local' => '/aurimas',
                'with' => 'Aurimu Anužiu'
            ],
            'nedas' => [
                'full' => 'Nedas Grigaliūnas',
                'fname' => 'Nedas',
                'class' => 'nds',
                'link_local' => '/nedas',
                'with' => 'Nedu Grigaliūnu'
            ],
            'elena' => [
                'full' => 'Elena Leonova',
                'fname' => 'Elena',
                'class' => 'ele',
                'link_local' => '/elena',
                'with' => 'Elena Leonova'
            ],
            'aira' => [
                'full' => 'Aira Anužė',
                'fname' => 'Aira',
                'class' => 'ara',
                'link_local' => '/aira',
                'with' => 'Aira Anuže'
            ]
        ],
        'cities' => [
            'vilnius' => [
                'full' => 'Vilnius',
                'in' => 'Vilniuje',
                'abbr' => 'VLN'
            ],
            'kaunas' => [
                'full' => 'Kaunas',
                'in' => 'Kaune',
                'abbr' => 'KAU'
            ]
        ],
        'levels' => [
            'pradedantiems' => [
                'full' => 'Pradedantiems',
                'abbr' => 'prad.',
                'class' => 'prad'
            ],
            'pazengusiems' => [
                'full' => 'Pažengusiems',
                'abbr' => 'paženg.',
                'class' => 'pazeng'
            ]
        ],
        'months' => [
            'sausis' => [
                'str_full' => 'Sausis',
                'str_posted' => 'Sausio',
                'num_short' => '1',
                'num_full' => '01'
            ],
            'vasaris' => [
                'str_full' => 'Vasaris',
                'str_posted' => 'Vasario',
                'num_short' => '2',
                'num_full' => '02'
            ],
            'kovas' => [
                'str_full' => 'Kovas',
                'str_posted' => 'Kovo',
                'num_short' => '3',
                'num_full' => '03'
            ],
            'balandis' => [
                'str_full' => 'Balandis',
                'str_posted' => 'Balandžio',
                'num_short' => '4',
                'num_full' => '04'
            ],
            'geguze' => [
                'str_full' => 'Gegužė',
                'str_posted' => 'Gegužės',
                'num_short' => '5',
                'num_full' => '05'
            ],
            'birzelis' => [
                'str_full' => 'Birželis',
                'str_posted' => 'Birželio',
                'num_short' => '6',
                'num_full' => '06'
            ],
            'liepa' => [
                'str_full' => 'Liepa',
                'str_posted' => 'Liepos',
                'num_short' => '7',
                'num_full' => '07'
            ],
            'rugpjutis' => [
                'str_full' => 'Rugpjūtis',
                'str_posted' => 'Rugpjūčio',
                'num_short' => '8',
                'num_full' => '08'
            ],
            'rugsejis' => [
                'str_full' => 'Rugsėjis',
                'str_posted' => 'Rugsėjo',
                'num_short' => '9',
                'num_full' => '09'
            ],
            'spalis' => [
                'str_full' => 'Spalis',
                'str_posted' => 'Spalio',
                'num_short' => '10',
                'num_full' => '10'
            ],
            'lapkritis' => [
                'str_full' => 'Lapkritis',
                'str_posted' => 'Lapkričio',
                'num_short' => '11',
                'num_full' => '11'
            ],
            'gruodis' => [
                'str_full' => 'Gruodis',
                'str_posted' => 'Gruodžio',
                'num_short' => '12',
                'num_full' => '12'
            ]
        ],
        'weekdays' => [
            'pirm' => [
                'full' => 'Pirmadieniais',
                'short' => 'Pirmad.',
                'abbr' => '1-dieniais'
            ],
            'antr' => [
                'full' => 'Antradieniais',
                'short' => 'Antrad.',
                'abbr' => '2-dieniais'
            ],
            'trec' => [
                'full' => 'Trečiadieniais',
                'short' => 'Trečiad.',
                'abbr' => '3-dieniais'
            ],
            'ketv' => [
                'full' => 'Ketvirtadieniais',
                'short' => 'Ketvirtad.',
                'abbr' => '4-dieniais'
            ],
            'penk' => [
                'full' => 'Penktadieniais',
                'short' => 'Penktad.',
                'abbr' => '5-dieniais'
            ],
            'sest' => [
                'full' => 'Šeštadieniais',
                'short' => 'Šeštad.',
                'abbr' => '6-dieniais'
            ],
            'sekm' => [
                'full' => 'Sekmadieniais',
                'short' => 'Sekmad.',
                'abbr' => '7-dieniais'
            ]
        ],
        'adrs' => [
            'kareiviu2a' => [
                'full' => 'Kareivių g. 2a',
                'class' => null,
                'link_local' => null,
                'link_google' => ''
            ],
            'virsuliskiu28' => [
                'full' => 'Viršuliškių skg. 28',
                'class' => null,
                'link_local' => null,
                'link_google' => ''
            ],
            'ozo18' => [
                'full' => 'Ozo g. 18 (PPC Ozas)',
                'class' => null,
                'link_local' => null,
                'link_google' => ''
            ],
            'jeruzale' => [
                'full' => 'Jeruzalės g. ...',
                'class' => null,
                'link_local' => null,
                'link_google' => 'https://www.google.com/maps/place/Jeruzal%C4%97s+g.,+Vilnius/@54.7444587,25.2773961,17z/data=!3m1!4b1!4m5!3m4!1s0x46dd9121a158ddbf:0xc223ac9060262c9f!8m2!3d54.7444556!4d25.2795848'
            ],
            'laisves60' => [
                'full' => 'Justiniškių g. 8',
                'class' => null,
                'link_local' => null,
                'link_google' => 'https://www.google.com/maps/place/Justini%C5%A1ki%C5%B3+g.+8,+Vilnius+05120/@54.7032411,25.2180985,17z/data=!3m1!4b1!4m5!3m4!1s0x46dd93db3a0a4d13:0xb586f1e4a9e9c67e!8m2!3d54.703238!4d25.2202872'
            ],
            'upes9' => [
                'full' => 'Upės g. 9 (CUP)',
                'class' => null,
                'link_local' => null,
                'link_google' => 'https://www.google.lt/maps/place/Up%C4%97s+g.+9,+Vilnius+08106/@54.6938646,25.2739885,17z/data=!3m1!4b1!4m5!3m4!1s0x46dd940759d053bb:0x9bd2bfdf89d29379!8m2!3d54.6938615!4d25.2761771?hl=lt'
            ],
            'konarskio34' => [
                'full' => 'S. Konarskio g. 34',
                'class' => 'konarskio',
                'link_local' => null,
                'link_google' => 'https://www.google.lt/maps/place/Vilniaus+Jono+Basanavi%C4%8Diaus+Gimnazija/@54.6751372,25.2423497,17z/data=!3m1!4b1!4m5!3m4!1s0x46dd9388221cd46d:0xec8fff1d2ca4924d!8m2!3d54.6751341!4d25.2445384'
            ],
            'zirmunu106' => [
                'full' => 'Žirmūnų g. 106',
                'class' => null,
                'link_local' => null,
                'link_google' => 'https://www.google.com/maps/place/%C5%BDirm%C5%ABn%C5%B3+g.+106,+Vilnius+09123/@54.725833,25.2973376,17z/data=!3m1!4b1!4m5!3m4!1s0x46dd96cb6191d9c7:0x48702c4fae9ed901!8m2!3d54.725833!4d25.2995262'
            ],
            'mokslininku12' => [
                'full' => 'Mokslininkų g. 12',
                'class' => null,
                'link_local' => null,
                'link_google' => 'https://www.google.com/maps/place/Mokslinink%C5%B3+g.+12,+Vilnius+08412/@54.753036,25.2614732,17z/data=!3m1!4b1!4m5!3m4!1s0x46dd90e2ca78c549:0x673a5ae3b05e312b!8m2!3d54.753036!4d25.2636619'
            ],
            'ukmerges234a' => [
                'full' => 'Ukmergės g. 234a',
                'class' => 'ukmrg',
                'link_local' => '/ukmerges234a',
                'link_google' => 'https://www.google.com/maps/place/Ukmerg%C4%97s+g.+234A,+Vilnius+07160/@54.7194705,25.2397138,17z/data=!3m1!4b1!4m5!3m4!1s0x46dd91666bad038f:0xa30161040654f436!8m2!3d54.7194705!4d25.2419024'
            ],
            'lukiskiu5' => [
                'full' => 'Lukiškių skg. 5',
                'class' => null,
                'link_local' => null,
                'link_google' => 'https://www.google.com/maps/place/Luki%C5%A1ki%C5%B3+skg.+5,+Vilnius+01109/@54.692804,25.2637622,17z/data=!3m1!4b1!4m5!3m4!1s0x46dd9407dd8ce74f:0x725b497446ee9650!8m2!3d54.692804!4d25.2659509'
            ],
            'vilniaus39' => [
                'full' => 'Vilniaus g. 39',
                'class' => 'mktnm',
                'link_local' => '/vilniaus39',
                'link_google' => 'https://www.google.com/maps/place/Vilniaus+g.+39,+Vilnius+01402/@54.6819616,25.2776164,17z/data=!3m1!4b1!4m5!3m4!1s0x46dd9413c0c4c1d3:0xfbb10e0618286251!8m2!3d54.6819585!4d25.2798051'
            ]
        ]
    ];

    return $data_box;
}

?>