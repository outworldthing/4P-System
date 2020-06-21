<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TEACHER {

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

    function checkTeacherExists($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $commands = "Select * from Teacher where TeacherFname='" . $FirstName . "' "
                    . "AND TeacherMname='" . $MiddleName . "' AND TeacherLname='" . $LastName . "' "
                    . "AND TeacherSuffix='" . $Suffix . "'";
            $result = mysqli_query($this->conn, $commands);
            if (mysqli_num_rows($result) > 0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo "Error in checking, refer to Admin";
        }
        RETURN FALSE;
    }

    function checkUsernameExists($username) {
        try {
            $commands = "Select TeacherUsername from Teacher where TeacherUsername='" . $username . "'";
            $result = mysqli_query($this->conn, $commands);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    if ($rows['TeacherUsername'] == $username) {
                        echo $rows['TeacherUsername'];
                        return TRUE;
                    } else if ($rows['TeacherUsername'] == null) {
                        echo "No Matches";
                        return FALSE;
                    }
                }
            }
        } catch (Exception $exc) {
            echo "No Usernames Found";
        }
        echo "No Usernames Found, clear for sign-up <br>";
        return FALSE;
    }

    function confirmTeacherAccount($username, $password) {
        try {
            $command = "Select * from Teacher where TeacherUsername ='" . $username . "' AND TeacherPassword='" . $password . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo 'No User Found';
        }
        return FALSE;
    }

    function SignUpTeacherAccount($TeacherID, $username, $password) {
        try {
            $command ="Update Teacher SET TeacherUsername='".$username."' , TeacherPassword='".$password."' "
                    . "where TeacherID='" . $TeacherID . "' ";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo "Failed in inserting values to database";
        }
        echo "Failed in inserting values to database";
        return FALSE;
    }

    function checkStudentExists($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $command = "Select MemberID from (Members inner join Student on Members.MemberID"
                    . "=Student.MemberID) where "
                    . "FirstName ='" . $FirstName . "' AND MiddleName='" . $MiddleName . "' "
                    . "AND LastName='" . $LastName . "' AND Suffix='" . $Suffix . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo "No Matches Found";
        }
        return FALSE;
    }

    function getStudentID($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $command = "Select Student.StudentID from (Members inner join Student on Members.MemberID"
                    . "=Student.MemberID) where "
                    . "Members.FirstName ='" . $FirstName . "' AND Members.MiddleName='" . $MiddleName . "' "
                    . "AND Members.LastName='" . $LastName . "' AND Members.Suffix='" . $Suffix . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['StudentID'];
                }
            }
        } catch (Exception $exc) {
            echo "No Matches Found";
        }
        echo "No Matches Found";
        return -1;
    }

    function EnterNumberOfAbsences($StudentID, $Absences, $TotalNumberOfDays) {
        try {
            $command = "Insert into Attendance(StudentID,TotalNumberOfSchoolDays,TotalNumberOfAbsents) "
                    . "Values('" . $StudentID . "','" . $TotalNumberOfDays . "','" . $Absences . "')";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo "Failed to insert to Database, refer to Admin";
        }
        return FALSE;
    }

    function getTeacherIDCredentials($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $commands = "Select TeacherID from Teacher where TeacherFname='" . $FirstName . "' "
                    . "AND TeacherMname='" . $MiddleName . "' AND TeacherLname='" . $LastName . "' "
                    . "AND TeacherSuffix='" . $Suffix . "'";
            $result = mysqli_query($this->conn, $commands);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['TeacherID'];
                }
            }
        } catch (Exception $exc) {
            echo "Error in checking, refer to Admin";
        }
        RETURN -1;
    }

    function getTeacherIDUserPass($username, $password) {
        try {
            $commands = "Select TeacherID from Teacher where TeacherUsername= '" . $username . "' "
                    . "AND TeacherPassword='" . $password . "'";
            $result = mysqli_query($this->conn, $commands);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['TeacherID'];
                }
            }
        } catch (Exception $exc) {
            echo "Error in checking, refer to Admin";
        }
        RETURN -1;
    }

    function getSections($TeacherID) {
        try {
            $command = "Select distinct SectionName from Sections where TeacherID='" . $TeacherID . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo "No Sections Found";
        }
        return $result;
    }

    function getStudentsPerSection($TeacherID, $SectionName) {
        try {
            $command = "Select Members.FirstName,Members.Middlename,Members.LastName.Members.Suffix,"
                    . "Attendance.TotalNumberOfSchoolDays,Attendance.TotalNumberOfAbsents"
                    . " from(Members inner join Student on Members.MemberID=Student.MemberID inner join Attendance"
                    . " on Attendance.StudentID=Student.StudentID "
                    . "inner join Sections on Student.StudentID=Sections.StudentID) where "
                    . "Sections.TeacherID='" . $TeacherID . "' AND Sections.SectionName='" . $SectionName . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo "No Students Found";
        }
        return $result;
    }

}
