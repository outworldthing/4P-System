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
        $Gender = "";
        if (htmlspecialchars($_REQUEST['Gender']) == 'MALE') {
            $Gender = 1;
        } else {
            $Gender = 0;
        }
        include '../BACKEND_FILES/ADMIN.php';
        $ADMIN = new ADMIN();

        $SchoolID = $ADMIN->getSchoolID($School);
        if ($SchoolID >= 0) {
            if ($ADMIN->checkTeacherExists($FirstName, $MiddleName, $LastName, $Suffix) == FALSE) {
                if ($ADMIN->enrollTeacher($SchoolID, $FirstName, $MiddleName, $LastName, $Suffix, $BirthDate, $Gender) == TRUE) {
                    echo 'TEACHER ENROLLED';
                } else {
                    echo 'ERROR IN ENROLLING TEACHER';
                }
            }else{
                echo 'Teacher already enrolled';
            }
        } else {
            echo 'NO SCHOOL FOUND';
        }
        ?>
        <form action="../ADMIN_PAGES/Register/registerteacher.php" method="POST">
            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
            <input type="submit" value="RETURN TO REGISTER FAMILY FORM" />
        </form>
    </body>
</html>
