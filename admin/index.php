<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
require('../api/helpers/connection.php');
require("include/header.php");
require("include/session.php");
require("include/vue.php");
?>
<style>
  .fs-3 {
    font-size: .875rem !important;
  }

  .rounded {
    border-radius: 20px !important;
  }

  .fs-2 {
    font-size: .75rem !important;
  }
</style>
<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <div class="page-breadcrumb">
    <div class="row align-items-center">
      <div class="col-6">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 d-flex align-items-center">
            <li class="breadcrumb-item">
              <a href="index.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Dashboard
            </li>
          </ol>
        </nav>
        <h1 class="mb-0 fw-bold">Dashboard</h1>
      </div>
    </div>
  </div>
  <div class="container-fluid" id="app">
    <div class="row gx-3">
      <div class="col-md-12 col-lg-6">
        <div class="card text-white bg-primary rounded">
          <div class="card-body">
            <h3 class="card-title mt-3 mb-0 text-white">{{ data.appointmentsTodayCount }}</h3>
            <p class="card-text text-white fs-3 fw-normal">
              Appointments Today
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-6">
        <div class="card text-white bg-secondary rounded">
          <div class="card-body">
            <h3 class="card-title mt-3 mb-0 text-white">₹ {{ data.totalEarnings }}</h3>
            <p class="card-text text-white fs-3 fw-normal">
              Total Earnings
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="card text-white bg-info rounded">
          <div class="card-body">
            <h3 class="card-title mt-3 mb-0 text-white">{{ data.upcomingAppointments }}</h3>
            <p class="card-text text-white fs-3 fw-normal">
              Upcoming Appointments
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="card text-white bg-success rounded">
          <div class="card-body">
            <h3 class="card-title mt-3 mb-0 text-white">{{ data.appointmentsPending }}</h3>
            <p class="card-text text-white fs-3 fw-normal">
              Pending Appointments
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="card text-white bg-warning rounded">
          <div class="card-body">
            <h3 class="card-title mt-3 mb-0 text-white">{{ data.blogs }}</h3>
            <p class="card-text text-white fs-3 fw-normal">
              Blogs Posted
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-lg-3">
        <div class="card text-white bg-danger rounded">
          <div class="card-body">
            <h3 class="card-title mt-3 mb-0 text-white">{{ data.services }}</h3>
            <p class="card-text text-white fs-3 fw-normal">
              Services Available
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Appointments Today</h4>
            <ul class="timeline-widget">
              <li class="timeline-item mb-4" v-for="appointment in data.appointmentsToday" :key="appointment.id">
                <div class="timeline-time fw-bold text-dark fs-2 mt-n1">
                  {{ new Date(appointment.appointment_date).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: false }) }}
                </div>
                <span class="timeline-badge me-3 flex-shrink-0" :class="getRandomBadge"></span>
                <div class="timeline-desc fs-3 text-dark fw-bold mt-n1">
                  {{ appointment.customer_name }} requires <span v-for="(service, i) in appointment.services" :key="service.name" class="text-success"> {{ service.name}}<span v-if="!(i === (appointment.services.length - 1))">,</span> </span> <a :href="`view-appointment.php?id=` + appointment.id">More Details <span class="mdi mdi-arrow-right"></span></a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  new Vue({
    el: '#app',
    name: 'Dashboard',
    data: {
      data: {}
    },
    methods: {
      getData() {
        fetch("../api/admin/getDashboardData.php")
          .then(res => {
            res.json()
              .then(data => {
                this.data = data
              })
          })
          .catch(err => {
            console.error(err);
          })
      }
    },
    mounted() {
      this.getData()
    },
    computed: {
      getRandomBadge() {
        let badgeVariants = [
          'badge-primary',
          'badge-info',
          'badge-warning',
          'badge-danger',
          'badge-success',
        ]

        let randomNo = Math.floor(Math.random() * badgeVariants.length)

        return badgeVariants[randomNo];
      }
    }
  })
</script>
<?php require("include/footer.php") ?>