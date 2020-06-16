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
        $MemberID = htmlspecialchars($_REQUEST['MemberID']);
        $cash_in = htmlspecialchars($_REQUEST['educationcashinbalance']);
        $balance = htmlspecialchars($_REQUEST['educationtotalbalance']);

        include '../BACKEND_FILES/CLIENT.php';
        $CLIENT = new CLIENT();
        include '../BACKEND_FILES/ADMIN.php';
        $ADMIN = new ADMIN();

        $StudentID = 0;
        if ($CLIENT->checkStudentStatus($MemberID) == TRUE) {
            $StudentID = $ADMIN->getStudentID($MemberID);
            if ($CLIENT->deductEducationBalance($StudentID, $cash_in) == TRUE) {
                echo 'DEDUCTION SUCESSFUL';
                $Message = "Student deducted '".$cash_in."' Pesos from his/her Student Account ";
                echo $Message;
                $ADMIN->UpdateLog($MemberID, $Message);
            } else {
                echo 'DEDUCTION FAILED';
            }
        }
        ?>
        <form action="../CLIENT_PAGES/clientEducationBalance.php">
            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
            <input type="hidden" name="MemberID" value="<?php echo $MemberID; ?>" />
            <input type="text" name="GO BACK TO EDUCATION BANK CASH IN" value="" />
        </form>
    </body>
</html>
