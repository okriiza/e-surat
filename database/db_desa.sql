-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2019 pada 15.58
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_desa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `password`, `username`) VALUES
(1, 'Rendi Okriza Putra', 'okriiza', 'okriiza');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jsurat`
--

CREATE TABLE `t_jsurat` (
  `id_jsurat` int(11) NOT NULL,
  `jenis_surat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_jsurat`
--

INSERT INTO `t_jsurat` (`id_jsurat`, `jenis_surat`) VALUES
(1, 'SURAT KETERANGAN CATATAN KEPOLISIAN'),
(2, 'SURAT KETERANGAN TIDAK MAMPU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_ket_kk`
--

CREATE TABLE `t_ket_kk` (
  `id_ket_kk` int(20) NOT NULL,
  `id_nik` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `no_kk` bigint(20) NOT NULL,
  `no_ktp` bigint(20) NOT NULL,
  `kepala_keluarga` varchar(100) NOT NULL,
  `nama_warga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_ket_kk`
--

INSERT INTO `t_ket_kk` (`id_ket_kk`, `id_nik`, `id_warga`, `no_kk`, `no_ktp`, `kepala_keluarga`, `nama_warga`) VALUES
(12, 5, 3, 987654321, 1234567890, 'Gabriel Lesmana', 'Rendi Okriza Putra'),
(13, 5, 6, 987654321, 4567890123, 'Gabriel Lesmana', 'Rena Sliya'),
(15, 6, 4, 8765432109, 2345678901, 'joshua Sukandi', 'Rendi'),
(16, 6, 8, 8765432109, 7890123456, 'joshua Sukandi', 'Samsul Samsudin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kk`
--

CREATE TABLE `t_kk` (
  `id_kk` int(11) NOT NULL,
  `no_kk` bigint(100) NOT NULL,
  `kepala_keluarga` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` bigint(3) NOT NULL,
  `rw` bigint(3) NOT NULL,
  `kelurahan_desa` varchar(64) NOT NULL,
  `kecamatan` varchar(64) NOT NULL,
  `kabupaten_kota` varchar(50) NOT NULL,
  `kode_pos` int(6) NOT NULL,
  `provinsi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kk`
--

INSERT INTO `t_kk` (`id_kk`, `no_kk`, `kepala_keluarga`, `alamat`, `rt`, `rw`, `kelurahan_desa`, `kecamatan`, `kabupaten_kota`, `kode_pos`, `provinsi`) VALUES
(22, 987654321, 'Gabriel Lesmana', 'Jl Galaxy no 70 ', 2, 3, 'cijambe', 'cijambe', 'bandung', 40254, 'jawa barat'),
(23, 8765432109, 'joshua Sukandi', 'jln mampang selatan', 2, 3, 'mampang', 'mampang', 'jakarta', 40292, 'DKI Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_surat`
--

CREATE TABLE `t_surat` (
  `id_surat` int(11) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `isi_surat` text NOT NULL,
  `jenis_surat` int(11) NOT NULL,
  `nama_surat` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `tanda_tangan` int(11) NOT NULL,
  `id_warga` int(11) NOT NULL,
  `nama_warga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user_desa`
--

CREATE TABLE `t_user_desa` (
  `id_kk` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `no_kk` bigint(100) NOT NULL,
  `kepala_keluarga` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user_keluarga`
--

CREATE TABLE `t_user_keluarga` (
  `id_nik` int(11) NOT NULL,
  `no_kk` bigint(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user_keluarga`
--

INSERT INTO `t_user_keluarga` (`id_nik`, `no_kk`, `password`, `nama_lengkap`) VALUES
(3, 12345, 'admin', 'admin'),
(5, 987654321, 'gabriel123', 'Gabriel Lesmana'),
(6, 8765432109, 'joshua123', 'joshua Sukandi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user_rt`
--

CREATE TABLE `t_user_rt` (
  `id_rt` int(12) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `ketua_rt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user_rw`
--

CREATE TABLE `t_user_rw` (
  `id_rw` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `ketua_rw` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_warga`
--

CREATE TABLE `t_warga` (
  `id_warga` int(20) NOT NULL,
  `no_ktp` bigint(100) NOT NULL,
  `nama_warga` varchar(64) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `warga_negara` varchar(20) NOT NULL,
  `pendidikan` varchar(10) DEFAULT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `status_nikah` varchar(20) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `j_kelamin` enum('L','P') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_warga`
--

INSERT INTO `t_warga` (`id_warga`, `no_ktp`, `nama_warga`, `agama`, `tempat_lahir`, `tgl_lahir`, `gol_darah`, `warga_negara`, `pendidikan`, `pekerjaan`, `status_nikah`, `status`, `j_kelamin`) VALUES
(3, 1234567890, 'Rendi Okriza Putra', 'Islam', 'Bandung', '1997-10-25', 'AB', 'Indonesia', 'Mahasiswa', 'Mahasiswa', 'Belum Menikah', '1', 'P'),
(4, 2345678901, 'Rendi', 'Islam', 'Bandung', '2019-12-07', 'B', 'Indonesia', 'Mahasiswa', 'Mahasiswa', 'Belum Menikah', '1', 'P'),
(5, 3456789012, 'reni salya', 'Islam', 'Bandung', '2019-04-18', 'A', 'Indonesia', 'Mahasiswa', 'Mahasiswa', 'Menikah', '1', 'L'),
(6, 4567890123, 'rena sliya', 'Kristen', 'jakarta', '2006-02-15', 'AB', 'Indonesia', 'Mahasiswa', 'Mahasiswa', 'Belum Menikah', '1', 'L'),
(7, 5678901234, 'asep solehudin', 'Kristen', 'jakarta', '2019-12-20', 'B', 'Indonesia', 'Mahasiswa', 'Mahasiswa', 'Belum Menikah', '1', 'P'),
(8, 7890123456, 'samsul samsudin', 'Islam', 'Bandung', '2019-12-05', 'B', 'Indonesia', 'Mahasiswa', 'Mahasiswa', 'Belum Menikah', '1', 'P'),
(9, 8901234567, 'beben sudarjat', 'Islam', 'jakarta', '2019-01-01', 'AB', 'Indonesia', 'Mahasiswa', 'Mahasiswa', 'Menikah', '1', 'P');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `t_jsurat`
--
ALTER TABLE `t_jsurat`
  ADD PRIMARY KEY (`id_jsurat`);

--
-- Indeks untuk tabel `t_ket_kk`
--
ALTER TABLE `t_ket_kk`
  ADD PRIMARY KEY (`id_ket_kk`);

--
-- Indeks untuk tabel `t_kk`
--
ALTER TABLE `t_kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indeks untuk tabel `t_surat`
--
ALTER TABLE `t_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `t_user_desa`
--
ALTER TABLE `t_user_desa`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `t_user_keluarga`
--
ALTER TABLE `t_user_keluarga`
  ADD PRIMARY KEY (`id_nik`);

--
-- Indeks untuk tabel `t_user_rt`
--
ALTER TABLE `t_user_rt`
  ADD PRIMARY KEY (`id_rt`);

--
-- Indeks untuk tabel `t_user_rw`
--
ALTER TABLE `t_user_rw`
  ADD PRIMARY KEY (`id_rw`);

--
-- Indeks untuk tabel `t_warga`
--
ALTER TABLE `t_warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_jsurat`
--
ALTER TABLE `t_jsurat`
  MODIFY `id_jsurat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_ket_kk`
--
ALTER TABLE `t_ket_kk`
  MODIFY `id_ket_kk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `t_kk`
--
ALTER TABLE `t_kk`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `t_surat`
--
ALTER TABLE `t_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_user_desa`
--
ALTER TABLE `t_user_desa`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_user_keluarga`
--
ALTER TABLE `t_user_keluarga`
  MODIFY `id_nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_user_rt`
--
ALTER TABLE `t_user_rt`
  MODIFY `id_rt` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_user_rw`
--
ALTER TABLE `t_user_rw`
  MODIFY `id_rw` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_warga`
--
ALTER TABLE `t_warga`
  MODIFY `id_warga` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
