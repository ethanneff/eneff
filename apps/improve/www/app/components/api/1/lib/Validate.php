<?php

class Validate {
  public static function bool($var) {
    if ($var === false || $var === true) {
      return trim($var);
    }
    Api::error(400, 0, "invalid field bool " . $var);
  }
  public static function int($var) {
    if (filter_var($var, FILTER_VALIDATE_INT)) {
      return trim($var);
    }
    Api::error(400, 0, "invalid field int " . $var);
  }
  public static function float($var) {
    if (filter_var($var, FILTER_VALIDATE_FLOAT)) {
      return trim($var);
    }
    Api::error(400, 0, "invalid field float " . $var);
  }
  public static function null($var) {
    if (is_null($var)) {
      return trim($var);
    }
    Api::error(400, 0, "invalid field null " . $var);
  }
  public static function string($var) {
    if (is_string($var)) {
      return trim($var);
    }
    Api::error(400, 0, "invalid field string " . $var);
  }
  public static function url($var) {
    if (filter_var($var, FILTER_VALIDATE_URL)) {
      return trim($var);
    }
    Api::error(400, 0, "invalid field url " . $var);
  }
  public static function ip($var) {
    if (filter_var($var, FILTER_VALIDATE_IP)) {
      return trim($var);
    }
    Api::error(400, 0, "invalid field ip " . $var);
  }
  public static function email($var) {
    if (filter_var($var, FILTER_VALIDATE_EMAIL)) {
      return trim($var);
    }
    Api::error(400, 0, "invalid field email " . $var);
  }
  public static function password($var) {
    if (preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=!\?]{6,50}$/',$var)) {
      return trim($var);
    }
    Api::error(400, 0, "invalid field password " . $var);
  }
}