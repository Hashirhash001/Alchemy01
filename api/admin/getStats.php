<?php

require('../helpers/functions.php');
require('../helpers/connection.php');

try {
  $blogCount = $con->query("SELECT COUNT(id) AS blogCount FROM blogs");
  $testimonialCount = $con->query("SELECT COUNT(id) AS testimonialCount FROM testimonials");

  $row1 = $blogCount->fetch_assoc();
  $row2 = $testimonialCount->fetch_assoc();

  $data = new stdClass();
  $data->blogCount = $row1['blogCount'];
  $data->testimonialCount = $row2['testimonialCount'];

  $result->error = false;
  $result->data = $data;
  response($result);
} catch (\Throwable $th) {
  $result->error = true;
  $result->msg = $th->msg;
  response($result);
}
