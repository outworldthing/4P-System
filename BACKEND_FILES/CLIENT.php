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
            if (mysqli_num_rows($result) > 0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo 'No User Found';
        }
        return FALSE;
    }

    function returnMemberID($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $command = "Select MemberID from Members where "
                    . "FirstName ='" . $FirstName . "' AND MiddleName='" . $MiddleName . "' "
                    . "AND LastName='" . $LastName . "' AND Suffix='" . $Suffix . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['MemberID'];
                }
            }
        } catch (Exception $exc) {
            echo "No Matches Found";
        }
        return -1;
    }

    function returnAccountMemberID($username, $password) {
        try {
            $command = "Select MemberID from MemberAccount "
                    . "where MemberUsername = '" . $username . "' AND MemberPassword = '" . $password . "' ";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['MemberID'];
                }
            }
        } catch (Exception $exc) {
            echo "No Matches Found";
        }
        return -1;
    }

    function createClientAccount($MemberID, $username, $password) {
        try {
            $command = "Insert into MemberAccount(MemberID,MemberUsername,MemberPassword) "
                    . "VALUES('" . $MemberID . "','" . $username . "','" . $password . "')";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo "Unable to Insert Data";
        }
        return FALSE;
    }

    function checkUsernameExist($username) {
        try {
            $command = "Select MemberUsername from MemberAccount where MemberUsername ='" . $username . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo "No Matches Found";
        }
        return FALSE;
    }

    function returnFamilyIDfromUserPass($username, $password) {
        try {
            $command = "Select Family.FamilyID from "
                    . "(Family inner join Members on Family.FamilyID=Members.FamilyID "
                    . "inner join MemberAccount on Members.MemberID=MemberAccount.MemberID) "
                    . "where MemberAccount.MemberUsername ='" . $username . "' AND MemberAccount.MemberPassword='" . $password . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['FamilyID'];
                }
            }
        } catch (Exception $exc) {
            echo "No Matches Found";
        }
        return -1;
    }

    function getFamilyBasicInformation($FamilyID) {
        try {
            $command = "Select Members.MemberID,Family.FamilyID,Members.FirstName,Members.MiddleName,"
                    . "Members.LastName,Members.Suffix,Members.BirthDate,Members.Gender,"
                    . "Members.DateOfRegistry,Family.Region,Family.Municipality,Family.Province,"
                    . "Family.Barangay,Family.Street,Family.HouseNo,Family.Subdivision "
                    . "from (Family inner join Members on Family.FamilyID=Members.FamilyID) "
                    . "where Family.FamilyID='" . $FamilyID . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo 'No Results Found';
        }
        return $result;
    }

    function FamilySessionList($MemberID) {
        try {
            $command = "Select Venue,DateOfSession from (FamilySession inner join Family on Family.FamilyID=FamilySession.FamilyID "
                    . "inner join Members on Family.FamilyID=Members.FamilyID) where Members.MemberID='" . $MemberID . "' ORDER BY DateOfSession ASC";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo "No Family Sessions Found";
        }
        return $result;
    }

    function HistoryLogList($MemberID) {
        try {
            $command = "Select UpdateLogDetails,DateOfPublish from UpdateLog where MemberID='" . $MemberID . "' ORDER BY DateOfPublish ASC";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo "No Family Sessions Found";
        }
        return $result;
    }

    function checkStudentStatus($MemberID) {
        try {
            $command = "Select * from Student where MemberID ='" . $MemberID . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo "No Matches Found";
        }
        return FALSE;
    }

}
