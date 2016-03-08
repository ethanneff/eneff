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
<pre><code class="php">/////////////////////////////////////////////
///////////////// EXAMPLE 1 /////////////////
/////////////////////////////////////////////

// metadata of a class
interface iProduct
{
  // class constants
  const YEAR = 2014;

  // class must have these methods
  public function getName();
  public function getMaker();
}

// class
class Product implements iProduct
{
  // properties
  public static $manufacturer = "Manu"; // no need to init, all classes already have
  public $name  = "default name";
  public $price = 19.99;
  public $desc  = "default description";

  // constructor (if empty, then fallback back to the default value)
  function __construct($name, $price, $desc) {
    $this->name  = (isset($name) ? $name : $this->name);
    $this->price = (isset($price) ? $price : $this->price);
    $this->desc  = (isset($desc) ? $desc : $this->desc);
  }

  // methods
  public function getName() {
    return "product name is $this->name";
  }
  public function getMaker() {
    return self::$manufacturer;
  }
}
// create object $productOne of the class
$productOne = new Product();
echo "\nDefault value name:\t" . $productOne->name;
echo "\nDefault value price:\t" . $productOne->price;
echo "\nDefault value desc:\t" . $productOne->desc;
echo "\n";
</code><strong>
<?php
// metadata of a class
interface iProduct
{
  // class constants
  const YEAR = 2014;

  // class must have these methods
  public function getName();
  public function getMaker();
}

// class
class Product implements iProduct
{
  // properties
  public static $manufacturer = "Manu"; // no need to init, all classes already have
  public $name  = "default name";
  public $price = 19.99;
  public $desc  = "default description";

  // constructor (if empty, then fallback back to the default value)
  function __construct($name, $price, $desc) {
    $this->name  = (isset($name) ? $name : $this->name);
    $this->price = (isset($price) ? $price : $this->price);
    $this->desc  = (isset($desc) ? $desc : $this->desc);
  }

  // methods
  public function getName() {
    return "product name is $this->name";
  }
  public function getMaker() {
    return self::$manufacturer;
  }
}
// create object $productOne of the class
$productOne = new Product();
echo "Default value name:\t" . $productOne->name;
echo "\nDefault value price:\t" . $productOne->price;
echo "\nDefault value desc:\t" . $productOne->desc;
echo "\n";

echo "\nDefault value name:\t" . $productOne->name;
echo "\nDefault value price:\t" . $productOne->price;
echo "\nDefault value desc:\t" . $productOne->desc;
echo "\n";
?>
</strong><code class="php">
// create object $productTwo of the class
$productTwo = new Product("this value as been set!",null,"this value as been set as well!");
echo "\nSet value name:\t\t" . $productTwo->name;
echo "\nDefault value price:\t" . $productTwo->price;
echo "\nSet value desc:\t\t" . $productTwo->desc;
echo "\n";

// set instance property
$productOne->name = "soda";

// pull instance property
echo "\nSet/Pull value:\t\t" . $productOne->name;

// pull instance method
echo "\nMethod pull:\t\t" . $productOne->getName();
echo "\n";
</code><strong>
<?php
// create object $productTwo of the class
$productTwo = new Product("this value as been set!",null,"this value as been set as well!");
echo "Set value name:\t\t" . $productTwo->name;
echo "\nDefault value price:\t" . $productTwo->price;
echo "\nSet value desc:\t\t" . $productTwo->desc;
echo "\n";

// set instance property
$productOne->name = "soda";

// pull instance property
echo "\nSet/Pull value:\t\t" . $productOne->name;

// pull instance method
echo "\nMethod pull:\t\t" . $productOne->getName();
echo "\n";
?>
</strong><code class="php">
// inheritance
interface iSoda
{
  // class constants
  const EXPIRATION = 2020;
}

class Soda extends Product implements iSoda {
  // properties
  public $flavor = "orange";

  // constructor
  function __construct($name, $price, $desc, $flavor) {
    parent::__construct($name, $price, $desc);
    $this->flavor  = (isset($flavor) ? $flavor : $this->flavor);
  }

}

// create object $productThree of the class Soda
$productThree = new Soda("Grape Drank",16.45, null, "grape");
echo "\nSet value name:\t\t" . $productThree->name;
echo "\nSet value price:\t" . $productThree->price;
echo "\nDefault value desc:\t" . $productThree->desc;
echo "\nSet value flavor:\t" . $productThree->flavor;
echo "\n";
</code><strong>
<?php
// inheritance
interface iSoda
{
  // class constants
  const EXPIRATION = 2020;
}

class Soda extends Product implements iSoda {
  // properties
  public $flavor = "orange";

  // constructor
  function __construct($name, $price, $desc, $flavor) {
    parent::__construct($name, $price, $desc);
    $this->flavor  = (isset($flavor) ? $flavor : $this->flavor);
  }
}

// create object $productThree of the class Soda
$productThree = new Soda("Grape Drank",16.45, null, "grape");
echo "Set value name:\t\t" . $productThree->name;
echo "\nSet value price:\t" . $productThree->price;
echo "\nDefault value desc:\t" . $productThree->desc;
echo "\nSet value flavor:\t" . $productThree->flavor;
 ?>
</strong><code class="php">
// static pull
echo "\nDefault value manu:\t" . $productThree::$manufacturer;

// static pull parent's method
echo "\nDefault value manu:\t" . $productThree->getMaker();

// interface constants
echo "\nDefault value year:\t" . $productThree::YEAR;
echo "\nDefault value expire:\t" . $productThree::EXPIRATION;
echo "\n";

// functions
echo "\nDoes method exist?\t" . method_exists("Product", "getMaker");
echo "\nIs subclass of Product?\t" . is_subclass_of($productThree, "Product");

</code><strong>
<?php
// static pull
echo "Default value manu:\t" . $productThree::$manufacturer;

// static pull parent's method
echo "\nDefault value manu:\t" . $productThree->getMaker();

// interface constants
echo "\nDefault value year:\t" . $productThree::YEAR;
echo "\nDefault value expire:\t" . $productThree::EXPIRATION;
echo "\n";

// functions
echo "\nDoes method exist?\t" . method_exists("Product", "getMaker");
echo "\nIs subclass of Product?\t" . is_subclass_of($productThree, "Product");
 ?></strong>


</pre>
</body>
</html>