-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 03:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `image`, `date`) VALUES
(1, 'wassii khan', 'wassiikhan@gmail.com', '$2y$10$m/OH.b9ojMSW3mFGxo4ydOo4rNZFJSlvxhiaa8oQ.zuSkE3S1ityG', 'admin.png', '2022-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `annoucements`
--

CREATE TABLE `annoucements` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` set('Active','Deactive') NOT NULL DEFAULT 'Active',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `annoucements`
--

INSERT INTO `annoucements` (`id`, `title`, `description`, `status`, `date`) VALUES
(7, 'Off Day', 'Tommorrow, the college will be closed due to covid 19 Thanks.', 'Active', '2023-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_grade`
--

CREATE TABLE `attendance_grade` (
  `grade_code` int(11) NOT NULL,
  `grade` set('1st year','2nd year','','') NOT NULL,
  `subject` set('Pre-Medical I','Pre-Medical II','Pre-Engineering I','Pre-Engineering II','Computer Science I','Computer Science II','Arts I','Arts II') NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_grade`
--

INSERT INTO `attendance_grade` (`grade_code`, `grade`, `subject`, `date`) VALUES
(5453, '1st year', 'Pre-Medical I', '2022-10-22'),
(21321, '1st year', 'Pre-Engineering I', '2022-10-03'),
(21342, '2nd year', 'Pre-Medical II', '2022-12-22'),
(32423, '2nd year', 'Arts II', '2022-12-22'),
(43242, '2nd year', 'Pre-Engineering II', '2022-12-22'),
(45345, '1st year', 'Computer Science I', '2022-12-12'),
(172001, '2nd year', 'Computer Science II', '2022-12-06'),
(454332, '1st year', 'Arts I', '2022-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_records`
--

CREATE TABLE `attendance_records` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `attendance_class` varchar(255) NOT NULL,
  `attendance_status` enum('Present','Absent') NOT NULL,
  `attendance_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_records`
--

INSERT INTO `attendance_records` (`id`, `name`, `roll_no`, `attendance_class`, `attendance_status`, `attendance_date`) VALUES
(147, 'Waseem  jan', '01', 'Computer Science I', 'Present', '2023-03-04'),
(148, 'Salman  khan', '02', 'Computer Science I', 'Absent', '2023-03-04'),
(149, 'Yahya zaman', '0112', 'Computer Science I', 'Present', '2023-03-04'),
(150, 'Waseem  jan', '01', 'Computer Science I', 'Present', '2023-03-03'),
(151, 'Salman  khan', '02', 'Computer Science I', 'Absent', '2023-03-03'),
(152, 'Yahya zaman', '0112', 'Computer Science I', 'Present', '2023-03-03'),
(153, 'Waseem  jan', '01', 'Computer Science I', 'Present', '2023-03-05'),
(154, 'Salman  khan', '02', 'Computer Science I', 'Absent', '2023-03-05'),
(155, 'Yahya zaman', '0112', 'Computer Science I', 'Present', '2023-03-05'),
(156, 'Ayesha  khan', '03', 'Pre-Medical I', 'Present', '2023-03-05'),
(157, 'Waseem  jan', '01', 'Computer Science I', 'Present', '2023-03-08'),
(158, 'Salman  khan', '02', 'Computer Science I', 'Absent', '2023-03-08'),
(159, 'Yahya zaman', '0112', 'Computer Science I', 'Present', '2023-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_details` text NOT NULL,
  `course_class` set('Pre-Medical I','Pre-Medical II','Pre-Engineering I','Pre-Engineering II','Computer Science I','Computer Science II','Arts I','Arts II') NOT NULL,
  `professor_name` varchar(50) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_code`, `course_details`, `course_class`, `professor_name`, `contact_number`, `image`, `date`) VALUES
(16, 'English', '11221', 'This is the english course which have some important lessons', 'Pre-Medical I', 'Tariq khan', '09223423421', '93595d9f4846df5e7e007f721d9da020.jpg', '2023-08-23'),
(17, 'Mathematics', '12091', 'This course is about mathematics basics like, sets , matrices etc.', 'Pre-Engineering I', 'Salman khan', '09234234234', '6d121e553034dedb6ad0f2e7bcb490c0.jpg', '2023-08-23'),
(20, 'Intro to Arts', '234234', 'This is the best course which provides an introduction to the engineering.', 'Arts II', 'Imran  khan', '09243423432', '574d4907da3d869d454738fc8953504d.jpg', '2023-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `roll_no` int(10) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `department` set('Pre-Medical','Pre-engineering','Computer Science','Arts') NOT NULL,
  `fee_type` set('Annual','Exam','Other') NOT NULL,
  `amount` varchar(100) NOT NULL,
  `collection_date` date NOT NULL,
  `reciept_number` int(16) NOT NULL,
  `status` set('Paid','Unpaid','Pending') NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `roll_no`, `student_name`, `department`, `fee_type`, `amount`, `collection_date`, `reciept_number`, `status`, `image`) VALUES
(5, 5634, 'beast', 'Pre-Medical', 'Annual', '1000', '1111-03-03', 2147483647, 'Pending', '156005c5baf40ff51a327f1c34f2975b.jpg'),
(6, 3243, 'jan', 'Arts', 'Exam', '900', '2022-11-16', 2147483647, 'Unpaid', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subject` set('Science','Arts','General Knowledge','History','Mathematics') NOT NULL,
  `author_name` varchar(10) NOT NULL,
  `publisher` varchar(10) NOT NULL,
  `asset_type` set('Book','Newspaper','Comics','') NOT NULL,
  `purchase_date` date NOT NULL,
  `price` varchar(10) NOT NULL,
  `status` set('In Stock','Out Of Stock','','') NOT NULL,
  `asset_details` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `title`, `subject`, `author_name`, `publisher`, `asset_type`, `purchase_date`, `price`, `status`, `asset_details`, `image`) VALUES
(7, 'Rupert Staar ', 'General Knowledge', 'jhon david', 'Alex jones', 'Book', '2022-10-21', '40', 'In Stock', '										', '8ff0d0f8148ef082ec52ebd52e8a996f.jpg'),
(11, 'Title Subtitle', 'General Knowledge', 'Paul Deita', 'A Press', 'Newspaper', '2022-10-21', '30', 'In Stock', 'Best book ', '55b6897c1dd3e1f04479a7dd4ea05515.jpg'),
(17, 'Menometrix', 'Arts', 'james caro', 'Y studio', 'Book', '2022-12-22', '324', 'In Stock', 'Best book ', '28adde1cfd9f6747ef6b804a11cb0a89.jpg'),
(18, 'Web app ', 'Science', 'semmy', 'jones', 'Book', '2022-12-23', '2423', 'In Stock', '										', 'f31e84ef1fd0ea4689026b0ba6c8cd8e.jpg'),
(19, 'Pieces of Light', 'Arts', 'SIr Isaac', 'Ak Publish', 'Book', '2023-01-14', '100', 'In Stock', 'This is a ', 'b093b62550989ff6ae577e8f9e61a43c.jpg'),
(20, 'Social media', 'Science', 'Stafford c', 'UK publish', 'Book', '2023-03-04', '100', 'In Stock', '										', '122582007605659f80d8c2d143f7629f.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `phone`, `message`, `date`, `time`) VALUES
(12, 'beast', 'beast@gmail.com', 'sick leave', '79324328905', 'this is beast hello admin.', '2022-12-22', '11:00:00'),
(13, 'shredded', 'shredded@gmail.com', 'greetings', '23947370', 'Hello, Admin i am shredded.', '2022-12-22', '07:06:31'),
(14, 'hammad', 'hammad@gmail.com', 'Urgent Piece of work', '9237497834', 'Hello Admin , I am hammad.', '2022-12-22', '11:09:12'),
(15, 'jawad', 'jawad@gmail.com', 'SICK LEAVE', '957435397', 'Hello, admin i am jawad', '2022-12-23', '10:40:25'),
(16, 'dfggdf', 'wassiikhan@gmail.com', 'ffsdf', '3424234', 'fsdfsdfsdf', '2022-12-23', '10:56:35'),
(17, 'adnan', 'adnan@gmail.com', 'sick leave', '349342947', 'Hello admin i am adnan.', '2022-12-28', '02:01:33'),
(18, 'yahya', 'yahyazaman@gmail.com', 'testing', '9498234974', 'This is emergency, i need to recover my account.', '2023-01-06', '10:47:58'),
(19, 'Talha', 'talha123@gmail.com', 'Demo', '09099098432', 'Hello, i am talha zaman.', '2023-01-21', '12:19:24'),
(24, 'Ayaz', 'ayazghazal@gmail.com', 'Demo', '7070328502', 'Hello, admin.', '2023-01-26', '10:44:39'),
(25, 'fsdaf', 'faefaefe@gmail.com', 'asdff', '2343243', 'dsfafsdaf', '2023-02-11', '06:24:53'),
(26, 'gsdf', 'grsgrgsg@gmail.com', 'fsadfsaf', '534', '543543', '2023-03-04', '08:54:22'),
(27, 'fdsf', 'fdsafsaf@gmail.com', 'affsda', '423324234', 'fsafasfdsaf', '2023-03-05', '02:54:49'),
(28, 'shehzad', 'shehzad@gmail.com', 'demo', '742397429', 'Hello , i am shehzad.', '2023-03-08', '07:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `id` int(11) NOT NULL,
  `firstname` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `joining_data` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_number` varchar(11) NOT NULL,
  `gender` set('Gender','Male','Female') NOT NULL,
  `department` set('Department','Computer Science','Political Science','Statistics','English','Urdu','Mathematics','Economics','Zoology','Botany','Physics','Chemistry') NOT NULL,
  `date_of_birth` date NOT NULL,
  `education` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `firstname`, `lastname`, `email`, `joining_data`, `password`, `mobile_number`, `gender`, `department`, `date_of_birth`, `education`, `image`, `date`) VALUES
(2, 'kamran', 'khan', 'kamrankhan@gmail.com', '2022-11-03', '$2y$10$X2TLfMQh0eVS7.zXtATtUub57adNqxm2xWWVjF7My0BqJHKXhLUsq', '0923434654', 'Gender', 'Department', '2008-10-02', 'Bachelor', 'ebf3400a0e54ba30faecb8d216f7a164.jpg', '2022-10-19'),
(3, 'Imran ', 'khan', 'imrankhan@gmail.com', '2022-11-04', '$2y$10$WDk3thna6OxbR.L7NsjZx.61un5lcQkcgVbMIqzjM49ZLcCc7fTVO', '923434629', 'Male', 'English', '2000-03-04', 'Master', '829652c900bac6d09d8de6e3b686c640.jpg', '2022-10-19'),
(6, 'Tariq', 'khan', 'tariqkhan@gmail.com', '2022-12-02', '$2y$10$0mVbDfiJasYWRTB.mBTFB.lL7Di6VV6OFnruotSA5XhEqYn9MUJA.', '923434612', 'Male', 'Urdu', '2003-01-02', 'Bachelor', 'b105dc70adcbd6aff4b7f495643f137f.jpg', '2022-10-19'),
(38, 'Nawaz', 'Khan', 'nawazkhan@gmail.com', '2022-11-03', '$2y$10$WQn0U0Mqaj4Pl7ulOg8kz.jXNCePcdQsHSvskXnTbQq.mNdDdJpIa', '0923423535', 'Male', 'Urdu', '2000-01-02', 'Master', '98f53f1a5672209f23460560bee61327.jpg', '2022-11-12'),
(39, 'Salman', 'khan', 'salmankhan@gmail.com', '2022-12-04', '$2y$10$rW5OYjcy2oOD0TNPQ2Tr6efEpOWHCASfSvZskTb0xhy/CYupQDW9.', '090076609', 'Male', 'Physics', '2001-01-02', 'PHD', '37648511616b59bc1fdd263d79b51551.jpg', '2022-11-13'),
(43, 'Rafiq', 'khan', 'rafiqkhan@gmail.com', '2022-11-03', '$2y$10$XxLw1kI.TRyehBndAScVWeesSmOfhuz7McftaBs2ovbtU9o1.OWb2', '094324234', 'Male', 'Botany', '2009-02-15', 'Bachelor', '8193318901dc1199b3f55d471996de47.jpg', '2022-11-15'),
(49, 'Jawad', 'khan', 'jamalkhan@gmail.com', '2022-12-22', 'e10adc3949ba59abbe56e057f20f883e', '090043246', 'Male', 'Mathematics', '2010-02-04', 'Master', '7c87efacc998085ccd68ef41b7af1ae5.png', '2023-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` date NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `class` set('Pre-Medical I','Pre-Medical II','Pre-Engineering I','Pre-Engineering II','Computer Science I','Computer Science II','Arts I','Arts II') NOT NULL,
  `gender` set('Gender','Male','Female','') NOT NULL,
  `mobile_number` varchar(11) NOT NULL,
  `parents_name` varchar(10) NOT NULL,
  `parents_mobile_number` varchar(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `adress` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, `password`, `registration_date`, `roll_no`, `class`, `gender`, `mobile_number`, `parents_name`, `parents_mobile_number`, `date_of_birth`, `adress`, `image`, `date`) VALUES
(1, 'Waseem ', 'jan', 'waseemkhan@gmail.com', 'wasi', '2022-12-03', '01', 'Computer Science I', 'Male', '90076602', 'jahangir', '090076601', '2012-10-11', '																																							California, south road street 143A.																																																																								', '1.jpg', '2022-10-21'),
(2, 'Salman ', 'khan', 'salmankhan@gmail.com', 'salman', '2022-11-18', '02', 'Computer Science I', 'Male', '900766021', 'jahangir', '0900766014', '2012-10-11', '																																																																																																																					USA, south road street 143A.																																																																																																												', '2d7806f0f931b9646c7589e5718d71b6.jpg', '2022-10-21'),
(4, 'Ayesha ', 'khan', 'ayeshakhan@gmail.com', '12345', '2022-11-18', '03', 'Pre-Medical I', 'Female', '900767322', 'jahangir', '090435381', '2012-10-11', '																																																				china, south road street 143A.																																																', 'student.jpg', '2022-10-21'),
(7, 'Jamal', 'khan', 'jamal@gmail.com', '12', '2022-11-11', '04', 'Arts I', 'Male', '534534534', 'jahangir', '0900766014', '2012-10-11', '																																																				USA, south road, street 143A.																																																', '3.jpg', '2022-10-22'),
(19, 'ali', 'khan', 'alikhan@gmail.com', '', '2022-11-03', '05', 'Pre-Engineering I', 'Male', '42423234', 'Mohammad k', '4234234', '2000-01-03', '																																																																																																																					Paris																																																																																																																																					', '08b606c654ed86b088a17b503e8fc4c2.jpg', '2022-11-13'),
(21, 'Rosie', 'Cat', 'rc@gmail.com', '', '2022-11-30', '06', 'Pre-Engineering I', 'Female', '5230423', 'Catherine ', '4289423894', '1999-04-03', '																										Australlia																																																																																																																																																																																																																											', '719628b8cbb80c92f3834cee8ace9761.png', '2022-11-30'),
(22, 'Sami', 'ur rehman', 'samiurrehman@gmail.com', '', '2022-12-22', '1290', 'Computer Science II', 'Male', '423423', 'aji saib', '423423432', '2004-06-22', '																																																				Akora khattak.																																																																																	', 'e600b9fb3d495af7484c3b82bbd96266.jpg', '2022-12-22'),
(24, 'Yahya', 'zaman', 'yahyazaman@gmail.com', '', '2022-12-29', '0112', 'Computer Science I', 'Male', '09432442', 'khan Zaman', '094343432', '2001-06-04', 'Pakistan , Kpk street 142.																																													', '45a10182982ddc0bf36847620874dfcb.jpg', '2023-03-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `annoucements`
--
ALTER TABLE `annoucements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_grade`
--
ALTER TABLE `attendance_grade`
  ADD PRIMARY KEY (`grade_code`);

--
-- Indexes for table `attendance_records`
--
ALTER TABLE `attendance_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_code` (`course_code`),
  ADD UNIQUE KEY `contact_number` (`contact_number`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll_no` (`roll_no`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`),
  ADD UNIQUE KEY `roll_no` (`roll_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `annoucements`
--
ALTER TABLE `annoucements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attendance_grade`
--
ALTER TABLE `attendance_grade`
  MODIFY `grade_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6345346;

--
-- AUTO_INCREMENT for table `attendance_records`
--
ALTER TABLE `attendance_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
