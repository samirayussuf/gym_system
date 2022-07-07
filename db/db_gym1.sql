-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 09:16 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gym1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `dob` text NOT NULL,
  `contact` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `created_on` date NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `fname`, `lname`, `gender`, `dob`, `contact`, `address`, `image`, `created_on`, `group_id`) VALUES
(1, 'admin', 'admin@admin.com', 'aa7f019c326413d5b8bcad4314228bcd33ef557f5d81c7cc977f7728156f4357', 'admin', 'admina', 'Male', '2018-11-26', '7755332211', 'Nashik', 'uploadImage/Profile/avatar_nick.png', '2018-04-30', 1),
(3, 'user', 'niki@gmail.com', 'bbcff4db4d8057800d59a68224efd87e545fa1512dfc3ef68298283fbb3b6358', 'nikita', 'sharma', 'Female', '1994-12-03', '7744112255', 'nashik', '6.jpg', '2018-12-11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `manage_website`
--

CREATE TABLE `manage_website` (
  `id` int(11) NOT NULL,
  `title` varchar(600) NOT NULL,
  `short_title` varchar(600) NOT NULL,
  `logo` text NOT NULL,
  `footer` text NOT NULL,
  `currency_code` varchar(600) NOT NULL,
  `currency_symbol` varchar(600) NOT NULL,
  `login_logo` text NOT NULL,
  `invoice_logo` text NOT NULL,
  `background_login_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_website`
--

INSERT INTO `manage_website` (`id`, `title`, `short_title`, `logo`, `footer`, `currency_code`, `currency_symbol`, `login_logo`, `invoice_logo`, `background_login_image`) VALUES
(1, 'Gym Management System', 'Gym Management', 'png.png', '<a target=\"_blank\" rel=\"nofollow\">-</a>', 'INR', 'â‚¹', 'png.png', 'png.png', 'gym-background.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE `tbl_attendance` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `curr_date` text NOT NULL,
  `curr_time` text NOT NULL,
  `present` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`id`, `user_id`, `curr_date`, `curr_time`, `present`) VALUES
(2, '1', '2018-12-06', '03:11 PM', 0),
(14, '2', '2018-11-07', '05:04 PM', 0),
(15, '4', '2018-12-07', '05:04 PM', 0),
(16, '4', '2018-12-10', '03:35 PM', 0),
(17, '2', '2018-12-11', '01:01 PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `dob` text NOT NULL,
  `anniversary_date` text NOT NULL,
  `contact` text NOT NULL,
  `married_status` varchar(300) NOT NULL,
  `age` int(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `feet` varchar(300) NOT NULL,
  `inches` varchar(200) NOT NULL,
  `weight` varchar(500) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `created_on` date NOT NULL,
  `group_id` int(11) NOT NULL,
  `attendance_count` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `username`, `email`, `password`, `fname`, `lname`, `gender`, `dob`, `anniversary_date`, `contact`, `married_status`, `age`, `address`, `feet`, `inches`, `weight`, `image`, `created_on`, `group_id`, `attendance_count`) VALUES
(1, 'user', 'yasha@gmail.com', 'bbcff4db4d8057800d59a68224efd87e545fa1512dfc3ef68298283fbb3b6358', 'Yasha', 'Bora', 'Female', '2018-12-01', '', '7755332211', 'Unmarried', 0, 'nashik', '1', '5', '3', '', '2018-11-30', 0, 0),
(4, 'user', 'suhani@gmail.com', 'bbcff4db4d8057800d59a68224efd87e545fa1512dfc3ef68298283fbb3b6358', 'suhani', 'labhade', 'Female', '2016-12-19', '', '4422255522', 'Unmarried', 2, 'nashik', '3', '2', '15', '', '2018-12-07', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deposit`
--

CREATE TABLE `tbl_deposit` (
  `id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `installment_amount` decimal(15,2) NOT NULL,
  `remaining_amount` decimal(15,2) NOT NULL,
  `payment_source` varchar(200) NOT NULL,
  `created_date` text NOT NULL,
  `remark` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_deposit`
--

INSERT INTO `tbl_deposit` (`id`, `subscription_id`, `installment_amount`, `remaining_amount`, `payment_source`, `created_date`, `remark`) VALUES
(1, 1, '10.00', '990.00', 'Cash', '2018-12-07', 'fhf'),
(2, 1, '200.00', '800.00', 'Cash', '2018-12-07', 'fggf'),
(3, 2, '300.00', '1200.00', 'Cash', '2018-12-07', 'remark'),
(4, 2, '200.00', '1300.00', 'Cash', '2018-12-09', 'rt'),
(5, 2, '100.00', '1400.00', 'Cash', '2018-12-10', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_config`
--

CREATE TABLE `tbl_email_config` (
  `e_id` int(21) NOT NULL,
  `email_setting` varchar(500) NOT NULL,
  `mail_driver_host` varchar(5000) NOT NULL,
  `mail_port` int(50) NOT NULL,
  `mail_username` varchar(50) NOT NULL,
  `mail_password` varchar(30) NOT NULL,
  `mail_encrypt` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_email_config`
--

INSERT INTO `tbl_email_config` (`e_id`, `email_setting`, `mail_driver_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encrypt`) VALUES
(1, 'safsw', 'as', 23212, 'aa', 'av', 'av');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry`
--

CREATE TABLE `tbl_enquiry` (
  `id` int(11) NOT NULL,
  `cust_name` varchar(700) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `dob` text NOT NULL,
  `age` int(15) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `height_feet` int(15) NOT NULL,
  `height_inch` int(15) NOT NULL,
  `weight` int(15) NOT NULL,
  `occupation` varchar(1000) NOT NULL,
  `reference` varchar(700) NOT NULL,
  `goal` varchar(700) NOT NULL,
  `weight_loss` int(15) NOT NULL,
  `weight_gain` int(15) NOT NULL,
  `exercise` varchar(700) NOT NULL,
  `type` varchar(700) NOT NULL,
  `where_gym` varchar(1500) NOT NULL,
  `gym_time` varchar(500) NOT NULL,
  `package_offer` varchar(1500) NOT NULL,
  `remark` varchar(300) NOT NULL,
  `package_amount` decimal(15,2) NOT NULL,
  `enquiry_date` text NOT NULL,
  `follow_date` text NOT NULL,
  `last_follow_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_enquiry`
--

INSERT INTO `tbl_enquiry` (`id`, `cust_name`, `mobile`, `email`, `address`, `dob`, `age`, `gender`, `height_feet`, `height_inch`, `weight`, `occupation`, `reference`, `goal`, `weight_loss`, `weight_gain`, `exercise`, `type`, `where_gym`, `gym_time`, `package_offer`, `remark`, `package_amount`, `enquiry_date`, `follow_date`, `last_follow_date`) VALUES
(2, 'Nikhil Bhalerao', '9423979339', 'ndbhalerao91@gmail.com', 'Nashik', '2018-11-20', 25, 'Male', 0, 0, 34, 'Business', 'News paper', 'Strength Endurance', 0, 0, 'Yes', 'Jogging', '', '', 'Half Yearly', '', '0.00', '2018-11-30', '', '2018-12-11'),
(3, 'Nikita Bothra', '9512365444', 'niki@gmail.com', 'Nashik', '1914-12-13', 23, 'Female', 5, 2, 44, 'Business', 'Existing Member', 'Stress Management', 0, 0, 'Yes', 'Walking', '', '', 'Half Yearly', '', '0.00', '2018-12-07', '', ''),
(4, 'Akshay ', '7532146988', 'akshay@gmail.com', 'Nashik', '1994-12-10', 24, 'Male', 5, 5, 51, 'Service', 'Hoarding', 'Yoga', 0, 0, 'No', 'Walking', 'nashik', '2 hrs', 'Monthly', '\r\nouio', '100.00', '2018-12-10', '2018-12-15', '2018-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense`
--

CREATE TABLE `tbl_expense` (
  `id` int(11) NOT NULL,
  `item_name` varchar(600) NOT NULL,
  `purchase_shop_name` varchar(600) NOT NULL,
  `purchase_date` text NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `bill` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_expense`
--

INSERT INTO `tbl_expense` (`id`, `item_name`, `purchase_shop_name`, `purchase_date`, `price`, `bill`) VALUES
(1, 'item1', 'shop1', '2018-11-28', '100.00', '../uploadImage/Expense/sample.txt'),
(2, 'item2', 'shop2', '2018-12-06', '350.00', '../uploadImage/Expense/sample.txt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`id`, `name`, `description`) VALUES
(1, 'admin', 'admin'),
(2, 'Group1', 'Group1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_membership`
--

CREATE TABLE `tbl_membership` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `duration` varchar(600) NOT NULL,
  `details` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_membership`
--

INSERT INTO `tbl_membership` (`id`, `name`, `price`, `duration`, `details`) VALUES
(2, 'Fitness Mantra', '1000.00', '1 Month', 'To enjoy the glow of good health, you must exercise.'),
(3, 'fitness2', '150.00', '1 Month', 'good health'),
(6, 'Gold Plan', '1500.00', '3 Month', 'Best');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `display_name` varchar(200) NOT NULL,
  `operation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permission`
--

INSERT INTO `tbl_permission` (`id`, `name`, `display_name`, `operation`) VALUES
(1, 'manage_client', 'Manage Client', 'manage_client'),
(2, 'add_client', 'Add Client', 'add_client'),
(3, 'edit_client', 'Edit Client', 'edit_client'),
(4, 'delete_client', 'Delete Client', 'delete_client'),
(5, 'manage_subscription', 'Manage Subscription', 'manage_subscription'),
(6, 'add_subscription', 'Add Subscription', 'add_subscription'),
(7, 'edit_subscription', 'Edit Subscription', 'edit_subscription'),
(8, 'delete_subscription', 'Delete Subscription', 'delete_subscription'),
(9, 'manage_membership', 'Manage Membership', 'manage_membership'),
(10, 'add_membership', 'Add Membership', 'add_membership'),
(11, 'edit_membership', 'Edit Membership', 'edit_membership'),
(12, 'delete_membership', 'Delete Membership', 'delete_membership'),
(13, 'manage_enquiry', 'Manage Enquiry', 'manage_enquiry'),
(14, 'add_enquiry', 'Add Enquiry', 'add_enquiry'),
(15, 'edit_enquiry', 'Edit Enquiry', 'edit_enquiry'),
(16, 'delete_enquiry', 'Delete Enquiry', 'delete_enquiry'),
(17, 'manage_expense', 'Manage Expense', 'manage_expense'),
(18, 'add_expense', 'Add Expense', 'add_expense'),
(19, 'edit_expense', 'Edit Expense', 'edit_expense'),
(20, 'delete_expense', 'Delete Expense', 'delete_expense'),
(21, 'manage_reports', 'Manage Reports', 'manage_reports'),
(22, 'manage_attendance', 'Manage Attendance', 'manage_attendance'),
(23, 'manage_user', 'Manage User', 'manage_user'),
(24, 'add_user', 'Add User', 'add_user'),
(25, 'edit_user', 'Edit User', 'edit_user'),
(26, 'delete_user', 'Delete User', 'delete_user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission_role`
--

CREATE TABLE `tbl_permission_role` (
  `id` int(30) NOT NULL,
  `permission_id` int(30) NOT NULL,
  `role_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permission_role`
--

INSERT INTO `tbl_permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 1),
(22, 22, 1),
(23, 23, 1),
(24, 24, 1),
(25, 25, 1),
(26, 26, 1),
(40, 1, 2),
(41, 2, 2),
(42, 3, 2),
(43, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms_config`
--

CREATE TABLE `tbl_sms_config` (
  `smsid` int(20) NOT NULL,
  `senderid` int(20) NOT NULL,
  `sms_username` varchar(30) NOT NULL,
  `sms_password` varchar(20) NOT NULL,
  `auth_key` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sms_config`
--

INSERT INTO `tbl_sms_config` (`smsid`, `senderid`, `sms_username`, `sms_password`, `auth_key`) VALUES
(1, 101, 'username', 'password', 'dfrst3535');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscription`
--

CREATE TABLE `tbl_subscription` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `membership_id` varchar(200) NOT NULL,
  `membership_cost` varchar(200) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `registration_date` text NOT NULL,
  `start_date` text NOT NULL,
  `remark` varchar(200) NOT NULL,
  `discount` decimal(15,2) NOT NULL,
  `expiry_date` text NOT NULL,
  `more_payment_required` varchar(300) NOT NULL,
  `next_payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subscription`
--

INSERT INTO `tbl_subscription` (`id`, `user_id`, `membership_id`, `membership_cost`, `amount`, `registration_date`, `start_date`, `remark`, `discount`, `expiry_date`, `more_payment_required`, `next_payment_date`) VALUES
(1, '2', '2', '1000', '1000.00', '2018-12-06', '2018-12-20', 'sada', '0.00', '2019-01-20', 'Yes', '2018-12-06'),
(2, '4', '6', '1500', '1500.00', '2018-12-07', '2018-12-12', 'remark', '0.00', '2018-12-12', 'No', ''),
(3, '1', '2', '1000', '1000.00', '2018-12-10', '2018-12-15', '', '0.00', '2018-12-15', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_website`
--
ALTER TABLE `manage_website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_deposit`
--
ALTER TABLE `tbl_deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_email_config`
--
ALTER TABLE `tbl_email_config`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_permission_role`
--
ALTER TABLE `tbl_permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sms_config`
--
ALTER TABLE `tbl_sms_config`
  ADD PRIMARY KEY (`smsid`);

--
-- Indexes for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manage_website`
--
ALTER TABLE `manage_website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_deposit`
--
ALTER TABLE `tbl_deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_email_config`
--
ALTER TABLE `tbl_email_config`
  MODIFY `e_id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_permission_role`
--
ALTER TABLE `tbl_permission_role`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_sms_config`
--
ALTER TABLE `tbl_sms_config`
  MODIFY `smsid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
