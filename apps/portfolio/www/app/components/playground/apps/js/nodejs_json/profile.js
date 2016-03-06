// problem: we need a simple way to look at a user's badge count and javascript points
// solution: use node.js to connect to teamtreehouse's API to get profile info and print it outerWidth()

// import the api
var http = require("http");

// functions
function printMessage(username, badgeCount, points) {
  var message = username + " has " + badgeCount + " total badge(s) and " + points + " points in JavaScript.";
  console.log(message);
}

function printError(error) {
  console.error("Got error: " + error.message);
}

function getProfile(username) {
  // ajax pull (connect to the api url)
  var request = http.get("http://teamtreehouse.com/" + username + ".json", function(response) {
    var body = "";

    // read the data
    response.on('data', function(chunk) {
      body += chunk;
    });

    response.on('end', function() {
      if (response.statusCode === 200) {
        try {
          // parse the data (string to JSON)
          var profile = JSON.parse(body);
          // print the data
          printMessage(username,profile.badges.length,profile.points.JavaScript);
        } catch (error) {
          // parse error
          printError(error);
        }
      } else {
        // status code error
        printError({message: "There was an error getting the profile for " + username + ". (" + http.STATUS_CODES[response.statusCode] + ")"});
      }
    });
    // connection issue error
  }).on('error', printError);
}


// make this function public
module.exports.get = getProfile;