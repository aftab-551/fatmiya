-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 09:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fatimiya_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `askhazrats`
--

CREATE TABLE `askhazrats` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(500) DEFAULT NULL,
  `question` varchar(1250) DEFAULT NULL,
  `answer` varchar(1250) DEFAULT NULL,
  `isAnswered` int(1) NOT NULL DEFAULT 0,
  `created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `askhazrats`
--

INSERT INTO `askhazrats` (`id`, `name`, `email`, `subject`, `question`, `answer`, `isAnswered`, `created`) VALUES
(1, 'faisal abbasi', 'faisalabbasi@hotmail.com', 'Alhamdolilah', 'Assalamo Elekum Khurram Bhai\r\n\r\nFirst of all i really thankfull to Allah Pak and you and Naseem Bhai , for the support and duwas .\r\nBy your duwas Alhamdolilah , i , m much better now , working as  head master in islamic school \"Al Quran Iqra Public Secondary School dunyawi education main.\r\n\r\nFor those students who are free from \"nazra\" , \"tajweed.\" and they are looking for job ...i teach them English , and preparing them to get the job other then \"mozazin or imam\" in corporate sectors or even help them to develop the skills like web designing,or IT segments .\r\n\r\nMy vision is to get them sufficient in their prospective fields, side by side as per their interest , provide and deliver my expertise and knowledge  to get their place in this competitive world. \r\nFrom my experience , i learned that to get someone establish or to provide that tools which the person needed most  for survive in this world as this is a noble cause..\r\n\r\nPray for all who have suffered and still suffering that Allah Pak provide them a better rozgar and health.Aameen.\r\n\r\nRegards \r\n\r\nFaisal Abbasi\r\n.\r\n\r\n', 'OK INSHAALLAH', 1, '2018-01-21 11:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) NOT NULL,
  `selector` char(12) DEFAULT NULL,
  `hashed_validator` char(64) DEFAULT NULL,
  `userid` varchar(255) NOT NULL,
  `expires` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_tokens`
--

INSERT INTO `auth_tokens` (`id`, `selector`, `hashed_validator`, `userid`, `expires`) VALUES
(3, 'IU19doiRaYpA', 'f17c1660aac9082bf89c5bf9e0f4aa1ac20f64d8b62f10ab8f4ce6ec05e00cc0', 'FICS-21-13', '2021-09-11 11:27:50'),
(4, 'aoJ/+TlPi6AG', 'edf290bb1105b09288f6a6e07b41d3af104790d1d66d1825fb59799d40f805fc', 'FICS-21-13', '2021-09-11 13:43:26'),
(5, 'TxgsbJ3eE0qI', '0650831e8af90ad14e2619fe6b5314fa6b94618e64e0148e9cd4b6c0a5f7548c', 'FICS-21-13', '2021-09-11 13:46:26'),
(6, 'EfIRHymN59cc', '1db507685e427448411a9dd0699eb1128cdcccd6f9e819d0372c588b9dca925d', 'FICS-21-13', '2021-09-12 15:26:16'),
(7, 'D/r7DhUQBe8M', '89f0cdebfc68fed7924f5afac9f9c82c9b8fbcdbd3d792c07b179fbafdaad645', 'FICS-21-13', '2021-09-12 15:26:53'),
(8, 'ruCDg/ndq2yW', '7a671a455bfd9087ab2c646b0ca7a1f7127a74dbc8ac1dc3fb9a03bfac3003ea', 'FICS-21-13', '2021-09-12 15:30:14'),
(9, 'VmsvkZDYXeYu', 'd57bd210cb9c19bb1c5cda5d6547c73b4164ba256abee94cd585edd7a1399320', 'FICS-21-13', '2021-09-12 16:03:59'),
(10, 'ZEHgYNkdHS5O', 'd0be20546333a73bc3f74359102778e87444be8575df125bab2110d88a9a5c0e', 'FICS-21-14', '2021-09-12 16:16:47'),
(11, '8oXcPLtFxGKi', '832b49fff66df8516402b54d7a1f7d41ac9e771ebfe424596a1ae356d7955cea', '5', '2021-09-23 13:14:15'),
(12, 'Anqet/zynx6P', 'd2f07fe89012f9084f292e38624d5a68d90054dda4875bd12fb5b3953f9e22ab', 'FICS-21-13', '2021-09-23 13:23:32'),
(13, 'uANUo+eLInj2', 'de148f3d566274fa2159b21a9de2ba299e1759759250a7823d4315aad4cae5a7', '5', '2021-10-03 09:46:17'),
(14, 'z3bWFIMMPSnV', '1874fd7d0d700b6084eb99f68e7a3dc1dee92eedf9225703ffc7b236bed8dd39', 'FICS-21-13', '2021-10-12 13:24:23'),
(15, '5GS9SRV9HaLr', '87ccddf41642f94c4438a11483ad03e23b99d5afb2d4a17927582809ed95cf2b', '5', '2021-10-14 10:50:44'),
(16, 'ZN77u3EEA7dd', '279a83a54dff71ce547fde23038f8991ada91e3b7be651b8d130eda7e6bab28a', '5', '2021-10-16 10:32:50'),
(17, 'Ac9Qd2Tt99tG', 'a2939690f26f636f586a58002f845075b5a3ce5fcbe7781a5fa857b1077e90af', '5', '2021-10-17 14:29:34'),
(18, 'MonW8u4PmW7q', '715c3091b8c3e69c55cb56e7d595453c66e3ead9ebc1e6170dac2705baa7b2d5', '5', '2022-01-07 10:53:11'),
(19, '/IsgPYMDuTGP', 'def80198c14f59ce66c1794165a7afcc50886ed9a960f0b42915903a0b11fd5e', '5', '2022-01-09 11:47:53'),
(20, 's9q5Zm9LIm8x', 'f2e4b8dd06a3e7d5bc4c390964748e3fb1c444659138702110f76daefae5a56a', '5', '2022-01-19 15:03:46'),
(21, 'tvKkr4oyVFmC', 'bc3b263fae535410ebdc6cf85d285537fb7c7fbcbf49d5ff0aaa2978f7569a19', '5', '2022-02-05 12:24:01'),
(22, 'gLdhoEPbX297', 'bfedd1661bbc4e0682526f072822337e99dd396d1c349a62dda8fc5111368e4c', '5', '2022-07-17 13:29:12'),
(23, 'b/7LQHlU2AnQ', 'd7b0b9821829eb994a24c39a72ee8b55fbdcdd2010a4f232098311fff83c5e77', '5', '2022-07-17 20:26:09'),
(24, 'U8jRAJU116yl', '0d57f0da24a5256d6ccccf1a36458f58f56f9db9a0b1a53e9c83cea9a1bbfb4e', '5', '2022-09-08 19:50:03'),
(25, 'r8KbnXvhlql3', '67dc6d72afa088bb6cb5de38da34fe82bec4f897985bf11adc85e0b7d928be54', '5', '2022-09-17 07:10:38'),
(26, 'cL95i57Sdg+l', '628c344c7fe605b131b1e073a087cb312915f6e22351af09ad204fdb0f704bad', '5', '2022-09-17 13:05:48'),
(27, '9/byP5WXT1v6', '2c5e22935774c197d8ffcf12a6094ed44babca528e3bbea4d0bd74b785a76efa', 'FICS-21-13', '2022-10-30 09:08:42'),
(28, '3rHR64xikZzX', '73f145fe1bc5b11c82b5ebd9d70466d8a2de69605a9198417c4a36d388474fb7', '5', '2022-10-30 09:12:25'),
(29, 'YbSDHjOPif3w', '05c44dc1797b13d354d3ad0b5f0ac07fb38a33cd6ab88952cc6b1c8b59032588', 'FICS-21-14', '2022-10-31 14:04:01'),
(30, '5134K8Bd8EPU', 'b671f3284efa7be06f0ae0843090ed0f739775e2adf0cf19cf90c915309c6ffb', 'FICS-21-14', '2022-11-04 19:59:25'),
(31, 'GzCgSWgFPmM6', 'dbebc7f1154af906f6a93ee55b914c5a439020978a7bf0605ee952a201d42bf9', '5', '2022-11-04 19:59:42'),
(32, 'ZaRk3esGv+zs', 'ea36bc06a8b9a1aca608f44fa5da04e0846c161a319c5a3cbbac76f29fdfaff9', '5', '2022-11-17 08:02:19'),
(33, 'yObaqAPZkq9J', '9e371eef640cbb58254451ae7fc054838cbf87184438f8e98e8ff1fc7e938169', 'FICS-21-14', '2022-11-18 07:05:16'),
(34, 'jLPkBWRd/+z8', 'bb5b25493281e73841a6e76d868278a3bf1ec3c44d94f1f9096becbdd2f0ebca', '5', '2022-11-27 18:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(15) NOT NULL,
  `number` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Batch-02', 0, '2021-08-10 07:28:00', '2021-08-21 14:01:05'),
(2, 'Batch-01', 1, '2021-08-10 10:22:20', '2021-08-20 13:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `bayanat`
--

CREATE TABLE `bayanat` (
  `id_bayanat` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `audio` varchar(45) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `creation_date` timestamp NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `id_sub_categories` int(11) DEFAULT NULL,
  `id_categories` int(11) DEFAULT NULL,
  `bayan_image` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `views` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bayanat`
--

INSERT INTO `bayanat` (`id_bayanat`, `name`, `audio`, `status`, `creation_date`, `updated`, `id_sub_categories`, `id_categories`, `bayan_image`, `date`, `views`) VALUES
(5, 'Abdiat or tawazo', '5.aac', 1, '2017-11-24 18:37:33', NULL, 3, 1, NULL, '2017-11-20', 121),
(6, 'Allah ka Nabi SAW se ishq', '6.aac', 1, '2017-11-24 18:39:08', NULL, 3, 1, NULL, '2017-11-24', 28),
(7, 'Asal amal maqsood hai', '7.aac', 1, '2017-11-24 18:40:37', NULL, 3, 1, NULL, '2017-11-24', 34),
(8, 'Asal breaking news', '8.aac', 1, '2017-11-24 18:41:35', NULL, 3, 1, NULL, '2017-11-24', 43),
(9, 'Pakistan ki buniyad', '9.aac', 1, '2017-11-24 18:42:20', NULL, 3, 1, NULL, '2017-11-24', 39),
(10, 'Qabooliat wala amal', '10.aac', 1, '2017-11-24 18:43:00', NULL, 3, 1, NULL, '2017-11-24', 65),
(11, 'Halal rizq barkat wala hua karta hai', '11.aac', 1, '2017-11-24 18:44:15', NULL, 3, 1, NULL, '2017-11-24', 85),
(12, 'Waldain ki ahmiat', '12.aac', 1, '2017-11-24 19:12:20', NULL, 3, 1, NULL, '2017-11-24', 85),
(13, 'Ramazan kay 5 inamat', '13.aac', 0, '2016-07-03 19:12:55', '2017-12-03 02:55:29', 3, 1, NULL, '2016-07-03', 19),
(14, 'Allah ka deen ki batain', '14.aac', 1, '2017-11-24 19:14:17', NULL, 4, 1, NULL, '2017-11-24', 20),
(15, 'Allah ki rehmat', '15.aac', 1, '2017-11-24 19:16:09', NULL, 4, 1, NULL, '2017-11-24', 112),
(16, 'Allah sa mulaqat', '16.aac', 1, '2017-11-24 19:16:32', NULL, 4, 1, NULL, '2017-11-24', 112),
(17, 'Din e Islam mai iqlaq ki ahmiat', '17.aac', 1, '2017-11-24 19:17:12', NULL, 4, 1, NULL, '2017-11-24', 30),
(18, 'Har naimat ka sawal kia jayega', '18.aac', 1, '2017-11-24 19:17:52', NULL, 4, 1, NULL, '2017-11-24', 33),
(19, 'Naikio ko plus or gunhao ko minus', '19.aac', 1, '2017-11-24 19:18:57', NULL, 4, 1, NULL, '2017-11-24', 39),
(20, 'No parking', '20.aac', 1, '2017-11-24 19:20:53', NULL, 4, 1, NULL, '2017-11-24', 36),
(21, 'Shadeed Aur Ashad Muhabbat Ka Election', '21.mp3', 1, '2017-11-24 21:23:09', NULL, 1, 1, NULL, '2017-11-05', 16),
(22, 'Miyan Bivi Zindagi Kese Guzarain', '22.mp3', 1, '2017-11-24 21:24:34', NULL, 1, 1, NULL, '2017-11-05', 20),
(23, 'Dunyia Dhoke Ka Gher Hai', '23.mp3', 1, '2017-11-24 21:26:34', NULL, 1, 1, NULL, '2017-11-16', 24),
(24, 'Haya Imaan Ka Bohat Bhari Shoba Hai', '24.mp3', 1, '2017-11-24 21:27:43', NULL, 1, 1, NULL, '2017-11-17', 26),
(25, 'Maghrib Ki Andhi TaqleedBlack Friday Ki Haqeqat', '25.mp3', 1, '2017-11-24 21:28:48', NULL, 1, 1, NULL, '2017-11-23', 22),
(26, 'Abrar Bande Kon', '26.mp3', 1, '2017-11-24 21:29:41', NULL, 1, 1, NULL, '2017-11-24', 36),
(27, 'Ashad Muhabbat Ki Bunyaad', '27.mp3', 1, '2017-11-24 21:30:24', NULL, 1, 1, NULL, '2017-11-24', 57),
(36, 'Naki ki tofeeq minjanib Allah hai', '36.mp3', 3, '2017-11-27 05:23:04', '2017-11-27 12:23:17', 4, 1, '36.png', '2017-11-26', 0),
(37, 'Naki ki tofeeq minjanib Allah hai', '37.mp3', 3, '2017-11-27 20:14:50', '2017-11-28 03:17:22', 4, 1, NULL, '2017-11-26', 2),
(38, 'Naki ki tofeeq minjanib Allah hai', '38.mp3', 1, '2017-11-27 20:28:02', NULL, 4, 1, NULL, '2017-11-26', 66),
(39, 'Saber Se Siddiqiyat Ki Akhri Sarhad Milti Hai', '39.mp3', 1, '2017-11-27 20:37:45', NULL, 1, 1, NULL, '2017-11-26', 59),
(40, 'Allah ki haamd', '40.mp3', 1, '2017-11-27 22:05:31', NULL, 4, 1, NULL, '2017-11-27', 41),
(41, 'Allah kis sa payar kartay hain', '41.mp4', 3, '2017-12-01 11:15:29', '2017-12-08 01:39:31', 5, 2, '41.jpg', '2017-12-27', 60),
(42, 'ILM E Azeem', '42.mp4', 1, '2017-12-01 11:17:07', '2017-12-08 01:39:27', 5, 2, '42.jpg', '2017-12-28', 109),
(43, 'Ishq e Rasool SALLALLAHU ALAYHI WA SALLAM Ka Hasil', '43.mp3', 1, '2017-12-03 15:13:18', NULL, 1, 1, NULL, '2017-12-03', 108),
(44, 'Zahiri or Batni gunhao ko chona lazim hai ', '44.mp3', 3, '2017-12-04 17:29:59', '2017-12-05 13:41:24', 4, 1, NULL, '2017-12-04', 10),
(45, 'Riya Ki Haqeqat', '45.mp3', 1, '2017-12-04 18:14:36', NULL, 1, 1, NULL, '2017-12-04', 70),
(46, 'Zahiri or Batni Gunhao ko Chorna Zalmi Hai', '46.mp3', 3, '2017-12-05 06:44:50', '2017-12-05 13:49:37', 3, 1, NULL, '2017-12-04', 2),
(47, 'Zahiri or Batini Gunhao Ko Chorna Lazmi hai ', '47.mp3', 1, '2017-12-05 06:53:23', NULL, 4, 1, NULL, '2017-12-04', 56),
(48, 'Haq-ul-Allah aur Haq-ul-Abad', '48.mp3', 1, '2017-12-07 05:24:17', NULL, 4, 1, NULL, '2017-12-07', 36),
(49, 'Ishq e Rasool S.A.W aur bidaat o rasomaat', '49.mp3', 1, '2017-12-10 18:22:17', NULL, 4, 1, NULL, '2017-12-10', 34),
(50, 'Tafseer Surat Al-Fatiha ', '50.mp3', 1, '2017-12-11 17:46:15', NULL, 3, 1, NULL, '2017-12-02', 67),
(51, 'Sachay logo kay saat hojao', '51.mp3', 1, '2017-12-11 17:55:32', NULL, 4, 1, NULL, '2017-12-11', 36),
(52, 'Makhloot Dawat Ka Gunah,Makhloot Taleem Ka Masla', '52.mp3', 1, '2017-12-11 18:07:05', NULL, 1, 1, NULL, '2017-12-11', 77),
(53, 'Maamlat Allah walo sa seekhen', '53.mp3', 1, '2017-12-12 20:15:36', NULL, 4, 1, NULL, '2017-12-12', 32),
(54, 'Allah Ki Apnay Gunnah gar Bando say muhabbat', '54.mp4', 3, '2017-12-16 13:56:38', '2017-12-16 21:02:14', 5, 2, NULL, '2017-11-28', 2),
(55, 'Allah Ki Apnay Gunnah gar Bando say muhabbat', '55.mp4', 1, '2017-12-16 14:08:23', NULL, 5, 2, '55.jpg', '2017-11-28', 145),
(56, 'Khanqaho ko abad kia jaye', '56.mp3', 1, '2017-12-18 20:49:09', NULL, 4, 1, NULL, '2017-12-13', 32),
(57, 'Waldain ki azmat Qur\'an wa Hadees ki roshni mai', '57.mp3', 1, '2017-12-18 20:52:40', NULL, 7, 1, NULL, '2017-12-17', 23),
(58, 'Asal Tareef ALLAH Pak Ki Hai - Jam Masjid Taj, Agra Taj', '58.mp3', 1, '2017-12-22 20:32:19', NULL, 3, 1, NULL, '2017-12-22', 60),
(59, 'Parda Aurat Ki Izzat Ka Zamin Hai, Jadeed Tarz e Zindagi Aur Islah Ke Pehlo', '59.mp3', 1, '2017-12-22 20:47:54', NULL, 1, 1, NULL, '2017-12-21', 118),
(60, 'Behtar Aklaq Ki Zaroorat Hai', '60.mp3', 1, '2017-12-24 17:56:20', NULL, 4, 1, NULL, '2017-12-24', 43),
(61, 'Sawari Chalanay Kay Aadab', '61.mp3', 1, '2017-12-24 18:02:15', NULL, 4, 1, NULL, '2017-12-24', 60),
(62, 'Insan Barah Zaeef Hai Barah Kamzoor Hai', '62.mp3', 1, '2017-12-26 20:45:54', NULL, 4, 1, NULL, '2017-12-25', 21),
(63, '2 Naaimato Ki Qadar Na Karnay Per Khasara', '63.mp3', 1, '2017-12-26 20:52:40', NULL, 4, 1, NULL, '2017-12-26', 33),
(64, 'Madaris Ki Ahmiat', '64.mp3', 1, '2017-12-30 11:07:50', NULL, 4, 1, NULL, '2017-12-27', 122),
(65, 'Sunno sub ki.. kro RAB ki..', '65.mp3', 1, '2017-12-31 10:28:52', NULL, 4, 1, NULL, '2017-12-30', 36),
(66, 'Suno Sub Ki Kro RAB ki - Markazi Majalis', '66.mp3', 1, '2017-12-31 16:30:14', NULL, 4, 1, NULL, '2017-12-31', 54),
(67, 'ILM ka takabur.. Maal kay takabur sa ziada khatarnak hai', '67.mp3', 1, '2017-12-31 16:34:11', NULL, 4, 1, NULL, '2017-12-31', 40),
(68, 'Beragbat hona hai Duniya sa Aur Ragib hona hai Akhrat ki Taraf', '68.mp3', 1, '2018-01-02 17:20:43', NULL, 4, 1, NULL, '2018-01-02', 38),
(69, 'Free of cost Naimat E Uzmah - Jamah Masjid Munawara', '69.mp3', 1, '2018-01-06 17:46:43', NULL, 3, 1, NULL, '2018-01-06', 64),
(70, 'Duniya Momin Kalia Qaid Khana Hai', '70.mp3', 1, '2018-01-07 19:16:22', NULL, 4, 1, NULL, '2018-01-03', 33),
(71, 'Naki Ki Tofeeq ALLAH Ki Janib Sa Hai.', '71.mp3', 1, '2018-01-07 19:25:17', NULL, 4, 1, NULL, '2018-01-07', 31),
(72, 'Khud Koa Sheikh Kay Hawalay Kardo', '72.mp3', 1, '2018-01-07 19:28:46', NULL, 4, 1, NULL, '2018-01-07', 44),
(73, 'Duniya ki mohabat halakat ka sabab', '73.mp3', 1, '2018-01-09 20:40:33', NULL, 4, 1, NULL, '2018-01-08', 40),
(74, 'Ulama or Tulaba kay liye Muqam e Siddiqiyat ', '74.mp3', 1, '2018-01-13 17:44:18', '2018-01-15 01:04:31', 4, 1, NULL, '2018-01-13', 34),
(75, 'Ulmah aur Tulbah kay lia Moqam-E-Siddiqiat', '75.mp3', 1, '2018-01-13 17:47:17', NULL, 4, 1, NULL, '2018-01-13', 40),
(76, 'Allah bohat raheem or sattar hain - part 1', '76.mp3', 1, '2018-01-14 16:49:52', NULL, 4, 1, NULL, '2018-01-14', 36),
(77, 'Allah bohat raheem or sattar hain - part 2', '77.mp3', 1, '2018-01-14 16:52:40', NULL, 4, 1, NULL, '2018-01-14', 46),
(78, 'Sheikh Say Muhabbat ', '78.mp3', 1, '2018-01-15 17:29:16', NULL, 4, 1, NULL, '2018-01-15', 46),
(79, 'Sheikh Ki Qadar Wa Ahmiat', '79.mp3', 1, '2018-01-16 18:35:46', NULL, 4, 1, NULL, '2018-01-16', 37),
(80, 'Gunhao sa bacho', '80.mp3', 1, '2018-01-17 21:34:43', NULL, 4, 1, NULL, '2018-01-17', 32),
(81, 'Mujahiday Kay Begar ALLAH Nhi Miltay', '81.mp3', 1, '2018-01-21 14:42:55', '2018-01-22 01:47:47', 4, 1, NULL, '2018-01-21', 56),
(82, 'Khuda Wanda Tera Banda, Abdul Ahad bhai', '82.mp3', 1, '2018-01-21 19:36:00', NULL, 9, 6, NULL, '2018-01-21', 185),
(83, 'Amal ki zahire Surat or Haqqiqaat ', '83.mp3', 1, '2018-01-22 16:49:36', NULL, 4, 1, NULL, '2018-01-22', 21),
(86, 'Sheikh Bananay Ki Zarorat-wa-Ahmiyat', '86.mp3', 1, '2018-01-23 17:21:54', '2018-01-24 00:34:43', 4, 1, NULL, '2018-01-23', 34),
(87, 'Allah kay Rastay kay Mujahiday ', '87.mp3', 1, '2018-01-24 18:09:01', NULL, 4, 1, NULL, '2018-01-24', 33),
(88, 'Sheikh ki Fikar Ki Fikar Karna ', '88.mp3', 1, '2018-01-27 17:47:56', NULL, 4, 1, NULL, '2018-01-27', 14),
(89, 'Zikar Majlis Baad Namaz e Fajir', '89.mp3', 1, '2018-01-28 16:37:02', NULL, 4, 1, NULL, '2018-01-28', 26),
(90, 'Tension release program', '90.mp3', 1, '2018-01-28 16:40:31', NULL, 4, 1, NULL, '2018-01-28', 28),
(91, 'Allah kay lia ksi sa mohabat karna', '91.mp3', 1, '2018-01-28 16:43:34', NULL, 4, 1, NULL, '2018-01-28', 33),
(92, 'Faizan-E-Muhammad, Abdul Ahad bhai', '92.mp3', 1, '2018-01-28 16:46:50', NULL, 9, 6, NULL, '2018-01-28', 40),
(93, 'Allah ki mohabat ka sacha moti hasal karnay ki jadojahat', '93.mp3', 1, '2018-01-29 16:44:19', NULL, 4, 1, NULL, '2018-01-29', 39),
(94, 'Do Chezo Ki Zamanat Kay Badlay Janat ki Zamanat', '94.aac', 1, '2018-01-31 18:55:02', NULL, 4, 1, NULL, '2018-01-31', 41),
(95, 'Allah ki mohabat mai tou hi tou', '95.mp3', 1, '2018-02-03 16:44:06', NULL, 4, 1, NULL, '2018-02-03', 20),
(97, 'Naik Mea Bivi', '97.mp3', 1, '2018-02-04 17:42:41', NULL, 4, 1, NULL, '2018-02-04', 23),
(98, 'Allah kay ashiqo ki barat', '98.mp3', 1, '2018-02-04 17:45:03', NULL, 4, 1, NULL, '2018-02-04', 27),
(99, 'Tamanna Muddao Sa Hai, Abdul Ahad Bhai', '99.mp3', 1, '2018-02-04 17:58:17', NULL, 9, 6, NULL, '2018-02-04', 67),
(100, 'Sheikh Kay Adab or Ehmiyat', '100.mp3', 1, '2018-02-05 17:25:25', '2018-02-06 02:17:41', 4, 1, NULL, '2018-02-05', 24),
(101, 'Allah ke Muhabat ka runway taqwa hai', '101.mp3', 1, '2018-02-07 17:37:33', NULL, 4, 1, NULL, '2018-02-07', 25),
(102, 'Allah ki mohabat ALLAH WALO sa milti hai', '102.mp3', 1, '2018-02-10 17:05:08', NULL, 4, 1, NULL, '2018-02-10', 26),
(103, 'Deen per mukamal amal ki zaroorat hai', '103.mp3', 1, '2018-02-10 17:14:53', NULL, 4, 1, NULL, '2018-02-06', 20),
(104, 'Quran kay Aashiq', '104.aac', 1, '2018-02-12 20:10:47', NULL, 4, 1, NULL, '2018-02-11', 27),
(105, 'Shadi sunnat kay mutabiq karen', '105.aac', 1, '2018-02-12 20:12:29', NULL, 4, 1, NULL, '2018-02-11', 34),
(106, 'Allah ki mohabat', '106.aac', 1, '2018-02-12 20:13:50', NULL, 4, 1, NULL, '2018-02-11', 23),
(107, 'Shiekh Ka Faizan Amm Kra Jaye', '107.mp3', 1, '2018-02-12 20:29:13', NULL, 4, 1, NULL, '2018-02-12', 22),
(108, 'Sunnat Say Asal Mohabbat', '108.mp3', 1, '2018-02-14 19:17:24', NULL, 4, 1, NULL, '2018-02-13', 23),
(109, 'Maa Baap Ki Qadar Karen', '109.mp3', 1, '2018-02-14 19:20:30', NULL, 3, 1, NULL, '2018-02-11', 54),
(110, 'Baro Ki Yaadain Or Kam Ki Batain', '110.mp3', 1, '2018-02-14 19:39:50', NULL, 4, 1, NULL, '2018-02-14', 31),
(111, '\'Ak Zaniya Aurat\' Bukhari Sharif ki Riwayat', '111.mp4', 3, '2018-02-15 04:32:38', '2018-02-16 19:51:22', 5, 2, NULL, '0000-00-00', 12),
(112, 'Maa Baap Ki Azmat', '112.mp3', 1, '2018-02-16 10:52:33', NULL, 3, 1, NULL, '2018-02-16', 92),
(113, '\'Ak Zaniya Aurat\' Bukhari Sharif ki Riwayat', '113.mp4', 0, '2018-02-16 12:54:13', '2018-03-04 22:09:57', 5, 2, NULL, '2018-03-04', 44),
(114, 'Naafs Ki Dawa Sohbatay Ahllulllah ', '114.mp3', 1, '2018-02-17 17:29:22', NULL, 4, 1, NULL, '2018-02-17', 26),
(115, 'Naafs Ki Dawa Sohbatay Ahllulllah Part 2', '115.mp3', 1, '2018-02-18 16:22:52', '2018-02-20 00:58:42', 4, 1, NULL, '2018-02-18', 49),
(116, 'badgumani  tabhai ka rasta', '116.mp3', 1, '2018-02-19 17:30:52', NULL, 4, 1, NULL, '2018-02-19', 40),
(117, 'Rasool ALLAH SAW Ka Tareeq Deen Hai', '117.mp3', 1, '2018-02-20 17:27:32', '2018-02-21 00:28:59', 4, 1, NULL, '2018-02-20', 30),
(118, 'Saas Sussar Ka Akhlaq Kesa Ho', '118.mp3', 1, '2018-02-25 16:40:31', NULL, 4, 1, NULL, '2018-02-25', 19),
(119, 'Zikar ki Majlis Bad Namaze Magrib', '119.mp3', 1, '2018-02-25 16:44:12', NULL, 4, 1, NULL, '2018-02-25', 40),
(120, 'Allah Walo Say Hasad Naa Karain', '120.mp3', 1, '2018-02-26 16:46:16', NULL, 4, 1, NULL, '2018-02-26', 24),
(121, 'Allah K Rastay Ki Takaleef', '121.mp3', 1, '2018-02-27 17:24:13', NULL, 4, 1, NULL, '2018-02-27', 43),
(122, 'Rohani Ilaj ki Fikar karen', '122.mp3', 1, '2018-02-28 19:50:48', NULL, 4, 1, NULL, '2018-02-28', 43),
(123, 'Nazar ki hifazat Eeman ki hifazat ki zamin hai', '123.mp3', 1, '2018-03-03 17:31:39', NULL, 4, 1, NULL, '2018-03-03', 18),
(124, '\'Ak Zaniya Aurat\' Bukhari Sharif ki Riwayat', '124.mp4', 1, '2018-03-04 15:13:56', '2018-03-04 22:20:58', 5, 2, '124.jpg', '2018-03-04', 58),
(125, 'Jama Masjid Shadab Ahullah ki shohbat ka faida', '125.mp3', 1, '2018-03-04 17:34:32', '2018-03-07 00:34:54', 3, 1, NULL, '2018-03-04', 63),
(126, 'Allah ki mohabat kalia Allah Walo say Rabta Qaim Karen', '126.mp3', 1, '2018-03-06 18:22:06', NULL, 4, 1, NULL, '2018-03-04', 28),
(127, 'Teri ankhain teri zulfain.. Usaid bhai', '127.mp3', 1, '2018-03-11 09:05:35', NULL, 9, 6, NULL, '2018-03-03', 27),
(128, 'Roz e qiamat', '128.mp4', 1, '2018-03-11 10:50:50', NULL, 5, 2, '128.jpg', '2018-03-11', 42),
(129, 'Sheikh say mazboot taluq', '129.mp3', 1, '2018-03-18 10:36:12', NULL, 4, 1, NULL, '2018-03-11', 14),
(130, 'Allah walo ka tazkiray dilo koa noor sa munawar kardetay hain', '130.aac', 1, '2018-03-18 16:47:36', NULL, 4, 1, NULL, '2018-03-18', 15),
(131, 'Qazday Admay Nazar', '131.aac', 1, '2018-03-18 16:51:11', NULL, 4, 1, NULL, '2018-03-18', 16),
(132, 'Sahaba Ikram ka mizaj mit kar rahnay ka tha', '132.mp3', 1, '2018-03-19 20:17:23', NULL, 4, 1, NULL, '2018-03-19', 21),
(133, 'Jaise karni waise bharnee', '133.mp3', 1, '2018-03-21 17:42:31', NULL, 4, 1, NULL, '2018-03-20', 17),
(134, 'Aurat Banti hai toa gharana banta hai', '134.mp3', 1, '2018-03-21 17:47:16', NULL, 4, 1, NULL, '2018-03-21', 14),
(135, 'Jummah Bayan Jama Masjid Taj Agra Taj', '135.mp3', 1, '2018-03-23 10:41:40', NULL, 3, 1, NULL, '2018-03-23', 22),
(136, 'Chand Barre Gunah Aur Is Se Bachne Ka Asan Hal', '136.mp3', 1, '2018-03-23 11:08:09', NULL, 1, 1, NULL, '2018-03-23', 25),
(137, 'Qaloob Koa Banany Ki Zaroorat Hai', '137.mp3', 1, '2018-03-26 19:38:10', NULL, 4, 1, NULL, '2018-03-25', 20),
(138, 'Zikar Majlis', '138.mp3', 1, '2018-03-26 19:40:06', NULL, 4, 1, NULL, '2018-03-25', 16),
(139, 'Seerat E Pak', '139.mp3', 1, '2018-03-26 19:42:19', NULL, 4, 1, NULL, '2018-03-26', 16),
(140, 'Ahle Taqwa Ki Sorat Bana le Jia', '140.mp3', 1, '2018-03-26 19:45:23', NULL, 8, 5, NULL, '2018-03-25', 17),
(141, 'Terey Siwa Mehboob e Haqiqi Koi Nahi', '141.mp3', 1, '2018-03-26 19:46:36', NULL, 10, 6, NULL, '2018-03-26', 4),
(142, 'Kabhi hum bhi Madina Kay Daro Dewar Dekhengay', '142.mp3', 1, '2018-03-26 19:48:15', NULL, 9, 6, NULL, '2018-03-25', 23),
(144, 'Salana Taqreeb.. Takmeel e Hifz e Quran o Taqseem E Asnad - 1', '144.mp3', 1, '2018-03-29 11:20:50', NULL, 7, 1, NULL, '2018-03-27', 24),
(145, 'Salana Taqreeb.. Takmeel e Hifz e Quran o Taqseem E Asnad - 2', '145.mp3', 1, '2018-03-29 11:25:31', NULL, 7, 1, NULL, '2018-03-27', 14),
(146, 'Ksi koa haqeer na janen', '146.mp3', 1, '2018-03-29 15:21:51', NULL, 4, 1, NULL, '2018-03-28', 16),
(147, 'Sheikh say taluq mai kami Nafay mai kami ka bais banti hai', '147.mp3', 1, '2018-03-29 15:23:51', NULL, 4, 1, NULL, '2018-03-27', 10),
(148, 'Dil ki halat koa acha bnanay ki fikar karen', '148.mp3', 1, '2018-04-01 09:24:16', NULL, 4, 1, NULL, '2018-03-31', 8),
(149, 'Allah Ki Mohabat ki Sharab', '149.mp3', 1, '2018-04-01 17:47:20', NULL, 4, 1, NULL, '2018-04-01', 11),
(150, 'Allah ko apnay dil mai basa le jiye', '150.mp3', 1, '2018-04-01 17:55:29', NULL, 4, 1, NULL, '2018-04-01', 21),
(151, 'Dosro say hamesha husan-e-zan rakhen', '151.mp3', 1, '2018-04-03 05:06:15', NULL, 4, 1, NULL, '2018-04-02', 10),
(152, 'Apnay Akabir kay tariqay koa ikhtayar karen', '152.mp3', 1, '2018-04-05 11:56:26', NULL, 4, 1, NULL, '2018-04-04', 6),
(153, 'Libas ki Qadar-o-Ehmiat koa samjhen', '153.mp3', 1, '2018-04-07 17:30:21', NULL, 4, 1, NULL, '2018-04-07', 11),
(154, 'Ghar koa jannat baniyeh', '154.mp3', 1, '2018-04-08 17:15:18', NULL, 4, 1, NULL, '2018-04-08', 5),
(155, 'Mah-E-Rajab ki bidaat', '155.mp3', 1, '2018-04-08 17:19:34', NULL, 4, 1, NULL, '2018-04-08', 9),
(156, 'Rasool-e-Pak SAW kay pegam koa aam kia jaye', '156.mp3', 1, '2018-04-10 19:59:19', NULL, 4, 1, NULL, '2018-04-10', 4),
(157, 'Masjid Committee Kay Naam Pegam', '157.mp4', 1, '2018-04-10 20:01:59', NULL, 5, 2, '157.jpeg', '2018-04-10', 4),
(158, 'Insan mitta hai tou banta hai', '158.mp3', 1, '2018-04-11 19:13:51', NULL, 4, 1, NULL, '2018-04-11', 3);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `sub_category_id` int(25) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `excerpt` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `views` int(255) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `user_id`, `sub_category_id`, `slug`, `title`, `excerpt`, `body`, `image`, `views`, `status`, `published_at`, `updated_at`) VALUES
(1, 5, 2, 'php', 'PHP is not going to die', 'It is not too uncommon to find posts on the Internet about when PHP will die, or about whether or not PHP is still relevant in 2021.  While there seems to be kind of mixed feelings on PHP among experts the funny thing is, there’s about 80 percent chance t', '<h2>Hello World!</h2><p>I am <strong>Irfan </strong><i><strong><u>Ali</u></strong></i></p><p><mark class=\"marker-yellow\">I live in Quetta Pakistan</mark></p><p><span style=\"background-color:hsl(120,75%,60%);\">I am 26 Years Old</span></p><blockquote><p>I am writing a Quotation</p></blockquote>', '1.jpg', 65, 1, '2021-11-28 09:32:56', '2022-03-11 06:55:19'),
(3, 5, 2, 'php-is-not-going-to-die-ii', 'PHP is not going to die', 'It is not too uncommon to find posts on the Internet about when PHP will die, or about whether or not PHP is still relevant in 2021.  While there seems to be kind of mixed feelings on PHP among experts the funny thing is, there’s about 80 percent chance t', '<h2 style=\"margin-left:0px;text-align:right;\">COVID-19 ایچ ای سی پاکستانی صنعتوں اور گائیڈ یونیورسٹیوں پر وبائی امراض کے اثرات کا مطالعہ کرے گی</h2><p style=\"margin-left:0px;text-align:right;\">&nbsp;</p><h2 style=\"margin-left:0px;text-align:right;\"><span class=\"text-big\">وفاقی وزیر برائے سائنس و ٹیکنالوجی فواد چوہدری نے اعلان کیا ہے کہ پاکستان سائنس فاؤنڈیشن اور ہائر ایجوکیشن کمیشن (ایچ ای سی) پاکستانی صنعتوں پر کورون وائرس کے اثرات کے بارے &nbsp; میں معلوم کرنے کے لئے مشترکہ مطالعہ کرے گا۔</span><br>COVID-19 ایچ ای سی پاکستانی صنعتوں اور گائیڈ یونیورسٹیوں پر وبائی امراض کے اثرات کا مطالعہ کرے گی&nbsp;</h2><p style=\"margin-left:0px;text-align:right;\">&nbsp;</p><p style=\"margin-left:0px;text-align:right;\"><span class=\"text-big\">وزیر نے ایک ٹویٹ میں کہا ، “پاکستان سائنس فاؤنڈیشن اور ایچ ای سی مشترکہ مطالعہ کا آغاز کر رہے ہیں تاکہ یہ جاننے کے لئے کہ کورونا وائرس سے پاکستانی صنعت پر کیا اثر پڑے گا ، کون سی نئی صنعتیں سامنے آئیں گی اور جو گر جائیں گی ،” وزیر نے ایک ٹویٹ میں کہا۔</span></p><blockquote><p style=\"margin-left:0px;text-align:right;\"><span class=\"text-big\">فواد نے مزید بتایا کہ ایچ ای سی ، اس مطالعے کے بعد ، یونیورسٹیوں کو ہدایت نامہ جاری کرے گی ، تاکہ مستقبل کی صنعت کی ضروریات کے مطابق ان کی ڈگری کے منصوبوں میں متعلقہ تبدیلیاں لاسکیں۔</span></p></blockquote><p style=\"margin-left:0px;text-align:right;\"><span class=\"text-big\">کوویڈ ۔19 نے عالمی معیشت پر تباہی مچا دی ہے اور پاکستان میں بھی کاروبار کو متاثر کیا ہے۔</span><br><span class=\"text-big\">معاشی اثر و رسوخ اس سے بھی زیادہ خراب ہوسکتا ہے۔ بین الاقوامی مالیاتی فنڈ (آئی ایم ایف) نے پاکستان کے لئے جی ڈی پی کی شرح نمو میں تیزی سے کمی کا امکان 2019 میں 3.3 فیصد سے بڑھا کر 2020 میں -1.5 فیصد کردیا ہے۔</span></p><p style=\"margin-left:0px;text-align:right;\">&nbsp;</p><p style=\"text-align:right;\"><span class=\"text-big\">کیٹاگری میں : </span><a href=\"http://www.urdupostnews.com/category/hot-news/\"><span class=\"text-big\">اہم خبریں</span></a><span class=\"text-big\">، </span><a href=\"http://www.urdupostnews.com/category/education/\"><span class=\"text-big\">تعلی</span>م</a></p>', '1.jpg', 75, 1, '2021-11-28 09:32:56', '2022-03-11 06:55:17'),
(4, 5, 2, 'php-is-not-going-to-die-iii', 'ایف بی آر نے نئی پراپرٹی ویلیوایشن ریٹس کا اطلاق 16', 'یف بی آر کی جانب سے جاری کردہ نوٹیفکیشن کے مطابق تمام چیف کمشنرزان لینڈ ریونیو ویلیوایشن کا جائزہ لینے والی کمیٹیاں تشکیل دیں گی اورانہیں 10 دسمبر 2021 تک نوٹیفائی کریں گے کسی بھی اسٹیک ہولڈر کی جانب سے ویلیویشن کے بارے میں کوئی تحفظات ہیں تو وہ وہ 15 دسم', '<p>It is not too uncommon to find posts on the Internet about when PHP will die, or about whether or not PHP is still relevant in 2021. While there seems to be kind of mixed feelings o</p>', '4.jpg', 9, 1, '2021-11-28 09:32:56', '2022-03-11 06:55:15'),
(5, 5, 2, 'php-is-not-going-to-die-iv', 'عدالتی فیصلوں کے خلاف قانون سازی ہو تو عدلیہ کی وورم', 'اسلام آباد (اُردو پوائنٹ تازہ ترین اخبار۔ 09 دسمبر 2021ء) : سپریم کورٹ آف پاکستان نے آج ریمارکس دیتے ہوئے کہا کہ عدالتی فیصلوں کے خلاف قانون سازی ہونے لگے تو عدلیہ کی آزادی کہاں رہے گی۔ تفصیلات کے مطابق سپریم کورٹ میں ایکٹ 2010ء کے ذریعے بحال ملازمین کو ب', '<h2>PHP is not going to die</h2><p style=\"margin-left:0px;\">It is not too uncommon to find posts on the Internet about when PHP will die, or about whether or not PHP is still relevant in 2021.</p><p style=\"margin-left:0px;\">While there seems to be kind of</p>', '5.jpg', 60, 1, '2021-11-28 09:32:56', '2022-09-06 20:24:25'),
(6, 5, 11, 'java-one-o-one', 'حکومت کے قرضے 108 فیصد اضافے کے بعد ایک کھرب 4 ارب روپے پر پہنچ گئے', 'اسلام آباد (اُردو پوائنٹ تازہ ترین اخبار۔ 10 دسمبر 2021ء) : رواں مالی سال کے 5 ماہ میں بجٹ خسارہ پورا کرنے کے لیے حکومت کے قرضے دو گنا ہو گئے۔ تفصیلات کے مطابق حکومت کے قرضے 108 فیصد اضافے کے بعد ایک کھرب 4 ارب روپے پر پہنچ گئے ہیں۔ اسٹیٹ بینک کے جاری کرد', '<p>## Java Java java javajavjavjavjavajvajvajvavjajvjav asdfasdfasdfasdf asdfdasfasdfadsfasdfasdfasdfasdfasdf asdfasdfasdfasdf &gt; asdfjkhaskdfjasdbnvzxcvklasjdfkasdhfasdfzxcvklasdfhasdfbasdfasdf asdfsadfsadufhsadfsadfsadfsadfhklasgfhsadgfkas</p>', '6.jpg', 56, 1, '2021-12-01 11:36:17', '2022-09-07 12:24:50'),
(8, 5, 12, 'who-is-muhammad-ali', 'Who is Muhammad Ali', 'Add few sentences to grab user\'s attention', '<p><span style=\"background-color:rgb(255,255,255);color:rgb(51,51,51);\">This is some sample content. </span><strong>You can add content </strong><span style=\"background-color:rgb(253,253,119);color:#000000;\"><strong>in the body here.</strong></span><strong>&nbsp;</strong></p>', '8.jpg', 40, 1, '2021-12-29 10:23:25', '2022-09-08 18:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id_books` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pdf` varchar(45) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `creation_date` timestamp NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `id_sub_categories` int(11) DEFAULT NULL,
  `id_categories` int(11) DEFAULT NULL,
  `book_image` varchar(255) DEFAULT NULL,
  `show_book` tinyint(1) NOT NULL COMMENT '0: Private 1: Public',
  `views` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id_books`, `name`, `pdf`, `status`, `creation_date`, `updated`, `id_sub_categories`, `id_categories`, `book_image`, `show_book`, `views`) VALUES
(1, 'Aah E Dimagh', '1.pdf', 1, '2017-11-18 09:06:51', '2021-08-06 05:45:23', 6, 3, '1.jpg', 0, 7),
(2, 'Aap SAW ki ummat say muhabbat', '2.pdf', 1, '2017-11-18 09:09:15', NULL, 6, 3, '2.jpg', 0, 8),
(3, 'hamari namaz', '3.pdf', 3, '2017-11-18 09:10:31', '2021-08-05 11:08:02', 6, 3, '3.jpg', 0, 8),
(4, 'hifazat e nazr', '4.pdf', 1, '2017-11-18 09:11:39', NULL, 6, 3, '4.jpg', 0, 8),
(5, 'husn e khatma k asbab', '5.pdf', 1, '2017-11-18 09:12:42', NULL, 6, 3, '5.jpg', 0, 10),
(6, 'kaam ki batain', '6.pdf', 1, '2017-11-18 09:15:12', NULL, 6, 3, '6.jpg', 0, 5),
(8, 'khitabat e ihsani', '8.pdf', 1, '2017-11-18 09:20:17', NULL, 6, 3, '8.jpg', 0, 4),
(9, 'majlis e zikr', '9.pdf', 1, '2017-11-18 09:21:01', NULL, 6, 3, '9.jpg', 0, 4),
(10, 'mamolate ramazan', '10.pdf', 1, '2017-11-18 09:21:30', NULL, 6, 3, '10.jpg', 0, 7),
(11, 'mian  biwi', '11.pdf', 1, '2017-11-18 09:21:57', NULL, 6, 3, '11.jpg', 0, 5),
(12, 'momin k lail o nahar', '12.pdf', 1, '2017-11-18 09:22:32', NULL, 6, 3, '12.jpg', 0, 6),
(13, 'naik sohbat aur aulia k mujahiday', '13.pdf', 1, '2017-11-18 09:23:04', NULL, 6, 3, '13.jpg', 0, 60),
(14, 'sohbat k asrat', '14.pdf', 1, '2017-11-18 09:23:35', NULL, 6, 3, '14.jpg', 0, 61),
(15, 'wird e rehmania', '15.pdf', 1, '2017-11-18 09:24:05', NULL, 6, 3, '15.jpg', 1, 133),
(17, 'Testing', '17.pdf', 1, '2022-03-16 07:14:58', '2022-03-18 04:45:40', 10, 6, '17.jpg', 0, 23);

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint(13) UNSIGNED NOT NULL,
  `captcha_time` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(244, 1629198984, '::1', '6pDBJlVT'),
(245, 1629199338, '127.0.0.1', '1cyK2kJX'),
(246, 1629199374, '::1', '6WXE1vyu'),
(247, 1629199377, '::1', 'mlX4YkmG'),
(248, 1629199393, '::1', '4mMMIO4e'),
(249, 1629199560, '::1', 'GaAXlirX'),
(250, 1629199564, '::1', 'hpGfalHs'),
(251, 1629199566, '::1', 'mF1K8oQm'),
(252, 1629199571, '::1', '64NGETt2'),
(253, 1629199579, '::1', 'Q6gOC7wV'),
(254, 1629199590, '::1', '1tLvjkvn'),
(255, 1629199596, '::1', 'kPKsx2TJ'),
(256, 1629199601, '::1', 'aRtEjUmo'),
(257, 1629199605, '::1', 'sIhOqXH0'),
(258, 1629199609, '::1', 'nkecC94t'),
(259, 1629199613, '::1', 'wllyl2fS'),
(260, 1629199618, '::1', 'P06nV9ek'),
(261, 1629199622, '::1', 'nAcxcBqs'),
(262, 1629199628, '::1', 'ksBXUn6b'),
(263, 1629199632, '::1', 'Qe2ey5OH'),
(264, 1629199638, '::1', 'dA2xLVS7'),
(265, 1629199644, '::1', 'VmlQ3xQN'),
(266, 1629199653, '::1', 'wbjRsvI3'),
(267, 1629207776, '::1', '1bJSWqIh'),
(268, 1629207789, '::1', 'mwcJH0r6'),
(269, 1629208394, '::1', 'L1HgWyuC'),
(270, 1629208406, '::1', 'smcYmL2y'),
(271, 1629208416, '::1', 'OsTGYGFb'),
(272, 1629208427, '::1', '4Rmtm1cn'),
(273, 1629208502, '::1', 'Xteo9zcZ'),
(274, 1629441034, '::1', 'T2uomWyw'),
(275, 1629441036, '::1', 'xOHDpjxa'),
(276, 1629441037, '::1', 'H3sq4Nff'),
(277, 1629441037, '::1', 'nhqs2OTX'),
(278, 1629441043, '::1', 'ZbYjXCbl'),
(279, 1629442093, '::1', 'USSMlTDY'),
(280, 1629442244, '::1', 'N9uOmIMn'),
(281, 1629442279, '::1', 'YY7VA2bY'),
(282, 1629442284, '::1', 'Qfx8WGyb'),
(283, 1629442567, '::1', '3zYsaOKU'),
(284, 1629442573, '::1', 'DQdhy38s'),
(285, 1629442738, '::1', '4OS68xuw'),
(286, 1629442779, '::1', 'JnB5U7Lf'),
(287, 1629442792, '::1', 'oMss37Xq'),
(288, 1629442906, '::1', '8v7KqIU9'),
(289, 1629442930, '::1', 'duVBb24C'),
(290, 1629450200, '::1', 'vXexuuGl'),
(291, 1629458072, '::1', '3hYiaTGU'),
(292, 1629476933, '::1', 'mpiSoK67'),
(293, 1629554013, '::1', 'RdIgpyUP'),
(294, 1629554013, '::1', 'X4guyR7m'),
(295, 1629784113, '::1', 'aWPEwDEq'),
(296, 1629787282, '::1', 'QyZAz5XK'),
(297, 1629787300, '::1', 'iBsKVmp4'),
(298, 1629787348, '::1', 'NF6HKFcV'),
(299, 1629787352, '::1', '81a4FyZR'),
(300, 1629787354, '::1', 'iiCny6El'),
(301, 1629787356, '::1', 'FWIhdvvf'),
(302, 1629787362, '::1', 'QfNg30rC'),
(303, 1629787370, '::1', 'kK7WQ8gb'),
(304, 1629787377, '::1', 'ldWy5E5W'),
(305, 1629787389, '::1', 'X3s28MJZ'),
(306, 1629787399, '::1', 'sV3xHDxh'),
(307, 1629787433, '::1', 'HRtNoWIx'),
(308, 1629787435, '::1', 'zLKacTy6'),
(309, 1629787436, '::1', 'kWEXFcHW'),
(310, 1629787450, '::1', '8qnfInug'),
(311, 1629787453, '::1', 'LvBsalx8'),
(312, 1629787454, '::1', 'yak8Qaso'),
(313, 1629787477, '::1', 'dPEJelGM'),
(314, 1629790225, '::1', 'shWkNaV6'),
(315, 1629790360, '::1', '40ZQnr8Y'),
(316, 1629790363, '::1', 'ObMgvvAV'),
(317, 1629790369, '::1', 'hn2az7cF'),
(318, 1629790382, '::1', 'xZcRJ0J7'),
(319, 1629790385, '::1', 'zRWX1wUK'),
(320, 1629790387, '::1', 'aPxa2l4L'),
(321, 1629790396, '::1', 'MzBQbAP7'),
(322, 1629801472, '::1', 'UOESUjp3'),
(323, 1629804359, '::1', '4cuJjACY'),
(324, 1629804386, '::1', 'aQQsrnVs'),
(325, 1629804441, '::1', 'SJhtH5Wo'),
(326, 1629805005, '::1', 'zM5FAyjL'),
(327, 1629805052, '::1', 'U5fjy1yu'),
(328, 1629805156, '::1', 'IMM62juZ'),
(329, 1629805266, '::1', '3TS5dQjm'),
(330, 1629805346, '::1', 'VqbSloPj'),
(331, 1629805369, '::1', '28VRXzrV'),
(332, 1629805401, '::1', 'sw5Bz4l9'),
(333, 1629805427, '::1', '7RJFJu9B'),
(334, 1629805434, '::1', 'W4YLIqFT'),
(335, 1629805463, '::1', 'OEU6h85I'),
(336, 1629872435, '127.0.0.1', 'rI5z2VQb'),
(337, 1629872595, '127.0.0.1', 'tmDO0h9y'),
(338, 1629891025, '127.0.0.1', 'u8OEoSrn'),
(339, 1629893032, '127.0.0.1', 'oETpBSu9'),
(340, 1629893428, '127.0.0.1', '2dDOUSHj'),
(341, 1629893474, '127.0.0.1', 'yjQ55VXK'),
(342, 1629893741, '127.0.0.1', '0B5w5cvM'),
(343, 1629893799, '127.0.0.1', 'SMX93uIj'),
(344, 1629894867, '127.0.0.1', 'hzUjuBLf'),
(345, 1629894961, '127.0.0.1', 'MvTOQh96'),
(346, 1630049504, '127.0.0.1', 'pDhuh114'),
(347, 1630049560, '127.0.0.1', 'IVLnUx95'),
(348, 1630049742, '127.0.0.1', 'tfkAGNWw'),
(349, 1630049788, '127.0.0.1', 'FCrU07th'),
(350, 1630049789, '127.0.0.1', 'jrZRxFR9'),
(351, 1630049812, '127.0.0.1', 'NmiJPkr1'),
(352, 1630049813, '127.0.0.1', 'qnvV3A21'),
(353, 1630050504, '127.0.0.1', 'wqjj3aQc'),
(354, 1630050576, '127.0.0.1', 'g3q5abYj'),
(355, 1630050577, '127.0.0.1', 'k5Wo44FF'),
(356, 1630050582, '127.0.0.1', 'TPD7ysxh'),
(357, 1630050695, '127.0.0.1', 'IPd5RzBi'),
(358, 1630050695, '127.0.0.1', 'mSjP1xvK'),
(359, 1630050934, '127.0.0.1', '56Of4A9r'),
(360, 1630050954, '127.0.0.1', 'CwofHvLC'),
(361, 1630050980, '127.0.0.1', '4evJRnbm'),
(362, 1630051062, '127.0.0.1', '5mNXYPpO'),
(363, 1630051064, '127.0.0.1', 'iq7p6Grc'),
(364, 1630051075, '127.0.0.1', 'c8k6l1ph'),
(365, 1630057543, '127.0.0.1', 'iC3eX2xA'),
(366, 1630057576, '127.0.0.1', 'cRPazmbg'),
(367, 1630057588, '127.0.0.1', 'wu0wHrMc'),
(368, 1630057636, '127.0.0.1', 'g4mk3nMQ'),
(369, 1630057675, '127.0.0.1', '423i816g'),
(370, 1630057676, '127.0.0.1', 'rHu0WnP8'),
(371, 1630057683, '127.0.0.1', 'HrKZmIMV'),
(372, 1630057851, '127.0.0.1', 'jfl60svY'),
(373, 1630057853, '127.0.0.1', 'EmMWIE4g'),
(374, 1630057902, '127.0.0.1', 'aWjOCShU'),
(375, 1630057903, '127.0.0.1', 'NvD0gxSG'),
(376, 1630057920, '127.0.0.1', 'UCl4ZUiD'),
(377, 1630057927, '127.0.0.1', '4T8YAvyG'),
(378, 1630057929, '127.0.0.1', 'PEiSeEsE'),
(379, 1630402698, '127.0.0.1', 'RSoyMN5q'),
(380, 1630402702, '127.0.0.1', 'yzzNu2A0'),
(381, 1630402836, '127.0.0.1', 'L8s0IqQE'),
(382, 1630402850, '127.0.0.1', 'eaywzkwT'),
(383, 1630403624, '127.0.0.1', 'HSmxWj5K'),
(384, 1630403630, '127.0.0.1', 'bR07I2qO'),
(385, 1630404155, '127.0.0.1', 'roxICkdR'),
(386, 1630404280, '127.0.0.1', 'D6PO3xsi'),
(387, 1630404827, '127.0.0.1', 'bomL5GeA'),
(388, 1630404828, '127.0.0.1', 'TYl6iDnm'),
(389, 1630404867, '127.0.0.1', 'R4aJSk6J'),
(390, 1630404893, '::1', 'TFs5vfBk'),
(391, 1630404965, '::1', 'Mm2nRRkK'),
(392, 1630405000, '127.0.0.1', '4rjH12xK'),
(393, 1630405001, '127.0.0.1', 'OZ4UHabl'),
(394, 1630405033, '::1', 'tAhTJdc0'),
(395, 1630405234, '::1', 'AeibNnHV'),
(396, 1630405235, '::1', 'TjNrgfp7'),
(397, 1630405236, '::1', 'pt4WhjgO'),
(398, 1630405237, '::1', '1y5AChYd'),
(399, 1630405237, '::1', 'qMZRjZ8O'),
(400, 1630405263, '::1', 'l6uipYn7'),
(401, 1630405321, '::1', 'HfZ0VsTt'),
(402, 1630405322, '::1', 'HnW1Q0uI'),
(403, 1630405323, '::1', '5X7aDQDL'),
(404, 1630405409, '::1', 'ZBCrOl8A'),
(405, 1630405415, '::1', 'pqbLHhk7'),
(406, 1630405434, '::1', 'x7XS8asB'),
(407, 1630410009, '::1', 'SVv1LiLc'),
(408, 1630410011, '::1', 'Q3Lvsq3B'),
(409, 1630410014, '::1', 'LrDDb86v'),
(410, 1630410017, '::1', 'EltNMTZY'),
(411, 1630410020, '::1', 'cjwMbpE2'),
(412, 1630410061, '::1', 'Z8P0TsBZ'),
(413, 1630410071, '::1', 'ybX4bXh9'),
(414, 1630410081, '::1', 'VKRpg3py'),
(415, 1630411881, '::1', 'EVZhHbnR'),
(416, 1630411884, '::1', 'bAIBc1y7'),
(417, 1630411886, '::1', '3EBhVt7C'),
(418, 1630411888, '::1', 'wQ3rcENu'),
(419, 1630411913, '::1', 'XkrcqD3S'),
(420, 1630411973, '::1', 'qWUaAxf2'),
(421, 1630411979, '::1', 'JOQeBIBb'),
(422, 1630411981, '::1', 'VipGVJaA'),
(423, 1630411983, '::1', 'cDi4Xu9d'),
(424, 1630412066, '::1', 'eQOERQDz'),
(425, 1630412069, '::1', '2MW3mopX'),
(426, 1630412071, '::1', 'YC33aiKe'),
(427, 1630412073, '::1', '438BbnP5'),
(428, 1630412078, '::1', 'bKmnVhnB'),
(429, 1630412081, '::1', 'zCfOCxtV'),
(430, 1630412242, '::1', '52vIsMdM'),
(431, 1630412278, '::1', 'nlpYcRCl'),
(432, 1630412284, '::1', 'AOtrdiUE'),
(433, 1630412286, '::1', 'E73bpikK'),
(434, 1630412288, '::1', 'NAryQatf'),
(435, 1630412290, '::1', '8mq6oNht'),
(436, 1630412291, '::1', 'mgJ3wEOv'),
(437, 1630412295, '::1', 'UhOoQHIo'),
(438, 1630412302, '::1', 'OVXapWWm'),
(439, 1630412309, '::1', '4r0wCAGE'),
(440, 1630412537, '::1', '6UyXAr9c'),
(441, 1630412548, '::1', 'MtHxwobS'),
(442, 1630412703, '::1', 'eZW4Xiqw'),
(443, 1630412710, '::1', 'WPWi4jeo'),
(444, 1630412713, '::1', 'kuthxXtf');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(50) NOT NULL,
  `id_sub_category` int(25) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `long_description` longtext NOT NULL,
  `intro_video_url` varchar(255) NOT NULL,
  `course_thumbnail` varchar(255) NOT NULL,
  `featured_course` int(25) NOT NULL DEFAULT 0 COMMENT '0: No\r\n1: Yes',
  `status` int(1) NOT NULL DEFAULT 1,
  `views` int(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `id_sub_category`, `name`, `code`, `short_description`, `long_description`, `intro_video_url`, `course_thumbnail`, `featured_course`, `status`, `views`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Dars E Tareekh', 'A-55', '', '', '', '', 0, 1, 0, '2021-08-05 11:16:23', '2021-08-20 14:03:40'),
(2, NULL, 'Ahkaam', 'Ahk-01', '', '', '', '', 0, 1, 0, '2021-08-05 11:17:02', '2021-08-20 13:17:32'),
(3, NULL, 'Fiqh', 'F-12', '', '', '', '', 0, 1, 0, '2021-08-05 11:19:47', '2021-08-05 12:25:18'),
(4, NULL, 'Dars E Aqaid', 'A-13', '', '', '', '', 0, 1, 0, '2021-08-05 11:16:23', '2021-08-06 05:13:11'),
(5, NULL, 'Ahkaam', 'Ahk-01', '', '', '', '', 0, 1, 0, '2021-08-05 11:17:02', '2021-08-05 12:33:26'),
(6, NULL, 'Fiqh', 'F-12', '', '', '', '', 0, 1, 0, '2021-08-05 11:19:47', '2021-08-05 12:25:18'),
(7, NULL, 'Dars E Aqaid', 'A-13', '', '', '', '', 0, 1, 0, '2021-08-05 11:16:23', '2021-08-06 05:13:11'),
(8, NULL, 'Ahkaam', 'Ahk-01', '', '', '', '', 0, 1, 0, '2021-08-05 11:17:02', '2021-08-05 12:33:26'),
(9, NULL, 'Fiqh', 'F-12', '', '', '', '', 1, 1, 0, '2021-08-05 11:19:47', '2021-10-05 10:36:24'),
(10, 2, 'Dars E Aqaid', 'A-13', '', '', '', '', 0, 0, 0, '2021-08-05 11:16:23', '2022-11-24 03:43:54'),
(11, 2, 'Full Stack Web Development with Codeigniter 3', 'FSCI-3', 'This is a complete course about how to use codeigniter, how to make applications using codeigniter how to make applications using codeigniter.', 'JavaScript has been around for over 20 years. It is the dominant programming language in web development.  In the beginning JavaScript was a language for the web client (browser). Then came the ability to use JavaScript on the web server (with Node.js).  Today the hottest buzzword is \"Full Stack JavaScript\".  The idea of \"Full Stack JavaScript\" is that all software in a web application, both client side and server side, should be written using JavaScript only.', 'https://www.youtube.com/embed/mJ_SfLJKVs8', '11.jpg', 1, 0, 0, '2021-08-05 11:17:02', '2022-11-24 03:44:07'),
(12, 2, 'Testing', 'Test', 'Testingtestingtestingtesting', 'TestingtestingtestingtestingTestingtestingtestingtestingTestingtestingtestingtesting', 'https://www.youtube.com/embed/8KaJRw-rfn8', '19.jpg', 0, 3, 0, '2021-10-28 06:18:50', '2021-12-30 09:40:52'),
(20, 12, 'Pakistan Studies', 'PS-10', 'Pakistan Studies', 'Pakistan Studies', 'https://www.youtube.com/embed/dCruT4g-1xw', '20.jpg', 0, 1, 0, '2021-12-30 07:16:35', '2021-12-30 07:16:35'),
(21, NULL, 'Introduction To Brain', 'A-13', '', '', '', '', 0, 1, 0, '2021-08-05 11:16:23', '2021-08-06 05:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `course_detail`
--

CREATE TABLE `course_detail` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `activity` varchar(1000) NOT NULL,
  `activity_name` varchar(1000) NOT NULL,
  `marks` varchar(1000) NOT NULL,
  `percentage` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_detail`
--

INSERT INTO `course_detail` (`id`, `course_code`, `activity`, `activity_name`, `marks`, `percentage`, `status`, `created_at`, `updated_at`) VALUES
(24, '7', 'a:4:{i:0;s:10:\"Assignment\";i:1;s:4:\"Quiz\";i:2;s:4:\"Exam\";i:3;s:4:\"Exam\";}', 'a:4:{i:0;s:11:\"assignment1\";i:1;s:6:\"quiz 1\";i:2;s:8:\"mid exam\";i:3;s:10:\"final exam\";}', 'a:4:{i:0;s:2:\"30\";i:1;s:2:\"30\";i:2;s:2:\"50\";i:3;s:3:\"100\";}', 'a:4:{i:0;s:2:\"10\";i:1;s:2:\"10\";i:2;s:2:\"30\";i:3;s:2:\"50\";}', 1, '2022-11-04 08:39:57', '2022-11-04 08:39:57'),
(25, '31', 'a:4:{i:0;s:10:\"Assignment\";i:1;s:4:\"Quiz\";i:2;s:4:\"Exam\";i:3;s:4:\"Exam\";}', 'a:4:{i:0;s:12:\"assignment 1\";i:1;s:6:\"quiz 1\";i:2;s:8:\"mid exam\";i:3;s:5:\"final\";}', 'a:4:{i:0;s:2:\"35\";i:1;s:2:\"30\";i:2;s:2:\"50\";i:3;s:3:\"100\";}', 'a:4:{i:0;s:2:\"15\";i:1;s:2:\"10\";i:2;s:2:\"25\";i:3;s:2:\"50\";}', 1, '2022-11-08 06:12:43', '2022-11-08 06:12:43'),
(26, '12', 'a:1:{i:0;s:10:\"Assignment\";}', 'a:1:{i:0;s:12:\"asignement 2\";}', 'a:1:{i:0;s:2:\"15\";}', 'a:1:{i:0;s:1:\"5\";}', 1, '2022-11-24 07:38:31', '2022-11-24 07:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `es_categories`
--

CREATE TABLE `es_categories` (
  `id_categories` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `category_icon` varchar(255) DEFAULT NULL,
  `menu_image` varchar(255) DEFAULT NULL,
  `creation_date` timestamp NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `show_on_homepage` int(11) DEFAULT 0,
  `category_type` varchar(155) NOT NULL COMMENT '1: Courses\r\n2: Blogs\r\n3: Books'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `es_categories`
--

INSERT INTO `es_categories` (`id_categories`, `name`, `status`, `category_icon`, `menu_image`, `creation_date`, `updated`, `show_on_homepage`, `category_type`) VALUES
(1, 'Tareekh', 1, NULL, NULL, '2017-10-03 19:12:22', '2021-11-19 05:47:50', 1, '1'),
(2, 'Web Development', 1, NULL, NULL, '2017-10-03 19:49:15', NULL, 1, '1'),
(3, 'Books', 3, NULL, NULL, '2017-10-13 20:16:30', NULL, 0, '3'),
(4, 'Tafseer', 1, NULL, NULL, '2017-10-14 19:28:05', '2022-01-24 11:52:56', 0, '2'),
(5, 'Ashaars', 1, NULL, NULL, '2018-01-21 19:28:37', NULL, 1, '3'),
(6, 'Hamd-o-Naat', 1, NULL, NULL, '2018-03-08 05:33:49', NULL, 1, '3'),
(7, 'Ahkaam', 1, NULL, NULL, '2018-03-08 05:33:49', NULL, 1, '1'),
(8, 'Ahkaam', 1, NULL, NULL, '2018-03-08 05:33:49', NULL, 1, '2'),
(9, 'History', 1, NULL, NULL, '2021-12-29 07:16:24', NULL, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `es_slider`
--

CREATE TABLE `es_slider` (
  `id_slider` int(11) NOT NULL,
  `event_id` int(15) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `dummy_description` text NOT NULL,
  `button_title` varchar(255) NOT NULL,
  `button_link` varchar(255) NOT NULL,
  `status` int(1) DEFAULT 1,
  `type` int(1) DEFAULT 1 COMMENT '1->slider image,2->slider right image',
  `creation_date` timestamp NULL DEFAULT current_timestamp(),
  `sortField` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `es_slider`
--

INSERT INTO `es_slider` (`id_slider`, `event_id`, `image`, `link`, `title`, `description`, `dummy_description`, `button_title`, `button_link`, `status`, `type`, `creation_date`, `sortField`) VALUES
(25, 11, '25.jpg', 'Seminar', 'Awareness Seminar', '', ' _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ', '', '', 1, 1, '2021-10-01 10:34:01', 2),
(26, 12, '26.jpg', 'Seminar', 'Islam and Science Islam and Science and', 'An educational seminar regarding the view of Islam about Science. An educational seminar regarding the view of Islam about Science. An educational seminar regarding the view of Islam about ScienceAn educational seminar regarding the view of Islam about ScienceAn educational seminar regarding the view of Islam about Science An educational seminar regarding the view of Islam about Science An educational seminar regarding the view of Islam about Science', ' _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _', '', '', 1, 1, '2021-10-01 10:46:37', 6),
(27, 13, '27.jpg', 'Majalis', 'Majalis-e-Aza', 'Majalis e aza for Females', ' _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _', 'Google', 'https://www.google.com/', 1, 1, '2021-10-02 13:10:36', 3),
(29, 0, '29.jpg', 'Seminar', '', '', '_____________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________', '', '', 1, 1, '2021-10-27 15:34:26', 4),
(41, 11, '41.jpg', 'seminar', 'Slider Title', 'Slider Description', '_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _', 'Google', 'https://www.google.com/', 1, 1, '2021-12-28 12:56:37', 1),
(42, 12, '42.jpg', 'seminar', 'Slider Title', 'Slider Description', ' _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ', 'Google', 'https://www.google.com/', 1, 1, '2021-12-28 13:05:03', 7),
(43, 11, '43.jpg', 'dummy', 'Dummy Title', 'Dummy Description', ' _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _', '', '', 1, 1, '2021-12-28 13:07:22', 8),
(44, 0, '44.jpg', 'dummy', '', '', ' _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ', '', '', 1, 1, '2021-12-28 13:09:27', 9);

-- --------------------------------------------------------

--
-- Table structure for table `es_sub_categories`
--

CREATE TABLE `es_sub_categories` (
  `id_sub_categories` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `creation_date` timestamp NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `show_on_homepage` int(11) DEFAULT 0 COMMENT '1->yes, 0-> No',
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `es_sub_categories`
--

INSERT INTO `es_sub_categories` (`id_sub_categories`, `name`, `id_category`, `status`, `creation_date`, `updated`, `show_on_homepage`, `description`) VALUES
(1, 'History of Hazara\'s', 1, 1, '2017-11-18 08:09:36', NULL, 1, 'Bayanaat of Hazrat Aqdas Shah Feroz Abdullah Memon Sahib D.B'),
(2, 'PHP - Codeigniter 3', 2, 1, '2017-11-18 08:11:53', '2017-12-21 14:39:35', 1, 'Short Audios of Hazrat Aqdas Shah Feroz Abdullah Memon Sahib D.B'),
(3, 'Bayanat', 1, 1, '2017-11-18 08:15:10', NULL, 1, 'Bayanaat of Hazrat Mufti Muhammad Khurram Abbasi Sahib D.B'),
(4, 'Majalis', 1, 1, '2017-11-18 08:16:33', NULL, 0, 'Majalis of Hazrat Mufti Muhammad Khurram Abbasi Sahib D.B'),
(5, 'mp4 Clips', 2, 1, '2017-11-18 08:22:48', '2022-01-18 09:33:02', 0, 'Short Audios of Hazrat Mufti Muhammad Khurram Abbasi Sahib D.B'),
(6, 'Books', 3, 1, '2017-11-18 08:42:47', NULL, 0, 'Books'),
(7, 'Mp3 Audio', 1, 1, '2017-12-18 20:29:56', NULL, 0, 'Bayanaat of different ULMA'),
(8, 'Ashaars', 5, 1, '2018-01-21 19:30:08', NULL, 0, 'Ashaars'),
(9, 'Naat', 6, 1, '2018-03-08 05:39:13', NULL, 0, 'Naat-E-Rasool-E-Maqbool S.A.W'),
(10, 'Hamd', 6, 1, '2018-03-08 05:40:18', NULL, 0, 'Hamd-E-BariTallah'),
(11, 'Java', 2, 1, '2021-11-19 05:57:05', NULL, 0, 'Java is a top class language'),
(12, 'History of Pakistan', 9, 1, '2021-12-29 08:39:43', NULL, 0, 'A few sentences brief description');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `long_description` longtext NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL DEFAULT current_timestamp(),
  `end_time` time NOT NULL,
  `venue` varchar(255) NOT NULL,
  `maps_embed_link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `long_description`, `start_date`, `start_time`, `end_date`, `end_time`, `venue`, `maps_embed_link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Role of Islam in our Society', 'An awaremess seminar regarding the role of Islam in our society.', 'An awaremess seminar regarding the role of Islam in our society.', '2021-10-04', '16:00:00', '2021-10-06', '18:30:00', 'House Number 7-67/46, Near Shafa Khana Alamdar Road Quetta', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1094.1916634977338!2d67.03194094021451!3d30.184266593778826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ed2de6f23ef71fb%3A0xa415d848a86428e4!2sMadrasa!5e0!3m2!1sen!2s!4v1636526568192!5m2!1sen!', '11.jpg', 1, '2021-10-01 10:31:01', '2021-12-08 10:21:30'),
(12, 'Islam and Science', 'An educational seminar regarding the view of Islam about Science view of Islam about Science....', 'An educational seminar regarding the view of Islam about Science', '2021-10-11', '10:00:00', '2021-10-15', '12:00:00', 'House Number 7-67/46, Near Shafa Khana Alamdar Road Quetta', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1094.1916634977338!2d67.03194094021451!3d30.184266593778826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ed2de6f23ef71fb%3A0xa415d848a86428e4!2sMadrasa!5e0!3m2!1sen!2s!4v1636526568192!5m2!1sen!', '12.jpg', 1, '2021-10-01 10:42:07', '2021-12-08 10:21:36'),
(13, 'Majalis-e-Aza', 'Majalis e aza for Females', 'Majalis e aza for Females in FIC', '2021-10-04', '16:00:00', '2021-10-08', '17:30:00', 'Alamdar Road', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1094.1916634977338!2d67.03194094021451!3d30.184266593778826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ed2de6f23ef71fb%3A0xa415d848a86428e4!2sMadrasa!5e0!3m2!1sen!2s!4v1636526568192!5m2!1sen!', '13.jpg', 1, '2021-10-02 13:07:56', '2021-12-08 10:21:42'),
(15, 'Majalis-e-aza', 'Majalis e aza for males and females for males and females', 'Majalis e aza for males and females123123@', '2021-10-15', '16:00:00', '2021-11-18', '17:45:00', 'House Number 7-67/46, Near Shafa Khana Alamdar Road Quetta', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1094.1916634977338!2d67.03194094021451!3d30.184266593778826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ed2de6f23ef71fb%3A0xa415d848a86428e4!2sMadrasa!5e0!3m2!1sen!2s!4v1636526568192!5m2!1sen!', '15.jpg', 1, '2021-10-27 12:36:10', '2021-12-08 10:32:40'),
(20, 'How to stick to a daily routine', 'An educational seminar which is going to highlight the importance of a routine and how to stick to it', 'You detailed description', '2021-12-31', '16:00:00', '2021-12-31', '18:00:00', 'Major Nadir Auditorium Near Hassan Musa Girls College', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3448.708337431489!2d67.02734921507296!3d30.18832448183031!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ed2df8aba693793%3A0xc3749e42edafb9!2sMajor%20Nadir%20Adutorium!5e0!3m2!1sen!2s!4v164077956', '20.jpg', 1, '2021-12-29 12:44:40', '2021-12-29 12:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(25) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(205, '205.jpg', 1, '2021-12-27 06:23:41', '2021-12-27 06:23:41'),
(206, '206.jpg', 1, '2021-12-27 06:23:41', '2021-12-27 06:23:42'),
(207, '207.jpg', 1, '2021-12-27 06:23:42', '2021-12-27 06:23:45'),
(208, '208.jpg', 1, '2021-12-27 06:23:45', '2021-12-27 06:23:45'),
(209, '209.jpg', 1, '2021-12-27 06:23:45', '2021-12-27 06:23:45'),
(210, '210.jpg', 1, '2021-12-27 06:23:45', '2021-12-27 06:23:47'),
(211, '211.jpg', 1, '2021-12-27 06:23:47', '2021-12-27 06:23:49'),
(212, '212.jpg', 1, '2021-12-27 06:23:49', '2021-12-27 06:23:51'),
(213, '213.jpg', 1, '2021-12-27 06:23:51', '2021-12-27 06:23:52'),
(214, '214.jpg', 1, '2021-12-27 06:23:52', '2021-12-27 06:23:53'),
(215, '215.jpg', 3, '2021-12-27 06:23:53', '2021-12-27 06:32:34'),
(216, '216.jpg', 1, '2021-12-27 06:23:56', '2021-12-27 06:23:58'),
(217, '217.jpg', 1, '2021-12-27 06:23:58', '2021-12-27 06:23:59'),
(218, '218.JPG', 1, '2021-12-27 06:23:59', '2021-12-27 06:24:01'),
(219, '219.JPG', 1, '2021-12-27 06:24:01', '2021-12-27 06:24:02'),
(220, '220.JPG', 1, '2021-12-27 06:24:02', '2021-12-27 06:24:04'),
(221, '221.JPG', 1, '2021-12-27 06:24:04', '2021-12-27 06:24:06'),
(222, '222.JPG', 1, '2021-12-27 06:24:06', '2021-12-27 06:24:07'),
(223, '223.JPG', 1, '2021-12-27 06:24:07', '2021-12-27 06:24:09'),
(224, '224.JPG', 1, '2021-12-27 06:24:09', '2021-12-27 06:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(25) NOT NULL,
  `offered_course_id` varchar(255) NOT NULL,
  `syllabus_id` int(15) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `week_number` int(25) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `offered_course_id`, `syllabus_id`, `title`, `description`, `week_number`, `video_url`, `status`, `created_at`, `updated_at`) VALUES
(12, '18', 1, 'Introduction to PHP', 'PHP is a backend scription languge for Web. It is used to build dynamic web applications.', 1, '', 0, '2021-11-02 14:22:50', '2022-01-15 10:07:36'),
(13, '18', 2, 'Introduction to Python', 'asdhasjkdhaskjdhasdjkhadksjd', 2, '', 1, '2021-11-02 14:22:50', '2021-11-09 10:19:51'),
(36, '18', 3, 'Introduction to Laravel', 'asdhasjkdhaskjdhasdjkhadksjd', 3, '', 1, '2021-11-02 14:22:50', '2021-11-02 15:33:13'),
(37, '18', 8, 'Sessions', 'Sessions in Codeigniter are used to move data from one page to another', 5, '', 1, '2021-11-02 14:22:50', '2021-11-02 15:33:15'),
(431, '18', 9, 'Migrations', 'Migrations are an easy way to develop a database in our Codeigniter application. It  is like a version control', 4, '', 1, '2021-11-03 06:53:57', '2021-11-03 06:54:42'),
(432, '18', 12, 'testestset', 'testestsettestestsettestestsettestestset', 6, '', 1, '2021-11-03 06:53:57', '2021-11-03 06:54:44'),
(455, '19', 1, 'Introduction to PHP', 'PHP is a backend scription languge for Web. It is used to build dynamic web applications.', 1, '', 1, '2021-11-03 07:02:40', '2021-11-03 07:02:40'),
(456, '19', 3, 'Introduction to Laravel', 'asdhasjkdhaskjdhasdjkhadksjd', 3, '', 1, '2021-11-03 07:02:40', '2021-11-03 07:02:40'),
(457, '19', 8, 'Sessions', 'Sessions in Codeigniter are used to move data from one page to another', 5, '', 1, '2021-11-03 07:02:40', '2021-11-03 07:02:40'),
(458, '19', 9, 'Migrations', 'Migrations are an easy way to develop a database in our Codeigniter application. It  is like a version control', 4, '', 1, '2021-11-03 07:02:40', '2021-11-03 07:02:40'),
(459, '19', 12, 'testestset', 'testestsettestestsettestestsettestestset', 6, '', 1, '2021-11-03 07:02:40', '2021-11-03 07:02:40'),
(460, '19', 2, 'Introduction to Python', 'asdhasjkdhaskjdhasdjkhadksjd', 2, '', 1, '2021-11-03 07:03:29', '2021-11-03 07:03:29'),
(461, '19', 0, 'Unit Testing', 'TestingTestingTestingTestingTestingTestingTestingTestingTestingTesting', 7, '', 1, '2021-11-03 08:20:05', '2021-11-03 08:20:05'),
(462, '18', 0, 'PHP Functional Testing', 'TestingTestingTestingTestingTestingTestingTestingTestingTestingTesting', 7, '', 1, '2021-11-03 08:20:49', '2021-11-03 08:20:49'),
(463, '7', 1, 'Introduction to PHP', 'PHP is a backend scription languge for Web. It is used to build dynamic web applications.', 1, '', 1, '2021-12-16 10:54:30', '2022-01-15 10:08:57'),
(464, '7', 2, 'Introduction to Python', 'asdhasjkdhaskjdhasdjkhadksjd', 2, '', 1, '2021-12-16 10:54:30', '2021-12-16 10:54:30'),
(465, '7', 3, 'Introduction to Laravel', 'asdhasjkdhaskjdhasdjkhadksjd', 3, '', 1, '2021-12-16 10:54:30', '2021-12-16 10:54:30'),
(466, '7', 8, 'Sessions', 'Sessions in Codeigniter are used to move data from one page to another', 5, '', 1, '2021-12-16 10:54:30', '2021-12-16 10:54:30'),
(467, '7', 9, 'Migrations', 'Migrations are an easy way to develop a database in our Codeigniter application. It  is like a version control', 4, '', 1, '2021-12-16 10:54:30', '2021-12-16 10:54:30'),
(468, '7', 12, 'testestset', 'testestsettestestsettestestsettestestset', 6, '', 1, '2021-12-16 10:54:30', '2021-12-16 10:54:30'),
(469, '7', 0, 'Testing Testing Testing', 'Testing Testing TestingTesting Testing TestingTesting Testing TestingTesting Testing TestingTesting Testing Testing', 1, '', 1, '2021-12-16 10:54:47', '2021-12-16 10:54:47'),
(470, '23', 0, 'The concept of civilization', 'In this lesson we will be learning about what is a civilization and which are some old civilizations in Pakistan', 1, '', 1, '2022-01-06 07:07:40', '2022-01-14 07:25:53'),
(471, '23', 0, 'The struggle for Pakistan', 'In this lesson we will be learning about the struggle for independence', 1, '', 1, '2022-01-06 07:08:31', '2022-01-06 07:08:31'),
(472, '25', 0, 'Geography of Pakistan', 'In this lesson we will be learning about the geography of Pakistan', 1, '', 1, '2022-01-06 07:13:00', '2022-01-06 07:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(15) NOT NULL,
  `login_time` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `login_time`, `ip_address`) VALUES
(35, '1628947575', '::1'),
(36, '1628947582', '::1'),
(37, '1628947589', '::1'),
(38, '1628947596', '::1'),
(39, '1628947654', '::1'),
(40, '1628947659', '::1'),
(41, '1628947662', '::1'),
(42, '1628947679', '::1'),
(43, '1628947785', '::1'),
(44, '1628947792', '::1'),
(45, '1628947798', '::1'),
(46, '1628947804', '::1'),
(47, '1628947905', '::1'),
(48, '1628947907', '::1'),
(49, '1628947910', '::1'),
(50, '1629016862', '::1'),
(51, '1629016867', '::1'),
(52, '1629016968', '::1'),
(53, '1629016973', '::1'),
(54, '1629016976', '::1'),
(55, '1629017000', '::1'),
(56, '1629017025', '::1'),
(57, '1629017031', '::1'),
(58, '1629017033', '::1'),
(59, '1629017037', '::1'),
(60, '1629017052', '::1'),
(61, '1629017056', '::1'),
(62, '1629017238', '::1'),
(63, '1629017241', '::1'),
(64, '1629017244', '::1'),
(65, '1629017255', '::1'),
(66, '1629044445', '::1'),
(67, '1629044449', '::1'),
(68, '1629044451', '::1'),
(69, '1629044572', '::1'),
(70, '1629044576', '::1'),
(71, '1629044578', '::1'),
(72, '1629044608', '::1'),
(73, '1629044612', '::1'),
(74, '1629044614', '::1'),
(75, '1629044622', '::1'),
(76, '1629044742', '::1'),
(77, '1629044744', '::1'),
(78, '1629044747', '::1'),
(79, '1629044809', '::1'),
(80, '1629044811', '::1'),
(81, '1629044813', '::1'),
(82, '1629044836', '::1'),
(83, '1629044907', '::1'),
(84, '1629044912', '::1'),
(85, '1629044914', '::1'),
(86, '1629044934', '::1'),
(87, '1629044942', '::1'),
(88, '1629044963', '::1'),
(89, '1629044991', '::1'),
(90, '1629044994', '::1'),
(91, '1629044996', '::1'),
(92, '1629045210', '::1'),
(93, '1629045215', '::1'),
(94, '1629045223', '::1'),
(95, '1629045252', '::1'),
(96, '1629045255', '::1'),
(97, '1629045258', '::1'),
(98, '1629045514', '::1'),
(99, '1629045518', '::1'),
(100, '1629045521', '::1'),
(101, '1629045563', '::1'),
(102, '1629045566', '::1'),
(103, '1629045568', '::1'),
(104, '1629046009', '::1'),
(105, '1629046012', '::1'),
(106, '1629046014', '::1'),
(107, '1629046033', '::1'),
(108, '1629046048', '::1'),
(109, '1629046135', '::1'),
(110, '1629046138', '::1'),
(111, '1629046140', '::1'),
(112, '1629046150', '::1'),
(113, '1629046156', '::1'),
(114, '1629046159', '::1'),
(115, '1629046162', '::1'),
(116, '1629046209', '::1'),
(117, '1629046247', '::1'),
(118, '1629046249', '::1'),
(119, '1629046251', '::1'),
(120, '1629046267', '::1'),
(121, '1629046287', '::1'),
(122, '1629184877', '::1'),
(123, '1629199559', '::1'),
(124, '1629199563', '::1'),
(125, '1629199565', '::1'),
(126, '1629199570', '::1'),
(127, '1629199579', '::1'),
(128, '1629199589', '::1'),
(129, '1629199596', '::1'),
(130, '1629199600', '::1'),
(131, '1629199605', '::1'),
(132, '1629199609', '::1'),
(133, '1629199612', '::1'),
(134, '1629199618', '::1'),
(135, '1629199621', '::1'),
(136, '1629199628', '::1'),
(137, '1629199632', '::1'),
(138, '1629199638', '::1'),
(139, '1629199643', '::1'),
(140, '1629199652', '::1'),
(141, '1629208415', '::1'),
(142, '1629208426', '::1'),
(143, '1629441042', '::1'),
(144, '1629442573', '::1'),
(145, '1629787348', '::1'),
(146, '1629787351', '::1'),
(147, '1629787354', '::1'),
(148, '1629787362', '::1'),
(149, '1630050934', '127.0.0.1'),
(150, '1630050953', '127.0.0.1'),
(151, '1630050979', '127.0.0.1'),
(152, '1630051062', '127.0.0.1'),
(153, '1630051074', '127.0.0.1'),
(154, '1630057575', '127.0.0.1'),
(155, '1630057587', '127.0.0.1'),
(156, '1630057682', '127.0.0.1'),
(157, '1630402835', '127.0.0.1'),
(158, '1630402849', '127.0.0.1'),
(159, '1630403624', '127.0.0.1'),
(160, '1630403629', '127.0.0.1'),
(161, '1630405414', '::1'),
(162, '1630410008', '::1'),
(163, '1630410011', '::1'),
(164, '1630410013', '::1'),
(165, '1630410020', '::1'),
(166, '1630410070', '::1'),
(167, '1630411884', '::1'),
(168, '1630411886', '::1'),
(169, '1630411888', '::1'),
(170, '1630411913', '::1'),
(171, '1630411979', '::1'),
(172, '1630411981', '::1'),
(173, '1630411983', '::1'),
(174, '1630412068', '::1'),
(175, '1630412070', '::1'),
(176, '1630412072', '::1'),
(177, '1630412080', '::1'),
(178, '1630412284', '::1'),
(179, '1630412286', '::1'),
(180, '1630412288', '::1'),
(181, '1630412294', '::1'),
(182, '1630412308', '::1'),
(183, '1630412703', '::1'),
(184, '1630412709', '::1'),
(185, '1630412713', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `semester` int(2) NOT NULL,
  `offered_course_id` int(11) NOT NULL,
  `obtained_percentage` blob NOT NULL DEFAULT '0',
  `grand_total` float NOT NULL DEFAULT 0,
  `grade` varchar(1) NOT NULL DEFAULT 'F',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `student_id`, `program`, `semester`, `offered_course_id`, `obtained_percentage`, `grand_total`, `grade`, `status`, `created_at`, `updated_at`) VALUES
(4, 48, 'BS - CS', 1, 7, 0x613a343a7b693a303b733a323a223235223b693a313b733a323a223235223b693a323b733a323a223430223b693a333b733a323a223530223b7d, 65.6667, 'B', 1, '2022-10-25 08:15:42', '2022-10-25 08:15:42'),
(5, 48, 'BS - CS', 1, 31, 0x613a343a7b693a303b733a323a223235223b693a313b733a323a223235223b693a323b733a323a223435223b693a333b733a323a223835223b7d, 84.0476, 'A', 1, '2022-11-08 06:10:07', '2022-11-08 06:10:07'),
(6, 48, 'BS - CS', 8, 13, 0x613a343a7b693a303b733a323a223235223b693a313b733a313a2230223b693a323b733a313a2230223b693a333b733a313a2230223b7d, 10.7143, 'F', 1, '2022-11-08 07:00:22', '2022-11-08 07:00:22'),
(7, 48, 'BS - CS', 1, 25, 0x30, 0, 'F', 1, '2022-11-21 09:12:29', '2022-11-21 09:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id_notifications` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `creation_date` timestamp NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1->Bayan,2->other',
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id_notifications`, `title`, `status`, `creation_date`, `updated`, `type`, `date`, `time`) VALUES
(1, '<b>Isha ki Majlis</b> - Jummah ta Budh baad Nmaz e Isha', 3, '2017-11-24 19:56:05', NULL, NULL, '2017-12-02', NULL),
(2, '<b>Zikr ki Majlis</b> - hr itwar baad Nmaz e Maghrib', 3, '2017-11-27 20:41:03', NULL, NULL, '2017-12-02', NULL),
(3, '<b>Markazi Bayan</b> - hr itwar baad Nmaz e Asr', 3, '2017-12-01 11:21:35', NULL, NULL, '2017-12-02', NULL),
(4, '<b>Islahi Bayan</b><br/>Jummah, 22 Dec, baad Nmaz e Maghrib, Jam e Masjid Taj, Agra Taj, Layari. <br/> Khawaten ka baparda intezam he.', 3, '2017-12-13 19:59:53', NULL, NULL, '2017-12-13', NULL),
(5, '<b>ISLAHI BAYAN</b><br/>\r\nSaturday, 6 Jan, Baad Nmaz e Isha (7:45), Jamah Masjid Munawara, Block L North Nazimabad, Karachi.', 3, '2017-12-22 16:25:27', NULL, NULL, '2017-12-23', NULL),
(6, '<b>Majalis</b><br/>\r\nAj ki majlis Hazrat DB ki hidayat per live nahi ki gaye.\r\n<br/><b>Date</b> 1-Jan-2018', 3, '2018-01-01 16:24:18', NULL, NULL, '2018-01-01', NULL),
(7, '<b>ISLAHI BAYAN</b><br/>\r\nSaturday, 6 Jan, Baad Nmaz e Isha (7:45), Jamah Masjid Munawara, Block L North Nazimabad, Karachi.', 3, '2018-01-06 08:20:26', NULL, NULL, '2018-01-06', NULL),
(8, 'Urgent Meeting Today!', 1, '2021-07-06 06:40:43', NULL, NULL, '2021-07-11', NULL),
(9, 'Research regarding current affairs.', 1, '2021-07-06 06:42:29', NULL, NULL, '2021-07-17', NULL),
(10, '<b>Meeting with Intazamia </b><br>\r\nMonday 12, 2021 Baad Namaz e Isha (7:45), Jamah Masjid Munawara, Block L North Nazimabad, Karachi.', 1, '2021-07-06 06:44:41', NULL, NULL, '2021-07-06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offered_courses`
--

CREATE TABLE `offered_courses` (
  `id` int(15) NOT NULL,
  `teacher_id` int(15) NOT NULL,
  `semester_course_id` int(15) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offered_courses`
--

INSERT INTO `offered_courses` (`id`, `teacher_id`, `semester_course_id`, `status`, `created_at`, `updated_at`) VALUES
(7, 2, 1, 1, '2021-08-10 10:29:55', '2022-01-26 09:25:30'),
(8, 2, 2, 1, '2021-08-10 10:29:55', '2022-01-26 09:25:30'),
(9, 2, 3, 1, '2021-08-10 10:29:55', '2022-01-26 09:25:30'),
(10, 3, 1, 0, '2021-08-12 05:24:47', '2021-08-21 14:01:05'),
(11, 5, 1, 1, '2021-08-12 05:24:47', '2021-08-20 14:03:40'),
(12, 5, 5, 1, '2021-08-12 05:24:47', '2021-08-20 13:52:59'),
(13, 2, 1, 1, '2021-08-20 11:17:14', '2022-01-26 09:25:30'),
(14, 5, 2, 0, '2021-08-20 11:17:14', '2021-08-21 14:01:05'),
(15, 5, 2, 1, '2021-08-20 11:17:14', '2022-01-15 09:28:21'),
(16, 6, 1, 1, '2021-10-04 05:57:34', NULL),
(17, 6, 9, 0, '2021-10-04 05:57:34', '2021-12-06 15:29:45'),
(18, 16, 1, 1, '2021-10-04 05:57:34', '2021-12-06 17:45:53'),
(19, 5, 11, 0, '2021-10-04 05:57:34', '2021-12-06 15:29:47'),
(22, 18, 1, 1, '2022-01-06 06:34:06', NULL),
(23, 18, 6, 1, '2022-01-06 06:34:06', NULL),
(25, 6, 6, 1, '2022-01-06 07:12:10', NULL),
(31, 2, 5, 1, '2022-01-18 06:56:15', '2022-01-26 09:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

CREATE TABLE `posts_tags` (
  `id` int(25) NOT NULL,
  `post_id` int(25) NOT NULL,
  `tag_id` int(25) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts_tags`
--

INSERT INTO `posts_tags` (`id`, `post_id`, `tag_id`, `status`, `created_at`, `updated_at`) VALUES
(26, 7, 3, 1, '2021-12-02 07:14:30', '2021-12-02 07:14:30'),
(27, 7, 4, 1, '2021-12-02 07:14:30', '2021-12-02 07:14:30'),
(36, 1, 4, 1, '2021-12-03 09:56:52', '2021-12-03 09:56:52'),
(51, 3, 1, 1, '2021-12-03 12:06:38', '2021-12-03 12:06:38'),
(52, 3, 4, 1, '2021-12-03 12:06:38', '2021-12-03 12:06:38'),
(63, 6, 3, 1, '2021-12-10 10:48:46', '2021-12-10 10:48:46'),
(69, 5, 3, 1, '2021-12-14 11:30:01', '2021-12-14 11:30:01'),
(70, 4, 1, 1, '2021-12-14 11:30:18', '2021-12-14 11:30:18'),
(71, 4, 4, 1, '2021-12-14 11:30:18', '2021-12-14 11:30:18'),
(72, 8, 5, 1, '2021-12-29 10:23:25', '2021-12-29 10:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `program_thumbnail` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`, `description`, `program_thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BS - CS', '<p>The goal of this course is to take you, you beautiful front end developer you, from someone with very little or no jQuery or JavaScript knowledge and up you to someone who is quite comfortable working with and writing jQuery and JavaScript.</p>\r\n<p><strong>Learning Outcomes</strong><br><span style=\"background-color:rgb(255,255,255);color:rgb(0,0,0);\">By the time of graduation, the students develop an ability to:</span></p><ol><li style=\"text-align:justify;\">Apply knowledge of computing and mathematics that is appropriate for the program.</li><li style=\"text-align:justify;\">Analyse a problem and define computing requirements that are appropriate to its solution.</li><li style=\"text-align:justify;\">Design, implement, and evaluate a computer-based system, process, component or program to meet desired needs.</li><li style=\"text-align:justify;\">Work in a team to accomplish a common goal.</li><li style=\"text-align:justify;\">Understand professional, ethical, and social issues and responsibilities.</li><li style=\"text-align:justify;\">Communicate effectively with different audiences.</li><li style=\"text-align:justify;\">Apply automated reasoning.</li><li style=\"text-align:justify;\">Transform large amounts of data into actionable decisions.</li><li style=\"text-align:justify;\">Focus on how complex inputs, such as vision, language, and huge databases, can be used to make decisions or enhance human capabilities.</li><li style=\"text-align:justify;\">Change the world for the better – in areas like healthcare, transportation, and education etc</li></ol><p><strong>Award of Degree</strong></p><p style=\"margin-left:0px;text-align:justify;\">For the award of BS (Artificial Intelligence) degree, a student must have:</p><ul><li style=\"text-align:justify;\">Passed courses with a total of at least 132 credit hours, including all those courses that have been specified as core courses</li><li style=\"text-align:justify;\">Obtained a CGPA of at least 2.00</li></ul>', '1.jpg', 1, '2021-12-06 15:07:03', '2021-12-16 18:08:28'),
(3, 'Bachelors of Information Technology', 'The goal of this course is to take you, you beautiful front end developer you, from someone with very little or no jQuery or JavaScript knowledge and up you to someone who is quite comfortable working with and writing jQuery and JavaScript.\r\n<ol><li style=\"text-align:justify;\">Impart in-depth understanding of Computer Science field according to international standards</li><li style=\"text-align:justify;\">Convert understanding to innovations</li><li style=\"text-align:justify;\">Build diverse careers in Computer Science as productive IT professionals and entrepreneurs for the socio-economic development</li><li style=\"text-align:justify;\">Prepare students for the graduate level studies and research</li><li style=\"text-align:justify;\">Develop effective communication, management and leadership skills</li><li style=\"text-align:justify;\">Impart professional ethics and collaborative team player abilities</li></ol><p><strong>Learning Outcomes</strong></p><ol><li style=\"text-align:justify;\">Students will be able to possess essential knowledge and overview of the general area of computer science, and its applications</li><li style=\"text-align:justify;\">Students will be able to think creatively and critically and build logic and solve non trivial problems</li><li style=\"text-align:justify;\">Students will be able to demonstrate basic concepts of programming, data structures, operating systems, algorithms, databases, artificial intelligence, and computer networking</li><li style=\"text-align:justify;\">Students will be able to exhibit fundamental software engineering, object oriented analysis &amp; design concepts by developing and managing software projects</li><li style=\"text-align:justify;\">Students will be able to address ethical, social, and environmental issues in their professional life and will practice professional and ethical responsibilities</li><li style=\"text-align:justify;\">Students will be able to apply concepts and techniques from computing and mathematics to both theoretical and practical problems</li><li style=\"text-align:justify;\">Students will be able to communicate their knowledge, experience, and ideas at national and international level</li><li style=\"text-align:justify;\">Students will be able to pursue their careers as Software engineer, Programmer, Web developer, Games programmer or Computer graphic designer</li><li style=\"text-align:justify;\">Students will be able to work effectively in multi-disciplinary teams</li><li style=\"text-align:justify;\">Students will be able to pursue graduate level studies and research</li></ol><p style=\"text-align:justify;\">&nbsp;</p><p><strong>Career Opportunities</strong></p><p>Your career prospects will be excellent: You may become a software engineer, programmer, web developer, games programmer or computer graphic designer.</p><p><strong>Award of Degree</strong></p><p style=\"margin-left:0px;text-align:justify;\">For the award of BS (Computer Science) degree, a student must have:</p><ul><li style=\"text-align:justify;\">Passed courses totalling at least 130 credit hours, including all those courses which have been specified as Core courses.</li><li style=\"text-align:justify;\">Obtained a CGPA of at least 2.00</li></ul>', '3.jpg', 1, '2021-12-14 11:05:41', '2021-12-16 17:56:09'),
(4, 'Ahkaam', 'The goal of this course is to take you, you beautiful front end developer you, from someone with very little or no jQuery or JavaScript knowledge and up you to someone who is quite comfortable working with and writing jQuery and JavaScript.<p>&nbsp;Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing Testing&nbsp;</p>', '4.jpg', 1, '2021-12-15 11:31:39', '2021-12-16 18:07:10'),
(10, 'Test', '<p><mark class=\"marker-yellow\"><u>Testing</u></mark></p>', '10.jpg', 1, '2022-03-15 05:24:35', '2022-03-15 05:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `day` varchar(45) DEFAULT NULL,
  `afterFajir` varchar(500) DEFAULT NULL,
  `beforeZohar` varchar(500) DEFAULT NULL,
  `afterZohar` varchar(500) DEFAULT NULL,
  `beforeAsar` varchar(500) DEFAULT NULL,
  `afterAsar` varchar(500) DEFAULT NULL,
  `afterMajrib` varchar(500) DEFAULT NULL,
  `afterInsha` varchar(500) DEFAULT NULL,
  `beforeFajir` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `day`, `afterFajir`, `beforeZohar`, `afterZohar`, `beforeAsar`, `afterAsar`, `afterMajrib`, `afterInsha`, `beforeFajir`) VALUES
(1, 'Sunday', '', '', '', '', 'Markazi Bayan', 'Majlis E Zikr', '', ''),
(2, 'Monday', '', '', '', '', '', '', 'Majlis', ''),
(3, 'Tuesday', '', '', '', '', '', '', 'Majlis', ''),
(4, 'Wednesday', '', '', '', '', '', '', 'Majlis', ''),
(5, 'Thursday', '', '', '', '', '', '', '', ''),
(6, 'Friday', '', '', '', '', '', '', '', ''),
(7, 'Saturday', '', '', '', '', '', '', 'Majlis', '');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(25) NOT NULL,
  `program_id` int(25) NOT NULL,
  `semester_number` int(25) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `program_id`, `semester_number`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-12-01', '2022-02-01', 1, '2021-12-06 15:08:11', '2021-12-16 15:31:12'),
(2, 1, 2, '2022-03-01', '2022-05-01', 1, '2021-12-06 15:08:34', '2021-12-16 15:31:49'),
(3, 1, 8, '2022-04-01', '2022-06-01', 1, '2021-12-14 15:36:07', '2022-01-15 07:34:13'),
(4, 3, 2, '2021-12-14', '2021-12-15', 1, '2021-12-14 15:57:25', '2021-12-16 15:32:07'),
(5, 4, 1, '2021-12-15', '2022-02-15', 1, '2021-12-15 11:32:03', '2021-12-15 15:42:58'),
(6, 4, 2, '2022-02-15', '2022-04-15', 1, '2021-12-15 11:32:16', '2021-12-15 11:32:16'),
(7, 10, 1, '2022-03-01', '2022-06-01', 1, '2022-03-15 05:25:19', '2022-03-15 05:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `semester_courses`
--

CREATE TABLE `semester_courses` (
  `id` int(25) NOT NULL,
  `semester_id` int(25) NOT NULL,
  `course_id` int(25) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester_courses`
--

INSERT INTO `semester_courses` (`id`, `semester_id`, `course_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 1, '2021-12-06 15:10:08', '2022-09-07 07:15:15'),
(2, 4, 11, 1, '2021-12-15 11:14:10', '2021-12-15 15:49:39'),
(3, 4, 7, 1, '2021-12-15 11:16:18', '2021-12-15 15:49:37'),
(4, 4, 12, 1, '2021-12-15 11:16:34', '2021-12-15 15:49:35'),
(5, 3, 10, 1, '2021-12-15 11:47:20', '2021-12-15 15:32:38'),
(6, 2, 20, 1, '2022-01-03 11:33:25', '2022-01-03 11:33:25'),
(7, 7, 20, 1, '2022-03-15 05:25:51', '2022-03-15 05:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_attendants`
--

CREATE TABLE `seminar_attendants` (
  `id` int(25) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id_settings` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `intro_video` varchar(255) NOT NULL,
  `maps_embed_link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `student_initial` varchar(255) NOT NULL,
  `student_counter` int(15) NOT NULL,
  `teacher_initial` varchar(255) NOT NULL,
  `teacher_counter` int(15) NOT NULL,
  `status` int(1) DEFAULT 1,
  `creation_date` timestamp NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id_settings`, `name`, `description`, `address`, `phone`, `email`, `intro_video`, `maps_embed_link`, `image`, `student_initial`, `student_counter`, `teacher_initial`, `teacher_counter`, `status`, `creation_date`, `updated`) VALUES
(1, 'Fatimiya Islamic Centre', 'Fatimiya Islamic Centre is a religious, non-profit organization which works with the aim of providing quality Islamic Education to our Society. </br></br> FIC has highly qualified teachers which makes the learning easy and enjoyable.', 'Alamdar Road Quetta', '03131234567', 'info@fic.com', 'https://www.youtube.com/watch?v=jtVmoWgede0', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d660.0731603433582!2d67.03204800519421!3d30.18434709661023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ed2de6f2c73c3a9%3A0x5fa327e70850514f!2sPanjitan%20Medical%20Store!5e0!3m2!1sen!2s!4v163653', '1.jpg', 'FICS', 0, 'FICT', 0, 1, '2017-09-27 05:51:31', '2022-05-24 10:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `sliderId` int(11) NOT NULL,
  `slider_img` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  `accountId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slider_details`
--

CREATE TABLE `slider_details` (
  `detailId` int(11) NOT NULL,
  `top_text` text NOT NULL,
  `bottom_text` text NOT NULL,
  `sliderId` int(11) NOT NULL,
  `top_text_urdu` text DEFAULT NULL,
  `bottom_text_urdu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `student_id` varchar(255) NOT NULL,
  `first_attempt` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `father_name`, `email`, `password`, `address`, `contact_number`, `qualification`, `status`, `student_id`, `first_attempt`, `created_at`, `updated_at`) VALUES
(3, 'Kamran', 'khan', 'Kamran Khan', '', 'ZWQyYjFmNDY4YzVmOTE1ZjNmMWNmNzVkNzA2OGJhYWU=', 'Toghi Road', '03138869966', 'BS - IT', 1, 'FICS-21-13', 1, '2021-08-25 12:36:01', '2021-12-30 15:06:32'),
(26, 'Mubeen', 'Ali', 'Mubeen', '', '', 'Nauabad Alamdar Road Quetta, House No. 7-63/1-A', '03138869966', 'BS - IT', 0, '0', 0, '2021-08-24 11:43:46', '2021-08-26 06:54:37'),
(27, 'Mubeen', 'Ali', 'Mubeen', 'irfanalidana6@gmail.com', 'N2NhNDEzNGQwZjM3MzY5MGZlODY2NTYzYzJkZmIzMDI=', 'Nauabad Alamdar Road Quetta, House No. 7-63/1-A', '03138869966', 'BS - IT', 1, '0', 0, '2021-08-24 11:43:53', '2022-09-07 08:05:33'),
(28, 'Mubeen', 'Ali', 'Mubeen', '', NULL, 'Nauabad Alamdar Road Quetta, House No. 7-63/1-A', '03138869966', 'BS - IT', 3, '0', 1, '2021-08-24 11:44:23', '2021-12-31 06:30:11'),
(48, 'Irfan', 'Ali', 'Ejaz Hussain', 'irfanali@gmail.com', 'ZWQyYjFmNDY4YzVmOTE1ZjNmMWNmNzVkNzA2OGJhYWU=', 'Nauabad Alamdar Road Quetta', '03138869966', 'BS - IT', 1, 'FICS-21-14', 1, '2021-09-02 11:09:49', '2021-09-02 11:16:11'),
(52, 'Irfan', 'Ali', 'Ejaz Hussain', 'irfanalidana5@gmail.com', 'NDI5N2Y0NGIxMzk1NTIzNTI0NWIyNDk3Mzk5ZDdhOTM=', 'Nauabad Alamdar Road Quetta, House No. 7-63/1-A', '03138869966', 'BS - IT', 1, 'FICS-21-18', 1, '2021-10-02 13:14:22', '2021-10-07 09:04:27'),
(53, 'Abdul', 'Baqi', 'Baqi', 'irfanalidana3@gmail.com', 'NDI5N2Y0NGIxMzk1NTIzNTI0NWIyNDk3Mzk5ZDdhOTM=', 'Alamdar Road', '03138869966', 'FSC - Pre Engineering', 0, 'FICS-21-19', 1, '2021-10-27 06:40:52', '2021-10-27 07:13:05'),
(54, 'Burhan', 'Ali', 'Burhan', 'irfanalidana2@gmail.com', NULL, 'Alamdar Road Quetta', '03138869966', 'BS - IT', 0, 'FICS-21-20', 0, '2021-11-01 08:06:22', '2021-11-01 08:06:22'),
(55, 'kamran', 'khan', 'kamran khan', 'kamran@gmail.com', NULL, 'Alamdar Road', '03138867766', 'FSC-Pre Engineering', 0, 'FICS-22-01-1', 0, '2022-01-12 09:12:12', '2022-01-12 09:12:12'),
(59, 'Irfan', 'Ali', 'Ejaz Hussain', 'irfanalidana@gmail.com', 'ZWQyYjFmNDY4YzVmOTE1ZjNmMWNmNzVkNzA2OGJhYWU=', 'Alamdar Road', '03138869966', 'BS - IT', 1, 'FICS-22-03-4', 1, '2022-03-22 07:58:21', '2022-03-22 10:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_enrollment`
--

CREATE TABLE `student_course_enrollment` (
  `id` int(15) NOT NULL,
  `offered_course_id` int(15) NOT NULL,
  `student_id` int(15) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0->drop, 1->Currently Enrolled, 2->Incomplete, 3->Completed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_course_enrollment`
--

INSERT INTO `student_course_enrollment` (`id`, `offered_course_id`, `student_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 3, 1, '2021-08-20 07:14:23', NULL),
(6, 8, 3, 0, '2021-08-20 07:35:35', NULL),
(7, 9, 3, 3, '2021-08-20 07:36:22', NULL),
(8, 10, 2, 1, '2021-08-20 11:14:50', NULL),
(10, 7, 2, 1, '2021-08-20 16:29:14', NULL),
(11, 25, 3, 1, '2022-01-13 12:01:23', NULL),
(12, 23, 3, 1, '2022-01-14 06:13:20', NULL),
(13, 11, 3, 1, '2022-01-15 06:45:48', NULL),
(14, 18, 3, 1, '2022-01-15 07:24:34', NULL),
(15, 15, 3, 1, '2022-01-15 09:32:49', NULL),
(16, 22, 3, 1, '2022-10-21 12:59:04', NULL),
(17, 23, 48, 1, '2022-10-21 13:05:58', NULL),
(18, 11, 48, 1, '2022-10-25 08:14:56', NULL),
(19, 7, 48, 1, '2022-10-25 08:15:42', NULL),
(20, 31, 48, 1, '2022-11-08 06:10:07', NULL),
(21, 13, 48, 1, '2022-11-08 07:00:22', NULL),
(22, 25, 48, 1, '2022-11-21 09:12:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_program_enrollment`
--

CREATE TABLE `student_program_enrollment` (
  `id` int(15) NOT NULL,
  `program_id` int(15) NOT NULL,
  `student_id` int(15) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0->drop, 1->Currently Enrolled, 2->Incomplete, 3->Completed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_program_enrollment`
--

INSERT INTO `student_program_enrollment` (`id`, `program_id`, `student_id`, `status`, `created_at`, `updated_at`) VALUES
(13, 1, 3, 1, '2022-01-14 11:50:14', NULL),
(14, 3, 3, 1, '2022-01-15 09:20:49', NULL),
(15, 1, 48, 1, '2022-10-21 13:07:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_lessons`
--

CREATE TABLE `sub_lessons` (
  `id` int(25) NOT NULL,
  `lesson_id` int(25) NOT NULL,
  `title` varchar(255) NOT NULL,
  `questions` int(25) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_lessons`
--

INSERT INTO `sub_lessons` (`id`, `lesson_id`, `title`, `questions`, `duration`, `video_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 12, 'What is PHP', NULL, NULL, 'https://www.youtube.com/embed/a7_WFUlFS94', 1, '2021-10-26 07:07:34', '2021-11-15 09:05:23'),
(2, 13, 'What is migration and how to perform migration in Laravel', NULL, NULL, 'https://www.youtube.com/embed/8USJR_D8pIk', 1, '2021-10-26 07:08:51', '2021-10-26 07:08:51'),
(3, 12, 'Difference b/w echo and print_r', NULL, '5mins', 'https://www.youtube.com/embed/a7_WFUlFS94', 1, '2021-10-26 07:07:34', '2021-11-15 09:05:25'),
(4, 12, 'Object Oriented PHP', NULL, NULL, 'https://www.youtube.com/embed/MVEAYafrgKM', 1, '2021-11-12 11:32:54', '2021-11-15 09:05:27'),
(5, 36, 'Object Oriented PHP', NULL, NULL, 'https://www.youtube.com/embed/MVEAYafrgKM', 1, '2021-11-12 11:33:22', '2021-11-12 11:33:22'),
(6, 12, 'Testing', NULL, NULL, 'https://www.youtube.com/watch?v=VEMyVrPC7Uw', 1, '2021-12-16 10:50:09', '2021-12-16 10:50:09'),
(7, 470, 'Ancient civilizations of Indus Valley  Mohenjo-Daro and Harappa', NULL, NULL, 'https://www.youtube.com/embed/aiTGvNeGo1U', 1, '2022-01-06 07:10:51', '2022-01-06 07:10:51'),
(8, 471, 'Testing', NULL, NULL, 'https://www.youtube.com/embed/27JtRAI3QO8', 1, '2022-01-14 06:15:10', '2022-01-14 06:15:10'),
(9, 463, 'Hello to PHP', NULL, NULL, 'https://www.youtube.com/embed/OK_JCtrrv-c', 1, '2022-01-15 07:21:11', '2022-01-15 10:08:42'),
(10, 470, 'Testing', NULL, NULL, 'https://www.youtube.com/embed/t3MAu9WxPAE', 1, '2022-01-16 06:38:36', '2022-01-16 06:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `id` int(25) NOT NULL,
  `course_id` int(25) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `week_number` int(25) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syllabus`
--

INSERT INTO `syllabus` (`id`, `course_id`, `title`, `description`, `week_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 'Introduction to PHP', 'PHP is a backend scription languge for Web. It is used to build dynamic web applications.', 1, 1, '2021-10-01 12:54:59', '2021-11-03 17:33:47'),
(2, 11, 'Introduction to Python', 'asdhasjkdhaskjdhasdjkhadksjd', 2, 1, '2021-10-01 12:54:59', '2021-11-03 17:33:48'),
(3, 11, 'Introduction to Laravel', 'asdhasjkdhaskjdhasdjkhadksjd', 3, 1, '2021-10-01 12:54:59', '2021-11-03 06:55:29'),
(4, 12, 'Introduction to Django', 'asdhasjkdhaskjdhasdjkhadksjd', 1, 1, '2021-10-01 12:54:59', '2021-11-02 14:22:34'),
(8, 11, 'Sessions', 'Sessions in Codeigniter are used to move data from one page to another', 5, 1, '2021-10-04 10:45:30', '2021-11-03 06:55:29'),
(9, 11, 'Migrations', 'Migrations are an easy way to develop a database in our Codeigniter application. It  is like a version control', 4, 1, '2021-10-04 10:45:55', '2021-11-03 06:55:29'),
(12, 11, 'testestset', 'testestsettestestsettestestsettestestset', 6, 1, '2021-10-28 08:42:49', '2021-11-03 06:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', 'web-development', 0, '2021-11-25 05:56:43', '2022-01-16 05:46:01'),
(2, 'Graphic Design', 'graphic-design', 1, '2021-11-25 05:56:43', '2021-11-25 06:10:11'),
(3, 'Programming', 'programming', 1, '2021-11-25 05:56:43', '2021-11-25 06:10:11'),
(4, 'PHP', 'php', 1, '2021-11-25 05:56:43', '2021-11-25 06:10:11'),
(5, 'Pakistan Founder', 'pakistan-founder', 1, '2021-12-29 09:49:57', '2021-12-29 09:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `teacher_image` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `detail`, `address`, `city`, `contact_number`, `qualification`, `teacher_image`, `teacher_id`, `facebook`, `instagram`, `youtube`, `twitter`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Yasir Hussain', 'Yasir Hussain, Yasir Hussain, Yasir Hussain, Yasir Hussain, Yasir Hussain, Yasir Hussain, Yasir Hussain, Yasir Hussain, Yasir Hussain', 'Nauabad Alamdar Road Quetta 7-62', 'Quetta', '2147483647', 'BS-IT', '', '', 'https://www.facebook.com/profile.php?id=100000591442951', '', '', '', 1, '2021-08-06 07:33:26', '2022-01-26 09:25:30'),
(3, 'Irfan Ali', '', 'Nauabad Alamdar Road Quetta 7-63', 'Quetta', '2147483647', '', '', '', '', '', '', '', 1, '2021-08-06 07:33:46', '2021-08-20 12:07:58'),
(4, 'Irfan Ali', '', 'Nauabad Alamdar Road Quetta 7-63', 'Quetta', '2147483647', '', '', '', '', '', '', '', 1, '2021-08-06 07:38:02', '2021-08-20 12:07:57'),
(5, 'Imran', '', 'Nauabad Alamdar Road Quetta 7-63', 'Quetta', '03138869966', '', '', '', '', '', '', '', 1, '2021-08-06 07:40:22', '2021-08-20 12:07:57'),
(6, 'Sikander Ali', '', 'Nauabad Alamdar Road Quetta', 'Quetta', '03138869966', '', '', 'FICT-21-1', '', '', '', '', 1, '2021-09-13 08:36:32', '2021-10-05 06:57:53'),
(16, 'Irfan', 'Irfan is an Information Technology graduate. He has strong grasp in the emerging technologies as well as programming concepts. He currently work as a Full Stack Developer in eParameter.', 'Alamdar Road', 'Quetta', '03138869966', 'BS - CS', '16.jpg', 'FICT-21-2', 'https://www.facebook.com/profile.php?id=100000591442951', '', 'https://www.youtube.com/kepowob', '', 1, '2021-11-05 05:54:11', '2021-12-08 10:00:11'),
(17, 'Ali Hassnain', 'Allama Ali Hasnain alHussaini is an Islamic Scholar. He has an MS - Philosophy under his belt and has been student of the great scholars of Shia. great scholars of Shia 123.', 'Alamdar Road', 'Quetta', '03138869966', 'MS - Philosophy', '17.jpg', 'FICT-21-3', 'https://www.facebook.com/alihasnainh', '', 'https://www.youtube.com/user/alihasnainhusaini', '', 1, '2021-11-08 06:25:43', '2021-12-08 09:18:19'),
(18, 'Irfan Ali', 'Irfan is an Information Technology Graduate. He has done its graduation from BUITEMS University Quetta. He has some extraordinary skills in web development and has been teaching for seven years.', 'Alamdar Road', 'Quetta', '03131234567', 'BS-IT', '18.jpg', 'FICT-21-1', 'https://www.facebook.com/profile.php?id=100000591442951', '', '', '', 1, '2021-12-30 09:13:45', '2021-12-30 09:13:46'),
(19, 'Kamran', 'TestTestTestTestTestTestTestTestTest TestTestTestTestTestTestTest TestTestTestTestTestTestTestTest TestTestTestTestTestTest', 'Testing', 'Testing', '03138869911', 'Testing', '19.jpg', 'FICT-22-1', 'https://www.facebook.com/profile.php?id=100000591442951', '', '', '', 1, '2022-03-15 04:44:45', '2022-03-15 05:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` varchar(4) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `user_type` int(1) DEFAULT 3 COMMENT '1->super admin,2->shop admin,user buyer',
  `contact` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `verified` int(1) DEFAULT 0 COMMENT '0->not verified,1->verified',
  `verification_code` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT 1 COMMENT '1->active,2->inactive or deleted,4->made order but not regitered',
  `creation_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `first_name`, `last_name`, `username`, `address`, `country`, `city`, `user_type`, `contact`, `zip_code`, `fax`, `verified`, `verification_code`, `status`, `creation_date`) VALUES
(5, 'admin@fic.com', 'ZWQyYjFmNDY4YzVmOTE1ZjNmMWNmNzVkNzA2OGJhYWU=', 'Irfan', 'Ali Khan', 'irfanali', NULL, NULL, NULL, 3, NULL, NULL, NULL, 0, NULL, 1, '2017-09-24 14:34:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `askhazrats`
--
ALTER TABLE `askhazrats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bayanat`
--
ALTER TABLE `bayanat`
  ADD PRIMARY KEY (`id_bayanat`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_books`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `word` (`word`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_detail`
--
ALTER TABLE `course_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `es_categories`
--
ALTER TABLE `es_categories`
  ADD PRIMARY KEY (`id_categories`);

--
-- Indexes for table `es_slider`
--
ALTER TABLE `es_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `es_sub_categories`
--
ALTER TABLE `es_sub_categories`
  ADD PRIMARY KEY (`id_sub_categories`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_notifications`);

--
-- Indexes for table `offered_courses`
--
ALTER TABLE `offered_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester_courses`
--
ALTER TABLE `semester_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seminar_attendants`
--
ALTER TABLE `seminar_attendants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id_settings`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- Indexes for table `slider_details`
--
ALTER TABLE `slider_details`
  ADD PRIMARY KEY (`detailId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_course_enrollment`
--
ALTER TABLE `student_course_enrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_program_enrollment`
--
ALTER TABLE `student_program_enrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_lessons`
--
ALTER TABLE `sub_lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `askhazrats`
--
ALTER TABLE `askhazrats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bayanat`
--
ALTER TABLE `bayanat`
  MODIFY `id_bayanat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id_books` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `course_detail`
--
ALTER TABLE `course_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `es_categories`
--
ALTER TABLE `es_categories`
  MODIFY `id_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `es_slider`
--
ALTER TABLE `es_slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `es_sub_categories`
--
ALTER TABLE `es_sub_categories`
  MODIFY `id_sub_categories` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=473;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_notifications` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `offered_courses`
--
ALTER TABLE `offered_courses`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `posts_tags`
--
ALTER TABLE `posts_tags`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `semester_courses`
--
ALTER TABLE `semester_courses`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seminar_attendants`
--
ALTER TABLE `seminar_attendants`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id_settings` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider_details`
--
ALTER TABLE `slider_details`
  MODIFY `detailId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `student_course_enrollment`
--
ALTER TABLE `student_course_enrollment`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student_program_enrollment`
--
ALTER TABLE `student_program_enrollment`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sub_lessons`
--
ALTER TABLE `sub_lessons`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
