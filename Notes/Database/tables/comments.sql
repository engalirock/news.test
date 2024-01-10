-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2024 at 08:32 PM
-- Server version: 5.7.40-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `news_id`, `comment`, `datetime`) VALUES
(1, 2, 1, 'وفي ذات السياق أصدر مجلس إدارة الهيئة قرار رقم 250 لسنة 2023 بتعديل قرار مجلس إدارة الهيئة رقم 166 لسنة 2020 بشأن تحديد المقصود بمصطلح المؤسسات المالية الواردة بقرارات مجلس إدارة الهيئة، ونص على أن يتضمن مصطلح المؤسسات المالية، الأشخاص الاعتبارية الأجنبية التي تمارس إحدى الأنشطة المالية المصرفية أو غير المصرفية الخاضعة لإشراف ورقابة جهة تمارس اختصاصات مثيلة للبنك المركزي المصري أو الهيئة بحسب الأحوال، والمؤسسات المالية العربية والإقليمية والدولية التي توافق عليها الهيئة.', '2024-01-10 14:28:46'),
(2, 2, 2, ' الأشخاص الاعتبارية الأجنبية التي تمارس إحدى الأنشطة المالية المصرفية أو غير المصرفية الخاضعة لإشراف ورقابة جهة تمارس اختصاصات مثيلة للبنك المركزي المصري أو الهيئة بحسب الأحوال، والمؤسسات المالية العربية والإقليمية والدولية التي توافق عليها الهيئة.', '2024-01-10 14:28:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `news_id` (`news_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
