<?php

require_once("Database.php");

class Tracking {
  public static function track($data, $activity) {
    if ($data["item_id"] === false) return "error cannot complete on all items";

    $params = [$data["user_id"], $data["item_id"]];

    $sql = "INSERT INTO
    tracking (user_id, item_id, activity_id)
    VALUES (?, ?, $activity)";

    return Database::query($sql,$params,0);
  }

  public static function success($data) {
    return self::track($data, 5);
  }

  public static function failure($data) {
    return self::track($data, 6);
  }
}