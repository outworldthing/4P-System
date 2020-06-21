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
        $PatientFirstName = htmlspecialchars($_REQUEST['PatientFName']);
        $PatientMiddleName = htmlspecialchars($_REQUEST['PatientMName']);
        $PatientLastName = htmlspecialchars($_REQUEST['PatientLName']);
        $PatientSuffix = htmlspecialchars($_REQUEST['PatientSuffix']);
        $DoctorFirstName = htmlspecialchars($_REQUEST['DoctorFName']);
        $DoctorMiddleName = htmlspecialchars($_REQUEST['DoctorMName']);
        $DoctorLastName = htmlspecialchars($_REQUEST['DoctorLName']);
        $DoctorSuffix = htmlspecialchars($_REQUEST['DoctorSuffix']);
        $DrugName= htmlspecialchars($_REQUEST['DrugName']);
        $Venue= htmlspecialchars($_REQUEST['Venue']);
        $DateOfCheckup = htmlspecialchars($_REQUEST['DateOfDeworming']);
        include '../BACKEND_FILES/ADMIN.php';
        $ADMIN = new ADMIN();
        
        $MemberID = $ADMIN->checkPersonExists($PatientFirstName, $PatientMiddleName, $PatientLastName, $PatientSuffix);
        if ($MemberID >= 0) {
            if ($ADMIN->registerDeworming($MemberID,$DoctorFirstName, $DoctorMiddleName, $DoctorLastName, $DoctorSuffix, $Venue, $DrugName,$DateOfCheckup) == TRUE) {
                echo 'DEWORMING ISSUED <br>';
                $Message="Deworming Issued: Venue:".$Venue." DrugName:".$DrugName." Date:".$DateOfCheckup." Doctor Name:".$DoctorFirstName." ".$DoctorMiddleName." ".$DoctorLastName." ".$DoctorSuffix." ";
                echo $Message;
                $ADMIN->UpdateLog($MemberID, $Message);
            } else {
                echo 'REGISTRY OF DEWORMING FAILED';
            }
        } else {
            echo 'No Member Matched';
        }
        ?>
        <form action="../ADMIN_PAGES/Issue_Benefit/deworming.php" method="POST">
            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
            <input type="submit" value="RETURN TO DEWORMING FORM" />
        </form>
    </body>
</html>
