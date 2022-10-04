-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 21, 2021 lúc 01:03 PM
-- Phiên bản máy phục vụ: 8.0.21
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `b4_32717963_caodinhvu_2119110067`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caodinhvu_admin`
--

DROP TABLE IF EXISTS `caodinhvu_admin`;
CREATE TABLE IF NOT EXISTS `caodinhvu_admin` (
  `adminId` int NOT NULL AUTO_INCREMENT,
  `useName` varchar(100) CHARACTER SET utf8 COLLATE utf8mb4_general_ci NOT NULL,
  `adminName` varchar(100) CHARACTER SET utf8 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8mb4_general_ci NOT NULL,
  `Pass` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` tinyint(1) NOT NULL,
  `Trash` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`adminId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `caodinhvu_admin`
--

INSERT INTO `caodinhvu_admin` (`adminId`, `useName`, `adminName`, `email`, `Pass`, `level`, `Trash`) VALUES
(1, 'vu', 'vu cao', 'caodinhvu00@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caodinhvu_brand`
--

DROP TABLE IF EXISTS `caodinhvu_brand`;
CREATE TABLE IF NOT EXISTS `caodinhvu_brand` (
  `brandId` int NOT NULL AUTO_INCREMENT,
  `brandName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alias` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `trash` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`brandId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `caodinhvu_brand`
--

INSERT INTO `caodinhvu_brand` (`brandId`, `brandName`, `alias`, `trash`, `status`) VALUES
(1, 'APPLE', 'Apple', 0, 1),
(2, 'SAMSUNG', 'SamSung', 0, 1),
(3, 'ASUS', 'Asus', 0, 1),
(4, 'MSI', 'Msi', 0, 1),
(5, 'XIAOMI', 'Xiaomi', 0, 1),
(6, 'ACER', 'Acer', 0, 1),
(7, 'LENOVO', 'Lenovo', 0, 1),
(8, 'VSMART', 'Vsmart', 0, 1),
(9, 'ONEPLUS', 'Oneplus', 0, 1),
(10, 'HUAWEI', 'Huawei', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caodinhvu_cart`
--

DROP TABLE IF EXISTS `caodinhvu_cart`;
CREATE TABLE IF NOT EXISTS `caodinhvu_cart` (
  `cartId` int NOT NULL AUTO_INCREMENT,
  `sId` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `productId` int NOT NULL,
  `productName` varchar(255) CHARACTER SET utf8 COLLATE utf8mb4_general_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `caodinhvu_cart`
--

INSERT INTO `caodinhvu_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(1, 'hb1dkvk8ptdfhleq375m01e891', 1, ' Ariyan Lorem Ipsum fsdfasdaf', 525.00, 1, 'upload/a2d9ff0c56.png'),
(2, 'ki70g8rmb4mfqs7cmei2l3qpi3', 2, 'Woman Tshirt 03', 300.00, 1, 'upload/a2fccb0144.png'),
(3, 'e6r6avk209clao063d5p18i597', 3, 'Mans Tshirt 02', 400.00, 1, 'upload/4b2b2f0556.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caodinhvu_category`
--

DROP TABLE IF EXISTS `caodinhvu_category`;
CREATE TABLE IF NOT EXISTS `caodinhvu_category` (
  `catId` int NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `parentId` int NOT NULL,
  `trash` tinyint NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `caodinhvu_category`
--

INSERT INTO `caodinhvu_category` (`catId`, `catName`, `alias`, `parentId`, `trash`, `status`) VALUES
(1, 'PHONE', 'phone', 0, 0, 1),
(2, 'TABLET', 'tablat', 0, 0, 1),
(3, 'LAPTOP', 'laptop', 0, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caodinhvu_contact`
--

DROP TABLE IF EXISTS `caodinhvu_contact`;
CREATE TABLE IF NOT EXISTS `caodinhvu_contact` (
  `contactId` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `trash` tinyint(1) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`contactId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caodinhvu_customer`
--

DROP TABLE IF EXISTS `caodinhvu_customer`;
CREATE TABLE IF NOT EXISTS `caodinhvu_customer` (
  `customerId` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `trash` tinyint(1) NOT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `caodinhvu_customer`
--

INSERT INTO `caodinhvu_customer` (`customerId`, `userId`, `fullname`, `address`, `phone`, `email`, `trash`) VALUES
(2, 0, '', 'Groan Puran Polton south Dhaka ', '4544555455', 'kaziariyan@gmail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caodinhvu_image`
--

DROP TABLE IF EXISTS `caodinhvu_image`;
CREATE TABLE IF NOT EXISTS `caodinhvu_image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `imageName` varchar(255) NOT NULL,
  `position` tinyint NOT NULL,
  `trash` tinyint NOT NULL,
  `status` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `caodinhvu_image`
--

INSERT INTO `caodinhvu_image` (`id`, `title`, `image`, `imageName`, `position`, `trash`, `status`) VALUES
(1, 'LOGO', 'vu_logo.png', '', 1, 0, 1),
(2, 'SLIDE1', 'vu_slide1.png', '', 2, 0, 1),
(3, 'SLIDE2', 'vu_slide2.png', '', 2, 0, 1),
(4, 'SLIDE3', 'vu_slide3.png', '', 2, 0, 1),
(5, 'SLIDE4', 'vu_slide4.png', '', 2, 0, 1),
(6, 'SLIDE5', 'vu_slide5.png', '', 2, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caodinhvu_link`
--

DROP TABLE IF EXISTS `caodinhvu_link`;
CREATE TABLE IF NOT EXISTS `caodinhvu_link` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8mb4_general_ci NOT NULL,
  `Position` varchar(100) CHARACTER SET utf8 COLLATE utf8mb4_general_ci NOT NULL,
  `Image` varchar(100) CHARACTER SET utf8 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(100) CHARACTER SET utf8 COLLATE utf8mb4_general_ci NOT NULL,
  `orders` tinyint NOT NULL,
  `Trash` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `caodinhvu_link`
--

INSERT INTO `caodinhvu_link` (`id`, `title`, `Position`, `Image`, `link`, `orders`, `Trash`, `status`) VALUES
(1, 'Về chúng tôi', 'bottommenu1', '', '#', 1, 0, 1),
(2, 'Chinh sach bán hàng', 'bottommenu1', '', '#', 2, 0, 1),
(3, 'Tài khoản', 'bottommenu2', '', '#', 1, 0, 1),
(4, 'Đăng ký', 'bottommenu2', '', '#', 2, 0, 1),
(5, 'liên hệ', 'bottommenu2', '', '#', 3, 0, 1),
(6, 'liên hệ', 'globalnav', '', '#', 2, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caodinhvu_order`
--

DROP TABLE IF EXISTS `caodinhvu_order`;
CREATE TABLE IF NOT EXISTS `caodinhvu_order` (
  `orderId` int NOT NULL AUTO_INCREMENT,
  `customerId` int NOT NULL,
  `orderDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` float(10,2) NOT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `trash` tinyint(1) NOT NULL,
  PRIMARY KEY (`orderId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `caodinhvu_order`
--

INSERT INTO `caodinhvu_order` (`orderId`, `customerId`, `orderDate`, `total`, `note`, `status`, `trash`) VALUES
(8, 2, '0000-00-00 00:00:00', 500.00, '', 1, 0),
(9, 2, '0000-00-00 00:00:00', 400.00, '', 0, 0),
(10, 2, '0000-00-00 00:00:00', 450.00, '', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caodinhvu_orderdetail`
--

DROP TABLE IF EXISTS `caodinhvu_orderdetail`;
CREATE TABLE IF NOT EXISTS `caodinhvu_orderdetail` (
  `orderDetailId` int NOT NULL AUTO_INCREMENT,
  `orderId` int NOT NULL,
  `productId` int NOT NULL,
  `price` float NOT NULL,
  `quantity` smallint NOT NULL,
  `trash` tinyint(1) NOT NULL,
  PRIMARY KEY (`orderDetailId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caodinhvu_page`
--

DROP TABLE IF EXISTS `caodinhvu_page`;
CREATE TABLE IF NOT EXISTS `caodinhvu_page` (
  `pageId` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `createBy` int NOT NULL,
  `createDate` datetime NOT NULL,
  `updateDate` datetime NOT NULL,
  `trash` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`pageId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `caodinhvu_page`
--

INSERT INTO `caodinhvu_page` (`pageId`, `title`, `content`, `createBy`, `createDate`, `updateDate`, `trash`, `status`) VALUES
(1, 'Vê chúng tôi', 'Có nhiều lý do khiến chúng tôi quyết định mở rộng hoạt động kinh doanh, bán củ giống chất lượng cho người dùng hoa mà không thông qua bất cứ trung gian nào khác. Dù bạn muốn tự trồng và chăm sóc một chậu hoa để gần gũi với thiên nhiên hơn, thư giãn đầu óc sau một ngày làm việc. Hoặc bạn muốn có một chậu hoa đẹp vào dịp tết, tránh việc mua phải những bó hoa lạnh, hoa kém chất lượng với giá quá cao. Dù lý do là gì, chúng tôi tự tin mang tới cho bạn những cử giống hoa chất lượng nhất với chi phí hợp lý.\r\n\r\nĐược thành lập từ năm 2014, công ty chúng tôi là đơn vị tiên phong trong lĩnh vực phân phối củ giống hoa Ly và các loại hoa thành phẩm như hoa Ly, hoa hồng ngoại. Sản phẩm củ giống hoa Ly được chúng tôi nhập khẩu trực tiếp từ các nhà cung cấp tới từ châu Âu như Hà Lan, Pháp …đảm bảo chất lượng tốt nhất cho người trồng.\r\n\r\nCác vườn hoa có tổng diện tích 10ha của chúng tôi tại huyện Đan Phượng – Hà Nội cung cấp hoa tươi bán buôn, hoa tươi tết cho không chỉ thị trường Hà Nội mà cả các tỉnh miền Bắc như Nam Định, Hải Phòng, Quảng Ninh, Lạng Sơn …\r\n\r\nKhách hàng chính của chúng tôi là các nhà vườn trồng hoa ly tại miền Bắc ở các vùng chuyên canh trồng hoa như làng hoa Tây Tựu, hoa Mê Linh, hoa Sapa. Sản phẩm chất lượng và việc tư vấn sát sao tới từng người trồng là bí quyết tạo dựng uy tín công ty chúng tôi.', 1, '2021-03-02 23:09:19', '0000-00-00 00:00:00', 0, 1),
(2, 'Chính sách', 'Chúng tôi áp dụng phương thức thu tiền khi giao hàng và chuyển khoản ngân hàng với các đơn hàng trên toàn lãnh thổ Việt Nam.\r\n\r\nThông tin tài khoản:\r\n\r\nChủ tài khoản: Trịnh Xuân Trường\r\nSố tài khoản: 19032 80223 6018\r\nNgân hàng Techcombank chi nhánh Từ Liêm\r\nCó 3 cách chủ yếu để bạn đặt hàng trên hệ thống của chúng tôi:\r\n\r\nCách 1: Bạn chọn sản phẩm và số lượng mình muốn, rồi đặt hàng trên web (ưu tiên sử dụng)\r\nCách 2: Bạn để lại thông tin số điện thoại trên website hoặc facebook để chúng tôi chủ động liên lạc lại. \r\nCách 3: Bạn gọi điện trực tiếp tới các số điện thoại của Gánh hoa Ly trên website hoặc facebook.', 1, '2021-03-16 23:09:19', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caodinhvu_product`
--

DROP TABLE IF EXISTS `caodinhvu_product`;
CREATE TABLE IF NOT EXISTS `caodinhvu_product` (
  `productId` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(100) CHARACTER SET utf8 COLLATE utf8mb4_general_ci NOT NULL,
  `Alias` varchar(100) CHARACTER SET utf8 COLLATE utf8mb4_general_ci NOT NULL,
  `catId` int NOT NULL,
  `brandId` int NOT NULL,
  `Detail` text CHARACTER SET utf8 COLLATE utf8mb4_general_ci NOT NULL,
  `Price` float NOT NULL,
  `salePrice` float DEFAULT NULL,
  `Image` varchar(100) CHARACTER SET utf8 COLLATE utf8mb4_general_ci NOT NULL,
  `trash` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `caodinhvu_product`
--

INSERT INTO `caodinhvu_product` (`productId`, `productName`, `Alias`, `catId`, `brandId`, `Detail`, `Price`, `salePrice`, `Image`, `trash`, `status`) VALUES
(1, 'Iphone 12 Pro', 'Iphone-12-pro', 1, 1, 'Thông số kỹ thuật\r\nKích thước màn hình	6.1 inches\r\nCông nghệ màn hình	OLED\r\nCamera sau	12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS\r\n12 MP, f/2.0, 52mm (telephoto), 1/3.4\", 1.0µm, PDAF, OIS, 2x optical zoom\r\n12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6\"\r\nTOF 3D LiDAR scanner (depth)\r\nCamera trước	12 MP, f/2.2, 23mm (wide), 1/3.6\"\r\nSL 3D, (depth/biometrics sensor)\r\nChipset	Apple A14 Bionic (5 nm)\r\nDung lượng RAM	6 GB\r\nBộ nhớ trong	128 GB\r\nPin	Li-Ion, sạc nhanh 20W, sạc không dây 15W, USB Power Delivery 2.0\r\nThẻ SIM	2 SIM (nano‑SIM và eSIM)\r\nHệ điều hành	iOS 14.1 hoặc cao hơn (Tùy vào phiên bản phát hành)\r\nĐộ phân giải màn hình	1170 x 2532 pixels\r\nTính năng màn hình	HDR10\r\nDolby Vision\r\nTrue-tone\r\nLoại CPU	Hexa-core\r\nGPU	Apple GPU (4-core graphics)\r\nKích thước	146.7 x 71.5 x 7.4 mm\r\nTrọng lượng	189 g\r\nQuay video	Trước: 4K@24/30/60fps, 1080p@30/60/120fps, gyro-EIS\r\nSau: 4K@24/30/60fps, 1080p@30/60/120/240fps, HDR, Dolby Vision HDR (up to 60fps), stereo sound rec.\r\nQuay video trước	4K@24/30/60fps, 1080p@30/60/120fps, gyro-EIS\r\nChất liệu mặt lưng	Kính\r\nChất liệu khung viền	Kim loại\r\nCông nghệ sạc	Sạc nhanh 20W\r\nSạc nhanh không dây 15W\r\nPower Delivery 2.0\r\nCổng sạc	Lightning\r\nCông nghệ NFC	Có\r\nHồng ngoại	Không\r\nJack tai nghe 3.5	Không\r\nCảm biến vân tay	Không\r\nCác loại cảm biến	Cảm biến ánh sáng, Cảm biến áp kế, Cảm biến gia tốc, Cảm biến tiệm cận, Con quay hồi chuyển, La bàn\r\nKhe cắm thẻ nhớ	Không\r\nWi-Fi	Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, hotspot\r\nBluetooth	5.0, A2DP, LE\r\nGPS	A-GPS, GLONASS, GALILEO, QZSS\r\nKiểu màn hình	Tai thỏ\r\nTính năng camera	Chụp góc rộng, Chụp xóa phông, Chụp Zoom xa, Chống rung, Quay video 4K\r\nTính năng đặc biệt	Hỗ trợ 5G, Kháng nước, kháng bụi, Sạc không dây, Nhận diện khuôn mặt', 33999000, 34999000, 'vu_sp1.png', 0, 1),
(2, 'XIAOMI MI 11 5G', 'Xiaomi-mi-11-5g', 1, 5, 'Thông tin chung\r\nHệ điều hành:	Android 11, MIUI 12.5\r\nNgôn ngữ:	Đa ngôn ngữ, tiếng Việt sau khi up ROM\r\nMàn hình\r\nLoại màn hình:	AMOLED\r\nMàu màn hình:	1 tỷ màu\r\nChuẩn màn hình:	6.81 inchs, 2K+ (1440 x 3200 pixels), 20:9 ratio (~515 ppi)\r\nĐộ phân giải:	6.81 inchs, 2K+ (1440 x 3200 pixels), 20:9 ratio (~515 ppi)\r\nMàn hình rộng:	6.81\r\nCông nghệ cảm ứng:	Corning Gorilla Glass Victus\r\nChụp hình & Quay phim\r\nCamera sau:	108 MP, f/1.9 (góc rộng) - 13 MP, f/2.4(123˚) - 5 MP, f/2.4, (macro)\r\nCamera trước:	20 MP, 27mm (góc rộng)\r\nĐèn Flash:	Có\r\nTính năng camera:	Dual-LED dual-tone flash, HDR, panorama\r\nQuay phim:	8K@24/30fps, 4K@30/60fps, 1080p@30/60/120/240/480fps; gyro-EIS\r\nVideocall:	Có\r\nCPU & RAM\r\nTốc độ CPU:	1x2.84 GHz & 3x2.XX & 4x1.XX\r\nSố nhân:	8 nhân\r\nChipset:	Qualcomm Snapdragon 888 (5 nm)\r\nRAM:	8-12GB\r\nChip đồ họa (GPU):	Adreno 660\r\nBộ nhớ & Lưu trữ\r\nDanh bạ:	Không giới hạn\r\nBộ nhớ trong (ROM):	128-256GB UFS 3.1\r\nThẻ nhớ ngoài:	Không\r\nHỗ trợ thẻ tối đa:	\r\nThiết kế & Trọng lượng\r\nKiểu dáng:	Cảm ứng\r\nKích thước:	164.3 x 74.6 x 8.1 mm (Glass) / 8.6 mm (Leather)\r\nTrọng lượng (g):	196\r\nThông tin pin\r\nLoại pin:	\r\nDung lượng pin:	4600 mAh, sạc nhanh 65W, 100% Pin trong 45p, Sạc nhanh không dây 50W, PD3.0, QC4.0+\r\nPin có thể tháo rời:	Không\r\nKết nối & Cổng giao tiếp\r\n3G:	HSDPA 850 / 900 / 1700(AWS) / 1900 / 2100 CDMA2000 1xEV-DO\r\n4G:	4G, 5G\r\nLoại Sim:	Nano SIM\r\nKhe gắn Sim:	2 SIM\r\nWifi:	Chuẩn Wi-Fi 6: 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct, hotspot\r\nGPS:	Yes, with dual-band A-GPS, GLONASS, GALILEO, BDS, QZSS, NavIC\r\nBluetooth:	5.2, A2DP, LE, aptX HD, aptX Adaptive\r\nGPRS/EDGE:	Có\r\nJack tai nghe:	24-bit/192kHz audio\r\nNFC:	Có\r\nKết nối USB:	Type C\r\nKết nối khác:	\r\nCổng sạc:	Type C\r\nGiải trí & Ứng dụng\r\nXem phim:	MP4，MKV，AVI，WMV，WEBM，3GP，ASF HDR10\r\nNghe nhạc:	MP3, FLAC, APE, AAC, OGG, WAV, WMA, AMR, AWB Hi-Res Audio\r\nCổng sạc:	Type C\r\nGhi âm:	Có\r\nFM radio:	Không', 16999000, 17999000, 'vu_sp2.png', 1, 1),
(3, 'POCO X3 PRo', 'Poco-x3-pro', 1, 5, 'Thông số kỹ thuật\r\nKích thước màn hình	6.67 inches\r\nCông nghệ màn hình	IPS LCD\r\nCamera sau	48MP + 8MP + 2MP + 2MP\r\nCamera trước	20MP, f/2.2\r\nChipset	Snapdragon 860 (7 nm)\r\nDung lượng RAM	8 GB\r\nBộ nhớ trong	256 GB\r\nPin	5160 mAh\r\nThẻ SIM	2 SIM (Nano-SIM)\r\nHệ điều hành	Android 11, MIUI 12\r\nĐộ phân giải màn hình	1080 x 2400 pixels (FullHD+)\r\nTính năng màn hình	Tần số quét 120Hz, kính cường lực Corning Gorilla Glass 6\r\nLoại CPU	8 nhân (1x2.96 GHz Kryo 485 + 3x2.42 GHz Kryo 485 + 4x1.78 GHz Kryo 485)\r\nGPU	Adreno 640\r\nKích thước	165.3mm x 76. 8mm x 9.4mm\r\nTrọng lượng	215 g\r\nQuay video	4K@30fps, 1080p@30/60fps, gyro-EIS\r\nQuay video trước	1080p@30fps, gyro-EIS\r\nChất liệu mặt lưng	Kính\r\nChất liệu khung viền	Nhựa\r\nCông nghệ sạc	Sạc nhanh 33W\r\nCổng sạc	USB Type-C\r\nCông nghệ NFC	Có\r\nHồng ngoại	Không\r\nJack tai nghe 3.5	Có\r\nCảm biến vân tay	Cảm biến vân tay cạnh bên\r\nCác loại cảm biến	Cảm biến ánh sáng, Cảm biến áp kế, Cảm biến gia tốc, Cảm biến tiệm cận, Con quay hồi chuyển, La bàn\r\nKhe cắm thẻ nhớ	Có\r\nWi-Fi	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot\r\nBluetooth	5.1, A2DP, LE\r\nGPS	Có, hỗ trợ A-GPS, GLONASS, BDS\r\nKiểu màn hình	Đục lỗ (Nốt ruồi)\r\nTính năng camera	Chụp macro, Chụp góc rộng, Chụp xóa phông, Chống rung, Quay video 4K', 5999000, 6999000, 'vu_sp3.png', 0, 1),
(4, 'SAMSUG GALAXY S21 ULTRA 5G', 'Samsung-galaxy-s21-ultra-5g', 1, 2, 'Thông số kỹ thuật\r\nKích thước màn hình	6.8 inches\r\nCông nghệ màn hình	Dynamic AMOLED\r\nCamera sau	\r\nỐng kính chính góc rộng: 108MP, f/1.8\r\nỐng kính zoom tiềm vọng: 10MP, zoom quang 10x\r\nCảm biến tele: 10MP, zoom quang 3x\r\nCảm biến siêu rộng: 12MP, f/2.2\r\nCảm biến Laser AF\r\nCamera trước	40 MP, f/2.2\r\nChipset	Exynos 2100 8 nhân\r\nDung lượng RAM	12 GB\r\nBộ nhớ trong	128 GB\r\nPin	\r\nDung lượng pin 5,000mAh\r\nSạc nhanh có dây 25W\r\nSạc nhanh không dây 15W\r\nSạc ngược không dây 4.5W\r\nThẻ SIM	2 SIM (Nano-SIM)\r\nHệ điều hành	Android 11, One UI 3.0\r\nĐộ phân giải màn hình	1440 x 3200 pixels (QHD+)\r\nTính năng màn hình	120Hz\r\nHDR10+\r\nCorning Gorilla Glass Victus\r\nLoại CPU	8 nhân: 1 nhân Cortex-X1 tốc độ 2.9GHz, 3 nhân Cortex-A78 tốc độ 2.8GHz, 4 nhân Cortex-A55 tốc độ 2.2GHz\r\nGPU	Arm Mali-G78, 14 nhân\r\nKích thước	166.9 x 76 x 8.8 mm (6.57 x 2.99 x 0.35 in)\r\nTrọng lượng	220 g\r\nQuay video	8K ở tốc độ 24fps, 4K ở tốc độ 30/60fps, 1080p ở tốc độ 30/60/240fps, 720p ở tốc độ 960fps, hỗ trợ HDR10+, chống rung OIS\r\nQuay video trước	4K@30/60fps, 1080p@30fps\r\nChất liệu mặt lưng	Kính\r\nChất liệu khung viền	Kim loại\r\nCông nghệ sạc	Sạc nhanh 25W\r\nSạc nhanh không dây 15\r\nPower Delivery 3.0\r\nCổng sạc	USB Type-C\r\nCông nghệ NFC	Có\r\nHồng ngoại	Không\r\nJack tai nghe 3.5	Không\r\nCảm biến vân tay	Cảm biến vân tay trong màn hình\r\nCác loại cảm biến	Cảm biến ánh sáng, Cảm biến áp kế, Cảm biến gia tốc, Cảm biến tiệm cận, Con quay hồi chuyển, La bàn\r\nKhe cắm thẻ nhớ	Không\r\nWi-Fi	Wi-Fi 802.11 a/b/g/n/ac/6e, dual-band, Wi-Fi Direct, hotspot\r\nBluetooth	5.1, A2DP, LE5.2, A2DP, LE\r\nGPS	Có, hỗ trợ A-GPS, GLONASS, BDS, GALILEO\r\nKiểu màn hình	Đục lỗ (Nốt ruồi)\r\nTính năng camera	Chụp góc rộng, Chụp xóa phông, Chụp Zoom xa, Chống rung, Quay video 4K\r\nTính năng đặc biệt	Hỗ trợ 5G, Kháng nước, kháng bụi, Sạc không dây, Bảo mật vân tay', 29999000, 30999000, 'vu_sp4.png', 0, 1),
(5, 'VSMART LIVE 4', 'Vsmart-live-4', 1, 8, 'Thông số kỹ thuật\r\nKích thước màn hình	6.5 inches\r\nCamera sau	Camera chính 48MP\r\nCamera góc siêu rộng 8MP\r\nCamera xóa phông 5MP\r\nCamera macro 2MP\r\nCamera trước	13MP, quay phim 4K 30FPS\r\nChipset	Snapdragon 675 8 nhân\r\nDung lượng RAM	6 GB\r\nBộ nhớ trong	64 GB\r\nPin	Li-Po 5000 mAh mAh battery, sạc nhanh 18W\r\nThẻ SIM	2 SIM (Nano-SIM)\r\nHệ điều hành	Android 10, VOS 3.0\r\nĐộ phân giải màn hình	1920 x 1080 pixels (FullHD)\r\nLoại CPU	2 nhân 2.0 GHz & 6 nhân 1.7 GHz\r\nGPU	Adreno 612\r\nKích thước	162.4 x 76.5 x 8.9 mm\r\nTrọng lượng	217g\r\nQuay video	4K 30FPS\r\nKhe cắm thẻ nhớ	Không hỗ trợ\r\nWi-Fi	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot\r\nBluetooth	5.0, A2DP, LE\r\nGPS	A-GPS, GLONASS, BDS\r\nKiểu màn hình	Tràn viền (Không khiếm khuyết)\r\nTính năng camera	Chụp macro, Chụp góc rộng, Chụp xóa phông, Quay video 4K\r\nTính năng đặc biệt	Bảo mật vân tay\r\n', 3599000, 4299000, 'vu_sp5.png', 0, 1),
(6, 'IPHONE 12', 'Iphone-12', 1, 1, 'Thông số kỹ thuật\r\nKích thước màn hình	6.1 inches\r\nCông nghệ màn hình	OLED\r\nCamera sau	12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS\r\n12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6\"\r\nCamera trước	12 MP, f/2.2, 23mm (wide), 1/3.6\"\r\nSL 3D, (depth/biometrics sensor)\r\nChipset	Apple A14 Bionic (5 nm)\r\nDung lượng RAM	4 GB\r\nBộ nhớ trong	64 GB\r\nPin	Li-Ion, sạc nhanh 20W, sạc không dây 15W, USB Power Delivery 2.0\r\nThẻ SIM	2 SIM (nano‑SIM và eSIM)\r\nHệ điều hành	iOS 14.1 hoặc cao hơn (Tùy vào phiên bản phát hành)\r\nĐộ phân giải màn hình	1170 x 2532 pixels\r\nTính năng màn hình	HDR10\r\nDolby Vision\r\nTrue-tone\r\nLoại CPU	Hexa-core\r\nGPU	Apple GPU (4-core graphics)\r\nKích thước	146.7 x 71.5 x 7.4 mm\r\nTrọng lượng	164 g\r\nQuay video	Trước: 4K@24/30/60fps, 1080p@30/60/120fps, gyro-EIS\r\nSau: 4K@24/30/60fps, 1080p@30/60/120/240fps, HDR, Dolby Vision HDR (up to 30fps), stereo sound rec.\r\nQuay video trước	4K@24/30/60fps, 1080p@30/60/120fps, gyro-EIS\r\nChất liệu mặt lưng	Kính\r\nChất liệu khung viền	Kim loại\r\nCông nghệ sạc	Sạc nhanh 20W\r\nPower Delivery 2.0\r\nCổng sạc	Lightning\r\nCông nghệ NFC	Có\r\nHồng ngoại	Không\r\nJack tai nghe 3.5	Không\r\nCảm biến vân tay	Không\r\nCác loại cảm biến	Cảm biến ánh sáng, Cảm biến áp kế, Cảm biến gia tốc, Cảm biến tiệm cận, Con quay hồi chuyển, La bàn\r\nKhe cắm thẻ nhớ	Không\r\nWi-Fi	Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, hotspot\r\nBluetooth	5.0, A2DP, LE\r\nGPS	A-GPS, GLONASS, GALILEO, QZSS\r\nKiểu màn hình	Tai thỏ\r\nTính năng camera	Chụp góc rộng, Chụp xóa phông, Chụp Zoom xa, Chống rung, Quay video 4K\r\nTính năng đặc biệt	Sạc không dây', 19999000, 20990000, 'vu_sp6.png', 1, 1),
(7, 'Samsung Galaxy Note 20 Ultra 5G', 'Samsung-galaxy-note-20-ultra-5g', 1, 2, 'Đối với bất kỳ chiếc điện thoại nào đến từ Samsung dòng Note luôn là những chiếc điện thoại có kích thước màn hình lớn. Samsung Galaxy Note 20 Ultra 5G cũng vậy nó được trang bị màn hình 6.9 inch 2 cạnh bên cong tạo nên vẻ đẹp sang trọng, độ phân giải đạt 2K 1440 x 3200 pixels cho hình ảnh hiển thị cực kỳ sắc nét. Ngoài ra tần số quét trên màn hình cũng nằm ở mức lớn 120Hz ở độ phân giải FHD và 60Hz ở QHD. Mọi hình ảnh khi bạn chơi game với khung hình cao hay trải nghiệm những bộ phim hành động cực kỳ mượt mà và sắc nét với công nghệ HDR10+.', 28990000, 29990000, 'vu_sp7.png', 1, 1),
(8, 'OnePlus 9E', 'Oneplus-9e', 1, 9, 'OnePlus dự kiến sẽ ra mắt OnePlus 9 và OnePlus 9 Pro vào nửa đầu năm 2021. Cả hai thiết bị dự kiến sẽ được trang bị bộ vi xử lý Snapdragon 875.\r\nTuy nhiên có vẻ OnePlus vẫn đang trong quá trình làm ra thêm một điện thoại nữa thuộc OnePlus 9 series. Một leaker đã tiết lộ rằng nhà sản xuất đến từ Trung Quốc đang trong quá trình phát triển OnePlus 9E, tuy nhiên hiện nay chúng ta vẫn chưa biết thêm các thông tin chi tiết của sản phẩm.', 15990000, 16990000, 'vu_sp8.png', 1, 1),
(9, 'Xiaomi Redmi Note 9 Pro', 'Xiaomi-redmi-note-9-pro', 1, 1, 'Xiaomi Redmi Note 9 Pro phiên bản 128GB được trang bị chip Snapdragon 720G đi kèm 6GB RAM và 128GB bộ nhớ trong. Máy còn được trang bị cụm 4 camera sau 64GB chất lượng, camera selfie 16MP và viên pin 5020mAh sạc nhanh 30W.', 5999000, 6999000, 'vu_sp9.png', 1, 1),
(10, 'Vsmart Active 3', 'Vsmart-active-3', 1, 8, 'Vsmart Active 3 6GB đã kích hoạt và Vsmart Active 3 6GB cũ đẹp được trang bị chip Mediatek Helio P60, RAM 6GB và bộ nhớ trong 64GB, cụm 3 camera sau 48MP, camera selfie 16MP dạng thò thụt  độc đáo và pin 4020 mAh.\r\n\r\nNếu bạn muốn sở hữu sản phẩm với giá tôt hơn nhiều, bạn có thể tham khảo Vsmart Active 3 4GB cũ.', 2999000, 3599000, 'vu_sp10.png', 1, 1),
(11, 'IPad Pro 11', 'Ipad-pro-11', 2, 1, 'Sau hai năm kể từ thành công của iPad Pro 2018, Apple mới cho ra mắt mẫu tablet mới với những cải tiến hứa hẹn sẽ chinh phục người dùng. Mặc mặt thiết kế không có nhiều khác bị so với người tiện nhiệm nhưng iPad Pro 11 2020 sẽ có những nâng cấp đáng kể trong hiệu năng và camera. Đăc biệt,  iPad Pro 11 2020 WiFi 256GB với khả năng kết nối wifi tốt, dung lượng lưu trữ lớn sẽ mang lại cho người dùng trải nghiệm mượt mà.  ', 24500000, 25900000, 'vu_sp11.png', 1, 1),
(12, 'Ipad Air 5', 'Ipad-air-5', 2, 1, 'iPad Air 5 – Ấn tượng mới, mạnh mẽ hơn\r\nMỗi khi một chiếc iPad mới vừa ra lò như một cơn chấn động thật sự bùng nổ. Đến năm 2021, chúng ta lại tiếp tục bùng nổ với chiếc iPad mới mang tên iPad Air 5. Thế hệ thứ 5 này mang đến cho bạn những điểm gì vượt trội hay có gì sáng giá để sở hữu, hãy để lại phần bình luận ở bên dưới nhé.', 19999000, 20990000, 'vu_sp12.png', 0, 1),
(13, 'Ipad Mini 5', 'Ipad-mini-5', 2, 1, 'Nhiều người đồn đoán rằng Apple đã khai tử dòng iPad Mini của mình khi đã 4 năm kể từ thế hệ mới nhất không có thêm bất cứ nâng cấp nào. Tuy nhiên iPad Mini 7.9 inch Wifi 2019 (iPad Mini 5) ra mắt và đánh dấu sự trở lại của một chiếc máy tính bảng nhỏ gọn như ngày nào.', 10999000, 11999000, 'vu_sp13.png', 0, 1),
(14, 'Samsung Galaxy Tab S7', 'Samsung-galaxy-tab-s7', 2, 2, 'Samsung Galaxy Tab S7 - Chiếc máy tính bảng có: thiết kế tuyệt đẹp, màn hình 120 Hz siêu mượt, camera kép ấn tượng, bút S Pen cùng một hiệu năng mạnh mẽ dẫn đầu thị trường máy tính bảng Android.', 15999000, 16990000, 'vu_sp14.png', 0, 1),
(15, 'Samsung Galaxy Tab S6', 'Samsung-galaxy-tab-s6', 2, 2, 'Samsung Galaxy Tab S6 - Chiếc máy tính bảng có: thiết kế tuyệt đẹp, màn hình 120 Hz siêu mượt, camera kép ấn tượng, bút S Pen cùng một hiệu năng mạnh mẽ dẫn đầu thị trường máy tính bảng Android.', 10999000, 12990000, 'vu_sp15.png', 0, 1),
(16, 'Samsung Galaxy Tab with S Pen', 'Samsung-galaxy-tab-with-spen', 2, 2, 'Samsung Galaxy Tab A Plus 8.0 inch (2019) là một chiếc máy tính bảng có thiết kế đẹp, trọng lượng nhẹ giúp bạn có thể dễ dàng mang theo trong những buổi sáng cafe hay những chuyến đi chơi xa.', 5999000, 6999000, 'vu_sp16.png', 0, 1),
(17, 'Huawei MatePad', 'Huawei-metepad', 2, 10, 'Huawei vừa ra mắt máy tính bảng Huawei MatePad với mức giá dễ tiếp cận. Được thiết kế mỏng nhẹ và đầy đủ các tính năng cần thiết, Huawei MatePad là sự lựa chọn tuyệt vời cho những ai yêu thích màn hình lớn nhưng lại thuận tiện dễ dàng di chuyển mang theo.', 6999000, 7999000, 'vu_sp17.png', 0, 1),
(18, 'Huawei MatePad T8', 'Huawei-matepad-t8', 2, 10, 'Huawei MatePad T8 là một trong những mẫu máy tính bảng giá rẻ của Huawei có thiết kế nguyên khối cùng một cấu hình cơ bản, đủ dùng cho các tác vụ hằng ngày của mọi người dùng.', 2599000, 3599000, 'vu_sp18.png', 0, 1),
(19, 'Huawei Mediapad T5', 'Huawei-mediapad-t5', 2, 10, 'Huawei MediaPad T5 10.1 là một chiếc máy tính bảng có thiết kế hiện đại, sang trọng nổi bật với màn hình lớn, hiệu năng ổn định, hệ thống âm thanh chất lượng cùng nhiều tính năng hữu ích đáp ứng tốt nhu cầu học tập giải trí của người dùng.', 4699000, 4999000, 'vu_sp19.png', 0, 1),
(20, 'Lenovo Tab M10', 'Lenovo-tab-m10', 2, 7, 'Từ việc sử dụng các thiết bị điện tử đa dạng của các gia đình hiện nay, Lenovo đã nắm bắt được nhu cầu thiết yếu này và cho ra mắt chiếc máy tính bảng Lenovo Tab M10 - FHD Plus với những tính năng tiện ích ấn tượng, “khoác chiếc áo” của thời đại và có mức giá siêu ưu đãi.', 4999000, 5999000, 'vu_sp20.png', 0, 1),
(21, 'Apple MacBook Air M1', 'Apple-macbook-air-m1', 3, 1, 'Apple vừa cho ra mắt phiên bản MacBook Air M1 2020 (MGND3SA/A) mới cực kì ấn tượng với con chip M1 mới được thiết kế dành riêng cho MacBook tăng hiệu suất CPU nhanh hơn tới 3.5 lần, tuổi thọ pin dài nhất từ ​​trước đến nay trên MacBook Air.', 26999000, 28599000, 'vu_sp21.png', 0, 1),
(22, 'Apple MacBook Pro M1', 'Apple-macbook-pro-m1', 3, 1, 'Apple Macbook Pro M1 2020 (Z11C) được nâng cấp với bộ vi xử lý mới cực kỳ mạnh mẽ, con laptop này sẽ phục vụ tốt cho công việc của bạn, đặc biệt bên lĩnh vực đồ họa, kỹ thuật.', 43990000, 45990000, 'vu_sp22.png', 0, 1),
(23, 'ASUS TUF Gaming', 'Asus-tuf-gaming', 3, 3, 'Asus trang bị trên laptop ASUS TUF Gaming FA706II H7286T nguồn sức mạnh với hiệu năng mạnh mẽ từ chiếc CPU AMD Ryzen 7-4800H kết hợp với card màn hình GTX 1650Ti. Sự kết hợp từ NVIDIA và AMD có trong TUF Gaming FA706II H7286T đem cho lại chiếc laptop khả năng đa nhiệm mượt mà, hiệu năng mạnh mẽ trong các tựa game hot nhất hiện nay. Đây là một trong những sự lựa chọn hàng đầu trong dòng laptop gaming.', 21990000, 22990000, 'vu_sp23.png', 0, 1),
(25, 'MSI GL65 Leopard 10SCXK', 'Msi-gl65-leopard-10scxk', 3, 4, 'Sở hữu sức mạnh đến từ vi xử lý  mới nhất Intel core Intel® Core™ i7-10750H mang đến cho bạn hiệu năng vượt trội hơn với các thế hệ trước. Kết hợp với RAM 8GB DDR4 2666MHz cho khả năng xử lý các tác vụ đa nhiệm mượt mà, nhẹ nhàng hơn. Người dùng có thể nâng cấp thêm RAM với khe còn trống để phục vụ cho nhu cầu công việc và giải trí cao hơn, có thể nâng cấp tối đa 32GB.\r\n\r\nSử dụng card đồ họa Geforce GTX1650 4GB được xây dựng với hiệu năng đồ họa đột phá của kiến trúc NVIDIA Turing ™, hỗ trợ tăng tốc độ cho các game phổ biến nhất và các ứng dụng chỉnh sửa ảnh.', 28990000, 29990000, 'vu_sp25.png', 0, 1),
(24, 'Asus ROG Strix G15 G512', 'Asus-rog-strix-g15-g512', 3, 3, 'Xứng đáng là laptop gaming được game thủ chọn khi Asus ROG StrixG15 G512 IHN281T được trang bị cấu hình khủng với CPU  Intel Core i7 10870H và RAM 8GB DDR4 3200Mhz thì việc xử lý thông tin và chạy những tựa game nặng không còn là vấn đề. Không những thế, để đáp ứng nhiều hơn nữa chiếc laptop này còn có thêm một khe cắm RAM và một khe cắm SSD giúp bạn có thể linh hoạt mọi việc trong kho tàng game của bạn. Cùng với card đồ họa GTX 1650Ti khiến mọi tựa game không còn là vấn đề phải đáng lo ngại.\r\n\r\n', 28990000, 29990000, 'vu_sp24.png', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caodinhvu_user`
--

DROP TABLE IF EXISTS `caodinhvu_user`;
CREATE TABLE IF NOT EXISTS `caodinhvu_user` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pass` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `trash` tinyint(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
