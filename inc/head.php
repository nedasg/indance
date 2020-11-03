<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php print $title ?></title>
<meta name="description" content="<?php print $description ?>">
<meta name="keywords" content="<?php print $keywords ?>">
<meta name="author" content="<?php print $author ?>">
<meta property="og:url" content="<?php print $metaPropOgUrl ?>">
<meta property="og:title" content="<?php print $metaPropOgTitle ?>">
<meta property="og:description" content="<?php print $description ?>">
<meta property="og:image" content="<?php print $metaPropOgImage ?>">
<link type="text/css" rel="stylesheet" media="screen and (min-width: 800px)" href="/css/style.css" />
<link type="text/css" rel="stylesheet" media="screen and (max-width: 800px)" href="/css/style-resp.css" />
<script>function goBack() { window.location.replace(document.referrer) }</script>
<script src="/js/jquery-ui-1.9.2.custom.js"></script>
<script src="/js/jquery-1.11.1.min.js"></script>
<script src="/js/modernizr.js"></script>
<script src="/js/display.js"></script>
<script src="/js/responsive.js"></script>
<?php include_once ($_SERVER["DOCUMENT_ROOT"] . "/analyticstracking.php") ?>
</head>

<body>
<div id="top-menu-div"><?php require($INC_DIR1. "topmenu.php"); ?></div>

<div id="big-left">
  <div id="logo-div"><?php require($INC_DIR1. "logozone.php"); ?></div>
  <div id="titlezone"><?php require($INC_DIR1. "titlezone.php"); ?></div>
  <div id="div-main">