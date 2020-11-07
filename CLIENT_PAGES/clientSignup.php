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

  <div class="client-signup" style="height: 100vh;">
    <div class="container-fluid">
      <form action="../CLIENT_PROCESSES/clientSignupProcess.php" method="POST" class="form" name="signupForm" id="signupForm" onsubmit="return validateForm();">
        <div class="row">
          <div class="col-lg-5 d-flex align-items-center">
            <div class="client-signup-head client-signup-head-left">
              <div class="row text-center d-flex align-items-center">
                <div class="col-lg-4">
                  <img src="../DESIGN_EXTENSIONS/img/member.PNG" alt="">
                </div>
                <div class="col-lg-8 d-flex align-items-center">
                  <h2>CLIENT <br> REGISTRATION</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="client-signup-head client-signup-head-right">
              <div class="row">
                <div class="col-lg-9 d-flex align-items-center text-right">
                  <h2 class="ml-auto">PANTAWID PAMILYANG <br> PILIPINO PROGRAM</h2>
                </div>
                <div class="col-lg-3 text-center">
                  <img src="../DESIGN_EXTENSIONS/img/4pslogo.PNG" width="200px" alt="">
                </div>
              </div>
            </div>
            <div class="client-signup-body-right">
              <div class="row">
                <div class="col-lg-12 text-center">
                  <h2>ALREADY A MEMBER?</h2>
                  <a href="clientLogin.php">LOGIN HERE!</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="client-signup-body-main">
          <div class="row">
            <div class="col-lg-3  client-signup-text">
              <div class="row justify-content-center text-center">
                <span>FIRST NAME:</span>
              </div>
              <div class="row justify-content-center text-center">
                <input type="text" name="signupFirstName" id="signupFirstName">
              </div>
            </div>
            <div class="col-lg-3  client-signup-text">
              <div class="row justify-content-center text-center">
                <span>MIDDLE NAME:</span>
              </div>
              <div class="row justify-content-center text-center">
                <input type="text" name="signupMiddleName" id="signupMiddleName">
              </div>
            </div>
            <div class="col-lg-3  client-signup-text">
              <div class="row justify-content-center text-center">
                <span>LAST NAME:</span>
              </div>
              <div class="row justify-content-center text-center">
                <input type="text" name="signupLastName" id="signupLastName">
              </div>
            </div>
            <div class="col-lg-3  client-signup-text">
              <div class="row justify-content-center text-center">
                <span>SUFFIX (if any):</span>
              </div>
              <div class="row justify-content-center text-center">
                <input type="text" name="signupSuffix" id="signupSuffix">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 client-signup-text">
              <div class="row d-flex align-items-center">
                <div class="col-lg-4 text-right">
                  <span>USERNAME:</span>
                </div>
                <div class="col-lg-8">
                  <input type="text" pattern=".{6,15}" name="signupUsername" id="signupUsername">
                </div>
              </div>
            </div>
            <div class="col-lg-6 client-signup-text">
              <div class="row d-flex align-items-center">
                <div class="col-lg-4 text-right">
                  <span>PASSWORD:</span>
                </div>
                <div class="col-lg-8">
                  <input type="password" pattern=".{6,15}" name="signupPassword" id="signupPassword">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-7 client-signup-text">
              <div class="row d-flex align-items-center">
                <div class="col-lg-5 text-right">
                  <span>CONFIRM PASSWORD:</span>
                </div>
                <div class="col-lg-7">
                  <input type="password" pattern=".{6,15}" name="signupConfirmPassword" id="signupConfirmPassword">
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <input type="submit" name="" value="REGISTER" class="client-signup-button">
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
