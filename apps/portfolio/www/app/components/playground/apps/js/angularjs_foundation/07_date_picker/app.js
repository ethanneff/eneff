angular.module('treehouseCourse', [])
  .controller('stageCtrl', function ($scope) {
    $scope.course = {
      date: null,
    };
  })
  .directive('datepicker', function () {
    return {
      // require the ngModel controller
      require: 'ngModel',
      link: function ($scope, $element, $attrs, ngModelCtrl) {
        console.log(ngModelCtrl);
        
        var initializedDatepicker = false;
        $attrs.$observe('datepickerFormat', function (newValue) {
          // If we've already initialized this, just update option
          if (initializedDatepicker) {
            $element.datepicker('option', 'dateFormat', newValue);
          // $observe is still called immediately, even if there's no initial value
          // so we check to confirm there's at least one format set
          } else if (newValue) {
            $element.datepicker({
              dateFormat: newValue,
              onSelect: function (date) {
                // $apply to process immediatel 
                $scope.$apply(function () {
                  // $setViewValue to send it to the model
                  ngModelCtrl.$setViewValue(date);
                })
              }
            });
            initializedDatepicker = true;
          }
        });
        
        // $render to change the view
        ngModelCtrl.$render = function () {
          $element.datepicker('setDate', ngModelCtrl.$viewValue);
        }
      }
    }
  });