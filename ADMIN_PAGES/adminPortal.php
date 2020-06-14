<!doctype html>
<html lang="en">
    <?php
    $username = htmlspecialchars($_REQUEST['loginUsername']);
    $password = htmlspecialchars($_REQUEST['loginPassword']);

    include '../BACKEND_FILES/ADMIN.php';
    $ADMIN = new ADMIN();
    $condition = $ADMIN->ConfirmAdminUsernamePassword($username, $password);
    if ($condition == TRUE) {
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
        </head>

        <body>

            <nav class="navbar navbar-expand-lg navbar-primary rounded-0" style="color: black;">
                <div class="container-fluid">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <span class="navbar-text" href="javascript:;">Admin Home<span class="sr-only">(current)</span></span>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-right">
                        <li class="nav-item">
                            <a href="login/logIn.php" class="nav-link nav-item btn btn-primary">Signout<div class="ripple-container"></div></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="content ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 ml-auto mr-auto">
                            <div class="title text-center">
                                <h2 class="title mb-0">What do you want to do?</h2>
                                <h5 class="subtitle">select a section to manage</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 ">
                                    <div class="card ml-auto mr-auto pt-5" style="width: 18rem; height: 25rem;">
                                        <img src="../DESIGN_EXTENSIONS/img/guy-reading.png" class="image-fluid ml-auto mr-auto" width="50%" alt="guy reading">
                                        <form action="Register/registerfamily.php" action="POST">
                                            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                                            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                                            <div class="card-body text-center">
                                                <h4 class="card-title p-4">Register Clients</h4>
                                                <button type="submit" class="btn btn-primary stretched-link">Enter</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="card ml-auto mr-auto pt-5" style="width: 18rem; height: 25rem;">
                                        <img src="../DESIGN_EXTENSIONS/img/family.jpg" class="image-fluid ml-auto mr-auto" width="50%" alt="calendar">
                                        <form action="Family/SearchFamily.php" action="POST">
                                            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                                            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                                            <div class="card-body text-center">
                                                <h4 class="card-title mt-3">Manage Families/Household</h4>
                                                <button type="submit" class="btn btn-primary stretched-link">Enter</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 ">
                                    <div class="card ml-auto mr-auto pt-5" style="width: 18rem; height: 25rem;">
                                        <img src="../DESIGN_EXTENSIONS/img/admin-checkup.png" class="image-fluid ml-auto mr-auto" width="50%" alt="guy reading">
                                        <div class="card-body text-center">
                                            <form action="Report_Checkup/prenatalcheckup.php" method="POST">
                                                <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                                                <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                                                <h4 class="card-title p-4">Report Checkup</h4>
                                                <button type="submit" class="btn btn-primary stretched-link">Enter</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="card ml-auto mr-auto pt-5" style="width: 18rem; height: 25rem;">
                                        <img src="../DESIGN_EXTENSIONS/img/educationbenefit.jpg" class="image-fluid ml-auto mr-auto" width="50%" alt="calendar">
                                        <form action="Issue_Benefit/checkup.php" action="POST">
                                            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                                            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                                            <div class="card-body text-center">
                                                <h4 class="card-title pt-1">Issue Benefit</h4>
                                                <button type="submit" class="btn btn-primary stretched-link">Enter</button>
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
