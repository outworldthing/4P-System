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
            $StudentID = $ADMIN->getStudentID($MemberID);
            if ($StudentID >= 0) {
                if ($ADMIN->IssueEducationBenefit($StudentID) == TRUE) {
                    echo 'Issuance of Education Benefit Successful <br>';
                    $Message = "Education Benefit Issued to:".$FirstName." ".$MiddleName." ".$LastName." ".$Suffix." ";
                    echo $Message;
                    $ADMIN->UpdateLog($MemberID, $Message);
                } else {
                    echo 'Issuance of Education Benefit Failed <br>';
                }
            } else {
                echo 'No Student Record Found <br>';
            }
        }
        ?>
        <form action="../ADMIN_PAGES/Issue_Benefit/educationbenefit.php" method="POST">
            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
            <input type="submit" value="RETURN TO CHECKUP FORM" />
        </form>
    </body>
</html>
