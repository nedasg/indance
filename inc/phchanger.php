<?php
$extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
$result = array();
$directory = new DirectoryIterator($imgDir);
foreach ($directory as $fileinfo) {
    if ($fileinfo->isFile()) {
        $extension = strtolower(pathinfo($fileinfo->getFilename(), PATHINFO_EXTENSION));
        if (in_array($extension, $extensions)) {
            $result[] = $fileinfo->getFilename();
        }
    }
}
sort($result);
?>

<script type="text/javascript">

$(document).ready(function() {
var arr = <?php echo json_encode($result) ?>;
var zind = arr.length;
  $.each(arr, function(i, val) {
//    $("#media-photo").append(i + ": " + val + "<br>");
    $("#media-photo").append("<img style='z-index: " + zind + ";' src='" + imgDir + val + "' title='INDANCE Šokių Pramogos'></img>");
    zind = zind-1;
  });
});

$(document).ready(function() {
  var z = 1;
  var phChanger = setInterval(function() {
    var video = $('#video').get(0);
    if (video.paused || video.ended || video.seeking || video.readyState == false) {
      $("#media-photo").find("img:nth-of-type(" + z + ")").fadeOut(400);
      if ( z == $("#media-photo img").length ) { $("#media-photo").find("img").fadeIn(400); z = 1; } else { z=z+1; };
      };
    }, 3000);
});

</script>