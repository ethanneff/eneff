<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/styles/github.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/highlight.min.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>
  <style type="text/css" media="screen">
    strong {
      color: purple;
    }
  </style>
</head>
<body>
<pre>
<code class="php">// basic
function hello() {
  echo "hello world";
}
hello();
</code><strong>
<?php
// basic
function hello() {
  echo "hello world";
}
hello();
?>
</strong><code class="php">// scope
$current_user = 'Mike';
function is_mike() {
  // to pull global variables
  global $current_user;

  if ($current_user === 'Mike') {
    echo "it is mike";
  } else {
    echo "nope, it is not mike";
  }
}
is_mike();
</code><strong>
<?php
$current_user = 'Mike';
function is_mike() {
  // to pull global variables
  global $current_user;

  if ($current_user === 'Mike') {
    echo "it is mike";
  } else {
    echo "nope, it is not mike";
  }
}
is_mike();
 ?>
</strong><code class="php">// arguments (default and optional)
function greet($names = "friend", $date = null) {
  if (is_array($names)) {
    $group = "";
    foreach ($names as $name) {
      $group = $group . " " . $name . ", ";
    }
    echo "Hello $group how's it going $date?";
  } else {
    echo "Hello $names, how's it going $date?";
  }
}
greet("bob", "on " . date("l"));
greet(["bob","steve","bill"]);
// able to pass no arguments
greet();
</code><strong>
<?php
// arguments (default and optional)
function greet($names = "friend", $date = null) {
  if (is_array($names)) {
    $group = "";
    foreach ($names as $name) {
      $group = $group . " " . $name . ", ";
    }
    echo "Hello $group how's it going $date?";
  } else {
    echo "Hello $names, how's it going $date?";
  }
}
greet("bob", "on " . date("l"));
greet(["bob","steve","bill"]);
// able to pass no arguments
greet();
?>
</strong><code class="php">// returns
function intro() {
  return 123;
}
echo intro();
</code><strong>
<?php
// returns
function intro() {
  return 123;
}
echo intro();
?>
</strong><code class="php">
// variable function
$func = 'hello';
echo $func();
</code><strong>
<?php
// variable function
$func = 'hello';
echo $func();
?>
</strong><code class="php">
// anonymous function (closure)
$func = function() use($current_user) {
  echo "anonymous function for $current_user";
};
$func();
</code><strong>
<?php
// anonymous function (closure)
$func = function() use($current_user) {
  echo "anonymous function for $current_user";
};
$func();
?>
</strong><code class="php">// array parse
$arr = array(
  "Mike" => "Frog",
  "Chris" => "Teacher",
  "Hampton" => "Teacher"
  );

function print_info($key, $value) {
  echo "$key is a $value.";
}

array_walk($arr,'print_info');
</code><strong>
<?php
// array parse
$arr = array(
  "Mike" => "Frog",
  "Chris" => "Teacher",
  "Hampton" => "Teacher"
  );

function print_info($key, $value) {
  echo "$key is a $value.";
}

array_walk($arr,'print_info');
?>
</pre>
</body>
</html>