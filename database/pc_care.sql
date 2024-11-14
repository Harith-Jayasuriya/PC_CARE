-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 07:53 PM
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
-- Database: `pc_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `cancellation`
--

CREATE TABLE `cancellation` (
  `cancel_id` int(11) NOT NULL,
  `cancel_date` datetime DEFAULT NULL,
  `cancel_reason` text DEFAULT NULL,
  `fk_order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_item_qty` int(11) DEFAULT NULL,
  `fk_item_id` int(11) DEFAULT NULL,
  `fk_cust_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_item_qty`, `fk_item_id`, `fk_cust_id`) VALUES
(3512, 1, 2523, 3005),
(3514, 1, 2516, 3005),
(3515, 1, 2529, 3005);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(2005, 'Laptops'),
(2006, 'Desktop Computers'),
(2007, 'Gaming Chairs'),
(2008, 'Memory(RAM)'),
(2009, 'Keyboard & Mice'),
(2010, 'MotherBoard'),
(2011, 'Graphic Cards'),
(2012, 'Storage'),
(2013, 'Power Supply'),
(2014, 'Accessories'),
(2016, 'Check One');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_fname` varchar(50) DEFAULT NULL,
  `cust_lname` varchar(50) DEFAULT NULL,
  `cust_username` varchar(50) DEFAULT NULL,
  `cust_pwd` varchar(50) DEFAULT NULL,
  `cust_email` varchar(100) DEFAULT NULL,
  `cust_is_active` tinyint(1) DEFAULT 1,
  `cust_phone` varchar(15) DEFAULT NULL,
  `cust_add_line1` varchar(255) DEFAULT NULL,
  `cust_add_line2` varchar(255) DEFAULT NULL,
  `cust_add_line3` varchar(255) DEFAULT NULL,
  `cust_add_line4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_fname`, `cust_lname`, `cust_username`, `cust_pwd`, `cust_email`, `cust_is_active`, `cust_phone`, `cust_add_line1`, `cust_add_line2`, `cust_add_line3`, `cust_add_line4`) VALUES
(3004, 'Harith', 'Jayasuriya', 'Rocky@gmail.com', 'Rocky@1996', 'harithjayasuriya1028@gmail.com', 1, '0783415051', 'Madahena Hirana', '202/A,2', '', 'panadura'),
(3005, 'Kasun', 'chamara', 'Kasun', 'Kasun123', 'kasun@gmail.com', 1, '0721342345', 'No 23,2', 'Polgasowita', 'Horana', 'Horana');

-- --------------------------------------------------------

--
-- Table structure for table `customer_notification`
--

CREATE TABLE `customer_notification` (
  `cust_notifi_id` int(11) NOT NULL,
  `cust_notifi_is_read` tinyint(1) DEFAULT 0,
  `fk_notifi_id` int(11) DEFAULT NULL,
  `fk_cust_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliver_area`
--

CREATE TABLE `deliver_area` (
  `deliver_area_id` int(11) NOT NULL,
  `deliver_area_name` varchar(50) DEFAULT NULL,
  `fk_staff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_date` datetime DEFAULT NULL,
  `feedback_msg` text DEFAULT NULL,
  `feedback_status` varchar(20) DEFAULT NULL,
  `fk_staff_id` int(11) DEFAULT NULL,
  `fk_item_id` int(11) DEFAULT NULL,
  `fk_cust_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiry_id` int(11) NOT NULL,
  `inquiry_date` datetime DEFAULT NULL,
  `inquiry_msg` text DEFAULT NULL,
  `inquiry_reply` text DEFAULT NULL,
  `inquiry_reply_date` datetime DEFAULT NULL,
  `fk_staff_id` int(11) DEFAULT NULL,
  `fk_cust_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `item_image1` varchar(255) DEFAULT NULL,
  `item_image2` varchar(255) DEFAULT NULL,
  `item_brand` varchar(50) DEFAULT NULL,
  `item_description` text DEFAULT NULL,
  `item_sell_price` decimal(10,2) DEFAULT NULL,
  `item_cost_price` decimal(10,2) DEFAULT NULL,
  `item_stock_qty` int(11) DEFAULT NULL,
  `item_discount` decimal(5,2) DEFAULT NULL,
  `item_date_added` datetime DEFAULT NULL,
  `fk_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_image1`, `item_image2`, `item_brand`, `item_description`, `item_sell_price`, `item_cost_price`, `item_stock_qty`, `item_discount`, `item_date_added`, `fk_category_id`) VALUES
(2512, 'RYZEN 5 BRAND NEW PC WITH 8GB RAM', 'PC1.jpg', '1746-2356-1746-20240501070213-1009-20240418080054-AURA_GC2_ELITE_Slogan.png', 'Intel', 'RYZEN 5 5600G PROCESSOR\r\n\r\nMSI B450M-A  PRO MOTHERBOARD\r\n\r\nCORSAIR VENGEANCE LPX 8GB BRAND NEW RAM\r\nLEXAR NM620 256GB M.2 2280 PCI-E x4 Gen3 NVMe\r\nWESTERN DIGITAL BLUE 500GB DESKTOP SATA HARD DISK BRAND NEW\r\nGAMDIAS AURA GP450 – 450 WATT POWER SUPPLY\r\nViper TB005B Gaming Casing WITH 3 FAN', 126300.00, 110000.00, 4, 0.00, '2024-06-15 00:03:05', 2006),
(2513, 'AMD APU A6 BRAND NEW DESKTOP', 'WhatsApp Image 2024-06-14 at 22.04.14_0a7b0e5f.jpg', '2419-20240501114842-2176-20231212090614-gallery-performance-1-ft-01.png', 'AMD', '\r\nAMD APU A6 BRAND NEW DESKTOP\r\n🔷 AMD APU A6 7480 PROCESSOR\r\n\r\n🔷 ASROCK FM2A68M MOTHER BOARD \r\n\r\n🔷 450W NORMAL POWER SUPPLY\r\n\r\n🔷 MEMORY GHOST 120GB SSD \r\n\r\n🔷  DDR3 4GB RAM\r\n\r\n🔷 CPU FAN EVESKY\r\n\r\n🔷 F22R BRAND NEW CASIN', 48000.00, 35000.00, 5, 0.00, '2024-06-15 16:13:22', 2006),
(2516, 'ASUS CREATOR, (RTX 3050/6GB) / OLED -16GB/ Core I7 13TH GEN|NEW LAPTOP', 'WhatsApp Image 2024-06-14 at 22.23.38_be89dfa1.jpg', '2149-20240305064826-download.png', 'ASUS', '⭕ BRAND NEW LAPTOP\r\n\r\n \r\n\r\n⭕ BRAND – ASUS CREATOR – Q530VJ -I73050\r\n\r\n \r\n\r\n⭕ INTEL CORE I7 – 13620H -(13TH GEN )\r\n\r\n \r\n\r\n⭕ RAM / MEMORY -DDR5 -16GB RAM CARD\r\n\r\n \r\n\r\n⭕ SSD – 512GB M.2 NVME ( G3 )\r\n\r\n \r\n\r\n⭕ SCREEN SIZE – 15.6 OLED FULL HD IPS DISPLAY\r\n\r\n \r\n\r\n⭕ GRAPHIC – NVIDIA GEFORCE RTX -3050 6GB VGA CARD\r\n\r\n \r\n\r\n⭕ BATTERY – 3CELL 70WH\r\n\r\n \r\n\r\n⭕ COLOR – BLACK\r\n\r\n \r\n\r\n👉01 YEAR HARDWARE WARRANTY\r\n\r\n \r\n\r\n👉02 YEARS SERVICE WARRANTY\r\n', 343000.00, 325000.00, 7, 7.00, '2024-06-15 16:21:41', 2005),
(2517, 'HP (VICTUS ) RYZEN 5 / RTX 2050 4GB VGA / 512GB NVME SSD / NEW-LAPTOP', 'WhatsApp Image 2024-06-14 at 22.27.00_dabe90fd.jpg', 'WhatsApp Image 2024-06-14 at 22.27.00_57ab1082.jpg', 'AMD ', '⭕BRAND NEW LAPTOP\r\n\r\n \r\n\r\n⭕ BRAND – HP / AMD RYZEN 5\r\n\r\n \r\n\r\n⭕VICTUS RYZEN 5\r\n\r\n \r\n\r\n⭕ AMD RYZEN 5 – 7535HS\r\n\r\n \r\n\r\n⭕ RAM / MEMORY – 8GB\r\n\r\n \r\n\r\n⭕ SSD – 512GB M.2 NVME\r\n\r\n \r\n\r\n⭕ SCREEN SIZE – 15.6 FULL HD (1920 x 1080) 144Hz Display\r\n\r\n \r\n\r\n⭕ GRAPHIC – RTX- 2050 4GB VGA\r\n⭕ BACKLIT KEYBOARD\r\n\r\n \r\n\r\n⭕ HD WEBCAM\r\n\r\n \r\n\r\n⭕ WINDOWS 11\r\n\r\n \r\n\r\n01 YEAR HARDWARE WARRANTY\r\n\r\n \r\n\r\n02 YEARS SERVICE WARRANTY\r\n\r\n \r\n', 222500.00, 215000.00, 3, 2.00, '2024-06-15 21:30:21', 2005),
(2518, 'GIGABYTE H410 MOTHERBOARD', 'WhatsApp Image 2024-06-14 at 23.27.09_cfe27ffb.jpg', 'WhatsApp Image 2024-06-14 at 23.27.10_bbc546cf.jpg', 'GIGABYTE', 'Intel® Ultra Durable Motherboard with Intel® GbE LAN, Anti-Sulfur Resistor, Smart Fan 5\r\nSupports 10th Gen Intel®Core™ Processors\r\nDual Channel Non-ECC Unbuffered DDR4, 2 DIMMs\r\n8-Channel HD Audio with High Quality Audio Capacitors\r\nNVMe PCIe Gen3 x4 2280 M.2 Connector\r\nIntel® GbE LAN with cFosSpeed Internet Accelerator Software\r\nSmart Fan 5 features Multiple Temperature Sensors and Hybrid Fan Headers with FAN STOP\r\nGIGABYTE APP Center, Simple and Easy Use\r\nAnti-Sulfur Resistors Design', 27500.00, 22000.00, 5, 0.00, '2024-06-16 10:17:22', 2010),
(2519, 'CORSAIR VENGEANCE LPX 16GB (16X1) DDR4 3200MHZ C16 MEMORY', 'WhatsApp Image 2024-06-14 at 23.30.09_f4c9062b.jpg', 'WhatsApp Image 2024-06-14 at 23.30.09_5a148dfa.jpg', 'Corsair', 'CORSAIR VENGEANCE LPX 16GB (16X1) DDR4 3200MHZ C16 MEMORY\r\n»BRAND:Corsair\r\n» PART NUMBER:CMK16GX4M1E3200C16\r\n» TYPE:DDR4\r\n» SPEED:3200Mhz\r\n» MEMORY SIZE:16GB\r\n» LIGHTING:None\r\nCategory: BRANDNEW RAM\r\nDESCRIPTION :\r\n\r\nBrand	CORSAIR\r\nSeries	Vengeance LPX\r\nModel	CMK16GX4M1E3200C16\r\nCapacity	16GB\r\nType	288-Pin DDR4 SDRAM\r\nSpeed	3200MHz\r\nTested Latency	16-20-20-38\r\nVoltage	1.35V\r\nColor	Black\r\nFormat	DIMM\r\nHeatspreader	Anodized Aluminum', 14000.00, 11500.00, 10, 0.00, '2024-06-16 12:36:35', 2008),
(2520, 'ZOTAC GTX 760 2GB VGA', 'WhatsApp Image 2024-06-14 at 23.32.48_0ce6bda1.jpg', '2087-20240607153359-Untitled-1 (1).png', ' GK104', 'Graphics Processor\r\n\r\nGPU Name\r\n\r\nGK104\r\n\r\nGPU Variant\r\n\r\nGK104-225-A2\r\n\r\nArchitecture\r\n\r\nKepler\r\n\r\nFoundry\r\n\r\nTSMC\r\n\r\nProcess Size\r\n\r\n28 nm\r\n\r\nTransistors\r\n\r\n3,540 million\r\n\r\nDensity\r\n\r\n12.0M / mm²\r\n\r\nDie Size\r\n\r\n294 mm²\r\n\r\nChip Package\r\n\r\nBGA-1745\r\n\r\nGraphics Features\r\n\r\nDirectX\r\n\r\n12 (11_0)\r\n\r\nOpenGL\r\n\r\n4.6\r\n\r\nOpenCL\r\n\r\n3.0\r\n\r\nVulkan\r\n\r\n1.2.175\r\n\r\nCUDA\r\n\r\n3.0\r\n\r\nShader Model\r\n\r\n6.5 (5.1)\r\n\r\nMemory\r\n\r\nMemory Size\r\n\r\n2 GB\r\n\r\nMemory Type\r\n\r\nGDDR5\r\n\r\nMemory Bus\r\n\r\n256 bit\r\n\r\nBandwidth\r\n\r\n192.3 GB/s', 17000.00, 14000.00, 3, 5.00, '2024-06-16 13:32:01', 2011),
(2521, 'SEAGATE 1TB HARD DRIVE', 'WhatsApp Image 2024-06-14 at 23.35.44_45c5bb8e.jpg', 'images.jpeg', ' SEAGATE', 'SEAGATE 1TB HARD DRIVE\r\n3 month warraty', 6500.00, 4500.00, 2, 0.00, '2024-06-16 13:48:28', 2012),
(2522, '500W 80 PLUSE GAMIING SUPPLY', 'WhatsApp Image 2024-06-14 at 23.37.08_80190322.jpg', '500W-Used-Gaming-Power-Supply.png', 'Gigabyte', '500W 80 PLUSE GAMIING SUPPLY', 5500.00, 3000.00, 10, 0.00, '2024-06-16 15:14:02', 2013),
(2523, 'Thunder Wolf TF200 Wired USB Keyboard and Mouse Set Game Character Luminous Keyboard and Mouse', 'WhatsApp Image 2024-06-14 at 23.39.15_b0f4548d.jpg', 'images (1).jpeg', 'HP', 'Mechanical feel keyboard and mouse kit, gaming office, radio hollow character cool backlight, comfortable grip, multimedia shortcut keys\r\nFN combination shortcut function key Press the FN key + the corresponding function key F1-F12 to activate\r\nMy Home FN+F1 EmailFN+F2 SearchFN+F3 MusicFN+F4 Play/PauseFN+F5 Previous FN+F6 Next FN+F7 Volume-FN+F8 Volume+FN+F9 Mute FN+F10 My Computer FN+F11, Calculator FN+F12\r\nThe key cap is processed by hollow laser engraving process, which is durable and not easy to wear, and the characters are transparent and clear.\r\nCool lighting effect display, cool rainbow backlight effect, support 1-button on/off function, when you need it, the non-light state shows your essential beauty\r\nWaterproof gaming keyboard, the keyboard adopts front waterproof design to effectively reduce the damage of the keyboard', 2800.00, 1000.00, 9, 0.00, '2024-06-16 15:21:10', 2014),
(2524, 'CANNON 3020 PHASER WIFI MONO LASER PRINTER SKU: XEROX PHASE 3020 MONOCHROME WIFI LASER PRINTER', '6030.jpg', 'images (2).jpeg', 'Cannon', 'CANNON PHASER WIFI MONO LASER PRINTER\r\n»Model3020V_BI\r\n»Print spee dup to 20 ppm\r\n»Duty cycleUp to 15,000 images/month\r\n»Processor speed600 MHz\r\nCANNON PHASER WIFI MONO LASER PRINTER\r\nModel Configuration	\r\nModel	3020V_BI\r\nPrint speed	up to 20 ppm\r\nDuty cycle	Up to 15,000 images/month\r\nProcessor speed	600 MHz\r\nPrint memory (standard)	128 MB standard\r\nConnectivity	High-Speed USB 2.0, Wi-Fi b/g/n\r\nHigh-Speed USB 2.0, Wi-Fi b/g/n\r\nMaximum print resolution	600 x 600 dpi (up to 1200 x 1200 enhanced image quality)\r\nFirst-page-out time	printing As fast as 8.5 seconds\r\nMobile printing	Apple AirPrint, Google Cloud Print\r\nTwo-sided output	Manual', 53000.00, 42000.00, 0, 8.00, '2024-06-16 15:36:54', 2014),
(2525, 'Prolink PRO2000SFC 2KVA UPS', 'images (3).jpeg', 'images (4).jpeg', 'Prolink', 'Prolink PRO2000SFC 2KVA UPS\r\n»BRAND PROLINK\r\n»WARRANTY 2 YEAR\r\n»CAPACITY 2000VA\r\nCategory: UPS & BATTERIES\r\n\r\nProlink PRO2000SFC 2KVA UPS\r\nGENERAL\r\nCapacity	2000VA\r\nDimension (mm)	320 x 130 x 182  (D x W x H)\r\nWeight (kg)	10.6\r\nINPUT\r\nNominal Voltage	220VAC / 230VAC\r\nVoltage Range	140 – 300 VAC ± 5%\r\nNominal Frequency	50 or 60Hz (Auto sensing)\r\nOUTPUT\r\nVoltage Requlation	± 10%\r\nFrequency	50 or 60Hz ± 1Hz\r\nTransfer Time (typical)	2 – 6ms\r\nWaveform	Simulated Sinewave\r\nBATTERY\r\nNumber of Battery	12 V/10 Ah x 2\r\nRecharge Time (typical)	2-4 hours recover to 90% capacity\r\nALARM & INDICATORS\r\nLED Display	AC Mode – Green Lighting Battery Mode – Yellow Flashing every 10 seconds\r\n', 54000.00, 48000.00, 8, 2.00, '2024-06-16 15:43:37', 2014),
(2526, 'Meetion HP010 – Scalable Noise-canceling Stereo Leather Wired Gaming Headset', 'WhatsApp Image 2024-06-14 at 22.33.38_0535d34b.jpg', 'WhatsApp Image 2024-06-14 at 22.33.39_03eb18f7.jpg', 'Meetion HP010', 'Categories: HEADSET &SUBFOOWERS, HEADSET & SUBFOOWERS\r\n\r\nBrand	MEETION\r\nModel name	MT-HP010\r\nColour	Black & Red\r\nForm factor	Over Ear\r\nConnectivity technology	Wired\r\nSpecial features	Gaming headset\r\nIncluded components	Headphone,manual\r\nAge range (description)	Adult,Kid\r\nMaterial	Acrylonitrile Butadiene Styrene (ABS)\r\nHeadphone jack	3.5 mm Jack', 4000.00, 3000.00, 10, 0.00, '2024-06-16 15:47:24', 2014),
(2527, 'Monova 22″ IPS Led Monitor With Speaker', '81fTywTkcWL._AC_UF894,1000_QL80_.jpg', 'images (5).jpeg', 'Monova', 'Category: BRANDNEW MONITOR\r\nScreen Size (Inch) – 21.5″\r\nFlat / Curved – Flat\r\nAspect Ratio16:9\r\nPanel Type – IPS\r\nContrast Ratio Static 1000:1(Typ)\r\nLED Backlight Display\r\nResolution 1920X1080\r\nColor Gamut (NTSC 1976) 72%\r\nSpeakers – 2W x 2\r\nBrightness – 250cd/m\r\nResponse time – 5ms\r\nHDMI x1 , VGAx1\r\n\r\nMODEL MP215F', 31000.00, 27000.00, 2, 2.00, '2024-06-16 15:51:24', 2014),
(2528, 'AMD RYZEN 9 5950X BRAND NEW PROCESSOR', '1636027968_pdt_1.jpg', '316dgEUtLHS._SR600,315_PIWhiteStrip,BottomLeft,0,35_PIStarRatingFIVE,BottomLeft,360,-6_SR600,315_ZA7,445,290,400,400,AmazonEmberBold,12,4,0,0,5_SCLZZZZZZZ_FMpng_BG255,255,255.png', 'AMD', 'AMD RYZEN 9 5950X 16-CORE, 32-THREAD UNLOCKED DESKTOP PROCESSOR\r\n» BRAND-AMD\r\n» PART NUMBER 100-100000061QOF\r\n» CPU SOCKET TYPE AM4\r\n» PROCESSOR SERIES AMD Ryzen\r\n\r\nCategory: BRANDNEW PROCESSORS\r\n\r\n1 YEAR WARRANTY\r\n of CPU Cores	16					\r\nof Threads	32					\r\nBase Clock	3.4GHz					\r\nMax Boost Clock 	Up to 4.9GHz				\r\nTotal L2 Cache	8MB					\r\nTotal L3 Cache	64MB					\r\nPCI Express® Version	PCIe 4.0					\r\nThermal Solution (PIB)	Not included				\r\nDefault TDP / TDP	105W					\r\nMax Temps	90°C	\r\nOS Support	Windows 10 – 64-Bit Edition			\r\nRHEL x86 64-Bit				\r\nUbuntu x86 64-Bit				\r\n*Operating System (OS) support will vary by manufacturer.', 105000.00, 98000.00, 5, 3.00, '2024-06-16 16:00:04', 2014),
(2529, 'Check one item', 'images (5).jpeg', 'images (1).jpeg', 'Check one brand', 'Check Description', 21000.00, 11200.00, 1, 4.00, '2024-06-16 22:51:27', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(255) DEFAULT NULL,
  `news_content` text DEFAULT NULL,
  `news_date` datetime DEFAULT NULL,
  `fk_staff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notifi_id` int(11) NOT NULL,
  `notifi_msg` text DEFAULT NULL,
  `notifi_date` datetime DEFAULT NULL,
  `notifi_is_global` tinyint(1) DEFAULT 0,
  `fk_staff_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_item_qty` int(11) DEFAULT NULL,
  `order_item_price` decimal(10,2) DEFAULT NULL,
  `fk_item_id` int(11) DEFAULT NULL,
  `fk_order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_total` decimal(10,2) DEFAULT NULL,
  `order_status` varchar(20) DEFAULT NULL,
  `order_deliver_option` varchar(50) DEFAULT NULL,
  `order_address` varchar(255) DEFAULT NULL,
  `fk_cust_id` int(11) DEFAULT NULL,
  `fk_deliver_area_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_fname` varchar(50) DEFAULT NULL,
  `staff_lname` varchar(50) DEFAULT NULL,
  `staff_username` varchar(50) DEFAULT NULL,
  `staff_pwd` varchar(50) DEFAULT NULL,
  `staff_email` varchar(100) DEFAULT NULL,
  `staff_is_active` tinyint(1) DEFAULT 1,
  `staff_phone` varchar(15) DEFAULT NULL,
  `staff_hire_date` datetime DEFAULT NULL,
  `staff_nic` varchar(15) DEFAULT NULL,
  `staff_add_line1` varchar(255) DEFAULT NULL,
  `staff_add_line2` varchar(255) DEFAULT NULL,
  `staff_add_line3` varchar(255) DEFAULT NULL,
  `staff_add_line4` varchar(255) DEFAULT NULL,
  `fk_staff_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_fname`, `staff_lname`, `staff_username`, `staff_pwd`, `staff_email`, `staff_is_active`, `staff_phone`, `staff_hire_date`, `staff_nic`, `staff_add_line1`, `staff_add_line2`, `staff_add_line3`, `staff_add_line4`, `fk_staff_type_id`) VALUES
(1511, 'Harith', 'Jayasuriya', 'Harith', 'Harith2002', 'harithjayasuriya1028@gmail.com', 1, '0783415051', '2024-06-15 14:59:58', '200230201485', '202/A,2', 'Madahena', 'Hirana', 'panadura', 1000),
(1512, 'Isuru', 'Udara', 'Isuru', 'Isuru2001', 'isuru@gmail.com', 1, '0762990706', '2024-06-15 15:03:55', '20011023451', 'N0 25,A/3', 'Raigama', 'kottawa', 'kottawa', 1001),
(1513, 'Buddhi', 'Malshan', 'Buddhi', 'Buddhi123', 'Buddhi@gmail.com', 1, '0788209530', '2024-06-16 21:20:03', '996070210', 'No 182/2', 'Horopathana', 'Polonnaruwa', 'Polonnaruwa', 1003),
(1514, 'Nimal', 'Perera', 'Nimal', 'Nimal123', 'nimal@gmail.com', 1, '0762990734', '2024-06-16 22:49:05', '200230203124', '203,b/2', 'Mahawila', 'Panadura', 'Panadura', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `staff_type`
--

CREATE TABLE `staff_type` (
  `staff_type_id` int(11) NOT NULL,
  `staff_type_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_type`
--

INSERT INTO `staff_type` (`staff_type_id`, `staff_type_name`) VALUES
(1000, 'Admin'),
(1001, 'Cashier'),
(1002, 'Inventory Manager'),
(1003, 'Deliver Person');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cancellation`
--
ALTER TABLE `cancellation`
  ADD PRIMARY KEY (`cancel_id`),
  ADD KEY `fk_order_id` (`fk_order_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_item_id` (`fk_item_id`),
  ADD KEY `fk_cust_id` (`fk_cust_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `customer_notification`
--
ALTER TABLE `customer_notification`
  ADD PRIMARY KEY (`cust_notifi_id`),
  ADD KEY `fk_notifi_id` (`fk_notifi_id`),
  ADD KEY `fk_cust_id` (`fk_cust_id`);

--
-- Indexes for table `deliver_area`
--
ALTER TABLE `deliver_area`
  ADD PRIMARY KEY (`deliver_area_id`),
  ADD KEY `fk_staff_id` (`fk_staff_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `fk_staff_id` (`fk_staff_id`),
  ADD KEY `fk_item_id` (`fk_item_id`),
  ADD KEY `fk_cust_id` (`fk_cust_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiry_id`),
  ADD KEY `fk_staff_id` (`fk_staff_id`),
  ADD KEY `fk_cust_id` (`fk_cust_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_category_id` (`fk_category_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `fk_staff_id` (`fk_staff_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notifi_id`),
  ADD KEY `fk_staff_id` (`fk_staff_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `fk_item_id` (`fk_item_id`),
  ADD KEY `fk_order_id` (`fk_order_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_cust_id` (`fk_cust_id`),
  ADD KEY `fk_deliver_area_id` (`fk_deliver_area_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `fk_staff_type_id` (`fk_staff_type_id`);

--
-- Indexes for table `staff_type`
--
ALTER TABLE `staff_type`
  ADD PRIMARY KEY (`staff_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cancellation`
--
ALTER TABLE `cancellation`
  MODIFY `cancel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5500;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3516;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2017;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3006;

--
-- AUTO_INCREMENT for table `customer_notification`
--
ALTER TABLE `customer_notification`
  MODIFY `cust_notifi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7500;

--
-- AUTO_INCREMENT for table `deliver_area`
--
ALTER TABLE `deliver_area`
  MODIFY `deliver_area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4000;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6000;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6500;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2530;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8000;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notifi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7000;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5000;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4500;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1515;

--
-- AUTO_INCREMENT for table `staff_type`
--
ALTER TABLE `staff_type`
  MODIFY `staff_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cancellation`
--
ALTER TABLE `cancellation`
  ADD CONSTRAINT `cancellation_ibfk_1` FOREIGN KEY (`fk_order_id`) REFERENCES `order_table` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`fk_item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`fk_cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_notification`
--
ALTER TABLE `customer_notification`
  ADD CONSTRAINT `customer_notification_ibfk_1` FOREIGN KEY (`fk_notifi_id`) REFERENCES `notification` (`notifi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_notification_ibfk_2` FOREIGN KEY (`fk_cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deliver_area`
--
ALTER TABLE `deliver_area`
  ADD CONSTRAINT `deliver_area_ibfk_1` FOREIGN KEY (`fk_staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`fk_staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`fk_item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`fk_cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `inquiry_ibfk_1` FOREIGN KEY (`fk_staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inquiry_ibfk_2` FOREIGN KEY (`fk_cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`fk_category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`fk_staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`fk_staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`fk_item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`fk_order_id`) REFERENCES `order_table` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_table`
--
ALTER TABLE `order_table`
  ADD CONSTRAINT `order_table_ibfk_1` FOREIGN KEY (`fk_cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_table_ibfk_2` FOREIGN KEY (`fk_deliver_area_id`) REFERENCES `deliver_area` (`deliver_area_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`fk_staff_type_id`) REFERENCES `staff_type` (`staff_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
