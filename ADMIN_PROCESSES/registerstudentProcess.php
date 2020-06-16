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
        $FirstName = htmlspecialchars($_REQUEST['FirstName']);
        $MiddleName = htmlspecialchars($_REQUEST['MiddleName']);
        $LastName = htmlspecialchars($_REQUEST['LastName']);
        $Suffix = htmlspecialchars($_REQUEST['Suffix']);
        $BirthDate = htmlspecialchars($_REQUEST['BirthDate']);
        $School = htmlspecialchars($_REQUEST['School']);
        $Section = htmlspecialchars($_REQUEST['Section']);
        $GradeType = htmlspecialchars($_REQUEST['gradeType']);

        $TeacherFirstName = htmlspecialchars($_REQUEST['TeacherFirstName']);
        $TeacherMiddleName = htmlspecialchars($_REQUEST['TeacherMiddleName']);
        $TeacherLastName = htmlspecialchars($_REQUEST['TeacherLastName']);
        $TeacherSuffix = htmlspecialchars($_REQUEST['TeacherSuffix']);

        include '../../BACKEND_FILES/ADMIN.php';
        $ADMIN = new ADMIN();
        $MemberID = $ADMIN->checkPersonExists($FirstName, $MiddleName, $LastName, $Suffix);
        $StudentID = "";
        $TeacherID = "";
        $SectionID = "";
        $SchoolID = "";
        if ($MemberID >= 0) {
            if ($ADMIN->enrollStudent($MemberID) == TRUE) {
                $StudentID = $ADMIN->getStudentID($MemberID);
                if ($StudentID >= 0) {
                    $ADMIN->enrollEducationAccount($StudentID);
                    $TeacherID = $ADMIN->getTeacherID($TeacherFirstName, $TeacherMiddleName, $TeacherLastName, $TeacherSuffix);
                    if ($TeacherID >= 0) {
                        $SchoolID = $ADMIN->getSchoolID($School);
                        if ($SchoolID >= 0) {
                            $SectionID = $ADMIN->enrollSection($SchoolID, $TeacherID, $StudentID, $SectionName);
                            if ($SectionID == TRUE) {
                                echo 'Student Successfully Enrolled <br>';
                                $Message = "Student Successfully Enrolled";
                                echo $Message;
                                $ADMIN->UpdateLog($MemberID, $Message);
                            } else {
                                echo 'NO SECTION FOUND, CHECK FOR ADMIN <br>';
                            }
                        } else {
                            echo 'NO SCHOOL REGISTERED, CHECK FOR ADMIN <br>';
                        }
                    } else {
                        echo 'NO TEACHER FOUND, CHECK FOR ADMIN <br>';
                    }
                } else {
                    echo'NO STUDENT FOUND, CHECK FOR ADMIN <br>';
                }
            } else {
                echo 'ENROLLMENT ERROR, CHECK FOR ADMIN <br>';
            }
        } else {
            echo 'NO PERSON FOUND, ENROLL FIRST<br>';
        }

        if ($GradeType == "Daycare" || $GradeType == "Elementary") {
            $ADMIN->enrollDayCareElem($SchoolID, $StudentID);
        } else if ($GradeType == "JHS") {
            $ADMIN->enrollSHS($SchoolID, $StudentID);
        } else if ($GradeType == "SHS") {
            $ADMIN->enrollJHS($SchoolID, $StudentID);
        }
        ?>
        <form action="../ADMIN_PAGES/Register/registerstudent.php" method="POST">
            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
            <input type="submit" value="RETURN TO REGISTER FAMILY FORM" />
        </form>
    </body>
</html>
