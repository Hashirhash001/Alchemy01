<?php
function get_safe_value($con, $str)
{
  if ($str != '') {
    $str = trim($str);
    return mysqli_real_escape_string($con, $str);
  }
}

function response($data)
{
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($data, JSON_PRETTY_PRINT);
}

function getMySqlObject($con, $query)
{
  $res = $con->query($query);
  $data = new stdClass();

  while ($row = $res->fetch_assoc()) {
    foreach ($row as $key => $value) {
      $data->$key = $value;
    }
  }

  return $data;
}

function getMySqlArray($con, $query)
{
  $res = $con->query($query);
  $data = [];

  while ($row = $res->fetch_assoc()) {
    $object = new stdClass();
    foreach ($row as $key => $value) {
      $object->$key = $value;
    }
    array_push($data, $object);
  }

  return $data;
}
