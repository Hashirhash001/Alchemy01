<?php

require('../helpers/connection.php');
require('../helpers/functions.php');
require('../helpers/auth.php');
require('../razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

$api = new Api(RAZORPAY_KEY_ID, RAZORPAY_KEY_SECRET);

try {
  $id = get_safe_value($con, $_GET['id']);

  $res = new \stdClass();

  $res->appointment = getMySqlObject($con, "SELECT id, customer_name, customer_mobile, customer_mail, totalAmount, order_status, payment_type, razorpay_link_id, razorpay_payment_id, razorpay_order_id, appointment_date, created_at, paid_at FROM appointments WHERE id = '$id'");

  $res->services = getMySqlArray($con, "SELECT name  FROM appointment_services INNER JOIN services ON appointment_services.service_id = services.id WHERE appointment_services.appointment_id = '$id'");

  if ($res->appointment->order_status !== 'pending') {
    $paymentDetails = new stdClass();
    $paymentLink = $api->paymentLink->fetch($res->appointment->razorpay_link_id);

    $paymentDetails->id = $paymentLink['id'];
    $paymentDetails->short_url = $paymentLink['short_url'];
    $paymentDetails->amount = $paymentLink['amount'] / 100;
    $paymentDetails->status = $paymentLink['status'];

    $res->paymentDetails = $paymentDetails;
  }
  response($res);
} catch (\Throwable $th) {
  $result = new \stdClass();
  $result->error = true;
  $result->msg = "Could not fetch Appointment";
  response($result);
}
