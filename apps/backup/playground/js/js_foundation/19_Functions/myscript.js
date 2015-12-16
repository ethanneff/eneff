// functions

// arguments and returns
function sayHello(name, greeting) {
	if (typeof name === 'undefined') {
		return 0;
	}
	if (typeof greeting === 'undefined') {
		greeting = 'Hello';
	}
	console.log(greeting + " world " + name);

	return name.length;
}
sayHello("bob", 'whoa');
sayHello("steve");

//anonymous function
var myFunction = function() {
	console.log('myFunction was called');
}
myFunction();

var callTwice = function(targetFunction) {
	targetFunction();
	targetFunction();
}
callTwice(myFunction);

callTwice(function() {
	console.log("hello from the anon function");
});

// self executing anonymous function
(function (a,b) {
	var x,y,z;
	console.log('from anon function:' + a + b);
})(1,'hello');


// examples
var button = document.getElementById('action')
var input = document.getElementById('text_field')

// does not work with ie
button.addEventListener('click', function () {
	console.log('clicked');
});
button.addEventListener('click', function () {
	console.log('other clicked');
	input.setAttribute('value', 'hello world')
});

