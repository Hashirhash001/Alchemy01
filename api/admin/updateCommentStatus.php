<?php

require('../helpers/functions.php');
require('../helpers/connection.php');
require('../helpers/auth.php');

try {
  $id = get_safe_value($con, $_POST['comment_id']);
  $blogID = get_safe_value($con, $_POST['blog_id']);
  $action = get_safe_value($con, $_POST['action']);

  $ACTION = "";
  $MESSAGE = "";

  switch ($action) {
    case 'approved':
      $ACTION = "approved";
      $MESSAGE = "Approved";
      break;
    case 'rejected':
      $ACTION = "rejected";
      $MESSAGE = "Rejected";
      break;

    default:
      throw new Exception("Invalid Request");
      break;
  }

  $res = $con->query("UPDATE comments SET status = '$ACTION' WHERE id = '$id' AND blog_id = '$blogID'");

  if ($res) {
    $result->error = false;
    $result->msg = "Comment " . $MESSAGE;
    response($result);
  } else {
    $result->error = true;
    $result->msg = "Updation Failed";
    response($result);
    return false;
  }
} catch (\Throwable $th) {
  $result->error = true;
  $result->msg = $th->message;
  response($result);
}
