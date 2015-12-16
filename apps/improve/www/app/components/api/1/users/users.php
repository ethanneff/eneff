<?php

require_once("../lib/Api.php");
require_once("../lib/User.php");

$user_id = (!empty($_GET["id"])) ? $_GET["id"] : null;

$_SERVER["REQUEST_METHOD"] = "DELETE";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  $user = User::read($user_id);
} else if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if ($user_id === null) Api::response(500, "cannot create all users", false);
  // post into $user
  $user = User::create($user);
} else if ($_SERVER["REQUEST_METHOD"] === "PUT") {
  // put into $user
  $user = User::update();
} else if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
  if ($user_id === null) Api::error(500, "cannot delete all users", false);
  $user = User::delete($user_id);
}

Api::response($user);