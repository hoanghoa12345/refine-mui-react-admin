<?php

define('DB_HOST', '');
define('DB_USER', '');
define('DB_PASS', '');
define('DB_NAME', '');
define('DB_PORT', '');

Flight::register(
  'db',
  'PDO',
  array("mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME, DB_USER, DB_PASS),
  function ($db) {
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
  }
);
