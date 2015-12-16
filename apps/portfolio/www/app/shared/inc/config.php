<?php

// these two constants are used to create root-relative web addresses
// and absolute server paths throughout all the code

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("BASE_URL","/apps/portfolio/www/");
define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"] . "/");

define("DB_HOST","localhost");
define("DB_NAME","shirts4mike");
define("DB_PORT","3306");
define("DB_USER","root");
define("DB_PASS","root");