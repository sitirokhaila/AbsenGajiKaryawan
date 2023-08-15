-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2023 at 11:37 PM
-- Server version: 10.5.18-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warg3633_oscarstore_utama`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id` int(11) NOT NULL,
  `idShift` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `fotoMasuk` varchar(256) NOT NULL,
  `fotoPulang` varchar(256) NOT NULL,
  `jamMasuk` time NOT NULL,
  `jamPulang` time NOT NULL,
  `lama` time NOT NULL,
  `urlMasuk` text NOT NULL,
  `urlPulang` text NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`id`, `idShift`, `idUser`, `tanggal`, `fotoMasuk`, `fotoPulang`, `jamMasuk`, `jamPulang`, `lama`, `urlMasuk`, `urlPulang`, `status`) VALUES
(1, 1, 4, '2023-01-25', 'Foto-1674616037.jpg', 'Foto-1674616707.jpg', '10:07:17', '10:18:27', '00:11:10', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-6.1965527+106.8222705', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-6.195164+106.8209501', 'Terlambat'),
(2, 1, 4, '2023-01-26', 'Foto-1674695637.jpg', 'Foto-1674735420.jpg', '08:13:57', '19:17:00', '11:03:03', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-6.11762+106.7709578', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-6.1443425+106.6657903', 'Terlambat'),
(3, 1, 7, '2023-01-26', 'Foto-1674696257.jpg', 'Foto-1674729060.jpg', '08:24:17', '17:31:00', '09:06:43', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-6.117617+106.7709539', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-6.1176088+106.7709563', 'Terlambat'),
(4, 1, 5, '2023-01-26', 'Foto-1674696425.jpg', 'Foto-1674728937.jpg', '08:27:05', '17:28:57', '09:01:52', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-6.1176172+106.7709571', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-6.1176176+106.7709693', 'Terlambat'),
(9, 1, 5, '2023-01-27', 'Foto-1674798720.jpg', '', '12:52:00', '00:00:00', '00:00:00', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-6.1269217+106.7905821', '', 'Terlambat'),
(10, 1, 5, '2023-01-28', 'Foto-1674889935.jpg', '', '14:12:15', '00:00:00', '00:00:00', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-6.1407149+106.669475', '', 'Terlambat'),
(11, 1, 4, '2023-01-29', 'Foto-1674935306.jpg', 'Foto-1674987339.jpg', '04:48:26', '19:15:39', '14:27:13', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-6.1393508+106.6683456', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-6.1443425+106.6657903', 'On Time'),
(12, 1, 4, '2023-01-30', 'Foto-1675042772.jpg', 'Foto-1675072691.jpg', '10:39:32', '18:58:11', '08:18:39', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-6.1176407+106.770976', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-6.1176369+106.7709586', 'Terlambat'),
(13, 1, 9, '2023-01-30', 'Foto-1675043082.jpg', '', '10:44:42', '00:00:00', '00:00:00', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-0.8949133+131.3247064', '', 'Terlambat'),
(14, 1, 4, '2023-01-31', 'Foto-1675119030.jpg', '', '07:50:30', '00:00:00', '00:00:00', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-6.1443425+106.6657903', '', 'On Time'),
(15, 1, 11, '2023-02-01', 'Foto-1675204468.jpg', '', '07:34:28', '00:00:00', '00:00:00', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-0.8830844+131.293592', '', 'On Time'),
(16, 1, 9, '2023-02-01', 'Foto-1675205358.jpg', '', '07:49:18', '00:00:00', '00:00:00', 'https://maps.google.com/maps?&z=15&mrt=yp&t=k&q=-0.8862549481760779+131.28549667070592', '', 'On Time'),
(18, 0, 9, '2023-02-02', 'Lampiran-1675303012.jpg', '', '10:56:52', '00:00:00', '00:00:00', '', '', 'Izin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aplikasi`
--

CREATE TABLE `tb_aplikasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `email` varchar(256) NOT NULL,
  `alamat` text NOT NULL,
  `logo` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_aplikasi`
--

INSERT INTO `tb_aplikasi` (`id`, `nama`, `telp`, `email`, `alamat`, `logo`) VALUES
(1, 'Absensi Karyawan', '0896123456', 'warajaya@gmail.com', 'Galeri Mediterania Blok A No.11  Jl. Sukses Jaya, Kapuk, Jakarta Utara', 'Logo-1674750590.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cabang`
--

CREATE TABLE `tb_cabang` (
  `id` int(11) NOT NULL,
  `cabang` varchar(256) NOT NULL,
  `terdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_cabang`
--

INSERT INTO `tb_cabang` (`id`, `cabang`, `terdaftar`) VALUES
(1, 'Cabang A (Pusat)', '2023-01-24 22:06:37'),
(2, 'Cabang B', '2023-01-24 22:06:42'),
(4, 'Cabang C', '2023-01-26 21:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id` int(11) NOT NULL,
  `idKaryawan` int(11) NOT NULL,
  `idKriteria` int(11) NOT NULL,
  `nominal` int(16) NOT NULL,
  `terdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id`, `idKaryawan`, `idKriteria`, `nominal`, `terdaftar`) VALUES
(1, 3, 1, 2500000, '2023-01-25 04:21:36'),
(2, 3, 3, 250000, '2023-01-25 04:21:44'),
(3, 3, 4, 150000, '2023-01-25 04:21:50'),
(4, 3, 5, 50000, '2023-01-25 04:22:30'),
(5, 4, 1, 3000000, '2023-01-26 06:15:37'),
(6, 4, 4, 900000, '2023-01-25 15:03:35'),
(7, 4, 2, 100000, '2023-01-26 06:16:01'),
(8, 5, 1, 3000000, '2023-01-26 06:19:43'),
(9, 5, 4, 900000, '2023-01-26 06:20:00'),
(10, 5, 2, 100000, '2023-01-26 06:20:15'),
(11, 11, 1, 3000000, '2023-01-26 22:01:12'),
(12, 11, 4, 900000, '2023-01-26 22:01:49'),
(13, 11, 2, 100000, '2023-01-26 22:02:10'),
(14, 10, 1, 3000000, '2023-01-26 22:02:54'),
(15, 10, 4, 900000, '2023-01-26 22:03:08'),
(16, 10, 2, 100000, '2023-01-26 22:03:18'),
(17, 9, 1, 3000000, '2023-01-26 22:03:41'),
(18, 9, 4, 900000, '2023-01-26 22:03:56'),
(19, 9, 2, 100000, '2023-01-26 22:04:10'),
(20, 7, 1, 3000000, '2023-01-28 14:53:47'),
(21, 7, 4, 900000, '2023-01-28 14:54:01'),
(22, 4, 5, 150000, '2023-01-29 15:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gajian`
--

CREATE TABLE `tb_gajian` (
  `id` int(11) NOT NULL,
  `idKaryawan` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `terdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_gajian`
--

INSERT INTO `tb_gajian` (`id`, `idKaryawan`, `idAdmin`, `tanggal`, `terdaftar`) VALUES
(6, 4, 8, '2023-01-26', '2023-01-26 22:21:33'),
(7, 5, 1, '2023-01-28', '2023-01-28 14:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(256) NOT NULL,
  `terdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id`, `jabatan`, `terdaftar`) VALUES
(2, 'Pegawai Tetap', '2023-01-24 22:10:46'),
(3, 'Pegawai Tidak Tetap', '2023-01-25 04:11:08'),
(4, 'Security', '2023-01-26 06:00:35'),
(5, 'Kasir', '2023-01-26 06:23:52'),
(6, 'Driver', '2023-01-26 21:47:09'),
(7, 'Finance', '2023-01-28 14:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kewajiban`
--

CREATE TABLE `tb_kewajiban` (
  `id` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `terdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kewajiban`
--

INSERT INTO `tb_kewajiban` (`id`, `bulan`, `tahun`, `jumlah`, `terdaftar`) VALUES
(2, 1, 2023, 24, '2023-01-25 04:01:23'),
(3, 2, 2023, 24, '2023-01-26 14:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kirimgaji`
--

CREATE TABLE `tb_kirimgaji` (
  `id` int(11) NOT NULL,
  `idGajian` int(11) NOT NULL,
  `idKaryawan` int(11) NOT NULL,
  `idKriteria` int(11) NOT NULL,
  `nominal` int(16) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kirimgaji`
--

INSERT INTO `tb_kirimgaji` (`id`, `idGajian`, `idKaryawan`, `idKriteria`, `nominal`, `keterangan`) VALUES
(16, 6, 4, 1, 3000000, ''),
(17, 6, 4, 4, 900000, ''),
(18, 6, 4, 2, 100000, ''),
(19, 6, 4, 0, 1100000, 'Alpa'),
(20, 6, 4, 0, 10000, 'Terlambat'),
(21, 7, 5, 1, 3000000, ''),
(22, 7, 5, 4, 900000, ''),
(23, 7, 5, 0, 1050000, 'Alpa'),
(24, 7, 5, 0, 15000, 'Terlambat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id` int(11) NOT NULL,
  `kriteria` varchar(256) NOT NULL,
  `jenis` varchar(32) NOT NULL,
  `terdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id`, `kriteria`, `jenis`, `terdaftar`) VALUES
(1, 'Gaji Pokok', 'Penambahan', '2023-01-25 04:02:34'),
(2, 'Bonus', 'Penambahan', '2023-01-25 04:02:42'),
(3, 'Tabungan', 'Penambahan', '2023-01-25 04:02:52'),
(4, 'Uang Makan', 'Penambahan', '2023-01-25 04:03:17'),
(5, 'BPJS Ketenagakerjaan', 'Potongan', '2023-01-25 04:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_shift`
--

CREATE TABLE `tb_shift` (
  `id` int(11) NOT NULL,
  `shift` varchar(256) NOT NULL,
  `jamMasuk` time NOT NULL,
  `jamPulang` time NOT NULL,
  `status` varchar(16) NOT NULL,
  `terdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_shift`
--

INSERT INTO `tb_shift` (`id`, `shift`, `jamMasuk`, `jamPulang`, `status`, `terdaftar`) VALUES
(1, 'Jam Kerja', '08:00:00', '17:00:00', 'Normal', '2023-01-24 22:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `email` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `skin` varchar(8) NOT NULL,
  `level` varchar(16) NOT NULL,
  `idCabang` int(11) NOT NULL,
  `idJabatan` int(11) NOT NULL,
  `terdaftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `telp`, `email`, `username`, `password`, `foto`, `skin`, `level`, `idCabang`, `idJabatan`, `terdaftar`) VALUES
(1, 'Admin Utama', '089612345678', 'adminutama@gmail.com', 'admin', '$2y$10$KOCbtp5btdRD1oBS5oAh/.EJ7QuEDqyzs8QcDDZJe8xOzMRQYvvOK', 'Profil-1674750339.png', 'blue', 'Administrator', 0, 0, '2023-01-11 10:31:51'),
(4, 'Abdul', '08123456789', 'abdul@gmail.com', 'abdul', '$2y$10$8s9Bjv4beqJNtnKMYHxNu.H2Fa1IMy7lMBQGUa0X2SDQaKqVsUNx.', 'Profil-1674671065.jpeg', 'blue', 'Karyawan', 2, 2, '2023-01-25 10:01:44'),
(5, 'Amir', '0823456789', 'amir@gmail.com', 'amir', '$2y$10$0kknRBnk/71ZzW4RbNBBJ.FdwnwxpmmAe9kEwEDgOoEggkglR4qd2', 'no-image.png', 'blue', 'Karyawan', 2, 4, '2023-01-26 06:18:21'),
(7, 'Anisa', '083456789', 'anisa@gmail.com', 'anisa', '$2y$10$CEz60bb4ZmWivL/Y508QluyeOuCY9O6Yx3271cebDaLT//G0xF4tq', 'no-image.png', 'blue', 'Karyawan', 2, 5, '2023-01-26 06:26:00'),
(8, 'Kartika', '08456789123', 'kartika@gmail.com', 'kartika', '$2y$10$rI9pt1LOCfikAwmNMVzzJehCdbjOE0Ok5SBnzwHTqRD/qPNyATiz6', 'Profil-1674745161.png', 'blue', 'Administrator', 2, 2, '2023-01-26 06:27:12'),
(9, 'Bunga', '08567891234', 'bunga@gmail.com', '001', '$2y$10$lausimbjEWFDBzjlwjL.duVqj5am6vIiBI/aqoGXotLtsw0649EXK', 'Profil-1674746243.png', 'blue', 'Karyawan', 4, 5, '2023-01-26 21:44:38'),
(10, 'Azizah', '082291032256', 'azizah098765465414141@gmail.com', '002', '$2y$10$tH41C2QC6vN1dN5oQV/H8uNZuqvjUFehQ5EmsuS/9r1CSJ0jDuVa.', 'Profil-1675205962.jpg', 'red', 'Karyawan', 4, 5, '2023-01-26 21:45:41'),
(11, 'Rizki', '08789123456', 'rizki@gmail.com', '003', '$2y$10$LUDShi6NJNzLH//uje5oPeDnueXXd4B1WI0QIK6T3G0PA/Tc.kgMe', 'no-image.png', 'blue', 'Karyawan', 4, 6, '2023-01-26 21:48:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK01` (`idUser`);

--
-- Indexes for table `tb_aplikasi`
--
ALTER TABLE `tb_aplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cabang`
--
ALTER TABLE `tb_cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gajian`
--
ALTER TABLE `tb_gajian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kewajiban`
--
ALTER TABLE `tb_kewajiban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kirimgaji`
--
ALTER TABLE `tb_kirimgaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_shift`
--
ALTER TABLE `tb_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_aplikasi`
--
ALTER TABLE `tb_aplikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_cabang`
--
ALTER TABLE `tb_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_gajian`
--
ALTER TABLE `tb_gajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kewajiban`
--
ALTER TABLE `tb_kewajiban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kirimgaji`
--
ALTER TABLE `tb_kirimgaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_shift`
--
ALTER TABLE `tb_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
