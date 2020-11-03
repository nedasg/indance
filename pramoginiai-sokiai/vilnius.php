<?php
  $INC_DIR3 = $_SERVER["DOCUMENT_ROOT"]. "/inc/pramoginiai/vilnius/";
  $INC_DIR2 = $_SERVER["DOCUMENT_ROOT"]. "/inc/pramoginiai/";
  $INC_DIR1 = $_SERVER["DOCUMENT_ROOT"]. "/inc/";
  $INC_DIR = $_SERVER["DOCUMENT_ROOT"]. "/";
  $title = "Pramoginių šokių pamokos Vilniuje | INDANCE";
  $description = "Kaip smagiai praleisti laiką dviese? Trumpiausiu keliu užsukite į INDANCE ir patirkite daugybę malonių dalykų. Studentams ir jau dirbantiems, nebijantiems tobulėti ir vertinantiems laiką - šokių pamokos ir vakarai, kuriais Vilnius džiaugiasi jau 10 metų!";
  $keywords = "pramoginiai sokiai vilniuje, pramoginiai šokiai vilniuje, pramoginių šokių pamokos vilniuje, pramoginiu sokiu pamokos vilniuje, sokiu kursai vilniuje, šokių kursai vilniuje, sokiu pamokos vilniuje, šokių pamokos vilniuje";
  $author ="INDANCE Šokių Pramogos";
  $metaPropOgUrl = "http://www.indance.lt/pramoginiai-sokiai/vilnius/";
  $metaPropOgTitle = "Pramoginiai šokiai Vilniuje - laikas Jums ir Jūsų porai!";
  $metaPropOgDescription = "";
  $metaPropOgImage = "http://www.indance.lt/images/logo.fb.share.small.200x200.png";
  $titlezoneTitle = 'Pramoginiai šokiai';
  $titlezoneSubTitle = 'Vilniuje';
  $cvPhone = "685 37785";
  $cvEmail = "info@indance.lt";
  $cvFb = 'https://www.facebook.com/PramoginiaiSokiaiVilniuje/';
  $cvMusic = '/pramoginiai-sokiai/muzika';
  $phchanger = "y"; $imgDir = $INC_DIR . 'images/pramoginiai/';
  $vdplayer = "y"; $videoFile = '/video/pramoginiai/indance-sokiu-pramogos-pramoginiai-sokiai';
  $regOtherStyle = "Pramoginiai";
  $regOtherCity = "Vilnius";
?>
<?php require($INC_DIR1. "head.php"); ?>
<script>
imgDir = "/images/pramoginiai/";
$("#mi-muzika").show();
</script>

<article class="art"><h2 style="display: none;">1</h2>
  <?php require($INC_DIR3. "vilnius.php"); ?>
</article>

<?php require($INC_DIR1. "foot.php"); ?>