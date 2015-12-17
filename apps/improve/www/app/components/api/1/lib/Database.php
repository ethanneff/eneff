<?php

class Database {
  private static $host = "localhost";
  private static $name = "enefjzpu_improve";
  private static $port = "3306";
  private static $user = "root";
  private static $pass = "root";
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
      Api::error(1, 0, 0, "could not connect to database");
    }
  }

  public static function query($query, $params, $read) {
    $success = false;
    $params = (null === $params) ? array() : $params;
    $retry = self::$retrys;

    if (!self::$db) self::connect();

    while ($retry) {
      try {
        $stmt = self::$db->prepare($query);
        $i = 0;
        foreach ($params as $key => &$val) {
          if ($val !== null) {
            $stmt->bindParam(++$i, $val);
          }
        }
        $success = $stmt->execute();
        if ($success) break;
      } catch (Exception $e) {
        if (strpos(strtolower($e->getMessage()), "invalid parameter number") !== false) {
          Api::error(0, 2, 0, "invalid parameter number when querying the database");
        } else if (strpos(strtolower($e->getMessage()), "duplicate entry") !== false) {
          Api::error(0, 1, 0, "duplicated entry in database");
        }
        trigger_error("could not query database. Code: " . $e->getCode() . " message: " . $e->getMessage(), E_USER_WARNING);
        $retry--;
        usleep(self::$wait);
      }
    }

    if ($success) {
      if ($read) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($results)) {
          Api::error(0, 0, 0, "no data found within database");
        } else {
          return $results;
        }
      } else {
        if ($stmt->rowCount() > 0) return true;
        return false;
      }
    } else {
      Api::error(1, 0, 0, "could not query database");
    }
  }
}