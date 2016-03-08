angular.module('treehouseCourse', [])
  .controller('stageOneCtrl', function ($scope, $http) {
    $http.get('/apps/portfolio/www/app/components/playground/apps/js/angularjs_foundation/01_jquery_vs_angular_json/people.json/').success(function(people) {
      $scope.people = people;
    });
  });