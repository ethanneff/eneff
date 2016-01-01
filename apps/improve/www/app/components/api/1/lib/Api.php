<?php

require_once("Database.php");

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

define("BASE_URL","/");
define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"] . "/");
define("DEV", 1);

if (DEV) {
  // header("Content-Type: text/html; charset=utf-8");
  ini_set("display_errors", 1);
  ini_set("display_startup_errors", 1);
  error_reporting(E_ALL);
}

Class Api {
  private static $errors = [];

  public static function response($response) {
    // output and finish
    $output = array();
    if ($response === false) {
      self::error(400, 1, "incorrect api/http usage");
    }

    if (!empty(self::$errors)) {
      $output["errors"] = self::$errors;
      http_response_code($output["errors"][0]["status"]);
    } else {
      $output["results"] = $response;
      http_response_code(200);
    }
    echo json_encode($output);
    exit();
  }

  public static function error($status, $exit, $message) {
    // 400 (client) missing, already_exists, missing_field, invalid_field
    // 500 (server)
    $error =  array("status" => $status, "message" => $message);
    array_push(self::$errors, $error);
    if ($exit) self::response("error");
  }

  public static function error_check($output) {
    if (is_string($output) && strpos($output, "error") !== false)  {
      self::error(400, 1, $output);
    }
  }

  public static function get_url_id($dir) {
    $dir = "/" . $dir . "/";
    $url = $_SERVER["REQUEST_URI"];
    $beg = strpos($url, $dir) + strlen($dir);
    $end = strpos($url, "/", $beg);
    $id = substr($url, $beg, $end - $beg);
    return ($id !== false) ? intval($id) : false;
  }

  public static function authenticate() {
    return true;

    $headers = getallheaders();
    if (empty($headers["Authorization"])) self::error(0, 2, 0, "missing access token");

    $user_id = Api::get_url_id("users");
    $access_token = $headers["Authorization"];

    $sql = "SELECT 1
    FROM user
    WHERE 1=1
    AND is_active
    AND id = ?
    AND access_token = ?
    ORDER BY 1 LIMIT 1";

    $params = [$user_id, $access_token];
    $results = Database::query($sql,$params,0);

    if ($results) {
      return true;
    } else {
      Api::error(0, 3, 0, "invalid access token authorization");
    }
  }
}