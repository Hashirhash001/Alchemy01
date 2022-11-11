<?php

session_start();
$con = mysqli_connect("localhost", "root", "", "alchemy");

if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$environment = "dev";
//$environment = "production";

define('RAZORPAY_KEY_ID', 'rzp_test_wV8WsZApvfGGAC');
define('RAZORPAY_KEY_SECRET', 'lK6mlibIm5MOvCLGHOhen276');
define('WEBHOOK_SECRET', 123456);

if ($environment === 'dev') {
  // error_reporting(E_ALL);
  // ini_set('display_errors', 1);
}
