-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 07:23 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uyelik_sistemi`
--

-- --------------------------------------------------------

--
-- Table structure for table `sirket_kayit`
--

CREATE TABLE `sirket_kayit` (
  `id` int(11) NOT NULL,
  `sifre` text COLLATE geostd8_bin NOT NULL,
  `ad` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `alan` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `email` text COLLATE geostd8_bin NOT NULL,
  `kayit_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=geostd8 COLLATE=geostd8_bin;

--
-- Dumping data for table `sirket_kayit`
--

INSERT INTO `sirket_kayit` (`id`, `sifre`, `ad`, `alan`, `email`, `kayit_zaman`) VALUES
(777, 'zzz', 'abc', 'test', 'abc@abc.com', '2022-01-24 09:32:36'),
(11111, 'asd123', 'bilmem', 'yazılım', 'asdf@gmail.com', '2022-01-20 09:02:08'),
(11222, 'asdf', 'irem', 'mühendislik', 'iremyilmazturk@gmail.com', '2022-01-20 09:01:51'),
(12345, '12345', 'başar', 'test', 'yeni@yeni.com', '2022-01-24 11:11:18'),
(22222, 'qwer', 'akça', 'sanat', 'akca@gmail.com', '2022-01-20 09:01:27'),
(33333, 'lol', 'lmao', 'veri', 'veri@lmao.com', '2022-01-20 08:27:27'),
(54321, '54321', 'irem', 'yazılım', 'irem@yazilim.com', '2022-01-26 05:55:01'),
(55555, 'xxx', 'iroş', 'mühendislik', 'iros@xxx.com', '2022-01-26 05:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `urunler`
--

CREATE TABLE `urunler` (
  `sirket_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_adi` text NOT NULL,
  `urun_tipi` text NOT NULL,
  `miktar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `urunler`
--

INSERT INTO `urunler` (`sirket_id`, `urun_id`, `urun_adi`, `urun_tipi`, `miktar`) VALUES
(12345, 1, 'd', 's', 8),
(12345, 2, 'xx', 'c', 15),
(12345, 3, 'xy', 's', 11),
(12345, 4, 'd', 'a', 22),
(12345, 9, 'a', 'a', 25),
(54321, 32, 'd', 's', 10),
(54321, 43, 'asd', 'as', 27),
(54321, 54, 'xx', 'abc', 18),
(12345, 101, 'asd', 'asd', 38),
(33333, 111, 'b', 'c', 5),
(12345, 123, 'a', 'a', 3),
(33333, 222, 'xx', 'a', 18),
(33333, 333, 'f', 's', 13),
(33333, 555, 'a', 'c', 18),
(33333, 666, 'c', 's', 45),
(33333, 777, 'abc', 'abc', 27),
(12345, 789, 'b', 'c', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sirket_kayit`
--
ALTER TABLE `sirket_kayit`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `urunler`
--
ALTER TABLE `urunler`
  ADD UNIQUE KEY `urun_id` (`urun_id`),
  ADD KEY `sirket_id` (`sirket_id`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `urunler`
--
ALTER TABLE `urunler`
  ADD CONSTRAINT `urunler_id` FOREIGN KEY (`sirket_id`) REFERENCES `sirket_kayit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
