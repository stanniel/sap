-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 27, 2018 at 05:52 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klasicni_restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu_category`
--

DROP TABLE IF EXISTS `menu_category`;
CREATE TABLE IF NOT EXISTS `menu_category` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `category` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_category`
--

INSERT INTO `menu_category` (`id`, `category`) VALUES
(1, 'Hrana'),
(2, 'Pice');

-- --------------------------------------------------------

--
-- Table structure for table `menu_dish`
--

DROP TABLE IF EXISTS `menu_dish`;
CREATE TABLE IF NOT EXISTS `menu_dish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` text,
  PRIMARY KEY (`id`),
  KEY `subcategory_id` (`subcategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_dish`
--

INSERT INTO `menu_dish` (`id`, `subcategory_id`, `name`, `description`, `date_added`, `image`) VALUES
(32, 1, 'Grcka salata', 'Kombinacija svežih salata, rukole, paradajza, krastavaca, crnog luka, crnih maslina, sa dodatkom feta sira, dresinga i domaćeg hleba.', '2017-06-10 05:46:07', 'pictures/PREDJELA/Salads/GRCKA_SALATA.jpg'),
(33, 1, 'Pileca salata', 'Pileći file, paradajz, kornišoni, majonez, kisela pavlaka, crne masline, jaje, domaći hleb.', '2017-06-10 05:46:07', 'pictures/PREDJELA/Salads/PILECA_SALATA.jpg'),
(34, 2, 'Paradajz krem supa', 'Sa plavim sirom / sa testom.', '2017-06-10 05:46:07', 'pictures/PREDJELA/Supe/PARADAJZ_CORBA.jpg'),
(35, 2, 'Krem supa sa gljivama', 'Krem supa sa gljivama', '2017-06-10 05:46:07', 'pictures/PREDJELA/Supe/KREM_SUPA_OD_GLJIVA.jpg'),
(36, 3, 'Biftek tatar', 'Juneći file, začini, maslac, paradajz, tost', '2017-06-10 05:46:07', 'pictures/PREDJELA/Jela/BIFTEK_TARTAR.jpg'),
(37, 3, 'Crostini', 'Domaći hleb, puter od belog luka, povrće sa grila, feta.', '2017-06-10 05:46:07', 'pictures/PREDJELA/Jela/CROSTINI.jpg'),
(38, 4, 'Ćureći file', 'Gratinirani ćureći file sa pečenim paradajzom i slaninom, serviran sa ploškama krompira, sotiranim gljivama, taljatelama u sosu od belog vina i lepinjom.', '2017-06-10 05:46:07', 'pictures/GLAVNA JELA/Turkey/CURECI_FILE.jpg'),
(39, 5, 'Losos', 'Filet lososa, riža, sotirane gljive,sotirano povrće, dresing i lepinja.', '2017-06-10 05:46:07', 'pictures/GLAVNA JELA/Fishy/LOSOS.jpg'),
(40, 6, 'Pileći file natur', 'Grilovani pileći file, pomfrit, riža sa povrćem, sveža zelena salata i lepinja.', '2017-06-10 05:46:07', 'pictures/GLAVNA JELA/Chicken/PILETINA_NATUR.jpg'),
(41, 7, 'Biftek natur', 'Grilovani juneći biftek, pomfrit, taljatele u sosu od belog vina, sveža zelena salata i lepinja', '2017-06-10 05:46:07', 'pictures/GLAVNA JELA/Teletina/BIFTEK_NATUR.jpg'),
(42, 8, 'Svinjski file', 'Gratinirani svinjski file sa španaćem i slaninom u paradajz sosu, serviran sa ploškama krompira, sortiranim gljivama i lepinjom.', '2017-06-10 05:46:07', 'pictures/GLAVNA JELA/Pork/SVINJSKI_FILE.jpg'),
(43, 9, 'Pohovani rolat', 'Rolovana praška šunka, sir trapist, paradajz, krastavac, tartar sos i lepinja.', '2017-06-10 05:46:07', 'pictures/GLAVNA JELA/Fried/POHOVANI_ROLAT.jpg'),
(44, 10, 'Pomfrit', 'Pomfrit', '2017-06-10 05:46:07', 'pictures/GLAVNA JELA/Fried/POMFRIT.jpg'),
(45, 11, 'Pizza sa sirom', 'Kečap, sir', '2017-06-10 05:46:07', 'pictures/GLAVNA JELA/PIZZA/PIZZA_SA_SIROM.jpg'),
(46, 12, 'Bolognese', 'Paradajz sos, bolonjeze sos, neutralna pavlaka.', '2017-06-10 05:46:07', 'pictures/GLAVNA JELA/Pasta/BOLONJEZE.jpg'),
(47, 13, 'Zelene lazanje', 'Domaće testo sa spanćem, ragu od mlevenog mesa, gljive, sir, bešamel sos i neutralna pavlaka.', '2017-06-10 05:46:07', 'pictures/GLAVNA JELA/Lazanje/LAZANJE.jpg'),
(48, 14, 'Vegetarijanski tanjir', 'Marinirano povrće sa grila servirano sa kolutićima luka i spicy wedges krompirom u kombinaciji sa guacamole umakom.', '2017-06-10 05:46:07', 'pictures/GLAVNA JELA/VEGGY/VEGETARIJANSKI_TANJIR.jpg'),
(49, 15, 'Džem', 'Džem', '2017-06-10 05:46:07', 'pictures/DESERTI/PANCAKES/paldzem.jpg'),
(50, 16, 'Sladoled kugla', 'Sladoled kugla', '2017-06-10 05:46:07', 'pictures/DESERTI/OSTALO/KUGLA_SLADOLEDA.jpg'),
(51, 17, 'Absinth', 'Absinth', '2017-06-10 05:46:07', NULL),
(52, 18, 'Dunja', 'Dunja', '2017-06-10 05:46:07', NULL),
(53, 19, 'Cokoladni', 'Cokoladni liker', '2017-06-10 05:46:07', NULL),
(54, 20, 'Bladi meri', 'Sok od paradajza, votka i tobasko', '2017-06-10 05:46:07', NULL),
(55, 21, 'Vranjac', 'crno vino', '2017-06-10 05:46:07', NULL),
(56, 22, 'Niksicko tamno', 'Tamno pivo', '2017-06-10 05:46:07', NULL),
(57, 23, 'Coca-Cola', 'Coca-Cola', '2017-06-10 05:46:07', NULL),
(58, 24, 'Next sok', 'Next sok', '2017-06-10 05:46:07', NULL),
(59, 25, 'Jabuka', 'cedjena jabuka', '2017-06-10 05:46:07', NULL),
(60, 26, 'Espresso', 'Espresso', '2017-06-10 05:46:07', NULL),
(61, 27, 'Milkshake', 'milkshake', '2017-06-10 05:46:07', NULL),
(62, 28, 'Rosa voda', 'Rosa voda', '2017-06-10 05:46:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_section`
--

DROP TABLE IF EXISTS `menu_section`;
CREATE TABLE IF NOT EXISTS `menu_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(2) NOT NULL,
  `section` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_section`
--

INSERT INTO `menu_section` (`id`, `category_id`, `section`) VALUES
(1, 1, 'Predjelo'),
(2, 1, 'Glavno jelo'),
(3, 1, 'Dezert'),
(4, 2, 'Alkoholno'),
(5, 2, 'Bezalkoholno');

-- --------------------------------------------------------

--
-- Table structure for table `menu_subcategory`
--

DROP TABLE IF EXISTS `menu_subcategory`;
CREATE TABLE IF NOT EXISTS `menu_subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NOT NULL,
  `subcategory` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `section_id` (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_subcategory`
--

INSERT INTO `menu_subcategory` (`id`, `section_id`, `subcategory`) VALUES
(1, 1, 'Salate'),
(2, 1, 'Supe'),
(3, 1, 'Jela'),
(4, 2, 'Curetina'),
(5, 2, 'Riba'),
(6, 2, 'Piletina'),
(7, 2, 'Junetina'),
(8, 2, 'Svinjetina'),
(9, 2, 'Pohovana'),
(10, 2, 'Prilozi'),
(11, 2, 'Pizza'),
(12, 2, 'Pasta'),
(13, 2, 'Lazanje'),
(14, 2, 'Vegeterijanska'),
(15, 3, 'Palacinke'),
(16, 3, 'Poslastice'),
(17, 4, 'Zestoka Pica'),
(18, 4, 'Rakije'),
(19, 4, 'Likeri'),
(20, 4, 'Kokteli'),
(21, 4, 'Vina'),
(22, 4, 'Piva'),
(23, 5, 'Gazirani sokovi'),
(24, 5, 'Negazirani sokovi'),
(25, 5, 'Cedjeni sokovi'),
(26, 5, 'Topli napitci'),
(27, 5, 'Hladni napitci'),
(28, 5, 'Vode');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `table_id` int(11) NOT NULL,
  `time_slot_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `table_id` (`table_id`),
  KEY `time_slot_id` (`time_slot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `name`, `table_id`, `time_slot_id`, `date`, `contact_phone`, `contact_email`) VALUES
(1, 'Stefan', 1, 22, '2017-06-07', '1212412412', 'adawdawfawf'),
(2, 'stef', 1, 21, '2017-06-07', '1212312', 'asdasdasda'),
(4, 'Stefan Stankovic', 4, 23, '2018-08-05', ' 0631234678', ' example@test.com'),
(5, 'auiwdgaoiw', 1, 24, '2018-06-06', ' 063123987', ' test@ex.com'),
(6, 'Stefan S', 2, 24, '2018-08-08', ' 063888888', ' ex@ex.com'),
(7, 'Neko Nesto', 1, 22, '2018-08-08', ' 0631781237', ' ex@ex.com');

-- --------------------------------------------------------

--
-- Table structure for table `stol`
--

DROP TABLE IF EXISTS `stol`;
CREATE TABLE IF NOT EXISTS `stol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seats` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stol`
--

INSERT INTO `stol` (`id`, `seats`) VALUES
(1, 2),
(2, 2),
(3, 3),
(4, 4),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `termin`
--

DROP TABLE IF EXISTS `termin`;
CREATE TABLE IF NOT EXISTS `termin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `hour_duration` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `termin`
--

INSERT INTO `termin` (`id`, `start_time`, `end_time`, `hour_duration`) VALUES
(21, '08:00:00', '11:00:00', NULL),
(22, '11:00:00', '14:00:00', NULL),
(23, '14:00:00', '17:00:00', NULL),
(24, '17:00:00', '20:00:00', NULL),
(25, '20:00:00', '23:00:00', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_dish`
--
ALTER TABLE `menu_dish`
  ADD CONSTRAINT `subcategory_fk` FOREIGN KEY (`subcategory_id`) REFERENCES `menu_subcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_section`
--
ALTER TABLE `menu_section`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`category_id`) REFERENCES `menu_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_subcategory`
--
ALTER TABLE `menu_subcategory`
  ADD CONSTRAINT `section_fk` FOREIGN KEY (`section_id`) REFERENCES `menu_section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `stol_fk` FOREIGN KEY (`table_id`) REFERENCES `stol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `termin_fk` FOREIGN KEY (`time_slot_id`) REFERENCES `termin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
