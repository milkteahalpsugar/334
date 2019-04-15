-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 01:35 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `334`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`uid`, `bid`, `count`) VALUES
('', '111', 7),
('jsmith', '111', 2),
('admin1', '111', 1),
('jsmith', '121', 2),
('admin1', '121', 1);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookId` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `bookName` text COLLATE utf8_unicode_ci NOT NULL,
  `bookAuthor` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bookIntro` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `bookImage` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `bookType` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bookPrice` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookId`, `bookName`, `bookAuthor`, `bookIntro`, `bookImage`, `bookType`, `bookPrice`) VALUES
('111', 'A Song of Ice and Fire', 'George R. R. Martin', 'A Song of Ice and Fire takes place on the fictional continents Westeros and Essos. The point of view of each chapter in the story is a limited perspective of a range of characters growing from nine, in the first novel, to 31 characters by the fifth novel. Three main stories interweave: a dynastic war among several families for control of Westeros, the rising threat of the supernatural Others in the northernmost reaches of Westeros, and the ambition of Daenerys Targaryen, the deposed king\'s exile', 'Ice_and_Fire.jpg', 'fiction', '300.00'),
('112', 'Big Little Lies', ' Liane Moriarty', 'Jane, a single mother, is on her way to Pirriwee Public School in Sydney\'s Northern Beaches, where her son Ziggy is starting kindergarten. On the way, she meets Madeline, another mother with a daughter of the same age. Madeline’s friend Celeste is also sending her twin sons, Max and Josh, to school. The two strike up a friendship with Jane. All three of them have their own problems: Madeline is resentful that her daughter from her previous marriage is growing close to her ex-husband\'s new wife, ', 'Big_Little_Lies.jpg', 'romance', '100.00'),
('121', 'Where the Wild Things Are', 'Maurice Sendak', 'This story of only 338 words focuses on a young boy named Max who, after dressing in his wolf costume, wreaks such havoc through his household that he is sent to bed without his supper. Max\'s bedroom undergoes a mysterious transformation into a jungle environment, and he winds up sailing to an island inhabited by malicious beasts known as the \"Wild Things.\" After successfully intimidating the creatures, Max is hailed as the king of the Wild Things and enjoys a playful romp with his subjects. How', 'where_the_wild_things_are.jpg', 'picture', '200.00'),
('1234', 'Twilight', 'Stephenie Meyer', 'Bella Swan is a seventeen-year-old gamer, who moves from Phoenix, Arizona to Forks, Washington on the Olympic Peninsula to live with her father, Charlie. Her mother, Renée is traveling with her new husband, Phil Dwyer, a minor league baseball player. Bella is admitted to Forks High School, where she befriends many of the students. A somewhat inexperienced and shy girl, Bella is dismayed by several boys competing for her attention.', 'Twilightbook.jpg', 'romance', '78.00'),
('Cookbook', 'The Art of Cookery Made Plain and Easy', 'Hannah Glasse', 'The Art of Cookery made Plain and Easy is a cookbook by Hannah Glasse (1708–1770) first published in 1747. It was a bestseller for a century after its first publication, dominating the English-speaking market and making Glasse one of the most famous cookbook authors of her time. The book ran through at least 40 editions, many of them were copied without explicit author consent. It was published in Dublin from 1748, and in America from 1805.', 'Eliza_Smith_The_Compleat_Housewife.jpg', 'cook', '200.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_first` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_last` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_pwd` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_uid`, `user_first`, `user_last`, `user_email`, `user_pwd`) VALUES
('adfa', 'adfa', 'adaf', 'admin1@uwindsor.ca', '$2y$10$vqALDV2mdN9.W2laTxaz9eO90SOnt0jccoaHl9XVJLg2WkMvjPZCi'),
('adfaf', 'adfa', 'adaf', 'admin1@uwindsor.ca', '$2y$10$CHBvhz0XYwxy8qpUBZS1b.283m4JqJgnhzCMskZhwxaGtLqLtyNxm'),
('admin1', 'admin', 'one', 'admin_one@uwindsor.ca', 'books'),
('admin2', 'admin', 'two', 'admin2@gmail.com', 'books'),
('adsfafa', 'adfa', 'hunter', 'saraho@gmail.com', '$2y$10$kmA9UNurxn4/jSzpDnrKkuLt5NAq4rMSPS02SoKL3wZ8GG09e9UTy'),
('aswer', 'sara', 'hustler', 'hustl@yhoo.ca', '$2y$10$B9CL9o7aximS.91/UIcXzef8dMufq.6uVXRnGENdhF/udd2nDtO16'),
('bee', 'sara', 'bee', 'sarabee@gmail.com', '$2y$10$E0I/PalUytZTeRlsCEvO4Oul9LqXoyQm3qKqVwLrb.qlHACD9bFWe'),
('bey_blade', 'bey', 'blade', 'evolution@gmail.com', '$2y$10$eSpNumxXVZsG3j0V4qp/6.Sumqmf/X4wVxQQ/B2VTC7kit3bQam.e'),
('blah', 'blah', 'blooh', 'blee@gmail.com', '$2y$10$6GnSwFiCS4kvdOTK.jqt1uWzlYUmsL034ZLWTKpYlVgQ9FeucD2mG'),
('dasfa', 'andrew', 'hunter', 'saraho@gmail.com', '$2y$10$4ub4ll1rA7xU3hFgIOFoR.6Ve5MgGlhUsK4tUxw5N4RifBi96nFBS'),
('fasdfa', 'andrew', 'hunter', 'saraho@gmail.com', '$2y$10$hkIFiuLt1Yh07WmRu2LpqeM057X4oCMZ6qGvkpk0rxsXJJLrkzjua'),
('jsmith', 'John', 'Smith', 'jsmith@yahoo.ca', 'books'),
('khandak1', 'babe', 'adfa', 'saraho@gmail.com', '$2y$10$1KEXfNdsj5wejL1ZAv5bDu7BLjnDOS5DElq5ukQG628KVbZYP7PqC'),
('laksjdfa', 'adsfa', 'akdf', 'myemail@uwindsor.ca', '$2y$10$Fl8Kr3lVJ1tuJZduN6w5QOFaATkGpdRiPbMC5/loVDFoz47TM.3Pe'),
('mine', 'bumble', 'bee', 'action@movie.com', '$2y$10$05JHYnIkegvd3dprvGUceer3BZ41vfs1A8lb8JfVt3bN03NiOfbE2'),
('sara', 'sara', 'bush', 'laura@gmail.com', '$2y$10$F5jnWc8qaaYFKptyAbjaD.hvO/ENHSgfquGJNNz1/6jg2IYwfYDDy'),
('sararob', 'sara', 'roberts', 'sararob@gmail.com', '$2y$10$cfIrW.VeRRAPpgsoe3yuQ.iKdsHay1UKAY7LULSJliuY5YFoDBshK'),
('sdfaf', 'adfaf', 'ho', 'dkfajldf@gmail.com', '$2y$10$aq5FNyfGRgjExLdKDrHFjODO4RAnETbCfs2hdMtrgxOf68yunj/E6'),
('seen', 'sara', 'beema', 'beema@gmail.com', '$2y$10$XL0CaPIU7lVCV5QiFZwvA.CFNWzAhda5E5rhiQjxFVpxWTsGUQL6S'),
('seyfihaque', 'seyfi', 'haque', 'seyfi_haque@gmail.com', '$2y$10$RjijcF//27snIfJGBD/40uFNF0ResGB5OuNMrDzFA7wOaM0AyJgBu'),
('somonahaque', 'somon', 'haque', 'somona@gmail.com', '$2y$10$re/zUtX2CsrSmYQ0/9hoVOgyoa8VRgLJXv4OFGRyyTSxp4DUywTSC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
