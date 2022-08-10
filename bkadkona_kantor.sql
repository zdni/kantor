-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 09 Agu 2022 pada 22.25
-- Versi Server: 5.7.39-0ubuntu0.18.04.2
-- PHP Version: 7.2.34-33+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkadkona_kantor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `file` text NOT NULL,
  `thumbnail` text NOT NULL,
  `create_by` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `create_date` date NOT NULL,
  `slug` text NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'article'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `file`, `thumbnail`, `create_by`, `post_date`, `create_date`, `slug`, `type`) VALUES
(15, '10 OPD Pemda Konut Dapat Penghargaan BKAD', 'BKAD Konut', '10_opd_pemda_konut_dapat_penghargaan_bkad.html', '10_opd_pemda_konut_dapat_penghargaan_bkad.jpg', 1, '2022-08-05', '2022-08-05', '10_opd_pemda_konut_dapat_penghargaan_bkad', 'article'),
(16, 'Kunjungan Pegawai BKAD Kota Samarinda', 'BKAD Konut', 'kunjungan_pegawai_bkad_kota_samarinda.html', 'kunjungan_pegawai_bkad_kota_samarinda.jpg', 1, '2022-08-05', '2022-08-05', 'kunjungan_pegawai_bkad_kota_samarinda', 'article'),
(17, 'Pencetakan kartu ujian peserta', 'BKAD Konut', 'pencetakan_kartu_ujian_peserta.html', 'pencetakan_kartu_ujian_peserta.jpg', 1, '2022-08-05', '2022-08-05', 'pencetakan_kartu_ujian_peserta', 'article'),
(18, 'PENATAUSAHAAN', 'Bendahara Pengeluaran', 'penatausahaan.html', 'penatausahaan.jpg', 1, '2022-08-06', '2022-08-05', 'penatausahaan', 'announcement'),
(19, 'PELAPORAN DAN PERTANGGUNGJAWABAN', 'Data Ringkasan', 'pelaporan_dan_pertanggungjawaban.html', 'pelaporan_dan_pertanggungjawaban.jpg', 1, '2022-08-06', '2022-08-06', 'pelaporan_dan_pertanggungjawaban', 'announcement'),
(20, '  PENGELOLAAN BMD', 'Data Neraca Aset  dan Data Penghapusan Aset Tetap melalui penjualan Kendaraan Dinas', '__pengelolaan_bmd.html', '__pengelolaan_bmd.jpg', 1, '2022-08-06', '2022-08-06', '__pengelolaan_bmd', 'announcement'),
(21, 'PENGANGGARAN', 'Data Perda Ringkasan APBD Murni dan APBD Perubahan', 'penganggaran.html', 'penganggaran.jpg', 1, '2022-08-06', '2022-08-06', 'penganggaran', 'announcement');

-- --------------------------------------------------------

--
-- Struktur dari tabel `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `file` text NOT NULL,
  `download_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `header` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `downloads`
--

INSERT INTO `downloads` (`id`, `menu`, `header`) VALUES
(5, 'Peraturan Pemerintah', 'PERATURAN PEMERINTAH'),
(6, 'Peraturan Menteri', 'PERATURAN MENTERI'),
(8, 'Peraturan Daerah', 'PERATURAN DAERAH'),
(11, 'Peraturan Bupati', 'PERATURAN BUPATI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `total` int(11) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `description`, `image`, `total`, `state`) VALUES
(1, 'Lobby', 'Lobby Poltekkes', 'lobby.jpeg', 1, 'Terawat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `image` text NOT NULL,
  `create_data` date NOT NULL,
  `post_date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `slug`, `image`, `create_data`, `post_date`, `description`) VALUES
(2, 'Survey SSH', '', 'hspk11.jpeg', '2022-08-05', '2022-08-05', 'Kegiatan survey SSH di toko kabupaten konawe utara'),
(3, 'Survey SSH', 'survey_ssh', 'survey_ssh.jpeg', '2022-08-05', '2022-08-05', 'Survey lapangan terkait SSH di toko kabupaten konawe utara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `heros`
--

CREATE TABLE `heros` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `heros`
--

INSERT INTO `heros` (`id`, `image`) VALUES
(2, 'bkad3.jpg'),
(4, 'screenshotfrom2022-07-3022-16-54.png'),
(5, 'bkad2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `rating`, `message`, `date`) VALUES
(3, 'Sangat Baik', 'mangapa tidak ada informasi', '2022-08-03'),
(4, 'Baik', 'oke', '2022-08-08'),
(5, 'Kurang Menarik', 'tes', '2022-08-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `moduls`
--

CREATE TABLE `moduls` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `is_show` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `moduls`
--

INSERT INTO `moduls` (`id`, `title`, `file`, `is_show`) VALUES
(1, 'Sample VUE JS', 'sample_vue_js.pdf', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `file` text NOT NULL,
  `sequence` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `title`, `slug`, `file`, `sequence`) VALUES
(1, 'Visi dan Misi', 'visi_dan_misi', 'visi_dan_misi.html', 2),
(2, 'Profil BKAD', 'latar_belakang', 'latar_belakang.html', 1),
(3, 'Struktur Organisasi ', 'profil_bkad', 'profil_bkad.html', 3),
(4, 'Tugas dan Fungsi', 'tugas_dan_fungsi', 'tugas_dan_fungsi.html', 4),
(5, 'Renstra', 'renstra', 'renstra.html', 5),
(6, 'Lakip', 'lakip', 'lakip.html', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `questionnaires`
--

CREATE TABLE `questionnaires` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `link` text NOT NULL,
  `is_show` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'uadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sectors`
--

CREATE TABLE `sectors` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sectors`
--

INSERT INTO `sectors` (`id`, `name`, `slug`, `file`) VALUES
(1, 'Sekretariat', 'sekretariat', 'sekretariat.html'),
(3, 'Bidang Perbendaharaan', 'bidang_perbendaharaan', ''),
(4, 'Bidang Anggaran', 'bidang_anggaran', ''),
(5, 'Bidang Akuntansi', 'bidang_akuntansi', ''),
(6, 'Bidang Aset Daerah', 'bidang_aset_daerah', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `laboratory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `image`, `role_id`, `laboratory_id`) VALUES
(1, 'admin', 'Administrator', '$2y$10$uGSBRKsWu2Xv0.xCmtNxPe52W2f10pLAqdlyK4o4WVbshywCmvaOe', 'admin.jpg', 1, 1),
(2, 'admin_kebidanan', 'Admin Kebidanan', '$2y$10$Ofun0dAJQN5jeHhvWbtq.eiprlXkxeFmZF6B.rH7bkqfZWUJAGan2', 'user.png', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `link` text NOT NULL,
  `is_show` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `videos`
--

INSERT INTO `videos` (`id`, `title`, `link`, `is_show`) VALUES
(4, 'BPKAD Provinsi Sulawesi Tengah', 'https://www.youtube.com/watch?v=5LKvj-qGpdo', 1),
(5, 'Pelayanan Publik pada Badan Keuangan dan Aset Daerah BKAD Provinsi Kalimantan Barat', 'https://www.youtube.com/watch?v=DXVdEZiaTY8', 1),
(6, 'BPKAD Kabupaten Bone', 'https://www.youtube.com/watch?v=u6UHxfA-TGc', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `create_by` (`create_by`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `download_id` (`download_id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heros`
--
ALTER TABLE `heros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moduls`
--
ALTER TABLE `moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `laboratory_id` (`laboratory_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `heros`
--
ALTER TABLE `heros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `moduls`
--
ALTER TABLE `moduls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`download_id`) REFERENCES `downloads` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
