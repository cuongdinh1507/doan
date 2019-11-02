-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2019 lúc 02:10 PM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hydroshare`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `titleEvent` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionEvent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeEvent` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressEvent` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageEvent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`id`, `titleEvent`, `descriptionEvent`, `timeEvent`, `addressEvent`, `imageEvent`, `created_at`, `updated_at`) VALUES
(2, 'Mekong River Commission visiti', 'Join Us for a visit to the USGS Hydrologic Instrumentation Facility (HIF)', 'Aug 18, 2:40 AM', 'New Orleans, New Orleans, LA', 'http://localhost/doan/public/storage/b9ea53914aa3c7d41ab93482ae6507d6item1.png', '2019-10-18 02:33:35', '2019-10-18 03:26:40'),
(3, 'First Technical Mekong Socioec', 'LMI-SIP socio-economic data', 'Aug 29, 7:00 AM', 'Bangkok, Bangkok, Thailand', 'http://localhost/doan/public/storage/97e42e356d74a483e566062a3e014cc8item2.png', '2019-10-18 03:28:22', '2019-10-18 03:28:22'),
(4, 'Mekong Cascading Hydropower Ma', 'Design of the Mekong Water Data Platform', 'Sep 26, 8:00 AM – 05:00 PM GMT', 'Bangkok, Bangkok, Thailand', 'http://localhost/doan/public/storage/def21135e91d87625005318164d468cbitem3.png', '2019-10-18 03:28:59', '2019-10-18 03:28:59'),
(5, '2019 Mekong Research Symposium', '2nd Annual Mekong Research Symposium', 'Dec 04, 7:00 PM', 'Location is TBD', 'http://localhost/doan/public/storage/d2aac526da6c1edcd059543177075422item4.png', '2019-10-18 03:29:47', '2019-10-18 03:29:47');

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
(234, '2014_10_12_000000_create_users_table', 1),
(235, '2014_10_12_100000_create_password_resets_table', 1),
(236, '2019_08_20_084257_create_project_info_table', 1),
(237, '2019_08_20_084513_create_project_personel_table', 1),
(238, '2019_08_20_084700_create_project_description_table', 1),
(239, '2019_08_20_084836_create_project_data_description_table', 1),
(240, '2019_10_16_075540_create_events_table', 1),
(241, '2019_10_16_075719_create_subjects_table', 1),
(242, '2019_10_16_080859_create_roles_table', 1),
(243, '2019_10_16_091239_addfkpi', 1),
(244, '2019_10_16_092526_addfkpd', 1);

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
-- Cấu trúc bảng cho bảng `project_data_description`
--

CREATE TABLE `project_data_description` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeOfData` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeOfAnalysis` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `when` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `where` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeOfFile` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_id` smallint(5) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `project_data_description`
--

INSERT INTO `project_data_description` (`id`, `name`, `typeOfData`, `description`, `typeOfAnalysis`, `when`, `where`, `link`, `typeOfFile`, `title_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'file 1', '3123', '123', '123', '123', '4142', 'd388455eed3d3ebd8ca993a9fb48548dDemo 2.xlsx', 'xlsx', 1, 1, '2019-10-16 08:00:43', '2019-10-16 09:59:15'),
(2, '1234124', '123', '123', '123', '1231', '23', '3213d6abde7ca24dc45bd073515c9717CuongDV_Baocao_DATN.docx', 'docx', 2, 1, '2019-10-16 09:58:24', '2019-10-16 09:58:30'),
(3, '123', '12312', '312312313', '312', '3123', '1231', '1926defdf3d38ba0b86870e6fe1eeb00CV_DinhVietCuong.pdf', 'pdf', 2, 2, '2019-11-02 07:41:38', '2019-11-02 07:41:38'),
(6, '12312', '3123', '123', '123', '4', '123', 'be0b60762c7d5a2b6a09701a5a21325cCV_DinhVietCuong.pdf', 'pdf', 2, 1, '2019-11-02 09:19:35', '2019-11-02 09:19:43'),
(7, 'abababbâ', '123', '123123', '123', '123123', '12312', '7847a901e6b197cb1c5193de4b61ea70CV_DinhVietCuong.pdf', 'pdf', 2, 2, '2019-11-02 09:35:28', '2019-11-02 09:35:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project_description`
--

CREATE TABLE `project_description` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title_id` smallint(5) UNSIGNED NOT NULL,
  `abstract` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `funding` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yearStart` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yearEnd` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publication` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `project_description`
--

INSERT INTO `project_description` (`id`, `title_id`, `abstract`, `keyword`, `funding`, `yearStart`, `yearEnd`, `publication`, `created_at`, `updated_at`) VALUES
(1, 1, 'Resources are anything that has utility and adds value to your life. Air, water, food, plants, animals, minerals, metals, and everything else that exists in nature and has utility to mankind is a ‘Resource’. The value of each such resource depends on its utility and other factors. For example, metals are gold, silver, copper or bronze have economic value; i.e. they can be exchanged for money. However, mountains, rivers, sea or forests are also resources but they do not have economic value.\r\n\r\nThere are two most important factors that can turn any substance into a resource- time and technology. With the help of technology, innovation humans can transform a natural or man-made substance into a resource. Like, minerals, fish or other marine creatures sourced from the sea can be used for our food and medicines. Similarly, time also adds to the value of a resource. For example, fossil deposits of organisms over hundreds of years can turn into fossil fuels.', '123, 456, 789, Water,    Earth', '1234561', '1234', '1234', '12313123', '2019-10-16 07:10:20', '2019-11-02 08:19:17'),
(2, 2, 'This dataset maps tree canopy for the entirety of Pennsylvania at a resolution of 1m, making it 900 times more detailed than the National Land Cover Dataset (NLCD)! With our landscapes becoming increasingly fragmented and heterogeneous high-resolution datasets add precision and accuracy to any analysis.\r\n\r\nThis data is hosted at, and may be downloaded or accessed from PASDA, the Pennsylvania Spatial Data Access Geospatial Data Clearinghouse', 'Water, Earth, Resources, test', 'Dow AgroSciences LLC', '2018', '2019', 'Le D, Nguyen C, Kumar B, Mann R (2017)', '2019-10-16 09:52:31', '2019-11-02 11:39:16'),
(5, 5, 'This is model files for PyTOPKAPI simulation of', NULL, NULL, '2018', '2019', NULL, '2019-11-02 08:08:43', '2019-11-02 08:23:03'),
(6, 6, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-02 10:42:24', '2019-11-02 10:42:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project_info`
--

CREATE TABLE `project_info` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` smallint(5) UNSIGNED NOT NULL,
  `subject_id` smallint(5) UNSIGNED NOT NULL,
  `species` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Private',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `project_info`
--

INSERT INTO `project_info` (`id`, `user_id`, `title`, `role_id`, `subject_id`, `species`, `language`, `availability`, `created_at`, `updated_at`) VALUES
(1, 1, 'Types of Resources', 2, 10, '123 123', 'English', 'Public', '2019-10-16 07:10:20', '2019-11-02 08:19:17'),
(2, 1, 'Pennsylvania Statewide High-Resolution Tree Canopy 2015', 2, 3, 'Echinochloa crus-galli', 'English', 'Public', '2019-10-16 09:52:31', '2019-11-02 11:39:16'),
(5, 3, 'Model files for PyTOPKAPI simulation of SanMarcos500mtrial2', 2, 10, 'test', 'English', 'Public', '2019-11-02 08:08:43', '2019-11-02 08:23:03'),
(6, 1, '21312', 2, 3, NULL, NULL, 'Private', '2019-11-02 10:42:24', '2019-11-02 10:42:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project_personel`
--

CREATE TABLE `project_personel` (
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `title_id` smallint(5) UNSIGNED NOT NULL,
  `role_id` smallint(5) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `project_personel`
--

INSERT INTO `project_personel` (`user_id`, `title_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2019-10-16 07:10:20', '2019-10-16 07:10:20'),
(3, 1, 2, '2019-11-02 00:34:41', '2019-11-02 00:34:41'),
(1, 2, 2, '2019-10-16 09:52:31', '2019-10-16 09:52:31'),
(2, 2, 3, '2019-11-02 09:10:37', '2019-11-02 09:10:37'),
(3, 2, 2, '2019-11-02 09:35:08', '2019-11-02 09:35:08'),
(1, 5, 2, '2019-11-02 08:08:49', '2019-11-02 08:08:49'),
(3, 5, 2, '2019-11-02 08:08:43', '2019-11-02 08:08:43'),
(1, 6, 2, '2019-11-02 10:42:24', '2019-11-02 10:42:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nameRole` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionRole` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `nameRole`, `descriptionRole`, `created_at`, `updated_at`) VALUES
(2, 'Project leader', 'Leader of project', '2019-10-16 06:51:10', '2019-10-16 06:51:10'),
(3, 'Researcher', 'Researcher of project', '2019-10-16 06:51:26', '2019-10-16 06:51:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nameSubject` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptionSubject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imageSubject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `nameSubject`, `descriptionSubject`, `imageSubject`, `created_at`, `updated_at`) VALUES
(3, 'Water Resources', 'Kết quả hình ảnh cho water Resourcespublic.wmo.int\r\nWater resources are natural resources of water that are potentially useful. Uses of water include agricultural, industrial, household, recreational and environmental activities.', 'http://localhost/doan/public/storage/31fef6759a533fd68c5d70c2f405672awr.jpg', '2019-10-16 05:52:34', '2019-10-16 06:26:03'),
(10, 'Natural Resources', 'Anything and everything that is available naturally on earth is a natural resource. We can further divide them into:', 'http://localhost/doan/public/storage/ae5d0a406769b5c31f047b0473867de3Resources-300x225.jpg', '2019-10-17 02:29:26', '2019-10-17 02:29:26'),
(12, 'Biotic & Abiotic', 'Any life form that lives within nature is a Biotic Resource, like humans, animals, plants, etc. In contrast, an abiotic resource is that which is available in nature but has no life; like metals, rocks, and stones. Both biotic and abiotic resources can be renewable or non-renewable.', 'http://localhost/doan/public/storage/a07cc0ed67cf07c8ed0cf21e2b3c1ff8shutterstock-759148972.jpg', '2019-10-19 07:34:23', '2019-10-19 07:34:23'),
(13, 'Renewable & Non-renewable', 'Renewable resources are almost all elements of nature which can renew themselves. For e.g. sunlight, wind, water, forests and likewise. While, non-renewable resources, are limited in their quantity. Like fossil fuels and minerals. Though these resources take millions of years to form, they would eventually get over within our lifetime if we use continuously.', 'http://localhost/doan/public/storage/c1d170adae5cb503fd628bd358867c252015-04-19-IGEL-banner-art-1024x440.jpg', '2019-10-19 07:36:43', '2019-10-19 07:36:43'),
(14, 'Man-Made Resources', 'When humans use natural things to make something new that provides utility and value to our lives, it is called human-made resources. For instance, when we use metals, wood, cement, sand, and solar energy to make buildings, machinery, vehicles, bridges, roads, etc. they become man-made resources. Likewise, technology is also a man-made resource. Man-made resources are mostly renewable. One can re-build a building or fixed a broken machine.', 'http://localhost/doan/public/storage/6924a3557b1c77cba628a810f976e08eeyeem-135669313.jpg', '2019-10-19 07:42:25', '2019-10-19 07:42:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `institution`, `address`, `country`, `position`, `email`, `email_verified_at`, `phone`, `password`, `isAdmin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cuong Dinh', 'Khong co', 'Ha noi', 'Viet Nam', 'Student', 'cuongdz1507@gmail.com', NULL, '0123456789', '$2y$10$kTjPoxrJJKdtPXyZnbNlJOO.tdWIzaVIpk4BP.w4W0ZfZXxg.MyF.', 1, NULL, NULL, NULL),
(2, 'Khong phai cuong', '123', '123', 'Viet Nam', '123', 'ahihi@gmail.com', NULL, '123', '$2y$10$6nN5mf3MdL7eoChIb/xFSu5CmCJTsxye5u6iRtDO85pGSWIQDl/xq', 0, NULL, '2019-10-16 08:03:19', '2019-10-16 08:03:19'),
(3, 'Linh tinh', '123', '123', 'Viet Nam', '123', 'cuong1@gmail.com', NULL, '123123123', '$2y$10$VX2VJXGmG3wf27iN0bWD3.Ru96jt5Wbnn.vRoVDAXu/ABMZtf6NuO', 0, NULL, '2019-10-16 09:57:25', '2019-10-16 09:57:25');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `project_data_description`
--
ALTER TABLE `project_data_description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_data_description_user_id_foreign` (`user_id`),
  ADD KEY `project_data_description_title_id_foreign` (`title_id`);

--
-- Chỉ mục cho bảng `project_description`
--
ALTER TABLE `project_description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_description_title_id_foreign` (`title_id`);

--
-- Chỉ mục cho bảng `project_info`
--
ALTER TABLE `project_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_info_role_id_foreign` (`role_id`),
  ADD KEY `project_info_subject_id_foreign` (`subject_id`);

--
-- Chỉ mục cho bảng `project_personel`
--
ALTER TABLE `project_personel`
  ADD PRIMARY KEY (`title_id`,`user_id`),
  ADD KEY `project_personel_user_id_foreign` (`user_id`),
  ADD KEY `project_personel_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT cho bảng `project_data_description`
--
ALTER TABLE `project_data_description`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `project_description`
--
ALTER TABLE `project_description`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `project_info`
--
ALTER TABLE `project_info`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `project_data_description`
--
ALTER TABLE `project_data_description`
  ADD CONSTRAINT `project_data_description_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `project_info` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_data_description_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `project_description`
--
ALTER TABLE `project_description`
  ADD CONSTRAINT `project_description_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `project_info` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `project_info`
--
ALTER TABLE `project_info`
  ADD CONSTRAINT `project_info_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_info_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `project_personel`
--
ALTER TABLE `project_personel`
  ADD CONSTRAINT `project_personel_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_personel_title_id_foreign` FOREIGN KEY (`title_id`) REFERENCES `project_info` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_personel_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
