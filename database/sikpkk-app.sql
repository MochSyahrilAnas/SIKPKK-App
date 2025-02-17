-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 01:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikpkk-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dasawisma`
--

CREATE TABLE `tbl_dasawisma` (
  `id_dw` int(11) NOT NULL,
  `nama_dw` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dasawisma`
--

INSERT INTO `tbl_dasawisma` (`id_dw`, `nama_dw`, `alamat`) VALUES
(1, 'Mawar', 'Jln Rambutan Rt.01/Rw.02 Ds. Nagrak Kec.Soreang Kab. Bandung'),
(2, 'Edelweis', 'Soreang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `nama_kegiatan`) VALUES
(4, 'PHBN'),
(5, 'Posyandu Balita dan Lansi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keluarga`
--

CREATE TABLE `tbl_keluarga` (
  `no_kk` char(16) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama_lgkp` varchar(50) NOT NULL,
  `hbkel` varchar(30) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `tmp_lhr` varchar(30) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `kriteria` varchar(30) NOT NULL,
  `keb_khs` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_keluarga`
--

INSERT INTO `tbl_keluarga` (`no_kk`, `nik`, `nama_lgkp`, `hbkel`, `jk`, `tmp_lhr`, `tgl_lhr`, `pendidikan`, `pekerjaan`, `kriteria`, `keb_khs`) VALUES
('000', '00001', 'Agus Suherman', 'Kepala Keluarga', 'Laki-laki', 'Bandung', '2023-03-15', 'S1 dan Sederajat', 'Guru', 'PUS', 'None'),
('000', '00002', 'Aisyah Sulaiman', 'Istri', 'Perempuan', 'Bandung', '2023-03-15', 'S3 dan Sederajat', 'Tidak Bekerja', 'WUS', ''),
('000', '00003', 'Sayidah Suherman', 'Anak', 'Perempuan', 'Bandung', '2023-03-15', 'Tidak Tamat SD', 'Tidak Bekerja', 'Balita', ''),
('001', '00101', 'Dani Sudani', 'Kepala Keluarga', 'Laki-laki', 'Solo', '2023-03-17', 'S2 dan Sederajat', 'PNS', 'PUS', 'None'),
('001', '00102', 'Indah Monica', 'Istri', 'Perempuan', 'Bandung', '2023-03-17', 'S1 dan Sederajat', 'Perangkat Desa', 'WUS', 'None'),
('001', '00103', 'Randi Sudani', 'Anak', 'Laki-laki', 'Jakarta', '2023-03-17', 'Tidak Tamat SD', 'Tidak Bekerja', 'Balita', ''),
('002', '00201', 'Aher Manukwari', 'Kepala Keluarga', 'Laki-laki', 'Jayapura', '2023-03-18', 'S1 dan Sederajat', 'Petani', 'PUS', 'None'),
('002', '00202', 'Ranti Maria', 'Istri', 'Perempuan', 'Jakarta', '2022-12-31', 'S1 dan Sederajat', 'Lainnya', 'WUS', 'None'),
('002', '00203', 'Edwin', 'Anak', 'Laki-laki', 'Jakarta', '2023-01-01', 'Tidak Sekolah', 'Tidak Bekerja', 'Balita', 'None'),
('004', '00401', 'Endang Sunandar', 'Kepala Keluarga', 'Laki-laki', 'Sidoarjo', '2023-03-17', 'SMP dan Sederajat', 'TKI', 'PUS', 'None'),
('004', '00402', 'Asriyani', 'Istri', 'Perempuan', 'Bandung', '2022-02-02', 'S1 dan Sederajat', 'Guru', 'WUS', 'None'),
('005', '00501', 'Dedi Cahyono', 'Kepala Keluarga', 'Laki-laki', 'Bandung', '2023-03-03', 'SD dan Sederajat', 'Buruh Tani', 'PUS', 'None'),
('006', '1665', 'Ragnarok', 'Kepala Keluarga', 'Laki-laki', 'Banten', '2023-03-19', 'SMA dan Sederajat', 'Polisi', 'PUS', 'None'),
('1789', '1789001', 'Atangg', 'Kepala Keluarga', 'Laki-laki', 'Bandung', '2023-04-03', 'Tidak Tamat SD', 'Petani', 'Lansia', 'Tidak Ada'),
('006', '2411', 'Megawati', 'Istri', 'Perempuan', 'Banten', '2023-03-20', 'SD dan Sederajat', 'Buruh Bangunan', 'WUS', 'Bengo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kondisirumah`
--

CREATE TABLE `tbl_kondisirumah` (
  `id_konrmh` int(11) NOT NULL,
  `no_kk` char(16) NOT NULL,
  `mkn_pokok` varchar(15) NOT NULL,
  `jamban` varchar(10) NOT NULL,
  `sbr_air` varchar(15) NOT NULL,
  `tps` varchar(10) NOT NULL,
  `spal` varchar(10) NOT NULL,
  `stiker_p4k` varchar(10) NOT NULL,
  `krt_rmh` varchar(15) NOT NULL,
  `akf_up2k` varchar(25) NOT NULL,
  `akf_kukpl` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kondisirumah`
--

INSERT INTO `tbl_kondisirumah` (`id_konrmh`, `no_kk`, `mkn_pokok`, `jamban`, `sbr_air`, `tps`, `spal`, `stiker_p4k`, `krt_rmh`, `akf_up2k`, `akf_kukpl`) VALUES
(1, '00001', 'Non Beras', 'Tidak', 'Sumur', 'Tidak', 'Tidak', 'Tidak', 'Sehat', 'Tidak', 'Tidak'),
(2, '00201', 'option1', 'option1', 'option1', 'option1', 'option1', 'option2', 'option1', 'option1', 'option1'),
(4, '1665', 'Beras', 'Ya', 'Sumur', 'Ya', 'Tidak', 'Tidak', 'Kurang Sehat', 'Tidak', 'Ya'),
(5, '00401', 'Non Beras', 'Ya', 'PDAM', 'Ya', 'Ya', 'Ya', 'Sehat', 'Ya', 'Ya'),
(6, '000', 'Beras', 'Ya', 'PDAM', 'Ya', 'Ya', 'Ya', 'Sehat', 'Tidak', 'Tidak'),
(7, '001', 'Non Beras', 'Tidak', 'Sumur', 'Tidak', 'Tidak', 'Tidak', 'Kurang Sehat', 'Tidak', 'Tidak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dasawisma`
--
ALTER TABLE `tbl_dasawisma`
  ADD PRIMARY KEY (`id_dw`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_keluarga`
--
ALTER TABLE `tbl_keluarga`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tbl_kondisirumah`
--
ALTER TABLE `tbl_kondisirumah`
  ADD PRIMARY KEY (`id_konrmh`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dasawisma`
--
ALTER TABLE `tbl_dasawisma`
  MODIFY `id_dw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kondisirumah`
--
ALTER TABLE `tbl_kondisirumah`
  MODIFY `id_konrmh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
