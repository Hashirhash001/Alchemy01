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
              New Service
            </li>
          </ol>
        </nav>
        <h1 class="mb-0 fw-bold">Add New Service</h1>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row" id="app">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <form class="form-horizontal form-material mx-2" @submit.prevent="submitForm">
                <div class="form-body">
                  <div class="form-group">
                    <label for="name">Service Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Service Name" v-model="service.name">
                  </div>
                  <div class="form-group">
                    <label for="amount">Service Price</label>
                    <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount in INR" v-model="service.price" min="0" step="0.01">
                  </div>
                  <div class="form-actions">
                    <button class="btn btn-primary text-white" type="submit" :disabled="loading"><span class="spinner-border spinner-border-sm mb-1" role="status" aria-hidden="true" v-if="loading"></span><span v-else> Submit</span>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  new Vue({
    name: 'NewService',
    el: '#app',
    data: {
      loading: false,
      service: {
        name: '',
        price: ''
      }
    },
    methods: {
      async submitForm() {
        this.loading = true

        if (!this.service.name) {
          showToast('Name Required!!', 'danger')
          this.loading = false
          return false
        }

        if (!this.service.price) {
          showToast('Amount Required!!', 'danger')
          this.loading = false
          return false
        }

        const id = this.getURLParams('id')
        $.ajax({
          url: '../api/admin/editService.php',
          method: 'POST',
          data: {
            name: this.service.name,
            price: this.service.price,
            id: id
          },
          success: (res) => {
            this.loading = false
            showToast(res.msg, res.error ? 'danger' : 'success')
            if (!res.error) {
              window.location.href = "service-list.php"
            }
          },
          error: (err) => {
            this.loading = false
            showToast(err.msg, 'danger')
          }
        })
      },
      async getService() {
        const id = this.getURLParams('id')
        this.loading = true
        fetch("../api/getService.php?id=" + id)
          .then(res => {
            res.json()
              .then(data => {
                this.service = data
                this.loading = false
              })
          })
          .catch(err => {
            console.error(err);
            this.loading = false
          })
      },
      getURLParams(key) {
        const urlParams = new URLSearchParams(window.location.search)
        return urlParams.get(key)
      }
    },
    mounted() {
      this.getService()
    }
  })
</script>
<?php require("include/footer.php") ?>