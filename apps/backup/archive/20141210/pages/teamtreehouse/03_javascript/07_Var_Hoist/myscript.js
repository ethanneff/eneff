// Hoisting

function doSomething (doit) {
  var color = "blue",
      number,
      name = "Jim";

  if (doit) {
    color = "red";
    number = 10;
    console.log("Color in if(){}", color);
  }
  console.log("Color after if(){}", color);
}

doSomething(false);
doSomething(true);




















































