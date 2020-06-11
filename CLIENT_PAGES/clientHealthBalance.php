<!doctype html>
<html lang="en">

<head>
  <title>4ps | Health Balance</title>
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

  <div class="page-header header-filter page-bg">
  </div>

  <div class="main main-raised mx-0 mb-3 rounded-0"  id="client-login">
    <div class="container">
      <form class="form" name="signupForm" id="signupForm" onsubmit="return validateForm();">
        <div class="row">
          <div class="col-md-12 ml-auto mr-auto">
            <div class="title text-center">
              <h1 class="title"><img src="..\DESIGN_EXTENSIONS\img\family.jpg">Health Balance</h1>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="row justify-content-center">
              <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="loginUsername">TOTAL BALANCE:</label>
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">money</i>
                      </span>
                    <input type="text" required pattern=".{6,15}" class="form-input form-control p-3" name="healthtotalbalance" id="loginUsername" placeholder="TOTAL BALANCE">
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
                  <label for="loginPassword">CASH IN BALANCE: </label>
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">money</i>
                    </span>
                    <input type="password" Required pattern=".{6,15}" class="form-input form-control p-3" name="healthcashinbalance" id="loginPassword" placeholder="CASH IN BALANCE">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center mt-5">
          <div class="col-md-8">
            <div class="form-group text-center">
              <button type="submit" class="btn btn-info btn-block mt-4" id="signupSubmit">CASH IN</button>
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
