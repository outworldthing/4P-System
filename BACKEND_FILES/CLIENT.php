<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CLIENT {

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

    function ConfirmUsernamePassword($username, $password) {
        try {
            $command = "Select * from MemberAccount where MemberUsername ='" . $username . "' AND MemberPassword='" . $password . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result)>0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function returnMemberID($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $command = "Select MemberID from Members where "
                    . "FirstName ='" . $FirstName . "' AND MiddleName='" . $MiddleName . "' "
                    . "AND LastName='" . $LastName . "' AND Suffix='" . $Suffix . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result)>0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return -1;
    }

    function createClientAccount($MemberID, $username, $password) {
        try {
            $command = "Insert into MemberAccount(MemberID,MemberUsername,MemberPassword) "
                    . "VALUES('" . $MemberID . "','" . $username . "','" . $password . "')";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result)>0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }
    
    function checkUsernameExist($username){
        try {
            $command = "Select MemberUsername from MemberAccount where MemberUsername ='" . $username . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result)>0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function returnFamilyIDfromUserPass($username, $password) {
        try {
            $command = "Select Family.FamilyID from "
                    . "(Family inner join Member on Family.FamilyID=Member.FamilyID "
                    . "inner join MemberAccount on Member.MemberID=MemberAccount.MemberID) "
                    . "where MemberAccount.MemberUsername ='" . $username . "' AND MemberAccount.MemberPassword='" . $password . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result)>0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['MemberID'];
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return -1;
    }

    function getFamilyBasicInformation($FamilyID) {
        try {
            $command = "Select Member.MemberID,Family.FamilyID,Member.FirstName,Member.MiddleName,"
                    . "Member.LastName,Member.Suffix,Member.BirthDate,Member.Gender,"
                    . "Member.DateOfRegistry,Family.Region,Family.Municipality,Family.Province,"
                    . "Family.Barangay,Family.Street,Family.HouseNo,Family.Subdivision"
                    . " from (Family inner join Member on Family.FamilyID=Member.FamilyID) "
                    . "where Family.FamilyID='".$FamilyID."'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result)>0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo 'No Results Found';
        }
        return FALSE;
    }

}
