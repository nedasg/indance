<?php
mb_internal_encoding('UTF-8');
$url_arr = array_filter(explode('/', $_SERVER["DOCUMENT_ROOT"]));
array_pop($url_arr);
$url_arr[] = 'db_files';
$db_files = '/' . implode('/', $url_arr) . '/';
define('REG_FILE', $db_files . 'regs.json');
require $_SERVER["DOCUMENT_ROOT"] . '/login/functions/regfuncs.php';
$existing_regs = file_to_array(REG_FILE);
$get_regs_with = ['Aira Anužė'];

if (!empty($existing_regs)) {
    $user_regs = [];

    foreach ($existing_regs as $key => $array) {
        foreach ($get_regs_with as $string) {
            if (in_array($string, $array)) {
                $user_regs[] = $existing_regs[$key];
            }
        }
    };

    if (!empty($user_regs)) {
        $data_box = data_box();
        $forms = make_data($user_regs, $data_box);
    }
}
?>
<?php if ($forms): ?>
<?php foreach ($forms as $form_num => $form_data): ?>
    <table class="reg <?php print $form_data['lygis_data']['class']; ?>">
        <tr>
            <td>
                <form onsubmit="validate()" method="post" target="_self" enctype="multipart/form-data">
                    <input placeholder="Jūsų vardas ir pavardė" class="name" name="name" type="text">
                    <input <?php if (strpos($form_data['subject'], 'Solo Latino') !== false) { print 'style="display: none;" value="Solo"'; }; ?> placeholder="Partnerio(-ės) vardas ir pavardė" class="partner" name="partner" type="text">
                    <input placeholder="Jūsų el. pašto adresas" class="email" name="email" type="email">
                    <input placeholder="Jūsų mob. tel. nr." class="phone" name="phone" type="text">
                    <input placeholder="Kas Jums mus rekomendavo?" class="recommend" name="recommend" type="text">
                    <input value="<?php print $form_data['confirm']; ?>" class="confirm" name="confirm" type="hidden">
                    <input value="<?php print $form_data['subject']; ?>" class="subject" name="subject" type="hidden">
                    <button class="reg-btn" type="submit"><span>Siųsti</span></button>
                    <div class="toShow cancel"><span>Atsisakyti</span></div>
                </form>
                <div class="reg-div"><span><?php print $form_data['daznumas']; ?></span></div>
                <div class="reg-div"><?php print $form_data['pradzia']; ?></div>
                <div class="reg-div"><?php print $form_data['kada']; ?></div>
                <div class="reg-div">
                    Mokytoja: 
                    <a class="a-mkt <?php print $form_data['mkt_data']['class']; ?>" 
                       href="<?php print $form_data['mkt_data']['link_local']; ?>">
                           <?php print $form_data['mkt_data']['fname']; ?>
                    </a>
                </div>
                <div class="reg-div">
                    <a target="_blank" 
                       class="<?php print !is_null($form_data['adr_data']['class']) ? 'a-map ' . $form_data['adr_data']['class'] : false; ?>" 
                       href="<?php print !is_null($form_data['adr_data']['link_local']) ? $form_data['adr_data']['link_local'] : $form_data['adr_data']['link_google']; ?>">
                          <?php print $form_data['adr']; ?>
                    </a>
                </div>
                <div class="reg-div kaina"><?php print $form_data['kaina']; ?></div>
                <div class="reg-btn toHide"><span>Registruotis</span></div>
                <div class="reg-div kaina"><?php print $form_data['su_nuol']; ?></div>
            </td>
        </tr>
    </table>
<?php endforeach; ?>
<?php endif; ?>

<div class="pasiulymo-nera">Šiuo metu, laisvų vietų nėra...</div>

<script src="/js/regscript.js"></script>