<?php

require_once("Database.php");

class User {

  private static function authorize($email, $password) {
    return self::hash($email . $password);
  }

  private static function hash($val) {
    $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
    $salt = sprintf("$2a$%02d$", 10) . $salt;
    $hash = crypt($val, $salt);
    return $hash;
  }

  public static function login($data) {
    // validate pass
    $sql = "SELECT id, password, access_token
    FROM users
    WHERE 1=1
    AND email = ?";

    $params = [$data["email"]];
    $user = Database::query($sql,$params,1);
    if (empty($user[0]["password"])) return "error invalid email";

    if (password_verify($data["password"],$user[0]["password"])) {
      // create access token
      $data["id"] = $user[0]["id"];
      $data["access_token"] = self::authorize($data["email"] ,$data["password"] );

      $sql = "UPDATE users
      SET access_token = ?
      WHERE id = ?";

      $params = [$data["access_token"], $data["id"]];

      return Database::query($sql,$params,0);
    } else {
      return "error invalid password";
    }
  }

  public static function logout($data) {
    $sql_id = ($data["id"] === false) ? "id" : "?";

    $sql = "UPDATE users
    SET access_token = NULL
    WHERE id = " . $sql_id;

    $params = $data;

    return Database::query($sql,$params,0);
  }

  public static function create($data) {
    $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
    $data["access_token"] = self::authorize($data["email"] ,$data["password"] );

    $sql = "INSERT INTO users (email, password, access_token) VALUES (?, ?, ?)";
    $params = $data;
    return Database::query($sql,$params,0);
  }

  public static function read($data) {
    $params["id"] = ($data["id"] === false) ? false : $data["id"];
    $params["email"] = ($data["email"] === false) ? false : $data["email"];

    $sql["id"] = ($data["id"] === false) ? "id" : "?";
    $sql["email"] = ($data["email"] === false) ? "email" : "?";

    $sql = "SELECT id, email, access_token
    FROM users
    WHERE 1=1
    AND is_active
    AND id = " . $sql["id"] . "
    AND email = " . $sql["email"] . "
    ORDER BY id DESC";

    return Database::query($sql,$params,1);
  }

  public static function update($data) {

    $sql_email = ($data["email"] === false) ? "email" : "?";
    $sql_password = ($data["password"] === false) ? "password" : "?";
    $sql_is_active = ($data["is_active"] === false) ? "is_active" : "?";
    $sql_access_token = ($data["access_token"] === false) ? "access_token" : "?";
    $sql_id = ($data["id"] === false) ? "id" : "?";

    $data["password"] = ($data["password"] === false) ? $data["password"] : self::hash($data["password"]);

    $sql = "UPDATE users
    SET email = " . $sql_email . "
    , password = " . $sql_password . "
    , is_active = " . $sql_is_active . "
    , access_token = " . $sql_access_token . "
    WHERE id = " . $sql_id;

    $params = $data;

    return Database::query($sql,$params,0);
  }

  public static function delete($data) {
    $sql_id = ($data["id"] === false) ? "id" : "?";

    $sql = "UPDATE users
    SET is_active = 0
    WHERE id = " . $sql_id;

    $params = $data;
    return Database::query($sql,$params,0);
  }
}