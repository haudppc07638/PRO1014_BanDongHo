-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 20, 2024 lúc 09:00 PM
-- Phiên bản máy phục vụ: 8.0.36
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hkhstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int NOT NULL,
  `codeBill` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `oderName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `orderEmail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `oderPhone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `orderAdress` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `receiverName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `receiverPhone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total` int DEFAULT NULL,
  `ship` int DEFAULT NULL,
  `voucher` int DEFAULT NULL,
  `totalPrice` int DEFAULT NULL,
  `payments` tinyint(1) DEFAULT NULL,
  `receiverAdress` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `blogcate_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `user_id`, `blogcate_id`, `created_at`) VALUES
(11, 'Apple ra mắt Apple Watch Series 8 và Apple Watch SE mới', 'CUPERTINO, CALIFORNIA Hôm nay Apple đã giới thiệu Apple Watch Series 8 và Apple Watch SE mới, sở hữu công nghệ và hiệu năng đột phá cũng như những cải tiến quan trọng về các tính năng an toàn cho hai mẫu đồng hồ thông minh bán chạy nhất. Apple Watch Series 8 sở hữu thiết kế được nhiều người yêu thích ở Apple Watch, bao gồm màn hình Retina Luôn Hiển thị lớn, và mặt đồng hồ phía trước bằng thủy tinh chống nứt bền bỉ. Với thời lượng pin 18 giờ hoạt động cả ngày, Apple Watch Series 8 tiếp tục phát triển các tính năng về sức khoẻ và an toàn ưu việt như ứng dụng ECG và phát hiện ngã, và giới thiệu tính năng cảm biến nhiệt độ, ước tính thời điểm rụng trứng hồi cứu, Phát hiện Va chạm, và chuyển vùng quốc tế. Apple Watch SE mới mang đến trải nghiệm Apple Watch cốt lõi, bao gồm ứng dụng Hoạt động, thông báo nhịp tim cao và thấp, cùng với SOS Khẩn cấp, cũng như tính năng Phát hiện Va chạm mới, và ốp lưng được thiết kế mới hoàn toàn để trùng khớp hoàn hảo với ba màu khung viền cổ điển. Cả hai mẫu đều chạy watchOS 9, ra mắt các mặt đồng hồ mới và có thể tùy chỉnh nhiều hơn như Lunar và Metropolitan, ứng dụng Bài tập nâng cao, các giai đoạn của giấc ngủ, tính năng Lịch sử AFib đầu tiên trên đồng hồ, và ứng dụng Thuốc hoàn toàn mới.\r\n“Chúng tôi lắng nghe chia sẻ của khách hàng về cách Apple Watch giúp họ duy trì kết nối với những người thân yêu, trở nên năng động hơn và có cuộc sống lành mạnh hơn,” Jeff Williams, Giám đốc vận hành của Apple cho biết. “Apple Watch Series 8 củng cố cam kết của chúng tôi trong những lĩnh vực này với những công nghệ tiên phong mới, trong khi Apple Watch SE mang đến các tính năng cốt lõi tiên tiến với giá khởi điểm mới. Được trang bị watchOS 9, những mẫu đồng hồ thông minh tốt nhất mang đến nhiều chức năng hơn bao giờ hết”.\r\n', 2, 1, '2024-04-20 19:12:10'),
(12, 'Đồng Hồ Patek Philippe Nautilus 5711 40th Anniversary Rep 11', 'Chiếc đồng hồ Patek Philippe Nautilus 5711 phiên bản thép không gỉ được đánh giá là một trong những chiếc đồng hồ thể thao cao cấp “hot” nhất hiện nay. Thật sự rất khó để sở hữu được chiếc đồng hồ này và nếu như bạn muốn mua được nó qua những nhà phân phối bán lẻ, bạn sẽ phải dành ít nhất vài năm để có tên trong danh sách đợi. Một trong những nguyên nhân là do Patek Philippe đã khẳng định rằng chỉ có 20% tổng sản phẩm của họ được sản xuất với chất liệu thép, trong đó, 5711 Nautilus chỉ là một trong số những thiết kế mà thương hiệu này lựa chọn sản xuất.\r\n\r\nTuy nhiên, chiếc đồng hồ mà chúng ta sẽ đề cập đến dưới đây là một phiên bản sao chép chuẩn Replica 11 của mẫu Patep Philippe ra mắt năm 2016 dành cho lễ kỉ niệm 40 năm ngày ra đời của bộ sưu tập Nautilus. Trong khi chiếc Nautilus chính hãng có giá retail hàng tỷ đồng thì thiết kế Đồng Hồ Patek Philippe Nautilus 5711 40th Anniversary Rep 11 Kỉ Niệm 40 Năm 3K phiên bản Fake cao cấp nhất có giá rẻ hơn hàng trăm lần.\r\n\r\n', 2, 1, '2024-04-20 19:21:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogcategories`
--

CREATE TABLE `blogcategories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blogcategories`
--

INSERT INTO `blogcategories` (`id`, `name`, `parent_id`, `user_id`, `created_at`) VALUES
(1, 'Danh mục chủ', '', 2, '2024-04-20 19:07:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `intoMoney` int DEFAULT NULL,
  `bill_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `categoryName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `categoryName`, `status`, `created`, `updated`, `image`, `description`) VALUES
(52, 'Apple ', NULL, NULL, NULL, 'apple-logo-wallpaper-15.jpg', NULL),
(53, 'Rolex', NULL, NULL, NULL, 'rolex-logo-editorial-illustration-free-vector.jpg', NULL),
(54, 'Patek PhiLiPe', NULL, NULL, NULL, 'logo-cac-hang-dong-ho-2.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `product_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `content`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'aaaa', 47, 11, '2024-04-20 19:52:45', '2024-04-20 19:52:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` int NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `discount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` tinyint DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `price` float DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `totalQuantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `totalDiscount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `totalPrice` float DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` float DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `category_id` int DEFAULT NULL,
  `discount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `oldPrice` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`, `category_id`, `discount`, `created`, `updated`, `status`, `oldPrice`) VALUES
(47, 'Apple Watch seri 7', 5200000, 'apple watch xuất xứ từ mĩ', 'Apple_Watch_Series_7_GPS_41mm_Green_Aluminum_Clover_Sport_Band_PDP_Image_Position-2__SG-scaled.jpg;Apple_watch-series7_contour-face_09142021_carousel.jpg.large_2x.jpg;th.jpg', 52, NULL, '2024-04-21 02:25:32', NULL, 1, 6000000),
(48, 'Apple Watch seri 9', 6200000, 'apple watch seri 9 xuất xứ từ mĩ', '41-cell-alum-pink-sport-loop-light-pink-s9.jpg;0021752_apple-watch-series-9-thep-gps-cellular-41mm-milanese-loop.jpeg;apple_mqk02ll_a_watch_edition_38mm_gps_1362232.jpg', 52, NULL, '2024-04-21 02:22:39', NULL, 1, 7500000),
(49, 'Apple Watch utral', 5320000, 'apple watch ultra xuất xứ từ mĩ', 'apple-watch-ultra-49-mm-titaanium-nutikell-ocean-band-tumehalli-rihmaga-eest.jpg;Apple-Watch-Ultra-Green-Alpine-Loop-Compass-Waypoints-220907_inline.jpg.large.jpg;utr.jpg', 52, NULL, '2024-04-21 02:22:53', NULL, 1, 7000000),
(50, 'Rolex silver', 9000000, 'Rolex silver bạc xuất xứ nước ngoài', 'rolex-oyster-perpetual-36-mm-silver-with-10-diamonds-dial-stainless-steel-rolex-jubilee-automatic-men_s-watch-116234sdj.jpg;rolex-lady-datejust-26-silver-dial-stainless-steel-rolex-jubilee-automatic-watch-179174sdj.jpg;DSC_5295.jpg', 53, NULL, '2024-04-21 02:23:21', NULL, 1, 12000000),
(51, 'Rolex gold', 9000000, 'Rolex gold khẳng định doanh nhân', 'g2.jpg;g1.jpg;g3.jpg', 53, NULL, '2024-04-21 02:23:45', NULL, 1, 9500000),
(52, 'Rolex BK', 9800000, 'Rolex Bk khẳng định doanh nhân mạnh BK', 'bk1.jpg;bk.jpg;bk2.jpg', 53, NULL, '2024-04-21 02:24:08', NULL, 1, 11000000),
(53, 'Patek PhiLiPe natulis-quart', 11000000, 'Patek PhiLiPe natulis-quart dành cho phái nữ', 'patek-philippe-nautilus-quartz-diamond-gold-dial-ladies-watch-70101r012.jpg;patek-philippe-nautilus-quartz-diamond-gold-dial-ladies-watch-70101r012.jpg;patek-philippe-nautilus-quartz-diamond-gold-dial-ladies-watch-70101r012.jpg', 54, NULL, '2024-04-21 02:47:27', NULL, 1, 12000000),
(54, 'Patek PhiLiP Unvelis', 11200000, 'Patek PhiLiP Unvelis xuất xứ từ nước ngoài', 'patek-philippe-nautilus-silvery-white-dial-stainless-steel-mens-watch-57111a011-57111a011.jpg;Patek-Philippe-Nautilus-Chronograph-5990-1R-rose-gold-blue-1.jpg;Patek-Philippe-Nautilus-Chronograph-5990-1R-rose-gold-blue-1.jpg', 54, NULL, '2024-04-21 02:46:10', NULL, 1, 12000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `userName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fullName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int DEFAULT '1',
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `userName`, `password`, `address`, `email`, `fullName`, `status`, `role`, `created`, `updated`, `phone`) VALUES
(2, 'admin', 'admin', '123312', '132312', '321313', 1, 'admin', '2023-12-03 22:15:39', '2023-12-03 22:15:39', '1231231232'),
(11, 'hiu', 'b59daa00', 'nguyen van linh', 'khcute2004@gmail.com', 'hieu tran', 1, 'user', NULL, NULL, '0356764863');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`user_id`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `blogcate_id` (`blogcate_id`);

--
-- Chỉ mục cho bảng `blogcategories`
--
ALTER TABLE `blogcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD KEY `id_pro` (`product_id`),
  ADD KEY `id_bill` (`bill_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ID` (`product_id`),
  ADD KEY `user_ID` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_ID` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `blogcategories`
--
ALTER TABLE `blogcategories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12124;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`blogcate_id`) REFERENCES `blogcategories` (`id`);

--
-- Các ràng buộc cho bảng `blogcategories`
--
ALTER TABLE `blogcategories`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `product_ID` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `user_ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
