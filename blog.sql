-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2019 at 04:57 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:category product, 2:category news',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `image`, `icon`, `role`, `created_at`, `updated_at`) VALUES
(6, 'Khai Vị', 'khai-vi', 'Món khai vị', 'w10.png', NULL, 1, '2019-07-29 10:16:18', NULL),
(7, 'Món chính', 'mon-chinh', 'Món ăn chính trong khẩu phần', 'w10.png', NULL, 1, '2019-07-29 10:17:05', NULL),
(8, 'Tráng miệng', 'trang-mieng', 'Món tráng miệng', 'w10.png', NULL, 1, '2019-07-29 10:17:31', NULL),
(9, 'Tin trong nước', 'tin-trong-nuoc', 'Tin tức trong nước', 'no_img.png', NULL, 2, '2019-07-29 10:17:55', NULL),
(10, 'Tin thế giới', 'tin-the-gioi', 'Tin tức thế giới', 'no_img.png', NULL, 2, '2019-07-29 10:18:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(4, 6, 4, '2019-07-29 10:25:48', NULL),
(5, 7, 5, '2019-07-29 10:26:48', NULL),
(6, 7, 6, '2019-07-29 10:27:31', NULL),
(7, 8, 7, '2019-07-29 10:28:13', '2019-07-29 10:28:29'),
(8, 8, 8, '2019-07-29 10:29:18', NULL),
(9, 6, 9, '2019-08-01 15:17:25', '2019-08-01 15:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `address`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Tiến HN', '0987654322', 'tienkp22@gmail.com', 'Hà Nội 2', 'alloooooooooo 1234', NULL, '2019-07-30 09:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_input` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `title`, `slug`, `content`, `type_input`, `created_at`, `updated_at`) VALUES
(1, 'logo', 'logo', 'slide3.jpg', 'image', '2019-07-31 14:54:54', '2019-08-07 19:22:05'),
(2, 'tiêu đề đầu trang chủ', 'tieu-de-dau-trang-chu', 'Hoa Ánh Dương Company', 'text', '2019-08-01 10:58:25', '2019-08-07 19:22:05'),
(3, 'slide index 1', 'slide-index-1', 'slide1.jpg', 'image', '2019-08-02 15:12:53', '2019-08-07 00:10:40'),
(4, 'slide index 2', 'slide-index-2', 'slide3.jpg', 'image', '2019-08-02 15:13:07', '2019-08-07 19:22:53');

-- --------------------------------------------------------

--
-- Table structure for table `introduces`
--

CREATE TABLE `introduces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `introduces`
--

INSERT INTO `introduces` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'aa', 'cc', NULL, NULL),
(2, 'aa', 'cc', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2019_07_26_062611_create_table_categories_table', 2),
(4, '2019_07_26_062829_create_table_products_table', 2),
(80, '2014_10_12_000000_create_users_table', 3),
(81, '2014_10_12_100000_create_password_resets_table', 3),
(82, '2019_07_26_062900_create_table_category_product_table', 3),
(83, '2019_07_26_062937_create_table_contacts_table', 3),
(84, '2019_07_26_062954_create_table_news_table', 3),
(85, '2019_07_26_063017_create_table_introduces_table', 3),
(86, '2019_07_26_063118_create_table_informations_table', 3),
(87, '2019_07_26_071033_create_table_products_table', 3),
(88, '2019_07_26_071047_create_table_categories_table', 3),
(89, '2019_07_26_075120_add_attribute_category_id_into_news_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `content`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'Campuchia chi thêm gần nghìn tỷ mua vũ khí Trung Quốc', 'Thủ tướng Campuchia Hun Sen hôm nay (29/7) cho biết, nước này sẽ chi thêm khoảng 40 triệu USD - tương đương 928 tỷ đồng, để mua vũ khí từ Trung Quốc.', 'Hãng tin Reuters dẫn lời Thủ tướng Hun Sen nói, Campuchia sẽ chi thêm 40 triệu USD, ngoài số tiền 290 triệu USD đã chuyển cho Trung Quốc trước đó, để mua vũ khí hiện đại hóa quân đội. Ông cho biết như vậy trong chuyến thăm một sân vận động được Trung Quốc cấp vốn xây dựng tại thủ đô Phnom Penh.\r\n\r\nCampuchia chi thêm gần nghìn tỷ mua vũ khí Trung Quốc\r\nThủ tướng Campuchia phủ nhận tin cho Trung Quốc sử dụng căn cứ hải quân Ream. (Ảnh EPA)\r\nÔng cho hay, số vũ khí nước này mua của Trung Quốc bao gồm hàng chục nghìn khẩu súng dùng để thay thế các loại cũ và đã được chuyển cho Campuchia. \"Tôi muốn củng cố quân đội\", Thủ tướng Hun Sen tuyên bố trong bài phát biểu được phát trực tiếp trên Facebook.\r\n\r\nNhà lãnh đạo Campuchia cũng bác bỏ bản tin mà Thời báo phố Wall đưa hồi tuần trước rằng Trung Quốc ký thỏa thuận mật với Campuchia trong năm nay để sử dụng căn cứ hải quân Ream. Thời báo phố Wall trước đó dẫn tin từ các quan chức Mỹ và đồng minh.', 'campuchia-chi-them-gan-nghin-ty-mua-vu-khi-trung-quoc', 10, '2019-07-29 15:59:34', NULL),
(4, 'Quân đội Trung Quốc bị các cường quốc quân sự bỏ xa', 'Lời nhận định trên được nhiều chuyên gia quân sự đưa ra, sau khi Bắc Kinh hôm 24/7 công bố sách trắng quốc phòng năm 2019.', 'Cụ thể, trong sách trắng “An ninh Quốc phòng Trung Quốc trong thời đại mới” công bố hôm 24/7, chính phủ Trung Quốc đã chỉ ra việc quân đội nước này vẫn chưa thực hiện được nhiệm vụ cơ bản của việc ‘cơ khí hóa’, trong khi quân đội nhiều nước trên thế giới đã áp dụng rất nhiều công nghệ thông tin tinh vi hơn.\r\n\r\n“Phương thức chiến tranh đã phát triển hướng sang chiến tranh thông tin, và chiến tranh tình báo là điển hình mới nhất. An ninh quân sự Trung Quốc đang đối mặt với nguy cơ tới từ khoảng cách phát triển giữa các thế hệ công nghệ đang ngày càng gia tăng. Những nỗ lực lớn nhằm đầu tư cho việc hiện đại hóa quân đội đang đòi hỏi những yêu cầu từ vấn đề an ninh quốc gia. Quân đội Trung Quốc vẫn đang bị các cường quốc quân sự khác bỏ xa”, trích đoạn trong sách trắng quốc phòng 2019 của Trung Quốc.\r\n\r\n\'Quân đội Trung Quốc bị các cường quốc quân sự bỏ xa\'\r\nTrình độ quân sự của TQ bị nhiều cường quốc quân sự khác bỏ xa. Ảnh: THX\r\nTheo chuyên gia hải quân Li Jie, hiện quân đội Trung Quốc mới chỉ hiện đại hóa thiết bị quân sự trong 10 năm qua và hiện vẫn còn một chặng đường dài để vượt qua. “Có thể lấy ví dụ như về tàu sân bay của Trung Quốc, hiện đang lạc hậu hơn tàu sân bay Mỹ ít nhất là 2 thế hệ, cũng như tàu ngầm hạt nhân chiến lược và máy bay ném bom chiến thuật”, ông Li cho biết.\r\n\r\n“Trung Quốc chỉ mới vừa học được cách vận hành và bảo dưỡng một tàu sân bay. Trong khi Hải quân Mỹ đã đưa vào hoạt động nhiều tàu sân bay trong hàng thập kỷ qua, và Mỹ vẫn đang tối ưu hóa và nâng cao khả năng tác chiến tốt nhất của họ. Trung Quốc đã xây dựng nhiều tàu chiến gần đây, nhưng lực lượng hải quân Trung Quốc vẫn thiếu kinh nghiệm trên biển và việc hỗ trợ tác chiến yếu”, chuyên gia quân sự Song Zhongping nhận định.\r\n\r\n\'Quân đội Trung Quốc bị các cường quốc quân sự bỏ xa\'\r\nTàu sân bay Liêu Ninh của Trung Quốc. Ảnh: THX\r\nNhiều nhà quan sát chỉ ra rằng, khoảng cách rõ rệt nhất của quân đội Trung Quốc chính là ở vấn đề thông tin liên lạc, khi việc chiến đấu và chiến thắng trong chiến tranh hiện đại thường dựa vào khả năng phối hợp giữa nhiều lực lượng khác nhau.\r\n\r\n“Quân đội Trung Quốc đang cải thiện tình trạng thiếu trang thiết bị vũ khí, nhưng vấn đề lớn nhất ở đây là nằm trong mảng phần mềm công nghệ, khi vấn đề này liên quan đến chuyên môn của người lính. Ngoài ra, học thuyết quân sự cũng là điều mà Bắc Kinh cần học hỏi từ các nước khác”, ông Song nói thêm.\r\n\r\nChính tài liệu sách trắng quốc phòng vừa được Bắc Kinh công bố đã vạch ra hướng đi cho các kế hoạch của quân đội nước này trong nhiều năm tới, cụ thể về việc phát triển vũ khí tàng hình có thể hoạt động tầm xa, và nhất là áp dụng những công nghệ thông minh. Ngoài ra, Trung Quốc hiện cũng đang đi trước các nước khác trong những lĩnh vực vũ khí siêu thanh, súng điện từ, vũ khí laser, tên lừa tầm ngắn và tầm trung,…\r\n\r\nĐồng thời tài liệu này cũng chỉ ra rằng, quân đội nước này cũng đang bắt kịp những ứng dụng công nghệ quân sự tiên tiến khác như trí tuệ nhân tạo, thông tin lượng tử, điện toán đám mây và nhiều ứng dụng Internet.', 'quan-doi-trung-quoc-bi-cac-cuong-quoc-quan-su-bo-xa', 10, '2019-07-29 16:00:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `image`, `price`, `content`, `created_at`, `updated_at`) VALUES
(4, 'Nộm', 'nom', 'Nộm khai vị', 'nomKV.jpg', 20000, 'Nộm rau xanh khai vị', '2019-07-29 10:25:48', NULL),
(5, 'Tôm hấp', 'tom-hap', 'Món chính tôm hấp', 'Tom.jpg', 200000, 'Tôm hấp thơm ngon', '2019-07-29 10:26:48', NULL),
(6, 'Gà luộc', 'ga-luoc', 'Món chính Gà luộc', 'gaLuoc.jpg', 120000, 'Là luộc nửa con', '2019-07-29 10:27:31', NULL),
(7, 'Dưa hấu', 'dua-hau', 'Dưa hấu tráng miệng', 'DuaHau.jpg', 15000, 'Dưa hấu tráng miệng thông dụng người VN', '2019-07-29 10:28:13', '2019-07-29 10:28:29'),
(8, 'Xoài', 'xoai', 'Xoài tráng miệng', 'xoai.jpg', 15000, 'Xoài tráng miệng thông dụng', '2019-07-29 10:29:18', NULL),
(9, 'Salad', 'salad', 'Salad khai vị', 'saladKV.jpg', 15000, '<p>Salad khai vị cho bữa</p>', '2019-08-01 15:17:24', '2019-08-01 15:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tien', 'tienkp2203@gmail.com', NULL, '$2y$10$eJdVpS37KbSmKl/o1DfUqejKALj/q6uCqJvJSFv1ez33EFzL6MTs.', 'GnQ4h3D67jlyAAmFQKtG7LXWKV040vPBGKyecXDLftUGDfm9VPHkH8ZtpFzd', '2019-07-26 15:47:39', '2019-07-26 15:47:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `introduces`
--
ALTER TABLE `introduces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `introduces`
--
ALTER TABLE `introduces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
