<!Doctype>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../DESIGN_EXTENSIONS/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../DESIGN_EXTENSIONS/img/4pslogo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Pantawid Pamilyang Pilipino Program
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../../DESIGN_EXTENSIONS/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../../DESIGN_EXTENSIONS/demo/demo.css" rel="stylesheet" />

  <style>
    .img-bg {
      width: 99%;
    }

    .txt-span {
      font-size: 2vw;
      font-weight: 900;
      line-height: 1.1em;
      text-align: center;
      color: #bf3e3f;
      top: 3.5vh;
      position: relative;
    }

    a {
      text-align: center;
    }

    .txt-form {
      background-color: white;
      height: 3vw;
      width: 18vw;
      font-size: 1.3vw;
    }

    .lbl-txt {
      color: black;
      font-size: .9vw;
    }

    .btns {
      width: 80%;
      background-color: #2f5296;
      font-size: 1.3vw;
    }

    .lnk {
      color: #bf3e3f;
      font-size: .9vw;
      font-weight: 500;
    }
  </style>

</head>

<body class="" style="overflow:hidden;">
  <div class="row m-0" style="height: 100vh; background-color: white;">

    <div class="col-4">

      <div class="row m-0 p-2 d-flex align-items-center justify-content-center" style="height:49vw;">
        <div class="col-10 rounded" style="background-color: #fdecdc;">

          <form action="../adminPortal.php" method="POST">

            <div class="row justify-content-center">
              <p class="txt-span">LOGIN TO YOUR <br> ACCOUNT</p>
            </div>

            <div class="row justify-content-center mt-4">
              <div class="col-10">

                <div class="form-group m-0 p-0" style="text-align:center;">
                  <label for="loginUsername" class="lbl-txt">Username</label><br>
                  <input type="text" id="loginUsername" name="loginUsername" class="rounded p-2 txt-form" required>
                </div>

                <br>

                <div class="form-group m-0 p-0" style="text-align:center">
                  <label for="loginPassword" class="lbl-txt">Password</label><br>
                  <input type="password" id="loginPassword" name="loginPassword" class="rounded p-2 txt-form" required><br><br>
                  <a href="../signUp/signUp.php" class="lnk">No Account yet? Create one here!</a>
                </div>

              </div>
            </div>

            <div class="row text-center">
              <div class="col">

                <button type="submit" class="btn btns">LOGIN</button><br>

                <a href="../../index.php" class="lnk">Not an Admin? <br> Go Back to Index Page</a>
              </div>
            </div>

          </form>

        </div>
      </div>



    </div>


    <div class="col" style="background-color: white;">
      <img class="img-bg" src="../../DESIGN_EXTENSIONS/img/4ps-bgg.jpg">
      <img class="img-bg" src="../../DESIGN_EXTENSIONS/img/bg.jpg">
    </div>

  </div>

  <!--   Core JS Files   -->
  <script src="../../DESIGN_EXTENSIONS/js/core/jquery.min.js"></script>
  <script src="../../DESIGN_EXTENSIONS/js/core/popper.min.js"></script>
  <script src="../../DESIGN_EXTENSIONS/js/core/bootstrap-material-design.min.js"></script>
  <script src="../../DESIGN_EXTENSIONS/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../../DESIGN_EXTENSIONS/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../../DESIGN_EXTENSIONS/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../../DESIGN_EXTENSIONS/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../../DESIGN_EXTENSIONS/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../../DESIGN_EXTENSIONS/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../../DESIGN_EXTENSIONS/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../../DESIGN_EXTENSIONS/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../../DESIGN_EXTENSIONS/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../../DESIGN_EXTENSIONS/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../../DESIGN_EXTENSIONS/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../../DESIGN_EXTENSIONS/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../../DESIGN_EXTENSIONS/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../../DESIGN_EXTENSIONS/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../../DESIGN_EXTENSIONS/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../../DESIGN_EXTENSIONS/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../DESIGN_EXTENSIONS/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../../DESIGN_EXTENSIONS/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in DESIGN_EXTENSIONS/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>
