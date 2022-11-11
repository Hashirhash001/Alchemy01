<?php
require('../helpers/connection.php');
require('../helpers/functions.php');

try {
  $res = new \stdClass();
  $res->appointmentsTodayCount = (int) getMySqlObject($con, "SELECT COUNT(id) AS count FROM appointments WHERE order_status = 'paid' AND appointment_date BETWEEN '" . date('Y-m-d') . " 00:00:00' AND '" . date('Y-m-d') . " 23:59:59'")->count;

  $res->appointmentsPending = (int) getMySqlObject($con, "SELECT COUNT(id) AS count FROM appointments WHERE order_status = 'pending'")->count;

  $res->upcomingAppointments = (int) getMySqlObject($con, "SELECT COUNT(id) AS count FROM appointments WHERE order_status = 'paid' AND appointment_date > '" . date('Y-m-d') . " 00:00:00'")->count;

  $res->totalEarnings = (float) getMySqlObject($con, "SELECT SUM(totalAmount) AS sum FROM `appointments` WHERE order_status = 'paid' ")->sum;

  $res->blogs = (int) getMySqlObject($con, "SELECT COUNT(id) AS count FROM blogs")->count;

  $res->services = (int) getMySqlObject($con, "SELECT COUNT(id) AS count FROM services")->count;

  $appointments = getMySqlArray($con, "SELECT id, customer_name, appointment_date FROM appointments WHERE order_status = 'paid' AND appointment_date BETWEEN '" . date('Y-m-d') . " 00:00:00' AND '" . date('Y-m-d') . " 23:59:59' ORDER BY appointment_date ASC");
  foreach ($appointments as $key => $value) {
    $appointments[$key]->services = getMySqlArray($con, "SELECT name, price  FROM appointment_services INNER JOIN services ON appointment_services.service_id = services.id WHERE appointment_services.appointment_id = '$value->id'");
  }
  $res->appointmentsToday = $appointments;

  response($res);
} catch (\Throwable $th) {
  $result->error = true;
  $result->msg = $th->getMessage();
  response($result);
}
