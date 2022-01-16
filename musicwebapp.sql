-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 04:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicwebapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `artworkPath` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albums`
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
(14, 'Em đây chẳng phải Thúy Kiều', 6, 'Pop', 'assets\\images\\artworks\\em-day-chang-phai-thuy-kieu.jpg'),
(15, 'tiny things', 7, 'Pop', 'assets\\images\\artworks\\tiny-things.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(1, 'Binz'),
(2, 'Đen Vâu'),
(3, 'Bích Phương'),
(4, 'Phúc Du'),
(5, 'Sơn Tùng MTP'),
(6, 'Hoàng Thùy Linh'),
(7, 'Thịnh Suy'),
(8, 'Mr.Siro'),
(9, 'Min'),
(10, 'HIEUTHUHAI'),
(11, 'Châu Đăng Khoa'),
(12, 'Lil\'Wuyn'),
(13, 'MCK'),
(14, 'Karik'),
(15, 'Wowy');

-- --------------------------------------------------------

--
-- Table structure for table `likedsongs`
--

CREATE TABLE `likedsongs` (
  `songid` int(11) NOT NULL,
  `owner` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likedsongs`
--

INSERT INTO `likedsongs` (`songid`, `owner`) VALUES
(4, 'chimeyrock999'),
(5, 'chimeyrock999'),
(29, 'chimeyrock999');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `owner` varchar(125) NOT NULL,
  `date` datetime NOT NULL,
  `artworkPath` varchar(250) NOT NULL DEFAULT 'assets\\images\\icons\\playlist.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `owner`, `date`, `artworkPath`) VALUES
(106, 'Playlist #1', 'chimeyrock999', '2022-01-16 00:00:00', 'assets/images/icons/playlist.png'),
(108, 'Playlist #1', 'chimeyrock1', '2022-01-16 00:00:00', 'assets/images/icons/playlist.png');

-- --------------------------------------------------------

--
-- Table structure for table `playlistsongs`
--

CREATE TABLE `playlistsongs` (
  `id` int(11) NOT NULL,
  `songId` int(11) NOT NULL,
  `playlistId` int(11) NOT NULL,
  `playlistOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlistsongs`
--

INSERT INTO `playlistsongs` (`id`, `songId`, `playlistId`, `playlistOrder`) VALUES
(22, 5, 106, 0),
(23, 4, 106, 1),
(24, 6, 106, 2),
(25, 27, 106, 3),
(26, 25, 106, 4),
(27, 20, 106, 5);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
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
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(1, 'BIGCITYBOY', 1, 1, 'Rap', 233, 'assets\\music\\TOULIVER x BINZ - -BIGCITYBOI- (Official Music Video).mp3', 1, 64),
(2, 'Chắc Ai Đó Sẽ Về (Sky Tour 2019)', 5, 3, 'Pop, Ballad', 283, 'assets\\music\\Chắc Ai Đó Sẽ Về (Sky Tour 2019).mp3', 6, 43),
(4, 'Chạy Ngay Đi (Sky Tour 2019)', 5, 3, 'Pop, Ballad', 309, 'assets\\music\\Chạy Ngay Đi (Sky Tour 2019).mp3', 2, 54),
(5, 'Sky Tour Intro', 5, 3, 'Rap', 209, 'assets\\music\\Sky Tour Intro.mp3', 1, 60),
(6, 'Chúng Ta Không Thuộc Về Nhau (Sky Tour 2019)', 5, 3, 'Rap', 247, 'assets\\music\\Chúng Ta Không Thuộc Về Nhau (Sky Tour 2019).mp3', 3, 52),
(15, 'Mười Năm ft. Ngọc Linh (Live at Show của Đen)', 2, 7, 'Rap', 285, 'assets\\music\\Mười Năm ft. Ngọc Linh (Live at Show của Đen).mp3', 1, 2),
(16, 'Lộn Xộn II (Live at Show của Đen)', 2, 7, 'Rap', 148, 'assets\\music\\Lộn Xộn II (Live at Show của Đen ).mp3', 2, 5),
(17, 'Nhiều Năm Nữa (Live at Show của Đen)', 2, 7, 'Rap', 199, 'assets\\music\\Nhiều Năm Nữa (Live at Show của Đen ).mp3', 3, 1),
(18, 'Trời Ơi Con Chưa Muốn Chết (Live at Show của Đen )', 2, 7, 'Rap', 188, 'assets\\music\\Trời Ơi Con Chưa Muốn Chết (Live at Show của Đen ).mp3', 4, 2),
(19, 'Đố em biết anh đang nghĩ gì (Live at Show của Đen )', 2, 7, 'Rap', 275, 'assets\\music\\Đố em biết anh đang nghĩ gì (Live at Show của Đen ).mp3', 5, 2),
(20, 'Loving You Sunny (Live at Show của Đen )', 2, 7, 'Rap', 319, 'assets\\music\\Loving You Sunny (Live at Show của Đen ).mp3', 7, 1),
(21, 'Mơ (Live at Show của Đen)', 2, 7, 'Rap', 233, 'assets\\music\\Mơ (Live at Show của Đen).mp3', 6, 2),
(22, 'Cho Tôi Lang Thang (Live at Show của Đen )', 2, 7, 'Rap', 272, 'assets\\music\\Trời Ơi Con Chưa Muốn Chết (Live at Show của Đen ).mp3', 8, 1),
(23, 'Anh Đếch Cần Gì Nhiều Ngoài Em (Live at Show của Đen)', 2, 7, 'Rap', 246, 'assets\\music\\Anh Đếch Cần Gì Nhiều Ngoài Em (Live at Show của Đen).mp3', 9, 2),
(24, 'Đi Theo Bóng Mặt Trời (Live at Show của Đen)', 2, 7, 'Rap', 236, 'assets\\music\\Đi Theo Bóng Mặt Trời (Live at Show của Đen).mp3', 10, 1),
(25, 'Bài Này Chill Phết (Live at Show của Đen)', 2, 7, 'Rap', 294, 'assets\\music\\Bài Này Chill Phết (Live at Show của Đen).mp3', 11, 2),
(26, 'hai triệu năm ft. Biên (Live at Show của Đen)', 2, 7, 'Rap', 298, 'assets\\music\\hai triệu năm ft. Biên (Live at Show của Đen).mp3', 12, 2),
(27, 'Đưa Nhau Đi Trốn ft. Linh Cáo (Live at Show của Đen)', 2, 7, 'Rap', 245, 'assets\\music\\Đưa Nhau Đi Trốn ft. Linh Cáo (Live at Show của Đen).mp3', 13, 1),
(28, 'Ta Cứ Đi Cùng Nhau ft. Linh Cáo (Live at Show của Đen)', 2, 7, 'Rap', 346, 'assets\\music\\Ta Cứ Đi Cùng Nhau ft. Linh Cáo (Live at Show của Đen).mp3', 14, 1),
(29, 'Cảm Ơn (Live at Show của Đen) [Prod. by Novmber]', 2, 7, 'Rap', 274, 'assets\\music\\Anh Đếch Cần Gì Nhiều Ngoài Em (Live at Show của Đen).mp3', 15, 1),
(30, 'Trốn tìm', 2, 8, 'Rap', 248, 'assets\\music\\Trốn Tìm ft. MTV band.mp3', 1, 2),
(31, 'Mang Tiền Về Cho Mẹ ft. Nguyên Thảo', 2, 9, 'Rap', 405, 'assets\\music\\Mang Tiền Về Cho Mẹ ft. Nguyên Thảo.mp3', 1, 2),
(32, 'Đen x JustaTee - Đi Về Nhà', 2, 2, 'Rap', 0, 'assets\\music\\Đen x JustaTee - Đi Về Nhà.mp3', 1, 2),
(33, 'Đen - Trời hôm nay nhiều mây cực!', 2, 10, 'Rap', 252, 'assets\\images\\artworks\\Đen - Trời hôm nay nhiều mây cực!.mp3', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`, `date`, `profilePic`) VALUES
(2, 'chimeyrock1', 'Thoại', 'Trịnh Văn', 'trinhvanthoai99@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-01-03 00:00:00', 'assets/images/profile-pics/head_emerald.png'),
(3, 'chimeyrock2', 'Văn Thoại', 'Trịnh', 'test1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2022-01-03 00:00:00', 'assets/images/profile-pics/head_emerald.png'),
(4, 'chimeyrock999', 'Trịnh Văn', 'Thoại', 'trinhvanthoai@gmail.com', '585a37b786432d4f0f03473186b545b2', '2022-01-13 00:00:00', 'assets/images/profile-pics/head_emerald.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist` (`artist`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likedsongs`
--
ALTER TABLE `likedsongs`
  ADD PRIMARY KEY (`songid`,`owner`),
  ADD KEY `owner` (`owner`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlistsongs`
--
ALTER TABLE `playlistsongs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `songId` (`songId`,`playlistId`),
  ADD KEY `playlistId` (`playlistId`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `album_2` (`album`,`albumOrder`),
  ADD UNIQUE KEY `artist` (`artist`,`album`,`albumOrder`),
  ADD KEY `artist_2` (`artist`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `playlistsongs`
--
ALTER TABLE `playlistsongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`artist`) REFERENCES `artists` (`id`);

--
-- Constraints for table `likedsongs`
--
ALTER TABLE `likedsongs`
  ADD CONSTRAINT `likedsongs_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `likedsongs_ibfk_2` FOREIGN KEY (`songid`) REFERENCES `songs` (`id`);

--
-- Constraints for table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_2` FOREIGN KEY (`owner`) REFERENCES `users` (`username`);

--
-- Constraints for table `playlistsongs`
--
ALTER TABLE `playlistsongs`
  ADD CONSTRAINT `playlistsongs_ibfk_1` FOREIGN KEY (`songId`) REFERENCES `songs` (`id`),
  ADD CONSTRAINT `playlistsongs_ibfk_2` FOREIGN KEY (`playlistId`) REFERENCES `playlists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`album`) REFERENCES `albums` (`id`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`artist`) REFERENCES `artists` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
