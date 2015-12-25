<?php

require_once("../../lib/Api.php");
require_once("../../lib/Validate.php");
require_once("../../lib/User.php");

$user_id = Api::get_url_id("users");
$output = false;

if (strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
  Api::authenticate();
  if (empty($user_id)) Api::error(400, 1, "cannot logout all api users");

  $data["id"] = (!empty($user_id)) ? Validate::int($user_id) : false;

  $output = User::logout($data);
  Api::error_check($output);
}

// output
Api::response($output);

// test
function test_logout() {
  // users/login
  $_SERVER["REQUEST_METHOD"] = "POST";
}