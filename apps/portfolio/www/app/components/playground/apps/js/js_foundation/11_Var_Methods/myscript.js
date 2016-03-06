var part1 = "Hello ";
var part2 = "World!";
var whole = part1 + part2;
console.log(whole + "!!!!!");

var length = whole.length;
console.log(whole, length);

var index = whole.indexOf("World");
console.log(index);

var index2 = whole.indexOf("world");
console.log(index2);

if (whole.indexOf("W") !== -1) {
  console.log("W exists in string");
} else {
  console.log("W does not exist");
}

console.log(whole.charAt(1));

"Hello World!"
var world = whole.substr(6,5);
console.log(world);

console.log(whole.toLowerCase());
console.log(whole.toUpperCase());
console.log(whole);