-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2022 at 10:37 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cadima_db_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads_tbl`
--

DROP TABLE IF EXISTS `ads_tbl`;
CREATE TABLE IF NOT EXISTS `ads_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_en` varchar(500) DEFAULT NULL,
  `title_ar` varchar(500) DEFAULT NULL,
  `short_desc_en` varchar(500) DEFAULT NULL,
  `short_desc_ar` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `active_from` int(11) DEFAULT NULL,
  `active_to` int(11) DEFAULT NULL,
  `fee` decimal(11,0) DEFAULT NULL,
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads_tbl`
--

INSERT INTO `ads_tbl` (`id`, `title_en`, `title_ar`, `short_desc_en`, `short_desc_ar`, `image`, `link`, `active_from`, `active_to`, `fee`, `inserted_at`, `updated_at`, `user_id`, `is_active`, `is_delete`) VALUES
(1, NULL, NULL, NULL, NULL, '1.png', 'https://www.dior.com/', NULL, NULL, NULL, 1641563954, NULL, 1, '1', '0'),
(2, NULL, NULL, NULL, NULL, '2.png', 'https://www.dior.com/', NULL, NULL, NULL, 1641563954, NULL, 1, '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `area_tbl`
--

DROP TABLE IF EXISTS `area_tbl`;
CREATE TABLE IF NOT EXISTS `area_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `title_en` varchar(250) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area_tbl`
--

INSERT INTO `area_tbl` (`id`, `level`, `country_id`, `state_id`, `city_id`, `title_en`, `title_ar`, `user_id`, `inserted_at`, `updated_at`, `is_active`, `is_delete`) VALUES
(1, 1, 0, NULL, NULL, 'UAE', 'الإمارات العربية المتحدة', 1, 1640560033, 1640560051, 1, 0),
(2, 2, 1, NULL, NULL, 'State of Abu Dhabi', 'State of Abu Dhabi Arabic', 1, 1640560164, 1640560944, 1, 0),
(3, 1, 0, NULL, NULL, 'Pakistan', 'پاکستان ', 1, 1640560272, NULL, 1, 0),
(4, 2, 3, NULL, NULL, 'KPK', 'KPK', 1, 1640560994, NULL, 1, 0),
(7, 3, 1, 4, NULL, 'Bannu', 'Bannu', 1, 1640561759, 1640562312, 1, 0),
(9, 3, 1, 2, NULL, 'Alain City', 'Alain City', 1, 1640562344, 1640562447, 1, 0),
(10, 4, 3, 4, NULL, 'Domail', 'Domail', 1, 1640563116, NULL, 1, 0),
(11, 3, 3, 4, NULL, 'Karak', 'Karak', 1, 1640564229, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog_tbl`
--

DROP TABLE IF EXISTS `blog_tbl`;
CREATE TABLE IF NOT EXISTS `blog_tbl` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `blog_category_id` int(11) DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feature_image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_en` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_ar` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excerpt_en` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excerpt_ar` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_promoted` int(11) DEFAULT NULL,
  `views` bigint(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('Draft','Publish') COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_time` int(11) DEFAULT NULL,
  `is_active` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `is_delete` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_6sw8k5ohu2olrfyqiupm33yrv` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_tbl`
--

INSERT INTO `blog_tbl` (`id`, `blog_category_id`, `title_en`, `title_ar`, `slug`, `feature_image`, `content_en`, `content_ar`, `excerpt_en`, `excerpt_ar`, `is_promoted`, `views`, `user_id`, `status`, `publish_time`, `is_active`, `is_delete`, `inserted_at`, `updated_at`) VALUES
(1, 1, 'FOREVER YOUNG', 'FOREVER YOUNG', 'forever-young', 'Y0585rM3LAD4vbFH.jpg', 'Jamaliki Salon Offers you a free facial session when you make your first booking.', 'Jamaliki Salon Offers you a free facial session when you make your first booking.', NULL, NULL, 1, 3, 1, 'Publish', 1642052740, '1', '0', 1642052740, NULL),
(2, 2, 'CRISTINA FACE CARE', 'CRISTINA FACE CARE', 'cristina-face-care', 'GJoZJ9G2zp08nIh0.jpg', 'Cristina Face Care will take care of your look..', 'Cristina Face Care will take care of your look..', NULL, NULL, 1, 3, 1, 'Publish', 1642052740, '1', '0', 1642052740, NULL),
(3, 3, 'FOREVER YOUNG', 'FOREVER YOUNG', 'forever-young', 'Y0585rM3LAD4vbFH.jpg', 'Taking care of your skin will make you look young', 'Taking care of your skin will make you look young', NULL, NULL, 1, 3, 1, 'Publish', 1642052740, '1', '0', 1642052740, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories_tbl`
--

DROP TABLE IF EXISTS `categories_tbl`;
CREATE TABLE IF NOT EXISTS `categories_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('blog','media','page','project') NOT NULL DEFAULT 'blog',
  `title_en` varchar(250) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `parmalink` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` enum('1','0') DEFAULT '1',
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories_tbl`
--

INSERT INTO `categories_tbl` (`id`, `type`, `title_en`, `title_ar`, `parmalink`, `user_id`, `is_active`, `is_delete`, `inserted_at`, `updated_at`) VALUES
(1, 'blog', 'News', 'News', 'news', 1, '1', '0', NULL, NULL),
(2, 'media', 'Event 1', 'Event 1', 'event-1', 1, '1', '0', NULL, NULL),
(3, 'media', 'Event 2', 'Event 2', 'event-2', 1, '1', '0', NULL, NULL),
(4, 'media', 'Event 3', 'Event 3', 'event-3', 1, '1', '0', NULL, NULL),
(5, 'media', 'Event 4', 'Event 4', 'event-4', 1, '1', '0', NULL, NULL),
(6, 'media', 'Event 5', 'Event 5', 'event-5', 1, '1', '0', NULL, NULL),
(7, 'project', 'Portfolio Category 1', 'Portfolio Category 1', '', 1, '1', '0', NULL, NULL),
(8, 'project', 'Portfolio Category 2', 'Portfolio Category 2', '', 1, '1', '0', NULL, NULL),
(9, 'project', 'Portfolio Category 3', 'Portfolio Category 3', '', 1, '1', '0', NULL, NULL),
(10, 'project', 'Portfolio Category 4', 'Portfolio Category 4', '', 1, '1', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_tbl`
--

DROP TABLE IF EXISTS `contact_us_tbl`;
CREATE TABLE IF NOT EXISTS `contact_us_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `sender_email` varchar(250) DEFAULT NULL,
  `form_subject` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `message` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` enum('1','0') DEFAULT '1',
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us_tbl`
--

INSERT INTO `contact_us_tbl` (`id`, `form`, `name`, `sender_email`, `form_subject`, `message`, `user_id`, `is_active`, `is_delete`, `inserted_at`, `updated_at`) VALUES
(1, NULL, 'Anaya', NULL, NULL, 's', NULL, '1', '0', 1647867154, NULL),
(2, NULL, 'Anaya', NULL, NULL, 'ret', NULL, '1', '0', 1647867381, NULL),
(3, NULL, 'Anaya', NULL, NULL, 'sadas', NULL, '1', '0', 1647868686, NULL),
(4, NULL, 'Anaya', NULL, NULL, 'sad', NULL, '1', '0', 1647868724, NULL),
(5, NULL, 'Anaya', NULL, NULL, 'dsfs', NULL, '1', '0', 1647868889, NULL),
(6, NULL, 'Anaya', NULL, NULL, 'sdf', NULL, '1', '0', 1647868937, NULL),
(7, NULL, 'asd', NULL, NULL, 'sadsadas', NULL, '1', '0', 1647869131, NULL),
(8, NULL, 'Anaya', NULL, NULL, 'asd', NULL, '1', '0', 1647959641, NULL),
(9, NULL, 'sdfds', NULL, NULL, 'dsfs', NULL, '1', '0', 1647959817, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_tbl`
--

DROP TABLE IF EXISTS `email_tbl`;
CREATE TABLE IF NOT EXISTS `email_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(250) DEFAULT NULL,
  `email_type` varchar(100) DEFAULT NULL,
  `reciever_email` varchar(250) DEFAULT NULL,
  `sender_email` varchar(250) DEFAULT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `inserted_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_tbl`
--

INSERT INTO `email_tbl` (`id`, `subject`, `email_type`, `reciever_email`, `sender_email`, `body`, `status`, `inserted_at`) VALUES
(1, 'PLEASE VERFIFY YOUR EMAIL FOR JAMALIKI SYSTEM', 'SALON REGISTERATION', 'customer@jamalaiki.com', 'info@jamaliki.com', '<!doctype html>\r\n<html class=\"no-js\" lang=\"en\">\r\n    <head>\r\n    <meta charset=\"utf-8\" />\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no\" />\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge, chrome=1\" />\r\n    <meta name=\"description\" content=\"Jamaliki your beauty destination\" />\r\n    <meta name=\"keywords\" content=\"jamaliki, jamaliki dubai, salon booking dubai\" />\r\n    <meta name=\"google-signin-clientid\" content=\"\" />\r\n    <meta name=\"google-signin-cookiepolicy\" content=\"single_host_origin\" />\r\n    <meta name=\"google-signin-callback\" content=\"signinCallback\" />\r\n    <meta name=\"google-signin-scope\" content=\"https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email\" />\r\n    <title>JAMALAIKI</title>\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css\" />\r\n    \r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/animate.css/3.3.1/animate.min.css\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/Swiper/3.1.0/css/swiper.min.css\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.structure.min.css\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//fonts.googleapis.com/css?family=Lato:400,300,700\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//fonts.googleapis.com/earlyaccess/droidarabickufi.css\" />\r\n    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\r\n    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\r\n    <script src=\"https://kit.fontawesome.com/yourcode.js\" crossorigin=\"anonymous\"></script>\r\n    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css\">\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"http://localhost/jamalaiki/assets/css/jamaliki.css\" />\r\n    <link rel=\"stylesheet\" href=\"assets/admin/css/bootstrap3-wysihtml5.min.html\">\r\n    <script type=\"text/javascript\">\r\n        var myIP = \"182.186.41.26\";\r\n        var baseURL = \"\";\r\n    </script>\r\n    <script type=\"text/javascript\">\r\n        var Geo = {};\r\n        function extractGeoData(data) {\r\n            Geo.lat = data.latitude;\r\n            Geo.lon = data.longitude;\r\n            Geo.city = data.city;\r\n        }\r\n    </script>\r\n    <script>\r\n        var Strings = {\r\n            bookingOtherSalonError: \"Your cart contains bookings for other salon, check out or clear cart to add services from other salon.\",\r\n            bookingSlotTakenError: \"This slot is not available at this time please try again in 10 minutes from now.\",\r\n            maxBookingError: \"You can add maximum 3 bookings\",\r\n        };\r\n    </script>\r\n</head>    <body>\r\n        <div style=\"width: 75%;margin: 0 auto;border: 1px solid #eee;margin-top: 50px\">\r\n        	<div class=\"header\" style=\"padding: 15px;background-color: #333;color:#FFF;text-align: center;font-size: 36px;font-weight: 600;\">JAMALIKI SYSTEM</div>\r\n        	<div class=\"body\" style=\"padding: 15px;\">\r\n        		<h4 class=\"line_1\">DEAR CUSTOMER</h4>\r\n        		<h4 class=\"line_2\">Thanks for getting started with our JAMALIKI SYSTEM</h4>\r\n        		<h4>You registered an account on JAMALIKI SYSTEM, before being able to use your account you need to verify that this is your email address by clicking \r\n	        		<a style=\"color: blue\" target=\"_blank\" href=\"http://localhost/jamalaiki/login/verify/Y3VzdG9tZXJAamFtYWxhaWtpLmNvbQ==\">\r\n	        			 here.	        		</a>\r\n	        		 or paste the following URL in the browser.        		</h4>\r\n        		<h4>http://localhost/jamalaiki/login/verify/Y3VzdG9tZXJAamFtYWxhaWtpLmNvbQ==</h4>\r\n        		<h4 style=\"margin-top: 30px\">Kind Regards, </h4>\r\n        		<h4>JAMALIKI SYSTEM</h4>\r\n        	</div>\r\n        	<div class=\"footer\" style=\"padding: 15px;background-color: #333;color:#FFF\">\r\n        		<span style=\"display: inline-block;float: left\">ALL RIGHTS RESERVED WITH US. © 2022</span>\r\n        		<span style=\"display: inline-block;float: right\">23-01-2022 04:43:26 PM</span>\r\n        		<div style=\"clear: both;\"></div>\r\n        	</div>\r\n        </div>\r\n    </body>\r\n</html>', 'Not Sent', 1642956206),
(2, 'PLEASE VERFIFY YOUR EMAIL FOR JAMALIKI SYSTEM', 'SALON REGISTERATION', 'haseena@jamaliki.com', 'info@jamaliki.com', '<!doctype html>\r\n<html class=\"no-js\" lang=\"en\">\r\n    <head>\r\n    <meta charset=\"utf-8\" />\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no\" />\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge, chrome=1\" />\r\n    <meta name=\"description\" content=\"Jamaliki your beauty destination\" />\r\n    <meta name=\"keywords\" content=\"jamaliki, jamaliki dubai, salon booking dubai\" />\r\n    <meta name=\"google-signin-clientid\" content=\"\" />\r\n    <meta name=\"google-signin-cookiepolicy\" content=\"single_host_origin\" />\r\n    <meta name=\"google-signin-callback\" content=\"signinCallback\" />\r\n    <meta name=\"google-signin-scope\" content=\"https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email\" />\r\n    <title>JAMALAIKI</title>\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css\" />\r\n    \r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/animate.css/3.3.1/animate.min.css\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/Swiper/3.1.0/css/swiper.min.css\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.structure.min.css\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//fonts.googleapis.com/css?family=Lato:400,300,700\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//fonts.googleapis.com/earlyaccess/droidarabickufi.css\" />\r\n    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\r\n    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\r\n    <script src=\"https://kit.fontawesome.com/yourcode.js\" crossorigin=\"anonymous\"></script>\r\n    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css\">\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"http://localhost/jamalaiki/assets/css/jamaliki.css\" />\r\n    <link rel=\"stylesheet\" href=\"assets/admin/css/bootstrap3-wysihtml5.min.html\">\r\n    <script type=\"text/javascript\">\r\n        var myIP = \"182.186.41.26\";\r\n        var baseURL = \"\";\r\n    </script>\r\n    <script type=\"text/javascript\">\r\n        var Geo = {};\r\n        function extractGeoData(data) {\r\n            Geo.lat = data.latitude;\r\n            Geo.lon = data.longitude;\r\n            Geo.city = data.city;\r\n        }\r\n    </script>\r\n    <script>\r\n        var Strings = {\r\n            bookingOtherSalonError: \"Your cart contains bookings for other salon, check out or clear cart to add services from other salon.\",\r\n            bookingSlotTakenError: \"This slot is not available at this time please try again in 10 minutes from now.\",\r\n            maxBookingError: \"You can add maximum 3 bookings\",\r\n        };\r\n    </script>\r\n</head>    <body>\r\n        <div style=\"width: 75%;margin: 0 auto;border: 1px solid #eee;margin-top: 50px\">\r\n        	<div class=\"header\" style=\"padding: 15px;background-color: #333;color:#FFF;text-align: center;font-size: 36px;font-weight: 600;\">JAMALIKI SYSTEM</div>\r\n        	<div class=\"body\" style=\"padding: 15px;\">\r\n        		<h4 class=\"line_1\">DEAR CUSTOMER</h4>\r\n        		<h4 class=\"line_2\">Thanks for getting started with our JAMALIKI SYSTEM</h4>\r\n        		<h4>You registered an account on JAMALIKI SYSTEM, before being able to use your account you need to verify that this is your email address by clicking \r\n	        		<a style=\"color: blue\" target=\"_blank\" href=\"http://localhost/jamalaiki/login/verify/aGFzZWVuYUBqYW1hbGlraS5jb20=\">\r\n	        			 here.	        		</a>\r\n	        		 or paste the following URL in the browser.        		</h4>\r\n        		<h4>http://localhost/jamalaiki/login/verify/aGFzZWVuYUBqYW1hbGlraS5jb20=</h4>\r\n        		<h4 style=\"margin-top: 30px\">Kind Regards, </h4>\r\n        		<h4>JAMALIKI SYSTEM</h4>\r\n        	</div>\r\n        	<div class=\"footer\" style=\"padding: 15px;background-color: #333;color:#FFF\">\r\n        		<span style=\"display: inline-block;float: left\">ALL RIGHTS RESERVED WITH US. © 2022</span>\r\n        		<span style=\"display: inline-block;float: right\">27-01-2022 09:22:33 AM</span>\r\n        		<div style=\"clear: both;\"></div>\r\n        	</div>\r\n        </div>\r\n    </body>\r\n</html>', 'Not Sent', 1643275353),
(3, 'PLEASE VERFIFY YOUR EMAIL FOR JAMALIKI SYSTEM', 'SALON REGISTERATION', 'customer@jamalaiki.com', 'info@jamaliki.com', '<!doctype html>\r\n<html class=\"no-js\" lang=\"en\">\r\n    <head>\r\n    <meta charset=\"utf-8\" />\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no\" />\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge, chrome=1\" />\r\n    <meta name=\"description\" content=\"Jamaliki your beauty destination\" />\r\n    <meta name=\"keywords\" content=\"jamaliki, jamaliki dubai, salon booking dubai\" />\r\n    <title>JAMALAIKI</title>\r\n    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\r\n    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css\">\r\n    <link rel=\"stylesheet\" href=\"https://unpkg.com/swiper/swiper-bundle.min.css\"/>\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/animate.css/3.3.1/animate.min.css\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//fonts.googleapis.com/css?family=Lato:400,300,700\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"http://localhost/jamalaiki/assets/css/jamaliki.css\" />\r\n    <link rel=\"stylesheet\" href=\"http://localhost/jamalaiki/assets/admin/plugins/daterangepicker/daterangepicker.css\">\r\n    <link rel=\"stylesheet\" href=\"http://localhost/jamalaiki/assets/admin/bootstrap-datepicker.css\">\r\n    <link rel=\"stylesheet\" href=\"http://localhost/jamalaiki/assets/css/jquery.datetimepicker.css\">\r\n    <link rel=\"stylesheet\" href=\"http://localhost/jamalaiki/assets/css/zebra_dialog.min.css\">\r\n    <script type=\"text/javascript\">\r\n        var myIP = \'::1\';\r\n        var baseURL = http://localhost/jamalaiki/;\r\n    </script>\r\n    <script type=\"text/javascript\">\r\n        var Geo = {};\r\n        function extractGeoData(data) {\r\n            Geo.lat = data.latitude;\r\n            Geo.lon = data.longitude;\r\n            Geo.city = data.city;\r\n        }\r\n    </script>\r\n</head>    <body>\r\n        <div style=\"width: 75%;margin: 0 auto;border: 1px solid #eee;margin-top: 50px\">\r\n        	<div class=\"header\" style=\"padding: 15px;background-color: #333;color:#FFF;text-align: center;font-size: 36px;font-weight: 600;\">JAMALIKI SYSTEM</div>\r\n        	<div class=\"body\" style=\"padding: 15px;\">\r\n        		<h4 class=\"line_1\">DEAR Fatime</h4>\r\n        		<h4 class=\"line_2\">Thanks for getting started with our JAMALIKI SYSTEM</h4>\r\n        		<h4>You registered an account on JAMALIKI SYSTEM, before being able to use your account you need to verify that this is your email address by clicking \r\n	        		<a style=\"color: blue\" target=\"_blank\" href=\"http://localhost/jamalaiki/login/verify/Y3VzdG9tZXJAamFtYWxhaWtpLmNvbQ==\">\r\n	        			 here.	        		</a>\r\n	        		 or paste the following URL in the browser.        		</h4>\r\n        		<h4>http://localhost/jamalaiki/login/verify/Y3VzdG9tZXJAamFtYWxhaWtpLmNvbQ==</h4>\r\n        		<h4 style=\"margin-top: 30px\">Kind Regards, </h4>\r\n        		<h4>JAMALIKI SYSTEM</h4>\r\n        	</div>\r\n        	<div class=\"footer\" style=\"padding: 15px;background-color: #333;color:#FFF\">\r\n        		<span style=\"display: inline-block;float: left\">ALL RIGHTS RESERVED WITH US. © 2022</span>\r\n        		<span style=\"display: inline-block;float: right\">02-02-2022 04:27:14 PM</span>\r\n        		<div style=\"clear: both;\"></div>\r\n        	</div>\r\n        </div>\r\n    </body>\r\n</html>', 'Not Sent', 1643819234),
(4, 'PLEASE VERFIFY YOUR EMAIL FOR JAMALIKI SYSTEM', 'SALON REGISTERATION', 'jahangirkhattak13@gmail.com', 'info@jamaliki.com', '<!doctype html>\r\n<html class=\"no-js\" lang=\"en\">\r\n    <head>\r\n    <meta charset=\"utf-8\" />\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no\" />\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge, chrome=1\" />\r\n    <meta name=\"description\" content=\"Jamaliki your beauty destination\" />\r\n    <meta name=\"keywords\" content=\"jamaliki, jamaliki dubai, salon booking dubai\" />\r\n    <title>JAMALAIKI</title>\r\n    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\r\n    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css\">\r\n    <link rel=\"stylesheet\" href=\"https://unpkg.com/swiper/swiper-bundle.min.css\"/>\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/animate.css/3.3.1/animate.min.css\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//fonts.googleapis.com/css?family=Lato:400,300,700\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"http://localhost/jamalaiki/assets/css/jamaliki.css\" />\r\n    <link rel=\"stylesheet\" href=\"http://localhost/jamalaiki/assets/admin/plugins/daterangepicker/daterangepicker.css\">\r\n    <link rel=\"stylesheet\" href=\"http://localhost/jamalaiki/assets/admin/bootstrap-datepicker.css\">\r\n    <link rel=\"stylesheet\" href=\"http://localhost/jamalaiki/assets/css/jquery.datetimepicker.css\">\r\n    <link rel=\"stylesheet\" href=\"http://localhost/jamalaiki/assets/css/zebra_dialog.min.css\">\r\n    <script type=\"text/javascript\">\r\n        var myIP = \'::1\';\r\n        var baseURL = http://localhost/jamalaiki/;\r\n    </script>\r\n    <script type=\"text/javascript\">\r\n        var Geo = {};\r\n        function extractGeoData(data) {\r\n            Geo.lat = data.latitude;\r\n            Geo.lon = data.longitude;\r\n            Geo.city = data.city;\r\n        }\r\n    </script>\r\n</head>    <body>\r\n        <div style=\"width: 75%;margin: 0 auto;border: 1px solid #eee;margin-top: 50px\">\r\n        	<div class=\"header\" style=\"padding: 15px;background-color: #333;color:#FFF;text-align: center;font-size: 36px;font-weight: 600;\">JAMALIKI SYSTEM</div>\r\n        	<div class=\"body\" style=\"padding: 15px;\">\r\n        		<h4 class=\"line_1\">DEAR muhammad</h4>\r\n        		<h4 class=\"line_2\">Thanks for getting started with our JAMALIKI SYSTEM</h4>\r\n        		<h4>You registered an account on JAMALIKI SYSTEM, before being able to use your account you need to verify that this is your email address by clicking \r\n	        		<a style=\"color: blue\" target=\"_blank\" href=\"http://localhost/jamalaiki/login/verify/amFoYW5naXJraGF0dGFrMTNAZ21haWwuY29t\">\r\n	        			 here.	        		</a>\r\n	        		 or paste the following URL in the browser.        		</h4>\r\n        		<h4>http://localhost/jamalaiki/login/verify/amFoYW5naXJraGF0dGFrMTNAZ21haWwuY29t</h4>\r\n        		<h4 style=\"margin-top: 30px\">Kind Regards, </h4>\r\n        		<h4>JAMALIKI SYSTEM</h4>\r\n        	</div>\r\n        	<div class=\"footer\" style=\"padding: 15px;background-color: #333;color:#FFF\">\r\n        		<span style=\"display: inline-block;float: left\">ALL RIGHTS RESERVED WITH US. © 2022</span>\r\n        		<span style=\"display: inline-block;float: right\">23-02-2022 06:00:08 PM</span>\r\n        		<div style=\"clear: both;\"></div>\r\n        	</div>\r\n        </div>\r\n    </body>\r\n</html>', 'Not Sent', 1645624808),
(5, 'PLEASE VERFIFY YOUR EMAIL FOR JAMALIKI SYSTEM', 'SALON REGISTERATION', 'customerxyz@gmai.com', 'info@jamaliki.com', '<!doctype html>\r\n<html class=\"no-js\" lang=\"en\">\r\n    <head>\r\n    <meta charset=\"utf-8\" />\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no\" />\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge, chrome=1\" />\r\n    <meta name=\"description\" content=\"Jamaliki your beauty destination\" />\r\n    <meta name=\"keywords\" content=\"jamaliki, jamaliki dubai, salon booking dubai\" />\r\n    <title>JAMALAIKI</title>\r\n    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\r\n    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css\">\r\n    <link rel=\"stylesheet\" href=\"https://unpkg.com/swiper/swiper-bundle.min.css\"/>\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//cdnjs.cloudflare.com/ajax/libs/animate.css/3.3.1/animate.min.css\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"//fonts.googleapis.com/css?family=Lato:400,300,700\" />\r\n    <link rel=\"stylesheet\" type=\"text/css\" href=\"http://localhost/jamalaiki/assets/css/jamaliki.css\" />\r\n    <link rel=\"stylesheet\" href=\"http://localhost/jamalaiki/assets/admin/plugins/daterangepicker/daterangepicker.css\">\r\n    <link rel=\"stylesheet\" href=\"http://localhost/jamalaiki/assets/admin/bootstrap-datepicker.css\">\r\n    <link rel=\"stylesheet\" href=\"http://localhost/jamalaiki/assets/css/jquery.datetimepicker.css\">\r\n    <link rel=\"stylesheet\" href=\"http://localhost/jamalaiki/assets/css/zebra_dialog.min.css\">\r\n    <script type=\"text/javascript\">\r\n        var myIP = \'::1\';\r\n        var baseURL = http://localhost/jamalaiki/;\r\n    </script>\r\n    <script type=\"text/javascript\">\r\n        var Geo = {};\r\n        function extractGeoData(data) {\r\n            Geo.lat = data.latitude;\r\n            Geo.lon = data.longitude;\r\n            Geo.city = data.city;\r\n        }\r\n    </script>\r\n</head>    <body>\r\n        <div style=\"width: 75%;margin: 0 auto;border: 1px solid #eee;margin-top: 50px\">\r\n        	<div class=\"header\" style=\"padding: 15px;background-color: #333;color:#FFF;text-align: center;font-size: 36px;font-weight: 600;\">JAMALIKI SYSTEM</div>\r\n        	<div class=\"body\" style=\"padding: 15px;\">\r\n        		<h4 class=\"line_1\">DEAR Customer</h4>\r\n        		<h4 class=\"line_2\">Thanks for getting started with our JAMALIKI SYSTEM</h4>\r\n        		<h4>You registered an account on JAMALIKI SYSTEM, before being able to use your account you need to verify that this is your email address by clicking \r\n	        		<a style=\"color: blue\" target=\"_blank\" href=\"http://localhost/jamalaiki/login/verify/Y3VzdG9tZXJ4eXpAZ21haS5jb20=\">\r\n	        			 here.	        		</a>\r\n	        		 or paste the following URL in the browser.        		</h4>\r\n        		<h4>http://localhost/jamalaiki/login/verify/Y3VzdG9tZXJ4eXpAZ21haS5jb20=</h4>\r\n        		<h4 style=\"margin-top: 30px\">Kind Regards, </h4>\r\n        		<h4>JAMALIKI SYSTEM</h4>\r\n        	</div>\r\n        	<div class=\"footer\" style=\"padding: 15px;background-color: #333;color:#FFF\">\r\n        		<span style=\"display: inline-block;float: left\">ALL RIGHTS RESERVED WITH US. © 2022</span>\r\n        		<span style=\"display: inline-block;float: right\">27-02-2022 04:45:44 PM</span>\r\n        		<div style=\"clear: both;\"></div>\r\n        	</div>\r\n        </div>\r\n    </body>\r\n</html>', 'Not Sent', 1645965944);

-- --------------------------------------------------------

--
-- Table structure for table `email_template_tbl`
--

DROP TABLE IF EXISTS `email_template_tbl`;
CREATE TABLE IF NOT EXISTS `email_template_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_en` varchar(250) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `subject_en` varchar(250) DEFAULT NULL,
  `subject_ar` varchar(250) DEFAULT NULL,
  `body_en` varchar(1000) DEFAULT NULL,
  `body_ar` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_html` enum('1','0') DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faqs_tbl`
--

DROP TABLE IF EXISTS `faqs_tbl`;
CREATE TABLE IF NOT EXISTS `faqs_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_en` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `question_ar` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `answer_en` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `answer_ar` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` enum('1','0') DEFAULT '1',
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs_tbl`
--

INSERT INTO `faqs_tbl` (`id`, `question_en`, `question_ar`, `answer_en`, `answer_ar`, `user_id`, `is_active`, `is_delete`, `inserted_at`, `updated_at`) VALUES
(1, 'Question 1', 'Question 1', 'answer 1 ', 'asnwer 1', 1, '1', '0', 1647856563, 1648025436),
(2, 'Question 2', 'Question 2', 'answer 3', 'asnwer 2', 1, '1', '0', 1647856372, 1647860903),
(3, 'Question 3', 'Question 3', 'answer 3', 'asnwer 3', 1, '1', '0', 1647856594, 1647860924),
(4, 'Question 4', 'Question 4', 'answer  4', 'asnwer 4', 1, '1', '0', 1647856629, 1647860950),
(5, 'Question 5', 'Question 5', 'answer  5', 'asnwer  5', 1, '1', '0', NULL, 1647861154),
(6, 'Question  6', 'Question  6', 'answer  6', 'asnwer  6', 1, '1', '0', NULL, 1647861172);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_tbl`
--

DROP TABLE IF EXISTS `gallery_tbl`;
CREATE TABLE IF NOT EXISTS `gallery_tbl` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_desc_en` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_desc_ar` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('Draft','Publish') COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `is_delete` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_6sw8k5ohu2olrfyqiupm33yrv` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery_tbl`
--

INSERT INTO `gallery_tbl` (`id`, `category_id`, `image`, `short_desc_en`, `short_desc_ar`, `user_id`, `status`, `is_active`, `is_delete`, `inserted_at`, `updated_at`) VALUES
(1, 4, 'img_22_Mar_22_01_20_19_pm.jpg', 'picture 1', 'picture 1', 1, NULL, '1', '1', 1647959479, 1648024057),
(2, 1, 'img_22_Mar_22_01_47_44_pm.jpg', NULL, NULL, 1, NULL, '1', '0', 1647942464, NULL),
(3, 2, 'img_22_Mar_22_01_48_34_pm.jpg', NULL, NULL, 1, NULL, '1', '0', 1647942514, NULL),
(4, 3, 'img_22_Mar_22_01_48_41_pm.jpg', NULL, NULL, 1, NULL, '1', '0', 1647942521, NULL),
(5, 4, 'img_22_Mar_22_01_48_48_pm.jpg', NULL, NULL, 1, NULL, '1', '0', 1647942528, NULL),
(6, 5, 'img_22_Mar_22_01_49_00_pm.jpg', NULL, NULL, 1, NULL, '1', '0', 1647942540, NULL),
(7, 6, 'img_22_Mar_22_01_49_06_pm.jpg', NULL, NULL, 1, NULL, '1', '0', 1647942546, NULL),
(8, 1, 'img_22_Mar_22_01_49_11_pm.jpg', NULL, NULL, 1, NULL, '1', '0', 1647942551, NULL),
(9, 1, 'img_22_Mar_22_01_49_19_pm.jpg', NULL, NULL, 1, NULL, '1', '0', 1647942559, NULL),
(10, 5, 'img_22_Mar_22_01_49_27_pm.jpg', NULL, NULL, 1, NULL, '1', '0', 1647942567, NULL),
(11, 6, 'img_22_Mar_22_01_49_38_pm.jpg', NULL, NULL, 1, NULL, '1', '0', 1647942578, NULL),
(12, 1, 'img_22_Mar_22_02_04_51_pm.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 1, NULL, '1', '0', 1647943491, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `holiday_tbl`
--

DROP TABLE IF EXISTS `holiday_tbl`;
CREATE TABLE IF NOT EXISTS `holiday_tbl` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title_en` varchar(250) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `start_date` int(11) DEFAULT NULL,
  `end_date` int(11) DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_oy1rrcluem0l39m8olx79kush` (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holiday_tbl`
--

INSERT INTO `holiday_tbl` (`id`, `title_en`, `title_ar`, `url`, `start_date`, `end_date`, `country_id`, `user_id`, `is_active`, `is_delete`, `inserted_at`, `updated_at`) VALUES
(1, 'First Night', 'First Night', 'https://perfex-light-theme.idevalex.com/admin/', 1640822400, 1641600000, 3, 1, '1', '0', 1640713034, 1642441705),
(2, 'First Night', 'First Night', '', 1641859200, 1642636800, 1, 1, '1', '0', 1640713094, 1640724749),
(3, 'Testing', 'Testing', 'https://www.facebook.com/OwnerSahibzadaMHamza/videos/818418498873976/', 1641340800, 1641427200, 1, 1, '1', '0', 1640713646, NULL),
(4, 'Pakistan', 'State of Abu Dhabi Arabic', 'https://www.asc.ae/ajc2020/Dashboard/ajc_counts/', 1640649600, 1640649600, 3, 1, '1', '0', 1640713677, NULL),
(5, 'First Night', 'New Area in Sharjah City', 'https://sms.kig.ae/forms/form_view/Mw==/English', 1640649600, 1640649600, 3, 1, '1', '0', 1640713714, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages_categories_tbl`
--

DROP TABLE IF EXISTS `pages_categories_tbl`;
CREATE TABLE IF NOT EXISTS `pages_categories_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_en` varchar(250) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `parmalink` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` enum('1','0') DEFAULT '1',
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages_categories_tbl`
--

INSERT INTO `pages_categories_tbl` (`id`, `title_en`, `title_ar`, `parmalink`, `user_id`, `is_active`, `is_delete`, `inserted_at`, `updated_at`) VALUES
(1, 'Top Navbar', 'Top Navbar', 'top-navbar', 1, '1', '0', NULL, NULL),
(2, 'Others', 'Others', 'others', 1, '1', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages_tbl`
--

DROP TABLE IF EXISTS `pages_tbl`;
CREATE TABLE IF NOT EXISTS `pages_tbl` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_desc_en` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_desc_ar` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `long_desc_ar` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `long_desc_en` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `views` bigint(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('Draft','Publish') COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_time` int(11) DEFAULT NULL,
  `is_active` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `is_delete` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_6sw8k5ohu2olrfyqiupm33yrv` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages_tbl`
--

INSERT INTO `pages_tbl` (`id`, `category_id`, `title_en`, `title_ar`, `link`, `short_desc_en`, `short_desc_ar`, `long_desc_ar`, `long_desc_en`, `image`, `views`, `user_id`, `status`, `publish_time`, `is_active`, `is_delete`, `inserted_at`, `updated_at`) VALUES
(1, 1, 'About Us', 'About Us', 'about-us', 'CADIMA YOU SEE is a professional licensed manpower recruitment\r\ncompany in Romania & UAE. Our company is fully furnished with\r\nhighly qualified (Technically and methodically) staff to provide quality\r\npersonnel to all fields of expertise in the European countries. Providing\r\ncomplete recruitment solutions, sourcing, and supplying quality staff\r\nthroughout Europe.\r\nWe provide highly qualified professionals and skilled labours to\r\nsupport the best top, middle and lower-level workforce on a long-term\r\nbasis. We are the licensed agency to provide manpower to reduce the\r\nworries of our valued clients about compensation, travel/medical\r\ninsurance, and labour law of the employees. \r\nWe provide an exclusive and qualified workforce for industries\r\nlike Construction, MEP services, Retail, Hotels, Manufacturing,\r\nHospitality, Security, Engineering, Warehouse Restaurants & Catering,\r\nand Logistics etc. We always supply quality labour at a budget-friendly\r\nprice.', 'CADIMA YOU SEE is a professional licensed manpower recruitment\r\ncompany in Romania & UAE. Our company is fully furnished with\r\nhighly qualified (Technically and methodically) staff to provide quality\r\npersonnel to all fields of expertise in the European countries. Providing\r\ncomplete recruitment solutions, sourcing, and supplying quality staff\r\nthroughout Europe.\r\nWe provide highly qualified professionals and skilled labours to\r\nsupport the best top, middle and lower-level workforce on a long-term\r\nbasis. We are the licensed agency to provide manpower to reduce the\r\nworries of our valued clients about compensation, travel/medical\r\ninsurance, and labour law of the employees. \r\nWe provide an exclusive and qualified workforce for industries\r\nlike Construction, MEP services, Retail, Hotels, Manufacturing,\r\nHospitality, Security, Engineering, Warehouse Restaurants & Catering,\r\nand Logistics etc. We always supply quality labour at a budget-friendly\r\nprice.', '', '', NULL, NULL, 1, 'Publish', NULL, '1', '0', 1647586690, 1648033889),
(2, 1, 'CEO MESSAGE', 'CEO MESSAGE', 'ceo-message', '<div style=\"text-align: justify;\">The CADIMA YOU SEE has been serving the diverse human resources needs of our clients for more than 10 years and we have earned a reputation for integrity, passion, professionalism, and the delivery of superior results. We genuinely believe that the trust and integrity of your manpower Search partners are of paramount importance to you and your company in establishing sustainable development. We take the full trust that you place in us very seriously. Our company has made its mark in the manpower supply industry by offering to the individual needs of all those we serve, and the majority of our requirements are from “repeat customers” and there is nothing more important to us than exceeding your expectations. The trust of the\' repeat customers\' (National &amp; International) is the bedrock of our company\'s success. “The customer satisfaction and exceptional quality of services are always our paramount priority”. I encourage you to meet us to discuss our commitment to connect you with those that will drive your business, embrace your vision and grow your bottom line.<br></div>', '<div style=\"text-align: justify;\">The CADIMA YOU SEE has been serving the diverse human resources needs of our clients for more than 10 years and we have earned a reputation for integrity, passion, professionalism, and the delivery of superior results. We genuinely believe that the trust and integrity of your manpower Search partners are of paramount importance to you and your company in establishing sustainable development. We take the full trust that you place in us very seriously. Our company has made its mark in the manpower supply industry by offering to the individual needs of all those we serve, and the majority of our requirements are from “repeat customers” and there is nothing more important to us than exceeding your expectations. The trust of the\' repeat customers\' (National &amp; International) is the bedrock of our company\'s success. “The customer satisfaction and exceptional quality of services are always our paramount priority”. I encourage you to meet us to discuss our commitment to connect you with those that will drive your business, embrace your vision and grow your bottom line.<br></div>', '', '', 'img_18_Mar_22_06_02_21_pm.jpg', NULL, 1, 'Publish', NULL, '1', '0', 1647586758, 1648037209),
(3, 1, 'Our Mission & Vision', 'Our Mission & Vision', 'vision-mession', '<h4><b>MISSION:\r\n</b></h4><p style=\"text-align: justify; \">Our Mission is to provide an exceptional quality of services and\r\ncomplete manpower solutions for all our clients across the European\r\ncountries and to leave a positive impact in people’s lives through the\r\nfacilitation of accurate pairings between employment opportunities\r\nand their talents.\r\n</p><h4><b>VISION: </b></h4><p style=\"text-align: justify; \">\r\nOur Vision is to be a leading manpower recruitment and consultant\r\nagency in European countries, by establishing long-lasting\r\nrelationships with our clients through our quality services that will help\r\nour clients achieve better work-life success.\r\nWe are dedicated to upholding the value of our clients and its\r\nsatisfaction. We strive to maintain our reputation as a:\r\n</p><ul><li style=\"text-align: justify;\">Professional business with principles and integrity</li><li style=\"text-align: justify;\">Friendly organization that supports our clients</li><li style=\"text-align: justify;\">Willing and trusted partner</li><li style=\"text-align: justify;\">Generous organization, giving of time and resources</li></ul>', '<h4 style=\"font-family: \"Source Sans Pro\", -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"; color: rgb(33, 37, 41);\"><span style=\"font-weight: bolder;\">MISSION:</span></h4><h4 source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" color:=\"\" rgb(33,=\"\" 37,=\"\" 41);\"=\"\"><p style=\"font-size: 14px; text-align: justify;\">Our Mission is to provide an exceptional quality of services and complete manpower solutions for all our clients across the European countries and to leave a positive impact in people’s lives through the facilitation of accurate pairings between employment opportunities and their talents.</p></h4><h4 style=\"font-family: \"Source Sans Pro\", -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\"; color: rgb(33, 37, 41);\"><span style=\"font-weight: bolder;\">VISION:</span></h4><h4 source=\"\" sans=\"\" pro\",=\"\" -apple-system,=\"\" blinkmacsystemfont,=\"\" \"segoe=\"\" ui\",=\"\" roboto,=\"\" \"helvetica=\"\" neue\",=\"\" arial,=\"\" sans-serif,=\"\" \"apple=\"\" color=\"\" emoji\",=\"\" ui=\"\" symbol\";=\"\" color:=\"\" rgb(33,=\"\" 37,=\"\" 41);\"=\"\"><p style=\"font-size: 14px; text-align: justify;\">Our Vision is to be a leading manpower recruitment and consultant agency in European countries, by establishing long-lasting relationships with our clients through our quality services that will help our clients achieve better work-life success. We are dedicated to upholding the value of our clients and its satisfaction. We strive to maintain our reputation as a:</p><ul style=\"font-size: 14px;\"><li style=\"text-align: justify;\">Professional business with principles and integrity</li><li style=\"text-align: justify;\">Friendly organization that supports our clients</li><li style=\"text-align: justify;\">Willing and trusted partner</li><li style=\"text-align: justify;\">Generous organization, giving of time and resources</li></ul></h4>', '.', '.', NULL, NULL, 1, 'Publish', NULL, '1', '0', 1647603742, 1648037358);

-- --------------------------------------------------------

--
-- Table structure for table `permissions_assigned_tbl`
--

DROP TABLE IF EXISTS `permissions_assigned_tbl`;
CREATE TABLE IF NOT EXISTS `permissions_assigned_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_user_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `permission_name` varchar(100) DEFAULT NULL,
  `inserted_at` int(11) DEFAULT NULL,
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions_assigned_tbl`
--

INSERT INTO `permissions_assigned_tbl` (`id`, `user_id`, `login_user_id`, `permission_id`, `permission_name`, `inserted_at`, `is_delete`, `updated_at`) VALUES
(1, 1, 1, 1, 'Setting', 1647606818, '0', NULL),
(2, 1, 1, 2, 'System Stop / Start', 1647606819, '0', NULL),
(3, 1, 1, 3, 'General Setting', 1647606820, '0', NULL),
(4, 1, 1, 4, 'User Management', 1647606821, '0', NULL),
(5, 1, 1, 5, 'User Role Management', 1647606822, '0', NULL),
(6, 1, 1, 6, 'Add User Role', 1647606824, '0', NULL),
(7, 1, 1, 7, 'Dashboard', 1647606824, '0', NULL),
(8, 1, 1, 8, 'My Dashboard', 1647606825, '0', NULL),
(9, 1, 1, 9, 'Pages', 1647606826, '0', NULL),
(10, 1, 1, 10, 'ADD PAGE', 1647606827, '0', NULL),
(11, 1, 1, 11, 'EDIT PAGE', 1647606828, '0', NULL),
(12, 1, 1, 12, 'Delete Page', 1647606829, '0', NULL),
(13, 1, 1, 13, 'Services', 1647606830, '0', NULL),
(14, 1, 1, 14, 'Add  Service', 1647606831, '0', NULL),
(15, 1, 1, 15, 'Edit Service', 1647606832, '0', NULL),
(16, 1, 1, 16, 'Delete Service', 1647606833, '0', NULL),
(17, 1, 1, 17, 'Subscriptions Management', 1647606835, '0', NULL),
(18, 1, 1, 24, 'Subscriptions', 1647670293, '0', NULL),
(19, 1, 1, 28, 'Add News', 1647670294, '0', NULL),
(20, 1, 1, 54, 'HOLIDAY', 1647670295, '0', NULL),
(21, 1, 1, 73, 'DELETE ADS', 1647670297, '0', NULL),
(22, 1, 1, 90, 'Delete Testimonial', 1647670298, '0', NULL),
(23, 1, 1, 25, 'Blogs Management', 1647670299, '0', NULL),
(24, 1, 1, 30, 'Block IPs', 1647670300, '0', NULL),
(25, 1, 1, 70, 'ADS', 1647670301, '0', NULL),
(26, 1, 1, 81, 'Testimonials', 1647670302, '0', NULL),
(27, 1, 1, 26, 'Add Blog', 1647670304, '0', NULL),
(28, 1, 1, 31, 'Technical Support', 1647670305, '0', NULL),
(29, 1, 1, 71, 'ADD ADS', 1647670306, '0', NULL),
(30, 1, 1, 82, 'Add Testimonial', 1647670307, '0', NULL),
(31, 1, 1, 89, 'Edit Testimonial', 1647670308, '0', NULL),
(32, 1, 1, 72, 'EDIT ADS', 1647670309, '0', NULL),
(33, 1, 1, 32, 'Chat', 1647670310, '0', NULL),
(34, 1, 1, 27, 'News Management', 1647670311, '0', NULL),
(35, 1, 1, 91, 'Why Us', 1647675216, '0', NULL),
(36, 1, 1, 92, 'Add Why Us', 1647675217, '0', NULL),
(37, 1, 1, 93, 'Edit Why Us', 1647675218, '0', NULL),
(38, 1, 1, 94, 'Delete Why Us', 1647675219, '0', NULL),
(39, 1, 1, 95, 'Portfolio', 1647682122, '0', NULL),
(40, 1, 1, 96, 'Add Portfolio', 1647682123, '0', NULL),
(41, 1, 1, 97, 'Edit Portfolio', 1647682124, '0', NULL),
(42, 1, 1, 98, 'Delete Portfolio', 1647682125, '0', NULL),
(43, 1, 1, 99, 'Team', 1647854140, '0', NULL),
(44, 1, 1, 100, 'Add Team', 1647854142, '0', NULL),
(45, 1, 1, 101, 'Edit Team', 1647854143, '0', NULL),
(46, 1, 1, 102, 'Delete Team', 1647854145, '0', NULL),
(47, 1, 1, 103, 'FAQS', 1647859831, '0', NULL),
(48, 1, 1, 104, 'Add QUESTION', 1647859832, '0', NULL),
(49, 1, 1, 105, 'Edit QUESTION', 1647859833, '0', NULL),
(50, 1, 1, 106, 'Delete QUESTION', 1647859834, '0', NULL),
(51, 1, 1, 107, 'Gallery', 1647874125, '0', NULL),
(52, 1, 1, 108, 'Upload Photo/Video', 1647874126, '0', NULL),
(53, 1, 1, 109, 'Delete Photo/Video', 1647874127, '0', NULL),
(54, 1, 1, 111, 'Add New Slide', 1648026644, '0', NULL),
(55, 1, 1, 110, 'Main Slider', 1648026645, '0', NULL),
(56, 1, 1, 112, 'Edit New Slide', 1648026646, '0', NULL),
(57, 1, 1, 113, 'Delete New Slide', 1648026646, '0', NULL),
(58, 1, 1, 114, 'Edit About Us', 1648028655, '0', NULL),
(59, 1, 1, 115, 'CEO Message', 1648028897, '0', NULL),
(60, 1, 1, 116, 'Mission Vision', 1648028898, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions_tbl`
--

DROP TABLE IF EXISTS `permissions_tbl`;
CREATE TABLE IF NOT EXISTS `permissions_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_en` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `is_active` enum('1','0') DEFAULT '1',
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions_tbl`
--

INSERT INTO `permissions_tbl` (`id`, `title_en`, `title_ar`, `inserted_at`, `updated_at`, `is_active`, `is_delete`) VALUES
(1, 'Setting', 'Setting', 1589593226, 1589593226, '1', '0'),
(2, 'System Stop / Start', 'System Stop / Start', 1589593226, 1589593226, '1', '0'),
(3, 'General Setting', 'General Setting', 1589593226, 1589593226, '1', '0'),
(4, 'User Management', 'User Management', 1589593226, 1589593226, '1', '0'),
(5, 'User Role Management', 'User Role Management', 1589593226, 1589593226, '1', '0'),
(6, 'Add User Role', 'Add User Role', 1589593226, 1589593226, '1', '0'),
(7, 'Dashboard', 'Dashboard', 1589593226, 1589593226, '1', '0'),
(8, 'My Dashboard', 'My Dashboard', 1589593226, 1589593226, '1', '0'),
(9, 'Pages', 'Pages', 1589593226, 1589593226, '1', '0'),
(10, 'ADD PAGE', 'ADD PAGE', 1589593226, 1589593226, '1', '0'),
(11, 'EDIT PAGE', 'EDIT PAGE', 1589593226, 1589593226, '1', '0'),
(12, 'Delete Page', 'Delete Page', 1589593226, 1589593226, '1', '0'),
(13, 'Services', 'Services', 1589593226, 1589593226, '1', '0'),
(14, 'Add  Service', 'Add Service', 1589593226, 1589593226, '1', '0'),
(15, 'Edit Service', 'Edit Service', 1589593226, 1589593226, '1', '0'),
(16, 'Delete Service', 'Delete Service', 1589593226, 1589593226, '1', '0'),
(24, 'Subscriptions', 'Subscriptions', 1589593226, 1589593226, '1', '0'),
(25, 'Blogs Management', 'Blogs Management', 1589593226, 1589593226, '1', '0'),
(26, 'Add Blog', 'Add Blog', 1589593226, 1589593226, '1', '0'),
(27, 'News Management', 'News Management', 1589593226, 1589593226, '1', '0'),
(28, 'Add News', 'Add News', 1589593226, 1589593226, '1', '0'),
(30, 'Block IPs', 'Block IPs', 1589593226, 1589593226, '1', '0'),
(31, 'Technical Support', 'Technical Support', 1589593226, 1589593226, '1', '0'),
(32, 'Chat', 'Chat', 1589593226, 1589593226, '1', '0'),
(116, 'Mission Vision', 'Mission Vision', 1589593226, 1589593226, '1', '0'),
(115, 'CEO Message', 'CEO Message', 1589593226, 1589593226, '1', '0'),
(114, 'Edit About Us', 'Edit About Us', 1589593226, 1589593226, '1', '0'),
(113, 'Delete New Slide', 'Delete New Slide', 1589593226, 1589593226, '1', '0'),
(112, 'Edit New Slide', 'Edit New Slide', 1589593226, 1589593226, '1', '0'),
(111, 'Add New Slide', 'Add New Slide', 1589593226, 1589593226, '1', '0'),
(54, 'HOLIDAY', 'HOLIDAY', 1589593226, 1589593226, '1', '0'),
(110, 'Main Slider', 'Main Slider', 1589593226, 1589593226, '1', '0'),
(109, 'Delete Photo/Video', 'Delete  Photo/Video', 1589593226, 1589593226, '1', '0'),
(108, 'Upload Photo/Video', 'Upload Photo/Video', 1589593226, 1589593226, '1', '0'),
(107, 'Gallery', 'Gallery', 1589593226, 1589593226, '1', '0'),
(106, 'Delete QUESTION', 'Delete QUESTION', 1589593226, 1589593226, '1', '0'),
(105, 'Edit QUESTION', 'Edit QUESTION', 1589593226, 1589593226, '1', '0'),
(104, 'Add QUESTION', 'Add QUESTION', 1589593226, 1589593226, '1', '0'),
(103, 'FAQS', 'FAQS', 1589593226, 1589593226, '1', '0'),
(102, 'Delete Team', 'Delete Team', 1589593226, 1589593226, '1', '0'),
(101, 'Edit Team', 'Edit Team', 1589593226, 1589593226, '1', '0'),
(100, 'Add Team', 'Add Team', 1589593226, 1589593226, '1', '0'),
(99, 'Team', 'Team', 1589593226, 1589593226, '1', '0'),
(70, 'ADS', 'ADS', 1589593226, 1589593226, '1', '0'),
(71, 'ADD ADS', 'ADD ADS', 1589593226, 1589593226, '1', '0'),
(72, 'EDIT ADS', 'EDIT ADS', 1589593226, 1589593226, '1', '0'),
(73, 'DELETE ADS', 'DELETE ADS', 1589593226, 1589593226, '1', '0'),
(98, 'Delete Portfolio', 'Delete Portfolio', 1589593226, 1589593226, '1', '0'),
(97, 'Edit Portfolio', 'Edit Portfolio', 1589593226, 1589593226, '1', '0'),
(96, 'Add Portfolio', 'Add Portfolio', 1589593226, 1589593226, '1', '0'),
(95, 'Portfolio', 'Portfolio', 1589593226, 1589593226, '1', '0'),
(94, 'Delete Why Us', 'Delete  Why Us', 1589593226, 1589593226, '1', '0'),
(93, 'Edit Why Us', 'Edit Why Us', 1589593226, 1589593226, '1', '0'),
(81, 'Testimonials', 'Testimonials', 1589593226, 1589593226, '1', '0'),
(82, 'Add Testimonial', 'Add Testimonial', 1589593226, 1589593226, '1', '0'),
(89, 'Edit Testimonial', 'Edit Testimonial', 1589593226, 1589593226, '1', '0'),
(90, 'Delete Testimonial', 'Delete  Testimonial', 1589593226, 1589593226, '1', '0'),
(91, 'Why Us', 'Why Us', 1589593226, 1589593226, '1', '0'),
(92, 'Add Why Us', 'Add Why Us', 1589593226, 1589593226, '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `permissions_user_role_tbl`
--

DROP TABLE IF EXISTS `permissions_user_role_tbl`;
CREATE TABLE IF NOT EXISTS `permissions_user_role_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_role_id` int(11) NOT NULL,
  `user_role_name` varchar(100) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `permission_name` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_delete` enum('1','0') DEFAULT '0',
  `updated_at` int(11) DEFAULT NULL,
  `inserted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=360 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions_user_role_tbl`
--

INSERT INTO `permissions_user_role_tbl` (`id`, `user_role_id`, `user_role_name`, `permission_id`, `permission_name`, `user_id`, `is_delete`, `updated_at`, `inserted_at`) VALUES
(97, 9, 'Client En', 31, 'Technical Support', NULL, '0', NULL, 1620233127),
(98, 9, 'Client En', 35, 'Order Daily Report', NULL, '0', NULL, 1620233128),
(76, 4, 'Customer', 8, 'My Dashboard', NULL, '0', NULL, 1605094773),
(72, 4, 'Customer', 35, 'Order Daily Report', NULL, '0', NULL, 1605094762),
(43, 2, 'Company', 12, 'Add Product', 1, '1', 1643110589, 1597279857),
(42, 2, 'Company', 32, 'Chat', 1, '1', 1643110302, 1597279853),
(40, 2, 'Company', 14, 'Order Management', 1, '1', 1643110542, 1597279811),
(96, 9, 'Client En', 33, 'Reports', NULL, '0', NULL, 1620233119),
(70, 4, 'Customer', 33, 'Reports', NULL, '0', NULL, 1605094751),
(75, 4, 'Customer', 12, 'Add Product', NULL, '0', NULL, 1605094771),
(214, 1, 'ADMIN', 29, 'Marketing Plan', 1, '0', NULL, 1642278657),
(58, 2, 'Company', 28, 'Add News', 1, '1', 1643110306, 1603060590),
(59, 2, 'Company', 36, 'Order Monthly Report', 1, '1', 1643110372, 1603060596),
(60, 2, 'Company', 35, 'Order Daily Report', 1, '1', 1643110299, 1603060597),
(61, 2, 'Company', 31, 'Technical Support', 1, '1', 1643110303, 1603060599),
(63, 2, 'Company', 33, 'Reports', 1, '1', 1643110297, 1603060610),
(74, 4, 'Customer', 32, 'Chat', NULL, '0', NULL, 1605094765),
(66, 6, 'Friend', 32, 'Chat', NULL, '0', NULL, 1604668238),
(67, 6, 'Friend', 31, 'Technical Support', NULL, '0', NULL, 1604668245),
(68, 6, 'Friend', 33, 'Reports', NULL, '0', NULL, 1604668256),
(73, 4, 'Customer', 36, 'Order Monthly Report', NULL, '0', NULL, 1605094763),
(77, 4, 'Customer', 11, 'Product Management', NULL, '0', NULL, 1605094781),
(83, 6, 'Friend', 8, 'My Dashboard', NULL, '0', NULL, 1605095012),
(85, 2, 'Company', 11, 'Product Management', NULL, '0', NULL, 1605173557),
(86, 6, 'Friend', 35, 'Order Daily Report', NULL, '0', NULL, 1606725921),
(87, 6, 'Friend', 36, 'Order Monthly Report', NULL, '0', NULL, 1606725923),
(95, 9, 'Client En', 13, 'Shipping', NULL, '0', NULL, 1620233107),
(99, 9, 'Client En', 32, 'Chat', NULL, '0', NULL, 1620233129),
(100, 9, 'Client En', 36, 'Order Monthly Report', NULL, '0', NULL, 1620233130),
(138, 0, '\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was en', 1, 'Setting', NULL, '0', NULL, 1642186383),
(102, 12, 'rrr', 5, 'User Role Management', NULL, '0', NULL, 1627646669),
(103, 12, 'rrr', 9, 'Category Management', NULL, '0', NULL, 1627646671),
(104, 12, 'rrr', 13, 'Shipping', NULL, '0', NULL, 1627646672),
(105, 12, 'rrr', 17, 'Agent Management', NULL, '0', NULL, 1627646673),
(106, 12, 'rrr', 21, 'Add Member', NULL, '0', NULL, 1627646673),
(107, 12, 'rrr', 25, 'Client Management', NULL, '0', NULL, 1627646674),
(108, 12, 'rrr', 33, 'Reports', NULL, '0', NULL, 1627646675),
(109, 12, 'rrr', 29, 'Marketing Plan', NULL, '0', NULL, 1627646676),
(110, 12, 'rrr', 34, 'Report Orders', NULL, '0', NULL, 1627646678),
(111, 12, 'rrr', 26, 'Add Client', NULL, '0', NULL, 1627646679),
(112, 12, 'rrr', 30, 'Block IPs', NULL, '0', NULL, 1627646680),
(113, 12, 'rrr', 22, 'Goods & Services', NULL, '0', NULL, 1627646681),
(114, 12, 'rrr', 14, 'Order Management', NULL, '0', NULL, 1627646682),
(115, 12, 'rrr', 18, 'Add Agent', NULL, '0', NULL, 1627646683),
(116, 12, 'rrr', 6, 'Add User Role', NULL, '0', NULL, 1627646684),
(117, 12, 'rrr', 10, 'Add Category', NULL, '0', NULL, 1627646685),
(122, 12, 'rrr', 2, 'System Stop / Start', NULL, '0', NULL, 1627646724),
(119, 12, 'rrr', 3, 'General Setting', NULL, '0', NULL, 1627646688),
(120, 12, 'rrr', 7, 'Dashboard', NULL, '0', NULL, 1627646688),
(121, 12, 'rrr', 35, 'Order Daily Report', NULL, '0', NULL, 1627646710),
(136, 0, '\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was en', 1, 'Setting', NULL, '0', NULL, 1642185832),
(137, 0, '\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was en', 1, 'Setting', NULL, '0', NULL, 1642186265),
(213, 1, 'ADMIN', 28, 'Add News', 1, '0', NULL, 1642278656),
(210, 1, 'ADMIN', 25, 'Blogs Management', 1, '0', NULL, 1642278652),
(211, 1, 'ADMIN', 26, 'Add Blog', 1, '0', NULL, 1642278654),
(212, 1, 'ADMIN', 27, 'News Management', 1, '0', NULL, 1642278655),
(209, 1, 'ADMIN', 24, 'Subscriptions', 1, '0', NULL, 1642278651),
(208, 1, 'ADMIN', 23, 'Jamaliki Points', 1, '0', NULL, 1642278650),
(207, 1, 'ADMIN', 22, 'Goods & Services', 1, '0', NULL, 1642278648),
(206, 1, 'ADMIN', 21, 'Assign Service to Staff', 1, '1', 1643291335, 1642278647),
(205, 1, 'ADMIN', 20, 'Delete Staff', 1, '1', 1643291331, 1642278634),
(204, 1, 'ADMIN', 19, 'Staff Management', 1, '1', 1643291052, 1642278633),
(203, 1, 'ADMIN', 18, 'Add Staff', 1, '1', 1643291333, 1642278632),
(202, 1, 'ADMIN', 17, 'Subscriptions Management', 1, '0', NULL, 1642278631),
(201, 1, 'ADMIN', 16, 'Add Delete Goods', 1, '0', NULL, 1642278629),
(200, 1, 'ADMIN', 15, 'Add Goods', 1, '0', NULL, 1642278626),
(199, 1, 'ADMIN', 14, 'Goods Management', 1, '0', NULL, 1642278625),
(198, 1, 'ADMIN', 13, 'Send Email Customer ', 1, '0', NULL, 1642278624),
(197, 1, 'ADMIN', 12, 'Add Service', 1, '0', NULL, 1642278622),
(196, 1, 'ADMIN', 11, 'Booking Management', 1, '1', 1643291115, 1642278616),
(195, 1, 'ADMIN', 10, 'Add Salon Type', 1, '1', 1643291150, 1642278614),
(194, 1, 'ADMIN', 9, 'Offers Management', 1, '1', 1643575449, 1642278612),
(193, 1, 'ADMIN', 8, 'My Dashboard', 1, '1', 1643291051, 1642278611),
(192, 1, 'ADMIN', 7, 'Dashboard', 1, '0', NULL, 1642278610),
(191, 1, 'ADMIN', 6, 'Add User Role', 1, '0', NULL, 1642278608),
(190, 1, 'ADMIN', 4, 'User Management', 1, '0', NULL, 1642278606),
(189, 1, 'ADMIN', 3, 'General Setting', 1, '0', NULL, 1642278604),
(188, 1, 'ADMIN', 2, 'System Stop / Start', 1, '0', NULL, 1642278603),
(187, 1, 'ADMIN', 5, 'User Role Management', 1, '0', NULL, 1642278601),
(186, 1, 'ADMIN', 1, 'Setting', 1, '0', NULL, 1642278600),
(185, 1, 'ADMIN', 1, 'Setting', 1, '1', 1642278584, 1642278549),
(184, 1, 'ADMIN', 1, 'Setting', 1, '1', 1642278584, 1642278478),
(215, 1, 'ADMIN', 30, 'Block IPs', 1, '0', NULL, 1642278658),
(216, 1, 'ADMIN', 31, 'Technical Support', 1, '0', NULL, 1642278659),
(217, 1, 'ADMIN', 32, 'Chat', 1, '0', NULL, 1642278660),
(218, 1, 'ADMIN', 33, 'Reports', 1, '0', NULL, 1642278662),
(219, 1, 'ADMIN', 34, 'Report Orders', 1, '0', NULL, 1642278664),
(220, 1, 'ADMIN', 35, 'Order Daily Report', 1, '0', NULL, 1642278665),
(221, 1, 'ADMIN', 36, 'Order Monthly Report', 1, '0', NULL, 1642278666),
(222, 2, 'Company', 15, 'Add Goods', 1, '1', 1643110559, 1642279389),
(223, 2, 'Company', 19, 'Staff Management', 1, '1', 1647605164, 1642279390),
(224, 2, 'Company', 20, 'Delete Staff', 1, '1', 1647605170, 1642279397),
(225, 2, 'Company', 16, 'Add Delete Goods', 1, '1', 1643110675, 1642279398),
(226, 2, 'Company', 8, 'My Dashboard', 1, '1', 1643110568, 1642279400),
(227, 2, 'Company', 18, 'Add Staff', 1, '1', 1647605165, 1642279409),
(228, 2, 'Company', 22, 'Goods & Services', 1, '1', 1643110552, 1642279410),
(229, 2, 'Company', 26, 'Add Blog', 1, '1', 1647605166, 1642279412),
(230, 2, 'Company', 34, 'Report Orders', 1, '1', 1643110298, 1642279415),
(231, 2, 'Company', 25, 'Blogs Management', 1, '1', 1647605168, 1642279418),
(232, 2, 'Company', 21, 'Assign Service to Staff', 1, '1', 1647605169, 1642279421),
(233, 2, 'Company', 9, 'Offers Management', 1, '0', NULL, 1642279427),
(234, 0, '\n<div style=\"border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;\">\n\n<h4>A PHP Error was en', 8, 'My Dashboard', 1, '0', 1642424926, 1642424908),
(235, 1, 'JAMALIKI ADMIN', 63, 'SALON CATEGORY', 1, '0', NULL, 1643108172),
(236, 1, 'JAMALIKI ADMIN', 37, 'LOCATIONS', 1, '0', NULL, 1643108173),
(237, 1, 'JAMALIKI ADMIN', 38, 'COUNTRY', 1, '0', NULL, 1643108174),
(238, 1, 'JAMALIKI ADMIN', 39, 'ADD COUNTRY', 1, '0', NULL, 1643108175),
(239, 1, 'JAMALIKI ADMIN', 43, 'ADD STATE', 1, '0', NULL, 1643108176),
(240, 1, 'JAMALIKI ADMIN', 42, 'STATE', 1, '0', NULL, 1643108177),
(241, 1, 'JAMALIKI ADMIN', 41, 'DELETE COUNTRY', 1, '0', NULL, 1643108178),
(242, 1, 'JAMALIKI ADMIN', 40, 'EDIT COUNTRY', 1, '0', NULL, 1643108178),
(243, 1, 'JAMALIKI ADMIN', 44, 'EDIT STATE', 1, '0', NULL, 1643108179),
(244, 1, 'JAMALIKI ADMIN', 45, 'DELETE STATE', 1, '0', NULL, 1643108180),
(245, 1, 'JAMALIKI ADMIN', 46, 'CITY', 1, '0', NULL, 1643108181),
(246, 1, 'JAMALIKI ADMIN', 47, 'ADD CITY', 1, '0', NULL, 1643108182),
(247, 1, 'JAMALIKI ADMIN', 51, 'ADD AREA', 1, '0', NULL, 1643108183),
(248, 1, 'JAMALIKI ADMIN', 50, 'AREA', 1, '0', NULL, 1643108184),
(249, 1, 'JAMALIKI ADMIN', 49, 'DELETE CITY', 1, '0', NULL, 1643108185),
(250, 1, 'JAMALIKI ADMIN', 48, 'EDIT CITY', 1, '0', NULL, 1643108186),
(251, 1, 'JAMALIKI ADMIN', 52, 'EDIT AREA', 1, '0', NULL, 1643108187),
(252, 1, 'JAMALIKI ADMIN', 56, 'ADD SALON', 1, '0', NULL, 1643108188),
(253, 1, 'JAMALIKI ADMIN', 53, 'DELETE AREA', 1, '0', NULL, 1643108189),
(254, 1, 'JAMALIKI ADMIN', 57, 'EDIT SALON', 1, '0', NULL, 1643108190),
(255, 1, 'JAMALIKI ADMIN', 54, 'HOLIDAY', 1, '0', NULL, 1643108191),
(256, 1, 'JAMALIKI ADMIN', 58, 'DELETE SALON', 1, '0', NULL, 1643108192),
(257, 1, 'JAMALIKI ADMIN', 55, 'SALON', 1, '0', NULL, 1643108193),
(258, 1, 'JAMALIKI ADMIN', 59, 'SALON TYPE', 1, '0', NULL, 1643108195),
(259, 1, 'JAMALIKI ADMIN', 64, 'ADD SALON CATEGORY', 1, '0', NULL, 1643108196),
(260, 1, 'JAMALIKI ADMIN', 68, 'MY SALON BILLINGS', 1, '1', 1643291025, 1643108197),
(261, 1, 'JAMALIKI ADMIN', 62, 'DELETE SALON TYPE', 1, '0', NULL, 1643108197),
(262, 1, 'JAMALIKI ADMIN', 67, 'SALON RATINGS', 1, '0', NULL, 1643108198),
(263, 1, 'JAMALIKI ADMIN', 61, 'EDIT SALON TYPE', 1, '0', NULL, 1643108199),
(264, 1, 'JAMALIKI ADMIN', 66, 'DELETE SALON CATEGORY', 1, '0', NULL, 1643108200),
(265, 1, 'JAMALIKI ADMIN', 60, 'ADD SALON TYPE', 1, '0', NULL, 1643108201),
(266, 1, 'JAMALIKI ADMIN', 65, 'EDIT SALON CATEGORY', 1, '0', NULL, 1643108203),
(267, 1, 'JAMALIKI ADMIN', 69, 'MY SALON INVOICE', 1, '1', 1643291035, 1643108205),
(268, 1, 'JAMALIKI ADMIN', 73, 'DELETE ADS', 1, '0', NULL, 1643108205),
(269, 1, 'JAMALIKI ADMIN', 70, 'ADS', 1, '0', NULL, 1643108207),
(270, 1, 'JAMALIKI ADMIN', 71, 'ADD ADS', 1, '0', NULL, 1643108207),
(271, 1, 'JAMALIKI ADMIN', 72, 'EDIT ADS', 1, '0', NULL, 1643108208),
(272, 2, 'SALON ADMIN', 75, 'CHANGE BOOKINGS', 1, '1', 1647605181, 1643110245),
(273, 2, 'SALON ADMIN', 76, 'CANCEL BOOKINGS', 1, '1', 1647605184, 1643110247),
(274, 2, 'SALON ADMIN', 74, 'ADD BOOKINGS', 1, '1', 1647605173, 1643110249),
(275, 2, 'SALON ADMIN', 69, 'MY SALON INVOICE', 1, '1', 1647605179, 1643110279),
(276, 2, 'SALON ADMIN', 68, 'MY SALON BILLINGS', 1, '1', 1647605184, 1643110285),
(277, 2, 'SALON ADMIN', 10, 'ADD OFFER', 1, '0', NULL, 1643110319),
(278, 2, 'SALON ADMIN', 36, 'Order Monthly Report', 1, '1', 1643110372, 1643110371),
(279, 2, 'SALON ADMIN', 8, 'My Dashboard', 1, '0', NULL, 1643110572),
(280, 2, 'SALON ADMIN', 77, 'EDIT SALOON STAFF', 1, '1', 1647605178, 1643116494),
(281, 2, 'SALON ADMIN', 78, 'My SALOON', 1, '1', 1647605174, 1643118274),
(282, 2, 'SALON ADMIN', 79, 'My SALOON WORKING HOURS', 1, '1', 1647605182, 1643123341),
(283, 2, 'SALON ADMIN', 80, 'MY SALON SERVICES', 1, '1', 1647605183, 1643203494),
(284, 2, 'SALON ADMIN', 81, 'ADD SERVICE', 1, '1', 1647605177, 1643203496),
(285, 2, 'SALON ADMIN', 82, 'DELETE SERVICE', 1, '1', 1647605175, 1643203498),
(286, 2, 'SALON ADMIN', 83, 'CUSTOMERS', 1, '1', 1643285922, 1643285906),
(287, 1, 'JAMALIKI ADMIN', 74, 'ADD BOOKINGS', 1, '1', 1643291030, 1643285988),
(288, 1, 'JAMALIKI ADMIN', 75, 'CHANGE BOOKINGS', 1, '1', 1643291029, 1643285989),
(289, 1, 'JAMALIKI ADMIN', 76, 'CANCEL BOOKINGS', 1, '1', 1643291023, 1643285990),
(290, 1, 'JAMALIKI ADMIN', 80, 'MY SALON SERVICES', 1, '1', 1643291026, 1643285991),
(291, 1, 'JAMALIKI ADMIN', 79, 'My SALOON WORKING HOURS', 1, '1', 1643291028, 1643285992),
(292, 1, 'JAMALIKI ADMIN', 78, 'My SALOON', 1, '1', 1643291031, 1643285993),
(293, 1, 'JAMALIKI ADMIN', 77, 'EDIT SALOON STAFF', 1, '1', 1643291033, 1643285995),
(294, 1, 'JAMALIKI ADMIN', 81, 'ADD SERVICE', 1, '0', NULL, 1643285996),
(295, 1, 'JAMALIKI ADMIN', 82, 'DELETE SERVICE', 1, '0', NULL, 1643285997),
(296, 1, 'JAMALIKI ADMIN', 83, 'CUSTOMERS', 1, '0', NULL, 1643285998),
(297, 1, 'JAMALIKI ADMIN', 84, 'CUSTOMER EMAIL VERIFY', 1, '0', NULL, 1643285999),
(298, 1, 'JAMALIKI ADMIN', 86, 'DELETE CUSTOMER', 1, '0', NULL, 1643286000),
(299, 1, 'JAMALIKI ADMIN', 85, 'EDIT CUSTOMER', 1, '0', NULL, 1643286001),
(300, 1, 'JAMALIKI ADMIN', 87, 'DELETE CUSTOMER', 1, '0', NULL, 1643288119),
(301, 1, 'JAMALIKI ADMIN', 9, 'MY OFFERS', 1, '1', 1643575449, 1643575271),
(302, 1, 'JAMALIKI ADMIN', 9, 'MY SALON OFFERS', 1, '1', 1643575449, 1643575434),
(303, 2, 'SALON ADMIN', 88, 'MY ATTENDANCE', 1, '1', 1647605185, 1645719839),
(304, 2, 'Web Admin', 1, 'Setting', 1, '0', NULL, 1647605140),
(305, 2, 'Web Admin', 5, 'User Role Management', 1, '0', NULL, 1647605141),
(306, 2, 'Web Admin', 2, 'System Stop / Start', 1, '0', NULL, 1647605142),
(307, 2, 'Web Admin', 6, 'Add User Role', 1, '0', NULL, 1647605143),
(308, 2, 'Web Admin', 3, 'General Setting', 1, '0', NULL, 1647605145),
(309, 2, 'Web Admin', 7, 'Dashboard', 1, '0', NULL, 1647605145),
(310, 2, 'Web Admin', 4, 'User Management', 1, '0', NULL, 1647605147),
(311, 2, 'Web Admin', 12, 'Delete Page', 1, '0', NULL, 1647605148),
(312, 2, 'Web Admin', 14, 'Add  Service', 1, '0', NULL, 1647605150),
(313, 2, 'Web Admin', 13, 'Services', 1, '0', NULL, 1647605151),
(314, 2, 'Web Admin', 17, 'Subscriptions Management', 1, '0', NULL, 1647605153),
(315, 2, 'Web Admin', 15, 'Edit Service', 1, '0', NULL, 1647605161),
(316, 2, 'Web Admin', 16, 'Delete Service', 1, '0', NULL, 1647605162),
(317, 2, 'Web Admin', 81, 'Testimonials', 1, '0', NULL, 1647616094),
(318, 2, 'Web Admin', 82, 'Add Testimonial', 1, '0', NULL, 1647616098),
(319, 2, 'Web Admin', 89, 'Edit Testimonial', 1, '0', NULL, 1647616099),
(320, 2, 'Web Admin', 90, 'Delete Testimonial', 1, '0', NULL, 1647616102),
(321, 2, 'Web Admin', 25, 'Blogs Management', 1, '0', NULL, 1647670268),
(322, 2, 'Web Admin', 30, 'Block IPs', 1, '0', NULL, 1647670270),
(323, 2, 'Web Admin', 24, 'Subscriptions', 1, '0', NULL, 1647670271),
(324, 2, 'Web Admin', 28, 'Add News', 1, '0', NULL, 1647670272),
(325, 2, 'Web Admin', 31, 'Technical Support', 1, '0', NULL, 1647670274),
(326, 2, 'Web Admin', 26, 'Add Blog', 1, '0', NULL, 1647670275),
(327, 2, 'Web Admin', 27, 'News Management', 1, '0', NULL, 1647670276),
(328, 2, 'Web Admin', 32, 'Chat', 1, '0', NULL, 1647670277),
(329, 2, 'Web Admin', 72, 'EDIT ADS', 1, '0', NULL, 1647670278),
(330, 2, 'Web Admin', 73, 'DELETE ADS', 1, '0', NULL, 1647670280),
(331, 2, 'Web Admin', 71, 'ADD ADS', 1, '0', NULL, 1647670282),
(332, 2, 'Web Admin', 70, 'ADS', 1, '0', NULL, 1647670283),
(333, 2, 'Web Admin', 54, 'HOLIDAY', 1, '0', NULL, 1647670284),
(334, 2, 'Web Admin', 94, 'Delete Why Us', 1, '0', NULL, 1647675207),
(335, 2, 'Web Admin', 91, 'Why Us', 1, '0', NULL, 1647675208),
(336, 2, 'Web Admin', 92, 'Add Why Us', 1, '0', NULL, 1647675209),
(337, 2, 'Web Admin', 93, 'Edit Why Us', 1, '0', NULL, 1647675210),
(338, 2, 'Web Admin', 95, 'Portfolio', 1, '0', NULL, 1647682113),
(339, 2, 'Web Admin', 96, 'Add Portfolio', 1, '0', NULL, 1647682114),
(340, 2, 'Web Admin', 97, 'Edit Portfolio', 1, '0', NULL, 1647682115),
(341, 2, 'Web Admin', 98, 'Delete Portfolio', 1, '0', NULL, 1647682116),
(342, 2, 'Web Admin', 99, 'Team', 1, '0', NULL, 1647854123),
(343, 2, 'Web Admin', 100, 'Add Team', 1, '0', NULL, 1647854124),
(344, 2, 'Web Admin', 101, 'Edit Team', 1, '0', NULL, 1647854125),
(345, 2, 'Web Admin', 102, 'Delete Team', 1, '0', NULL, 1647854126),
(346, 2, 'Web Admin', 106, 'Delete QUESTION', 1, '0', NULL, 1647859821),
(347, 2, 'Web Admin', 103, 'FAQS', 1, '0', NULL, 1647859822),
(348, 2, 'Web Admin', 104, 'Add QUESTION', 1, '0', NULL, 1647859823),
(349, 2, 'Web Admin', 105, 'Edit QUESTION', 1, '0', NULL, 1647859824),
(350, 2, 'Web Admin', 107, 'Gallery', 1, '0', NULL, 1647874100),
(351, 2, 'Web Admin', 108, 'Upload Photo/Video', 1, '0', NULL, 1647874101),
(352, 2, 'Web Admin', 109, 'Delete Photo/Video', 1, '0', NULL, 1647874102),
(353, 2, 'Web Admin', 110, 'Main Slider', 1, '0', NULL, 1648026634),
(354, 2, 'Web Admin', 111, 'Add New Slide', 1, '0', NULL, 1648026635),
(355, 2, 'Web Admin', 112, 'Edit New Slide', 1, '0', NULL, 1648026636),
(356, 2, 'Web Admin', 113, 'Delete New Slide', 1, '0', NULL, 1648026637),
(357, 2, 'Web Admin', 114, 'Edit About Us', 1, '0', NULL, 1648028638),
(358, 2, 'Web Admin', 115, 'CEO Message', 1, '0', NULL, 1648028891),
(359, 2, 'Web Admin', 116, 'Mission Vision', 1, '0', NULL, 1648028892);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_tbl`
--

DROP TABLE IF EXISTS `portfolio_tbl`;
CREATE TABLE IF NOT EXISTS `portfolio_tbl` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `project_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_desc` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `start_date` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `project_link` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` enum('Draft','Publish') COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `is_delete` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_6sw8k5ohu2olrfyqiupm33yrv` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `portfolio_tbl`
--

INSERT INTO `portfolio_tbl` (`id`, `category_id`, `project_name`, `project_desc`, `start_date`, `project_link`, `user_id`, `status`, `is_active`, `is_delete`, `inserted_at`, `updated_at`) VALUES
(1, 9, 'Project ABC .', 'This is some text. fghghf', '23-01-2020', NULL, 1, 'Publish', '1', '0', 1648024907, 1647680603),
(2, 8, 'Proejct Xyz', 'This is some text of testing................................', '07-05-2020', NULL, 1, 'Draft', '1', '0', 1647694139, 1647612143),
(3, 9, 'Hospital', 'This is some text.', '01-01-2020', NULL, 1, 'Publish', '1', '0', 1647850215, 1647604668),
(4, 10, 'Project PQR', 'This is some description text.', '08-12-2021', NULL, 1, NULL, '1', '0', 1648025235, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services_tbl`
--

DROP TABLE IF EXISTS `services_tbl`;
CREATE TABLE IF NOT EXISTS `services_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_en` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `title_ar` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `icon` varchar(250) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `short_desc_en` varchar(1000) DEFAULT NULL,
  `short_desc_ar` varchar(1000) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` enum('1','0') DEFAULT '1',
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_tbl`
--

INSERT INTO `services_tbl` (`id`, `title_en`, `title_ar`, `link`, `icon`, `image`, `short_desc_en`, `short_desc_ar`, `user_id`, `is_active`, `is_delete`, `inserted_at`, `updated_at`) VALUES
(1, 'CIVIL/ARCHITECTURE', 'CIVIL/ARCHITECTURE', 'civil-architecture', 'img_23_Mar_22_04_13_37_pm.png', 'img_23_Mar_22_04_12_26_pm.png', '<ul><li>Mason (Plaster, Block)</li><li>Masons</li><li>Rod Binder (Steel Fixer)</li><li>Carpenter</li><li>Plumbing</li><li>Aluminium Fabrication\r\n</li><li>Scaffolders</li><li>Labour <br></li></ul>', '<ol><li>Mason (Plaster, Block)</li><li>Masons</li><li>Rod Binder (Steel Fixer)</li><li>Carpenter</li><li>Plumbing</li><li>Aluminium Fabrication</li><li>Scaffolders</li><li>Labour </li></ol>', 1, '1', '0', 1648037667, NULL),
(2, 'ELECTRICAL', 'ELECTRICAL', 'electrical', 'img_23_Mar_22_04_15_18_pm1.png', 'img_23_Mar_22_04_15_18_pm.png', '<ul><li>General Electrician (House Wiring)</li><li>Electrical Line Maintenance (Industrial)\r\n </li><li>AC & Refrigeration<br></li></ul>', '<ol><li>General Electrician (House Wiring)</li><li>Electrical Line Maintenance (Industrial)  </li><li>AC & Refrigeration</li></ol>', 1, '1', '0', 1648037721, NULL),
(3, 'MECHANICAL', 'MECHANICAL', 'mechanical', 'img_23_Mar_22_04_16_56_pm.png', 'img_18_Mar_22_06_03_14_pm.jpg', '<ul><li>Automobile (Diesel & Petrol)</li><li>Auto Electrician\r\n </li><li>Machinist (Turner)</li><li>Painter<br></li></ul>', '<ol><li>Automobile (Diesel & Petrol)</li><li>Auto Electrician  </li><li>Machinist (Turner)</li><li>Painter</li></ol>', 1, '1', '0', 1648037821, NULL),
(4, 'SECURITY', 'SECURITY', 'security', 'img_23_Mar_22_04_18_32_pm1.png', 'img_23_Mar_22_04_18_32_pm.png', '<ul><li>Residential / Private Security</li><li>Official / Bank Security\r\n</li><li>Industrial Security  <br></li></ul>', '<ul><li>Residential / Private Security</li><li>Official / Bank Security</li><li>Industrial Security  </li></ul>', 1, '1', '0', 1648037925, NULL),
(5, 'WELDING', 'WELDING', 'welding', 'img_23_Mar_22_04_22_15_pm.jpg', 'img_23_Mar_22_04_22_15_pm.png', '<ul><li>Normal Welding (Arc &amp; Gas)</li><li>Welding TIG</li><li>Welding MIG</li><li>Welding Gas&nbsp;&nbsp;<br></li></ul>', '<ul><li>Normal Welding (Arc &amp; Gas)</li><li>Welding TIG</li><li>Welding MIG</li><li>Welding Gas&nbsp;&nbsp;</li></ul>', 1, '1', '0', 1648038135, NULL),
(6, 'HEAVY EQUIPMENTS / DRIVERS', 'HEAVY EQUIPMENTS / DRIVERS', 'heavy-equipments-drivers', 'img_23_Mar_22_04_26_32_pm1.png', 'img_23_Mar_22_04_26_32_pm.png', '<ul><li>Operators - Dozer, Fork lift, Roller, Back Hoe</li><li>Operators - Crane (Mobile/Crawler/Hydraulic)</li><li>Heavy Drivers - (Trailor/Truck)</li><li>Light Drivers - (Bus/Van/Car/Light Vehicles)</li><li>Tyreman&nbsp;<br></li></ul>', '<ul><li>Operators - Dozer, Fork lift, Roller, Back Hoe</li><li>Operators - Crane (Mobile/Crawler/Hydraulic)</li><li>Heavy Drivers - (Trailor/Truck)</li><li>Light Drivers - (Bus/Van/Car/Light Vehicles)</li><li>Tyreman&nbsp;</li></ul>', 1, '1', '0', 1648038392, NULL),
(7, 'DENTING & PAINTING', 'DENTING & PAINTING', 'denting-painting', 'img_23_Mar_22_04_31_31_pm.png', 'img_23_Mar_22_04_30_37_pm.png', '<ul><li>Sand Blasting</li><li>Building Painting </li><li>Industrial Painting <br></li></ul>', '<ul><li>Sand Blasting</li><li>Building Painting </li><li>Industrial Painting </li></ul>', 1, '1', '0', 1648038691, NULL),
(8, 'HOTEL & HOSPITALITY', 'HOTEL & HOSPITALITY', 'hotel-hospitality', 'img_23_Mar_22_04_45_31_pm1.png', 'img_23_Mar_22_04_45_31_pm.png', '<ul><li>Production worker</li><li>Food &amp; Beverage Service (Waiter, Bartender)</li><li>Front Office Management</li><li>(Receptionist call operator)</li><li>Room Boy/Laundry Man/Cleaners&nbsp;<br></li></ul>', '<ul><li>Production worker</li><li>Food &amp; Beverage Service (Waiter, Bartender)</li><li>Front Office Management</li><li>(Receptionist call operator)</li><li>Room Boy/Laundry Man/Cleaners&nbsp;</li></ul>', 1, '1', '0', 1648039531, NULL),
(9, 'AGRICULTURE & PLANTATION', 'AGRICULTURE & PLANTATION', 'agriculture-plantation', 'img_23_Mar_22_04_48_57_pm1.png', 'img_23_Mar_22_04_48_57_pm.png', '<ul><li>Farming</li><li>Livestock</li><li>Fishery</li><li>Poultry</li><li>Bee Keeping</li><li>Floriculture&nbsp;<br></li></ul>', '<ul><li>Farming</li><li>Livestock</li><li>Fishery</li><li>Poultry</li><li>Bee Keeping</li><li>Floriculture&nbsp;</li></ul>', 1, '1', '0', 1648039737, NULL),
(10, 'CLEANING & HOUSEKEEPING', 'CLEANING & HOUSEKEEPING', 'cleaning-housekeeping', 'img_23_Mar_22_04_51_26_pm.jpg', 'img_23_Mar_22_04_51_26_pm.png', '<ul><li>Office Boy</li><li>Cleaner (General, Retails, Outdoors etc.)</li><li>Housekeeper</li><li>Care Giver&nbsp;<br></li></ul>', '<ul><li>Office Boy</li><li>Cleaner (General, Retails, Outdoors etc.)</li><li>Housekeeper</li><li>Care Giver&nbsp;</li></ul>', 1, '1', '0', 1648039886, NULL),
(11, 'GARMENTS & TEXTILES', 'GARMENTS & TEXTILES', 'garments-textiles', 'img_23_Mar_22_04_54_00_pm1.png', 'img_23_Mar_22_04_54_00_pm.png', '<ul><li>Cutting Master</li><li>Production Manager</li><li>Supervisor</li><li>Tailors</li><li>Checker/Helper<br></li></ul>', '<ul><li>Cutting Master</li><li>Production Manager</li><li>Supervisor</li><li>Tailors</li><li>Checker/Helper</li></ul>', 1, '1', '0', 1648040040, NULL),
(12, 'SUPERMARKETS/HYPERMARKETS', 'SUPERMARKETS/HYPERMARKETS', 'supermarkets-hypermarkets', 'img_23_Mar_22_04_56_12_pm.png', NULL, '<ul><li>Sales Supervisor&nbsp;</li><li>Salesmen/Salesgirl</li><li>Check out Cashiers </li><li>\r\nTrolley Boys </li><li>\r\nShelves Rack Organizers </li><li>\r\nStore Keepers\r\n</li><li>Cleaners</li><li>Loading/Unloading Helper\r\n</li><li>Merchandiser&nbsp;&nbsp;<br></li></ul>', '<ul><li>Sales Supervisor&nbsp;</li><li>Salesmen/Salesgirl</li><li>Check out Cashiers</li><li>Trolley Boys</li><li>Shelves Rack Organizers</li><li>Store Keepers</li><li>Cleaners</li><li>Loading/Unloading Helper</li><li>Merchandiser&nbsp;&nbsp;</li></ul>', 1, '1', '0', 1648040172, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider_tbl`
--

DROP TABLE IF EXISTS `slider_tbl`;
CREATE TABLE IF NOT EXISTS `slider_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_type` varchar(500) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `title_en` varchar(500) DEFAULT NULL,
  `title_ar` varchar(500) DEFAULT NULL,
  `short_desc_en` varchar(500) DEFAULT NULL,
  `short_desc_ar` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `video` varchar(500) DEFAULT NULL,
  `slide_call_to_action` varchar(500) DEFAULT NULL,
  `slide_order` int(11) DEFAULT NULL,
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider_tbl`
--

INSERT INTO `slider_tbl` (`id`, `owner_type`, `owner_id`, `title_en`, `title_ar`, `short_desc_en`, `short_desc_ar`, `image`, `video`, `slide_call_to_action`, `slide_order`, `inserted_at`, `updated_at`, `user_id`, `is_active`, `is_delete`) VALUES
(1, 'hero', NULL, 'Welcome to Cadima You See', 'Welcome to Cadima You See', 'This is some description in English.', 'This is some description in Arabic', 'slide-1.jpg', NULL, NULL, 2, 1648028347, NULL, 1, '1', '0'),
(9, 'hero', NULL, 'The Ultimate Destination for you Staffing Solutions ', 'The Ultimate Destination for you Staffing Solutions ', '', '', 'slide-4.jpg', NULL, NULL, 1, 1648028338, NULL, 1, '1', '0'),
(10, 'hero', NULL, 'Choose The Right Partner, To Reach Your Goals', 'Choose The Right Partner, To Reach Your Goals', '', '', 'slide-7.jpg', NULL, NULL, 3, 1648028356, NULL, 1, '1', '0'),
(11, 'projects', 1, 'd', 'd', '', '', 'img_21_Mar_22_12_57_35_pm.jpg', NULL, NULL, 1, 1647853055, NULL, 1, '1', '0'),
(12, 'projects', 2, 'Welcome', 'Welcome', '', '', 'img_21_Mar_22_12_51_22_pm.jpg', NULL, NULL, 1, 1647852682, NULL, 1, '1', '0'),
(2, 'hero', NULL, 'Building a New Reality is Humanly Possible', 'Building a New Reality is Humanly Possible', '', '', 'slide-8.jpg', NULL, NULL, 4, 1648028361, NULL, 1, '1', '0'),
(3, 'hero', NULL, 'Flexible manpower outsourcing services that put your business needs first. ', 'Flexible manpower outsourcing services that put your business needs first. ', '', '', 'slide-3.jpg', NULL, NULL, 5, 1648028368, NULL, 1, '1', '0'),
(13, 'projects', 2, 'Welcome', 'Welcome', '', '', 'img_21_Mar_22_11_40_06_am.jpg', NULL, NULL, 2, 1647848406, NULL, 1, '1', '0'),
(14, 'projects', 2, 'asd', 'sad', '', '', 'img_21_Mar_22_11_40_59_am.jpg', NULL, NULL, 3, 1647848459, NULL, 1, '1', '0'),
(15, '', 2, 'sad', 'sada', '', '', 'img_21_Mar_22_11_54_20_am.jpg', NULL, NULL, 1, 1647849260, NULL, 1, '1', '0'),
(4, NULL, NULL, 'Welcome', 'Welcome', 'This is some text.', 'This is some text.', 'img_19_Mar_22_05_34_49_pm.jpg', NULL, NULL, NULL, 1647696889, NULL, 1, '1', '0'),
(5, NULL, NULL, 'Welcome', 'Welcome', 'This is some text.', 'This is some text.', 'img_19_Mar_22_05_36_14_pm.jpg', NULL, NULL, NULL, 1647696974, NULL, 1, '1', '0'),
(6, 'projects', NULL, 'Welcome', 'Welcome', 'This is some text.', 'This is some text.', 'img_19_Mar_22_05_37_51_pm.jpg', NULL, NULL, NULL, 1647697071, NULL, 1, '1', '0'),
(7, 'projects', 1, 'Welcome', 'Welcome', 'This is some text.', 'This is some text.', 'img_21_Mar_22_10_58_39_am.jpg', NULL, NULL, 2, 1647851882, NULL, 1, '1', '0'),
(8, 'projects', 1, 'Welcome', 'Welcome', '', '', 'img_21_Mar_22_10_58_33_am.jpg', NULL, NULL, 3, 1647851873, NULL, 1, '1', '0'),
(16, 'projects', 2, 'asd', 'asdas', '', '', 'img_21_Mar_22_11_58_21_am.jpg', NULL, NULL, 4, 1647849501, 1647849515, 1, '1', '1'),
(17, 'projects', 3, 'sdg', 'ert', '', '', 'img_21_Mar_22_12_51_52_pm.jpg', NULL, NULL, 1, 1647852712, NULL, 1, '1', '0'),
(18, 'projects', 3, 'asdsa', 'sad', '', '', 'img_21_Mar_22_12_05_01_pm.jpg', NULL, NULL, 2, 1647850527, 1648027588, 1, '0', '0'),
(19, 'projects', 3, 'asd', 'asdas', '', '', 'img_21_Mar_22_12_05_53_pm.jpg', NULL, NULL, 3, 1647850533, 1648027550, 1, '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `team_tbl`
--

DROP TABLE IF EXISTS `team_tbl`;
CREATE TABLE IF NOT EXISTS `team_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `designation` varchar(250) DEFAULT NULL,
  `remarks_en` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `remarks_ar` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `twitter` varchar(250) DEFAULT NULL,
  `facebook` varchar(250) DEFAULT NULL,
  `instagram` varchar(250) DEFAULT NULL,
  `linkedin` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` enum('1','0') DEFAULT '1',
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_tbl`
--

INSERT INTO `team_tbl` (`id`, `name`, `designation`, `remarks_en`, `remarks_ar`, `image`, `twitter`, `facebook`, `instagram`, `linkedin`, `user_id`, `is_active`, `is_delete`, `inserted_at`, `updated_at`) VALUES
(1, 'Ahmad', 'CEO', '', '', 'img_21_Mar_22_01_56_03_pm.jpg', '', '', '', '', 1, '1', '0', 1647856563, 1648025339),
(2, 'Hakeem', 'Designer', '', '', 'img_21_Mar_22_01_52_52_pm.jpg', 'sdf', 'dsf', 'sdf', 'sdf', 1, '1', '0', 1647856372, 1647858440),
(3, 'Fatima', 'Receptionist', '<p>fds</p>', '<p>sdfsd</p>', 'img_21_Mar_22_01_56_34_pm.jpg', 'dsf', 'dsf', 'dsf', 'dsf', 1, '1', '0', 1647856594, 1647858448),
(4, 'Anaya', 'Receptionist', '<p>asdf</p>', '<p>sdf</p>', 'img_21_Mar_22_01_56_57_pm.jpg', 'sdf', 'dsf', 'sdf', 'sdfs', 1, '1', '0', 1647856629, 1647858455),
(5, 'Muhammad', 'Line Manager', '', '', 'img_23_Mar_22_12_50_08_pm.jpg', '', '', '', '', 1, '1', '0', 1648025389, 1648025408);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_tbl`
--

DROP TABLE IF EXISTS `testimonial_tbl`;
CREATE TABLE IF NOT EXISTS `testimonial_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `designation` varchar(250) DEFAULT NULL,
  `remarks_en` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `remarks_ar` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` enum('1','0') DEFAULT '1',
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial_tbl`
--

INSERT INTO `testimonial_tbl` (`id`, `name`, `designation`, `remarks_en`, `remarks_ar`, `image`, `user_id`, `is_active`, `is_delete`, `inserted_at`, `updated_at`) VALUES
(1, 'Locian ff', 'CEO  dfs', '<p>Best Man Power Company I have ever cross.</p>', '<p>Best Man Power Company I have ever cross.<br></p>', 'img_19_Mar_22_11_03_49_am.jpg', 1, '1', '0', 1648024333, NULL),
(2, 'Asif', 'Operation Manager', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'img_19_Mar_22_10_57_14_am.png', 1, '1', '1', 1647673034, 1647673196),
(3, 'Asif', 'Operation Manager', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'img_19_Mar_22_11_04_04_am.jpg', 1, '1', '0', 1647673444, NULL),
(4, 'Jena', 'Manager', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'img_19_Mar_22_11_04_46_am.jpg', 1, '1', '0', 1648024346, NULL),
(5, 'John', 'Team Lead', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'img_19_Mar_22_11_05_25_am.jpg', 1, '1', '0', 1647673525, NULL),
(6, 'Vectoria', 'CEO', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p><p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p><p>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</p><p>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p><p>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'img_19_Mar_22_11_06_06_am.jpg', 1, '1', '0', 1647673566, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role_tbl`
--

DROP TABLE IF EXISTS `user_role_tbl`;
CREATE TABLE IF NOT EXISTS `user_role_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title_en` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `dashboard_link` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `is_active` enum('1','0') DEFAULT '1',
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role_tbl`
--

INSERT INTO `user_role_tbl` (`id`, `title_en`, `title_ar`, `dashboard_link`, `user_id`, `inserted_at`, `updated_at`, `is_active`, `is_delete`) VALUES
(1, 'System ADMIN', 'System ADMIN', 'admin', NULL, 1589593226, 1643291064, '1', '0'),
(2, 'Web Admin', 'Web Admin', 'admin', NULL, 1589593226, 1648026638, '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

DROP TABLE IF EXISTS `user_tbl`;
CREATE TABLE IF NOT EXISTS `user_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `is_available` enum('1','0') NOT NULL DEFAULT '1',
  `email` varchar(255) DEFAULT NULL,
  `email_verify` enum('Yes','No') DEFAULT NULL,
  `email_verification_date` int(11) DEFAULT NULL,
  `password_md5` varchar(250) DEFAULT NULL,
  `plain_password` varchar(100) DEFAULT NULL,
  `confirm_password` varchar(250) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` enum('1','2') DEFAULT NULL,
  `short_desc_en` varchar(250) DEFAULT NULL,
  `short_desc_ar` varchar(250) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `massenger` varchar(100) DEFAULT NULL,
  `snapchat` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `google_plus` varchar(100) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `contact_nmbr` varchar(20) DEFAULT NULL,
  `profile_image` varchar(250) DEFAULT NULL,
  `cover_image` varchar(250) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `is_registration_social` enum('1','0') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` enum('1','0') DEFAULT '1',
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `role_id`, `is_available`, `email`, `email_verify`, `email_verification_date`, `password_md5`, `plain_password`, `confirm_password`, `first_name`, `middle_name`, `last_name`, `gender`, `short_desc_en`, `short_desc_ar`, `whatsapp`, `massenger`, `snapchat`, `instagram`, `youtube`, `facebook`, `twitter`, `google_plus`, `address`, `contact_nmbr`, `profile_image`, `cover_image`, `token`, `area_id`, `city_id`, `state_id`, `country_id`, `is_registration_social`, `user_id`, `is_active`, `is_delete`, `inserted_at`, `updated_at`) VALUES
(1, 2, '1', 'admin@cadimayousee.com', 'Yes', NULL, '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'Cadima Admin', '', '', '1', '', '', '', NULL, '', '', NULL, '', '', '', '', '', 'img_18_Mar_22_04_14_04_pm.jpg', NULL, NULL, 0, 0, 0, 0, '', 1, '1', '0', NULL, 1647605644);

-- --------------------------------------------------------

--
-- Table structure for table `web_logs`
--

DROP TABLE IF EXISTS `web_logs`;
CREATE TABLE IF NOT EXISTS `web_logs` (
  `web_logs_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `table` varchar(100) DEFAULT NULL,
  `column` varchar(100) DEFAULT NULL,
  `table_row` varchar(100) DEFAULT NULL,
  `actions` varchar(100) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `created_date` bigint(20) DEFAULT '0',
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_delete` int(11) DEFAULT '0',
  PRIMARY KEY (`web_logs_id`)
) ENGINE=MyISAM AUTO_INCREMENT=158 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `web_logs`
--

INSERT INTO `web_logs` (`web_logs_id`, `user_id`, `table`, `column`, `table_row`, `actions`, `ip`, `created_date`, `is_active`, `is_delete`) VALUES
(1, 1, NULL, NULL, NULL, 'login', '::1', 1640525800, 1, 0),
(2, 1, NULL, NULL, NULL, 'login', '::1', 1640695890, 1, 0),
(3, 1, NULL, NULL, NULL, 'login', '::1', 1641023959, 1, 0),
(4, 1, NULL, NULL, NULL, 'login', '::1', 1641050650, 1, 0),
(5, 1, NULL, NULL, NULL, 'login', '::1', 1641495976, 1, 0),
(6, 1, NULL, NULL, NULL, 'login', '::1', 1641812874, 1, 0),
(7, 1, NULL, NULL, NULL, 'login', '::1', 1641826287, 1, 0),
(8, 1, NULL, NULL, NULL, 'login', '::1', 1641898287, 1, 0),
(9, 1, NULL, NULL, NULL, 'login', '::1', 1641916398, 1, 0),
(10, 1, NULL, NULL, NULL, 'login', '::1', 1641987143, 1, 0),
(11, 1, NULL, NULL, NULL, 'login', '::1', 1641997394, 1, 0),
(12, 1, NULL, NULL, NULL, 'login', '::1', 1642018597, 1, 0),
(13, 1, NULL, NULL, NULL, 'login', '127.0.0.1', 1642171433, 1, 0),
(14, 1, NULL, NULL, NULL, 'login', '127.0.0.1', 1642183607, 1, 0),
(15, 1, NULL, NULL, NULL, 'login', '127.0.0.1', 1642187120, 1, 0),
(16, 1, NULL, NULL, NULL, 'login', '127.0.0.1', 1642273355, 1, 0),
(17, 1, NULL, NULL, NULL, 'login', '127.0.0.1', 1642278199, 1, 0),
(18, 1, NULL, NULL, NULL, 'login', '127.0.0.1', 1642328306, 1, 0),
(19, 1, NULL, NULL, NULL, 'login', '127.0.0.1', 1642344458, 1, 0),
(20, 1, NULL, NULL, NULL, 'login', '127.0.0.1', 1642344822, 1, 0),
(21, 1, NULL, NULL, NULL, 'login', '127.0.0.1', 1642354600, 1, 0),
(22, 1, NULL, NULL, NULL, 'login', '127.0.0.1', 1642415209, 1, 0),
(23, 2, NULL, NULL, NULL, 'login', '::1', 1642956315, 1, 0),
(24, 2, NULL, NULL, NULL, 'login', '::1', 1642956609, 1, 0),
(25, 2, NULL, NULL, NULL, 'login', '::1', 1642957167, 1, 0),
(26, 2, NULL, NULL, NULL, 'login', '::1', 1642958616, 1, 0),
(27, 1, NULL, NULL, NULL, 'login', '::1', 1642958953, 1, 0),
(28, 2, NULL, NULL, NULL, 'login', '::1', 1642983317, 1, 0),
(29, 2, NULL, NULL, NULL, 'login', '::1', 1643097950, 1, 0),
(30, 1, NULL, NULL, NULL, 'login', '::1', 1643098568, 1, 0),
(31, 4, NULL, NULL, NULL, 'login', '::1', 1643098890, 1, 0),
(32, 1, NULL, NULL, NULL, 'login', '::1', 1643107597, 1, 0),
(33, 4, NULL, NULL, NULL, 'login', '::1', 1643109580, 1, 0),
(34, 1, NULL, NULL, NULL, 'login', '::1', 1643109641, 1, 0),
(35, 4, NULL, NULL, NULL, 'login', '::1', 1643110723, 1, 0),
(36, 4, NULL, NULL, NULL, 'login', '::1', 1643114212, 1, 0),
(37, 4, NULL, NULL, NULL, 'login', '::1', 1643114363, 1, 0),
(38, 4, NULL, NULL, NULL, 'login', '::1', 1643114546, 1, 0),
(39, 4, NULL, NULL, NULL, 'login', '::1', 1643116517, 1, 0),
(40, 4, NULL, NULL, NULL, 'login', '::1', 1643116628, 1, 0),
(41, 4, NULL, NULL, NULL, 'login', '::1', 1643118306, 1, 0),
(42, 4, NULL, NULL, NULL, 'login', '::1', 1643123365, 1, 0),
(43, 4, NULL, NULL, NULL, 'login', '::1', 1643138330, 1, 0),
(44, 4, NULL, NULL, NULL, 'login', '::1', 1643185242, 1, 0),
(45, 4, NULL, NULL, NULL, 'login', '::1', 1643203432, 1, 0),
(46, 1, NULL, NULL, NULL, 'login', '::1', 1643203462, 1, 0),
(47, 4, NULL, NULL, NULL, 'login', '::1', 1643203567, 1, 0),
(48, 4, NULL, NULL, NULL, 'login', '::1', 1643268634, 1, 0),
(49, 1, NULL, NULL, NULL, 'login', '::1', 1643272165, 1, 0),
(50, 2, NULL, NULL, NULL, 'login', '127.0.0.1', 1643272332, 1, 0),
(51, 2, NULL, NULL, NULL, 'login', '127.0.0.1', 1643272670, 1, 0),
(52, 4, NULL, NULL, NULL, 'login', '::1', 1643285569, 1, 0),
(53, 1, NULL, NULL, NULL, 'login', '::1', 1643285874, 1, 0),
(54, 1, NULL, NULL, NULL, 'login', '::1', 1643286491, 1, 0),
(55, 1, NULL, NULL, NULL, 'login', '::1', 1643288138, 1, 0),
(56, 1, NULL, NULL, NULL, 'login', '::1', 1643288176, 1, 0),
(57, 1, NULL, NULL, NULL, 'login', '::1', 1643290791, 1, 0),
(58, 1, NULL, NULL, NULL, 'login', '::1', 1643291084, 1, 0),
(59, 1, NULL, NULL, NULL, 'login', '::1', 1643291135, 1, 0),
(60, 1, NULL, NULL, NULL, 'login', '::1', 1643291368, 1, 0),
(61, 1, NULL, NULL, NULL, 'login', '::1', 1643291566, 1, 0),
(62, 1, NULL, NULL, NULL, 'login', '::1', 1643291845, 1, 0),
(63, 2, NULL, NULL, NULL, 'login', '127.0.0.1', 1643292448, 1, 0),
(64, 9, NULL, NULL, NULL, 'login', '::1', 1643297734, 1, 0),
(65, 9, NULL, NULL, NULL, 'login', '::1', 1643298078, 1, 0),
(66, 1, NULL, NULL, NULL, 'login', '::1', 1643453527, 1, 0),
(67, 1, NULL, NULL, NULL, 'login', '::1', 1643575145, 1, 0),
(68, 1, NULL, NULL, NULL, 'login', '::1', 1643575462, 1, 0),
(69, 2, NULL, NULL, NULL, 'login', '::1', 1643581603, 1, 0),
(70, 2, NULL, NULL, NULL, 'login', '::1', 1643629313, 1, 0),
(71, 2, NULL, NULL, NULL, 'login', '::1', 1643642726, 1, 0),
(72, 2, NULL, NULL, NULL, 'login', '::1', 1643712441, 1, 0),
(73, 2, NULL, NULL, NULL, 'login', '::1', 1643742583, 1, 0),
(74, 2, NULL, NULL, NULL, 'login', '::1', 1643814014, 1, 0),
(75, 2, NULL, NULL, NULL, 'login', '::1', 1643814567, 1, 0),
(76, 2, NULL, NULL, NULL, 'login', '::1', 1643814667, 1, 0),
(77, 1, NULL, NULL, NULL, 'login', '::1', 1643817110, 1, 0),
(78, 4, NULL, NULL, NULL, 'login', '127.0.0.1', 1643817164, 1, 0),
(79, 2, NULL, NULL, NULL, 'login', '::1', 1643906128, 1, 0),
(80, 2, NULL, NULL, NULL, 'login', '::1', 1644227711, 1, 0),
(81, 4, NULL, NULL, NULL, 'login', '127.0.0.1', 1644400955, 1, 0),
(82, 2, NULL, NULL, NULL, 'login', '::1', 1644408928, 1, 0),
(83, 2, NULL, NULL, NULL, 'login', '::1', 1644507835, 1, 0),
(84, 4, NULL, NULL, NULL, 'login', '127.0.0.1', 1644509539, 1, 0),
(85, 4, NULL, NULL, NULL, 'login', '127.0.0.1', 1644583948, 1, 0),
(86, 2, NULL, NULL, NULL, 'login', '::1', 1644583959, 1, 0),
(87, 4, NULL, NULL, NULL, 'login', '127.0.0.1', 1644852094, 1, 0),
(88, 2, NULL, NULL, NULL, 'login', '::1', 1644852253, 1, 0),
(89, 2, NULL, NULL, NULL, 'login', '::1', 1645004608, 1, 0),
(90, 2, NULL, NULL, NULL, 'login', '::1', 1645101002, 1, 0),
(91, 4, NULL, NULL, NULL, 'login', '127.0.0.1', 1645102752, 1, 0),
(92, 4, NULL, NULL, NULL, 'login', '127.0.0.1', 1645114687, 1, 0),
(93, 4, NULL, NULL, NULL, 'login', '127.0.0.1', 1645128146, 1, 0),
(94, 2, NULL, NULL, NULL, 'login', '::1', 1645128216, 1, 0),
(95, 2, NULL, NULL, NULL, 'login', '::1', 1645196130, 1, 0),
(96, 2, NULL, NULL, NULL, 'login', '::1', 1645211881, 1, 0),
(97, 2, NULL, NULL, NULL, 'login', '::1', 1645280362, 1, 0),
(98, 4, NULL, NULL, NULL, 'login', '127.0.0.1', 1645302676, 1, 0),
(99, 2, NULL, NULL, NULL, 'login', '::1', 1645370910, 1, 0),
(100, 4, NULL, NULL, NULL, 'login', '127.0.0.1', 1645375653, 1, 0),
(101, 4, NULL, NULL, NULL, 'login', '127.0.0.1', 1645455188, 1, 0),
(102, 1, NULL, NULL, NULL, 'login', '::1', 1645455285, 1, 0),
(103, 2, NULL, NULL, NULL, 'login', '::1', 1645460185, 1, 0),
(104, 4, NULL, NULL, NULL, 'login', '::1', 1645460244, 1, 0),
(105, 4, NULL, NULL, NULL, 'login', '::1', 1645462990, 1, 0),
(106, 2, NULL, NULL, NULL, 'login', '::1', 1645521954, 1, 0),
(107, 4, NULL, NULL, NULL, 'login', '::1', 1645521983, 1, 0),
(108, 2, NULL, NULL, NULL, 'login', '::1', 1645537557, 1, 0),
(109, 2, NULL, NULL, NULL, 'login', '::1', 1645539183, 1, 0),
(110, 1, NULL, NULL, NULL, 'login', '::1', 1645539366, 1, 0),
(111, 1, NULL, NULL, NULL, 'login', '::1', 1645539410, 1, 0),
(112, 4, NULL, NULL, NULL, 'login', '::1', 1645539430, 1, 0),
(113, 2, NULL, NULL, NULL, 'login', '::1', 1645609996, 1, 0),
(114, 11, NULL, NULL, NULL, 'login', '::1', 1645624927, 1, 0),
(115, 2, NULL, NULL, NULL, 'login', '::1', 1645714081, 1, 0),
(116, 4, NULL, NULL, NULL, 'login', '::1', 1645719213, 1, 0),
(117, 1, NULL, NULL, NULL, 'login', '::1', 1645719819, 1, 0),
(118, 4, NULL, NULL, NULL, 'login', '::1', 1645719859, 1, 0),
(119, 4, NULL, NULL, NULL, 'login', '::1', 1645719908, 1, 0),
(120, 4, NULL, NULL, NULL, 'login', '::1', 1645779847, 1, 0),
(121, 4, NULL, NULL, NULL, 'login', '::1', 1645788830, 1, 0),
(122, 4, NULL, NULL, NULL, 'login', '::1', 1645803246, 1, 0),
(123, 4, NULL, NULL, NULL, 'login', '::1', 1645857927, 1, 0),
(124, 2, NULL, NULL, NULL, 'login', '::1', 1645860724, 1, 0),
(125, 12, NULL, NULL, NULL, 'login', '::1', 1645865383, 1, 0),
(126, 1, NULL, NULL, NULL, 'login', '::1', 1645865418, 1, 0),
(127, 12, NULL, NULL, NULL, 'login', '::1', 1645865525, 1, 0),
(128, 12, NULL, NULL, NULL, 'login', '::1', 1645867986, 1, 0),
(129, 4, NULL, NULL, NULL, 'login', '::1', 1645875548, 1, 0),
(130, 4, NULL, NULL, NULL, 'login', '::1', 1645888930, 1, 0),
(131, 2, NULL, NULL, NULL, 'login', '::1', 1645902322, 1, 0),
(132, 4, NULL, NULL, NULL, 'login', '::1', 1645902563, 1, 0),
(133, 2, NULL, NULL, NULL, 'login', '::1', 1645959793, 1, 0),
(134, 4, NULL, NULL, NULL, 'login', '::1', 1645959843, 1, 0),
(135, 1, NULL, NULL, NULL, 'login', '::1', 1647582240, 1, 0),
(136, 1, NULL, NULL, NULL, 'login', '::1', 1647606109, 1, 0),
(137, 1, NULL, NULL, NULL, 'login', '::1', 1647606751, 1, 0),
(138, 1, NULL, NULL, NULL, 'login', '::1', 1647606849, 1, 0),
(139, 1, NULL, NULL, NULL, 'login', '::1', 1647670254, 1, 0),
(140, 1, NULL, NULL, NULL, 'login', '::1', 1647670323, 1, 0),
(141, 1, NULL, NULL, NULL, 'login', '::1', 1647675333, 1, 0),
(142, 1, NULL, NULL, NULL, 'login', '::1', 1647682136, 1, 0),
(143, 1, NULL, NULL, NULL, 'login', '::1', 1647692598, 1, 0),
(144, 1, NULL, NULL, NULL, 'login', '::1', 1647768763, 1, 0),
(145, 1, NULL, NULL, NULL, 'login', '::1', 1647779111, 1, 0),
(146, 1, NULL, NULL, NULL, 'login', '::1', 1647841283, 1, 0),
(147, 1, NULL, NULL, NULL, 'login', '::1', 1647848354, 1, 0),
(148, 1, NULL, NULL, NULL, 'login', '::1', 1647854200, 1, 0),
(149, 1, NULL, NULL, NULL, 'login', '::1', 1647859913, 1, 0),
(150, 1, NULL, NULL, NULL, 'login', '::1', 1647874117, 1, 0),
(151, 1, NULL, NULL, NULL, 'login', '::1', 1647874132, 1, 0),
(152, 1, NULL, NULL, NULL, 'login', '::1', 1647926888, 1, 0),
(153, 1, NULL, NULL, NULL, 'login', '::1', 1648022990, 1, 0),
(154, 1, NULL, NULL, NULL, 'login', '::1', 1648026701, 1, 0),
(155, 1, NULL, NULL, NULL, 'login', '::1', 1648028907, 1, 0),
(156, 1, NULL, NULL, NULL, 'login', '::1', 1648046993, 1, 0),
(157, 1, NULL, NULL, NULL, 'login', '::1', 1648107522, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `why_us_tbl`
--

DROP TABLE IF EXISTS `why_us_tbl`;
CREATE TABLE IF NOT EXISTS `why_us_tbl` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `short_desc_en` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_desc_ar` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `is_delete` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_6sw8k5ohu2olrfyqiupm33yrv` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `why_us_tbl`
--

INSERT INTO `why_us_tbl` (`id`, `title_en`, `title_ar`, `short_desc_en`, `short_desc_ar`, `user_id`, `is_active`, `is_delete`, `inserted_at`, `updated_at`) VALUES
(1, 'Trust', 'Trust', 'We are a high performing, high-quality organization\r\ndedicated to employment and human resource services – a\r\ntrusted partner and resource for our customers and our\r\ncommunity.', 'We are a high performing, high-quality organization\r\ndedicated to employment and human resource services – a\r\ntrusted partner and resource for our customers and our\r\ncommunity.', 1, '1', '0', 1648024376, NULL),
(3, 'Integrity', 'Integrity', 'We promise only what we can deliver, and we deliver\r\non every promise. Our business is built on a foundation of honesty\r\nand integrity.', 'We promise only what we can deliver, and we deliver\r\non every promise. Our business is built on a foundation of honesty\r\nand integrity.', 1, '1', '0', 1647679545, NULL),
(2, 'Respect', 'Respect', 'We treat every individual with respect, in every\r\ninteraction.', 'We treat every individual with respect, in every\r\ninteraction.', 1, '1', '0', 1647679527, NULL),
(4, 'Commitment', 'Commitment', 'We are committed to providing solutions for our\r\ncustomers. We exist to meet and solve the challenges our\r\ncustomers face.', 'We are committed to providing solutions for our\r\ncustomers. We exist to meet and solve the challenges our\r\ncustomers face.', 1, '1', '0', 1647679563, NULL),
(5, 'Professionalism', 'Professionalism', 'We are technically qualified, professionals,\r\ncontinuously educating ourselves and preparing for the\r\nchallenges ahead.', 'We are technically qualified, professionals,\r\ncontinuously educating ourselves and preparing for the\r\nchallenges ahead.', 1, '1', '0', 1647679577, NULL),
(6, 'Takes Care', 'Takes Care', 'Our company takes care of all the necessary formalities for the\r\nrecruitment process.', 'Our company takes care of all the necessary formalities for the\r\nrecruitment process.', 1, '1', '0', 1647679631, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `working_hours_tbl`
--

DROP TABLE IF EXISTS `working_hours_tbl`;
CREATE TABLE IF NOT EXISTS `working_hours_tbl` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `saturday_start` varchar(20) DEFAULT NULL,
  `saturday_end` varchar(20) DEFAULT NULL,
  `sunday_start` varchar(20) DEFAULT NULL,
  `sunday_end` varchar(20) DEFAULT NULL,
  `monday_start` varchar(20) DEFAULT NULL,
  `monday_end` varchar(20) DEFAULT NULL,
  `tuesday_start` varchar(20) DEFAULT NULL,
  `tuesday_end` varchar(20) DEFAULT NULL,
  `wednesday_start` varchar(20) DEFAULT NULL,
  `wednesday_end` varchar(20) DEFAULT NULL,
  `thursday_start` varchar(20) DEFAULT NULL,
  `thursday_end` varchar(20) DEFAULT NULL,
  `friday_start` varchar(20) DEFAULT NULL,
  `friday_end` varchar(20) DEFAULT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  `inserted_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `working_hours_tbl`
--

INSERT INTO `working_hours_tbl` (`id`, `user_id`, `saturday_start`, `saturday_end`, `sunday_start`, `sunday_end`, `monday_start`, `monday_end`, `tuesday_start`, `tuesday_end`, `wednesday_start`, `wednesday_end`, `thursday_start`, `thursday_end`, `friday_start`, `friday_end`, `is_active`, `is_delete`, `inserted_at`, `updated_at`) VALUES
(1, 4, '6', '19', '4.5', '18', '9', '23', '9', '23', '9', '23', '5', '22.5', '5', '21.5', '1', '0', 1643124131, 1645905667),
(2, 12, '6', '19', '3', '22.5', '6', '19', '1.5', '23.5', '6', '23.5', '1', '22.5', '', NULL, '1', '0', 1645865904, 1645874122);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
