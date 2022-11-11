<?php

require('../helpers/functions.php');
require('../helpers/connection.php');
require('../helpers/auth.php');

try {
  $id = get_safe_value($con, $_POST['id']);
  $name = get_safe_value($con, $_POST['name']);
  $price = get_safe_value($con, $_POST['price']);

  $res = $con->query("UPDATE services SET name = '$name', price = '$price' WHERE id = '$id'");
  if ($res) {
    $result->error = false;
    $result->msg = "Service Updated";
    response($result);
  } else {
    $result->error = true;
    $result->msg = "Could not update Service";
    response($result);
  }
} catch (\Throwable $th) {
  $result->error = true;
  $result->msg = $th->message;
  response($result);
}
