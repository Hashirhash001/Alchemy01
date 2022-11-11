<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
require("../api/helpers/connection.php");
require("./include/session.php");
require("include/header.php");
require("include/vue.php");
?>
<style>
  .col-md-3 {
    margin-bottom: 15px;
  }
</style>
<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row align-items-center">
      <div class="col">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 d-flex align-items-center">
            <li class="breadcrumb-item">
              <a href="index.php" class="link"><i class="mdi mdi-home-outline fs-4"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Appointments
            </li>
          </ol>
        </nav>
        <h1 class="mb-0 fw-bold">Appointments</h1>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row" id="app">
      <!-- column -->
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <!-- title -->
            <div class="d-md-flex">
              <div>
                <h4 class="card-title"></h4>
                <h5 class="card-subtitle">
                </h5>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <label for="">Name</label>
                <input type="text" class="form-control" v-model="filters.name">
              </div>
              <div class="col-md-3">
                <label for="">Phone</label>
                <input type="text" class="form-control" v-model="filters.phone">
              </div>
              <div class="col-md-3">
                <label for="">Date</label>
                <input type="date" class="form-control" v-model="filters.date">
              </div>
              <div class="col-md-3">
                <label for="">Status</label>
                <select class="form-select shadow-none" v-model="filters.status">
                  <option v-for="status in statuses" :value="status.value">{{ status.name }}</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="">Sort By</label>
                <select class="form-select shadow-none" v-model="filters.sort_by">
                  <option value="appointment_date">Appointment Date</option>
                  <option value="created_at">Created Date</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="">Order By</label>
                <select class="form-select shadow-none" v-model="filters.order_by">
                  <option value="ASC">Ascending</option>
                  <option value="DESC">Descending</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="">Show</label>
                <select class="form-select shadow-none" v-model="filters.items">
                  <option value="5">5 items</option>
                  <option value="15">15 items</option>
                  <option value="25">25 Items</option>
                  <option value="40">40 Items</option>
                </select>
              </div>
            </div>
            <!-- title -->
            <div class="row mt-3">
              <div class="col">
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group me-2" role="group" aria-label="First group">
                    <button type="button" class="btn font-weight-medium" v-for="i in totalPages" :class="filters.page === i ? ` btn-primary text-white ` : ` btn-info text-white `" @click="filters.page = i">{{ i }}</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table mb-0 table-hover align-middle text-nowrap">
                <thead>
                  <tr>
                    <th class="border-top-0">Name</th>
                    <th class="border-top-0">Date</th>
                    <th class="border-top-0">Phone</th>
                    <th class="border-top-0">Total</th>
                    <th class="border-top-0">Status</th>
                    <th class="border-top-0">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="data in appointments" :key="data.id">
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="">
                          <h4 class="m-b-0 font-16">{{ data.customer_name }}</h4>
                        </div>
                      </div>
                    </td>
                    <td>{{ new Date(data.appointment_date).toLocaleString() }}</td>
                    <td>{{ data.customer_mobile }}</td>
                    <td>₹ {{ data.totalAmount }}</td>
                    <td>
                      <label v-if="data.order_status === 'pending'" class="badge bg-danger text-uppercase">Pending</label>
                      <label v-if="data.order_status === 'confirmed'" class="badge bg-info text-uppercase">Confirmed</label>
                      <label v-if="data.order_status === 'paid'" class="badge bg-success text-uppercase">Paid</label>
                    </td>
                    <td>
                      <div class="d-flex justify-content-start">
                        <a class="btn btn-primary" :href="`view-appointment.php?id=` + data.id" data-bs-toggle="tooltip" data-bs-placement="top" title="View Appointment"><i class="mdi mdi-eye"></i></a>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="row mt-3">
              <div class="col">
                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                  <div class="btn-group me-2" role="group" aria-label="First group">
                    <button type="button" class="btn font-weight-medium" v-for="i in totalPages" :class="filters.page === i ? ` btn-primary text-white ` : ` btn-info text-white `" @click="filters.page = i">{{ i }}</button>
                  </div>
                </div>
              </div>
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
    data: {
      statuses: [{
          name: 'All',
          value: ''
        }, {
          name: 'Pending',
          value: 'pending'
        },
        {
          name: 'Confirmed',
          value: 'confirmed'
        },
        {
          name: 'Paid',
          value: 'paid'
        }
      ],
      appointments: [],
      filters: {
        status: '',
        name: '',
        phone: '',
        date: '',
        sort_by: 'appointment_date',
        order_by: 'ASC',
        items: '15',
        page: 1
      },
      totalPages: null
    },
    methods: {
      async getAppointments() {
        let formData = new FormData()
        formData.append("status", this.filters.status)
        formData.append("name", this.filters.name)
        formData.append("phone", this.filters.phone)
        formData.append("date", this.filters.date)
        formData.append("sort_by", this.filters.sort_by)
        formData.append("order_by", this.filters.order_by)
        formData.append("items", this.filters.items)
        formData.append("page", this.filters.page)

        fetch("../api/admin/getAppointments.php", {
            method: 'POST',
            body: formData
          })
          .then(res => {
            res.json()
              .then(data => {
                this.appointments = data.data
                this.totalPages = data.totalPages
              })
          })
          .catch(err => {
            console.error(err);
          })
      },
    },
    mounted() {
      this.getAppointments()
    },
    watch: {
      filters: {
        deep: true,
        handler() {
          this.getAppointments()
        }
      }
    }
  })
</script>
<?php require("include/footer.php") ?>