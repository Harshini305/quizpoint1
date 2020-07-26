-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2020 at 10:32 PM
-- Server version: 5.7.30
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goldfiel_quiz2m`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `an` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `ins` varchar(25) DEFAULT NULL,
  `desig` varchar(25) DEFAULT NULL,
  `quali` varchar(25) DEFAULT NULL,
  `phno` bigint(10) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `status` enum('unblock','block','Superadmin') NOT NULL,
  `pic` longtext,
  `user` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL,
  `sche_ass` varchar(100) NOT NULL,
  `comp_ass` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  `deleted_on` timestamp NULL DEFAULT NULL,
  `is_deleted` enum('not deleted','deleted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`an`, `pass`, `ins`, `desig`, `quali`, `phno`, `name`, `status`, `pic`, `user`, `admin`, `sche_ass`, `comp_ass`, `created_by`, `created_on`, `updated_by`, `updated_on`, `deleted_by`, `deleted_on`, `is_deleted`) VALUES
('akk@gmail.com', '698c9634246010398e8c427bdd12d374', 'klnce', 'ap', 'btech', 9025193390, 'Harish kumar', 'Superadmin', '', '', '', '', '', '', '2020-07-25 14:36:37', NULL, NULL, NULL, NULL, 'not deleted'),
('alagammaiangappan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, NULL, NULL, '', 'unblock', NULL, 'add', '', 'add', 'rank', 'akk@gmail.com', '2020-07-25 08:24:00', NULL, NULL, NULL, NULL, 'not deleted'),
('ass@gmail.com', '4525d4ae16c7792341eb3ba9ab231194', NULL, NULL, NULL, NULL, '', 'unblock', NULL, 'add,remove', '', '', '', 'akk@gmail.com', '2020-07-26 11:16:20', NULL, NULL, 'akk@gmail.com', '2020-07-26 06:16:20', 'deleted'),
('dfsdf@gmail.com', '0c8f1db3b945abc68e7d1662e4b4429e', NULL, NULL, NULL, NULL, '', 'unblock', NULL, 'remove', '', '', '', 'akk@gmail.com', '2020-07-26 07:16:07', NULL, NULL, 'akk@gmail.com', '2020-07-26 02:16:07', 'deleted'),
('harsh@gmail.com', 'uELV7yK', NULL, NULL, NULL, NULL, '', 'unblock', NULL, 'add', '', '', '', 'akk@gmail.com', '2020-07-26 08:34:22', NULL, NULL, 'akk@gmail.com', '2020-07-26 03:34:22', 'not deleted'),
('mkharishkumar2000@gmail.com', 'a9bcf1e4d7b95a22e2975c812d938889', NULL, NULL, NULL, NULL, '', 'unblock', NULL, 'add,remove', 'view', 'add,remove,edit', 'indrank,rank,upload', 'akk@gmail.com', '2020-07-24 14:12:34', 'akk@gmail.com', '2020-07-24 03:41:16', 'akk@gmail.com', '2020-07-24 06:34:50', 'not deleted'),
('qweqwe@gmail.com', 'ba6a7a8703ea7e3ad27f55258b5bb315', NULL, NULL, NULL, NULL, '', 'unblock', NULL, '', '', '', '', 'akk@gmail.com', '2020-07-24 14:01:54', NULL, NULL, NULL, NULL, 'not deleted'),
('qweqweq@gmail.com', '82d5b3c352e528030fc17c3833c2df60', NULL, NULL, NULL, NULL, '', 'unblock', NULL, '', '', '', '', 'akk@gmail.com', '2020-07-24 14:01:16', NULL, NULL, NULL, NULL, 'not deleted'),
('sdadasd@gmail.com', '8baa2657c45a59a8e9e88b3d09854243', NULL, NULL, NULL, NULL, '', 'unblock', NULL, '', '', '', '', 'akk@gmail.com', '2020-07-24 14:01:07', NULL, NULL, NULL, NULL, 'not deleted'),
('sdasda@gmail.com', '503cee1626e42819cd32ac33c136651e', NULL, NULL, NULL, NULL, '', 'unblock', NULL, '', '', '', '', 'akk@gmail.com', '2020-07-24 14:01:46', NULL, NULL, NULL, NULL, 'not deleted'),
('wqewqw@gmail.com', '5864d9308e9e7f7445c2d964130fb93c', NULL, NULL, NULL, NULL, '', 'unblock', NULL, '', '', '', '', 'akk@gmail.com', '2020-07-24 14:01:38', NULL, NULL, NULL, NULL, 'not deleted');

-- --------------------------------------------------------

--
-- Table structure for table `ans_user`
--

CREATE TABLE `ans_user` (
  `ass_no` int(11) NOT NULL,
  `un` varchar(100) NOT NULL,
  `qn` varchar(500) NOT NULL,
  `ans` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_ans`
--

CREATE TABLE `post_ans` (
  `ass_no` int(11) NOT NULL,
  `ass_name` varchar(25) NOT NULL,
  `s_date` date NOT NULL,
  `s_time` time NOT NULL,
  `e_date` date NOT NULL,
  `e_time` time NOT NULL,
  `no_of_qn` int(11) NOT NULL,
  `mark` float NOT NULL,
  `neg_mark` float NOT NULL,
  `tot_time` int(11) NOT NULL,
  `t_ins` enum('school','clg','general','') NOT NULL,
  `ins` varchar(100) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `yr` enum('1','2','3','4') DEFAULT NULL,
  `gp` varchar(10) DEFAULT NULL,
  `dept` varchar(10) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  `deleted_on` timestamp NULL DEFAULT NULL,
  `is_deleted` enum('not deleted','deleted','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_ans`
--

INSERT INTO `post_ans` (`ass_no`, `ass_name`, `s_date`, `s_time`, `e_date`, `e_time`, `no_of_qn`, `mark`, `neg_mark`, `tot_time`, `t_ins`, `ins`, `class`, `yr`, `gp`, `dept`, `status`, `created_on`, `created_by`, `updated_by`, `updated_on`, `deleted_by`, `deleted_on`, `is_deleted`) VALUES
(1, 'quiz', '2020-07-23', '20:05:00', '2020-07-25', '23:57:00', 10, 2, 1, 50, 'general', 'abb', 0, '', 'abb', 'abb', '1.', '2020-07-26 08:43:12', 'akk@gmail.com', NULL, NULL, NULL, NULL, 'not deleted'),
(2, 'trial', '2020-07-23', '20:25:00', '2020-07-23', '21:25:00', 5, 2, 1, 30, 'general', 'abb', 0, '', 'abb', 'abb', '2.pdf', '2020-07-24 05:34:25', 'akk@gmail.com', NULL, NULL, NULL, NULL, 'not deleted'),
(3, 'hkumar', '0000-00-00', '22:07:00', '2020-07-01', '01:07:00', 2, 2, 1, 20, 'general', 'abb', 0, '', 'abb', 'abb', '3.png', '2020-07-25 13:48:46', 'mkharishkumar2000@gmail.com', 'akk@gmail.com', '2020-07-24 00:30:31', NULL, NULL, 'not deleted'),
(4, 'test4', '2020-07-01', '13:03:56', '2020-07-03', '26:03:56', 5, 10, 0, 10, 'general', 'abb', 0, NULL, 'abb', 'abb', 'not uploaded', '2020-07-24 05:42:25', 'akk@gmail.com', NULL, NULL, NULL, NULL, 'not deleted'),
(5, '2marks', '2020-07-24', '23:05:00', '2020-08-28', '00:00:00', 10, 2, 1, 10, 'general', 'abb', 0, '', 'abb', 'abb', 'not uploaded', '2020-07-24 13:20:49', 'akk@gmail.com', 'akk@gmail.com', '2020-07-24 08:20:49', NULL, NULL, 'not deleted'),
(6, 'q2m', '2020-07-28', '17:41:00', '2020-07-29', '20:41:00', 2, 2, 1, 20, 'general', 'abb', 0, '', 'abb', 'abb', 'not uploaded', '2020-07-24 12:23:56', 'akk@gmail.com', 'akk@gmail.com', '2020-07-24 07:23:49', 'akk@gmail.com', '2020-07-24 07:23:56', 'deleted'),
(7, 'harsh', '2020-08-01', '05:05:00', '2020-09-05', '06:06:00', 3, 2, 1, 21, 'general', 'abb', 0, '', 'abb', 'abb', 'not uploaded', '2020-07-26 08:42:14', 'akk@gmail.com', 'akk@gmail.com', '2020-07-26 03:42:14', NULL, NULL, 'not deleted'),
(8, 'hkmk', '2020-07-27', '18:48:00', '2020-07-28', '20:49:00', 2, 2, 1, 20, 'clg', 'klnce', 0, '2', 'abb', 'IT', 'not uploaded', '2020-07-24 13:58:09', 'akk@gmail.com', 'akk@gmail.com', '2020-07-24 08:58:09', NULL, NULL, 'not deleted'),
(9, 'erwer', '2020-07-25', '00:00:00', '2020-07-25', '01:00:00', 10, 1, 1, 1, 'general', 'abb', 0, '', 'abb', 'abb', 'not uploaded', '2020-07-24 13:58:40', 'akk@gmail.com', 'akk@gmail.com', '2020-07-24 08:58:40', NULL, NULL, 'not deleted'),
(10, 'plp', '2020-07-24', '19:36:00', '2020-07-26', '22:27:00', 5, 2, 0, 45, 'general', 'abb', 0, '', 'abb', 'abb', 'not uploaded', '2020-07-24 14:06:31', 'akk@gmail.com', 'akk@gmail.com', '2020-07-24 09:06:31', NULL, NULL, 'not deleted'),
(11, 'Quiz11', '2020-07-25', '13:40:00', '2020-07-26', '20:00:00', 10, 2, 1, 10, 'general', 'abb', 0, '', 'abb', 'abb', 'not uploaded', '2020-07-25 08:08:22', 'akk@gmail.com', 'akk@gmail.com', '2020-07-25 03:08:22', NULL, NULL, 'not deleted'),
(12, 'Test', '2020-07-26', '18:59:00', '2020-07-27', '18:59:00', 4, 2, 1, 30, 'clg', 'klnce', 0, '3', 'abb', 'IT', 'not uploaded', '2020-07-25 13:40:54', 'madhumithaitbtech@gmail.com', NULL, NULL, 'madhumithaitbtech@gmail.com', '2020-07-25 08:40:54', 'deleted'),
(13, 'aaaa', '2020-07-27', '20:20:00', '2020-07-30', '22:22:00', 3, 2, 1, 10, 'general', 'abb', 0, '', 'abb', 'abb', 'not uploaded', '2020-07-26 07:20:38', 'akk@gmail.com', 'akk@gmail.com', '2020-07-26 02:20:38', NULL, NULL, 'not deleted'),
(14, 'asdasd', '2020-07-28', '00:00:00', '2020-07-30', '00:00:00', 1, 2, 1, 20, 'general', 'abb', 0, '', 'abb', 'abb', 'not uploaded', '2020-07-26 12:16:14', 'akk@gmail.com', NULL, NULL, NULL, NULL, 'not deleted');

-- --------------------------------------------------------

--
-- Table structure for table `qn`
--

CREATE TABLE `qn` (
  `ass_no` int(11) NOT NULL,
  `qn_no` int(11) NOT NULL,
  `qn` varchar(500) NOT NULL,
  `ans_key` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qn`
--

INSERT INTO `qn` (`ass_no`, `qn_no`, `qn`, `ans_key`) VALUES
(1, 1, '1', '1'),
(1, 10, '10', '10'),
(1, 2, '2', '2'),
(1, 3, '3', '3'),
(1, 4, '4', '4'),
(1, 5, '5', '5'),
(1, 6, '6', '6'),
(1, 7, '7', '7'),
(1, 8, '8', '8'),
(1, 9, '9', '9'),
(2, 5, 'cmt ur age', 'age,is '),
(2, 2, 'hw r u ', 'fine,good,'),
(2, 1, 'what is ur name', 'name,is '),
(2, 4, 'wht is ur hobby', 'my,hobby'),
(2, 3, 'wht r u studing', '1,2,3,4'),
(3, 2, 'ytft', 'iuh'),
(3, 1, 'ytfy', 'yu'),
(5, 1, 'das', 'eqeqwe'),
(7, 2, 'bnbnbnb', 'bnb '),
(7, 1, 'gnbnbj', 'ss'),
(7, 3, 'jnmnm', 'bbmn'),
(8, 1, '<p>edwec</p>\r\n', 'ewfe'),
(9, 6, '<p>bvn</p>\r\n', 'bn'),
(9, 1, 'qweqwe', 'wqeqw'),
(10, 4, 'harish?', 'fine,super'),
(10, 5, 'harshini?', 'fine,super'),
(10, 2, 'hii nice to meet u?', 'fine,super'),
(10, 3, 'krish?', 'fine,super'),
(10, 1, 'welcome to quiz2m??', 'fine,super'),
(11, 10, 'Bye bye alagammai.Have fun', 'Bye'),
(11, 6, 'Hello alagammai...How is ur corona holidays??', 'sema,lyk'),
(11, 2, 'Hey wats up??', 'Yus Absolutely Fyn///'),
(11, 1, 'Hiii alagammai...How are u??', 'fyn,better,best'),
(11, 7, 'how was ur day.??', 'good'),
(11, 8, 'what is CA??', 'Computer,architecture'),
(11, 9, 'What is DAA??', 'Design,analysis,algorithm'),
(11, 4, 'What is DBMS???', 'database,management,system'),
(11, 3, 'What is os??', 'Operating,System '),
(11, 5, 'Where are u from??', 'Madurai,chennai'),
(12, 3, 'dfdgfcb', 'gjbmbnm'),
(12, 4, 'ghgj', 'nngnbm'),
(12, 2, 'hgfgfgv', 'nmmnmm'),
(12, 1, 'What is  OS?', 'Operating system'),
(13, 21, '', ''),
(13, 2, 'assssddd', 'sdasd'),
(13, 3, 'ggggg', 'nghgh'),
(13, 1, 'jjjjjjjj', 'wwww'),
(14, 1, 'jhgjhghj', 'Hiiii Welcome Gud to see Yop');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `ass_no` int(11) NOT NULL,
  `un` varchar(100) NOT NULL,
  `marks_scored` float NOT NULL,
  `tot_m` float NOT NULL,
  `batch` enum('Gold','Silver','Bronze','none') NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `un` varchar(100) NOT NULL,
  `fn` varchar(25) NOT NULL,
  `ln` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `t_ins` enum('school','clg','general') NOT NULL,
  `phno` double NOT NULL,
  `ins` varchar(100) NOT NULL,
  `class` int(11) DEFAULT NULL,
  `yr` enum('1','2','3','4') DEFAULT NULL,
  `dept` varchar(50) NOT NULL,
  `gp` varchar(11) NOT NULL,
  `pic` longtext,
  `pass` varchar(50) NOT NULL,
  `online` enum('online','offline') NOT NULL,
  `rno` int(11) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `deleted_on` timestamp NULL DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  `is_deleted` enum('not deleted','deleted') NOT NULL,
  `abtme` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`un`, `fn`, `ln`, `dob`, `gender`, `t_ins`, `phno`, `ins`, `class`, `yr`, `dept`, `gp`, `pic`, `pass`, `online`, `rno`, `otp`, `created_on`, `created_by`, `deleted_on`, `deleted_by`, `updated_on`, `is_deleted`, `abtme`) VALUES
('abcd@gmail.com', '', '', '0000-00-00', 'male', 'school', 0, '', NULL, NULL, '', '', NULL, '14b0cdc0b4aa89da3619f4450b9a5200', 'offline', 0, '1abc', '2020-07-24 08:42:54', 'akk@gmail.com', '2020-07-24 03:42:54', 'akk@gmail.com', NULL, 'deleted', NULL),
('akharshini2000@gmail.com', '', '', '0000-00-00', 'male', 'school', 0, '', NULL, NULL, '', '', NULL, '567d7a81714ac2bd5b072b05b7af809c', 'offline', 0, '21483', '2020-07-26 07:18:05', 'akharshini2000@gmail.com', '0000-00-00 00:00:00', 'akk@gmail.com', NULL, 'not deleted', NULL),
('akharshinibbtechit@gmail.com', 'sdeqwe', 'Kishanlal', '2005-12-14', 'male', 'clg', 1234567899, 'klnce', NULL, '2', 'MECH', '', NULL, '83e8b48a54379708d29f7bbc1b1353c4', 'online', 123, '1abc', '2020-07-26 12:50:46', 'akharshinibbtechit@gmail.com', NULL, NULL, NULL, 'not deleted', NULL),
('aksh1@gmail.com', '', '', '0000-00-00', 'male', 'school', 0, '', NULL, NULL, '', '', NULL, '7c1dded12e80cad2299fb322b9a49e71', 'offline', 0, '67319', '2020-07-24 08:43:03', 'aksh1@gmail.com', '2020-07-24 03:43:03', 'akk@gmail.com', NULL, 'deleted', NULL),
('asdf@gmail.com', '', '', '0000-00-00', 'male', 'school', 0, '', NULL, NULL, '', '', NULL, '7ef95ddedc8502a8c3380e4a0785f78e', 'offline', 0, '49275', '2020-07-25 06:36:18', 'asdf@gmail.com', NULL, NULL, NULL, 'not deleted', NULL),
('ashwin@gmail.com', 'Ashwin krishna', 'kumar', '2005-12-02', 'male', 'clg', 9384336862, 'klnce', NULL, '2', 'IT', '', NULL, '7cb6fa91c124913f7a75e3153339234f', 'offline', 185035, '1abc', '2020-07-26 07:26:01', 'ashwinkrishnamurugan@gmail.com', NULL, NULL, NULL, 'not deleted', NULL),
('ddd@gmail.com', '', '', '0000-00-00', 'male', 'school', 0, '', NULL, NULL, '', '', NULL, '01efbae43972664c5809d9b4f582f7ec', 'offline', 0, '1abc', '2020-07-25 13:45:31', 'akk@gmail.com', '0000-00-00 00:00:00', 'akk@gmail.com', NULL, 'not deleted', NULL),
('dfsdf', '', '', '0000-00-00', 'male', 'school', 0, '', NULL, NULL, '', '', NULL, '0899d3ddf0309eb6c25f80b76bffc8fe', 'offline', 0, '1abc', '2020-07-25 14:19:06', 'akk@gmail.com', NULL, NULL, NULL, 'not deleted', NULL),
('harsh@gmail.com', '', '', '0000-00-00', 'male', 'school', 0, '', NULL, NULL, '', '', NULL, 'ba6cdaaeb7068aee3aa23b5516307d0a', 'offline', 0, '1abc', '2020-07-24 11:35:19', 'akk@gmail.com', '2020-07-24 06:35:19', 'akk@gmail.com', NULL, 'deleted', NULL),
('lmn@gmail.com', '', '', '0000-00-00', 'male', 'school', 0, '', NULL, NULL, '', '', NULL, 'f23f7c7e80a6d3669877322798510fe1', 'offline', 0, '1abc', '2020-07-26 12:31:11', 'lmn@gmail.com', NULL, NULL, NULL, 'not deleted', NULL),
('mkharishkumar2000@gmail.com', '', '', '0000-00-00', 'male', 'school', 0, '', NULL, NULL, '', '', NULL, '308c4cf6558b6ef2020a37030a10f69c', 'offline', 0, '1abc', '2020-07-25 14:15:41', 'akk@gmail.com', NULL, NULL, NULL, 'not deleted', NULL),
('mkharishkumarbtech@gmail.com', '', '', '0000-00-00', 'male', 'school', 0, '', NULL, NULL, '', '', NULL, 'f3d61a112c09ce9a98b68e4ec03eeb6a', 'offline', 0, '1abc', '2020-07-25 14:17:56', 'akk@gmail.com', NULL, NULL, NULL, 'not deleted', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`an`);

--
-- Indexes for table `ans_user`
--
ALTER TABLE `ans_user`
  ADD KEY `ass_no` (`ass_no`);

--
-- Indexes for table `post_ans`
--
ALTER TABLE `post_ans`
  ADD PRIMARY KEY (`ass_no`);

--
-- Indexes for table `qn`
--
ALTER TABLE `qn`
  ADD PRIMARY KEY (`ass_no`,`qn`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD UNIQUE KEY `ass_no` (`ass_no`,`un`),
  ADD KEY `un` (`un`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`un`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post_ans`
--
ALTER TABLE `post_ans`
  MODIFY `ass_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1284980;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ans_user`
--
ALTER TABLE `ans_user`
  ADD CONSTRAINT `ans_user_ibfk_1` FOREIGN KEY (`ass_no`) REFERENCES `post_ans` (`ass_no`);

--
-- Constraints for table `qn`
--
ALTER TABLE `qn`
  ADD CONSTRAINT `qn_ibfk_1` FOREIGN KEY (`ass_no`) REFERENCES `post_ans` (`ass_no`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`un`) REFERENCES `user` (`un`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
