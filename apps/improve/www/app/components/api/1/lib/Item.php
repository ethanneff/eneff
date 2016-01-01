<?php

require_once("Database.php");

class Item {

  public static function create($data) {
    if ($data["item_id"] !== false) return "error cannot create on individual item";

    $params = [$data["user_id"], $data["category_id"], $data["purpose"], $data["vision"], $data["methodology"], $data["is_example"], $data["is_active"]];

    $sql["user_id"] = ($data["user_id"] === false) ? "null" : "?";
    $sql["category_id"] = ($data["user_id"] === false) ? "null" : "?";
    $sql["purpose"] = ($data["purpose"] === false) ? "null" : "?";
    $sql["vision"] = ($data["vision"] === false) ? "null" : "?";
    $sql["methodology"] = ($data["methodology"] === false) ? "null" : "?";
    $sql["is_example"] = ($data["is_example"] === false) ? "0" : "?";
    $sql["is_active"] = ($data["is_active"] === false) ? "1" : "?";

    $sql = "INSERT INTO
    item (user_id, category_id, purpose, vision, methodology, is_example, is_active)
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
    $params = [$data["user_id"], $data["type_id"], $data["category_id"], $data["item_id"], $data["is_example"], $data["is_active"]];

    $sql["user_id"] = ($data["user_id"] === false) ? "i.user_id" : "?";
    $sql["type_id"] = ($data["type_id"] === false) ? "t.id" : "?";
    $sql["category_id"] = ($data["category_id"] === false) ? "c.id" : "?";
    $sql["item_id"] = ($data["item_id"] === false) ? "i.id" : "?";
    $sql["is_example"] = ($data["is_example"] === false) ? "i.is_example" : "?";
    $sql["is_active"] = ($data["is_active"] === false) ? "i.is_active" : "?";

    $sql = "SELECT
      i.id item_id
    , i.purpose item_purpose
    , i.vision item_vision
    , i.methodology item_methodology
    , t.id type_id
    , c.id category_id
    FROM item i
    INNER JOIN category c ON i.category_id = c.id
    INNER JOIN type t ON c.type_id = t.id
    WHERE 1=1
    AND i.is_active
    AND c.is_active
    AND t.is_active
    AND i.user_id = " . $sql["user_id"] . "
    AND t.id = " . $sql["type_id"] . "
    AND c.id = " . $sql["category_id"] . "
    AND i.id = " . $sql["item_id"] . "
    AND i.is_example = " . $sql["is_example"] . "
    AND i.is_active = " . $sql["is_active"] . "
    ORDER BY t.id, c.id, i.id";

    // E-TODO: also query last 90 days as 0 & 1 (limit 1 per day)

    return Database::query($sql,$params,1);
  }

  public static function update($data) {
    if ($data["item_id"] === false) return "error cannot update on all items";

    $params = [$data["user_id"], $data["category_id"], $data["purpose"], $data["vision"], $data["methodology"], $data["is_example"], $data["is_active"], $data["item_id"]];

    $sql["user_id"] = ($data["user_id"] === false) ? "user_id" : "?";
    $sql["category_id"] = ($data["category_id"] === false) ? "category_id" : "?";
    $sql["purpose"] = ($data["purpose"] === false) ? "purpose" : "?";
    $sql["vision"] = ($data["vision"] === false) ? "vision" : "?";
    $sql["methodology"] = ($data["methodology"] === false) ? "methodology" : "?";
    $sql["is_example"] = ($data["is_example"] === false) ? "is_example" : "?";
    $sql["is_active"] = ($data["is_active"] === false) ? "is_active" : "?";
    $sql["item_id"] = ($data["item_id"] === false) ? "id" : "?";

    $sql = "UPDATE item
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
    if ($data["item_id"] === false) return "error cannot delete on all items";

    $params = [$data["item_id"]];

    $sql = "UPDATE item SET is_active = 0 WHERE id = ?";

    return Database::query($sql,$params,0);
  }
}