<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
require("../api/helpers/connection.php");
require("./include/session.php");
require("include/header.php");
require("include/vue.php");
?>
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row align-items-center">
      <div class="col">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 d-flex align-items-center">
            <li class="breadcrumb-item">
              <a href="index.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a>
            </li>
            <li class="breadcrumb-item">
              <a href="appointments.php" class="link">
                Appointments
              </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Appointment Info
            </li>
          </ol>
        </nav>
        <h1 class="mb-0 fw-bold">Appointment Info</h1>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div id="app">
      <div v-if="loading === false" class="row">
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-0">Booking Info</h4>
            </div>
            <div class="card-body bg-light">
              <div class="row text-center">
                <div class="col-6 my-2 text-start">
                  <label v-if="appointment.order_status === 'pending'" class="badge bg-danger text-uppercase">Pending</label>
                  <label v-if="appointment.order_status === 'confirmed'" class="badge bg-info text-uppercase">Confirmed</label>
                  <label v-if="appointment.order_status === 'paid'" class="badge bg-success text-uppercase">Paid</label>
                </div>
                <div class="col-6 my-2">{{ new Date(appointment.appointment_date).toLocaleString() }}</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-8">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Customer Details</h3>
              <div class="row">
                <div class="form-group col-md-6">
                  <label>Name</label>
                  <input type="text" class="form-control form-control-line" disabled v-model="appointment.customer_name">
                </div>
                <div class="form-group col-md-6">
                  <label>Mobile</label>
                  <input type="text" class="form-control form-control-line" disabled v-model="appointment.customer_mobile">
                </div>
                <div class="form-group col-md-6">
                  <label>Email</label>
                  <input type="text" class="form-control form-control-line" disabled v-model="appointment.customer_mail">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Availed Services</h3>
              <div class="d-flex align-items-center mt-4 mb-3 pb-1" v-for="service in services">
                <div class="ms-3 ps-1">
                  <h5 class="mb-1">{{ service.name }}</h5>
                </div>
                <h6 class="ms-auto text-success">₹ {{ service.price }}</h6>
              </div>
              <hr>
              <div class="d-flex align-items-center mt-4 mb-3 pb-1">
                <div class="ms-3 ps-1">
                  <h5 class="mb-1">Total: </h5>
                </div>
                <h6 class="ms-auto text-success">₹ {{ appointment.totalAmount }}</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-8" v-if="appointment.order_status !== 'pending'">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Razorpay Payment Details</h3>
              <div class="row">
                <div class="col-md-6">
                  <label class="col-md-6">Payment Status</label>
                  <div class="col-md-6">
                    <span class="badge rounded-pill text-capitalize" :class="getBg">{{ paymentLinkDetails.status }}</span>
                  </div>
                </div>
                <div class="form-group col-md-6" v-if="appointment.paid_at">
                  <label>Payment Time</label>
                  <input type="text" class="form-control form-control-line" disabled v-model="appointment.paid_at">
                </div>
                <div class="form-group col-md-6">
                  <label>Payment Link ID</label>
                  <input type="text" class="form-control form-control-line" disabled v-model="appointment.razorpay_link_id">
                </div>
                <div class="form-group col-md-6">
                  <label>Payment URL</label>
                  <input type="text" class="form-control form-control-line" disabled v-model="paymentLinkDetails.short_url">
                </div>
                <div class="form-group col-md-6" v-if="appointment.razorpay_order_id">
                  <label>Order ID</label>
                  <input type="text" class="form-control form-control-line" disabled v-model="appointment.razorpay_order_id">
                </div>
                <div class="form-group col-md-6" v-if="appointment.razorpay_payment_id">
                  <label>Payment ID</label>
                  <input type="text" class="form-control form-control-line" disabled v-model="appointment.razorpay_payment_id">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-8">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Actions</h3>
              <div class="d-flex flex-row justify-content-start">
                <a :href="`tel:` + appointment.customer_mobile" class="btn btn-primary text-white"><i class="mdi mdi-phone"></i> Call</a>
                <button class="btn btn-success text-white" @click="openConfirmPrompt" v-if="appointment.order_status === 'pending'"><i class="mdi mdi-check"></i> Confirm</button>
                <!-- <button class="btn btn-warning text-white"><i class="mdi mdi-calendar"></i> Reschedule</button> -->
                <!-- <button class="btn btn-danger text-white"><i class="mdi mdi-calendar-remove"></i> Cancel</button> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" v-else>
        <div class="col-12">
          <div class="d-flex justify-content-center">
            <div class="spinner-border text-info" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  new Vue({
    el: '#app',
    name: "ViewAppointment",
    data: {
      appointment: {},
      services: [],
      paymentLinkDetails: {},
      loading: true
    },
    methods: {
      getAppointment() {
        const id = this.getURLParams('id')
        fetch("../api/admin/getAppointment.php?id=" + id)
          .then(res => {
            res.json()
              .then(data => {
                this.appointment = data.appointment
                this.services = data.services
                this.paymentLinkDetails = data.paymentDetails
                this.loading = false
              })
          })
          .catch(err => {
            console.error(err);
          })
      },
      getURLParams(key) {
        const urlParams = new URLSearchParams(window.location.search)
        return urlParams.get(key)
      },
      openConfirmPrompt() {
        Swal.fire({
          title: 'Are you sure?',
          text: 'Do you want to confirm this appointment? After confirming a payment link will be sent to the customer',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, confirm it!'
        }).then((result) => {
          if (result.isConfirmed) {
            this.confirmAppointment()
          }
        })
      },
      confirmAppointment() {
        $.ajax({
          url: '../api/admin/confirmAppointment.php',
          method: 'POST',
          data: {
            id: this.appointment.id
          },
          success: (res) => {
            showToast(res.msg, res.error ? 'danger' : 'success')
            if (!res.error) {
              this.getAppointment()
            }
          },
          error: (err) => {
            console.error(err);
          }
        })
      }
    },
    mounted() {
      this.getAppointment()
    },
    computed: {
      getBg() {
        let bg = ""
        switch (this.paymentLinkDetails.status) {
          case 'created':
            bg = "bg-info"
            break;

          case 'cancelled':
            bg = "bg-danger"
            break;

          case 'paid':
            bg = "bg-success"
            break;
          default:
            bg = "bg-light"
            break;
        }
        return bg
      },
    }
  })
</script>
<?php require("include/footer.php") ?>