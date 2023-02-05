-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Aug 08, 2020 at 02:33 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_yppi`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int NOT NULL,
  `tanggal_artikel` date NOT NULL,
  `foto_artikel` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `judul_artikel` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `judul_slug_artikel` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `isi_artikel` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_kategori_artikel` int NOT NULL,
  `counter` int NOT NULL,
  `id_users` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `tanggal_artikel`, `foto_artikel`, `judul_artikel`, `judul_slug_artikel`, `isi_artikel`, `id_kategori_artikel`, `counter`, `id_users`, `created_at`, `updated_at`) VALUES
(15, '2020-08-08', 'artikel_5f2e17abbd842.jpg', 'Oke gan', 'oke-gan', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>OKE GAN</p>\r\n</body>\r\n</html>', 1, 1, 1, '2020-08-08 03:10:35', '2020-08-08 14:12:03'),
(16, '2020-08-08', 'artikel_5f2ead7cc2b87.jpg', 'SIP LAH', 'sip-lah', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>SIP LAH</p>\r\n</body>\r\n</html>', 1, 0, 1, '2020-08-08 13:49:48', '2020-08-08 13:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `info_footer`
--

CREATE TABLE `info_footer` (
  `id_info_footer` int NOT NULL,
  `kelas_icon` varchar(50) NOT NULL,
  `judul_info` varchar(100) NOT NULL,
  `link_info` text NOT NULL,
  `gambar_info` text,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_footer`
--

INSERT INTO `info_footer` (`id_info_footer`, `kelas_icon`, `judul_info`, `link_info`, `gambar_info`, `keterangan`) VALUES
(1, '-', 'Telp : (0541) 08xxxx', '-', NULL, 'alamat'),
(3, '-', 'SNMPTN', 'https://snmptn.ac.id', NULL, 'tautan'),
(4, '-', 'facebook', 'https://facebook.com', NULL, 'sosmed');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `id_kategori_artikel` int NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `slug_kategori` varchar(50) NOT NULL,
  `counter` int NOT NULL DEFAULT '0',
  `status_delete` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id_kategori_artikel`, `nama_kategori`, `slug_kategori`, `counter`, `status_delete`) VALUES
(1, 'Berita', 'berita', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int NOT NULL,
  `judul_profil` varchar(70) NOT NULL,
  `konten` longtext NOT NULL,
  `menu` varchar(50) NOT NULL,
  `halaman` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `judul_profil`, `konten`, `menu`, `halaman`, `created_at`, `updated_at`) VALUES
(1, 'Sejarah', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div class=\"about-text\" style=\"padding-right: 90.7969px; padding-left: 90.7969px; color: #212529; font-family: Barlow, sans-serif;\">\r\n<p style=\"margin-top: 0px; margin-bottom: 1rem; color: #595959; font-size: 16px; line-height: 2;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur quod, soluta animi, totam maxime pariatur tempora nihil libero eveniet ea aut minima obcaecati amet nam temporibus. Dolorum iusto fugiat quos.</p>\r\n</div>\r\n<div class=\"about-text\" style=\"padding-right: 90.7969px; padding-left: 90.7969px; color: #212529; font-family: Barlow, sans-serif;\">\r\n<h4 style=\"margin-top: 0px; margin-bottom: 0.5rem; font-family: inherit; line-height: 1.3; color: #191919; font-size: 1.5rem;\">Perkembangan</h4>\r\n<div class=\"row justify-content-md-center\" style=\"margin-right: -15px; margin-left: -15px; display: flex; flex-wrap: wrap; justify-content: center !important;\">\r\n<div class=\"col-12 col-md-4\" style=\"padding-right: 15px; padding-left: 15px; position: relative; width: 252.125px; min-height: 1px; flex: 0 0 33.3333%; max-width: 33.3333%;\">\r\n<p style=\"margin-top: 0px; margin-bottom: 1rem; color: #595959; font-size: 16px; line-height: 2; text-align: center;\">DULU</p>\r\n<img style=\"margin-bottom: 30px; vertical-align: middle; border-style: none; height: auto; max-width: 100%;\" src=\"../../../assets/img/img-support/dulu.jpeg\" alt=\"\" /></div>\r\n<div class=\"col-12 col-md-4\" style=\"padding-right: 15px; padding-left: 15px; position: relative; width: 252.125px; min-height: 1px; flex: 0 0 33.3333%; max-width: 33.3333%;\">\r\n<p style=\"margin-top: 0px; margin-bottom: 1rem; color: #595959; font-size: 16px; line-height: 2; text-align: center;\">SEKARANG</p>\r\n<img style=\"margin-bottom: 30px; vertical-align: middle; border-style: none; height: auto; max-width: 100%;\" src=\"../../../assets/img/img-support/dulu.jpeg\" alt=\"\" /></div>\r\n</div>\r\n</div>\r\n</body>\r\n</html>', 'tentang-kami', 'sejarah', '2018-07-06 19:47:55', '2020-08-07 16:14:44'),
(2, 'Visi Misi', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div class=\"section-heading text-center\" style=\"margin-bottom: 50px; position: relative; z-index: 1; color: #212529; font-family: Barlow, sans-serif; text-align: center !important;\">\r\n<h2 style=\"margin-top: 0px; margin-bottom: 0px; font-family: inherit; line-height: 1.3; color: #191919; font-size: 36px;\">VISI MISI</h2>\r\n</div>\r\n<div class=\"about-text\" style=\"padding-right: 90.7969px; padding-left: 90.7969px; color: #212529; font-family: Barlow, sans-serif;\">\r\n<h4 style=\"margin-top: 0px; margin-bottom: 0.5rem; font-family: inherit; line-height: 1.3; color: #191919; font-size: 1.5rem;\">Visi</h4>\r\n<p style=\"margin-top: 0px; margin-bottom: 1rem; color: #595959; font-size: 16px; line-height: 2;\">Terwujudnya insan yang beriman, bertakwa unggul dalam ilmu, santun dalam perilaku, mandiri, berbudaya lokal dan berwawasan global.</p>\r\n</div>\r\n<div class=\"about-text\" style=\"padding-right: 90.7969px; padding-left: 90.7969px; color: #212529; font-family: Barlow, sans-serif;\">\r\n<h4 style=\"margin-top: 0px; margin-bottom: 0.5rem; font-family: inherit; line-height: 1.3; color: #191919; font-size: 1.5rem;\">Misi</h4>\r\n<ul style=\"margin-bottom: 0px; margin-left: 0px; position: relative; z-index: 1;\">\r\n<li style=\"margin-bottom: 15px; margin-left: 0px; list-style: none; font-size: 16px; color: #595959; display: block;\">Membimbing peserta didik menjadi generasi yang faham agama dengan sistem fullday school</li>\r\n<li style=\"margin-bottom: 15px; margin-left: 0px; list-style: none; font-size: 16px; color: #595959; display: block;\">Mencetak generasi qur\'ani dengan program tahfidzul qur\'an</li>\r\n<li style=\"margin-bottom: 15px; margin-left: 0px; list-style: none; font-size: 16px; color: #595959; display: block;\">Menciptakan lingkungan pendidikan yang berakhlakul karimah</li>\r\n<li style=\"margin-bottom: 15px; margin-left: 0px; list-style: none; font-size: 16px; color: #595959; display: block;\">Melaksanakan kurikulum yang terintegrasi dengan pondok pesantren</li>\r\n<li style=\"margin-bottom: 15px; margin-left: 0px; list-style: none; font-size: 16px; color: #595959; display: block;\">Membimbing peserta didik dalam mengenali potensi diri sebagai modal kemandirian</li>\r\n<li style=\"margin-bottom: 15px; margin-left: 0px; list-style: none; font-size: 16px; color: #595959; display: block;\">Menciptakan peserta didik yang memiliki kepedulian lingkungan, berwawasan lingkungan, dan memiliki kearifan lokal</li>\r\n</ul>\r\n</div>\r\n</body>\r\n</html>', 'tentang-kami', 'visi-dan-misi', '2018-07-06 20:05:33', '2020-08-07 16:08:40'),
(4, 'SMP BUDI LUHUR SAMARINDA', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div class=\"section-heading text-center\" style=\"margin-bottom: 50px; position: relative; z-index: 1; color: #212529; font-family: Barlow, sans-serif; text-align: center !important;\">\r\n<p style=\"margin-top: 0px; margin-bottom: 0px; color: #595959; font-size: 18px; line-height: 2;\">Mengenai SMP BUDI LUHUR SAMARINDA</p>\r\n</div>\r\n<p><img style=\"margin-bottom: 30px; margin-left: 180px; vertical-align: middle; border-style: none; height: 500px; max-width: 100%; color: #212529; font-family: Barlow, sans-serif;\" src=\"../../assets/img/smp.png\" alt=\"\" /></p>\r\n<div class=\"about-text\" style=\"padding-right: 90.7969px; padding-left: 90.7969px; color: #212529; font-family: Barlow, sans-serif;\">\r\n<h4 style=\"margin-top: 0px; margin-bottom: 0.5rem; font-family: inherit; line-height: 1.3; color: #191919; font-size: 1.5rem;\">Visi</h4>\r\n<p style=\"margin-top: 0px; margin-bottom: 1rem; color: #595959; font-size: 16px; line-height: 2;\">Terwujudnya insan yang beriman, bertakwa unggul dalam ilmu, santun dalam perilaku, mandiri, berbudaya lokal dan berwawasan global.</p>\r\n</div>\r\n<div class=\"about-text\" style=\"padding-right: 90.7969px; padding-left: 90.7969px; color: #212529; font-family: Barlow, sans-serif;\">\r\n<h4 style=\"margin-top: 0px; margin-bottom: 0.5rem; font-family: inherit; line-height: 1.3; color: #191919; font-size: 1.5rem;\">Misi</h4>\r\n<ul style=\"margin-bottom: 0px; margin-left: 0px; position: relative; z-index: 1;\">\r\n<li style=\"margin-bottom: 15px; margin-left: 0px; list-style: none; font-size: 16px; color: #595959; display: block;\">Membimbing peserta didik menjadi generasi yang faham agama dengan sistem fullday school</li>\r\n<li style=\"margin-bottom: 15px; margin-left: 0px; list-style: none; font-size: 16px; color: #595959; display: block;\">Mencetak generasi qur\'ani dengan program tahfidzul qur\'an</li>\r\n<li style=\"margin-bottom: 15px; margin-left: 0px; list-style: none; font-size: 16px; color: #595959; display: block;\">Menciptakan lingkungan pendidikan yang berakhlakul karimah</li>\r\n<li style=\"margin-bottom: 15px; margin-left: 0px; list-style: none; font-size: 16px; color: #595959; display: block;\">Melaksanakan kurikulum yang terintegrasi dengan pondok pesantren</li>\r\n<li style=\"margin-bottom: 15px; margin-left: 0px; list-style: none; font-size: 16px; color: #595959; display: block;\">Membimbing peserta didik dalam mengenali potensi diri sebagai modal kemandirian</li>\r\n<li style=\"margin-bottom: 15px; margin-left: 0px; list-style: none; font-size: 16px; color: #595959; display: block;\">Menciptakan peserta didik yang memiliki kepedulian lingkungan, berwawasan lingkungan, dan memiliki kearifan lokal</li>\r\n</ul>\r\n</div>\r\n<div class=\"about-text\" style=\"padding-right: 90.7969px; padding-left: 90.7969px; color: #212529; font-family: Barlow, sans-serif;\">\r\n<h4 style=\"margin-top: 0px; margin-bottom: 0.5rem; font-family: inherit; line-height: 1.3; color: #191919; font-size: 1.5rem;\">Ekstrakulikuler</h4>\r\n<div class=\"row justify-content-md-center\" style=\"margin-right: -15px; margin-left: -15px; display: flex; flex-wrap: wrap; justify-content: center !important;\">\r\n<div class=\"col-12 col-md-4\" style=\"padding-right: 15px; padding-left: 15px; position: relative; width: 252.125px; min-height: 1px; flex: 0 0 33.3333%; max-width: 33.3333%;\">\r\n<p style=\"margin-top: 0px; margin-bottom: 1rem; color: #595959; font-size: 16px; line-height: 2; text-align: center;\">PRAMUKA</p>\r\n<img style=\"margin-bottom: 30px; vertical-align: middle; border-style: none; height: auto; max-width: 100%;\" src=\"../../assets/img/img-support/pramuka.jpg\" alt=\"\" /></div>\r\n<div class=\"col-12 col-md-4\" style=\"padding-right: 15px; padding-left: 15px; position: relative; width: 252.125px; min-height: 1px; flex: 0 0 33.3333%; max-width: 33.3333%;\">\r\n<p style=\"margin-top: 0px; margin-bottom: 1rem; color: #595959; font-size: 16px; line-height: 2; text-align: center;\">PMR</p>\r\n<img style=\"margin-bottom: 30px; vertical-align: middle; border-style: none; height: auto; max-width: 100%;\" src=\"../../assets/img/img-support/1.jpg\" alt=\"\" /></div>\r\n<div class=\"col-12 col-md-4\" style=\"padding-right: 15px; padding-left: 15px; position: relative; width: 252.125px; min-height: 1px; flex: 0 0 33.3333%; max-width: 33.3333%;\">\r\n<p style=\"margin-top: 0px; margin-bottom: 1rem; color: #595959; font-size: 16px; line-height: 2; text-align: center;\">PERSINAS ASAD</p>\r\n<img style=\"margin-bottom: 30px; vertical-align: middle; border-style: none; height: auto; max-width: 100%;\" src=\"../../assets/img/img-support/asad.jpg\" alt=\"\" /></div>\r\n<div class=\"col-12 col-md-4\" style=\"padding-right: 15px; padding-left: 15px; position: relative; width: 252.125px; min-height: 1px; flex: 0 0 33.3333%; max-width: 33.3333%;\">\r\n<p style=\"margin-top: 0px; margin-bottom: 1rem; color: #595959; font-size: 16px; line-height: 2; text-align: center;\">FUTSAL</p>\r\n<img style=\"margin-bottom: 30px; vertical-align: middle; border-style: none; height: auto; max-width: 100%;\" src=\"../../assets/img/img-support/2.jpg\" alt=\"\" /></div>\r\n<div class=\"col-12 col-md-4\" style=\"padding-right: 15px; padding-left: 15px; position: relative; width: 252.125px; min-height: 1px; flex: 0 0 33.3333%; max-width: 33.3333%;\">\r\n<p style=\"margin-top: 0px; margin-bottom: 1rem; color: #595959; font-size: 16px; line-height: 2; text-align: center;\">SEPAK BOLA</p>\r\n<img style=\"margin-bottom: 30px; vertical-align: middle; border-style: none; height: auto; max-width: 100%;\" src=\"../../assets/img/img-support/5.jpg\" alt=\"\" /></div>\r\n</div>\r\n</div>\r\n</body>\r\n</html>', 'pendidikan', 'smp-budi-luhur', '2020-08-07 16:18:08', '2020-08-07 16:19:45'),
(5, 'Prestasi Sekolah', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>TEST GAN</p>\r\n</body>\r\n</html>', 'pendidikan', 'prestasi-sekolah', '2020-08-07 16:20:34', '2020-08-07 16:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int NOT NULL,
  `id_artikel` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `id_artikel`) VALUES
(1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int NOT NULL,
  `status_akun` int NOT NULL,
  `status_delete` int NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama`, `username`, `password`, `level`, `status_akun`, `status_delete`, `last_login`, `remember_token`) VALUES
(1, 'Administrator', 'admin', '$2y$10$TI/J0uFAlVQ20osZhjjasuvYR0n3jQSDUqJbV8sSJobAdkJ.a0dmm', 1, 1, 0, '2020-08-08 13:49:13', 'Vx8zOaWML6YpLaBtob1EiNIxrEPGgj2Zrp1rkEeaIwRGTjg0OZn1HzFIyzjP'),
(2, 'Petugas', 'petugas', '$2y$10$oIJ8zIiFLJ.0MXWIcBc8X.DAGeQ1oehGMfICdh7OXf5tMmKO2Tt7.', 0, 1, 0, '2018-07-09 07:10:33', 'W15DK8Hf7Ws6Y5Q0BkBqkYS79gR73L0EQeiCtsLwPADlGUzZq7uVB61ItuQj'),
(3, 'Mamat', 'mamat', '$2y$10$3UpdzxiUNt5V5SSIgdJr9OmEYWFzwX/Ja/4kArFlDZpBT8nZ8W5Ju', 0, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id_visitor` int NOT NULL,
  `id_artikel` int NOT NULL,
  `ip_address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id_visitor`, `id_artikel`, `ip_address`, `created_at`, `updated_at`) VALUES
(10, 15, '172.19.0.1', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_users` (`id_users`),
  ADD KEY `id_kategori_artikel` (`id_kategori_artikel`);

--
-- Indexes for table `info_footer`
--
ALTER TABLE `info_footer`
  ADD PRIMARY KEY (`id_info_footer`);

--
-- Indexes for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id_kategori_artikel`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id_visitor`),
  ADD KEY `id_konten` (`id_artikel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `info_footer`
--
ALTER TABLE `info_footer`
  MODIFY `id_info_footer` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  MODIFY `id_kategori_artikel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id_visitor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON UPDATE CASCADE,
  ADD CONSTRAINT `artikel_ibfk_2` FOREIGN KEY (`id_kategori_artikel`) REFERENCES `kategori_artikel` (`id_kategori_artikel`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `slider`
--
ALTER TABLE `slider`
  ADD CONSTRAINT `slider_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visitor`
--
ALTER TABLE `visitor`
  ADD CONSTRAINT `visitor_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
