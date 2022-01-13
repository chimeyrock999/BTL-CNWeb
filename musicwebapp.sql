-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 03:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


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
(3, 'Sky Tour (2019)', 5, 'Rap, Pop, Ballad', 'assets\\images\\artworks\\sky-tour.jpg'),
(4, 'Trên tình bạn dưới tình yêu', 9, 'Pop', 'assets\\images\\artworks\\Tren-tinh-ban-duoi-tinh-yeu.jpg'),
(5, 'Chưa bao giờ mẹ kể', 9, 'Pop', 'assets\\images\\artworks\\Chua-bao-gio-me-ke.jpg'),
(6, 'Y.Ê.U', 9, 'Pop', 'assets\\images\\artworks\\Y.E.U.jpg');

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

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `owner` varchar(125) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `owner`, `date`) VALUES
(11, 'Thoại 2', 'chimeyrock1', '2022-01-13 00:00:00'),
(12, 'Thoại 3', 'chimeyrock1', '2022-01-13 00:00:00'),
(13, 'Thoại 4', 'chimeyrock1', '2022-01-13 00:00:00');

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
(2, 1, 11, 0);

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
(1, 'BIGCITYBOY', 1, 1, 'Rap', 233, 'assets\\music\\TOULIVER x BINZ - -BIGCITYBOI- (Official Music Video).mp3', 1, 6),
(2, 'Chắc Ai Đó Sẽ Về (Sky Tour 2019)', 5, 3, 'Rap, Pop, Ballad', 283, 'assets\\music\\Chắc Ai Đó Sẽ Về (Sky Tour 2019).mp3', 6, 0),
(4, 'Chạy Ngay Đi (Sky Tour 2019)', 5, 3, 'Rap, Pop, Ballad', 309, 'assets\\music\\Chạy Ngay Đi (Sky Tour 2019).mp3', 2, 3),
(5, 'Sky Tour Intro', 5, 3, 'Rap', 209, 'assets\\music\\Sky Tour Intro.mp3', 1, 8),
(6, 'Chúng Ta Không Thuộc Về Nhau (Sky Tour 2019)', 5, 3, 'Rap', 247, 'assets\\music\\Chúng Ta Không Thuộc Về Nhau (Sky Tour 2019).mp3', 3, 2),
(7, 'Trên Tình Bạn Dưới Tình Yêu', 9, 4, 'Pop', 199, 'assets\\music\\Trên Tình Bạn Dưới Tình Yêu (Official Audio).mp3', 1, 0),
(8, 'Trên Tình Bạn Dưới Tình Yêu (feat. 16 Typh)', 9, 4, 'Pop', 231, 'assets\\music\\Trên Tình Bạn Dưới Tình Yêu (feat. 16 Typh)(Official Audio).mp3', 2, 0),
(9, 'Chưa Bao Giờ Mẹ Kể feat. ERIK', 9, 5, 'Pop', 258, 'assets\\music\\Chưa Bao Giờ Mẹ Kể feat. ERIK(Official Audio).mp3', 1, 1),
(10, 'Có Em Chờ (Orchestral)', 9, 6, 'POP', 219, 'assets\\music\\Có Em Chờ (Orchestral) (Official Audio).mp3', 1, 1),
(11, 'Em Mới Là Người Yêu Anh - English Ver. ', 9, 6, 'Pop', 244, 'assets\\music\\Em Mới Là Người Yêu Anh - English Ver. (Official Audio).mp3', 2, 1),
(12, 'Hôn Anh', 9, 6, 'Pop', 234, 'assets\\music\\Hôn Anh (Official Audio).mp3', 3, 0),
(13, 'Up To You ', 9, 6, 'Pop', 234, 'assets\\music\\Up To You (Official Audio).mp3', 4, 0),
(14, 'Vì Yêu Cứ Đâm Đầu (feat. Đen, JustaTee)', 9, 6, 'Pop', 231, 'assets\\music\\Vì Yêu Cứ Đâm Đầu (feat. Đen, JustaTee) (Official Audio).mp3', 5, 0);

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
(4, 'chimeyrock999', 'Trịnh Văn', 'Thoại', 'trinhvanthoai@gmail.com', '9f8d5cb7fc16e53d052cafb1544443e8', '2022-01-13 00:00:00', 'assets/images/profile-pics/head_emerald.png');

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
  ADD UNIQUE KEY `songId_2` (`songId`,`playlistId`),
  ADD UNIQUE KEY `songId_3` (`songId`,`playlistOrder`),
  ADD KEY `songId` (`songId`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `playlistsongs`
--
ALTER TABLE `playlistsongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  ADD CONSTRAINT `playlistsongs_ibfk_2` FOREIGN KEY (`playlistId`) REFERENCES `playlists` (`id`);

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
