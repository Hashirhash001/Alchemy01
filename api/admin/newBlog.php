<?php

require('../helpers/functions.php');
require('../helpers/connection.php');
require('../helpers/auth.php');

try {
  $title = get_safe_value($con, $_POST['title']);
  $content = get_safe_value($con, $_POST['body']);
  $urlSlug = createUrlSlug($title);

  $image = $_FILES['image'];

  $imageUploadDestination = __DIR__ . "/../../upload/blogs/images/";

  if (!$title) {
    $result->error = true;
    $result->msg = "Title Required";
    response($result);
    return false;
  }

  if (!$content) {
    $result->error = true;
    $result->msg = "Body Required";
    response($result);
    return false;
  }

  if (!$urlSlug) {
    $result->error = true;
    $result->msg = "URL Slug Generation Failed";
    response($result);
    return false;
  }

  if (!move_uploaded_file($image['tmp_name'], $imageUploadDestination . $image['name'])) {
    $result->error = true;
    $result->msg = "Image upload Failed";
    response($result);
    return false;
  }

  $res = $con->query("INSERT INTO blogs (title, url_slug, image_filename, content, created_by, updated_by) VALUES ('$title', '$urlSlug', '" . $image['name'] . "', '$content', '" . $_SESSION['admin_id'] . "', '" . $_SESSION['admin_id'] . "')");

  if ($res) {
    $result->error = false;
    $result->msg = "Blog Added";
    response($result);
  } else {
    $result->error = true;
    $result->msg = "Blog creation Failed";
    response($result);
    return false;
  }
} catch (\Throwable $th) {
  $result->error = true;
  $result->msg = $th->message;
  response($result);
}

// https://www.w3docs.com/snippets/php/create-url-slug-from-string.html
function createUrlSlug($urlString)
{
  $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $urlString);
  return $slug;
}
