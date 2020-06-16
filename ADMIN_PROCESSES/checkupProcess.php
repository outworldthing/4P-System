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
        $Vaccine = htmlspecialchars($_REQUEST['Vaccine']);
        $Venue = htmlspecialchars($_REQUEST['Venue']);
        $Diagnosis = htmlspecialchars($_REQUEST['Diagnosis']);
        $DateOfCheckup = htmlspecialchars($_REQUEST['DateofCheckUp_Vaccine']);
        include '../BACKEND_FILES/ADMIN.php';
        $ADMIN = new ADMIN();

        $MemberID = $ADMIN->checkPersonExists($PatientFirstName, $PatientMiddleName, $PatientLastName, $PatientSuffix);
        if ($MemberID >= 0) {
            if ($ADMIN->registerCheckup_Vaccoine($MemberID, $DoctorFirstName, $DoctorMiddleName, $DoctorLastName, $DoctorSuffix, $Venue, $Vaccine, $Diagnosis, $DateOfCheckup) == TRUE) {
                echo 'CHECK-UP/VACCINE ISSUED <br>';
                $Message = "Check-Up/Vaccine Issued, Venue:'".$Venue."' Date:'".$DateOfCheckup."' Doctor Name:'".$DoctorFirstName."' '".$DoctorMiddleName."' '".$DoctorLastName."' '".$DoctorSuffix."'";
                echo $Message;
                $ADMIN->UpdateLog($MemberID, $Message);
            } else {
                echo 'REGISTRY OF CHECKUP/VACCINE FAILED';
            }
        } else {
            echo 'No Member Matched';
        }
        ?>
        <form action="../ADMIN_PAGES/Issue_Benefit/checkup.php" method="POST">
            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
            <input type="submit" value="RETURN TO CHECKUP FORM" />
        </form>
    </body>
</html>
