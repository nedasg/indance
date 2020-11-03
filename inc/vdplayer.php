<video id="video" controls poster="<?php print $videoFile ?>.jpg" preload="metadata">
  <source src="<?php print $videoFile ?>.mp4" type="video/mp4">
  <source src="<?php print $videoFile ?>.ogv" type="video/ogg">
  <source src="<?php print $videoFile ?>.webm" type="video/webm">
  Your browser does not support the video tag.
</video>

<script>
 $(function() { if (navigator.userAgent.match(/iPhone|iPad|iPod/i)) { $('video')[0].pause(); }; });
</script>