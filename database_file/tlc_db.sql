-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 03:01 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tlc`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `addressID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `companyName` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`addressID`, `userID`, `companyName`, `address`, `city`, `country`) VALUES
(1, 1, '', '5 Magnus Oyewale Close, Ajiwe', 'Lekki', 'Nigeria');

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `billingID` int(11) NOT NULL,
  `resID` int(11) NOT NULL,
  `userID` varchar(200) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `companyName` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `otherNotes` text NOT NULL,
  `paymentType` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`billingID`, `resID`, `userID`, `firstName`, `lastName`, `companyName`, `address`, `city`, `country`, `email`, `phone`, `otherNotes`, `paymentType`) VALUES
(1, 1549876339, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'Direct Bank Transfer'),
(2, 1549939085, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '8133426889', '', 'Direct Bank Transfer'),
(3, 1554728065, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'Direct Bank Transfer'),
(4, 1557854500, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'card'),
(5, 1558181573, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'card'),
(6, 1559045195, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'transfer'),
(7, 1559045219, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'transfer'),
(9, 1559046024, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'transfer'),
(10, 1559046388, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'card'),
(11, 1559050450, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'card'),
(12, 1559076439, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'transfer'),
(13, 1568710990, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'transfer'),
(14, 1571017236, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'transfer'),
(15, 1571103744, '1', 'Imo', 'Douglas', '', '5 Magnus Oyewale Close, Ajiwe', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'card'),
(16, 1571105604, '1', 'Imo', 'Douglas', '', '5 Magnus Oyewale Close, Ajiwe', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'card'),
(17, 1571106053, '1', 'Imo', 'Douglas', '', '5 Magnus Oyewale Close, Ajiwe', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'card'),
(18, 1571741104, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'transfer'),
(19, 1571741282, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'transfer'),
(20, 1571741386, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'transfer'),
(21, 1571741556, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'transfer'),
(22, 1571741638, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'card'),
(23, 1571742798, '0', 'Imo', 'Douglas', 'Dobem IT Consults', 'No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'transfer'),
(24, 1571743235, '0', 'Imo', 'Douglas', 'Dobem IT Consults', 'No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'card'),
(25, 1571866201, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'transfer'),
(26, 1571866479, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'transfer'),
(27, 1571866515, '', 'Imo', 'Douglas', 'Dobem IT Consults', ' No. 5 Magnus Close, Abaraham Adesanya', 'Lekki', 'Nigeria', 'imodouglas@gmail.com', '08133426889', '', 'transfer');

-- --------------------------------------------------------

--
-- Table structure for table `caesars_advert`
--

CREATE TABLE `caesars_advert` (
  `chpID` int(11) NOT NULL,
  `adImage` varchar(200) NOT NULL,
  `ad1title` varchar(200) NOT NULL,
  `ad1text` varchar(200) NOT NULL,
  `ad2title` varchar(200) NOT NULL,
  `ad2text` varchar(200) NOT NULL,
  `addTime` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caesars_advert`
--

INSERT INTO `caesars_advert` (`chpID`, `adImage`, `ad1title`, `ad1text`, `ad2title`, `ad2text`, `addTime`) VALUES
(1, 'ad.jpg', 'Easter Bonanza', 'Get rooms at discount rate this Easter', 'Coming Soon!', 'There will be dicount offers coming soon.', '1598359527');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(11) NOT NULL,
  `eventName` varchar(200) NOT NULL,
  `eventDesc1` varchar(200) NOT NULL,
  `eventDesc` text NOT NULL,
  `eventStart` varchar(200) NOT NULL,
  `eventEnd` varchar(200) NOT NULL,
  `eventHall` varchar(200) NOT NULL,
  `eventPrice` varchar(200) NOT NULL,
  `eventImg` varchar(200) NOT NULL,
  `eventStatus` varchar(200) NOT NULL,
  `eventAdded` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `eventName`, `eventDesc1`, `eventDesc`, `eventStart`, `eventEnd`, `eventHall`, `eventPrice`, `eventImg`, `eventStatus`, `eventAdded`) VALUES
(2, 'Sample Event 2', 'Internet or online marketing involves the use of marketing strategies that use the Web and emails to drive direct sales via ecommerce. This too can be achieved with your website.', 'There are tons of business opportunities online and having a website is an additional plus. Although a website is not all that necessary to start online businesses but it will give a great advantage. This means that apart from making you and your products or service easily accessible and more visible, it will also multiply your net returns. There are many businesses you can start with your website, below are 5 profitable ventures that you can begin immediately. \r\n\r\n1. Travel / tour guide\r\nYou can turn a lifetime of living in the same town into a business opportunity that will enrich your pocket. With your website, you can provide travel and tour guide services to visitors in your resident town or city. This can be very profitable especially if you live in a tourist destination or probably close to one. You can use your website to promote yourself as a local expert and it is possible to get more clients especially if your rates are subsidized and you offer excellent services. \r\n\r\n2. Online store\r\nThe Internet is a global village and is very efficient for online sales. With your website, you can support your local business by increasing your visibility and selling to customers that are literally beyond your reach. It is no news that online sales have increased tremendously over the years and will continue to increase because most individuals have opted to shopping constantly online. With your online store, you can sell your products or resell products of your choice. This is great because you would be able to reach a lot more people than you would from your local store. It is an excellent way to grow your business. \r\n\r\n3. Online Coaching \r\nIf you are a professional in a skill, your website can offer online coaching of that skill to people. You can get paid for teaching strangers online what you know and enjoy talking about. All you need to do is to do is get a website with excellent SEO that beginners would understand and search engines will remember. You could also offer other services on your website like selling ebooks and learning materials on the subject matter. This will go a long way to increase your number of clients. \r\n\r\n4. Internet marketing \r\nInternet or online marketing involves the use of marketing strategies that use the Web and emails to drive direct sales via ecommerce. This too can be achieved with your website. It is one of the top online money making service that is very profitable especially to dedicated practitioners. There are various online marketing sub categories include search engine optimization (SEO) and search engine marketing (SEM) including email and social media marketing. You can learn these skills easily and provide valuable services while making money from the comfort of your home or office. \r\n\r\n5. Affiliate marketing \r\nIf you play your cards right and your website is fully functional, a lot of businesses will pay you to promote their products and encourage sales online. Affiliate marketing is one of the quickest ways to make money online and having a functional website gives you an edge. You can check out affiliate marketing programs such as Jumia Affiliate Program, Konga Affiliate Program and ShareASale for more information on how to go about affiliate marketing.', '1571954400', '1572390000', 'Caesars By TLC', '30000', '15717069567524.jpg', 'active', '1571706956');

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `hallID` int(11) NOT NULL,
  `hallName` varchar(200) NOT NULL,
  `hallCapacity` varchar(200) NOT NULL,
  `hallPrice` varchar(200) NOT NULL,
  `hallPromo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`hallID`, `hallName`, `hallCapacity`, `hallPrice`, `hallPromo`) VALUES
(1, 'The Imperial', '1200 pax', '3000000', 'off'),
(2, 'Skyview', '400 pax', '2500000', 'off'),
(3, 'Board Room', '24 pax', '100000', 'off'),
(4, 'Theater Training Hall', '30 pax', '150000', 'off'),
(5, 'The View Restaurant', '100 pax', '150000', 'off'),
(6, 'E11even Lounge', '150 pax', '300000', 'off'),
(7, 'PAUG Office Space Hub', 'Undefined', '10000', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoiceID` int(11) NOT NULL,
  `section` varchar(200) NOT NULL,
  `invoiceAmount` int(11) NOT NULL,
  `invoiceDesc` text NOT NULL,
  `invoiceTime` varchar(200) NOT NULL,
  `invoiceStatus` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoiceID`, `section`, `invoiceAmount`, `invoiceDesc`, `invoiceTime`, `invoiceStatus`) VALUES
(321, 'Room Booking', 30000, 'Balance payment for booking of executive room in Caesars by TLC.', '1573130027', 'paid'),
(322, 'Hall Booking', 85000, 'Balance payment for booking of skyview hall.', '1573130054', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `photoscape`
--

CREATE TABLE `photoscape` (
  `psID` int(11) NOT NULL,
  `psServices` varchar(200) NOT NULL,
  `psDescriptions` varchar(200) NOT NULL,
  `psPrices` varchar(200) NOT NULL,
  `psPromo` varchar(200) NOT NULL DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photoscape`
--

INSERT INTO `photoscape` (`psID`, `psServices`, `psDescriptions`, `psPrices`, `psPromo`) VALUES
(1, 'Portrait', 'Single look', '5000', 'off'),
(2, 'Single Session', 'Up to 3 looks, 10 high resolution pictures', '25000', 'off'),
(3, 'Couple/Family Session', 'Up to 3 looks, 20 high resolution pictures', '50000', 'off'),
(4, 'In-studio Makeup', 'Makeup without lashes', '6000', 'off'),
(5, 'In-studio Makeup', 'Makeup with lashes', '9000', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `postName` varchar(200) NOT NULL,
  `postSlug` varchar(200) NOT NULL,
  `postDesc1` varchar(200) NOT NULL,
  `postDesc` text NOT NULL,
  `postImg` varchar(200) NOT NULL,
  `postStatus` varchar(200) NOT NULL,
  `postAdded` varchar(200) NOT NULL,
  `postedBy` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `postName`, `postSlug`, `postDesc1`, `postDesc`, `postImg`, `postStatus`, `postAdded`, `postedBy`) VALUES
(2, 'Here are 5 Businesses you can start from Home with a website', 'here-are-5-businesses-you-can-start-from-home-with-a-website', ' There are tons of business opportunities online and having a website is an additional plus. Although a website is not all that necessary to start online businesses but it will give a great advantage.', ' There are tons of business opportunities online and having a website is an additional plus. Although a website is not all that necessary to start online businesses but it will give a great advantage. This means that apart from making you and your products or service easily accessible and more visible, it will also multiply your net returns. There are many businesses you can start with your website, below are 5 profitable ventures that you can begin immediately. \r\n\r\n1. Travel / tour guide\r\nYou can turn a lifetime of living in the same town into a business opportunity that will enrich your pocket. With your website, you can provide travel and tour guide services to visitors in your resident town or city. This can be very profitable especially if you live in a tourist destination or probably close to one. You can use your website to promote yourself as a local expert and it is possible to get more clients especially if your rates are subsidized and you offer excellent services. \r\n\r\n2. Online store\r\nThe Internet is a global village and is very efficient for online sales. With your website, you can support your local business by increasing your visibility and selling to customers that are literally beyond your reach. It is no news that online sales have increased tremendously over the years and will continue to increase because most individuals have opted to shopping constantly online. With your online store, you can sell your products or resell products of your choice. This is great because you would be able to reach a lot more people than you would from your local store. It is an excellent way to grow your business. \r\n\r\n3. Online Coaching \r\nIf you are a professional in a skill, your website can offer online coaching of that skill to people. You can get paid for teaching strangers online what you know and enjoy talking about. All you need to do is to do is get a website with excellent SEO that beginners would understand and search engines will remember. You could also offer other services on your website like selling ebooks and learning materials on the subject matter. This will go a long way to increase your number of clients. \r\n\r\n4. Internet marketing \r\nInternet or online marketing involves the use of marketing strategies that use the Web and emails to drive direct sales via ecommerce. This too can be achieved with your website. It is one of the top online money making service that is very profitable especially to dedicated practitioners. There are various online marketing sub categories include search engine optimization (SEO) and search engine marketing (SEM) including email and social media marketing. You can learn these skills easily and provide valuable services while making money from the comfort of your home or office. \r\n\r\n5. Affiliate marketing \r\nIf you play your cards right and your website is fully functional, a lot of businesses will pay you to promote their products and encourage sales online. Affiliate marketing is one of the quickest ways to make money online and having a functional website gives you an edge. You can check out affiliate marketing programs such as Jumia Affiliate Program, Konga Affiliate Program and ShareASale for more information on how to go about affiliate marketing.', '15717331322736.png', 'active', '1571733132', 'titemako');

-- --------------------------------------------------------

--
-- Table structure for table `pscart`
--

CREATE TABLE `pscart` (
  `psCartID` int(11) NOT NULL,
  `psID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `psQty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `resID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `section` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `startDate` varchar(200) NOT NULL,
  `endDate` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `resTime` varchar(200) NOT NULL,
  `resStatus` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`resID`, `userID`, `section`, `description`, `startDate`, `endDate`, `amount`, `resTime`, `resStatus`) VALUES
(1549876339, 1, 'Room Booking', '4 days King Classic accomodation from 02/18/2019 to 02/22/2019', '02/18/2019', '02/22/2019', '180000', '1549876339', 'approved'),
(1549939085, 1, 'Room Booking', '1 days King Classic accomodation from 02/21/2019 to 02/22/2019', '02/21/2019', '02/22/2019', '45000', '1549939085', 'pending'),
(1554728065, 0, 'Room Booking', '2 days King Classic accomodation from 04/10/2019 to 04/12/2019', '04/10/2019', '04/12/2019', '90000', '1554728065', 'pending'),
(1557854500, 0, 'Room Booking', '2 days King Classic accomodation from 05/14/2019 to 05/16/2019', '05/14/2019', '05/16/2019', '90000', '1557854500', 'pending'),
(1558181573, 0, 'Room Booking', '2 days King Classic accomodation from 05/14/2019 to 05/16/2019', '05/14/2019', '05/16/2019', '90000', '1558181573', 'pending'),
(1559046024, 0, 'Hall Booking', '1 days The Imperial reservation from 05/28/2019 to 05/29/2019', '05/28/2019', '05/29/2019', '3000000', '1559046024', 'pending'),
(1559046388, 0, 'Hall Booking', '2 days E11even Lounge reservation from 05/29/2019 to 05/31/2019', '05/29/2019', '05/31/2019', '600000', '1559046388', 'pending'),
(1559050450, 0, 'Hall Booking', '2 days E11even Lounge reservation from 05/29/2019 to 05/31/2019', '05/29/2019', '05/31/2019', '600000', '1559050450', 'approved'),
(1559076439, 0, 'Photoscape', 'Booking for the following services 2 Portrait, <br />0 Single Session, <br />0 Couple/Family Session, <br />1 In-studio Makeup, <br />0 In-studio Makeup, <br />on the following date 05/30/2019', '05/30/2019', '', '16000', '1559076439', 'approved'),
(1568710990, 0, 'Room Booking', '2 days King Classic accomodation from 09/18/2019 to 09/20/2019', '09/18/2019', '09/20/2019', '90000', '1568710990', 'pending'),
(1571017236, 0, 'Room Booking', '-18184 days  accomodation from 2019-10-15 to 2', '2019-10-15', '2', '-0', '1571017236', 'pending'),
(1571103744, 1, 'Room Booking', '1 - King Classic - 1 - King Deluxe -  accomodation from 16/10/2019 to 18/10/2019 (2 days) ', '10/16/2019', '10/18/2019', '200000', '1571103744', 'pending'),
(1571105604, 1, 'Room Booking', '1 King Classic, 1 King Executive,  accomodation from 16/10/2019 to 18/10/2019 (2 days) ', '10/16/2019', '10/18/2019', '220000', '1571105604', 'pending'),
(1571106053, 1, 'Room Booking', '1 King Classic, 1 King Deluxe accomodation from 16/10/2019 to 19/10/2019 (3 days) ', '10/16/2019', '10/19/2019', '300000', '1571106053', 'pending'),
(1571741104, 0, 'Hall Booking', '2 days The View Restaurant reservation from 10/23/2019 to 10/25/2019', '10/23/2019', '10/25/2019', '300000', '1571741104', 'pending'),
(1571741282, 0, 'Hall Booking', '2 days The View Restaurant reservation from 10/23/2019 to 10/25/2019', '10/23/2019', '10/25/2019', '300000', '1571741282', 'pending'),
(1571741386, 0, 'Hall Booking', '2 days The View Restaurant reservation from 10/23/2019 to 10/25/2019', '10/23/2019', '10/25/2019', '300000', '1571741386', 'pending'),
(1571741556, 0, 'Hall Booking', '3 days Theater Training Hall reservation from 10/23/2019 to 10/26/2019', '10/23/2019', '10/26/2019', '450000', '1571741556', 'pending'),
(1571741638, 0, 'Hall Booking', '2 days E11even Lounge reservation from 10/24/2019 to 10/26/2019', '10/24/2019', '10/26/2019', '600000', '1571741638', 'pending'),
(1571742798, 0, 'Room Booking', '2 King Classic accomodation from 24/10/2019 to 27/10/2019 (3 days) ', '10/24/2019', '10/27/2019', '270000', '1571742798', 'pending'),
(1571743235, 0, 'Room Booking', '1 King Classic accomodation from 24/10/2019 to 27/10/2019 (3 days) ', '10/24/2019', '10/27/2019', '135000', '1571743235', 'pending'),
(1571866479, 0, 'Hall Booking', '2 days Skyview reservation from 25/10/2019 to 01/01/1970 (2 days)', '10/25/2019', '10/27/2019', '5000000', '1571866479', 'pending'),
(1571866515, 0, 'Hall Booking', '2 days Skyview reservation from 25/10/2019 to 27/10/2019 (2 days)', '10/25/2019', '10/27/2019', '5000000', '1571866515', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomID` int(11) NOT NULL,
  `roomName` varchar(200) NOT NULL,
  `roomRate` varchar(200) NOT NULL,
  `promo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomID`, `roomName`, `roomRate`, `promo`) VALUES
(1, 'King Classic', '45000', 'off'),
(2, 'King Deluxe', '55000', 'off'),
(3, 'King Executive', '65000', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` text NOT NULL,
  `uname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `pword` varchar(200) NOT NULL,
  `userPriv` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `fname`, `lname`, `uname`, `email`, `phone`, `pword`, `userPriv`, `status`) VALUES
(1, 'Imo', 'Douglas', 'imodouglas', 'imodouglas@gmail.com', '08133426889', '1f8441da63dad3044273d8fd5bde678c', 'guest', 'active'),
(2, 'Hotel', 'Admin', 'admin', 'admin@hotelbooking.com', '08031234567', '1cbc9cbaac5a47c54f64c35e93b03b2c', 'admin', 'active'),
(3, 'Blog', 'Editor', 'editor', 'blog@thelekkicoliseum.com', '0000', '7fb8bbb1ee1315f65669364741cd2eae', 'editor', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`addressID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`billingID`);

--
-- Indexes for table `caesars_advert`
--
ALTER TABLE `caesars_advert`
  ADD PRIMARY KEY (`chpID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`hallID`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoiceID`);

--
-- Indexes for table `photoscape`
--
ALTER TABLE `photoscape`
  ADD PRIMARY KEY (`psID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `pscart`
--
ALTER TABLE `pscart`
  ADD PRIMARY KEY (`psCartID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`resID`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `billingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `caesars_advert`
--
ALTER TABLE `caesars_advert`
  MODIFY `chpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `hallID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT for table `photoscape`
--
ALTER TABLE `photoscape`
  MODIFY `psID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pscart`
--
ALTER TABLE `pscart`
  MODIFY `psCartID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
