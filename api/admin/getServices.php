<?php

require('../helpers/functions.php');
require('../helpers/connection.php');

try {
  $services = getMySqlArray($con, "SELECT id, name, price, disabled FROM services ORDER BY created_at DESC");

  response($services);
} catch (\Throwable $th) {
  $result->error = true;
  $result->msg = "Could not fetch blogs";
  response($result);
}
