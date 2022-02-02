-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1:3306
-- Χρόνος δημιουργίας: 13 Ιουν 2021 στις 12:35:22
-- Έκδοση διακομιστή: 8.0.21
-- Έκδοση PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `mysqldb`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `fileupload`
--

DROP TABLE IF EXISTS `fileupload`;
CREATE TABLE IF NOT EXISTS `fileupload` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fileName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Άδειασμα δεδομένων του πίνακα `fileupload`
--

INSERT INTO `fileupload` (`id`, `fileName`) VALUES
(50, '5112106121623531338.jpg'),
(52, '96632106121623531418.jpg'),
(53, '67642106121623531424.jpg'),
(55, '2412106121623531919.jpg'),
(61, '24612106131623585985.jpg'),
(62, '3082106131623585995.jpg');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_activation_code` varchar(255) NOT NULL,
  `user_email_status` enum('not verified','verified') NOT NULL,
  `user_otp` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_activation_code`, `user_email_status`, `user_otp`) VALUES
(1, 'alex', 'alex@gmail.com', '$2y$10$IFkQliwCtj36U.shBtg62OOcY7SLFi8shh3ET3k6ADl1cwTUjeNRq', '', 'not verified', 0),
(4, 'nikoleta', 'nikoleta@gmail.com', '$2y$10$fSMJPp7F4D3Ahb/zjtnKuuNPySMeoybR5YosqwsaKDXR0WfynoMD.', '', 'not verified', 0),
(5, '', '', '', '', '', 0),
(12, 'jordan', 'eee@gmail.com', '$2y$10$16WxwDtYX09NIv3D76fA2eBq8hKaPZcZENTY7aXdtLScn1DUPEAve', '', 'not verified', 0),
(14, 'nikos', 'antoniosmylonas98@gmail.com', '$2y$10$ASKUkXlKZC/ifnNaWjCX5e20lSjVC9Vd/1FBVvCTJBI6p.2QAItxi', '', 'not verified', 0),
(15, 'mixalis', 'mixalis@gmail.com', '$2y$10$e/5S39bCa3b7BZl2nAHo3eQVLhaUxtP.6ZoBwi47qqGEZ3UUGB.fu', '', 'not verified', 0),
(16, 'antonis', 'antonis@gmail.com', '$2y$10$efHHriG76.y68w8YpXyDBeKSj7xJFXPOlNmtv.5N7ASph8hGgnFkK', '', 'not verified', 0),
(17, 'giorgos', 'giorgos@gmail.com', '$2y$10$OL42cZyxgF29Il/sn6Tj5.JVHDx5QNH/6LMG8vU805vDeONwJweGG', '', 'not verified', 0),
(18, 'nikolas', 'nikolas@gmail.com', '$2y$10$JmUuvTLPVFx4DJq/QhfXbujvKkT0a7UDc.Nfoxa.0RZOJNTc.oJo.', '', 'not verified', 0),
(19, 'Tasos', 'tasos@gmail.com', '$2y$10$3h.BgNc/5itRTQiEyAWDT.2PK3BdLS5SVzvNJb98LWwKtGGCLFrh.', '', 'not verified', 0),
(20, 'james', 'james@gmail.com', '$2y$10$zgN2YN817qD5CHcmDWU0S.Y0XSsGJkiLYBrYthFVM3NaHJyFV5PVy', '', 'not verified', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
