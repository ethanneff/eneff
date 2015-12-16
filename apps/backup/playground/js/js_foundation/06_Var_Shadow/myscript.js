// Shadowing

var myColor = "blue";
console.log("myColor before myFunc()", myColor);

function myFunc () {
  var myColor = "yellow";
  var myNumber = 42;
  console.log("myColor inside myFunc()", myColor);
}

myFunc();
console.log("myColor after myFunc()", myColor);
console.log("myNumber after myFunc()", myNumber);
























































