<?php

require('../helpers/functions.php');
require('../helpers/connection.php');
require('../helpers/auth.php');

try {
  $id = get_safe_value($con, $_GET['id']);
  $image = get_safe_value($con, $_GET['image']);

  $imageUploadDestination = __DIR__ . "/../../upload/blogs/images/";

  if (!unlink($imageUploadDestination . $image)) {
    throw new Exception("Could not delete Blog, Image updation failed");
  }

  $res = $con->query("DELETE FROM blogs WHERE id = '$id'");
  if ($res) {
    $result->error = false;
    $result->msg = "Blog Deleted";
    response($result);
  } else {
    $result->error = true;
    $result->msg = "Could not delete Blog";
    response($result);
  }
} catch (\Throwable $th) {
  $result->error = true;
  $result->msg = $th->message;
  response($result);
}
