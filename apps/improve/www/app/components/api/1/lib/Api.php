<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

define("BASE_URL","/");
define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"] . "/");
define("DEV", 1);

if (DEV) {
  header("Content-Type: text/html; charset=utf-8");
  ini_set("display_errors", 1);
  ini_set("display_startup_errors", 1);
  error_reporting(E_ALL);
}

Class Api {
  public static $errors = [];

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

  public static function error($status, $message, $continue) {
    // 400 (client) or 500 (server)
    $error =  array("status" => $status, "message" => $message);
    array_push(self::$errors, $error);
    if (!$continue) self::response("error");
  }
}