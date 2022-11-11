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
              Blogs
            </li>
          </ol>
        </nav>
        <h1 class="mb-0 fw-bold">Blogs</h1>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="text-end">
            <a href="new-blog.php" class="btn btn-primary"><i class="mdi mdi-plus-circle"></i> New Blog</a>
          </div>
        </div>
      </div>
      <div class="row" id="app">
        <div class="col-12">
          <div class="card mt-3">
            <div class="card-body">
              <div class="table-responsive" v-if="blogs.length">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Created On</th>
                      <th scope="col">Updated On</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(blog, i) in blogs" :key="blog.id">
                      <th scope="row">{{ i + 1 }}</th>
                      <td>{{ blog.title }}</td>
                      <td>{{ new Date(blog.created_at).toLocaleString() }}</td>
                      <td>{{ new Date(blog.updated_at).toLocaleString() }}</td>
                      <td>
                        <div class="d-flex justify-content-around">
                          <a class="btn btn-primary" :href="`view-blog.php?id=` + blog.id" data-bs-toggle="tooltip" data-bs-placement="top" title="View Blog"><i class="mdi mdi-eye"></i></a>
                          <a :href="`comments.php?id=` + blog.id" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="View Comments"><i class="mdi mdi-comment"></i></a>
                          <a :href="`edit-blog.php?id=` + blog.id" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Blog"><i class="mdi mdi-pen text-white"></i></a>
                          <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Blog" @click="showDeleteBlogPrompt(blog.id, blog.image_filename)"><i class="mdi mdi-delete text-white"></i></button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div v-else-if="blogs.length === 0 && loading === true">
                <div class="d-flex justify-content-center">
                  <div class="spinner-border text-info" role="status">
                    <span class="sr-only">Loading...</span>
                  </div>
                </div>
              </div>
              <div v-else class="text-center">
                <h5>No Blogs!! Try Adding some</h5>
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
      name: 'Blogs',
      data: {
        blogs: [],
        loading: false
      },
      methods: {
        async getBlogs() {
          this.loading = true
          fetch("../api/admin/getBlogs.php")
            .then(res => {
              res.json()
                .then(data => {
                  this.blogs = data
                  this.loading = false
                })
            })
            .catch(err => {
              console.error(err);
              this.loading = false
            })
        },
        showDeleteBlogPrompt(id, image) {
          console.log(id);
          Swal.fire({
            title: 'Warning!',
            text: 'Do you want to delete this blog? This action cannot be REVERSED!!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              this.deleteBlog(id, image)
            }
          })
        },
        async deleteBlog(id, image) {
          fetch("../api/admin/deleteBlog.php?id=" + id + "&image=" + image)
            .then((res) => {
              res.json()
                .then(data => {
                  console.log(data);
                  showToast(data.msg, data.error ? 'error' : 'success')
                  if (!data.error) {
                    this.getBlogs()
                  }
                })
            }).catch((err) => {
              console.error(err);
            });
        }
      },
      mounted() {
        this.getBlogs()
      }
    })
  </script>
  <?php require("include/footer.php") ?>