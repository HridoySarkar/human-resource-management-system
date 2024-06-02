-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 09:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindashboard`
--

CREATE TABLE `admindashboard` (
  `adminDashboardId` int(30) NOT NULL,
  `employeeID` int(100) DEFAULT NULL,
  `dashboardContent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admindashboard`
--

INSERT INTO `admindashboard` (`adminDashboardId`, `employeeID`, `dashboardContent`) VALUES
(1, 1, 'Admin dashboard content goes here'),
(2, 4, 'Admin dashboard content goes here');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('Male','Female','No Mention') NOT NULL,
  `address` text NOT NULL,
  `salary_expectation` varchar(255) NOT NULL,
  `cv_path` varchar(255) NOT NULL,
  `applied_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendanceId` bigint(20) NOT NULL,
  `employeeId` int(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `clockInTime` time DEFAULT NULL,
  `clockOutTime` time DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `leaveType` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendanceId`, `employeeId`, `date`, `clockInTime`, `clockOutTime`, `status`, `leaveType`) VALUES
(1, 1, '2024-05-01', '09:00:00', '17:00:00', 'Present', NULL),
(2, 2, '2024-05-01', '09:15:00', '17:15:00', 'Present', NULL),
(3, 3, '2024-05-01', '09:00:00', '17:00:00', 'Present', NULL),
(4, 4, '2024-05-01', '09:00:00', '17:00:00', 'Absent', 'Sick Leave');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentId` int(10) NOT NULL,
  `departmentName` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `headOfDepartment` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentId`, `departmentName`, `description`, `headOfDepartment`) VALUES
(1, 'Human Resources', 'Responsible for managing employee relations and organizational development.', 2),
(2, 'Finance', 'Responsible for managing financial transactions and reporting.', 2),
(3, 'IT', 'Responsible for managing information technology systems and infrastructure.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeId` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `jobTitle` varchar(60) NOT NULL,
  `departmentId` int(30) NOT NULL,
  `dateOfJoining` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `baseSalary` decimal(10,2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `role` enum('employee','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeId`, `name`, `email`, `phone`, `address`, `jobTitle`, `departmentId`, `dateOfJoining`, `status`, `baseSalary`, `username`, `password`, `role`) VALUES
(1, 'sohan', 'sohan@example.com', '123-456-7890', '123 Main St, Anytown, BD', 'Sr. Software Engineer', 3, '2020-01-15', 'Active', 50000.00, 'sohan', '1234', 'admin'),
(2, 'tahmina', 'tahmina@example.com', '987-654-3210', '456 Oak St, Anytown, BD', 'Data Analyst', 3, '2020-03-20', 'Active', 48000.00, 'tahmina', '5678', 'employee'),
(3, 'hridoy', 'hridoy@example.com', '555-123-4567', '789 Elm St, Anytown, BD', 'Sr. Programmer', 3, '2020-02-10', 'Active', 48000.00, 'hridoy', '91011', 'employee'),
(4, 'rejoan', 'rejoan@example.com', '113-112-4567', '709 Fnt St, Anytown, BD', 'IT Specialist', 3, '2020-02-10', 'Active', 38000.00, 'rejoan', '123', 'admin'),
(101, 'test', 'test@example.com', '123569785', '30 Mt. Fujiyama, JP', 'senior accountant', 2, '2020-01-15', 'Active', 40000.00, 'test', 'test', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `position_name` varchar(255) NOT NULL,
  `published_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `vacancy` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `experience_years` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `salary_range` varchar(255) NOT NULL,
  `job_type` enum('Full-time','Part-time','Intern','Contractual') NOT NULL,
  `qualifications` text NOT NULL,
  `benefits` text NOT NULL,
  `education_requirement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `position_name`, `published_time`, `vacancy`, `deadline`, `experience_years`, `location`, `salary_range`, `job_type`, `qualifications`, `benefits`, `education_requirement`) VALUES
(1, 'Software Engineer (Java)', '2024-06-02 09:55:38', 2, '2024-06-10', 2, 'Dhaka, Bangladesh.', '50k - 60k (BDT)', 'Full-time', 'Analyzing information\r\nGeneral programming skills\r\nSoftware design\r\nSoftware debugging\r\nSoftware documentation\r\nSoftware testing\r\nProblem solving\r\nTeamwork\r\nSoftware development fundamentals\r\nSoftware development process\r\nSoftware requirements', 'paid time off\r\npaid parental leave\r\nhealth insurance\r\ndental insurance\r\nremote work\r\na flexible schedule\r\ntuition reimbursement\r\nbonuses(2/year)', 'BSc. / MSc. from any reputated university. '),
(2, 'Intern Software Engineer', '2024-06-02 09:59:07', 5, '2024-06-10', 0, 'Dhaka, Bangladesh.', '10k - 12k (BDT)', 'Intern', 'Outstanding coding abilities\r\nThorough knowledge of atleast 1 programming language.\r\nWorking knowledge of HTML, CSS, Javascript is a must.\r\nPassion to learn new technology\r\nShould work with seniors and be a team player.', 'Comprehensive training in web, mobile development.\r\nSeed capital to launch your first app or solution.\r\nA dynamic, supportive, and innovative work environment.', 'Completing last semester of your BSc.');

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` int(11) NOT NULL,
  `employeeId` int(100) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `departmentId` int(11) NOT NULL,
  `jobTitle` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salaryId` bigint(20) NOT NULL,
  `employeeId` int(100) DEFAULT NULL,
  `bonuses` decimal(10,2) DEFAULT NULL,
  `deductions` decimal(10,2) DEFAULT NULL,
  `baseSalary` decimal(10,2) DEFAULT NULL,
  `paymentDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salaryId`, `employeeId`, `bonuses`, `deductions`, `baseSalary`, `paymentDate`) VALUES
(1, 1, 500.00, 100.00, 50000.00, '2024-05-01'),
(2, 2, 500.00, 50.00, 48000.00, '2024-05-01'),
(3, 3, 500.00, 0.00, 48000.00, '2024-05-01'),
(4, 4, 500.00, 200.00, 45000.00, '2024-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `userdashboard`
--

CREATE TABLE `userdashboard` (
  `userDashboardId` int(120) NOT NULL,
  `employeeID` int(100) DEFAULT NULL,
  `dashboardContent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdashboard`
--

INSERT INTO `userdashboard` (`userDashboardId`, `employeeID`, `dashboardContent`) VALUES
(1, 2, 'User dashboard content goes here'),
(2, 3, 'User dashboard content goes here');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindashboard`
--
ALTER TABLE `admindashboard`
  ADD PRIMARY KEY (`adminDashboardId`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendanceId`),
  ADD KEY `employeeId` (`employeeId`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentId`),
  ADD KEY `fk_headOfDepartment` (`headOfDepartment`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeId`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`),
  ADD KEY `fk_departmentId` (`departmentId`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_requests_ibfk_1` (`employeeId`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salaryId`),
  ADD KEY `employeeId` (`employeeId`);

--
-- Indexes for table `userdashboard`
--
ALTER TABLE `userdashboard`
  ADD PRIMARY KEY (`userDashboardId`),
  ADD KEY `employeeID` (`employeeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admindashboard`
--
ALTER TABLE `admindashboard`
  ADD CONSTRAINT `admindashboard_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeId`);

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fk_headOfDepartment` FOREIGN KEY (`headOfDepartment`) REFERENCES `employee` (`employeeId`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_departmentId` FOREIGN KEY (`departmentId`) REFERENCES `department` (`departmentId`);

--
-- Constraints for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD CONSTRAINT `leave_requests_ibfk_1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`) ON DELETE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`employeeId`);

--
-- Constraints for table `userdashboard`
--
ALTER TABLE `userdashboard`
  ADD CONSTRAINT `userdashboard_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
