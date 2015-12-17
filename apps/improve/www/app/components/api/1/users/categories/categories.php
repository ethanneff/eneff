<?php

require_once("../../lib/Api.php");
require_once("../../lib/Category.php");

$user_id = Api::get_url_id("users");
$category_id = (!empty($_GET["id"])) ? $_GET["id"] : null;

if (strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
  $data = Category::read($category_id);
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
  if ($category_id !== null) Api::error(0, 3, 0, "cannot create user on user");
  if (empty($_POST["email"])) Api::error(0, 2, 1, "missing email field to create user");
  if (empty($_POST["password"])) Api::error(0, 2, 0, "missing password field to create user");
  $data = Category::create([$_POST["email"], $_POST["password"]]);
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "PUT") {
  if ($category_id === null) Api::error(0, 3, 0, "cannot update all users");
  $data = Category::update();
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "DELETE") {
  if ($category_id === null) Api::error(0, 3, 0, "cannot delete all users");
  $data = Category::delete($category_id);
}

Api::response($data);