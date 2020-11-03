<?php
  $INC_DIR3 = $_SERVER["DOCUMENT_ROOT"]. "/inc/pramoginiai/vilnius/";
  $INC_DIR2 = $_SERVER["DOCUMENT_ROOT"]. "/inc/pramoginiai/";
  $INC_DIR1 = $_SERVER["DOCUMENT_ROOT"]. "/inc/";
  $INC_DIR = $_SERVER["DOCUMENT_ROOT"]. "/";
  $title = "Pramoginiai šokiai Vilniuje ir Kaune | Šokių pamokos INDANCE";
  $description = "Kokybiškas poilsis ir šokių pamokos suaugusiems. Sumanus būdas pabūti kartu, pailsėti po darbų ir gerai praleisti laiką – pramoginių šokių kursai Jums ir Jūsų porai!";
  $keywords = "pramoginiai sokiai, pramoginiai šokiai, pramoginių šokių pamokos, pramoginiu sokiu pamokos";
  $author ="INDANCE Šokių Pramogos";
  $metaPropOgUrl = "http://www.indance.lt/pramoginiai-sokiai/";
  $metaPropOgTitle = "Pramoginiai šokiai INDANCE - puikus būdas praleisti laiką dviese!";
  $metaPropOgDescription = "Jei jūs ieškote to, kas teiktų džiaugsmą, atgaivintų sielą, leistų užmiršti kasdieninius darbus ir rūpesčius, tai pramoginiai šokiai galėtų būti sumanus pasirinkimas.";
  $metaPropOgImage = "http://www.indance.lt/images/logo.fb.share.small.200x200.png";
  $titlezoneTitle = 'Pramoginiai šokiai';
  $titlezoneSubTitle = 'Vilniuje';
  $cvPhone = "685 37785";
  $cvEmail = "info@indance.lt";
  $cvFb = 'https://lt-lt.facebook.com/pages/INDANCE-Entertainment/37125973970';
  $cvMusic = '/pramoginiai-sokiai/muzika';
  $phchanger = "y"; $imgDir = $INC_DIR . 'images/pramoginiai/';
  $vdplayer = "y"; $videoFile = '/video/pramoginiai/indance-sokiu-pramogos-pramoginiai-sokiai';
?>
<?php require($INC_DIR1. "head.php"); ?>

<script>
imgDir = "/images/pramoginiai/";
$("#mi-muzika").show();
</script>

<article class="art"><h2 style="display: none;">1</h2>
  <?php require($INC_DIR2. "pramoginiai-sokiai.php"); ?>
</article>

<?php require($INC_DIR1. "foot.php"); ?>