<?php

function curl($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

$scraped_website = curl("https://www.evernote.com/shard/s319/sh/5f357f2c-0313-47e0-b8aa-f1d74a56afb3/b7698a97e3104e9f");

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/styles/github.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/highlight.min.js"></script>
  <script src="/apps/test/www/jquery.min.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>
</head>
<body>

<pre><code class="php">// class example
class MyClass {
  $prop0 = 'internal property';
  public $prop1 = "I'm a class property!";
  public static $count = 0;

  public function __construct() {
    echo 'The class "', __CLASS__, '" was initiated!';
  }

  public function __destruct() {
    echo 'The class "', __CLASS__, '" was destroyed.';
  }

  public function __toString() {
    echo "Using the toString method: ";
    return $this->getProperty();
  }

  public function setProperty($newval='default') {
    $this->prop1 = $newval;
  }

  public function getProperty() {
    return $this->prop1 . "";
  }

  private function thisClassOnly() {
    return $this->prop1 . "";
  }

  protected function withinClassOrDependents() {
    return $this->prop1 . "";
  }

  public static function plusOne() {
    return "The count is " . ++self::$count . ".";
  }

}

// inheritance
class MyClassSecond extends MyClass {
  $prop0 = 'internal property';
  public $prop1 = "I'm a class property!";

  public function __construct() {
    parent::__construct();
    echo 'The class "', __CLASS__, '" was initiated!';
  }

  public function callWithinClassOrDependents() {
    return $this->withinClassOrDependents();
  }
}

// __construct
$obj1 = new MyClass;
$obj2 = new MyClass;

// public
echo $obj1->$prop1;
$obj1->setProperty('bob');
echo $obj1->getProperty();

// protected
$obj2->callWithinClassOrDependents();

// private (cannot call externally)

// static (can called without initialization of class)
echo MyClass::plusOne();
echo MyClass::$count

// __string
echo $obj1;
// __destruct
unset($obj1);
</code></pre>

</body>


<script>
  // no globals
  function getHTML() {
    $.ajax({
      url: 'https://www.google.com',
      type: 'GET',
      success: function(res) {
        console.log(res.responseText);
      }
    });
  }
</script>
</html>