<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
require("../api/helpers/connection.php");
require("./include/session.php");
require("include/header.php");
require("include/vue.php");
require("./include/quill-js.php");
?>
<div class="page-wrapper" id="app">
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
              {{ blog.title }}
            </li>
          </ol>
        </nav>
        <h1 class="mb-0 fw-bold">Edit Blog</h1>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
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
                        <input type="text" name="" id="" class="form-control form-control-line" placeholder="Enter Title here" v-model="blog.title">
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
                        <quill-editor ref="myQuillEditor" v-model="blog.content" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <button class="btn btn-primary text-white" type="submit" :disabled="loading"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" v-if="loading"></span><span v-else>Submit</span>
                  </button>
                  <button class="btn btn-danger text-white">Cancel</button>
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
      name: 'EditBlog',
      data: {
        loading: false,
        blog: {},
        image: null
      },
      methods: {
        async submitForm() {
          this.loading = true
          if (!this.blog.title) {
            showToast('Title Required!!', 'danger')
            return false
          }

          if (!this.blog.content) {
            showToast('Blog Content Required!!', 'danger')
            return false
          }

          let formData = new FormData()
          formData.append("title", this.blog.title)
          formData.append("content", this.blog.content)
          formData.append("id", this.getURLParams('id'))
          formData.append("image", this.image)
          formData.append("oldImage", this.blog.image_filename)

          $.ajax({
            url: '../api/admin/editBlog.php',
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
        getBlog() {
          const id = this.getURLParams('id')
          this.loading = true
          fetch("../api/getBlog.php?id=" + id)
            .then(res => {
              res.json()
                .then(data => {
                  console.log(data);
                  this.blog = data
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
      },
      mounted() {
        this.getBlog()
      }
    })
  </script>
  <?php require("include/footer.php") ?>