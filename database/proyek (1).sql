-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Agu 2022 pada 07.49
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id_bimbingan` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `tanggal_bimbingan` timestamp NOT NULL DEFAULT current_timestamp(),
  `materi` text NOT NULL,
  `upload_file` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bimbingan`
--

INSERT INTO `bimbingan` (`id_bimbingan`, `id_dosen`, `id_mahasiswa`, `npm`, `tanggal_bimbingan`, `materi`, `upload_file`) VALUES
(3, 5, 22, 2203019, '2022-07-27 07:16:31', 'MEmbahas tentang Class diagram', 0x72756e646f776e5f2831295f2831295f2831292e646f6378),
(4, 3, 26, 2203025, '2022-07-27 07:32:46', 'hehe', 0x72756e646f776e5f2831295f2831295f283129312e646f6378),
(7, 1, 26, 2203025, '2022-08-09 08:09:17', 's', 0x5541535f42496e645f4d495f32415f4b686165727564696e5f4b5f312e706466),
(8, 6, 19, 0, '2022-08-10 07:46:24', 'nnn', 0x61646d696e2d766f6c2d31382d6e6f2d332d30322d6d756b73696e2d616e616c697369732d72616e7461692d6e696c61695f2832292e706466),
(9, 5, 22, 0, '2022-08-11 06:48:00', 'uyy', 0x30315f50616e6475616e5f654c6561726e696e675f506f6c74656b706f735f416b746976697461735f4d61686173697377612e706466),
(10, 3, 21, 0, '2022-08-11 10:13:25', 'nj', 0x44415f436861707465725f30395f416b756e74616e73695f756e74756b5f4269736e69735f506572646167616e67616e2e706466),
(11, 5, 10, 0, '2022-08-11 14:01:56', 'hduhs', 0x44415f31305f4a75726e616c5f6b68757375732e706466),
(12, 5, 10, 0, '2022-08-11 14:03:09', 'f', 0x44415f31305f4a75726e616c5f6b6875737573312e706466),
(13, 3, 26, 0, '2022-08-11 14:09:35', 'jsjs', 0x44415f31305f4a75726e616c5f6b6875737573322e706466),
(14, 5, 22, 0, '2022-08-11 14:14:13', 'sifa', 0x44415f31305f4a75726e616c5f6b6875737573332e706466),
(15, 5, 10, 0, '2022-08-11 14:36:38', 'ssss', 0x44415f31305f4a75726e616c5f6b6875737573342e706466),
(16, 3, 22, 0, '2022-08-15 02:59:10', 'implementasi', 0x44504c5f5072696e742e706466);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_bimbingan`
--

CREATE TABLE `buku_bimbingan` (
  `id_buku_bimbingan` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `tanggal_kumpul` date NOT NULL,
  `upload_file` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku_bimbingan`
--

INSERT INTO `buku_bimbingan` (`id_buku_bimbingan`, `npm`, `id_mahasiswa`, `deadline`, `tanggal_kumpul`, `upload_file`) VALUES
(3, 2203019, 22, '2022-07-13', '2022-07-22', 0x72756e646f776e5f2831295f2831292e646f6378);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_akhir`
--

CREATE TABLE `dokumen_akhir` (
  `id_dokumen_akhir` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `tanggal_kumpul` timestamp NOT NULL DEFAULT current_timestamp(),
  `upload_file` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumen_akhir`
--

INSERT INTO `dokumen_akhir` (`id_dokumen_akhir`, `npm`, `id_mahasiswa`, `tanggal_kumpul`, `upload_file`) VALUES
(21, 2203019, 22, '2022-08-10 08:57:46', 0x5541535f42496e645f4d495f32415f4b686165727564696e5f4b5f2e706466),
(22, 2203025, 26, '2022-08-12 04:58:04', 0x44504c5f5072696e742e706466),
(23, 2203019, 22, '2022-08-12 06:49:36', 0x44504c5f5265766973692e706466);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nik_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nik_dosen`, `nama_dosen`) VALUES
(1, 11367162, 'Dr.Maniah,S.Kom.,M.T'),
(2, 10576095, 'Mubassiran,S.Si.,M.T'),
(3, 450900047, 'Dr.Muh.Ibnu Choldun R'),
(4, 450900035, 'Sari Armiati, S.T.,M.T'),
(5, 10984131, 'Shiyami Milwandhari,S.Kom.,M.T'),
(6, 10983133, 'Supono,S.T.,M.T'),
(7, 11686227, 'Virdiandry Putratama,S.T.,M.Kom');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dpl`
--

CREATE TABLE `dpl` (
  `id_dpl` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `tanggal_kumpul` date NOT NULL,
  `upload_file` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dpl`
--

INSERT INTO `dpl` (`id_dpl`, `npm`, `id_mahasiswa`, `deadline`, `tanggal_kumpul`, `upload_file`) VALUES
(2, 2203023, 25, '2022-07-16', '2022-07-14', 0x72756e646f776e5f2831292e646f6378),
(3, 2203019, 22, '2022-07-16', '2022-07-14', 0x72756e646f776e5f283129312e646f6378);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `tanggal_kumpul` date NOT NULL,
  `upload_file` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `npm`, `id_mahasiswa`, `deadline`, `tanggal_kumpul`, `upload_file`) VALUES
(1, 2203019, 0, '2022-06-30', '2022-06-08', ''),
(3, 0, 0, '2022-07-07', '2022-07-23', 0x63695f6f6e6c696e655f746573742e73716c),
(4, 2203023, 25, '2022-07-20', '2022-07-23', 0x72756e646f776e5f2831292e646f6378),
(5, 2203017, 20, '2022-07-21', '2022-07-16', 0x72756e646f776e5f2831295f2831295f2831295f2831292e646f6378);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_kelulusan`
--

CREATE TABLE `laporan_kelulusan` (
  `id_laporan_kelulusan` int(11) NOT NULL,
  `tanggal_sidang` date NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_penguji` int(11) NOT NULL,
  `hasil_keputusan_sidang` enum('Lulus Tanpa Revisi','Lulus Dengan Revisi','Tidak Lulus','') NOT NULL DEFAULT 'Lulus Dengan Revisi',
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `tingkat` enum('1','2','3','') NOT NULL DEFAULT '2',
  `Jenis_Kelamin` enum('P','L') NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `npm`, `nama_mahasiswa`, `tingkat`, `Jenis_Kelamin`) VALUES
(10, 2203002, 'Nur Fatimah Azzahrah', '2', 'P'),
(11, 2203003, 'Adi Tiya Wiranda', '2', 'L'),
(12, 2203004, 'Daffa Fauziah', '2', 'P'),
(13, 2203005, 'Okta Agnes LadyAgatha Manik', '2', 'P'),
(14, 2203006, 'Gracecya Selfia Purba', '2', 'P'),
(15, 2203007, 'Rafi Fadhilah Yunus', '2', 'L'),
(16, 2203008, 'Shofa Zahra Arthatia', '2', 'P'),
(17, 2203010, 'Yaheszkiel Mikha Emmanuel Kasih', '2', 'L'),
(18, 2203011, 'Hani Tria Septiani', '2', 'P'),
(19, 2203016, 'Hadi Widya Sentosa', '2', 'L'),
(20, 2203017, 'Muhammad Zaqi Hanif', '2', 'L'),
(21, 2203018, 'Bhaswara Dertiyuga Sentanu', '2', 'L'),
(22, 2203019, 'Siti Fatimah', '2', 'P'),
(23, 2203021, 'Achmad Rizky Ade Saputra', '2', 'L'),
(24, 2203022, 'Gita Nurlita Kartini', '2', 'P'),
(25, 2203023, 'Redha Aulia Putri', '2', 'P'),
(26, 2203025, 'Salma Najla Hanifa', '2', 'P'),
(27, 2203026, 'Uly Arta Sagala', '2', 'P');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembekalan`
--

CREATE TABLE `pembekalan` (
  `id` int(11) NOT NULL,
  `tanggal_pembekalan` timestamp NOT NULL DEFAULT current_timestamp(),
  `daftar_hadir` varchar(50) NOT NULL,
  `Materi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembekalan`
--

INSERT INTO `pembekalan` (`id`, `tanggal_pembekalan`, `daftar_hadir`, `Materi`) VALUES
(3, '2022-07-27 07:10:38', 'Siti Fatimah, Redha Aulia Putri, Nur Fatimah Zahra', 'Class Diagram');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penguji`
--

CREATE TABLE `penguji` (
  `id_penguji` int(11) NOT NULL,
  `nik_penguji` int(11) NOT NULL,
  `nama_penguji` varchar(50) NOT NULL,
  `jenis_kelamin` enum('P','L','','') NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penguji`
--

INSERT INTO `penguji` (`id_penguji`, `nik_penguji`, `nama_penguji`, `jenis_kelamin`) VALUES
(1, 117, 'Virdiandry Putratama,S.T.,M.Kom', 'L'),
(2, 116, 'Supono,S.T.,M.T', 'L'),
(3, 115, 'Shiyami Milwandhari,S.Kom.,M.T', 'P'),
(6, 113, 'Dr.Muh.Ibnu Choldun R', 'L'),
(7, 114, 'Sari Armiati, S.T.,M.T', 'P'),
(9, 112, 'Mubassiran,S.Si.,M.T', 'L'),
(10, 111, 'Dr.Maniah,S.Kom.,M.T', 'P');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumpulan`
--

CREATE TABLE `pengumpulan` (
  `id_pengumpulan` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `tanggal_kumpul` timestamp NOT NULL DEFAULT current_timestamp(),
  `judul` varchar(50) NOT NULL,
  `pembimbing` varchar(50) NOT NULL,
  `proposal` mediumblob DEFAULT NULL,
  `laporan` mediumblob DEFAULT NULL,
  `dpl` mediumblob DEFAULT NULL,
  `buku_bimbingan` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengumpulan`
--

INSERT INTO `pengumpulan` (`id_pengumpulan`, `npm`, `id_mahasiswa`, `tanggal_kumpul`, `judul`, `pembimbing`, `proposal`, `laporan`, `dpl`, `buku_bimbingan`) VALUES
(63, 2203019, 22, '2022-08-11 12:12:57', '', '0', 0x44415f31305f4a75726e616c5f6b6875737573322e706466, 0x44415f31305f4a75726e616c5f6b6875737573332e706466, 0x44415f31305f4a75726e616c5f6b6875737573342e706466, 0x44415f31305f4a75726e616c5f6b6875737573352e706466),
(64, 2203002, 10, '2022-08-15 02:02:59', '', '0', 0x44415f31305f4a75726e616c5f6b6875737573362e706466, 0x44415f31305f4a75726e616c5f6b6875737573372e706466, NULL, 0x4c61706f72616e5f50726f79656b5f46495858582e706466),
(65, 2203025, 26, '2022-08-18 18:02:35', 'ss', '0', 0x444131332d6261625f31325f6c6162615f7065727573685f646167616e6732332e706466, 0x44504c5f5072696e7431332e706466, NULL, NULL),
(67, 2203019, 22, '2022-08-12 06:51:15', '', '0', 0x44504c5f526576697369312e646f6378, NULL, NULL, NULL),
(69, 2203023, 25, '2022-08-15 02:09:55', '', '0', 0x4241425f4949492e646f6378, 0x44504c5f5072696e7431382e706466, NULL, NULL),
(70, 2203019, 22, '2022-08-15 03:00:32', '', '0', 0x44504c5f5072696e7431392e706466, NULL, NULL, NULL),
(83, 2203025, 26, '2022-08-20 10:21:21', 'g', '0', NULL, NULL, NULL, NULL),
(85, 2203025, 26, '2022-08-20 10:25:59', 'tws', '0', 0x4c61706f72616e47726163656379614f6b74612e706466, 0x4576616c7561736969332d323230333031392d536974695f666174696d61682e706466, 0x4576616c7561736969332d323230333031392d536974695f666174696d6168312e706466, 0x4c656d62617250656e6765736168616e47726163656379614f6b74612e706466),
(90, 2203025, 26, '2022-08-20 10:37:16', 'w', '0', NULL, NULL, NULL, NULL),
(91, 2203025, 26, '2022-08-22 03:39:45', 'lalla', '', NULL, NULL, NULL, NULL),
(92, 2203019, 22, '2022-08-22 03:44:17', 'dd', 'dd', NULL, NULL, NULL, NULL),
(93, 2203019, 22, '2022-08-22 03:44:30', 'SISTEM INFORMASI MANAJEMEN MATAKULIAH PROYEK', 'Shiyami Milwandhari', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `plotting_pembimbing`
--

CREATE TABLE `plotting_pembimbing` (
  `id_plotting_pembimbing` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `tingkat` enum('1','2','3','') NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `plotting_pembimbing`
--

INSERT INTO `plotting_pembimbing` (`id_plotting_pembimbing`, `id_dosen`, `nama_dosen`, `nama_mahasiswa`, `id_mahasiswa`, `tingkat`) VALUES
(14, 1, 'Dr.Maniah,S.Kom.,M.T', 'Redha Aulia Putri', 25, '2'),
(15, 1, 'Dr.Maniah,S.Kom.,M.T', 'Okta Agnes LadyAgatha Manik', 13, '2'),
(16, 2, 'Mubassiran,S.Si.,M.T', 'Gracecya Selfia Purba', 14, '2'),
(17, 2, 'Mubassiran,S.Si.,M.T', 'Hadi Widya Sentosa', 19, '2'),
(18, 3, 'Dr.Muh.Ibnu Choldun R', 'Salma Najla Hanifa', 26, '2'),
(19, 3, 'Dr.Muh.Ibnu Choldun R', 'Rafi Fadhilah Yunus', 15, '2'),
(20, 3, 'Dr.Muh.Ibnu Choldun R', 'Muhammad Zaqi Hanif', 20, '2'),
(21, 4, 'Sari Armiati, S.T.,M.T', 'Adi Tiya Wiranda', 11, '2'),
(22, 4, 'Sari Armiati, S.T.,M.T', 'Hani Tria Septiani', 18, '2'),
(24, 4, 'Sari Armiati, S.T.,M.T', 'Achmad Rizky Ade Saputra', 23, '2'),
(25, 4, 'Sari Armiati, S.T.,M.T', 'Siti Fatimah', 22, '2'),
(26, 4, 'Sari Armiati, S.T.,M.T', 'Yaheszkiel Mikha Emmanuel Kasih', 17, '2'),
(27, 4, 'Sari Armiati, S.T.,M.T', 'Nur Fatimah Azzahrah', 10, '2'),
(28, 5, 'Shiyami Milwandhari,S.Kom.,M.T', 'Nur Fatimah Azzahrah', 10, '2'),
(29, 3, 'Dr.Muh.Ibnu Choldun R', 'Siti Fatimah', 22, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` int(11) NOT NULL,
  `npm` int(10) NOT NULL,
  `id_mahasiswa` varchar(50) NOT NULL,
  `deadline` date NOT NULL,
  `tanggal_kumpul` date NOT NULL,
  `upload_file` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proposal`
--

INSERT INTO `proposal` (`id_proposal`, `npm`, `id_mahasiswa`, `deadline`, `tanggal_kumpul`, `upload_file`) VALUES
(16, 2203019, '22', '2022-07-20', '2022-07-20', 0x72756e646f776e5f283129322e646f6378),
(17, 2203019, '22', '2022-07-05', '2022-07-21', 0x35392d3133342d312d5042362e706466);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sidang`
--

CREATE TABLE `sidang` (
  `id_sidang` int(11) NOT NULL,
  `tanggal_sidang` datetime NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_penguji` int(11) NOT NULL,
  `hasil_keputusan_sidang` enum('Menunggu Keputusan Sidang','Lulus Tanpa Revisi','Lulus Dengan Revisi','Tidak Lulus','') DEFAULT 'Menunggu Keputusan Sidang',
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sidang`
--

INSERT INTO `sidang` (`id_sidang`, `tanggal_sidang`, `id_mahasiswa`, `id_dosen`, `id_penguji`, `hasil_keputusan_sidang`, `catatan`) VALUES
(20, '2022-08-15 00:00:00', 16, 6, 1, '', ''),
(21, '2022-08-15 00:00:00', 21, 6, 1, '', ''),
(22, '2022-08-15 00:00:00', 27, 6, 1, '', ''),
(23, '2022-08-15 00:00:00', 12, 7, 2, '', ''),
(24, '2022-08-15 00:00:00', 24, 7, 2, '', ''),
(25, '2022-08-15 00:00:00', 10, 5, 6, '', ''),
(26, '2022-08-15 00:00:00', 22, 5, 6, '', ''),
(27, '0000-00-00 00:00:00', 22, 5, 6, 'Lulus Dengan Revisi', 'bpmn');

-- --------------------------------------------------------

--
-- Struktur dari tabel `timeline`
--

CREATE TABLE `timeline` (
  `id` int(11) NOT NULL,
  `kegiatan` varchar(50) NOT NULL,
  `waktu` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `timeline`
--

INSERT INTO `timeline` (`id`, `kegiatan`, `waktu`) VALUES
(1, 'Menentukan Topik dan Pengajuan Proposal', '2022-04-07'),
(2, 'Analisis dan Perancangan (SKPL dan DPPL)', '2022-05-20'),
(3, 'UTS', '2022-06-03'),
(4, 'Implementasi dan Pengujian (DPHUPL)', '2022-07-22'),
(5, 'Pengumpulan Dokumentasi Siap Sidang', '2022-07-29'),
(6, 'UAS', '2022-06-12'),
(7, 'Sidang', '2022-08-15'),
(8, 'Sidang Ulang', '2022-08-19'),
(9, 'Pengumpulan Buku Final', '2022-04-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `upload`
--

CREATE TABLE `upload` (
  `id_upload` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `tanggal_kumpul` date NOT NULL,
  `proposal` varchar(255) DEFAULT NULL,
  `laporan` varchar(255) DEFAULT NULL,
  `dpl` varchar(255) DEFAULT NULL,
  `buku_bimbingan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `hak_akses` enum('K','M','D','S','P') NOT NULL DEFAULT 'K',
  `npm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_lengkap`, `hak_akses`, `npm`) VALUES
(2, 'Staf Prodi', 'Staf', 'Emai', 'S', 0),
(4, 'Dosen', 'Dosen', 'Dr.Muh.Ibnu Choldun R', 'D', 0),
(5, 'Koordinator', 'Koordinator', 'Supono,S.T.,M.T', 'K', 0),
(8, 'Ka.Prodi', 'kaprodi', 'Ibnu Chouldun', 'P', 0),
(11, 'mahasiswa2', 'password', 'mahasiswa 2', 'M', 2203002),
(16, 'Zahra', '123', 'Nur Fatimah Azzahrah', 'M', 2203002),
(17, 'dosbing', '123', 'Shiyami Milwandhari,S.Kom.,M.T', 'D', 0),
(18, 'salma', '123', 'Salma Najla Hanifa', 'M', 2203025),
(20, 'mhs3', 'mhs3', 'Redha Aulia Putri', 'M', 2203023),
(21, 'pak ibnu', '123', 'Dr.Muh.Ibnu Choldun R', 'D', 0),
(22, 'siti fatimah', '1234', 'Siti Fatimah', 'M', 2203019);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`);

--
-- Indeks untuk tabel `buku_bimbingan`
--
ALTER TABLE `buku_bimbingan`
  ADD PRIMARY KEY (`id_buku_bimbingan`);

--
-- Indeks untuk tabel `dokumen_akhir`
--
ALTER TABLE `dokumen_akhir`
  ADD PRIMARY KEY (`id_dokumen_akhir`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `dpl`
--
ALTER TABLE `dpl`
  ADD PRIMARY KEY (`id_dpl`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `laporan_kelulusan`
--
ALTER TABLE `laporan_kelulusan`
  ADD PRIMARY KEY (`id_laporan_kelulusan`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `pembekalan`
--
ALTER TABLE `pembekalan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penguji`
--
ALTER TABLE `penguji`
  ADD PRIMARY KEY (`id_penguji`);

--
-- Indeks untuk tabel `pengumpulan`
--
ALTER TABLE `pengumpulan`
  ADD PRIMARY KEY (`id_pengumpulan`);

--
-- Indeks untuk tabel `plotting_pembimbing`
--
ALTER TABLE `plotting_pembimbing`
  ADD PRIMARY KEY (`id_plotting_pembimbing`);

--
-- Indeks untuk tabel `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`);

--
-- Indeks untuk tabel `sidang`
--
ALTER TABLE `sidang`
  ADD PRIMARY KEY (`id_sidang`);

--
-- Indeks untuk tabel `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `buku_bimbingan`
--
ALTER TABLE `buku_bimbingan`
  MODIFY `id_buku_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `dokumen_akhir`
--
ALTER TABLE `dokumen_akhir`
  MODIFY `id_dokumen_akhir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `dpl`
--
ALTER TABLE `dpl`
  MODIFY `id_dpl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `laporan_kelulusan`
--
ALTER TABLE `laporan_kelulusan`
  MODIFY `id_laporan_kelulusan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `pembekalan`
--
ALTER TABLE `pembekalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penguji`
--
ALTER TABLE `penguji`
  MODIFY `id_penguji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pengumpulan`
--
ALTER TABLE `pengumpulan`
  MODIFY `id_pengumpulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `plotting_pembimbing`
--
ALTER TABLE `plotting_pembimbing`
  MODIFY `id_plotting_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `sidang`
--
ALTER TABLE `sidang`
  MODIFY `id_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `upload`
--
ALTER TABLE `upload`
  MODIFY `id_upload` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
