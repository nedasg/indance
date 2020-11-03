<?php
  $INC_DIR2 = $_SERVER["DOCUMENT_ROOT"]. "/inc/pramoginiai/";
  $INC_DIR1 = $_SERVER["DOCUMENT_ROOT"]. "/inc/";
  $title = "Pramoginiai šokiai | INDANCE Šokių Pramogos";
  $description = "Pramoginių šokių muzikos biblioteka - dainos ir atlikėjai Jūsų mokymuisi ir vakarėliams | INDANCE Šokių Pramogos";
  $keywords = "";
  $author ="INDANCE Šokių Pramogos";
  $metaPropOgUrl = "http://www.indance.lt/pramoginiai-sokiai/";
  $metaPropOgTitle = "Pramoginiai šokiai Vilniuje ir Kaune - laikas Jums ir Jūsų porai!";
  $metaPropOgDescription = "";
  $metaPropOgImage = "http://www.indance.lt/images/logo.fb.share.small.200x200.png";
  $titlezoneTitle = 'Pramoginiai šokiai';
  $titlezoneSubTitle = 'Vilniuje';
  $cvPhone = "685 37785";
  $cvEmail = "info@indance.lt";
  $cvFb = 'https://www.facebook.com/pages/INDANCE-Entertainment/37125973970';
  $cvMusic = '/pramoginiai-sokiai/muzika';
  $displayMuz = "showLib";
?>
<?php require($INC_DIR1. "head.php"); ?>

<script>
imgDir = "/images/pramoginiai/";
$("#mi-muzika").show();
</script>

<article class="art" id="art-muz"><h2 style="display: none;">1</h2>
  <?php require($INC_DIR2. "muzika.php"); ?>
</article>

<?php require($INC_DIR1. "foot.php"); ?>