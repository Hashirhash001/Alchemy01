<?php

require('../helpers/functions.php');
require('../helpers/connection.php');
require('../helpers/auth.php');

try {
  $id = get_safe_value($con, $_POST['id']);

  $res = $con->query("DELETE FROM services WHERE id = '$id'");
  if ($res) {
    $result->error = false;
    $result->msg = "Service Deleted";
    response($result);
  } else {
    $result->error = true;
    $result->msg = "Could not delete Service";
    response($result);
  }
} catch (\Throwable $th) {
  $result->error = true;
  $result->msg = $th->message;
  response($result);
}
