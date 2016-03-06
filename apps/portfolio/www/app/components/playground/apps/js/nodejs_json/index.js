// pull the file
var profile = require("./profile.js");

var users = ["ethanneff", "chalkers", "joykesten2", "davemcfarland"];
var consoleArguments = process.argv.slice(2); // after node index.js bob steve
consoleArguments.forEach(function(argument) {
 users.push(argument);
});

users.forEach(profile.get);


// testing
var name = "Andrew";
var details = { favouriteLanguage: "JavaScript", age: 31, children: 2.4 }
var errorMessage = "Something bad has occurred";

console.log("----------------------------------------");
console.log("--------------test examples-------------");
console.log("----------------------------------------");
console.log(name);
console.dir(details);
console.error(errorMessage);
console.log();
console.log("----------------------------------------");
console.log("---asynchronous json pull via node.js---");
console.log("----------------------------------------");
