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
        $FName = htmlspecialchars($_REQUEST['signupFirstName']);
        $MName = htmlspecialchars($_REQUEST['signupMiddleName']);
        $LName = htmlspecialchars($_REQUEST['signupLastName']);
        $Suffix = htmlspecialchars($_REQUEST['signupSuffix']);
        $username = htmlspecialchars($_REQUEST['signupUsername']);
        $password = htmlspecialchars($_REQUEST['signupPassword']);

        include '../BACKEND_FILES/CLIENT.php';
        $CLIENT = new CLIENT();

        $MemberID = $CLIENT->returnAccountMemberIDCred($FName, $MName, $LName, $Suffix);
        if ($MemberID > 0) {
            if ($CLIENT->accountExists($FName, $MName, $LName, $Suffix) == FALSE) {
                if ($CLIENT->checkUsernameExist($username) == FALSE) {
                    if ($CLIENT->createClientAccount($MemberID, $username, $password) == TRUE) {
                        echo '<center>Client Account Succesfully Created! Proceed to Log in';
                        echo ("You will be redirected in 3 seconds</center>");
                        ?>
                        <script>
                            setTimeout(function () {
                                window.location.href = "../CLIENT_PAGES/clientLogin.php";
                            }, 3000);
                        </script><?php
                    }
                } else {
                    echo '<center>Username is already taken, try another Username</center>';
                    echo ("<center>You will be redirected in 3 seconds</center>");
                    ?>
                    <script>
                        setTimeout(function () {
                            window.location.href = "../CLIENT_PAGES/clientSignup.php";
                        }, 3000);
                    </script><?php
                }
            } else {
                echo '<center>Person already has an account</center>';
                echo ("<center>You will be redirected in 3 seconds</center>");
                ?>
                <script>
                    setTimeout(function () {
                        window.location.href = "../CLIENT_PAGES/clientSignup.php";
                    }, 3000);
                </script><?php
            }
        } else {
            echo '<center>Person is not yet enrolled in the system, enroll at Admin Page</center>';
            echo ("<center>You will be redirected in 3 seconds</center>");
            ?>
            <script>
                setTimeout(function () {
                    window.location.href = "../CLIENT_PAGES/clientSignup.php";
                }, 3000);
            </script><?php
        }
        ?>
    </body>
</html>
