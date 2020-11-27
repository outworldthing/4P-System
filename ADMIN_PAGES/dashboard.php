<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================
Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim
=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">
<?php
    $username = htmlspecialchars($_REQUEST['loginUsername']);
    $password = htmlspecialchars($_REQUEST['loginPassword']);

    include '../BACKEND_FILES/ADMIN.php';
    $ADMIN = new ADMIN();
    ?>

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../DESIGN_EXTENSIONS/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../DESIGN_EXTENSIONS/img/4pslogo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Admin Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../DESIGN_EXTENSIONS/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />

  <link href="../DESIGN_EXTENSIONS/css/client-styles.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../DESIGN_EXTENSIONS/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" src="../DESIGN_EXTENSIONS/package/dist/Chart.css">
  <link rel="stylesheet" src="../DESIGN_EXTENSIONS/package/dist/Chart.min.css">
  <script src="../DESIGN_EXTENSIONS/package/dist/Chart.bundle.js"></script>
  <script src="../DESIGN_EXTENSIONS/package/dist/Chart.bundle.min.js"></script>
  <script type="text/javascript">

  </script>
</head>

<body class="">

  <div class="sidebar">

    <div class="logo">
      <div class="row">
        <div class="col-lg-4 logo-img">
          <img class="img" src="../DESIGN_EXTENSIONS/img/4pslogo.png" />
        </div>
        <div class="col-lg-8 p-0">
          <span>Pantawid Pamilyang Pilipino Program</span>
        </div>
      </div>
    </div>

    <ul class="nav text-center">
      <li>
        <form action="dashboard.php" method="POST">
          <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
          <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
          <button type="submit" class="sidebar-button sidebar-button-active">Dashboard</button>
        </form>
      </li>
      <li>
        <form action="adminPortal.php" method="POST">
          <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
          <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
          <button type="submit" class="sidebar-button">Return to Portal</button>
        </form>
      </li>
    </ul>

  </div>

  <div class="main-panel">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg  navbar-absolute">
      <div class="container-fluid">
        <div class="navbar-wrapper">
        </div>
        <div class="justify-content-end">
          <ul class="navbar-nav">
            <li class="register-nav-item">
              <a class="register-nav-link " href="#">Dashboard</a>
            </li>
            <li class="register-nav-item">
              <a class="register-nav-link " href="#">Notification</a>
            </li>
            <li class="register-nav-item">
              <a class="register-nav-link" href="logIn/logIn.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <div class="dashboard-content content ">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-lg-12 dashboard-left">

            <div class="row justify-content-center">
              <div class="col-lg-3  text-center dashboard-tile">
                <h2><?php echo $ADMIN->getNumStudents(); ?></h2>
                <canvas id="chart" width="400" height="400"></canvas>
                <h3>Students</h3>
              </div>

              <div class="col-lg-3  text-center dashboard-tile">
                <h2><?php echo $ADMIN->getEducationGrantTotal() + $ADMIN->getEducationGrantTotal(); ?></h2>
                <canvas id="chart2" width="400" height="400"></canvas>
                <h3>Cash Grants Given</h3>
              </div>

              <div class="col-lg-3 text-center dashboard-tile">
                <h2><?php echo $ADMIN->getTotalFamilies();?></h2>
                <canvas id="chart1" width="400" height="400"></canvas>
                <h3>Families</h3>
              </div>
            </div>

            <div class="row justify-content-center">
              <div class="col-lg-3 text-center dashboard-tile">
                <h2><?php echo $ADMIN->getMale() + $ADMIN->getFemale(); ?></h2>
                <canvas id="chart3" width="400" height="400"></canvas>
                <h3>Male/Female</h3>
              </div>

              <div class="col-lg-3  text-center dashboard-tile">
                <h2><?php echo $ADMIN->getTotalBeneficiaries(); ?></h2>
                <canvas id="chart4" width="400" height="400"></canvas>
                <h3>Number of Beneficiaries</h3>
              </div>

              <div class="col-lg-3 text-center dashboard-tile">
                <h2><?php echo $ADMIN->getNumRegionNCR() + $ADMIN->getNumRegionCAR() + $ADMIN->getNumRegion1() + $ADMIN->getNumRegion2() + $ADMIN->getNumRegion3() + $ADMIN->getNumRegion4A() + $ADMIN->getNumRegionMIM() + $ADMIN->getNumRegion5(); ?></h2>
                <canvas id="chart5" width="400" height="400"></canvas>
                <h3>Beneficiaries per Region</h3>
              </div>
            </div>



          </div>

        </div>
      </div>
    </div>

  </div>


  <!--   Chart JS Files   -->

  <script type="text/javascript">
    var ctx = document.getElementById('chart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Student'],
        datasets: [{
          label: '# of Students',
          data: [<?php echo $ADMIN->getNumStudents(); ?>],
          backgroundColor: [
            'rgb(255, 157, 10)',
          ],
          borderColor: [
            'rgb(163, 97, 0)',
          ],
          borderWidth: 2
        }]
      }
    });
  </script>

  <script type="text/javascript">
    var ctx = document.getElementById('chart1').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Family'],
        datasets: [{
          label: '# of Family',
          data: [<?php echo $ADMIN->getTotalFamilies();?>],
          backgroundColor: [
            'rgb(60, 204, 163)',
          ],
          borderColor: [
            'rgb(12, 48, 38)',
          ],
          borderWidth: 2
        }]
      }
    });
  </script>

  <script type="text/javascript">
    var ctx = document.getElementById('chart2').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Education', 'Health'],
        datasets: [{
          label: ['Cash Grant'],
          data: [<?php echo $ADMIN->getEducationGrantTotal(); ?>, <?php echo $ADMIN->getEducationGrantTotal(); ?>],
          backgroundColor: [
            'rgb(225, 59, 59)',
            'rgb(46, 76, 223)',
          ],
          borderColor: [
            'rgb(115, 17, 17)',
            'rgb(15, 29, 102)',
          ],
          borderWidth: 2
        }]
      }
    });
  </script>

  <script type="text/javascript">
    var ctx = document.getElementById('chart3').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Male', 'Female'],
        datasets: [{
          label: ['Male/Female'],
          data: [<?php echo $ADMIN->getMale();?>, <?php echo $ADMIN->getFemale();?>],
          backgroundColor: [
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 2
        }]
      }
    });
  </script>

  <script type="text/javascript">
    var ctx = document.getElementById('chart4').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Total Number of Beneficiaries'],
        datasets: [{
          label: ['Total Number of Beneficiaries'],
          data: [<?php echo $ADMIN->getTotalBeneficiaries();?>],
          backgroundColor: [
            'rgb(239, 155, 46)',
          ],
          borderColor: [
            'rgb(123, 73, 9)',
          ],
          borderWidth: 2
        }]
      }
    });
  </script>

  <script type="text/javascript">
    var ctx = document.getElementById('chart5').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['NCR', 'CAR', 'Region 1', 'Region 2', 'Region 3', 'Region 4A', 'MIMAROPA', 'Region 5'],
        datasets: [{
          label: ['Male/Female'],
            data: [<?php echo $ADMIN->getNumRegionNCR();?>, <?php echo $ADMIN->getNumRegionCAR();?>, <?php echo $ADMIN->getNumRegion1();?>,
            <?php echo $ADMIN->getNumRegion2();?>, <?php echo $ADMIN->getNumRegion3();?>, <?php echo $ADMIN->getNumRegion4A();?>,
            <?php echo $ADMIN->getNumRegionMIM();?>, <?php echo $ADMIN->getNumRegion5();?>],
          backgroundColor: [
            'rgb(191, 63, 63)',
            'rgb(234, 135, 35)',
            'rgb(147, 232, 63)',
            'rgb(28, 221, 221)',
            'rrgb(137, 45, 230)',
            'rgb(240, 55, 240)',
            'rgb(217, 72, 145)',
            'rgb(69, 242, 155)'
          ],
          borderColor: [
            'rgb(76, 25, 25)',
            'rgb(107, 58, 9)',
            'rgb(71, 127, 14)',
            'rgb(11, 85, 85)',
            'rgb(61, 12, 109)',
            'rgb(132, 9, 132)',
            'rgb(114, 23, 68)',
            'rgb(6, 100, 53)'
          ],
          borderWidth: 1
        }]
      }
    });
  </script>


  <link rel="stylesheet" src="../DESIGN_EXTENSIONS/package/dist/Chart.css">
  <link rel="stylesheet" src="../DESIGN_EXTENSIONS/package/dist/Chart.min.css">
  <script src="../DESIGN_EXTENSIONS/package/dist/Chart.bundle.js"></script>
  <script src="../DESIGN_EXTENSIONS/package/dist/Chart.bundle.min.js"></script>

  <!--   Core JS Files   -->
  <script src="../DESIGN_EXTENSIONS/js/core/jquery.min.js"></script>
  <script src="../DESIGN_EXTENSIONS/js/core/popper.min.js"></script>
  <script src="../DESIGN_EXTENSIONS/js/core/bootstrap-material-design.min.js"></script>
  <script src="../DESIGN_EXTENSIONS/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../DESIGN_EXTENSIONS/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../DESIGN_EXTENSIONS/demo/demo.js"></script>
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
