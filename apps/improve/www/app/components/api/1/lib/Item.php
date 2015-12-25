<?php

require_once("Database.php");

class Item {

  public static function create($data) {
    if (!empty($data["item_id"])) return "error cannot create on individual item";

    $params = [$data["user_id"], $data["category_id"], $data["purpose"], $data["vision"], $data["methodology"], $data["is_example"], $data["is_active"]];

    $sql["user_id"] = (empty($data["user_id"])) ? "null" : "?";
    $sql["category_id"] = (empty($data["user_id"])) ? "null" : "?";
    $sql["purpose"] = (empty($data["purpose"])) ? "null" : "?";
    $sql["vision"] = (empty($data["vision"])) ? "null" : "?";
    $sql["methodology"] = (empty($data["methodology"])) ? "null" : "?";
    $sql["is_example"] = (empty($data["is_example"])) ? "0" : "?";
    $sql["is_active"] = (empty($data["is_active"])) ? "1" : "?";

    $sql = "INSERT INTO
    items (user_id, category_id, purpose, vision, methodology, is_example, is_active)
    VALUES ("
    . $sql["user_id"] . ", "
    . $sql["category_id"] . ", "
    . $sql["purpose"] . ", "
    . $sql["vision"] . ", "
    . $sql["methodology"] . ", "
    . $sql["is_example"] . ", "
    . $sql["is_active"] . ")";

    return Database::query($sql,$params,2);
  }

  public static function read($data) {
    $params = [$data["user_id"], $data["type_id"], $data["category_id"], $data["item_id"]];

    $sql["user_id"] = (empty($data["user_id"])) ? "i.user_id" : "?";
    $sql["type_id"] = (empty($data["type_id"])) ? "t.id" : "?";
    $sql["category_id"] = (empty($data["category_id"])) ? "c.id" : "?";
    $sql["item_id"] = (empty($data["item_id"])) ? "i.id" : "?";

    $sql = "SELECT
      i.id item_id
    , i.purpose item_purpose
    , i.vision item_vision
    , i.methodology item_methodology
    , t.id type_id
    , c.id category_id
    FROM items i
    INNER JOIN categories c ON i.category_id = c.id
    INNER JOIN types t ON c.type_id = t.id
    WHERE 1=1
    AND i.is_active
    AND c.is_active
    AND t.is_active
    AND i.user_id = " . $sql["user_id"] . "
    AND t.id = " . $sql["type_id"] . "
    AND c.id = " . $sql["category_id"] . "
    AND i.id = " . $sql["item_id"] . "
    ORDER BY t.id, c.id, i.id";

    // E-TODO: also query last 90 days as 0 & 1 (limit 1 per day)

    return Database::query($sql,$params,1);
  }

  public static function update($data) {
    if (empty($data["item_id"])) return "error cannot update on all items";

    $params = [$data["user_id"], $data["category_id"], $data["purpose"], $data["vision"], $data["methodology"], $data["is_example"], $data["is_active"], $data["item_id"]];

    $sql["user_id"] = (empty($data["user_id"])) ? "user_id" : "?";
    $sql["category_id"] = (empty($data["category_id"])) ? "category_id" : "?";
    $sql["purpose"] = (empty($data["purpose"])) ? "purpose" : "?";
    $sql["vision"] = (empty($data["vision"])) ? "vision" : "?";
    $sql["methodology"] = (empty($data["methodology"])) ? "methodology" : "?";
    $sql["is_example"] = (empty($data["is_example"])) ? "is_example" : "?";
    $sql["is_active"] = (empty($data["is_active"])) ? "is_active" : "?";
    $sql["item_id"] = (empty($data["item_id"])) ? "id" : "?";

    $sql = "UPDATE items
    SET user_id = " . $sql["user_id"] . "
    , category_id = " . $sql["category_id"] . "
    , purpose = " . $sql["purpose"] . "
    , vision = " . $sql["vision"] . "
    , methodology = " . $sql["methodology"] . "
    , is_example = " . $sql["is_example"] . "
    , is_active = " . $sql["is_active"] . "
    WHERE id = " . $sql["item_id"];

    return Database::query($sql,$params,0);
  }

  public static function delete($data) {
    if (empty($data["item_id"])) return "error cannot delete on all items";

    $params = [$data["item_id"]];

    $sql = "UPDATE items SET is_active = 0 WHERE id = ?";

    return Database::query($sql,$params,0);
  }
}