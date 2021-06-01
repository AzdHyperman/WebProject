-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 01, 2021 la 03:54 PM
-- Versiune server: 10.4.11-MariaDB
-- Versiune PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `puac`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `postari`
--

CREATE TABLE `postari` (
  `user_id` int(6) DEFAULT NULL,
  `post_id` int(6) NOT NULL,
  `text` varchar(500) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `rank` varchar(20) DEFAULT NULL,
  `categorie` varchar(20) DEFAULT NULL,
  `stats` varchar(20) DEFAULT 'in progres'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `postari`
--

INSERT INTO `postari` (`user_id`, `post_id`, `text`, `username`, `rank`, `categorie`, `stats`) VALUES
(NULL, 56, 'sss', 'Hyper2599', 'client', 'masini', 'in progres'),
(NULL, 57, 'how', 'andreivasilescu', 'client', 'case', 'in progres'),
(NULL, 58, 'exit', 'andreivasilescu', 'client', 'masini', 'in progres'),
(NULL, 59, 'exit', 'andreivasilescu', 'client', 'masini', 'in progres');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `rank` varchar(10) DEFAULT 'client',
  `admin` int(2) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `first_name`, `last_name`, `rank`, `admin`) VALUES
(1, 'user1', '123456', 'user1@email.com', NULL, NULL, 'client', 0),
(2, 'johana', 'dajdash', 'email@gmail.com', NULL, NULL, 'client', 1);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `postari`
--
ALTER TABLE `postari`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `postari`
--
ALTER TABLE `postari`
  MODIFY `post_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `postari`
--
ALTER TABLE `postari`
  ADD CONSTRAINT `postari_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
