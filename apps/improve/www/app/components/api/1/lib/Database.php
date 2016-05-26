<?php

class Database {
  private static $host = "localhost";
  private static $name = "enefjzpu_improve";
  private static $port = "3306";
  private static $user = "enefjzpu_eneff";
  private static $pass = "y_O15iGsYpw4i";
  private static $retrys = 3;
  private static $wait = 250000;
  private static $db;

  public static function connect() {
    if (!self::$db) {
      $retry = self::$retrys;
      while ($retry) {
        try {
          self::$db = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$name .";port=" . self::$port, self::$user, self::$pass);
          self::$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
          self::$db->exec("SET NAMES 'utf8'");
          if (self::$db) break;
        } catch (Exception $e) {
          // trigger_error("Could not connect to database. Code: " . $e->getCode() . " message: " . $e->getMessage(), E_USER_WARNING);
          $retry--;
          usleep(self::$wait);
        }
      }
    }

    if (self::$db) {
      return self::$db;
    } else {
      Api::error(500, 1, "missing database connection");
    }
  }

  public static function query($query, $params, $type) {
    $success = false;
    $params = (false === $params) ? array() : $params;
    $retry = self::$retrys;

    if (!self::$db) self::connect();

    while ($retry) {
      try {
        $stmt = self::$db->prepare($query);
        $i = 0;
        foreach ($params as $key => &$val) {
          if ($val !== false) {
            $stmt->bindParam(++$i, $val);
          }
        }
        $success = $stmt->execute();
        if ($success) break;
      } catch (Exception $e) {
        if (strpos(strtolower($e->getMessage()), "invalid parameter number") !== false) {
          return "error incorrect parameters";
        } else if (strpos(strtolower($e->getMessage()), "duplicate entry") !== false) {
          return "error duplication within database";
        }
        // trigger_error("could not query database. Code: " . $e->getCode() . " message: " . $e->getMessage(), E_USER_WARNING);
        $retry--;
        usleep(self::$wait);
      }
    }

    if ($success) {
      if ($type === 1) {
        // read
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($results)) {
          return "error no data found in the database";
        } else {
          return $results;
        }
      } else if ($type === 2) {
        // create
        return self::$db->lastInsertId();
      } else {
        // update
        if ($stmt->rowCount() > 0) return true;
        return "error no changes were made in the database";
      }
    } else {
      return "error query failed";
    }
  }
}