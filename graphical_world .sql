-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2024 at 03:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graphical_world`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `title1` varchar(255) DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title1`, `title2`, `body`, `image`) VALUES
(1, 'Hello world', 'কাজ হবে আপনার মনের মতো', 'Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.', 'studio.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'ayanrahaman041@gmail.com', '731303');

-- --------------------------------------------------------

--
-- Table structure for table `b_an_appointment`
--

CREATE TABLE `b_an_appointment` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `paragraph` varchar(255) DEFAULT NULL,
  `ph` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `b_an_appointment`
--

INSERT INTO `b_an_appointment` (`id`, `title`, `paragraph`, `ph`) VALUES
(1, 'Make Your Dream Smile a Reality', 'Call Us To Book Your Appointment Today', '7584952446');

-- --------------------------------------------------------

--
-- Table structure for table `choose_us`
--

CREATE TABLE `choose_us` (
  `id` int(11) NOT NULL,
  `small_title` varchar(255) DEFAULT NULL,
  `big_title` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `p_completed` varchar(255) DEFAULT NULL,
  `e_workers` varchar(255) DEFAULT NULL,
  `s_customer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `choose_us`
--

INSERT INTO `choose_us` (`id`, `small_title`, `big_title`, `body`, `p_completed`, `e_workers`, `s_customer`) VALUES
(1, 'The best Graphical Design Service', 'Your Top Choice For Digital Work Designing and Graphic', 'Some great placeholder content for the first featurette here. Imagine some exciting prose here.', '6500', '5', '99');

-- --------------------------------------------------------

--
-- Table structure for table `client_message`
--

CREATE TABLE `client_message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_message`
--

INSERT INTO `client_message` (`id`, `name`, `email`, `phone`, `message`, `status`) VALUES
(7, 'Alan Snow', 'cehidynez@mailinator.com', '+1 (272) 843-7414', 'Impedit cumque illu', 0),
(8, 'Sahil Samim', 'ayanrahaman1121@gmail.com', '7542895632', 'i sjsjisjisj', 0),
(9, 'Carolyn Atkinson', 'hodefi@mailinator.com', '+1 (386) 994-6892', 'Maiores deserunt ea ', 0),
(10, 'Quemby Noel', 'xygajuru@mailinator.com', '+1 (977) 223-9983', 'Magnam eveniet amet', 0),
(11, 'Lev Cunningham', 'soxegixypy@mailinator.com', '+1 (929) 233-6398', 'Sunt aliquip nostru', 0),
(12, 'Hiram Greene', 'vapazu@mailinator.com', '+1 (202) 269-4231', 'Eveniet temporibus ', 0),
(13, 'Freya Pugh', 'gobutow@mailinator.com', '+1 (131) 961-3247', 'Eiusmod aspernatur t', 0),
(14, 'Basil Lang', 'fehibyzu@mailinator.com', '+1 (912) 758-4125', 'Esse illum natus m', 0),
(15, 'Carolyn Conway', 'sukiwavih@mailinator.com', '+1 (813) 547-4225', 'Tempor consectetur ', 0),
(16, 'Clinton Green', 'daki@mailinator.com', '+1 (632) 173-1447', 'Culpa laboriosam q', 0),
(17, 'Raymond Oconnor', 'hejebet@mailinator.com', '+1 (525) 914-9663', 'Harum vero soluta cu', 0),
(18, 'shahidur rahaman', 'ayanrahaman041@gmail.com', '7029979185', 'i want to create a logo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `ph1` varchar(255) DEFAULT NULL,
  `ph2` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `insta` varchar(255) DEFAULT NULL,
  `tw` varchar(255) DEFAULT NULL,
  `whatp` varchar(255) DEFAULT NULL,
  `g_map` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `address`, `heading`, `ph1`, `ph2`, `email`, `fb`, `insta`, `tw`, `whatp`, `g_map`) VALUES
(1, 'langalhata, Labpur, bolpur, West Bengal 731303', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel perspiciatis porro distinctio, hic provident aliquam!', '123456790', '1234567890', 'someone@gmail.com', 'www.facebook.com', 'www.insta.com', 'www.twittwr.com', 'www.whatsapp.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30765978.00238801!2d61.00083698256397!3d19.729113061269324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1728643726228!5m2!1sen!2');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `date`, `content`, `status`) VALUES
(4, 'Sohel Sk', '10/10/2024', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus! Minima,', 1),
(5, 'Ayan', '11/09/2024', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus! Minima,', 1),
(6, 'Sumon', '22/09/2024', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus! Minima,', 1),
(7, 'Akash', '12/8/2024', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus! Minima,', 1),
(8, 'Rajen Sk', '11/10/2024', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo dolor eveniet deleniti repellendus! Minima,', 1);

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `f_heading` varchar(255) DEFAULT NULL,
  `f_body` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `f_heading`, `f_body`) VALUES
(1, 'Graphical World', 'Welcome to Graphical World. Our graphic design shop specializes in bringing your vision to life through innovative and visually captivating designs. Whether you need a striking logo, eye-catching marketing materials, or custom illustrations, our team');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `site_about` varchar(255) DEFAULT NULL,
  `marquee_heading` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `site_title`, `site_about`, `marquee_heading`) VALUES
(1, 'GRAPHICAL WORLD', 'Welcome to Graphical World. Our graphic design shop specializes in bringing your vision to life through innovative and visually captivating designs. Whether you need a striking logo, eye-catching marketing materials, or custom illustrations, our team', 'Walk into the digital market with graphical world ||  বিয়েতে অ্যালবাম বানান। আপনার সুন্দর মুহূর্তের ছবিগুলো সারা জীবন সাথে রাখুন || অল্প খরচে আমাদের সঙ্গে');

-- --------------------------------------------------------

--
-- Table structure for table `landing_page`
--

CREATE TABLE `landing_page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `marquee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `landing_page`
--

INSERT INTO `landing_page` (`id`, `title`, `body`, `marquee`) VALUES
(1, 'Welcome to - GRAPHICAL WORLD', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi corporis, nam accusamus voluptatem qui impedit. Voluptatibus deserunt maiores cumque architecto nulla? Nam magnam repellenduslaudantium? ', 'Walk into the digital market with graphical world ||  বিয়েতে অ্যালবাম বানান। আপনার সুন্দর মুহূর্তের ছবিগুলো সারা জীবন সাথে রাখুন || অল্প খরচে আমাদের সঙ্গে\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `landing_page_image`
--

CREATE TABLE `landing_page_image` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `landing_page_image`
--

INSERT INTO `landing_page_image` (`id`, `image`) VALUES
(1, 'carosoul_03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `image`, `name`, `category`) VALUES
(4, 'visiting_card_03.jpeg', 'Visiting card on Mallick auto parts', 'Graphics Design'),
(5, 'visiting_card_02.jpeg', 'Business card of kalimat aphotography', 'Graphics Design'),
(6, 'visiting_card.jpeg', 'Rahuk Transport v-card', 'Graphics Design'),
(21, 'WhatsApp Image 2024-05-07 at 2.20.17 PM.jpeg', 'SHAHIDUR RAHAMAN ', 'Website Development'),
(22, 'aya_iit1.jpg', 'SHAHIDUR RAHAMAN ', 'Digital Markeeting');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `s_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `s_name`) VALUES
(1, 'Graphics Design'),
(2, 'Website Development'),
(3, 'Digital Markeeting'),
(4, 'Wedding Photogrpahy');

-- --------------------------------------------------------

--
-- Table structure for table `s_content`
--

CREATE TABLE `s_content` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_content`
--

INSERT INTO `s_content` (`id`, `image`, `about`, `type`) VALUES
(1, 'graphic_design_service.jpg', 'Our graphic design services cover a wide range of products – brochures, business cards, publications, mailers, posters and billboards – we’ve pretty much designed it all. With nearly 6 years of experience designing for print and the web, we’ll help your business convert potential clients into paying customers with well designed, printed collateral.', 'Graphics Design'),
(2, 'webdev_service.jpg', 'Crafting standout websites and branding using sound strategic thinking and eye-catching digital, that creates instant impact and sparks emotion. To really see what we can do, take a look at our full range of Development services.', 'Website Development'),
(3, 'digital_markeeting_service.jpg', 'Growing your business or organization can be tough. Using DPi Campaign Pro, though, can help you build and manage your contacts and never miss a lead. Using any of our solutions, you can help get your business started with a strong digital marketing strategy.', 'Digital Markeeting'),
(4, 'photography_services.png', 'We are passionate wedding photographers dedicated to capturing the essence of your special day. With an eye for detail and a love for storytelling, we strive to create beautiful, candid images that reflect your unique love story\r\n', 'Wedding Photogrpahy');

-- --------------------------------------------------------

--
-- Table structure for table `s_services`
--

CREATE TABLE `s_services` (
  `id` int(11) NOT NULL,
  `s_s_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_services`
--

INSERT INTO `s_services` (`id`, `s_s_name`, `type`) VALUES
(8, 'Web Design', 'Website Development'),
(9, ' Landing Page', 'Website Development'),
(10, 'Web Application', 'Website Development'),
(11, 'Mobile application', 'Website Development'),
(12, 'Info graphic', 'Website Development'),
(15, 'Logo Design', 'Graphics Design'),
(16, 'Banners', 'Graphics Design'),
(17, 'Business Card', 'Graphics Design'),
(18, 'Visiting Card', 'Graphics Design'),
(19, 'Stickers', 'Graphics Design'),
(26, 'paid Media', 'Digital Markeeting'),
(27, 'Content Markeeting', 'Digital Markeeting'),
(28, 'Digital Markeeting', 'Digital Markeeting'),
(34, 'Video Shoot', 'Wedding Photogrpahy'),
(35, 'Pre Wedding Photo Shoot', 'Wedding Photogrpahy'),
(47, 'asd', 'Website Development'),
(48, 'ssaaa', 'Website Development');

-- --------------------------------------------------------

--
-- Table structure for table `s_s_c_project`
--

CREATE TABLE `s_s_c_project` (
  `id` int(11) NOT NULL,
  `ssc_name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_s_c_project`
--

INSERT INTO `s_s_c_project` (`id`, `ssc_name`, `type`) VALUES
(6, 'Digital Markeeting', 'Digital Markeeting'),
(7, 'Content Markeeting', 'Digital Markeeting'),
(12, 'Logos and branded elements', 'Graphics Design'),
(13, 'Brochures, rack cards & booklets', 'Graphics Design'),
(14, 'Posters, banners and signage', 'Graphics Design'),
(15, 'Email marketing graphics', 'Digital Markeeting'),
(20, 'Web Design', 'Website Development'),
(21, 'Landing Page', 'Website Development'),
(22, 'Web Application', 'Website Development'),
(23, 'Mobile Application', 'Website Development'),
(26, 'Full Wedding photography', 'Wedding Photogrpahy'),
(27, 'Prewedding Photo shoot', 'Wedding Photogrpahy'),
(29, 'abcd', 'Website Development'),
(30, '4545454', 'Website Development'),
(31, 'abcd', 'Wedding Photogrpahy');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `Designation` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `image`, `Designation`, `facebook`, `instagram`, `twitter`) VALUES
(23, 'VIRAT KOHLI', 'Virat_Kohli_in_PMO_New_Delhi.jpg', 'Graphics Design', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://x.com/?lang=en'),
(24, 'Mohammad Siraj', 'Prime_Minister_Of_Bharat_Shri_Narendra_Damodardas_Modi_with_Mohammad_Siraj_(cropped).jpg', 'Web Design & Development', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://x.com/?lang=en');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `b_an_appointment`
--
ALTER TABLE `b_an_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choose_us`
--
ALTER TABLE `choose_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_message`
--
ALTER TABLE `client_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing_page`
--
ALTER TABLE `landing_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing_page_image`
--
ALTER TABLE `landing_page_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_content`
--
ALTER TABLE `s_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_services`
--
ALTER TABLE `s_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_s_c_project`
--
ALTER TABLE `s_s_c_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `b_an_appointment`
--
ALTER TABLE `b_an_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `choose_us`
--
ALTER TABLE `choose_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_message`
--
ALTER TABLE `client_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `landing_page`
--
ALTER TABLE `landing_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `landing_page_image`
--
ALTER TABLE `landing_page_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `s_content`
--
ALTER TABLE `s_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `s_services`
--
ALTER TABLE `s_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `s_s_c_project`
--
ALTER TABLE `s_s_c_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
