-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 03:11 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventkita`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `username_penyelenggara` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time(6) NOT NULL,
  `kuota` int(11) NOT NULL,
  `link_meet` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `poster` varchar(100) NOT NULL,
  `disetujui` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `username_penyelenggara`, `nama`, `tanggal`, `waktu`, `kuota`, `link_meet`, `deskripsi`, `poster`, `disetujui`) VALUES
(1, 'upnvj', 'WEBINAR : Menjadi Mahasiswa Berprestasi Tanpa Usaha ', '2021-11-30', '22:40:00.000000', 90, 'meet.google.com/new', 'Webinar : Menjadi Mahasiswa Berprestasi Tanpa Usaha \r\nPembicara :  Azy Umardi Azhra\r\n', 'default.jpeg', 0),
(2, 'mulmedupnvj', 'WORKSHOP PERSONAL BRANDING WITH HTML & CSS', '2021-11-25', '16:51:00.000000', 50, 'meet.google.com/new', '[KSM MULTIMEDIA UPN VETERAN JAKARTA]\r\n\r\n???????????? PROUDLY PRESENT WORKSHOP WEB DEVELOPMENT ????????????\r\n\r\n\r\nMenuju era society 5.0, tentunya kita semakin akrab dengan teknologi. Banyak sekali startup yang bermunculan. Oleh karena itu kita membutuhkan personal branding untuk mendongkrak produk - produk serta karya kita, agar tidak kalah saing.\r\n\r\nUntuk itu KSM Multimedia mengadakan workshop dengan tema ????\"PERSONAL BRANDING WITH HTML AND CSS.\"???? Workshop ini dapat menjadi wadah bagi generasi muda yang ingin terus aktif mengembangkan karyanya, dengan memberikan tips kekinian serta strategi yang lebih profesional ketika memamerkan portofolionya untuk menarik perhatian para klien atau perusahaan.\r\n\r\nTunggu apa lagi? Segera daftarkan diri kalian pada link di bawah ini ????????????\r\nhttps://bit.ly/RegistrasiWorkshopMulmed\r\nJangan sampai ketinggalan belajar dan seru-seruan bareng yang lain!!????????\r\n\r\n⚡????\"Boost all your creation through website\"????⚡\r\n\r\n????Contact Person???? :\r\n1. Mutia : mutiaa.h (Line)\r\n2. Rangga : 089643980391 (Whatsapp)\r\n\r\n#workshopwebdevelopment\r\n#workshop\r\n#webdevelopment\r\n#multimedia', 'default.jpeg', 0),
(3, 'upnvj', 'YANG MUDA YANG BERKARYA', '2021-11-27', '13:30:00.000000', 150, 'meet.google.com/new', 'Penyelenggara : Bank BRI\r\nPembicara : Herdy Harman', 'Poster-Inspira-webinar.jpeg', 0),
(4, 'upnvj', 'tes', '2021-11-04', '13:51:00.000000', 200, 'google.com', 'tes123', 'Poster-Inspira-webinar_1.jpeg', 1),
(5, 'upnvj', 'Menyelematkan kelompok marginal dari hantaman covid 19', '2021-11-30', '14:43:00.000000', 120, 'zoom.us', 'Menyelematkan kelompok marginal dari hantaman covid 19', 'poster-webinar.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penyelenggara`
--

CREATE TABLE `penyelenggara` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `gambar_profil` varchar(100) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyelenggara`
--

INSERT INTO `penyelenggara` (`id`, `username`, `email`, `nama`, `alamat`, `no_hp`, `gambar_profil`) VALUES
(1, 'upnvj', 'upnvj@gmail.com', 'UPN Veteran Jakarta', NULL, NULL, 'default.jpg'),
(2, 'mulmedupnvj', 'mulmed@upnvj.ac.id', 'KSM Multimedia UPNVJ', NULL, NULL, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `daftar_acara` varchar(300) DEFAULT NULL,
  `gambar_profil` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `username`, `email`, `nama`, `alamat`, `jk`, `no_hp`, `daftar_acara`, `gambar_profil`, `tanggal_lahir`) VALUES
(1, 'hanif', 'radityo.hanif@gmail.com', 'Hanif Radityo', NULL, NULL, NULL, NULL, 'default.jpg', NULL),
(2, 'aicreation', 'aicreation@gmail.com', 'AI Creation', NULL, NULL, NULL, NULL, 'default.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipe_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `tipe_user`) VALUES
(1, 'hanif', '$2y$10$l1B1geSAQm7j9kT7fUggLe8y3PTzIaBkG8TDP7KvnxHgF/LGgbzWm', 'radityo.hanif@gmail.com', 'peserta'),
(2, 'upnvj', '$2y$10$cxgliLJTtJw19dJojWH1U.SuxYnMBqFqhTPnbt7ScGVqvvSkdUG0u', 'upnvj@gmail.com', 'penyelenggara'),
(3, 'mulmedupnvj', '$2y$10$m06/NPltLZ08S3EOQOmwK.E8rHXbQE7xG1d81ARZaxk7E7Vpzv6FO', 'mulmed@upnvj.ac.id', 'penyelenggara'),
(4, 'aicreation', '$2y$10$EhCBS3qSJDbHmAImcE35s.iPuR5dWG.oYBveIMGXkAJ62rkT/Ljl2', 'aicreation@gmail.com', 'peserta'),
(5, 'admin', '$2y$10$fEe2ZodkMNrFrP716/grL.7uEvAsBI99XG2KSMdUkqBNnW1qhhVhq', 'admin.eventkita@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyelenggara`
--
ALTER TABLE `penyelenggara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penyelenggara`
--
ALTER TABLE `penyelenggara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;