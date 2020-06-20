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
        $FamilyID = htmlspecialchars($_REQUEST['FamilyID']);
        $MemberID = htmlspecialchars($_REQUEST['MemberID']);
        include '../BACKEND_FILES/ADMIN.php';
        $ADMIN = new ADMIN();
        if ($ADMIN->UpdateInformation($FirstName, $MiddleName, $LastName, $Suffix, $FamilyID, $MemberID) == TRUE) {
            echo 'Update Successful <br>';
            $Message="Credentials Updated to ".$FirstName." ".$MiddleName." ".$LastName." ".$Suffix." ";
            echo $Message;
            $ADMIN->UpdateLog($MemberID, $Message);
        } else {
            echo 'Update Error';
        }
        ?>
        <form action="../ADMIN_PAGES/Family/SearchForEdit.php" method="POST">
            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
            <input type="hidden" name="FirstName" value="<?php echo $FirstName; ?>" />
            <input type="hidden" name="MiddleName" value="<?php echo $MiddleName; ?>" />
            <input type="hidden" name="LastName" value="<?php echo $LastName; ?>" />
            <input type="hidden" name="Suffix" value="<?php echo $Suffix; ?>" />
            <input type="submit" value="RETURN TO Search Person to Edit Information of" />
        </form>
    </body>
</html>
