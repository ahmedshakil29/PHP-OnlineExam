-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 07:25 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseID` int(11) NOT NULL,
  `CourseCode` varchar(50) NOT NULL,
  `CourseName` varchar(100) NOT NULL,
  `DepartmentID` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`CourseID`, `CourseCode`, `CourseName`, `DepartmentID`, `Status`) VALUES
(1, 'CSE-0204', 'Digital Electronics Lab', 1, 1),
(2, 'CSE-0406', 'Computer Peripheral & Interfacing Lab', 1, 1),
(3, 'CSE-0407', 'Artificial Intelligence', 1, 1),
(7, 'CSE-0400', 'Project Works', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepartmentName`) VALUES
(1, 'Computer Science and Engineering'),
(2, 'Business Studies'),
(3, 'Architecture'),
(4, 'Law'),
(5, 'Pharmacy');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `SectionID` int(11) NOT NULL,
  `SectionName` varchar(10) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `TeacherID` int(11) NOT NULL,
  `SemesterID` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`SectionID`, `SectionName`, `CourseID`, `TeacherID`, `SemesterID`, `Status`) VALUES
(1, 'B-45', 7, 3, 1, 1),
(2, 'B-44  ', 1, 9, 1, 1),
(3, 'B-48', 3, 4, 1, 1),
(5, 'B-47', 2, 7, 1, 1),
(6, 'B-50', 2, 7, 1, 1),
(7, 'B-50', 3, 4, 1, 1),
(8, 'B-44  ', 7, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `SemesterID` int(11) NOT NULL,
  `SemesterTitle` varchar(100) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`SemesterID`, `SemesterTitle`, `Status`) VALUES
(1, 'Spring 2021', 1),
(2, 'Summer 2021', 1),
(5, 'Fall 2021', 1);


--
-- Table structure for table `student_section`
--

CREATE TABLE `student_section` (
  `ID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `SectionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_section`
--

INSERT INTO `student_section` (`ID`, `StudentID`, `SectionID`) VALUES
(1, 1, 1),
(4, 2, 2),
(6, 1, 5),
(9, 2, 6),
(11, 2, 3),
(12, 1, 7),
(15, 1, 8),
(16, 2, 8),
(17, 8, 8),
(18, 2, 1),
(19, 8, 1),
(20, 2, 5),
(22, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `UserEmail` varchar(50) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `UserTypeID` int(11) NOT NULL,
  `DepartmentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `UserEmail`, `Password`, `Status`, `UserTypeID`, `DepartmentID`) VALUES
(1, 'lucky', 'lucky@gmail.com', '1234', 1, 1, 1),
(2, 'abc', 'abc@gmail.com', '1234', 1, 2, 1),
(3, 'Admin', 'admin@gmail.com', '1234', 1, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `UserTypeID` int(11) NOT NULL,
  `UserTypeTitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`UserTypeID`, `UserTypeTitle`) VALUES
(1, 'Student'),
(2, 'Teacher'),
(3, 'Admin');

--
-- Indexes for dumped tables

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`SectionID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `TeacherID` (`TeacherID`),
  ADD KEY `SemesterID` (`SemesterID`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`SemesterID`);


--
-- Indexes for table `student_section`
--
ALTER TABLE `student_section`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `SectionID` (`SectionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserEmail` (`UserEmail`),
  ADD KEY `UserTypeID` (`UserTypeID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`UserTypeID`);

--
-- AUTO_INCREMENT for dumped tables
--



--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DepartmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `SectionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `SemesterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


--
-- AUTO_INCREMENT for table `student_section`
--
ALTER TABLE `student_section`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `UserTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--


--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `courses` (`CourseID`),
  ADD CONSTRAINT `section_ibfk_2` FOREIGN KEY (`TeacherID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `section_ibfk_3` FOREIGN KEY (`SemesterID`) REFERENCES `semester` (`SemesterID`);



--
-- Constraints for table `student_section`
--
ALTER TABLE `student_section`
  ADD CONSTRAINT `student_section_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `student_section_ibfk_2` FOREIGN KEY (`SectionID`) REFERENCES `section` (`SectionID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`UserTypeID`) REFERENCES `usertype` (`UserTypeID`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
