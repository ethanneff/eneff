<!DOCTYPE html>
<html>
<head>
  <title><?php echo $errorCode; ?></title>
  <style type="text/css" media="screen">
    * {
      color: #768e9d;
      text-align: center;
      text-decoration: none;
    }
    a {
      color: #47a3da;
    }
    p {
      color: #becbd2;
    }
  </style>
</head>
<body>
  <h1><a href="//eneff.com"><?php echo $errorCode; ?><span> <?php echo $errorDesc; ?></span></a></h1>
  <footer>
   <p>&copy; <?php echo date("Y"); ?><a href="//eneff.com"> Ethan Neff</a></p>
 </footer>
</body>
</html>