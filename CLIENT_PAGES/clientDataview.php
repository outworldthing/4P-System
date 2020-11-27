<!doctype html>
<html lang="en">

<head>
  <title>4ps | Family Information</title>
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

<body style="background-color: #fcecdc;">

  <?php
  $username = htmlspecialchars($_REQUEST['loginUsername']);
  $password = htmlspecialchars($_REQUEST['loginPassword']);
  $MemberID = htmlspecialchars($_REQUEST['MemberID']);

  include '../BACKEND_FILES/CLIENT.php';
  $CLIENT = new CLIENT();
  ?>

  <div class="teacher-handled-sections">
    <div class="container-fluid">
      <div class="row d-flex align-items-center">
        <div class="col-lg-5">
          <div class="client-header client-header-left">
            <div class="row text-center d-flex align-items-center">
              <div class="col-lg-3">
                <img src="../DESIGN_EXTENSIONS/img/STUDENT ATTENDANCE.PNG" alt="">
              </div>
              <div class="col-lg-9 d-flex align-items-center">
                <h2 style="font-size: 2.6vw; font-weight: 500;">FAMILY INFORMATION</h2>
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

    <div class="container-fluid pt-3">

      <div class="row">
        <div class="col-lg-12">

          <div class="row">
            <div class="col-lg-12">
              <form action="index.html" method="post">
                <table class="table table-hover table-bordered dataviewTable">
                  <thead>
                    <tr>
                      <th scope="col">Member ID</th>
                      <th scope="col">Family ID</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Middle Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Suffix</th>
                      <th scope="col">Birthdate</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Date of Registry</th>
                      <th scope="col">Region</th>
                      <th scope="col">Municipality</th>
                      <th scope="col">Province</th>
                      <th scope="col">Barangay</th>
                      <th scope="col">Street</th>
                      <th scope="col">House Number</th>
                      <th scope="col">Subdivision</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $FamilyID = $CLIENT->returnFamilyIDfromUserPass($username, $password);
                        $result = $CLIENT->getFamilyBasicInformation($FamilyID);
                        if (mysqli_num_rows($result) >0) {
                            while ($rows = mysqli_fetch_assoc($result)) {
                                ?>
                    <tr>
                      <th scope="col" style="text-align:center"><?php echo $rows['MemberID']; ?></th>
                      <td><?php echo $rows['FamilyID']; ?></td>
                      <td><?php echo $rows['FirstName']; ?></td>
                      <td><?php echo $rows['MiddleName']; ?></td>
                      <td><?php echo $rows['LastName']; ?></td>
                      <td><?php echo $rows['Suffix']; ?></td>
                      <td><?php echo $rows['BirthDate']; ?></td>
                      <td>
                        <?php
                                        if ($rows['Gender'] == '1') {
                                            echo 'Male';
                                        } else {
                                            echo 'Female';
                                        }
                                        ?>
                      </td>
                      <td><?php echo $rows['DateOfRegistry']; ?></td>
                      <td><?php echo $rows['Region']; ?></td>
                      <td><?php echo $rows['Municipality']; ?></td>
                      <td><?php echo $rows['Province']; ?></td>
                      <td><?php echo $rows['Barangay']; ?></td>
                      <td><?php echo $rows['Street']; ?></td>
                      <td><?php echo $rows['HouseNo']; ?></td>
                      <td><?php echo $rows['Subdivision']; ?></td>
                    </tr>
                    <?php
                            }
                        }
                        ?>
                </table>
              </form>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12 text-center">
              <form action="clientPortal.php" method="POST">
                <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                <input type="submit" name="" value="BACK" class="client-portal-button">
              </form>
            </div>
          </div>


        </div>
      </div>

    </div>

  </div>


  <!--   Core JS Files   -->
  <script>
    $(document).ready(function() {
      $(".dropdown-toggle").dropdown();
    });

    $(document).ready(function() {
      $('.dataviewTable').DataTable();
    });
  </script>
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
