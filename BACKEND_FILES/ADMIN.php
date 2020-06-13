<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ADMIN {

    public $servername = "";
    public $username = "";
    public $password = "";
    public $database = "";
    public $conn = "";

    function __construct() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "rootPass123";
        $this->database = "FourP";

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    
    function ConfirmAdminUsernamePassword($username, $password) {
        try {
            $command = "Select * from AdminAccount where AdminUsername ='" . $username . "' AND AdminPassword='" . $password . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result)) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }
    
    function checkUsernameExist($username){
        try {
            $command = "Select AdminUsername from AdminAccount where AdminUsername ='" . $username . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result)>0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }
    
    function createClientAccount($username, $password,$fname,$mname,$lname,$suffix) {
        try {
            $command = "Insert into AdminAccount(AdminUsername,AdminPassword,AdminFName,AdminMName"
                    . "AdminLName,AdminSuffix) "
                    . "VALUES($username,$password,$fname,$mname,$lname,$suffix)";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result)) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

}
