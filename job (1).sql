-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 03, 2023 at 01:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `email` varchar(200) NOT NULL,
  `uid` int(11) NOT NULL,
  `image` varchar(10000) NOT NULL,
  `cv` varchar(1000) NOT NULL,
  `jobid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`id`, `name`, `address`, `email`, `uid`, `image`, `cv`, `jobid`) VALUES
(3, 'Abdullah Al Sakib', 'Gulshan 1, Dhaka, Bangladesh', 'sakibdob@gmail.com', 1, 'uploads/IMG-64a9d5d65d9868.67782707.jpg', 'uploads/CV-64a9d5d65de794.67183831.pdf', 4);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `jobid` varchar(200) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `option1` varchar(200) NOT NULL,
  `option2` varchar(200) NOT NULL,
  `option3` varchar(200) NOT NULL,
  `option4` varchar(200) NOT NULL,
  `answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `jobid`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES
(16, '2', 'Which of the following is the correct name of React.js?', 'React', 'React.js', 'ReactJS', 'All of the above', 'All of the above'),
(19, '4', 'What is HTML?', 'HTML describes the structure of a webpage', 'HTML consists of a set of elements that helps the browser how to view the content', 'HTML is the standard markup language mainly used to create web pages', 'All of the mentioned', 'All of the mentioned'),
(20, '4', 'Who is the father of HTML?', 'Rasmus Lerdorf', 'Tim Berners-Lee', 'Brendan Eich', 'Sergey Brin', 'Tim Berners-Lee'),
(21, '4', 'Who is the father of HTML?', 'Rasmus Lerdorf', 'Tim Berners-Lee', 'Brendan Eich', 'Sergey Brin', 'Tim Berners-Lee'),
(22, '4', 'HTML stands for __________', 'HyperText Markup Language', 'HyperText Machine Language', 'HyperText Marking Language', 'HighText Marking Language', 'HyperText Markup Language'),
(23, '4', 'What is the correct syntax of doctype in HTML5?', '/doctype html', '!doctype html', 'doctype html', 'doctype html!', 'doctype html!'),
(24, '4', 'Which of the following is used to read an HTML page and render it?', 'Web server', 'Web browser', 'Web network', 'Web matrix', 'Web browser'),
(25, '4', 'Which of the following tag is used for inserting the largest heading in HTML?', ' head', ' h6 tag', 'h1 tag', 'heading', 'h1 tag'),
(26, '4', ' What is DOM in HTML?', 'Language dependent application programming', 'Hierarchy of objects in ASP.NET', 'Application programming interface', 'Convention for representing and interacting with objects in html documents', 'Convention for representing and interacting with objects in html documents'),
(27, '4', 'In which part of the HTML metadata is contained?', ' head tag', 'html tag', 'title tag', 'body tag', ' head tag'),
(28, '4', 'Which element is used to get highlighted text in HTML5?', 'u tag', 'mark tag', ' highlight tag', ' b tag', 'mark tag'),
(30, '5', 'tr', 'React', 'React.js', 'ReactJS', 'All of the above', 'All of the above');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` varchar(10000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `token`, `image`, `password`, `phone`) VALUES
(1, 'Abdullah Al Sakib', 'abdullahalsakib7075@gmail.com', '105397816760151157991', 'uploads/IMG-64c28d2960d4d6.79829387.jpg', '', '01775332747'),
(3, 'Abdullah Al Sakib', 'sakibdob@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '81dc9bdb52d04dc20036dbd8313ed055', '01775332747'),
(4, 'MD. ARSHADUL MOKADDIS', 'shaounmd18@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '81dc9bdb52d04dc20036dbd8313ed055', '01785389594');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL,
  `Company_Name` varchar(200) NOT NULL,
  `Vacancy` varchar(200) NOT NULL,
  `Job_Type` varchar(200) NOT NULL,
  `Location` varchar(1000) NOT NULL,
  `Working_day` varchar(1000) NOT NULL,
  `Working_hour` varchar(1000) NOT NULL,
  `Holiday` varchar(1000) NOT NULL,
  `Salary` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pandding',
  `email` varchar(100) NOT NULL,
  `Details` varchar(10000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `publish` varchar(100) NOT NULL DEFAULT 'Padding',
  `time` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`id`, `Company_Name`, `Vacancy`, `Job_Type`, `Location`, `Working_day`, `Working_hour`, `Holiday`, `Salary`, `status`, `email`, `Details`, `image`, `publish`, `time`) VALUES
(2, 'Care-Box', '3', 'React-Native Developer', 'Gulshan 2, Dhaka, Bangladesh', '5 day in a week', '9 to 5', 'Friday , Saturday', '25000', 'Accept', 'abdullahalsakib7075@gmail.com', 'Requirements and Skills:\n-English language proficiency and strong communication skills\n-1+ years of professional experience in React Native\n-Highly proficient in rendering components with Native APIs\n-Highly proficient in JavaScript, ES6, ES7, React Native, Redux, ReactJS.\n-Familiarity with functional programming preferred.\n-Proficient in using Git as a source code management system.\n\nQualifications and Additional Requirements:\n-Age 22 to 28 years.\n-B.Sc / M.Sc in Computer Science & Engineering.', 'uploads/IMG-64a6e768eec8a4.67658701.jpg	', 'Publish', '10'),
(4, '𝐏𝐚𝐭𝐡𝐚𝐨', '3', '𝐒𝐞𝐧𝐢𝐨𝐫 𝐒𝐨𝐟𝐭𝐰𝐚𝐫𝐞 𝐄𝐧𝐠𝐢𝐧𝐞𝐞𝐫', 'Tajwar Center, Rd No. 19/A, Dhaka 1212, Bangladesh', '5 day in a week', '9 to 5', 'Friday , Saturday', '10000', 'Accept', 'abdullahalsakib7075@gmail.com', '• Design, implement and maintain the payment infrastructure, including payment gateways, APIs, and payment processing systems on our payment system\r\n• Collaborate with development teams to identify opportunities for automation, streamline processes, and optimize system performance\r\n• Ensure high availability and reliability of payment systems, including disaster recovery planning and implementation\r\n• Manage the release process, including coordinating with development teams to ensure smooth and timely deployment of new features and bug fixes\r\n• Monitor and troubleshoot payment systems, identifying and resolving issues in a timely manner\r\n• Implement and manage security protocols and policies to ensure the safety and security of our payment systems and customer data\r\n• Stay up-to-date with industry trends and emerging technologies related to payment systems and DevOps practices\r\n• Provide guidance and mentorship to junior Engineers in the team', 'uploads/IMG-64a9a2531a13f9.97719199.jpg', 'Publish', '10'),
(5, 'Orange Toolz', '2', 'Full Time & On-Site', '77 Road 13, Uttara, Dhaka 1230, Bangladesh', '6', '30', '1', '70,000', 'Accept', 'shaounmd18@gmail.com', 'Additional Requirements:\r\n• Thorough understanding of React.js and its core principles.\r\n• Strong proficiency in JavaScript, including DOM manipulation and the JavaScript object model\r\n• Experience with popular React.js workflows (such as Redux, and Redux Saga,Redux toolkit, RTK)\r\n• Familiarity with newer specifications of EcmaScript.\r\n• Familiarity with RESTful APIs.', 'uploads/IMG-64a9aa47202f62.82386681.jpg', 'Padding', '0'),
(6, 'REPLIQ Limited', '2', 'Full Time', 'Lalmatia, Dhaka, Bangladesh', '6', '5', 'Friday', '30,000', 'Accept', 'shaounmd18@gmail.com', '✓ FLEXIBLE WORK ARRANGEMENTS\r\n✓ CUTTING-EDGE TECHNOLOGY STACK\r\n✓ COLLABORATIVE AND SUPPORTIVE WORK CULTURE\r\n✓ PROFESSIONAL GROWTH AND ADVANCEMENT OPPORTUNITIES\r\n', 'uploads/IMG-64a9abbc5d0913.41397062.jpg', 'Padding', '0'),
(7, 'Tech Digital', '2', 'Full Time', 'Panthapath, Dhaka, Bangladesh', '6', '5', 'Friday', '50,000', 'Pandding', 'shaounmd18@gmail.com', '· Collaborate with the team to conceptualise and create motion graphics for various projects.\r\n· Assist in developing engaging visual content that aligns with client briefs and project requirements.\r\n· Work with various software tools and techniques to bring designs to life through animations and effects.\r\n· Ensure the timely delivery of high-quality motion graphics within project deadlines.\r\n· Continuously learn and stay up-to-date with industry trends and best practises in motion graphics design.', 'uploads/IMG-64a9ac58b77203.32953929.jpg', 'Padding', '0'),
(8, 'SkyTech', '2', 'Full Time', 'Natore Tower, Road-2, Dhaka, Bangladesh', '6', '5', 'Friday', '14000 to 25000', 'Pandding', 'shaounmd18@gmail.com', 'Requirements:\r\n1. Candidates have to make outbound calls to the US to sell our products or services.\r\n2. Generate new sales or subscriptions to the different services offered.\r\n3. Ask questions to understand customer requirements and close sales.\r\n4. Excellent track records on MCA Live Transfer, Janitorial/Air Duct Appointment setting will get preference.\r\n5. Required Agent will have to work NIGHT SHIFT (8:00 PM-5:00 AM) from office.\r\n6. HSC, O Level, A-Level, Bachelor degree in any discipline\r\n7. The candidates must be fluent in English.', 'uploads/IMG-64a9ace425f609.92403888.jpg', 'Padding', '0'),
(9, 'Codexpert, Inc', '4', 'Full-time, onsite', 'Mirpur DOHS, Dhaka, Bangladesh', '6', '6', 'Friday', '14000 to 25000', 'Pandding', 'shaounmd18@gmail.com', 'Familiarity with newer specifications of EcmaScript.\r\n✅ Familiarity with RESTful APIs.\r\n✅ Knowledge of typescript.\r\n✅ Knowledge of SCSS and modular-based CSS.', 'uploads/IMG-64a9ad716600f1.02415881.jpg', 'Padding', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
