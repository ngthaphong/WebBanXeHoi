-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 14, 2021 lúc 02:57 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doanmanguonmo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BMW', '2021-03-29 20:55:29', '2021-04-12 09:21:40'),
(2, 'FERRARI', '2021-03-29 20:59:22', '2021-03-29 20:59:22'),
(3, 'LAMBORGHINI', '2021-03-29 16:05:30', '2021-03-29 16:05:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `ID_Customer` int(11) NOT NULL,
  `UserName` varchar(20) COLLATE utf8_unicode_520_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_520_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `PhoneNumber` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`ID_Customer`, `UserName`, `Password`, `Email`, `PhoneNumber`) VALUES
(1, 'phuc27', '123', 'phucgak2265@gmail.com', 967783867),
(2, 'phuc271', '123', 'phucgak2256@gmail.com', 967783866);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user` varchar(100) NOT NULL COMMENT 'thành viên thanh toán',
  `money` float NOT NULL COMMENT 'số tiền thanh toán',
  `note` varchar(255) DEFAULT NULL COMMENT 'ghi chú thanh toán',
  `vnp_response_code` varchar(255) NOT NULL COMMENT 'mã phản hồi',
  `code_vnpay` varchar(255) NOT NULL COMMENT 'mã giao dịch vnpay',
  `code_bank` varchar(255) NOT NULL COMMENT 'mã ngân hàng',
  `time` datetime NOT NULL COMMENT 'thời gian chuyển khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `user`, `money`, `note`, `vnp_response_code`, `code_vnpay`, `code_bank`, `time`) VALUES
(1, '742874161', 'abc', 100000, 'chinh chuyển khoản', '00', '13401455', 'NCB', '2020-10-10 01:00:00'),
(2, '608324672', 'abc', 1000000, 'test chuyển khoản', '00', '13401811', 'NCB', '2020-10-11 21:00:00'),
(3, '1134065293', 'CT2', 150000, 'học phí', '00', '13407163', 'NCB', '2020-10-22 23:00:00'),
(4, '596509313', 'CT2', 5000000, 'học phí', '00', '13407176', 'NCB', '2020-10-23 00:00:00'),
(5, '70267166', 'CT2', 5000000, 'học phí', '00', '13407178', 'NCB', '2020-10-23 00:00:00'),
(6, '1672349048', 'CT1', 150000, 'học phí', '00', '13407729', 'NCB', '2020-10-23 21:00:00'),
(7, '20210410151211', 'phuc27', 10000, 'Noi dung thanh toan', '00', '13488225', 'NCB', '2021-04-10 20:00:00'),
(16, '20210410193852', 'phuc27', 10000, 'Xn', '00', '13488252', 'NCB', '2021-04-11 00:00:00'),
(17, '20210410194012', 'phuc27', 10000, 'Xn', '00', '13488253', 'NCB', '2021-04-11 00:00:00'),
(18, '20210410202244', 'phuc27', 1600000, 'BMW 218i Gran Tourer,', '00', '13488261', 'NCB', '2021-04-11 01:00:00'),
(19, '20210410202729', 'phuc27', 535000, 'BMW 740Li,', '00', '13488262', 'NCB', '2021-04-11 01:00:00'),
(20, '20210410203054', '', 160000, 'BMW 218i Gran Tourer,', '00', '13488263', 'NCB', '2021-04-11 01:00:00'),
(21, '20210410203640', '', 160000, 'BMW 218i Gran Tourer,', '00', '13488265', 'NCB', '2021-04-11 01:00:00'),
(22, '20210410204406', 'phuc271', 160000, 'BMW 218i Gran Tourer,', '00', '13488267', 'NCB', '2021-04-11 01:00:00'),
(23, '20210410204543', 'NGUYEN VAN A', 180000, 'BMW 320i Gran Turismo,', '00', '13488268', 'NCB', '2021-04-11 01:00:00'),
(24, '20210410204730', 'phuc27', 180000, 'BMW 320i Gran Turismo,', '00', '13488269', 'NCB', '2021-04-11 01:00:00'),
(25, '20210410204934', 'phuc271', 160000, 'BMW 218i Gran Tourer,', '00', '13488270', 'NCB', '2021-04-11 01:00:00'),
(26, '20210410211007', 'phuc271', 620000, 'BMW 218i Gran Tourer,BMW 320i Gran Turismo,BMW 420i Cabriolet,', '00', '13488273', 'NCB', '2021-04-11 02:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `price` float DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `picture` text COLLATE utf8_unicode_520_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `content`, `id_category`, `picture`, `created_at`, `updated_at`) VALUES
(2, 'BMW 740Li', 535000, 'BMW 7-Series 2020 sở hữu chiều dài, rộng, cao là 5.260 x 1.902 x 1.479 (mm) và chiều dài cơ sở 3.210 mm. Cả 3 phiên bản đều sử dụng thông số chung về kích thước, thể tích khoang hành lý và thể tích bình xăng', 1, 'https://giaxeoto.vn/admin/webroot/img/upload2/bmw-118i-tai-viet-nam.jpg', '2021-03-29 21:03:59', '2021-03-29 21:03:59'),
(3, 'BMW 218i Gran Tourer', 160000, 'Ra mắt vào tháng 04/2016, mẫu xe gia đình MPV đầu tiên của thương hiệu xe sang BMW tại Việt Nam là 218i Gran Tourer đã chính thức chốt giá bán gây bất ngờ khi được cho là “mềm” hơn so với các thương hiệu Kia, Honda dù không cùng hạng. Xe có dung tích 1.5L, sản sinh công suất tối đa 136 mã lực và mô-men xoắn cực đại 220 Nm. Xe chỉ mất 9,8 giây để đạt được ngưỡng 100 km/h với vận tốc tối đa 202 km/h. Xe có 3 chế độ lái khác nhau như Eco Pro, Comfort và Sport với mức tiêu thụ nhiên liệu 5,5 lít/ 100km', 1, 'https://giaxeoto.vn/admin/webroot/img/upload2/bmw-118i-tai-viet-nam.jpg', '2021-03-29 21:05:55', '2021-03-29 21:05:55'),
(4, 'BMW 320i Gran Turismo', 180000, 'BMW 320i thế hệ mới là loại động cơ xăng 2.0L 4 xy lanh thẳng hàng cho công suất tối đa 184 mã lực ở vùng tua 5000 vòng/phút, mô men xoắn cực đại 270 Nm tại dải vòng tua 1250-4500 vòng/phút.', 1, 'https://giaxeoto.vn/admin/webroot/img/upload2/bmw-118i-tai-viet-nam.jpg', '2021-03-29 21:08:25', '2021-03-29 21:08:25'),
(5, 'BMW 420i Cabriolet', 280000, 'BMW 420i mui trần còn được cải thiện đáng kể sức mạnh vận hành. Dưới nắp capo là khối động cơ xăng 2.0L 4 xy lanh thẳng hàng cho công suất tối đa 184 mã lực ở vòng tua 5000 vòng/phút, mô men xoắn cực đại 290 Nm tại dải vòng tua 1350-4600 vòng/phút', 1, 'https://giaxeoto.vn/admin/webroot/img/upload2/bmw-118i-tai-viet-nam.jpg', '2021-03-29 21:11:32', '2021-03-29 21:11:32'),
(6, 'BMW 520i AllNew', 200000, 'Phiên bản 520i được trrang bị động cơ xăng tăng áp, dung tích 1,6 lít, 4 xy lanh thẳng hàng, công suất tối đa đạt 170 mã lực, mô men xoắn cực đại 250 Nm. Hãng BMW công bố khả năng tăng tốc 0-100 km/h của bản 520i là 8,7 giây. Tốc độ tối đa của phiên bản BMW 520i có thể đạt được là 226 km/h', 1, 'https://giaxeoto.vn/admin/webroot/img/upload2/bmw-118i-tai-viet-nam.jpg', '2021-03-29 21:13:39', '2021-03-29 21:13:39');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_Customer`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `ID_Customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
