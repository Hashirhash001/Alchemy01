<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
require("../api/helpers/connection.php");
require("./include/session.php");
require("include/header.php");
require("include/vue.php");
require("./include/quill-js.php");
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
              <a href="blog-list.php" class="link">Blogs</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              New Blog
            </li>
          </ol>
        </nav>
        <h1 class="mb-0 fw-bold">New Blog</h1>
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
            <div class="row">
              <form class="form-horizontal form-material mx-2" @submit.prevent="submitForm">
                <div class="form-body">
                  <div class="form-group">
                    <label class="col-md-12">Blog Title</label>
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <input type="text" name="" id="" class="form-control form-control-line" placeholder="Enter Title here" v-model="title">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-md-12">Blog Image</label>
                      <div class="col-md-12">
                        <div class="row mb-3">
                          <div class="col-md-12">
                            <input type="file" id="image-upload" accept="image/*" @change="funOnImageUpload">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <quill-editor ref="myQuillEditor" v-model="body" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <button class="btn btn-primary text-white" type="submit" :disabled="loading"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" v-if="loading"></span><span v-else>Submit</span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    Vue.use(window.VueQuillEditor)
    new Vue({
      el: '#app',
      name: 'NewBlog',
      data: {
        title: '',
        body: '',
        loading: false,
        image: null
      },
      methods: {
        async submitForm() {
          this.loading = true
          if (!this.title) {
            showToast('Title Required!!', 'danger')
            return false
          }

          if (!this.body) {
            showToast('Blog Content Required!!', 'danger')
            return false
          }

          let formData = new FormData()
          formData.append("title", this.title)
          formData.append("body", this.body)
          formData.append("image", this.image)
          
          $.ajax({
            url: '../api/admin/newBlog.php',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: (res) => {
              this.loading = false
              showToast(res.msg, res.error ? 'danger' : 'success')
              if (!res.error) {
                window.location.href = "blog-list.php"
              }
            },
            error: (err) => {
              this.loading = false
              showToast(err.msg, 'danger')
            }
          })
        },
        async funOnImageUpload(e) {
          const files = e.target.files
          let filename = files[0].name
          const fileReader = new FileReader()
          fileReader.addEventListener('load', () => {
            this.imageUrl = fileReader.result
          })
          fileReader.readAsDataURL(files[0])
          this.image = files[0]
        },
      }
    })
  </script>
  <?php require("include/footer.php") ?>