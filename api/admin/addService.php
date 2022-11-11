<?php

require('../helpers/functions.php');
require('../helpers/connection.php');
require('../helpers/auth.php');

try {
  $name = get_safe_value($con, $_POST['name']);
  $amount = (float) get_safe_value($con, $_POST['amount']);

  if (!$name) {
    $result->error = true;
    $result->msg = "Name Required";
    response($result);
    return false;
  }

  if (!$amount) {
    $result->error = true;
    $result->msg = "Amount Required";
    response($result);
    return false;
  }

  if ($amount < 0) {
    $result->error = true;
    $result->msg = "Amount Must be 0 or more";
    response($result);
    return false;
  }

  $res = $con->query("INSERT INTO services (name, price, created_by, updated_by) VALUES ('$name', '$amount', '" . $_SESSION['admin_id'] . "', '" . $_SESSION['admin_id'] . "')");

  if ($res) {
    $result = new \stdClass();
    $result->error = false;
    $result->msg = "Service Added";
    response($result);
  } else {
    $result->error = true;
    $result->msg = "Service creation Failed";
    response($result);
    return false;
  }
} catch (\Throwable $th) {
  $result->error = true;
  $result->msg = $th->message;
  response($result);
}
