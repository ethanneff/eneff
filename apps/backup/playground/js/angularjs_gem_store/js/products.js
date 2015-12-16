// run after page load
(function() {
  // angular module (container) called 'store-products'
  // will be used to hold all the custom directives
  var app = angular.module('store-products', []);

  ///////////////////////////////////////////////
  // directives (custom html tags/elements/classes which are linked to javascript)
  ///////////////////////////////////////////////

  // product gallery directive which is used to set the template url in the element
  app.directive('productGallery', function() {
    return {
      restrict: 'E',
      templateUrl: 'inc/product-gallery.html',
      controller: function(){
        this.current = 0;
        this.setCurrent = function(imageNumber){
          this.current = imageNumber || 0;
        };
      },
      controllerAs: 'gallery'
    };
  });

  // product title directive which is used to set the html in the attribute
  app.directive('productTitle', function() {
    return {
      restrict: 'A',
      templateUrl: 'inc/product-title.html'
    };
  });

  app.directive('productDescription', function() {
    return {
      restrict: 'E',
      templateUrl: 'inc/product-description.html'
    };
  });

  app.directive('productReviews', function() {
    return {
      restrict: 'E',
      templateUrl: 'inc/product-reviews.html'
    };
  });

  app.directive('productSpecs', function() {
    return {
      restrict: 'E',
      templateUrl: 'inc/product-specs.html'
    };
  });

  // product tab directive which is used to select between the nav links
  app.directive('productTabs', function() {
    return {
      restrict: 'E',
      templateUrl: 'inc/product-tabs.html',
      // add controller to the directive
      controller: function() {
        // inital set to the first tab
        this.tab = 1;

        // functions
        this.isSet = function(checkTab) {
          return this.tab === checkTab;
        };

        this.setTab = function(activeTab) {
          this.tab = activeTab;
        };
      },
      // set the controller alias name
      controllerAs: 'tab'
    };
  });
})();
