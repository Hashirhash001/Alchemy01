<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
require("../api/helpers/connection.php");
require("./include/session.php");
require("include/header.php");
require("include/vue.php");
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
          </ol>
        </nav>
        <h1 class="mb-0 fw-bold">{{ blog.title }}</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div>
              <img :src="`../upload/blogs/images/` + blog.image_filename" alt="" class="rounded img-thumbnail">
            </div>
            <div v-html="blog.content" class="description"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  new Vue({
    el: '#app',
    name: 'ViewBlog',
    data: {
      blog: {},
      loading: false
    },
    methods: {
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
      }
    },
    mounted() {
      this.getBlog()
    }
  })
</script>
<?php require("include/footer.php") ?>