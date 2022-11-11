<?php

$link = $_SERVER['PHP_SELF'];
$link_array = explode('/', $link);
$page = end($link_array);

switch ($page) {
  case 'index.php':
    $title = "Dashboard | Alchemy Admin";
    $description = "";
    break;

  case 'blogs.php':
    $title = "Blogs | Alchemy Admin";
    $description = "";
    break;

  case 'edit-blog.php':
    $title = "Edit Blog | Alchemy Admin";
    $description = "";
    break;

  case 'view-blog.php':
    $title = "View Blog | Alchemy Admin";
    $description = "";
    break;

  default:
    $title = "Alchemy Admin";
    $description = "";
    break;
}
?>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="<?= $description ?>" />
  <meta name="robots" content="noindex,nofollow" />
  <title><?= $title ?></title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png" />
  <!-- Custom CSS -->
  <link href="dist/css/style.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="dist/css/blog.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin6">
      <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header" data-logobg="skin6">
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <a class="navbar-brand" href="index.php">
            <!-- Logo icon -->
            <b class="logo-icon">
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->
              <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
              <!-- Light Logo icon -->
              <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text">
              <!-- dark Logo text -->
              <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
              <!-- Light Logo text -->
              <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
            </span>
          </a>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <!-- This is for the sidebar toggle which is visible on mobile only -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-start me-auto">
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            <li class="nav-item search-box">
              <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i>
                <span class="font-16">Search</span></a>
              <form class="app-search position-absolute">
                <input type="text" class="form-control" placeholder="Search &amp; enter" />
                <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
              </form>
            </li>
          </ul>
          <!-- ============================================================== -->
          <!-- Right side toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-end">
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../images/alchemy-logo.png" alt="user" class="rounded-circle" width="31" />
              </a>
              <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="javascript:void(0)" onclick="logout()"><i class="ti-power-off m-r-5 m-l-5"></i> Logout</a>
              </ul>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin6">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-calendar-clock"></i><span class="hide-menu">Appointments </span></a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item <?= $page === "appointments.php" ? "selected" : null ?>">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="appointments.php" aria-expanded="false"><i class="mdi mdi-calendar-blank"></i><span class="hide-menu">All Appointments</span></a>
                </li>
              </ul>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-brush"></i><span class="hide-menu">Services </span></a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item <?= $page === "new-service.php" ? "selected" : null ?>">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="new-service.php" aria-expanded="false"><i class="mdi mdi-plus-circle"></i><span class="hide-menu">New Service</span></a>
                </li>
                <li class="sidebar-item <?= $page === "service-list.php" ? "selected" : null ?>">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="service-list.php" aria-expanded="false"><i class="mdi mdi-view-list"></i><span class="hide-menu">Services List</span></a>
                </li>
              </ul>
            </li>
            <li class="sidebar-item">
              <a class=" sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-blogger"></i><span class="hide-menu">Blog </span></a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item <?= $page === "new-blog.php" ? "selected" : null ?>">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="new-blog.php" aria-expanded="false"><i class="mdi mdi-plus-circle"></i><span class="hide-menu">New Blog</span></a>
                </li>
                <li class="sidebar-item <?= $page === "blog-list.php" ? "selected" : null ?>">
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="blog-list.php" aria-expanded="false"><i class="mdi mdi-view-list"></i><span class="hide-menu">Blogs List</span></a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <script>
      function logout() {
        console.log("here");
        fetch("../api/logout.php")
          .then((res) => {
            res.json()
              .then((data) => {
                console.log(data);
                if(!res.error) {
                  window.location.href = "login.php"
                }
              }).catch((err) => {
                console.log(err);
              });
          }).catch((err) => {
            console.log(err);
          });
      }
    </script>