<?php
  $INC_DIR = $_SERVER["DOCUMENT_ROOT"]. "/";
  $INC_DIR1 = $_SERVER["DOCUMENT_ROOT"]. "/inc/";
  $cvPhone = "685 37785";
  $cvEmail = "info@indance.lt";
  $cvFb = 'https://lt-lt.facebook.com/pages/INDANCE-Entertainment/37125973970';
  $vdplayer = "y"; $videoFile = '/video/2015.Indance.Kaledos';
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Šokių pamokos Vilniuje ir Kaune | INDANCE Šokių Pramogos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="title" content="Šokių pamokos Vilniuje ir Kaune | INDANCE Šokių Pramogos">
  <meta name="description" content="Šokių pamokos? Ar poilsis, bendravimas ir gerai praleistas laikas? Geriausia, kai visa tai kartu! Salsa, pramoginiai, kizomba, bačiata, regetonas ir jazz funk, poroms ir ne poroms!">
  <meta name="author" content="INDANCE Šokių Pramogos">
  <meta property="og:url" content="http://www.indance.lt" />
  <meta property="og:title" content="INDANCE - daugybė gero laiko poroms ir ne poroms!" />
  <meta property="og:description" content="Kubietiška salsa, Pramoginiai šokiai, Solo latino, Regetonas, Jazz funk... Šokių pamokos ir pramogos Vilniuje ir Kaune - kviečiame patirti ir mėgautis!" />
  <meta property="og:image" content="http://www.indance.lt/images/fb/indance.fb.tusas.01.jpg" />
  <link rel="shortcut icon" href="/images/favicon/favicon.ico" />
  <link type="text/css" rel="stylesheet" media="screen and (min-width: 800px)" href="/css/index.css?v=3" />
  <link type="text/css" rel="stylesheet" media="screen and (max-width: 800px)" href="/css/index-resp.css?v=3" />
  <script src="/js/jquery-1.12.2.min.js"></script>
  <script src="/js/jquery-ui.min.js"></script>
  <script src="/js/jquery.mobile-1.4.5.min.js"></script>
  <?php include_once ($_SERVER["DOCUMENT_ROOT"] . "/analyticstracking.php") ?>
</head>

<body>

<div id="top-menu-div" class="pc">
  <?php require($INC_DIR1. "topmenu.php"); ?>
</div>

<div id="big-left">
  <div id="logo-div">
    <?php require($INC_DIR1. "logozone.php"); ?>
  </div>

  <div id="titlezone" class="resp">
    <a href="mailto:info@indance.lt">
      <img class="img-contacts-new" src="/images/btn/btn-email-new.png" />
    </a>
    <a href="tel:+37068537785">
      <img class="img-contacts-new" src="/images/btn/btn-phone-new.png" />
    </a>
    <a href="https://www.facebook.com/INDANCE-Entertainment-37125973970/" target="_blanc">
      <img class="img-contacts-new" src="/images/btn/btn-fb-new.png" />
    </a>
    <a href="https://www.youtube.com/user/indancers" target="_blanc">
      <img class="img-contacts-new" src="/images/btn/btn-youtube-new.png" />
    </a>
  </div>

  <div id="div-main">
    <?php require($INC_DIR1. "styles.php"); ?>
  </div>
</div>

</body>
</html>