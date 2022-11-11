<?php
require('helpers/connection.php');
require('helpers/functions.php');

require('./razorpay-php/Razorpay.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$api = new Api(RAZORPAY_KEY_ID, RAZORPAY_KEY_SECRET);

$json = file_get_contents('php://input');

try {
  $api->utility->verifyWebhookSignature($json, $_SERVER['HTTP_X_RAZORPAY_SIGNATURE'], WEBHOOK_SECRET);
} catch (SignatureVerificationError $e) {
  error_log($e->getMessage());
  exit;
}

$responseArray = json_decode($json);

$payload = $responseArray->payload;

$payment = $payload->payment;
$entity = $payment->entity;
$paymentLink = $payload->payment_link;
$linkEntity = $paymentLink->entity;

$orderID = $entity->order_id;
$paymentID = $entity->id;
$paymentLinkID = $linkEntity->id;
error_log($orderID . " " . $paymentID . " " . $paymentLinkID);
if ($responseArray->event === 'payment_link.paid') {
  $res = mysqli_query($con, "UPDATE appointments SET razorpay_order_id = '$orderID', razorpay_payment_id = '$paymentID', order_status = 'paid', paid_at = '" . date('Y-m-d H:i:s') . "' WHERE razorpay_link_id = '$paymentLinkID'");
}
