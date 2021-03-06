<!doctype html>
<html lang="en">

    <head>
        <title>4ps | Signup</title>
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

        <div class="page-header header-filter page-bg">
        </div>

        <div class="main main-raised mx-0 mb-3 rounded-0"  id="client-signup">
            <div class="container">
                <form action="../CLIENT_PROCESSES/clientSignupProcess.php" method="POST" class="form" name="signupForm" id="signupForm" onsubmit="return validateForm();">
                    <div class="row">
                        <div class="col-md-12 ml-auto mr-auto">
                            <div class="title text-center">
                                <h1 class="title">Client Register</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-lg-5 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="signupFirstName">First Name</label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" class="form-input form-control p-3" name="signupFirstName" id="signupFirstName" placeholder="Enter First Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="signupMiddleName">Middle Name</label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" class="form-input form-control p-3" name="signupMiddleName" id="signupMiddleName" placeholder="Enter Middle Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-lg-5 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="signupLastName">Last Name</label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" class="form-input form-control p-3" name="signupLastName" id="signupLastName" placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="signupSuffix">Suffix (if any)</label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" class="form-input form-control p-3" name="signupSuffix" id="signupSuffix" placeholder="Enter Suffix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="signupUsername">Username</label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" class="form-input form-control p-3" pattern=".{6,15}" name="signupUsername" id="signupUsername" placeholder="Enter Username">
                                        </div>
                                        <p><small>Please use 6 to 15 characters.</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="signupPassword">Password</label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">vpn_key</i>
                                            </span>
                                            <input type="password" class="form-input form-control p-3" pattern=".{6,15}" name="signupPassword" id="signupPassword" placeholder="Enter Password">
                                        </div>
                                        <p><small>Please use 6 to 15 characters.</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="signupConfirmPassword">Confirm Password</label>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">vpn_key</i>
                                            </span>
                                            <input type="password" class="form-input form-control p-3" pattern=".{6,15}" name="signupConfirmPassword" id="signupConfirmPassword" placeholder="Please Confirm Password">
                                        </div>
                                        <p><small>Please use 6 to 15 characters.</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8">
                            <div class="form-group text-center">
                                <p class="lead">Already a member? <a class="lead text-info" href="clientLogin.php">Login Here!</a></p>
                                <button type="submit" class="btn btn-info btn-block mt-4" id="signupSubmit">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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
