-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 04, 2021 at 11:51 PM
-- Server version: 10.3.29-MariaDB-log-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengadu5_pln_kepanjen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `created_at`, `updated_at`) VALUES
(0, 'Admin', 'admin', 'd3ac9c396a76f2deab771bee69bedbca', '2021-05-29 07:46:09', '0000-00-00 00:00:00'),
(1, 'admin2', 'admin2', 'c84258e9c39059a89ab77d846ddab909', '2021-06-23 13:19:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal_publish` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_publish` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `id_kategori`, `banner`, `judul`, `slug`, `deskripsi`, `tanggal_publish`, `status_publish`, `created_at`, `updated_at`) VALUES
(1, 1, 'pemadaman.PNG', 'Info Pemadaman Listrik Wilayah Kabupaten Malang Hari Ini, Segera Cek Apakah Alamat Rumah Anda Termasuk', 'info-pemadaman-listrik-wilayah-kabupaten-malang-hari-ini-segera-cek-apakah-alamat-rumah-anda-termasuk', '<p>Sebagian wilayah kelurahan Dinoyo,&nbsp;<a href=\"https://portalmalangraya.pikiran-rakyat.com/tag/Kota%20Malang\">Kota Malang</a>&nbsp;dijadwalkan mengalami pemadamkan saluran listrik hari ini, 3 Maret 2021.<br /><br />Dilansir dari laman resmi&nbsp;<a href=\"https://portalmalangraya.pikiran-rakyat.com/tag/PLN\">PLN</a>&nbsp;UP3 Malang, pemutusan sementara aliran listrik tersebut merupakan agenda pemeliharaan jaringan yang mana akan memakan waktu sekitar 4 jam pekerjaan, dimulai dari pukul 09.00 s/d 13.00 WIB.<br /><br />Adapun lokasi yang terdampak dari aktivitas pekerjaan ini diantaranya jl. Rajek Wesi, jl. Panderman, jl. Pandan, sebagian besar jl. Wilis dan jl Kawi serta Perumahan Ijen Nirwana, Bareng Raya dan Gereja Mawan Sharon.<br />&nbsp;</p><p><a href=\"https://portalmalangraya.pikiran-rakyat.com/tag/PLN\">PLN</a>&nbsp;juga mengimbau, bagi pelanggan yang memiliki tenaga listrik cadangan berupa genset agar segera dipisah dari instalasi&nbsp;<a href=\"https://portalmalangraya.pikiran-rakyat.com/tag/PLN\">PLN</a>&nbsp;dan jika pekerjaan telah selesai sebelum estimasi waktu, maka pihak&nbsp;<a href=\"https://portalmalangraya.pikiran-rakyat.com/tag/PLN\">PLN</a>&nbsp;akan segera menormalkan kembali aliran listrik.<br /><br />Tips: Jika rumah anda tidak memiliki saluran air PDAM, segera penuhi kebutuhan air rumah anda mumpung masih tersisa waktu sebelum pemutusan aliran listrik.<br /><br />Jika menemukan kendala lain, segera hubungi layanan pengaduan resmi&nbsp;<a href=\"https://portalmalangraya.pikiran-rakyat.com/tag/PLN\">PLN</a>.<br />&nbsp;</p><p>Editor:&nbsp;Harbhimanyu Wicaksono</p>', '2021-06-07 17:00:00', 'Post', '2021-06-08 06:13:30', '2021-06-21 07:01:20'),
(2, 2, 'pembangunan.jpg', 'PLN Jamin Suplai Listrik untuk PON di Papua Tak Terganggu', 'pln-jamin-suplai-listrik-untuk-pon-di-papua-tak-terganggu', '<p>PT Perusahaan Listrik Negara (Persero) atau <a href=\"https://www.tempo.co/tag/pln\">PLN</a> menjamin suplai listrik untuk penyelenggaraan pekan olahraga nasional (PON) di Papua pada Oktober mendatang tidak terganggu. Total daya listrik yang dibutuhkan di seluruh lokasi pertandingan PON diperkirakan mencapai 16,2 megawatt (MW).</p><p>“Untuk daya mampu listrik di empat lokasi PON rata-rata surplus sekitar 38 persen dari beban puncak saat ini. Dengan kebutuhan daya tambahan untuk PON, kami perkirakan surplus daya masih berkisar 30 persen,” ujar General Manager PLN Unit Induk Wilayah <a href=\"https://www.tempo.co/tag/papua\">Papua</a> dan Papua Barat Abdul Farid dalam keterangannya, Jumat, 18 Juni 2021.</p><p><a href=\"https://www.tempo.co/tag/pon-papua\">PON </a><a href=\"https://www.tempo.co/tag/pon-papua\">Papua</a> akan diselenggarakan di Kabupaten Mimika, Kabupaten Merauke, Kabupaten Jayapura, dan Kota Jayapura. Total beban puncak di tiga kabupaten dan satu kota penyelenggara sebesar 126 MW dengan daya mampu pembangkit 204 MW. Jumlah itu masih menyisakan cadangan daya 78 MW.</p><p>Farid mengatakan PLN juga tengah merampungkan pekerjaan yang telah mencapai 95 persen. Pekerjaan kelistrikan ditargetkan rampung pada Agustus.</p><p>PLN juga menyiapkan peralatan pendukung untuk memastikan suplai listrik tetap aman apabila terjadi gangguan pada sistem utama. Peralatan yang disiapkan adalah unit gardu bergerak (UGB), unit kabel bergerak (UKB), unit kabel dan kubikel bergerak (UKKB), UPS mobile, serta mobile genset.</p><p>Untuk mengantisipasi gangguan, PLN menyiapkan 564 petugas lapangan. Para personel bakal berjaga mulai 19 September hingga 17 Oktober 2021.</p><p>FRANCISCA CHRISTY ROSANA</p>', '2021-06-17 17:00:00', 'Post', '2021-06-21 06:58:02', '2021-06-22 06:02:44'),
(7, 6, 'Tarif.jpg', 'Informasi Terbaru Tentang Tarif PLN 2021 ', 'informasi-terbaru-tentang-tarif-pln-2021', '<p>.............</p>', '2021-07-03 17:00:00', 'Post', '2021-07-02 16:33:59', '2021-07-04 12:18:33'),
(13, 6, 'download1.png', 'percobaan', 'percobaan', '<p>tetsing</p>', '2021-07-09 17:00:00', 'Draft', '2021-07-04 13:54:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `gambar`, `caption`, `created_at`, `updated_at`) VALUES
(1, '3d01f0da32fe6c6ad026885a58561364.PNG', 'Pelayanan masyarakat secara langsung pada kantor PT. PLN Area Kepanjen', '2021-06-08 06:09:45', '2021-06-22 07:58:01'),
(2, '31d1f79e91d1fa2b8bf7fb788ca3b4ac.jpeg', 'aktivitas karyawan di kantor', '2021-06-21 02:36:48', '0000-00-00 00:00:00'),
(3, '516dddec83381dea95165b188f94ce66.jpeg', 'pengecekan barang logistik', '2021-06-21 02:37:07', '0000-00-00 00:00:00'),
(4, 'a145ed74de5ac454ca4a96be50e87d80.jpeg', 'aktivitas karyawan ', '2021-06-21 02:37:28', '0000-00-00 00:00:00'),
(5, 'c1c469a11dc85f396f1e94ae2e454457.jpeg', 'pengecekan listrik di wilayah ngadilangkung kepanjen', '2021-06-21 02:38:00', '2021-06-22 07:57:46'),
(6, '2037c1620f9ae8485cc20e8805e82b4e.jpeg', 'pengecekan listrik di wilayah ngadilangkung kepanjen', '2021-06-21 02:38:14', '2021-06-22 07:57:37'),
(7, '89e196d6997703e5e8e342d9e18bcdda.jpg', 'perkembangan listrik', '2021-06-22 10:00:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_berita`
--

INSERT INTO `kategori_berita` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'PEMADAMAN', '2021-06-08 06:10:41', '0000-00-00 00:00:00'),
(2, 'PEMBANGUNAN', '2021-06-21 06:55:05', '0000-00-00 00:00:00'),
(6, 'TARIF PLN 2021', '2021-07-02 16:31:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `keluhan_pelanggan` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `bukti_keluhan` varchar(255) NOT NULL,
  `nama_approval` varchar(50) NOT NULL,
  `tanggal_approval` date NOT NULL DEFAULT '0000-00-00',
  `bukti_approval` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id`, `id_pelanggan`, `tanggal`, `keluhan_pelanggan`, `status`, `bukti_keluhan`, `nama_approval`, `tanggal_approval`, `bukti_approval`, `created_at`, `updated_at`) VALUES
(12, 10, '2021-06-21 17:00:00', 'TEST PENGADUAN', 'SELESAI', '4cc6d028cf26f738d6136926e44d061a.jpg', 'BAMBANG SUSANTO', '2021-06-27', '9ce7cbec0bea1a5576418ad098901d7f.jpg', '2021-06-22 07:01:33', '2021-06-15 16:19:29'),
(15, 17, '2021-06-14 17:00:00', 'listrik padam daerah rumah sakit wafa ', 'DITOLAK', '52185ff12f64e94a722bf4a115bb12f1.jpg', 'yulia', '2021-06-02', '4a1b83d5fcdb20e2a541a18cc62f8a0e.jpg', '2021-06-02 06:02:50', '2021-07-03 01:45:43'),
(17, 11, '2021-07-03 17:00:00', 'listrik padam', 'PENDING', '10e847050eb6ddb1be5b664223a072b2.jpeg', '-', '0000-00-00', '-', '2021-07-04 15:23:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `kritik_saran` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kritik_saran`
--

INSERT INTO `kritik_saran` (`id`, `id_pelanggan`, `nama`, `tanggal`, `kritik_saran`, `created_at`, `updated_at`, `Status`) VALUES
(8, 0, 'RIo', '2021-06-23 17:00:00', 'fsdgsg', '2021-06-24 01:36:53', '0000-00-00 00:00:00', 0),
(14, 0, 'dellas', '2021-06-26 17:00:00', 'isi form', '2021-06-27 13:04:29', '0000-00-00 00:00:00', 0),
(15, 0, 'Fridha Rahmania Novenda', '2021-06-26 17:00:00', 'iso form', '2021-06-27 16:46:14', '0000-00-00 00:00:00', 0),
(16, 0, 'Fridha Rahmania Novenda', '2021-06-26 17:00:00', 'iso form', '2021-06-27 16:46:15', '0000-00-00 00:00:00', 0),
(17, 0, 'Sarah', '2021-07-01 17:00:00', 'Semoga pelayanan semakin ramah dan cepat', '2021-07-02 16:18:26', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `no_telepon`, `email`, `password`, `created_at`, `updated_at`) VALUES
(0, 'Pelanggan', '143255', '-', '7f78f06d2d1262a0a222ca9834b15d9d', '2021-06-07 01:15:36', '2021-06-07 01:16:00'),
(5, 'yulia sofi', '083847259030', 'yuliasofi92@gmail.com', '7a6d3fd326167ba2e28088cd6a4be628', '2021-06-21 08:55:48', '0000-00-00 00:00:00'),
(6, 'Adi bagus', '081249280955', 'adiebagus174@gmail.com', 'c910da658012efc1db7961c5500bd003', '2021-06-21 09:01:03', '0000-00-00 00:00:00'),
(9, 'ilhamm', '089653076369', 'frpbypazz0@gmail.com', '8592d446752cf9053c0e0e9a7c1d2af1', '2021-06-22 06:45:45', '0000-00-00 00:00:00'),
(10, 'firdha rahmania', '083552567677', 'firdhanovenda@gmail.com', '04cd664f96d7c6ea2007208c5a0d6b90', '2021-06-22 06:46:29', '0000-00-00 00:00:00'),
(11, 'firdharahmania', '0895809659060', 'firdharahma@gmail.com', '04cd664f96d7c6ea2007208c5a0d6b90', '2021-06-22 09:52:53', '0000-00-00 00:00:00'),
(13, 'faras', '085155219874', 'faras@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2021-06-27 12:54:35', '0000-00-00 00:00:00'),
(16, 'Dudi', '08123456789', 'princealtair2727@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', '2021-06-28 02:08:40', '2021-06-28 02:41:32'),
(17, 'erfan', '081553271964', 'erfanr@polinema.ac.id', '8cc946123dcf3c00c15de91c11db056f', '2021-07-02 05:59:26', '0000-00-00 00:00:00'),
(18, 'irena', '089898978977', 'irenaputri2000@gmail.com', '1abb529a548a787b90ee9e1d23ac5094', '2021-07-04 15:57:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `site_about`
--

CREATE TABLE `site_about` (
  `id` int(11) NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `about_desc` text NOT NULL,
  `about_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_about`
--

INSERT INTO `site_about` (`id`, `about_title`, `about_desc`, `about_image`, `created_at`, `updated_at`) VALUES
(1, 'PT. PLN Area Kepanjen ', '<p>PT. PLN area Kepanjen merupakan salah satu badan usaha yang bergerak dalam bidang kelistrikan.yang terletak di Jl. Panji No.1, Cokoleo, Kec. Kepanjen, Malang, Jawa Timur dengan jumlah pelanggan mencapai 108.438 dengan daya kebutuhan listrik di PT. PLN Area Kepanjen 23000 VA. PT. PLN mempunyai visi yaitu menjadi perusahaan listrik terkemuka se-Asia Tenggara dan #1 pilihan pelanggan untuk solusi energy serta mempunyai misi yaitu menjalankan bisnis kelistrikan dan bidang lain yang terkait, berorientasi kepada kepuasan pelangan, anggota perusahaan dan pemegang saham, Menjadikan tenaga listrik sebagai media untuk meningkatkan kualitas kehidupan masyarakat, Mengupayakan agar tenaga listrik menjadi pendorong kegiatan ekonomi, menjalankan kegiatan usaha yang berwawasan lingkungan.</p>', 'd9d8f4a7294079b813a794b6382e14b2.jpg', '2021-06-07 08:14:18', '2021-06-22 10:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `site_service`
--

CREATE TABLE `site_service` (
  `id` int(11) NOT NULL,
  `service_image` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_service`
--

INSERT INTO `site_service` (`id`, `service_image`, `title`, `caption`, `created_at`, `updated_at`) VALUES
(1, 'b1812cd5c5f5e8707409b2f062c01dec.JPG', 'Ubah Daya', 'Mohon maaf untuk layanan ini dapat langsung menghubungi PT. PLN pusat atau datang langsung ke Kantor PT. PLN area Kepanjen.', '2021-06-07 09:25:16', '2021-06-21 06:48:47'),
(2, '9f1bcd3e423e3cde32910d84c8f1a24f.JPG', 'Sambung Sementara', 'Mohon maaf untuk layanan ini dapat langsung menghubungi PT. PLN pusat atau datang langsung ke Kantor PT. PLN area Kepanjen.', '2021-06-07 09:29:56', '2021-06-21 06:48:39'),
(3, 'ac36c3461baca7f7cf37215cac7a93ad.JPG', 'Pemasangan Baru', 'Mohon maaf untuk layanan ini dapat langsung menghubungi PT. PLN pusat atau datang langsung ke Kantor PT. PLN area Kepanjen.', '2021-06-07 09:30:14', '2021-06-21 06:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `token_pelanggan`
--

CREATE TABLE `token_pelanggan` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token_pelanggan`
--

INSERT INTO `token_pelanggan` (`id`, `email`, `token`, `created_at`) VALUES
(5, 'yuliasofi92@gmail.com', 'WRt6ANcmNUNK8o+CtLvz+KYvmDfinrlhT4oYVRzWVZQ=', '2021-06-21 12:57:01'),
(10, 'yuliasofi92@gmail.com', 'q0OGsqVla0fdqmk/hf3stFjHW8jBy+sycSytSn8z/hM=', '2021-06-28 07:19:00'),
(11, 'irenaputri2000@gmail.com', 'a+qrnJ2ixPMvTT8YTxVckEFGAPmP+MvaE05Syxrl0Gg=', '2021-07-04 15:58:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_about`
--
ALTER TABLE `site_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_service`
--
ALTER TABLE `site_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token_pelanggan`
--
ALTER TABLE `token_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `site_about`
--
ALTER TABLE `site_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_service`
--
ALTER TABLE `site_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `token_pelanggan`
--
ALTER TABLE `token_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_berita` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD CONSTRAINT `keluhan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD CONSTRAINT `kritik_saran_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
