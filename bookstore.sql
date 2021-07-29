-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 29, 2021 lúc 05:39 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `info_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviews` int(11) NOT NULL DEFAULT 5,
  `weight` double(8,2) DEFAULT NULL,
  `NXB` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `user_id`, `name`, `author`, `code`, `category`, `price`, `quantity`, `description`, `image`, `reviews`, `weight`, `NXB`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 1, 'Harry Porter', 'J. K. Rowling', 'BOOK_01', 'Sách mới nhất', 140000.00, 100, 'Horror', '277fa65c176e3551a6bd0ffd05083265.jpg', 1, 1.50, 'Bloomsbury', 1, '2021-07-02 11:22:56', '2021-07-02 11:22:56', 1),
(2, 1, 'Ngữ Văn 11 Tập 1', 'None', 'BOOK_02', 'Sách giáo khoa', 31000.00, 20, 'Sách giáo khoa Ngữ văn lớp 11 Tập 1', '20210702183014.jpg', 5, 5.00, 'NXB giáo dục', 1, '2021-07-02 11:30:14', '2021-07-02 11:30:14', 2),
(3, 1, 'Mắt biếc', 'Nguyễn Nhật Ánh', 'BOOK_03', 'Văn học trong nước', 31000.00, 20, 'Truyện Mắt Biếc của tác giả Nguyễn Nhật Ánh', '20210702183119.jpg', 5, 5.00, 'NXB Trẻ', 1, '2021-07-02 11:31:19', '2021-07-02 11:31:19', 3),
(4, 1, 'Mỗi lần vấp ngã là một lần trưởng thành', 'Liêu Trí Phong', 'BOOK_04', 'Văn học nước ngoài', 95000.00, -4, 'Trong cuộc đời, mỗi chúng ta dù ít dù nhiều đều đã từng trải qua những thời khắc khó khăn, đau khổ. Đặc biệt đối với những bạn rời xa vòng tay che chở, bao bọc của cha mẹ và nhà trường, bước chân vào xã hội, bạn sẽ gặp phải rất nhiều trở ngại và nhận ra xã hội ngày vốn không hề đơn giản như bạn tưởng tượng.', '20210704022240.png', 5, 4.00, 'NXB Thanh Niên', 1, '2021-07-03 19:22:40', '2021-07-27 22:21:37', 4),
(6, 1, 'Cây cam ngọt của tôi', 'José Mauro de Vasconcelos', 'BOOK_05', 'Văn học nước ngoài', 86000.00, 20, 'CÂY CAM NGỌT CỦA TÔI - José Mauro de Vasconcelos\r\n\r\nCuốn tiểu thuyết mang màu sắc tự  này có gì đặc biệt mà được đưa vào chương trình tiểu học của Brazil ?\r\n\r\nỞ \"Cây cam ngọt của tôi\", độc giả có thể bắt gặp nét tinh nghịch  \" Anne tóc đỏ dưới chái nhà xanh\", những câu chuyện vui vẻ như \"Lại thằng nhóc Emil \" nhưng cũng không kém động, trăn trở với một đứa trẻ sớm phải ôm nỗi buồn của người  như \"Hoàng tử bé\"', '20210704030317.jpg', 5, 5.00, 'Nhà Xuất Bản Hội Nhà Văn', 1, '2021-07-03 20:03:17', '2021-07-03 20:03:17', 4),
(7, 1, 'Shine - Toả sáng', 'Jessica Jung', 'BOOK_06', 'Văn học nước ngoài', 95000.00, 5, 'Để thành công, bạn cần nỗ lực, nhưng như thế có thể là chưa đủ.\r\nĐể theo đuổi những ước mơ của mình, bạn có thể phải chấp nhận từ bỏ một số điều khác, bao gồm cả những điều rất quan trọng đối với bạn. Bởi vì, mỗi sự lựa chọn đều đi kèm với một sự hy sinh.\r\nVậy bạn sẽ sẵn sàng từ bỏ những gì để giành lấy một cơ hội được sống với ước mơ của mình?', '20210704032305.jpg', 5, 5.00, 'Nhà Xuất Bản Thanh Niên', 1, '2021-07-03 20:23:05', '2021-07-03 20:23:05', 4),
(9, 1, 'Thiên Quan Tứ Phúc', 'Mặc Hương Đồng Khứu', 'BOOK_07', 'Văn học nước ngoài', 150000.00, 10, 'Thiên Quan Tứ Phúc là một trong những bộ truyện đam mỹ nổi tiếng của tác giả Mặc Hương Đồng Khứu.', '20210713174322.jpg', 5, 5.00, 'Nhà Xuất Bản Hà Nội', 1, '2021-07-13 10:43:22', '2021-07-13 10:43:22', 4),
(10, 1, 'Siêu Nhí Hỏi', 'Dịch giả - 1980 Books', 'BOOK_08', 'Sách thiếu nhi', 145300.00, 10, '100 câu hỏi là những quan sát thông minh và thú vị của các bạn nhỏ với sự tò mò và óc tưởng tượng phong phú của mình. Tất cả các câu hỏi đều được trả lời rõ ràng và sống động. Siêu nhí hỏi – nhà khoa học trả lời chắc chắn sẽ đem đến một thế giới khoa học đầy niềm vui, hài hước, thú vị, làm thỏa mãn trí tò mò của các nhà khoa học nhí.', '20210713190840.jpg', 5, 3.00, 'Nhà Xuất Bản Dân Trí', 1, '2021-07-13 12:08:40', '2021-07-13 12:08:40', 6),
(11, 1, 'Hoàng Tử Bé', 'Antoine De Saint-Exupéry', 'BOOK_09', 'Sách thiếu nhi', 51600.00, 10, 'Hoàng tử bé được viết ở New York trong những ngày tác giả sống lưu vong và được xuất bản lần đầu tiên tại New York vào năm 1943, rồi đến năm 1946 mới được xuất bản tại Pháp. Không nghi ngờ gì, đây là tác phẩm nổi tiếng nhất, được đọc nhiều nhất và cũng được yêu mến nhất của Saint-Exupéry. Cuốn sách được bình chọn là tác phẩm hay nhất thế kỉ 20 ở Pháp, đồng thời cũng là cuốn sách Pháp được dịch và được đọc nhiều nhất trên thế giới.', '20210713191253.jpg', 5, 5.00, 'Nhà xuất bản Hội Nhà Văn', 1, '2021-07-13 12:12:53', '2021-07-13 12:12:53', 6),
(12, 1, 'Dịch hạch', 'Albert Camus', 'BOOK_10', 'Sách mới nhất', 110000.00, 20, 'Trong dịch hạch, Oran – thành phố vốn vô hồn xấu xí bên bờ biển Algérie, phải tự đóng cửa biến thành nhà tù vì từng đàn chuột rồi một người, hai người, hàng chục, hàng trăm người chết vì dịch hạch. Oran biến thành một địa ngục khủng khiếp, quằn quại trong nguy cơ bị diệt vong như bao thành phố trước kia ở châu Âu, châu Á, châu Phi.', '20210723042151.jpg', 5, 25.00, 'NXB Dân Trí', 1, '2021-07-22 21:21:51', '2021-07-22 21:21:51', 1),
(13, 1, 'Nhà', 'Nguyễn Bảo Trung', 'BOOK_11', 'Sách mới nhất', 65000.00, 10, '\"Có nhiều người đã trải qua biết bao lần thăng trầm, đã hiểu được thế nào là mái nhà thế nào là mái ấ họ sẽ đi thật chậm, nương vào nhau mà bước. Họ hiểu ai cũng có lỡ lầm, không trọn vẹ, vì thế họ biết giữ nhau bằng sự rộng lượng và bao dung.\"', '20210723042711.jpg', 5, 5.00, 'Saigon Books', 1, '2021-07-22 21:27:11', '2021-07-22 21:27:11', 1),
(14, 1, 'Hẹn Em Ngày Nắng', 'Mai Mei', 'BOOK_12', 'Văn học trong nước', 68000.00, 10, 'Hẹn em ngày nắng là một câu chuyện tình ấm áp và đầy xúc cảm giữa Tuấn - chàng họa sĩ với những quay quắt về mối tình đầu và Linh - cô gái trẻ với trái tim đã một lần xước xát. Họ gặp nhau từ khi còn là những cô bé, cậu bé để rồi lưu giữ mãi những ký ức về nhau, về ngôi nhà nhỏ với vườn cây xương rồng và tiếng sáo của cụ già đầu ngõ cho đến ngày gặp lại. Cùng đưa nhau qua những hoài niệm, những dè dặt, những hoài nghi của sự tan vỡ, Tuấn và Linh cuối cùng cũng nhận ra tình yêu tận sâu thẳm mà họ dành cho nhau.', '20210723043005.png', 5, 5.00, 'Bách Việt', 1, '2021-07-22 21:30:05', '2021-07-22 21:30:05', 3),
(15, 1, 'Có Hai Con Mèo Ngồi Bên Cửa Sổ', 'Nguyễn Nhật Ánh', 'BOOK_13', 'Văn học trong nước', 48000.00, 20, 'Gấu và Tí Hon thân nhau đến mức có thể chia sẻ từng chuyện vui buồn trong những phút giây mềm yếu, lo lắng và chăm sóc, giúp nhau từ miếng ăn đến “chiến lược” để tồn tại lâu dài.Tình bạn là gì? Bạn gái là gì? Tình yêu là gì?\r\nBọn mèo chuột kể với chúng ta nhiều câu chuyện nhỏ, gửi thông điệp rằng, tình yêu có sức mạnh tuyệt diệu, có thể làm nên mọi điều phi thường trong cuộc sống muôn loài.', '20210723043244.jpg', 5, 5.00, 'NXB Trẻ', 1, '2021-07-22 21:32:44', '2021-07-22 21:32:44', 3),
(16, 1, 'Lập Kế Hoạch Quản Lý Tài Chính Cá Nhân', 'Kristy Shen, Bryce Leung', 'BOOK_14', 'Sách kinh tế', 94000.00, 10, 'Không cần phải thắng đậm trên thị trường chứng khoán, không cần phải là người đứng đầu một công ty khởi nghiệp, và cũng không cần đầu tư vào bất động sản; Kristy Shen và Bryce Leung - những người có xuất thân hoàn toàn bình thường - đã trở thành triệu phú khi mới bước sang độ tuổi 30 nhờ một công thức đơn giản mà bất cứ ai cũng có thể áp dụng.', '20210723043830.jpg', 5, 5.00, '1980 Books', 1, '2021-07-22 21:38:30', '2021-07-22 21:38:30', 5),
(17, 1, 'Từ Điển Tiếng Việt (Tái Bản)', 'Hoàng Phê', 'BOOK_15', 'Từ điển', 315000.00, 20, 'Trên thực tế, cuốn sách Từ điển Tiếng Việt Hoàng Phê của Viện Ngôn ngữ học đã là nguồn tra cứu, trích dẫn đáng tin cậy của hầu hết các bài viết, sách chuyên khảo, đặc biệt là các luận án tiến sĩ, luận văn thạc sĩ, khoá luận tốt nghiệp khi phân tích ý nghĩa của các đơn vị từ ngữ tiếng Việt, là cẩm nang tra cứu không thể thiếu của tất cả những người cầm bút, dù đó là nhà văn, nhà thơ, hay nhà báo, , kể cả các nhà giáo giảng dạy tiếng Việt. Đây là cuốn từ điển giải thích tiếng Việt có chất lượng và uy tín cao nhất so với bất cứ một cuốn từ điển giải thích tiếng Việt nào khác hiện có trên thị trường sách báo ở Việt Nam.', '20210723044611.jpg', 5, 5.00, 'VanLang Books', 1, '2021-07-22 21:46:11', '2021-07-22 21:46:11', 7),
(19, 1, 'Sách Giáo Khoa Bộ Lớp 12 - Sách Bài Học (Bộ 14 Cuốn) (2021)', 'Bộ Giáo Dục Và Đào Tạo', 'BOOK_17', 'Sách giáo khoa', 180000.00, 10, 'Bộ sách giáo khoa', '20210723045743.jpg', 5, 5.00, 'NXB Giáo Dục và Đào Tạo', 1, '2021-07-22 21:57:43', '2021-07-22 21:57:43', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_orders`
--

CREATE TABLE `book_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book_orders`
--

INSERT INTO `book_orders` (`id`, `book_id`, `image`, `order_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(17, 2, '/image/20210702183014.jpg', 1, 1, 31000, '2021-07-03 01:51:52', '2021-07-03 01:51:52'),
(18, 3, '/image/20210702183119.jpg', 1, 2, 31000, '2021-07-03 02:04:20', '2021-07-03 02:04:33'),
(19, 3, '/image/20210702183119.jpg', 2, 1, 31000, '2021-07-03 02:58:31', '2021-07-03 02:58:31'),
(20, 2, '/image/20210702183014.jpg', 2, 1, 31000, '2021-07-03 02:58:34', '2021-07-03 02:58:34'),
(21, 3, '/image/20210702183119.jpg', 3, 1, 31000, '2021-07-03 03:02:14', '2021-07-03 03:02:14'),
(22, 1, '/image/277fa65c176e3551a6bd0ffd05083265.jpg', 3, 1, 140000, '2021-07-03 03:02:17', '2021-07-03 03:02:17'),
(23, 2, '/image/20210702183014.jpg', 4, 1, 31000, '2021-07-03 03:03:01', '2021-07-03 03:03:01'),
(27, 2, '/image/20210702183014.jpg', 6, 1, 31000, '2021-07-03 03:16:46', '2021-07-03 03:16:46'),
(28, 3, '/image/20210702183119.jpg', 7, 1, 31000, '2021-07-03 11:17:40', '2021-07-03 11:17:40'),
(29, 3, '/image/20210702183119.jpg', 8, 1, 31000, '2021-07-03 11:42:48', '2021-07-03 11:42:48'),
(30, 2, '/image/20210702183014.jpg', 9, 2, 31000, '2021-07-03 11:43:50', '2021-07-03 11:43:58'),
(31, 1, '/image/277fa65c176e3551a6bd0ffd05083265.jpg', 9, 1, 140000, '2021-07-03 11:43:52', '2021-07-03 11:43:52'),
(37, 1, '/image/277fa65c176e3551a6bd0ffd05083265.jpg', 11, 1, 140000, '2021-07-03 19:09:39', '2021-07-03 19:09:39'),
(38, 3, '/image/20210702183119.jpg', 12, 1, 31000, '2021-07-03 19:11:39', '2021-07-03 19:11:39'),
(39, 6, '/image/20210704030317.jpg', 13, 1, 86000, '2021-07-03 20:25:59', '2021-07-03 20:25:59'),
(40, 6, '/image/20210704030317.jpg', 14, 2, 86000, '2021-07-04 04:13:26', '2021-07-04 04:13:37'),
(41, 7, '/image/20210704032305.jpg', 15, 1, 95000, '2021-07-04 04:16:20', '2021-07-04 04:16:20'),
(42, 3, '/image/20210702183119.jpg', 15, 1, 31000, '2021-07-04 04:16:23', '2021-07-04 04:16:23'),
(44, 7, '/image/20210704032305.jpg', 16, 1, 95000, '2021-07-04 04:23:12', '2021-07-04 04:23:12'),
(45, 4, '/image/20210704022240.png', 17, 1, 95000, '2021-07-04 04:24:05', '2021-07-04 04:24:05'),
(46, 2, '/image/20210702183014.jpg', 18, 1, 31000, '2021-07-04 04:26:18', '2021-07-04 04:26:18'),
(47, 6, '/image/20210704030317.jpg', 19, 2, 86000, '2021-07-04 04:32:15', '2021-07-04 04:32:41'),
(48, 6, '/image/20210704030317.jpg', 20, 1, 86000, '2021-07-04 04:45:54', '2021-07-04 04:45:54'),
(51, 2, '/image/20210702183014.jpg', 23, 1, 31000, '2021-07-04 05:14:40', '2021-07-04 05:14:40'),
(52, 7, '/image/20210704032305.jpg', 24, 1, 95000, '2021-07-04 06:18:18', '2021-07-04 06:18:18'),
(53, 4, '/image/20210704022240.png', 24, 1, 95000, '2021-07-04 06:18:22', '2021-07-04 06:18:22'),
(54, 7, '/image/20210704032305.jpg', 25, 1, 95000, '2021-07-04 06:21:11', '2021-07-04 06:21:11'),
(57, 6, '/image/20210704030317.jpg', 26, 1, 86000, '2021-07-10 22:37:04', '2021-07-10 22:37:04'),
(58, 2, '/image/20210702183014.jpg', 26, 1, 31000, '2021-07-10 22:53:57', '2021-07-10 22:53:57'),
(59, 7, '/image/20210704032305.jpg', 27, 1, 95000, '2021-07-10 23:44:01', '2021-07-10 23:44:01'),
(60, 4, '/image/20210704022240.png', 28, 1, 95000, '2021-07-10 23:54:43', '2021-07-10 23:54:43'),
(61, 4, '/image/20210704022240.png', 29, 1, 95000, '2021-07-11 01:02:45', '2021-07-11 01:02:45'),
(62, 6, '/image/20210704030317.jpg', 30, 1, 86000, '2021-07-11 01:04:25', '2021-07-11 01:04:25'),
(63, 6, '/image/20210704030317.jpg', 31, 1, 86000, '2021-07-11 01:05:44', '2021-07-11 01:05:44'),
(64, 6, '/image/20210704030317.jpg', 32, 1, 86000, '2021-07-11 01:11:13', '2021-07-11 01:11:13'),
(65, 7, '/image/20210704032305.jpg', 33, 1, 95000, '2021-07-12 08:34:16', '2021-07-12 08:34:16'),
(66, 2, '/image/20210702183014.jpg', 34, 1, 31000, '2021-07-13 02:09:00', '2021-07-13 02:09:00'),
(67, 3, '/image/20210702183119.jpg', 35, 1, 31000, '2021-07-13 02:12:28', '2021-07-13 02:12:28'),
(68, 4, '/image/20210704022240.png', 35, 1, 95000, '2021-07-13 02:12:32', '2021-07-13 02:12:32'),
(69, 4, '/image/20210704022240.png', 36, 1, 95000, '2021-07-13 02:29:44', '2021-07-13 02:29:44'),
(70, 10, '/image/20210713190840.jpg', 37, 1, 145300, '2021-07-14 01:53:31', '2021-07-14 01:53:31'),
(71, 6, '/image/20210704030317.jpg', 37, 1, 86000, '2021-07-14 01:53:38', '2021-07-14 01:53:38'),
(72, 4, '/image/20210704022240.png', 37, 2, 95000, '2021-07-18 01:08:04', '2021-07-18 01:14:40'),
(73, 2, '/image/20210702183014.jpg', 37, 1, 31000, '2021-07-18 01:09:32', '2021-07-18 01:09:32'),
(75, 10, '/image/20210713190840.jpg', 38, 2, 145300, '2021-07-19 10:13:35', '2021-07-19 10:15:26'),
(79, 3, '/image/20210702183119.jpg', 38, 1, 31000, '2021-07-19 10:55:25', '2021-07-19 10:56:46'),
(80, 4, '/image/20210704022240.png', 39, 1, 95000, '2021-07-19 10:58:41', '2021-07-19 10:58:41'),
(81, 3, '/image/20210702183119.jpg', 39, 1, 31000, '2021-07-19 10:58:51', '2021-07-19 10:58:51'),
(82, 10, '/image/20210713190840.jpg', 40, 1, 145300, '2021-07-22 09:32:31', '2021-07-22 09:32:31'),
(83, 3, '/image/20210702183119.jpg', 40, 1, 31000, '2021-07-22 09:32:39', '2021-07-22 09:32:39'),
(84, 6, '/image/20210704030317.jpg', 40, 1, 86000, '2021-07-22 09:32:42', '2021-07-22 09:32:42'),
(85, 17, '/image/20210723044611.jpg', 41, 1, 315000, '2021-07-22 23:02:46', '2021-07-22 23:02:46'),
(86, 19, '/image/20210723045743.jpg', 41, 2, 180000, '2021-07-22 23:24:49', '2021-07-22 23:27:12'),
(87, 19, '/image/20210723045743.jpg', 42, 1, 180000, '2021-07-23 02:31:21', '2021-07-23 02:31:21'),
(88, 19, '/image/20210723045743.jpg', 43, 1, 180000, '2021-07-25 06:08:24', '2021-07-25 06:08:24'),
(89, 19, '/image/20210723045743.jpg', 44, 1, 180000, '2021-07-26 06:40:38', '2021-07-26 06:40:38'),
(90, 16, '/image/20210723043830.jpg', 44, 2, 94000, '2021-07-26 06:43:14', '2021-07-26 06:43:47'),
(91, 19, '/image/20210723045743.jpg', 45, 1, 180000, '2021-07-26 12:09:39', '2021-07-26 12:09:39'),
(92, 15, '/image/20210723043244.jpg', 43, 1, 48000, '2021-07-26 19:23:17', '2021-07-26 19:23:17'),
(93, 12, '/image/20210723042151.jpg', 43, 1, 110000, '2021-07-26 19:31:18', '2021-07-26 19:31:18'),
(94, 14, '/image/20210723043005.png', 46, 1, 68000, '2021-07-26 19:31:32', '2021-07-26 19:31:32'),
(95, 17, '/image/20210723044611.jpg', 46, 1, 315000, '2021-07-26 19:31:39', '2021-07-26 19:31:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sub_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `sub_name`) VALUES
(1, 'Sách mới nhất', '2021-07-02 11:22:56', '2021-07-02 11:22:56', 'sachmoinhat'),
(2, 'Sách giáo khoa', '2021-07-02 11:27:46', '2021-07-02 11:27:46', 'sachgiaokhoa'),
(3, 'Văn học trong nước', '2021-07-02 11:27:55', '2021-07-02 11:27:55', 'vanhoctrongnuoc'),
(4, 'Văn học nước ngoài', '2021-07-02 11:28:07', '2021-07-02 11:28:07', 'vanhocnuocngoai'),
(5, 'Sách kinh tế', '2021-07-03 19:17:57', '2021-07-03 19:17:57', 'sachkinhte'),
(6, 'Sách thiếu nhi', '2021-07-03 19:18:06', '2021-07-03 19:18:06', 'sachthieunhi'),
(7, 'Từ điển', '2021-07-03 19:18:22', '2021-07-03 19:18:22', 'tudien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2021_04_21_173857_create_sessions_table', 1),
(10, '2021_05_01_082250_create_books_table', 1),
(11, '2021_05_01_082904_create_orders_table', 1),
(12, '2021_05_01_144621_create_book_orders_table', 1),
(13, '2021_05_01_184017_add_is_admin_column_to_users_table', 1),
(14, '2021_05_01_184436_add_code_field_to_books_table', 1),
(15, '2021_06_17_192159_create_categories_table', 1),
(16, '2021_06_17_194519_create_reviews_table', 1),
(17, '2021_06_19_110609_create_authors_table', 1),
(18, '2021_06_26_152020_add_category_id_to_books', 1),
(19, '2021_06_27_101513_create_searches_table', 1),
(20, '2021_06_27_140023_add_subname_to_categories', 1),
(21, '2021_06_29_084223_create_addresses_table', 1),
(22, '2021_07_18_023251_create_wishlists_table', 2),
(23, '2021_07_18_063359_create_wishlists_table', 3),
(24, '2021_07_19_153900_add_status_to_wishlist', 4),
(25, '2021_07_19_170707_add_quantity_to_wishlist', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:New, 2:improgress, 3:finish, 4:cancel',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `code`, `user_id`, `user_name`, `phone`, `address`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(3, 'BOOK_20210703_100214_1', 1, 'Lam', '0339698977', 'Đường 8, TP Hà Nội', 171000, 2, '2021-07-03 03:02:14', '2021-07-03 03:02:34'),
(4, 'BOOK_20210703_100301_1', 1, 'Lam', '0339698977', 'Đường 8, TP Hà Nội', 31000, 3, '2021-07-03 03:03:01', '2021-07-03 10:48:22'),
(7, 'BOOK_20210703_181740_1', 1, 'Nguyễn Linh Anh', '0972564786', 'Số nhà 33 đường Ngô Xuân Quảng, TT Trâu Quỳ, H Gia Lâm, Hà Nội', 31000, 2, '2021-07-03 11:17:40', '2021-07-03 11:20:03'),
(9, 'BOOK_20210703_184350_1', 1, 'Đan', '0339698977', 'Đường 8, TP Hà Nội', 202000, 2, '2021-07-03 11:43:50', '2021-07-03 11:44:12'),
(11, 'BOOK_20210703_184734_1', 1, 'Lam', '0339698977', 'Đường 8, TP Hà Nội', 140000, 2, '2021-07-03 11:47:34', '2021-07-03 19:09:57'),
(12, 'BOOK_20210704_021139_1', 1, 'Đan', '0339698977', 'Đường 8, TP Hà Nội', 31000, 3, '2021-07-03 19:11:39', '2021-07-21 10:38:35'),
(14, 'BOOK_20210704_111326_1', 1, 'Lam', '+84339698977', 'Số nhà 63/11, đường Láng, Hà Nội', 172000, 3, '2021-07-04 04:13:26', '2021-07-13 05:51:17'),
(34, 'BOOK_20210713_090900_1', 1, 'Test', '0339567843', 'Trâu Quỳ, Gia Lâm, Hà Nội', 31000, 3, '2021-07-13 02:09:00', '2021-07-13 03:23:07'),
(35, 'BOOK_20210713_091228_1', 1, 'Minh', '0339698977', 'P Đông Tác', 126000, 3, '2021-07-13 02:12:28', '2021-07-13 03:22:11'),
(40, 'BOOK_20210722_163231_1', 1, 'Admin', '339698977', '123 Đại lộ Lê Lợi, TP Thanh Hoá, Tỉnh Thanh Hoá', 262300, 3, '2021-07-22 09:32:31', '2021-07-22 09:35:20'),
(42, 'BOOK_20210723_093121_3', 3, 'Lam', '0339698977', 'Số 24 đường Nguyễn Tri Phương, Q. Hải Châu, TP Đà Nẵng', 180000, 3, '2021-07-23 02:31:21', '2021-07-23 02:34:03'),
(43, 'BOOK_20210725_130824_1', 1, NULL, NULL, NULL, NULL, 1, '2021-07-25 06:08:24', '2021-07-25 06:08:24'),
(44, 'BOOK_20210726_134038_2', 2, 'Nguyễn Công Danh', '339698970', 'Số 24 đường Nguyễn Tri Phương, Q. Hải Châu, TP Đà Nẵng', 368000, 4, '2021-07-26 06:40:38', '2021-07-26 12:09:01'),
(45, 'BOOK_20210726_190939_2', 2, 'Nguyễn Công Danh', '339698970', 'Số 24 đường Nguyễn Tri Phương, Q. Hải Châu, TP Đà Nẵng', 180000, 4, '2021-07-26 12:09:39', '2021-07-27 22:21:53'),
(46, 'BOOK_20210727_023132_3', 3, NULL, NULL, NULL, NULL, 1, '2021-07-26 19:31:32', '2021-07-26 19:31:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `book_id`, `rating`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 4, 'Good!', 1, '2021-07-06 10:32:48', '2021-07-06 10:32:48'),
(3, 2, 6, 5, 'nice', 1, '2021-07-06 10:35:52', '2021-07-06 10:35:52'),
(5, 2, 10, 5, 'Great!', 1, '2021-07-14 01:04:33', '2021-07-14 01:04:33'),
(6, 1, 10, 3, 'Good!', 1, '2021-07-14 01:45:02', '2021-07-14 01:45:02'),
(7, 2, 19, 4, 'Good!', 1, '2021-07-22 23:26:25', '2021-07-22 23:26:25'),
(8, 2, 16, 4, 'Good', 1, '2021-07-26 10:55:15', '2021-07-26 10:55:15'),
(9, 3, 16, 4, 'Fine', 1, '2021-07-26 10:56:09', '2021-07-26 10:56:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `searches`
--

CREATE TABLE `searches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NXB` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1AXLZ7NynKB6NkfqQMuaP77E3nakLEz9IdPGl00o', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiM0Rlb3F2SFNqaUtoWExwTHVqaVRzeXFiT2UyT0VoZHlKNUZmbFhoMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3Q6MzAwMC9hZG1pbi9ib29rcz9wYWdlPTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkMjR1YVVuUkgxRXJ2dno4WTY5UmZwZUpsZS9NQVhoVkY3RVNwZmJjMFFRWkx6TnpZMjNweEMiO30=', 1627573117);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: normal user, 1: admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `address`, `phone`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Admin', 'xinhit98@gmail.com', NULL, '$2y$10$24uaUnRH1Ervvz8Y69RfpeJle/MAXhVF7ESpfbc0QQZLzNzY23pxC', NULL, NULL, NULL, '123 Đại lộ Lê Lợi, TP Thanh Hoá, Tỉnh Thanh Hoá', 339698977, 1, NULL, '2021-07-02 11:22:56', '2021-07-21 10:53:39', 1),
(2, 'Nguyễn Công Danh', 'duongnhatlam98@gmail.com', NULL, '$2y$10$OWciImyr8x49uTKGAfuAiOdNlKkm4tEsJdl4hFCq.uuyUO1/0x0cS', NULL, NULL, NULL, 'Số 24 đường Nguyễn Tri Phương, Q. Hải Châu, TP Đà Nẵng', 339698970, NULL, NULL, '2021-07-03 22:23:16', '2021-07-03 22:24:55', 0),
(3, 'Lam', 'duongthixinh48@gmail.com', NULL, '$2y$10$How9gkiUxYprjjDb9i2Dg.Rkk7jFBDas9nhUCVN8XJqAEw.JxiEx.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-23 02:30:22', '2021-07-23 02:30:22', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `book_id`, `name`, `image`, `price`, `created_at`, `updated_at`, `status`, `quantity`) VALUES
(8, 2, 17, 'Từ Điển Tiếng Việt (Tái Bản)', '/image/20210723044611.jpg', 315000.00, '2021-07-22 23:02:36', '2021-07-22 23:02:36', 1, 20),
(9, 2, 19, 'Sách Giáo Khoa Bộ Lớp 12 - Sách Bài Học (Bộ 14 Cuốn) (2021)', '/image/20210723045743.jpg', 180000.00, '2021-07-22 23:26:48', '2021-07-22 23:26:48', 1, 10),
(10, 2, 19, 'Sách Giáo Khoa Bộ Lớp 12 - Sách Bài Học (Bộ 14 Cuốn) (2021)', '/image/20210723045743.jpg', 180000.00, '2021-07-26 06:40:41', '2021-07-26 06:40:41', 1, 10),
(11, 2, 16, 'Lập Kế Hoạch Quản Lý Tài Chính Cá Nhân', '/image/20210723043830.jpg', 94000.00, '2021-07-26 06:43:25', '2021-07-26 06:43:25', 1, 10),
(12, 2, 17, 'Từ Điển Tiếng Việt (Tái Bản)', '/image/20210723044611.jpg', 315000.00, '2021-07-26 19:24:15', '2021-07-26 19:24:15', 1, 20),
(13, 2, 12, 'Dịch hạch', '/image/20210723042151.jpg', 110000.00, '2021-07-26 19:25:55', '2021-07-26 19:25:55', 1, 20),
(14, 3, 17, 'Từ Điển Tiếng Việt (Tái Bản)', '/image/20210723044611.jpg', 315000.00, '2021-07-26 19:29:12', '2021-07-26 19:29:12', 1, 20),
(16, 1, 15, 'Có Hai Con Mèo Ngồi Bên Cửa Sổ', '/image/20210723043244.jpg', 48000.00, '2021-07-27 22:22:39', '2021-07-27 22:22:39', 1, 20);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `book_orders`
--
ALTER TABLE `book_orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_sub_name_unique` (`sub_name`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `searches`
--
ALTER TABLE `searches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Chỉ mục cho bảng `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `book_orders`
--
ALTER TABLE `book_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `searches`
--
ALTER TABLE `searches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
