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
              <a href="blogs.php" class="link">Blogs</a>
            </li>
            <li class="breadcrumb-item">
              <a :href="`view-blog.php?id=` + blog.id" class="link">{{ blog.title }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Comments
            </li>
          </ol>
        </nav>
        <h1 class="mb-0 fw-bold">Recent Comments</h1>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
      <!-- column -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <!-- <h4 class="card-title">Recent Comments</h4> -->
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-10">
                <select class="form-select" v-model="commentStatus" @change="getComments">
                  <option v-for="status in statusData" :key="status.value" :value="status.value">{{ status.name }}</option>
                </select>
              </div>
              <div class="col-lg-2 col-md-2 col-sm-3 col-xs-2 mt-2">
                <span class="badge ms-auto bg-primary">{{ comments.length }}</span>
              </div>
            </div>
          </div>
          <div class="comment-widgets scrollable">
            <comment-section v-for="comment in comments" :data="comment" @update="getComments" />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  Vue.component('comment-section', {
    props: {
      data: Object
    },
    methods: {
      async updateStatus(id, blogID, action) {
        $.ajax({
          url: '../api/admin/updateCommentStatus.php',
          method: 'POST',
          data: {
            comment_id: id,
            blog_id: blogID,
            action: action
          },
          success: (res) => {
            console.log(res);
            showToast(res.msg, res.error ? 'danger' : 'success')
            if (!res.error) {
              this.$emit('update')
            }
          },
          error: (err) => {
            console.error(err);
          }
        })
      },
    },
    template: `
      <div class="d-flex flex-row comment-row">
        <div class="p-2">
          <img :src="'https://avatars.dicebear.com/api/initials/' + data.author + '.svg'" alt="user" width="50" class="rounded-circle" />
        </div>
        <div class="comment-text w-100">
          <h6 class="font-medium">{{ data.author }}</h6>
          <span class="m-b-15 d-block">{{ data.content }}
          </span>
          <div class="comment-footer">
            <span class="text-muted float-end">{{ new Date(data.created_at).toLocaleDateString() }}</span>
            <span v-if="data.status === 'pending'" class="badge bg-warning text-capitalize">{{ data.status }}</span>
            <span v-if="data.status === 'approved'" class="badge bg-success text-capitalize">{{ data.status }}</span>
            <span v-if="data.status === 'rejected'" class="badge bg-danger text-capitalize">{{ data.status }}</span>
            <span class="action-icons">
              <a v-if="data.status !== 'approved'" @click='updateStatus(data.id, data.blog_id, "approved")'><i class="ti-check"></i></a>
              <a v-if="data.status !== 'rejected'" @click='updateStatus(data.id, data.blog_id, "rejected")'><i class="ti-close"></i></a>
            </span>
          </div>
        </div>
      </div>
    `
  })
  new Vue({
    el: '#app',
    name: 'Comments',
    data: {
      statusData: [{
          name: 'All',
          value: ''
        },
        {
          name: 'Pending',
          value: 'pending'
        },
        {
          name: 'Approved',
          value: 'approved'
        },
        {
          name: 'Rejected',
          value: 'rejected'
        }
      ],
      commentStatus: '',
      loading: false,
      blog: {},
      comments: []
    },
    methods: {
      getURLParams(key) {
        const urlParams = new URLSearchParams(window.location.search)
        return urlParams.get(key)
      },
      async getComments() {
        const id = this.getURLParams('id')
        fetch("../api/admin/getComments.php?id=" + id + "&status=" + this.commentStatus)
          .then(res => {
            res.json()
              .then(data => {
                this.blog = data.blog
                this.comments = data.comments
                this.loading = false
              })
          })
          .catch(err => {
            console.error(err);
            this.loading = false
          })
      }
    },
    mounted() {
      this.getComments()
    }
  })
</script>
<?php require("include/footer.php") ?>