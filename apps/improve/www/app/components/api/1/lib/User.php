<?php

require_once("Database.php");
require_once("Api.php");

class User {
  public static function login() {

  }
  public static function logout() {

  }
  public static function authenticate() {

  }
  public static function authorize() {

  }

  public static function create($user) {
    // E-TODO: need to add to memcache
    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
    $params = $user;
    return Database::query($sql,$params,0);
  }

  public static function read($user_id) {
    if ($user_id === null) {
      $sql = "SELECT * from users";
      $params = null;
    } else {
      $sql = "SELECT * from users WHERE id = ?";
      $params = [$user_id];
    }
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