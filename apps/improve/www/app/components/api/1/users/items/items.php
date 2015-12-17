<?php

require_once("../../lib/Api.php");
require_once("../../lib/Item.php");

$user_id = Api::get_url_id("users");
$item_id = (!empty($_GET["id"])) ? $_GET["id"] : null;
$type_id = (!empty($type_id)) ? $type_id : null;
$category_id = (!empty($_GET["category_id"])) ? $_GET["category_id"] : null;

if (strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
  // read
  $data = Item::read($user_id, $type_id, $category_id, $item_id);
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {
  if ($item_id !== null) Api::error(0, 3, 0, "cannot create item on item");
  // validate
  if (empty($_POST["purpose"])) Api::error(0, 2, 1, "missing purpose field to create item");
  // build
  $purpose = $_POST["purpose"];
  $vision = (!empty($_POST["vision"])) ? $_POST["vision"] : null;
  $methodology = (!empty($_POST["methodology"])) ? $_POST["methodology"] : null;
  $is_active = (!empty($_POST["is_active"])) ? $_POST["is_active"] : 1;
  // create
  $data = Item::create([$purpose, $vision, $methodology, $is_active]);
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "PUT") {
  // update
  if ($item_id === null) Api::error(0, 3, 0, "cannot update all items");
  $data = Item::update();
} else if (strtoupper($_SERVER["REQUEST_METHOD"]) === "DELETE") {
  // delete
  if ($item_id === null) Api::error(0, 3, 0, "cannot delete all items");
  $data = Item::delete($item_id);
}

Api::response($data);