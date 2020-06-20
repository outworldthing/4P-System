<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>
        <p> 
            <?php
            $username = htmlspecialchars($_REQUEST['signupUsername']);
            $password = htmlspecialchars($_REQUEST['signupPassword']);
            $FirstName = htmlspecialchars($_REQUEST['signupFirstName']);
            $MiddleName = htmlspecialchars($_REQUEST['signupMiddleName']);
            $LastName = htmlspecialchars($_REQUEST['signupLastName']);
            $Suffix = htmlspecialchars($_REQUEST['signupSuffix']);
            $contactNo = htmlspecialchars($_REQUEST['signupContactNumber']);
            $Gender = htmlspecialchars($_REQUEST['signupGender']);


            include '../BACKEND_FILES/TEACHER.php';
            $TEACHER = new TEACHER();
            ?>

            <?php
            $condition = $TEACHER->checkTeacherExists($FirstName, $MiddleName, $LastName, $Suffix);
            $TeacherID = $TEACHER->getTeacherIDCredentials($FirstName, $MiddleName, $LastName, $Suffix);
            if ($condition == TRUE) {
                if ($TEACHER->checkUsernameExists($username) == FALSE) {
                    if ($TEACHER->SignUpTeacherAccount($TeacherID, $username, $password) == TRUE) {
                        echo "<center>Teacher Account Succesfully Created! Proceed to Log in <br>";
                        echo "You will be redirected in 3 seconds</center>";
                        ?>
                        <script>
                            setTimeout(function () {
                                window.location.href = "../TEACHER_PAGES/teacherLogin.php";
                            }, 3000);
                        </script>
                        <?php
                    }
                } else {
                    echo "<center>Username is already taken, try another Username<br>";
                    echo "You will be redirected in 3 seconds</center>";
                    ?>
                    <script>
                        setTimeout(function () {
                            window.location.href = "../TEACHER_PAGES/teacherSignup.php";
                        }, 3000);
                    </script><?php
                }
            } else {
                echo "<center>Person is not yet enrolled in the system, enroll at Admin Page<br>";
                echo "You will be redirected in 3 seconds</center>";
                ?>
                <script>
                    setTimeout(function () {
                        window.location.href = "../TEACHER_PAGES/teacherSignup.php";
                    }, 3000);
                </script><?php
            }
            ?>
        </p>
    </body>
</html>
