<?php
require('../helpers/connection.php');
require('../helpers/functions.php');

try {
  $id = get_safe_value($con, $_GET['id']);
  $status = get_safe_value($con, $_GET['status']);

  $blog = getMySqlObject($con, "SELECT id, title FROM blogs WHERE id = '$id'");
  $comments = getMySqlArray($con, "SELECT * FROM comments WHERE blog_id = '$id'" . ($status ? " AND status = '$status'" : "") . "ORDER BY created_at DESC");

  $data = new stdClass();
  $data->blog = $blog;
  $data->comments = $comments;

  response($data);
} catch (\Throwable $th) {
  $result->error = true;
  $result->msg = "Could not fetch Comments";
  response($result);
}
