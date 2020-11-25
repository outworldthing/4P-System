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
$FirstName = htmlspecialchars($_REQUEST['FirstName']);
$MiddleName = htmlspecialchars($_REQUEST['MiddleName']);
$LastName = htmlspecialchars($_REQUEST['LastName']);
$Suffix = htmlspecialchars($_REQUEST['Suffix']);
include '../../BACKEND_FILES/ADMIN.php';
$ADMIN = new ADMIN();
$result = $ADMIN->getFamilyCredentials($FirstName, $MiddleName, $LastName, $Suffix);
?>

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../../DESIGN_EXTENSIONS/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../DESIGN_EXTENSIONS/img/4pslogo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Family Basic Information
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../../DESIGN_EXTENSIONS/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />

  <link href="../../DESIGN_EXTENSIONS/css/client-styles.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../../DESIGN_EXTENSIONS/demo/demo.css" rel="stylesheet" />
</head>

<body class="">

  <div class="sidebar">

    <div class="logo">
      <div class="row">
        <div class="col-lg-4 logo-img">
          <img class="img" src="../../DESIGN_EXTENSIONS/img/4pslogo.png" />
        </div>
        <div class="col-lg-8 p-0">
          <span>Pantawid Pamilyang Pilipino Program</span>
        </div>
      </div>
    </div>

    <ul class="nav text-center">
      <li>
        <form action="SearchFamily.php" method="POST">
          <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
          <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
          <button type="submit" class="sidebar-button sidebar-button-active">Family Basic Information</button>
        </form>
      </li>
      <li class="nav-item ">
        <form action="SearchForEdit.php" method="POST">
          <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
          <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
          <button type="submit" class="sidebar-button">Edit Family Information</button>
        </form>
      </li>
      <li class="nav-item ">
        <form action="SearchFamilyLogs.php" method="POST">
          <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
          <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
          <button type="submit" class="sidebar-button">Family Logs</button>
        </form>
      </li>
      <li>
        <form action="../adminPortal.php" method="POST">
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
              <a class="register-nav-link" href="../logIn/logIn.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-auto">
                    <div class="card">
                        <div class="card-header card-header-warning">
                            <h4 class="card-title ">View Family Basic Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-warning">
                                    <th>
                                        First Name
                                    </th>
                                    <th>
                                        Middle Name
                                    </th>
                                    <th>
                                        Last Name
                                    </th>
                                    <th>
                                        Suffix Name
                                    </th>
                                    <th>
                                        Birth Date
                                    </th>
                                    <th>
                                        Gender
                                    </th>
                                    <th>
                                        Date of Registry
                                    </th>
                                    <th>
                                        Region
                                    </th>
                                    <th>
                                        Municipality
                                    </th>
                                    <th>
                                        Province
                                    </th>
                                    <th>
                                        Barangay
                                    </th>
                                    <th>
                                        Street
                                    </th>
                                    <th>
                                        House no.
                                    </th>
                                    <th>
                                        Subdivision
                                    </th>
                                    </thead>
                                    <tbody>
                                        <?php while ($rows = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $rows['FirstName']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rows['MiddleName']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rows['LastName']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rows['Suffix']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rows['BirthDate']; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($rows['Gender'] == "1") {
                                                        echo 'MALE';
                                                    } else {
                                                        echo'FEMALE';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo $rows['DateOfRegistry']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rows['Region']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rows['Municipality']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rows['Province']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rows['Barangay']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rows['Street']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rows['HouseNo']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rows['Subdivision']; ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

      </div>
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
