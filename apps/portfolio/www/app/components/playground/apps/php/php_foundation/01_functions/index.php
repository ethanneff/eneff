

<?php

// basic
function hello() {
  echo "hello world<br>";
}
// hello(); echo "<br>";


// scope
$current_user = 'Mike';
function is_mike() {
  // to pull global variables
  global $current_user;

  if ($current_user === 'Mike') {
    echo "it is mike<br>";
  } else {
    echo "nope, it is not mike<br>";
  }
}
// is_mike(); echo "<br>";


// arguments (default and optional)
function greet($names = "friend", $date = null) {
  if (is_array($names)) {
    $group = "";
    foreach ($names as $name) {
      $group = $group . " " . $name . ", ";
    }
    echo "Hello $group how's it going $date?<br>";
  } else {
    echo "Hello $names, how's it going $date?<br>";
  }
}
// greet("bob", "on " . date("l"));
// greet(["bob","steve","bill"]);
// able to pass no arguments
// greet(); echo "<br>";


// returns
function intro() {
  return 123;
}
// echo intro(); echo "<br><br>";


// variable function
$func = 'hello';
// echo $func(); echo "<br>";


// anonymous function (closure)
$func = function() use($current_user) {
  echo "anonymous function for $current_user";
};

// $func();  echo "<br>";


// array parse
$arr = array(
  "Mike" => "Frog",
  "Chris" => "Teacher",
  "Hampton" => "Teacher"
  );

function print_info($key, $value) {
  echo "$key is a $value.<br>";
}

// array_walk($arr,'print_info');

?>



<!DOCTYPE html>
<html>
<head>
  <title>Ethan Neff</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles.css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="main.js"></script>
</head>
<body>

<pre class="line-numbers"><code class="language-php">// basic
function hello() {
  echo "hello world<br>";
}
hello();</code></pre>
<p><?php echo "<pre>"; hello(); echo "</pre>"; ?></p>

<pre class="line-numbers"><code class="language-php">// scope
$current_user = 'Mike';
function is_mike() {
  // to pull global variables
  global $current_user;

  if ($current_user === 'Mike') {
    echo "it is mike<br>";
  } else {
    echo "nope, it is not mike<br>";
  }
}
is_mike();</code></pre>
<p><?php echo "<pre>"; is_mike(); echo "</pre>"; ?></p>

<pre class="line-numbers"><code class="language-php">// arguments (default and optional)
function greet($names = "friend", $date = null) {
  if (is_array($names)) {
    $group = "";
    foreach ($names as $name) {
      $group = $group . " " . $name . ", ";
    }
    echo "Hello $group how's it going $date?<br>";
  } else {
    echo "Hello $names, how's it going $date?<br>";
  }
}
greet("bob", "on " . date("l"));
greet(["bob","steve","bill"]);
// able to pass no arguments
greet();</code></pre>
<p><?php echo "<pre>"; greet("bob", "on " . date("l"));
greet(["bob","steve","bill"]);
greet(); echo "</pre>"; ?></p>

<pre class="line-numbers"><code class="language-php">// returns
function intro() {
  return 123;
}
echo intro();</code></pre>
<p><?php echo "<pre>"; echo intro(); echo "</pre>"; ?></p>

<pre class="line-numbers"><code class="language-php">// variable function
$func = 'hello';
echo $func();</code></pre>
<?php echo "<pre>"; echo $func(); echo "</pre>"; ?>

<pre class="line-numbers"><code class="language-php">// anonymous function (closure)
$func = function() use($current_user) {
  echo "anonymous function for $current_user";
};
$func();</code></pre>
<p><?php echo "<pre>"; $func(); echo "</pre>"; ?></p>

<pre class="line-numbers"><code class="language-php">// array parse
$arr = array(
  "Mike" => "Frog",
  "Chris" => "Teacher",
  "Hampton" => "Teacher"
);

function print_info($key, $value) {
  echo "$key is a $value.<br>";
}

array_walk($arr,'print_info');</code></pre>
<p><?php echo "<pre>"; array_walk($arr,'print_info'); echo "</pre>"; ?></p>

</body>
</html>





