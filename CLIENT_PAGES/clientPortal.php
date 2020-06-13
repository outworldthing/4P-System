<!doctype html>
<html lang="en">

    <head>
        <title>4ps | Client Portal</title>
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
        <?php
        $username = htmlspecialchars($_REQUEST['loginUsername']);
        $password = htmlspecialchars($_REQUEST['loginPassword']);
        
        echo $username.'<br>';
        echo $password.'<br>';
        
        include '../BACKEND_FILES/CLIENT.php';
        $CLIENT = new CLIENT();
        if ($CLIENT->ConfirmUsernamePassword($username, $password) == TRUE) {
            $MemberID = $CLIENT->returnAccountMemberID($username, $password);
            ?>
            <div class="page-header header-filter page-bg">
            </div>
            <div class="main main-raised mx-0 mb-4 rounded-0" style="margin-top: -10%;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 ml-auto mr-auto ">
                            <div class="title text-center">
                                <h2 class="title mb-0">Welcome Client!</h2>
                                <h5 class="subtitle">select a section to manage</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-4 col-sm-12">
                                    <div class="card ml-auto mr-auto pt-3 mt-4" style="width: 18rem; height: 25rem;">
                                        <img src="../DESIGN_EXTENSIONS/img/deposit.png" class="image-fluid ml-auto mr-auto" width="50%" alt="deposit">
                                        <div class="card-body text-center">
                                            <h3 class="card-title p-4">Cash In</h3>
                                            <form action="clientCashInBalance.php" method="POST">
                                                <input type="hidden" name="MemberID" value="<?php echo $MemberID; ?>" />
                                                <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                                                <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                                                <input class="btn btn-primary stretched-link" type="submit" value="ENTER" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="card ml-auto mr-auto pt-3 mt-4" style="width: 18rem; height: 25rem;">
                                        <img src="../DESIGN_EXTENSIONS/img/family.jpg" class="image-fluid ml-auto mr-auto" width="50%" alt="family">
                                        <div class="card-body text-center">
                                            <h4 class="card-title p-4">Family Basic Information</h4>
                                            <form action="clientDataview.php" method="POST">
                                                <input type="hidden" name="MemberID" value="<?php echo $MemberID; ?>" />
                                                <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                                                <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                                                <input class="btn btn-primary stretched-link" type="submit" value="ENTER" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-4 col-sm-12 ">
                                    <div class="card ml-auto mr-auto pt-3 mt-4" style="width: 18rem; height: 25rem;">
                                        <img src="../DESIGN_EXTENSIONS/img/logbook.png" class="image-fluid ml-auto mr-auto pt-4 pb-2" width="50%" alt="logbook">
                                        <div class="card-body text-center">
                                            <h3 class="card-title p-4" >History Logs</h3>
                                            <form action="clientHistoryLogs.php" method="POST">
                                                <input type="hidden" name="MemberID" value="<?php echo $MemberID; ?>" />
                                                <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                                                <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                                                <input class="btn btn-primary stretched-link" type="submit" value="ENTER" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="card ml-auto mr-auto pt-3 mt-4" style="width: 18rem; height: 25rem;">
                                        <img src="../DESIGN_EXTENSIONS/img/picnic.png" class="image-fluid ml-auto mr-auto" width="75%" alt="picnic">
                                        <div class="card-body text-center">
                                            <h4 class="card-title p-4">Family Session Venues</h4>
                                            <form action="clientFamilySessionVenues.php" method="POST">
                                                <input type="hidden" name="MemberID" value="<?php echo $MemberID; ?>" />
                                                <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                                                <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                                                <input class="btn btn-primary stretched-link" type="submit" value="ENTER" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <?php
        } else {
            echo '<center><b>Log in Failed, Check Username and Password</b>';
            echo '<form action = "clientLogin.php" method="POST">'
            . '<br>'
            . '<input type="submit" value="GO BACK TO LOG IN PAGE"/>'
            . '</form></center>';
        }
        ?>
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
