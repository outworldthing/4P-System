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
        $Venue = htmlspecialchars($_REQUEST['Venue']);
        $DateOfSession = htmlspecialchars($_REQUEST['DateOfSession']);
        include '../BACKEND_FILES/ADMIN.php';
        $ADMIN = new ADMIN();
        $FamilyID = $ADMIN->getFamilyID($FirstName, $MiddleName, $LastName, $Suffix);
        if ($FamilyID >= 0) {
            if ($ADMIN->registerFamilySession($FamilyID, $Venue, $DateOfSession) == TRUE) {
                echo 'Session Registered!';
                $Message = "Family ".$LastName." Session Venue:".$Venue." Date:".$DateOfSession." ";
                echo $Message;
                $ADMIN->UpdateFamilyLog($FamilyID, $Message);
            } else {
                echo 'Session Registry Failed';
            }
        }
        ?>
        <form action="../ADMIN_PAGES/Issue_Benefit/familysession.php" method="POST">
            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
            <input type="submit" value="RETURN TO CHECKUP FORM" />
        </form>
    </body>
</html>
