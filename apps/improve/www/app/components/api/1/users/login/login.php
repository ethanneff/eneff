<?php

require_once("../../lib/Api.php");
require_once("../../lib/Validate.php");
require_once("../../lib/User.php");

$user_id = Api::get_url_id("users");
$output = false;

if (strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
  if (!empty($user_id)) Api::error(400, 1, "cannot login with api user id");

  $data["id"] = (!empty($user_id)) ? Validate::int($user_id) : false;
  $data["email"] = (isset($_POST["email"])) ? Validate::email($_POST["email"]) : false;
  $data["password"] = (isset($_POST["password"])) ? Validate::password($_POST["password"]) : false;

  $output = User::login($data);
  Api::error_check($output);
  $output = User::read($data);
  Api::error_check($output);
}

// output
Api::response($output);

// test
function test_login() {
  // users/login
  $_SERVER["REQUEST_METHOD"] = "POST";
  $_POST["email"] = "a@a.com";
  $_POST["password"] = "Aaa111@";
}