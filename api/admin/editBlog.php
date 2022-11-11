<?php

require('../helpers/functions.php');
require('../helpers/connection.php');
require('../helpers/auth.php');

try {
  $title = get_safe_value($con, $_POST['title']);
  $content = get_safe_value($con, $_POST['content']);
  $id = get_safe_value($con, $_POST['id']);
  $oldImage = get_safe_value($con, $_POST['oldImage']);

  $image = $_FILES['image'];

  $imageUploadDestination = __DIR__ . "/../../upload/blogs/images/";

  if (isset($_FILES['image'])) {
    unlink($imageUploadDestination . $oldImage);

    if (!move_uploaded_file($image['tmp_name'], $imageUploadDestination . $image['name'])) {
      throw new Exception("Could not edit Blog, Image upload failed");
    }
  }

  $res = $con->query("UPDATE blogs SET title = '$title', content = '$content', updated_by = '" . $_SESSION['admin_id'] . "' " . (isset($image['name']) ? ", image_filename = '" . $image['name'] . "'" : "") . " WHERE id = '$id'");

  if ($res) {
    $result->error = false;
    $result->msg = "Blog Updated";
    response($result);
  } else {
    $result->error = true;
    $result->msg = "Blog updation Failed";
    response($result);
    return false;
  }
} catch (\Throwable $th) {
  $result->error = true;
  $result->msg = $th->message;
  response($result);
}
