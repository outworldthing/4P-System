<?php
$username = htmlspecialchars($_REQUEST['loginUsername']);
$password = htmlspecialchars($_REQUEST['loginPassword']);
$TeacherID = htmlspecialchars($_REQUEST['TeacherID']);
$SectionName = htmlspecialchars($_REQUEST['SectionName']);
include '../BACKEND_FILES/TEACHER.php';
$TEACHER = new TEACHER();

$result = $TEACHER->getStudentsPerSection($TeacherID, $SectionName)
?>
<!doctype html>
<html>

    <head>
        <title>4ps | Handled Sections</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link rel="icon" href="../DESIGN_EXTENSIONS/img/4pslogo.png" type="image/png">
        <!-- Material Kit CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <link href="../DESIGN_EXTENSIONS/css/material-kit.css?v=2.0.7" rel="stylesheet" />
        <!-- CSS -->
        <link href="../DESIGN_EXTENSIONS/css/client-styles.css" rel="stylesheet" />
    </head>

    <body>

        <nav class="navbar navbar-expand-lg bg-dark rounded-0">
            <div class="container-fluid">
                <a class="navbar-brand" href="javascript:;">4PS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <span class="navbar-text" href="javascript:;">Welcome Teacher<span class="sr-only">(current)</span></span>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-right">
                        <li class="nav-item">
                            <a href="teacherLogin.php" class="nav-link nav-item btn">Signout<div class="ripple-container"></div></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="page-header header-filter page-bg">
        </div>

        <div class="main main-raised mx-0 mb-3 pb-4 rounded-0" style="margin-top: -10%;">
            <div class="container-fluid">
                <form action="index.html" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title text-center">
                                <h1 class="title">Handled Sections</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                        </div>
                    </div>
                    <div class="row justify-content-center pb-5 mt-3">
                        <div class="col-md-6 table-responsive">
                            <table class="table table-hover table-bordered dataviewTable">
                                <thead>
                                    <tr>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Middle Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Suffix</th>
                                        <th scope="col">Total Absences</th>
                                        <th scope="col">Total School Days</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        echo'<tr>
                                        <td>'.$rows['FirstName'].'</td>
                                        <td>'.$rows['MiddleName'].'</td>
                                        <td>'.$rows['LastName'].'</td>
                                        <td>'.$rows['Suffix'].'</td>
                                        <td>'.$rows['TotalNumberOfAbsents'].'</td>
                                        <td>'.$rows['TotalNumberOfSchoolDays'].'</td>
                                    </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
                <center>
                    <form action="teacherSelectSection.php.php" method="POST">
                        <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
                        <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
                        <input type="hidden" name="TeacherID" value="<?php echo $TeacherID; ?>" />
                        <input class="btn btn-primary stretched-link" type="submit" value="GO BACK TO TEACHER PORTAL" />
                    </form>
                </center>
            </div>
        </div>

        <!--   Core JS Files   -->
        <script src="../DESIGN_EXTENSIONS/js/core/jquery.min.js" type="text/javascript"></script>
        <script src="../DESIGN_EXTENSIONS/js/core/popper.min.js" type="text/javascript"></script>
        <script src="../DESIGN_EXTENSIONS/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
        <script src="../DESIGN_EXTENSIONS/js/plugins/moment.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

        <script>
            $(document).ready(function () {
                $(".dropdown-toggle").dropdown();
            });

            $(document).ready(function () {
                $('.dataviewTable').DataTable();
            });
        </script>
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

    <html>