<?php
# set header allow cors
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-Requested-With,Authorization,Content-Type");
header("Access-Control-Allow-Methods: PUT, GET, POST, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 86400");

# set header return json
header("Content-Type: application/json; charset=utf-8");

if (strtolower($_SERVER['REQUEST_METHOD']) == 'options') {
  exit();
}

require_once './database.php';