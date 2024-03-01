-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 28, 2024 at 03:20 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leila`
--

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `image_filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `project_id`, `image_filename`) VALUES
(1, 1, 'style-frame6.jpg'),
(2, 1, 'style-frame8.jpg'),
(3, 1, 'earbud-x-ray.jpg'),
(4, 2, 'kadot1.jpg'),
(5, 2, 'kadot-products.png'),
(6, 2, 'kadot-logo.png'),
(7, 3, 'Zima-allCans.png'),
(8, 3, 'zima-peojects2.png'),
(9, 3, 'zima-404pag.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `firstname`, `lastname`, `email`, `message`) VALUES
(13, 'Spencer', 'Dips', 'sdips@gmail.com', 'Hello this is a message'),
(14, 'Spencer', 'Dips', 'sdips@gmail.com', 'Hello this is a message'),
(15, 'Spencer', 'Dips', 'sdips@gmail.com', 'Hello this is a message'),
(16, 'Spencer', 'Dips', 'sdips@gmail.com', 'Hello this is a message'),
(17, 'Spencer', 'Dips', 'sdips@gmail.com', 'Hello this is a message');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `image_url`) VALUES
(1, 'Diba Earbuds Project', 'Welcome to the Diba Earbuds 3D Showcase project! This repository features a pair of meticulously designed 3D earbuds, presented on an engaging promotional website. The website is crafted using a combination of HTML, CSS, SASS, and JavaScript, creating an immersive and visually appealing experience for users. The Diba Earbuds 3D Showcase offers an engaging and interactive experience through an AR Model Viewer, Hotspots, and an X-Ray feature. The AR Model Viewer allows users to explore a detailed 3D representation of Diba Earbuds with user-friendly controls and supports augmented reality for an immersive experience. Hotspots provide interactive elements on the 3D model, offering detailed information about specific features. The X-Ray feature enables users to switch between regular and X-ray views, providing insights into the internal components of the earbuds. Together, these features create an educational and captivating platform for users to explore the design, materials, and functionalities of Diba Earbuds.', 'earbuds-projects.jpg'),
(2, 'Kadot Website', 'First, I designed two website pages and two mobile pages with Adobe XD, and then I wrote their HTML and CSS codes based on the designs. The pages I designed are an online clothing store where you can buy women\'s clothing and accessories. Also, all the photos used on the pages (except for three photos) were taken by me.', 'kadot-projects.jpg'),
(3, 'Zima', 'In a chic hotel room design using Cinema 4D (C4D), our team blended style and practicality seamlessly. The 3D-rendered space showcased modern comfort with a focus on luxe textures like velvet, leather, and marble. Dynamic camera angles highlighted the room\'s versatility for different moods. The design not only captured the hotel\'s vibe but also told a captivating visual story. Carefully added textures brought an extra touch of sophistication to the immersive digital experience.', 'zima-projects.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userfirstname` varchar(255) NOT NULL,
  `userlastname` varchar(255) NOT NULL,
  `userbio` text NOT NULL,
  `useremail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `userfirstname`, `userlastname`, `userbio`, `useremail`) VALUES
(1, 'admin', 'potato', 'Leila', 'Akbari', 'I\'m an artist and designer based in Canada, who instead of traditional tools like pens or brushes, use code as a creative tool. I love crafting designs that are not only visually stunning but also functional, each one tailored to fit the unique vibes of my clients. Living for that aha moment when someone interacts with my creations, I\'m always learning and pushing my boundaries.\r\n\r\n', 'leila@itsleila.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
