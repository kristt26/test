-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 01:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utvmn4ak_sentracomputer`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `detail_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` enum('H','A','I','S') NOT NULL DEFAULT 'H'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `detail_id`, `tanggal`, `keterangan`) VALUES
(1, 1, '2022-01-28', 'A'),
(3, 2, '2022-01-28', 'S'),
(4, 4, '2022-01-28', 'H'),
(5, 5, '2022-01-30', 'I'),
(6, 7, '2022-01-30', 'A'),
(7, 8, '2022-01-30', 'I'),
(8, 9, '2022-01-30', 'I'),
(9, 6, '2022-01-30', 'I'),
(10, 14, '2022-02-01', 'A'),
(11, 14, '2022-02-01', 'I'),
(12, 16, '2022-02-03', 'H'),
(13, 19, '2022-02-03', 'H');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailkelas`
--

CREATE TABLE `tb_detailkelas` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `status` enum('Registrasi','Aktif','Lulus') NOT NULL DEFAULT 'Registrasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_detailkelas`
--

INSERT INTO `tb_detailkelas` (`id`, `id_kelas`, `id_siswa`, `status`) VALUES
(1, 1, 1, 'Aktif'),
(2, 1, 2, 'Aktif'),
(4, 2, 3, 'Aktif'),
(5, 2, 4, 'Registrasi'),
(6, 2, 5, 'Registrasi'),
(7, 2, 6, 'Registrasi'),
(8, 2, 6, 'Registrasi'),
(9, 2, 7, 'Registrasi'),
(12, 1, 4, 'Registrasi'),
(14, 4, 1, 'Aktif'),
(15, 1, 1, 'Registrasi'),
(16, 3, 1, 'Aktif'),
(17, 2, 1, 'Registrasi'),
(18, 1, 4, 'Registrasi'),
(19, 3, 10, 'Aktif'),
(20, 1, 11, 'Registrasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_instruktur`
--

CREATE TABLE `tb_instruktur` (
  `id_instruktur` int(11) NOT NULL,
  `nm_instruktur` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) NOT NULL,
  `nohp` varchar(45) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_instruktur`
--

INSERT INTO `tb_instruktur` (`id_instruktur`, `nm_instruktur`, `alamat`, `nohp`, `id_user`) VALUES
(1, 'Deni Malik', 'Tanah Hitam', '082238281801', 2),
(2, 'chandra ', 'bucen', '049038497932', 7),
(3, 'putri', 'prumnas', '07493643786473', 8),
(4, 'Ahmad FarhanMaulana', 'Hamadi Tanjung', '081340087370`', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int(11) NOT NULL,
  `waktu` varchar(45) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `id_instruktur` int(11) NOT NULL,
  `id_program` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `waktu`, `jam_mulai`, `jam_selesai`, `id_instruktur`, `id_program`) VALUES
(1, 'Pagi', '08:00:00', '10:00:00', 1, 1),
(2, 'Pagi', '06:00:00', '10:00:00', 1, 3),
(3, 'Malam', '01:30:00', '01:59:00', 3, 2),
(4, 'Malam', '21:00:00', '22:00:00', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_program`
--

CREATE TABLE `tb_program` (
  `id_program` int(11) NOT NULL,
  `program_kursus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_program`
--

INSERT INTO `tb_program` (`id_program`, `program_kursus`) VALUES
(1, 'Microsoft Office'),
(2, 'Desain Grafis'),
(3, 'Miscrosoft excel');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL DEFAULT '0',
  `nama_siswa` varchar(45) DEFAULT NULL,
  `jenis_kelamin` varchar(45) DEFAULT NULL,
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `dusun` varchar(45) DEFAULT NULL,
  `wilaya` varchar(45) DEFAULT NULL,
  `kabupaten_kota` varchar(45) DEFAULT NULL,
  `kecamatan` varchar(45) DEFAULT NULL,
  `kelurahan` varchar(45) DEFAULT NULL,
  `jenis_tinggal` varchar(45) DEFAULT NULL,
  `transportasi` varchar(45) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `nama_ayah` varchar(45) DEFAULT NULL,
  `pekerjaan_ayah` varchar(45) DEFAULT NULL,
  `nama_ibu` varchar(45) DEFAULT NULL,
  `pekerjaan_ibu` varchar(45) DEFAULT NULL,
  `upload_foto3x4` varchar(45) DEFAULT NULL,
  `upload_ijazah` varchar(45) DEFAULT NULL,
  `upload_ktp` varchar(45) DEFAULT NULL,
  `tahun_masuk` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `id_user`, `nik`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `dusun`, `wilaya`, `kabupaten_kota`, `kecamatan`, `kelurahan`, `jenis_tinggal`, `transportasi`, `nohp`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `upload_foto3x4`, `upload_ijazah`, `upload_ktp`, `tahun_masuk`) VALUES
(1, 3, '9171022603880006', 'Bagus Joko Susilo', 'L', 'Jayapura', '1988-03-25', 'Islam', 'Entrop', '-', '-', 'Jayapura', 'Jayapura Selatan', 'Entrop', 'Kost', 'Motor', '082238281801', 'Farhan', 'PNS', 'Ainun', 'Ibu Rumah Tangga', '61f415e2597a1.jpeg', '61f415e2599f7.jpeg', '61f415e259b3b.jpeg', '2022'),
(2, 4, '91722132150006', 'Candra Putra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(3, 6, '24434343553', 'Saputra', 'L', 'Jayapura', '2022-01-28', 'Islam', 'organda', '-', 'papua', 'kota jayapura', 'jyapura utara', 'gurabesi', 'Jayapura', 'Mobil', '082838283847', 'udin', 'tukang kayu', 'lili', 'ibu rumah tangga', '61f47618c239e.jpeg', '61f47618c26c4.jpeg', '61f47618c28ca.jpeg', '2021'),
(4, 9, '9171372822839149', 'fadly', 'L', 'jayapura', '2022-01-28', 'Islam', 'Apo Bukit Barisan', '-', 'papua', 'kota jayapura', 'jayapura utara', 'gurabesi', 'apo', 'motor', '0827826426', 'opside', 'swasta', 'cahya', 'ibu rumah tangga', '61f487f5e44d9.jpeg', '61f487f5ebfb4.jpeg', '61f487f5ec20b.jpeg', '2021'),
(5, 10, '91714836846198', 'adinda', 'P', 'Jakarta', '2022-01-28', 'Islam', 'jaya asry', '-', 'papua', 'jayapura', 'jayapura utara', 'gurabsesi', 'jaya asry', 'taxi', '08347346356', 'galang', 'pns', 'nur', 'ibu rumah tangga', '61f489cace632.jpeg', '61f489cace998.jpeg', '61f489caced67.jpeg', '2022'),
(6, 11, '91717847381471', 'azza', 'P', 'jayapura', '2022-01-28', 'Islam', 'dok 9 kali', '-', 'papua', 'kota jayapura', 'jayapura utara', 'gurabesi', 'rumah ortu', 'motor', '0841867364', 'baginda', 'swasta', 'umy', 'ibu rumah tangga', '61f48ad298633.jpeg', '61f48ad298954.jpeg', '61f48ad298bbc.jpeg', '2022'),
(7, 12, '91712894664721', 'anggriani', 'P', 'jayapura', '2022-01-28', 'Kristen', 'batu putih', '-', 'papua', 'kota jayapura', 'jayapura utara', 'gurabesi', 'rumah sendiri', 'motor', '0841846468196', 'hendrik', 'swasta', 'melina', 'ibu rumah tangga', '61f48bec75546.jpeg', '61f48bec758ea.jpeg', '61f48bec75b0d.jpeg', '2022'),
(8, 14, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(9, 15, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(10, 16, '9171709174817481', 'aril', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(11, 17, '25282828', 'Candra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `akses` enum('Admin','Instruktur','Siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `email`, `akses`) VALUES
(1, 'Administrasi', '21232f297a57a5a743894a0e4a801fc3', 'admin@mail.com', 'Admin'),
(2, 'deni', '17b38fc02fd7e92f3edeb6318e3066d8', 'deni@mail.com', 'Instruktur'),
(3, 'bagus', '17b38fc02fd7e92f3edeb6318e3066d8', 'bagus@mail.com', 'Siswa'),
(4, 'candra', '2614ae3c375c3095dc536283672548bd', 'candra@mail.com', 'Siswa'),
(6, 'saputra', '0a659aac1778efd4c118b3ca051d8a42', 'saputra@gmail.com', 'Siswa'),
(7, 'chandra', 'ad845a24a47deecbfa8396e90db75c6a', 'chandra@gmaiil.com', 'Instruktur'),
(8, 'putri', '4093fed663717c843bea100d17fb67c8', 'putri@gmail.com', 'Instruktur'),
(9, 'fadly', '2d61bf88e0aa417e5949c026af16bc5b', 'fadly@gmail.com', 'Siswa'),
(10, 'adinda', '80ae4feb95c0768096fcdeee2e395936', 'adinda@gmail.com', 'Siswa'),
(11, 'azza', '0439887ff5dafda6a33aa631d0e424ec', 'azza@gmail.com', 'Siswa'),
(12, 'anggriani', '9cbd51ed965c72694a6a449a04418488', 'anggriani@gmail.com', 'Siswa'),
(13, 'Han', 'd2ee71f1c4387b903a4e860165825d54', 'Han@gmail.com', 'Instruktur'),
(14, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Siswa'),
(15, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Siswa'),
(16, 'aril', '513e63de470114891012072f5ffd3d8b', 'aril@gmail.com', 'Siswa'),
(17, 'candra', '2614ae3c375c3095dc536283672548bd', 'candra@gmail.com', 'Siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_absen_tb_detailkelas1_idx` (`detail_id`);

--
-- Indexes for table `tb_detailkelas`
--
ALTER TABLE `tb_detailkelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_table1_tb_kelas1_idx` (`id_kelas`),
  ADD KEY `fk_tb_detailkelas_tb_siswa1_idx` (`id_siswa`);

--
-- Indexes for table `tb_instruktur`
--
ALTER TABLE `tb_instruktur`
  ADD PRIMARY KEY (`id_instruktur`),
  ADD KEY `fk_instruktur_tb_user1_idx` (`id_user`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_kelas_instruktur1_idx` (`id_instruktur`),
  ADD KEY `fk_tb_kelas_tb_program1_idx` (`id_program`);

--
-- Indexes for table `tb_program`
--
ALTER TABLE `tb_program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `fk_tb_siswa_tb_user1_idx` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_detailkelas`
--
ALTER TABLE `tb_detailkelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_instruktur`
--
ALTER TABLE `tb_instruktur`
  MODIFY `id_instruktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_program`
--
ALTER TABLE `tb_program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `fk_absen_tb_detailkelas1` FOREIGN KEY (`detail_id`) REFERENCES `tb_detailkelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_detailkelas`
--
ALTER TABLE `tb_detailkelas`
  ADD CONSTRAINT `fk_table1_tb_kelas1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_detailkelas_tb_siswa1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_instruktur`
--
ALTER TABLE `tb_instruktur`
  ADD CONSTRAINT `fk_instruktur_tb_user1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD CONSTRAINT `fk_tb_kelas_instruktur1` FOREIGN KEY (`id_instruktur`) REFERENCES `tb_instruktur` (`id_instruktur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_kelas_tb_program1` FOREIGN KEY (`id_program`) REFERENCES `tb_program` (`id_program`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `fk_tb_siswa_tb_user1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
