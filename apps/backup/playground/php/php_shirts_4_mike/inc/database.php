<?php

try {
  // connection string
  $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME .";port=" . DB_PORT,DB_USER,DB_PASS);

  // change the error mode property to throw exceptions if error in the query
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  // set utf8 to and from the database
  $db->exec("SET NAMES 'utf8'");
}
catch (Exception $e) {
  echo "Could not connect to the database. $e";
  exit;
}