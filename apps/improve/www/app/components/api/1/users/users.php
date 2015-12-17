<?php

require_once("../lib/Api.php");
require_once("../lib/User.php");

$user_id = (!empty($_GET["id"])) ? $_GET["id"] : null;

if (strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
  $data = User::read($user_id);
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
  if ($user_id !== null) Api::error(0, 3, 0, "cannot create user on user");
  if (empty($_POST["email"])) Api::error(0, 2, 1, "missing email field to create user");
  if (empty($_POST["password"])) Api::error(0, 2, 0, "missing password field to create user");
  $data = User::create([$_POST["email"], $_POST["password"]]);
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "PUT") {
  if ($user_id === null) Api::error(0, 3, 0, "cannot update all users");
  $data = User::update();
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "DELETE") {
  if ($user_id === null) Api::error(0, 3, 0, "cannot delete all users");
  $data = User::delete($user_id);
}

Api::response($data);