<?php


require('../helpers/functions.php');
require('../helpers/connection.php');
require('../helpers/auth.php');
require('../razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

$api = new Api(RAZORPAY_KEY_ID, RAZORPAY_KEY_SECRET);

try {
  $id = get_safe_value($con, $_POST['id']);

  $res = mysqli_query($con, "UPDATE appointments SET order_status = 'confirmed' WHERE id = '$id'");
  if ($res) {
    $appointment = getMySqlObject($con, "SELECT id, customer_name, customer_mobile, customer_mail, totalAmount, order_status, payment_type FROM appointments WHERE id = '$id'");

    if ($appointment->order_status === 'confirmed') {
      $linkEntity = array(
        'amount' => (float) $appointment->totalAmount * 100, //Amount in Paisa
        'currency' => 'INR',
        'accept_partial' => false,
        'description' => 'For Alchemy',
        'customer' => array(
          'name' => $appointment->customer_name,
          'email' => $appointment->customer_mail,
          'contact' => "+91" . $appointment->customer_mobile,
          'notify' => array(
            'sms' => true,
            'email' => ($appointment->customer_mail ? true : false)
          ),
          'reminder_enable' => true,
          'options' => array(
            'checkout' => array(
              'name' => 'Alchemy Salon & Spa'
            )
          ),
        )
      );

      $link = $api->paymentLink->create($linkEntity);
      $linkID = $link['id'];

      $res = mysqli_query($con, "UPDATE appointments SET razorpay_link_id = '$linkID' WHERE id = '$id'");
      if ($res) {
        $result = new \stdClass();
        $result->error = false;
        $result->msg = "Order has been successfully confirmed. A payment link has been sent to the customer";
        response($result);
      } else {
        throw new Exception("Error saving payment link Details");
      }
    } else {
      throw new Exception("Order Not Confirmed!!");
    }
  } else {
    throw new Exception("Error Confirming Order");
  }
} catch (\Throwable $th) {
  $result = new \stdClass();
  $result->error = true;
  $result->msg = $th->message;
  response($result);
}
