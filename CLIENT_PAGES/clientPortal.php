<!doctype html>
<html lang="en">

<head>
  <title>4ps | Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0," name="viewport" />
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
    body {
      background-color: #fcecdc;
      ;
    }
  </style>
</head>

<body>

  <?php
  $username = htmlspecialchars($_REQUEST['loginUsername']);
  $password = htmlspecialchars($_REQUEST['loginPassword']);


  include '../BACKEND_FILES/CLIENT.php';
  $CLIENT = new CLIENT();
  if ($CLIENT->ConfirmUsernamePassword($username, $password) == TRUE) {
      $MemberID = $CLIENT->returnAccountMemberID($username, $password);
      ?>

  <div class="client-portal">
    <div class="container">
      <div class="row justify-content-center client-portal-head">
        <div class="col-lg-3 text-right">
          <img src="../DESIGN_EXTENSIONS/img/member.PNG" alt="" class="responsive-img">
        </div>
        <div class="col-lg-6 justify-content-center d-flex align-items-center">
          <div class="client-portal-head-headline text-center">
            <h2>WELCOME CLIENT</h2>
            <h3>SELECT A SECTION TO MANAGE</h3>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="client-portal-cards">
        <div class="row">

          <div class="col-lg-3 text-center">
            <div class="row justify-content-center">
              <div class="col-lg-10 client-portal-index">
                <div class="row justify-content-center">
                  <div class="col-lg-7 client-portal-cards-img">
                    <img src="../DESIGN_EXTENSIONS/img/CASH IN.png" alt="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <h2>CASH IN</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <form action="clientCashInBalance.php" method="POST">
                        <input type="hidden" name="MemberID" value="<?php echo $MemberID; ?>" />
                        <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                        <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                        <input class="client-portal-button" type="submit" value="ENTER" />
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 text-center">
            <div class="row justify-content-center">
              <div class="col-lg-10 client-portal-index">
                <div class="row justify-content-center">
                  <div class="col-lg-7 client-portal-cards-img">
                    <img src="../DESIGN_EXTENSIONS/img/FAMILY BASIC INFORMATION.png" alt="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <h2>FAMILY BASIC INFORMATION</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <form action="clientDataview.php" method="POST">
                        <input type="hidden" name="MemberID" value="<?php echo $MemberID; ?>" />
                        <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                        <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                        <input class="client-portal-button" type="submit" value="ENTER" />
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 text-center">
            <div class="row justify-content-center">
              <div class="col-lg-10 client-portal-index">
                <div class="row justify-content-center">
                  <div class="col-lg-7 client-portal-cards-img">
                    <img src="../DESIGN_EXTENSIONS/img/HISTORY LOGS.png" alt="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <h2>HISTORY LOGS</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <form action="clientHistoryLogs.php" method="POST">
                        <input type="hidden" name="MemberID" value="<?php echo $MemberID; ?>" />
                        <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                        <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                        <input class="client-portal-button" type="submit" value="ENTER" />
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 text-center">
            <div class="row justify-content-center">
              <div class="col-lg-10 client-portal-index">
                <div class="row justify-content-center">
                  <div class="col-lg-7 client-portal-cards-img">
                    <img src="../DESIGN_EXTENSIONS/img/FAMILY SESSION VENUES.png" alt="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <h2>FAMILY SESSION VENUES</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <form action="clientFamilySessionVenues.php" method="POST">
                        <input type="hidden" name="MemberID" value="<?php echo $MemberID; ?>" />
                        <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                        <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                        <input class="client-portal-button" type="submit" value="ENTER" />
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../DESIGN_EXTENSIONS/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin  -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-kit.js?v=2.0.4" type="text/javascript"></script>
</body>

</html>
