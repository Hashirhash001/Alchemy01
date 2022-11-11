<?php

require('helpers/connection.php');
require('helpers/functions.php');

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

if ($MAIL_SENDER && $MAIL_RECEIVER) {
  $subject = "Contact Form Submission";
  $message = "Name: $name \nPhone: $phone \nEmail: $email \nMessage: $message";
  $headers = "From:" . $MAIL_SENDER;
  if (mail($MAIL_RECEIVER, $subject, $message, $headers)) {
    $data->error = false;
    $data->msg = "Email Sent!!";
    response($data);
  } else {
    $data->error = true;
    $data->msg = "Email not Sent!!";
    response($data);
  }
} else {
  $data->error = true;
  $data->msg = "Email not Sent!!";
  response($data);
}
