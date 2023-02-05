-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 04, 2022 at 02:47 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `layouti_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `100things`
--

CREATE TABLE `100things` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `left_titleEn` varchar(255) DEFAULT NULL,
  `left_titleAr` varchar(255) DEFAULT NULL,
  `left_descriptionEn` text,
  `left_descriptionAr` text,
  `right_titleEn` varchar(255) DEFAULT NULL,
  `right_titleAr` varchar(255) DEFAULT NULL,
  `right_descriptionEn` text,
  `right_descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `100things`
--

INSERT INTO `100things` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `left_titleEn`, `left_titleAr`, `left_descriptionEn`, `left_descriptionAr`, `right_titleEn`, `right_titleAr`, `right_descriptionEn`, `right_descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '100 things we have learned the past years', 'Chiquita Butler', 'Holding myself to the highest standards of creative and technical excellence. Everyone, regardless of the scope of his/her lifecycle can expect nothing but the best from what I’ve learned', 'Veritatis iure et ea', 'Opportunity always exists', 'Chastity Hickman', 'Opportunities are always surrounded as well as we are breathing alive. Success is created when preparation meets opportunity. Success star when we company the right people, read the appropriate book, and explore the things we love. Dreams are beautiful, but not enough to exist. Planning needs the mind to think and the body to make…', 'Dolorem aut esse ex', 'Keep it simple, stupid (Kiss)', 'Michelle Sullivan', 'Although “Take it easy ” is a common proverb, Humans didn’t understand it. We usually overcomplicate very simple aspects when we are drawn to unmade decisions or even not existent things. We waste our time comparing unequal things why they aren’t the same. However, simplicity comes from understanding our decision since man is a lazy…', 'Quos culpa sint in a', NULL, '2022-10-21 16:53:22', '2022-11-10 00:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `about_check_out_our_clients`
--

CREATE TABLE `about_check_out_our_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `about_check_out_our_clients`
--

INSERT INTO `about_check_out_our_clients` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Check Out Our Clients', 'Burke Miranda', 'Here are just a few world-class brands we are fortunate to work alongside. Our work has won national awards for these clients\' areas of our work. Will your name be next on this list?', 'Dignissimos nostrum', NULL, '2022-10-30 18:17:50', '2022-11-20 11:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `about_check_out_our_clients_cards`
--

CREATE TABLE `about_check_out_our_clients_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `industryEn` varchar(255) DEFAULT NULL,
  `industryAr` varchar(255) DEFAULT NULL,
  `image` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `about_check_out_our_clients_cards`
--

INSERT INTO `about_check_out_our_clients_cards` (`id`, `descriptionEn`, `descriptionAr`, `industryEn`, `industryAr`, `image`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Benchmarks Gratuity Management and Workplace Savings platform has all of the tools you need to manage your employee’s gratuity, as well as help your employees with their financial wellness.', NULL, 'Financial', NULL, 'media/AboutPage/CheckOutOurClients/1669560291-0-Group.png', 1, NULL, '2022-10-30 18:17:50', '2022-11-27 19:44:51'),
(2, 'Officia hic tempor a', 'Veniam exercitation', 'Kevin Hamilton', 'Dawn Burton', NULL, 1, '2022-10-30 21:59:10', '2022-10-30 21:41:43', '2022-10-30 21:59:10'),
(3, 'Occaecat et qui laud', 'Quisquam fugit culp', 'Madeline Merritt', 'George Boone', NULL, 1, '2022-10-30 21:59:08', '2022-10-30 21:58:32', '2022-10-30 21:59:08'),
(4, 'Eaque delectus non', 'Molestias ex volupta', 'Francis Burgess', 'Lareina Gamble', NULL, 1, '2022-10-30 21:59:04', '2022-10-30 21:58:32', '2022-10-30 21:59:04'),
(5, 'Benchmarks Gratuity Management and Workplace Savings platform has all of the tools you need to manage your employee’s gratuity, as well as help your employees with their financial wellness.', NULL, 'Financial', NULL, 'media/AboutPage/CheckOutOurClients/1669560291-1-Group.png', 1, '2022-11-29 14:56:30', '2022-11-20 11:38:30', '2022-11-29 14:56:30'),
(6, 'One of Layouti’s most important projects is “Scan Smile”. It is a comprehensive system for restaurants starting from the QR Code menu to the financial systems.', 'One of Layouti’s most important projects is “Scan Smile”. It is a comprehensive system for restaurants starting from the QR Code menu to the financial systems.', 'Environmental & Social', 'Environmental & Social', 'media/AboutPage/CheckOutOurClients/1668926310-2-295318917_1975245442668152_956009330081825136_n.jpg', 1, '2022-11-27 19:40:16', '2022-11-20 11:38:30', '2022-11-27 19:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `about_header_contents`
--

CREATE TABLE `about_header_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `about_header_contents`
--

INSERT INTO `about_header_contents` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Our work demonstrates our efficiency and speaks about us', 'Diana Nixon', 'We devote all of our efforts to making our work satisfactory for you. The most beautiful thing is to let our work speak for us.', 'Exercitation esse of', 'media/AboutPage/HeaderContent/1668856693-1- about-page-layouti-image.jpg', NULL, '2022-10-30 18:11:15', '2022-11-19 16:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `about_learn_about_layoutis`
--

CREATE TABLE `about_learn_about_layoutis` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `leftImage` text,
  `rightImage` text,
  `otherDescriptionEn` text,
  `otherDescriptionAr` text,
  `otherLeftImage` text,
  `otherRightImage` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `about_learn_about_layoutis`
--

INSERT INTO `about_learn_about_layoutis` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `leftImage`, `rightImage`, `otherDescriptionEn`, `otherDescriptionAr`, `otherLeftImage`, `otherRightImage`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 'Learn about Layouti from our talented work', 'Barbara Albert2223', 'We are strategic thinkers. We evaluate your business or project, research your competitors, and establish ways to reach new demographics or engage with existing ones. We help launch new businesses or branding. We listen carefully to your ideas and goals and expound on them. We come up with even more unique ideas that help us to improve our UI UX projects. We are more than just experienced marketers, designers, and developers', 'Iusto est eveniet3213231', 'media/AboutPage/LearnAboutLayouti/1668856681-leftImage-2- about-page-layouti-image.jpg', 'media/AboutPage/LearnAboutLayouti/1668856681-rightImage-3- about-page-layouti-image.jpg', 'All you ultimately care about is the outcome not how the sausage gets made. That said, if we stopped there, no one would know what we do at Layouti. So, as not to be too clever for our own good, below is a list of the activities and deliverables that we generally employ to move business for our clients.', 'Exercitation fugiat11111', NULL, NULL, NULL, '2022-10-30 20:24:10', '2022-11-19 16:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `about_page_header_contents`
--

CREATE TABLE `about_page_header_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `about_page_header_contents`
--

INSERT INTO `about_page_header_contents` (`id`, `color`, `titleEn`, `titleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '#4c8765', 'About us.', NULL, NULL, '2022-11-29 13:53:38', '2022-12-01 13:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `about_page_seciton_twos`
--

CREATE TABLE `about_page_seciton_twos` (
  `id` bigint UNSIGNED NOT NULL,
  `titleOneEn` varchar(255) DEFAULT NULL,
  `titleOneAr` varchar(255) DEFAULT NULL,
  `titleTwoEn` varchar(255) DEFAULT NULL,
  `titleTwoAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `about_page_seciton_twos`
--

INSERT INTO `about_page_seciton_twos` (`id`, `titleOneEn`, `titleOneAr`, `titleTwoEn`, `titleTwoAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Still having', NULL, 'second thoughts?', NULL, NULL, '2022-11-30 19:15:30', '2022-12-01 13:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `about_page_seciton_two_cards`
--

CREATE TABLE `about_page_seciton_two_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` text,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `about_page_seciton_two_cards`
--

INSERT INTO `about_page_seciton_two_cards` (`id`, `icon`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'media/EToy/AboutPage/SectionTwo/1669883271-rewarded.png', 'Get rewarded!', NULL, NULL, NULL, 2, NULL, '2022-11-30 19:15:30', '2022-12-01 13:27:51'),
(5, 'media/EToy/AboutPage/SectionTwo/1669818087-1_optimized (1).png', 'ergeg', 'ergerg', 'ergerg', 'regerg', 2, '2022-11-30 20:07:51', '2022-11-30 19:21:27', '2022-11-30 20:07:51'),
(6, 'media/EToy/AboutPage/SectionTwo/1669883271-Free.png', 'Free and simple', NULL, NULL, NULL, 2, NULL, '2022-12-01 13:27:51', '2022-12-01 13:27:51'),
(7, 'media/EToy/AboutPage/SectionTwo/1669883271-Trust.png', 'Trustworthy app', NULL, NULL, NULL, 2, NULL, '2022-12-01 13:27:51', '2022-12-01 13:27:51'),
(8, 'media/EToy/AboutPage/SectionTwo/1669883271-friendly.png', 'Child-friendly environment', NULL, NULL, NULL, 2, NULL, '2022-12-01 13:27:51', '2022-12-01 13:27:51'),
(9, 'media/EToy/AboutPage/SectionTwo/1669883271-different.png', 'Varied toys for kids categories', NULL, NULL, NULL, 2, NULL, '2022-12-01 13:27:51', '2022-12-01 13:27:51'),
(10, 'media/EToy/AboutPage/SectionTwo/1669883271-contact.png', 'Direct contact with toy provider', NULL, NULL, NULL, 2, NULL, '2022-12-01 13:27:51', '2022-12-01 13:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `about_page_section_ones`
--

CREATE TABLE `about_page_section_ones` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `about_page_section_ones`
--

INSERT INTO `about_page_section_ones` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'About eToy App.', '456456', 'eToy is not just an app for kids’ toys; eToy is a community that makes a difference. eToy is an innovative facilitator that connects like-minded people in local areas to swap, gift, or even sell preloved toys for kids – all in a child-friendly environment app.', '456456', 'media/EToy/AboutPage/SectionOne/1669883163-Instagram1.png', NULL, '2022-11-29 13:55:11', '2022-12-01 13:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `about_teams`
--

CREATE TABLE `about_teams` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `about_teams`
--

INSERT INTO `about_teams` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'The team that made Layouti become a reality', 'Drew Kidd', 'Layouti team is a talented and passionate group of UI designers, UX experts, and illustrators who create digital products that make your design workflow faster and easier. Be part of the creativity, ask about Layouti’s team, and be the next!', 'Expedita ut libero n', NULL, '2022-10-30 18:15:06', '2022-11-08 00:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `about_team_cards`
--

CREATE TABLE `about_team_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `nameEn` varchar(255) DEFAULT NULL,
  `nameAr` varchar(255) DEFAULT NULL,
  `jobTitleEn` text,
  `jobTitleAr` text,
  `image` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `about_team_cards`
--

INSERT INTO `about_team_cards` (`id`, `nameEn`, `nameAr`, `jobTitleEn`, `jobTitleAr`, `image`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Yaser Nazzal', 'ياسر نزال', 'Co-founder / CEO', 'المؤسس المشارك / الرئيس التنفيذي', 'media/AboutPage/Team/1668856635-0-Yaser Nazzal - Co-founder & Product Manager.jpg', 1, NULL, '2022-10-30 18:15:06', '2022-11-19 16:17:15'),
(2, 'Joseph Finley', 'Sigourney Haynes', 'Jana Vang', 'Marah Webster', NULL, 1, '2022-10-30 21:48:58', '2022-10-30 20:49:41', '2022-10-30 21:48:58'),
(3, 'Davis George', 'Daphne Cohen', 'Hamish Good', 'Stacy Vargas', NULL, 1, '2022-10-30 21:48:56', '2022-10-30 21:48:44', '2022-10-30 21:48:56'),
(4, 'Dia Nazzal', 'َياسر نزال', 'Co-founder - UX/UI Manager', 'المدير العام UI / UX', 'media/AboutPage/Team/1668856635-1-Dia\' Nazzal - UI:UX Manager & Consutant.jpeg', 1, NULL, '2022-11-03 13:51:58', '2022-11-19 16:17:15'),
(5, 'Mohamed Magdy', 'null', 'Php Laravel Developer', 'null', 'media/AboutPage/Team/1668856635-2-Mohamed Magdy.png', 1, NULL, '2022-11-08 00:42:28', '2022-11-19 16:17:15'),
(6, 'Ahmed Abdelstar', 'null', 'Flutter Developer', 'null', 'media/AboutPage/Team/1668856635-3-WhatsApp Image 2022-04-18 at 11.17.55 AM.jpeg', 1, NULL, '2022-11-08 00:42:28', '2022-11-19 16:17:16'),
(7, 'Mahmoud Elshenawy', NULL, 'React JS Developer', NULL, NULL, 1, '2022-11-19 16:16:41', '2022-11-08 00:42:28', '2022-11-19 16:16:41'),
(8, 'Mostafa Mohamed', 'null', 'React JS Developer', 'null', 'media/AboutPage/Team/1668856636-4-238571847_284436783854504_9111466898965559568_n.jpeg', 1, NULL, '2022-11-08 00:42:28', '2022-11-19 16:17:16'),
(9, 'Esraa El-Menshawy', 'null', 'Copywriter & SEO Specialist', 'null', 'media/AboutPage/Team/1668856636-5-Esraa Gamal - Creation Content:SEO Specialist.png', 1, NULL, '2022-11-08 00:42:28', '2022-11-19 16:17:16'),
(11, 'Wanna Work With Us?', NULL, 'Drop us a line!', NULL, 'media/AboutPage/Team/1669559741-6-Wanna-Work-With-Us----Drop-us-a-line!.png', 1, NULL, '2022-11-27 19:31:11', '2022-11-27 19:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `about_through_our_values`
--

CREATE TABLE `about_through_our_values` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `about_through_our_values`
--

INSERT INTO `about_through_our_values` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Our values. There is no end to knowledge; Nothing is ever “good enough”. We lead the way forward', 'Lester Thomas', NULL, 'Ullamco dolore nostr', NULL, '2022-10-30 18:16:37', '2022-11-19 19:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `about_through_our_values_cards`
--

CREATE TABLE `about_through_our_values_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `nameEn` varchar(255) DEFAULT NULL,
  `nameAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `about_through_our_values_cards`
--

INSERT INTO `about_through_our_values_cards` (`id`, `nameEn`, `nameAr`, `descriptionEn`, `descriptionAr`, `image`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Challenge without limitations', 'dsadas', 'Our creativity is part of the solution. We help our clients by embracing change and innovation. We produce projects capable of competition locally and internationally. We believe that successes and failures, good experiences, and bad experiences make us all stronger.', 'Omnis accusamus cupi', 'media/AboutPage/ThroughOurValues/1668869454-0-challenge-without-limitations-layouti-icon.svg', 1, NULL, '2022-10-30 18:16:37', '2022-11-19 19:50:54'),
(2, 'Jaquelyn Tucker', 'undefined', 'Id ea sapiente expli', 'Eos sed magni ad vol', NULL, 1, '2022-10-30 21:55:40', '2022-10-30 20:55:43', '2022-10-30 21:55:40'),
(3, 'Deanna Joyce', NULL, 'Ab dolorem quae odit', 'Totam totam reiciend', NULL, 1, '2022-10-30 21:55:37', '2022-10-30 21:50:25', '2022-10-30 21:55:37'),
(4, 'Nehru Peters', NULL, 'Nisi qui aliquid in', 'Minus aliquam volupt', NULL, 1, '2022-10-30 21:55:23', '2022-10-30 21:50:25', '2022-10-30 21:55:23'),
(5, 'Aline Stanley', NULL, 'Ullam nostrud ea et', 'Architecto consequat', NULL, 1, '2022-10-30 21:57:07', '2022-10-30 21:56:53', '2022-10-30 21:57:07'),
(6, 'Robin Rodriguez', NULL, 'Obcaecati tempora et', 'Impedit quo magni s', NULL, 1, '2022-10-30 21:57:06', '2022-10-30 21:56:53', '2022-10-30 21:57:06'),
(7, 'Kelsey Melton', NULL, 'Nihil saepe a sed cu', 'Sit similique et ex', NULL, 1, '2022-10-30 21:57:04', '2022-10-30 21:56:53', '2022-10-30 21:57:04'),
(8, 'Learning & Growing', 'null', 'We don’t stop pushing because nothing worth doing is easy. We chase a no-end knowledge to share it with you. We work side by side with people who are driven by excellence. We design the best possible outcomes to take pride in them. This is our work cycle. If you join us you will discover more about Layouti’s procedures.', 'null', 'media/AboutPage/ThroughOurValues/1668869454-1-learning-&-growing-layouti-icon.svg', 1, NULL, '2022-11-02 23:09:36', '2022-11-19 19:50:54'),
(9, 'Focus on the goal', 'null', 'Our guide is based on innovation and imagination. Our attention is concentrated on how technology can make the user experience more meaningful. Truly, we focus on embracing setting higher goals and are thrilled by the vast potential offered by innovation.', 'null', 'media/AboutPage/ThroughOurValues/1668869454-2-focus-on-the-goal-layouti-icon.svg', 1, NULL, '2022-11-02 23:09:36', '2022-11-19 19:50:54'),
(10, 'Listen wisely', 'null', 'We believe in the principles of respect for customers and our business community. Our customer\'s success is also our success. In other words, we put people first and act with integrity. Thus, we listen to the details carefully to reach the required with high efficiency.', 'null', 'media/AboutPage/ThroughOurValues/1668869454-3-listen-wisely-layouti-icon.svg', 1, NULL, '2022-11-02 23:09:36', '2022-11-19 19:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `category` bigint UNSIGNED DEFAULT NULL,
  `author` bigint UNSIGNED DEFAULT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `image` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category`, `author`, `titleEn`, `titleAr`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(34, 3, 9, 'Eum quis non velit t', 'Animi cupidatat et', NULL, NULL, '2022-11-17 17:55:12', '2022-11-17 17:56:55'),
(35, 3, 8, 'Atque ad in nobis ut', 'Ut et incidunt aut', NULL, NULL, '2022-11-17 17:57:42', '2022-11-17 17:57:42'),
(36, 3, 8, 'Ut aperiam sed quis', 'Minim illum totam q', NULL, NULL, '2022-11-17 19:33:44', '2022-11-17 19:33:44'),
(37, 3, 8, 'Aperiam eos labore', 'Temporibus excepteur', NULL, NULL, '2022-11-17 19:36:38', '2022-11-17 19:36:38'),
(38, 3, 8, 'Reiciendis nostrum d', 'Ea culpa officia ar', NULL, NULL, '2022-11-17 19:44:25', '2022-11-17 19:44:25'),
(39, 3, 8, 'Quisquam id explicab', 'Eveniet animi face', NULL, NULL, '2022-11-17 19:46:12', '2022-11-17 19:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `blog_authors`
--

CREATE TABLE `blog_authors` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `nameEn` varchar(255) DEFAULT NULL,
  `nameAr` varchar(255) DEFAULT NULL,
  `positionEn` varchar(255) DEFAULT NULL,
  `positionAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `blog_authors`
--

INSERT INTO `blog_authors` (`id`, `image`, `nameEn`, `nameAr`, `positionEn`, `positionAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'dsad', 'fsdfa', 'fdgsd', 'sdfg', 'sdfgdfg', 'sdfgdf', '2022-11-15 02:04:20', '2022-11-15 02:03:01', '2022-11-15 02:04:20'),
(2, NULL, 'dasd', 'asdfsda', 'safg', 'asdfg', 'asdg', 'asdgfg', '2022-11-15 03:25:35', '2022-11-15 02:04:51', '2022-11-15 03:25:35'),
(3, NULL, 'dasd', 'asdfsda', 'safg', 'asdfg', 'asdg', 'asdgfg', '2022-11-15 03:47:41', '2022-11-15 02:14:44', '2022-11-15 03:47:41'),
(4, NULL, 'Omnis consequat Duc', 'Aspernatur corporis', 'Facilis praesentium', 'Mollitia duis exerci', 'Est laboris proident', 'Quam minim blanditii', '2022-11-15 03:47:43', '2022-11-15 03:21:02', '2022-11-15 03:47:43'),
(5, NULL, 'Aut sint sunt volupt', 'Ex asperiores volupt', 'Fugit praesentium d', 'Deserunt lorem volup', 'Dolor voluptatem aut', 'In lorem ea ad illo', '2022-11-15 03:47:45', '2022-11-15 03:21:37', '2022-11-15 03:47:45'),
(6, NULL, 'Et saepe magnam quia', 'Saepe dicta non laud', 'Enim veniam iure eu', 'Aute aut atque quod', 'Consectetur vel Nam', 'Deleniti autem vel t', '2022-11-15 03:47:47', '2022-11-15 03:22:51', '2022-11-15 03:47:47'),
(7, NULL, 'Non dolor quis eos', 'Dolore enim et aut u', 'Voluptas sunt alias', 'Incididunt placeat', 'Iure velit tempora n', 'Est sit aspernatur', '2022-11-15 03:47:49', '2022-11-15 03:23:08', '2022-11-15 03:47:49'),
(8, 'media/Blog/Author/1668850877-Yaser Nazzal - Co-founder & Product Manager.jpg', 'Yaser Nazzal', NULL, 'Co-founder / Manager UI/UX Design', NULL, 'An obsessed designer with the virtual world that can be turned into reality with smart designs! Adept at creating ideas that no one would have thought of.', NULL, NULL, '2022-11-15 03:24:04', '2022-11-19 14:41:17'),
(9, NULL, 'Suscipit autem error', 'Et mollit dolorum ni', 'Voluptas at exercita', 'Qui ipsum rerum fug', 'Mollitia tenetur sol', 'Quia voluptas odio l', '2022-11-19 14:45:15', '2022-11-15 03:25:45', '2022-11-19 14:45:15'),
(10, NULL, 'Dolore sunt magni de111111111111111222', 'Officiis ullamco qua111111111111', 'Architecto impedit111111111111', 'Non modi fugiat aut11111111111111', 'Quia velit et fugia1111111111111111111', 'Consequat Iste qui', '2022-11-15 03:47:56', '2022-11-15 03:28:04', '2022-11-15 03:47:56'),
(11, NULL, 'Dolore sunt magni de1111111', 'Officiis ullamco qua1111111111', 'Architecto impedit11111', 'Non modi fugiat aut111', 'Quia velit et fugia111', 'Consequat Iste qui111', '2022-11-15 03:47:52', '2022-11-15 03:28:18', '2022-11-15 03:47:52'),
(12, NULL, 'Possimus possimus', 'Veniam quae volupta', 'Est modi ut in non', 'Quis quia dolor saep', 'Esse cum consequatur', 'Explicabo Rerum qui', '2022-11-15 03:47:54', '2022-11-15 03:47:37', '2022-11-15 03:47:54'),
(13, 'media/Blog/Author/1668853823-1668850467-Layouti Admin-logo-layouti-design.png', 'Layouti', 'Layouti', 'manager', 'مدير', 'manager', 'manager', NULL, '2022-11-19 15:30:23', '2022-11-19 15:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `nameEn` varchar(255) DEFAULT NULL,
  `nameAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `nameEn`, `nameAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'dssd', 'dfdf', '2022-11-15 02:02:31', '2022-11-15 02:00:12', '2022-11-15 02:02:31'),
(2, 'dfgfd', 'ggf', '2022-11-15 02:13:56', '2022-11-15 02:07:23', '2022-11-15 02:13:56'),
(3, 'Layouti blog', 'Quae est assumenda s', NULL, '2022-11-15 02:08:53', '2022-11-19 15:48:14'),
(4, 'Case Study', 'Omnis sit eum quod', NULL, '2022-11-15 02:09:55', '2022-11-19 15:48:21'),
(5, 'dfgfd', 'ggf', '2022-11-15 02:13:45', '2022-11-15 02:13:18', '2022-11-15 02:13:45'),
(6, 'Processes & Tools', 'Processes & Tools', NULL, '2022-11-19 15:48:55', '2022-11-19 15:48:55'),
(7, 'UI Design', 'UI Design', NULL, '2022-11-19 15:49:02', '2022-11-19 15:49:02'),
(8, 'UX Design', 'UX Design', NULL, '2022-11-19 15:49:09', '2022-11-19 15:49:09'),
(9, 'eBook UI Design', 'eBook UI Design', NULL, '2022-11-19 15:49:25', '2022-11-19 15:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

CREATE TABLE `blog_images` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `blog` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `blog_images`
--

INSERT INTO `blog_images` (`id`, `image`, `blog`, `deleted_at`, `created_at`, `updated_at`) VALUES
(18, NULL, 34, NULL, '2022-11-17 17:55:12', '2022-11-17 17:55:12'),
(19, NULL, 34, NULL, '2022-11-17 17:55:12', '2022-11-17 17:55:12'),
(20, NULL, 34, NULL, '2022-11-17 17:55:12', '2022-11-17 17:55:12'),
(21, NULL, 34, NULL, '2022-11-17 17:55:12', '2022-11-17 17:55:12'),
(22, NULL, 39, NULL, '2022-11-17 19:46:12', '2022-11-17 19:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `blog_paragraphs`
--

CREATE TABLE `blog_paragraphs` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `blog` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `blog_paragraphs`
--

INSERT INTO `blog_paragraphs` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `blog`, `deleted_at`, `created_at`, `updated_at`) VALUES
(34, 'Amet assumenda ut l', 'Aut perferendis ut d', 'Voluptatum non et do', 'Ipsum et duis quis', 34, NULL, '2022-11-17 17:55:12', '2022-11-17 17:55:12'),
(35, 'Alias dolore consequ', 'Nemo distinctio Ill', 'Ut molestiae vitae d', 'In iusto corporis qu', 34, NULL, '2022-11-17 17:55:12', '2022-11-17 17:55:12'),
(36, 'Cumque quo reprehend', 'Qui nihil cupidatat', 'Expedita voluptas pa', 'Veniam a accusamus', 35, NULL, '2022-11-17 17:57:42', '2022-11-17 17:57:42'),
(37, 'Fugiat veniam ad q', 'Totam ipsum volupta', 'Totam id eu saepe qu', 'Qui molestiae et acc', 36, NULL, '2022-11-17 19:33:44', '2022-11-17 19:33:44'),
(38, 'Sed possimus quia a', 'Ipsa eu rerum earum', 'Consectetur ut repre', 'Tempore voluptas cu', 37, NULL, '2022-11-17 19:36:38', '2022-11-17 19:36:38'),
(39, 'Aliquam sit volupta', 'Aut rerum aut volupt', 'Accusamus pariatur', 'Animi quasi assumen', 38, NULL, '2022-11-17 19:44:25', '2022-11-17 19:44:25'),
(40, 'Non minim itaque do', 'Duis aut aute ad ver', 'Tempore eu eum sapi', 'Nihil hic dolore dol', 39, NULL, '2022-11-17 19:46:12', '2022-11-17 19:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `blog_paragraph_images`
--

CREATE TABLE `blog_paragraph_images` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `blog_paragraph_seos`
--

CREATE TABLE `blog_paragraph_seos` (
  `id` bigint UNSIGNED NOT NULL,
  `focusKeypharseEn` varchar(255) DEFAULT NULL,
  `focusKeypharseAr` varchar(255) DEFAULT NULL,
  `seoTitleEn` varchar(255) DEFAULT NULL,
  `seoTitleAr` varchar(255) DEFAULT NULL,
  `slugEn` varchar(255) DEFAULT NULL,
  `slugAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `facebookImage` text,
  `facebookTitleEn` varchar(255) DEFAULT NULL,
  `facebookTitleAr` varchar(255) DEFAULT NULL,
  `facebookDescriptionEn` text,
  `facebookDescriptionAr` text,
  `blog` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `blog_paragraph_seos`
--

INSERT INTO `blog_paragraph_seos` (`id`, `focusKeypharseEn`, `focusKeypharseAr`, `seoTitleEn`, `seoTitleAr`, `slugEn`, `slugAr`, `descriptionEn`, `descriptionAr`, `facebookImage`, `facebookTitleEn`, `facebookTitleAr`, `facebookDescriptionEn`, `facebookDescriptionAr`, `blog`, `deleted_at`, `created_at`, `updated_at`) VALUES
(10, 'Kasimir Cooley', 'Chava Miranda', 'Dawn Contreras', 'Jade Hatfield', 'Yael Day', 'Kyra Whitehead', 'Nesciunt mollitia d', 'Deleniti provident', NULL, 'Rahim Calderon', 'Brittany Ashley', 'Dolores delectus ni', 'Mollit est et aut q', 34, NULL, '2022-11-17 17:55:12', '2022-11-17 17:56:55'),
(11, 'Zena Cantu', 'Jocelyn Thomas', 'Hedda Anderson', 'Evan Mendez', 'Jillian May', 'Charity Luna', 'Quia libero est haru', 'Ex sunt aliquam aliq', NULL, 'Giselle Mcmillan', 'Sophia Robbins', 'Commodi fuga Ducimu', 'Pariatur Ullamco ex', 35, NULL, '2022-11-17 17:57:42', '2022-11-17 18:00:42'),
(12, 'Dakota Mullins', 'Karleigh Navarro', 'Quemby Bradshaw', 'Alma Dudley', 'Kelsey Combs', 'Camden Page', 'Optio dolorum ea nu', 'Reprehenderit et di', NULL, 'Tamara Everett', 'Rafael Rivas', 'Temporibus inventore', 'Dolores qui rerum ea', 36, NULL, '2022-11-17 19:33:44', '2022-11-17 19:34:03'),
(13, 'Lacy Conley', 'Harlan Whitaker', 'Rashad Maxwell', 'Cairo Terry', 'Abra Moses', 'Josiah Baker', 'Necessitatibus ut fa', 'Cupiditate totam cor', NULL, 'Echo Perez', 'Keegan Phelps', 'Est et nesciunt sit', 'Optio delectus lab', 37, NULL, '2022-11-17 19:36:38', '2022-11-17 19:37:29'),
(14, 'Jin Coffey', 'Cullen Casey', 'Rachel Cleveland', 'Rigel Gray', 'Gwendolyn Watts', 'Odessa Summers', 'Irure cumque consect', 'Qui sed eos voluptas', NULL, 'Raymond Phelps', 'Rae Waters', 'Hic cillum aute quid', 'Pariatur Dolore rer', 38, NULL, '2022-11-17 19:44:25', '2022-11-17 19:44:25'),
(15, 'Daria Pennington', 'Lucian Ramirez', 'Tasha House', 'Kasper Ramos', 'Dolan Clark', 'Piper Holloway', 'Maiores maiores exce', 'Aute explicabo Temp', NULL, 'Chaney Horton', 'Gray Ford', 'Fugiat quos adipisci', 'Tempore facilis ut', 39, NULL, '2022-11-17 19:46:12', '2022-11-17 19:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_eighteens`
--

CREATE TABLE `body_design_app_section_eighteens` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `staticColor` varchar(255) DEFAULT NULL,
  `hoverColor` varchar(255) DEFAULT NULL,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_eighteens`
--

INSERT INTO `body_design_app_section_eighteens` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `staticColor`, `hoverColor`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(56, 'Enim reiciendis qui', 'Maiores soluta et ve', 'Libero ipsum laboru', 'Quisquam est dolore', '#43618c', '#f07677', 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(57, NULL, NULL, NULL, NULL, '#000000', '#000000', 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(58, 'Save time', NULL, 'To get the most out of your product you\'ll need an all-in-one delivery management tool. We designed dicided to design mobile applications both.', NULL, '#fbfbfb', '#ec7863', 71, 111, NULL, '2022-11-20 18:52:14', '2022-11-20 19:06:33'),
(59, 'Save time', NULL, 'To get the most out of your product you\'ll need an all-in-one delivery management tool. We designed dicided to design mobile applications both.', NULL, '#fbfbfb', '#ec7863', 71, 111, NULL, '2022-11-20 19:06:33', '2022-11-20 19:06:33'),
(60, 'Save time', NULL, 'To get the most out of your product you\'ll need an all-in-one delivery management tool. We designed dicided to design mobile applications both.', NULL, '#fbfbfb', '#ec7863', 71, 111, NULL, '2022-11-20 19:06:34', '2022-11-20 19:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_eights`
--

CREATE TABLE `body_design_app_section_eights` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `color` varchar(255) DEFAULT NULL,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_eights`
--

INSERT INTO `body_design_app_section_eights` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `color`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(61, 'Voluptates ipsa quo', 'Possimus quaerat ne', 'Cumque voluptate mag', 'Perspiciatis rerum', '#a372e4', 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(62, NULL, NULL, NULL, NULL, '#000000', 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(63, 'Challenges & Objectives', 'Challenges & Objectives', 'Donors can\'t find a way to find students in need. Donors can\'t be sure that the money they are donating will be used in education only.\r\nStudents find the university fees very high that they can\'t afford it and find no way to reach out to donors to help them.', 'Donors can\'t find a way to find students in need. Donors can\'t be sure that the money they are donating will be used in education only.\r\nStudents find the university fees very high that they can\'t afford it and find no way to reach out to donors to help them.', '#000000', 71, 111, NULL, '2022-11-20 18:02:57', '2022-11-20 18:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_elevens`
--

CREATE TABLE `body_design_app_section_elevens` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_elevens`
--

INSERT INTO `body_design_app_section_elevens` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(62, 'Quidem similique eve', 'Dolore tenetur qui e', 'Cupiditate excepturi', 'Optio voluptas quis', 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(63, NULL, NULL, NULL, NULL, 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(64, 'Brand Strategy', NULL, 'In this phase I have collected all the requirements about the app by meeting with project stakeholders and owners to define the following: Project Vision and Goals, and A measure of Success.', NULL, 71, 111, NULL, '2022-11-20 18:06:28', '2022-11-21 16:41:12'),
(65, 'sdfdsfsdfsdfsdf', 'sdfsdfsdffsdf', 'sdfsdfsdfffffffffffffff', 'sdfsdfdsfsdfdsfsdffffffffffffffffffff', 71, 111, '2022-11-20 18:59:01', '2022-11-20 18:52:13', '2022-11-20 18:59:01'),
(66, 'UX Research', 'fsdfsdfsdf', 'After collecting all the information I have conducted interviews with the stakeholders and some students to know more about their needs, pains, and frustrations.  Moreover, I have interviews with donors who want to donate their money to students to know more about their experiences and their expectations.', NULL, 71, 111, NULL, '2022-11-21 12:55:38', '2022-11-21 16:41:12'),
(67, 'User Survey', NULL, 'What difficulties did you face when paying university fees?\r\nHave you ever search for donors to help you with paying your education fees?\r\nHave you ever get a donation for your education?\r\nHow did you receive the money?\r\nIf you got donation money, are you going to spend them on education?', NULL, 71, 111, NULL, '2022-11-21 16:41:12', '2022-11-21 16:41:12'),
(68, 'UX Analysis', NULL, 'Creating personas and scenarios as they are vital to the success of the app because they drive design decisions by taking common user needs and bringing them to the forefront of planning before the design has actually started.', NULL, 71, 111, NULL, '2022-11-21 16:41:12', '2022-11-21 16:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_fifteens`
--

CREATE TABLE `body_design_app_section_fifteens` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_fifteens`
--

INSERT INTO `body_design_app_section_fifteens` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(56, 'Eaque officiis nesci', 'Enim doloremque aut', 'Culpa harum aliqua', 'Eum dolorem aliquid', NULL, 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(57, NULL, NULL, NULL, NULL, NULL, 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(58, 'User Flow', 'hhhh', NULL, 'hhhhh', 'media/ProductPage/SectionFifteen/1668952615-0-Group 7119.png', 71, 111, NULL, '2022-11-20 18:52:13', '2022-11-20 18:56:55'),
(59, 'Mobile Apps', NULL, 'To get the most out of your product you\'ll need an all-in-one delivery management tool. We designed dicided to design mobile applications both for User and mangements where everyone within its network is able to access its emergency cash services.  The other side they can see all requests from the user demande and start the pregress to give these user what they need', NULL, 'media/ProductPage/SectionFifteen/1668953193-1-Group 7936 (3).png', 71, 111, NULL, '2022-11-20 19:06:33', '2022-11-20 19:06:33'),
(60, 'Persona', NULL, NULL, NULL, 'media/ProductPage/SectionFifteen/1668953739-2-Group 1907.png', 71, 111, NULL, '2022-11-20 19:15:40', '2022-11-20 19:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_fives`
--

CREATE TABLE `body_design_app_section_fives` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_fives`
--

INSERT INTO `body_design_app_section_fives` (`id`, `image`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(61, NULL, 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(62, NULL, 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(63, 'media/ProductPage/SectionFive/1668950930-Group 7935.png', 71, 111, NULL, '2022-11-20 18:02:57', '2022-11-20 18:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_fours`
--

CREATE TABLE `body_design_app_section_fours` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `deliverable` text,
  `color` varchar(255) DEFAULT NULL,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_fours`
--

INSERT INTO `body_design_app_section_fours` (`id`, `titleEn`, `titleAr`, `deliverable`, `color`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 'Necessitatibus optio', 'Et labore sed pariat', '[\"2\",\"8\",\"6\",\"10\",\"9\"]', '#d872ce', 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(10, NULL, NULL, '[\"7\",\"8\",\"9\",\"10\",\"11\",\"12\"]', '#000000', 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:36:07'),
(11, 'Deliverables', 'Deliverables', '[\"2\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"12\"]', '#a73535', 71, 111, NULL, '2022-11-20 18:02:57', '2022-11-21 16:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_fourteens`
--

CREATE TABLE `body_design_app_section_fourteens` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_fourteens`
--

INSERT INTO `body_design_app_section_fourteens` (`id`, `titleEn`, `titleAr`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(49, 'Nisi dolore ipsa et', 'Velit sunt ea elige', 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(50, NULL, NULL, 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(51, 'By using etoy app you will be able to do the following', 'ggggggg', 71, 111, NULL, '2022-11-20 18:02:57', '2022-11-20 18:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_fourteen_cards`
--

CREATE TABLE `body_design_app_section_fourteen_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `pointEn` varchar(255) DEFAULT NULL,
  `pointAr` varchar(255) DEFAULT NULL,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_fourteen_cards`
--

INSERT INTO `body_design_app_section_fourteen_cards` (`id`, `pointEn`, `pointAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(56, 'Voluptatem incididu', 'At animi esse anim', 49, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(57, NULL, NULL, 50, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(58, 'To sell your kid’s unused toys and earn some money.', 'ggggggggg', 51, '2022-11-21 13:00:45', '2022-11-20 18:02:57', '2022-11-21 13:00:45'),
(59, 'Either swapping a toy or giving it up you will earn points where you can redeem them later.', 'hhhhhh', 51, '2022-11-21 13:00:58', '2022-11-20 18:52:13', '2022-11-21 13:00:58'),
(60, 'hhhhhhhh', 'hhhhhhhh', 51, '2022-11-20 18:56:14', '2022-11-20 18:52:13', '2022-11-20 18:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_nines`
--

CREATE TABLE `body_design_app_section_nines` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `staticColor` varchar(255) DEFAULT NULL,
  `hoverColor` varchar(255) DEFAULT NULL,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_nines`
--

INSERT INTO `body_design_app_section_nines` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `staticColor`, `hoverColor`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(62, 'Quas consequat Obca', 'Nisi qui velit conse', 'Anim non in autem ei', 'Libero quo mollit no', '#f77bc4', '#df3179', 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(63, NULL, NULL, NULL, NULL, '#000000', '#000000', 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(64, 'Save time', 'Save time', 'To get the most out of your product you\'ll need an all-in-one delivery management tool. We designed dicided to design mobile applications both.', 'To get the most out of your product you\'ll need an all-in-one delivery management tool. We designed dicided to design mobile applications both.', '#b44b4b', '#e03e3e', 71, 111, NULL, '2022-11-20 18:06:28', '2022-11-20 18:06:28'),
(65, 'Save time', NULL, 'To get the most out of your product you\'ll need an all-in-one delivery management tool. We designed dicided to design mobile applications both.', NULL, '#812222', '#a33838', 71, 111, NULL, '2022-11-20 18:30:26', '2022-11-21 12:55:38'),
(66, 'Save time', 'Save time', 'To get the most out of your product you\'ll need an all-in-one delivery management tool. We designed dicided to design mobile applications both.', 'To get the most out of your product you\'ll need an all-in-one delivery management tool. We designed dicided to design mobile applications both.', '#f2f2f2', '#f2f2f2', 71, 111, NULL, '2022-11-20 18:30:26', '2022-11-20 18:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_ones`
--

CREATE TABLE `body_design_app_section_ones` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `subTitleEn` varchar(255) DEFAULT NULL,
  `subTitleAr` varchar(255) DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_ones`
--

INSERT INTO `body_design_app_section_ones` (`id`, `titleEn`, `titleAr`, `subTitleEn`, `subTitleAr`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(65, 'Dolore ea rerum magn', 'Consequatur dolores', 'Natus voluptas nulla', 'Aliquip velit ullamc', 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(66, NULL, NULL, NULL, NULL, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(67, NULL, NULL, NULL, NULL, 107, NULL, '2022-11-16 18:13:08', '2022-11-16 18:13:08'),
(68, NULL, NULL, NULL, NULL, 108, NULL, '2022-11-16 18:18:46', '2022-11-16 18:18:46'),
(69, NULL, NULL, NULL, NULL, 109, NULL, '2022-11-16 18:19:37', '2022-11-16 18:19:37'),
(70, NULL, NULL, NULL, NULL, 110, NULL, '2022-11-20 15:14:18', '2022-11-20 15:14:18'),
(71, 'Intorducing', 'Intorducing', 'The main goals of etoy app are as the following:', 'The main goals of etoy app are as the following:', 111, NULL, '2022-11-20 15:22:49', '2022-11-20 17:56:38'),
(72, NULL, NULL, NULL, NULL, 112, NULL, '2022-11-20 15:30:08', '2022-11-20 15:30:08'),
(73, NULL, NULL, NULL, NULL, 113, NULL, '2022-11-20 15:37:39', '2022-11-20 15:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_sevens`
--

CREATE TABLE `body_design_app_section_sevens` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_sevens`
--

INSERT INTO `body_design_app_section_sevens` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(61, 'Ut et alias dolores', 'Qui libero itaque to', 'Nulla officia eius e', 'Beatae et eos rerum', 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(62, NULL, NULL, NULL, NULL, 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(63, 'What is etoyapp?', 'What is etoyapp?', 'EyePIN (People in-need) is a mobile application aims to help students in Jordan to study and complete their education. Where donors can donate money for education and so students will take these donations to continue their education.', 'EyePIN (People in-need) is a mobile application aims to help students in Jordan to study and complete their education. Where donors can donate money for education and so students will take these donations to continue their education.', 71, 111, NULL, '2022-11-20 18:02:57', '2022-11-20 18:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_seventeens`
--

CREATE TABLE `body_design_app_section_seventeens` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_seventeens`
--

INSERT INTO `body_design_app_section_seventeens` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(56, 'At dolore possimus', 'Deserunt laudantium', 'Esse enim doloribus', 'Veritatis id dolore', 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(57, NULL, NULL, NULL, NULL, 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(58, 'Results', 'jjjjj', NULL, NULL, 71, 111, NULL, '2022-11-20 18:02:57', '2022-11-20 19:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_sixes`
--

CREATE TABLE `body_design_app_section_sixes` (
  `id` bigint UNSIGNED NOT NULL,
  `labelEn` varchar(255) DEFAULT NULL,
  `labelAr` varchar(255) DEFAULT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_sixes`
--

INSERT INTO `body_design_app_section_sixes` (`id`, `labelEn`, `labelAr`, `titleEn`, `titleAr`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(64, 'Iste doloremque qui', 'Doloremque unde sed', 'Eum hic ea impedit', 'Eum hic ea impedit', 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(65, NULL, NULL, NULL, NULL, 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(66, 'team size', NULL, '2+', '2+', 71, 111, NULL, '2022-11-20 18:06:28', '2022-11-20 18:06:28'),
(67, 'Time', NULL, '1 Month', '1 Month', 71, 111, NULL, '2022-11-20 18:43:38', '2022-11-20 18:43:38'),
(68, 'Sector', NULL, 'Environmental', 'Environmental', 71, 111, NULL, '2022-11-20 18:43:38', '2022-11-20 18:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_sixteens`
--

CREATE TABLE `body_design_app_section_sixteens` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_sixteens`
--

INSERT INTO `body_design_app_section_sixteens` (`id`, `image`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(56, NULL, 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(57, NULL, 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(58, 'media/ProductPage/SectionSixteen/1668953269-Group 7199.png', 71, 111, NULL, '2022-11-20 18:02:57', '2022-11-20 19:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_tens`
--

CREATE TABLE `body_design_app_section_tens` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `image` text,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_tens`
--

INSERT INTO `body_design_app_section_tens` (`id`, `titleEn`, `titleAr`, `image`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(61, 'Qui sint aut duis ni', 'Qui animi ut simili', NULL, 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(62, NULL, NULL, NULL, 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(63, 'Let`s check etoyapp process', NULL, 'media/ProductPage/SectionTen/1668953193-Group 7934.png', 71, 111, NULL, '2022-11-20 18:02:57', '2022-11-20 19:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_thirteens`
--

CREATE TABLE `body_design_app_section_thirteens` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_thirteens`
--

INSERT INTO `body_design_app_section_thirteens` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(61, 'Amet beatae quia to', 'Proident totam aspe', 'Quia tempore facere', 'Sed ab maxime veniam', 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(62, NULL, NULL, NULL, NULL, 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(63, 'Business strategy', 'dddddddddgggggggg', 'etoy app is a platform mainly for parents who are looking for new toys for their kids and at the same time, they don’t know what to do with their unused kid\'s toys.', 'ggggggg', 71, 111, NULL, '2022-11-20 18:02:57', '2022-11-20 18:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_threes`
--

CREATE TABLE `body_design_app_section_threes` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_threes`
--

INSERT INTO `body_design_app_section_threes` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(63, 'Eu odit sapiente nis', 'Eiusmod deserunt cor', 'Aut assumenda molest', 'Nulla suscipit dicta', 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(64, NULL, NULL, NULL, NULL, 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(65, NULL, NULL, NULL, NULL, 67, 107, NULL, '2022-11-16 18:13:08', '2022-11-16 18:13:08'),
(66, NULL, NULL, NULL, NULL, 68, 108, NULL, '2022-11-16 18:18:46', '2022-11-16 18:18:46'),
(67, NULL, NULL, NULL, NULL, 69, 109, NULL, '2022-11-16 18:19:37', '2022-11-16 18:19:37'),
(68, NULL, NULL, NULL, NULL, 70, 110, NULL, '2022-11-20 15:14:18', '2022-11-20 15:14:18'),
(69, 'Task description', 'Task description', 'Donors can\'t find a way to find students in need. Donors can\'t be sure that the money they are donating will be used in education only. \r\nStudents find the university fees very high that they can\'t afford it and find no way to reach out to donors to help them.', 'Donors can\'t find a way to find students in need. Donors can\'t be sure that the money they are donating will be used in education only. \r\nStudents find the university fees very high that they can\'t afford it and find no way to reach out to donors to help them.', 71, 111, NULL, '2022-11-20 15:22:49', '2022-11-20 17:56:38'),
(70, NULL, NULL, NULL, NULL, 72, 112, NULL, '2022-11-20 15:30:08', '2022-11-20 15:30:08'),
(71, NULL, NULL, NULL, NULL, 73, 113, NULL, '2022-11-20 15:37:39', '2022-11-20 15:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_twelves`
--

CREATE TABLE `body_design_app_section_twelves` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_twelves`
--

INSERT INTO `body_design_app_section_twelves` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(61, 'Soluta cumque adipis', 'Dolorem provident r', 'Facere in eu qui dol', 'Aperiam ad qui ea re', NULL, 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(62, NULL, NULL, NULL, NULL, NULL, 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(63, 'Main features', 'ddddddddddddddddddddddddddd', 'To swap any toy you have with other toys so decluttering your home. Even though you can give up any toy and make another child happy. Moreover, sharing your experience with others by rating any user you have a deal with, will give you more points to redeem later for lovely gifts.', 'dddddddddddddddddddd', 'media/ProductPage/SectionTwelve/1668952333-Group 7935.png', 71, 111, NULL, '2022-11-20 18:02:57', '2022-11-20 18:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `body_design_app_section_twos`
--

CREATE TABLE `body_design_app_section_twos` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `pointEn` varchar(255) DEFAULT NULL,
  `pointAr` varchar(255) DEFAULT NULL,
  `body` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `body_design_app_section_twos`
--

INSERT INTO `body_design_app_section_twos` (`id`, `titleEn`, `titleAr`, `pointEn`, `pointAr`, `body`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(68, 'Nisi quia officiis o', 'Fugiat architecto lo', 'Enim duis reprehende', 'Sit duis mollitia qu', 65, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(69, NULL, NULL, NULL, NULL, 66, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(70, NULL, NULL, NULL, NULL, 67, 107, NULL, '2022-11-16 18:13:08', '2022-11-16 18:13:08'),
(71, NULL, NULL, NULL, NULL, 68, 108, NULL, '2022-11-16 18:18:46', '2022-11-16 18:18:46'),
(72, NULL, NULL, NULL, NULL, 69, 109, NULL, '2022-11-16 18:19:37', '2022-11-16 18:19:37'),
(73, NULL, NULL, NULL, NULL, 70, 110, NULL, '2022-11-20 15:14:18', '2022-11-20 15:14:18'),
(74, 'Clutter-Free Home', 'return the toys your child has outgrown and receive a more developmentally-advanced collection.', 'return the toys your child has outgrown and receive a more developmentally-advanced collection.', 'return the toys your child has outgrown and receive a more developmentally-advanced collection.', 71, 111, NULL, '2022-11-20 15:22:49', '2022-11-20 18:26:42'),
(75, NULL, NULL, NULL, NULL, 72, 112, NULL, '2022-11-20 15:30:08', '2022-11-20 15:30:08'),
(76, NULL, NULL, NULL, NULL, 73, 113, NULL, '2022-11-20 15:37:39', '2022-11-20 15:37:39'),
(77, 'Save & Earn Money', NULL, 'sell the toys your child doesn’t need and earn money.', NULL, 71, 111, NULL, '2022-11-20 18:26:42', '2022-11-20 18:26:42'),
(78, 'Help the Planet', NULL, 'Re-use toys, reduce packaging, support sustainable brands.', NULL, 71, 111, NULL, '2022-11-20 18:26:42', '2022-11-20 18:26:42'),
(79, 'Minimalism', NULL, 'with fewer toys, your children will be more creative, Learn lessons on sharing, and develop greater attention spans.', NULL, 71, 111, NULL, '2022-11-20 18:26:42', '2022-11-20 18:26:42');

-- --------------------------------------------------------

--
-- Table structure for table `contact_company_decks`
--

CREATE TABLE `contact_company_decks` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `pdf` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact_company_decks`
--

INSERT INTO `contact_company_decks` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `pdf`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Company deck', 'Cleo Goff', 'If you need a quick overview of the Layouti Design in one sharable PDF file.', 'Reprehenderit lorem', 'media/ContactPage/CompanyDeck/Images/1668857122-100-things-page-layouti-image.jpg', 'https://drive.google.com/file/d/1lmbGUCpGDutz5B5KQ0XzYXkZOoMpiJLr/view?usp=share_link', NULL, '2022-11-03 18:38:57', '2022-11-19 16:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `contact_f_a_qs`
--

CREATE TABLE `contact_f_a_qs` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact_f_a_qs`
--

INSERT INTO `contact_f_a_qs` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Frequently Asked Questions (FQA’s)', 'الأسئلة المتداولة (FQA’s)', 'Below you’ll find answers to commonly raised questions. If you’re a new or existing customer, feed your curiosity. Keep asking questions, because, with every answer you find, more questions will arise!', 'ستجد أدناه إجابات للأسئلة الشائعة. إذا كنت عميلاً جديدًا أو حاليًّا ، فقم بإثراء فضولك. استمر في طرح الأسئلة ، لأنه مع كل إجابة تجدها ، ستظهر المزيد من الأسئلة!', NULL, '2022-11-05 18:47:11', '2022-11-10 00:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `contact_f_a_qs_cards`
--

CREATE TABLE `contact_f_a_qs_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `questionEn` varchar(255) DEFAULT NULL,
  `questionAr` varchar(255) DEFAULT NULL,
  `category` bigint UNSIGNED DEFAULT NULL,
  `answerEn` text,
  `answerAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact_f_a_qs_cards`
--

INSERT INTO `contact_f_a_qs_cards` (`id`, `questionEn`, `questionAr`, `category`, `answerEn`, `answerAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Can you handle all the marketing and advertising aspects of a business?', NULL, 2, '<p>To be honest, our services don’t&nbsp;include a full interactive marketing service. Yet, when it comes to selecting a full-service agency, we are happy to inform you of the right agency.</p>', '<p><br></p>', 1, NULL, '2022-11-05 18:47:11', '2022-11-16 18:58:41'),
(2, 'Audra Nolan', 'Morgan Oneill', 2, '<p>Aut qui esse, nostru.</p>', '<p>Aliqua. Et odio aliq.</p>', 1, '2022-11-09 17:19:19', '2022-11-05 21:36:49', '2022-11-09 17:19:19'),
(3, 'Hyacinth Wilcox', 'Lara Small', 2, '<p>Sint, nesciunt, volu.</p>', '<p>Expedita aperiam ven.</p>', 1, '2022-11-09 17:21:58', '2022-11-05 21:36:49', '2022-11-09 17:21:58'),
(4, 'Shaeleigh Durham', 'Whilemina Stone', 2, '<p>Fugiat molestiae sus.</p>', '<p>Ab commodi occaecat .</p>', 1, '2022-11-09 17:22:14', '2022-11-05 21:36:49', '2022-11-09 17:22:14'),
(5, 'Cain Mckenzie', 'Wyoming Conner', 5, '<p>Tempore, non et poss.</p>', '<p>Minus voluptatem, qu.</p>', 1, '2022-11-09 17:22:12', '2022-11-05 21:36:49', '2022-11-09 17:22:12'),
(6, 'Joelle Velasquez', 'Anastasia Fernandez', 2, '<p>Debitis maiores amet.</p>', '<p>Enim minus sit, est .</p>', 1, '2022-11-09 17:22:10', '2022-11-05 21:36:49', '2022-11-09 17:22:10'),
(7, 'Katelyn Lowe', 'Danielle Petty', 5, '<p>Ea fugit, ut eiusmod.</p>', '<p>Harum velit ut nemo .</p>', 1, '2022-11-09 17:22:08', '2022-11-05 21:36:49', '2022-11-09 17:22:08'),
(8, 'Martin Nieves', 'Ariana Francis', 2, '<p>Deserunt at harum qu.</p>', '<p>Laboris inventore mo.</p>', 1, '2022-11-10 00:23:58', '2022-11-09 18:49:35', '2022-11-10 00:23:58'),
(9, 'Davis Bell', 'Nicholas Haynes', 2, '<p>Officia unde volupta.</p>', '<p>Modi cupiditate sed .</p>', 1, '2022-11-10 00:23:46', '2022-11-09 18:49:35', '2022-11-10 00:23:46'),
(10, 'Ivana Casey', 'Bethany Hunt', 2, '<p>Et ea sed fugiat ess.</p>', '<p>Unde fuga. Nihil imp.</p>', 1, '2022-11-10 00:23:53', '2022-11-09 18:49:35', '2022-11-10 00:23:53'),
(11, 'How do you price a service?', NULL, 2, '<p>Firstly, we hold face-to-face calls aiming to understand your need and negotiate freely with you. Your details and desired implementations usually&nbsp;sit the price of your service. We avoid hidden fees and overprices&nbsp;with step-by-step check out&nbsp;for the project.&nbsp;In the case of larger projects, we install the price.&nbsp;Before starting a project, a deposit is required.&nbsp;&nbsp;</p>', '<p>Firstly, we hold face-to-face calls aiming to understand your need and negotiate freely with you. Your details and desired implementations usually&nbsp;sit the price of your service. We avoid hidden fees and overprices&nbsp;with step-by-step check out&nbsp;for the project.&nbsp;In the case of larger projects, we install the price.&nbsp;Before starting a project, a deposit is required.&nbsp;&nbsp;</p>', 1, NULL, '2022-11-10 00:30:27', '2022-11-15 22:35:08'),
(12, 'What is the timeline of a project?', NULL, 2, '<p>We estimate the project hours according to&nbsp;the agreement in the first meeting.&nbsp;Because of the difficulty of estimating the exact time, we work on a regular divisional plan to implement any project. Besides, we have a weekly validity to check out the process to fulfill your satisfaction.&nbsp;We take into account any delays that will arise on the client\'s side.&nbsp;&nbsp;&nbsp;</p>', NULL, 1, NULL, '2022-11-10 00:34:32', '2022-11-15 22:35:09'),
(13, 'Who does manage communication in my project?', NULL, 2, '<p><span style=\"color: rgb(34, 34, 34);\">We have a public relationship crew that helps make sure the right messages are sent, received, and understood by the right people. By the way, they guide you to the right manager for your project. They will follow up with you in the project preparation, guiding you with the right manager at each step.</span></p>', '<p><br></p>', 1, NULL, '2022-11-10 00:35:06', '2022-11-15 22:35:09'),
(14, 'What makes your agency unique?', NULL, 2, '<p><span style=\"color: rgb(34, 34, 34);\">Being realistic makes us different. We firmly believe in our abilities and promises as we care about expressing our opinion honestly. Actually, we trust our customers to be part of our team.&nbsp;&nbsp;</span></p>', '<p><br></p>', 1, NULL, '2022-11-10 00:35:06', '2022-11-15 22:35:09'),
(15, 'What is the difference between agency and a freelancer?', NULL, 2, '<p><span style=\"color: rgb(34, 34, 34);\">We have a professional cooperative team covering all various services.&nbsp;Our team works together to get the best of their perspectives. To be fast, we divide a project into smaller tasks, being quite strict about communicating 24 hours a day.&nbsp;&nbsp;</span></p>', '<p><br></p>', 1, NULL, '2022-11-10 00:35:06', '2022-11-15 22:35:09'),
(16, 'Is Layouti still worth investing in 2021?', NULL, 4, '<p><span style=\"color: rgb(34, 34, 34);\">That\'s what we want to know, as well. If you find out, let us know!</span></p>', '<p>dasdas</p>', 1, '2022-11-10 18:52:16', '2022-11-10 00:35:06', '2022-11-10 18:52:16'),
(17, 'dasdas', NULL, 4, '<p>dasdas</p>', '<p>asddsa</p>', 1, '2022-11-10 18:52:13', '2022-11-10 01:52:47', '2022-11-10 18:52:13'),
(18, 'Is layouti still worth investing in 2021?', NULL, NULL, '<p><span style=\"color: rgb(34, 34, 34);\">That\'s what we want to know, as well. If you find out, let us know!</span></p>', '<p><br></p>', 1, NULL, '2022-11-10 18:52:54', '2022-11-15 22:35:09'),
(19, 'dasdas11', 'dasdsadas22', 2, '<p>daswewww33</p>', '<p>444</p>', 1, '2022-11-15 22:33:14', '2022-11-10 23:21:35', '2022-11-15 22:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `contact_header_contents`
--

CREATE TABLE `contact_header_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact_header_contents`
--

INSERT INTO `contact_header_contents` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Make Layouti your digital agency partner', 'dasdas', 'Our experts blend proprietary methodologies and innovative approaches with tried-and-true digital techniques to deliver extraordinary results.', 'dasasddsa', 'media/ContactPage/HeaderContent/1668857138-contact-us-page-layouti-image.jpg', NULL, '2022-11-01 23:22:06', '2022-11-19 16:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `contact_information`
--

CREATE TABLE `contact_information` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `informationTitleEn` text,
  `informationTitleAr` text,
  `AddressEn` text,
  `AddressAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact_information`
--

INSERT INTO `contact_information` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `informationTitleEn`, `informationTitleAr`, `AddressEn`, `AddressAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Get in touch!', 'Todd Holden', 'We\'d love to chat. Send us an e-mail directly or call us on the provided number.', 'Anim neque itaque hi', 'Contact Information', 'معلومات التواصل', 'Our Address', '1111', NULL, '2022-11-02 18:43:57', '2022-11-10 00:28:38');

-- --------------------------------------------------------

--
-- Table structure for table `contact_information_country_cards`
--

CREATE TABLE `contact_information_country_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact_information_country_cards`
--

INSERT INTO `contact_information_country_cards` (`id`, `titleEn`, `titleAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Dubai - UAE', 'دبي - دولة الإمارات العربية المتحدة', 1, NULL, '2022-11-03 19:42:31', '2022-11-10 00:26:45'),
(2, 'Amman – Jordan', 'null', 1, '2022-11-09 17:30:49', '2022-11-03 19:47:39', '2022-11-09 17:30:49'),
(3, 'Tatyana Velez', 'Richard Dickerson', 1, '2022-11-09 17:30:50', '2022-11-03 19:47:39', '2022-11-09 17:30:50'),
(4, 'Amman - Jordan', 'عمان - الأردن', 1, NULL, '2022-11-10 00:26:45', '2022-11-10 00:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `contact_information_email_cards`
--

CREATE TABLE `contact_information_email_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact_information_email_cards`
--

INSERT INTO `contact_information_email_cards` (`id`, `titleEn`, `titleAr`, `email`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Email Address', 'البريد الإلكتروني', 'Hello@layouti.com', 1, NULL, '2022-11-03 19:42:31', '2022-11-10 00:26:45'),
(2, 'Kelsey Vance', 'Isaiah Yang', '312132312123', 1, '2022-11-09 17:30:40', '2022-11-03 19:47:39', '2022-11-09 17:30:40'),
(3, 'Tatyana Velez', 'Richard Dickerson', '12312312312', 1, '2022-11-09 17:30:42', '2022-11-03 19:47:39', '2022-11-09 17:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `contact_information_mobile_cards`
--

CREATE TABLE `contact_information_mobile_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact_information_mobile_cards`
--

INSERT INTO `contact_information_mobile_cards` (`id`, `titleEn`, `titleAr`, `mobile`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mobile Number', 'رقم الهاتف', '+971 522 372 878', 1, NULL, '2022-11-03 19:42:31', '2022-11-10 00:26:45'),
(2, 'Ciaran Short', 'Edward Mcknight', 'Jana Bowen', 1, '2022-11-09 17:26:27', '2022-11-03 19:47:39', '2022-11-09 17:26:27'),
(3, 'Jesse Dorsey', 'Suki Mccullough', 'Adena Ferrell', 1, '2022-11-09 17:26:30', '2022-11-03 19:47:39', '2022-11-09 17:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `contact_information_whats_app_cards`
--

CREATE TABLE `contact_information_whats_app_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `whatsApp` varchar(255) DEFAULT NULL,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact_information_whats_app_cards`
--

INSERT INTO `contact_information_whats_app_cards` (`id`, `titleEn`, `titleAr`, `whatsApp`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'WhatsApp Number', 'رقم الواتس آب', '+962 79 875 2197', 1, NULL, '2022-11-03 19:42:31', '2022-11-10 00:26:45'),
(2, 'Uta Tillman', 'Ima Justice', 'Charde Foster', 1, '2022-11-09 17:30:45', '2022-11-03 19:47:39', '2022-11-09 17:30:45'),
(3, 'Ian Holcomb', 'Farrah Fischer', 'Charlotte Hodge', 1, '2022-11-09 17:30:47', '2022-11-03 19:47:39', '2022-11-09 17:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_page_header_contents`
--

CREATE TABLE `contact_us_page_header_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact_us_page_header_contents`
--

INSERT INTO `contact_us_page_header_contents` (`id`, `color`, `titleEn`, `titleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '#4f8765', 'Contact us.', NULL, NULL, '2022-11-29 14:05:48', '2022-12-01 13:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_page_section_ones`
--

CREATE TABLE `contact_us_page_section_ones` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact_us_page_section_ones`
--

INSERT INTO `contact_us_page_section_ones` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Hold your phone & reach your toy.', NULL, 'Feel free to ask for support; The etoy community is a source of support for every etoyer.', NULL, NULL, '2022-11-29 14:06:31', '2022-12-01 13:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_page_section_twos`
--

CREATE TABLE `contact_us_page_section_twos` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact_us_page_section_twos`
--

INSERT INTO `contact_us_page_section_twos` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, '2022-11-29 14:06:57', '2022-12-01 13:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_page_section_two_cards`
--

CREATE TABLE `contact_us_page_section_two_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` text,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact_us_page_section_two_cards`
--

INSERT INTO `contact_us_page_section_two_cards` (`id`, `icon`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'media/EToy/ContactUsPage/SectionTwo/1669884602-icons8-map_marker 2.svg', 'Our Address', NULL, 'Dubai - UAE / Jordan - Amman', NULL, 1, NULL, '2022-11-29 14:06:57', '2022-12-01 13:50:02'),
(2, 'media/EToy/ContactUsPage/SectionTwo/1669822503-0x0.jpg', '7777', '888', '999', '789879', 1, '2022-11-30 20:35:22', '2022-11-30 20:35:03', '2022-11-30 20:35:22'),
(3, 'media/EToy/ContactUsPage/SectionTwo/1669884602-icons8-gmail_logo 2.svg', 'Email Address', NULL, 'support@etoyapp.com', NULL, 1, NULL, '2022-12-01 13:50:02', '2022-12-01 13:50:02'),
(4, 'media/EToy/ContactUsPage/SectionTwo/1669884602-icons8-phonelink_ring 1.svg', 'Contact', NULL, '+971 522 372 878', NULL, 1, NULL, '2022-12-01 13:50:02', '2022-12-01 13:50:02'),
(5, 'media/EToy/ContactUsPage/SectionTwo/1669884602-icons8-last_24_hours 1.svg', 'Hours of operation', NULL, '7 Days, 09:00 - 20:00', NULL, 1, NULL, '2022-12-01 13:50:02', '2022-12-01 13:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `contact_we_fired_up_innovateds`
--

CREATE TABLE `contact_we_fired_up_innovateds` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact_we_fired_up_innovateds`
--

INSERT INTO `contact_we_fired_up_innovateds` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Let\'s start something completely different together', NULL, 'Have a project for us? Or a general question? Contact us! \r\nkindly fill us this simple form at our email and we’ll reach out.', NULL, NULL, '2022-11-01 23:22:36', '2022-11-10 19:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `deliverables`
--

CREATE TABLE `deliverables` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `deliverables`
--

INSERT INTO `deliverables` (`id`, `titleEn`, `titleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'adsa', 'dfsd', '2022-11-09 20:23:54', '2022-11-09 20:23:25', '2022-11-09 20:23:54'),
(2, 'Discovery & Strategy', 'Est consequatur nu', NULL, '2022-11-09 20:49:50', '2022-11-10 00:18:51'),
(3, 'Veritatis duis nihil', 'Amet unde laboriosa', '2022-11-09 20:53:27', '2022-11-09 20:49:50', '2022-11-09 20:53:27'),
(4, 'Est omnis ducimus p', 'Vel dolores ex maxim', '2022-11-09 20:53:25', '2022-11-09 20:50:34', '2022-11-09 20:53:25'),
(5, 'Sit est totam rerum', 'Soluta delectus vol', '2022-11-09 20:53:23', '2022-11-09 20:50:34', '2022-11-09 20:53:23'),
(6, 'UX design', 'Consequatur consequ', NULL, '2022-11-09 20:53:43', '2022-11-10 00:18:51'),
(7, 'Logo Branding', 'Aute voluptatum exce', NULL, '2022-11-09 20:53:43', '2022-11-10 00:18:51'),
(8, 'UI design', 'Qui molestiae nisi p', NULL, '2022-11-09 20:53:43', '2022-11-10 00:18:51'),
(9, 'App development', 'Voluptatum velit nis', NULL, '2022-11-09 20:53:43', '2022-11-10 00:18:51'),
(10, 'Website development', 'Aute quos esse nost', NULL, '2022-11-09 20:53:43', '2022-11-10 00:18:51'),
(11, 'Dashboard development', NULL, NULL, '2022-11-10 00:18:51', '2022-11-10 00:18:51'),
(12, 'Implementation', NULL, NULL, '2022-11-10 00:18:51', '2022-11-10 00:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `designproducts_statics`
--

CREATE TABLE `designproducts_statics` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `designproducts_statics`
--

INSERT INTO `designproducts_statics` (`id`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '2022-11-15 00:39:35', '2022-11-17 19:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `designproducts_static_cards`
--

CREATE TABLE `designproducts_static_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` text,
  `slide` text,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `subTitleEn` varchar(255) DEFAULT NULL,
  `subTitleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `reviewLink` text,
  `downloadLink` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `designproducts_static_cards`
--

INSERT INTO `designproducts_static_cards` (`id`, `logo`, `slide`, `titleEn`, `titleAr`, `subTitleEn`, `subTitleAr`, `descriptionEn`, `descriptionAr`, `reviewLink`, `downloadLink`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Animi eum debitis c', 'Quia nobis quam rem', 'Id excepteur neque', 'Quo laudantium ipsa', 'Obcaecati velit volu', 'Consectetur eu prov', 'Omnis laborum Eum o', 'Non accusantium sunt', 1, NULL, '2022-11-15 00:43:16', '2022-11-17 18:49:14'),
(2, NULL, NULL, 'Numquam duis sunt a', 'Porro ipsum reiciend', 'Explicabo Enim culp', 'Dolorem reprehenderi', 'Dignissimos minim as', 'Sit nisi anim molest', 'Fuga Dolore aliquid', 'Ut sint est velit', 1, NULL, '2022-11-15 00:50:16', '2022-11-17 19:24:57'),
(3, NULL, NULL, 'sgf', 'sdfg', NULL, NULL, 'sdfg', 'sgf', NULL, NULL, 1, '2022-11-17 19:24:30', '2022-11-15 00:50:45', '2022-11-17 19:24:30'),
(4, NULL, NULL, 'Ut quia ipsum adipi', 'Quia necessitatibus', 'Esse porro possimus', 'Dolor consequuntur c', 'Adipisicing in ratio', 'Velit nulla nihil un', 'Velit culpa cum eos', 'Culpa aliquid amet', 1, NULL, '2022-11-15 00:52:05', '2022-11-17 19:25:15'),
(5, NULL, NULL, 'Aut sapiente ullamco', 'Facere eius id qui', 'Sed placeat expedit', 'In commodo est nobis', 'Enim praesentium ass', 'Nulla sit aliquip v', 'Officiis iusto dolor', 'Tenetur excepteur Na', 1, NULL, '2022-11-17 19:25:37', '2022-11-17 19:26:10'),
(6, NULL, NULL, 'Sit perferendis est', 'Modi deserunt adipis', 'Ea cupiditate volupt', 'Possimus ratione pl', 'Aut quam vitae nobis', 'Quia dolorem ipsa r', 'Corporis consequat', 'Non consequatur rep', 1, NULL, '2022-11-17 19:26:17', '2022-11-17 19:26:17'),
(7, NULL, NULL, 'Reiciendis nobis nul', 'Est lorem ipsum temp', 'Veniam amet eum co', 'Voluptas sint dolor', 'Est laborum accusamu', 'Illum voluptatem am', 'Libero quas qui nihi', 'Sit voluptatem assum', 1, NULL, '2022-11-17 19:27:17', '2022-11-17 19:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `designproducts_static_cards_of_cards`
--

CREATE TABLE `designproducts_static_cards_of_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `designproducts_static_cards_of_cards`
--

INSERT INTO `designproducts_static_cards_of_cards` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Cillum id velit bea', 'Numquam Nam officia', 'Magnam mollit sunt e', 'Ut qui occaecat volu', 7, NULL, '2022-11-15 00:53:01', '2022-11-17 19:28:26'),
(2, 'Fuga Illo adipisci', 'Minus nostrum veniam', 'Ea amet ut doloremq', 'Voluptas amet et vo', 7, NULL, '2022-11-17 19:28:26', '2022-11-17 19:28:26'),
(3, 'Esse eius enim sint', 'Ipsum nisi commodo', 'Alias elit repudian', 'Dolores ea perferend', 7, NULL, '2022-11-17 19:28:26', '2022-11-17 19:28:26');

-- --------------------------------------------------------

--
-- Table structure for table `design_categories`
--

CREATE TABLE `design_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `design_categories`
--

INSERT INTO `design_categories` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'dfgfd', 'sdfgdfsg', 'sdfgfd', 'sfdgdf', NULL, '2022-11-15 00:32:19', '2022-11-15 00:30:36', '2022-11-15 00:32:19'),
(2, 'dfgfd', 'sdfgdfsg', 'sdfgfd', 'sfdgdf', NULL, '2022-11-15 01:51:57', '2022-11-15 00:32:26', '2022-11-15 01:51:57'),
(3, NULL, NULL, NULL, NULL, NULL, '2022-11-15 01:51:55', '2022-11-15 01:47:27', '2022-11-15 01:51:55'),
(4, NULL, NULL, NULL, NULL, NULL, '2022-11-15 01:51:53', '2022-11-15 01:47:30', '2022-11-15 01:51:53'),
(5, 'Website', 'موقع إلكتروني', 'An obsessed', 'مصمم مهووس', 'media/365Design/Category/1668851256-Group 9456.svg', NULL, '2022-11-15 01:50:16', '2022-11-19 15:33:20'),
(6, 'Mobile App', 'تطبيقات جوال', 'I\'m a highly passionate', 'أنا عاطفي للغاية', 'media/365Design/Category/1668851265-Group 9457.svg', NULL, '2022-11-15 01:52:52', '2022-11-19 15:33:33'),
(7, 'Minus aliquid id do', 'Quaerat molestiae al', 'Iure corporis iure q', 'Ea dolor sint liber', NULL, '2022-11-19 14:37:36', '2022-11-15 01:52:56', '2022-11-19 14:37:36'),
(8, 'Dashboard', 'لوحة تحكم', 'creative and', 'معروف بكونه', 'media/365Design/Category/1668851310-Group 9458.svg', NULL, '2022-11-19 14:48:30', '2022-11-19 15:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `design_header_contents`
--

CREATE TABLE `design_header_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `smallDescriptionEn` text,
  `smallDescriptionAr` text,
  `image` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `design_header_contents`
--

INSERT INTO `design_header_contents` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `smallDescriptionEn`, `smallDescriptionAr`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Nobis commodo sit a', 'In suscipit commodo', 'Modi et in voluptas', 'Quia labore fuga Cu', 'Quae architecto dolo', 'Consequuntur incidid', NULL, NULL, '2022-11-15 00:34:27', '2022-11-16 18:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `design_links`
--

CREATE TABLE `design_links` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `topLeftImage` text,
  `topRightImage` text,
  `bottomLeftImage` text,
  `bottomRightImage` text,
  `linksTitleEn` varchar(255) DEFAULT NULL,
  `linksTitleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `design_links`
--

INSERT INTO `design_links` (`id`, `image`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `topLeftImage`, `topRightImage`, `bottomLeftImage`, `bottomRightImage`, `linksTitleEn`, `linksTitleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Ea est velit tempor', 'Ipsam esse error ac', 'Sed earum aliquid do', 'Non dolore ex non du', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-15 00:38:54', '2022-11-16 19:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `design_links_cards`
--

CREATE TABLE `design_links_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `link` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `design_links_cards`
--

INSERT INTO `design_links_cards` (`id`, `titleEn`, `titleAr`, `link`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Aliquid perferendis', 'Laboriosam aut cons', 'April Byers', 1, NULL, '2022-11-15 00:38:54', '2022-11-16 19:39:11'),
(2, 'Pariatur Praesentiu', 'Ut et iure est excep', 'Madonna Richard', 1, '2022-11-16 19:48:30', '2022-11-15 00:52:13', '2022-11-16 19:48:30'),
(3, 'Et necessitatibus oc', 'Tempora aspernatur d', 'Raven Levy', 1, '2022-11-16 19:48:32', '2022-11-15 00:52:13', '2022-11-16 19:48:32'),
(4, 'Est nobis culpa ve', 'Proident sint ad lo', 'Emmanuel Olson', 1, '2022-11-16 19:48:28', '2022-11-16 19:37:33', '2022-11-16 19:48:28'),
(5, 'Ipsum consequuntur v', 'Mollitia amet cumqu', 'Amy Mooney', 1, '2022-11-16 19:46:37', '2022-11-16 19:37:33', '2022-11-16 19:46:37'),
(6, 'Duis quasi est null', 'Ea excepturi sequi d', 'Gareth Mitchell', 1, '2022-11-16 19:46:41', '2022-11-16 19:37:33', '2022-11-16 19:46:41'),
(7, 'Mollit quis ullam vo', 'Repellendus Eiusmod', 'Alea Mosley', 1, '2022-11-16 19:47:54', '2022-11-16 19:37:34', '2022-11-16 19:47:54'),
(8, 'Quas molestiae animi', 'Laboris consequat A', 'Beck Gallegos', 1, '2022-11-16 19:46:45', '2022-11-16 19:39:11', '2022-11-16 19:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `design_projects`
--

CREATE TABLE `design_projects` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `coverImage` text,
  `nameEn` varchar(255) DEFAULT NULL,
  `nameAr` varchar(255) DEFAULT NULL,
  `ceatedByEn` varchar(255) DEFAULT NULL,
  `ceatedByAr` varchar(255) DEFAULT NULL,
  `availabilityProgramsEn` varchar(255) DEFAULT NULL,
  `availabilityProgramsAr` varchar(255) DEFAULT NULL,
  `smallDescriptionEn` text,
  `smallDescriptionAr` text,
  `date` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `link` text,
  `category` bigint UNSIGNED DEFAULT NULL,
  `informationEn` text,
  `informationAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `design_projects`
--

INSERT INTO `design_projects` (`id`, `image`, `coverImage`, `nameEn`, `nameAr`, `ceatedByEn`, `ceatedByAr`, `availabilityProgramsEn`, `availabilityProgramsAr`, `smallDescriptionEn`, `smallDescriptionAr`, `date`, `state`, `price`, `link`, `category`, `informationEn`, `informationAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'asdasd', 'sasdf', 'adsfasd', 'asdfsda', 'adsfasd', 'ewdfsda', 'adfsd', 'asdfds', '12/12/2021', 'price', 35, 'asdsad', 5, 'sdfg', 'sdfg', '2022-11-19 16:26:50', '2022-11-15 20:27:52', '2022-11-19 16:26:50'),
(2, NULL, NULL, 'asdasd', 'sasdf', 'adsfasd', 'asdfsda', 'adsfasd', 'ewdfsda', 'adfsd', 'asdfds', '12/12/2021', 'price', 35, 'asdsad', 5, 'sdfg', 'sdfg', '2022-11-19 16:26:47', '2022-11-15 20:34:25', '2022-11-19 16:26:47'),
(3, NULL, NULL, 'asdasd', 'sasdf', 'adsfasd', 'asdfsda', 'adsfasd', 'ewdfsda', 'adfsd', 'asdfds', '12/12/2021', 'price', 35, 'asdsad', 5, 'sdfg', 'sdfg', '2022-11-19 16:26:35', '2022-11-15 20:35:21', '2022-11-19 16:26:35'),
(4, NULL, NULL, 'Obcaecati culpa ea c', 'Ila Frederick', 'Vielka Luna', 'Lavinia Romero', 'Regina Rodriguez', 'Colby Howell', 'Cupidatat quia quia', 'Officia quae dolor e', '1983-09-14', NULL, NULL, 'Aquila Atkins', 6, '<p>Irure qui praesentiu.</p>', '<p>Sint, consequuntur e.</p>', '2022-11-19 16:26:32', '2022-11-17 21:01:41', '2022-11-19 16:26:32'),
(5, NULL, NULL, 'Voluptas veniam nih', 'Sawyer Orr', 'Nomlanga Mcknight', 'Sonya Pope', 'Keegan Ellis', 'Holly Forbes', 'Autem perferendis ve', 'Dolorem est provide', '1995-11-02', 'free', NULL, 'Elvis Ball', 7, '<p>Quidem veritatis nul.</p>', '<p>Excepteur rerum qui .</p>', '2022-11-19 16:26:28', '2022-11-17 21:04:35', '2022-11-19 16:26:28'),
(6, NULL, NULL, 'Aliqua Aperiam cons', 'Malachi Warner', 'Melyssa Guzman', 'Gil Knapp', 'Mohammad Waller', 'Maris Ellison', 'Voluptate amet cons', 'Adipisicing eveniet', '2000-11-10', '2', 55, 'Christine Haley', 7, '<p>Harum cumque nisi co.</p>', '<p>Cupiditate libero in.</p>', '2022-11-19 16:26:24', '2022-11-17 21:05:58', '2022-11-19 16:26:24'),
(7, 'media/365Design/Projects/1668856814-0315_man_avatars [Converted]-08.png', NULL, 'Voluptate dolor ea d', 'Yardley Love', 'Sharon Wall', 'Maryam Emerson', 'Cole Henson', 'Luke Hayes', 'Dolores totam adipis', 'Sequi sit consectetu', '2004-11-20', 'free', NULL, 'Britanney Boyd', 6, '<p>Deleniti excepturi l.</p>', '<p>Aspernatur qui autem.</p>', NULL, '2022-11-19 16:20:14', '2022-11-19 16:20:14'),
(8, 'media/365Design/Projects/1669036681-Travel App.png', NULL, 'Voluptate porro adip', 'Lars Hodge', 'Yoshi Marks', 'Sydney Farmer', 'Elizabeth Slater', 'Berk Dotson', 'Fugiat labore quia q', 'Consequuntur nisi te', '1997-07-16', 'free', NULL, 'Jane Stone', 6, '<p>Id quia iste suscipi.</p>', '<p>Ratione delectus, hi.</p>', NULL, '2022-11-21 18:18:01', '2022-11-21 18:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `design_project_images`
--

CREATE TABLE `design_project_images` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `design_project_images`
--

INSERT INTO `design_project_images` (`id`, `image`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, NULL, '2022-11-15 20:27:52', '2022-11-15 20:27:52'),
(2, NULL, 2, NULL, '2022-11-15 20:34:25', '2022-11-15 20:34:25'),
(3, NULL, 3, NULL, '2022-11-15 20:35:21', '2022-11-15 20:35:21'),
(4, NULL, 4, NULL, '2022-11-17 21:01:41', '2022-11-17 21:01:41'),
(5, NULL, 4, NULL, '2022-11-17 21:01:41', '2022-11-17 21:01:41'),
(6, NULL, 4, NULL, '2022-11-17 21:01:41', '2022-11-17 21:01:41'),
(7, NULL, 4, NULL, '2022-11-17 21:01:41', '2022-11-17 21:01:41'),
(8, NULL, 5, NULL, '2022-11-17 21:04:35', '2022-11-17 21:04:35'),
(9, NULL, 5, NULL, '2022-11-17 21:04:35', '2022-11-17 21:04:35'),
(10, NULL, 5, NULL, '2022-11-17 21:04:35', '2022-11-17 21:04:35'),
(11, NULL, 6, NULL, '2022-11-17 21:05:58', '2022-11-17 21:05:58'),
(12, NULL, 6, NULL, '2022-11-17 21:05:58', '2022-11-17 21:05:58'),
(13, NULL, 6, NULL, '2022-11-17 21:05:58', '2022-11-17 21:05:58'),
(14, NULL, 6, NULL, '2022-11-17 21:05:58', '2022-11-17 21:05:58'),
(15, 'media/365Design/ProductsImages/1668856814-logo-0315_man_avatars [Converted]-08.png', 7, NULL, '2022-11-19 16:20:14', '2022-11-19 16:20:14'),
(16, 'media/365Design/ProductsImages/1669036681-logo-Travel App.png', 8, NULL, '2022-11-21 18:18:01', '2022-11-21 18:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `design_project_informations`
--

CREATE TABLE `design_project_informations` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `design_project_informations`
--

INSERT INTO `design_project_informations` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'sdfgsfdg', 'sdfgsdfg', 'sdfgfdsg', 'sdfgfdgs', 1, NULL, '2022-11-15 20:27:52', '2022-11-15 20:27:52'),
(2, 'sdfgsfdg', 'sdfgsdfg', 'sdfgfdsg', 'sdfgfdgs', 2, NULL, '2022-11-15 20:34:25', '2022-11-15 20:34:25'),
(3, 'sdfgsfdg', 'sdfgsdfg', 'sdfgfdsg', 'sdfgfdgs', 3, NULL, '2022-11-15 20:35:21', '2022-11-15 20:35:21'),
(4, 'Aubrey Parsons', 'Sebastian Craig', 'Totam labore asperna', 'Cumque aut ad natus', 4, NULL, '2022-11-17 21:01:41', '2022-11-17 21:01:41'),
(5, 'Omar Montgomery', 'August Marshall', 'Reiciendis ut volupt', 'Occaecat id in dicta', 5, NULL, '2022-11-17 21:04:35', '2022-11-17 21:04:35'),
(6, 'Francesca Bean', 'Anastasia Valdez', 'Ipsa aut tenetur et', 'Suscipit est soluta', 5, NULL, '2022-11-17 21:04:35', '2022-11-17 21:04:35'),
(7, 'Gage Cannon', 'Quemby Leon', 'Rerum nostrud error', 'Aliqua Eiusmod moll', 6, NULL, '2022-11-17 21:05:58', '2022-11-17 21:05:58'),
(8, 'Todd Salas', 'Baxter Lang', 'Nihil voluptate aut', 'Tempor nemo qui iust', 7, NULL, '2022-11-19 16:20:14', '2022-11-19 16:20:14'),
(9, 'Wynter Morse', 'Ima Booth', 'Quam quidem in et pa', 'Accusamus ipsa odit', 8, NULL, '2022-11-21 18:18:01', '2022-11-21 18:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `design_project_s_e_o_s`
--

CREATE TABLE `design_project_s_e_o_s` (
  `id` bigint UNSIGNED NOT NULL,
  `focusKeypharseEn` varchar(255) DEFAULT NULL,
  `focusKeypharseAr` varchar(255) DEFAULT NULL,
  `seoTitleEn` varchar(255) DEFAULT NULL,
  `seoTitleAr` varchar(255) DEFAULT NULL,
  `slugEn` varchar(255) DEFAULT NULL,
  `slugAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `facebookImage` text,
  `facebookTitleEn` varchar(255) DEFAULT NULL,
  `facebookTitleAr` varchar(255) DEFAULT NULL,
  `facebookDescriptionEn` text,
  `facebookDescriptionAr` text,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `design_project_s_e_o_s`
--

INSERT INTO `design_project_s_e_o_s` (`id`, `focusKeypharseEn`, `focusKeypharseAr`, `seoTitleEn`, `seoTitleAr`, `slugEn`, `slugAr`, `descriptionEn`, `descriptionAr`, `facebookImage`, `facebookTitleEn`, `facebookTitleAr`, `facebookDescriptionEn`, `facebookDescriptionAr`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'dsfgsdf', 'sdfgsfdg', 'sdfgdf', 'sdfg', 'sdfg', 'sdfg', 'sgfd', 'fg', NULL, 'fdsgsdf', 'sgf', 'dsfg', 'sdfg', 3, NULL, '2022-11-15 20:35:21', '2022-11-15 20:35:21'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, '2022-11-17 21:01:41', '2022-11-17 21:01:41'),
(5, 'Latifah Sims', 'Clementine Gomez', 'Joseph Hendricks', 'Tatiana Sykes', 'Phyllis Soto', 'Neve Woodward', 'Iusto do ipsa ea qu', 'Soluta aut ipsum ne', NULL, NULL, NULL, NULL, NULL, 5, NULL, '2022-11-17 21:04:35', '2022-11-17 21:04:35'),
(6, 'Fulton Meyer', 'Denton Mullins', 'Halee Henson', 'Brandon Forbes', 'Velma Rosario', 'Laurel Taylor', 'Consectetur magna n', 'Soluta voluptates ar', NULL, NULL, NULL, NULL, NULL, 6, NULL, '2022-11-17 21:05:58', '2022-11-17 21:05:58'),
(7, 'Clementine Jones', 'Teegan Lawson', 'Debra Crane', 'Alana Roach', 'Aretha Newton', 'Perry Sullivan', 'Ea dolor consequatur', 'Enim perferendis eve', NULL, NULL, NULL, NULL, NULL, 7, NULL, '2022-11-19 16:20:14', '2022-11-19 16:20:14'),
(8, 'Deborah Burton', 'Dakota Roth', 'Bree Vaughn', 'Kaye Estrada', 'Blake Finch', 'Branden Mcbride', 'Asperiores omnis sin', 'Aut totam aliquip co', NULL, NULL, NULL, NULL, NULL, 8, NULL, '2022-11-21 18:18:01', '2022-11-21 18:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `global_page_etoy_ads`
--

CREATE TABLE `global_page_etoy_ads` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `global_page_etoy_ads`
--

INSERT INTO `global_page_etoy_ads` (`id`, `titleEn`, `titleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1111', '2222', NULL, '2022-11-29 14:26:12', '2022-12-01 21:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `global_page_etoy_app_settings`
--

CREATE TABLE `global_page_etoy_app_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `favIcon` text,
  `lightLogo` text,
  `darkLogo` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `global_page_etoy_app_settings`
--

INSERT INTO `global_page_etoy_app_settings` (`id`, `favIcon`, `lightLogo`, `darkLogo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'media/EToy/GlobalPage/AppSetting/1669910428-1_optimized (1).png', 'media/EToy/GlobalPage/AppSetting/1669910428-lightLogo-1_optimized (1).png', 'media/EToy/GlobalPage/AppSetting/1669910429-darkLogo-1_optimized (1).png', NULL, '2022-11-29 14:23:41', '2022-12-01 21:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `global_page_etoy_faqs`
--

CREATE TABLE `global_page_etoy_faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `global_page_etoy_faqs`
--

INSERT INTO `global_page_etoy_faqs` (`id`, `titleEn`, `titleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'asdas', 'asdasd', NULL, '2022-11-29 14:25:28', '2022-11-29 14:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `global_page_etoy_faq_cards`
--

CREATE TABLE `global_page_etoy_faq_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `questionEn` varchar(255) DEFAULT NULL,
  `questionAr` varchar(255) DEFAULT NULL,
  `answerEn` text,
  `answerAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `global_page_etoy_faq_cards`
--

INSERT INTO `global_page_etoy_faq_cards` (`id`, `questionEn`, `questionAr`, `answerEn`, `answerAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'sad', 'sadasd', 'sad', 'sad', 1, NULL, '2022-11-29 14:25:28', '2022-11-29 14:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `header_contents`
--

CREATE TABLE `header_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `header_contents`
--

INSERT INTO `header_contents` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'We convert your ideas to our version of creativity', 'Title (Arabic)11', 'The full UI/UX designers crew is ready to provide innovative, highly functional, visually appealing, and feature-rich website UI/UX designs, mobile applications UX/UI design as well as branding.', 'Description (Arabic) Description (Arabic) Description (Arabic) Description (Arabic) 111', 'media/HomePage/HeaderContent/1668856276-1-home-page-layouti-image.jpg', NULL, '2022-10-21 15:45:59', '2022-11-19 16:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `hire_us`
--

CREATE TABLE `hire_us` (
  `id` bigint UNSIGNED NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `need` varchar(255) DEFAULT NULL,
  `details` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `budget` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `hire_us`
--

INSERT INTO `hire_us` (`id`, `fullName`, `email`, `need`, `details`, `attachment`, `budget`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Maxwell Duran', 'gajylufy@mailinator.com', '[\"1\",\"2\",\"6\"]', 'Maxime minim culpa i', 'media/HireUs/Files/1667652123-Maxwell Duran-TM352_TMA_KSA_Fall_22_23.docx', 5, NULL, '2022-11-05 20:42:03', '2022-11-05 20:42:03'),
(2, 'Maxwell Duran', 'gajylufy@mailinator.com', '[\"1\",\"2\",\"6\"]', 'Maxime minim culpa i', 'media/HireUs/Files/1667654665-Maxwell Duran-TM352_TMA_KSA_Fall_22_23.docx', 5, NULL, '2022-11-05 21:24:25', '2022-11-05 21:24:25'),
(3, 'Maxwell Duran123323231', 'dasdasda@eqweqw.com', '[\"1\",\"2\",\"6\"]', 'eqwqw21332312', 'media/HireUs/Files/1667654706-Maxwell Duran123323231-Python-Developer-7.pdf', 2, NULL, '2022-11-05 21:25:06', '2022-11-05 21:25:06'),
(4, 'eqwewqqe', 'www@wwwww.com', '[\"1\",\"2\",\"6\"]', 'qeeqweqw', 'media/HireUs/Files/1667729888-eqwewqqe-antenna_sec1_seham.pdf', 1, NULL, '2022-11-06 20:18:08', '2022-11-06 20:18:08'),
(5, 'eqwewqqe', 'www@wwwww.com', '[\"1\",\"2\",\"6\"]', 'qeeqweqw', 'media/HireUs/Files/1667729936-eqwewqqe-antenna_sec1_seham.pdf', 1, NULL, '2022-11-06 20:18:56', '2022-11-06 20:18:56'),
(6, 'eqwewqqe', 'www@wwwww.com', '[\"1\",\"2\",\"6\"]', 'qeeqweqw', 'media/HireUs/Files/1667730023-eqwewqqe-antenna_sec1_seham.pdf', 1, NULL, '2022-11-06 20:20:23', '2022-11-06 20:20:23'),
(7, 'eqwewqqe', 'www@wwwww.com', '[\"1\",\"2\",\"6\"]', 'qeeqweqw', 'media/HireUs/Files/1667730278-eqwewqqe-antenna_sec1_seham.pdf', 1, NULL, '2022-11-06 20:24:38', '2022-11-06 20:24:38'),
(8, 'adsasd', 'dasdsadassad@adsdsa.com', '[\"1\",\"2\",\"6\"]', 'dasads', 'media/HireUs/Files/1667730998-adsasd-antenna_sec1_seham.pdf', 2, NULL, '2022-11-06 20:36:38', '2022-11-06 20:36:38'),
(9, 'dasdasd', 'dasdsadassad@adsdsa.com', '[\"1\",\"2\",\"6\"]', 'dasads', 'media/HireUs/Files/1667731142-dasdasd-antenna_sec1_seham.pdf', 5, NULL, '2022-11-06 20:39:02', '2022-11-06 20:39:02'),
(10, 'dasdasd', 'dasdsadassad@adsdsa.com', '[\"1\",\"2\",\"6\"]', 'dasads', 'media/HireUs/Files/1667731199-dasdasd-3جدول_قسم_هندسة_الالكترونيات_والاتصالات.pdf', 5, NULL, '2022-11-06 20:39:59', '2022-11-06 20:39:59'),
(11, 'dasdasd', 'dasdsadassad@adsdsa.com', '[\"1\",\"2\",\"6\"]', 'dasads', 'media/HireUs/Files/1667731241-dasdasd-3جدول_قسم_هندسة_الالكترونيات_والاتصالات.pdf', 5, NULL, '2022-11-06 20:40:41', '2022-11-06 20:40:41'),
(12, 'Delilah Mathews', 'pedy@mailinator.com', '[\"1\",\"2\",\"6\"]', 'Quia elit sed illo', 'media/HireUs/Files/1667742075-Delilah Mathews-لجنه 3_معدل.pdf', 5, NULL, '2022-11-06 23:41:15', '2022-11-06 23:41:15'),
(13, 'mostafa elgaml', 'elgaml.infp@gmail.com', '[\"1\",\"2\",\"6\",\"7\",\"8\"]', 'my project', 'media/HireUs/Files/1668864950-mostafa elgaml-Eagles Resort (3)_CompressPdf.pdf', 2, NULL, '2022-11-19 18:35:51', '2022-11-19 18:35:51'),
(14, 'mostafa elgaml', 'elgaml.infp@gmail.com', '[\"1\",\"2\",\"6\",\"7\",\"8\"]', 'my project', 'media/HireUs/Files/1668865328-mostafa elgaml-Eagles Resort (3)_CompressPdf.pdf', 2, NULL, '2022-11-19 18:42:08', '2022-11-19 18:42:08'),
(15, 'elgaml', 'elgaml@gmail.com', '[\"1\",\"2\",\"6\",\"7\",\"8\"]', 'eafeasfsdafsdf', 'media/HireUs/Files/1668865516-elgaml-Eagles Resort (3)_CompressPdf.pdf', 1, NULL, '2022-11-19 18:45:17', '2022-11-19 18:45:17'),
(16, 'asdasdasd', 'elgam@gmail.com', '[\"1\",\"2\",\"6\",\"7\",\"8\"]', 'saasdsadasdasdas', 'media/HireUs/Files/1668865724-asdasdasd-Eagles Resort (3)_CompressPdf.pdf', 7, NULL, '2022-11-19 18:48:45', '2022-11-19 18:48:45'),
(17, 'asdasd', 'asdasdasd@gmail.com', '[\"1\",\"2\",\"6\",\"7\",\"8\"]', 'asdasdad', 'media/HireUs/Files/1669198740-asdasd-badr mohamed - front end developer-3.pdf', 1, NULL, '2022-11-23 15:19:00', '2022-11-23 15:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_header_contents`
--

CREATE TABLE `home_page_header_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `titleOneEn` varchar(255) DEFAULT NULL,
  `titleOneAr` varchar(255) DEFAULT NULL,
  `titleTwoEn` varchar(255) DEFAULT NULL,
  `titleTwoAr` varchar(255) DEFAULT NULL,
  `titleThreeEn` varchar(255) DEFAULT NULL,
  `titleThreeAr` varchar(255) DEFAULT NULL,
  `availabilityTitleEn` varchar(255) DEFAULT NULL,
  `availabilityTitleAr` varchar(255) DEFAULT NULL,
  `availabilityIOSIcon` text,
  `availabilityIOSLink` varchar(255) DEFAULT NULL,
  `availabilityAndroidIcon` text,
  `availabilityAndroidLink` varchar(255) DEFAULT NULL,
  `topLeftImage` text,
  `topRightImage` text,
  `bottomLeftImage` text,
  `bottomRightImage` text,
  `bottomImage` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `home_page_header_contents`
--

INSERT INTO `home_page_header_contents` (`id`, `color`, `titleOneEn`, `titleOneAr`, `titleTwoEn`, `titleTwoAr`, `titleThreeEn`, `titleThreeAr`, `availabilityTitleEn`, `availabilityTitleAr`, `availabilityIOSIcon`, `availabilityIOSLink`, `availabilityAndroidIcon`, `availabilityAndroidLink`, `topLeftImage`, `topRightImage`, `bottomLeftImage`, `bottomRightImage`, `bottomImage`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '#4c8765', 'Why shop for toys, when', NULL, 'you can etoy', NULL, 'Swap, Giveaway, and Sell toys', NULL, 'eToy App is now available in both stores', NULL, 'media/EToy/HomePage/HeaderContent/1669882783-availabilityIOSIcon-IOS-icon.png', 'https://apps.apple.com/app/etoy-app/id1579176714', 'media/EToy/HomePage/HeaderContent/1669882783-availabilityAndroidIcon-IOS-icon.png', 'https://play.google.com/store/apps/details?id=com.layouti.etoy&pli=1', 'media/EToy/HomePage/HeaderContent/1669882783-topLeftImage-shutterstock_727460038-11.png', 'media/EToy/HomePage/HeaderContent/1669882784-topRightImage-shutterstock_88160245-2.png', 'media/EToy/HomePage/HeaderContent/1669882784-bottomLeftImage-shutterstock_727460038-10.png', 'media/EToy/HomePage/HeaderContent/1669882784-bottomRightImage-shutterstock_1129708307-1.png', 'media/EToy/HomePage/HeaderContent/1669882785-bottomImage-4-2.png', NULL, '2022-11-29 13:16:40', '2022-12-01 13:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_seciton_fours`
--

CREATE TABLE `home_page_seciton_fours` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `qouteEn` text,
  `qouteAr` text,
  `nameEn` varchar(255) DEFAULT NULL,
  `nameAr` varchar(255) DEFAULT NULL,
  `jopTitleEn` varchar(255) DEFAULT NULL,
  `jopTitleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `home_page_seciton_fours`
--

INSERT INTO `home_page_seciton_fours` (`id`, `image`, `qouteEn`, `qouteAr`, `nameEn`, `nameAr`, `jopTitleEn`, `jopTitleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'media/EToy/HomePage/SectionFour/1669883049-Group-7978.png', '\"If we build the product in time and budget and users simply do not engage with it, then we will have successfully achieved failure.\"', NULL, 'Yaser Nazzal', NULL, 'Founder & CEO', NULL, NULL, '2022-11-29 13:26:50', '2022-12-01 13:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_seciton_ones`
--

CREATE TABLE `home_page_seciton_ones` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `home_page_seciton_ones`
--

INSERT INTO `home_page_seciton_ones` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'A kid\'s app simple as kid\'s play', NULL, 'etoy is a friendly and helpful app with a lot of features that intend to expand so that you will find its usage as simple as gaming simply follow the entertaining instructions to start swap, gift sell.', NULL, NULL, '2022-11-29 13:23:24', '2022-12-01 13:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_seciton_one_cards`
--

CREATE TABLE `home_page_seciton_one_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` text,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `home_page_seciton_one_cards`
--

INSERT INTO `home_page_seciton_one_cards` (`id`, `icon`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'media/EToy/HomePage/SecionOne/1669882950-community.png', 'Join etoy community', NULL, 'Spread the culture of recycling and gifting. Create your profile, set your location, and join your local etoy community for kid’s toys.', NULL, 1, NULL, '2022-11-29 13:23:24', '2022-12-01 13:22:30'),
(2, 'media/EToy/HomePage/SecionOne/1669810070-0x0.jpg', 'adsfd', 'adsfda', 'adfadf', 'adfda', 1, '2022-11-30 17:08:00', '2022-11-30 17:07:50', '2022-11-30 17:08:00'),
(3, 'media/EToy/HomePage/SecionOne/1669818278-0x0.jpg', 'ewew', 'ewe', 'eweew', 'ewe', 1, '2022-11-30 20:11:53', '2022-11-30 19:24:16', '2022-11-30 20:11:53'),
(4, 'media/EToy/HomePage/SecionOne/1669882950-Add.png', 'Add toys for free', NULL, 'Add a photo, a description, and your offering method: Selling, swapping, or gifting. Tap “Add a toy” and your listing is live. Just a few easy steps.', NULL, 1, NULL, '2022-12-01 13:22:30', '2022-12-01 13:22:30'),
(5, 'media/EToy/HomePage/SecionOne/1669882950-Find.png', 'Find kid’s toys', NULL, 'Browse and search for preloved toys, and engage your kid in finding their favorites too! etoy is a child-friendly environment app.', NULL, 1, NULL, '2022-12-01 13:22:30', '2022-12-01 13:22:30'),
(6, 'media/EToy/HomePage/SecionOne/1669882950-Exchange.png', 'Exchange happiness', NULL, 'By using etoy app, you are helping in cutting down on the current plastic used resulting in waste across our planet & making another kid happy.', NULL, 1, NULL, '2022-12-01 13:22:30', '2022-12-01 13:22:30'),
(7, 'media/EToy/HomePage/SecionOne/1669882950-Earn.png', 'Earn points & gifts', NULL, 'We also love to give back! Close the deal, and engage with etoyers to gain points & gifts. Be a recycling etoyer hero your child will proud of!', NULL, 1, NULL, '2022-12-01 13:22:30', '2022-12-01 13:22:30'),
(8, 'media/EToy/HomePage/SecionOne/1669882950-protect.png', 'Save the planet!', NULL, 'Contact the toy provider through etoy and confirm the drop-off point to close the deal. etoy is a peer-to-peer marketplace.', NULL, 1, NULL, '2022-12-01 13:22:30', '2022-12-01 13:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_seciton_threes`
--

CREATE TABLE `home_page_seciton_threes` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `home_page_seciton_threes`
--

INSERT INTO `home_page_seciton_threes` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'The global award portal has been opened', 'asdasd', 'We are honored to have received our first worldwide award and to have placed first in the World Usability Day competition.', 'asdsad', 'media/EToy/HomePage/SectionThree/1669883011-ilust-13-1.png', NULL, '2022-11-29 13:25:23', '2022-12-01 13:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_seciton_twos`
--

CREATE TABLE `home_page_seciton_twos` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `home_page_seciton_twos`
--

INSERT INTO `home_page_seciton_twos` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Be an etoyer hero & teach your kid public safety protocols', NULL, 'Because your safety comes first, we have set some ground rules for the etoy community to follow. All etoyers should commit to our COVID-19 regulations from the beginning of the deal until it is closed.', NULL, 'media/EToy/HomePage/SecionTwo/1669882986-illus-empat.png', NULL, '2022-11-29 13:50:06', '2022-12-01 13:23:06');

-- --------------------------------------------------------

--
-- Table structure for table `layouti_budgets`
--

CREATE TABLE `layouti_budgets` (
  `id` bigint UNSIGNED NOT NULL,
  `budgetEn` varchar(255) NOT NULL,
  `budgetAr` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `layouti_budgets`
--

INSERT INTO `layouti_budgets` (`id`, `budgetEn`, `budgetAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '$500 - $1,000', '500 دولار - 1,000 دولار', NULL, '2022-11-02 20:53:35', '2022-11-08 15:47:12'),
(2, '$1,000 - $2,500', '1,000 دولار - 2,500 دولار', NULL, '2022-11-02 20:54:18', '2022-11-08 15:47:06'),
(3, 'Aspernatur error sus', 'Ducimus aperiam odi', '2022-11-03 21:26:29', '2022-11-03 21:24:48', '2022-11-03 21:26:29'),
(4, '$2,500 - $5,000', '2,500 دولار - 5,000 دولار', NULL, '2022-11-03 21:26:36', '2022-11-08 15:46:57'),
(5, '$5,000 - $10,000', '5,000 دولار - 10,000 دولار', NULL, '2022-11-03 21:28:42', '2022-11-08 15:46:48'),
(6, 'Amet harum magnam p', 'Voluptas velit assum', '2022-11-03 22:58:27', '2022-11-03 22:58:26', '2022-11-03 22:58:27'),
(7, 'More than 10,000', 'أكثر من 10,000', NULL, '2022-11-08 15:46:05', '2022-11-08 15:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `layouti_categories`
--

CREATE TABLE `layouti_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `nameEn` varchar(255) NOT NULL,
  `nameAr` varchar(255) NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `layouti_categories`
--

INSERT INTO `layouti_categories` (`id`, `nameEn`, `nameAr`, `quantity`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'category 1', 'category 1', 0, '2022-11-07 15:39:03', '2022-10-31 23:54:44', '2022-11-07 15:39:03'),
(2, 'category 12', 'category 12', 0, '2022-11-07 15:39:05', '2022-10-31 23:54:47', '2022-11-07 15:39:05'),
(3, 'category 123', 'category 123', 0, '2022-11-07 15:39:06', '2022-10-31 23:54:50', '2022-11-07 15:39:06'),
(4, 'category 1234', 'category 1234', 0, '2022-11-07 15:39:08', '2022-10-31 23:54:52', '2022-11-07 15:39:08'),
(5, 'UX Design', 'تصميم تجربة المستخدم', 0, '2022-11-09 15:51:59', '2022-10-31 23:54:55', '2022-11-09 15:51:59'),
(6, 'Logo Branding', 'تصميم الهوية البصرية', 0, NULL, '2022-11-02 21:42:26', '2022-11-07 15:40:25'),
(7, 'UI Design', 'تصميم واجهات المستخدم', 0, '2022-11-09 15:51:41', '2022-11-02 21:42:29', '2022-11-09 15:51:41'),
(8, 'Odio blanditiis saep', 'Incididunt atque del', 0, '2022-11-02 21:52:05', '2022-11-02 21:43:40', '2022-11-02 21:52:05'),
(9, 'Incidunt ab neque d', 'Repellendus Ex cons', 0, '2022-11-02 21:52:03', '2022-11-02 21:43:45', '2022-11-02 21:52:03'),
(10, 'Aute consectetur et', 'Ad reiciendis qui es', 0, '2022-11-07 15:41:02', '2022-11-05 18:26:40', '2022-11-07 15:41:02'),
(11, 'In-house projects', 'مشاريع داخلية', 0, NULL, '2022-11-07 15:41:54', '2022-11-07 15:41:54'),
(12, 'UI Dashboard design', 'تصميم لوحة تحكم', 0, NULL, '2022-11-09 15:49:00', '2022-11-09 15:53:03'),
(13, 'UI App Design', 'تصميم تطبيقات جوال', 0, NULL, '2022-11-09 15:49:27', '2022-11-09 15:53:15'),
(14, 'UI Website Design', 'تصميم مواقع إلكترونية', 0, NULL, '2022-11-09 15:49:55', '2022-11-09 15:53:21'),
(15, 'UX Consultant', 'استشارات في تجربة المستخدم', 0, NULL, '2022-11-09 15:50:32', '2022-11-09 15:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `layouti_categories_faqs`
--

CREATE TABLE `layouti_categories_faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `nameEn` varchar(255) NOT NULL,
  `nameAr` varchar(255) NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `layouti_categories_faqs`
--

INSERT INTO `layouti_categories_faqs` (`id`, `nameEn`, `nameAr`, `quantity`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'vgvv', 'dsa', 0, '2022-11-05 18:04:20', '2022-11-05 18:03:12', '2022-11-05 18:04:20'),
(2, 'General Information', 'معلومات عامة', 35, NULL, '2022-11-05 18:03:33', '2022-11-16 18:58:41'),
(3, 'In omnis quis ut ame', 'Nostrud fugiat non v', 0, '2022-11-05 18:27:04', '2022-11-05 18:27:02', '2022-11-05 18:27:04'),
(4, 'Website design', 'تصميم المواقع الإلكترونية', 28, NULL, '2022-11-05 18:27:08', '2022-11-10 23:21:35'),
(5, 'Ea non voluptatem ut', 'Non voluptas repudia', 2, '2022-11-08 01:08:26', '2022-11-05 18:27:12', '2022-11-08 01:08:26'),
(6, 'Branding', 'تصميم الهوية البصرية', 11, NULL, '2022-11-08 01:08:52', '2022-11-10 23:21:35'),
(7, 'Mobile app', 'تصميم تطبيقات جوال', 7, NULL, '2022-11-08 01:10:48', '2022-11-10 23:21:35'),
(8, 'Website Design', 'تصميم مواقع إلكترونية', 0, '2022-11-09 15:54:56', '2022-11-09 15:54:13', '2022-11-09 15:54:56'),
(9, 'سيبسيب', 'سيبسيب', 0, '2022-11-09 15:54:53', '2022-11-09 15:54:24', '2022-11-09 15:54:53'),
(10, 'asdasdf', 'sdfsdf', 0, '2022-11-15 22:11:19', '2022-11-13 21:53:07', '2022-11-15 22:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `layouti_categories_services`
--

CREATE TABLE `layouti_categories_services` (
  `id` bigint UNSIGNED NOT NULL,
  `nameEn` varchar(255) NOT NULL,
  `nameAr` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `layouti_categories_services`
--

INSERT INTO `layouti_categories_services` (`id`, `nameEn`, `nameAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'UX Design', 'تصميم تجربة المستخدم', NULL, '2022-11-08 01:36:45', '2022-11-08 15:19:08'),
(2, 'Voluptatibus incidun111', 'Nihil eius quod poss1111111', '2022-11-08 01:52:00', '2022-11-08 01:51:54', '2022-11-08 01:52:00'),
(3, 'Logo Branding', 'تصميم الهوية البصرية', NULL, '2022-11-08 01:53:54', '2022-11-08 15:19:22'),
(4, 'UI Design', 'تصميم واجهات المستخدم', NULL, '2022-11-08 15:18:44', '2022-11-08 15:19:33'),
(5, 'In-house projects', 'مشاريع داخلية', NULL, '2022-11-08 15:18:57', '2022-11-08 15:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `layouti_i_needs`
--

CREATE TABLE `layouti_i_needs` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) NOT NULL,
  `titleAr` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `layouti_i_needs`
--

INSERT INTO `layouti_i_needs` (`id`, `titleEn`, `titleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Design Websites', 'تصميم مواقع إلكترونية', NULL, '2022-11-02 20:51:40', '2022-11-08 15:51:44'),
(2, 'Design Mobile Application', 'تصميم تطبيقات آب', NULL, '2022-11-03 21:38:36', '2022-11-08 15:49:00'),
(3, 'Eiusmod et eum rem r111111111111111', 'Aliquid et incididun111111111111111', '2022-11-03 21:40:32', '2022-11-03 21:38:40', '2022-11-03 21:40:32'),
(4, 'Rem vel et eum fugit11111111', 'Quod adipisci nesciu111111111111111', '2022-11-03 21:39:43', '2022-11-03 21:39:03', '2022-11-03 21:39:43'),
(5, 'Rem vel et eum fugit111111111111111111', 'Quod adipisci nesciu111111111111111111111', '2022-11-03 21:39:37', '2022-11-03 21:39:07', '2022-11-03 21:39:37'),
(6, 'Design Dashboard & Systems', 'تصميم لوحة القيادة وأنظمة تحكم', NULL, '2022-11-03 22:58:43', '2022-11-08 15:49:57'),
(7, 'Logo Branding', 'العلامة التجارية للشعار', NULL, '2022-11-08 15:50:27', '2022-11-08 15:50:27'),
(8, 'Branding Identity', 'هوية العلامة التجارية', NULL, '2022-11-08 15:51:02', '2022-11-08 15:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `layouti_scopes`
--

CREATE TABLE `layouti_scopes` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `layouti_scopes`
--

INSERT INTO `layouti_scopes` (`id`, `titleEn`, `titleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(16, 'Branding', NULL, NULL, '2022-11-09 20:25:53', '2022-11-10 15:44:42'),
(17, 'UX/UI Design', NULL, NULL, '2022-11-09 20:25:53', '2022-11-19 14:54:32'),
(18, 'UX Design', 'Minima occaecat aliq', NULL, '2022-11-09 20:25:53', '2022-11-19 14:53:44'),
(19, 'Quo magnam qui ducim', 'Ut consectetur conse', '2022-11-12 21:10:43', '2022-11-09 20:28:40', '2022-11-12 21:10:43'),
(20, 'Tempor aspernatur ci', 'Eu sapiente ullamco', '2022-11-12 21:10:51', '2022-11-09 20:28:40', '2022-11-12 21:10:51'),
(21, NULL, NULL, '2022-11-10 18:37:20', '2022-11-09 20:35:22', '2022-11-10 18:37:20'),
(22, NULL, NULL, '2022-11-10 15:39:18', '2022-11-09 20:35:22', '2022-11-10 15:39:18'),
(23, NULL, NULL, '2022-11-10 15:39:15', '2022-11-09 20:35:22', '2022-11-10 15:39:15'),
(24, NULL, NULL, '2022-11-10 15:39:11', '2022-11-09 20:38:42', '2022-11-10 15:39:11'),
(25, 'In-house Projects', NULL, NULL, '2022-11-19 14:52:26', '2022-11-19 14:52:26'),
(26, 'title 33', 'title 33', '2022-11-19 15:03:49', '2022-11-19 15:02:42', '2022-11-19 15:03:49'),
(27, 'asdasdas', 'dasdasd', '2022-11-19 15:03:42', '2022-11-19 15:03:18', '2022-11-19 15:03:42'),
(28, 'UI Design', NULL, NULL, '2022-11-19 15:45:23', '2022-11-20 12:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `layouti_scope_cards`
--

CREATE TABLE `layouti_scope_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` text,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `card` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `layouti_scope_cards`
--

INSERT INTO `layouti_scope_cards` (`id`, `icon`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 'media/Scopes/1668933541-0-0x0.jpg', 'Gathering information', NULL, 'We start with a deep understating of the product and the company.', NULL, 16, NULL, '2022-11-09 20:25:53', '2022-11-20 13:39:01'),
(8, NULL, 'Kickoff', NULL, 'We will go deep into the root of your problem and identify your potential audience, which the solutions will be, and why they are.', NULL, 17, NULL, '2022-11-09 20:25:53', '2022-11-10 15:52:42'),
(9, 'media/Scopes/1668946611-0-Group 7090.png', 'Kickoff', 'Totam quis enim ut e', 'We will go deep into the root of your problem and identify your potential audience, which the solutions will be, and why they are.', 'Provident id aspern', 18, NULL, '2022-11-09 20:25:53', '2022-11-20 17:16:51'),
(10, NULL, 'Ut quidem enim esse', 'Enim qui commodi eos', 'Aut eum officia in t', 'Culpa voluptatem in', 19, '2022-11-12 21:10:43', '2022-11-09 20:28:40', '2022-11-12 21:10:43'),
(11, NULL, 'Quisquam sapiente ei', 'Repudiandae dolore e', 'Consequatur quo eius', 'Voluptate aspernatur', 20, '2022-11-12 21:10:51', '2022-11-09 20:28:40', '2022-11-12 21:10:51'),
(12, NULL, NULL, NULL, NULL, NULL, 21, '2022-11-10 18:37:20', '2022-11-09 20:35:22', '2022-11-10 18:37:20'),
(13, NULL, NULL, NULL, NULL, NULL, 22, '2022-11-10 15:39:18', '2022-11-09 20:35:22', '2022-11-10 15:39:18'),
(14, NULL, NULL, NULL, NULL, NULL, 23, '2022-11-10 15:39:15', '2022-11-09 20:35:22', '2022-11-10 15:39:15'),
(15, NULL, NULL, NULL, NULL, NULL, 24, '2022-11-10 15:39:11', '2022-11-09 20:38:42', '2022-11-10 15:39:11'),
(16, 'media/Scopes/1668933587-1-1668855448-image-Etoy app.png', 'Analyzing & Auditing', NULL, 'We analyze the existing visual identity and also analyze the main competitors’ visual identity to come up with a hypothesis of the branding style we are going to have.', NULL, 16, NULL, '2022-11-10 15:44:42', '2022-11-20 13:39:49'),
(17, NULL, 'Visual Inspirations', NULL, 'It is whole about trying to find visual inspirations to build a foundation of the color palette, icons, and shapes.', NULL, 16, NULL, '2022-11-10 15:44:42', '2022-11-10 15:44:42'),
(18, NULL, 'Sketches', NULL, 'In this stage, we start sketching some ideas of how the logo could look like. We usually define 3 sketches and then start refining them.', NULL, 16, NULL, '2022-11-10 15:44:42', '2022-11-10 15:44:42'),
(19, NULL, 'Logo mark', NULL, 'After the logo sign draft shape is approved, we explore typefaces, cases, and design lettering to find the best pair for a logo sign.', NULL, 16, NULL, '2022-11-10 15:44:42', '2022-11-10 15:44:42'),
(20, NULL, 'Coloring & images', NULL, 'We spent enough time choosing the best color combination to address the brand identity and reflect it well.', NULL, 16, NULL, '2022-11-10 15:44:42', '2022-11-10 15:44:42'),
(21, NULL, 'Fine-tune', NULL, 'We finalize the logo design at this stage with guidelines to be perfectly balanced. We create documentation about how to use the brand identity in many places either offline/online.', NULL, 16, NULL, '2022-11-10 15:44:42', '2022-11-10 15:44:42'),
(22, NULL, 'UX Research', NULL, 'We will artfully research, understand and analyze the causes of the problems to find appropriate solutions for you.', NULL, 17, NULL, '2022-11-10 15:52:42', '2022-11-10 15:52:42'),
(23, NULL, 'Ideation', NULL, 'We will bombard all ideas, putting them on the table to find the solutions and will not stop at just a clear solution.', NULL, 17, NULL, '2022-11-10 15:52:42', '2022-11-10 15:52:42'),
(24, NULL, 'UX Design', NULL, 'We craft inclusive digital experiences by rigorously testing and incorporating your users into our design process.', NULL, 17, NULL, '2022-11-10 16:52:39', '2022-11-10 18:39:05'),
(25, NULL, 'Branding', NULL, 'We will help you design responsible coloring strategies that create transformative change to improve continued success.', NULL, 17, NULL, '2022-11-10 16:52:39', '2022-11-10 18:39:05'),
(26, NULL, 'UI Design', NULL, 'We with our UI design combine accessibility and usability with your content and marketing goals for the users.', NULL, 17, NULL, '2022-11-10 16:52:39', '2022-11-10 18:39:05'),
(27, 'media/Scopes/1668946611-1-Group 7090.png', 'UX Research', NULL, 'We will artfully research, understand and analyze the causes of the problems to find appropriate solutions for you.', NULL, 18, NULL, '2022-11-10 16:56:32', '2022-11-20 17:16:51'),
(28, 'media/Scopes/1668946611-2-Group 7090.png', 'Ideation', NULL, 'We will bombard all ideas, putting them on the table to find the solutions, and will not stop at just a clear solution.', NULL, 18, NULL, '2022-11-10 16:56:32', '2022-11-20 17:16:51'),
(29, 'media/Scopes/1668946611-3-Group 7090.png', 'UX Design', NULL, 'We craft inclusive digital experiences by rigorously testing and incorporating your users into our design process.', NULL, 18, NULL, '2022-11-10 16:56:32', '2022-11-20 17:16:51'),
(30, 'media/Scopes/1668946611-4-Group 7090.png', 'Branding', NULL, 'We will help you design responsible coloring strategies that create transformative change to improve continued success.', NULL, 18, NULL, '2022-11-10 16:56:32', '2022-11-20 17:16:51'),
(31, 'media/Scopes/1668946611-5-Group 7090.png', 'UI Design', NULL, 'We with our UI design combine accessibility and usability with your content and marketing goals for the users.', NULL, 18, NULL, '2022-11-10 16:56:32', '2022-11-20 17:16:51'),
(32, NULL, 'Kickoff', NULL, 'We will go deep into the root of your problem and identify your potential audience, which the solutions will be, and why they are.', NULL, 25, NULL, '2022-11-19 14:52:26', '2022-11-19 14:52:26'),
(33, NULL, 'UX Research', NULL, 'We will artfully research, understand and analyze the causes of the problems to find appropriate solutions for you.', NULL, 25, NULL, '2022-11-19 14:52:26', '2022-11-19 14:52:26'),
(34, NULL, 'Ideation', NULL, 'We will bombard all ideas, putting them on the table to find the solutions, and will not stop at just a clear solution.', NULL, 25, NULL, '2022-11-19 14:52:26', '2022-11-19 14:52:26'),
(35, NULL, 'UX Design', NULL, 'We craft inclusive digital experiences by rigorously testing and incorporating your users into our design process.', NULL, 25, NULL, '2022-11-19 14:52:26', '2022-11-19 14:52:26'),
(36, NULL, 'Branding', NULL, 'We will help you design responsible coloring strategies that create transformative change to improve continued success.', NULL, 25, NULL, '2022-11-19 14:52:26', '2022-11-19 14:52:26'),
(37, NULL, 'UI Design', NULL, 'We with our UI design combine accessibility and usability with your content and marketing goals for the users.', NULL, 25, NULL, '2022-11-19 14:52:26', '2022-11-19 14:52:26'),
(38, NULL, 'Optimize & Improve', NULL, 'We will create it, putting your target audience in mind in the first place to ensure them the best experience for your product.', NULL, 25, NULL, '2022-11-19 14:52:26', '2022-11-19 14:52:26'),
(39, NULL, 'afdadf', 'sdgsdg', 'sdgdsg', 'sdgsdg', 26, '2022-11-19 15:03:49', '2022-11-19 15:02:42', '2022-11-19 15:03:49'),
(40, NULL, 'asdasd', 'asdas', 'dsad', 'asd', 27, '2022-11-19 15:03:42', '2022-11-19 15:03:18', '2022-11-19 15:03:42'),
(41, NULL, 'Kickoff', NULL, 'We will go deep into the root of your problem and identify your potential audience, which the solutions will be, and why they are.', NULL, 28, NULL, '2022-11-19 15:45:23', '2022-11-20 12:03:27'),
(42, NULL, 'Ideation', NULL, 'We will bombard all ideas, putting them on the table to find the solutions and will not stop at just a clear solution.', NULL, 28, NULL, '2022-11-20 12:03:22', '2022-11-20 12:03:27'),
(43, NULL, 'UX Design', NULL, 'We craft inclusive digital experiences by rigorously testing and incorporating your users into our design process.', NULL, 28, NULL, '2022-11-20 12:03:22', '2022-11-20 12:03:27'),
(44, NULL, 'Branding', NULL, 'We will help you design responsible coloring strategies that create transformative change to improve continued success.', NULL, 28, NULL, '2022-11-20 12:03:22', '2022-11-20 12:03:27'),
(45, NULL, 'UI Design', NULL, 'We with our UI design combine accessibility and usability with your content and marketing goals for the users.', NULL, 28, NULL, '2022-11-20 12:03:22', '2022-11-20 12:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_design_packages`
--

CREATE TABLE `learn_u_i_design_packages` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `hours` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_design_packages`
--

INSERT INTO `learn_u_i_design_packages` (`id`, `image`, `titleEn`, `titleAr`, `price`, `hours`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'media/LearnUI/UIDesignPackage/1669039269-Travel App.png', 'Chase Mcleod', 'Erin Callahan', '773', '138', 'Pariatur Et tempora', 'Aperiam veniam quas', NULL, '2022-11-20 15:51:27', '2022-11-21 19:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_design_package_points`
--

CREATE TABLE `learn_u_i_design_package_points` (
  `id` bigint UNSIGNED NOT NULL,
  `pointEn` text,
  `pointAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_design_package_points`
--

INSERT INTO `learn_u_i_design_package_points` (`id`, `pointEn`, `pointAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Ad ipsum aut enim a', 'Sit quod voluptatem', 1, NULL, '2022-11-20 15:51:27', '2022-11-21 19:01:09'),
(2, 'Eu quos voluptatibus', 'At laboris molestiae', 1, NULL, '2022-11-21 19:01:09', '2022-11-21 19:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_header_contents`
--

CREATE TABLE `learn_u_i_header_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `subTitleEn` varchar(255) DEFAULT NULL,
  `subTitleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `createByEn` varchar(255) DEFAULT NULL,
  `createdByAr` varchar(255) DEFAULT NULL,
  `iconOfCreated` text,
  `createdInEn` varchar(255) DEFAULT NULL,
  `createdInAr` varchar(255) DEFAULT NULL,
  `iconInCreated` text,
  `speakerEn` varchar(255) DEFAULT NULL,
  `speakerAr` varchar(255) DEFAULT NULL,
  `iconOfSpeaker` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_header_contents`
--

INSERT INTO `learn_u_i_header_contents` (`id`, `image`, `titleEn`, `titleAr`, `subTitleEn`, `subTitleAr`, `descriptionEn`, `descriptionAr`, `createByEn`, `createdByAr`, `iconOfCreated`, `createdInEn`, `createdInAr`, `iconInCreated`, `speakerEn`, `speakerAr`, `iconOfSpeaker`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'media/LearnUI/HeaderContent/1669037154-image 1.png', 'Kenneth Guzman', 'Yoshi Velazquez', 'Miriam Lynch', 'India Castillo', 'Itaque esse eiusmod', 'Quam incididunt elit', 'Pandora Ramsey', NULL, 'media/LearnUI/HeaderContent/1669037154-iconOfCreated-Travel App.png', 'May Daugherty', 'Maxwell Spencer', 'media/LearnUI/HeaderContent/1669037154-iconInCreated-image 1.png', 'Nyssa Calderon', 'Palmer Wyatt', 'media/LearnUI/HeaderContent/1669036855-iconOfSpeaker-Certificate.jpg', NULL, '2022-11-20 15:37:09', '2022-11-21 18:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_highlits_designs`
--

CREATE TABLE `learn_u_i_highlits_designs` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `subTitleEn` varchar(255) DEFAULT NULL,
  `subTitleAr` varchar(255) DEFAULT NULL,
  `highlits` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_highlits_designs`
--

INSERT INTO `learn_u_i_highlits_designs` (`id`, `titleEn`, `titleAr`, `subTitleEn`, `subTitleAr`, `highlits`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'sadsad', 'asdasd', 'asdasd', 'asdasd', '[\"Ketchup\",\"Relish\",\"Flashlight\"]', NULL, '2022-11-20 15:44:17', '2022-11-21 18:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_questions_collapses`
--

CREATE TABLE `learn_u_i_questions_collapses` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `subTitleEn` varchar(255) DEFAULT NULL,
  `subTitleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_questions_collapses`
--

INSERT INTO `learn_u_i_questions_collapses` (`id`, `titleEn`, `titleAr`, `subTitleEn`, `subTitleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Cassady Griffin', 'Eleanor Reese', 'Madeline Mccullough', 'Bianca Romero', NULL, '2022-11-20 17:07:40', '2022-11-21 19:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_questions_collapse_cards`
--

CREATE TABLE `learn_u_i_questions_collapse_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `questionsEn` varchar(255) DEFAULT NULL,
  `questionsAr` varchar(255) DEFAULT NULL,
  `answerEn` text,
  `answerAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_questions_collapse_cards`
--

INSERT INTO `learn_u_i_questions_collapse_cards` (`id`, `questionsEn`, `questionsAr`, `answerEn`, `answerAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Illana Keith', 'Rashad Robinson', 'Eum pariatur Assume', 'Praesentium nihil ma', 1, NULL, '2022-11-20 17:07:40', '2022-11-21 19:12:09'),
(2, 'Acton Key', 'Madison Woods', 'Inventore a providen', 'Quas et labore quis', 1, NULL, '2022-11-21 19:12:09', '2022-11-21 19:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_steps_reach_cards`
--

CREATE TABLE `learn_u_i_steps_reach_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `subTitleEn` varchar(255) DEFAULT NULL,
  `subTitleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_steps_reach_cards`
--

INSERT INTO `learn_u_i_steps_reach_cards` (`id`, `titleEn`, `titleAr`, `subTitleEn`, `subTitleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Genevieve Benjamin', 'Indira Shepard', 'Cassidy Medina', 'Colleen Sutton', NULL, '2022-11-20 15:57:20', '2022-11-21 20:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_steps_reach_cards_of_cards`
--

CREATE TABLE `learn_u_i_steps_reach_cards_of_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` text,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_steps_reach_cards_of_cards`
--

INSERT INTO `learn_u_i_steps_reach_cards_of_cards` (`id`, `icon`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'media/LearnUI/StepsReachCardsOfCards/1669046234-Travel App (1).png', 'Shea Mack', 'Walter Herring', 'Velit quis eu dolor', 'Aliqua Cillum cillu', 1, NULL, '2022-11-20 15:57:20', '2022-11-21 20:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_testimonials`
--

CREATE TABLE `learn_u_i_testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_testimonials`
--

INSERT INTO `learn_u_i_testimonials` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Jenna Newman', 'Yolanda Valencia', 'Non sed est temporib', 'Id commodi molestiae', NULL, '2022-11-20 15:47:37', '2022-11-21 20:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_testimonials_cards`
--

CREATE TABLE `learn_u_i_testimonials_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `nameEn` varchar(255) DEFAULT NULL,
  `nameAr` varchar(255) DEFAULT NULL,
  `jobTitleEn` varchar(255) DEFAULT NULL,
  `jobTitleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_testimonials_cards`
--

INSERT INTO `learn_u_i_testimonials_cards` (`id`, `nameEn`, `nameAr`, `jobTitleEn`, `jobTitleAr`, `descriptionEn`, `descriptionAr`, `image`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Francis Mccormick', 'Mufutau Simon', 'Risa Bryant', 'Jana Montoya', 'Qui et dolor quia li', 'Quidem aliquam dolor', 'media/LearnUI/Testimonials/1669038686-0-Travel App.png', 1, NULL, '2022-11-20 15:47:37', '2022-11-21 20:29:08'),
(2, 'Rooney Juarez', 'Chaim Shepard', 'Oleg Bowen', 'Helen Carroll', 'Nisi obcaecati magni', 'Magni nisi placeat', 'media/LearnUI/Testimonials/1669038646-1-Travel App.png', 1, '2022-11-21 18:53:42', '2022-11-21 18:50:46', '2022-11-21 18:53:42'),
(3, 'Bertha Estrada', 'Hashim Jones', 'Lucas Thornton', 'Macy Orr', 'Aut enim eveniet su', 'Nesciunt sunt ex fa', 'media/LearnUI/Testimonials/1669044548-1-1665469100.Group 2434.png', 1, NULL, '2022-11-21 20:29:08', '2022-11-21 20:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_u_x_design_packages`
--

CREATE TABLE `learn_u_i_u_x_design_packages` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `hours` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_u_x_design_packages`
--

INSERT INTO `learn_u_i_u_x_design_packages` (`id`, `image`, `titleEn`, `titleAr`, `price`, `hours`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'media/LearnUI/UXDesignPackage/1669039617-Travel App.png', 'Zelda Rasmussen', 'Kamal Espinoza', '8', '929', 'Cum perferendis quas', 'Praesentium eos illo', NULL, '2022-11-20 15:53:07', '2022-11-21 19:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_u_x_design_package_points`
--

CREATE TABLE `learn_u_i_u_x_design_package_points` (
  `id` bigint UNSIGNED NOT NULL,
  `pointEn` text,
  `pointAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_u_x_design_package_points`
--

INSERT INTO `learn_u_i_u_x_design_package_points` (`id`, `pointEn`, `pointAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Culpa aperiam repell', 'Sunt cillum placeat', 1, NULL, '2022-11-20 15:53:07', '2022-11-21 19:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_u_x_u_i_design_packages`
--

CREATE TABLE `learn_u_i_u_x_u_i_design_packages` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `hours` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_u_x_u_i_design_packages`
--

INSERT INTO `learn_u_i_u_x_u_i_design_packages` (`id`, `image`, `titleEn`, `titleAr`, `price`, `hours`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'media/LearnUI/UXUIDesignPackage/1669039649-a3f44607-dd79-4b39-9ed9-ec280e0848d8.png', 'Cameran Foley', 'Fulton Dennis', '442', '373', 'Obcaecati corrupti', 'Voluptatem animi ad', NULL, '2022-11-20 15:54:31', '2022-11-21 19:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_u_x_u_i_design_package_points`
--

CREATE TABLE `learn_u_i_u_x_u_i_design_package_points` (
  `id` bigint UNSIGNED NOT NULL,
  `pointEn` text,
  `pointAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_u_x_u_i_design_package_points`
--

INSERT INTO `learn_u_i_u_x_u_i_design_package_points` (`id`, `pointEn`, `pointAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Quos excepturi dolor', 'Ad ab voluptas aut d', 1, NULL, '2022-11-20 15:54:31', '2022-11-21 19:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_what_offers`
--

CREATE TABLE `learn_u_i_what_offers` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `subTitleEn` varchar(255) DEFAULT NULL,
  `subTitleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_what_offers`
--

INSERT INTO `learn_u_i_what_offers` (`id`, `image`, `titleEn`, `titleAr`, `subTitleEn`, `subTitleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'media/LearnUI/WhatOffer/1669037626-Travel App.png', 'Branden Kaufman', 'Blaze May', 'Lester Clark', 'Dieter Burke', NULL, '2022-11-20 15:42:36', '2022-11-21 18:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_what_offer_points`
--

CREATE TABLE `learn_u_i_what_offer_points` (
  `id` bigint UNSIGNED NOT NULL,
  `pointEn` text,
  `pointAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_what_offer_points`
--

INSERT INTO `learn_u_i_what_offer_points` (`id`, `pointEn`, `pointAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Ipsam qui optio eiu', 'Omnis dolor consequa', 1, NULL, '2022-11-20 15:42:36', '2022-11-21 18:33:46'),
(2, 'Anim consectetur rec', 'Non nulla sunt culpa', 1, NULL, '2022-11-21 18:33:46', '2022-11-21 18:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_who_can_attends`
--

CREATE TABLE `learn_u_i_who_can_attends` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `subTitleEn` varchar(255) DEFAULT NULL,
  `subTitleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_who_can_attends`
--

INSERT INTO `learn_u_i_who_can_attends` (`id`, `image`, `titleEn`, `titleAr`, `subTitleEn`, `subTitleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'media/LearnUI/WhoCanAttend/1669037271-image 1.png', 'asdsad', 'sadasd', 'dsadasd', 'asdasd', NULL, '2022-11-20 15:39:28', '2022-11-21 18:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `learn_u_i_who_can_attend_points`
--

CREATE TABLE `learn_u_i_who_can_attend_points` (
  `id` bigint UNSIGNED NOT NULL,
  `pointEn` text,
  `pointAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `learn_u_i_who_can_attend_points`
--

INSERT INTO `learn_u_i_who_can_attend_points` (`id`, `pointEn`, `pointAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'asdasd', 'asdasd', 1, NULL, '2022-11-20 15:40:04', '2022-11-21 18:27:51'),
(2, 'asdasd', 'asdasd', 1, NULL, '2022-11-21 18:27:06', '2022-11-21 18:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_20_193512_create_header_contents_table', 1),
(6, '2022_10_20_193640_create_what_we_will_serves_table', 1),
(7, '2022_10_20_193659_create_what_we_will_serve__cards_table', 1),
(8, '2022_10_20_193724_create_our_last_works_table', 1),
(9, '2022_10_20_193756_create_process_design_skills_table', 1),
(10, '2022_10_20_193813_create_process_design_skills__cards_table', 1),
(11, '2022_10_20_193833_create_testimonials_table', 1),
(12, '2022_10_20_193851_create_testimonials__cards_table', 1),
(13, '2022_10_20_193914_create_100things_table', 1),
(14, '2022_10_20_193949_create_need_layouti_for_your_projects_table', 1),
(15, '2022_10_20_194007_create_need_layouti_for_your_project__cards_table', 1),
(16, '2022_10_30_073021_create_about_header_contents_table', 2),
(17, '2022_10_30_073111_create_about_learn_about_layoutis_table', 2),
(18, '2022_10_30_073234_create_about_teams_table', 2),
(19, '2022_10_30_073248_create_about_team_cards_table', 2),
(20, '2022_10_30_073331_create_about_through_our_values_table', 2),
(21, '2022_10_30_073348_create_about_through_our_values_cards_table', 2),
(22, '2022_10_30_073426_create_about_check_out_our_clients_table', 2),
(23, '2022_10_30_073441_create_about_check_out_our_clients_cards_table', 2),
(24, '2022_10_30_074337_create_work_header_contents_table', 2),
(25, '2022_10_30_074438_create_work_we_fired_up_innovateds_table', 2),
(26, '2022_10_31_110658_create_services_header_contents_table', 3),
(27, '2022_10_31_111041_create_services_learn_about_layoutis_table', 3),
(28, '2022_10_31_111134_create_services_process_timelines_table', 3),
(29, '2022_10_31_111135_create_services_process_timeline_cards_table', 3),
(31, '2022_10_31_111323_create_things_header_contents_table', 3),
(32, '2022_10_31_111359_create_things_opportunity_always_exists_table', 3),
(33, '2022_10_31_134752_create_layouti_categories_table', 4),
(34, '2022_11_01_123829_create_say_hellos_table', 5),
(35, '2022_11_01_143204_create_contact_header_contents_table', 5),
(36, '2022_11_01_143300_create_contact_we_fired_up_innovateds_table', 5),
(37, '2022_11_01_143336_create_contact_information_table', 5),
(38, '2022_11_01_143533_create_contact_information_mobile_cards_table', 5),
(39, '2022_11_01_143556_create_contact_information_email_cards_table', 5),
(40, '2022_11_01_143628_create_contact_information_whats_app_cards_table', 5),
(41, '2022_11_01_143708_create_contact_information_country_cards_table', 5),
(42, '2022_11_01_143739_create_contact_company_decks_table', 5),
(45, '2022_11_02_093529_create_layouti_i_needs_table', 6),
(46, '2022_11_02_093547_create_layouti_budgets_table', 6),
(50, '2022_11_01_143815_create_layouti_categories_faqs_table', 8),
(51, '2022_11_01_143820_create_contact_f_a_qs_table', 8),
(52, '2022_11_01_143842_create_contact_f_a_qs_cards_table', 8),
(53, '2022_11_02_093619_create_hire_us_table', 9),
(54, '2022_11_03_084822_create_product_general_information_table', 10),
(55, '2022_11_03_084852_create_product_project_names_table', 10),
(56, '2022_11_03_084853_create_product_project_team_members_table', 10),
(57, '2022_11_03_084912_create_product_in_depths_table', 10),
(58, '2022_11_03_084933_create_product_in_depth_cards_table', 10),
(60, '2022_11_03_085026_create_product_our_clients_table', 10),
(61, '2022_11_03_085047_create_product_thanks_sections_table', 10),
(62, '2022_11_03_085111_create_product_thanks_section_cards_table', 10),
(63, '2022_11_03_085129_create_product_s_e_o_s_table', 10),
(64, '2022_11_07_120039_create_product_body_brandings_table', 11),
(65, '2022_11_07_120136_create_product_body_branding_images_table', 11),
(66, '2022_10_31_110652_create_layouti_categories_services_table', 12),
(67, '2022_10_31_111232_create_services_services_categories_table', 12),
(68, '2022_11_02_135416_create_layouti_scopes_table', 13),
(69, '2022_11_02_135447_create_layouti_scope_cards_table', 13),
(70, '2022_11_03_085007_create_product_scope_of_works_table', 13),
(71, '2022_11_09_100750_create_deliverables_table', 14),
(72, '2022_11_09_120941_create_body_design_app_section_ones_table', 15),
(74, '2022_11_09_121036_create_body_design_app_section_threes_table', 15),
(76, '2022_11_09_121056_create_body_design_app_section_fives_table', 15),
(77, '2022_11_09_121103_create_body_design_app_section_sixes_table', 15),
(78, '2022_11_09_121114_create_body_design_app_section_sevens_table', 15),
(79, '2022_11_09_121259_create_body_design_app_section_eights_table', 15),
(80, '2022_11_09_121313_create_body_design_app_section_nines_table', 15),
(81, '2022_11_09_121338_create_body_design_app_section_tens_table', 15),
(82, '2022_11_09_121353_create_body_design_app_section_elevens_table', 15),
(83, '2022_11_09_121408_create_body_design_app_section_twelves_table', 15),
(84, '2022_11_09_121422_create_body_design_app_section_thirteens_table', 15),
(86, '2022_11_09_121455_create_body_design_app_section_fifteens_table', 15),
(87, '2022_11_09_121509_create_body_design_app_section_sixteens_table', 15),
(88, '2022_11_09_121521_create_body_design_app_section_seventeens_table', 15),
(89, '2022_11_09_121535_create_body_design_app_section_eighteens_table', 15),
(92, '2022_11_09_121440_create_body_design_app_section_fourteens_table', 16),
(93, '2022_11_09_121441_create_body_design_app_section_fourteen_cards_table', 16),
(94, '2022_11_10_070837_create_project_information_table', 16),
(95, '2022_11_09_121015_create_body_design_app_section_twos_table', 17),
(96, '2022_11_10_133933_create_services_categories_table', 18),
(97, '2022_11_10_133951_create_services_categories_cards_table', 18),
(98, '2022_11_13_125646_create_learn_u_i_header_contents_table', 19),
(99, '2022_11_13_125725_create_learn_u_i_who_can_attends_table', 19),
(100, '2022_11_13_125757_create_learn_u_i_what_offers_table', 19),
(101, '2022_11_13_125826_create_learn_u_i_highlits_designs_table', 19),
(102, '2022_11_13_125857_create_learn_u_i_testimonials_table', 19),
(103, '2022_11_13_125931_create_learn_u_i_design_packages_table', 19),
(104, '2022_11_13_130110_create_learn_u_i_u_x_u_i_design_packages_table', 19),
(105, '2022_11_13_130128_create_learn_u_i_u_x_design_packages_table', 19),
(106, '2022_11_13_130159_create_learn_u_i_steps_reach_cards_table', 19),
(107, '2022_11_13_130219_create_learn_u_i_questions_collapses_table', 19),
(108, '2022_11_13_132046_create_learn_u_i_who_can_attend_points_table', 19),
(109, '2022_11_13_132439_create_learn_u_i_what_offer_points_table', 19),
(110, '2022_11_13_132748_create_learn_u_i_testimonials_cards_table', 19),
(111, '2022_11_13_133045_create_learn_u_i_design_package_points_table', 19),
(112, '2022_11_13_133113_create_learn_u_i_u_x_u_i_design_package_points_table', 19),
(113, '2022_11_13_133141_create_learn_u_i_u_x_design_package_points_table', 19),
(114, '2022_11_13_133539_create_learn_u_i_steps_reach_cards_of_cards_table', 19),
(115, '2022_11_13_133739_create_learn_u_i_questions_collapse_cards_table', 19),
(116, '2022_11_09_121049_create_body_design_app_section_fours_table', 20),
(117, '2022_11_14_103532_create_design_categories_table', 21),
(118, '2022_11_14_110441_create_design_header_contents_table', 21),
(119, '2022_11_14_111419_create_designproducts_statics_table', 21),
(120, '2022_11_14_111459_create_designproducts_static_cards_table', 21),
(121, '2022_11_14_111518_create_designproducts_static_cards_of_cards_table', 21),
(122, '2022_11_14_111544_create_design_links_table', 21),
(123, '2022_11_14_111601_create_design_links_cards_table', 21),
(124, '2022_11_14_150711_create_blog_authors_table', 22),
(125, '2022_11_14_150732_create_blog_categories_table', 22),
(126, '2022_11_14_150757_create_blogs_table', 22),
(127, '2022_11_14_150811_create_blog_images_table', 22),
(128, '2022_11_14_150831_create_blog_paragraphs_table', 22),
(129, '2022_11_14_150842_create_blog_paragraph_images_table', 22),
(130, '2022_11_14_150855_create_blog_paragraph_seos_table', 22),
(131, '2022_11_14_111602_create_design_projects_table', 23),
(132, '2022_11_14_111603_create_design_project_informations_table', 23),
(133, '2022_11_14_111604_create_design_project_images_table', 23),
(134, '2022_11_14_111605_create_design_project_s_e_o_s_table', 23),
(135, '2022_11_27_121152_create_home_page_header_contents_table', 24),
(136, '2022_11_27_121210_create_home_page_seciton_ones_table', 24),
(137, '2022_11_27_121225_create_home_page_seciton_one_cards_table', 24),
(138, '2022_11_27_121255_create_home_page_seciton_twos_table', 24),
(139, '2022_11_27_121315_create_home_page_seciton_threes_table', 24),
(140, '2022_11_27_121328_create_home_page_seciton_fours_table', 24),
(141, '2022_11_27_121351_create_about_page_header_contents_table', 24),
(142, '2022_11_27_121407_create_about_page_section_ones_table', 24),
(143, '2022_11_27_121425_create_about_page_seciton_twos_table', 24),
(144, '2022_11_27_121435_create_about_page_seciton_two_cards_table', 24),
(156, '2022_11_28_121905_create_contact_us_page_header_contents_table', 25),
(157, '2022_11_28_121926_create_contact_us_page_section_ones_table', 25),
(158, '2022_11_28_121946_create_contact_us_page_section_twos_table', 25),
(159, '2022_11_28_121955_create_contact_us_page_section_two_cards_table', 25),
(160, '2022_11_28_122318_create_global_page_etoy_app_settings_table', 25),
(161, '2022_11_28_122335_create_global_page_etoy_faqs_table', 25),
(162, '2022_11_28_122348_create_global_page_etoy_faq_cards_table', 25),
(163, '2022_11_28_122406_create_global_page_etoy_ads_table', 25),
(164, '2022_11_28_123637_create_contact_us_table', 25),
(177, '2022_11_28_121316_create_terms_and_conditions_page_header_contents_table', 26),
(178, '2022_11_28_121433_create_terms_and_conditions_page_terms_of_uses_table', 26),
(179, '2022_11_28_121507_create_terms_and_conditions_page_terms_of_use_cards_table', 26),
(180, '2022_11_28_121523_create_terms_and_conditions_page_registrations_table', 26),
(181, '2022_11_28_121540_create_terms_and_conditions_page_registration_cards_table', 26),
(182, '2022_11_28_121552_create_terms_and_conditions_page_photo_guidelines_table', 26),
(183, '2022_11_28_121610_create_terms_and_conditions_page_photo_guidelines_cards_table', 26),
(184, '2022_11_28_121644_create_terms_and_conditions_page_points_policies_table', 26),
(185, '2022_11_28_121654_create_terms_and_conditions_page_points_policy_cards_table', 26),
(186, '2022_11_28_121733_create_terms_and_conditions_page_how_to_earn_points_table', 26),
(187, '2022_11_28_121749_create_terms_and_conditions_page_how_to_earn_points_cards_table', 26),
(188, '2022_12_01_084519_create_terms_and_conditions_page_header_content_cards_table', 26),
(189, '2022_12_01_084733_create_terms_and_conditions_page_terms_of_use_cards_of_cards_table', 26),
(190, '2022_12_01_084907_create_terms_and_conditions_page_registration_cards_of_cards_table', 26),
(191, '2022_12_01_090424_create_terms_and_conditions_page_how_to_earn_points_cards_of_cards_table', 26),
(192, '2022_12_01_093211_create_seo_page_home_pages_table', 26),
(193, '2022_12_01_093231_create_seo_page_terms_and_conditions_pages_table', 26),
(194, '2022_12_01_093246_create_seo_page_about_pages_table', 26),
(195, '2022_12_01_093256_create_seo_page_contact_pages_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `need_layouti_for_your_projects`
--

CREATE TABLE `need_layouti_for_your_projects` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `need_layouti_for_your_projects`
--

INSERT INTO `need_layouti_for_your_projects` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Need Layouti for your project?', 'Fatima Simsqdas', 'Great ideas need great layouts, so we are here to design for you layouts to serve your users’ needs and reflect their experience with a flame to fashion an exciting, eye-catching final product. Layouti team is the hero for UI/UX design &amp; Branding, we own giants.', 'as  dasdsa wq eqwewq eqw qweqwe', NULL, '2022-10-28 22:10:39', '2022-11-07 04:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `need_layouti_for_your_project__cards`
--

CREATE TABLE `need_layouti_for_your_project__cards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `need_layouti_for_your_project__cards`
--

INSERT INTO `need_layouti_for_your_project__cards` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Startups', 'Gannon Barnes', 'Goodbye to elaborate promises. We at Layouti have carefully thought out plans and expectations to put your project idea on top of the future.', 'Nostrud est est dol', 'media/HomePage/NeedLayoutiForYourProject/1668856493-0-for-startups-layoputi-icon.svg', 2, NULL, '2022-10-28 22:10:39', '2022-11-19 16:14:53'),
(3, 'Medium companies​​', 'Cain Crawford', 'We will expand the range of your development to luxury horizons, making your slogan limitless with the expertise of our creative team.', 'Culpa mollit debiti', 'media/HomePage/NeedLayoutiForYourProject/1668856493-1-medium-companies​​-layouti-icon.svg', 2, NULL, '2022-10-28 22:20:41', '2022-11-19 16:14:53'),
(4, 'Enterprises', 'Kyla Savage', 'Working with us is called clarity, so you will be on the lookout for your developments and the appropriate access to your great goals.', 'Rem velit ipsam magn', 'media/HomePage/NeedLayoutiForYourProject/1668856493-2-enterprises-layouti-icon.svg', 2, NULL, '2022-10-28 22:20:41', '2022-11-19 16:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `our_last_works`
--

CREATE TABLE `our_last_works` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `lastwork` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `our_last_works`
--

INSERT INTO `our_last_works` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `lastwork`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Our Latest Work', 'asa', 'As a professional UI UX design company, we layout the entire user experience design to concoct significant journeys for the clients. Check out Layouti’s latest mouthwatering work that will have your customers staying until closing time.', 'sa', '[\"108\",\"111\"]', NULL, '2022-10-21 16:14:09', '2022-11-27 19:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(171, 'App\\Models\\User', 16, 'MyToken', '29755ec3612594af8fa0c03e7cdc16de45cf349b7def3b31b7a7b1e5d672b25b', '[\"*\"]', NULL, '2022-11-18 00:47:27', '2022-11-18 00:47:27'),
(206, 'App\\Models\\User', 39, 'MyToken', 'ccd1243311b1c5b073a7cb00e79950231e7af509ed543a321f58c29914569068', '[\"*\"]', NULL, '2022-11-23 21:16:05', '2022-11-23 21:16:05'),
(209, 'App\\Models\\User', 1, 'MyToken', '5580c470ca840391bde75cb6485788db47b1c195a51b02951a0923acb721ad24', '[\"*\"]', NULL, '2022-11-27 13:31:54', '2022-11-27 13:31:54'),
(210, 'App\\Models\\User', 1, 'MyToken', '5de8efdeaff76dec60458cf38c06ebd92cac4deafd637708064a911618560306', '[\"*\"]', NULL, '2022-11-27 15:42:47', '2022-11-27 15:42:47'),
(211, 'App\\Models\\User', 1, 'MyToken', '69c720583adfc13ef85e498a3c1c20582542b996b849ba72bbd8182fa6cc2d3d', '[\"*\"]', NULL, '2022-11-27 19:29:00', '2022-11-27 19:29:00'),
(213, 'App\\Models\\User', 1, 'MyToken', '12118d0e410af34319429060cd688db4c4c4968ce93e6849779269d93d88c560', '[\"*\"]', NULL, '2022-11-28 12:53:24', '2022-11-28 12:53:24'),
(222, 'App\\Models\\User', 15, 'MyToken', 'd57bdb2c4c252fe0889465ee94f1d0f08d2af6a9e6fabe826538952454d52f69', '[\"*\"]', NULL, '2022-11-30 14:43:22', '2022-11-30 14:43:22'),
(223, 'App\\Models\\User', 15, 'MyToken', 'fb997373f958d2c4be8522a9bf75af0e523b62e61062491b868de950851f425e', '[\"*\"]', NULL, '2022-11-30 15:21:04', '2022-11-30 15:21:04'),
(224, 'App\\Models\\User', 1, 'MyToken', 'b5c23ed986387c55bb858d63850b601da78a63f7874f97b2f670fbc78d7bcfa8', '[\"*\"]', NULL, '2022-12-01 13:16:09', '2022-12-01 13:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `process_design_skills`
--

CREATE TABLE `process_design_skills` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `process_design_skills`
--

INSERT INTO `process_design_skills` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Process, design & skills', 'Marsden Santana', 'We always serve up something distinct. We mix a potent combination of layouti strategy with a generous splash of creative juices and blend in marketing-focused, customized solutions as a chaser.', 'Voluptatem occaecat', NULL, '2022-10-28 22:49:26', '2022-11-02 23:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `process_design_skills__cards`
--

CREATE TABLE `process_design_skills__cards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `ProcessPointsEn` varchar(255) DEFAULT NULL,
  `ProcessPointsAr` varchar(255) DEFAULT NULL,
  `image` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `process_design_skills__cards`
--

INSERT INTO `process_design_skills__cards` (`id`, `titleEn`, `titleAr`, `ProcessPointsEn`, `ProcessPointsAr`, `image`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 'UX  Research', 'Wayne Silva', '[\"Brand strategy\",\"User & stakeholder interviews\",\"User research\",\"Competitor analysis\",\"Persona & Scenario\",\"UX strategy\",\"Heuristic evaluation\",\"Customer journey mapping\",\"User testing\"]', '[]', 'media/HomePage/ProcessDesignSkills/1668856367-0-ux_research_layouti_icon.svg', 2, NULL, '2022-10-28 22:49:26', '2022-11-19 16:12:47'),
(6, 'UX/UI design', 'Mercedes Hendrix', '[\"Information Architecture\",\"User Flows\",\"Wireframe\",\"Branding\",\"Design System\",\"UI Design\",\"Interaction Design\",\"UI Testing\"]', '[]', 'media/HomePage/ProcessDesignSkills/1668856367-1-ux:ui_design_layouti_icon.svg', 2, NULL, '2022-10-28 22:51:56', '2022-11-19 16:12:47'),
(7, 'Skills', 'Lawrence Mathis', '[\"Problem Solving\",\"Business Focus\",\"Project Management\",\"Time Management\",\"Team Collaboration\",\"Startups Ideas\",\"Presentation Skills\",\"Create Idea From Scratch\"]', '[]', 'media/HomePage/ProcessDesignSkills/1668856367-2-skills_layouti_icon.svg', 2, NULL, '2022-10-28 22:51:56', '2022-11-19 16:12:47'),
(8, 'Software', 'Stone Henson', '[\"Sketch\",\"Figma\",\"InVision\",\"Adobe XD\",\"Adobe Illustrator\",\"Adobe Photoshop\",\"Adobe Premiere\",\"Adobe After Effects\"]', '[]', 'media/HomePage/ProcessDesignSkills/1668856367-3-software_layouti_icon.svg', 2, NULL, '2022-10-28 22:51:56', '2022-11-19 16:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_body_brandings`
--

CREATE TABLE `product_body_brandings` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` varchar(255) DEFAULT NULL,
  `descriptionAr` varchar(255) DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_body_brandings`
--

INSERT INTO `product_body_brandings` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(53, 'sdfsdf', 'sdfsdf', 'sdfsdf', 'sdfsdfdsf', 114, NULL, '2022-11-20 19:53:00', '2022-11-20 19:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_body_branding_images`
--

CREATE TABLE `product_body_branding_images` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_body_branding_images`
--

INSERT INTO `product_body_branding_images` (`id`, `image`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(36, 'media/ProductPage/BodyBrandingImagesCards/1668955980-image-Group 7936 (3).png', 114, NULL, '2022-11-20 19:53:00', '2022-11-20 19:53:00'),
(37, 'media/ProductPage/BodyBrandingImagesCards/1668955980-image-Group 7936 (1).png', 114, NULL, '2022-11-20 19:53:01', '2022-11-20 19:53:01'),
(38, 'media/ProductPage/BodyBrandingImagesCards/1668955981-image-Group 1907.png', 114, NULL, '2022-11-20 19:53:03', '2022-11-20 19:53:03'),
(39, 'media/ProductPage/BodyBrandingImagesCards/1668955983-image-Group 7936 (4).png', 114, NULL, '2022-11-20 19:53:04', '2022-11-20 19:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_general_information`
--

CREATE TABLE `product_general_information` (
  `id` bigint UNSIGNED NOT NULL,
  `category` bigint UNSIGNED DEFAULT NULL,
  `template` int DEFAULT NULL,
  `launch` varchar(500) DEFAULT '2022',
  `image` text,
  `thumbnailImage` text,
  `color` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_general_information`
--

INSERT INTO `product_general_information` (`id`, `category`, `template`, `launch`, `image`, `thumbnailImage`, `color`, `deleted_at`, `created_at`, `updated_at`) VALUES
(104, 11, 1, 'Est maiores dolores', NULL, NULL, '#862bd8', '2022-11-15 22:56:11', '2022-11-14 20:34:52', '2022-11-15 22:56:11'),
(105, 11, 1, NULL, NULL, NULL, '#000000', '2022-11-15 22:55:56', '2022-11-15 00:22:49', '2022-11-15 22:55:56'),
(106, 6, 2, '202١', NULL, NULL, '#ed7964', '2022-11-16 17:54:28', '2022-11-15 22:25:21', '2022-11-16 17:54:28'),
(107, 13, 1, '2015', 'media/ProductPage/GeneralInformation/1668863044-image-1668855448-image-Etoy app.png', 'media/ProductPage/GeneralInformation/1668863006-thumbnailImage-1668855448-image-Etoy app.png', '#60dd39', NULL, '2022-11-16 18:13:08', '2022-11-20 12:04:36'),
(108, 13, 1, '2017', 'media/ProductPage/GeneralInformation/1668860628-image-1668855448-image-Etoy app.png', 'media/ProductPage/GeneralInformation/1668860586-thumbnailImage-1668855448-image-Etoy app.png', '#4211cf', NULL, '2022-11-16 18:18:46', '2022-11-20 11:59:22'),
(109, 13, 1, '2021', 'media/ProductPage/GeneralInformation/1668931609-image-Mask Group.png', 'media/ProductPage/GeneralInformation/1668931610-thumbnailImage-Etoy app.png', '#ed7964', '2022-11-20 15:15:28', '2022-11-16 18:19:37', '2022-11-20 15:15:28'),
(110, 12, 1, NULL, NULL, NULL, '#000000', '2022-11-20 15:14:31', '2022-11-20 15:14:18', '2022-11-20 15:14:31'),
(111, 13, 1, '2021', 'media/ProductPage/GeneralInformation/1668939765-image-1668855449-thumbnailImage-Mask Group.png', 'media/ProductPage/GeneralInformation/1668939766-thumbnailImage-1668855448-image-Etoy app.png', '#ed7964', NULL, '2022-11-20 15:22:48', '2022-11-20 15:22:48'),
(112, 12, 1, NULL, NULL, NULL, '#000000', '2022-11-20 15:34:17', '2022-11-20 15:30:07', '2022-11-20 15:34:17'),
(113, 6, 1, NULL, NULL, NULL, '#000000', '2022-11-20 15:38:14', '2022-11-20 15:37:39', '2022-11-20 15:38:14'),
(114, 13, 2, 'سيبيسبيسبيسب', NULL, NULL, '#000000', '2022-11-20 19:54:24', '2022-11-20 19:53:00', '2022-11-20 19:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_in_depths`
--

CREATE TABLE `product_in_depths` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_in_depths`
--

INSERT INTO `product_in_depths` (`id`, `titleEn`, `titleAr`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(101, 'Adipisci et distinct', 'Duis soluta est non', 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(107, NULL, NULL, 109, NULL, '2022-11-20 15:05:14', '2022-11-20 15:05:14'),
(108, NULL, NULL, 110, NULL, '2022-11-20 15:14:18', '2022-11-20 15:14:18'),
(109, 'In Depth', 'In Depth', 111, NULL, '2022-11-20 15:22:48', '2022-11-20 16:28:36'),
(110, NULL, NULL, 112, NULL, '2022-11-20 15:30:08', '2022-11-20 15:30:08'),
(111, NULL, NULL, 113, NULL, '2022-11-20 15:37:39', '2022-11-20 15:37:39'),
(112, NULL, NULL, 114, NULL, '2022-11-20 19:53:00', '2022-11-20 19:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_in_depth_cards`
--

CREATE TABLE `product_in_depth_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text,
  `headLineEn` varchar(255) DEFAULT NULL,
  `headLineAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `category` int DEFAULT '1',
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_in_depth_cards`
--

INSERT INTO `product_in_depth_cards` (`id`, `image`, `headLineEn`, `headLineAr`, `descriptionEn`, `descriptionAr`, `category`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(104, 'media/ProductPage/InDepth/1668422092-images26.jpg', 'Sed sint a voluptatu', 'Quis sint est paria', 'Eum aliquid enim und', 'Nemo omnis dolorem i', 3, 101, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(110, NULL, NULL, NULL, NULL, NULL, NULL, 107, NULL, '2022-11-20 15:05:14', '2022-11-20 15:05:14'),
(111, 'media/ProductPage/InDepth/1668942965-1.png', 'Being alone together', 'Being alone together', 'The idea behind the app is to give an innovative and environmentally friendly app that puts you in touch with other parents in your local area with whom you can swap, take or give up a toy-making another child very happy.\r\nThe app will also teach your child how to share, re-use, and protect the plant, all while saving money and decluttering your home.\r\nThis app will make a difference by reducing pollution, raising awareness & teaching kids to be responsible.', 'The idea behind the app is to give an innovative and environmentally friendly app that puts you in touch with other parents in your local area with whom you can swap, take or give up a toy-making another child very happy.\r\nThe app will also teach your child how to share, re-use, and protect the plant, all while saving money and decluttering your home.\r\nThis app will make a difference by reducing pollution, raising awareness & teaching kids to be responsible.', 1, 109, NULL, '2022-11-20 16:16:05', '2022-11-20 16:16:05'),
(112, 'media/ProductPage/InDepth/1668948998-4ce679b8-a98e-4e74-bd0d-f89b69371883.png', 'How do we stay connected?', 'How do we stay connected?', NULL, NULL, 2, 109, NULL, '2022-11-20 16:17:12', '2022-11-20 17:56:38'),
(113, 'media/ProductPage/InDepth/1668948998-4ce679b8-a98e-4e74-bd0d-f89b69371883.png', 'Designing a prototype', 'Designing a prototype', NULL, NULL, 3, 109, NULL, '2022-11-20 16:17:12', '2022-11-20 17:56:38'),
(114, 'media/ProductPage/InDepth/1668948998-4ce679b8-a98e-4e74-bd0d-f89b69371883.png', 'Vision', 'Vision', NULL, NULL, 4, 109, NULL, '2022-11-20 16:17:12', '2022-11-20 17:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_our_clients`
--

CREATE TABLE `product_our_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `userNameEn` varchar(255) DEFAULT NULL,
  `userNameAr` varchar(255) DEFAULT NULL,
  `positionEn` varchar(255) DEFAULT NULL,
  `positionAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_our_clients`
--

INSERT INTO `product_our_clients` (`id`, `userNameEn`, `userNameAr`, `positionEn`, `positionAr`, `descriptionEn`, `descriptionAr`, `image`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(85, 'dikyqixag', 'cetam', 'Expedita molestiae p', 'Vero dolor quisquam', 'Voluptates molestiae', 'Velit omnis consequa', NULL, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(87, 'Antoine De Saint - Exupery', NULL, NULL, NULL, 'A designer knows he has achieved perfection not when there is nothing left to add, but when there is nothing left to take a way”.', NULL, NULL, 106, NULL, '2022-11-15 22:25:21', '2022-11-15 22:25:21'),
(88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 107, NULL, '2022-11-16 18:13:08', '2022-11-16 18:13:08'),
(89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 108, NULL, '2022-11-16 18:18:46', '2022-11-16 18:18:46'),
(90, 'Yasere Nazzal', NULL, 'Manager UI/UX Design', NULL, 'If we build the product in time and within budget and users simply do not engage with it, then we will have successfully achieved failure.', NULL, 'media/ProductPage/OurClients/1668856227-Group 9459.png', 109, NULL, '2022-11-16 18:19:37', '2022-11-19 16:10:27'),
(91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 110, NULL, '2022-11-20 15:14:18', '2022-11-20 15:14:18'),
(92, 'Yasere Nazzal', 'Yasere Nazzal', 'Manager UI/UX Design', 'Manager UI/UX Design', 'If we build the product in time and within budget and users simply do not engage with it, then we will have successfully achieved failure.', 'If we build the product in time and within budget and users simply do not engage with it, then we will have successfully achieved failure.', 'media/ProductPage/OurClients/1668939768-1668855449-thumbnailImage-Mask Group.png', 111, NULL, '2022-11-20 15:22:49', '2022-11-20 15:22:49'),
(93, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 112, NULL, '2022-11-20 15:30:08', '2022-11-20 15:30:08'),
(94, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 113, NULL, '2022-11-20 15:37:39', '2022-11-20 15:37:39'),
(95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 114, NULL, '2022-11-20 19:53:00', '2022-11-20 19:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_project_names`
--

CREATE TABLE `product_project_names` (
  `id` bigint UNSIGNED NOT NULL,
  `labelEn` varchar(255) DEFAULT NULL,
  `labelAr` varchar(255) DEFAULT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_project_names`
--

INSERT INTO `product_project_names` (`id`, `labelEn`, `labelAr`, `titleEn`, `titleAr`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(123, 'Animi veniam saepe', 'Occaecat aut est la', 'Duis nostrum totam c', 'Laudantium non repe', 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(124, NULL, NULL, NULL, NULL, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(125, 'Type', NULL, 'Experiences', NULL, 106, NULL, '2022-11-15 22:25:21', '2022-11-15 22:25:21'),
(126, 'Client', NULL, 'eToy App', NULL, 106, NULL, '2022-11-15 22:25:21', '2022-11-15 22:25:21'),
(127, 'Deliverables', NULL, 'UI, UX, Concept, Development, Illustration, Copywriting', NULL, 106, NULL, '2022-11-15 22:25:21', '2022-11-15 22:25:21'),
(128, NULL, NULL, NULL, NULL, 107, NULL, '2022-11-16 18:13:08', '2022-11-16 18:13:08'),
(129, NULL, NULL, NULL, NULL, 108, NULL, '2022-11-16 18:18:46', '2022-11-16 18:18:46'),
(130, 'Type:', NULL, 'Experiences', NULL, 109, NULL, '2022-11-16 18:19:37', '2022-11-20 13:01:06'),
(131, 'Client:', NULL, 'eToy App', NULL, 109, NULL, '2022-11-20 13:01:06', '2022-11-20 13:01:06'),
(132, 'Deliverables:', NULL, 'UI, UX, Concept, Development, Illustration, Copywriting', NULL, 109, NULL, '2022-11-20 13:01:06', '2022-11-20 13:01:06'),
(133, NULL, NULL, NULL, NULL, 110, NULL, '2022-11-20 15:14:18', '2022-11-20 15:14:18'),
(134, 'Type', 'Type:', 'Experiences', 'Experiences', 111, NULL, '2022-11-20 15:22:48', '2022-11-20 16:53:51'),
(135, 'Client', 'Client:', 'eToy App', 'eToy App', 111, NULL, '2022-11-20 15:22:48', '2022-11-20 16:53:51'),
(136, 'Deliverables', 'Deliverables:', 'UI, UX, Concept, Development, Illustration, Copywriting', 'UI, UX, Concept, Development, Illustration, Copywriting', 111, NULL, '2022-11-20 15:22:48', '2022-11-20 16:53:51'),
(137, NULL, NULL, NULL, NULL, 112, NULL, '2022-11-20 15:30:08', '2022-11-20 15:30:08'),
(138, NULL, NULL, NULL, NULL, 113, NULL, '2022-11-20 15:37:39', '2022-11-20 15:37:39'),
(139, 'sdfsdfdsf', NULL, 'dsfdsfsdfsdf', NULL, 114, NULL, '2022-11-20 19:53:00', '2022-11-20 19:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_project_team_members`
--

CREATE TABLE `product_project_team_members` (
  `id` bigint UNSIGNED NOT NULL,
  `labelEn` varchar(255) DEFAULT NULL,
  `labelAr` varchar(255) DEFAULT NULL,
  `memberNameEn` varchar(255) DEFAULT NULL,
  `memberNameAr` varchar(255) DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_project_team_members`
--

INSERT INTO `product_project_team_members` (`id`, `labelEn`, `labelAr`, `memberNameEn`, `memberNameAr`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(133, 'UX reseach & design:', NULL, 'Yaser Nazzal and Dia Nazzal', NULL, 106, NULL, '2022-11-15 22:25:21', '2022-11-15 22:25:21'),
(137, 'UX reseach & design', NULL, 'Dia Nazzal, Hala Abu Al-Failat, and Yaser Nazzal', NULL, 111, NULL, '2022-11-20 16:52:44', '2022-11-20 16:53:51'),
(138, 'UI design', NULL, 'Yaser Nazzal', NULL, 111, NULL, '2022-11-20 16:52:44', '2022-11-20 16:53:51'),
(139, 'Development', NULL, 'Nedal Al-Zaben & Saad Nabil', NULL, 111, NULL, '2022-11-20 16:52:44', '2022-11-20 16:53:51'),
(140, 'dsfsf', 'sdfsdf', 'sdfsdf', 'sdfsdfdsf', 114, NULL, '2022-11-20 19:53:00', '2022-11-20 19:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_scope_of_works`
--

CREATE TABLE `product_scope_of_works` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `scope` bigint UNSIGNED DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_scope_of_works`
--

INSERT INTO `product_scope_of_works` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `scope`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(80, 'Ipsam consequat Con', 'Perspiciatis sunt a', 'In excepteur officia', 'Quis fugiat voluptat', 16, 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(81, NULL, NULL, NULL, NULL, NULL, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(82, 'Scope of work', NULL, 'These are the UX design steps that have been followed to come up with the usable etoy application starting from the design strategy to user testing.', NULL, NULL, 106, NULL, '2022-11-15 22:25:21', '2022-11-15 22:27:14'),
(83, NULL, NULL, NULL, NULL, NULL, 107, NULL, '2022-11-16 18:13:08', '2022-11-16 18:13:08'),
(84, 'Scope of work', NULL, 'These are the UX design steps that have been followed to come up with the usable etoy application starting from the design strategy to user testing.', NULL, 28, 108, NULL, '2022-11-16 18:18:46', '2022-11-20 12:04:02'),
(85, 'Scope of work', NULL, 'These are the UX design steps that have been followed to come up with the usable etoy application starting from the design strategy to user testing.', NULL, NULL, 109, NULL, '2022-11-16 18:19:37', '2022-11-20 15:05:14'),
(86, NULL, NULL, NULL, NULL, NULL, 110, NULL, '2022-11-20 15:14:18', '2022-11-20 15:14:18'),
(87, 'Scope of work', 'Scope of work', 'These are the UX design steps that have been followed to come up with the usable etoy application starting from the design strategy to user testing.', 'These are the UX design steps that have been followed to come up with the usable etoy application starting from the design strategy to user testing.', 18, 111, NULL, '2022-11-20 15:22:48', '2022-11-20 18:34:49'),
(88, NULL, NULL, NULL, NULL, NULL, 112, NULL, '2022-11-20 15:30:08', '2022-11-20 15:30:08'),
(89, NULL, NULL, NULL, NULL, NULL, 113, NULL, '2022-11-20 15:37:39', '2022-11-20 15:37:39'),
(90, NULL, NULL, NULL, NULL, NULL, 114, NULL, '2022-11-20 19:53:00', '2022-11-20 19:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_s_e_o_s`
--

CREATE TABLE `product_s_e_o_s` (
  `id` bigint UNSIGNED NOT NULL,
  `focusKeypharseEn` varchar(255) DEFAULT NULL,
  `focusKeypharseAr` varchar(255) DEFAULT NULL,
  `seoTitleEn` varchar(255) DEFAULT NULL,
  `seoTitleAr` varchar(255) DEFAULT NULL,
  `slugEn` varchar(255) DEFAULT NULL,
  `slugAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `facebookImage` text,
  `facebookTitleEn` varchar(255) DEFAULT NULL,
  `facebookTitleAr` varchar(255) DEFAULT NULL,
  `facebookDescriptionEn` text,
  `facebookDescriptionAr` text,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_s_e_o_s`
--

INSERT INTO `product_s_e_o_s` (`id`, `focusKeypharseEn`, `focusKeypharseAr`, `seoTitleEn`, `seoTitleAr`, `slugEn`, `slugAr`, `descriptionEn`, `descriptionAr`, `facebookImage`, `facebookTitleEn`, `facebookTitleAr`, `facebookDescriptionEn`, `facebookDescriptionAr`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(85, 'Tucker Farley', 'Kalia Roach', 'Rowan Stewart', 'Imelda Langley', 'Armando Livingston', 'Helen Green', 'Odit illum alias cu', 'Vel cum fuga Accusa', 'media/ProductPage/SEO/1668422092-facebookImage-images9.jpg', 'Micah Morales', 'Gareth Powers', 'Aliquam in natus ips', 'Ut ad nisi id laboru', 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 106, NULL, '2022-11-15 22:25:21', '2022-11-15 22:25:21'),
(88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 107, NULL, '2022-11-16 18:13:08', '2022-11-16 18:13:08'),
(89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 108, NULL, '2022-11-16 18:18:46', '2022-11-16 18:18:46'),
(90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 109, NULL, '2022-11-16 18:19:37', '2022-11-16 18:19:37'),
(91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 110, NULL, '2022-11-20 15:14:18', '2022-11-20 15:14:18'),
(92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 111, NULL, '2022-11-20 15:22:49', '2022-11-20 15:22:49'),
(93, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 112, NULL, '2022-11-20 15:30:08', '2022-11-20 15:30:08'),
(94, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 113, NULL, '2022-11-20 15:37:39', '2022-11-20 15:37:39'),
(95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 114, NULL, '2022-11-20 19:53:00', '2022-11-20 19:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_thanks_sections`
--

CREATE TABLE `product_thanks_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `buttonNameEn` varchar(255) DEFAULT NULL,
  `buttonNameAr` varchar(255) DEFAULT NULL,
  `project` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_thanks_sections`
--

INSERT INTO `product_thanks_sections` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `buttonNameEn`, `buttonNameAr`, `project`, `deleted_at`, `created_at`, `updated_at`) VALUES
(85, 'Labore qui dolore to', 'Fugiat quidem accus', 'Velit iure similiqu', 'Amet eligendi incid', 'Keane Solomon', 'Nichole Mcclain', 104, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(86, NULL, NULL, NULL, NULL, NULL, NULL, 105, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(87, 'Thanks for watching!', NULL, 'Thanks for watching!', NULL, 'Reach our', NULL, 106, NULL, '2022-11-15 22:25:21', '2022-11-15 22:25:21'),
(88, NULL, NULL, NULL, NULL, NULL, NULL, 107, NULL, '2022-11-16 18:13:08', '2022-11-16 18:13:08'),
(89, NULL, NULL, NULL, NULL, NULL, NULL, 108, NULL, '2022-11-16 18:18:46', '2022-11-16 18:18:46'),
(90, NULL, NULL, NULL, NULL, NULL, NULL, 109, NULL, '2022-11-16 18:19:37', '2022-11-16 18:19:37'),
(91, NULL, NULL, NULL, NULL, NULL, NULL, 110, NULL, '2022-11-20 15:14:18', '2022-11-20 15:14:18'),
(92, 'Thanks for watching!', NULL, 'Feel free to share your thoughts on the design and our presentation If you have a business proposal or if you want to hire me just contact.', NULL, 'Reach our', NULL, 111, NULL, '2022-11-20 15:22:49', '2022-11-20 19:10:52'),
(93, NULL, NULL, NULL, NULL, NULL, NULL, 112, NULL, '2022-11-20 15:30:08', '2022-11-20 15:30:08'),
(94, NULL, NULL, NULL, NULL, NULL, NULL, 113, NULL, '2022-11-20 15:37:39', '2022-11-20 15:37:39'),
(95, NULL, NULL, NULL, NULL, NULL, NULL, 114, NULL, '2022-11-20 19:53:00', '2022-11-20 19:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_thanks_section_cards`
--

CREATE TABLE `product_thanks_section_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `labelEn` varchar(255) DEFAULT NULL,
  `labelAr` varchar(255) DEFAULT NULL,
  `textEn` varchar(255) DEFAULT NULL,
  `textAr` varchar(255) DEFAULT NULL,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_thanks_section_cards`
--

INSERT INTO `product_thanks_section_cards` (`id`, `labelEn`, `labelAr`, `textEn`, `textAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(110, 'Accusantium quisquam', 'Modi earum sed aliqu', 'Dolore non placeat', 'Dolore non placeat', 85, NULL, '2022-11-14 20:34:52', '2022-11-14 20:34:52'),
(111, NULL, NULL, NULL, NULL, 86, NULL, '2022-11-15 00:22:49', '2022-11-15 00:22:49'),
(112, NULL, NULL, NULL, NULL, 87, NULL, '2022-11-15 22:25:21', '2022-11-15 22:25:21'),
(113, NULL, NULL, NULL, NULL, 88, NULL, '2022-11-16 18:13:08', '2022-11-16 18:13:08'),
(114, NULL, NULL, NULL, NULL, 89, NULL, '2022-11-16 18:18:46', '2022-11-16 18:18:46'),
(115, NULL, NULL, NULL, NULL, 90, NULL, '2022-11-16 18:19:37', '2022-11-16 18:19:37'),
(116, NULL, NULL, NULL, NULL, 91, NULL, '2022-11-20 15:14:18', '2022-11-20 15:14:18'),
(117, 'Screens mode', NULL, '45+', '45+', 92, NULL, '2022-11-20 15:22:49', '2022-11-20 19:10:52'),
(118, NULL, NULL, NULL, NULL, 93, NULL, '2022-11-20 15:30:08', '2022-11-20 15:30:08'),
(119, NULL, NULL, NULL, NULL, 94, NULL, '2022-11-20 15:37:39', '2022-11-20 15:37:39'),
(120, 'Hours spent of design', NULL, '50+', '50+', 92, NULL, '2022-11-20 19:10:52', '2022-11-20 19:10:52'),
(121, 'Hours spent of development', NULL, '320+', '320+', 92, NULL, '2022-11-20 19:10:52', '2022-11-20 19:10:52'),
(122, NULL, NULL, NULL, NULL, 95, NULL, '2022-11-20 19:53:00', '2022-11-20 19:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_information`
--

CREATE TABLE `project_information` (
  `id` bigint UNSIGNED NOT NULL,
  `nameEn` varchar(255) DEFAULT NULL,
  `nameAr` varchar(255) DEFAULT NULL,
  `slogenEn` varchar(255) DEFAULT NULL,
  `slogenAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `project` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `project_information`
--

INSERT INTO `project_information` (`id`, `nameEn`, `nameAr`, `slogenEn`, `slogenAr`, `descriptionEn`, `descriptionAr`, `project`, `created_at`, `deleted_at`, `updated_at`) VALUES
(76, 'Jason Best', 'Kelsie Hill', 'Mollitia et quidem o', 'Repudiandae quasi nu', 'Veniam et similique', 'Aut non neque enim e', 104, '2022-11-14 20:34:52', NULL, '2022-11-14 20:34:52'),
(77, NULL, NULL, NULL, NULL, NULL, NULL, 105, '2022-11-15 00:22:49', NULL, '2022-11-15 00:22:49'),
(78, 'eToy App logo - Connect local community to sell, swap, or give away toys', NULL, 'exchange . earn . encourage', NULL, 'The idea behind the app is to give an innovative and environmentally friendly app that puts you in touch with other parents in your local area with whom you can swap, take or give up a toy-making another child very happy.\r\nThe app will also teach your child how to share, reuse, and protect the plant, all while saving money and decluttering your home.\r\nThis app will make a difference by reducing pollution, raising awareness & teaching kids to be responsible.', NULL, 106, '2022-11-15 22:25:21', NULL, '2022-11-15 22:25:21'),
(79, 'Perry Vazquez', 'Yvette Ware', 'Facilis veniam modi', 'Facere repellendus', 'Et nostrum qui conse', 'Labore quidem ration', 107, '2022-11-16 18:13:08', NULL, '2022-11-16 18:13:52'),
(80, 'Solfeh - Accessing emergency cash services', NULL, NULL, NULL, 'Solfeh is a FinTech micro-lending platform, that provides same-day emergency cash advancements to salaried employees.', NULL, 108, '2022-11-16 18:18:46', NULL, '2022-11-20 11:59:02'),
(81, 'eToy App - Connect local community to sell, swap, or give away toys', 'Logan Conley', 'exchange . earn . encourage', 'Fuga Duis nostrud i', 'The idea behind the app is to give an innovative and environmentally friendly app that puts you in touch with other parents in your local area with whom you can swap, take or give up a toy-making another child very happy.\r\nThe app will also teach your child how to share, re-use, and protect the plant, all while saving money and decluttering your home.\r\nThis app will make a difference by reducing pollution, raising awareness & teaching kids to be responsible.', 'Amet cumque laudant', 109, '2022-11-16 18:19:37', NULL, '2022-11-18 14:59:25'),
(82, NULL, NULL, NULL, NULL, NULL, NULL, 110, '2022-11-20 15:14:18', NULL, '2022-11-20 15:14:18'),
(83, 'eToy App', 'ايتوى اب', 'exchange . earn . encourage', 'exchange . earn . encourage', 'The idea behind the app is to give an innovative and environmentally friendly app that puts you in touch with other parents in your local area with whom you can swap, take or give up a toy-making another child very happy.\r\nThe app will also teach your child how to share, re-use, and protect the plant, all while saving money and decluttering your home.\r\nThis app will make a difference by reducing pollution, raising awareness & teaching kids to be responsible.', 'The idea behind the app is to give an innovative and environmentally friendly app that puts you in touch with other parents in your local area with whom you can swap, take or give up a toy-making another child very happy.\r\nThe app will also teach your child how to share, re-use, and protect the plant, all while saving money and decluttering your home.\r\nThis app will make a difference by reducing pollution, raising awareness & teaching kids to be responsible.', 111, '2022-11-20 15:22:48', NULL, '2022-11-20 15:42:45'),
(84, 'test name search', 'test name search', NULL, NULL, NULL, NULL, 112, '2022-11-20 15:30:08', NULL, '2022-11-20 15:30:08'),
(85, NULL, NULL, NULL, NULL, NULL, NULL, 113, '2022-11-20 15:37:39', NULL, '2022-11-20 15:37:39'),
(86, 'dasfsdf', NULL, 'sdfdsfds', NULL, 'fdsfdsfsdfds', NULL, 114, '2022-11-20 19:53:00', NULL, '2022-11-20 19:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `say_hellos`
--

CREATE TABLE `say_hellos` (
  `id` bigint UNSIGNED NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `say_hellos`
--

INSERT INTO `say_hellos` (`id`, `fullName`, `email`, `phone`, `message`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed Magdy', 'admin@gmail.com', '01112891913', 'Hello Layouti', NULL, '2022-11-01 23:16:18', '2022-11-01 23:16:18'),
(2, 'Halla Bond', 'newy@mailinator.com', '222', 'Aut culpa eaque ut q', NULL, '2022-11-03 22:07:33', '2022-11-03 22:07:33'),
(3, 'Wilma David', 'piremo@mailinator.com', '222', 'Temporibus non sed e', NULL, '2022-11-03 22:33:49', '2022-11-03 22:33:49'),
(4, 'Destiny Sanders', 'xymy@mailinator.com', '222', 'Nulla adipisicing of', NULL, '2022-11-03 22:40:15', '2022-11-03 22:40:15'),
(5, 'Destiny Sanders', 'xymy@mailinator.com', '222', 'Nulla adipisicing of', NULL, '2022-11-03 22:40:17', '2022-11-03 22:40:17'),
(6, 'Danielle Christensen', 'xesovulun@mailinator.com', '222', 'Sequi aut minima et', NULL, '2022-11-03 22:40:27', '2022-11-03 22:40:27'),
(7, 'dasdsa', 'dasdasdas@dasdas.com', '222', 'ddsa', NULL, '2022-11-03 22:50:06', '2022-11-03 22:50:06'),
(8, 'dasdsa', 'dasdasdas@dasdas.com', '222', 'ddsas', NULL, '2022-11-03 22:50:27', '2022-11-03 22:50:27'),
(9, 'شسيسش', 'addas@dsadas.co', '222', 'يسشيسش', NULL, '2022-11-03 23:02:57', '2022-11-03 23:02:57'),
(10, 'شسيسش', 'addas@dsadas.co', '222', 'يسشيسش', NULL, '2022-11-03 23:03:17', '2022-11-03 23:03:17'),
(11, 'mostafa', 'mostafa@gmail.com', '01094977374', 'tryyyyyyy', NULL, '2022-11-19 18:53:26', '2022-11-19 18:53:26'),
(12, 'sdsad', 'dasfasd@gmail.com', '01112891913', 'fsdf', NULL, '2022-11-23 16:43:36', '2022-11-23 16:43:36'),
(13, 'sdsad', 'dasfasd@gmail.com', '01112891913', 'fsdf', NULL, '2022-11-23 16:44:56', '2022-11-23 16:44:56'),
(14, 'sdsad', 'dasfasd@gmail.com', '01112891913', 'fsdf', NULL, '2022-11-23 17:01:22', '2022-11-23 17:01:22'),
(15, 'sdsad', 'dasfasd@gmail.com', '01112891913', 'fsdf', NULL, '2022-11-23 17:05:13', '2022-11-23 17:05:13'),
(16, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01092313486', 'fsdf', NULL, '2022-11-23 17:08:57', '2022-11-23 17:08:57'),
(17, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01092313486', 'fsdf', NULL, '2022-11-23 17:15:41', '2022-11-23 17:15:41'),
(18, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01092313486', 'fsdf', NULL, '2022-11-23 17:16:31', '2022-11-23 17:16:31'),
(19, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01092313486', 'fsdf', NULL, '2022-11-23 17:16:31', '2022-11-23 17:16:31'),
(20, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01226899017', 'fsdf', NULL, '2022-11-23 17:47:25', '2022-11-23 17:47:25'),
(21, 'mohamed Elgndy', 'jonpraci@gmail.com', '01226899017', 'a7a', NULL, '2022-11-23 18:08:55', '2022-11-23 18:08:55'),
(22, 'ahmed mahmoud fathy mahmoud', 'ahmedfathybenoo@gmail.com', '01092313486', 'asdfghjkjljkjkljkljkjkl', NULL, '2022-11-23 18:30:29', '2022-11-23 18:30:29'),
(23, 'ahmed mahmoud fathy mahmoud', 'ahmedfathybenoo@gmail.com', '01092313486', 'asdfghjkjljkjkljkljkjkl', NULL, '2022-11-23 18:30:52', '2022-11-23 18:30:52'),
(24, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01226899017', 'fsdf', NULL, '2022-11-23 18:32:22', '2022-11-23 18:32:22'),
(25, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01226899017', 'fsdf', NULL, '2022-11-23 18:34:33', '2022-11-23 18:34:33'),
(26, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01092313486', 'fsdf', NULL, '2022-11-23 18:40:14', '2022-11-23 18:40:14'),
(27, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01092313486', 'fsdf', NULL, '2022-11-23 18:41:28', '2022-11-23 18:41:28'),
(28, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01092313486', 'fsdf', NULL, '2022-11-23 18:46:48', '2022-11-23 18:46:48'),
(29, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01092313486', 'fsdf', NULL, '2022-11-23 18:48:54', '2022-11-23 18:48:54'),
(30, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01092313486', 'fsdf', NULL, '2022-11-23 18:50:10', '2022-11-23 18:50:10'),
(31, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01226899017', 'fsdf', NULL, '2022-11-23 19:14:28', '2022-11-23 19:14:28'),
(32, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01226899017', 'fsdf', NULL, '2022-11-23 19:16:59', '2022-11-23 19:16:59'),
(33, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01226899017', 'fsdf', NULL, '2022-11-23 19:23:32', '2022-11-23 19:23:32'),
(34, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01226899017', 'fsdf', NULL, '2022-11-23 19:23:33', '2022-11-23 19:23:33'),
(35, 'sdfdfgg', 'ahmedfathybenoo@gmail.com', '01092313486', 'sdfghjk', NULL, '2022-11-23 19:23:58', '2022-11-23 19:23:58'),
(36, 'sdfdfgg', 'ahmedfathybenoo@gmail.com', '01092313486', 'sdfghjk', NULL, '2022-11-23 19:24:12', '2022-11-23 19:24:12'),
(37, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01092313486', 'task', NULL, '2022-11-23 19:44:08', '2022-11-23 19:44:08'),
(38, 'Ahmed mahmoud', 'ahmedfathybenoo@gmail.com', '01092313486', 'task', NULL, '2022-11-23 19:44:28', '2022-11-23 19:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `seo_page_about_pages`
--

CREATE TABLE `seo_page_about_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `focusKeypharseEn` varchar(255) DEFAULT NULL,
  `focusKeypharseAr` varchar(255) DEFAULT NULL,
  `seoTitleEn` varchar(255) DEFAULT NULL,
  `seoTitleAr` varchar(255) DEFAULT NULL,
  `slugEn` varchar(255) DEFAULT NULL,
  `slugAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `facebookImage` text,
  `facebookTitleEn` varchar(255) DEFAULT NULL,
  `facebookTitleAr` varchar(255) DEFAULT NULL,
  `facebookDescriptionEn` text,
  `facebookDescriptionAr` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `seo_page_about_pages`
--

INSERT INTO `seo_page_about_pages` (`id`, `focusKeypharseEn`, `focusKeypharseAr`, `seoTitleEn`, `seoTitleAr`, `slugEn`, `slugAr`, `descriptionEn`, `descriptionAr`, `facebookImage`, `facebookTitleEn`, `facebookTitleAr`, `facebookDescriptionEn`, `facebookDescriptionAr`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'asfads', 'asfas', 'fasfasf', 'asf', 'afs', 'asfasf', 'asfas', 'asf', 'media/EToy/AboutPage/Seo/1669896871-0x0.jpg', 'asfas', 'afsaf', 'asfas', 'asfasf', '2022-12-01 17:14:31', NULL, '2022-12-01 17:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `seo_page_contact_pages`
--

CREATE TABLE `seo_page_contact_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `focusKeypharseEn` varchar(255) DEFAULT NULL,
  `focusKeypharseAr` varchar(255) DEFAULT NULL,
  `seoTitleEn` varchar(255) DEFAULT NULL,
  `seoTitleAr` varchar(255) DEFAULT NULL,
  `slugEn` varchar(255) DEFAULT NULL,
  `slugAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `facebookImage` text,
  `facebookTitleEn` varchar(255) DEFAULT NULL,
  `facebookTitleAr` varchar(255) DEFAULT NULL,
  `facebookDescriptionEn` text,
  `facebookDescriptionAr` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `seo_page_contact_pages`
--

INSERT INTO `seo_page_contact_pages` (`id`, `focusKeypharseEn`, `focusKeypharseAr`, `seoTitleEn`, `seoTitleAr`, `slugEn`, `slugAr`, `descriptionEn`, `descriptionAr`, `facebookImage`, `facebookTitleEn`, `facebookTitleAr`, `facebookDescriptionEn`, `facebookDescriptionAr`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'asfads', 'asfas', 'fasfasf', 'asf', 'afs', 'asfasf', 'asfas', 'asf', 'media/EToy/ContactUsPage/Seo/1669896980-0x0.jpg', 'asfas', 'afsaf', 'asfas', 'asfasf', '2022-12-01 17:16:20', NULL, '2022-12-01 17:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `seo_page_home_pages`
--

CREATE TABLE `seo_page_home_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `focusKeypharseEn` varchar(255) DEFAULT NULL,
  `focusKeypharseAr` varchar(255) DEFAULT NULL,
  `seoTitleEn` varchar(255) DEFAULT NULL,
  `seoTitleAr` varchar(255) DEFAULT NULL,
  `slugEn` varchar(255) DEFAULT NULL,
  `slugAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `facebookImage` text,
  `facebookTitleEn` varchar(255) DEFAULT NULL,
  `facebookTitleAr` varchar(255) DEFAULT NULL,
  `facebookDescriptionEn` text,
  `facebookDescriptionAr` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `seo_page_home_pages`
--

INSERT INTO `seo_page_home_pages` (`id`, `focusKeypharseEn`, `focusKeypharseAr`, `seoTitleEn`, `seoTitleAr`, `slugEn`, `slugAr`, `descriptionEn`, `descriptionAr`, `facebookImage`, `facebookTitleEn`, `facebookTitleAr`, `facebookDescriptionEn`, `facebookDescriptionAr`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'asfads', 'asfas', 'fasfasf', 'asf', 'afs', 'asfasf', 'asfas', 'asf', 'media/EToy/HomePage/Seo/1669897038-0x0.jpg', 'asfas', 'afsaf', 'asfas', 'asfasf', '2022-12-01 17:17:18', NULL, '2022-12-01 17:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `seo_page_terms_and_conditions_pages`
--

CREATE TABLE `seo_page_terms_and_conditions_pages` (
  `id` bigint UNSIGNED NOT NULL,
  `focusKeypharseEn` varchar(255) DEFAULT NULL,
  `focusKeypharseAr` varchar(255) DEFAULT NULL,
  `seoTitleEn` varchar(255) DEFAULT NULL,
  `seoTitleAr` varchar(255) DEFAULT NULL,
  `slugEn` varchar(255) DEFAULT NULL,
  `slugAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `facebookImage` text,
  `facebookTitleEn` varchar(255) DEFAULT NULL,
  `facebookTitleAr` varchar(255) DEFAULT NULL,
  `facebookDescriptionEn` text,
  `facebookDescriptionAr` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `seo_page_terms_and_conditions_pages`
--

INSERT INTO `seo_page_terms_and_conditions_pages` (`id`, `focusKeypharseEn`, `focusKeypharseAr`, `seoTitleEn`, `seoTitleAr`, `slugEn`, `slugAr`, `descriptionEn`, `descriptionAr`, `facebookImage`, `facebookTitleEn`, `facebookTitleAr`, `facebookDescriptionEn`, `facebookDescriptionAr`, `created_at`, `deleted_at`, `updated_at`) VALUES
(4, 'asfads', 'asfas', 'fasfasf', 'asf', 'afs', 'asfasf', 'asfas', 'asf', 'media/EToy/TermsAndConditionsPage/Seo/1669896593-0x0.jpg', 'asfas', 'afsaf', 'asfas', 'asfasf', '2022-12-01 17:03:35', NULL, '2022-12-01 17:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `services_categories`
--

CREATE TABLE `services_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `services_categories`
--

INSERT INTO `services_categories` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'What we will serve you on', 'null', 'Exceptional creativity mixed with vision, marketing, and cutting-edge technology is what we pour behind the bar at Layouti. Then, we add a flame to fashion an exciting, eye-catching final product.', 'null', NULL, '2022-11-11 00:02:00', '2022-11-16 18:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `services_categories_cards`
--

CREATE TABLE `services_categories_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `category` bigint UNSIGNED DEFAULT NULL,
  `projects` text,
  `descriptionEn` text,
  `descriptionAr` text,
  `tagsEn` text,
  `tagsAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `services_categories_cards`
--

INSERT INTO `services_categories_cards` (`id`, `category`, `projects`, `descriptionEn`, `descriptionAr`, `tagsEn`, `tagsAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"109\",\"108\",\"107\"]', 'Exceptional creativity mixed with vision, marketing, and cutting-edge technology is what we pour behind the bar at Layouti. Then, we add a flame to fashion an exciting, eye-catching final product.', 'null', '[\"strategy\",\"UX design\",\"UX\",\"UX content\"]', '[]', 1, NULL, '2022-11-11 00:03:35', '2022-11-19 18:29:04'),
(2, 3, '[\"106\"]', 'Layouti understands your company identity impacts your bottom line. A positive company and product identity enhance your sales and your entire marketing communications plan. A strong company identity can enhance, create, and project an image that will help you sell your product or service.', NULL, '[]', '[]', 1, NULL, '2022-11-14 06:56:44', '2022-11-15 22:47:49'),
(3, 4, '[\"106\"]', 'Focused on achieving your business goals: Like anything in business, making a decision often comes down to the return on investment. If your goal is to get more customers or increase profit margins, Layouti’s approach to integrated marketing can get you there. Layouti isn’t just about design; we’re dedicated to Internet Solutions with a purpose.', NULL, '[]', '[]', 1, NULL, '2022-11-14 06:56:44', '2022-11-15 22:47:49'),
(4, 5, '[\"106\"]', 'From time to time, we work with a deep thought effort to break the current market and come up with solutions, suggestions, and projects that sweep the market and ensure the strength of our brand with effective and attractive strategies and designs in the long term. We can teach our clients the example and establish their strong presence in the market.', NULL, '[]', '[]', 1, NULL, '2022-11-15 22:47:49', '2022-11-15 22:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `services_header_contents`
--

CREATE TABLE `services_header_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `services_header_contents`
--

INSERT INTO `services_header_contents` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'We are about masterly UI, UX, and branding solutions', 'null', 'Dreamers. Makers. Doers. layoutis’ believe in the power of collaboration to drive impact, change minds, and take action.', 'null', 'media/ServicesPage/HeaderContent/1668856907-1-services-layouti-image.jpg', NULL, '2022-10-31 21:03:53', '2022-11-19 16:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `services_learn_about_layoutis`
--

CREATE TABLE `services_learn_about_layoutis` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `downImageDescriptionEn` text,
  `downImageDescriptionAr` text,
  `topImage` text,
  `downImage` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `services_learn_about_layoutis`
--

INSERT INTO `services_learn_about_layoutis` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `downImageDescriptionEn`, `downImageDescriptionAr`, `topImage`, `downImage`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Unbelievable level of professionalism in UI/UX services', 'null', 'Layouti\'s mission is to transform the business of our clients from ideas in their minds into reality through our magic touch by UI service, UX service, and Branding service. What you ultimately hire us to do is to make a meaningful and measurable impact on your company. Whether you’re trying to sign up more members, sell more widgets, or convince the government to leave your industry alone, the point is to cross the gate of digitization through our online services (user experience service, user interface service, and branding service).', 'null', 'All you ultimately care about is the outcome not how the sausage gets made. That said, if we stopped there, no one would know what we do at Layouti. So, as not to be too clever for our own good, below is a list of the activities and deliverables that we generally employ to move business for our clients.', 'null', 'media/ServicesPage/LearnAboutLayouti/1668929286-top-UXresearch.png', 'media/ServicesPage/LearnAboutLayouti/1668929286-top-graphic-design-1920x1080.png', NULL, '2022-10-31 21:06:09', '2022-11-20 12:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `services_process_timelines`
--

CREATE TABLE `services_process_timelines` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `services_process_timelines`
--

INSERT INTO `services_process_timelines` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Process Timeline', NULL, '', 'Et ipsam aut enim pr', NULL, '2022-10-31 21:08:10', '2022-11-19 16:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `services_process_timeline_cards`
--

CREATE TABLE `services_process_timeline_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `icon` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `services_process_timeline_cards`
--

INSERT INTO `services_process_timeline_cards` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `icon`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Kickoff', 'null', 'We will  go deep into the root of your problem and identify your potential audience, which the solutions will be, and why they are.', 'null', 'media/ServicesPage/ProcessTimeline/1668856985-0-services-kickoff-layouti-icon.svg', 1, NULL, '2022-10-31 21:10:11', '2022-11-19 16:23:05'),
(2, 'UX Research', 'null', 'We will artfully research, understand and analyze the causes of the problems to find appropriate solutions for you.', 'null', 'media/ServicesPage/ProcessTimeline/1668856985-1-services-ux-research-layouti-icon.svg', 1, NULL, '2022-10-31 22:18:09', '2022-11-19 16:23:05'),
(3, 'Nolan Case', 'Thane Parrish', 'Burton Casey', 'Drew Bass', NULL, 1, '2022-10-31 22:21:56', '2022-10-31 22:18:49', '2022-10-31 22:21:56'),
(4, 'Ideation', 'null', 'We will bombard all ideas, putting them on the table to find the solutions and will not stop at just a clear solution.', 'null', 'media/ServicesPage/ProcessTimeline/1668856985-2-services-ideation-layouti-icon.svg', 1, NULL, '2022-11-07 15:36:17', '2022-11-19 16:23:05'),
(5, 'UX Design', 'null', 'We craft inclusive digital experiences by rigorously testing and incorporating  your users into our design process.', 'null', 'media/ServicesPage/ProcessTimeline/1668856985-3-services-ux-design-layouti-icon.svg', 1, NULL, '2022-11-07 15:37:16', '2022-11-19 16:23:05'),
(6, 'Branding', 'null', 'We will help you design responsible coloring strategies that create transformative change to improve continued success.', 'null', 'media/ServicesPage/ProcessTimeline/1668856985-4-services-branding-layouti-icon.svg', 1, NULL, '2022-11-07 15:37:16', '2022-11-19 16:23:05'),
(7, 'UI Design', 'null', 'We with our UI design  combine accessibility and usability  with your content and marketing goals for the users.', 'null', 'media/ServicesPage/ProcessTimeline/1668856985-5-services-ui-design-layouti-icon.svg', 1, NULL, '2022-11-07 15:37:16', '2022-11-19 16:23:05'),
(8, 'Optimize & Improve', 'null', 'We will create it, putting your target audience in mind in the first place to ensure them the best experience for your product.', 'null', 'media/ServicesPage/ProcessTimeline/1668856985-6-services-optimize-&-improve -layouti-icon.svg', 1, NULL, '2022-11-07 15:37:16', '2022-11-19 16:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `services_services_categories`
--

CREATE TABLE `services_services_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category` bigint UNSIGNED DEFAULT NULL,
  `projects` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `tagsEn` text,
  `tagsAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions_page_header_contents`
--

CREATE TABLE `terms_and_conditions_page_header_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `terms_and_conditions_page_header_contents`
--

INSERT INTO `terms_and_conditions_page_header_contents` (`id`, `color`, `titleEn`, `titleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '#000000', 'asd', 'asd', NULL, '2022-12-01 16:03:02', '2022-12-01 16:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions_page_header_content_cards`
--

CREATE TABLE `terms_and_conditions_page_header_content_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `terms_and_conditions_page_header_content_cards`
--

INSERT INTO `terms_and_conditions_page_header_content_cards` (`id`, `descriptionEn`, `descriptionAr`, `card`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'asd', 'asd', 1, '2022-12-01 16:07:40', NULL, '2022-12-01 16:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions_page_how_to_earn_points`
--

CREATE TABLE `terms_and_conditions_page_how_to_earn_points` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `terms_and_conditions_page_how_to_earn_points`
--

INSERT INTO `terms_and_conditions_page_how_to_earn_points` (`id`, `titleEn`, `titleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'sdf', 'fsdf', NULL, '2022-12-01 16:09:15', '2022-12-01 16:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions_page_how_to_earn_points_cards`
--

CREATE TABLE `terms_and_conditions_page_how_to_earn_points_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `terms_and_conditions_page_how_to_earn_points_cards`
--

INSERT INTO `terms_and_conditions_page_how_to_earn_points_cards` (`id`, `titleEn`, `titleAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'sdf', 'ssdf', 1, NULL, '2022-12-01 16:09:15', '2022-12-01 16:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions_page_how_to_earn_points_cards_of_cards`
--

CREATE TABLE `terms_and_conditions_page_how_to_earn_points_cards_of_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `terms_and_conditions_page_how_to_earn_points_cards_of_cards`
--

INSERT INTO `terms_and_conditions_page_how_to_earn_points_cards_of_cards` (`id`, `descriptionEn`, `descriptionAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'sdf', 'sdf', 1, NULL, '2022-12-01 16:48:14', '2022-12-01 16:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions_page_photo_guidelines`
--

CREATE TABLE `terms_and_conditions_page_photo_guidelines` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `subTitleEn` text,
  `subTitleAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `terms_and_conditions_page_photo_guidelines`
--

INSERT INTO `terms_and_conditions_page_photo_guidelines` (`id`, `titleEn`, `titleAr`, `subTitleEn`, `subTitleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'sdf', 'df', 'sdf', 'sdf', NULL, '2022-12-01 16:09:00', '2022-12-01 16:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions_page_photo_guidelines_cards`
--

CREATE TABLE `terms_and_conditions_page_photo_guidelines_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `terms_and_conditions_page_photo_guidelines_cards`
--

INSERT INTO `terms_and_conditions_page_photo_guidelines_cards` (`id`, `descriptionEn`, `descriptionAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'sdf', 'sdf', 1, NULL, '2022-12-01 16:09:00', '2022-12-01 16:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions_page_points_policies`
--

CREATE TABLE `terms_and_conditions_page_points_policies` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `terms_and_conditions_page_points_policies`
--

INSERT INTO `terms_and_conditions_page_points_policies` (`id`, `titleEn`, `titleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'dfs', 'sdfd', NULL, '2022-12-01 16:08:44', '2022-12-01 16:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions_page_points_policy_cards`
--

CREATE TABLE `terms_and_conditions_page_points_policy_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `terms_and_conditions_page_points_policy_cards`
--

INSERT INTO `terms_and_conditions_page_points_policy_cards` (`id`, `descriptionEn`, `descriptionAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'sdf', 'sdf', 1, NULL, '2022-12-01 16:08:44', '2022-12-01 16:08:44');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions_page_registrations`
--

CREATE TABLE `terms_and_conditions_page_registrations` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `terms_and_conditions_page_registrations`
--

INSERT INTO `terms_and_conditions_page_registrations` (`id`, `titleEn`, `titleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'dasd', 'asd', NULL, '2022-12-01 16:08:26', '2022-12-01 16:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions_page_registration_cards`
--

CREATE TABLE `terms_and_conditions_page_registration_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `terms_and_conditions_page_registration_cards`
--

INSERT INTO `terms_and_conditions_page_registration_cards` (`id`, `titleEn`, `titleAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'asd', 1, NULL, '2022-12-01 16:08:26', '2022-12-01 16:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions_page_registration_cards_of_cards`
--

CREATE TABLE `terms_and_conditions_page_registration_cards_of_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `terms_and_conditions_page_registration_cards_of_cards`
--

INSERT INTO `terms_and_conditions_page_registration_cards_of_cards` (`id`, `descriptionEn`, `descriptionAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'asdf', 'asd', 1, NULL, '2022-12-01 16:47:12', '2022-12-01 16:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions_page_terms_of_uses`
--

CREATE TABLE `terms_and_conditions_page_terms_of_uses` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `terms_and_conditions_page_terms_of_uses`
--

INSERT INTO `terms_and_conditions_page_terms_of_uses` (`id`, `titleEn`, `titleAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'dsa', 'dasd', NULL, '2022-12-01 16:08:10', '2022-12-01 16:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions_page_terms_of_use_cards`
--

CREATE TABLE `terms_and_conditions_page_terms_of_use_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `terms_and_conditions_page_terms_of_use_cards`
--

INSERT INTO `terms_and_conditions_page_terms_of_use_cards` (`id`, `titleEn`, `titleAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'sad', 1, NULL, '2022-12-01 16:08:10', '2022-12-01 16:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions_page_terms_of_use_cards_of_cards`
--

CREATE TABLE `terms_and_conditions_page_terms_of_use_cards_of_cards` (
  `id` bigint UNSIGNED NOT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `terms_and_conditions_page_terms_of_use_cards_of_cards`
--

INSERT INTO `terms_and_conditions_page_terms_of_use_cards_of_cards` (`id`, `descriptionEn`, `descriptionAr`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'asd', 1, NULL, '2022-12-01 16:45:03', '2022-12-01 16:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Pleased to accomplish UI/UX designs for well-known companies', 'Thane Boone', 'Our success is measured by your success. For us it’s not just creating something that looks great, it needs to deliver results for you.', 'Quasi ex amet eiusm', NULL, '2022-10-21 16:30:36', '2022-11-02 23:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials__cards`
--

CREATE TABLE `testimonials__cards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `jobTitleEn` varchar(255) DEFAULT NULL,
  `jobTitleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `testimonials__cards`
--

INSERT INTO `testimonials__cards` (`id`, `titleEn`, `titleAr`, `jobTitleEn`, `jobTitleAr`, `descriptionEn`, `descriptionAr`, `image`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Osama Ayyoub', 'Janna Ochoa', 'Managing Director and Business @ Technology Consultant', 'Nadine Mcmahon', 'From the very beginning of the process, we knew we had made the right decision in working with Layouti. Their overall attention to detail and creative flair was obvious from the very start and then when we thought it was nearly complete they wowed us again with some lovely animated feedback features within the app. We will definitely be staying with Layouti for all our UI and UX App work going forward. Great job guys and can’t wait to work with you again!', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'media/HomePage/Testimonials/1668856419-0-osama-ayyoub-layouti-client.jpeg', 1, NULL, '2022-10-21 16:30:36', '2022-11-19 16:13:39'),
(2, 'Hu Reed', 'Quynn Cooper', 'Carolyn Dale', 'Scarlet Hansen', 'Nemo voluptate aut e', 'Doloremque illum ut', NULL, 1, '2022-10-30 20:00:07', '2022-10-28 22:40:14', '2022-10-30 20:00:07'),
(3, 'AJ Faraj', 'Hayes Reid', 'Co-Founder @ WadiTek', 'Rashad Sherman', 'Layouti is a proactive and diligent contributor who would make a great addition to any team. He has worked with EA3 Solutions on various projects as a UX/UI designer and has delivered great-quality work. His energy and abundance of ideas were key factors in making our products easy to use and appealing to all of our users. Layouti dedication to his work and clients are some of the qualities that continue to help him grow and succeed as a UX/UI designer', NULL, 'media/HomePage/Testimonials/1668856419-1-aj-faraj-layouti-client.jpeg', 1, NULL, '2022-10-30 20:42:35', '2022-11-19 16:13:39'),
(4, 'Britanney Sampson', 'Vincent Pugh', 'Sonya Cochran', 'Keegan Bolton', 'Error recusandae Es', 'Minus iure fugit pr', NULL, 1, '2022-10-30 21:08:39', '2022-10-30 20:42:35', '2022-10-30 21:08:39'),
(5, 'Ali Haddad', NULL, 'Executive Director @ Jordan Youth Innovation Forum', NULL, 'Layouti works for us has been some of the best we\'ve seen from any freelancer. they were always on time and understood exactly what was required of them. We would recommend him to anyone else and would gladly hire them again.', NULL, 'media/HomePage/Testimonials/1668856419-2-ali-haddad-layouti-client.jpeg', 1, NULL, '2022-10-30 21:41:05', '2022-11-19 16:13:39'),
(6, 'Abdulaziz Alqahtani', NULL, 'Strategic Projects and Planning @ Snoonu', NULL, 'A friend referred Layouti to me, and I found innovative, creative, and modern designs, they always finish tasks on time with high quality, thank you!', NULL, 'media/HomePage/Testimonials/1668856419-3-abdulaziz-alqahtani-layouti-client.jpeg', 1, NULL, '2022-11-07 15:14:08', '2022-11-19 16:13:39'),
(7, 'Anthony Ford', NULL, 'VP Product @ Play2Pay', NULL, 'Layouti did excellent work for us in his designs for a new Android IOS Application.', NULL, 'media/HomePage/Testimonials/1668856420-4-anthony-ford-layouti-client.jpeg', 1, NULL, '2022-11-07 15:15:44', '2022-11-19 16:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `things_header_contents`
--

CREATE TABLE `things_header_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `things_header_contents`
--

INSERT INTO `things_header_contents` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '100 things we have learned the past years', 'Robert Fitzgerald', 'Holding myself to the highest standards of creative and technical excellence. Every one, regardless of the scope of his/her lifecycle can expect nothing but the best from what I’ve learned..', 'Ea incidunt eligend', 'media/ThingsPage/HeaderContent/1668864641-Rectangle.png', NULL, '2022-10-31 21:12:23', '2022-11-19 18:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `things_opportunity_always_exists`
--

CREATE TABLE `things_opportunity_always_exists` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `dateEn` varchar(255) DEFAULT NULL,
  `dateAr` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `things_opportunity_always_exists`
--

INSERT INTO `things_opportunity_always_exists` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `dateEn`, `dateAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Keep it simple, stupid', 'Brianna Valdez', 'Although \"Take it easy \" is a common proverb, Humans didn’t understand it. We usually overcomplicate very simple aspects when we are drawn to unmade decisions or even not existent things.  We waste our time comparing unequal things and why they aren’t the same.  However, simplicity comes from understanding our decision since man is a lazy being. This time, let\'s as designers think easily. In Design, the more we are able to understand it, the product is probable to gain maximum market share. All the process needs to start convincing ourselves that it is already easy. Don’t ask yourself if you can do it the right way or not; just say, repeat it, and be sure.', 'Tempor laudantium e', '18 Sep 2020', 'Yetta Petty', NULL, '2022-10-31 21:16:24', '2022-11-10 00:37:51'),
(2, 'Eric Castro', 'Palmer Cross', 'Sit blanditiis volup', 'Ea enim proident la', 'Dennis Kennedy', 'Kristen Paul', '2022-10-31 23:10:26', '2022-10-31 23:04:36', '2022-10-31 23:10:26'),
(3, 'Clayton Smith', 'Macey Cole', 'Eiusmod sit ratione', 'Non aliquid eum sit', 'Francis Yang', 'Finn Horton', '2022-10-31 23:08:54', '2022-10-31 23:04:36', '2022-10-31 23:08:54'),
(4, 'Bertha Pate', 'Raymond Smith', 'Tempora excepteur pa', 'Est non dolore deser', 'Hadassah Hancock', 'Iona Mendoza', '2022-10-31 23:10:59', '2022-10-31 23:10:44', '2022-10-31 23:10:59'),
(5, 'Darryl Sutton', 'Simon Nelson', 'Totam eu et pariatur', 'Magnam iusto aliquip', 'Indigo Fuentes', 'Gay Gutierrez', '2022-10-31 23:10:55', '2022-10-31 23:10:44', '2022-10-31 23:10:55'),
(6, 'Lisandra Acosta', 'Emmanuel Dotson', 'Culpa libero officii', 'Sit non magnam dolor', 'Wynter Moore', 'Stephen Cobb', '2022-10-31 23:10:52', '2022-10-31 23:10:44', '2022-10-31 23:10:52'),
(7, 'Meet new people', 'Raya Lindsey', 'Communication is overwhelmingly impressive and necessary in our life. It is like drinking water. We gathered together to share ideas, stories, and perspectives.  We will face both good and bad aspects in this journey. If we want new things or skills, we have to start a new company whether with new people, habits, or thinking. Keep exploring more relations, catch the good and leave the bad, then you will meet success, so don’t forget to enjoy it.', 'Suscipit corporis ip', '21 Sep 2020', 'Kermit Holt', NULL, '2022-11-02 19:27:26', '2022-11-10 00:37:51'),
(8, 'Alfreda Albert', 'Paki Hinton', 'Qui reiciendis quaer', 'Adipisicing do iure', 'Andrew Kent', 'Amery Irwin', '2022-11-02 23:11:42', '2022-11-02 19:27:26', '2022-11-02 23:11:42'),
(9, 'Emmanuel Farrell', 'Fritz Lester', 'Quia id libero moles', 'Nihil qui ullamco ve', 'Lucy Christensen', 'Madeson Perez', '2022-11-02 23:11:39', '2022-11-02 19:27:26', '2022-11-02 23:11:39'),
(10, 'Colton Bennett', 'Tobias Mendoza', 'In harum veritatis v', 'Velit sed ex delectu', 'Keiko Britt', 'Fuller Wilcox', '2022-11-02 23:11:37', '2022-11-02 19:27:26', '2022-11-02 23:11:37'),
(11, 'Everything has a reason', 'weweqw55', 'We’re part of some grand plan. Our world works rationally and reasonably sometimes, we experience loss or pain. However, when good things happen, you’ve most likely worked for it.  Like a design, we can design every factor in our lives, but realistically we can’t control everything. The past is a memory, the future is unknown, and the present is a gift from God. The only time we possess is \"now\".', 'ewqqweqw55', '25 Sep 2020', 'weqw55', NULL, '2022-11-09 18:06:13', '2022-11-10 00:37:51'),
(12, 'Opportunity always exists', '54557', 'Opportunities are always surrounded as well as we are breathing alive. Success is created when preparation meets opportunity. Success star when we company the right people, read the appropriate book and explore the things we love. Dreams are beautiful, but not enough to exist. Planning needs the mind to think and the body to make an effort.  With determination and practice, someone can have a hobby he didn\'t have. Keep trying, asking, and learning new things. Everyone should wake up from his dream and see that we can.', '6786', '30 Sep 2020', '97879', NULL, '2022-11-09 18:06:13', '2022-11-10 00:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `canDelete` int NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `role`, `email_verified_at`, `password`, `canDelete`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Layouti Admin', 'Hello@layouti.com', NULL, '1', '2022-10-26 17:32:21', '$2y$10$2sxIJ178jmiuwcORih/M7uelxPnaS4opModOBcAXTuQcUOvPsc0Oe', 0, NULL, NULL, '2022-10-26 17:32:21', '2022-11-21 20:37:40'),
(2, 'Voluptas culpa conse', 'Delectus est sit c', NULL, '1', NULL, '$2y$10$HUYRg648tBGelva9BmhSAeB4jBIVCW1Gcf/WEcXZ6GFBFh6xmucxC', 1, '2022-11-06 18:18:09', NULL, '2022-11-06 18:06:51', '2022-11-06 18:18:09'),
(3, 'Nisi fugiat perfere', 'qwewq@asddsad.com', NULL, '1', NULL, '$2y$10$KrAM7w0xMVHg3WcLKJGL9uM820R/34CT6uebl7.8KBIbfGeBeSdw.', 1, '2022-11-06 18:18:30', NULL, '2022-11-06 18:09:54', '2022-11-06 18:18:30'),
(4, 'Nisi fugiat perfere', 'qwe2wq@asd2dsad.com', NULL, '1', NULL, '$2y$10$ybAraOakKYRhlBrHIqZvaucer1BBv1qX7Q5emjeNF7D.3AlZmPrlm', 1, '2022-11-06 18:18:26', NULL, '2022-11-06 18:10:11', '2022-11-06 18:18:26'),
(5, 'In tempore sunt qui', 'Minim qui voluptatum', NULL, '1', NULL, '$2y$10$0yccrmF2eO1DwPeR4p0GKueHfkreyxQ8YcXybEJyimIdiuJlkI1UC', 1, '2022-11-07 17:10:11', NULL, '2022-11-06 18:13:26', '2022-11-07 17:10:11'),
(6, 'In tempore sunt qui', 'Minim qui voluptatum2', NULL, '1', NULL, '$2y$10$.EE8Jdc8lhRgTv9wMxyLweAiMUW4kNSg95QLMLhCg4HUB1qf0WajO', 1, '2022-11-07 22:32:30', NULL, '2022-11-06 18:14:27', '2022-11-07 22:32:30'),
(7, 'Omnis exercitationem', 'Quia sit rerum quam', NULL, '1', NULL, '$2y$10$cjVliLMKc.LyjlyXxMK4XeTJP6cjDoClNt9MDWXAcrLrA.9Cdf7xm', 1, '2022-11-07 22:32:28', NULL, '2022-11-06 18:14:37', '2022-11-07 22:32:28'),
(8, 'Quia ex praesentium', 'da2sasd@dsaads.com', NULL, '1', NULL, '$2y$10$CXKjPzlmLL4y5eQd0Ktl5ecE23HD08bYrrqa6PAGX8ZYnLUh/F3FO', 1, '2022-11-07 22:32:26', NULL, '2022-11-06 18:29:08', '2022-11-07 22:32:26'),
(9, 'Quia ex praesentium 2', 'Libero a omnis fugia2', NULL, '1', NULL, '$2y$10$AHb88JD53w0l/YEWPSYoOeuYyz2c1lSIYCLmsu.QqkBxpI8tqn7Am', 1, '2022-11-07 18:30:27', NULL, '2022-11-06 18:29:50', '2022-11-07 18:30:27'),
(10, 'Quia ex praesentium 22', 'Libero a omnis fugia22', NULL, '1', NULL, '$2y$10$P8s2K5YOZf3oPmNiKpVWa.SlkwcGE45SMqDF2uEQ3KCP3z6jFc8Ha', 1, '2022-11-07 18:30:30', NULL, '2022-11-06 18:30:06', '2022-11-07 18:30:30'),
(11, 'Quia ex praesentium 222', 'Libero a omnis fugia222', NULL, '1', NULL, '$2y$10$5z.NOBdjbMkbssciLSI69O3.hILB6dcNhcVTob7W3DdzOQ3c4Rms.', 1, '2022-11-07 22:32:25', NULL, '2022-11-06 18:31:37', '2022-11-07 22:32:25'),
(12, 'Dolorem quia magna c222', 'Aut tempor autem sit222', NULL, '1', NULL, '$2y$10$JF2xYAtIr7e2ZK0OlaIh/.RFD0zJdo504IeCZNdb890Ghr/Jiy32q', 1, '2022-11-07 22:32:23', NULL, '2022-11-06 18:32:44', '2022-11-07 22:32:23'),
(13, 'Odit reprehenderit q1111111111', 'Non sapiente occaeca11111111111111', NULL, '1', NULL, '$2y$10$QHpLsjJEgzRaoiSWDAmTeOwO9MpBtNyvi7buHofxymnVzF/qY1o0O', 1, '2022-11-07 22:32:21', NULL, '2022-11-06 18:33:45', '2022-11-07 22:32:21'),
(14, 'Dolores esse dolor c', 'Ad nulla et officiis', NULL, '1', NULL, '$2y$10$ldG95dhg91WDyE3p.J98NOkgD7BWIu3CTlZVw28dgokHVC0OS3GXC', 1, '2022-11-07 22:32:18', NULL, '2022-11-06 18:39:33', '2022-11-07 22:32:18'),
(15, 'MeGs', 'mohamedmagdy2891@gmail.com', 'media/Admins/1668854564-MeGs-0315_man_avatars [Converted]-03 - Copy.png', '1', '2022-11-07 19:56:56', '$2y$10$8tFbnwA3GO0Pk5nTLGwCyO0RmtQscsA9ZWt3H3fbmfC2uoMJQsE1m', 1, NULL, NULL, '2022-11-07 19:56:56', '2022-11-19 15:52:41'),
(16, 'Mahmoud', 'yugigx6@gmail.com', 'media/Admins/1668854718-Mahmoud-0315_man_avatars [Converted]-02.png', '1', '2022-11-07 19:58:37', '$2y$10$gw5Yg0MmfQ5TvHRyf9uFneRxyX09QN7iD/5W8k/RiFKEHGQAhWMky', 1, NULL, NULL, '2022-11-07 19:58:37', '2022-11-19 15:45:18'),
(17, 'adsdas', 'yugi2gx6@gmail.com', NULL, '1', NULL, '$2y$10$iatHUEVSdM/5lqN3LF7to.A8CvDGMaknxHIGeoXbpnJYZm4CF4Jh.', 1, '2022-11-09 18:00:32', NULL, '2022-11-09 17:58:27', '2022-11-09 18:00:32'),
(18, 'adsdas', 'yugi2gx26@gmail.com', NULL, '1', NULL, '$2y$10$E.tkZUrIVIFa.gv9JlfBSudEUe9OHC48/wTNf/OzCqYQSxkgLv89C', 1, '2022-11-09 18:00:29', NULL, '2022-11-09 17:58:59', '2022-11-09 18:00:29'),
(19, 'adsdas', 'y1ugi2gx26@gmail.com', NULL, '1', NULL, '$2y$10$LZXh59aDLKqPzR2gJUlK4eI3WIAA2QNLDrxQZbaz/50M4HDH7RgyG', 1, '2022-11-09 18:00:28', NULL, '2022-11-09 17:59:19', '2022-11-09 18:00:28'),
(20, 'adsdas', 'y1ugi2g2x26@gmail.com', NULL, '1', NULL, '$2y$10$wzkTnBEIrfvA/2DdtZ2CjuAMYcFdLR71Qa1AgFkdDt2.FCCx0Ojou', 1, '2022-11-09 18:00:25', NULL, '2022-11-09 18:00:09', '2022-11-09 18:00:25'),
(21, 'Et anim et aut anim', 'Nostrud commodo dolo', NULL, '1', NULL, '$2y$10$mEocaLI79CNaIjA/sY1Pz.LUvt331riKwFAzLWAF8gCvRtSB7qYvS', 1, '2022-11-09 18:03:08', NULL, '2022-11-09 18:00:40', '2022-11-09 18:03:08'),
(22, 'Molestias quas nulla', 'Sint ea unde aut di', NULL, '1', NULL, '$2y$10$cN4/d8aRPpctAOm3eTIzse1qE/jT6EbimD.buRo0rjZZX0A/X0tFq', 1, '2022-11-09 18:03:05', NULL, '2022-11-09 18:01:06', '2022-11-09 18:03:05'),
(23, 'Molestias q2uas nulla', 'Sint ea unde aut di2', NULL, '1', NULL, '$2y$10$j90a78qJNGq2VaDCewap9emQVN07txfKlaMAFHtd9hZ6OXhAqu7cq', 1, '2022-11-09 18:02:57', NULL, '2022-11-09 18:01:28', '2022-11-09 18:02:57'),
(24, 'Ad expedita beatae e', 'Perferendis sed veli', NULL, '1', NULL, '$2y$10$wR5Ejhw550LKYLOjmNZ/Tufqcp3KcR/mhJ/.FDwqIlxHW/noQrWhq', 1, '2022-11-09 18:02:50', NULL, '2022-11-09 18:01:55', '2022-11-09 18:02:50'),
(25, 'Porro nisi impedit', 'Dolores inventore ne', NULL, '1', NULL, '$2y$10$SBJw5vKrZFaexN4B/NbCKO7.TMBf.m5aNRCuTJRhu5dtcYYoFgONm', 1, '2022-11-09 18:02:47', NULL, '2022-11-09 18:02:40', '2022-11-09 18:02:47'),
(26, 'Qui et laboriosam c', 'Ea eaque in a soluta', NULL, '1', NULL, '$2y$10$oLg2Mqd4nefLoTIAKjw0h.JkQxV5QB4Oe5tLaP5yK9Dky2LhJqsRK', 1, '2022-11-09 18:03:02', NULL, '2022-11-09 18:02:45', '2022-11-09 18:03:02'),
(27, 'Ad cum irure ut veli', 'Eligendi laborum qui', NULL, '1', NULL, '$2y$10$.SkIsYH5xi9R6/qkNSOXHOeEUQSUk74VBxE8XEvF47NTrgf3yn6Ee', 1, '2022-11-09 18:46:10', NULL, '2022-11-09 18:46:00', '2022-11-09 18:46:10'),
(28, 'Occaecat voluptatem', 'jesib@mailinator.com', NULL, '1', NULL, '$2y$10$3lLB9pI4g442J33yXEQ2AeXROEcfuhDqjb75huzpQblCVUA1Mck4e', 1, '2022-11-09 19:44:27', NULL, '2022-11-09 18:46:47', '2022-11-09 19:44:27'),
(29, 'Magni sit ut officia', 'cojabu dsdsds @mailinator.com', NULL, '1', NULL, '$2y$10$xHn9zTn2.t0Dbnj/QI5ZUuVpS4ULRmkPo8KjF/LYvM9f252j6Oh0m', 1, '2022-11-10 00:16:06', NULL, '2022-11-09 19:44:24', '2022-11-10 00:16:06'),
(30, 'In doloremque tempor', 'nonerypak@mailinator.com', NULL, '1', NULL, '$2y$10$Y/hByj5UMPjU4fCkn2I2Wu.uJ8nWsHEflFXzvBlL4GC5TCdZlH0xi', 1, '2022-11-10 00:15:57', NULL, '2022-11-09 19:44:59', '2022-11-10 00:15:57'),
(31, 'Sed adipisci sed exp', 'vusujorun@mailinator.com', NULL, '1', NULL, '$2y$10$8RXzhlbU39KQBJLnKGQEhePlpkeHosMCUsUtvPznJfPAeOVNVT8e.', 1, '2022-11-12 18:20:15', NULL, '2022-11-12 18:12:33', '2022-11-12 18:20:15'),
(32, 'Aliqua Architecto s', 'gudy@mailinator.com', NULL, '1', NULL, '$2y$10$oGAOS.P/O7NHPhxdwNfnwuc6b7KfssFZ9A6uoYRoYbm4INGiKaw7u', 1, '2022-11-12 18:20:13', NULL, '2022-11-12 18:12:36', '2022-11-12 18:20:13'),
(33, 'Ea dolore non tempor', 'xubeqotuj@mailinator.com', NULL, '1', NULL, '$2y$10$Uxdp1WODtzaVf7WDiyXN9eWa7br4xIWOC3X2zs/Kr0.tSXju/vHyi', 1, '2022-11-12 18:20:11', NULL, '2022-11-12 18:12:41', '2022-11-12 18:20:11'),
(34, 'Mollit harum perspic', 'towopemon@mailinator.com', NULL, '1', NULL, '$2y$10$C/pitnNuXJFz8bBUKtBEQ.m1xHdnhiKXEnV7AUBDWPidmr4c5kG22', 1, '2022-11-12 18:20:10', NULL, '2022-11-12 18:12:45', '2022-11-12 18:20:10'),
(35, 'Ad quibusdam commodi', 'hewy@mailinator.com', NULL, '1', NULL, '$2y$10$WKrzz5ZbQ9ckz0zwr6.ltO1bIPeTYVDArvfY5j/heY3xIzGnlsZDe', 1, '2022-11-12 18:20:08', NULL, '2022-11-12 18:12:50', '2022-11-12 18:20:08'),
(36, 'Minima voluptas quo', 'danizida@mailinator.com', NULL, '1', NULL, '$2y$10$eoA4sXdS.JvutzWIbpM1XughZkcQjPeID81Z6Hy.dfbDoszXuW/0q', 1, '2022-11-12 18:20:07', NULL, '2022-11-12 18:12:57', '2022-11-12 18:20:07'),
(37, 'Et ut nemo culpa eni', 'warenuxyqy@mailinator.com', NULL, '1', NULL, '$2y$10$iS1xvviQLfIWHuv4W8I3zOwELGmqoyaRO/U7YUBqJrS1EkN411d/G', 1, '2022-11-12 18:20:05', NULL, '2022-11-12 18:13:03', '2022-11-12 18:20:05'),
(38, 'Culpa cupiditate su', 'hunori@mailinator.com', NULL, '1', NULL, '$2y$10$HSvXG9EwtWo1s1MxvYPTyOww.9GTCXw51DlFcpZn/gB0pcfkT9knS', 1, '2022-11-12 18:20:03', NULL, '2022-11-12 18:13:08', '2022-11-12 18:20:03'),
(39, 'Mostafa elgaml', 'elgaml.info@gmail.com', 'media/Admins/1668854150-Mostafa elgaml-295318917_1975245442668152_956009330081825136_n.jpg', '1', NULL, '$2y$10$Bsva4AJxi5MnXAV4w.QDgO28iPkNbbDdK/iCzy0MHxApgST2/oyQG', 1, NULL, NULL, '2022-11-16 19:45:11', '2022-11-19 15:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `what_we_will_serves`
--

CREATE TABLE `what_we_will_serves` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `what_we_will_serves`
--

INSERT INTO `what_we_will_serves` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'What we will serve you as a UI/UX design company', 'Tanner Bullock', 'Exceptional creativity mixed with vision, marketing, and cutting-edge technology is what we pour behind the bar at Layouti. Then, we add a flame to fashion an exciting, eye-catching final product through our experience in UI/UX design.', 'Commodo ex quis cons', NULL, '2022-10-21 16:12:56', '2022-11-02 22:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `what_we_will_serve__cards`
--

CREATE TABLE `what_we_will_serve__cards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `card` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `what_we_will_serve__cards`
--

INSERT INTO `what_we_will_serve__cards` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `card`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'UX Design', 'Sybil Ferrell', 'It is all about the user experience design. Layouti focuses on overall usability, ease of use, and the interaction.', 'Pariatur Dolor quis', 'media/HomePage/WhatWeWillServe/1668856304-0-1- about-page-layouti-image.jpg', 1, NULL, '2022-10-28 22:27:49', '2022-11-19 16:11:44'),
(3, 'Branding', 'Veda Nash', 'We strategically pour your identity into the final product in a way that produces users’ imaging concepts.', 'Vel qui ducimus har', 'media/HomePage/WhatWeWillServe/1668856304-1-3- about-page-layouti-image.jpg', 1, NULL, '2022-10-28 22:27:49', '2022-11-19 16:11:45'),
(4, 'UI Design', 'Myra Cline', 'Layouti is powered by professional user interface (UI) design services that can provide outstanding and spot-on layouts.', 'Facere fugit ex eli', 'media/HomePage/WhatWeWillServe/1668856305-2-2- about-page-layouti-image.jpg', 1, NULL, '2022-10-28 22:27:49', '2022-11-19 16:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `work_header_contents`
--

CREATE TABLE `work_header_contents` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `image` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `work_header_contents`
--

INSERT INTO `work_header_contents` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Work that drives impact', 'ثضصثضصث1323212132312', 'The only people more fired up about our work than us are our clients. And they have the outcomes to prove it', 'ثثضص13123', 'media/WorkPage/HeaderContent/1668857158-work-page-layouti-image.jpg', NULL, '2022-10-30 18:24:14', '2022-11-19 16:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `work_we_fired_up_innovateds`
--

CREATE TABLE `work_we_fired_up_innovateds` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text,
  `descriptionAr` text,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `work_we_fired_up_innovateds`
--

INSERT INTO `work_we_fired_up_innovateds` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'We fired up innovated, passionate impact', NULL, 'Looking good is great. But it is just the first step, in helping you move your business. Indeed, these are more than just case studies, it is reimagining figure business in the digital era.', NULL, NULL, '2022-10-30 18:25:14', '2022-11-19 20:06:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `100things`
--
ALTER TABLE `100things`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_check_out_our_clients`
--
ALTER TABLE `about_check_out_our_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_check_out_our_clients_cards`
--
ALTER TABLE `about_check_out_our_clients_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_check_out_our_clients_cards_card_foreign` (`card`);

--
-- Indexes for table `about_header_contents`
--
ALTER TABLE `about_header_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_learn_about_layoutis`
--
ALTER TABLE `about_learn_about_layoutis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_page_header_contents`
--
ALTER TABLE `about_page_header_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_page_seciton_twos`
--
ALTER TABLE `about_page_seciton_twos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_page_seciton_two_cards`
--
ALTER TABLE `about_page_seciton_two_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_page_seciton_two_cards_card_foreign` (`card`);

--
-- Indexes for table `about_page_section_ones`
--
ALTER TABLE `about_page_section_ones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_teams`
--
ALTER TABLE `about_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_team_cards`
--
ALTER TABLE `about_team_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_team_cards_card_foreign` (`card`);

--
-- Indexes for table `about_through_our_values`
--
ALTER TABLE `about_through_our_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_through_our_values_cards`
--
ALTER TABLE `about_through_our_values_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_through_our_values_cards_card_foreign` (`card`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_category_foreign` (`category`),
  ADD KEY `blogs_author_foreign` (`author`);

--
-- Indexes for table `blog_authors`
--
ALTER TABLE `blog_authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_images_blog_foreign` (`blog`);

--
-- Indexes for table `blog_paragraphs`
--
ALTER TABLE `blog_paragraphs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_paragraphs_blog_foreign` (`blog`);

--
-- Indexes for table `blog_paragraph_images`
--
ALTER TABLE `blog_paragraph_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_paragraph_images_card_foreign` (`card`);

--
-- Indexes for table `blog_paragraph_seos`
--
ALTER TABLE `blog_paragraph_seos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_paragraph_seos_blog_foreign` (`blog`);

--
-- Indexes for table `body_design_app_section_eighteens`
--
ALTER TABLE `body_design_app_section_eighteens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_eighteens_body_foreign` (`body`),
  ADD KEY `body_design_app_section_eighteens_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_eights`
--
ALTER TABLE `body_design_app_section_eights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_eights_body_foreign` (`body`),
  ADD KEY `body_design_app_section_eights_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_elevens`
--
ALTER TABLE `body_design_app_section_elevens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_elevens_body_foreign` (`body`),
  ADD KEY `body_design_app_section_elevens_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_fifteens`
--
ALTER TABLE `body_design_app_section_fifteens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_fifteens_body_foreign` (`body`),
  ADD KEY `body_design_app_section_fifteens_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_fives`
--
ALTER TABLE `body_design_app_section_fives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_fives_body_foreign` (`body`),
  ADD KEY `body_design_app_section_fives_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_fours`
--
ALTER TABLE `body_design_app_section_fours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_fours_body_foreign` (`body`),
  ADD KEY `body_design_app_section_fours_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_fourteens`
--
ALTER TABLE `body_design_app_section_fourteens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_fourteens_body_foreign` (`body`),
  ADD KEY `body_design_app_section_fourteens_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_fourteen_cards`
--
ALTER TABLE `body_design_app_section_fourteen_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_fourteen_cards_card_foreign` (`card`);

--
-- Indexes for table `body_design_app_section_nines`
--
ALTER TABLE `body_design_app_section_nines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_nines_body_foreign` (`body`),
  ADD KEY `body_design_app_section_nines_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_ones`
--
ALTER TABLE `body_design_app_section_ones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_ones_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_sevens`
--
ALTER TABLE `body_design_app_section_sevens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_sevens_body_foreign` (`body`),
  ADD KEY `body_design_app_section_sevens_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_seventeens`
--
ALTER TABLE `body_design_app_section_seventeens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_seventeens_body_foreign` (`body`),
  ADD KEY `body_design_app_section_seventeens_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_sixes`
--
ALTER TABLE `body_design_app_section_sixes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_sixes_body_foreign` (`body`),
  ADD KEY `body_design_app_section_sixes_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_sixteens`
--
ALTER TABLE `body_design_app_section_sixteens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_sixteens_body_foreign` (`body`),
  ADD KEY `body_design_app_section_sixteens_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_tens`
--
ALTER TABLE `body_design_app_section_tens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_tens_body_foreign` (`body`),
  ADD KEY `body_design_app_section_tens_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_thirteens`
--
ALTER TABLE `body_design_app_section_thirteens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_thirteens_body_foreign` (`body`),
  ADD KEY `body_design_app_section_thirteens_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_threes`
--
ALTER TABLE `body_design_app_section_threes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_threes_body_foreign` (`body`),
  ADD KEY `body_design_app_section_threes_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_twelves`
--
ALTER TABLE `body_design_app_section_twelves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_twelves_body_foreign` (`body`),
  ADD KEY `body_design_app_section_twelves_project_foreign` (`project`);

--
-- Indexes for table `body_design_app_section_twos`
--
ALTER TABLE `body_design_app_section_twos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_design_app_section_twos_body_foreign` (`body`),
  ADD KEY `body_design_app_section_twos_project_foreign` (`project`);

--
-- Indexes for table `contact_company_decks`
--
ALTER TABLE `contact_company_decks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_f_a_qs`
--
ALTER TABLE `contact_f_a_qs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_f_a_qs_cards`
--
ALTER TABLE `contact_f_a_qs_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_f_a_qs_cards_category_foreign` (`category`),
  ADD KEY `contact_f_a_qs_cards_card_foreign` (`card`);

--
-- Indexes for table `contact_header_contents`
--
ALTER TABLE `contact_header_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_information`
--
ALTER TABLE `contact_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_information_country_cards`
--
ALTER TABLE `contact_information_country_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_information_country_cards_card_foreign` (`card`);

--
-- Indexes for table `contact_information_email_cards`
--
ALTER TABLE `contact_information_email_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_information_email_cards_card_foreign` (`card`);

--
-- Indexes for table `contact_information_mobile_cards`
--
ALTER TABLE `contact_information_mobile_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_information_mobile_cards_card_foreign` (`card`);

--
-- Indexes for table `contact_information_whats_app_cards`
--
ALTER TABLE `contact_information_whats_app_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_information_whats_app_cards_card_foreign` (`card`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_page_header_contents`
--
ALTER TABLE `contact_us_page_header_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_page_section_ones`
--
ALTER TABLE `contact_us_page_section_ones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_page_section_twos`
--
ALTER TABLE `contact_us_page_section_twos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_page_section_two_cards`
--
ALTER TABLE `contact_us_page_section_two_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_us_page_section_two_cards_card_foreign` (`card`);

--
-- Indexes for table `contact_we_fired_up_innovateds`
--
ALTER TABLE `contact_we_fired_up_innovateds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverables`
--
ALTER TABLE `deliverables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designproducts_statics`
--
ALTER TABLE `designproducts_statics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designproducts_static_cards`
--
ALTER TABLE `designproducts_static_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designproducts_static_cards_card_foreign` (`card`);

--
-- Indexes for table `designproducts_static_cards_of_cards`
--
ALTER TABLE `designproducts_static_cards_of_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designproducts_static_cards_of_cards_card_foreign` (`card`);

--
-- Indexes for table `design_categories`
--
ALTER TABLE `design_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_header_contents`
--
ALTER TABLE `design_header_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_links`
--
ALTER TABLE `design_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_links_cards`
--
ALTER TABLE `design_links_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `design_links_cards_card_foreign` (`card`);

--
-- Indexes for table `design_projects`
--
ALTER TABLE `design_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `design_projects_category_foreign` (`category`);

--
-- Indexes for table `design_project_images`
--
ALTER TABLE `design_project_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `design_project_images_project_foreign` (`project`);

--
-- Indexes for table `design_project_informations`
--
ALTER TABLE `design_project_informations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `design_project_informations_project_foreign` (`project`);

--
-- Indexes for table `design_project_s_e_o_s`
--
ALTER TABLE `design_project_s_e_o_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `design_project_s_e_o_s_project_foreign` (`project`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `global_page_etoy_ads`
--
ALTER TABLE `global_page_etoy_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_page_etoy_app_settings`
--
ALTER TABLE `global_page_etoy_app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_page_etoy_faqs`
--
ALTER TABLE `global_page_etoy_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_page_etoy_faq_cards`
--
ALTER TABLE `global_page_etoy_faq_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `global_page_etoy_faq_cards_card_foreign` (`card`);

--
-- Indexes for table `header_contents`
--
ALTER TABLE `header_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hire_us`
--
ALTER TABLE `hire_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hire_us_budget_foreign` (`budget`);

--
-- Indexes for table `home_page_header_contents`
--
ALTER TABLE `home_page_header_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_seciton_fours`
--
ALTER TABLE `home_page_seciton_fours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_seciton_ones`
--
ALTER TABLE `home_page_seciton_ones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_seciton_one_cards`
--
ALTER TABLE `home_page_seciton_one_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home_page_seciton_one_cards_card_foreign` (`card`);

--
-- Indexes for table `home_page_seciton_threes`
--
ALTER TABLE `home_page_seciton_threes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_seciton_twos`
--
ALTER TABLE `home_page_seciton_twos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layouti_budgets`
--
ALTER TABLE `layouti_budgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layouti_categories`
--
ALTER TABLE `layouti_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layouti_categories_faqs`
--
ALTER TABLE `layouti_categories_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layouti_categories_services`
--
ALTER TABLE `layouti_categories_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layouti_i_needs`
--
ALTER TABLE `layouti_i_needs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layouti_scopes`
--
ALTER TABLE `layouti_scopes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layouti_scope_cards`
--
ALTER TABLE `layouti_scope_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layouti_scope_cards_card_foreign` (`card`);

--
-- Indexes for table `learn_u_i_design_packages`
--
ALTER TABLE `learn_u_i_design_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learn_u_i_design_package_points`
--
ALTER TABLE `learn_u_i_design_package_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learn_u_i_design_package_points_card_foreign` (`card`);

--
-- Indexes for table `learn_u_i_header_contents`
--
ALTER TABLE `learn_u_i_header_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learn_u_i_highlits_designs`
--
ALTER TABLE `learn_u_i_highlits_designs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learn_u_i_questions_collapses`
--
ALTER TABLE `learn_u_i_questions_collapses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learn_u_i_questions_collapse_cards`
--
ALTER TABLE `learn_u_i_questions_collapse_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learn_u_i_questions_collapse_cards_card_foreign` (`card`);

--
-- Indexes for table `learn_u_i_steps_reach_cards`
--
ALTER TABLE `learn_u_i_steps_reach_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learn_u_i_steps_reach_cards_of_cards`
--
ALTER TABLE `learn_u_i_steps_reach_cards_of_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learn_u_i_steps_reach_cards_of_cards_card_foreign` (`card`);

--
-- Indexes for table `learn_u_i_testimonials`
--
ALTER TABLE `learn_u_i_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learn_u_i_testimonials_cards`
--
ALTER TABLE `learn_u_i_testimonials_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learn_u_i_testimonials_cards_card_foreign` (`card`);

--
-- Indexes for table `learn_u_i_u_x_design_packages`
--
ALTER TABLE `learn_u_i_u_x_design_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learn_u_i_u_x_design_package_points`
--
ALTER TABLE `learn_u_i_u_x_design_package_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learn_u_i_u_x_design_package_points_card_foreign` (`card`);

--
-- Indexes for table `learn_u_i_u_x_u_i_design_packages`
--
ALTER TABLE `learn_u_i_u_x_u_i_design_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learn_u_i_u_x_u_i_design_package_points`
--
ALTER TABLE `learn_u_i_u_x_u_i_design_package_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learn_u_i_u_x_u_i_design_package_points_card_foreign` (`card`);

--
-- Indexes for table `learn_u_i_what_offers`
--
ALTER TABLE `learn_u_i_what_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learn_u_i_what_offer_points`
--
ALTER TABLE `learn_u_i_what_offer_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learn_u_i_what_offer_points_card_foreign` (`card`);

--
-- Indexes for table `learn_u_i_who_can_attends`
--
ALTER TABLE `learn_u_i_who_can_attends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learn_u_i_who_can_attend_points`
--
ALTER TABLE `learn_u_i_who_can_attend_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `learn_u_i_who_can_attend_points_card_foreign` (`card`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `need_layouti_for_your_projects`
--
ALTER TABLE `need_layouti_for_your_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `need_layouti_for_your_project__cards`
--
ALTER TABLE `need_layouti_for_your_project__cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `need_layouti_for_your_project__cards_card_foreign` (`card`);

--
-- Indexes for table `our_last_works`
--
ALTER TABLE `our_last_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `process_design_skills`
--
ALTER TABLE `process_design_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process_design_skills__cards`
--
ALTER TABLE `process_design_skills__cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `process_design_skills__cards_card_foreign` (`card`);

--
-- Indexes for table `product_body_brandings`
--
ALTER TABLE `product_body_brandings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_body_brandings_project_foreign` (`project`);

--
-- Indexes for table `product_body_branding_images`
--
ALTER TABLE `product_body_branding_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_body_branding_images_project_foreign` (`project`);

--
-- Indexes for table `product_general_information`
--
ALTER TABLE `product_general_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_general_information_category_foreign` (`category`);

--
-- Indexes for table `product_in_depths`
--
ALTER TABLE `product_in_depths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_in_depths_project_foreign` (`project`);

--
-- Indexes for table `product_in_depth_cards`
--
ALTER TABLE `product_in_depth_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_in_depth_cards_card_foreign` (`card`);

--
-- Indexes for table `product_our_clients`
--
ALTER TABLE `product_our_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_our_clients_project_foreign` (`project`);

--
-- Indexes for table `product_project_names`
--
ALTER TABLE `product_project_names`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_project_names_project_foreign` (`project`);

--
-- Indexes for table `product_project_team_members`
--
ALTER TABLE `product_project_team_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_project_team_members_project_foreign` (`project`);

--
-- Indexes for table `product_scope_of_works`
--
ALTER TABLE `product_scope_of_works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_scope_of_works_scope_foreign` (`scope`),
  ADD KEY `product_scope_of_works_project_foreign` (`project`);

--
-- Indexes for table `product_s_e_o_s`
--
ALTER TABLE `product_s_e_o_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_s_e_o_s_project_foreign` (`project`);

--
-- Indexes for table `product_thanks_sections`
--
ALTER TABLE `product_thanks_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_thanks_sections_project_foreign` (`project`);

--
-- Indexes for table `product_thanks_section_cards`
--
ALTER TABLE `product_thanks_section_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_thanks_section_cards_card_foreign` (`card`);

--
-- Indexes for table `project_information`
--
ALTER TABLE `project_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_information_project_foreign` (`project`);

--
-- Indexes for table `say_hellos`
--
ALTER TABLE `say_hellos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_page_about_pages`
--
ALTER TABLE `seo_page_about_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_page_contact_pages`
--
ALTER TABLE `seo_page_contact_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_page_home_pages`
--
ALTER TABLE `seo_page_home_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_page_terms_and_conditions_pages`
--
ALTER TABLE `seo_page_terms_and_conditions_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_categories`
--
ALTER TABLE `services_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_categories_cards`
--
ALTER TABLE `services_categories_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_categories_cards_category_foreign` (`category`),
  ADD KEY `services_categories_cards_card_foreign` (`card`);

--
-- Indexes for table `services_header_contents`
--
ALTER TABLE `services_header_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_learn_about_layoutis`
--
ALTER TABLE `services_learn_about_layoutis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_process_timelines`
--
ALTER TABLE `services_process_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_process_timeline_cards`
--
ALTER TABLE `services_process_timeline_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_process_timeline_cards_card_foreign` (`card`);

--
-- Indexes for table `services_services_categories`
--
ALTER TABLE `services_services_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_services_categories_category_foreign` (`category`);

--
-- Indexes for table `terms_and_conditions_page_header_contents`
--
ALTER TABLE `terms_and_conditions_page_header_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions_page_header_content_cards`
--
ALTER TABLE `terms_and_conditions_page_header_content_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terms_and_conditions_page_header_content_cards_card_foreign` (`card`);

--
-- Indexes for table `terms_and_conditions_page_how_to_earn_points`
--
ALTER TABLE `terms_and_conditions_page_how_to_earn_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions_page_how_to_earn_points_cards`
--
ALTER TABLE `terms_and_conditions_page_how_to_earn_points_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terms_and_conditions_page_how_to_earn_points_cards_card_foreign` (`card`);

--
-- Indexes for table `terms_and_conditions_page_how_to_earn_points_cards_of_cards`
--
ALTER TABLE `terms_and_conditions_page_how_to_earn_points_cards_of_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terms_and_conditions_page_how_to_earn_points_cards_foreign` (`card`);

--
-- Indexes for table `terms_and_conditions_page_photo_guidelines`
--
ALTER TABLE `terms_and_conditions_page_photo_guidelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions_page_photo_guidelines_cards`
--
ALTER TABLE `terms_and_conditions_page_photo_guidelines_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terms_and_conditions_page_photo_guidelines_cards_card_foreign` (`card`);

--
-- Indexes for table `terms_and_conditions_page_points_policies`
--
ALTER TABLE `terms_and_conditions_page_points_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions_page_points_policy_cards`
--
ALTER TABLE `terms_and_conditions_page_points_policy_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terms_and_conditions_page_points_policy_cards_card_foreign` (`card`);

--
-- Indexes for table `terms_and_conditions_page_registrations`
--
ALTER TABLE `terms_and_conditions_page_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions_page_registration_cards`
--
ALTER TABLE `terms_and_conditions_page_registration_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terms_and_conditions_page_registration_cards_card_foreign` (`card`);

--
-- Indexes for table `terms_and_conditions_page_registration_cards_of_cards`
--
ALTER TABLE `terms_and_conditions_page_registration_cards_of_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terms_and_conditions_page_registration_cards_foreign` (`card`);

--
-- Indexes for table `terms_and_conditions_page_terms_of_uses`
--
ALTER TABLE `terms_and_conditions_page_terms_of_uses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions_page_terms_of_use_cards`
--
ALTER TABLE `terms_and_conditions_page_terms_of_use_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terms_and_conditions_page_terms_of_use_cards_card_foreign` (`card`);

--
-- Indexes for table `terms_and_conditions_page_terms_of_use_cards_of_cards`
--
ALTER TABLE `terms_and_conditions_page_terms_of_use_cards_of_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terms_and_conditions_page_terms_of_use_cards_foreign` (`card`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials__cards`
--
ALTER TABLE `testimonials__cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials__cards_card_foreign` (`card`);

--
-- Indexes for table `things_header_contents`
--
ALTER TABLE `things_header_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `things_opportunity_always_exists`
--
ALTER TABLE `things_opportunity_always_exists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `what_we_will_serves`
--
ALTER TABLE `what_we_will_serves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `what_we_will_serve__cards`
--
ALTER TABLE `what_we_will_serve__cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `what_we_will_serve__cards_card_foreign` (`card`);

--
-- Indexes for table `work_header_contents`
--
ALTER TABLE `work_header_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_we_fired_up_innovateds`
--
ALTER TABLE `work_we_fired_up_innovateds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `100things`
--
ALTER TABLE `100things`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_check_out_our_clients`
--
ALTER TABLE `about_check_out_our_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_check_out_our_clients_cards`
--
ALTER TABLE `about_check_out_our_clients_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `about_header_contents`
--
ALTER TABLE `about_header_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_learn_about_layoutis`
--
ALTER TABLE `about_learn_about_layoutis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `about_page_header_contents`
--
ALTER TABLE `about_page_header_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_page_seciton_twos`
--
ALTER TABLE `about_page_seciton_twos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `about_page_seciton_two_cards`
--
ALTER TABLE `about_page_seciton_two_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `about_page_section_ones`
--
ALTER TABLE `about_page_section_ones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_teams`
--
ALTER TABLE `about_teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_team_cards`
--
ALTER TABLE `about_team_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `about_through_our_values`
--
ALTER TABLE `about_through_our_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_through_our_values_cards`
--
ALTER TABLE `about_through_our_values_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `blog_authors`
--
ALTER TABLE `blog_authors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blog_images`
--
ALTER TABLE `blog_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `blog_paragraphs`
--
ALTER TABLE `blog_paragraphs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `blog_paragraph_images`
--
ALTER TABLE `blog_paragraph_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_paragraph_seos`
--
ALTER TABLE `blog_paragraph_seos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `body_design_app_section_eighteens`
--
ALTER TABLE `body_design_app_section_eighteens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `body_design_app_section_eights`
--
ALTER TABLE `body_design_app_section_eights`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `body_design_app_section_elevens`
--
ALTER TABLE `body_design_app_section_elevens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `body_design_app_section_fifteens`
--
ALTER TABLE `body_design_app_section_fifteens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `body_design_app_section_fives`
--
ALTER TABLE `body_design_app_section_fives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `body_design_app_section_fours`
--
ALTER TABLE `body_design_app_section_fours`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `body_design_app_section_fourteens`
--
ALTER TABLE `body_design_app_section_fourteens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `body_design_app_section_fourteen_cards`
--
ALTER TABLE `body_design_app_section_fourteen_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `body_design_app_section_nines`
--
ALTER TABLE `body_design_app_section_nines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `body_design_app_section_ones`
--
ALTER TABLE `body_design_app_section_ones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `body_design_app_section_sevens`
--
ALTER TABLE `body_design_app_section_sevens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `body_design_app_section_seventeens`
--
ALTER TABLE `body_design_app_section_seventeens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `body_design_app_section_sixes`
--
ALTER TABLE `body_design_app_section_sixes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `body_design_app_section_sixteens`
--
ALTER TABLE `body_design_app_section_sixteens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `body_design_app_section_tens`
--
ALTER TABLE `body_design_app_section_tens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `body_design_app_section_thirteens`
--
ALTER TABLE `body_design_app_section_thirteens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `body_design_app_section_threes`
--
ALTER TABLE `body_design_app_section_threes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `body_design_app_section_twelves`
--
ALTER TABLE `body_design_app_section_twelves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `body_design_app_section_twos`
--
ALTER TABLE `body_design_app_section_twos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `contact_company_decks`
--
ALTER TABLE `contact_company_decks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_f_a_qs`
--
ALTER TABLE `contact_f_a_qs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_f_a_qs_cards`
--
ALTER TABLE `contact_f_a_qs_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contact_header_contents`
--
ALTER TABLE `contact_header_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_information`
--
ALTER TABLE `contact_information`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_information_country_cards`
--
ALTER TABLE `contact_information_country_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_information_email_cards`
--
ALTER TABLE `contact_information_email_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_information_mobile_cards`
--
ALTER TABLE `contact_information_mobile_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_information_whats_app_cards`
--
ALTER TABLE `contact_information_whats_app_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us_page_header_contents`
--
ALTER TABLE `contact_us_page_header_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us_page_section_ones`
--
ALTER TABLE `contact_us_page_section_ones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us_page_section_twos`
--
ALTER TABLE `contact_us_page_section_twos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us_page_section_two_cards`
--
ALTER TABLE `contact_us_page_section_two_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact_we_fired_up_innovateds`
--
ALTER TABLE `contact_we_fired_up_innovateds`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deliverables`
--
ALTER TABLE `deliverables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `designproducts_statics`
--
ALTER TABLE `designproducts_statics`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `designproducts_static_cards`
--
ALTER TABLE `designproducts_static_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `designproducts_static_cards_of_cards`
--
ALTER TABLE `designproducts_static_cards_of_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `design_categories`
--
ALTER TABLE `design_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `design_header_contents`
--
ALTER TABLE `design_header_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `design_links`
--
ALTER TABLE `design_links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `design_links_cards`
--
ALTER TABLE `design_links_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `design_projects`
--
ALTER TABLE `design_projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `design_project_images`
--
ALTER TABLE `design_project_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `design_project_informations`
--
ALTER TABLE `design_project_informations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `design_project_s_e_o_s`
--
ALTER TABLE `design_project_s_e_o_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `global_page_etoy_ads`
--
ALTER TABLE `global_page_etoy_ads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `global_page_etoy_app_settings`
--
ALTER TABLE `global_page_etoy_app_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `global_page_etoy_faqs`
--
ALTER TABLE `global_page_etoy_faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `global_page_etoy_faq_cards`
--
ALTER TABLE `global_page_etoy_faq_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header_contents`
--
ALTER TABLE `header_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hire_us`
--
ALTER TABLE `hire_us`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `home_page_header_contents`
--
ALTER TABLE `home_page_header_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_page_seciton_fours`
--
ALTER TABLE `home_page_seciton_fours`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_page_seciton_ones`
--
ALTER TABLE `home_page_seciton_ones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_page_seciton_one_cards`
--
ALTER TABLE `home_page_seciton_one_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `home_page_seciton_threes`
--
ALTER TABLE `home_page_seciton_threes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_page_seciton_twos`
--
ALTER TABLE `home_page_seciton_twos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `layouti_budgets`
--
ALTER TABLE `layouti_budgets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `layouti_categories`
--
ALTER TABLE `layouti_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `layouti_categories_faqs`
--
ALTER TABLE `layouti_categories_faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `layouti_categories_services`
--
ALTER TABLE `layouti_categories_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `layouti_i_needs`
--
ALTER TABLE `layouti_i_needs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `layouti_scopes`
--
ALTER TABLE `layouti_scopes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `layouti_scope_cards`
--
ALTER TABLE `layouti_scope_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `learn_u_i_design_packages`
--
ALTER TABLE `learn_u_i_design_packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learn_u_i_design_package_points`
--
ALTER TABLE `learn_u_i_design_package_points`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `learn_u_i_header_contents`
--
ALTER TABLE `learn_u_i_header_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learn_u_i_highlits_designs`
--
ALTER TABLE `learn_u_i_highlits_designs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learn_u_i_questions_collapses`
--
ALTER TABLE `learn_u_i_questions_collapses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learn_u_i_questions_collapse_cards`
--
ALTER TABLE `learn_u_i_questions_collapse_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `learn_u_i_steps_reach_cards`
--
ALTER TABLE `learn_u_i_steps_reach_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learn_u_i_steps_reach_cards_of_cards`
--
ALTER TABLE `learn_u_i_steps_reach_cards_of_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learn_u_i_testimonials`
--
ALTER TABLE `learn_u_i_testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learn_u_i_testimonials_cards`
--
ALTER TABLE `learn_u_i_testimonials_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `learn_u_i_u_x_design_packages`
--
ALTER TABLE `learn_u_i_u_x_design_packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learn_u_i_u_x_design_package_points`
--
ALTER TABLE `learn_u_i_u_x_design_package_points`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learn_u_i_u_x_u_i_design_packages`
--
ALTER TABLE `learn_u_i_u_x_u_i_design_packages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learn_u_i_u_x_u_i_design_package_points`
--
ALTER TABLE `learn_u_i_u_x_u_i_design_package_points`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learn_u_i_what_offers`
--
ALTER TABLE `learn_u_i_what_offers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learn_u_i_what_offer_points`
--
ALTER TABLE `learn_u_i_what_offer_points`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `learn_u_i_who_can_attends`
--
ALTER TABLE `learn_u_i_who_can_attends`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `learn_u_i_who_can_attend_points`
--
ALTER TABLE `learn_u_i_who_can_attend_points`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `need_layouti_for_your_projects`
--
ALTER TABLE `need_layouti_for_your_projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `need_layouti_for_your_project__cards`
--
ALTER TABLE `need_layouti_for_your_project__cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `our_last_works`
--
ALTER TABLE `our_last_works`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `process_design_skills`
--
ALTER TABLE `process_design_skills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `process_design_skills__cards`
--
ALTER TABLE `process_design_skills__cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_body_brandings`
--
ALTER TABLE `product_body_brandings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `product_body_branding_images`
--
ALTER TABLE `product_body_branding_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product_general_information`
--
ALTER TABLE `product_general_information`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `product_in_depths`
--
ALTER TABLE `product_in_depths`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `product_in_depth_cards`
--
ALTER TABLE `product_in_depth_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `product_our_clients`
--
ALTER TABLE `product_our_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `product_project_names`
--
ALTER TABLE `product_project_names`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `product_project_team_members`
--
ALTER TABLE `product_project_team_members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `product_scope_of_works`
--
ALTER TABLE `product_scope_of_works`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `product_s_e_o_s`
--
ALTER TABLE `product_s_e_o_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `product_thanks_sections`
--
ALTER TABLE `product_thanks_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `product_thanks_section_cards`
--
ALTER TABLE `product_thanks_section_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `project_information`
--
ALTER TABLE `project_information`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `say_hellos`
--
ALTER TABLE `say_hellos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `seo_page_about_pages`
--
ALTER TABLE `seo_page_about_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seo_page_contact_pages`
--
ALTER TABLE `seo_page_contact_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seo_page_home_pages`
--
ALTER TABLE `seo_page_home_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seo_page_terms_and_conditions_pages`
--
ALTER TABLE `seo_page_terms_and_conditions_pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services_categories`
--
ALTER TABLE `services_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services_categories_cards`
--
ALTER TABLE `services_categories_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services_header_contents`
--
ALTER TABLE `services_header_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services_learn_about_layoutis`
--
ALTER TABLE `services_learn_about_layoutis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services_process_timelines`
--
ALTER TABLE `services_process_timelines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services_process_timeline_cards`
--
ALTER TABLE `services_process_timeline_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services_services_categories`
--
ALTER TABLE `services_services_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terms_and_conditions_page_header_contents`
--
ALTER TABLE `terms_and_conditions_page_header_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions_page_header_content_cards`
--
ALTER TABLE `terms_and_conditions_page_header_content_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions_page_how_to_earn_points`
--
ALTER TABLE `terms_and_conditions_page_how_to_earn_points`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions_page_how_to_earn_points_cards`
--
ALTER TABLE `terms_and_conditions_page_how_to_earn_points_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions_page_how_to_earn_points_cards_of_cards`
--
ALTER TABLE `terms_and_conditions_page_how_to_earn_points_cards_of_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions_page_photo_guidelines`
--
ALTER TABLE `terms_and_conditions_page_photo_guidelines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions_page_photo_guidelines_cards`
--
ALTER TABLE `terms_and_conditions_page_photo_guidelines_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions_page_points_policies`
--
ALTER TABLE `terms_and_conditions_page_points_policies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions_page_points_policy_cards`
--
ALTER TABLE `terms_and_conditions_page_points_policy_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions_page_registrations`
--
ALTER TABLE `terms_and_conditions_page_registrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions_page_registration_cards`
--
ALTER TABLE `terms_and_conditions_page_registration_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions_page_registration_cards_of_cards`
--
ALTER TABLE `terms_and_conditions_page_registration_cards_of_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions_page_terms_of_uses`
--
ALTER TABLE `terms_and_conditions_page_terms_of_uses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions_page_terms_of_use_cards`
--
ALTER TABLE `terms_and_conditions_page_terms_of_use_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms_and_conditions_page_terms_of_use_cards_of_cards`
--
ALTER TABLE `terms_and_conditions_page_terms_of_use_cards_of_cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials__cards`
--
ALTER TABLE `testimonials__cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `things_header_contents`
--
ALTER TABLE `things_header_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `things_opportunity_always_exists`
--
ALTER TABLE `things_opportunity_always_exists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `what_we_will_serves`
--
ALTER TABLE `what_we_will_serves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `what_we_will_serve__cards`
--
ALTER TABLE `what_we_will_serve__cards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `work_header_contents`
--
ALTER TABLE `work_header_contents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work_we_fired_up_innovateds`
--
ALTER TABLE `work_we_fired_up_innovateds`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_check_out_our_clients_cards`
--
ALTER TABLE `about_check_out_our_clients_cards`
  ADD CONSTRAINT `about_check_out_our_clients_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `about_check_out_our_clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `about_page_seciton_two_cards`
--
ALTER TABLE `about_page_seciton_two_cards`
  ADD CONSTRAINT `about_page_seciton_two_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `about_page_seciton_twos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `about_team_cards`
--
ALTER TABLE `about_team_cards`
  ADD CONSTRAINT `about_team_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `about_teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `about_through_our_values_cards`
--
ALTER TABLE `about_through_our_values_cards`
  ADD CONSTRAINT `about_through_our_values_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `about_through_our_values` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_author_foreign` FOREIGN KEY (`author`) REFERENCES `blog_authors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_category_foreign` FOREIGN KEY (`category`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_images`
--
ALTER TABLE `blog_images`
  ADD CONSTRAINT `blog_images_blog_foreign` FOREIGN KEY (`blog`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_paragraphs`
--
ALTER TABLE `blog_paragraphs`
  ADD CONSTRAINT `blog_paragraphs_blog_foreign` FOREIGN KEY (`blog`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_paragraph_images`
--
ALTER TABLE `blog_paragraph_images`
  ADD CONSTRAINT `blog_paragraph_images_card_foreign` FOREIGN KEY (`card`) REFERENCES `blog_paragraphs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_paragraph_seos`
--
ALTER TABLE `blog_paragraph_seos`
  ADD CONSTRAINT `blog_paragraph_seos_blog_foreign` FOREIGN KEY (`blog`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_eighteens`
--
ALTER TABLE `body_design_app_section_eighteens`
  ADD CONSTRAINT `body_design_app_section_eighteens_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_eighteens_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_eights`
--
ALTER TABLE `body_design_app_section_eights`
  ADD CONSTRAINT `body_design_app_section_eights_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_eights_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_elevens`
--
ALTER TABLE `body_design_app_section_elevens`
  ADD CONSTRAINT `body_design_app_section_elevens_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_elevens_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_fifteens`
--
ALTER TABLE `body_design_app_section_fifteens`
  ADD CONSTRAINT `body_design_app_section_fifteens_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_fifteens_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_fives`
--
ALTER TABLE `body_design_app_section_fives`
  ADD CONSTRAINT `body_design_app_section_fives_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_fives_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_fours`
--
ALTER TABLE `body_design_app_section_fours`
  ADD CONSTRAINT `body_design_app_section_fours_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_fours_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_fourteens`
--
ALTER TABLE `body_design_app_section_fourteens`
  ADD CONSTRAINT `body_design_app_section_fourteens_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_fourteens_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_fourteen_cards`
--
ALTER TABLE `body_design_app_section_fourteen_cards`
  ADD CONSTRAINT `body_design_app_section_fourteen_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `body_design_app_section_fourteens` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_nines`
--
ALTER TABLE `body_design_app_section_nines`
  ADD CONSTRAINT `body_design_app_section_nines_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_nines_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_ones`
--
ALTER TABLE `body_design_app_section_ones`
  ADD CONSTRAINT `body_design_app_section_ones_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_sevens`
--
ALTER TABLE `body_design_app_section_sevens`
  ADD CONSTRAINT `body_design_app_section_sevens_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_sevens_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_seventeens`
--
ALTER TABLE `body_design_app_section_seventeens`
  ADD CONSTRAINT `body_design_app_section_seventeens_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_seventeens_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_sixes`
--
ALTER TABLE `body_design_app_section_sixes`
  ADD CONSTRAINT `body_design_app_section_sixes_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_sixes_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_sixteens`
--
ALTER TABLE `body_design_app_section_sixteens`
  ADD CONSTRAINT `body_design_app_section_sixteens_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_sixteens_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_tens`
--
ALTER TABLE `body_design_app_section_tens`
  ADD CONSTRAINT `body_design_app_section_tens_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_tens_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_thirteens`
--
ALTER TABLE `body_design_app_section_thirteens`
  ADD CONSTRAINT `body_design_app_section_thirteens_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_thirteens_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_threes`
--
ALTER TABLE `body_design_app_section_threes`
  ADD CONSTRAINT `body_design_app_section_threes_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_threes_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_twelves`
--
ALTER TABLE `body_design_app_section_twelves`
  ADD CONSTRAINT `body_design_app_section_twelves_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_twelves_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `body_design_app_section_twos`
--
ALTER TABLE `body_design_app_section_twos`
  ADD CONSTRAINT `body_design_app_section_twos_body_foreign` FOREIGN KEY (`body`) REFERENCES `body_design_app_section_ones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `body_design_app_section_twos_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_f_a_qs_cards`
--
ALTER TABLE `contact_f_a_qs_cards`
  ADD CONSTRAINT `contact_f_a_qs_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `contact_f_a_qs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contact_f_a_qs_cards_category_foreign` FOREIGN KEY (`category`) REFERENCES `layouti_categories_faqs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_information_country_cards`
--
ALTER TABLE `contact_information_country_cards`
  ADD CONSTRAINT `contact_information_country_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `contact_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_information_email_cards`
--
ALTER TABLE `contact_information_email_cards`
  ADD CONSTRAINT `contact_information_email_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `contact_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_information_mobile_cards`
--
ALTER TABLE `contact_information_mobile_cards`
  ADD CONSTRAINT `contact_information_mobile_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `contact_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_information_whats_app_cards`
--
ALTER TABLE `contact_information_whats_app_cards`
  ADD CONSTRAINT `contact_information_whats_app_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `contact_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_us_page_section_two_cards`
--
ALTER TABLE `contact_us_page_section_two_cards`
  ADD CONSTRAINT `contact_us_page_section_two_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `contact_us_page_section_twos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `designproducts_static_cards`
--
ALTER TABLE `designproducts_static_cards`
  ADD CONSTRAINT `designproducts_static_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `designproducts_statics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `designproducts_static_cards_of_cards`
--
ALTER TABLE `designproducts_static_cards_of_cards`
  ADD CONSTRAINT `designproducts_static_cards_of_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `designproducts_static_cards` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `design_links_cards`
--
ALTER TABLE `design_links_cards`
  ADD CONSTRAINT `design_links_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `design_links` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `design_projects`
--
ALTER TABLE `design_projects`
  ADD CONSTRAINT `design_projects_category_foreign` FOREIGN KEY (`category`) REFERENCES `design_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `design_project_images`
--
ALTER TABLE `design_project_images`
  ADD CONSTRAINT `design_project_images_project_foreign` FOREIGN KEY (`project`) REFERENCES `design_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `design_project_informations`
--
ALTER TABLE `design_project_informations`
  ADD CONSTRAINT `design_project_informations_project_foreign` FOREIGN KEY (`project`) REFERENCES `design_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `design_project_s_e_o_s`
--
ALTER TABLE `design_project_s_e_o_s`
  ADD CONSTRAINT `design_project_s_e_o_s_project_foreign` FOREIGN KEY (`project`) REFERENCES `design_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `global_page_etoy_faq_cards`
--
ALTER TABLE `global_page_etoy_faq_cards`
  ADD CONSTRAINT `global_page_etoy_faq_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `global_page_etoy_faqs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hire_us`
--
ALTER TABLE `hire_us`
  ADD CONSTRAINT `hire_us_budget_foreign` FOREIGN KEY (`budget`) REFERENCES `layouti_budgets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `home_page_seciton_one_cards`
--
ALTER TABLE `home_page_seciton_one_cards`
  ADD CONSTRAINT `home_page_seciton_one_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `home_page_seciton_ones` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `layouti_scope_cards`
--
ALTER TABLE `layouti_scope_cards`
  ADD CONSTRAINT `layouti_scope_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `layouti_scopes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learn_u_i_design_package_points`
--
ALTER TABLE `learn_u_i_design_package_points`
  ADD CONSTRAINT `learn_u_i_design_package_points_card_foreign` FOREIGN KEY (`card`) REFERENCES `learn_u_i_design_packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learn_u_i_questions_collapse_cards`
--
ALTER TABLE `learn_u_i_questions_collapse_cards`
  ADD CONSTRAINT `learn_u_i_questions_collapse_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `learn_u_i_questions_collapses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learn_u_i_steps_reach_cards_of_cards`
--
ALTER TABLE `learn_u_i_steps_reach_cards_of_cards`
  ADD CONSTRAINT `learn_u_i_steps_reach_cards_of_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `learn_u_i_steps_reach_cards` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learn_u_i_testimonials_cards`
--
ALTER TABLE `learn_u_i_testimonials_cards`
  ADD CONSTRAINT `learn_u_i_testimonials_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `learn_u_i_testimonials` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learn_u_i_u_x_design_package_points`
--
ALTER TABLE `learn_u_i_u_x_design_package_points`
  ADD CONSTRAINT `learn_u_i_u_x_design_package_points_card_foreign` FOREIGN KEY (`card`) REFERENCES `learn_u_i_u_x_design_packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learn_u_i_u_x_u_i_design_package_points`
--
ALTER TABLE `learn_u_i_u_x_u_i_design_package_points`
  ADD CONSTRAINT `learn_u_i_u_x_u_i_design_package_points_card_foreign` FOREIGN KEY (`card`) REFERENCES `learn_u_i_u_x_u_i_design_packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learn_u_i_what_offer_points`
--
ALTER TABLE `learn_u_i_what_offer_points`
  ADD CONSTRAINT `learn_u_i_what_offer_points_card_foreign` FOREIGN KEY (`card`) REFERENCES `learn_u_i_what_offers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `learn_u_i_who_can_attend_points`
--
ALTER TABLE `learn_u_i_who_can_attend_points`
  ADD CONSTRAINT `learn_u_i_who_can_attend_points_card_foreign` FOREIGN KEY (`card`) REFERENCES `learn_u_i_who_can_attends` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `need_layouti_for_your_project__cards`
--
ALTER TABLE `need_layouti_for_your_project__cards`
  ADD CONSTRAINT `need_layouti_for_your_project__cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `need_layouti_for_your_projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `process_design_skills__cards`
--
ALTER TABLE `process_design_skills__cards`
  ADD CONSTRAINT `process_design_skills__cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `process_design_skills` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_body_brandings`
--
ALTER TABLE `product_body_brandings`
  ADD CONSTRAINT `product_body_brandings_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_body_branding_images`
--
ALTER TABLE `product_body_branding_images`
  ADD CONSTRAINT `product_body_branding_images_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_general_information`
--
ALTER TABLE `product_general_information`
  ADD CONSTRAINT `product_general_information_category_foreign` FOREIGN KEY (`category`) REFERENCES `layouti_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_in_depths`
--
ALTER TABLE `product_in_depths`
  ADD CONSTRAINT `product_in_depths_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_in_depth_cards`
--
ALTER TABLE `product_in_depth_cards`
  ADD CONSTRAINT `product_in_depth_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `product_in_depths` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_our_clients`
--
ALTER TABLE `product_our_clients`
  ADD CONSTRAINT `product_our_clients_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_project_names`
--
ALTER TABLE `product_project_names`
  ADD CONSTRAINT `product_project_names_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_project_team_members`
--
ALTER TABLE `product_project_team_members`
  ADD CONSTRAINT `product_project_team_members_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_scope_of_works`
--
ALTER TABLE `product_scope_of_works`
  ADD CONSTRAINT `product_scope_of_works_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_scope_of_works_scope_foreign` FOREIGN KEY (`scope`) REFERENCES `layouti_scopes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_s_e_o_s`
--
ALTER TABLE `product_s_e_o_s`
  ADD CONSTRAINT `product_s_e_o_s_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_thanks_sections`
--
ALTER TABLE `product_thanks_sections`
  ADD CONSTRAINT `product_thanks_sections_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_thanks_section_cards`
--
ALTER TABLE `product_thanks_section_cards`
  ADD CONSTRAINT `product_thanks_section_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `product_thanks_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_information`
--
ALTER TABLE `project_information`
  ADD CONSTRAINT `project_information_project_foreign` FOREIGN KEY (`project`) REFERENCES `product_general_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services_categories_cards`
--
ALTER TABLE `services_categories_cards`
  ADD CONSTRAINT `services_categories_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `services_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_categories_cards_category_foreign` FOREIGN KEY (`category`) REFERENCES `layouti_categories_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services_process_timeline_cards`
--
ALTER TABLE `services_process_timeline_cards`
  ADD CONSTRAINT `services_process_timeline_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `services_process_timelines` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services_services_categories`
--
ALTER TABLE `services_services_categories`
  ADD CONSTRAINT `services_services_categories_category_foreign` FOREIGN KEY (`category`) REFERENCES `layouti_categories_services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `terms_and_conditions_page_header_content_cards`
--
ALTER TABLE `terms_and_conditions_page_header_content_cards`
  ADD CONSTRAINT `terms_and_conditions_page_header_content_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `terms_and_conditions_page_header_contents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `terms_and_conditions_page_how_to_earn_points_cards`
--
ALTER TABLE `terms_and_conditions_page_how_to_earn_points_cards`
  ADD CONSTRAINT `terms_and_conditions_page_how_to_earn_points_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `terms_and_conditions_page_how_to_earn_points` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `terms_and_conditions_page_how_to_earn_points_cards_of_cards`
--
ALTER TABLE `terms_and_conditions_page_how_to_earn_points_cards_of_cards`
  ADD CONSTRAINT `terms_and_conditions_page_how_to_earn_points_cards_foreign` FOREIGN KEY (`card`) REFERENCES `terms_and_conditions_page_how_to_earn_points_cards` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `terms_and_conditions_page_photo_guidelines_cards`
--
ALTER TABLE `terms_and_conditions_page_photo_guidelines_cards`
  ADD CONSTRAINT `terms_and_conditions_page_photo_guidelines_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `terms_and_conditions_page_photo_guidelines` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `terms_and_conditions_page_points_policy_cards`
--
ALTER TABLE `terms_and_conditions_page_points_policy_cards`
  ADD CONSTRAINT `terms_and_conditions_page_points_policy_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `terms_and_conditions_page_points_policies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `terms_and_conditions_page_registration_cards`
--
ALTER TABLE `terms_and_conditions_page_registration_cards`
  ADD CONSTRAINT `terms_and_conditions_page_registration_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `terms_and_conditions_page_registrations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `terms_and_conditions_page_registration_cards_of_cards`
--
ALTER TABLE `terms_and_conditions_page_registration_cards_of_cards`
  ADD CONSTRAINT `terms_and_conditions_page_registration_cards_foreign` FOREIGN KEY (`card`) REFERENCES `terms_and_conditions_page_registration_cards` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `terms_and_conditions_page_terms_of_use_cards`
--
ALTER TABLE `terms_and_conditions_page_terms_of_use_cards`
  ADD CONSTRAINT `terms_and_conditions_page_terms_of_use_cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `terms_and_conditions_page_terms_of_uses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `terms_and_conditions_page_terms_of_use_cards_of_cards`
--
ALTER TABLE `terms_and_conditions_page_terms_of_use_cards_of_cards`
  ADD CONSTRAINT `terms_and_conditions_page_terms_of_use_cards_foreign` FOREIGN KEY (`card`) REFERENCES `terms_and_conditions_page_terms_of_use_cards` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonials__cards`
--
ALTER TABLE `testimonials__cards`
  ADD CONSTRAINT `testimonials__cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `testimonials` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `what_we_will_serve__cards`
--
ALTER TABLE `what_we_will_serve__cards`
  ADD CONSTRAINT `what_we_will_serve__cards_card_foreign` FOREIGN KEY (`card`) REFERENCES `what_we_will_serves` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
