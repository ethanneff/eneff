<!DOCTYPE html>
<!-- load the module (angular container) 'gemStore' -->
<html lang="en" ng-app="gemStore">
<head>
  <title>Flatlander Crafted Gems</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/styles.css" />
  <!-- js -->
  <script type="text/javascript" src="js/angular.min.js"></script>
  <script type="text/javascript" src="js/app.js"></script>
  <script type="text/javascript" src="js/products.js"></script>
</head>
<!-- load the controller to handle each product -->
<body ng-controller="StoreController as store">
  <div class="container">
    <!--  Store Header  -->
    <header>
      <h1 class="text-center">Flatlander Crafted Gems</h1>
      <h2 class="text-center">– an Angular store –</h2>
    </header>

    <!--  Products Container  -->
    <div class="list-group">
      <!-- Individual Product Container  -->
      <!-- loop through each product in the controller 'store' -->
      <div class="list-group-item" ng-repeat="product in store.products">
        <!-- the 'product' is passed down through all the custom directives below -->

        <!-- Title -->
        <h3 product-title></h3>

        <!-- Image Gallery  -->
        <product-gallery></product-gallery>

        <!-- Product Tabs  -->
        <product-tabs></product-tabs>
      </div>
    </div>
  </div>
</body>
</html>
