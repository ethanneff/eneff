<?php

require_once("Database.php");
require_once("Api.php");

class Category {

  public static function create($array) {
    // E-TODO: need to add to memcache
    $sql = "INSERT INTO types (title, subtitle, caption, is_active, type_id) VALUES (?, ?, ?, ?, ?)";
    $params = $array;
    return Database::query($sql,$params,0);
  }

  public static function read($id) {
    $sql_category_id = ($id === null) ? "c.id" : "?";

    $sql = "SELECT c.id id
    , c.type_id type_id
    , c.title title
    , c.subtitle subtitle
    , c.caption caption
    FROM categories c
    WHERE 1=1
    AND c.is_active
    AND c.id = " . $sql_category_id . "
    ORDER BY c.id";

    $params = [$id];

    return Database::query($sql,$params,1);
  }

  public static function update($array) {
    // E-TODO: need to reset memcache

  }

  public static function delete($id) {
    // E-TODO: need to reset memcache
    $sql = "UPDATE categories SET is_active = 0 WHERE id = ?";
    $params = [$id];
    return Database::query($sql,$params,0);
  }
}