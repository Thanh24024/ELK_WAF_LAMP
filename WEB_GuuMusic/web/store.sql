-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th1 04, 2024 lúc 08:52 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(88, 3, 70, 'Boss-VE2', 5590000, 2, 'Boss-VE2-5,590,000.jpg'),
(89, 3, 68, 'Boss-GT1', 7500000, 1, 'boss-GT1-7,500,000.jpg'),
(90, 3, 45, 'Roland-501R', 36820000, 2, 'piano-roland-501r-mau-den-36,820,000.jpg'),
(91, 3, 31, 'Fender CD60s', 4200000, 1, 'Fender CD60s.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `send_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`, `send_time`, `is_read`) VALUES
(45, 1, '3213', 'rongbaynguoc@gmail.com', '321', '123', '2023-12-09 16:11:56', 1),
(46, 1, 'abcd', '32@gamil', '13', '213', '2023-12-09 16:11:56', 1),
(47, 1, 'abcd', '32@gamil', '13', '213', '2023-12-09 16:11:56', 1),
(48, 1, 'abcd', '32@gamil', '13', '213', '2023-12-09 16:11:56', 1),
(49, 1, 'Trần Công Tường', 'rongbaynguoc@gmail.com', '213', 'è', '2023-12-09 16:11:56', 1),
(50, 1, 'abcd', 'rongbaynguoc@gmail.com', '213', 'dfs', '2023-12-09 16:11:56', 1),
(51, 1, 'abcd', 'tuong01669543687@gmail.com', '213', 'ok', '2023-12-09 16:11:56', 1),
(52, 1, 'abcd', 'rongbaynguoc@gmail.com', '123', 'oklaaaaa', '2023-12-09 16:11:56', 1),
(54, 1, 'Trần Công Tường', 'tuong01669543687@gmail.com', '1232', 'vc', '2023-12-09 16:11:56', 1),
(55, 1, 'Trần Công Tường', 'rongbaynguoc@gmail.com', '23', '123', '2023-12-09 16:11:56', 1),
(56, 1, 'Trần Công Tường', 'rongbaynguoc@gmail.com', '23', '123', '2023-12-09 16:11:56', 1),
(57, 1, 'abcd', 'rongbaynguoc@gmail.com', '123', 'mệt váaa', '2023-12-09 16:11:56', 1),
(58, 1, 'Trần Công Tường', 'tuong01669543687@gmail.com', '123', 'thoi t đi ngủ', '2023-12-09 16:11:56', 1),
(65, 1, 'Trần Công Tường', 'abcde@gmail.com', '23123', '3123', '2023-12-10 06:00:45', 1),
(66, 1, 'helo', 'thachotao@gmail', '2312', 'okkkkk', '2023-12-22 09:42:59', 1),
(70, 3, 'Trần Công Tường', 'tuong01669543687@gmail.com', '2312312', 'okii ', '2023-12-22 10:00:55', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `placed_on` date NOT NULL,
  `received_on` date DEFAULT NULL,
  `payment_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `received_on`, `payment_status`) VALUES
(21, 25, 'sadsadsa', '2131241', 'sadasd@gmail', 'credit card', 'ewqe, ưqewq, qưe, ưqewq, ưqe, ưqewq, ưqe - 543', 'Nino-Cajon (2850000 x 1)', '2850000', '2023-11-29', '2023-12-02', 'completed'),
(22, 25, 'sadsadsa', '2131241', 'sadasd@gmail', 'banking', 'ewqe, ưqewq, qưe, ưqewq, ưqe, ưqewq, ưqe - 543', 'BOSS_ACS-LIVE (12260000 x 1)', '12260000', '2023-11-29', '2023-12-02', 'completed'),
(23, 3, 'sa', '987', 'tuong01669543687@gmail.com', 'banking', '5435, 324324, 324324, 3243, 243, ewrrwf, sdfsd - 123455', 'Nino-Cajon (2850000 x 1), Fender-Venice1 (1600000 x 1)', '4450000', '2023-11-21', '2023-12-02', 'completed'),
(24, 1, 'abcd', '1234', 'congtuong0411@gmail.com', 'thanh toan khi nhan hang', '1, 1, An Lợi Tây, Đại Nghĩa, Đại Lộc, Quảng Nam, Việt Nam - 123456', 'Nino-Cajon (2850000 x 1), Kawai-K800 (86000000 x 1)', '88850000', '2023-11-29', '2023-12-02', 'completed'),
(30, 3, 'sa', '987', 'tuong01669543687@gmail.com', 'thanh toan khi nhan hang', '5435, 324324, 324324, 3243, 243, ewrrwf, sdfsd - 123455', 'Violin-Suzuki-NS20FE (14340000 x 1), Fender-Player-Plus (10270000 x 1), Fender-Venice1 (1600000 x 1)', '26210000', '2023-11-29', '2023-12-02', 'pending'),
(31, 3, 'sa', '987', 'tuong01669543687@gmail.com', 'thanh toan khi nhan hang', '5435, 324324, 324324, 3243, 243, ewrrwf, sdfsd - 123455', 'BOSS_ACS-LIVE (12260000 x 2)', '24520000', '2023-11-29', '2023-12-02', 'completed'),
(32, 3, 'sa', '987', 'tuong01669543687@gmail.com', 'thanh toan khi nhan hang', '5435, 324324, 324324, 3243, 243, ewrrwf, sdfsd - 123455', 'Kawai-K800 (86000000 x 1)', '86000000', '2023-11-29', '2023-12-02', 'completed'),
(37, 1, 'abcd', '1234', 'congtuong0411@gmail.com', 'banking', '1, 1, An Lợi Tây, Đại Nghĩa, Đại Lộc, Quảng Nam, Việt Nam - 123456', '', '0', '2023-11-29', '2023-12-02', 'completed'),
(38, 1, 'abcd', '1234', 'congtuong0411@gmail.com', 'thanh toan khi nhan hang', '1, 1, An Lợi Tây, Đại Nghĩa, Đại Lộc, Quảng Nam, Việt Nam - 123456', 'Fender-Venice2 (1320000 x 1)', '1320000', '2023-11-29', '2023-12-02', 'pending'),
(39, 1, 'abcd', '1234', 'congtuong0411@gmail.com', 'thanh toan khi nhan hang', '1, 1, An Lợi Tây, Đại Nghĩa, Đại Lộc, Quảng Nam, Việt Nam - 123456', 'ZOOM-G2Four-G2XFour (5990000 x 2), Audix_f9 (3600000 x 2), Audix_ADX20ip (3200000 x 2), Selmer-AS650 (25000000 x 1)', '50580000', '2023-12-10', '2023-12-13', 'pending'),
(40, 1, 'abcd', '1234', 'congtuong0411@gmail.com', 'credit card', '1, 1, An Lợi Tây, Đại Nghĩa, Đại Lộc, Quảng Nam, Việt Nam - 123456', 'NUVO-N510JBGN (1860000 x 1)', '1860000', '2023-12-12', '2023-12-15', 'completed'),
(41, 29, 'rewf', '131243241', 'hehege@gmail.com', 'credit card', 'sdfsd, 21312, 312321, 321312, 312, fsdf, sdfsfdf - 213', 'Odery-Cafekit-BS (12490000 x 1)', '12490000', '2023-12-22', '2023-12-25', 'completed'),
(42, 30, 'èwefsdfs', '1234324', 'abcefgh@gmail.com', 'credit card', '5435, đá, ádasd, ádas, đâs, đá, sadasda - 123', 'BOSS_ACS-LIVE (12260000 x 2), Kawai-K300 (42000000 x 3), Nino-Cajon (2850000 x 1)', '153370000', '2023-12-22', '2023-12-25', 'pending'),
(45, 1, 'abcd', '1234', 'congtuong0411@gmail.com', 'credit card', '1, 1, An Lợi Tây, Đại Nghĩa, Đại Lộc, Quảng Nam, Việt Nam - 123456', 'Scherl-roth-s18774 (12180000 x 1), Nino-Cajon (2850000 x 1)', '15030000', '2023-12-23', '2023-12-26', 'completed'),
(46, 1, 'abcd', '1234', 'congtuong0411@gmail.com', 'thanh toan khi nhan hang', '1, 1, An Lợi Tây, Đại Nghĩa, Đại Lộc, Quảng Nam, Việt Nam - 123456', 'Nino-Cajon (2850000 x 1)', '2850000', '2024-01-06', '2023-12-26', 'pending'),
(47, 1, 'abcd', '1234', 'congtuong0411@gmail.com', 'thanh toan khi nhan hang', '1, 1, An Lợi Tây, Đại Nghĩa, Đại Lộc, Quảng Nam, Việt Nam - 123456', 'Nino-Cajon (2850000 x 1)', '2850000', '2024-01-06', '2023-12-26', 'pending'),
(48, 1, 'abcd', '1234', 'congtuong0411@gmail.com', 'thanh toan khi nhan hang', '1, 1, An Lợi Tây, Đại Nghĩa, Đại Lộc, Quảng Nam, Việt Nam - 123456', 'Nino-Cajon (2850000 x 1)', '2850000', '2023-12-23', '2023-12-26', 'pending'),
(49, 1, 'abcd', '1234', 'congtuong0411@gmail.com', 'thanh toan khi nhan hang', '1, 1, An Lợi Tây, Đại Nghĩa, Đại Lộc, Quảng Nam, Việt Nam - 123456', 'Kawai-K800 (86000000 x 1), Nino-Cajon (2850000 x 32), Roland-ELCajon-EC-10 (4900000 x 10)', '226200000', '2024-01-04', '2024-01-07', 'completed'),
(50, 1, 'abcd', '1234', 'congtuong0411@gmail.com', 'credit card', '1, 1, An Lợi Tây, Đại Nghĩa, Đại Lộc, Quảng Nam, Việt Nam - 123456', 'Kawai-K800 (86000000 x 1)', '86000000', '2024-01-04', '2024-01-07', 'pending'),
(51, 1, 'abcd', '1234', 'congtuong0411@gmail.com', 'credit card', '1, 1, An Lợi Tây, Đại Nghĩa, Đại Lộc, Quảng Nam, Việt Nam - 123456', 'Kawai-K800 (86000000 x 1)', '86000000', '2024-01-04', '2024-01-07', 'pending'),
(52, 33, 'okeeeee', '12321312', 'vvv@gmail.com', 'credit card', 'dqwd, ádas, dá, dá, đá, sad, sadas - 12312', 'Nino-Cajon (2850000 x 5)', '14250000', '2024-01-04', '2024-01-07', 'pending');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `describe` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image`, `quantity`, `describe`) VALUES
(16, 'Violin-Suzuki220FE4', 'violin', 18500000, 'dan-SUZUKI-VIOLIN-220FE4-44-18,500,000.jpg', 321, 'Với vẻ ngoại hình tinh tế và âm thanh trầm ấm, nó là người bạn đồng hành lý tưởng cho những buổi biểu diễn trang trí và sôi động.'),
(17, 'Violin-Suzuki-NS20FE', 'violin', 14340000, 'dan-violin-suzuki-ns20fe-3-4-14,340,000.jpg', 232, 'Được chế tác bởi những nghệ nhân hàng đầu, bộ sưu tập này tạo ra âm thanh sống động và sáng tạo. '),
(18, 'Scherl and Roth', 'violin', 28350000, 'scherl-and-roth-vi31e2ch-28,350,000.jpg', 432, 'Chiếc violin này không chỉ có vẻ ngoại hình ấn tượng mà còn mang đến cho người chơi sức mạnh thần bí. Với âm thanh sâu lắng, nó đưa người nghe đến thế giới của sự kỳ bí và tinh tế âm nhạc.'),
(19, 'Scherl-roth-s18774', 'violin', 12180000, 'scherl-roth-s18774-12,180,000.jpg', 56, '. Âm thanh độc đáo và tinh tế, chiếc violin này là biểu tượng của sự đẳng cấp và sang trọng.'),
(20, 'Scherl-Roth-SR41e4h', 'violin', 10584000, 'scherl-roth-sr41e4h-10,584,000.jpg', 54, 'Với vẻ ngoại hình hấp dẫn và âm thanh mộc mạc, chiếc violin này là sự kết hợp hoàn hảo giữa thiên nhiên và nghệ thuật. Cho phép người chơi thể hiện tình yêu và tôn trọng đối với tự nhiên qua âm nhạc.'),
(21, 'Suzuki-NS20FE', 'violin', 14340000, 'suzuki-ns20fe-14,340,000.jpg', 133, 'Được làm từ chất liệu trong suốt và được trang trí bằng pha lê Swarovski, chiếc violin này không chỉ thu hút với vẻ đẹp của nó mà còn mang đến âm thanh trong trẻo và tinh tế.'),
(22, 'Violin-Clip-Art', 'violin', 11240999, 'violin-2-clip-art.jpg', 311, 'Mỗi chiếc trong bộ sưu tập này là một bức tranh của những khoảnh khắc hoàng hôn tuyệt vời. Âm thanh ấn tượng và vẻ đẹp tinh tế, chiếc violin này là nguồn cảm hứng cho những giai điệu lãng mạn.'),
(23, 'Kapok-MV005', 'violin', 2600000, 'violin-kapok-mv005-4-4-2,600,000.jpg', 96, 'Được lấy cảm hứng từ thiên nhiên cổ điển, mỗi chiếc trong bộ sưu tập này mang đến vẻ đẹp hoài cổ và âm thanh ấn tượng. Đây là sự lựa chọn tuyệt vời cho những người yêu thích sự quý phái và lịch lãm.'),
(24, 'Violon-STV-950', 'violin', 14686000, 'Violon-STV-950-4-4-94,686,000jpg.jpg', 78, 'Chiếc violin này không chỉ là một công cụ âm nhạc, mà còn là một cầu nối giữa người chơi và vũ trụ. Âm thanh tinh tế và tầm nhìn thiên nhiên độc đáo, nó tạo ra một trải nghiệm âm nhạc độc đáo.'),
(25, 'Violin-STV-950', 'violin', 16080000, 'Violon-STV-950-86,080,000.jpg', 99, 'Với sự kết hợp của các gam màu huyền bí như ánh sáng bắt gặp ở cực Bắc, chiếc violin này không chỉ là một công cụ âm nhạc mà còn là một tác phẩm nghệ thuật sống động và độc đáo.'),
(26, 'William-Lewis', 'violin', 19800000, 'william-lewis-25,800,000.jpg', 142, 'Mỗi chiếc violin trong loạt này đều phản ánh sức mạnh và năng lượng của loài chim hỏa lực. Với âm thanh mạnh mẽ và ngoại hình sáng bóng, nó là sự lựa chọn cho những buổi biểu diễn sôi động.'),
(27, 'William-WL17e14', 'violin', 17150000, 'william-lewis-wl17e14ch1-13,150,000.jpg', 145, 'Với sự kết hợp của chất liệu cao cấp và âm thanh quý phái, chiếc violin này là biểu tượng của sự quyền lực và uyển chuyển. Cho phép người chơi tỏa sáng trên sân khấu với phong cách độc đáo và tinh tế.'),
(28, 'Fender-PM-1-NE', 'guitar', 5600000, 'dan-guitar-Fender-PM-1-Dreadnought-NE.jpg', 233, 'Một chiếc guitar acoustics với vẻ ngoại hình thanh lịch và âm thanh trầm ấm, là sự kết hợp hoàn hảo giữa phong cách cổ điển và hiện đại.'),
(29, 'Tanglewood', 'guitar', 6240000, 'dan-guitar-tanglewood-twbb-sfce(6.240.000).jpg', 156, 'Được thiết kế cho những người chơi hiện đại, chiếc guitar điện này không chỉ nổi bật với vẻ ngoại hình đương đại mà còn cung cấp âm thanh mạnh mẽ và độ linh hoạt cao.'),
(30, 'DBT_SFCE_SB', 'guitar', 3900000, 'dbt_sfce_sb_g(6.900.000).jpg', 178, 'Cho âm thanh đặc trưng của blues, chiếc resonator guitar này là sự kết hợp tuyệt vời giữa kiểu dáng retro và khả năng thể hiện cảm xúc sâu sắc.'),
(31, 'Fender CD60s', 'guitar', 4200000, 'Fender CD60s.jpg', 291, 'Thiết kế đặc trưng của guitar jazz, với hình dáng archtop, chiếc này tạo ra âm thanh mềm mại và phù hợp cho những giai điệu jazz truyền thống.'),
(32, 'Fender-Player-Plus', 'guitar', 10270000, 'fender-player-plus-stratocaster-10-27,000,000.jpg', 301, 'Nhỏ gọn và di động, chiếc travel guitar này là sự lựa chọn hoàn hảo cho những người yêu thích âm nhạc và phiêu lưu. Dù nhỏ gọn, nó vẫn mang đến âm thanh đặc trưng và tốt.'),
(33, 'Taylor-Academy12', 'guitar', 8750000, 'guitar-Taylor-Academy-12-N(18.750.000).jpg', 437, 'Thiết kế dành riêng cho âm nhạc flamenco, chiếc guitar với dây nylon này có âm thanh sống động và là sự kết hợp tinh tế giữa vẻ ngoại hình và chất âm.'),
(34, 'Taylor_317E', 'guitar', 7500000, 'taylor_317E.jpg', 222, 'Cho những người chơi rock, chiếc semi-hollowbody này không chỉ thu hút với vẻ ngoại hình cá tính mà còn mang đến âm thanh mạnh mẽ và độ sustain lâu dài.'),
(35, 'Taylor-412CE', 'guitar', 8250000, 'taylor-412ce.jpg', 303, 'Được thiết kế đặc biệt cho những giai điệu dân ca và folk, chiếc guitar này mang đến âm thanh ấm áp và làm cho mọi buổi biểu diễn trở nên gần gũi hơn.'),
(36, 'TWCR_O_TG', 'guitar', 3100000, 'twcr_o_tg(3.000.000).jpg', 167, 'Với khả năng thích ứng đa dạng, chiếc guitar này là lựa chọn linh hoạt cho những người chơi muốn thử sức ở nhiều thể loại âm nhạc khác nhau, từ pop đến metal.'),
(37, 'Casio-CDP-S160', 'piano', 16120000, 'casio-cdp-s160-16,120,000.jpg', 324, 'Chiếc grand piano này không chỉ là một công cụ âm nhạc, mà còn là một tác phẩm nghệ thuật với vẻ ngoại hình sang trọng và âm thanh mạnh mẽ. Là sự lựa chọn tuyệt vời cho các buổi biểu diễn lớn.'),
(38, 'Piano-Điện-Casio-AP', 'piano', 30980000, 'dan-piano-dien-casio-ap-470-30,980,000.jpg', 101, 'Thiết kế hiện đại và tính năng kỹ thuật số tiên tiến, chiếc digital piano này cung cấp không chỉ âm thanh chất lượng mà còn linh hoạt cho việc sáng tác và biểu diễn hiện đại.'),
(39, 'Piano Điện-FP-60X', 'piano', 34700000, 'dan-piano-dien-roland-fp-60X-34,700,000.jpg', 123, 'Với kích thước nhỏ gọn, chiếc studio piano này phù hợp cho cả không gian gia đình và phòng thu âm. Âm thanh tinh tế và kiểu dáng truyền thống làm nổi bật nó.'),
(40, 'P điện-Roland-rp30', 'piano', 69000000, 'dan-piano-dien-roland-rp30-chinh-hang-400x400-20,690,000.jpg', 96, 'Được tạo ra với kích thước nhỏ hơn, chiếc mini grand piano này vẫn giữ lại vẻ đẹp và âm thanh của một grand piano lớn. Làm nổi bật trong không gian nhỏ.'),
(41, 'Kawai-K300', 'piano', 42000000, 'dan-piano-kawai-k300-mau-den-sang-trong-180,000,000.jpg', 228, 'Kết hợp giữa công nghệ kỹ thuật số và cơ học truyền thống, chiếc hybrid piano này mang đến trải nghiệm âm nhạc độc đáo với sự linh hoạt của digital và chất âm ấm áp của cơ học.'),
(42, 'Kawai-K800', 'piano', 86000000, 'dan-piano-kawai-k800-286,000,0001.jpg', 258, 'Chiếc grand piano trong suốt với thiết kế độc đáo là một tác phẩm nghệ thuật thực sự. Khám phá sự đẹp tinh tế của cơ học piano từ mọi góc nhìn.'),
(43, 'Kawai-ND21', 'piano', 95100000, 'dan-piano-kawai-nd21-chinh-hang-400x400-95,100,000.jpg', 333, 'Với tính năng tự động chơi nhạc, chiếc player piano này là sự kết hợp hoàn hảo giữa sự tiện ích và vẻ ngoại hình thanh lịch, cho phép người chơi tận hưởng âm nhạc mọi lúc.'),
(45, 'Roland-501R', 'piano', 36820000, 'piano-roland-501r-mau-den-36,820,000.jpg', 54, 'Với vẻ ngoại hình cổ điển và âm thanh ấm áp, chiếc upright piano này là lựa chọn tuyệt vời cho những người yêu thích không khí cổ điển và lãng mạn.'),
(46, 'Piano-Kawai-K15E', 'piano', 17000000, 'piano-kawai-k15e-87,000,000.jpg', 289, 'Nhỏ gọn và dễ mang theo, chiếc portable piano này là sự lựa chọn lý tưởng cho những người muốn tập luyện âm nhạc mọi nơi.'),
(47, 'Kawai-k300 nâu', 'piano', 45000000, 'kawai-k-300-mau-nau-185,000,000.jpg', 245, 'Chiếc concert piano này không chỉ đẹp mắt mà còn có khả năng tự chơi nhạc với chất âm tuyệt vời, tạo ra không khí của một buổi hòa nhạc trực tiếp trong không gian cá nhân.'),
(48, 'Meinl-MCAJ100', 'cajon', 2200000, 'Meinl-MCAJ100.jpg', 356, 'Với thiết kế chắc chắn và âm thanh độc đáo, chiếc cajon này là công cụ tuyệt vời cho các nghệ sĩ chuyên nghiệp và người mới bắt đầu. Đặc biệt thích hợp cho việc thám hiểm âm nhạc với nhiều loại nhịp.'),
(49, 'Meinl-MCAJ100VBK', 'cajon', 3200000, 'Meinl-MCAJ100VBK(3.200.000).jpg', 211, 'Cajon này mang đến âm thanh động lực và có dây đàn snare để tạo ra những giai điệu với nhịp mạnh mẽ. Là lựa chọn lý tưởng cho những buổi biểu diễn đô thị và âm nhạc hiện đại.'),
(50, 'Meinl-MCAJ300BK-MA', 'cajon', 4100000, 'Meinl-MCAJ300BK-MA(4.100.000).jpg', 184, 'Với chất liệu gỗ tự nhiên và việc làm thủ công tinh xảo, chiếc cajon này không chỉ có vẻ ngoại hình đẹp mắt mà còn mang đến âm thanh ấm áp và tự nhiên.'),
(51, 'Meinl-SC80DE', 'cajon', 2550000, 'Meinl-SC80de(2.550.000).jpg', 48, 'Lấy cảm hứng từ âm nhạc Latin, chiếc cajon này có thiết kế đặc biệt để tạo ra những âm thanh và nhịp điệu phong cách flamenco đặc trưng.'),
(52, 'Meinl-SC100HA', 'cajon', 3000000, 'Meinl-SC100HA.jpg', 159, 'Đối với những người muốn trải nghiệm âm thanh thuần túy của cajon mà không có dây đàn snare, chiếc cajon này mang đến trải nghiệm âm nhạc tinh tế và tao nhã.'),
(53, 'Nino-Cajon', 'cajon', 2850000, 'nino-cajon-400x400-2,850,000.jpg', 311, 'Nhỏ gọn và dễ di chuyển, chiếc cajon này là sự lựa chọn tốt cho những người muốn thực hành âm nhạc mọi nơi. Dù nhỏ, nó vẫn cung cấp âm thanh phong phú và đa dạng.'),
(54, 'Roland-ELCajon-EC-10', 'cajon', 4900000, 'Roland-ELCajon-EC-10-300x300(12.490.000).jpg', 89, 'Sử dụng chất liệu tre, chiếc cajon này không chỉ là một công cụ âm nhạc mà còn là sự cam kết với bảo vệ môi trường. Âm thanh tự nhiên và thiết kế độc đáo.'),
(55, 'Meinl-MCA300BK-RCB', 'cajon', 4100000, 'Meinl-MCAJ300BK-RCB(4.100.000).jpg', 212, 'Lấy cảm hứng từ di sản Peru, chiếc cajon này mang đến âm thanh truyền thống và phong cách chơi độc đáo của nhạc cajon gốc.'),
(56, 'Alexis_command', 'drum', 25100000, 'alesis_command_mesh_kit-25,100,000.jpg', 43, 'Thiết kế chuyên nghiệp và âm thanh chính xác, bộ trống này là sự lựa chọn hàng đầu cho các nghệ sĩ chuyên nghiệp. Cung cấp khả năng điều chỉnh linh hoạt và chất lượng âm thanh tuyệt vời.'),
(57, 'alesis_surge', 'drum', 16910000, 'alesis_surge_mesh_kit-16,910,000.jpg', 34, 'Đối với những người chơi muốn thực hiện âm nhạc hiện đại, bộ trống điện tử này cung cấp nhiều âm thanh và hiệu ứng khác nhau, làm cho mọi buổi biểu diễn trở nên sôi động.'),
(58, 'ALESIS-CRIMSON-II-SE', 'drum', 29300000, 'ALESIS-CRIMSON-II-SE-29,300,000.jpg', 74, 'Lấy cảm hứng từ âm nhạc thập niên 70, bộ trống này mang lại không khí retro với âm thanh đậm chất cổ điển.'),
(59, 'Alexis-turbo-mesh-kit', 'drum', 19450000, 'alesis-turbo-mesh-kit-9,450,000.jpg', 79, 'Với thiết kế nhỏ gọn, dễ di chuyển, bộ trống này là lựa chọn tốt cho những người muốn thực hành mọi nơi mà không cần giảm chất lượng âm thanh.'),
(60, 'Odery-Cafekit-BS', 'drum', 12490000, 'odery-cafekit-bs-trong-bo-mau-blue-sparkle-finish-12,490,000.jpg', 52, 'Được tối ưu hóa cho các giai điệu jazz và fusion, bộ trống này cung cấp âm thanh tinh tế và đa dạng để biểu diễn các loại nhạc khác nhau.'),
(61, 'Roland-td-07kv', 'drum', 30650000, 'roland-td-07kv-30,650,000.jpg', 19, 'Sử dụng công nghệ thông minh, bộ trống này kết hợp giữa truyền thống và hiện đại. Có khả năng kết nối với các thiết bị điện tử và ứng dụng để tùy chỉnh âm thanh.'),
(62, 'Roland-TD-17KL', 'drum', 36680000, 'roland-td-17kl-36,680,000.jpg', 23, 'Với bass mạnh mẽ và snare sắc nét, bộ trống này là sự lựa chọn tuyệt vời cho những buổi biểu diễn rock sôi động và mạnh mẽ.'),
(63, 'Roland-TD-1DMK', 'drum', 23000000, 'trong-dien-tu-roland-td-1dmk-23,000,000.jpg', 63, 'Mỗi chiếc trống trong bộ sưu tập này đều được vẽ tay, tạo ra một bức tranh âm nhạc và nghệ thuật độc'),
(64, 'Pearl-roadshow-505', 'drum', 12450000, 'trong-pearl-roadshow-505-12,450,000.jpg', 78, 'Đầy đủ các loại trống Latin, bộ trống này mang đến âm thanh nồng nàn và mô phỏng các nhịp điệu truyền thống của âm nhạc Latin.'),
(65, 'Pearl-525-standard', 'drum', 12450000, 'trong-pearl-roadshow-525-standard-12,450,000.jpg', 45, 'Với các âm thanh và giai điệu phong phú, bộ trống này là lựa chọn tốt cho những người muốn tạo ra các nhịp điệu và giai điệu độc đáo trong nhiều thể loại âm nhạc khác nhau.'),
(66, 'Boss-es5', 'effect', 15090000, 'boss-es5-15,090,000.jpg', 167, 'Pedal hiệu ứng distortion DS-1 của Boss là một trong những pedal distortion phổ biến nhất trên thị trường. Với âm thanh mạnh mẽ và đặc trưng, nó là lựa chọn lý tưởng cho những người chơi muốn thêm độ nặng vào âm nhạc của mình.'),
(67, 'Boss-es8', 'effect', 23480000, 'boss-es8-23,480,000.jpg', 145, 'DD-7 là pedal delay kỹ thuật số của Boss, mang đến khả năng điều chỉnh linh hoạt, âm thanh delay sáng tạo và tính năng looper tiện lợi.'),
(68, 'Boss-GT1', 'effect', 7500000, 'boss-GT1-7,500,000.jpg', 98, 'Với khả năng tạo ra âm thanh chorus phong phú và ấm áp, pedal hiệu ứng CE-5 là lựa chọn tuyệt vời cho việc thêm sự phong phú vào âm nhạc của bạn.'),
(69, 'Boss-GX-100', 'effect', 17640000, 'boss-gx-100-17,640,000.jpg', 79, 'MT-2 là pedal distortion được thiết kế đặc biệt cho âm nhạc heavy metal. Với khả năng tinh chỉnh cao cấp, nó mang lại âm thanh mạnh mẽ và sắc nét.'),
(70, 'Boss-VE2', 'effect', 5590000, 'Boss-VE2-5,590,000.jpg', 141, 'Là một phiên bản nâng cấp của pedal blues driver kinh điển. Với chất âm ấm áp và khả năng tinh chỉnh linh hoạt, nó Là sự kết hợp hoàn hảo giữa cổ điển và hiện đại.'),
(71, 'Boss-VE5rd', 'effect', 5900000, 'boss-ve5rd-5,900,000.jpg', 189, 'Mang lại khả năng điều khiển wah linh hoạt và độ nhạy động cao, làm cho mọi đợt chơi đều sống động.'),
(72, 'Zomm-AC-2', 'effect', 5880000, 'zomm-AC-2-5,880,000.jpg', 56, 'Với khả năng tạo ra âm thanh octave mạnh mẽ và đa dạng. Với chế độ Polyphonic, nó cho phép bạn chơi nhiều nút đồng thời mà không mất độ sáng tạo.'),
(73, 'Zoom-AC-3', 'effect', 8700000, 'zoom-ac-3-8,700,000.jpg', 178, 'RV-6 là pedal reverb kỹ thuật số của Boss, mang lại âm thanh reverb đa dạng từ không gian tự nhiên đến các hiệu ứng reverb sáng tạo.'),
(74, 'ZOOM-G2Four-G2XFour', 'effect', 5990000, 'ZOOM-G2Four-G2XFour-5,990,000.jpg', 99, 'Mang đến âm thanh tremolo ấn tượng và hiệu ứng dao động mạnh mẽ. Với tính năng Rate và Depth, nó giúp bạn tạo ra những hiệu ứng dao động linh hoạt.'),
(75, 'Zoom-G5N', 'effect', 8880000, 'zoom-G5n-8,880,000.jpg', 189, 'Mang lại âm thanh blues ấm áp và dễ điều chỉnh. Là lựa chọn phổ biến cho nhiều người chơi guitar.'),
(76, 'Zoom-msm-1', 'effect', 8690000, 'zoom-msm-1-mic-stand-for-q4-and-q8-690,000.jpg', 167, 'Với các điều chỉnh như Frequency, Resonance, và Decay, nó mở ra một thế giới mới của hiệu ứng âm thanh synth. Là sự kết hợp hoàn hảo giữa khả năng điều chỉnh linh hoạt và sự sáng tạo trong âm nhạc synth.'),
(77, 'Amp', 'amplifier', 36440000, '2171000010-amp-400x400-56,440,000.jpg', 17, 'Với âm thanh ấm áp và độ chi tiết cao, ampli Fender &#39;65 Deluxe Reverb là lựa chọn lý tưởng cho người chơi guitar yêu thích âm nhạc blues và rock.'),
(78, 'Acus-One-8-Simon', 'amplifier', 32570000, 'acus-one-forstring-8-simon-400x400-32,570,000.jpg', 20, 'Là một ampli đa kênh với khả năng high gain mạnh mẽ, phù hợp cho những người chơi muốn tạo ra âm thanh hard rock và heavy metal.'),
(79, 'Acus-One-6t-Simon', 'amplifier', 24890000, 'amplifier-acus-one-forstring-6t-simon-wood-2-400x400(24,890,000).jpg', 26, 'Là một combo amplifier nổi tiếng, mang đến âm thanh chất lượng và đa dạng. Phù hợp cho nhiều thể loại âm nhạc từ pop đến rock.'),
(80, 'Acus-Stage-Sub-500', 'amplifier', 29229000, 'amplifier-acus-stage-sub-500-wood-1-400x400-400x400(29,229,000).jpg', 30, 'Một ampli combo có kích thước nhỏ gọn nhưng mạnh mẽ. Với nhiều hiệu ứng tích hợp, nó là sự lựa chọn tốt cho việc thực hành và biểu diễn.'),
(81, 'BOSS_ACS-LIVE', 'amplifier', 12260000, 'BOSS_ACS-LIVE_LT-400x400(12,260,000.jpg', 35, 'Một ampli model hóa đa năng, mang đến không gian âm thanh rộng lớn và khả năng mô phỏng nhiều loại ampli và hiệu ứng.'),
(82, 'Fender-Acoustic', 'amplifier', 11730000, 'fender-acoustic-junior-400x400()11,730,000.jpg', 41, 'Một ampli bass mạnh mẽ với âm thanh ấm và sâu, là lựa chọn hàng đầu cho các bassist chuyên nghiệp.'),
(83, 'Fender-Pro-Junior', 'amplifier', 18210000, 'fender-pro-junior-iv-450x471(18,210,000).jpg', 21, 'Một ampli acoutic chất lượng cao, mang lại âm thanh tự nhiên và linh hoạt cho guitar và các nhạc cụ acoutic khác.'),
(84, 'Audix_ADX20ip', 'mic', 3200000, 'Audix_ADX20ip_7,200,000.png', 89, 'Là một micro dynamic chất lượng cao, phổ biến trong ngành công nghiệp âm nhạc và ghi âm. Với độ nhạy cao và khả năng chống nhiễu tốt, nó là lựa chọn lý tưởng cho việc thu âm giọng hát và nhạc cụ.'),
(85, 'Audix_ADX51', 'mic', 6500000, 'Audix_ADX51_6,500,000.png', 67, 'Là một micro condenser chất lượng với âm thanh mạnh mẽ và chi tiết. Thiết kế nhỏ gọn và giá cả hợp lý, là sự lựa chọn phổ biến cho việc ghi âm và phát sóng.'),
(86, 'Audix_f9', 'mic', 3600000, 'Audix_f9_3,600,000.png', 60, 'Là micro dynamic với hình dạng cardioid, tạo ra âm thanh rõ ràng và chống larsen tốt. Là lựa chọn phổ biến cho biểu diễn trực tiếp và thu âm phòng thu.'),
(87, 'Audix_M1250B', 'mic', 2060000, 'Audix_M1250B_12,060,000.png', 98, 'Là micro USB tiện ích cho ghi âm trực tiếp vào máy tính. Với chất âm studio-quality và khả năng kết nối dễ dàng, nó là sự lựa chọn tốt cho podcasting và ghi âm tại nhà.'),
(88, 'Inter-CSB-12K', 'mic', 9300000, 'inter-m-csb-12k-20,930,000.jpg', 56, 'Là một loa nhỏ với âm thanh mạnh mẽ. Với kích thước nhỏ gọn, nó thích hợp cho việc nghe nhạc chất lượng trong không gian hạn chế.'),
(89, 'Audix_ADX60', 'mic', 6590000, 'Audix_ADX60_6,590,000.png', 87, 'Là một loa Bluetooth nhỏ gọn, nhưng cung cấp âm thanh mạnh mẽ và chất lượng. Phù hợp cho việc nghe nhạc di động và ngoại ô.'),
(90, 'Array-Inter-M-CLA-5K', 'mic', 12260000, 'Loa-Line-Array-Inter-M-CLA-5K-22,260,000.png', 134, 'Là loa kệ tích hợp ampli, có thiết kế đẹp và âm thanh chi tiết. Thích hợp cho việc nghe nhạc và xem phim trong không gian gia đình.'),
(91, 'SOUNDKING-G210A', 'mic', 15500000, 'SOUNDKING-G210A-25,500,000.jpg', 71, 'Là một studio monitor có công suất, mang đến âm thanh chính xác và độ phân giải cao. Với thiết kế nhỏ gọn, nó là lựa chọn lý tưởng cho việc thu âm và mix trong môi trường phòng thu nhỏ.'),
(92, 'Organ-Casio-CT-x3000', 'organ', 6990000, 'dan-organ-casio-ct-x3000-1(6.990.000).jpg', 59, 'Là một trong những cây đàn organ nổi tiếng nhất và được biết đến với âm thanh mạnh mẽ và linh hoạt. Với bàn phím waterfall và cổ điển, nó là lựa chọn lý tưởng cho nhạc jazz, blues và rock.'),
(93, 'Yamaha-PSR-EW410', 'organ', 9990000, 'dan-organ-Yamaha-PSR-EW410(10.990.000).jpg', 91, 'Llà một cây đàn organ điện tử đa năng với nhiều tính năng và âm thanh đa dạng. Thiết kế nhỏ gọn và trọng lượng nhẹ, là sự lựa chọn cho các nghệ sĩ di chuyển nhiều.'),
(94, 'Organ-Casio-CT-S200', 'organ', 3870000, 'organ-casio-ct-s200(3.870.000).jpg', 81, 'Mang đến âm thanh organ vintage cổ điển. Với khả năng mô phỏng chân thực và hiệu ứng vintage, nó là sự kết hợp hoàn hảo giữa công nghệ hiện đại và âm nhạc cổ điển.'),
(95, 'Casiotone-CT-S400', 'organ', 6500000, 'organ-Casiotone-CT-S400(6.500.000).jpg', 72, 'Là một cây đàn organ điện tử chất lượng cao, với khả năng tái tạo âm thanh organ cổ điển. Với bàn phím waterfall và tính năng drawbar điều chỉnh, nó là lựa chọn phổ biến trong cộng đồng organists.'),
(96, 'Yamaha-PSR-F52', 'organ', 4100000, 'organ-Yamaha-PSR-F52.jpg', 69, 'Là một cây đàn organ kỷ niệm thập kỷ &#39;70s, mang đến âm thanh huyền bí của thập kỷ đó. Với công nghệ đa điều khiển, nó là sự kết hợp giữa kiểu dáng retro và hiện đại.'),
(97, 'Yamaha-PSR-E273', 'organ', 4320000, 'Yamaha-PSR-E273.jpg', 132, 'Là một cây đàn organ vintage nổi tiếng với âm thanh sáng tạo. Được sử dụng rộng rãi trong âm nhạc pop và rock, nó mang đến sự độc đáo và cá tính.'),
(98, 'Yamaha-PSR-E373', 'organ', 4500000, 'Yamaha-PSR-E373.jpg', 61, 'Là một cây đàn organ di động với âm thanh tự nhiên và tính linh hoạt. Với kích thước nhỏ gọn, nó là sự lựa chọn tốt cho việc biểu diễn và di chuyển.'),
(99, 'Yamaha-PSR-E473', 'organ', 8090000, 'Yamaha-PSR-E473(9.090.000).jpg', 43, 'Là một cây đàn organ kỹ thuật số với âm thanh mô phỏng chân thực và nhiều tính năng hiện đại. Thiết kế đẹp và chất âm tốt, là lựa chọn cho nhiều nghệ sĩ.'),
(100, 'Yamaha-SX600', 'organ', 11000000, 'Yamaha-SX600(21.000.000).jpg', 88, 'Là một cây đàn piano kỹ thuật số với tính năng organ điện tử. Với thiết kế nhỏ gọn, nó mang lại trải nghiệm âm nhạc đa dạng cho người chơi.'),
(101, 'N510JBBK', 'saxophone', 1860000, '-n510jbbk-1,860,000.jpg', 147, 'Chất lượng cao, nổi tiếng với âm thanh ấm áp và linh hoạt. Được thiết kế cho cả người mới học và nghệ sĩ chuyên nghiệp.'),
(102, 'NUVO-N510JBGN', 'saxophone', 1860000, 'nuvo-n510jbgn-1,860,000.jpg', 58, 'Là một cây saxophone tenor mang đến âm thanh đậm chất jazz. Với thiết kế vintage và chất âm độc đáo, nó là sự lựa chọn cho những người yêu thích âm nhạc jazz cổ điển.'),
(103, 'Nuvo-SE200FBL', 'saxophone', 6199999, 'Nuvo-SE200FBL-3,620,000.jpg', 79, 'Là một cây saxophone alto với độ chính xác cao và âm thanh mạnh mẽ. Thiết kế chất lượng và tính linh hoạt cao, là lựa chọn cho nghệ sĩ đa dạng.'),
(104, 'Selmer-AS600L', 'saxophone', 4800000, 'selmer-as600l-44,800,000.jpg', 79, 'Là một cây saxophone tenor với hình dạng còi lớn, tạo ra âm thanh mạnh mẽ và sáng tạo. Với thiết kế độc đáo, nó thu hút sự chú ý của nghệ sĩ.'),
(105, 'Selmer-AS650', 'saxophone', 25000000, 'selmer-as650-25,000,000.jpg', 171, 'Là một cây saxophone soprano chuyên nghiệp với âm thanh tinh tế và đa dạng. Thiết kế đẹp và chất lượng âm thanh cao, là lựa chọn cho những người chơi.'),
(106, 'Selmer-AS655', 'saxophone', 5800000, 'selmer-as655-23,800,000.jpg', 59, 'Là một cây saxophone alto với âm thanh ấm áp và độ ổn định cao. Được thiết kế cho người chơi trung cấp và cao cấp.'),
(107, 'Selmer-SS600', 'saxophone', 4000000, 'selmer-ss600-40,000,000.jpg', 69, 'Là một cây saxophone tenor với thiết kế ultralight, mang đến trải nghiệm chơi nhẹ nhàng và linh hoạt. Âm thanh ấm áp và tinh tế.'),
(108, 'Selmer-TS650', 'saxophone', 3100000, 'Selmer-TS650-34-200-000.jpg', 162, 'à một cây saxophone alto dành cho người học, với giá cả hợp lý và chất lượng âm thanh đáng kinh ngạc. Là sự lựa chọn phổ biến trong cộng đồng sinh viên và người mới học.'),
(109, 'Fender-Venice1', 'ukulele', 1600000, 'fender-venice-soprano-ukulele-4-2,600,000.jpg', 347, 'Là một cây ukulele soprano phổ biến, được biết đến với âm thanh tươi sáng và giá trị tốt. Với thiết kế đơn giản và chất âm tốt, nó là sự lựa chọn cho cả người mới học và người chơi kinh nghiệm.'),
(110, 'Deviser-UK-21-30', 'ukulele', 1270000, 'ukulele-deviser-uk-21-30(1.070.000).jpg', 461, 'Là một cây ukulele soprano với thiết kế hiện đại và âm thanh vui tươi. Dễ chơi và mang lại trải nghiệm âm nhạc thoải mái, là sự lựa chọn cho những người yêu thích phong cách hiện đại.'),
(111, 'Fender-Venice2', 'ukulele', 1320000, 'fender-venice-soprano-ukulele-450x471.jpg', 411, 'Là một cây ukulele concert với âm thanh ấm áp và kiểu dáng sang trọng. Với độ chính xác trong sản xuất và vật liệu chất lượng, nó là lựa chọn phổ biến cho người chơi ukulele nâng cao.'),
(112, 'Deviser-UK-21-50', 'ukulele', 1070000, 'ukulele-deviser-uk-21-50(1.070.000).jpg', 312, 'Là một cây ukulele concert với họa tiết in hình xăm độc đáo. Với âm thanh tốt và vẻ ngoại hình độc đáo, nó thu hút sự chú ý của những người muốn sở hữu một chiếc ukulele có phong cách riêng.'),
(113, 'Deviser-UK-24-50', 'ukulele', 1280000, 'ukulele-deviser-uk-24-50(1.280.000).jpg', 250, 'Là một cây ukulele soprano dành cho người mới học, với giá trị phù hợp và chất âm vui tươi. Thiết kế nhẹ nhàng và dễ sử dụng, là lựa chọn phổ biến trong cộng đồng người chơi ukulele mới.'),
(114, 'DS_XES0942', 'khac', 275000, 'ds_xse0942_275,000.png', 4623, 'Chất lượng hàng đầu với phụ kiện chính hãng.'),
(115, 'DS_XSE1046', 'khac', 275000, 'ds_xse1046_275,000.png', 4123, 'Chất lượng hàng đầu với phụ kiện chính hãng.'),
(116, 'Dây đeo guitar', 'khac', 330000, 'fender-day-deo-guitar-mono-leather-blk-0990681006-01-1,330,000.jpg', 1324, 'Chất lượng hàng đầu với phụ kiện chính hãng.'),
(117, 'Dây tín hiệu-dnb', 'khac', 560000, 'fender-day-tin-hieu-10-dnb-0990510003-560,000.jpg', 4131, 'Chất lượng hàng đầu với phụ kiện chính hãng.'),
(118, 'Dây tín hiệu-sfg', 'khac', 560000, 'fender-day-tin-hieu-10-sfg-0990510058-01-560,000jpg.jpg', 3214, 'Chất lượng hàng đầu với phụ kiện chính hãng.'),
(119, 'Phụ kiện Guitar', 'khac', 210000, 'fender-phu-kien-guitar-slide-0992300001-210,000.jpg', 1234, 'Chất lượng hàng đầu với phụ kiện chính hãng.'),
(120, 'Selmer-S401C1', 'khac', 489000, 'selmer-s401c1-5,489,000.jpg', 324, 'Chất lượng hàng đầu với phụ kiện chính hãng.'),
(121, 'Selmer-Y37076', 'khac', 586000, 'selmer-y37076-5,686,000.jpg', 312, 'Chất lượng hàng đầu với phụ kiện chính hãng.'),
(122, 'abc', 'piano', 665555, 'piano-roland-501r-mau-den-36,820,000.jpg', 432, 'Kết hợp giữa công nghệ kỹ thuật số và cơ học truyền thống, chiếc hybrid piano này mang đến trải nghiệm âm nhạc độc đáo với sự linh hoạt của digital và chất âm ấm áp của cơ học.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `password`, `address`, `create_date`) VALUES
(1, 'abcd', 'congtuong0411@gmail.com', '1234', '123', '1, 1, An Lợi Tây, Đại Nghĩa, Đại Lộc, Quảng Nam, Việt Nam - 123456', '2024-01-21 01:34:13'),
(3, 'sa', 'tuong01669543687@gmail.com', '987', '123', '5435, 324324, 324324, 3243, 243, ewrrwf, sdfsd - 123455', '2023-12-24 03:08:57'),
(4, 'sa', 'ads@gmail.com', '1223', '123', 'sdfsd, rưe, fdsf, sdfsd, sdf, fsdf, sdfsd - 4', '2023-11-28 01:34:13'),
(5, 'dádsa', 'dasdas@gamil', '3432', '111', '', '2023-10-24 17:00:00'),
(6, 'Thắng ', 'abc@gmail', '123', '123', 'ưqew, qưewq, eqwe, ưqe, ưqe, qưe, qưeqw - 123', '2023-10-04 01:38:12'),
(7, 'Phi', 'phi@gmail.com', '342', '123', '', '2023-10-25 02:00:06'),
(8, 'Tên Người Dùng Mới', 'emailmoi@example.com', '12312', '123', 'ưqdasas', '2023-10-03 20:00:00'),
(9, 'abcde', 'congtuong@gmail.com', '432', '123', '', '2024-01-02 02:16:36'),
(10, 'Trần Công Tường', 'vn@gmail.com', '123423', '123', '', '2024-01-03 02:19:11'),
(20, 'abcde', 'abcde@gmail.com', '232143', '123', '', '2023-11-28 14:24:36'),
(21, 'okeconcho', 'dfsfiosjd@gmail', '31241', '123', '', '2023-11-28 14:28:49'),
(22, 'abcd', '3213@gmail', '231', '123', '', '2024-01-02 14:35:05'),
(23, 'admin', 'congtg0411@gmail.com', '123231', '123', '', '2024-01-02 14:37:58'),
(24, 'abcd1323', 'qweqwdas@gmail', '34234', '123', '', '2023-12-19 14:38:29'),
(25, 'sadsadsa', 'sadasd@gmail', '2131241', '123', 'ewqe, ưqewq, qưe, ưqewq, ưqe, ưqewq, ưqe - 543', '2023-12-05 06:27:21'),
(26, 'đấ', 'hehe@gmail.com', '1233123', '123', '', '2023-12-09 15:19:30'),
(27, 'đại ka', 'oke@gmail', '231231', '123', '', '2023-12-09 15:29:45'),
(28, 'Huy', 'huyll@gmail.com', '3213134', '1234', '', '2023-12-13 07:42:13'),
(29, 'rewf', 'hehege@gmail.com', '131243241', '123', 'sdfsd, 21312, 312321, 321312, 312, fsdf, sdfsfdf - 213', '2023-12-22 12:46:46'),
(30, 'èwefsdfs', 'abcefgh@gmail.com', '1234324', '123', '5435, đá, ádasd, ádas, đâs, đá, sadasda - 123', '2024-01-22 12:57:37'),
(31, 'metvl', 'metvl@gmail.com', '4324232', 'Co123456', '', '2024-01-04 06:20:56'),
(32, 'lanhai', 'lanhai@gmail.com', '43213', 'Lanhai123', '', '2024-01-04 06:21:39'),
(33, 'okeeeee', 'vvx@gmailc.com', '12321342', 'Congtuong044', 'dqwd, ádas, dá, dá, đá, sad, sadas - 12312', '2024-01-04 06:47:05');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pid` (`pid`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
