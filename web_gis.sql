-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2020 at 12:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_gis`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangunan`
--

CREATE TABLE `bangunan` (
  `bangunan_id` int(11) NOT NULL,
  `bangunan_nama` varchar(255) NOT NULL,
  `bangunan_lat` varchar(255) NOT NULL,
  `bangunan_long` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bangunan`
--

INSERT INTO `bangunan` (`bangunan_id`, `bangunan_nama`, `bangunan_lat`, `bangunan_long`, `keterangan`, `gambar`) VALUES
(2, 'Marker 1', '-6.590732', ' 106.807108', 'Babakan', 'rules.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bangunan_polygon`
--

CREATE TABLE `bangunan_polygon` (
  `id_polygon` int(11) NOT NULL,
  `name_polygon` varchar(255) NOT NULL,
  `coordinates` text NOT NULL,
  `information` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bangunan_polygon`
--

INSERT INTO `bangunan_polygon` (`id_polygon`, `name_polygon`, `coordinates`, `information`, `photo`) VALUES
(1, 'poligon', '[[174.998817,-41.233155],[175.001564,-41.252516],[175.02182,-41.255614],[175.047913,-41.25613],[175.065079,-41.239609],[175.060272,-41.224634],[175.01976,-41.219469],[174.998817,-41.233155]]', 'Tempat', 'tim.jpg'),
(2, 'poligon', '[[110.883636,-7.607553],[110.926208,-7.6933],[110.9729,-7.555824],[110.883636,-7.607553]]', 'Tempat', 'homepage1.jpg'),
(3, 'poligon kebun raya', '[[106.797152,-6.59329],[106.79625,-6.594015],[106.794834,-6.594612],[106.794105,-6.596488],[106.794362,-6.597937],[106.794963,-6.599898],[106.795607,-6.601987],[106.796551,-6.604033],[106.798096,-6.603053],[106.798697,-6.602925],[106.799984,-6.602413],[106.802344,-6.601987],[106.803889,-6.601561],[106.804919,-6.600879],[106.80419,-6.595976],[106.802773,-6.593503],[106.8014,-6.592565],[106.800671,-6.592438],[106.799812,-6.592949],[106.79904,-6.593418],[106.798568,-6.593674],[106.797967,-6.593674],[106.797152,-6.59329]]', 'Kebun Raya', 'lapangan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `name`, `level`) VALUES
(7, 'siska', 'afa0b885505255964c06188e2b4e8f59', 'siska', 'admin'),
(8, 'jery', '202cb962ac59075b964b07152d234b70', 'jery', 'operator'),
(9, 'gredo', '202cb962ac59075b964b07152d234b70', 'gredo', 'regular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangunan`
--
ALTER TABLE `bangunan`
  ADD PRIMARY KEY (`bangunan_id`);

--
-- Indexes for table `bangunan_polygon`
--
ALTER TABLE `bangunan_polygon`
  ADD PRIMARY KEY (`id_polygon`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bangunan`
--
ALTER TABLE `bangunan`
  MODIFY `bangunan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bangunan_polygon`
--
ALTER TABLE `bangunan_polygon`
  MODIFY `id_polygon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
