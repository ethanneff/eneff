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
echo "\n\n" . $brook_trout->getInfo();
</code><strong>
<?php
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
echo $brook_trout->getInfo();
?>
</strong>
</pre>
</body>
</html>
