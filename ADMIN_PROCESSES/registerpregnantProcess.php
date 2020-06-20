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
        include '../BACKEND_FILES/ADMIN.php';
        $ADMIN = new ADMIN();
        $MemberID = $ADMIN->checkPersonExists($FirstName, $MiddleName, $LastName, $Suffix);
        if ($ADMIN->checkPregnantExists($MemberID) == FALSE) {
            if ($ADMIN->enrollPregnant($MemberID) == TRUE) {
                echo 'Pregnant Status Enrolled';
                $Message = "Pregnant Status Enrolled";
                echo $Message;
                $ADMIN->UpdateLog($MemberID, $Message);
            }
        } else {
            echo 'Pregnant Status already established';
        }
        ?>
        <form action="../ADMIN_PAGES/Register/registerpregnant.php" method="POST">
            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
            <input type="submit" value="RETURN TO REGISTER PREGNANT FORM" />
        </form>
    </body>
</html>
