<?php

require('helpers/functions.php');
require('helpers/connection.php');

try {
  $id = get_safe_value($con, $_GET['id']);

  $res = getMySqlObject($con, "SELECT name, price FROM services WHERE id = '$id'");
  response($res);
} catch (\Throwable $th) {
  $result->error = true;
  $result->msg = $th->message;
  response($result);
}
