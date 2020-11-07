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
</head>

<body>

  <div class="client-login" style="height: 100vh;">
    <div class="container-fluid">
      <form method="POST" action="clientPortal.php" class="form" name="signupForm" id="signupForm" onsubmit="return validateForm();">
        <div class="row">
          <div class="col-lg-4">
            <div class="client-login-head client-login-head-left">
              <div class="row text-center">
                <div class="col-lg-5">
                  <img src="../DESIGN_EXTENSIONS/img/member.PNG" alt="">
                </div>
                <div class="col-lg-7 d-flex align-items-center">
                  <h2>CLIENT <br> LOG-IN</h2>
                </div>
              </div>
            </div>
            <div class="client-login-body-left">
              <div class="row">
                <div class="col-lg-12 text-center">
                  <h2>NOT A MEMBER YET?</h2>
                  <a href="clientsignup.php">REGISTER NOW</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="client-login-head client-login-head-right">
              <div class="row">
                <div class="col-lg-9 d-flex align-items-center text-right">
                  <h2 class="ml-auto">PANTAWID PAMILYANG <br> PILIPINO PROGRAM</h2>
                </div>
                <div class="col-lg-3 text-center">
                  <img src="../DESIGN_EXTENSIONS/img/4pslogo.PNG" width="200px" alt="">
                </div>
              </div>
              <div class="client-login-input">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="client-login-text">
                      <div class="row">
                        <div class="col-lg-3 d-flex align-items-center">
                          <span>USERNAME:</span>
                        </div>
                        <div class="col-lg-9">
                          <input type="text" required pattern=".{6,15}" name="loginUsername" id="loginUsername">
                        </div>
                      </div>
                    </div>
                    <div class="client-login-text">
                      <div class="row">
                        <div class="col-lg-3 d-flex align-items-center">
                          <span>PASSWORD:</span>
                        </div>
                        <div class="col-lg-9 ">
                          <input type="password" Required pattern=".{6,15}" name="loginPassword" id="loginPassword">
                        </div>
                      </div>
                    </div>
                    <div class="client-login-buttons">
                      <div class="row">
                        <div class="col-lg-6 text-right">
                          <input type="submit" name="" value="LOGIN" id="signupSubmit" class="client-login-button">
                        </div>
      </form>
      <div class="col-lg-6">
        <form action="../index.php">
          <input type="submit" name="" value="BACK" class="client-login-button">
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



  </div>
  </div>










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
