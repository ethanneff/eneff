// run after page load
(function() {
  ///////////////////////////////////////////////
  // module (angular container for directives, routes, factoreis, controllers)
  ///////////////////////////////////////////////

  // create the angular module called 'gemStore'
  // pull dependency 'store-products'
  // by calling it a variable 'app', need to prefix all containing items)

  var app = angular.module('gemStore', ['store-products']);

  ///////////////////////////////////////////////
  // controllers (used to handle interactions between the model and view)
  ///////////////////////////////////////////////

  // such as ng-repeat to fill the view with data
  // such as functions to add reviews on click

  // 'store controller' to handle each product
  app.controller('StoreController', function() {
    this.products = gems;
  });


  // 'review controller' to handle each review
  app.controller("ReviewController", function(){
    // make empty
    this.review = {};

    this.addReview = function(product){
      // add date to today
      this.review.createdOn = Date.now();
      // push the review to the reviews key of the specific product
      product.reviews.push(this.review);
      // empty out the review fields
      this.review = {};
    };

  });

  ///////////////////////////////////////////////
  // data
  ///////////////////////////////////////////////

  // should be stored in a .factory to make the data presist within the browser
  var gems = [
  {
    name: 'Azurite',
    description: "Some gems have hidden qualities beyond their luster, beyond their shine... Azurite is one of those gems.",
    shine: 8,
    price: 110.50,
    rarity: 7,
    color: '#CCC',
    faces: 14,
    images: [
    "img/gem-02.gif",
    "img/gem-05.gif",
    "img/gem-09.gif"
    ],
    reviews: [{
      stars: 5,
      body: "I love this gem!",
      author: "joe@example.org",
      createdOn: 1397490980837
    }, {
      stars: 1,
      body: "This gem sucks.",
      author: "tim@example.org",
      createdOn: 1397490980837
    }]
  }, {
    name: 'Bloodstone',
    description: "Origin of the Bloodstone is unknown, hence its low value. It has a very high shine and 12 sides, however.",
    shine: 9,
    price: 22.90,
    rarity: 6,
    color: '#EEE',
    faces: 12,
    images: [
    "img/gem-01.gif",
    "img/gem-03.gif",
    "img/gem-04.gif"
    ],
    reviews: [{
      stars: 3,
      body: "I think this gem was just OK, could honestly use more shine, IMO.",
      author: "JimmyDean@example.org",
      createdOn: 1397490980837
    }, {
      stars: 4,
      body: "Any gem with 12 faces is for me!",
      author: "gemsRock@example.org",
      createdOn: 1397490980837
    }]
  }, {
    name: 'Zircon',
    description: "Zircon is our most coveted and sought after gem. You will pay much to be the proud owner of this gorgeous and high shine gem.",
    shine: 70,
    price: 1100,
    rarity: 2,
    color: '#000',
    faces: 6,
    images: [
    "img/gem-06.gif",
    "img/gem-07.gif",
    "img/gem-08.gif"
    ],
    reviews: [{
      stars: 1,
      body: "This gem is WAY too expensive for its rarity value.",
      author: "turtleguyy@example.org",
      createdOn: 1397490980837
    }, {
      stars: 1,
      body: "BBW: High Shine != High Quality.",
      author: "LouisW407@example.org",
      createdOn: 1397490980837
    }, {
      stars: 1,
      body: "Don't waste your rubles!",
      author: "nat@example.org",
      createdOn: 1397490980837
    }]
  }
  ];
})();
