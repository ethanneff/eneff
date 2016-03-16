<?php
include(dirname(dirname(__FILE__)) . "/inc/config.php");
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Data -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Descriptions -->
  <title>Ethan Neff | Bay Area | iOS and Full Stack Developer</title>
  <meta name="description" content="Portfolio website of Ethan Neff showcasing the various iOS and Full Stack side projects.">
  <meta name="keywords" content="Bay Area, San Francisco, iOS, Full Stack, Developer, Software Engineer">
  <meta name="robots" content="index, follow">
  <meta name="author" content="Ethan Neff">
  <!-- StyleSheets -->
  <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:300,400,500,700">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.min.css">
  <!-- FavIcons -->
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo BASE_URL; ?>assets/img/icon/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo BASE_URL; ?>assets/img/icon/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo BASE_URL; ?>assets/img/icon/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo BASE_URL; ?>assets/img/icon/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo BASE_URL; ?>assets/img/icon/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo BASE_URL; ?>assets/img/icon/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo BASE_URL; ?>assets/img/icon/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo BASE_URL; ?>assets/img/icon/apple-touch-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo BASE_URL; ?>assets/img/icon/apple-touch-icon-180x180.png">
  <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>assets/img/icon/favicon-32x32.png" sizes="32x32">
  <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>assets/img/icon/favicon-194x194.png" sizes="194x194">
  <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>assets/img/icon/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>assets/img/icon/android-chrome-192x192.png" sizes="192x192">
  <link rel="icon" type="image/png" href="<?php echo BASE_URL; ?>assets/img/icon/favicon-16x16.png" sizes="16x16">
  <link rel="manifest" href="<?php echo BASE_URL; ?>assets/img/icon/manifest.json">
  <link rel="mask-icon" href="<?php echo BASE_URL; ?>assets/img/icon/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/img/icon/favicon.ico">
  <meta name="apple-mobile-web-app-title" content="eneff">
  <meta name="application-name" content="eneff">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="msapplication-TileImage" content="<?php echo BASE_URL; ?>assets/img/icon/mstile-144x144.png">
  <meta name="msapplication-config" content="<?php echo BASE_URL; ?>assets/img/icon/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
  <!-- Incompatibility Redirects (12.8%)-->
  <!--[if lte IE 8]><script type="text/javascript">location.assign('<?php echo BASE_URL; ?>app/shared/errors/incompatibility/');</script><![endif]-->
</head>
<body>
  <div class="container">
    <header class="group">
      <h1>Ethan Neff</h1>
      <h2>iOS &amp; Full Stack Developer</h2>
      <nav id="social-nav">
        <ul>
          <li><a href="//linkedin.com/in/ethanneff" data-info="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
          <li><a href="//facebook.com/ethan.neff.36" data-info="Facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="//twitter.com/ethanneff" data-info="Twiter"><i class="fa fa-twitter"></i></a></li>
          <li><a href="//github.com/ethanneff" data-info="GitHub"><i class="fa fa-github-alt"></i></a></li>
          <li><a href="//codepen.io/ethanneff" data-info="CodePen"><i class="fa fa-codepen"></i></a></li>
          <li><a href="mailto:ethan.neff@eneff.com" data-info="Email"><i class="fa fa-envelope-o"></i></a></li>
        </ul>
      </nav>
    </header>

    <nav id="main-nav">
      <ul>
        <li id="nav-playground"><a href="#/playground"><i class="fa fa-code"></i><p>Playground</p></a></li>
        <li id="nav-documents"><a href="#/documents"><i class="fa fa-file-text-o"></i><p>Documents</p></a></li>
        <li id="nav-about"><a href="#/about"><i class="fa fa-smile-o"></i><p>About</p></a></li>
      </ul>
    </nav>

    <div id="content">