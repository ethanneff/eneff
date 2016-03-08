<?php

// these two constants are used to create root-relative web addresses
// and absolute server paths throughout all the code

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("BASE_URL", "/apps/portfolio/www/app/components/playground/apps/php/php_shirts_4_mike/");
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/apps/portfolio/www/app/components/playground/apps/php/php_shirts_4_mike/");

define("DB_HOST","localhost");
define("DB_NAME","enefjzpu_shirts4mike");
define("DB_PORT","3306");
define("DB_USER","enefjzpu_eneff");
define("DB_PASS","th1sPassw0rd");