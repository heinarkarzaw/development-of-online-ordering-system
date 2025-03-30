-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2025 at 07:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shiningworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `fullName` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `profileImage` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `parentID` int(11) DEFAULT NULL,
  `categoryName` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `parentID`, `categoryName`, `description`) VALUES
(1, 0, 'Lighting', 'Chandeliers, pendants, lamps, halo lights and more'),
(2, 0, 'Fans', 'Pedestal fans, portable fans, exhaust fans and more'),
(3, 0, 'Home appliance', 'Rice cooker, electric kettles, stoves and more'),
(4, 0, 'Cable', 'Twisted pair cables, fibre optics cable, coaxial cables and more'),
(5, 0, 'Clocks', 'Wall clocks, tabletop clocks, digital clocks and more'),
(6, 0, 'Tools', 'Screws, nails,  screwdrivers, hammer and more'),
(7, 0, 'Flashlight', 'LED flashlights, lanterns, headlamps and more'),
(8, 0, 'Other', 'Electrical sockets, multi-plugs, safeguards and more'),
(9, 1, 'Chandeliers', 'Chandeliers'),
(10, 1, 'Pendants', 'Pendants'),
(11, 1, 'Lamps', 'Lamps'),
(12, 1, 'Halo lights', 'Halo lights'),
(13, 2, 'Pedestal fans', 'Pedestal fans'),
(14, 2, 'Portable fans', 'Portable fans'),
(15, 2, 'Exhaust fans', 'Exhaust fans'),
(16, 3, 'Rice cookers', 'Rice cookers'),
(17, 3, 'Electric kettles', 'Electric kettles'),
(18, 3, 'Stoves', 'Stoves'),
(19, 4, 'Twisted pair cables', 'Twisted pair cables'),
(20, 4, 'Fibre optics cables', 'Fibre optics cables'),
(21, 4, 'Coaxial cables', 'Coaxial cables'),
(22, 5, 'Wall clocks', 'Wall clocks'),
(23, 5, 'Tabletop clocks', 'Tabletop clocks'),
(24, 5, 'Digital clocks', 'Digital clocks'),
(25, 6, 'Screws', 'Screws'),
(26, 6, 'Nails', 'Nails'),
(27, 6, 'Screwdrivers', 'Screwdrivers'),
(28, 6, 'Hammer', 'Hammer'),
(29, 7, 'LED flashlights', 'LED flashlights'),
(30, 7, 'Lanterns', 'Lanterns'),
(31, 7, 'Headlamps', 'Headlamps'),
(32, 8, 'Electrical sockets', 'Electrical sockets'),
(33, 8, 'Multi-plugs', 'Multi-plugs'),
(34, 8, 'Safeguards', 'Safeguards');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `fullName` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `township` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `orderNo` varchar(15) NOT NULL,
  `orderDate` date DEFAULT NULL,
  `customerID` int(11) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `township` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `phone` varchar(19) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `buyQty` int(11) DEFAULT NULL,
  `grandTotal` int(11) DEFAULT NULL,
  `paymentType` varchar(150) DEFAULT NULL,
  `deliveryDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(50) DEFAULT NULL,
  `productBrand` varchar(50) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `productImage1` text DEFAULT NULL,
  `productImage2` text DEFAULT NULL,
  `productImage3` text DEFAULT NULL,
  `featured` varchar(10) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `productBrand`, `categoryID`, `stock`, `price`, `productImage1`, `productImage2`, `productImage3`, `featured`, `description`) VALUES
(1, 'Modern Luxury Crystal Chandelier', 'CRYSTOP', 9, 10, 170000, 'dist/img/product/_Chandelier_01.jpg', 'dist/img/product/_Chandelier_02.jpg', 'dist/img/product/_Chandelier_03.jpg', 'yes', 'Voltage: 110V - 120V,Watt: 60W Max.,Material: Crystal + Metal'),
(2, 'AMZASA Boho Pendant Light', 'AMZASA', 10, 10, 140000, 'dist/img/product/_Pendant_lights_01.jpg', 'dist/img/product/_Pendant_lights_02.jpg', 'dist/img/product/_Pendant_lights_03.jpg', 'no', 'Installation Type: ‎CeilingControl Method: ‎RemoteLight Source Type: ‎LEDFinish Type: Brush'),
(3, 'Modern Table Lamp', 'PoKat', 11, 10, 200000, 'dist/img/product/_Lamp_01.jpg', 'dist/img/product/_Lamp_02.jpg', 'dist/img/product/_Lamp_03.jpg', 'no', 'Color: Not Touch,  Light Source Type: Up/Down Light, \r\n Material: Ceramic'),
(4, 'LED spinning halo lights', 'Opel', 12, 1, 30000, 'dist/img/product/_Halo_01.jpg', 'dist/img/product/_Halo_02.jpg', 'dist/img/product/_Halo_03.jpg', 'no', 'The light color is keeping changing all the time.Low power and high efficiency led lamp beads, greatly extending the service life.'),
(5, 'Amazon Standing Pedestal ', 'Amazon', 13, 10, 150000, 'dist/img/product/_Pedestal_01.jpg', 'dist/img/product/_Pedestal_02.jpg', 'dist/img/product/_Pedestal_03.jpg', 'no', 'Product Dimensions:	17.72 x 15.75 x 53.15 inches,\r\nItem Weight:	11.86 pounds,\r\nManufacturer:	Amazon Basics,\r\nASIN:	B07BNK6T5Q'),
(6, 'AICase Portable Fan', 'AICase', 14, -1, 40000, 'dist/img/product/_Portable_fans_01.jpg', 'dist/img/product/_Portable_fans_02.jpg', 'dist/img/product/_Portable_fans_03.jpg', 'yes', 'Brand:	AICase,\r\nColor:	White,\r\nElectric fan design:	Floor Fan,\r\nPower Source:	Battery Powered'),
(7, 'Exhaust Fan , 12W', 'HUGOOME', 15, 2, 60000, 'dist/img/product/_Exhaust_fan_01.jpg', 'dist/img/product/_Exhaust_fan_02.jpg', 'dist/img/product/_Exhaust_fan_03.jpg', 'no', 'Brand:	HUGOOME,\r\nElectric fan design:	Exhaust Fan,\r\nPower Source:	Corded Electric,\r\nRoom Type:	Kitchen, Bathroom, Living Room,\r\nSpecial Feature:	Waterproof,'),
(8, 'Aroma Housewares Rice Cooker', 'Aroma Housewares', 16, 7, 50000, 'dist/img/product/_Rice_cooker_01.jpg', 'dist/img/product/_Rice_cooker_02.jpg', 'dist/img/product/_Rice_cooker_03.jpg', 'yes', 'Brand:	Aroma Housewares,\r\nColor:	White,\r\nMaterial:	Aluminum,\r\nProduct Dimensions:	8.13\"D x 8.9\"W x 8\"H'),
(9, 'COSORI Electric Kettle', 'COSORI', 17, 3, 70000, 'dist/img/product/_Electric_kettle_01.jpg', 'dist/img/product/_Electric_kettle_02.jpg', 'dist/img/product/_Electric_kettle_03.jpg', 'yes', 'Brand:	COSORI,\r\nCapacity:	1.5 Liters,\r\nMaterial:	Stainless Steel,\r\nColor:	Black Stainless Steel'),
(10, 'Ovente Electric Stove', 'Ovente ', 18, 1, 80000, 'dist/img/product/_Stove_01.jpg', 'dist/img/product/_Stove_02.jpg', 'dist/img/product/_Stove_03.jpg', 'no', ' \r\nColor	Silver Double\r\nMaterial:	Stainless Steel, Ceramic Glass,\r\nSpecial Feature:	Adjustable Temperature,\r\nBrand:	OVENTE,\r\nHeating Elements:2'),
(11, 'Cat6A Plenum (CMP), 1000ft', 'BNCables', 19, 10, 800000, 'dist/img/product/_Twisted_pair_01.jpg', 'dist/img/product/_Twisted_pair_02.jpg', 'dist/img/product/_Twisted_pair_03.jpg', 'no', 'Brand: BNCables\r\nConnector Type:	RJ45\r\nCable Type:	Ethernet\r\nCompatible Devices:	Laptop, Router, Personal Computer, Printer'),
(12, 'Jeirdus 100ft', 'Jeirdus ', 20, 2, 50000, 'dist/img/product/_Fibre_optic_01.jpg', 'dist/img/product/_Fibre_optic_02.jpg', 'dist/img/product/_Fibre_optic_03.jpg', 'no', 'Brand:	Jeirdus,\r\nConnector Type:	RJ45,\r\nCable Type:	Fiber Optic,\r\nCompatible Devices:	Personal Computer,\r\nColor:	LC-LC'),
(13, '6FT G-PLUG RG6 Coaxial Cable', 'G-PLUG', 21, 1, 20000, 'dist/img/product/_Coaxial_01.jpg', 'dist/img/product/_Coaxial_02.jpg', 'dist/img/product/_Coaxial_03.jpg', 'no', 'Brand:	G-PLUG,\r\nConnector Type:	Coaxial,\r\nCable Type:	Coaxial,\r\nCompatible Devices:	Direct TV Boxes, Router, Cable Box, Off-Air Antennas, Satellite Receivers, TV, TV Box, Gigabit Internet, Modem, TelevisionDirect TV Boxes, Router,Internet, Modem, Television'),
(14, 'Jomparis Wall Clock', 'Jomparis', 22, 6, 30000, 'dist/img/product/_Wall_clock_01.jpg', 'dist/img/product/_Wall_clock_02.jpg', 'dist/img/product/_Wall_clock_03.jpg', 'yes', 'Brand:	Jomparis,\r\nColor:	Gray,\r\nDisplay Type:	Analog,\r\nStyle:	Modern'),
(15, 'Vintage Black Table Clock', 'MACVAD', 23, 2, 40000, 'dist/img/product/_Table_top_clock_01.jpg', 'dist/img/product/_Table_top_clock_02.jpg', 'dist/img/product/_Table_top_clock_03.jpg', 'no', 'Brand:	MACVAD,\r\nColor:	Black,\r\nDisplay Type:	Analog,\r\nStyle:	Country Rustic'),
(16, 'Digital Clock ', 'SZELAM', 24, 1, 30000, 'dist/img/product/_Digital_clock_01.jpg', 'dist/img/product/_Digital_clock_02.jpg', 'dist/img/product/_Digital_clock_03.jpg', 'no', 'Brand:	SZELAM,\r\nColor:	White,\r\nDisplay Type:	Digital,\r\nStyle:	Modern'),
(17, '410 Stainless Steel Screws', 'Unknown', 25, 3, 40000, 'dist/img/product/_Screws_01.jpg', 'dist/img/product/_Screws_02.jpg', 'dist/img/product/_Screws_03.jpg', 'no', 'Size:	One Size,\r\nColor:	Black Oxide,\r\nMaterial:	Black Oxide Coating, Stainless Steel 410'),
(18, 'Amazon Screwdriver', 'Amazon Brand', 27, 10, 15000, 'dist/img/product/_Screwdriver_01.jpg', 'dist/img/product/_Screwdriver_02.jpg', 'dist/img/product/_Screwdriver_03.jpg', 'no', 'Manufacturer: ‎Amazon,\r\nPart Number:	‎ABL040,\r\nItem Weight:	‎13 ounces,\r\nProduct Dimensions:	‎7.6 x 4.32 x 1.1 inches'),
(19, 'Mr. Pen- Nail Assortment Kit', 'Mr. Pen', 26, 3, 10000, 'dist/img/product/_Nails_01.jpg', 'dist/img/product/_Nails_02.jpg', 'dist/img/product/_Nails_03.jpg', 'no', 'Brand Name:	Mr. Pen,\r\nEan:	0810053330579,\r\nExterior Finish:	Zinc,\r\nMaterial:	Alloy Steel'),
(20, 'STARWORK 20 oz Hammer ', 'STARWORK', 28, 3, 25000, 'dist/img/product/_Hammer_01.jpg', 'dist/img/product/_Hammer_02.jpg', 'dist/img/product/_Hammer_03.jpg', 'no', 'Brand:	STARWORK,\r\nHandle Material:	Alloy Steel,\r\nColor:	Black'),
(21, 'GearLight LED Flashlight', 'GearLight ', 29, 3, 25000, 'dist/img/product/_LED_flashlight_01.jpg', 'dist/img/product/_LED_flashlight_02.jpg', 'dist/img/product/_LED_flashlight_03.jpg', 'no', 'Color:	Black,\r\nPower Source:	Battery Powered,\r\nLight Source Type:	LED,\r\nMaterial:	Aluminum'),
(22, 'ENERGIZER LED Headlamp PRO', 'ENERGIZER ', 31, 2, 20000, 'dist/img/product/_Headlamp_01.jpg', 'dist/img/product/_Headlamp_02.jpg', 'dist/img/product/_Headlamp_03.jpg', 'no', 'Color:	Rust Red,\r\nPower Source:	Battery Powered,\r\nLight Source Type:	LED,\r\nMaterial:	Plastic'),
(23, 'LED Camping Lantern', 'Lighting EVER', 30, 10, 30000, 'dist/img/product/_Lantern_01.jpg', 'dist/img/product/_Lantern_02.jpg', 'dist/img/product/_Lantern_03.jpg', 'no', 'Color:	Black and Green,\r\nPower Source:	Battery Powered,\r\nMaterial:	Plastic'),
(24, 'ENERLITES Duplex Receptacle Outlets', 'ENERLITES ', 32, 10, 8000, 'dist/img/product/_Electrical_socket_01.jpg', 'dist/img/product/_Electrical_socket_02.jpg', 'dist/img/product/_Electrical_socket_03.jpg', 'no', 'Color: White,\r\nCompatible Devices:	All,\r\nMaterial:	Metal, Polycarbonate'),
(25, 'Surge Protector Power Strip', 'Addtam', 33, 9, 30000, 'dist/img/product/_Multi-plug_01.jpg', 'dist/img/product/_Multi-plug_02.jpg', 'dist/img/product/_Multi-plug_03.jpg', 'no', 'Color:	White,\r\nTotal Power Outlets:	12,\r\nVoltage:	125 Volts,\r\nAmperage:	15 Amps'),
(26, 'Air conditioner safeguard', 'DERNFU', 34, 10, 30000, 'dist/img/product/_Safeguard_01.jpg', 'dist/img/product/_Safeguard_02.jpg', 'dist/img/product/_Safeguard_03.jpg', 'no', 'Current Type: AC,\r\nProduct Name: Air conditioner safeguard,\r\nProtection: 175-240');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlistID` int(11) NOT NULL,
  `customerID` int(11) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlistID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `customerID` (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
