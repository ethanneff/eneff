<?php

require_once("../../lib/Api.php");
require_once("../../lib/Type.php");

$user_id = Api::get_url_id("users");
$type_id = (!empty($_GET["id"])) ? $_GET["id"] : null;

if (strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
  $data = Type::read($type_id);
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
  if ($type_id !== null) Api::error(0, 3, 0, "cannot create user on user");
  if (empty($_POST["email"])) Api::error(0, 2, 1, "missing email field to create user");
  if (empty($_POST["password"])) Api::error(0, 2, 0, "missing password field to create user");
  $data = Type::create([$_POST["email"], $_POST["password"]]);
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "PUT") {
  if ($type_id === null) Api::error(0, 3, 0, "cannot update all users");
  $data = Type::update();
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "DELETE") {
  if ($type_id === null) Api::error(0, 3, 0, "cannot delete all users");
  $data = Type::delete($type_id);
}

Api::response($data);