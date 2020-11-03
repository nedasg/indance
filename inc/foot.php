<!--
<div class="contacts-item back" onclick="goBack()">
  <img class="img-contacts" alt="Back" src="/images/btn/btn-back.png" />
    <span class="contacts-text">Grįžti</span>
</div>
-->

</div>

</div>

<div id="big-right">
<table id="tbl-right">
  <tr>
    <td>
      <div id="media-display">
        <?php if ($displayMkt) : ?><script>$(function() { $("#media-display").load("/inc/display_mkt.php #<?php print $displayMkt; ?>"); });</script><?php endif; ?>
        <?php if ($displayMap) : ?><script>$(function() { $("#media-display").load("/inc/display_map.php #<?php print $displayMap; ?>"); });</script><?php endif; ?>
        <?php if ($displayMuz == showLib) {require($INC_DIR2. "display_muz.php");} ?>
        <?php if ($displayVid == showLib) {require($INC_DIR2. "display_vid.php");} ?>
      </div>
      <div id="media-photo"><?php if ($phchanger == y) {require($INC_DIR1. "phchanger.php");} ?></div>
      <div id="media-video"><?php if ($vdplayer == y) {require($INC_DIR1. "vdplayer.php");} ?></div>
      <div id="media-vest"><?php if ($displayVes == ves) {require($INC_DIR1. "display_ves.php");} ?></div>
    </td>
  </tr>
</table>
</div>

</body>
</html>