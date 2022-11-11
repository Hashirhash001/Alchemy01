<!DOCTYPE html>
<html dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="robots" content="noindex,nofollow" />
  <title>Login | Alchemy Admin</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png" />
  <!-- Custom CSS -->
  <link href="dist/css/style.css" rel="stylesheet" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>

<body>
  <style>
    .auth-wrapper .auth-box {
      box-shadow: 1px 0 20px rgba(0, 0, 0, .08);
      margin: 10% 0;
      max-width: 400px;
      width: 90%;
    }
  </style>
  <div class="main-wrapper">
    <!-- ============================================================= -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================= -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================= -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================= -->
    <!-- ============================================================= -->
    <!-- Login box.scss -->
    <!-- ============================================================= -->
    <div class="
          auth-wrapper
          d-flex
          no-block
          justify-content-center
          align-items-center
        ">
      <div class="auth-box p-4 bg-white rounded">
        <div id="loginform">
          <div class="logo">
            <h3 class="box-title mb-3">Sign In</h3>
          </div>
          <!-- Form -->
          <div class="row">
            <div class="col-12">
              <form class="form-horizontal mt-3 form-material" id="loginform">
                <div class="form-group mb-3">
                  <div class="">
                    <input class="form-control" type="text" required="" placeholder="Username" name="username" />
                  </div>
                </div>
                <div class="form-group mb-4">
                  <div class="">
                    <input class="form-control" type="password" required="" placeholder="Password" name="password" />
                  </div>
                </div>
                <div class="form-group text-center mt-4 mb-3">
                  <div class="col-xs-12">
                    <button class="
                          btn btn-primary
                          d-block
                          w-100
                          waves-effect waves-light
                        " type="submit">
                      Log In
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ============================================================= -->
    <!-- Login box.scss -->
    <!-- ============================================================= -->
  </div>
  <!-- ============================================================= -->
  <!-- All Required js -->
  <!-- ============================================================= -->
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="dist/js/toast.js"></script>
  <!-- ============================================================= -->
  <!-- This page plugin js -->
  <!-- ============================================================= -->

  <script>
    $(".preloader").fadeOut();

    $("#loginform").submit(function(e) {
      // Login
      e.preventDefault();
      const payload = {
        username: $('input[name=username]').val(),
        password: $('input[name=password]').val()
      }

      if (!payload.username) {
        showToast("Enter Username", "danger")
        return
      }

      if (!payload.password) {
        showToast("Enter Password", "danger")
        return
      }

      $.ajax({
        url: '../api/login.php',
        type: 'POST',
        data: payload,
        success: (res) => {
          if (!res.error) {
            showToast(res.msg, "success")
            window.location.href = "index.php"
          } else {
            showToast(res.msg, "danger")
          }
        }
      })
    });
  </script>
</body>

</html>