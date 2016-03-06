// comparing

var first = "Hello";
var second = "hello";

if (first.toLowerCase() === second.toLowerCase()) {
  console.log("The strings are equal");
} else {
  console.log("The strings are different");
}

function compare (a, b) {
  console.log(a + " < " + b , a < b);
}

compare('a', 'b');
compare('a', 'A');
compare('apples', 'oranges');
compare('apples', 'applications');
compare('app', 'apples');
compare('hello', 'hello');