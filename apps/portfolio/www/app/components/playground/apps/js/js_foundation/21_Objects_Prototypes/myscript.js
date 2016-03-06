// object (dictionary) prototypes

// constructor function (NEW makes the function call a prototype)
function Person (name) {
	// overrides the prototype properties
	// changes the meaning of this.
	this.name = name;
}

// prototype
var personPrototype = {
	name : 'Anonymous',
	species : 'Homo Sapien',
	greet : function (name, mood) {
		name = name || 'You';
		mood = mood || 'Good';

		console.log('Hello I am ' + name
					+ " I am " + this.name
					+ " and I am in a " + mood
					+ " mood!"); // this instead of self
	}
}

// assign the prototype to the constructor
Person.prototype = personPrototype;





// create
var jim = new Person("jim"); // new object with :name
var nick = new Person("nick");
console.log(jim, nick);

// assign instance
nick.species = "Human";
console.log(jim, nick);

// assign object default
Person.prototype.species = "alien";
console.log(jim, nick); // will not override nick
// nick.species = "alien";  to override the instance

// create object default
Person.prototype.favoriteColor = "Green";
console.log(jim, nick);


