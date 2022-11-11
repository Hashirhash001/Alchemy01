<?php
require('helpers/connection.php');
require('helpers/functions.php');

try {
  $id = get_safe_value($con, $_GET['id']);

  $res = $con->query("SELECT * FROM blogs WHERE id = '$id'");

  $blog = new stdClass();
  while ($row = $res->fetch_assoc()) {
    foreach ($row as $key => $value) {
      $blog->$key = $value;
    }
  }

  response($blog);
} catch (\Throwable $th) {
  $result->error = true;
  $result->msg = "Could not fetch blogs";
  response($result);
}