-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2021 pada 08.55
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-litbang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agendakegiatan`
--

CREATE TABLE `agendakegiatan` (
  `id_agenda` int(11) NOT NULL,
  `namakegiatan` varchar(100) NOT NULL,
  `keterangankegiatan` text NOT NULL,
  `tanggalkegiatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `agendakegiatan`
--

INSERT INTO `agendakegiatan` (`id_agenda`, `namakegiatan`, `keterangankegiatan`, `tanggalkegiatan`) VALUES
(3, 'Pembahasan Potensi Pengembangan Usaha Berbasis Kopi di Kabupaten Subang', 'Subang sebagai kabupaten dengan potensi pengembangan usaha berbasis kopi cukup menjadi pembahasan yang menarik. Untuk mengikuti kegiatan tersebut, silakan untuk join Zoom Meeting di https://zoom.us/postattendee?id=39 pada tanggal yang telah ditentukan.', '2021-07-14'),
(4, 'Pembahasan Kualitas Padi dari Kabupaten Subang', 'Kabupaten Subang sebagai kabupaten yang banyak menghasilkan padi menjadi sorotan dari kota-kota lain karena kualitas padinya yang luar biasa. Untuk mengetahui lebih lanjut, ikuti acara pembahasan tersebut di Rumah Dinas Bupati pada tanggal yang sudah ditentukan, pukul 09:00 WIB hingga selesai.', '2021-07-15'),
(5, 'Pembahasan Potensi Pengembangan Usaha Berbasis Kopi di Kab. Subang', 'Subang sebagai kabupaten dengan potensi pengembangan usaha berbasis kopi cukup menjadi pembahasan yang menarik. Untuk mengikuti kegiatan tersebut, silakan untuk join Zoom Meeting di https://zoom.us/postattendee?id=39 pada tanggal yang telah ditentukan', '2021-07-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamatkontak`
--

CREATE TABLE `alamatkontak` (
  `id_alamatkontak` int(11) NOT NULL,
  `alamatkantor` text NOT NULL,
  `nomorkantor` varchar(100) NOT NULL,
  `emailkantor` varchar(100) NOT NULL,
  `jamkerja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alamatkontak`
--

INSERT INTO `alamatkontak` (`id_alamatkontak`, `alamatkantor`, `nomorkantor`, `emailkantor`, `jamkerja`) VALUES
(1, 'Jl. Dewi Sartika No.2, Pasirkareumbi, Kec. Subang, Kabupaten Subang, Jawa Barat 41215, Indonesia', '(0260) 412794', 'litbang@subang.go.id', 'Senin - Jumat | 09:00 - 17:00 WIB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beritaartikel`
--

CREATE TABLE `beritaartikel` (
  `id_berita` int(11) NOT NULL,
  `judulberita` text NOT NULL,
  `thumbnailberita` varchar(100) NOT NULL,
  `headlineberita` varchar(100) NOT NULL,
  `tanggalberita` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isiberita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `beritaartikel`
--

INSERT INTO `beritaartikel` (`id_berita`, `judulberita`, `thumbnailberita`, `headlineberita`, `tanggalberita`, `isiberita`) VALUES
(13, 'Bangganya Kang Jimat karena Kopi Subang yang Go-Internasional', '1100500.jpg', 'Kang Jimat Sangat Bangga Kopi Buatan Subang Mampu Tembus Hingga Ke Pasar Mancanegara', '2021-07-05 08:19:15', '<p><strong>WARTASUBANG.COM, SUBANG</strong>&nbsp;&ndash; Bupati Subang H. Ruhimat, menerima kunjungan sekaligus audiensi dari Miftahudin Shaf, Kepala Koperasi Produsen Gunung Berkah (Hofland Coffee) terkait terpilihnya produsen kopi Subang tersebut oleh Indonesian Trade Promotion Center (ITPC)-Dubai dalam acara The Indonesian Coffee Festival 2021. Adapun audiensi tersebut dilaksanakan di Rumah Dinas Bupati. Selasa, (20/04/2021).</p>\r\n\r\n<p>The Indonesian Coffee Festival 2021 merupakan, event yang diselenggarakan oleh ITPC Dubai dalam rangka mempromosikan berbagai produk kopi khas Indonesia di Uni Emirat Arab yang diselenggarakan tanggal 29 April &ndash; 1 Mei 2021 di Festival City Mall Dubai.</p>\r\n\r\n<p>Koperasi Produsen Gunung Berkah, menerima undangan dari ITPC sebagai satu-satunya perwakilan dari Jawa Barat sebagai bentuk apresiasi dari ITPC kepada Koperasi Produsen Gunung Berkah atas partisipasinya dalam Pameran Gulfood 2021 di Dubai Word Trade Centre pada tanggal 21-25 Februari 2021.</p>\r\n\r\n<p>Dimana stand milik Koperasi Produsen Gunung Berkah yang bertajuk &lsquo;Java Preanger Coffee&rsquo; dengan Merk &lsquo;Hofland&rsquo; dikunjungi sekitar 6000 orang dan mendapat apresiasi serta kepuasan dari 85℅ pengunjung terhadap produk yang disajikan.</p>\r\n\r\n<p>Kepala DKUPP Subang H. Dadang Kurnianudin memaparkan bahwa, pihaknya berkoordinasi dengan pihak provinsi dan kementerian perdagangan agar bisa mendukung dan memberikan fasilitas terkait pemberangkatan perwakilan Koperasi Produsen Gunung Berkah ke Dubai.</p>\r\n\r\n<p>Sementara itu, Kang Jimat dala sambutanya mengatakan bahwa, sangat memberikan apresiasinya dan merasa bangga terhadap upaya putra daerah yang mampu menjadikan produk Subang Mendunia.</p>\r\n\r\n<p>&ldquo;Berharap acara festival kopi indonesia di Dubai nanti bisa menjadi momentum dan kesempatan memasarkan kopi khas Subang di tingkat Dunia,&rdquo; ujar Kang Jimat.</p>\r\n\r\n<p>Selanjutnya, Kang Jimat pun berharap, hasil acara tersebut bisa dijadikan bahan untuk membuat kebijakan oleh pemerintah daerah.</p>\r\n\r\n<p>&ldquo;Terutama dalam peningkatan kesejahteraan petani serta memaksimalkan pemanfaatan potensi lahan yang tersedia,&rdquo; katanya.</p>\r\n\r\n<p>Hadir pula mendampingi kang Jimat Asda II dr. H Nunung Syuhaeri, MARS, dan kepala DKUPP H. Dadang Kurnianudin S.IP. beserta jajarannya.</p>\r\n'),
(14, 'Rapat Terbuka Bersama Bupati Subang', 'kopsub900300.jpg', 'H. Ruhimat, Bupati Kabupaten Subang berniat untuk mengadakan rapat terbuka tentang penelitian dan pe', '2021-07-05 08:45:01', '<p>a</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang_penelitian`
--

CREATE TABLE `bidang_penelitian` (
  `id_bidang_penelitian` int(11) NOT NULL,
  `bidang_penelitian` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bidang_penelitian`
--

INSERT INTO `bidang_penelitian` (`id_bidang_penelitian`, `bidang_penelitian`) VALUES
(4, 'Kebudayaan'),
(5, 'Teknologi dan Informasi'),
(6, 'Kemasyarakatan'),
(7, 'Kebudayaan'),
(8, 'Pertanian & Irigasi'),
(9, 'Kelautan & Perairan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id_chat` varchar(191) NOT NULL,
  `user` varchar(191) NOT NULL,
  `user1` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`id_chat`, `user`, `user1`) VALUES
('60e36f70073ab', '3', '60e2da855be4c'),
('60e3709d87caa', '2', '3'),
('60e3714adcc00', '60e2da855be4c', '60e36ded31c1c');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapemohonskp`
--

CREATE TABLE `datapemohonskp` (
  `id_peneliti` varchar(191) NOT NULL,
  `id_user` varchar(191) NOT NULL,
  `namalengkap` varchar(100) DEFAULT NULL,
  `alamatpeneliti` varchar(100) NOT NULL,
  `tempatlahir` text NOT NULL,
  `tanggallahir` date DEFAULT NULL,
  `nomorhp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `instansipeneliti` varchar(100) DEFAULT NULL,
  `judulpenelitian` varchar(100) DEFAULT NULL,
  `bidangpenelitian` varchar(100) DEFAULT NULL,
  `tujuanpenelitian` varchar(200) DEFAULT NULL,
  `lokasipenelitian` varchar(100) NOT NULL,
  `tanggalmulaipenelitian` date NOT NULL,
  `tanggalselesaipenelitian` date NOT NULL,
  `pjpenelitian` varchar(100) NOT NULL,
  `anggotapenelitian` text NOT NULL,
  `scanktp` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` enum('belum_terverifikasi','terverifikasi','','') NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `skp` varchar(100) DEFAULT NULL,
  `token_lupa_password` varchar(191) DEFAULT NULL,
  `status_penelitian` enum('belum_selesai','selesai') NOT NULL,
  `foto_verifikasi` varchar(191) DEFAULT NULL,
  `file` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datapemohonskp`
--

INSERT INTO `datapemohonskp` (`id_peneliti`, `id_user`, `namalengkap`, `alamatpeneliti`, `tempatlahir`, `tanggallahir`, `nomorhp`, `email`, `instansipeneliti`, `judulpenelitian`, `bidangpenelitian`, `tujuanpenelitian`, `lokasipenelitian`, `tanggalmulaipenelitian`, `tanggalselesaipenelitian`, `pjpenelitian`, `anggotapenelitian`, `scanktp`, `foto`, `status`, `token`, `skp`, `token_lupa_password`, `status_penelitian`, `foto_verifikasi`, `file`) VALUES
('60e2da855be4d', '60e2da855be4c', 'Fathurrasyid Ibrahim', 'Cigadung, Subang', 'Subang', '1999-12-06', '0881023635488', 'fathuri6rahim@gmail.com', 'Politeknik Negeri Subang', 'Rancang Bangun E-Litbang dan Pelayanan Rekomendasi Penelitian Online di BP4D Kabupaten Subang', '4', 'Merancang sistem untuk mengubah proses manual menjadi terkomputerisasi', 'Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah Kabupaten Subang ', '2021-07-08', '2021-10-21', 'Fathurrasyid Ibrahim', 'Fathurrasyid Ibrahim', 'ktp.jpeg', 'cv2.png', 'terverifikasi', '60e36f1c07602', '60efd6887ee14', NULL, 'selesai', 'IMG_20200404_161552_1.jpg', NULL),
('60e36ded31c1d', '60e36ded31c1c', 'Alfath Rasyid', 'Cigadung', 'Subang', '1998-06-13', '0881023635488', 'fathuri6rahim@gmail.com', 'Politeknik Negeri Subang', 'Rancang Bangun Sistem Informasi Kepegawaian', '5', 'Merancang sistem untuk mengubah proses manual menjadi terkomputerisasi', 'Kantor Badan Kesatuan Bangsa dan Politik', '2021-09-08', '2021-12-22', 'Alfath Rasyid', 'Alfath Rasyid, Fath Ibrahim, Ibrahim Fathur', 'ktp2.jpeg', 'diri1.jpg', 'belum_terverifikasi', NULL, '60efd6887ee14', NULL, 'belum_selesai', NULL, NULL),
('60e39e8d51128', '60e39e8d51127', 'Abraham Rusydi', 'Sakina Residence', 'Subang', '1997-12-31', '085314276626', 'fathuri6rahim@gmail.com', 'Politeknik Negeri Subang', 'Perbandingan Pencak Silat Tadjimalela Asli Kabupaten Subang dengan Domas Garuda Putih', '4', 'Mempublikasikan kepada masyarakat ', 'Tadjimalela Jalan Cagak', '2021-11-17', '2021-12-15', 'Abraham Rusydi', 'Abraham Rusydi, Ibrahim Rasyid, Fathur Arsyad', 'ktp.png', 'cv.png', 'terverifikasi', '60e3bf8b0c139', 'Surat_Keterangan_Penelitian_dari_Kesbangpol1.pdf', NULL, 'selesai', 'IMG_20200404_161619_1.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumenhasilpenelitian`
--

CREATE TABLE `dokumenhasilpenelitian` (
  `id_dokumen` int(11) NOT NULL,
  `id_peneliti` varchar(100) NOT NULL,
  `tanggalunggahdokumen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dokumen` varchar(100) NOT NULL,
  `status_dokumen` enum('belum_diverifikasi','terverifikasi','ditolak') NOT NULL,
  `komentar` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumenhasilpenelitian`
--

INSERT INTO `dokumenhasilpenelitian` (`id_dokumen`, `id_peneliti`, `tanggalunggahdokumen`, `dokumen`, `status_dokumen`, `komentar`) VALUES
(25, '60e2da855be4d', '2021-07-05 21:16:11', '10105013-Fathurrasyid_Ibrahim-Laporan_Proyek_Akhir.pdf', 'terverifikasi', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumentasifoto`
--

CREATE TABLE `dokumentasifoto` (
  `id_foto` int(11) NOT NULL,
  `judulfoto` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `keteranganfoto` varchar(100) NOT NULL,
  `tanggalunggahfoto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumentasifoto`
--

INSERT INTO `dokumentasifoto` (`id_foto`, `judulfoto`, `foto`, `keteranganfoto`, `tanggalunggahfoto`) VALUES
(13, 'Kang Jimatt', 'kopsub900300.jpg', 'Rapat Terbuka yang telah diselenggarakan pada Senin kemarin untuk membahas tentang penelitian dan pe', '2021-07-05 09:05:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi_skp`
--

CREATE TABLE `informasi_skp` (
  `id_informasi` int(11) NOT NULL,
  `isi` text NOT NULL,
  `jenis` enum('apa_itu','untuk_apa','alur_permohonan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `informasi_skp`
--

INSERT INTO `informasi_skp` (`id_informasi`, `isi`, `jenis`) VALUES
(1, '<p><span style=\"font-family:Arial,Helvetica,sans-serif\">SKP adalah Surat Keterangan Penelitian, yang merupakan bentuk dari Rekomendasi Penelitian yang diberikan oleh Pemerintah Daerah Kabupaten Subang terhadap peneliti yang ingin melaksanakan penelitian. Dalam Permendagri No. 64 Tahun 2011 disebutkan bahwa:</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Rekomendasi Penelitian adalah naskah dinas dari pejabat yang berwenang berisi keterangan, catatan, persetujuan terhadap usulan penelitian.</span></span></p>\r\n', 'apa_itu'),
(2, '<p><span style=\"font-family:Arial,Helvetica,sans-serif\">SKP sebagai bentuk dari Rekomendasi Penelitian memiliki beberapa tujuan seperti yang disebutkan dalam Permendagri No. 64 Tahun 2011 sebagai berikut:</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\">Rekomendasi penelitian sebagaimana dimaksud dalam Pasal 2 ayat (2) bertujuan untuk: </span></span></p>\r\n\r\n<ol style=\"list-style-type:lower-alpha\">\r\n	<li style=\"text-align:justify\">\r\n	<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\">menjadi bahan pertimbangan pemberian izin penelitian oleh pemerintah daerah; </span></span></p>\r\n	</li>\r\n	<li style=\"text-align:justify\">\r\n	<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\">menjadi acuan bagi peneliti dalam memperoleh izin penelitian; dan</span></span></p>\r\n	</li>\r\n	<li style=\"text-align:justify\">\r\n	<p><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:12pt\">tertib secara administrasi.</span></span></p>\r\n	</li>\r\n</ol>\r\n', 'untuk_apa'),
(3, 'Alur_Permohonan_SKP.png', 'alur_permohonan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `isi_chat`
--

CREATE TABLE `isi_chat` (
  `id_isi_chat` int(11) NOT NULL,
  `id_chat` varchar(191) NOT NULL,
  `pengirim` varchar(191) NOT NULL,
  `penerima` varchar(191) NOT NULL,
  `chat` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `isi_chat`
--

INSERT INTO `isi_chat` (`id_isi_chat`, `id_chat`, `pengirim`, `penerima`, `chat`, `status`) VALUES
(17, '60e36f70073ab', '3', '60e2da855be4c', 'Tes', '1'),
(18, '60e3709d87caa', '2', '3', 'Tes', '1'),
(19, '60e3709d87caa', '3', '2', 'Cek', '1'),
(20, '60e36f70073ab', '3', '60e2da855be4c', 'Tes', '1'),
(21, '60e36f70073ab', '3', '60e2da855be4c', 'Tes', '1'),
(22, '60e3714adcc00', '60e2da855be4c', '60e36ded31c1c', 'Tes', '1'),
(23, '60e3714adcc00', '60e36ded31c1c', '60e2da855be4c', 'Cek', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `opd`
--

CREATE TABLE `opd` (
  `id_penelitiopd` int(100) NOT NULL,
  `namapenelitiopd` varchar(100) NOT NULL,
  `asalopd` varchar(100) NOT NULL,
  `judulpenelitianopd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `opd`
--

INSERT INTO `opd` (`id_penelitiopd`, `namapenelitiopd`, `asalopd`, `judulpenelitianopd`) VALUES
(16, 'Yola', 'BP4D', 'Pengembangan Jalan Tol di Subang'),
(17, 'Yola', 'Bapenda', 'Potensi Peningkatan Kinerja PNS di Subang'),
(19, 'Danang', 'Bapenda', 'Pengembangan Jalan Tol di Subang'),
(20, 'Danang', 'Bapenda', 'Potensi Peningkatan Kinerja PNS di Subang'),
(21, 'Danang', 'BP4D', 'Potensi Peningkatan Kinerja PNS di Subang'),
(22, 'Yola', 'BP4D', 'Pengembangan Jalan Tol di Subang'),
(23, 'Yola', 'BP4D', 'Potensi Peningkatan Kinerja PNS di Subang'),
(26, 'Danang', 'Bapenda', 'Potensi Peningkatan Kinerja PNS di Subang'),
(27, 'Dana Annisa', 'DPMPTSP', 'Potensi pengembangan usaha berbasis kopi di Kabupaten Subang'),
(28, 'Rainissa', 'BP4D', 'Menentukan tingkat keasaman nanas dengan alat pengukur keasaman nanas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `no_hape` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `nama`, `no_hape`, `email`, `pesan`, `status`) VALUES
(4, 'Fathurrasyid Ibrahim', '0101', 'fathuri6rahim@gmail.com', 'Tes', '1'),
(5, 'Abraham Fath', '0881023635488', 'fathuri6rahim@gmail.com', 'Apakah saya boleh meminta dokumen hasil penelitian berjudul \"Rancang Bangun E-Litbang dan Pelayanan Rekomendasi Penelitian Online\" oleh peneliti bernama Fathurrasyid Ibrahim? Saya membutuhkan dokumen tersebut untuk referensi bagi penelitian saya. Terima kasih', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `fotoheader` varchar(100) NOT NULL,
  `judul` varchar(191) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `fotoheader`, `judul`, `isi`) VALUES
(1, 'bp4d31.jpg', 'Sejarah BP4D dan Litbang', '<h6>&nbsp;</h6>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Masa Orde Lama</span></span></strong></span></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Pada masa orde lama Presiden Soekarno menetapkan Keputusan Presiden Nomor 19 Tahun 1964 tentang Badan Koordinasi Pembangunan Daerah (BAKOPDA). Yang didahului oleh Penetapan Presiden Nomor 12 Tahun 1963 tentang Badan Perencanaan Pembangunan Nasional (BAPPENAS). Badan Koordinasi Pembangunan Daerah (BAKOPDA) diketuai oleh Gubernur Kepala Daerah Tingkat I atau Wakilnya dan anggota-anggotanya diangkat oleh Gubernur Kepala Daerah Tingkat I yang anggota-anggotanya terdiri dari perwakilan instansi dan masyarakat. </span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Adapun tugas dari BAKOPDA adalah :</span></span></span></span></span></p>\r\n\r\n<ol style=\"list-style-type:lower-alpha\">\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Menyusun usul rencana pembangunan komplementer daripada rencana pembangunan nasional semesta untuk ditetapkan oleh BAPPENAS.</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Membantu pelaksanaan pembangunan nasional semesta yang dilaksanakan oleh Pemerintah Pusat.</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Menyusun rencana pembangunan daerah, rencana tahunan dan rencana jangka Panjang untuk disahkan oleh BAPPENAS.</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Mengkoordinir dan mengawasi pelaksanaan pembangunan daerah.</span></span></span></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:72px; text-align:justify\">&nbsp;</p>\r\n\r\n<ol start=\"2\">\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Masa Orde baru</span></span></strong></span></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:47px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Dalam rangka peningkatan pembangunan di daerah diperlukan adanya suatu perencanaan pembangunan yang menyeluruh dan merupakan pengintegrasian dari segala kegiatan pembangunan di daerah. Presiden Soeharto pada Tahun 1974 mengeluarkan Keputusan Presiden Nomor 15 Tahun 1974 tentang Pembentukan Badan Perencanaan Pembangunan Daerah. Keputusan Presiden tersebut juga mencabut Keputusan Presiden Nomor 19 Tahun 1964 tentang Badan Koordinasi Peembangunan Daerah.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:47px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Badan Perencanaan Pembangunan Daerah (BAPPEDA) adalah badan staf yang langsung berada di bawah dan bertanggung jawab &nbsp;Kepada Gubernur yang mempunyai fungsi membantu Gubernur Kepala Daerah dalam menentukan kebijakan di bidang perencanaan pembangunan daerah serta penilaian atas pelaksanaannya.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:47px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Untuk dapat menyelenggarakan fungsinya, BAPPEDA mempunyai tugas sebagai berikut :</span></span></span></span></span></p>\r\n\r\n<ol style=\"list-style-type:lower-alpha\">\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Menyusun rencana-rencana pembangunan daerah yang terdiri atas :</span></span></span></span></span></li>\r\n</ol>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Pola Dasar Rencana Pembangunan Lima Tahun Daerah yang garis besarnya berisikan tujuan, susunan prioritas dan strategi pembangunan.</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Rencana Pembangunan Lima Tahun Daerah yang berisikan program-program sektoral yang terdapat di dalam daerah.</span></span></span></span></span></li>\r\n</ul>\r\n\r\n<ol start=\"2\" style=\"list-style-type:lower-alpha\">\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Menyusun program-program tahunan</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Melakukan koordinasi perencanaan.</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Menyusun Rencana Anggaran Pendapatan dan Belanja Daerah Bersama-sama dengan Direktorat Keuangan Daerah.</span></span></span></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\">&nbsp;</p>\r\n\r\n<ol start=\"5\" style=\"list-style-type:lower-alpha\">\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Mengawasi persiapan dan perkembangan pelaksanaan rencana pembangunan daerah untuk kepentingan penilaian baik tentang laju pelaksanaan maupun tentang penyesuaian-penyesuaian yang diperlukan di dalam program-program atau proyek-proyek.</span></span></span></span></span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"color:black\">Mengadakan penelitian mengenai permasalahan dan sumber-sumber potensial daerah secara menyeluruh untuk kepentingan perencanaan pembangunan daerah.</span></span></span></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:40px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Pada perkembangan selanjutnya, dalam rangka memantapkan kedudukan, tugas, dan fungsi Bappeda sebagai bagian dari organ yang membantu tugas Gubernur/Bupati/Walikota pada aspek perencanaan, diterbitkan Keputusan Presiden Republik Indonesia Nomor 27 Tahun 1980 tentang Pembentukan Badan Perencanaan Pembangunan Daerah, yang pelaksanaannya diatur melalui Peraturan Menteri Dalam Negeri Nomor 185 Tahun 1980 tentang Pedoman Organisasi dan Tata Kerja Badan Perencanaan Pembangunan Daerah Tingkat I dan Badan Perencanaan Pembangunan&nbsp; Daerah Tingkat II.&nbsp; Sebagaimana dalam Keppres tersebut, Badan Perencanaan Pembangunan Daerah di Provinsi Daerah Tingkat I disebut Bappeda Tingkat I,&nbsp;merupakan badan staf yang berada di bawah dan bertanggungjawab kepada Gubernur/Kepala Daerah Tingkat I.&nbsp; Selanjutnya Bappeda Tingkat II merupakan badan staf yang berada di bawah dan bertanggungjawab kepada Bupati Walikota/madya Kepala Daerah Tingkat II Susunan organisasi Bappeda terdiri dari : ketua, sekretariat, bidang penelitian, bidang ekonomi, bidang sosial budaya, bidang fisik dan prasarana, bidang statistik dan laporan.</span></span></span></p>\r\n\r\n<ol start=\"3\">\r\n	<li style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"color:black\">Masa Orde Reformasi</span></span></strong></span></span></span></li>\r\n</ol>\r\n\r\n<p style=\"margin-left:48px; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\">Dengan bergulirnya Era Otonomi Daerah yang ditandai dengan keluarnya Undang &ndash; Undang Nomor 22 Tahun 1999 tentang Otonomi Daerah dan Undang-Undang Nomor 25 Tahun 1999 tentang Perimbangan Keuangan Pusat dan Daerah, berdampak terhadap struktur kelembagaan perangkat daerah. Untuk melaksanakan tugas-tugas sebagai akibat adanya pelimpahan wewenang dari pusat ke daerah, maka diterbitkan Peraturan Pemerintahan&nbsp; Nomor 84 Tahun 2000 tentang Pedoman Organisasi Perangkat Daerah (Lembaran Negara Tahun 2000 No.165). Untuk menindaklanjuti&nbsp; pelaksanaan Peraturan Pemerintah tersebut, maka diterbitkan Peraturan Daerah Kabupaten Subang Nomor 27 Tahun 2000 tentang </span><span style=\"font-size:12.0pt\">Pembentukan Organisasi Lembaga Teknis Daerah di Lingkungan Pemerintah Kabupaten Subang. Dengan peraturan ini BAPPEDA berubah menjadi BAPEDA (Badan Perencanaan Daerah).</span></span></span></p>\r\n\r\n<p style=\"margin-left:47px; text-align:justify\"><span style=\"font-size:12pt\">Dengan terbitnya Undang-Undang Nomor 32 Tahun 2004 tentang Pemerintahan daerah, BAPEDA Kembali&nbsp; berubah menjadi BAPPEDA dengan Peraturan Daerah Kabupaten Subang Nomor&nbsp; 8 tahun 2008 tentang Organisasi dan tata Kerja Lembaga Teknis Daerah di Lingkungan Pemerintah Kabupaten Subang.</span></p>\r\n\r\n<p style=\"margin-left:47px; text-align:justify\"><span style=\"font-size:12pt\">Pada Tahun 2014 terbit Undang-Undang Nomor 23 Tahun 2014 tentang Pemerintahan Daerah sebagai pengganti Undang-Undang Nomor 32 Tahun 2004. Melalui Peraturan Daerah Kabupaten Subang Nomor 7 Tahun 2016 tentang Pembentukan dan Susunan Perangkat Daerah Kabupaten Subang yang ditindaklanjuti oleh Peraturan Bupati Kabupaten Subang Nomor 33 Tahun 2016, tentang Susunan Organisasi Perangkat Daerah merubah nomenklatur BAPPEDA menjadi BP4D yaitu Badan Perencanaan Pembangunan Penelitian&nbsp; Pengembangan Daerah. </span></p>\r\n\r\n<p style=\"margin-left:47px; text-align:justify\"><span style=\"font-size:12pt\">Litbang pertama kali dimunculkan dalam Struktur Organisasi Pemerintah Daerah Kabupaten Subang untuk melaksanakan Urusan Penelitian Pengembangan pada tahun 2016 yang ditetapkan dalam Peraturan Daerah No. 7 Tahun 2016. Ada pun tugas-tugas pokok dari struktur tersebut yang dicantumkan dalam Peraturan Bupati Subang No. 33 Tahun 2016 tentang Susunan Organisasi Perangkat Daerah Badan.</span></p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress`
--

CREATE TABLE `progress` (
  `id_progress` int(11) NOT NULL,
  `id_peneliti` varchar(191) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `progress` varchar(191) NOT NULL,
  `tahapan_penelitian` varchar(191) NOT NULL,
  `lokasi_terkait` varchar(191) NOT NULL,
  `pihak_terkait` varchar(191) NOT NULL,
  `peran_pihak_terkait` varchar(191) NOT NULL,
  `dokumentasi_pendukung` varchar(191) NOT NULL,
  `persentase_penelitian` int(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `progress`
--

INSERT INTO `progress` (`id_progress`, `id_peneliti`, `tanggal`, `progress`, `tahapan_penelitian`, `lokasi_terkait`, `pihak_terkait`, `peran_pihak_terkait`, `dokumentasi_pendukung`, `persentase_penelitian`) VALUES
(9, '60e2da855be4d', '2021-07-05 20:47:40', 'Bimbingan PA', 'Bimbingan BAB 1', 'Politeknik Negeri Subang', 'Pak Tri', 'Dosen Pembimbing 1', 'IMG_20200404_161609.jpg', 15),
(11, '60e2da855be4d', '2021-07-05 21:10:14', 'Bimbingan PA', 'Bimbingan BAB 2', 'Dilaksanakan secara daring', 'Pak Iqbal', 'Dosen Pembimbing 2', 'IMG_20200404_161552_1.jpg', 35),
(12, '60e2da855be4d', '2021-07-05 21:11:02', 'Bimbingan PA', 'Bimbingan BAB 3', 'Dilaksanakan secara daring', 'Bu Haryati', 'Dosen Penguji 1', 'IMG_20200404_161629.jpg', 65),
(13, '60e2da855be4d', '2021-07-05 21:11:28', 'Bimbingan PA', 'Bimbingan BAB 4', 'Dilaksanakan secara daring', 'Bu Nanda', 'Dosen Penguji 2', 'logo-POLSUB.png', 85),
(14, '60e2da855be4d', '2021-07-05 21:11:54', 'Bimbingan PA', 'Bimbingan BAB 5', 'Politeknik Negeri Subang', 'Pak Iqbal', 'Dosen Pembimbing 2', 'Logo_Polsub.png', 90),
(15, '60e2da855be4d', '2021-07-05 21:12:10', 'Bimbingan PA', 'Revisian', 'Politeknik Negeri Subang', 'Pak Tri', 'Dosen Pembimbing 1', 'IMG_20200410_101845_1.jpg', 100),
(16, '60e39e8d51128', '2021-07-06 02:28:36', 'Bimbingan PA', 'Bimbingan BAB 1', 'Politeknik Negeri Subang', 'Pak Tri', 'Dosen Pembimbing 2', 'IMG_20200404_1616092.jpg', 55),
(17, '60e39e8d51128', '2021-07-06 02:29:52', 'Bimbingan PA', 'Revisian', 'Dilaksanakan secara daring', 'Pak Iqbal', 'Dosen Pembimbing 2', 'IMG_20200404_161619_1.jpg', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposalpenelitian`
--

CREATE TABLE `proposalpenelitian` (
  `id_proposalpenelitian` int(11) NOT NULL,
  `id_peneliti` varchar(191) NOT NULL,
  `file` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proposalpenelitian`
--

INSERT INTO `proposalpenelitian` (`id_proposalpenelitian`, `id_peneliti`, `file`) VALUES
(12, '60e2da855be4d', 'Proposal_Penelitian.pdf'),
(13, '60e2da855be4d', 'SK_PKL_Kampus1.pdf'),
(14, '60e36ded31c1d', 'SK_PKL_Kampus3.pdf'),
(15, '60e39e8d51128', 'Proposal_Penelitian1.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skp`
--

CREATE TABLE `skp` (
  `id_skp` varchar(191) NOT NULL,
  `surat_dari` varchar(191) NOT NULL,
  `nomor` varchar(191) NOT NULL,
  `perihal` varchar(191) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skp`
--

INSERT INTO `skp` (`id_skp`, `surat_dari`, `nomor`, `perihal`, `tanggal`) VALUES
('60efd6887ee14', 'Ketua Jurusan Politeknik Subang', '1234567890', 'Praktek Kerja Lapangan', '2021-07-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sop_litbang`
--

CREATE TABLE `sop_litbang` (
  `id_sop` int(11) NOT NULL,
  `jenis` enum('Dasar Hukum','SOP') NOT NULL,
  `judul` varchar(191) NOT NULL,
  `file` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sop_litbang`
--

INSERT INTO `sop_litbang` (`id_sop`, `jenis`, `judul`, `file`) VALUES
(3, 'Dasar Hukum', 'Permendagri Nomor 64 Tahun 2011 Tentang Penerbitan Rekomendasi Penelitian', 'permendagri-nomor-64-tahun-2011-tentang-pedoman-penerbitan-rekomendasi-penelitian1.doc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_skp`
--

CREATE TABLE `surat_skp` (
  `id_surat_skp` int(11) NOT NULL,
  `nomor` varchar(191) NOT NULL,
  `dasar` text NOT NULL,
  `kabid` varchar(191) NOT NULL,
  `nip_kabid` varchar(191) NOT NULL,
  `tanda_tangan` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `surat_skp`
--

INSERT INTO `surat_skp` (`id_surat_skp`, `nomor`, `dasar`, `kabid`, `nip_kabid`, `tanda_tangan`) VALUES
(1, 'PP.05.02/888/SKP/IX/WASNAS', '<p>1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt scelerisque orci at varius. Integer aliquet pretium sem eget ullamcorper. Cras faucibus feugiat egestas. Cras auctor mauris nibh, sed convallis tortor volutpat in. Cras ultrices nibh id tempor tristique. Sed odio diam, placerat ac est in, accumsan facilisis turpis. Nunc et nisl nisl. Vestibulum eu ornare mauris, at aliquam felis. Vivamus nec vulputate ante. Suspendisse rutrum semper accumsan. Phasellus enim diam, maximus non tempus eu, accumsan pulvinar nisl. Maecenas eget lorem ac erat vulputate mattis. Aenean fermentum sollicitudin nunc at semper. Proin non mattis tortor.</p>\r\n', 'Drs. ANDRI HADIAN', '196411231992031006', 'tanda_tangan.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(191) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('1','2','3','4') NOT NULL,
  `status` enum('bisa_login','tidak_bisa_login') NOT NULL DEFAULT 'tidak_bisa_login'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `status`) VALUES
('1', 'superuser', 'superuser', '1', 'bisa_login'),
('2', 'litbang', 'litbang', '2', 'bisa_login'),
('3', 'bakesbangpol', 'bakesbangpol', '3', 'bisa_login'),
('60e2da855be4c', 'fathurrasyid', 'fathurrasyid', '4', 'tidak_bisa_login'),
('60e36ded31c1c', 'alfath', 'alfath', '4', 'bisa_login'),
('60e39e8d51127', 'rusydi', 'rusydi', '4', 'bisa_login');

-- --------------------------------------------------------

--
-- Struktur dari tabel `verifikasi`
--

CREATE TABLE `verifikasi` (
  `id_verifikasi` int(11) NOT NULL,
  `id_peneliti` varchar(100) NOT NULL,
  `namapihakberwajib` varchar(100) NOT NULL,
  `jabatanpihakberwajib` varchar(100) NOT NULL,
  `emailpihakberwajib` varchar(100) NOT NULL,
  `token` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `verifikasi`
--

INSERT INTO `verifikasi` (`id_verifikasi`, `id_peneliti`, `namapihakberwajib`, `jabatanpihakberwajib`, `emailpihakberwajib`, `token`) VALUES
(3, '60e2da855be4d', 'Fathurrasyid', 'Pembina', 'ifathurrasyid@gmail.com', '60e36f1c07602'),
(4, '60e39e8d51128', 'Ibrahim', 'Pembina', 'ifathurrasyid@gmail.com', '60e3bf8b0c139');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agendakegiatan`
--
ALTER TABLE `agendakegiatan`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indeks untuk tabel `alamatkontak`
--
ALTER TABLE `alamatkontak`
  ADD PRIMARY KEY (`id_alamatkontak`);

--
-- Indeks untuk tabel `beritaartikel`
--
ALTER TABLE `beritaartikel`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `bidang_penelitian`
--
ALTER TABLE `bidang_penelitian`
  ADD PRIMARY KEY (`id_bidang_penelitian`);

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indeks untuk tabel `datapemohonskp`
--
ALTER TABLE `datapemohonskp`
  ADD PRIMARY KEY (`id_peneliti`);

--
-- Indeks untuk tabel `dokumenhasilpenelitian`
--
ALTER TABLE `dokumenhasilpenelitian`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `dokumentasifoto`
--
ALTER TABLE `dokumentasifoto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indeks untuk tabel `informasi_skp`
--
ALTER TABLE `informasi_skp`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `isi_chat`
--
ALTER TABLE `isi_chat`
  ADD PRIMARY KEY (`id_isi_chat`);

--
-- Indeks untuk tabel `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`id_penelitiopd`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id_progress`);

--
-- Indeks untuk tabel `proposalpenelitian`
--
ALTER TABLE `proposalpenelitian`
  ADD PRIMARY KEY (`id_proposalpenelitian`);

--
-- Indeks untuk tabel `skp`
--
ALTER TABLE `skp`
  ADD PRIMARY KEY (`id_skp`);

--
-- Indeks untuk tabel `sop_litbang`
--
ALTER TABLE `sop_litbang`
  ADD PRIMARY KEY (`id_sop`);

--
-- Indeks untuk tabel `surat_skp`
--
ALTER TABLE `surat_skp`
  ADD PRIMARY KEY (`id_surat_skp`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD PRIMARY KEY (`id_verifikasi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agendakegiatan`
--
ALTER TABLE `agendakegiatan`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `alamatkontak`
--
ALTER TABLE `alamatkontak`
  MODIFY `id_alamatkontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `beritaartikel`
--
ALTER TABLE `beritaartikel`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `bidang_penelitian`
--
ALTER TABLE `bidang_penelitian`
  MODIFY `id_bidang_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `dokumenhasilpenelitian`
--
ALTER TABLE `dokumenhasilpenelitian`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `dokumentasifoto`
--
ALTER TABLE `dokumentasifoto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `informasi_skp`
--
ALTER TABLE `informasi_skp`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `isi_chat`
--
ALTER TABLE `isi_chat`
  MODIFY `id_isi_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `opd`
--
ALTER TABLE `opd`
  MODIFY `id_penelitiopd` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `progress`
--
ALTER TABLE `progress`
  MODIFY `id_progress` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `proposalpenelitian`
--
ALTER TABLE `proposalpenelitian`
  MODIFY `id_proposalpenelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `sop_litbang`
--
ALTER TABLE `sop_litbang`
  MODIFY `id_sop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `surat_skp`
--
ALTER TABLE `surat_skp`
  MODIFY `id_surat_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `verifikasi`
--
ALTER TABLE `verifikasi`
  MODIFY `id_verifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
