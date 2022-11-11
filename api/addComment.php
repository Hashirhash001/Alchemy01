<?php
require('helpers/connection.php');
require('helpers/functions.php');

try {
  $author = get_safe_value($con, $_POST['author']);
  $content = get_safe_value($con, $_POST['content']);
  $blogID = get_safe_value($con, $_POST['blogID']);

  if (!$author) {
    $result->error = true;
    $result->msg = "Author Required";
    response($result);
    return false;
  }

  if (!$content) {
    $result->error = true;
    $result->msg = "Comment Required";
    response($result);
    return false;
  }

  if (!$blogID) {
    $result->error = true;
    $result->msg = "Blog ID Required";
    response($result);
    return false;
  }


  $res = $con->query("INSERT INTO comments (content, author, blog_id) VALUES ('$content', '$author', '$blogID')");

  if ($res) {
    $result->error = false;
    $result->msg = "Your Comment will be posted once it has been reviewed. Thank You.";
    response($result);
  } else {
    $result->error = true;
    $result->msg = "Could not add Comment, Try Again after some time";
    response($result);
    return false;
  }
} catch (\Throwable $th) {
  $result->error = true;
  $result->msg = "Could not add Comment, Try Again after some time";
  response($result);
}
