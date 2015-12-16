// object (dictionary)

// create
var jim = {
	name : "jim",
	"last name": "neff",
	skills : ["PHP", "JavaScript", "Objective C"],
	greet : function (name, mood) {
		name = name || "You"; // if name does not exist, then You
		mood = mood || "good";

		console.log('Hello I am ' + name
					+ " I am " + this.name
					+ " and I am in a " + mood  + " mood!"); // this instead of self
	}
}

console.log(jim.name);
console.log(jim["last name"]);
console.log(jim.skills[2]);

// assign
jim.name = "steve"
console.log(jim);

// methods
var nick = {
	name: 'nick',
	greet : jim.greet
}

jim.greet();
nick.greet();
jim.greet; 			// actually the JS window
jim.greet.call(jim); // select which object to assign this.
jim.greet.call({name:"amit"});
jim.greet.apply(jim);

jim.greet.call(jim, "Richard", "awesome"); // object, then arguments
jim.greet.apply(jim, ["Hoocha", "awake"]); // array of arguments
