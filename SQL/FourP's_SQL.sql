Create database FourP;
use FourP;

Create table Family(
FamilyID int not null auto_increment,
FamilyName varchar(50) not null,
DateOfRegistry date  not null,
Region varchar(50) not null,
Municipality varchar(50) not null,
Province varchar(50) not null,
Barangay varchar(50) not null,
Street varchar(50) not null,
HouseNo varchar(50),
Subdivision varchar(50),
primary key (FamilyID)
);

Create table FamilyAccount(
FamilyAccountID int not null auto_increment,
Subsidy int not null default 750,
FamilyID int not null,
HealthBank int not null ,
HealthBenefitReceivedDate date,
Primary key (FamilyAccountID),
foreign key (FamilyID) references Family(FamilyID)
);

Create Table Members(
MemberID int not null auto_increment,
FamilyID int not null,
FirstName varchar(50) not null,
MiddleName varchar(50),
LastName varchar(50) not null,
Suffix varchar(10),
BirthDate date not null,
Gender boolean not null,
DateOfRegistry date,
Primary Key (MemberID),
foreign key (FamilyID) references Family(FamilyID)on delete cascade on update cascade
);

Create Table School(
SchoolID int not null auto_increment,
SchoolName varchar(150) not null,
Primary Key(SchoolID)
);

Create Table Hospital(
HospitalID int not null auto_increment,
HospitalName varchar(50) not null,
Primary Key (HospitalID)
);

Create Table Student(
StudentID int not null auto_increment,
MemberID int not null,
Primary Key (StudentID),
foreign key (MemberID) references Members(MemberID) on delete cascade on update cascade
);

Create Table EducationAccount(
EducationID int not null auto_increment ,
StudentID int not null,
EducationBank int not null,
EducationBenefitReceivedDate date,
Primary Key (EducationID),
foreign key (StudentID) references Student(StudentID) on delete cascade on update cascade
);

Create Table DayCareElem(
DayCareElemID int not null auto_increment,
Subsidy int not null default 300,
StudentID int not null,
SchoolID int not null,
Primary Key (DayCareElemID),
foreign key (StudentID) references Student(StudentID) on delete cascade on update cascade,
foreign key (SchoolID) references School(SchoolID)on delete cascade on update cascade
);

Create Table SHS(
SHSID int not null auto_increment,
Subsidy int not null default 700,
StudentID int not null,
SchoolID int not null,
Primary Key (SHSID),
foreign key (StudentID) references Student(StudentID) on delete cascade on update cascade,
foreign key (SchoolID) references School(SchoolID)on delete cascade on update cascade
);

Create Table JHS(
JHSID int not null auto_increment,
Subsidy int not null default 500,
StudentID int not null,
SchoolID int not null,
Primary Key (JHSID),
foreign key (StudentID) references Student(StudentID) on delete cascade on update cascade,
foreign key (SchoolID) references School(SchoolID)on delete cascade on update cascade
);

Create table Prenatal(
PrenatalID int not null auto_increment,
PrenatalDate date not null,
HospitalID int not null,
MemberID int not null,
DoctorFName varchar(50) not null,
DoctorMName varchar(50) ,
DoctorLName varchar(50) not null,
DoctorSuffix varchar(50),
primary key (PrenatalID),
foreign key (HospitalID) references Hospital(HospitalID)on delete cascade on update cascade,
foreign key (MemberID) references Members(MemberID)on delete cascade on update cascade
);

Create table Postnatal(
PostnatalID int not null auto_increment,
PostnatalDate date not null,
HospitalID int not null,
MemberID int not null,
DoctorFName varchar(50) not null,
DoctorMName varchar(50) ,
DoctorLName varchar(50) not null,
DoctorSuffix varchar(50),
primary key (PostnatalID),
foreign key (HospitalID) references Hospital(HospitalID)on delete cascade on update cascade,
foreign key (MemberID) references Members(MemberID)on delete cascade on update cascade
);

Create Table Pregnant(
PregnantID int not null auto_increment,
MemberID int not null,
PrenatalID int,
PostnatalID int,
primary key (PregnantID),
foreign key(MemberID) references Members(MemberID)on delete cascade on update cascade,
foreign key (PrenatalID) references Prenatal(PrenatalID)on delete cascade on update cascade,
foreign key (PostnatalID) references Postnatal(PostnatalID)on delete cascade on update cascade
);

Create table MemberAccount(
MemberAccountID int not null auto_increment,
MemberID int not null,
MemberUsername varchar(50) not null,
MemberPassword varchar(50) not null,
Primary Key (MemberAccountID),
foreign key(MemberID) references Members(MemberID)on delete cascade on update cascade
);

Create table AdminAccount(
AdminID int not null auto_increment,
AdminUsername varchar(50) not null,
AdminPassword varchar(50) not null,
AdminFName varchar(50) not null,
AdminMName varchar(50) ,
AdminLName varchar(50) not null,
AdminSuffix varchar(50),
Primary key (AdminID)
);

Create Table FamilySession(
FamilySessionID int not null auto_increment,
FamilyID int not null,
Venue varchar(50) not null,
DateOfSession date,
Primary Key (FamilySessionID),
Foreign Key (FamilyID) references Family(FamilyID)on delete cascade on update cascade
);

Create Table CheckupAndVaccine(
CheckupAndVaccineID int not null auto_increment,
MemberID int not null,
Venue varchar(50) not null,
DoctorFName varchar(50) not null,
DoctorMName varchar(50) ,
DoctorLName varchar(50) not null,
DoctorSuffix varchar(50),
VaccineType varchar(50),
CheckUpDiagnosis varchar(200) not null,
DateOfSession date,
Primary Key (CheckupAndVaccineID),
foreign key (MemberID) references Members(MemberID)on delete cascade on update cascade
);

Create Table Deworming(
DewormingID int not null auto_increment,
MemberID int not null,
Venue varchar(50) not null,
DoctorFName varchar(50) not null,
DoctorMName varchar(50) ,
DoctorLName varchar(50) not null,
DoctorSuffix varchar(50),
DewormingGenericName varchar(50) not null,
DateOfSession date,
Primary Key (DewormingID),
foreign key (MemberID) references Members(MemberID)on delete cascade on update cascade
);

Create Table Teacher(
TeacherID int not null auto_increment,
SchoolID int not null,
TeacherFname varchar(50) not null,
TeacherMname varchar(50) ,
TeacherLname varchar(50) not null,
TeacherSuffix varchar(50),
TeacherGender boolean not null,
TeacherBirthDate date not null,
TeacherUsername varchar(50),
TeacherPassword varchar(50),
Primary Key (TeacherID),
Foreign key (SchoolID) references School(SchoolID)
);

Create Table Sections(
SectionID int not null auto_increment,
SectionName varchar(50) not null,
SchoolID int not null,
StudentID int not null,
TeacherID int not null,
Primary key (SectionID),
foreign key (StudentID) references Student(StudentID) on delete cascade on update cascade,
foreign key (SchoolID) references School(SchoolID) on delete cascade on update cascade,
foreign key (TeacherID) references Teacher(TeacherID) on delete cascade on update cascade
);

Create table Year (
YearID int not null auto_increment,
Year_Name year(4) not null,
Primary Key (YearID)
);

Create table Month (
MonthID int not null auto_increment,
YearID int,
Month_name varchar(50) not null,
Primary key (MonthID),
Foreign key (YearID) references Year(YearID)
);

Create Table Attendance (
AttendanceID int not null auto_increment,
Present_Days int not null,
MonthID int not null,
StudentID int not null,
Primary key AttendanceID (AttendanceID),
Foreign Key (MonthID) references Month(MonthID),
Foreign Key (StudentID) references Student(StudentID)
);

Create table UpdateLog(
UpdateLogID int not null auto_increment,
MemberID int not null,
DateOfPublish date not null,
UpdateLogDetails varchar(150) not null,
Primary Key (UpdateLogID),
foreign key (MemberID) references Members(MemberID)on delete cascade on update cascade
);
