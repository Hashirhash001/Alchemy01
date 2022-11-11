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
            <li class="breadcrumb-item active" aria-current="page">
              Service List
            </li>
          </ol>
        </nav>
        <h1 class="mb-0 fw-bold">Service List</h1>
      </div>
      <div class="col-6">
        <div class="text-end upgrade-btn">
          <a class="btn btn-primary text-white" href="new-service.php"><i class="mdi mdi-plus-circle"></i> New Service</a>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row" id="app">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive" v-if="services.length">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(service, i) in services" :key="service.id">
                    <th scope="row">{{ i + 1 }}</th>
                    <td>{{ service.name }}</td>
                    <td>₹ {{ service.price }}</td>
                    <td>
                      <div class="d-flex justify-content-start">
                        <a :href="`edit-service.php?id=` + service.id" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Blog"><i class="mdi mdi-pen text-white"></i></a>
                        <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Blog" @click="showDeletePrompt(service.id)"><i class="mdi mdi-delete text-white"></i></button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
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
    name: 'Services',
    data: {
      services: [],
      loading: false
    },
    methods: {
      async getServices() {
        this.loading = true
        fetch("../api/admin/getServices.php")
          .then(res => {
            res.json()
              .then(data => {
                this.services = data
                this.loading = false
              })
          })
          .catch(err => {
            console.error(err);
            this.loading = false
          })
      },
      showDeletePrompt(id) {
        Swal.fire({
          title: 'Warning!',
          text: 'Do you want to delete this service? This action cannot be REVERSED!!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            this.deleteService(id)
          }
        })
      },
      async deleteService(id) {
        console.log(id);
        $.ajax({
          url: '../api/admin/deleteService.php',
          method: 'POST',
          data: {
            id: id
          },
          success: (res) => {
            showToast(res.msg, res.error ? 'error' : 'success')
            if (!res.error) {
              this.getServices()
            }
          },
          error: (err) => {
            console.error(err);
          }
        })
      }
    },
    mounted() {
      this.getServices()
    }
  })
</script>
<?php require("include/footer.php") ?>