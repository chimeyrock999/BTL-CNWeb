-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 24, 2022 lúc 11:53 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `musicwebapp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(1, 'Trinh Van Thoai', 'admin@livemusic.com', 'e10adc3949ba59abbe56e057f20f883e', 'assets/admin_image/avatar.jpg', '033889xxxx', 'Vietnam', 'Developer', 'Student at Hanoi University of Science and Technology ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `artworkPath` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES
(1, 'BIGCITYBOY', 1, 'Rap', 'assets\\images\\artworks\\BIGCITYBOI.jpg'),
(2, 'Đi về nhà', 2, 'Rap', 'assets\\images\\artworks\\Di_Ve_Nha.jpg'),
(3, 'Sky Tour (2019)', 5, 'Pop, Ballad', 'assets\\images\\artworks\\sky-tour.jpg'),
(7, 'Show của Đen', 2, 'Rap', 'assets\\images\\artworks\\Show-cua-Den.jpg'),
(8, 'Trốn tìm', 2, 'Rap', 'assets\\images\\artworks\\Tron-tim.jpg'),
(9, 'Mang tiền về cho mẹ', 2, 'Rap', 'assets\\images\\artworks\\Mang-tien-ve-cho-me.jpg'),
(10, 'Trời hôm nay nhiều mây cực!', 2, 'Rap', 'assets\\images\\artworks\\troi-hom-nay-nhieu-may-cuc-!.jpg'),
(11, 'Đừng gọi anh dậy', 4, 'Rap', 'assets\\images\\artworks\\dung-goi-anh-day.jpg'),
(12, 'Từ chối nhẹ nhàng thôi', 3, 'Ballad', 'assets\\images\\artworks\\tu-choi-nhe-nhang-thoi.jpg'),
(13, 'Gieo quẻ', 6, 'Pop', 'assets\\images\\artworks\\gieo-que-hoang-thuy-linh-den.jpg'),
(14, 'Em đây chẳng phải Thúy Kiều', 6, 'Pop', 'assets\\images\\artworks\\em-day-chang-phai-thuy-kieu.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(3, 'Bích Phương'),
(1, 'Binz'),
(16, 'Bray'),
(11, 'Châu Đăng Khoa'),
(10, 'HIEUTHUHAI'),
(6, 'Hoàng Thùy Linh'),
(14, 'Karik'),
(12, 'Lil\'Wuyn'),
(13, 'MCK'),
(9, 'Min'),
(8, 'Mr.Siro'),
(4, 'Phúc Du'),
(5, 'Sơn Tùng MTP'),
(7, 'Thịnh Suy'),
(2, 'Đen Vâu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likedsongs`
--

CREATE TABLE `likedsongs` (
  `songid` int(11) NOT NULL,
  `owner` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `likedsongs`
--

INSERT INTO `likedsongs` (`songid`, `owner`) VALUES
(1, 'chimeyrock3'),
(4, 'chimeyrock3'),
(5, 'chimeyrock3'),
(17, 'trinhvanthoai'),
(19, 'trinhvanthoai'),
(22, 'chimeyrock3'),
(22, 'trinhvanthoai'),
(23, 'trinhvanthoai'),
(24, 'trinhvanthoai'),
(25, 'trinhvanthoai'),
(26, 'trinhvanthoai'),
(28, 'chimeyrock3'),
(28, 'trinhvanthoai'),
(30, 'chimeyrock3'),
(30, 'trinhvanthoai'),
(31, 'trinhvanthoai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `owner` varchar(125) NOT NULL,
  `date` datetime NOT NULL,
  `artworkPath` varchar(250) NOT NULL DEFAULT 'assets\\images\\icons\\playlist.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `owner`, `date`, `artworkPath`) VALUES
(132, 'Playlist #1', 'trinhvanthoai', '2022-02-13 00:00:00', 'assets/images/icons/playlist.png'),
(133, 'Playlist #1', 'chimeyrock3', '2022-02-15 00:00:00', 'assets/images/icons/playlist.png'),
(134, 'Playlist #2', 'chimeyrock3', '2022-02-15 00:00:00', 'assets/images/icons/playlist.png'),
(135, 'Playlist #3', 'chimeyrock3', '2022-02-15 00:00:00', 'assets/images/icons/playlist.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlistsongs`
--

CREATE TABLE `playlistsongs` (
  `id` int(11) NOT NULL,
  `songId` int(11) NOT NULL,
  `playlistId` int(11) NOT NULL,
  `playlistOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `playlistsongs`
--

INSERT INTO `playlistsongs` (`id`, `songId`, `playlistId`, `playlistOrder`) VALUES
(32, 31, 132, 0),
(34, 15, 132, 2),
(35, 38, 133, 0),
(36, 38, 134, 0),
(37, 32, 133, 1),
(38, 32, 134, 1),
(39, 37, 135, 0),
(40, 35, 135, 1),
(41, 34, 135, 2),
(42, 6, 135, 3),
(43, 2, 133, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` varchar(125) NOT NULL,
  `duration` int(11) NOT NULL,
  `path` varchar(250) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(1, 'BIGCITYBOY', 1, 1, 'Rap', 233, 'assets/music/TOULIVER x BINZ - -BIGCITYBOI- (Official Music Video).mp3', 8, 68),
(2, 'Chắc Ai Đó Sẽ Về (Sky Tour 2019)', 5, 3, 'Pop, Ballad', 283, 'assets\\music\\Chắc Ai Đó Sẽ Về (Sky Tour 2019).mp3', 6, 43),
(4, 'Chạy Ngay Đi (Sky Tour 2019)', 5, 3, 'Pop, Ballad', 309, 'assets\\music\\Chạy Ngay Đi (Sky Tour 2019).mp3', 2, 55),
(5, 'Sky Tour Intro', 5, 3, 'Rap', 209, 'assets\\music\\Sky Tour Intro.mp3', 1, 64),
(6, 'Chúng Ta Không Thuộc Về Nhau (Sky Tour 2019)', 5, 3, 'Rap', 247, 'assets\\music\\Chúng Ta Không Thuộc Về Nhau (Sky Tour 2019).mp3', 3, 56),
(15, 'Mười Năm ft. Ngọc Linh (Live at Show của Đen)', 2, 7, 'Rap', 285, 'assets\\music\\Mười Năm ft. Ngọc Linh (Live at Show của Đen).mp3', 1, 4),
(16, 'Lộn Xộn II (Live at Show của Đen)', 2, 7, 'Rap', 148, 'assets\\music\\Lộn Xộn II (Live at Show của Đen ).mp3', 2, 5),
(17, 'Nhiều Năm Nữa (Live at Show của Đen)', 2, 7, 'Rap', 199, 'assets\\music\\Nhiều Năm Nữa (Live at Show của Đen ).mp3', 3, 2),
(18, 'Trời Ơi Con Chưa Muốn Chết (Live at Show của Đen)', 2, 7, 'Rap', 188, 'assets\\music\\Trời Ơi Con Chưa Muốn Chết (Live at Show của Đen ).mp3', 4, 2),
(19, 'Đố em biết anh đang nghĩ gì (Live at Show của Đen)', 2, 7, 'Rap', 275, 'assets\\music\\Đố em biết anh đang nghĩ gì (Live at Show của Đen ).mp3', 5, 3),
(21, 'Mơ (Live at Show của Đen)', 2, 7, 'Rap', 233, 'assets\\music\\Mơ (Live at Show của Đen).mp3', 6, 2),
(22, 'Cho Tôi Lang Thang (Live at Show của Đen)', 2, 7, 'Rap', 272, 'assets\\music\\Trời Ơi Con Chưa Muốn Chết (Live at Show của Đen ).mp3', 8, 4),
(23, 'Anh Đếch Cần Gì Nhiều Ngoài Em (Live at Show của Đen)', 2, 7, 'Rap', 246, 'assets\\music\\Anh Đếch Cần Gì Nhiều Ngoài Em (Live at Show của Đen).mp3', 9, 2),
(24, 'Đi Theo Bóng Mặt Trời (Live at Show của Đen)', 2, 7, 'Rap', 236, 'assets\\music\\Đi Theo Bóng Mặt Trời (Live at Show của Đen).mp3', 10, 4),
(25, 'Bài Này Chill Phết (Live at Show của Đen)', 2, 7, 'Rap', 294, 'assets\\music\\Bài Này Chill Phết (Live at Show của Đen).mp3', 11, 4),
(26, 'hai triệu năm ft. Biên (Live at Show của Đen)', 2, 7, 'Rap', 298, 'assets\\music\\hai triệu năm ft. Biên (Live at Show của Đen).mp3', 12, 3),
(27, 'Đưa Nhau Đi Trốn ft. Linh Cáo (Live at Show của Đen)', 2, 7, 'Rap', 245, 'assets\\music\\Đưa Nhau Đi Trốn ft. Linh Cáo (Live at Show của Đen).mp3', 13, 1),
(28, 'Ta Cứ Đi Cùng Nhau ft. Linh Cáo (Live at Show của Đen)', 2, 7, 'Rap', 346, 'assets\\music\\Ta Cứ Đi Cùng Nhau ft. Linh Cáo (Live at Show của Đen).mp3', 14, 5),
(29, 'Cảm Ơn (Live at Show của Đen) [Prod. by Novmber]', 2, 7, 'Rap', 274, 'assets\\music\\Anh Đếch Cần Gì Nhiều Ngoài Em (Live at Show của Đen).mp3', 15, 3),
(30, 'Trốn tìm', 2, 8, 'Rap', 248, 'assets\\music\\Trốn Tìm ft. MTV band.mp3', 1, 6),
(31, 'Mang Tiền Về Cho Mẹ ft. Nguyên Thảo', 2, 9, 'Rap', 405, 'assets\\music\\Mang Tiền Về Cho Mẹ ft. Nguyên Thảo.mp3', 1, 9),
(32, 'Đen x JustaTee - Đi Về Nhà', 2, 2, 'Rap', 0, 'assets\\music\\Đen x JustaTee - Đi Về Nhà.mp3', 1, 4),
(34, 'từ chối nhẹ nhàng thôi', 3, 12, 'Rap, Ballad', 250, 'assets/music/PHÚC DU feat. @BÍCH PHƯƠNG - từ chối nhẹ nhàng thôi (Official M-V).mp3', 1, 1),
(35, 'Hoàng Thuỳ Linh & ĐEN - Gieo Quẻ (Casting Coins) ', 6, 13, 'Pop, Rap', 259, 'assets/music/Hoàng Thuỳ Linh & ĐEN - Gieo Quẻ (Casting Coins) - Official Music Video.mp3', 1, 1),
(36, 'PHÚC DU - Đừng Gọi Anh Dậy', 4, 11, 'Rap', 245, 'assets/music/PHÚC DU - Đừng Gọi Anh Dậy (Official M-V).mp3', 1, 0),
(37, 'Đen - Trời hôm nay nhiều mây cực!', 2, 10, 'Rap', 249, 'assets/music/Đen - Trời hôm nay nhiều mây cực! (M-V).mp3', 1, 0),
(38, 'Hoàng Thùy Linh - Em Đây Chẳng Phải Thúy Kiều (I Am Not Thuy Kieu)', 6, 14, 'Pop', 212, 'assets/music/Hoàng Thùy Linh - Em Đây Chẳng Phải Thúy Kiều (I Am Not Thuy Kieu) - Official Lyrics Video.mp3', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `firstname` varchar(125) NOT NULL,
  `lastname` varchar(125) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(125) NOT NULL,
  `date` datetime NOT NULL,
  `profilePic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `date`, `profilePic`) VALUES
(3, 'chimeyrock2', 'Văn Thoại', 'Trịnh', 'test1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-01-03 00:00:00', 'assets/images/profile-pics/head_emerald.png'),
(4, 'chimeyrock999', 'Trịnh Văn', 'Thoại', 'trinhvanthoai@gmail.com', '585a37b786432d4f0f03473186b545b2', '2022-01-13 00:00:00', 'assets/images/profile-pics/head_emerald.png'),
(7, 'trinhvanthoai', 'Thoai', 'Trinh Van', 'trinhvanthoai1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-13 00:00:00', 'assets/images/profile-pics/head_emerald.png'),
(8, 'chimeyrock3', 'Trinh', 'Van Thoai', 'trinhvanthoai3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-02-14 00:00:00', 'assets/images/profile-pics/head_emerald.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `views` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `views`
--

INSERT INTO `views` (`id`, `views`) VALUES
(1, 1265);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist` (`artist`);

--
-- Chỉ mục cho bảng `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_name` (`name`) USING BTREE;

--
-- Chỉ mục cho bảng `likedsongs`
--
ALTER TABLE `likedsongs`
  ADD PRIMARY KEY (`songid`,`owner`),
  ADD KEY `likedsongs_ibfk_1` (`owner`);

--
-- Chỉ mục cho bảng `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playlists_ibfk_2` (`owner`);

--
-- Chỉ mục cho bảng `playlistsongs`
--
ALTER TABLE `playlistsongs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `songId` (`songId`,`playlistId`),
  ADD KEY `playlistId` (`playlistId`);

--
-- Chỉ mục cho bảng `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `album_2` (`album`,`albumOrder`),
  ADD UNIQUE KEY `artist` (`artist`,`album`,`albumOrder`),
  ADD KEY `artist_2` (`artist`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT cho bảng `playlistsongs`
--
ALTER TABLE `playlistsongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`artist`) REFERENCES `artists` (`id`);

--
-- Các ràng buộc cho bảng `likedsongs`
--
ALTER TABLE `likedsongs`
  ADD CONSTRAINT `likedsongs_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`username`) ON DELETE CASCADE,
  ADD CONSTRAINT `likedsongs_ibfk_2` FOREIGN KEY (`songid`) REFERENCES `songs` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_2` FOREIGN KEY (`owner`) REFERENCES `users` (`username`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `playlistsongs`
--
ALTER TABLE `playlistsongs`
  ADD CONSTRAINT `playlistsongs_ibfk_1` FOREIGN KEY (`songId`) REFERENCES `songs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `playlistsongs_ibfk_2` FOREIGN KEY (`playlistId`) REFERENCES `playlists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`album`) REFERENCES `albums` (`id`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`artist`) REFERENCES `artists` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
