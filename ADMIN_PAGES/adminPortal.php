<!doctype html>
<html lang="en">
    <?php
    $username = htmlspecialchars($_REQUEST['loginUsername']);
    $password = htmlspecialchars($_REQUEST['loginPassword']);

    include '../BACKEND_FILES/ADMIN.php';
    $ADMIN = new ADMIN();
    $condition = $ADMIN->ConfirmAdminUsernamePassword($username, $password);
    if ($condition == TRUE) {
        $ADMIN->DeleteFamilyOver7years();
        $ADMIN->DeleteStudentsOver18();
        ?>
        <head>
            <title>4ps | Admin Portal</title>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0," name=" viewport" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <!--  Fonts and icons  -->
            <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
            <link rel="icon" href="../DESIGN_EXTENSIONS/img/4pslogo.png" type="image/png">
            <!-- Material Kit CSS -->
            <link href="../DESIGN_EXTENSIONS/css/material-kit.css?v=2.0.4" rel="stylesheet" />
            <!-- CSS -->
            <link href="../DESIGN_EXTENSIONS/css/client-styles.css" rel="stylesheet" />
            <style>
              .bg-admin {
                background-image: url("../DESIGN_EXTENSIONS/img/admin-bg.jpg");
                background-repeat: no-repeat;
                background-size: cover;
              }

              .btns {
                width: 80%;
                background-color: #2f5296;
                font-size: 1.3vw;
                border-radius: 10px;
              }
            </style>
        </head>

        <body class="bg-admin" style="overflow-x: hidden;">

          <div class="row">
            <div class="col-md ml-auto mr-auto">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <span class="navbar-text lg-mt-5" href="javascript:;" style="font-size: 2vw; margin-left: 6vw; color: white; font-weight:400;">ADMIN HOME<span class="sr-only">(current)</span></span>
                </li>
              </ul>
              </div>
              <div class="col-md ml-auto mr-auto text-right">
              <ul class="navbar-nav navbar-right">
                <li class="nav-item">
                  <a href="login/logIn.php" class="nav-link nav-item mt-2 mr-5" style="font-size: 1.2vw; color: #fc9d51; font-weight:600;">Logout<div class="ripple-container"></div></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="content">

              <div class="row">
                <div class="col-md ml-auto mr-auto mt-md-1">
                  <div class="title text-center">
                    <h1 class="title mb-0" style="font-size: 3vw; color: #bf3e3f;">What do you want to do?</h1>
                    <h4 class="subtitle">select a section to manage</h4>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 ">
                      <div class="card ml-auto mr-auto pt-5" style="width: 80%; height: 90%; background-color: #fdecdc;">
                        <img src="../DESIGN_EXTENSIONS/img/guy-reading.png" class="image-fluid ml-auto mr-auto mt-2" width="65%" alt="guy reading">
                        <form action="Register/registerfamily.php" action="POST">
                          <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                          <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                          <div class="card-body text-center">
                            <div class="row">
                              <div class="col">
                                <h3 class="card-title" style="font-size: 1.5vw;">Register Clients</h3>
                              </div>
                            </div>
                            <div class="row mt-4">
                              <div class="col">
                                <button type="submit" class="btn btns stretched-link">Enter</button>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="card ml-auto mr-auto pt-5" style="width: 80%; height: 90%; background-color: #fdecdc;">
                        <img src="../DESIGN_EXTENSIONS/img/family.png" class="image-fluid ml-auto mr-auto" width="60%" alt="calendar">
                        <form action="Family/SearchFamily.php" action="POST">
                          <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                          <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                          <div class="card-body text-center">
                            <div class="row">
                              <div class="col">
                                <h3 class="card-title" style="font-size: 1.3vw;">Manage Families/Household</h3>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <button type="submit" class="btn btns stretched-link">Enter</button>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 ">
                      <div class="card ml-auto mr-auto pt-5" style="width: 80%; height: 90%; background-color: #fdecdc;">
                        <img src="../DESIGN_EXTENSIONS/img/admin-checkup.png" class="image-fluid ml-auto mr-auto mt-3 " width="65%" alt="guy reading">
                        <form action="Report_Checkup/prenatalcheckup.php" method="POST">
                          <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                          <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                        <div class="card-body text-center">
                            <div class="row mt-0">
                              <div class="col">
                                <h3 class="card-title" style="font-size: 1.5vw;">Report Checkup</h3>
                              </div>
                            </div>
                            <div class="row mt-lg-3">
                              <div class="col">
                                <button type="submit" class="btn btns stretched-link">Enter</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                      <div class="card ml-auto mr-auto pt-5" style="width: 80%; height: 90%; background-color: #fdecdc;">
                        <img src="../DESIGN_EXTENSIONS/img/educationbenefit.png" class="image-fluid ml-auto mr-auto mt-1" width="65%" alt="calendar">
                        <form action="Issue_Benefit/checkup.php" action="POST">
                          <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                          <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                          <div class="card-body text-center">
                            <div class="row mt-0">
                              <div class="col">
                                <h3 class="card-title" style="font-size: 1.5vw;">Issue Benefit</h4>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <button type="submit" class="btn btns stretched-link">Enter</button>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

          </div>
                <?php
            } else {
                echo '<center><b>Log in Failed, Check Username and Password</b>';
                echo '<form action = "logIn/login.php" method="POST">'
                . '<br>'
                . '<input type="submit" value="GO BACK TO LOG IN PAGE"/>'
                . '</form></center>';
            }
            ?>
        </div>

        <!--   Core JS Files   -->
        <script src="../DESIGN_EXTENSIONS/js/core/jquery.min.js" type="text/javascript"></script>
        <script src="../DESIGN_EXTENSIONS/js/core/popper.min.js" type="text/javascript"></script>
        <script src="../DESIGN_EXTENSIONS/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
        <script src="../DESIGN_EXTENSIONS/js/plugins/moment.min.js"></script>
        <!-- NULL Checker JS -->
        <script type="text/javascript" src="../DESIGN_EXTENSIONS/js/notNull.js"></script>
        <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
        <script src="../DESIGN_EXTENSIONS/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="../DESIGN_EXTENSIONS/js/plugins/nouislider.min.js" type="text/javascript"></script>
        <!--  Google Maps Plugin  -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
        <script src="../DESIGN_EXTENSIONS/js/material-kit.js?v=2.0.4" type="text/javascript"></script>

    </body>

</html>
