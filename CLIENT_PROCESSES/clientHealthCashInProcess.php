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
        $cash_in= htmlspecialchars($_REQUEST['healthtotalbalance']);
        $balance= htmlspecialchars($_REQUEST['healthtcashinbalance']);
        ?>
        <form action="../CLIENT_PAGES/clientHealthBalance.php">
            <input type="hidden" name="loginUsername" value="<?php echo $username;?>" />
            <input type="hidden" name="loginPassword" value="<?php echo $password;?>" />
            <input type="hidden" name="MemberID" value="<?php echo $MemberID;?>" />
            <input type="text" name="GO BACK TO HEALTH BANK CASH IN" value="" />
        </form>
    </body>
</html>
