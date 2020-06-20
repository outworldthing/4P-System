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
        <?php
        $username = htmlspecialchars($_REQUEST['loginUsername']);
        $password = htmlspecialchars($_REQUEST['loginPassword']);
        $FirstName = htmlspecialchars($_REQUEST['attendanceFirstName']);
        $MiddleName = htmlspecialchars($_REQUEST['attendanceMiddleName']);
        $LastName = htmlspecialchars($_REQUEST['attendanceLastName']);
        $Suffix = htmlspecialchars($_REQUEST['attendanceSuffix']);
        $Absences = htmlspecialchars($_REQUEST['attendanceAbsences']);
        $TotalSchoolDays = htmlspecialchars($_REQUEST['attendanceSchoolDays']);

        include '../BACKEND_FILES/TEACHER.php';
        $TEACHER = new TEACHER();
        include '../BACKEND_FILES/ADMIN.php';
        $ADMIN = new ADMIN();

        $StudentID = $TEACHER->getStudentID($FirstName, $MiddleName, $LastName, $Suffix);
        if ($StudentID >= 0) {
            $MemberID = $ADMIN->checkPersonExists($FirstName, $MiddleName, $LastName, $Suffix);
            if ($TEACHER->EnterNumberOfAbsences($StudentID, $Absences, $TotalNumberOfDays) == TRUE) {
                echo 'Report Success';
                $Message = "Student has a total of ".$Absences." from the total School Days of ".$TotalSchoolDays." ";
                echo $Message;
                $ADMIN->UpdateLog($MemberID, $Message);
            } else {
                echo 'Report Failed, Refer to Admin';
            }
        }
        ?>
        <form action="../TEACHER_PAGES/teacherAttendanceReport.php" method="POST">
            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
            <input class="btn btn-primary stretched-link" type="submit" value="GO BACK TO ATTENDANCE REPORT" />
        </form>
    </body>
</html>
