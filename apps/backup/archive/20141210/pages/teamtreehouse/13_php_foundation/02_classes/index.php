<?php

/////////////////////////////////////////////
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

// echo "<pre>";
// create object $productOne of the class
$productOne = new Product();
// echo "\nDefault value name:\t" . $productOne->name;
// echo "\nDefault value price:\t" . $productOne->price;
// echo "\nDefault value desc:\t" . $productOne->desc;
// echo "\n";

// create object $productTwo of the class
$productTwo = new Product("this value as been set!",null,"this value as been set as well!");
// echo "\nSet value name:\t\t" . $productTwo->name;
// echo "\nDefault value price:\t" . $productTwo->price;
// echo "\nSet value desc:\t\t" . $productTwo->desc;
// echo "\n";

// set instance property
$productOne->name = "soda";

// pull instance property
// echo "\nSet/Pull value:\t\t" . $productOne->name;

// pull instance method
// echo "\nMethod pull:\t\t" . $productOne->getName();
// echo "\n";



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
// echo "\nSet value name:\t\t" . $productThree->name;
// echo "\nSet value price:\t" . $productThree->price;
// echo "\nDefault value desc:\t" . $productThree->desc;
// echo "\nSet value flavor:\t" . $productThree->flavor;
// echo "\n";

// static pull
// echo "\nDefault value manu:\t" . $productThree::$manufacturer;
// static pull parent's method
// echo "\nDefault value manu:\t" . $productThree->getMaker();
// interface constants
// echo "\nDefault value year:\t" . $productThree::YEAR;
// echo "\nDefault value expire:\t" . $productThree::EXPIRATION;
// echo "\n";

// functions
// echo "\nDoes method exist?\t" . method_exists("Product", "getMaker");
// echo "\nIs subclass of Product?\t" . is_subclass_of($productThree, "Product");



/////////////////////////////////////////////
///////////////// EXAMPLE 2 /////////////////
/////////////////////////////////////////////

class Fish
{
  // properties
  public $common_name;
  public $flavor;
  public $record_weight;

  // constructor
  function __construct($name, $flavor, $record){
    $this->common_name = $name;
    $this->flavor = $flavor;
    $this->record_weight = $record;
  }

  // methods
  public function getInfo() {
    $output  = "The {$this->common_name} is an awesome fish. ";
    $output .= "It is very {$this->flavor} when eaten. ";
    $output .= "Currently the world record {$this->common_name} weighed {$this->record_weight}.";
    return $output;
  }
}

class Trout extends Fish {
  // properties
  public $species;

  // constructor
  function __construct($name, $flavor, $record, $species) {
    parent::__construct($name, $flavor, $record);
    $this->species = $species;
  }

  // override Fish function to include species
  public function getInfo() {
    $output  = "The {$this->species} {$this->common_name} is an awesome fish. ";
    $output .= "It is very {$this->flavor} when eaten. ";
    $output .= "Currently the world record {$this->common_name} weighed {$this->record_weight}.";
    return $output;
  }
}

$brook_trout = new Trout("Trout", "Delicious", "14 pounds 8 ounces", "Brook");
// echo "\n\n" . $brook_trout->getInfo();
// echo "</pre>";

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

<pre class="line-numbers"><code class="language-php">/////////////////////////////////////////////
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
}</code></pre>
<p><?php echo "<pre>"; echo "Create class"; echo "</pre>"; ?></p>

<pre class="line-numbers"><code class="language-php">// create object $productOne of the class
$productOne = new Product();
echo "\nDefault value name:\t" . $productOne->name;
echo "\nDefault value price:\t" . $productOne->price;
echo "\nDefault value desc:\t" . $productOne->desc;</code></pre>
<p><?php echo "<pre>"; echo "\nDefault value name:\t" . $productOne->name;
echo "\nDefault value price:\t" . $productOne->price;
echo "\nDefault value desc:\t" . $productOne->desc;
echo "\n"; echo "</pre>";?></p>

<pre class="line-numbers"><code class="language-php">// create object $productTwo of the class
$productTwo = new Product("this value as been set!",null,"this value as been set as well!");
echo "\nSet value name:\t\t" . $productTwo->name;
echo "\nDefault value price:\t" . $productTwo->price;
echo "\nSet value desc:\t\t" . $productTwo->desc;</code></pre>
<p><?php echo "<pre>" ; $productTwo = new Product("this value as been set!",null,"this value as been set as well!");
echo "\nSet value name:\t\t" . $productTwo->name;
echo "\nDefault value price:\t" . $productTwo->price;
echo "\nSet value desc:\t\t" . $productTwo->desc;
echo "\n"; echo "</pre>"; ?></p>

<pre class="line-numbers"><code class="language-php">// set instance property
$productOne->name = "soda";</code></pre>

<pre class="line-numbers"><code class="language-php">// pull instance property
echo "\nSet/Pull value:\t\t" . $productOne->name;</code></pre>
<p><?php echo "<pre>"; echo "\nSet/Pull value:\t\t" . $productOne->name; echo "</pre>";?></p>

<pre class="line-numbers"><code class="language-php">// pull instance method
echo "\nMethod pull:\t\t" . $productOne->getName();</code></pre>
<p><?php echo "<pre>"; echo "\nMethod pull:\t\t" . $productOne->getName(); echo "</pre>"; ?></p>

<pre class="line-numbers"><code class="language-php">/////////////////////////////////////////////
///////////////// EXAMPLE 2 /////////////////
/////////////////////////////////////////////

class Fish
{
  // properties
  public $common_name;
  public $flavor;
  public $record_weight;

  // constructor
  function __construct($name, $flavor, $record){
    $this->common_name = $name;
    $this->flavor = $flavor;
    $this->record_weight = $record;
  }

  // methods
  public function getInfo() {
    $output  = "The {$this->common_name} is an awesome fish. ";
    $output .= "It is very {$this->flavor} when eaten. ";
    $output .= "Currently the world record {$this->common_name} weighed {$this->record_weight}.";
    return $output;
  }
}

class Trout extends Fish {
  // properties
  public $species;

  // constructor
  function __construct($name, $flavor, $record, $species) {
    parent::__construct($name, $flavor, $record);
    $this->species = $species;
  }

  // override Fish function to include species
  public function getInfo() {
    $output  = "The {$this->species} {$this->common_name} is an awesome fish. ";
    $output .= "It is very {$this->flavor} when eaten. ";
    $output .= "Currently the world record {$this->common_name} weighed {$this->record_weight}.";
    return $output;
  }
}</code></pre>
<p><?php echo "<pre>"; echo "Create class"; echo "</pre>"; ?></p>

<pre class="line-numbers"><code class="language-php">$brook_trout = new Trout("Trout", "Delicious", "14 pounds 8 ounces", "Brook");
echo "\n\n" . $brook_trout->getInfo();</code></pre>
<p><?php echo "<pre>"; echo  $brook_trout->getInfo(); echo "</pre>"; ?></p>

</body>
</html>





