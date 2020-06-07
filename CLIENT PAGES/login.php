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
  <link href="../DESIGN_EXTENSIONS/css/styles.css" rel="stylesheet" />
</head>

<body>

  <div class="page-header header-filter" style="background-image:url(../DESIGN_EXTENSIONS/img/pantawid-bg.png); background-size: cover; background-position: top center;">
  </div>

  <div class="main main-raised mx-0 mb-3 rounded-0" id="main">
    <div class="section section-basic pt-0 pb-2">
      <div class="container">
        <form class="form" name="signupForm" id="signupForm" onsubmit="return validateForm();">
          <div class="row">
            <div class="col-md-12 ml-auto mr-auto">
              <div class="title text-center">
                <h1 class="title">Login</h1>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="loginUsername">Username</label>
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">face</i>
                      </span>
                      <input type="text" required pattern=".{6,15}" class="login-input form-control p-3" name="loginUsername" id="loginUsername" placeholder="Enter Username">
                    </div>
                  </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">vpn_key</i>
                      </span>
                      <input type="password" Required pattern=".{6,15}" class="login-input form-control p-3" name="loginPassword" id="loginPassword" placeholder="Enter Password">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center mt-5">
            <div class="col-md-8">
              <div class="form-group text-center">
                <p class="lead">Not a member yet? <a class="lead text-info" href="signup.php">Register Now!</a></p>
                <button type="submit" class="btn btn-info btn-block mt-4" id="signupSubmit">Login</button>
              </div>
            </div>
          </div>
        </form>
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
