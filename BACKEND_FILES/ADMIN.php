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

    function checkUsernameExist($username) {
        try {
            $command = "Select AdminUsername from AdminAccount where AdminUsername ='" . $username . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function checkAdminCredentialsExist($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $command = "Select * from AdminAccount where AdminFName='" . $FirstName . "' "
                    . "AND AdminMName='" . $MiddleName . "' AND AdminLName='" . $LastName . "' "
                    . "AND AdminSuffix='" . $Suffix . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function enrollAdminAccount($username, $password, $fname, $mname, $lname, $suffix) {
        try {
            $command = "Insert Into AdminAccount(AdminUsername,AdminPassword,AdminFName,AdminMName,AdminLName,AdminSuffix)"
                    . " VALUES('" . $username . "','" . $password . "','" . $fname . "','" . $mname . "','" . $lname . "','" . $suffix . "')";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function enrollFamily($LastName, $Region, $Municipality, $Province, $Barangay, $Street, $HouseNo, $Subdivision) {
        try {
            $command = "Insert Into Family(FamilyName,DateOfRegistry,Region,Municipality,Province,Barangay,Street,HouseNo,Subdivision)"
                    . " VALUES('" . $LastName . "',curdate(),'" . $Region . "','" . $Municipality . "','" . $Province . "','" . $Barangay . "','" . $Street . "','" . $HouseNo . "','" . $Subdivision . "')";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                $command = "Select MAX(FamilyID) as familyid from Family";
                $result = mysqli_query($this->conn, $command);
                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        return $rows['familyid'];
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'Insert Family Failed';
        return -1;
    }

    function enrollMembers($FamilyID, $FirstName, $MiddleName, $LastName, $Suffix, $BirthDate, $Gender) {
        try {
            $command = "Insert Into Members(FamilyID,FirstName,MiddleName,LastName,Suffix,BirthDate,Gender,DateOfRegistry) "
                    . "VALUES('" . $FamilyID . "','" . $FirstName . "','" . $MiddleName . "','" . $LastName . "','" . $Suffix . "','" . $BirthDate . "','" . $Gender . "',curdate())";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function enrollFamilyAccount($FamilyID) {
        try {
            $command = "Insert Into FamilyAccount(HealthBank,FamilyID) "
                    . "VALUES(0,'" . $FamilyID . "')";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                echo 'FAMILY BANK ACCOUNT CREATED';
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'FAMILY BANK ACCOUNT NOT ENROLLED! ERROR ';
    }

    function checkPersonExists($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $command = "Select * from Members where FirstName='" . $FirstName . "' "
                    . "AND MiddleName='" . $MiddleName . "' AND LastName='" . $LastName . "' "
                    . "AND Suffix='" . $Suffix . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['MemberID'];
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'Person is not enrolled in the database';
        return -1;
    }

    function enrollPregnant($MemberID) {
        try {
            $command = "Insert Pregnant(MemberID) VALUES('" . $MemberID . "')";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                echo 'Pregnant Member Successfully Enrolled';
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'Failed to Register Pregnant Member';
        return FALSE;
    }

    function enrollStudent($MemberID) {
        try {
            $command = "Insert Student(MemberID) VALUES('" . $MemberID . "')";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'Failed to Register Student';
        return FALSE;
    }

    function getStudentID($MemberID) {
        try {
            $command = "Select StudentID from Student where MemberID='" . $MemberID . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['StudentID'];
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return -1;
    }

    function getSchoolID($School) {
        try {
            $command = "Select SchoolID from School where SchoolName='" . $School . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['SchoolID'];
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $this->enrollSchool($School);
        return $this->getSchoolID($School);
    }

    function getTeacherID($TeacherFirstName, $TeacherMiddleName, $TeacherLastName, $TeacherSuffix) {
        try {
            $command = "Select TeacherID from Teacher where "
                    . "TeacherFirstName='" . $TeacherFirstName . "' "
                    . "AND TeacherMiddleName='" . $TeacherMiddleName . "' "
                    . "AND TeacherLastName='" . $TeacherLastName . "' "
                    . "AND TeacherSuffix='" . $TeacherSuffix . "' ";
            $result = mysqli_query($this->comm, $command);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['TeacherID'];
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return -1;
    }

    function enrollSection($SchoolID, $TeacherID, $StudentID, $SectionName) {
        try {
            $command = "Insert Section(SectionName,SchoolID,TeacherID,StudentID) "
                    . "VALUES('" . $SectionName . "','" . $SchoolID . "','" . $TeacherID . "','" . $StudentID . "')";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function enrollEducationAccount($StudentID) {
        try {
            $command = "Insert Into EducationAccount(StudentID,EducationBank) "
                    . "VALUES('" . $StudentID . "',0)";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                echo 'EDUCATION ACCOUNT FOR STUDENT ESTABLISHED';
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'EDUCATION ACCOUNT NOT ESTABLISHED, CHECK FOR ADMIN';
        return FALSE;
    }

    function enrollDayCareElem($SchoolID, $StudentID) {
        try {
            $command = "Insert into DayCareElem(SchoolID,StudentID) "
                    . "VALUES('" . $SchoolID . "','" . $StudentID . "')";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'DayCareElem values not enrolled';
        return FALSE;
    }

    function enrollJHS($SchoolID, $StudentID) {
        try {
            $command = "Insert into JHS(SchoolID,StudentID) "
                    . "VALUES('" . $SchoolID . "','" . $StudentID . "')";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'JHS values not enrolled';
        return FALSE;
    }

    function enrollSHS($SchoolID, $StudentID) {
        try {
            $command = "Insert into SHS(SchoolID,StudentID) "
                    . "VALUES('" . $SchoolID . "','" . $StudentID . "')";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'SHS values not enrolled';
        return FALSE;
    }

    function enrollSchool($SchoolName) {
        try {
            $command = "Insert into School(SchoolName) "
                    . "VALUES('" . $SchoolName . "')";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                echo 'SCHOOL ESTABLISHED';
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'SCHOOL FAILED TO ESTABLISH';
        return FALSE;
    }

    function enrollTeacher($SchoolID, $FirstName, $MiddleName, $LastName, $Suffix, $BirthDate, $Gender) {
        try {
            $command = "Insert into Teacher(SchoolID,TeacherFName,TeacherMName,TeacherLName,TeacherSuffix,TeacherGender,TeacherBirthDate) "
                    . "VALUES('" . $SchoolID . "', '" . $FirstName . "', '" . $MiddleName . "', '" . $LastName . "', '" . $Suffix . "', '" . $BirthDate . "', '" . $Gender . "')";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function getPersonalInformation($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $commands = "Select * from Members where FirstName='" . $FirstName . "' "
                    . "AND MiddleName='" . $MiddleName . "' "
                    . "AND LastName='" . $LastName . "' "
                    . "AND Suffix='" . $Suffix . "' ";
            $result = mysqli_query($this->conn, $commands);
            if (mysqli_num_fields($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $result;
    }

    function UpdateInformation($FirstName, $MiddleName, $LastName, $Suffix, $FamilyID, $MemberID) {
        try {
            $commands = "Update Members SET FirstName='" . $FirstName . "'"
                    . ", MiddleName='" . $MiddleName . "'"
                    . ", LastName='" . $LastName . "'"
                    . ", Suffix='" . $Suffix . "'"
                    . "where FamilyID='" . $FamilyID . "' AND MemberID='" . $MemberID . "'";
            $result = mysqli_query($this->conn, $commands);
            if ($result == TRUE) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function getFamilyCredentials($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $command = "Select Members.FirstName,Members.MiddleName,Members.LastName,Members.Suffix,"
                    . "Members.Gender,Members.BirthDate,Members.DateOfRegistry,Family.Region,"
                    . "Family.Municipality,Family.Province,Family.Barangay,Family.Street,"
                    . "Family.HouseNo,Family.Subdivision "
                    . "from (Family inner join Members on Family.FamilyID=Members.FamilyID) "
                    . "where Family.FamilyID="
                    . "(Select Family.FamilyID from "
                    . "(Family inner join Members on Family.FamilyID=Members.FamilyID) "
                    . "where Members.FirstName='" . $FirstName . "' AND Members.MiddleName='" . $MiddleName . "' "
                    . "AND Members.LastName='" . $LastName . "' AND Members.Suffix='" . $Suffix . "') ";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $result;
    }

    function getFamilyLogs($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $command = "Select UpdateLog.UpdateLogID,UpdateLog.DateOfPublish,UpdateLog.UpdateLogDetails "
                    . "from (Family inner join Members on Family.FamilyID=Members.FamilyID "
                    . "inner join UpdateLog on Members.MemberID=UpdateLog.MemberID)"
                    . "where Family.FamilyID="
                    . "(Select Family.FamilyID from "
                    . "(Family inner join Members on Family.FamilyID=Members.FamilyID) "
                    . "where Members.FirstName='" . $FirstName . "' AND Members.MiddleName='" . $MiddleName . "' "
                    . "AND Members.LastName='" . $LastName . "' AND Members.Suffix='" . $Suffix . "') ORDER BY UpdateLog.DateOfPublish DESC ";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $result;
    }

    function confirmPregnant($PatientFirstName, $PatientMiddleName, $PatientLastName, $PatientSuffix) {
        try {
            $command = "Select Members.MemberID from (Pregnant inner join Members on Pregnant.MemberID=Members.MemberID) "
                    . "where Members.FirstName='" . $PatientFirstName . "' AND Members.MiddleName='" . $PatientMiddleName . "' "
                    . "AND Members.LastName='" . $PatientLastName . "' AND Members.Suffix='" . $PatientSuffix . "' ";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['MemberID'];
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return -1;
    }

    function registerHospital($Hospital) {
        try {
            $command = "Insert Into Hospital(HospitalName) VALUES('" . $Hospital . "') ";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                echo 'Hospital has been registered successfully!';
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'Registry of Hospital Failed';
        return FALSE;
    }

    function checkHospital($Hospital) {
        try {
            $command = "Select HospitalID from Hospital where HospitalName='" . $Hospital . "' ";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['HospitalID'];
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        $this->registerHospital($Hospital);
        return $this->checkHospital($Hospital);
    }

    function registerPrenatalCheckup($DateOfCheckup, $HospitalID, $MemberID, $DoctorFirstName, $DoctorMiddleName, $DoctorLastName, $DoctorSuffix) {
        try {
            $command = "Insert Into Prenatal(PrenatalDate,HospitalID,MemberID,DoctorFName,DoctorMName,DoctorLName,DoctorSuffix) "
                    . "VALUES('" . $DateOfCheckup . "','" . $HospitalID . "','" . $MemberID . "','" . $DoctorFirstName . "','" . $DoctorMiddleName . "','" . $DoctorLastName . "','" . $DoctorSuffix . "') ";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                echo 'Check-Up registered';
                $command = "Select PrenatalID from Prenatal where MemberID='" . $MemberID . "' ";
                $result = mysqli_query($this->conn, $command);
                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        return $rows['PrenatalID'];
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'Insert values failed';
        return -1;
    }

    function UpdatePrenatalStatus($MemberID, $PrenatalID) {
        try {
            $command = "Update Pregnant SET PrenatalID='" . $PrenatalID . "' "
                    . "where MemberID='" . $MemberID . "' ";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                echo 'Update Complete';
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function registerPostNatalCheckup($DateOfCheckup, $HospitalID, $MemberID, $DoctorFirstName, $DoctorMiddleName, $DoctorLastName, $DoctorSuffix) {
        try {
            $command = "Insert Into PostNatal(PostnatalDate,HospitalID,MemberID,DoctorFName,DoctorMName,DoctorLName,DoctorSuffix) "
                    . "VALUES('" . $DateOfCheckup . "','" . $HospitalID . "','" . $MemberID . "','" . $DoctorFirstName . "','" . $DoctorMiddleName . "','" . $DoctorLastName . "','" . $DoctorSuffix . "') ";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                echo 'Check-Up registered';
                $command = "Select PostNatalID from Postnatal where MemberID='" . $MemberID . "' ";
                $result = mysqli_query($this->conn, $command);
                if (mysqli_num_rows($result) > 0) {
                    while ($rows = mysqli_fetch_assoc($result)) {
                        return $rows['PostNatalID'];
                    }
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'Insert values failed';
        return -1;
    }

    function UpdatePostnatalStatus($MemberID, $PostnatalID) {
        try {
            $command = "Update Pregnant SET PostnatalID='" . $PostnatalID . "' "
                    . "where MemberID='" . $MemberID . "' ";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                echo 'Update Complete';
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function registerCheckup_Vaccoine($MemberID, $DoctorFirstName, $DoctorMiddleName, $DoctorLastName, $DoctorSuffix, $Venue, $Vaccine, $Diagnosis, $DateOfCheckup) {
        try {
            $command = "Insert Into CheckupAndVaccine("
                    . "MemberID,Venue,DoctorFName,DoctorMName,DoctorLName,DoctorSuffix,"
                    . "VaccineType,CheckUpDiagnosis,DateOfSession) "
                    . "VALUES('" . $MemberID . "','" . $Venue . "','" . $DoctorFirstName . "',"
                    . "'" . $DoctorMiddleName . "','" . $DoctorLastName . "','" . $DoctorSuffix . "',"
                    . "'" . $Vaccine . "','" . $Diagnosis . "','" . $DateOfCheckup . "') ";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                echo 'CHECK-UP/VACCINE ISSUED';
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function registerDeworming($MemberID, $DoctorFirstName, $DoctorMiddleName, $DoctorLastName, $DoctorSuffix, $Venue, $DrugName, $DateOfCheckup) {
        try {
            $command = "Insert Into Deworming(MemberID,Venue,DoctorFName,DoctorMName,DoctorLName,"
                    . "DoctorSuffix,DewormingGenericName,DateOfSession) VALUES("
                    . "'" . $MemberID . "','" . $Venue . "','" . $DoctorFirstName . "','" . $DoctorMiddleName . "',"
                    . "'" . $DoctorLastName . "','" . $DoctorSuffix . "','" . $DrugName . "','" . $DateOfCheckup . "')";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                echo 'DEWORMING ISSUED';
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function getFamilyID($FirstName, $MiddleName, $LastName, $Suffix) {
        try {
            $command = "Select FamilyID from Members where "
                    . "FirstName='" . $FirstName . "' AND MiddleName='" . $MiddleName . "' "
                    . "AND LastName='" . $LastName . "' AND Suffix='" . $Suffix . "' ";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    return $rows['FamilyID'];
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'No Family';
        return -1;
    }

    function registerFamilySession($FamilyID, $Venue, $DateOfSession) {
        try {
            $command = "Insert Into FamilySession(FamilyID,Venue,DateOfSession) "
                    . "VALUES('" . $FamilyID . "','" . $Venue . "','" . $DateOfSession . "')";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function checkDayCareElem($StudentID) {
        try {
            $command = "Select Student.StudentID from (Student inner join DayCareElem on "
                    . "Student.StudentID=DayCareElem.StudentID) where Student.StudentID='" . $StudentID . "' ";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function checkJHS($StudentID) {
        try {
            $command = "Select Student.StudentID from (JHS inner join Student on JHS.StudentID=Student.StudentID) "
                    . "where Student.StudentID='" . $StudentID . "' ";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function checkSHS($StudentID) {
        try {
            $command = "Select Student.StudentID from (SHS inner join Student on SHS.StudentID=Student.StudentID) "
                    . "where Student.StudentID='" . $StudentID . "' ";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function IssueEducationBenefit($StudentID) {
        try {
            if ($this->checkDayCareElem($StudentID) == TRUE) {
                $command = "Update EducationAccount SET "
                        . "EducationBank="
                        . "((Select EducationBank from EducationAccount where StudentID='" . $StudentID . "')+"
                        . "(Select Subsidy from DayCareElem)), EducationBenefitReceivedDate=curdate() "
                        . "where StudentID='" . $StudentID . "' ";
                $result = mysqli_query($this->conn, $command);
                if ($result == TRUE) {
                    return TRUE;
                }
            } else if ($this->checkJHS($StudentID) == TRUE) {
                $command = "Update EducationAccount SET "
                        . "EducationBank="
                        . "((Select EducationBank from EducationAccount where StudentID='" . $StudentID . "')+"
                        . "(Select Subsidy from JHS)), EducationBenefitReceivedDate=curdate() "
                        . "where StudentID='" . $StudentID . "' ";
                $result = mysqli_query($this->conn, $command);
                if ($result == TRUE) {
                    return TRUE;
                }
            } else if ($this->checkSHS($StudentID) == TRUE) {
                $command = "Update EducationAccount SET "
                        . "EducationBank="
                        . "((Select EducationBank from EducationAccount where StudentID='" . $StudentID . "')+"
                        . "(Select Subsidy from SHS)), EducationBenefitReceivedDate=curdate() "
                        . "where StudentID='" . $StudentID . "' ";
                $result = mysqli_query($this->conn, $command);
                if ($result == TRUE) {
                    return TRUE;
                }
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function IssueHealthBenefit($FamilyID) {
        try {
            $command = "Update FamilyAccount SET "
                    . "HealthBank=((Select HealthBank from FamilyAccount where FamilyID='" . $FamilyID . "')+"
                    . "(Select Subsidy from FamilyAccount)), HealthBenefitReceivedDate=curdate() "
                    . "where FamilyID='" . $FamilyID . "' ";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return FALSE;
    }

    function UpdateLog($MemberID, $Message) {
        try {
            $command = "Insert Into UpdateLog(MemberID,DateOfPublish,UpdateLogDetails) "
                    . "VALUES('" . $MemberID . "',curdate(),'" . $Message . "')";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                echo 'Log Updated';
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'Log Update Failed';
        return FALSE;
    }

    function UpdateFamilyLog($FamilyID, $Message) {
        try {
            $command = "Select MemberID from Members where FamilyID='" . $FamilyID . "'";
            $result = mysqli_query($this->conn, $command);
            if (mysqli_num_rows($result) > 0) {
                while ($rows = mysqli_fetch_assoc($result)) {
                    $command = "Insert Into UpdateLog(MemberID,DateOfPublish,UpdateLogDetails) "
                            . "VALUES('" . $rows['MemberID'] . "',curdate(),'" . $Message . "')";
                    $result = mysqli_query($this->conn, $command);
                    if ($result == TRUE) {
                        echo 'Log Updated';
                    }
                }
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'Log Update Failed';
        return FALSE;
    }

    function DeleteStudentsOver18() {
        try {
            $command = "Delete From (Student inner join Members on Student.MemberID=Members.MemberID)"
                    . " Where FLOOR(DATEDIFF(Members.BirthDate,curdate())/365)>18";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                echo 'Delete Students Over 18 Success';
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'Delete Students Over 18 Failed';
        return FALSE;
    }

    function DeleteFamilyOver7years() {
        try {
            $command = "Delete From Family where FLOOR(DATEDIFF(DateOfRegistry,curdate())/365)>7";
            $result = mysqli_query($this->conn, $command);
            if ($result == TRUE) {
                echo 'Delete Unqualified Families Complete';
                return TRUE;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'Delete Unqualified Families Failed';
        return FALSE;
    }

}
