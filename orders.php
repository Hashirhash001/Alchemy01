<?php

$name = $_GET['name'];
$email = $_GET['email'];

$key = "rzp_test_wV8WsZApvfGGAC";
$token = "lK6mlibIm5MOvCLGHOhen276";
$url = "https://api.razorpay.com/v1/orders";
$rec = "KTT_".date('Y'.'m'.'d'.'H'.'i'.'s');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $key.":".$token);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('content-type: application/json'));

$data = <<< JSON
{
  "amount": 50000,
  "currency": "INR",
  "receipt": "$rec",
  "notes": {
    "name": "$name",
    "email": "$email"
  }
}
JSON;
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($ch);
$decode = json_decode($response);
$orderID = $decode->id;
echo "$orderID";
