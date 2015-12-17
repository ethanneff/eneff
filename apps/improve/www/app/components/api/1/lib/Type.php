<?php

require_once("Database.php");
require_once("Api.php");

class Type {

  public static function create($array) {
    // E-TODO: need to add to memcache
    $sql = "INSERT INTO types (title, subtitle, caption, is_active) VALUES (?, ?, ?, ?)";
    $params = $array;
    return Database::query($sql,$params,0);
  }

  public static function read($id) {
    $sql_type_id = ($id === null) ? "t.id" : "?";

    $sql = "SELECT t.id id
    , t.title title
    , t.subtitle subtitle
    , t.caption caption
    FROM types t
    WHERE 1=1
    AND t.is_active
    AND t.id = " . $sql_type_id . "
    ORDER BY t.id";

    $params = [$id];

    return Database::query($sql,$params,1);
  }

  public static function update($array) {
    // E-TODO: need to reset memcache

  }

  public static function delete($id) {
    // E-TODO: need to reset memcache
    $sql = "UPDATE types SET is_active = 0 WHERE id = ?";
    $params = [$id];
    return Database::query($sql,$params,0);
  }
}