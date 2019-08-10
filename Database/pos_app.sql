-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2019 at 09:22 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `acl_phinxlog`
--

CREATE TABLE `acl_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acl_phinxlog`
--

INSERT INTO `acl_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20141229162641, 'CakePhpDbAcl', '2019-08-05 09:31:06', '2019-08-05 09:31:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE `acos` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 172),
(2, 1, NULL, NULL, 'Error', 2, 3),
(9, 1, NULL, NULL, 'Pages', 4, 21),
(10, 9, NULL, NULL, 'display', 5, 6),
(19, 1, NULL, NULL, 'Acl', 22, 23),
(20, 1, NULL, NULL, 'Bake', 24, 25),
(21, 1, NULL, NULL, 'DebugKit', 26, 53),
(22, 21, NULL, NULL, 'Composer', 27, 30),
(23, 22, NULL, NULL, 'checkDependencies', 28, 29),
(24, 21, NULL, NULL, 'MailPreview', 31, 38),
(25, 24, NULL, NULL, 'index', 32, 33),
(26, 24, NULL, NULL, 'sent', 34, 35),
(27, 24, NULL, NULL, 'email', 36, 37),
(28, 21, NULL, NULL, 'Panels', 39, 44),
(29, 28, NULL, NULL, 'index', 40, 41),
(30, 28, NULL, NULL, 'view', 42, 43),
(31, 21, NULL, NULL, 'Requests', 45, 48),
(32, 31, NULL, NULL, 'view', 46, 47),
(33, 21, NULL, NULL, 'Toolbar', 49, 52),
(34, 33, NULL, NULL, 'clearCache', 50, 51),
(35, 1, NULL, NULL, 'Migrations', 54, 55),
(36, 1, NULL, NULL, 'WyriHaximus\\TwigView', 56, 57),
(38, 1, NULL, NULL, 'CakePdf', 58, 59),
(39, 9, NULL, NULL, 'index', 7, 8),
(40, 1, NULL, NULL, 'Admin', 60, 115),
(41, 40, NULL, NULL, 'Products', 61, 72),
(42, 41, NULL, NULL, 'index', 62, 63),
(43, 41, NULL, NULL, 'view', 64, 65),
(44, 41, NULL, NULL, 'add', 66, 67),
(45, 41, NULL, NULL, 'edit', 68, 69),
(46, 41, NULL, NULL, 'delete', 70, 71),
(47, 1, NULL, NULL, 'Customers', 116, 133),
(48, 47, NULL, NULL, 'index', 117, 118),
(49, 47, NULL, NULL, 'view', 119, 120),
(50, 47, NULL, NULL, 'add', 121, 122),
(51, 47, NULL, NULL, 'edit', 123, 124),
(52, 47, NULL, NULL, 'delete', 125, 126),
(71, 47, NULL, NULL, 'login', 127, 128),
(72, 47, NULL, NULL, 'logout', 129, 130),
(73, 40, NULL, NULL, 'Users', 73, 90),
(74, 73, NULL, NULL, 'index', 74, 75),
(75, 73, NULL, NULL, 'invoice', 76, 77),
(76, 73, NULL, NULL, 'login', 78, 79),
(77, 73, NULL, NULL, 'logout', 80, 81),
(78, 73, NULL, NULL, 'view', 82, 83),
(79, 73, NULL, NULL, 'add', 84, 85),
(80, 73, NULL, NULL, 'edit', 86, 87),
(81, 73, NULL, NULL, 'delete', 88, 89),
(82, 40, NULL, NULL, 'Groups', 91, 102),
(83, 82, NULL, NULL, 'index', 92, 93),
(84, 82, NULL, NULL, 'view', 94, 95),
(85, 82, NULL, NULL, 'add', 96, 97),
(86, 82, NULL, NULL, 'edit', 98, 99),
(87, 82, NULL, NULL, 'delete', 100, 101),
(100, 40, NULL, NULL, 'Categories', 103, 114),
(101, 100, NULL, NULL, 'index', 104, 105),
(102, 100, NULL, NULL, 'view', 106, 107),
(103, 100, NULL, NULL, 'add', 108, 109),
(104, 100, NULL, NULL, 'edit', 110, 111),
(105, 100, NULL, NULL, 'delete', 112, 113),
(106, 9, NULL, NULL, 'category', 9, 10),
(107, 9, NULL, NULL, 'shop', 11, 12),
(108, 9, NULL, NULL, 'about', 13, 14),
(109, 1, NULL, NULL, 'Carts', 134, 145),
(110, 109, NULL, NULL, 'index', 135, 136),
(111, 109, NULL, NULL, 'view', 137, 138),
(112, 109, NULL, NULL, 'add', 139, 140),
(113, 109, NULL, NULL, 'edit', 141, 142),
(114, 109, NULL, NULL, 'delete', 143, 144),
(115, 1, NULL, NULL, 'OrderDetails', 146, 157),
(116, 115, NULL, NULL, 'index', 147, 148),
(117, 115, NULL, NULL, 'view', 149, 150),
(118, 115, NULL, NULL, 'add', 151, 152),
(119, 115, NULL, NULL, 'edit', 153, 154),
(120, 115, NULL, NULL, 'delete', 155, 156),
(121, 1, NULL, NULL, 'Orders', 158, 171),
(122, 121, NULL, NULL, 'index', 159, 160),
(123, 121, NULL, NULL, 'view', 161, 162),
(124, 121, NULL, NULL, 'transaksi', 163, 164),
(125, 121, NULL, NULL, 'add', 165, 166),
(126, 121, NULL, NULL, 'edit', 167, 168),
(127, 121, NULL, NULL, 'delete', 169, 170),
(128, 9, NULL, NULL, 'invoice', 15, 16),
(129, 9, NULL, NULL, 'report', 17, 18),
(130, 47, NULL, NULL, 'register', 131, 132),
(131, 9, NULL, NULL, 'addSaldo', 19, 20);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE `aros` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Groups', 1, NULL, 1, 4),
(2, 1, 'Users', 1, NULL, 2, 3),
(3, NULL, 'Groups', 2, NULL, 5, 22),
(4, 3, 'Users', 2, NULL, 6, 7),
(5, 3, 'Users', 3, NULL, 8, 9),
(11, 3, 'Users', 4, NULL, 10, 11),
(12, 3, 'Users', 5, NULL, 12, 13),
(13, 3, 'Users', 6, NULL, 14, 15),
(14, 3, 'Users', 7, NULL, 16, 17),
(15, 3, 'Users', 8, NULL, 18, 19),
(16, NULL, 'Customers', 3, NULL, 23, 24),
(17, 3, 'Users', 9, NULL, 20, 21),
(18, NULL, 'Customers', 4, NULL, 25, 26);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE `aros_acos` (
  `id` int(11) NOT NULL,
  `aro_id` int(11) NOT NULL,
  `aco_id` int(11) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 3, 1, '1', '1', '1', '1'),
(3, 3, 73, '-1', '-1', '-1', '-1'),
(4, 3, 82, '-1', '-1', '-1', '-1'),
(5, 3, 41, '-1', '-1', '-1', '-1');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama`) VALUES
(1, 'T-Shirts'),
(2, 'Shirts'),
(3, 'Hoods'),
(4, 'Jackets'),
(5, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `nama_depan`, `nama_belakang`, `address`, `email`, `saldo`) VALUES
(3, 8, 'Dimas', 'Roger', 'pasir muncang legok', 'dimas@gmail.com', 100000),
(4, 9, 'Yusuf', 'Wandana', 'bohlam a-tahun', 'wanda@gmail.com', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Super Admin', '2019-08-05 16:52:09', '2019-08-05 16:52:09'),
(2, 'Member', '2019-08-06 08:01:59', '2019-08-06 08:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `total_price` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `change_money` int(11) NOT NULL,
  `saldo_terpakai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `date`, `total_price`, `paid`, `change_money`, `saldo_terpakai`) VALUES
(25, 'BR00001', '2019-08-10', 120000, 0, 0, 120000),
(26, 'BR00002', '2019-08-10', 120000, 0, 0, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `size`) VALUES
(29, 21, 15, 1, 'M'),
(30, 22, 18, 1, 'S'),
(31, 22, 18, 2, 'M'),
(32, 22, 12, 1, 'M'),
(33, 23, 13, 1, 'S'),
(34, 23, 18, 1, 'L'),
(35, 24, 17, 2, 'S'),
(36, 25, 13, 1, 'M'),
(37, 26, 13, 1, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `code_item` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `file_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `stock`, `code_item`, `date`, `file`, `file_dir`) VALUES
(12, 1, 't-shirt black', 120000, 47, 'BR00001', '0000-00-00', 't-shirt1.jpg', 'webroot\\assets\\products\\20190808\\'),
(13, 1, 't-shirt silver', 120000, 34, 'BR00002', '0000-00-00', 't-shirt2.jpg', 'webroot\\assets\\products\\20190806\\'),
(14, 2, 'shirt pinky', 250000, 50, 'BR00003', '0000-00-00', 'shirt1.jpg', 'webroot\\assets\\products\\20190806\\'),
(15, 2, 'shirt yellow claw', 250000, 49, 'BR00004', '0000-00-00', 'shirt2.jpg', 'webroot\\assets\\products\\20190806\\'),
(16, 3, 'hood blue sky', 250000, 44, 'BR00005', '0000-00-00', 'hood1.jpg', 'webroot\\assets\\products\\20190806\\'),
(17, 3, 'hood black mamba', 250000, 44, 'BR00006', '0000-00-00', 'hood2.jpg', 'webroot\\assets\\products\\20190806\\'),
(18, 4, 'jacket blue navy', 400000, 47, 'BR00007', '0000-00-00', 'jacket1.jpg', 'webroot\\assets\\products\\20190806\\'),
(19, 4, 'jacket army', 400000, 49, 'BR00008', '0000-00-00', 'jacket2.jpg', 'webroot\\assets\\products\\20190806\\'),
(20, 5, 'accessories bag red lamp', 150000, 48, 'BR00009', '0000-00-00', 'accessories1.jpg', 'webroot\\assets\\products\\20190806\\'),
(21, 5, 'accessories bag black chart', 150000, 48, 'BR00010', '0000-00-00', 'accessories2.jpg', 'webroot\\assets\\products\\20190806\\'),
(22, 4, 'jacket black clown', 420000, 47, 'BR00011', '2019-08-07', 'jacket3.jpg', 'webroot\\assets\\products\\20190807\\'),
(23, 3, 'tes', 120000, 20, 'BR00012', '2019-08-09', 'avatar.jpg', 'webroot\\assets\\products\\20190809\\'),
(24, 5, 'cobaan aj', 60000, 20, 'BR00013', '2019-08-10', 'spotify.png', 'webroot\\assets\\products\\20190810\\');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(60) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`) VALUES
(1, 'rogersovich', '$2y$10$ajy56xQjZOV/kEANLMEQmu884UWXxfmzRbeO0hmH4FTKiufZiAxne', 1, '2019-08-05 16:52:36', '2019-08-05 16:52:36'),
(8, 'rogerskuy', '$2y$10$f6Murrq2QqC4o8i93JsaBes1B9UO7SS3Auvoj5DRzSdGNFPyfcnT2', 2, '2019-08-09 14:32:41', '2019-08-09 14:32:41'),
(9, 'lavenders', '$2y$10$vn0CHc1FotTC4u56NgV7uOOMY76BwsRgmYczw/Uc3lmwoPgTBqn8m', 2, '2019-08-09 14:47:22', '2019-08-09 14:47:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl_phinxlog`
--
ALTER TABLE `acl_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aro_id` (`aro_id`,`aco_id`),
  ADD KEY `aco_id` (`aco_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
