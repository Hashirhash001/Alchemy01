<?php
require('helpers/connection.php');
require('helpers/functions.php');

require('./razorpay-php/Razorpay.php');

// use Razorpay\Api\Api;

// $api = new Api(RAZORPAY_KEY_ID, RAZORPAY_KEY_SECRET);

try {
  $result = new \stdClass();

  $checkedServices = $_POST['checkedServices'];
  $dateofAppointment = date("Y-m-d H:i:s", strtotime(get_safe_value($con, $_POST['dateofAppointment'])));
  $customerName = get_safe_value($con, $_POST['customerName']);
  $customerPhone = get_safe_value($con, $_POST['customerPhone']);
  $customerEmail = get_safe_value($con, $_POST['customerEmail']);
  $paymentType = get_safe_value($con, $_POST['paymentType']);

  $totalAmount = 0;

  if (!sizeof($checkedServices)) {
    throw new Exception("Services are Required");
  }

  if (!$dateofAppointment) {
    throw new Exception("Date of Appointment Required");
  }

  if (date("Y-m-d H:i:s") > $dateofAppointment) {
    throw new Exception("Date of Appointment is a past date");
  }

  if (!$customerName) {
    throw new Exception("Name is Required");
  }

  if (!$customerPhone) {
    throw new Exception("Phone is Required");
  }

  if ($customerEmail !== "") {
    if (!filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
      throw new Exception("Email is Invalid");
    }
  }

  if (!preg_match('/^[0-9]{10}+$/', $customerPhone)) {
    throw new Exception("Phone Number is Invalid, must be a 10 digit number");
  }

  if (!$paymentType) {
    throw new Exception("Payment Method is Required");
  }

  // Get Total Amount
  foreach ($checkedServices as $key => $value) {
    $res = getMySqlObject($con, "SELECT id, price FROM services WHERE disabled = 0 AND id = '$value'");
    $totalAmount += (float) $res->price;
  }

  // Get ID of last appointment
  $lastAppointmentID = getMySqlObject($con, "SELECT MAX(id) as lastID FROM appointments");
  if (!$lastAppointmentID->lastID) {
    $lastAppointmentID = 0;
  }

  $res = $con->query("INSERT INTO appointments (customer_name, customer_mobile, customer_mail, payment_type, totalAmount, appointment_date) VALUES ('$customerName', '$customerPhone', '$customerEmail', '$paymentType', '$totalAmount', '$dateofAppointment')");

  if ($res) {
    $last_id = $con->insert_id;

    foreach ($checkedServices as $key => $value) {
      $res = $con->query("INSERT INTO appointment_services (appointment_id, service_id) VALUES ('$last_id', '$value')");
    }
  }

  if ($res) {
    $result->error = false;
    $result->msg = "Appointment Created";
    response($result);
  } else {
    $result->error = true;
    $result->msg = "Appointment Creation Failed";
    response($result);
  }
} catch (\Throwable $th) {
  $result = new \stdClass();
  $result->error = true;
  $result->msg = $th->getMessage();
  response($result);
}
