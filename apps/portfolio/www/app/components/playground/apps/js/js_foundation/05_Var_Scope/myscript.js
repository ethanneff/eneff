// Scope

 world = "World!";

function sayHello () {
  var hello = "Hello ";

  function inner () {
    var extra = " There is more!"
    console.log(hello + world + extra);
  }

  inner();
}

sayHello();

console.log("world outside sayHello(): ", world);
// console.log("hello outside sayHello(): ", hello);

















































