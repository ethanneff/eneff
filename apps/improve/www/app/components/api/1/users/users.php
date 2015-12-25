<?php

// libs
require_once("../lib/Api.php");
require_once("../lib/Validate.php");
require_once("../lib/User.php");

// params
$user_id = Api::get_url_id("users");
$output = false;

if (strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
  // read
  Api::authenticate();

  $data["id"] = (!empty($user_id)) ? Validate::int($user_id) : false;
  $data["email"] = (!empty($_POST["email"])) ? Validate::email($_POST["email"]) : false;

  $output = User::read($data);
  Api::error_check($output);
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
  // create (signup)
  if (!empty($user_id)) Api::error(400,1, "cannot create user on api user");

  $data["id"] = (!empty($user_id)) ? Validate::int($user_id) : false;
  $data["email"] = (isset($_POST["email"])) ? Validate::email($_POST["email"]) : false;
  $data["password"] = (isset($_POST["password"])) ? Validate::password($_POST["password"]) : false;

  $output = User::create($data);
  Api::error_check($output);
  $output = User::read($data);
  Api::error_check($output);
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "PUT") {
  // update (change email, change pass, active, remove access_token)
  Api::authenticate();
  if (empty($user_id)) Api::error(400,1, "cannot update all api users");

  $data["email"] = (isset($_POST["email"])) ? Validate::email($_POST["email"]) : false;
  $data["password"] = (isset($_POST["password"])) ? Validate::password($_POST["password"]) : false;
  $data["is_active"] = (isset($_POST["is_active"])) ? Validate::bool($_POST["is_active"]) : false;
  $data["access_token"] = (isset($_POST["access_token"]) && Validate::bool($_POST["access_token"]) === false) ? null : false;
  $data["id"] = (isset($user_id)) ? Validate::int($user_id) : false;

  $output = User::update($data);
  Api::error_check($output);
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "DELETE") {
  // delete (archive)
  Api::authenticate();
  if (empty($user_id)) Api::error(400,1, "cannot delete all api users");

  $data["id"] = (!empty($user_id)) ? Validate::int($user_id) : false;

  $output = User::delete($data);
  Api::error_check($output);
}

// output
Api::response($output);


// test
function test_create() {
  $_SERVER["REQUEST_METHOD"] = "POST";
  $_POST["email"] = "a2i2n@asdoina.com";
  $_POST["password"] = "aoidn22as@A1";
}

function test_update() {
  $_SERVER["REQUEST_METHOD"] = "PUT";
  $_POST["password"] = "Aaa111@";
  // $_POST["access_token"] = false;
  $_POST["is_active"] = true;
}

function test_delete() {
  $_SERVER["REQUEST_METHOD"] = "DELETE";
}
