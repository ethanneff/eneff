// arrays

// create
var a = [123,true,['sub array',2,91.12],"bobo",function(a,b) {return a+b}];

var b = new Array(50); // if ever need placeholder array
console.log(b.length); // 50 undefined

// getters
console.log(a);
console.log(a.toString());
console.log(a.length);
console.log(a[3]);
console.log(a[2][0]); 	// 2d array
console.log(a[4](1,2)); // functions

// setters
a[1] = 33;
console.log(a[1]);
a[a.length] = 'new entry'; // next index
console.log(a);
a[23] = 'new entry'; // undefined inbetween
console.log(a);

// methods
var c = [2,3,4];
console.log(c.toString());
c.push(5);
console.log(c.toString());
c.pop();
console.log(c.toString());
c.unshift(1);
console.log(c.toString());
c.shift();
console.log(c.toString());

var d = [12,42,75,11,22,87,42,100,1];
d.sort() // sorts as strings (so 100 first)
console.log(d.toString());
d.sort(function(a,b) {return b < a}); // num sort
console.log(d.toString());
d.sort(function(a,b) {return Math.random() - 0.5}); // random sort
console.log(d.toString());
d.reverse();
console.log(d.toString());
d.sort(function(a,b) {return a < b}); // num reverse
console.log(d.toString());

var f = [1,2,3];
var j = [4,5,6];
var z = f.concat(j,7,8,9,[10,11,12]); // does not modify f
console.log(z);

var x = [0,1,2,3,4,5];
var y = x.slice(1,4); // 1 though 4 (without 4)
console.log(y);

var m = ['hello', 'world', 'bob', 123.3];
var p = m.join(' ');
console.log(p);

var u = 'hello world over the mountain and the sea';
var o = u.split(' ');
console.log(o);

var g = [0,1,2,3,4,5,6,7,8];
delete g[2]; // makes index 2 undefined
console.log(g);
g.splice(2,1) // removes and moves all other up
console.log(g);
g.splice(5,2) // removes 2
console.log(g);
g.splice(2,0,'two'); // insert
console.log(g);
g.splice(3,1,'three','four'); // replace
console.log(g);



