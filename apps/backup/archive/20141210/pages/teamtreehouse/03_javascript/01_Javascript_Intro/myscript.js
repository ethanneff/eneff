// output
console.log("hello from myscript.js");

// alerts and prompts
// var name = prompt("what is your name?");
// alert("hello " + name);

// if
if ("A") console.log("a");
if (1) console.log("1");
if (0) console.log("0"); // nope
if (false) console.log("0"); // nope
x = null;
if (!x) console.log("yes");

// loops
var counter = 3;
while (counter) {
	console.log ("while loop " + counter);
	counter--;
}

for (var i = 0; i < 5; i++) {
	console.log ("for loop " + i);
};

// arrays
var friends = ["nick", "bob", "steve"];
console.log(friends);
console.log(friends[0]);

// objects (dictionary)
var me = {
	first_name: "ethan",
	last_name: "neff",
	age: 23,
	"Date of Birth": "11/19/1990"
}
console.log(me);
console.log(me.first_name);
console.log(me["Date of Birth"]);
me.first_name = "bill";
console.log(me.first_name);

// functions
var sayHello = function(name) {
	console.log("hello world " + name);
}

var isEven = function(number) {
	if (number % 2 == 0)
		return true;
	return false;
}
sayHello();
sayHello("ethan");
console.log(isEven(22));

