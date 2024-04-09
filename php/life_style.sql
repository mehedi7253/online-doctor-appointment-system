-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 12:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `life_style`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `image`) VALUES
(1, 'admin@gmail.com', 'admin', 'fr-05.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ambulance_invoice`
--

CREATE TABLE `ambulance_invoice` (
  `ambulance_invoice` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `ambulance_service_id` int(11) NOT NULL,
  `book_ambulance_id` int(11) NOT NULL,
  `going_address` varchar(255) NOT NULL,
  `payble` float NOT NULL,
  `total_pay` float NOT NULL,
  `payment_date` date NOT NULL,
  `payment_by` varchar(255) NOT NULL,
  `payment_sts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ambulance_invoice`
--

INSERT INTO `ambulance_invoice` (`ambulance_invoice`, `patient_id`, `ambulance_service_id`, `book_ambulance_id`, `going_address`, `payble`, `total_pay`, `payment_date`, `payment_by`, `payment_sts`) VALUES
(8, 1, 9, 6, 'Dhaka Samarita Hospital', 1000, 1000, '2020-08-17', '01941697253', 1),
(10, 1, 8, 8, 'Square Hospital', 1000, 1000, '2020-08-17', '01755412142', 1),
(11, 5, 8, 9, 'Bugura', 5500, 5500, '2020-08-17', '017255452153', 1),
(15, 1, 8, 10, 'Chandpur', 2500, 2500, '2020-09-01', '01755374793', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambulance_service`
--

CREATE TABLE `ambulance_service` (
  `ambulance_service_id` int(11) NOT NULL,
  `driver_name` varchar(255) NOT NULL,
  `driver_phone` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `car_number` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `driving_licinence` varchar(255) NOT NULL,
  `driver_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ambulance_service`
--

INSERT INTO `ambulance_service` (`ambulance_service_id`, `driver_name`, `driver_phone`, `description`, `car_number`, `price`, `status`, `image`, `driving_licinence`, `driver_image`) VALUES
(8, 'Showkuet Hyeder Talukdar', '01755374793', 'Ac Service car', 'Dhaka Metro - Ka/1226', 'Out Site Dhaka negotiable & in Dhaka 1000 T.K', 0, 'Toyota-Hiace-Ambulance2.jpg', 'motorcycle-driving-license-in-bangladesh.jpg', 'torikul.da655841.jpg'),
(9, 'Asif Ali', '01411441445', 'Non Ac Car', 'DH  Ka121', '500', 0, 'slide-new-car.jpg', 'driving-licence-1.jpg', 'rahman.5a42fa13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoinment_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `charge` float NOT NULL,
  `status` int(11) NOT NULL,
  `notify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoinment_id`, `patient_id`, `doctor_id`, `date`, `charge`, `status`, `notify`) VALUES
(14, 1, 2, '2020-08-09', 1000, 0, 1),
(19, 5, 1, '2020-08-10', 500, 3, 1),
(20, 1, 1, '2020-08-17', 500, 3, 1),
(21, 1, 9, '2020-08-28', 650, 3, 1),
(22, 1, 12, '2020-08-29', 600, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_invoice`
--

CREATE TABLE `appointment_invoice` (
  `appointment_invoice_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `bkash_number` varchar(255) NOT NULL,
  `payable` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment_invoice`
--

INSERT INTO `appointment_invoice` (`appointment_invoice_id`, `patient_id`, `doctor_id`, `appointment_id`, `payment_date`, `bkash_number`, `payable`, `status`) VALUES
(3, 1, 2, 14, '2020-08-17', '01755374793', 1000, 1),
(5, 1, 1, 20, '2020-08-18', '01941697253', 500, 1),
(6, 1, 12, 22, '2020-09-01', '01755374793', 600, 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_ambulance`
--

CREATE TABLE `book_ambulance` (
  `book_ambulance_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `ambulance_service_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `going_address` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_ambulance`
--

INSERT INTO `book_ambulance` (`book_ambulance_id`, `patient_id`, `ambulance_service_id`, `booking_date`, `going_address`, `price`, `status`) VALUES
(6, 1, 9, '2020-08-16', 'Dhaka Samarita Hospital', '1000', 2),
(8, 1, 8, '2020-08-16', 'Square Hospital', '1000', 2),
(9, 5, 8, '2020-08-17', 'Bugura', 'negotiable', 2),
(10, 1, 8, '2020-09-01', 'Chandpur', 'negotiable', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `message` varchar(300) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `to_id` int(11) NOT NULL,
  `msg_notify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chat_id`, `m_name`, `msg_id`, `message`, `image`, `date_time`, `to_id`, `msg_notify`) VALUES
(43, 'mehedi hasan', 1, 'helo', 'rsz_img_2225-01.jpg', '2020-08-18 13:14:32', 1, 1),
(44, 'mehedi hasan', 1, 'hel', 'rsz_img_2225-01.jpg', '2020-08-18 13:18:15', 1, 1),
(50, 'moin kabir', 5, 'hi im moin kabir', '1.jpg', '2020-08-18 13:24:57', 1, 1),
(51, 'moin kabir', 5, 'i', '1.jpg', '2020-08-18 13:30:07', 1, 1),
(52, 'mehedi hasan', 5, 'ok i m doctor', 'rsz_img_2225-01.jpg', '2020-08-18 14:56:09', 1, 1),
(53, 'mehedi hasan', 5, 'tell me', 'rsz_img_2225-01.jpg', '2020-08-18 14:57:19', 1, 1),
(54, 'moin kabir', 5, 'i have a problem about corona', '1.jpg', '2020-08-18 14:59:36', 1, 1),
(55, 'mehedi hasan', 5, 'ok you will take scabo 6 mg tablet', 'rsz_img_2225-01.jpg', '2020-08-18 14:59:58', 1, 1),
(56, 'moin kabir', 5, 'heloow im moin', '1.jpg', '2020-08-18 15:04:49', 2, 1),
(57, 'Abdullah  Kashem', 5, 'helo', '1.jpg', '2020-08-18 15:05:16', 2, 1),
(58, 'mehedi hasan', 1, 'heloow kashem', 'rsz_img_2225-01.jpg', '2020-08-29 13:06:24', 2, 1),
(59, 'Abdullah  Kashem', 1, 'i m kashem', '1.jpg', '2020-08-29 13:07:15', 2, 1),
(60, 'Abdullah  Kashem', 1, 'df', '1.jpg', '2020-08-29 13:11:27', 2, 1),
(61, 'mehedi hasan', 1, 'sd', 'rsz_img_2225-01.jpg', '2020-09-01 09:10:38', 2, 1),
(62, 'mehedi hasan', 1, 'doct', 'rsz_img_2225-01.jpg', '2020-08-29 10:30:05', 8, 0),
(63, 'mehedi hasan', 1, 'nutr', 'rsz_img_2225-01.jpg', '2020-08-29 14:55:55', 9, 1),
(64, 'mehedi hasan', 1, 'ok', '1.jpg', '2020-08-29 14:56:08', 9, 1),
(65, 'mehedi hasan', 1, 'psychologist', 'rsz_img_2225-01.jpg', '2020-08-29 15:02:46', 12, 1),
(66, 'mr jhon', 1, 'ok', '1.jpg', '2020-08-29 15:02:58', 12, 1),
(75, 'mehedi hasan', 1, 'helow', 'rsz_img_2225-01.jpg', '2020-09-01 04:55:11', 11111, 0),
(77, 'saiefur rahman', 1, 'i am social worker', '1.jpg', '2020-09-01 05:08:41', 11111, 0),
(78, 'saiefur rahman', 11111, 'helow i am social worker', '1.jpg', '2020-09-01 09:10:38', 2, 1),
(79, 'Abdullah  Kashem', 11111, 'ok i am doctor ', '1.jpg', '2020-09-01 09:10:59', 2, 1),
(80, 'saiefur rahman', 11111, 'i am social worker', '1.jpg', '2020-09-01 09:11:43', 9, 1),
(81, 'mehedi hasan', 11111, 'ok i am nutration', '1.jpg', '2020-09-01 09:30:37', 9, 0),
(82, 'saiefur rahman', 11111, 'hey i am social worker', '1.jpg', '2020-09-01 09:12:59', 12, 1),
(83, 'mr jhon', 11111, 'ok i am physiologist ', '1.jpg', '2020-09-01 09:13:24', 12, 1),
(90, 'mehedi hasan', 1, 'helow', 'rsz_img_2225-01.jpg', '2020-09-01 09:49:23', 11113, 1),
(91, 'abu saem', 1, 'pls tell me', '1.jpg', '2020-09-01 09:50:09', 11113, 1),
(92, 'abu saem', 11113, 'hey jhon', '1.jpg', '2020-09-01 09:52:29', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `complain_box`
--

CREATE TABLE `complain_box` (
  `complain_id` int(11) NOT NULL,
  `complain_for` varchar(255) NOT NULL,
  `issue` varchar(255) NOT NULL,
  `complain` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complain_box`
--

INSERT INTO `complain_box` (`complain_id`, `complain_for`, `issue`, `complain`, `date`) VALUES
(1, 'Medicine', 'not deleverd', '<p><b>Invoice number: Med_000121 </b>not delivered.</p>', '2020-08-29'),
(3, 'Ambulance', 'payment problem', '<p>Payment problem please solve this inoice <b>\"11111\". Thank you</b></p>', '2020-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `join_date` date NOT NULL,
  `charge` float NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `first_name`, `last_name`, `email`, `phone`, `degree`, `gender`, `address`, `password`, `image`, `status`, `join_date`, `charge`, `schedule`, `category`) VALUES
(1, 'mehedi', 'hasan', 'mehedi@gmail.com', '01941697253', 'P.h.d', 'Male', 'Panthapth', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'rsz_img_2225-01.jpg', 0, '2020-08-05', 500, 'Evening', 'doctor'),
(2, 'Abdullah ', 'Kashem', 'kashem@gmail.com', '0155444444', 'MBBS', 'Male', 'panthapath', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1.jpg', 0, '2020-08-02', 1000, 'morning', 'doctor'),
(8, 'Mahbub', 'Rhaman', 'mahbub@gmail.com', '01745742142', 'MBBS', '', '', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1.jpg', 0, '2020-08-18', 550, '', 'doctor'),
(9, 'mehedi', 'hasan', 'mehedi221@gmail.com', '01421421452', 'P.hd', 'Male', 'Merul Baadda la/11', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1.jpg', 0, '2020-08-18', 650, 'Night', 'nutrition'),
(12, 'mr', 'jhon', 'jhon@gmail.com', '01245242541', 'M.BBS', '', '', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1.jpg', 0, '2020-08-29', 600, '', 'psychologist'),
(13, 'md', 'ibrahim', 'ibrhim@gmail.com', '01214245214444', 'MBBS', '', '', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1.jpg', 0, '2020-08-29', 0, '', 'doctor'),
(14, 'sd', 'sd', 's@gmail.com', '2', 'ws', '', '', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '7d63d371-1e23-4a9c-8875-6a9e98f1f7991568193468392-Deewa-Printed-Jumpsuit-1581568193467754-4.jpg', 0, '2020-08-29', 0, '', 'nutrition'),
(15, 'alamin', 'akanda', 'alamin@gmail.com', '0184245241', 'PHD', '', '', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'torikul.da655841.jpg', 0, '2020-08-29', 0, '', 'psychologist');

-- --------------------------------------------------------

--
-- Table structure for table `global_msg`
--

CREATE TABLE `global_msg` (
  `global_msg_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `global_msg`
--

INSERT INTO `global_msg` (`global_msg_id`, `name`, `phone`, `msg`, `date`) VALUES
(1, 'mehedi', 'mehedi@gmail.com', 'i m mehedi', '2020-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medecine_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medecine_id`, `name`, `price`, `description`, `image`, `status`) VALUES
(4, 'Napa Extra', '100.50', 'asdda', 'unnamed.jpg', 0),
(6, 'Ace', '50', 'Ace', 'SQU0003-600x400.jpg', 0),
(7, 'Scabo', '150', 'Scabo Tablet 6 mg', '2018-04-07_142126.239104scabo6mgtablet_5ac211d43c61c-.82707.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_buy`
--

CREATE TABLE `medicine_buy` (
  `medicine_sell_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine_buy`
--

INSERT INTO `medicine_buy` (`medicine_sell_id`, `medicine_id`, `patient_id`, `quantity`, `date`, `status`, `price`) VALUES
(22, 7, 5, 2, '0000-00-00', 0, 150);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_invoice`
--

CREATE TABLE `medicine_invoice` (
  `medicine_invoice_id` int(255) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `shiping_address` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `med_invoice` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine_invoice`
--

INSERT INTO `medicine_invoice` (`medicine_invoice_id`, `patient_id`, `medicine_id`, `quantity`, `price`, `shiping_address`, `note`, `status`, `date`, `med_invoice`) VALUES
(13, 1, 4, 4, 100.5, 'Panthapth 59/7 A, Dhaka, 11', 'mehedi hasan', 1, '2020-08-14 12:13:10', 563305),
(14, 1, 6, 5, 50, 'Panthapth 59/7 A, Dhaka, 11', 'mehedi hasan', 1, '2020-08-14 12:13:10', 563305),
(16, 5, 4, 10, 100.5, 'Bugura, Bgura, ', 'moin', 1, '2020-08-14 12:14:28', 170199),
(20, 5, 6, 50, 50, 'Bugura, Bgura, ', '', 1, '2020-08-14 12:29:58', 720551),
(21, 1, 7, 4, 150, 'Panthapth 59/7 A, Dhaka, 11', '', 1, '2020-08-14 16:55:20', 499661),
(22, 1, 6, 6, 50, 'Panthapth 59/7 A, Dhaka, 11', '', 1, '2020-08-14 16:55:20', 499661),
(25, 5, 7, 2, 150, 'Bugura, Bgura, 5511', '', 1, '2020-08-17 09:30:20', 764405),
(26, 1, 7, 40, 150, 'Panthapth 59/7 A, Dhaka, 11', '', 1, '2020-08-27 09:14:34', 250376),
(27, 1, 4, 2, 100.5, 'Panthapth 59/7 A, Dhaka, 11', '', 1, '2020-08-28 16:44:57', 681720),
(28, 1, 4, 2, 100.5, 'Panthapth 59/7 A, Dhaka, 11', '', 1, '2020-08-28 16:46:21', 521561),
(29, 1, 7, 9, 150, 'Panthapth 59/7 A, Dhaka, 11', 'order test', 1, '2020-09-01 10:28:03', 564922),
(30, 1, 7, 9, 150, 'Panthapth 59/7 A, Dhaka, 11', 'ok', 1, '2020-09-01 10:31:48', 983677),
(31, 1, 4, 2, 100.5, 'Panthapth 59/7 A, Dhaka, 11', 'ok', 1, '2020-09-01 10:31:48', 983677),
(32, 1, 6, 3, 50, 'Panthapth 59/7 A, Dhaka, 11', 'ok', 1, '2020-09-01 10:31:48', 983677);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `ps` varchar(255) NOT NULL,
  `postal` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `ps`, `postal`, `date_of_birth`, `gender`, `image`, `password`, `status`, `join_date`) VALUES
(1, 'mehedi', 'hasan', 'mehedi@gmail.com', '01941697253', 'Panthapth 59/7 A', 'Dhaka', 'Tejgown', '11', '1996-12-12', 'Male', 'rsz_img_2225-01.jpg', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, '2020-08-09'),
(2, 'abdullah', 'kashem', 'kashem@gmail.com', '017553747931', 'west raza bazar', 'dhaka', 'dhanmondi', '1212', '1995-11-22', 'Male', '1.jpg', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, '2020-08-09'),
(5, 'moin', 'kabir', 'moin@gmail.com', '01755241421', 'Bugura', 'Bgura', 'bugura Sadar', '5511', '1996-11-02', 'Male', '1.jpg', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 0, '2020-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `payment_medicine`
--

CREATE TABLE `payment_medicine` (
  `payment_medicine_id` int(11) NOT NULL,
  `med_invoice` int(255) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `total_price` float NOT NULL,
  `bkas_number` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_medicine`
--

INSERT INTO `payment_medicine` (`payment_medicine_id`, `med_invoice`, `patient_id`, `shipping_address`, `total_price`, `bkas_number`, `status`, `payment_status`, `date`) VALUES
(20, 170199, 5, 'Bugura, Bgura, ', 1105, '01755374793', 3, 1, '2020-08-15'),
(21, 720551, 5, 'Bugura, Bgura, ', 2600, '6546546854', 3, 1, '2020-08-15'),
(22, 499661, 1, 'Panthapth 59/7 A, Dhaka, 11', 1100, '01941697253', 3, 1, '2020-08-15'),
(26, 764405, 5, 'Bugura, Bgura, 5511', 400, '01941697253', 1, 1, '2020-08-17'),
(28, 250376, 1, 'Panthapth 59/7 A, Dhaka, 11', 6100, '0174514241', 0, 1, '2020-08-27'),
(29, 681720, 1, 'Panthapth 59/7 A, Dhaka, 11', 301, '018218433288', 0, 1, '2020-08-28'),
(30, 564922, 1, 'Panthapth 59/7 A, Dhaka, 11', 1450, '01755374793', 1, 1, '2020-09-01'),
(31, 983677, 1, 'Panthapth 59/7 A, Dhaka, 11', 2001, '01941697253', 3, 1, '2020-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE `post_comment` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `user_comment_id` int(11) NOT NULL,
  `comment_name` varchar(225) NOT NULL,
  `comment_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_comment`
--

INSERT INTO `post_comment` (`comment_id`, `post_id`, `comment`, `user_comment_id`, `comment_name`, `comment_image`) VALUES
(40, 4, 'ok1', 1, 'mehedi hasan', 'rsz_img_2225-01.jpg'),
(41, 4, 'ok1', 1, 'mehedi hasan', 'rsz_img_2225-01.jpg'),
(42, 4, 'ok1', 1, 'mehedi hasan', 'rsz_img_2225-01.jpg'),
(43, 5, 'wordpress', 1, 'mehedi hasan', 'rsz_img_2225-01.jpg'),
(44, 5, 'wordpress', 1, 'mehedi hasan', 'rsz_img_2225-01.jpg'),
(45, 5, 'wordpress', 1, 'mehedi hasan', 'rsz_img_2225-01.jpg'),
(46, 5, 'ha ha ha', 1, 'saiefur rahman', '1.jpg'),
(47, 5, 'ha ha ha', 1, 'saiefur rahman', '1.jpg'),
(48, 5, 'ha ha ha', 1, 'saiefur rahman', '1.jpg'),
(49, 5, 'ha ha ha', 1, 'saiefur rahman', '1.jpg'),
(50, 9, 'heloww ', 11111, 'saiefur rahman', '1.jpg'),
(51, 9, 'heloww ', 11111, 'saiefur rahman', '1.jpg'),
(52, 9, 'heloww ', 11111, 'saiefur rahman', '1.jpg'),
(53, 9, 'heloww ', 11111, 'saiefur rahman', '1.jpg'),
(54, 9, 'heloww ', 11111, 'saiefur rahman', '1.jpg'),
(55, 9, 'helo', 11113, 'abu saem', '1.jpg'),
(56, 9, 'helo', 11113, 'abu saem', '1.jpg'),
(57, 9, 'helo', 11113, 'abu saem', '1.jpg'),
(58, 9, 'helo', 11113, 'abu saem', '1.jpg'),
(59, 9, 'helo', 11113, 'abu saem', '1.jpg'),
(60, 7, 'helo', 1, 'mehedi hasan', 'rsz_img_2225-01.jpg'),
(61, 7, 'helo', 1, 'mehedi hasan', 'rsz_img_2225-01.jpg'),
(62, 7, 'helo', 1, 'mehedi hasan', 'rsz_img_2225-01.jpg'),
(63, 7, 'helo', 1, 'mehedi hasan', 'rsz_img_2225-01.jpg'),
(64, 7, 'helo', 1, 'mehedi hasan', 'rsz_img_2225-01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `social_feed`
--

CREATE TABLE `social_feed` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `post_desc` text NOT NULL,
  `date` date NOT NULL,
  `notify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social_feed`
--

INSERT INTO `social_feed` (`post_id`, `user_id`, `user_name`, `user_image`, `post_desc`, `date`, `notify`) VALUES
(4, 1, 'mehedi hasan', 'rsz_img_2225-01.jpg', 'skjbdfsabdf sdbfskadf', '2020-08-30', 0),
(5, 1, 'mehedi hasan', 'rsz_img_2225-01.jpg', 'As a WordPress developer, whenever you build a new theme, plugin or even if you are testing out new features of WordPress that you might not be familiar with. There’s one task that get’s extremely repetitive, cumbersome and mundane.\r\n\r\nYou will always need to create some custom dummy data to test whether your plugin is working as expected, and as developers ourselves we have had this problem quite a lot. Thankfully, there are easy ways to solve it.\r\n\r\nThe usual way people tend to do this is either hire someone on Fiverr, to create all this dummy text or as a WordPress developer you’ll need to perform the task of filling up an empty theme with dummy content yourself.\r\n\r\nOur goal with this post is to help you to alleviate this time-consuming aspect of the development process', '2020-08-30', 0),
(6, 1, 'mehedi hasan', 'rsz_img_2225-01.jpg', 'fdhfdghfdgh', '2020-08-30', 0),
(7, 1, 'saiefur rahman', '1.jpg', 'hellow evrey one', '2020-08-30', 0),
(9, 11111, 'saiefur rahman', '1.jpg', 'hellow evrey one hellow evrey one hellow evrey one hellow evrey one hellow evrey one hellow evrey one hellow evrey one', '2020-08-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_worker`
--

CREATE TABLE `social_worker` (
  `worker_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social_worker`
--

INSERT INTO `social_worker` (`worker_id`, `first_name`, `last_name`, `email`, `phone`, `address`, `gender`, `image`, `password`, `date`) VALUES
(11111, 'saiefur', 'rahman', 'saiefur@gmail.com', '01785421421', 'panthaptah', 'Male', '1.jpg', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2020-08-30'),
(11113, 'abu', 'saem', 'saem@gmail.com', '014245242', 'panthapath ', 'Male', '1.jpg', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2020-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `update_box`
--

CREATE TABLE `update_box` (
  `update_box_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `patinet_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `current_weight` float NOT NULL,
  `patient_age` varchar(11) NOT NULL,
  `prev_weight` float NOT NULL,
  `mental_support` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `update_box`
--

INSERT INTO `update_box` (`update_box_id`, `appointment_id`, `patinet_id`, `doctor_id`, `current_weight`, `patient_age`, `prev_weight`, `mental_support`, `date`) VALUES
(6, 21, 1, 9, 90, '23', 95, 'Loss Your Weight', '2020-08-28'),
(7, 22, 1, 12, 74, '25', 75, 'Loss weight ', '2020-09-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambulance_invoice`
--
ALTER TABLE `ambulance_invoice`
  ADD PRIMARY KEY (`ambulance_invoice`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `ambulance_service_id` (`ambulance_service_id`),
  ADD KEY `book_ambulance_id` (`book_ambulance_id`);

--
-- Indexes for table `ambulance_service`
--
ALTER TABLE `ambulance_service`
  ADD PRIMARY KEY (`ambulance_service_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoinment_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `appointment_invoice`
--
ALTER TABLE `appointment_invoice`
  ADD PRIMARY KEY (`appointment_invoice_id`),
  ADD KEY `appointment_invoice_ibfk_1` (`patient_id`),
  ADD KEY `appointment_id` (`appointment_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `book_ambulance`
--
ALTER TABLE `book_ambulance`
  ADD PRIMARY KEY (`book_ambulance_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `ambulance_service_id` (`ambulance_service_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `to_id` (`to_id`),
  ADD KEY `msg_id` (`msg_id`);

--
-- Indexes for table `complain_box`
--
ALTER TABLE `complain_box`
  ADD PRIMARY KEY (`complain_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `global_msg`
--
ALTER TABLE `global_msg`
  ADD PRIMARY KEY (`global_msg_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medecine_id`);

--
-- Indexes for table `medicine_buy`
--
ALTER TABLE `medicine_buy`
  ADD PRIMARY KEY (`medicine_sell_id`),
  ADD KEY `medicine_id` (`medicine_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `medicine_invoice`
--
ALTER TABLE `medicine_invoice`
  ADD PRIMARY KEY (`medicine_invoice_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `medicine_id` (`medicine_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `payment_medicine`
--
ALTER TABLE `payment_medicine`
  ADD PRIMARY KEY (`payment_medicine_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `social_feed`
--
ALTER TABLE `social_feed`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `patient_id` (`user_id`);

--
-- Indexes for table `social_worker`
--
ALTER TABLE `social_worker`
  ADD PRIMARY KEY (`worker_id`);

--
-- Indexes for table `update_box`
--
ALTER TABLE `update_box`
  ADD PRIMARY KEY (`update_box_id`),
  ADD KEY `patinet_id` (`patinet_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `appointment_id` (`appointment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ambulance_invoice`
--
ALTER TABLE `ambulance_invoice`
  MODIFY `ambulance_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ambulance_service`
--
ALTER TABLE `ambulance_service`
  MODIFY `ambulance_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoinment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `appointment_invoice`
--
ALTER TABLE `appointment_invoice`
  MODIFY `appointment_invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_ambulance`
--
ALTER TABLE `book_ambulance`
  MODIFY `book_ambulance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `complain_box`
--
ALTER TABLE `complain_box`
  MODIFY `complain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `global_msg`
--
ALTER TABLE `global_msg`
  MODIFY `global_msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medecine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medicine_buy`
--
ALTER TABLE `medicine_buy`
  MODIFY `medicine_sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `medicine_invoice`
--
ALTER TABLE `medicine_invoice`
  MODIFY `medicine_invoice_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_medicine`
--
ALTER TABLE `payment_medicine`
  MODIFY `payment_medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `social_feed`
--
ALTER TABLE `social_feed`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `social_worker`
--
ALTER TABLE `social_worker`
  MODIFY `worker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11114;

--
-- AUTO_INCREMENT for table `update_box`
--
ALTER TABLE `update_box`
  MODIFY `update_box_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ambulance_invoice`
--
ALTER TABLE `ambulance_invoice`
  ADD CONSTRAINT `ambulance_invoice_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ambulance_invoice_ibfk_2` FOREIGN KEY (`ambulance_service_id`) REFERENCES `ambulance_service` (`ambulance_service_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ambulance_invoice_ibfk_3` FOREIGN KEY (`book_ambulance_id`) REFERENCES `book_ambulance` (`book_ambulance_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON UPDATE CASCADE;

--
-- Constraints for table `appointment_invoice`
--
ALTER TABLE `appointment_invoice`
  ADD CONSTRAINT `appointment_invoice_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_invoice_ibfk_2` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`appoinment_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_invoice_ibfk_3` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `book_ambulance`
--
ALTER TABLE `book_ambulance`
  ADD CONSTRAINT `book_ambulance_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ambulance_ibfk_2` FOREIGN KEY (`ambulance_service_id`) REFERENCES `ambulance_service` (`ambulance_service_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `medicine_buy`
--
ALTER TABLE `medicine_buy`
  ADD CONSTRAINT `medicine_buy_ibfk_1` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medecine_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `medicine_buy_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON UPDATE CASCADE;

--
-- Constraints for table `medicine_invoice`
--
ALTER TABLE `medicine_invoice`
  ADD CONSTRAINT `medicine_invoice_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `medicine_invoice_ibfk_3` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medecine_id`) ON UPDATE CASCADE;

--
-- Constraints for table `payment_medicine`
--
ALTER TABLE `payment_medicine`
  ADD CONSTRAINT `payment_medicine_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD CONSTRAINT `post_comment_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `social_feed` (`post_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `update_box`
--
ALTER TABLE `update_box`
  ADD CONSTRAINT `update_box_ibfk_1` FOREIGN KEY (`patinet_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `update_box_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `update_box_ibfk_3` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`appoinment_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
