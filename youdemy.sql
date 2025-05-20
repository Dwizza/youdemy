-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2025 at 05:57 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youdemy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `years` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `created_at`) VALUES
(2, 'Développement Mobile', '2025-01-14 19:14:16'),
(3, 'Design Graphique', '2025-01-14 19:14:16'),
(4, 'Marketing Digital', '2025-01-14 19:14:16'),
(5, 'Rédaction Web', '2025-01-14 19:14:16'),
(6, 'Montage Vidéo', '2025-01-14 19:14:16'),
(7, 'Photographie', '2025-01-14 19:14:16'),
(8, 'Gestion de Projet', '2025-01-14 19:14:16'),
(9, 'Intelligence Artificielle', '2025-01-14 19:14:17'),
(10, 'Cyber sécurité ', '2025-01-14 19:14:17'),
(19, 'Développement Web', '2025-01-16 19:17:42'),
(20, 'vevops', '2025-01-21 15:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `content` text,
  `teacher_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `thumbnail` text,
  `type` enum('pdf','video') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` enum('active','pending') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `title`, `description`, `content`, `teacher_id`, `category_id`, `created_at`, `updated_at`, `thumbnail`, `type`, `status`) VALUES
(18, 'Course Javascript', '', 'https://www.youtube.com/embed/_uQrJ0TkZlc?si=_0Ah1MIgXsZOUJyn', 22, 19, '2025-01-16 21:40:25', '2025-01-20 09:14:47', 'data:image/png;base64,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', 'video', 'active'),
(19, 'Course CSS', '', 'https://docs.google.com/document/d/1eYwIXCqRrBbsqEJ0UADcvy6xIXnNu4__Vofsvo2_HNU/edit?tab=t.0#heading=h.t6rpk4ysyha1', 22, 19, '2025-01-16 21:41:04', '2025-01-19 19:41:22', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/PHP_Logo.png/640px-PHP_Logo.png', 'pdf', 'active'),
(21, 'Abdessamad ait belle ', '<p>9isa dyal abdessamad&nbsp;</p>', 'https://www.youtube.com/watch?v=mEz_Rh4tot8', 22, 8, '2025-01-17 14:57:14', '2025-01-20 12:20:05', 'data:image/jpeg;base64,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', 'video', 'pending'),
(22, 'Github', '<p>github</p>', 'https://docs.google.com/document/d/1DrQqosTLFdTLaoB1SYjPWtWpDkP5eVA8ppzqq6v_hRM/edit?tab=t.0#heading=h.vcd03fxd2k74', 30, 19, '2025-01-17 20:58:52', '2025-01-19 19:25:00', 'https://www.datocms-assets.com/21211/1602248694-github-img.jpg?auto=format&w=807', 'pdf', 'active'),
(23, 'C++ course ', '', 'https://www.youtube.com/watch?v=ZzaPdXTrSb8&pp=ugMICgJmchABGAHKBQNjKys%3D', 30, 9, '2025-01-19 20:05:01', '2025-01-19 20:07:12', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS83EQ2Mjvdgj0POZKKsQQvuij9OxTBeCGtfQ&s', 'video', 'active'),
(24, 'Python Course', '<p><strong>Python</strong>&nbsp;&nbsp;est un&nbsp;<a title=\"Langage de programmation\" href=\"https://fr.wikipedia.org/wiki/Langage_de_programmation\">langage de programmation</a>&nbsp;<a title=\"Interpr&egrave;te (informatique)\" href=\"https://fr.wikipedia.org/wiki/Interpr%C3%A8te_(informatique)\">interpr&eacute;t&eacute;</a>,&nbsp;<a title=\"Paradigme (programmation)\" href=\"https://fr.wikipedia.org/wiki/Paradigme_(programmation)\">multiparadigme</a>&nbsp;et&nbsp;<a title=\"Plate-forme (informatique)\" href=\"https://fr.wikipedia.org/wiki/Plate-forme_(informatique)\">multiplateformes</a>. Il favorise la&nbsp;<a title=\"Programmation imp&eacute;rative\" href=\"https://fr.wikipedia.org/wiki/Programmation_imp%C3%A9rative\">programmation imp&eacute;rative</a>&nbsp;<a title=\"Programmation structur&eacute;e\" href=\"https://fr.wikipedia.org/wiki/Programmation_structur%C3%A9e\">structur&eacute;e</a>,&nbsp;<a title=\"Programmation fonctionnelle\" href=\"https://fr.wikipedia.org/wiki/Programmation_fonctionnelle\">fonctionnelle</a>&nbsp;et&nbsp;<a title=\"Programmation orient&eacute;e objet\" href=\"https://fr.wikipedia.org/wiki/Programmation_orient%C3%A9e_objet\">orient&eacute;e objet</a>. Il est dot&eacute; d\'un&nbsp;<a title=\"Typage dynamique\" href=\"https://fr.wikipedia.org/wiki/Typage_dynamique\">typage dynamique</a>&nbsp;<a title=\"Typage fort\" href=\"https://fr.wikipedia.org/wiki/Typage_fort\">fort</a>, d\'une gestion automatique de la&nbsp;<a title=\"M&eacute;moire vive\" href=\"https://fr.wikipedia.org/wiki/M%C3%A9moire_vive\">m&eacute;moire</a>&nbsp;par&nbsp;<a title=\"Ramasse-miettes (informatique)\" href=\"https://fr.wikipedia.org/wiki/Ramasse-miettes_(informatique)\">ramasse-miettes</a>&nbsp;et d\'un&nbsp;<a title=\"Syst&egrave;me de gestion d\'exceptions\" href=\"https://fr.wikipedia.org/wiki/Syst%C3%A8me_de_gestion_d%27exceptions\">syst&egrave;me de gestion d\'exceptions</a>&nbsp;; il est ainsi similaire &agrave;&nbsp;<a title=\"Perl (langage)\" href=\"https://fr.wikipedia.org/wiki/Perl_(langage)\">Perl</a>,&nbsp;<a title=\"Ruby\" href=\"https://fr.wikipedia.org/wiki/Ruby\">Ruby</a>,&nbsp;<a title=\"Scheme\" href=\"https://fr.wikipedia.org/wiki/Scheme\">Scheme</a>,&nbsp;<a title=\"Smalltalk\" href=\"https://fr.wikipedia.org/wiki/Smalltalk\">Smalltalk</a>&nbsp;et&nbsp;<a title=\"Tool Command Language\" href=\"https://fr.wikipedia.org/wiki/Tool_Command_Language\">Tcl</a>.</p>', 'https://www.youtube.com/watch?v=_uQrJ0TkZlc&pp=ygUGcHl0aG9u', 30, 2, '2025-01-19 20:06:46', '2025-01-19 20:07:08', 'https://cdn.bap-software.net/2024/06/14204324/What-is-Python-3.12_11zon.webp', 'video', 'active'),
(25, 'In po', '<p>github</p>', 'https://www.nys.cc', 22, 4, '2025-01-21 15:06:47', '2025-01-21 15:06:47', 'https://www.lapaj.net', 'pdf', 'pending'),
(26, 'Place', '', 'https://www.gowylym.com.au', 22, 19, '2025-01-21 15:08:29', '2025-01-21 15:08:29', 'https://www.cyxoxixihyzexu.cm', 'video', 'pending'),
(27, 'Quia ', '', 'https://www.sekipevixapa.com.au', 22, 20, '2025-01-21 15:14:10', '2025-01-21 15:14:10', 'https://www.vehysikawemetu.me.uk', 'video', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `coursetags`
--

CREATE TABLE `coursetags` (
  `course_id` int NOT NULL,
  `tag_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `coursetags`
--

INSERT INTO `coursetags` (`course_id`, `tag_id`) VALUES
(24, 27),
(22, 28),
(18, 29),
(18, 30),
(23, 30),
(18, 32),
(25, 32),
(26, 32),
(25, 33),
(19, 34),
(27, 38),
(27, 39),
(27, 40);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollment_id` int NOT NULL,
  `student_id` int DEFAULT NULL,
  `course_id` int DEFAULT NULL,
  `enrolled_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrollment_id`, `student_id`, `course_id`, `enrolled_at`) VALUES
(46, 31, 19, '2025-01-17 21:21:00'),
(51, 31, 24, '2025-01-19 20:17:39'),
(53, 20, 19, '2025-01-20 14:06:03'),
(54, 20, 22, '2025-01-20 19:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `name`, `created_at`) VALUES
(27, 'Python', '2025-01-18 14:49:00'),
(28, 'Github', '2025-01-18 14:49:11'),
(29, 'C', '2025-01-18 14:49:18'),
(30, 'C++', '2025-01-18 14:49:27'),
(31, 'C#', '2025-01-18 14:49:44'),
(32, 'Javascript', '2025-01-18 14:50:21'),
(33, 'PHP', '2025-01-19 14:32:54'),
(34, 'CSS', '2025-01-19 14:40:25'),
(35, 'React', '2025-01-19 20:27:29'),
(36, 'Html', '2025-01-19 20:27:36'),
(38, 'devops', '2025-01-21 15:12:32'),
(39, 'ousssama', '2025-01-21 15:12:47'),
(40, 'yassir', '2025-01-21 15:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('student','teacher','admin') NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('active','pending','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password_hash`, `role`, `created_at`, `updated_at`, `status`) VALUES
(20, 'Joelle Whitley', 'oussama@g.c', '$2y$10$NH.szsrXqb3/Yhw/t/2pwehjFdfUeNBlGMAJp5/HCd54W1zhCCYwG', 'student', '2025-01-13 15:45:06', '2025-01-15 10:14:02', 'active'),
(22, 'oussama', 'client@g.c', '$2y$10$I2eoWu.HvGdbVjIej6z2feRCzZyRzoTdfXZ7JWdNhNrsbmqN7xiQK', 'teacher', '2025-01-14 15:04:33', '2025-01-15 10:14:05', 'active'),
(23, 'admin', 'admin@g.c', '$2y$10$NH.szsrXqb3/Yhw/t/2pwehjFdfUeNBlGMAJp5/HCd54W1zhCCYwG', 'admin', '2025-01-14 17:54:43', '2025-01-14 17:54:43', 'active'),
(25, 'Violet Bell', 'fovufy@mailinator.com', '$2y$10$uk2/ZOfMp2kuqGnZfcGO5e3kt9KxihkqIqwXAv9VTKeqxUtF9gk0a', 'teacher', '2025-01-15 08:31:50', '2025-01-16 12:18:19', 'active'),
(26, 'Melyssa Short', 'buxanynib@mailinator.com', '$2y$10$4Cj4o1Wr1L/qAPDY8lY4B.Qzu1UWwqD6C1j.oK2oJvNosSV2ysjAe', 'student', '2025-01-15 14:15:52', '2025-01-16 19:04:33', 'inactive'),
(27, 'Orla Rhodes', 'jepy@mailinator.com', '$2y$10$xP.WDu.NN77d606BsjPJJ.O59D3jLWSkEHOF7C1wOlU3BO8pQSc5i', 'teacher', '2025-01-15 14:16:17', '2025-01-16 19:04:34', 'active'),
(28, 'Shelley Higgins', 'gajicaju@mailinator.com', '$2y$10$gl4KkpTauQMICHiJu.Jk..C4LXvg9eN0p69FD5lTbQAT83CfbCDl.', 'teacher', '2025-01-16 19:07:27', '2025-01-16 19:08:13', 'active'),
(29, 'William Owen', 'dejy@mailinator.com', '$2y$10$9vDdR7q3UImeYUjVCTM5mOT/G5TpcEL6jpqiX3rKWGTWEyCpqEnBy', 'teacher', '2025-01-17 12:42:54', '2025-01-17 12:43:24', 'active'),
(30, 'Eliana Mcfadden', 'komequso@mailinator.com', '$2y$10$b5N0R/abpPuhsWC81aCxu.DTW1ODxNHBCnt8JhbJuOf.1lz3EQJmS', 'teacher', '2025-01-17 20:55:55', '2025-01-17 20:56:14', 'active'),
(31, 'Kathleen Hubbard', 'muhicopito@mailinator.com', '$2y$10$cHFTHqo02SdN/XBYhIazt.J1hWNeUiMjTmVKFUAw2YoBOVhAZIakO', 'student', '2025-01-17 21:20:46', '2025-01-19 14:57:49', 'active'),
(32, 'Florence Rose', 'raciruzyqe@mailinator.com', '$2y$10$iRy95LXJVKTx1qFWLFsjR.Kgf.o5bdMrNFUInLpzU1AuZrcuHBWQK', 'teacher', '2025-01-19 14:57:20', '2025-01-21 15:11:23', 'active'),
(33, 'Connor Potter', 'gynuzu@mailinator.com', '$2y$10$8zrxjca90CZgTwlwdjH6bOUyRseYLe84ljbA8WmnuZBIIEZe2nFhC', 'teacher', '2025-01-21 15:10:20', '2025-01-21 15:11:16', 'active'),
(34, 'loulou', 'oussama@gmail.com', '$2y$10$rmSyuRKOpw6opnKvZBYU2e86Gn.Tm6xEIS.CBeoFsFtnHXT3oFj/y', 'student', '2025-01-31 18:22:12', '2025-01-31 18:22:12', 'active');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `default_status` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
    IF NEW.role = 'teacher' THEN
        SET NEW.status = 'pending';
    ELSE
        SET NEW.status = 'active';
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `coursetags`
--
ALTER TABLE `coursetags`
  ADD PRIMARY KEY (`course_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `coursetags`
--
ALTER TABLE `coursetags`
  ADD CONSTRAINT `coursetags_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `coursetags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`);

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
