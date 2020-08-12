-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2020 at 03:51 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

CREATE TABLE `tbl_catagory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`id`, `name`) VALUES
(1, 'JAVA'),
(2, 'PHP'),
(3, 'HTML'),
(4, 'CSS'),
(5, 'Education'),
(8, 'Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `fname`, `lname`, `email`, `body`, `status`, `date`) VALUES
(2, 'Alamin', 'Hossain', 'hossainalamin980@gmail.com', 'Hi Bro', 1, '2020-06-20 15:17:57'),
(4, 'Maisha', 'muntaha', 'maisha088@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, rerum enim maiores vero optio fugiat labore...', 1, '2020-06-21 16:14:52'),
(5, 'Md Rokebul', 'Islam', 'rokebul@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, rerum enim maiores vero optio fugiat labore...', 0, '2020-06-21 16:15:06'),
(6, 'joy', 'Hossain', 'joy@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, rerum enim maiores vero optio fugiat labore...', 0, '2020-06-21 16:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `note`) VALUES
(1, ' Copyright with Alamin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `body`) VALUES
(1, 'About Us', '<p>Hello Im Md Alamin Hossain From CSEJnU</p>'),
(2, 'Privacy Policy', '<p>privacy Policy</p>'),
(3, 'DMCA', '<p>dmca</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`, `userid`) VALUES
(7, 1, 'Java post tille', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, rerum enim maiores vero optio fugiat labore porro magni! Beatae sed iure delectus aperiam distinctio eos placeat eaque amet rem et ab suscipit at, in repudiandae eius dignissimos nesciunt consequuntur soluta ea blanditiis ad, deleniti possimus. Quaerat voluptatibus maiores ipsa iure pariatur ea corrupti fugiat, reprehenderit ad sunt consequatur ratione error suscipit doloremque laborum animi aliquid voluptatem aspernatur, eum alias a! Doloribus maxime, ipsum dolores velit harum eius vel veniam. Blanditiis itaque voluptatibus officia, dolor possimus aliquam similique atque quos at eius cupiditate exercitationem reprehenderit enim aspernatur eveniet, voluptatum sapiente temporibus libero illo impedit reiciendis sed, in. Atque placeat dolorum dolor, labore, numquam est. Reiciendis autem ipsa ipsam ex id. Natus cumque sed, amet ex sequi quas possimus, voluptas blanditiis ea neque necessitatibus doloremque eligendi dolores ducimus, dolorum pariatur voluptate, nisi facilis quam sint nesciunt quidem impedit. At excepturi autem nulla accusantium dolorum harum voluptates cumque laborum pariatur, quod, ab maxime cupiditate enim ad ipsa illum! Quo, nobis dolorum. Esse maxime illum quae corrupti quidem voluptatem soluta, officiis aliquid fugit voluptas laboriosam rerum, eius nesciunt. Voluptates corporis sit laboriosam, eius enim repudiandae atque saepe debitis repellat, sequi dolor, quod aut iure!</p>', 'uploads/d2ea03f8f3.jpeg', 'ALAMIN', 'JAVA', '2020-05-23 15:07:43', 0),
(10, 4, 'CSS post title', '<p>css Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, rerum enim maiores vero optio fugiat labore porro magni! Beatae sed iure delectus aperiam distinctio eos placeat eaque amet rem et ab suscipit at, in repudiandae eius dignissimos nesciunt consequuntur soluta ea blanditiis ad, deleniti possimus. Quaerat voluptatibus maiores ipsa iure pariatur ea corrupti fugiat, reprehenderit ad sunt consequatur ratione error suscipit doloremque laborum animi aliquid voluptatem aspernatur, eum alias a! Doloribus maxime, ipsum dolores velit harum eius vel veniam. Blanditiis itaque voluptatibus officia, dolor possimus aliquam similique atque quos at eius cupiditate exercitationem reprehenderit enim aspernatur eveniet, voluptatum sapiente temporibus libero illo impedit reiciendis sed, in. Atque placeat dolorum dolor, labore, numquam est. Reiciendis autem ipsa ipsam ex id. Natus cumque sed, amet ex sequi quas possimus, voluptas blanditiis ea neque necessitatibus doloremque eligendi dolores ducimus, dolorum pariatur voluptate, nisi facilis quam sint nesciunt quidem impedit. At excepturi autem nulla accusantium dolorum harum voluptates cumque laborum pariatur, quod, ab maxime cupiditate enim ad ipsa illum! Quo, nobis dolorum. Esse maxime illum quae corrupti quidem voluptatem soluta, officiis aliquid fugit voluptas laboriosam rerum, eius nesciunt. Voluptates corporis sit laboriosam, eius enim repudiandae atque saepe debitis repellat, sequi dolor, quod aut iure!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, rerum enim maiores vero optio fugiat labore porro magni! Beatae sed iure delectus aperiam distinctio eos placeat eaque amet rem et ab suscipit at, in repudiandae eius dignissimos nesciunt consequuntur soluta ea blanditiis ad, deleniti possimus. Quaerat voluptatibus maiores ipsa iure pariatur ea corrupti fugiat, reprehenderit ad sunt consequatur ratione error suscipit doloremque laborum animi aliquid voluptatem aspernatur, eum alias a! Doloribus maxime, ipsum dolores velit harum eius vel veniam. Blanditiis itaque voluptatibus officia, dolor possimus aliquam similique atque quos at eius cupiditate exercitationem reprehenderit enim aspernatur eveniet, voluptatum sapiente temporibus libero illo impedit reiciendis sed, in. Atque placeat dolorum dolor, labore, numquam est. Reiciendis autem ipsa ipsam ex id. Natus cumque sed, amet ex sequi quas possimus, voluptas blanditiis ea neque necessitatibus doloremque eligendi dolores ducimus, dolorum pariatur voluptate, nisi facilis quam sint nesciunt quidem impedit. At excepturi autem nulla accusantium dolorum harum voluptates cumque laborum pariatur, quod, ab maxime cupiditate enim ad ipsa illum! Quo, nobis dolorum. Esse maxime illum quae corrupti quidem voluptatem soluta, officiis aliquid fugit voluptas laboriosam rerum, eius nesciunt. Voluptates corporis sit laboriosam, eius enim repudiandae atque saepe debitis repellat, sequi dolor, quod aut iure!</p>', 'uploads/45b975cab8.jpg', 'ALAMIN Hossain', 'CSS', '2020-05-23 15:12:21', 0),
(11, 5, 'Accounting Learning', '<p>ASdnasdnsakncs.dkfnsd.kfnsdklnas;ldkcmlkvnalkvnklxzvnzxn zxc, nzxkcvnxk</p>', 'uploads/fe15a78520.jpg', 'Rokebul', 'Education', '2020-06-25 13:42:21', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `image`) VALUES
(3, 'Java post title', 'uploads/dae4c44701.jpg'),
(4, 'HTML post tille', 'uploads/52a3cdded7.jpg'),
(5, 'Alamin Hossain', 'uploads/7e21488fe5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `gp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `tw`, `ln`, `gp`) VALUES
(1, 'http://facebook.com', 'http://twiter.com', 'http://linkedin.com', 'http://google.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theme`
--

CREATE TABLE `tbl_theme` (
  `id` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_theme`
--

INSERT INTO `tbl_theme` (`id`, `theme`) VALUES
(1, 'green');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `details`, `role`) VALUES
(11, '', 'admin', '202cb962ac59075b964b07152d234b70', 'hossainalamin980@gmail.com', '', 0),
(13, '', 'author', '202cb962ac59075b964b07152d234b70', 'maisha088@gmail.com', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Our site tiltess', 'Our site slogan', 'uploads/d98828c6bd.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
