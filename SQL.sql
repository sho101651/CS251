-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2019 at 05:57 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs251`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `ingredient_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`name`, `type`, `ingredient_id`) VALUES
('lamb', 'meat', 1),
('bread', ' flour', 3),
('tomato', 'vegetable', 4),
('onion', 'vegetable', 5),
('cucumber', 'vegetable', 6),
('cabbage', 'vegetable', 7),
('mayonnaise', 'sauce', 8),
('fish', 'seafood', 9),
('lettuce', 'vegetable', 10),
('mustard', 'sauce', 11),
('ketchup', 'sauce', 12),
('cheese', 'add-on', 13),
('Champignon', 'vegetable', 14),
('bacon', 'meat', 15),
('chicken', 'chicken', 16),
('beef', 'meat', 17);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(10) NOT NULL,
  `Total_cost` float DEFAULT NULL,
  `Quantity` int(5) DEFAULT NULL,
  `UserID` int(8) DEFAULT NULL,
  `ProductID` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `Total_cost`, `Quantity`, `UserID`, `ProductID`) VALUES
(2, 790, 10, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_ID` int(8) NOT NULL,
  `Card_number` varchar(20) NOT NULL,
  `CCV` varchar(3) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Bank` varchar(20) NOT NULL,
  `UserID` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_ID`, `Card_number`, `CCV`, `Status`, `Bank`, `UserID`) VALUES
(11, 'ertert', 'ere', 'TRUE', 'asdfghjkl', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(8) NOT NULL,
  `Product_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Image_name` varchar(500) NOT NULL,
  `Price` float DEFAULT NULL,
  `Description` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ingredient` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_name`, `Image_name`, `Price`, `Description`, `ingredient`) VALUES
(1, 'วอปเปอร์', 'image/menu1.png', 59, 'เมนูอร่อยขวัญทั่วโลก ด้วยเนื้อคุณภาพนำเข้า ที่แสนจะเขากันกับผักสดใหม่ มะเขือเทศ หอมใหญ่ และแตงกวาดองเพิ่มความอร่อยด้วยอเมริกันชีสเต็มเเผ่น ชุ่มฉ่ำด้วยมายองเนสบนขนมปังงาชิ้นนุ่ม \r\n\r\n', 'lamb'),
(2, 'ดับเบิ้ล มัชรูม สวิส\r\n\r\n', 'image/menu2.png', 69, 'รสชาติล้ำลึกเฉพาะตัวของเนื้อคุณภาพนำเข้า 100% จากประเทศออสเตรเลียชิ้นโต ย่างบนเปลวไฟ ร้อนๆ จนหอมกรุ่น เข้มข้นเต็มรสชาติด้วยสวิสชีสและเบคอน ที่ชุ่มฉ่ำละมุนลิ้น ราดด้วยซอสเห็ดแชมปิญองสูตรพิเศษ พร้อมเบอร์เกอร์งาอบสดใหม่ในไซส์ใหญ่เต็มคำ', 'beef'),
(5, 'ไก่กรอบ เบอร์เกอร์\r\n', 'image/menu3.JPG', 59, 'เบอเกอร์ไก่กรอบ รสจัดจ้าน พร้อมขนมปังงามายองเนส ผักกาดขาวสดใหม่', 'chicken'),
(7, 'เบอเกอร์ ปลาทอด', 'image/menu4.png', 59, 'เบอเกอร์ปลาทอดกรอบ รสจัดจ้าน พร้อมขนมปังงา มายองเนส มะเขือเทศ หัวหอมใหญ่ และผักกาดแก้วกรุบกรอบ', 'fish'),
(9, 'ดับเบิ้ล ชีส เบอร์เกอร์', 'image/menu5.png', 79, 'ความอร่อยสุดคลาสสิกในรสชาติแบบดั้งเดิม ที่เพิ่มเติมคือขนาด ด้วยความหนานุ่มของเนื้อคุณภาพนำเข้า 100% จากประเทศออสเตรเลีย ย่างบนเปลวไฟร้อนๆ สูตรซิกเนเจอร์ และชีสเยิ้มๆ เพิ่มรสเข้มข้นถึง 2 ชั้น ปิดท้ายความอร่อยด้วยความชุ่มฉ่ำของแตงกวาดอง มัสตาร์ดและซอสมะเขือเทศ', 'beef'),
(10, 'เอ็กซ์ตร้าชิกเก้น ชีสเบอร์\r\n', 'image/menu6.png', 79, 'อร่อยมากขึ้นกับเอ็กซ์ตร้า ไก่ ชีส ขนมปังงาชิ้นนุ่มที่ประกบไส้แน่นๆ ทั้งเนื้อไก่ ผักสด และชีส ราดตามด้วยมายองเนสชุ่มฉ่ำ เต็มรส', 'chicken');

-- --------------------------------------------------------

--
-- Table structure for table `user_`
--

CREATE TABLE `user_` (
  `User_ID` int(8) NOT NULL,
  `Lastname` varchar(25) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `TelNo` varchar(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Road` varchar(25) NOT NULL,
  `Zipcode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_`
--

INSERT INTO `user_` (`User_ID`, `Lastname`, `FirstName`, `TelNo`, `Email`, `Password`, `City`, `Road`, `Zipcode`) VALUES
(1, '23t23t', '13tf3', 't3wtwe', 'a', '25f9e794323b453885f5181f1b624d0b', 't23twed', 'wefsd', '3rfwedef'),
(6, 'qqqq', 'ddd', 'eqweqw', 'sfkoekfpof@hotmail.c', '25f9e794323b453885f5181f1b624d0b', 'weqwe', 'dasd', 'eqweqw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredient_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `user_`
--
ALTER TABLE `user_`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredient_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_`
--
ALTER TABLE `user_`
  MODIFY `User_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user_` (`User_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`Product_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
