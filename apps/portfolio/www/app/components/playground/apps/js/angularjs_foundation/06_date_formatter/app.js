angular.module('treehouseCourse', [])

  // controller
  .controller('stageCtrl', function ($scope, People) {
    // $scope is a serivice which can be injected anywhere
    // $scope makes variables accessible by front-end views
    // $scope default is child inherits parent
    $scope.people = People.get();

    $scope.receipt = {
      "Steak": 21.99,
      "Salad": 8.99,
      "Chips": 1.50,
      "Drink": 2.00
    }
  })

  // persistent data
  .factory('People', function ($http) {
    var people = [];

    return {
      get: function () {
        if (people.length == 0) {
          $http.get('people.json')
            .success(function (response) {
              for (var i = 0, ii = response.length; i < ii; i++) {
                people.push(response[i]);
              }
            })
            .error(function (err) {
              alert('ERROR: ' + err)
            });
        };
        return people;
      },
      add: function (person) {
        $http.post('people.json', person)
          .success(function () {
            people.push(person);
          })
          .error(function (err) {
            alert('ERROR: ' + err)
          });
      },
      remove: function (person) {
        $http.delete('people.json', person)
          .success(function () {
            people.splice(people.indexOf(person), 1)
          })
          .error(function (err) {
            alert('ERROR: ' + err)
          });
      },
      save: function (person) {
        $http.post('people.json', person)
          .success(function () {
            alert('Person saved');
          })
          .error(function (err) {
            alert('ERROR: ' + err)
          });
      }
    }
  })

  // the trasforming of static html elements into data driven components
  // directive 'contactCard'
  .directive('contactCard', function () {
    return {
      // html template into the original html
      template: '<div class="contact-card">' +
        '<p class="name">{{contact.name}}</p>' +
        '<p class="profession">{{contact.profession}}</p>' +
      '</div>',
      // within or completely replace the div
      replace: true,
      // want 2 way data binding (person variable will be in sync of contact-card)
      scope: {
        'contact': '=contactCard'
      },
      // any dynamic function to the directive
      link: function ($scope, $element, $attrs) {
         // custom directive

      }
    }
  })

  // directive 'datepicker'
  .directive('datepicker', function () {
    return {
      link: function ($scope, $element, $attrs) {
        var isInitalized = false;

        // watch the html attribute 'datepickerFormat' (allow dynmaic changing)
        $attrs.$observe('datepickerFormat', function(newValue) {
          if (isInitalized) {
            // $element is a jQuery-lite wrapper
            // datepicker is a jQuery object
            $element.datepicker('option', 'dateFormat', newValue);
          } else if (newValue) {
            // if new value, set the datepicker to the new format
            $element.datepicker({
              dateFormat: newValue
            });
            isInitalized = true;
          }
        });
      }
    }
  });










