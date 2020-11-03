<?php
  $INC_DIR1 = $_SERVER["DOCUMENT_ROOT"]. "/inc/";
  $INC_DIR2 = $_SERVER["DOCUMENT_ROOT"]. "/inc/sales/";
  $title = "Vilniaus g. 39, Vilnius | INDANCE Šokių Pramogos";
  $titlezoneTitle = '<span style="font-size: 0.9em;">Vilniaus g. 39, Vilnius</span>';
  $titlezoneSubTitle = '„Vilniaus mokytojų<br>namai”';
  $description = "";
  $displayMap = 'vilniaus39';
?>
<?php require($INC_DIR1. "head.php"); ?>

<script>
$(document).ready(function() {
  if (screen.width < screen.height) {
    $("#menu-bottom .contacts-item").hide();
    $("#menu-bottom .contacts-item:first").show();
    $("#menu-bottom .contacts-item.back").show();
  } else {
      $("#menu-bottom .contacts-item").hide();
      $("#menu-bottom .contacts-item.back").show();
    }
});
</script>

<article class="art" id="art-map">
Pastatas yra prie pat šv. Kotrynos bažnyčios ir kavinės "Balti Drambliai" - kitoje sankryžos pusėje. Įėję pro pagrindinį 
įėjimą pamatysite budėtoją. Pasiteiraukite jo kelio į šokių salę, kuri bus antrame aukšte ir pažymėta numeriu 219.
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2306.5721587208873!2d25.279805099999994!3d54.68195850000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd9413c0c4c1d3%3A0xfbb10e0618286251!2sVilniaus+g.+39%2C+Vilnius+01402!5e0!3m2!1slt!2slt!4v1424952265987" frameborder="0"></iframe>
</article>

<?php require($INC_DIR1. "foot.php"); ?>