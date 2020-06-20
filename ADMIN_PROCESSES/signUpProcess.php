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
        $username = htmlspecialchars($_REQUEST['Username']);
        $password = htmlspecialchars($_REQUEST['Password']);
        $FirstName = htmlspecialchars($_REQUEST['FirstName']);
        $MiddleName = htmlspecialchars($_REQUEST['MiddleName']);
        $LastName = htmlspecialchars($_REQUEST['LastName']);
        $Suffix = htmlspecialchars($_REQUEST['Suffix']);

        include '../BACKEND_FILES/ADMIN.php';
        $ADMIN = new ADMIN();
        if ($ADMIN->checkUsernameExist($username) == FALSE) {
            if ($ADMIN->checkAdminCredentialsExist($FirstName, $MiddleName, $LastName, $Suffix) == FALSE) {
                if ($ADMIN->enrollAdminAccount($username, $password, $FirstName, $MiddleName, $LastName, $Suffix) == TRUE) {
                    echo 'Enrolled Successfully! Proceed to Log in.';
                    ?>
                    <form action='../ADMIN_PAGES/logIn/logIn.php' method='POST'>
                        <input type="submit" value="GO TO LOG IN PAGE" />
                    </form>
                    <?php
                }
            } else {
                echo 'Person already has an account! Go to log in page';
                ?>
                <form action='../ADMIN_PAGES/logIn/logIn.php' method='POST'>
                    <input type="submit" value="GO TO LOG IN PAGE" />
                </form>
                <?php
            }
        } else {
            echo 'Username has been taken, try again <br>';
            ?>
            <form action='../ADMIN_PAGES/signUp/signUp.php' method='POST'>
                <input type="submit" value="GO BACK TO SIGN UP FORMS" />
            </form>
            <?php
        }
        ?>
    </body>
</html>
