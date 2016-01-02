<?php

// libs
require_once("../../../lib/Api.php");
require_once("../../../lib/Tracking.php");

// restrict
Api::authenticate();

// params
$output = false;
$data["user_id"] = Api::get_url_id("users");
$data["item_id"] = (!empty($type)) ? Api::get_url_id($type) : Api::get_url_id("items");

// actions
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  // create
  $output = Tracking::success($data);
}

// output
Api::error_check($output);
Api::response($output);

// test
function test_complete() {
  $_SERVER["REQUEST_METHOD"] = "POST";
}