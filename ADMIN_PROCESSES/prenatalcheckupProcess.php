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
        $PatientFirstName = htmlspecialchars($_REQUEST['PatientFirstName']);
        $PatientMiddleName = htmlspecialchars($_REQUEST['PatientMiddleName']);
        $PatientLastName = htmlspecialchars($_REQUEST['PatientLastName']);
        $PatientSuffix = htmlspecialchars($_REQUEST['PatientSuffix']);
        $DoctorFirstName = htmlspecialchars($_REQUEST['DoctorFirstName']);
        $DoctorMiddleName = htmlspecialchars($_REQUEST['DoctorMiddleName']);
        $DoctorLastName = htmlspecialchars($_REQUEST['DoctorLastName']);
        $DoctorSuffix = htmlspecialchars($_REQUEST['DoctorSuffix']);
        $DateOfCheckup = htmlspecialchars($_REQUEST['DateofCheckup']);
        $Hospital = htmlspecialchars($_REQUEST['Hospital']);
        include '../BACKEND_FILES/ADMIN.php';
        $ADMIN = new ADMIN();
        $MemberID = $ADMIN->confirmPregnant($PatientFirstName, $PatientMiddleName, $PatientLastName, $PatientSuffix);
        if ($MemberID >= 0) {
            $HospitalID = $ADMIN->checkHospital($Hospital);
            if ($HospitalID >= 0) {
                $PrenatalID = $ADMIN->registerPrenatalCheckup($DateOfCheckup, $HospitalID, $MemberID, $DoctorFirstName, $DoctorMiddleName, $DoctorLastName, $DoctorSuffix);
                if ($PrenatalID >= 0) {
                    if ($ADMIN->UpdatePrenatalStatus($MemberID, $PrenatalID)) {
                        echo 'UPDATE SUCCESS';
                        $Message = "Prenatal Checkup Complete";
                        echo $Message;
                        $ADMIN->UpdateLog($MemberID, $Message);
                    } else {
                        echo 'UPDATING ERROR IN PRENATAL TABLE';
                    }
                } else {
                    echo 'Prenatal Checkup Saving Error';
                }
            } else {
                echo 'No Hospital Found';
            }
        } else {
            echo 'No Person Matched';
        }
        ?>
        <form action="../ADMIN_PAGES/Report_Checkup/prenatalcheckup.php" method="POST">
            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
            <input type="submit" value="RETURN TO REGISTER FAMILY FORM" />
        </form>
    </body>
</html>
