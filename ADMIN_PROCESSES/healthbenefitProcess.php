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
        if ($MemberID >= 0) {
            $FamilyID = $ADMIN->getFamilyID($FirstName, $MiddleName, $LastName, $Suffix);
            if ($FamilyID >= 0) {
                if ($ADMIN->IssueHealthBenefit($FamilyID) == TRUE) {
                    echo 'Issuance of Family Health Benefit Successful';
                    $Message = "Family Benefit Issued to '".$LastName."' Family worth 750 Pesos";
                    echo $Message;
                    $ADMIN->UpdateFamilyLog($FamilyID, $Message);
                } else {
                    echo 'Issuance of Family Health Benefit Failed';
                }
            } else {
                echo 'No Family Matched';
            }
        }
        ?>
        <form action="../ADMIN_PAGES/Issue_Benefit/healthbenefit.php" method="POST">
            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
            <input type="submit" value="RETURN TO CHECKUP FORM" />
        </form>
    </body>
</html>
