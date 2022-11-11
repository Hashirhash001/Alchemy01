<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
require("include/header.php");
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
              Starter Page
            </li>
          </ol>
        </nav>
        <h1 class="mb-0 fw-bold">Starter Page</h1>
      </div>
      <div class="col-6">
        <div class="text-end upgrade-btn">
          <a class="btn btn-primary text-white" target="_blank">Upgrade to Pro</a>
        </div>
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
            This is some text within a card block.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require("include/footer.php") ?>