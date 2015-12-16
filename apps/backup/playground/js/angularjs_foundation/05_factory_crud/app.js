angular.module('treehouseCourse', [])
  // factory named 'People' (used to persist data)
  .factory('People', function ($http) {
    // use the $http service 
    // convenience methods: POST GET PUT DELETE
    
    // persistent variables
    var people = [];
    var otherPeople = [
      {
        "name": "Jane",
        "profession": "Designer",
        "hometown": "New York, NY"
      },
      {
        "name": "Jerry",
        "profession": "Salesman",
        "hometown": "Detroit, MI"
      }
    ];
    
    // factories must return (can return multiple methods)
    return {
      get: function () {
        // only load once
        if (people.length == 0) {
          // pull file using http service
          $http.get('people.json')
            .success(function (response) {
              // add to persist variable 'people'
              for (var i = 0, ii = response.length; i < ii; i++) {
                people.push(response[i]);
              }
            });
        }
        return people;
      },
      add: function () {
        people.push(otherPeople.pop());
      },
      remove: function (person) {
        otherPeople.push(person);
        people.splice(people.indexOf(person), 1);
      },
      save: function (person) {
        // use http service to send the data to the file
        $http.post('people.json', person)
          .success(function () {
            alert('Saved');
          })
          .error(function (err) {
            alert(err);
          });
      }
    }
  })

  // controller (what interacts with the view and model)
  .controller('stageCtrl', function ($scope, People) {
    // use scope and People (factory) service
    
    // create controller variables to interact with view
    $scope.title = {
      name: 'Angular.js Playground',
      date: 'Dec 21, 2014'
    };
    
    // pull from persistent factory named People into controller variables
    $scope.people = People.get();
    
    $scope.add = People.add
    
    $scope.remove = People.remove
    
    $scope.edit = function (person) {
      // create another controller varible to store the individual person's data to edit
      // different controller var, but still connected to the same 1 model
      $scope.editingPerson = person;
    }
    
    $scope.save = People.save
  });







