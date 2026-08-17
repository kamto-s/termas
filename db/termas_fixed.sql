-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2026 pada 20.55
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30
-- Diperbaiki: DEFAULT current_timestamp() pada kolom bertipe DATE diganti menjadi DEFAULT NULL
-- (MySQL menolak CURRENT_TIMESTAMP sebagai default untuk kolom DATE, hanya untuk TIMESTAMP/DATETIME)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `termas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `termas`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `termas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ADMIN TAMPAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul_pengumuman` varchar(200) NOT NULL,
  `keterangan_pengumuman` text NOT NULL,
  `foto_pengumuman` varchar(255) DEFAULT NULL,
  `tanggal_pengumuman` date NOT NULL,
  `waktu_pengumuman` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul_pengumuman`, `keterangan_pengumuman`, `foto_pengumuman`, `tanggal_pengumuman`, `waktu_pengumuman`) VALUES
(2, 'Upacara', '<p>Dalam rangka memperingati Hari Ulang Tahun ke-80 Kemerdekaan Republik Indonesia, Pemerintah Desa Termas akan menyelenggarakan upacara bendera pada tanggal 17 Agustus 2025. Seluruh masyarakat diharapkan dapat berpartisipasi dan mengikuti kegiatan dengan tertib sebagai bentuk penghormatan terhadap jasa para pahlawan.</p>\r\n', 'images_(2).jpg', '2026-08-17', '08:30:00'),
(3, 'sas', '<p>ass</p>\r\n', 'Screenshot_2024-05-25_2215451.png', '2026-07-04', '05:54:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skd`
--

CREATE TABLE `skd` (
  `id_skd` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `nomor_surat` varchar(50) DEFAULT NULL,
  `keperluan` text NOT NULL,
  `domisili` text NOT NULL,
  `status` enum('Menunggu','Disetujui','Ditolak') DEFAULT 'Menunggu',
  `alasan_penolakan` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `skd`
--

INSERT INTO `skd` (`id_skd`, `id_warga`, `nomor_surat`, `keperluan`, `domisili`, `status`, `alasan_penolakan`, `tanggal`) VALUES
(6, 2, '474.4/001/TM/VII/2026', 'aaaaa', '', 'Disetujui', NULL, '2026-07-20'),
(9, 2, '474.4/001/TM/IX/2026', 'sssssssss', 'sasssssssss', 'Disetujui', NULL, '2026-09-22'),
(10, 2, '474.4/001/TM/VIII/2026', 's', 'a', 'Menunggu', NULL, '2026-08-22'),
(12, 2, '474.4/002/TM/VII/2026', '1', '1', 'Menunggu', NULL, '2026-07-22'),
(13, 2, '474.4/003/TM/VII/2026', 'aa', 'aa', 'Disetujui', NULL, '2026-07-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sktm`
--

CREATE TABLE `sktm` (
  `id_sktm` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `nomor_surat` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keperluan` text NOT NULL,
  `status` enum('Menunggu','Disetujui','Ditolak') DEFAULT 'Menunggu',
  `alasan_penolakan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sktm`
--

INSERT INTO `sktm` (`id_sktm`, `id_warga`, `nomor_surat`, `tanggal`, `keperluan`, `status`, `alasan_penolakan`) VALUES
(2, 2, '474.4/001/TM/VII/2026', '2026-07-19', 'pengaktifan kartu bpjs', 'Disetujui', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sku`
--

CREATE TABLE `sku` (
  `id_sku` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `nomor_surat` varchar(50) DEFAULT NULL,
  `jenis_usaha` varchar(100) NOT NULL,
  `keperluan` text NOT NULL,
  `status` enum('Menunggu','Disetujui','Ditolak') NOT NULL DEFAULT 'Menunggu',
  `alasan_penolakan` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sku`
--

INSERT INTO `sku` (`id_sku`, `id_warga`, `nomor_surat`, `jenis_usaha`, `keperluan`, `status`, `alasan_penolakan`, `tanggal`) VALUES
(11, 2, '140/001/TM/VII/2026', 'kakakakaka', 'kkakaka', 'Disetujui', NULL, '2026-07-11'),
(12, 2, '140/002/TM/VII/2026', 'Jual beli kambing', 'pengajuan pinjaman BRI', 'Menunggu', NULL, '2026-07-31'),
(13, 2, '140/003/TM/VII/2026', 'Jual beli kambing', 'dsasdsfd', 'Menunggu', NULL, '2026-07-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `caption_slider` text NOT NULL,
  `foto_slider` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id_slider`, `caption_slider`, `foto_slider`) VALUES
(18, '<p>Balai&nbsp; Desa Termas</p>\r\n', 'balaidesa.jpeg'),
(19, '<p>Sawah</p>\r\n', 'images_(1)1.jpg'),
(20, '<p>Aula</p>\r\n', 'aula.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spik`
--

CREATE TABLE `spik` (
  `id_spik` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `nomor_surat` varchar(50) DEFAULT NULL,
  `maksud_keramaian` text NOT NULL,
  `tanggal_penyelenggaraan` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `jenis_hiburan` varchar(100) NOT NULL,
  `jumlah_undangan` int(11) NOT NULL,
  `tempat_penyelenggaraan` text NOT NULL,
  `status` enum('Menunggu','Disetujui','Ditolak') DEFAULT 'Menunggu',
  `alasan_penolakan` text DEFAULT NULL,
  `tanggal_pengajuan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `spik`
--

INSERT INTO `spik` (`id_spik`, `id_warga`, `nomor_surat`, `maksud_keramaian`, `tanggal_penyelenggaraan`, `waktu_mulai`, `waktu_selesai`, `jenis_hiburan`, `jumlah_undangan`, `tempat_penyelenggaraan`, `status`, `alasan_penolakan`, `tanggal_pengajuan`) VALUES
(8, 2, '140/001/TM/VII/2026', 'KHITAN', '2026-07-17', '09:00:00', '17:00:00', 'DANGDUT', 250, 'HALAMAN RUMAH PENYELENGGARA\r\n', 'Disetujui', NULL, '2026-07-07'),
(9, 2, '140/002/TM/VII/2026', 'KHITANAN', '2026-07-31', '09:00:00', '17:00:00', 'DANGDUT', 200, 'HALAMAN PENYELENGGARA', 'Menunggu', NULL, '2026-07-11'),
(10, 2, '140/003/TM/VII/2026', 'ssssss', '2026-07-30', '08:22:00', '20:22:00', 'DANGDUT', 200, 'HALAMAN PENYELENGGARA', 'Menunggu', NULL, '2026-07-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staf`
--

CREATE TABLE `staf` (
  `id_staf` int(11) NOT NULL,
  `nama_staf` varchar(100) NOT NULL,
  `foto_staf` varchar(255) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `staf`
--

INSERT INTO `staf` (`id_staf`, `nama_staf`, `foto_staf`, `jabatan`) VALUES
(1, 'H. NITI, S.km., M.m', '714aacba-9df0-4174-8c8a-c92a2474a664.jpg', 'KEPALA DESA'),
(3, 'SLAMET TARTOMO', 'e658cb9c-68d2-4158-b73a-8047cc96fcc5.jpg', 'SEKRETARIS DESA'),
(4, 'CHOIRUL MUSTOFA', '49e774a9-a409-48bf-82b1-8e072ba1c007.jpg', 'KASI PELAYANAN'),
(5, 'BAMBANG HARYONO', 'f67a84ba-2889-4ab6-b8f1-c1f267a0ea99.jpg', 'KAUR TATA USAHA DAN UMUM'),
(6, 'EKO NUR PRISTYAWATI', 'Syot_layar_2026-08-01_065314.png', 'KAUR KEUANGAN'),
(7, 'MUHAMMAD SAEROZI', '7e63be43-0086-45f0-9555-9fec19569804.jpg', 'KEPALA DUSUN MRAYUN'),
(8, 'WALUYO', '3274d6b4-9236-48e4-9760-fcd52c6bd521.jpg', 'KEPALA DUSUN TERMAS'),
(9, 'MUJIYA', '7250fa8d-7e19-4ae0-967c-6f324bbbcb9d.jpg', 'KEPALA DUSUN GETAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keterangan`
--

CREATE TABLE `surat_keterangan` (
  `id_surat_keterangan` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `nomor_surat` varchar(50) DEFAULT NULL,
  `keperluan` text NOT NULL,
  `keterangan_lain` text DEFAULT NULL,
  `status` enum('Menunggu','Disetujui','Ditolak') NOT NULL DEFAULT 'Menunggu',
  `alasan_penolakan` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surat_keterangan`
--

INSERT INTO `surat_keterangan` (`id_surat_keterangan`, `id_warga`, `nomor_surat`, `keperluan`, `keterangan_lain`, `status`, `alasan_penolakan`, `tanggal`) VALUES
(1, 2, '474.4/001/TM/VII/2026', 'asjdjhdfha', 'asdsa', 'Disetujui', NULL, '2026-07-14'),
(2, 5, '474.4/002/TM/VII/2026', 'asaddsa', '', 'Menunggu', NULL, '2026-07-16'),
(3, 2, '474.4/003/TM/VII/2026', 'aaa', '', 'Menunggu', NULL, '2026-08-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_pengantar`
--

CREATE TABLE `surat_pengantar` (
  `id_surat_pengantar` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `nomor_surat` varchar(50) DEFAULT NULL,
  `keperluan` text NOT NULL,
  `keterangan_lain` text DEFAULT NULL,
  `status` enum('Menunggu','Disetujui','Ditolak') NOT NULL DEFAULT 'Menunggu',
  `alasan_penolakan` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `surat_pengantar`
--

INSERT INTO `surat_pengantar` (`id_surat_pengantar`, `id_warga`, `nomor_surat`, `keperluan`, `keterangan_lain`, `status`, `alasan_penolakan`, `tanggal`) VALUES
(1, 5, '474.4/001/TM/VII/2026', 'pengantar pembuatan skck', '', 'Disetujui', NULL, '2026-07-15'),
(2, 2, '474.4/002/TM/VII/2026', 'pengantar pembuatan skck', '', 'Disetujui', NULL, '2026-07-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga`
--

CREATE TABLE `warga` (
  `id_warga` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('LAKI-LAKI','PEREMPUAN') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `status_perkawinan` varchar(50) DEFAULT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `dusun` varchar(20) NOT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`id_warga`, `nik`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pendidikan`, `pekerjaan`, `status_perkawinan`, `kewarganegaraan`, `nama_ayah`, `nama_ibu`, `rt`, `rw`, `dusun`, `kecamatan`, `password`) VALUES
(2, '3315021801040002', 'ASEP', 'LAKI-LAKI', 'GROBOGAN', '2002-01-02', 'ISLAM', 'TIDAK/BELUM SEKOLAH', 'PETANI', 'BELUM KAWIN', 'INDONESIA', 'SLAMET TARTOMO', 'PAR', '1', '1', 'TERMAS', 'KARANGRAYUNG', '356a192b7913b04c54574d18c28d46e6395428ab'),
(4, '3315010101900001', 'AHMAD SURYANTO', 'LAKI-LAKI', 'GROBOGAN', '1990-01-01', 'ISLAM', 'TAMAT SD/SEDERAJAT', 'PETANI', 'KAWIN', 'INDONESIA', 'SUTRISNO', 'SULASTRI', '1', '1', 'MRAYUN', 'KARANGRAYUNG', '356a192b7913b04c54574d18c28d46e6395428ab'),
(5, '3315010202950002', 'SITI NURJANAH', 'PEREMPUAN', 'GROBOGAN', '1995-02-02', 'ISLAM', 'MAGISTER', 'GURU', 'BELUM KAWIN', 'INDONESIA', 'ABDUL ROHMAN', 'FATIMAH', '2', '1', 'TERMAS', 'KARANGRAYUNG', '356a192b7913b04c54574d18c28d46e6395428ab'),
(6, '3315010303880003', 'BUDI SANTOSO', 'LAKI-LAKI', 'GROBOGAN', '1988-03-03', 'KRISTEN', 'DIPLOMA IV/SARJANA', 'WIRASWASTA', 'KAWIN', 'INDONESIA', 'SLAMET', 'YULIANI', '2', '2', 'GETAS', 'KARANGRAYUNG', '356a192b7913b04c54574d18c28d46e6395428ab'),
(7, '3315010404990004', 'DEWI LESTARI', 'PEREMPUAN', 'GROBOGAN', '1999-04-04', 'ISLAM', 'DIPLOMA IV/SARJANA', 'PERAWAT', 'BELUM KAWIN', 'INDONESIA', 'SUHARTO', 'SRI WAHYUNI', '1', '2', 'MRAYUN', 'KARANGRAYUNG', '356a192b7913b04c54574d18c28d46e6395428ab'),
(8, '3315010505850005', 'RUDI HARTONO', 'LAKI-LAKI', 'GROBOGAN', '1985-05-05', 'HINDU', 'DIPLOMA IV/SARJANA', 'PETERNAK', 'KAWIN', 'INDONESIA', 'HARTONO', 'SUMINAH', '2', '3', 'TERMAS', 'KARANGRAYUNG', '356a192b7913b04c54574d18c28d46e6395428ab'),
(9, '3315011103910011', 'EDI SUSANTO', 'LAKI-LAKI', 'GROBOGAN', '1991-03-11', 'ISLAM', 'SLTA/SEDERAJAT', 'PETANI', 'KAWIN', 'INDONESIA', 'SUGIYONO', 'SRI WAHYUNI', '1', '2', 'MRAYUN', 'KARANGRAYUNG', '356a192b7913b04c54574d18c28d46e6395428ab'),
(10, '3315011206940012', 'LINA APRILIYANI', 'PEREMPUAN', 'GROBOGAN', '1994-06-12', 'ISLAM', 'DIPLOMA III', 'PERAWAT', 'BELUM KAWIN', 'INDONESIA', 'SUYATNO', 'SRI RAHAYU', '2', '3', 'TERMAS', 'KARANGRAYUNG', '356a192b7913b04c54574d18c28d46e6395428ab'),
(11, '3315011308870013', 'RUDI HARTANTO', 'LAKI-LAKI', 'GROBOGAN', '1987-08-13', 'ISLAM', 'SLTP/SEDERAJAT', 'WIRASWASTA', 'KAWIN', 'INDONESIA', 'MARJONO', 'SULASTRI', '1', '4', 'GETAS', 'KARANGRAYUNG', '356a192b7913b04c54574d18c28d46e6395428ab'),
(12, '3315011402990014', 'DEWI LESTARI', 'PEREMPUAN', 'GROBOGAN', '1999-02-14', 'ISLAM', 'DIPLOMA IV/SARJANA', 'GURU', 'BELUM KAWIN', 'INDONESIA', 'SUKIRMAN', 'SITI AMINAH', '2', '5', 'MRAYUN', 'KARANGRAYUNG', '356a192b7913b04c54574d18c28d46e6395428ab'),
(13, '3315011505850015', 'BAMBANG SETIAWAN', 'LAKI-LAKI', 'GROBOGAN', '1985-05-15', 'ISLAM', 'TAMAT SD/SEDERAJAT', 'BURUH HARIAN LEPAS', 'KAWIN', 'INDONESIA', 'KASMIN', 'WAGINEM', '1', '1', 'TERMAS', 'KARANGRAYUNG', '356a192b7913b04c54574d18c28d46e6395428ab');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `skd`
--
ALTER TABLE `skd`
  ADD PRIMARY KEY (`id_skd`),
  ADD KEY `fk_skd_warga` (`id_warga`);

--
-- Indeks untuk tabel `sktm`
--
ALTER TABLE `sktm`
  ADD PRIMARY KEY (`id_sktm`),
  ADD KEY `fk_sktm_warga` (`id_warga`);

--
-- Indeks untuk tabel `sku`
--
ALTER TABLE `sku`
  ADD PRIMARY KEY (`id_sku`),
  ADD KEY `fk_sku_warga` (`id_warga`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indeks untuk tabel `spik`
--
ALTER TABLE `spik`
  ADD PRIMARY KEY (`id_spik`),
  ADD KEY `fk_spik_warga` (`id_warga`);

--
-- Indeks untuk tabel `staf`
--
ALTER TABLE `staf`
  ADD PRIMARY KEY (`id_staf`);

--
-- Indeks untuk tabel `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  ADD PRIMARY KEY (`id_surat_keterangan`),
  ADD KEY `id_warga` (`id_warga`);

--
-- Indeks untuk tabel `surat_pengantar`
--
ALTER TABLE `surat_pengantar`
  ADD PRIMARY KEY (`id_surat_pengantar`),
  ADD KEY `id_warga` (`id_warga`);

--
-- Indeks untuk tabel `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id_warga`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `skd`
--
ALTER TABLE `skd`
  MODIFY `id_skd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `sktm`
--
ALTER TABLE `sktm`
  MODIFY `id_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sku`
--
ALTER TABLE `sku`
  MODIFY `id_sku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `spik`
--
ALTER TABLE `spik`
  MODIFY `id_spik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `staf`
--
ALTER TABLE `staf`
  MODIFY `id_staf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  MODIFY `id_surat_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `surat_pengantar`
--
ALTER TABLE `surat_pengantar`
  MODIFY `id_surat_pengantar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `warga`
--
ALTER TABLE `warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `skd`
--
ALTER TABLE `skd`
  ADD CONSTRAINT `fk_skd_warga` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sktm`
--
ALTER TABLE `sktm`
  ADD CONSTRAINT `fk_sktm_warga` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sku`
--
ALTER TABLE `sku`
  ADD CONSTRAINT `fk_sku_warga` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `spik`
--
ALTER TABLE `spik`
  ADD CONSTRAINT `fk_spik_warga` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  ADD CONSTRAINT `fk_surat_keterangan_warga` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat_pengantar`
--
ALTER TABLE `surat_pengantar`
  ADD CONSTRAINT `fk_surat_pengantar_warga` FOREIGN KEY (`id_warga`) REFERENCES `warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
