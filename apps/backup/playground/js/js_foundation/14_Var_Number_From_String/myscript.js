// number from string

var j = parseInt("193",10); //base 10 (prevents pulling octals)

var n = parseInt("33px", 10);
// CRITIAL: works (leading numbers)

var k = parseInt("there are 23 people", 10);
// CRITIAL: returns NaN (not a number)

if (!isNaN(k)){
	console.log(k);
} else {
	console.log("not a number");
}

var m = parseFloat("123.42",10);