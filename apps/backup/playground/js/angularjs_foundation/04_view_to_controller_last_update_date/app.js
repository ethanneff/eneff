angular.module('treehouseCourse', [])
  // controller
  .controller('stageCtrl', function ($scope, api) {
    // message object
    $scope.message = {
      text: "",
      lastSaved: null
    }

    // watcher on the message object to update the lastSaved property
    $scope.$watch('message.text', function(newValue, oldValue) {
      if (newValue) {
        api.saveMessage($scope.message);
      }
    });

  })

  // persistent data
  .factory('api', function () {
    return {
      saveMessage: function (message) {
        console.log('saving', message);
        // update the lastSaved property of message
        message.lastSaved = Date.now();
      }
    }
  });







