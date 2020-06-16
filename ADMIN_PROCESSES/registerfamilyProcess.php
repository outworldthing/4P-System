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
        $Region = htmlspecialchars($_REQUEST['Region']);
        $Municipality = htmlspecialchars($_REQUST['Municipality']);
        $Province = htmlspecialchars($_REQUEST['Province']);
        $Barangay = htmlspecialchars($_REQUEST['Barangay']);
        $Street = htmlspecialchars($_REQUEST['Street']);
        $HouseNo = htmlspecialchars($_REQUEST['HouseNo']);
        $Subdivision = htmlspecialchars($_REQUEST['Subdivision']);
        $Gender = "";
        include '../BACKEND_FILES/ADMIN.php';
        $ADMIN = new ADMIN();
        $FamilyID = $ADMIN->enrollFamily($LastName, $Region, $Municipality, $Province, $Barangay, $Street, $HouseNo, $Subdivision);
        $ADMIN->enrollFamilyAccount($FamilyID);
        for ($index = 0; $index < 5; $index++) {
            $FirstName = htmlspecialchars($_REQUEST['FirstName' . $i]);
            $MiddleName = htmlspecialchars($_REQUEST['MiddleName' . $i]);
            $LastName = htmlspecialchars($_REQUEST['LastName' . $i]);
            $Suffix = htmlspecialchars($_REQUEST['Suffix' . $i]);
            $BirthDate = htmlspecialchars($_REQUEST['BirthDate' . $i]);
            if ($FirstName != '') {
                if (htmlspecialchars($_REQUEST['Gender' . $i]) == 'MALE') {
                    $Gender = 1;
                } else {
                    $Gender = 0;
                }
                if ($ADMIN->enrollMembers($FamilyID, $FirstName, $MiddleName, $LastName, $Suffix, $BirthDate, $Gender) == TRUE) {
                    echo "Enroll Member: '" . $i . "' successful!";
                } else {
                    echo "Register of Member: '" . $i . "' Failed! Refer to Administrator";
                }
            } else {
                break;
            }
        }
        ?>
        <form action="../ADMIN_PAGES/Register/registerfamily.php" method="POST">
            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
            <input type="submit" value="RETURN TO REGISTER FAMILY FORM" />
        </form>
    </body>
</html>
