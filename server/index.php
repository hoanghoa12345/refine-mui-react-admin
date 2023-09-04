<?php
require 'vendor/autoload.php';
require_once './config.php';
require_once './payment-bills.php';
require_once './payment-details.php';

Flight::set('flight.log_errors', true);

Flight::route('/', function () {
  Flight::json(['message' => 'Flight API', "version" => "1.0.0"], 200);
});

Flight::route('GET /payment-bills', array('PaymentBills', 'list'));

Flight::route('GET /payment-bills/@id', array('PaymentBills', 'get'));

Flight::route('POST /payment-bills', array('PaymentBills', 'create'));

Flight::route('PATCH /payment-bills/@id', array('PaymentBills', 'update'));

Flight::route('DELETE /payment-bills/@id', array('PaymentBills', 'delete'));

Flight::route('GET /payment-details', array('PaymentDetails', 'list'));

Flight::route('GET /payment-details/@id', array('PaymentDetails', 'get'));

Flight::start();
