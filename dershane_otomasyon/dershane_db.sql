-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Eki 2022, 01:14:40
-- Sunucu sürümü: 10.4.25-MariaDB
-- PHP Sürümü: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `dershane_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `lname` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `fname`, `lname`) VALUES
(1, 'emre', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'Emre', 'Korkmaz');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(11) NOT NULL,
  `exam_name` varchar(127) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `student_mark` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_name`, `student_id`, `grade_id`, `section_id`, `student_mark`, `fname`, `lname`) VALUES
(1, 'Deneme Sınavı - 1 ', 5, 4, 3, 425, 'Hakan', 'Taşıyan'),
(1, 'Deneme Sınavı - 1 ', 6, 2, 2, 365, 'Salim', 'Korkmaz'),
(1, 'Deneme Sınavı - 1 ', 7, 3, 2, 250, 'Sabri', 'Soydan'),
(1, 'Deneme Sınavı - 1 ', 8, 1, 1, 430, 'Şule ', 'Demir'),
(1, 'Deneme Sınavı - 1 ', 9, 1, 2, 168, 'Samet', 'Bilici'),
(1, 'Deneme Sınavı - 1 ', 10, 2, 3, 356, 'Kevser', 'Serim'),
(1, 'Deneme Sınavı - 1 ', 11, 3, 3, 426, 'Hakime ', 'Bilger'),
(1, 'Deneme Sınavı - 1 ', 12, 4, 1, 333, 'Emre', 'Korkmaz'),
(1, 'Deneme Sınavı - 1 ', 13, 2, 1, 253, 'Akın', 'Uğur'),
(1, 'Deneme Sınavı - 1 ', 14, 4, 3, 296, 'Ömer', 'Faruk');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL,
  `grade` varchar(31) NOT NULL,
  `grade_code` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `grades`
--

INSERT INTO `grades` (`grade_id`, `grade`, `grade_code`) VALUES
(1, '1', 'A'),
(2, '2', 'B'),
(3, '3', 'C'),
(4, '4', 'D');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `section`
--

INSERT INTO `section` (`section_id`, `section`) VALUES
(1, 'EşitAg'),
(2, 'Sözel'),
(3, 'Sayısal');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `grade` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `address` varchar(31) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_joined` timestamp NULL DEFAULT current_timestamp(),
  `parent_fname` varchar(127) NOT NULL,
  `parent_lname` varchar(127) NOT NULL,
  `parent_phone_number` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `students`
--

INSERT INTO `students` (`student_id`, `username`, `password`, `fname`, `lname`, `grade`, `section`, `address`, `gender`, `email_address`, `date_of_birth`, `date_of_joined`, `parent_fname`, `parent_lname`, `parent_phone_number`) VALUES
(5, 'requartz06', '$2y$10$Ep3JpdHZvyq8zkzrsZxoa.Mogjm911Vp23nC5NwZVIDzGOh1pewDy', 'Hakan', 'Taşıyan', 4, 3, 'Ankara Sincan andiçen mah. ahi ', 'Male', 'emre@hotmail.com', '2022-10-30', '2022-10-08 12:11:14', 'Emre', 'Korkmaz', '05455039029'),
(6, 'feelike', '$2y$10$Nk9zyi4WW7qtNhxZsBBgAuJNjM.QAOODSEEJnsU4BVvcW1nPVtjnC', 'Salim', 'Korkmaz', 2, 2, 'Ankara Sincan andiçen mah. ahi ', 'Male', 'emre@hotmail.com', '2022-10-30', '2022-10-08 12:20:07', 'Emre', 'Korkmaz', '05455039029'),
(7, 'emre_1213312@hotmail.com', '$2y$10$RqnyGe1UhAMONarFHnGPg.pKv0IzTKm3SkslCdZfi/9/fwwnbZ9x2', 'Sabri', 'Soydan', 3, 2, 'Ankara Sincan pınarbaşın mah. V', 'Male', 'emre@hotmail.com', '2022-10-09', '2022-10-09 23:08:30', 'Emre', 'Korkmaz', '05455039029'),
(8, 'qweqwe', '$2y$10$v9YRBUI47FLhh99y5jsm/.NIHeCOylnTMgfJfymLf6GR8jFCDlpu2', 'Şule ', 'Demir', 1, 1, 'Ankara Sincan pınarbaşın mah. V', 'Female', 'kske@gmail.com', '2022-10-30', '2022-10-09 23:08:59', 'Emre', 'Korkmaz', '05455039029'),
(9, 'requartz', '$2y$10$IOywkFknMJqN3eeJvDnno.ha3GwhxfHwuBs3B6pHjrBGoa1fStHSG', 'Samet', 'Bilici', 1, 2, 'Ankara Sincan pınarbaşın mah. V', 'Male', 'kske@gmail.com', '2022-10-09', '2022-10-09 23:09:31', 'Emre', 'Korkmaz', '05455039029'),
(10, 'asasfsfa', '$2y$10$dhz8WsGtRunamTleNPjNeu/b3uPMYCHUd3W4R5aeDbq1ZEoB1Nq/S', 'Kevser', 'Serim', 2, 3, 'Ankara Sincan pınarbaşın mah. V', 'Female', 'emre@hotmail.com', '2022-10-15', '2022-10-09 23:10:01', 'Emre', 'Korkmaz', '05455039029'),
(11, 'dasf', '$2y$10$YyDcwNfFzC/.MLQOhsfxRu8RTByDFFS28Cv5u3kwZ0hmEBK7jVNb6', 'Hakime ', 'Bilger', 3, 3, 'Ankara Sincan pınarbaşın mah. V', 'Female', 'kske@gmail.com', '2022-10-05', '2022-10-09 23:10:47', 'Emre', 'Korkmaz', '05455039029'),
(12, 'edsa', '$2y$10$v/H6wz0hkkB4zuJwAumuTuGslQ6lptioD3mFJccf4Dy7qzvh0A8cK', 'Emre', 'Korkmaz', 4, 1, 'Ankara Sincan andiçen mah. ahi ', 'Male', 'emre@hotmail.com', '2022-10-02', '2022-10-09 23:11:10', 'Emre', 'Korkmaz', '05455039029'),
(13, 'requartz22', '$2y$10$APdnNm3E.uP9kbZUg/JZ7e1RpkOofC4/s3zuwo751QHcvARAzsVcW', 'Akın', 'Uğur', 2, 1, 'Ankara Sincan pınarbaşın mah. V', 'Male', 'emre@hotmail.com', '2022-10-27', '2022-10-09 23:11:43', 'Emre', 'Korkmaz', '05455039029'),
(14, 'asdsdaasf', '$2y$10$tOc2JUv08QJBqCGCv2T9Duco.e2REtEXc3c5B5A/DaSUaN1Cn4SRW', 'Ömer', 'Faruk', 4, 3, 'Ankara Sincan pınarbaşın mah. V', 'Male', 'emre@hotmail.com', '2022-10-09', '2022-10-09 23:12:30', 'Emre', 'Korkmaz', '05455039029');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject` varchar(31) NOT NULL,
  `subject_code` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject`, `subject_code`) VALUES
(1, 'İngilizce', 'İng'),
(2, 'Fizik', 'Fiz'),
(3, 'Matematik', 'Mat'),
(4, 'Kimya', 'Kim'),
(5, 'Sosyal', 'Sos'),
(6, 'Coğrafya', 'Cog'),
(7, 'Türçke', 'Tr');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `lname` varchar(127) NOT NULL,
  `subjects` varchar(31) NOT NULL,
  `grades` varchar(31) NOT NULL,
  `section` varchar(31) NOT NULL,
  `address` varchar(31) NOT NULL,
  `employee_number` int(11) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_number` varchar(31) NOT NULL,
  `qualification` varchar(127) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `date_of_joined` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `username`, `password`, `fname`, `lname`, `subjects`, `grades`, `section`, `address`, `employee_number`, `date_of_birth`, `phone_number`, `qualification`, `gender`, `email_address`, `date_of_joined`) VALUES
(6, 'haticea', '$2y$10$8CMTGDmmAJ9f8J4OnWoARecRcuD3ql7iixH2e.8eadQ/CXBZdAc3.', 'Hatice', 'Özdilek', '4', '1', '3', 'Ankara Sincan pınarbaşın mah. V', 1232, '2022-10-30', '05455039029', 'Kıdemli Kimya Öğretmeni', 'Female', 'kske@gmail.com', '2022-10-08 15:10:38');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Tablo için indeksler `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`);

--
-- Tablo için indeksler `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Tablo için indeksler `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Tablo için indeksler `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Tablo için indeksler `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
