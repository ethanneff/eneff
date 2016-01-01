<?php

// libs
require_once("../../lib/Api.php");
require_once("../../lib/Validate.php");
require_once("../../lib/Item.php");

// restrict
Api::authenticate();

// params
$output = false;
$data["user_id"] = Api::get_url_id("users");

if (strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
  $data["item_id"] = (isset($_GET["id"])) ? Validate::int($_GET["id"]) : false;
  $data["category_id"] = (isset($_GET["category_id"])) ? Validate::int($_GET["category_id"]) : false;
  $data["type_id"] = (isset($_GET["type_id"])) ? Validate::int($_GET["type_id"]) : false;
  $data["is_example"] = (isset($_GET["is_example"])) ? Validate::bool($_GET["is_example"]) : false;
  $data["is_active"] = (isset($_GET["is_active"])) ? Validate::bool($_GET["is_active"]) : false;
}
if (strtoupper($_SERVER["REQUEST_METHOD"]) === "POST" || strtoupper($_SERVER["REQUEST_METHOD"]) === "PUT") {
  $data["category_id"] = (isset($_POST["category_id"])) ? Validate::int($_POST["category_id"]) : false;
  $data["purpose"] = (isset($_POST["purpose"])) ? Validate::string($_POST["purpose"]) : false;
  $data["vision"] = (isset($_POST["vision"])) ? Validate::string($_POST["vision"]) : false;
  $data["methodology"] = (isset($_POST["methodology"])) ? Validate::string($_POST["methodology"]) : false;
  $data["is_example"] = (isset($_POST["is_example"])) ? Validate::bool($_POST["is_example"]) : false;
  $data["is_active"] = (isset($_POST["is_active"])) ? Validate::bool($_POST["is_active"]) : false;
}

// actions
if (strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
  // read
  $output = Item::read($data);
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
  // create
  $output = Item::create($data);
  Api::error_check($output);
  $data["item_id"] = $output;
  $output = Item::read($data);
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "PUT") {
  // update
  $output = Item::update($data);
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "DELETE") {
  // delete
  $output = Item::delete($data);
}

// output
Api::error_check($output);
Api::response($output);

// test
function test_create() {
  $_SERVER["REQUEST_METHOD"] = "POST";
  $_POST["category_id"] = "15";
  $_POST["purpose"] = "   hello   ";
  $_POST["vision"] = "world";
  $_POST["methodology"] = "nopes";
}

function test_update() {
  $_SERVER["REQUEST_METHOD"] = "PUT";
  $_POST["vision"] = "   hi2    ";
  $_POST["purpose"] = "   hi    ";
}

function test_delete() {
  $_SERVER["REQUEST_METHOD"] = "DELETE";
}