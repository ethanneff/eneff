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
$data["item_id"] = (!empty($_GET["id"])) ? Validate::int($_GET["id"]) : false;
$data["category_id"] = (!empty($_GET["category_id"])) ? $_GET["category_id"] : false;
$data["type_id"] = (!empty($type_id)) ? Validate::int($type_id) : false;

$data["category_id"] = (!empty($_POST["category_id"])) ? Validate::int($_POST["category_id"]) : false;
$data["purpose"] = (!empty($_POST["purpose"])) ? Validate::string($_POST["purpose"]) : false;
$data["vision"] = (!empty($_POST["vision"])) ? Validate::string($_POST["vision"]) : false;
$data["methodology"] = (!empty($_POST["methodology"])) ? Validate::string($_POST["methodology"]) : false;
$data["is_example"] = (!empty($_POST["is_example"])) ? Validate::bool($_POST["is_example"]) : false;
$data["is_active"] = (!empty($_POST["is_active"])) ? Validate::bool($_POST["is_active"]) : false;

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