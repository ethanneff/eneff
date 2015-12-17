<?php

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
  private static $error_status = [400, 500];
  private static $error_codes = ["missing", "already_exists", "missing_field", "invalid_field"];

  public static function response($response) {
    // output and finish
    $output = array();
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

  public static function error($status, $code, $continue, $message) {
    // 400 (client) missing, already_exists, missing_field, invalid_field
    // 500 (server)
    $error =  array("status" => self::$error_status[$status], "code" => self::$error_codes[$code], "message" => $message);
    array_push(self::$errors, $error);
    if (!$continue) self::response("error");
  }

  public static function get_url_id($dir) {
    $dir = "/" . $dir . "/";
    $url = $_SERVER["REQUEST_URI"];
    $beg = strpos($url, $dir) + strlen($dir);
    $end = strpos($url, "/", $beg);
    $id = substr($url, $beg, $end - $beg);
    return intval($id);
  }
}