-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 09, 2018 at 08:16 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m2_guconnailah_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `SName` varchar(255) NOT NULL,
  `Price` float(10,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datetime` datetime NOT NULL,
  `status` enum('B','C','D','A') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `myservices`
--

DROP TABLE IF EXISTS `myservices`;
CREATE TABLE IF NOT EXISTS `myservices` (
  `CID` int(11) NOT NULL,
  `SID` int(11) NOT NULL AUTO_INCREMENT,
  `CName` varchar(1000) NOT NULL,
  `SName` varchar(1000) NOT NULL,
  `SPic` varchar(1000) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Price` float(10,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Cheader` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myservices`
--

INSERT INTO `myservices` (`CID`, `SID`, `CName`, `SName`, `SPic`, `Description`, `Price`, `created`, `Cheader`) VALUES
(1, 1, 'Beauty Center Picture.png', 'Makeup Artistry', 'makeup_artistry.png', 'Get your make-up professionally done for any occasion, from proms to weddings, say hello to the beautiful you', 60.00, '2018-07-29 20:33:39', 'Beauty'),
(1, 2, 'Beauty Center Picture.png', 'Eyebrow Sculpting', 'eyebrow_sculpting.png', 'Get perfectly shaped eyebrows to beautifully frame and enhance your eyes and face through expert tweezing and shaping techniques.', 20.00, '2018-07-29 20:36:27', 'Beauty'),
(1, 3, 'Beauty Center Picture.png', 'Hair Styling', 'hair_styling.png', 'Personalized services just for you - from cuts to color, we make recommendations based on your face shape, skin tone and lifestyle, your hair will be made to look and feel your best. ', 50.00, '2018-07-29 20:36:27', 'Beauty'),
(2, 4, 'Spa Center Picture.png', 'Acupuncture Facial', 'acufacial.png', 'Stimulate collagen growth and elastin production through traditional chinese medicine, which firms your skin and reduces fine lines.', 90.00, '2018-07-29 20:40:42', 'Spa'),
(2, 5, 'Spa Center Picture.png', 'Body Scrub', 'bodyscrub.png', 'Choose from a selection of 6 types of scrub that best suits your skin type. Nourish your skin, improve circulation, cleanse and tone even the most sensitive skin.', 70.00, '2018-07-29 20:40:42', 'Spa'),
(2, 6, 'Spa Center Picture.png', 'Foot Reflexology', 'foot.png', 'Relieve the tension in your feet and significantly improve blood flow to your vital organs.  <br>Just relax, let our experts do the work.', 40.00, '2018-07-29 20:40:42', 'Spa'),
(3, 7, 'Massages Picture.png', 'Aromatherapy', 'oil.png', 'Relax with your choice of floral essential oils. This massage is known to enhance psychological and physical well-being for whole-body healing. Invigorate your body and leave feeling renewed.', 95.00, '2018-07-29 20:44:59', 'Massages'),
(3, 8, 'Massages Picture.png', 'Shiatsu Massage', 'shiatsu.png', 'Excellent at relieving pain, eliminating stress and improve your circulation on a de-stress spa holiday. Stay fully clothed as no oil is used. End your session feeling both physically and mentally renewed.', 65.00, '2018-07-29 20:44:59', 'Massages'),
(3, 9, 'Massages Picture.png', 'Prenatal Massage', 'preg.png', 'Designed to help pregnant mothers soothe away tired muscles and lower backache. A wonderful pampering treat for mums-to-be before the important day and before the baby takes all the attention.', 55.00, '2018-07-29 20:44:59', 'Massages');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

DROP TABLE IF EXISTS `userdetails`;
CREATE TABLE IF NOT EXISTS `userdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmpassword` varchar(255) NOT NULL,
  `mobileno` int(8) NOT NULL,
  `profilepic` varchar(1000) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `fullname`, `email`, `username`, `password`, `confirmpassword`, `mobileno`, `profilepic`, `created`) VALUES
(26, 'nailah gucon', 'user@gmail.com', 'nailah', '$2y$10$3zvc4wBGC1GijjTGBytPJuIF2SoqfVkoaw2mE2KWtI.yXV1IRMIXy', '$2y$10$2tfhg4PRqwSjpqFc93VKUeqJmnJFIEaeH1tx62VAJo6YlF6qGKa5a', 98989898, '', '2018-08-08 14:36:05'),
(27, 'clarkmedinaya', 'user123@gmail.com', 'clark', '$2y$10$qaSsKGzADbiBmwhkMEI6FOlw8gdRMh8CVOR1cBVS4tFnKbs7H5zjC', '$2y$10$qaSsKGzADbiBmwhkMEI6FOlw8gdRMh8CVOR1cBVS4tFnKbs7H5zjC', 98989898, 'userpics/20180808_152816_Bahrain.png', '2018-08-08 14:52:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
