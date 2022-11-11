<?php

require('helpers/functions.php');
require('helpers/connection.php');

try {
  $res = $con->query("SELECT id, title, url_slug, created_at, updated_at FROM blogs ORDER BY created_at DESC");
  $data = [];

  while ($row = $res->fetch_assoc()) {
    $applicant = new stdClass();
    foreach ($row as $key => $value) {
      $applicant->$key = $value;
    }
    array_push($data, $applicant);
  }

  response($data);
} catch (\Throwable $th) {
  $result->error = true;
  $result->msg = "Could not fetch blogs";
  response($result);
}
