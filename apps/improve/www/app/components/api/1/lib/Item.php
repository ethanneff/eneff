<?php

require_once("Database.php");
require_once("Api.php");

class Item {
  public static function create($user) {
    // E-TODO: need to add to memcache
    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $params = $user;
    return Database::query($sql,$params,0);
  }

  public static function read($user_id, $type_id, $category_id, $item_id) {
    $sql_user_id = ($user_id === null) ? "i.user_id" : "?";
    $sql_type_id = ($type_id === null) ? "t.id" : "?";
    $sql_category_id = ($category_id === null) ? "c.id" : "?";
    $sql_item_id = ($item_id === null) ? "i.id" : "?";

    $sql = "SELECT t.id type_id
    -- , t.title type_title
    -- , t.subtitle type_subtitle
    -- , t.caption type_caption
    , c.id category_id
    -- , c.title category_title
    -- , c.subtitle category_subtitle
    , i.id item_id
    , i.purpose item_purpose
    , i.vision item_vision
    , i.methodology item_methodology
    FROM items i
    JOIN categories c ON i.category_id = c.id
    JOIN types t ON c.type_id = t.id
    WHERE 1=1
    AND i.is_active
    AND c.is_active
    AND t.is_active
    AND i.user_id = " . $sql_user_id . "
    AND t.id = " . $sql_type_id . "
    AND c.id = " . $sql_category_id . "
    AND i.id = " . $sql_item_id . "
    ORDER BY t.id, c.id, i.id";

    $params = [$user_id, $type_id, $category_id, $item_id];

    return Database::query($sql,$params,1);
  }

  public static function update($user) {
    // E-TODO: need to reset memcache
    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $params = $user;
    return Database::query($sql,$params,0);

  }
  public static function delete($user_id) {
    // E-TODO: need to reset memcache
    $sql = "UPDATE users SET is_active = 0 WHERE id = ?";
    $params = [$user_id];
    return Database::query($sql,$params,0);
  }
}