-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:8889
-- Thời gian đã tạo: Th12 06, 2022 lúc 05:48 PM
-- Phiên bản máy phục vụ: 5.7.34
-- Phiên bản PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `no05`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `login_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `actived_flag` int(1) NOT NULL DEFAULT '1',
  `reset_password_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `login_id`, `password`, `actived_flag`, `reset_password_token`, `updated`, `created`) VALUES
(1, 'admin123', 'e10adc3949ba59abbe56e057f20f883e', 1, '', '2022-12-06 15:00:45', '2022-12-06 15:00:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `slogan` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `leader` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `event_comments`
--

CREATE TABLE `event_comments` (
  `id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `avatar` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `event_timelines`
--

CREATE TABLE `event_timelines` (
  `id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `from` time NOT NULL,
  `to` time NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `PoC` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `type` int(1) NOT NULL DEFAULT '1',
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_id` (`login_id`);

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `event_comments`
--
ALTER TABLE `event_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `event_timelines`
--
ALTER TABLE `event_timelines`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `event_comments`
--
ALTER TABLE `event_comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `event_timelines`
--
ALTER TABLE `event_timelines`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


ALTER TABLE `event_timelines` ADD CONSTRAINT FK_EventTimelines_Event FOREIGN KEY (`event_id`) REFERENCES `events`(`id`);

ALTER TABLE `event_comments` ADD CONSTRAINT FK_EventComments_Event FOREIGN KEY (`event_id`) REFERENCES `events`(`id`);

