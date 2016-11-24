-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2016 at 04:46 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `post`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `conteudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_gostei` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `total_naogostei` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `total_visualizacao` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `total_comentarios` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `titulo`, `conteudo`, `imagem`, `total_gostei`, `total_naogostei`, `total_visualizacao`, `total_comentarios`, `created_at`, `updated_at`) VALUES
(7, 'Primeiro Post', 'Este e o primeiro post', 'sat.PNG', '1', '0', '1', '0', '2016-11-24 13:37:39', '2016-11-24 13:41:18'),
(8, 'Segundo Post', 'Este e osegundo post', 'sate.PNG', '0', '0', '0', '0', '2016-11-24 13:38:08', '2016-11-24 13:38:08'),
(9, 'Terceiro Post', 'Este e o terceiro post', 'Capture.PNG', '0', '0', '0', '0', '2016-11-24 13:38:32', '2016-11-24 13:38:32'),
(10, 'Quarto Post', 'Este e o quarto post', 'sat.PNG', '0', '1', '1', '0', '2016-11-24 13:39:02', '2016-11-24 13:41:49'),
(11, 'Quinto Post', 'Este e o quinto post', 'sate.PNG', '1', '0', '2', '0', '2016-11-24 13:39:22', '2016-11-24 13:41:56'),
(12, 'Sexto Post', 'Este e o sexto post', 'Capture.PNG', '0', '0', '0', '0', '2016-11-24 13:39:58', '2016-11-24 13:39:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
