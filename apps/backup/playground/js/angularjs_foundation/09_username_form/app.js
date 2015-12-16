angular.module('treehouseCourse', [])
  .controller('stageCtrl', function ($scope) {
    $scope.step = 1;

    $scope.advance = function () {
      $scope.step++;
    }
  })
  // create user object
  .factory('User', function () {
    var user = {
      username: "",
      password: ""
    }

    return {
      get: function () {
        return user;
      }
    }
  })
  // add user to each form
  .controller('surveyCtrlOne', function ($scope, User) {
    $scope.user = User.get();
  })
  .controller('surveyCtrlTwo', function ($scope, User) {
    $scope.user = User.get();
  })

  .factory('uniqueness', function () {
    var usernames = [
      'treehouse',
      'mrvdot',
      'angular'
    ];

    return {
      taken: function (name) {
        return usernames.indexOf(name) >= 0;
      }
    }
  })

  // directive unique-check
  .directive('uniqueCheck', function (uniqueness) {
    return {
      // import ngModelController
      require: 'ngModel',
      link: function ($scope, $element, $attrs, ngModelCtrl) {
        // check unique parser
        var checkUnique = function (name) {
          // check if valid
          var isValid = !uniqueness.taken(name);
          // make view red if not valid (form turns red if 'treehouse')
          ngModelCtrl.$setValidity('unique', isValid);
          return name;
        }
        
        // add parser to the array of parsers
        ngModelCtrl.$parsers.push(checkUnique);
      }
    }
  })
  .controller('DebugCtrl', function ($scope) {
    
  });