-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2023 at 06:14 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admn`
--

CREATE TABLE `admn` (
  `admin_id` varchar(8) NOT NULL DEFAULT '0',
  `admin_name` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_contact` varchar(11) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admn`
--

INSERT INTO `admn` (`admin_id`, `admin_name`, `admin_password`, `admin_contact`, `admin_email`, `admin_status`) VALUES
('ADMN005', 'Brendan', '123', '012-1234567', ' brendanjzhong@gmail.com', ' Super Admin'),
('ADMN006', 'admin1', 'admin1', '012-7894561', ' admin101@outlook.com', ' Super Admin'),
('ADMN007', '3123', '3213', '321', '321', 'Super Admin');

--
-- Triggers `admn`
--
DELIMITER $$
CREATE TRIGGER `tg_table3_insert` BEFORE INSERT ON `admn` FOR EACH ROW BEGIN
  INSERT INTO table3_seq VALUES (NULL);
  SET NEW.admin_id = CONCAT('ADMN', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` varchar(7) NOT NULL DEFAULT '0',
  `cust_name` varchar(100) NOT NULL,
  `cust_add` varchar(100) NOT NULL,
  `cust_contact` varchar(11) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_add`, `cust_contact`, `cust_email`, `cust_status`) VALUES
('CUST005', 'Crazy Kangaroo', 'Capital Place, Level 20 & 21, Jalan Jenderal Gatot Subroto Kav 18 Jakarta Selatan 12710', '012-4561237', ' admin123@outlook.com', ' Deactive'),
('CUST006', 'ChinaManMan', 'Ali Center, No.3331, South Keyuan Road, Nanshan District, Shenzhen, China', '019-9999999', ' admin@gmail.com', ' Deactive'),
('CUST007', 'Philipinies Lazada ', 'Net Park Building, Level 23, 5th Avenue, Bonifacio Global City, Taguig City 1634, Metro Manila, Phil', '011-1111111', ' admin123@outlook.com', ' Active'),
('CUST008', 'Lazada Vietnam', 'Saigon Center Building, Tower 2, Level 19 67 Le Loi Street, Ben Nghe Ward, District 1, Ho Chi Minh C', '015-5555555', ' admin123@outlook.com', ' Deactive'),
('CUST009', 'Lazada Thailand', '689 Bhiraj Tower Unit No. 209, Level 29 Sukhumvit Road Klongton Nue, Wattana Bangkok 10110', '012-3335566', ' admin123@outlook.com', ' Deactive'),
('CUST010', 'Lazada Singapore', 'Lazada One 51 Bras Basah Rd #01-21 Singapore 189554', '019-9997777', ' admin1234@outlook.com', ' Deactive'),
('CUST011', 'Shopee Malaysia', 'Level 20, Menara Worldwide 198 Jalan Bukit Bintang 55100 Kuala Lumpur', '011-1111111', ' admin@gmail.com', ' Deactive'),
('CUST012', 'IOI City Mall', 'Management Office, Unit T2-3A-3 & Unit T2-3A-3A level 3A IOI City Tower Two Lebuh IRC, Ioi Resort, 6', '012-1234567', ' admin@gmail.com', ' Deactive'),
('CUST013', 'City Square Mall', '180 Kitchener Rd, Singapore 208539', '012-7894561', ' admin@citymall.com', ' Deactive'),
('CUST014', 'Langkawi Skybridge Cable Car', 'Jalan Telaga Tujuh, 07000 Langkawi, Kedah', '012-8889999', ' lankawi@skybridge.com', ' Deactive'),
('CUST017', 'MMU Cyberjaya', 'Persiaran Multimedia, 63100 Cyberjaya, Selangor', '012-4567894', ' admin123@mmu.edu.my', ' Active');

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `tg_customer_insert` BEFORE INSERT ON `customer` FOR EACH ROW BEGIN
  INSERT INTO table1_seq VALUES (NULL);
  SET NEW.cust_id = CONCAT('CUST', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` varchar(7) NOT NULL DEFAULT '0',
  `prod_image` varchar(450) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_buy_price` double(10,2) NOT NULL,
  `prod_sale_price` double(10,2) NOT NULL,
  `prod_in_date` varchar(100) NOT NULL,
  `supp_id` varchar(7) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_image`, `prod_name`, `prod_desc`, `prod_qty`, `prod_buy_price`, `prod_sale_price`, `prod_in_date`, `supp_id`) VALUES
('22', 'ST500DM009_03.png', 'Hard Disk Drive', 'Used for storing the data inside the PC', 10, 210.00, 120.00, '2020-02-15', ''),
('25', 'F0521541-01.jpg', 'Screws', 'Used to hold objects together and to position objects same with bolts', 0, 86.00, 77.00, '2021-06-25', ''),
('26', 'download (1).jpg', 'Cooling Pad', 'Used for cooling your computer when using it to do work', 0, 62.00, 55.00, '2022-02-28', ''),
('27', 'c696cf835a0a3087f7dcdbd95efe5da0.jpg', 'Door bell switch', 'Used when a visitor presses a button the bell rings inside the building', 0, 98.00, 85.00, '2020-08-15', ''),
('28', '1405427091813.jpeg', 'Sinks', 'Used in bathroom inside the bedroom or living room ', 0, 96.00, 85.00, '2022-02-21', ''),
('31', 'Category_Template.jpg', 'kitchen sinks', 'Used for watching dishes and foods', 150, 98.00, 85.00, '2020-04-18', ''),
('32', 'Blue_morpho_butterfly.jpg', 'LazadaInfeon', 'test10101010101', 10, 15.00, 13.00, '2022-02-10', ''),
('36', '222.PNG', 'lolololj', 'ewqeqw', 0, 32.00, 32.00, '2022-02-10', ''),
('37', 'envi.jfif', 'EnjoyYour View', '3123', 113, 323.00, 323.00, '2022-02-14', ''),
('38', 'New MyKad.jpg', 'Sinks', 'XXXX', 2, 2.00, 2.00, '2022-02-23', ''),
('39', 'New Driving Lisence.jpg', 'EnjoyYour View', 'xxx', 2, 2.00, 2.00, '2022-02-17', ''),
('40', 'Old Mykad.jpg', 'Jungle Warrior', 'xxx', 1, 1.00, 1.00, '2022-02-24', ''),
('PRD003', 'Old Driving License.jpg', 'Trainning ', 'XXX', 3, 3.00, 3.00, '2022-02-17', ''),
('PRD004', '1.png', 'ScrewDriver Version ', 'XXXX', 2, 2.00, 2.00, '2022-02-17', ''),
('PRD005', '2.JPG', 'ScrewDriver Version Two', 'XXX', 10, 10.00, 10.00, '2022-02-17', ''),
('PRD006', '3.jfif', 'ScrewDriver Version Three', 'BBBB', 17, 20.00, 25.00, '2022-02-17', 'SUPP006'),
('PRD007', '6.jpg', 'TorchLight Version One', 'XXX', 0, 20.00, 25.00, '2022-02-18', 'SUPP005'),
('PRD008', 'driving_test2.jfif', 'EnjoyYour', 'JJJ', 12, 12.00, 12.00, '2022-02-19', 'SUPP004'),
('PRD010', 'W1 E6.jpg', 'XXXFFFF', 'XXXXXXXX', 0, 3.00, 3.00, '2022-02-21', 'SUPP002'),
('PRD011', '9789463982856.jpg', 'Rich Dad and Poor Dad', 'XXXXXXXX', 0, 50.00, 70.00, '2022-02-22', 'SUPP006'),
('PRD020', 'WhatsApp Image 2022-01-15 at 6.54.52 PM.jpeg', 'Test three', 'xxxx', 120, 120.00, 140.00, '2022-03-06', 'SUPP006');

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `tg_product_insert` BEFORE INSERT ON `product` FOR EACH ROW BEGIN
  INSERT INTO tableprod_seq VALUES (NULL);
  SET NEW.prod_id = CONCAT('PRD', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sale_id` varchar(7) NOT NULL DEFAULT '0',
  `sale_prod_name` varchar(100) NOT NULL,
  `sale_price` double(10,2) NOT NULL,
  `sale_qty_sold` int(11) NOT NULL,
  `total_price` double(10,2) DEFAULT NULL,
  `sale_date` varchar(100) NOT NULL,
  `prod_id` varchar(7) DEFAULT '0',
  `cust_id` varchar(7) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `sale_prod_name`, `sale_price`, `sale_qty_sold`, `total_price`, `sale_date`, `prod_id`, `cust_id`) VALUES
('SALE012', 'Hard', 120.00, 100, 12000.00, '2022-01-21', '22 ', 'CUST006'),
('SALE013', 'Hard Disk Drive', 120.00, 100, 12000.00, '2022-01-20', '22 ', 'CUST013'),
('SALE014', 'Hard Disk Drive', 120.00, 100, 12000.00, '2022-01-21', '22 ', 'CUST006'),
('SALE015', 'Hard Disk Drive', 120.00, 100, 12000.00, '2022-01-21', '22 ', 'CUST005'),
('SALE016', 'Hard Disk Drive', 120.00, 100, 12000.00, '2022-02-20', '22 ', 'CUST006'),
('SALE017', 'Hard Disk Drive', 120.00, 100, 12000.00, '2022-02-21', '22 ', 'CUST005'),
('SALE018', 'Hard Disk Drive', 120.00, 100, 12000.00, '2022-03-04', '22 ', 'CUST006'),
('SALE019', 'Hard Disk Drive', 120.00, 100, 12000.00, '2022-03-04', '22 ', 'CUST005'),
('SALE020', 'Hard Disk Drive', 120.00, 100, 12000.00, '2022-02-20', '22 ', 'CUST005'),
('SALE021', 'Hard Disk Drive', 120.00, 100, 12000.00, '2022-02-21', '22 ', 'CUST005'),
('SALE022', 'Kitchen Door', 150.00, 7, 1050.00, '2022-02-20', '23 ', 'CUST005'),
('SALE023', 'Hard Disk Drive', 120.00, 20, 2400.00, '2022-02-20', '22 ', 'CUST005'),
('SALE024', 'lolololj', 32.00, 32, 1024.00, '2022-02-20', '36 ', 'CUST005'),
('SALE025', 'Hard Disk Drive', 120.00, 2, 240.00, '2022-02-20', '22 ', 'CUST006'),
('SALE026', 'XXXFFFF', 3.00, 3, 9.00, '2022-02-22', 'PRD010 ', 'CUST007'),
('SALE027', 'Hard Disk Drive', 120.00, 12, 1440.00, '2022-03-04', '22 ', 'CUST012'),
('SALE028', 'Hard Disk Drive', 120.00, 1, 120.00, '2022-02-23', '22 ', 'CUST012'),
('SALE029', 'Kitchen Door', 150.00, 28, 4200.00, '2022-03-04', '23 ', 'CUST005'),
('SALE030', 'Rich Dad and Poor Dad', 70.00, 100, 7000.00, '2022-03-04', 'PRD011 ', 'CUST006'),
('SALE031', 'Screws', 77.00, 150, 11550.00, '2022-03-04', '25 ', 'CUST005'),
('SALE032', 'Rich Dad and Poor Dad', 70.00, 50, 3500.00, '2022-03-04', 'PRD011 ', 'CUST007'),
('SALE035', 'EnjoyYour View', 323.00, 100, 32300.00, '2022-02-28', '37 ', 'CUST005'),
('SALE036', 'King Kong', 23.32, 10, 233.20, '2022-02-28', 'PRD013 ', 'CUST006'),
('SALE037', 'Sinks', 85.00, 100, 8500.00, '2022-03-03', '28 ', 'CUST005'),
('SALE038', 'Pokemon Go', 500.60, 40, 20024.00, '2022-03-03', 'PRD014 ', 'CUST007'),
('SALE039', 'Hard Disk Drive', 120.00, 10, 1200.00, '2022-03-04', '22 ', 'CUST005'),
('SALE040', 'Door bell switch', 85.00, 15, 1275.00, '2022-03-11', '27 ', 'CUST005'),
('SALE041', 'Door bell switch', 85.00, 5, 425.00, '2022-03-04', '27 ', 'CUST005'),
('SALE042', 'Cooling Pad', 55.00, 150, 8250.00, '2022-03-04', '26 ', 'CUST007'),
('SALE043', 'TorchLight Version One', 25.00, 100, 2500.00, '2022-03-04', 'PRD007 ', 'CUST005'),
('SALE044', 'Sinks', 85.00, 50, 4250.00, '2022-03-06', '28 ', 'CUST007');

--
-- Triggers `sale`
--
DELIMITER $$
CREATE TRIGGER `tg_sale_insert` BEFORE INSERT ON `sale` FOR EACH ROW BEGIN
  INSERT INTO tablesales_seq VALUES (NULL);
  SET NEW.sale_id = CONCAT('SALE', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supp_id` varchar(7) NOT NULL DEFAULT '0',
  `supp_name` varchar(100) NOT NULL,
  `supp_add` varchar(100) NOT NULL,
  `supp_contact` varchar(11) NOT NULL,
  `supp_email` varchar(100) NOT NULL,
  `supp_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supp_id`, `supp_name`, `supp_add`, `supp_contact`, `supp_email`, `supp_status`) VALUES
('SUPP002', 'Lazada Thailand', '689 Bhiraj Tower Unit No. 209, Level 29 Sukhumvit Road Klongton Nue, Wattana Bangkok 10110', '011-1234567', ' admin123@outlook.com', ' Deactive'),
('SUPP004', 'Lazada James Bond', 'Level 20, Menara Worldwide 198 Jalan Bukit Bintang 55100 Kuala Lumpur', '011-1234567', ' admin123@outlook.com', ' Deactive'),
('SUPP005', 'Infineon Technologies (M). Sdn Bhd', 'Block 7a, Lot 6331, Batu Berendam FTZ Melaka Tengah Melaka ', '011-1234567', ' admin123@outlook.com', ' Active'),
('SUPP006', 'POPULAR', '8 Jalan 7/118B, Desa Tun Razak, 56000 Kuala Lumpur, Malaysia', '011-1234567', ' admin@gmail.com', ' Deactive');

--
-- Triggers `supplier`
--
DELIMITER $$
CREATE TRIGGER `tg_supplier_insert` BEFORE INSERT ON `supplier` FOR EACH ROW BEGIN
  INSERT INTO table2_seq VALUES (NULL);
  SET NEW.supp_id = CONCAT('SUPP', LPAD(LAST_INSERT_ID(), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `table1_seq`
--

CREATE TABLE `table1_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table1_seq`
--

INSERT INTO `table1_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17);

-- --------------------------------------------------------

--
-- Table structure for table `table2_seq`
--

CREATE TABLE `table2_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table2_seq`
--

INSERT INTO `table2_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8);

-- --------------------------------------------------------

--
-- Table structure for table `table3_seq`
--

CREATE TABLE `table3_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table3_seq`
--

INSERT INTO `table3_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9);

-- --------------------------------------------------------

--
-- Table structure for table `tableprod_seq`
--

CREATE TABLE `tableprod_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tableprod_seq`
--

INSERT INTO `tableprod_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20);

-- --------------------------------------------------------

--
-- Table structure for table `tablesales_seq`
--

CREATE TABLE `tablesales_seq` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tablesales_seq`
--

INSERT INTO `tablesales_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_contact` int(11) NOT NULL,
  `user_add` varchar(100) NOT NULL,
  `user_reg_date` varchar(100) NOT NULL,
  `user_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admn`
--
ALTER TABLE `admn`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supp_id`);

--
-- Indexes for table `table1_seq`
--
ALTER TABLE `table1_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table2_seq`
--
ALTER TABLE `table2_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table3_seq`
--
ALTER TABLE `table3_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tableprod_seq`
--
ALTER TABLE `tableprod_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablesales_seq`
--
ALTER TABLE `tablesales_seq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table1_seq`
--
ALTER TABLE `table1_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `table2_seq`
--
ALTER TABLE `table2_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table3_seq`
--
ALTER TABLE `table3_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tableprod_seq`
--
ALTER TABLE `tableprod_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tablesales_seq`
--
ALTER TABLE `tablesales_seq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
