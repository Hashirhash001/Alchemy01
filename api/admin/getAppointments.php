<?php

require('../helpers/functions.php');
require('../helpers/connection.php');

try {
  $filter = new stdClass();
  foreach ($_POST as $key => $value) {
    $filter->$key = get_safe_value($con, $value);
  }

  $whereQuery = "WHERE 1 = 1 ";

  if ($filter->status) {
    $whereQuery = " AND order_status = '$filter->status'";
  }

  if ($filter->name) {
    $whereQuery .= " AND customer_name LIKE '%$filter->name%'";
  }

  if ($filter->phone) {
    $whereQuery .= " AND customer_mobile = '$filter->phone'";
  }

  if ($filter->date) {
    $whereQuery .= " AND appointment_date BETWEEN '$filter->date 00:00:00' AND '$filter->date 23:59:59'";
  }

  if (!$filter->page) {
    $filter->page = 1;
  } else {
    $filter->page = (int) $filter->page;
  }

  $initalPage = ($filter->page - 1) * (int) $filter->page;
  $count = (int) getMySqlObject($con, "SELECT COUNT(id) AS count FROM appointments " . $whereQuery)->count;

  $res = new \stdClass();

  $res->totalPages = ceil($count / $filter->items);

  $res->data = getMySqlArray($con, "SELECT id, customer_name, customer_mobile, totalAmount, order_status, appointment_date FROM appointments " . $whereQuery . " ORDER BY " . $filter->sort_by . " " . $filter->order_by . " LIMIT " . $initalPage . ", " . $filter->items);

  response($res);
} catch (\Throwable $th) {
  $result->error = true;
  $result->msg = "Could not fetch Appointments";
  response($result);
}
