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
    $sql_params["tracking"] = ($data["tracking"] === false) ? "r.updated_at" : "?";
    $sql_params["user_id"] = ($data["user_id"] === false) ? "i.user_id" : "?";
    $sql_params["type_id"] = ($data["type_id"] === false) ? "c.type_id" : "?";
    $sql_params["category_id"] = ($data["category_id"] === false) ? "c.id" : "?";
    $sql_params["item_id"] = ($data["item_id"] === false) ? "i.id" : "?";
    $sql_params["is_example"] = ($data["is_example"] === false) ? "i.is_example" : "?";
    $sql_params["is_active"] = ($data["is_active"] === false) ? "i.is_active" : "?";

    if ($data["is_app"] === false) {
      return self::read_api($data, $sql_params);
    } else {
      return self::read_app($data, $sql_params);
    }
  }

  private static function read_app($data, $sql_params) {
    $data_params = [$data["tracking"], $data["user_id"], $data["type_id"], $data["category_id"], $data["item_id"], $data["is_example"], $data["is_active"], $data["type_id"], $data["category_id"]];

    $sql = "SELECT
    c.type_id type_id
    , c.id category_id
    , i.id item_id
    , i.sort_id sort_id
    , i.purpose purpose
    , i.vision vision
    , i.methodology methodology
    , i.days days
    , (SELECT GROUP_CONCAT(DATEDIFF(now(), only_success.unique_date)) FROM (
    SELECT * FROM (
    SELECT *, DATE(t.updated_at) unique_date FROM tracking t ORDER BY unique_date DESC
    ) first_in_group
    GROUP BY unique_date
    ) only_success
    WHERE 1=1
    AND only_success.activity_id = 5
    AND only_success.item_id = i.id
    AND only_success.updated_at > SUBDATE(NOW()," . $sql_params["tracking"] . ")) tracking
    FROM item i
    INNER JOIN category c ON i.category_id = c.id
    INNER JOIN type t ON c.type_id = t.id
    WHERE 1=1
    AND i.is_active
    AND c.is_active
    AND t.is_active
    AND i.user_id = " . $sql_params["user_id"] . "
    AND c.type_id = " . $sql_params["type_id"] . "
    AND c.id = " . $sql_params["category_id"] . "
    AND i.id = " . $sql_params["item_id"] . "
    AND i.is_example = " . $sql_params["is_example"] . "
    AND i.is_active = " . $sql_params["is_active"] . "
    UNION
    SELECT
    c.type_id type_id
    , c.id category_id
    , null item_id
    , null sort_id
    , c.caption purpose
    , c.subtitle vision
    , c.title methodology
    , null days
    , null tracking
    FROM category c
    WHERE 1=1
    AND c.is_active
    AND c.type_id = " . $sql_params["type_id"] . "
    AND c.id = " . $sql_params["category_id"] . "
    ORDER BY type_id, category_id, sort_id, item_id";

    $results = Database::query($sql, $data_params, 1);
    $results = self::calc_tracking($results, $data_params[0]);
    return $results;
  }

  private static function read_api($data, $sql_params) {
    $data_params = [$data["tracking"], $data["user_id"], $data["type_id"], $data["category_id"], $data["item_id"], $data["is_example"], $data["is_active"]];

    $sql = "SELECT
    t.id type_id
    , c.id category_id
    , i.id item_id
    , i.sort_id sort_id
    , i.purpose purpose
    , i.vision vision
    , i.methodology methodology
    , i.days days
    , (SELECT GROUP_CONCAT(DATEDIFF(now(), only_success.unique_date)) FROM (
    SELECT * FROM (
    SELECT *, DATE(t.updated_at) unique_date FROM tracking t ORDER BY unique_date DESC
    ) first_in_group
    GROUP BY unique_date
    ) only_success
    WHERE 1=1
    AND only_success.activity_id = 5
    AND only_success.item_id = i.id
    AND only_success.updated_at > SUBDATE(NOW()," . $sql_params["tracking"] . ")) tracking
    FROM item i
    INNER JOIN category c ON i.category_id = c.id
    INNER JOIN type t ON c.type_id = t.id
    WHERE 1=1
    AND i.is_active
    AND c.is_active
    AND t.is_active
    AND i.user_id = " . $sql_params["user_id"] . "
    AND t.id = " . $sql_params["type_id"] . "
    AND c.id = " . $sql_params["category_id"] . "
    AND i.id = " . $sql_params["item_id"] . "
    AND i.is_example = " . $sql_params["is_example"] . "
    AND i.is_active = " . $sql_params["is_active"] . "
    ORDER BY t.id, c.id, i.id";

    $results = Database::query($sql,$data_params,1);
    $results = self::calc_tracking($results,$data_params[0]);

    return $results;
  }

  private static function calc_tracking($results, $tracking_days) {

    for ($i=0; $i < count($results); $i++) {
      $item = $results[$i];

      // out of range error
      if (is_string($item)) {
        return $results;
      }

      // format
      $item["item_id"] = is_null($item["item_id"]) ? null : intval($item["item_id"]);
      $item["sort_id"] = is_null($item["sort_id"]) ? null : intval($item["sort_id"]);
      $item["type_id"] = is_null($item["type_id"]) ? null : intval($item["type_id"]);
      $item["category_id"] = intval($item["category_id"]);

      // tracking
      $completed = (!empty($item["tracking"])) ? explode(",", $item["tracking"]) : [];
      $item["tracking"] = "";
      $tracking_record = 0;
      $tracking_count = 0;

      for ($j = $tracking_days-1; $j >= 0; $j--) {
        if (!empty($completed) && $completed[0] == $j) {
          $item["tracking"] .= "1";
          $tracking_count += 1;
          array_shift($completed);
        } else {
          $item["tracking"] .= "0";
          $tracking_count = 0;
        }
        $tracking_record = ($tracking_count > $tracking_record) ? $tracking_count : $tracking_record;
      }

      $item["days"] = (intval($item["days"]) === 0) ? null : $item["days"];
      $item["tracking"] = (intval($item["tracking"]) === 0) ? null : $item["tracking"];
      $item["record"] = (intval($tracking_record) === 0) ? null : $tracking_record;
      $item["streak"] = (intval($tracking_count) === 0) ? null : $tracking_count;

      $results[$i] = $item;
    }
    return $results;
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