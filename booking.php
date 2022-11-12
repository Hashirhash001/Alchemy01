<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />
  <meta name="robots" content="" />
  <meta name="description" content="BeautyZone : Beauty Spa Salon HTML Template" />
  <meta property="og:title" content="BeautyZone : Beauty Spa Salon HTML Template" />
  <meta property="og:description" content="BeautyZone : Beauty Spa Salon HTML Template" />
  <meta property="og:image" content="https://beautyzone.dexignzone.com/xhtml/social-image.png" />
  <meta name="format-detection" content="telephone=no" />

  <!-- FAVICONS ICON -->
  <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />

  <!-- PAGE TITLE HERE -->
  <title>BeautyZone : Beauty Spa Salon HTML Template</title>

  <!-- MOBILE SPECIFIC -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

  <!-- STYLESHEETS -->
  <link rel="stylesheet" type="text/css" href="css/plugins.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/templete.min.css" />
  <link class="skin" rel="stylesheet" type="text/css" href="css/skin/skin-1.css" />
  <link class="skin" rel="stylesheet" type="text/css" href="plugins/smartwizard/css/smart_wizard.css" />
  <link rel="stylesheet" href="plugins/datepicker/css/bootstrap-datetimepicker.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

  <link rel="stylesheet" href="css/booking.css">
  <link rel="stylesheet" href="service_style.css">

  <script src="components/Header.js"></script>
  <script src="components/Footer.js"></script>
</head>

<body id="bg">
<div class="cursor"></div>

  <div class="page-wraper">
    <div id="loading-area"></div>

    <!-- header -->
    <nav class="nav_head1">
        <a href="index.html"><img src="images/logo/Asset 5.png"></a>
        <div class="nav_links" id="navLinks">
            <img src="images/icons/close2.png" class="menu_icons" onclick="hideMenu()">
            <ul class="booking_page">
                <li class="nav_link_button"><a class="header_link" href="index.html">HOME</a></li>
                <li class="nav_link_button"><a class="header_link" href="about_us.html" class="">ABOUT US</a></li>
                <li class="nav_link_button"><a class="header_link" href="alchemy_service.html" class="">SERVICES</a></li>
                <li class="nav_link_button"><a class="header_link" href="contact-us.html" >CONTACT US</a></li>
                <li class=""><a class="header_link" href=""><span class="book_now_home2 color-7 button_back_remov">BOOK NOW</span></a></li>
            </ul>
        </div>
        <img src="images/icons/Asset 6hamburger.svg" class="menu_icons" onclick="showMenu()">
    </nav>
    <!-- header END -->
    <!-- Content -->
    <div class="page-content bg-white">
      <!-- inner page banner -->
      
      <!-- inner page banner END -->
      <div class="content-block">
        <!-- About Us -->
        <div class="section-full content-inner-2">
          <div class="cont_wrapper">
            <h1 class="booking_main_head">BOOKING</h1>
            <div class="container">
              <div id="smartwizard">
                <ul class="d-flex" style="border-top-right-radius: 10px;
    border-top-left-radius: 10px; background: rgba(222,235,251,0.5);">
                  <li class="flex-fill">
                    <a href="#time"><span><strong>1</strong><i class="fa fa-check"></i></span>
                      Time & Services</a>
                  </li>
                  <li class="flex-fill">
                    <a href="#details"><span><strong>2</strong><i class="fa fa-check"></i></span>
                      Details</a>
                  </li>
                  <li class="flex-fill">
                    <a href="#payment"><span><strong>3</strong><i class="fa fa-check"></i></span>
                      Mode of Payment</a>
                  </li>
                  <li class="flex-fill">
                    <a href="#done"><span><strong>4</strong><i class="fa fa-check"></i></span>
                      Done</a>
                  </li>
                </ul>

                <div>
                  <div id="time" class="wizard-box">
                    <h6 class="m-b30">Please select service:</h6>
                    <form class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                        <div class="row" id="serviceCheckboxes">
                        </div>
                        <div class="row">
                          <span class="ml-3" style="font-weight: bold; ">Total: ₹ <span id="serviceTotal"></span></span>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                        <label>I'm available on or after</label>
                        <input name="dzOther[date]" class="form-control" placeholder="Select Date" id="datetimepicker" type="text" onchange="funOnDateChange(this)" />
                      </div>
                    </form>
                  </div>
                  <div id="details" class="">
                    <h6 class="m-b5">Details</h6>
                    <p class="m-b30">
                      Please provide your details in the form below to proceed
                      with booking.
                    </p>
                    <form class="row">
                      <div class="col-lg-4 col-md-4 form-group">
                        <label>Name <span class="text-red">*</span></label>
                        <input class="form-control" placeholder="Your Name" type="text" id="customer_name" required />
                      </div>
                      <div class="col-lg-4 col-md-4 form-group">
                        <label>Phone <span class="text-red">*</span></label>
                        <input class="form-control" placeholder="Phone No." type="text" id="customer_phone" required />
                      </div>
                      <div class="col-lg-4 col-md-4 form-group">
                        <label>Email</label>
                        <input class="form-control" placeholder="johndoe@email.com" type="email" id="customer_mail" />
                      </div>
                    </form>
                    <div class="row">
                      <div class="col">
                        Fields marked with <span class="text-red"> * </span> are Required
                      </div>
                    </div>
                  </div>
                  <div id="payment" class="">
                    <h6>Please tell us how you would like to pay:</h6>
                    <form action="/action_page.php">
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="razorpay_std_payment_link" name="payment_type" value="razorpay_std_payment_link" checked />
                        <label class="custom-control-label" for="razorpay_std_payment_link">Pay Online with Razorpay</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="razorpay_upi_payment_link" name="payment_type" value="razorpay_upi_payment_link" disabled />
                        <label class="custom-control-label" for="razorpay_upi_payment_link">Pay with UPI using Razorpay</label>
                      </div>
                    </form>
                  </div>
                  <div id="done" class="">
                    <div class="successful-box text-center">
                      <div class="successful-check">
                        <i class="ti-check"></i>
                      </div>
                      <h3>Successful</h3>
                      <p class="h4">Your Appointment is under review and will be confirmed within 2-4 working hours. Once confirmed you will receive a payment link to complete your booking</p>
                      <small>Note: Paid Appointments are only fully considered as confirmed</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <!-- contact area END -->
    </div>
    <!-- Content END-->
    <!-- Footer -->
    <section class="booking_contact">

        <nav class="footer">
    
            <div class="footer_full_container">
                <div class="footer_sec1">
                    <p class="footer_head">Company</p>
                    <ul>
                        <li class="footer_links"><a hreh="#" class="links"><a href="#">Home</a></li>
                        <li class="footer_links"><a hreh="#" class="links"><a href="#">Our Services</a></li>
                        <li class="footer_links"><a hreh="#" class="links"><a href="#">About Us</a></li>
                        <li class="footer_links"><a hreh="#" class="links"><a href="#">Booking</a></li>
                        <li class="footer_links"><a hreh="#" class="links"><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer_sec1">
                    <p class="footer_head">Useful link</p>
                    <ul>
                        <li class="footer_links"><a hreh="#" class="links"><a href="#">Shop</a></li>
                        <li class="footer_links"><a hreh="#" class="links"><a href="#">Checkout</a></li>
                        <li class="footer_links"><a hreh="#" class="links"><a href="#">Cart</a></li>
                        <li class="footer_links"><a hreh="#" class="links"><a href="#">Login</a></li>
                        <li class="footer_links"><a hreh="#" class="links"><a href="#">Register</a></li>
                    </ul>
                </div>
                <div class="footer_sec2">
                    <p class="footer_head2">Contact us</p>
        
                    <div class="footer_container1">
                        <div>
                    <p class="footer_subhead"> ADDRESS</p>
                    <p class="footer_sub">ALCHEMY SALON & SPA, HOUSE 172,
                        BURNACHERRY, KANNUR. KERALA 670013</p>
                    </div>
                    </div>
                    
                    <div class="footer_container2">
                    <div>
                        <p class="footer_subhead">PHONE</p>
                        <p class="footer_sub">0497 276 6926</p>
                    </div>
                    </div>
        
                    <div class="footer_container3">
                    <div>
                        <p class="footer_subhead">EMAIL</p>
                        <p class="footer_sub">QUEENSINNOVATIONSKANNUR@GMAIL.COM</p>
                    </div>
                    </div>
                </div>
                <div class="footer_sec3">
                    <div class="footer_logos">
                        <img class="media_logos" src="images/icons/Asset 8insta.svg">
                        <img class="media_logos" src="images/icons/Asset 9yt.svg">
                        <img class="media_logos" src="images/icons/Asset 11WATAPP.svg">
                        <img class="media_logos" src="images/icons/Asset 12FB.svg">
                        <img class="media_logos" src="images/icons/Asset 13TWIT.svg">
                    </div>
        
                    <div class="footer_logos2">
                        <p class="footer_join">Join Our Monthly Newsletter</p><br>
                        
                    </div>
        
                    <div class="footer_logos3">
                        <form class="form1_contact">
                            <input type="email" name="email" id="email" placeholder="Your Email" />
                            <input type="submit" name="submit" class="color-7" value="subscribe">
                          </form>
                    </div>
                </div>
            </div>
    
            <div class="footer_sec3_1">
                <div class="footer_logos">
                    <img class="media_logos" src="images/icons/Asset 8insta.svg">
                    <img class="media_logos" src="images/icons/Asset 9yt.svg">
                    <img class="media_logos" src="images/icons/Asset 11WATAPP.svg">
                    <img class="media_logos" src="images/icons/Asset 12FB.svg">
                    <img class="media_logos" src="images/icons/Asset 13TWIT.svg">
                </div>
    
                <div class="footer_logos2">
                    <p class="footer_join">Join Our Monthly Newsletter</p><br>
                    
                </div>
    
                <div class="footer_logos3">
                    <form class="form1_contact">
                        <input type="email" name="email" id="email" placeholder="Your Email" />
                        <input type="submit" name="submit" class="color-7" value="subscribe">
                      </form>
                </div>
            </div>
    
            
    
        </nav>
    
    </section>
    <!-- Footer END -->
    <!-- <button class="scroltop fa fa-chevron-up"></button> -->
  </div>
  <!-- JAVASCRIPT FILES ========================================= -->
  <script src="js/jquery.min.js"></script>
  <!-- JQUERY.MIN JS -->
  <script src="plugins/wow/wow.js"></script>
  <!-- WOW JS -->
  <script src="plugins/bootstrap/js/popper.min.js"></script>
  <!-- BOOTSTRAP.MIN JS -->
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- BOOTSTRAP.MIN JS -->
  <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
  <!-- FORM JS -->
  <script src="plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
  <!-- FORM JS -->
  <script src="plugins/magnific-popup/magnific-popup.js"></script>
  <!-- MAGNIFIC POPUP JS -->
  <script src="plugins/counter/waypoints-min.js"></script>
  <!-- WAYPOINTS JS -->
  <script src="plugins/counter/counterup.min.js"></script>
  <!-- COUNTERUP JS -->
  <script src="plugins/imagesloaded/imagesloaded.js"></script>
  <!-- IMAGESLOADED -->
  <script src="plugins/masonry/masonry-3.1.4.js"></script>
  <!-- MASONRY -->
  <script src="plugins/masonry/masonry.filter.js"></script>
  <!-- MASONRY -->
  <script src="plugins/owl-carousel/owl.carousel.js"></script>
  <!-- OWL SLIDER -->
  <script src="plugins/rangeslider/rangeslider.js"></script>
  <!-- Rangeslider -->
  <script src="js/custom.js"></script>
  <!-- CUSTOM FUCTIONS  -->
  <script src="js/dz.carousel.min.js"></script>
  <!-- SORTCODE FUCTIONS  -->
  <script src="js/dz.ajax.js"></script>
  <!-- CONTACT JS  -->
  <script src="plugins/datepicker/js/moment.js"></script>
  <!-- DATEPICKER JS -->
  <script src="plugins/datepicker/js/bootstrap-datetimepicker.min.js"></script>
  <!-- DATEPICKER JS -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

  <script>

      var navLinks = document.getElementById("navLinks");

      function showMenu() {
          navLinks.style.right = "0";
      }

      function hideMenu() {
          navLinks.style.right = "-200px";
      }

    </script>

  <script src="js/cursor.js"></script>

  <script>
    let ajaxInvoke = false;

    $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {
      console.log(currentStepIndex, nextStepIndex, stepDirection);

      switch (currentStepIndex) {
        case 0:
          let checkedIds = $('input:checkbox:checked').map((i, el) => el.value).get()
          let appointmentDate = $('#datetimepicker').val()

          if (!checkedIds.length) {
            showToast('Atleast 1 service should be checked', 'danger')
            $('#smartwizard').smartWizard({
              errorSteps: [0] // Highlight step with errors
            });
            return false
          }

          if (!appointmentDate) {
            showToast('Select Date & Time for Appointment', 'danger')
            return false
          } else {
            dateOfAppointment = new Date(appointmentDate)
            if (dateOfAppointment < new Date()) {
              showToast('Selected Date Time is a past Date Time', 'danger')
              dateOfAppointment = null
              return false
            } else {
              dateOfAppointment = dateOfAppointment.toISOString()
            }
          }
          break;

        case 1:
          customerName = $('#customer_name').val()
          customerPhone = $('#customer_phone').val()
          customerEmail = $('#customer_mail').val()

          if (!customerName) {
            showToast('Name is Required', 'danger')
            return false
          }

          if (!customerPhone) {
            showToast('Phone is Required', 'danger')
            return false
          }
          break;

        case 2:
          if (!checkedServices.length) {
            showToast('Atleast 1 service should be checked', 'danger')
            return false
          }

          if (!dateOfAppointment) {
            showToast('Select Date & Time for Appointment', 'danger')
            return false
          }

          if (!customerName) {
            showToast('Name is Required', 'danger')
            return false
          }

          if (!customerPhone) {
            showToast('Phone is Required', 'danger')
            return false
          }

          if (ajaxInvoke === false) {
            ajaxInvoke = true
            paymentType = $("input[name='payment_type']").val()
            if (!paymentType) {
              showToast('Payment Type is Required', 'danger')
              return false
            }

            let data = {
              checkedServices: checkedServices,
              dateofAppointment: dateOfAppointment,
              customerName: customerName,
              customerPhone: customerPhone,
              customerEmail: customerEmail,
              paymentType: paymentType
            }

            $.ajax({
              url: 'api/createAppointment.php',
              method: 'POST',
              data: data,
              success: (res) => {
                showToast(res.msg, res.error ? 'danger' : 'success')
                if (!res.error) {
                  $("#smartwizard").smartWizard("next");
                  ajaxInvoke = false
                }
              },
              error: (err) => {
                console.error(err);
              }
            })
            return false
          }
          break;
        default:
          break
      }
    });

    jQuery(document).ready(function() {
      let services = []
      let dateOfAppointment = null
      let customerName = ''
      let customerPhone = ''
      let customerEmail = ''
      let checkedServices = ''
      let paymentType = ''
      getServices()

      $('#smartwizard').smartWizard("reset");
      $('.nav-item').addClass('flex-fill')
    });

    function getServices() {
      fetch("api/getServices.php")
        .then(res => {
          res.json()
            .then(data => {
              services = data
              let html = ``
              services.forEach(el => {
                html += `
                  <div class="col-lg-4">
                    <input type="checkbox" class="form-control" value="` + el.id + `" id="service_` + el.id + `" onClick="funOnCheck(this)">
                    <label for="service_` + el.id + `">` + el.name + ` - ₹ ` + el.price + `</label>
                  </div>
                `
              });
              $('#serviceCheckboxes').append(html)
            })
        })
        .catch(err => {
          console.error(err);
        })
    }

    function funOnCheck() {
      checkedServices = $('input:checkbox:checked').map((i, el) => el.value).get()
      let total = 0
      checkedServices.forEach(el => {
        total += parseFloat(services.find(service => service.id == el).price)
      });
      $('#serviceTotal').html(total)
    }
  </script>
  <script src="plugins/smartwizard/js/jquery.smartWizard.js"></script>
</body>

</html>