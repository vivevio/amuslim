-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 07 Jul 2015 pada 17.56
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `amuslim`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ayat`
--

CREATE TABLE IF NOT EXISTS `tb_ayat` (
`ayat_id` int(3) NOT NULL,
  `nama_ayat` varchar(80) NOT NULL,
  `nomor_surah` int(3) NOT NULL,
  `info` longtext NOT NULL,
  `sumber_info` varchar(140) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ayat`
--

INSERT INTO `tb_ayat` (`ayat_id`, `nama_ayat`, `nomor_surah`, `info`, `sumber_info`) VALUES
(1, 'Al-Fatihah', 1, '<p>Rapidiously engineer open-source supply chains with next-generation e-tailers. Assertively embrace state of the art technology through emerging models. Monotonectally extend interactive growth strategies.<br></p>', 'http://loremipsum.com'),
(2, 'Al-Asr', 103, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ayat_audio`
--

CREATE TABLE IF NOT EXISTS `tb_ayat_audio` (
`ayat_audio_id` int(6) NOT NULL,
  `ayat_id` int(3) NOT NULL,
  `murottal_id` int(3) NOT NULL,
  `url_audio` varchar(300) NOT NULL,
  `views` int(6) NOT NULL,
  `date_added` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ayat_audio`
--

INSERT INTO `tb_ayat_audio` (`ayat_audio_id`, `ayat_id`, `murottal_id`, `url_audio`, `views`, `date_added`) VALUES
(4, 2, 1, 'public/audio/04c1017330f998cab934c5d0ba3f33cd.mp3', 0, '1436280077');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_groups`
--

CREATE TABLE IF NOT EXISTS `tb_groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_groups`
--

INSERT INTO `tb_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'contributor', 'Contributor'),
(3, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login_attempts`
--

CREATE TABLE IF NOT EXISTS `tb_login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_murottal`
--

CREATE TABLE IF NOT EXISTS `tb_murottal` (
`murottal_id` int(3) NOT NULL,
  `nama_murottal` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_murottal`
--

INSERT INTO `tb_murottal` (`murottal_id`, `nama_murottal`) VALUES
(1, 'Rashid al-`Afasy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surah_hafalan`
--

CREATE TABLE IF NOT EXISTS `tb_surah_hafalan` (
`surah_hafalan_id` int(9) NOT NULL,
  `ayat_id` int(3) NOT NULL,
  `murottal_id` int(3) NOT NULL,
  `url_audio` varchar(250) NOT NULL,
  `date_added` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_surah_hafalan`
--

INSERT INTO `tb_surah_hafalan` (`surah_hafalan_id`, `ayat_id`, `murottal_id`, `url_audio`, `date_added`) VALUES
(1, 2, 1, 'public/audio/07868b4d71db8336248524e766c63b64.mp3', '1436281391');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'masvio', '$2y$08$VyuPELBdfzFnvrpbKZPh2uahBo1SEdIWi/cjcGyiTOwqgLGjNVMZi', '', 'vive.permana@gmail.com', '', NULL, NULL, 'uSTwxIdB9/vH0MqxIomaYe', 1268889823, 1436279803, 1, 'Vive Vio', 'Permana', 'ADMIN', '0'),
(7, '::1', 'Jokis', '$2y$08$xsNqOaLLez5qXj.oCdHmDepjGBHnH58B0OvnXmiDjdngcyw8sC44K', NULL, 'ayam.goreng@gmail.com', NULL, NULL, NULL, NULL, 1435990912, NULL, 1, 'Joko', 'Ayesti', NULL, NULL),
(8, '::1', 'sadris', '$2y$08$UerluqUQ3EF6N07cIi6QoOqFZP6IhbD0qxAMcK.djtDCbB1mAriSm', NULL, 'sadri@gmail.com', NULL, NULL, NULL, NULL, 1435991041, NULL, 1, 'sadri', 'ashari', NULL, NULL),
(9, '::1', 'yosi', '$2y$08$WsHfpj/ixuXx552OWyZ1vOJ3TtICUwo4n.RgFFjHeqvbct6OQw4pG', NULL, 'yosi@gmail.com', NULL, NULL, NULL, NULL, 1436010770, 1436010791, 1, 'Yosi', 'Kurniawan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users_groups`
--

CREATE TABLE IF NOT EXISTS `tb_users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_users_groups`
--

INSERT INTO `tb_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(3, 7, 2),
(4, 8, 2),
(5, 9, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ayat`
--
ALTER TABLE `tb_ayat`
 ADD PRIMARY KEY (`ayat_id`);

--
-- Indexes for table `tb_ayat_audio`
--
ALTER TABLE `tb_ayat_audio`
 ADD PRIMARY KEY (`ayat_audio_id`);

--
-- Indexes for table `tb_groups`
--
ALTER TABLE `tb_groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_login_attempts`
--
ALTER TABLE `tb_login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_murottal`
--
ALTER TABLE `tb_murottal`
 ADD PRIMARY KEY (`murottal_id`);

--
-- Indexes for table `tb_surah_hafalan`
--
ALTER TABLE `tb_surah_hafalan`
 ADD PRIMARY KEY (`surah_hafalan_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users_groups`
--
ALTER TABLE `tb_users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ayat`
--
ALTER TABLE `tb_ayat`
MODIFY `ayat_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_ayat_audio`
--
ALTER TABLE `tb_ayat_audio`
MODIFY `ayat_audio_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_groups`
--
ALTER TABLE `tb_groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_login_attempts`
--
ALTER TABLE `tb_login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_murottal`
--
ALTER TABLE `tb_murottal`
MODIFY `murottal_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_surah_hafalan`
--
ALTER TABLE `tb_surah_hafalan`
MODIFY `surah_hafalan_id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_users_groups`
--
ALTER TABLE `tb_users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_users_groups`
--
ALTER TABLE `tb_users_groups`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `tb_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
