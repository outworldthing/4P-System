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
        $FamilyID = htmlspecialchars($_REQUEST['FamilyID']);
        $cash_in = htmlspecialchars($_REQUEST['healthtcashinbalance']);
        $balance = htmlspecialchars($_REQUEST['healthtotalbalance']);

        include '../BACKEND_FILES/CLIENT.php';
        $CLIENT = new CLIENT();
        include '../BACKEND_FILES/ADMIN.php';
        $ADMIN = new ADMIN();

        if ($FamilyID >= 0) {
            if ($CLIENT->deductHealthBalance($FamilyID, $cash_in) == TRUE) {
                echo 'DEDUCTION SUCCESSFUL';
                $Message = "Family Deducted '".$cash_in."' Pesos from their Family Account ";
                echo $Message;
                $ADMIN->UpdateFamilyLog($FamilyID, $Message);
            } else {
                echo 'DEDUCTION FAILED';
            }
        } else {
            echo 'Family ID does not match to any references';
        }
        ?>
        <form action="../CLIENT_PAGES/clientHealthBalance.php">
            <input type="hidden" name="loginUsername" value="<?php echo $username; ?>" />
            <input type="hidden" name="loginPassword" value="<?php echo $password; ?>" />
            <input type="hidden" name="MemberID" value="<?php echo $MemberID; ?>" />
            <input type="text" name="GO BACK TO HEALTH BANK CASH IN" value="" />
        </form>
    </body>
</html>
