<!doctype html>
<html lang="en">

<head>
  <title>4ps | Select Handled Sections</title>
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

<body style="background-color: #e3eef2;">

  <?php
  $username = htmlspecialchars($_REQUEST['loginUsername']);
  $password = htmlspecialchars($_REQUEST['loginPassword']);
  $TeacherID = htmlspecialchars($_REQUEST['TeacherID']);
  include '../BACKEND_FILES/TEACHER.php';
  $TEACHER = new TEACHER();
  $result = $TEACHER->getSections($TeacherID);
  ?>

  <div class="teacher-handled-sections">
    <div class="container-fluid">
      <div class="row d-flex align-items-center">
        <div class="col-lg-5">
          <div class="client-header client-header-left" style="background-color: #adcdd8;">
            <div class="row text-center d-flex align-items-center">
              <div class="col-lg-3">
                <img src="../DESIGN_EXTENSIONS/img/STUDENT ATTENDANCE.PNG" alt="">
              </div>
              <div class="col-lg-9 d-flex align-items-center">
                <h2 style="font-size: 2.6vw; font-weight: 500;">SELECT HANDLED SECTION</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-7 ml-auto">
          <div class="client-header client-header-right">
            <div class="row d-flex align-items-center">
              <div class="col-lg-9 text-right">
                <h2 class="ml-auto">PANTAWID PAMILYANG <br> PILIPINO PROGRAM</h2>
              </div>
              <div class="col-lg-3">
                <img src="../DESIGN_EXTENSIONS/img/4pslogo.PNG" width="200px" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container pt-3">
      <form action="teacherAttendanceReport.php" method="POST" class="form" name="signupForm" id="signupForm">
      <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
      <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
      <input type="hidden" name="TeacherID" value="<?php echo $TeacherID; ?>" />
      <div class="row">
        <div class="col-lg-12">
          <div class="row justify-content-center">
            <div class="col-lg-6 teacher-sections-body">
              <div class="row justify-content-center text-center">
                <span>LIST OF SECTIONS:</span>
              </div>
              <div class="row justify-content-center text-center">
                <select name="SectionName" data-style="btn btn-link" id="teacherSectionSelect">
                    <?php
                    while ($rows = mysqli_fetch_assoc($result)) {
                        ?>
                        <option><?php echo $rows['SectionName']; ?></option>
                    <?php } ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-6 text-right">
              <input type="submit" name="" value="SUBMIT" class="teacher-sections-button">
            </div>
            </form>
            <div class="col-lg-6 text-left">
              <form action="teacherPortal.php" method="POST">
                  <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                  <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                  <input type="hidden" name="TeacherID" value="<?php echo $TeacherID; ?>" />
                  <input type="submit" value="BACK" class="teacher-sections-button"/>
              </form>
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