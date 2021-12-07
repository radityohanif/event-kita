-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 08:32 AM
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
  `jumlah_pendaftar` int(11) NOT NULL DEFAULT 0,
  `link_meet` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `poster` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Status Penyetujuan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `username_penyelenggara`, `nama`, `tanggal`, `waktu`, `kuota`, `jumlah_pendaftar`, `link_meet`, `deskripsi`, `poster`, `status`) VALUES
(1, 'upnvj', 'Introduction UX DESIGN', '2021-12-10', '12:00:00.000000', 120, 0, 'meet.google.com/new', 'Introduction UX DESIGN with Zahrah Arissa UX Designer of Tokopedia', 'intro ux design.jpg', 1),
(2, 'upnvj', 'Penulisan Buku Ilmiah Dari Hasil Karya Mahasiswa', '2021-12-02', '21:00:00.000000', 100, 0, 'meet.google.com/new', 'Penulisan Buku Ilmiah Dari Hasil Karya Mahasiswa, Gratis Sertifikat dan Makanan', 'seminar penulisan  buku ilmiah mahasiswa.jpeg', 1),
(3, 'upnvj', 'Workshop Fotografi dan Desain Grafis', '2021-12-16', '22:00:00.000000', 50, 0, 'meet.google.com/new', 'Workshop Fotografi dan Desain Grafis', 'workshop desain grafis.jpg', 1),
(4, 'pengepul', 'Sekolah Madrasah Tanggap Covid19', '2021-12-08', '13:00:00.000000', 300, 0, 'meet.google.com/new', 'Sekolah Madrasah Tanggap Covid19', 'sekolah madrasah tanggap covid19.jpeg', 1),
(5, 'pengepul', 'Penanggulangan Covid 19 Berbasis Pengetahuan dan Inovasi', '2021-12-15', '08:00:00.000000', 400, 70, 'meet.google.com/new', 'Penanggulangan Covid 19 Berbasis Pengetahuan dan Inovasi, -katadata', 'katadata.jpg', 1),
(6, 'pengepul', 'DIGITAL MARKETING : How to Optimize Your Online Business', '2021-12-04', '13:30:00.000000', 200, 150, 'meet.google.com/new', 'DIGITAL MARKETING : How to Optimize Your Online Business', 'WEBINAR-Digital-Marketing-How-To-Optimize-Your-Online-Business.jpg', 1),
(7, 'upnvj', 'WEBINAR GURU BELAJAR : Adaptasi Pembelajaran di Masa Pandemi', '2022-01-01', '19:20:00.000000', 125, 0, 'meet.google.com/new', 'WEBINAR GURU BELAJAR : Adaptasi Pembelajaran di Masa Pandemi', 'webinar guru belajar.jpg', 1),
(8, 'upnvj', 'How To Survive As A Graphic Designer During Pandemic', '2021-12-09', '13:00:00.000000', 150, 20, 'meet.google.com/new', 'Haaiii semua! ✌<br />\r\n<br />\r\nApakabar semuanya!<br />\r\nNih gue mau kasih kabar baik, buat kalian nih temen-temen media kreatif yang berkutat di organisasi dan sekitarnya baik yang emang sukarela maupun yang kepaksa..eh gimana?????. Anyway kali ini Us Creative akan berkolaborasi bersama PPIT Chengdu dalam acara webinar berjudul “How to Survive as a Graphic Designer During The pandemic.” Kita bakal sharing tentang gimana caranya survive ditengah-tengah masa pandemi ini sebagai seorang Graphic Designer. ????<br />\r\n <br />\r\nSAVE THE DATE‼️<br />\r\n???? Sabtu, 27 November 2021<br />\r\n⏰ 13.00-14.45<br />\r\n???? Zoom Meeting<br />\r\n<br />\r\nYuk yang emang lagi ga ada acara langsung cus aja daftar, gausah sok sibuk deh ????<br />\r\nhttps://bit.ly/ppitcduxuscreative<br />\r\n <br />\r\nSampai ketemu lagi di acara webinar nanti, dadah ✌', 'WhatsApp Image 2021-11-21 at 18.28.20.jpeg', 1);

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
(2, 'mulmedupnvj', 'mulmed@upnvj.ac.id', 'KSM Multimedia UPNVJ', NULL, NULL, 'default.jpg'),
(3, 'pengepul', 'pengepul@gmail.com', 'Pengepul Webinar', NULL, NULL, 'default.jpg');

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
  `gambar_profil` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `tanggal_lahir` date DEFAULT NULL,
  `event_saya` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `username`, `email`, `nama`, `alamat`, `jk`, `no_hp`, `gambar_profil`, `tanggal_lahir`, `event_saya`) VALUES
(1, 'hanif', 'radityo.hanif@gmail.com', 'Hanif Radityo', NULL, NULL, NULL, 'default.jpg', NULL, '1,3,5,7,8,8,4'),
(2, 'aicreation', 'aicreation@gmail.com', 'AI Creation', NULL, NULL, NULL, 'default.jpg', NULL, ''),
(4, 'webinarcenter', 'webinar.center@gmail.com', 'Webinar Center', NULL, NULL, NULL, 'default.jpg', NULL, ''),
(5, 'azy', 'azy@gmail.com', 'Azy Umardi Azhra', NULL, NULL, NULL, 'default.jpg', NULL, '');

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
(5, 'admin', '$2y$10$fEe2ZodkMNrFrP716/grL.7uEvAsBI99XG2KSMdUkqBNnW1qhhVhq', 'admin.eventkita@gmail.com', 'admin'),
(6, 'webinarcenter', '$2y$10$PoHGVCM/7OQDxuA5gfxsmey8EPcqWyXzo6/C.kjquqs0aJMJf6QKC', 'webinar.center@gmail.com', 'peserta'),
(7, 'pengepul', '$2y$10$Mipp6nCKcCsLHnZe1O0KY.V3KS8cCFFgimCnSgNAj1l/yCdlHTvqa', 'pengepul@gmail.com', 'penyelenggara'),
(8, 'azy', '$2y$10$gjtNIScu.ZXcjWKbYN5sxu6gFFLeYhneBJw8eroJNhEnF0rNZ6LnK', 'azy@gmail.com', 'peserta');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penyelenggara`
--
ALTER TABLE `penyelenggara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;