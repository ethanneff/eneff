<!doctype html>
<html lang="en">
<head>
  <!-- Data -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="google-site-verification" content="avRB-d7j8Rd76B6qlZdD6IfP__7PJGF-rVbzcMDNU_I" />
  <!-- Descriptions -->
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="Portfolio website of Ethan Neff showcasing the various iOS and front-end web development side projects. ethanneff.com">
  <meta name="keywords" content="Palo Alto, iOS developer, Front-end developer, HTTP5, CSS3, Sass, JavaScript, AJAX, Angular.js, Ember.js, Node.js, PHP, Objective-C, Swift">
  <meta name="robots" content="index, follow">
  <meta name="author" content="Ethan Neff">
  <!-- StyleSheets -->
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>css/style.css">
  <!-- Favicons -->
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>img/favicon.ico">
  <link rel="apple-touch-icon" href="touch-icon-iphone.png">
  <link rel="apple-touch-icon" sizes="76x76" href="touch-icon-ipad.png">
  <link rel="apple-touch-icon" sizes="120x120" href="touch-icon-iphone-retina.png">
  <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad-retina.png">
  <!-- Incompatibility Redirects (12.8%)-->
  <!--[if lte IE 8]><script type="text/javascript">location.assign('<?php echo BASE_URL; ?>error/incompatibility.html');</script><![endif]-->
</head>
<body>

<!--   <div id="pre-loader">
    <div id="loader-logo"></div>
    <div id="loader-circle"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
 -->
  <div class="container">
    <header class="group">
      <h1>Ethan Neff</h1>
      <h2>Developer</h2>
      <nav class="social-nav">
        <ul>
          <li><a href="//linkedin.com/in/ethanneff" data-info="Linkedin"><div id="image-linkedin"></div><p>Linkedin</p></a></li>
          <li><a href="//facebook.com/ethan.neff.36" data-info="Facebook"><div id="image-facebook"></div><p>Facebook</p></a></li>
          <li><a href="//twitter.com/ethanneff" data-info="Twitter"><div id="image-twitter"></div><p>Twitter</p></a></li>
          <li><a href="//github.com/ethanneff" data-info="GitHub"><div id="image-github"></div><p>GitHub</p></a></li>
          <li><a href="//plus.google.com/109223401588871099965" data-info="Google Plus"><div id="image-google"></div><p>Google Plus</p></a></li>
          <li><a href="mailto:ethan.neff@eneff.com" data-info="Email"><div id="image-email"></div><p>Email</p></a></li>
        </ul>
      </nav>
    </header>

    <nav class="main-nav">
      <ul class="<?php if ($section !== "playground" && $section !== "documents" && $section !== "about") { echo "none"; } else {echo "";} ?>">
        <li class="<?php if ($section === "playground") { echo "selected"; } ?>"><a href="<?php echo BASE_URL; ?>playground/"><i class="fa fa-code"></i><p>Playground</p></a></li>
        <li class="<?php if ($section === "documents") { echo "selected"; } ?>"><a href="<?php echo BASE_URL; ?>documents/"><i class="fa fa-file-text-o"></i><p>Documents</p></a></li>
        <li class="<?php if ($section === "about") { echo "selected"; } ?>"><a href="<?php echo BASE_URL; ?>about/"><i class="fa fa-smile-o"></i><p>About</p></a></li>
      </ul>
    </nav>

    <div class="content">