-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2021 at 02:58 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gondol`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(1) NOT NULL,
  `nm_agama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `nm_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen Katolik'),
(3, 'Kristen Protestan'),
(4, 'Hindu'),
(5, 'Budha'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `halamanstatis`
--

CREATE TABLE `halamanstatis` (
  `id_halaman` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `judul_seo` varchar(200) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `judul_seo`, `isi_halaman`, `tgl_posting`) VALUES
(1, 'Beranda Pendaftaran Mahasiswa Magang Tahun 2021', 'beranda-pendaftaran-mahasiswa-magang-tahun-2021', '<p><strong><img alt=\"\" src=\"https://www.google.com/url?sa=i&amp;url=https%3A%2F%2Fwww.facebook.com%2FRISETGONDOL%2F&amp;psig=AOvVaw2hFnIHvLJoG6vp7HFV0slJ&amp;ust=1632880991488000&amp;source=images&amp;cd=vfe&amp;ved=0CAsQjRxqFwoTCPDO_u_JoPMCFQAAAAAdAAAAABAD\" />Selamat Datang di Halaman Penerimaan Peserta Mahasiswa Magang | BBRBLPP GONDOL.</strong></p>\r\n\r\n<p>Dengan Halaman ini mahasiswa akan dimudahkan dalam pendaftaran dengan pengisian Formulir Pendaftaran Secara Online melalui Halaman ISI FORMULIR.</p>\r\n\r\n<p>Dengan mengisi formulir pendaftaran secara online mahasiswa akan sangat dimudahkan untuk efektifitas penggunaan waktu dan biaya jika ada mahasiswa yang berasal dari luar daerah.</p>\r\n\r\n<p>Singaraja, 25 September 2021</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Panitia Penerima Mahasiswa&nbsp;</p>\r\n', '2010-05-31'),
(2, 'Petunjuk / Prosedur Pendaftaran Peserta Magang', 'petunjuk--prosedur-pendaftaran-peserta-magang', '<ol>\r\n	<li>Untuk membuka system pendaftaran ini direkomendasikan menggunakan:\r\n	<ul>\r\n		<li>Google Chrome terbaru, Jika tidak punya silahkan Klik <a href=\"http://filehippo.com/download_google_chrome/\" target=\"_blank\">disini </a>untuk mendownload</li>\r\n		<li>Mozila Firefox terbaru, jika tidak punya silahkan Klik <a href=\"http://filehippo.com/download_firefox/\" target=\"_blank\">disini </a>untuk mendownload</li>\r\n	</ul>\r\n	</li>\r\n	<li>Jika menggunakan smartphone apabila tidak ada Google Chrome bisa menggunakan browser bawaan smartphone tersebut.</li>\r\n	<li>Setelah Pendaftaran Sukses silakan mahasiswa Download Formulir yang telah di isi berupa file pdf dan silakan print out atau simpan saja Softcopynya di Flashdisk.</li>\r\n	<li>Jika anda sukses mendaftar silahkan menunggu minimal 2x24Jam, karena pendaftaran perlu dipertimbangkan oleh penitia penerima peserta magang.</li>\r\n	<li>Silahkan mahasiswa sering mengecek pada website di halaman <strong>Pengumuman</strong>&nbsp;untuk penerimaan peserta magang.</li>\r\n</ol>\r\n', '2010-05-31'),
(3, 'Agenda', 'agenda', '<p><strong style=\"font-size:13px\">BELUM ADA AGENDA</strong></p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n', '2010-05-31'),
(5, 'Prosedur Daftar Ulang', 'prosedur-daftar-ulang', '<p>Prosedur Daftar Ulang adalah saat pendaftaran anda di Tolak secara Online oleh Admin PPDB ONLINE 2018/2019 YASHIKA, maka anda di haruskan datang ke Sekretariat Pendaftaran Peserta Didik Baru YASHIKA untuk melakukan pendaftaran secara langsung.</p>\r\n\r\n<p>Cara Kedua anda dapat melakukan konfirmasi penolakan terlebih dahulu ke Call Center atau nomor Contact Panitia PPDB YASHIKA 2018/2019 dengan cara mengirimkan SMS pertanyaan atau juga melakukan Call secara langsung ke nomor Customer Service YASHIKA.</p>\r\n', '2015-11-07'),
(6, 'Persyaratan', 'persyaratan', '<p>-</p>\r\n', '2018-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(2) NOT NULL,
  `nm_pekerjaan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `nm_pekerjaan`) VALUES
(1, 'Tidak Ada Pilihan'),
(2, 'Karyawan Swasta'),
(3, 'Wiraswasta'),
(4, 'PNS'),
(5, 'TNI/Polri'),
(6, 'Perangkat Desa'),
(7, 'Buruh'),
(8, 'Nelayan'),
(10, 'IRT (Ibu Rumah Tangga)'),
(11, 'Tani'),
(12, 'Lain-lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(2) NOT NULL,
  `nm_pendidikan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `nm_pendidikan`) VALUES
(1, 'Tidak Sekolah'),
(2, 'SD/MI'),
(3, 'SMP/MTs'),
(4, 'SMA/SMK/MAN'),
(5, 'Diploma'),
(6, 'Sarjana'),
(7, 'S-2'),
(9, 'S-3'),
(10, 'Tidak Ada Pilihan');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(1) NOT NULL,
  `alamat_website` varchar(100) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `kepsek` varchar(100) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `flag` int(1) NOT NULL,
  `admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `alamat_website`, `nama_sekolah`, `alamat`, `kabupaten`, `tahun_ajaran`, `kepsek`, `logo`, `flag`, `admin`) VALUES
(1, 'http://pendaftaranpesertamagang.unaux.com/', 'BBRBLPP Gondol', 'Jl. Singaraja - Gilimanuk, Banjar Dinas Gondol, Penyabangan, Gerokgak, Kabupaten Buleleng, Bali 81155', 'Buleleng', '2021', '-', 'kkppng2.png', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(1) NOT NULL,
  `pendaftaran` varchar(75) NOT NULL,
  `pengumuman` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `pendaftaran`, `pengumuman`) VALUES
(1, '25/09/2021 12:00 AM - 30/09/2021 11:00 AM', '25/09/2021 12:00 AM - 30/09/2021 11:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `sidebar`
--

CREATE TABLE `sidebar` (
  `id_sidebar` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_sidebar` text NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sidebar`
--

INSERT INTO `sidebar` (`id_sidebar`, `judul`, `isi_sidebar`, `tgl_posting`) VALUES
(7, 'Contact Person', '<p>Jika mengalami kesulitan silahkan hubungi nomor dibawah ini:</p>\r\n\r\n<p><samp><big><strong>0822 4746 9993 (WA/SMS)</strong></big></samp></p>\r\n', '2021-09-28'),
(6, 'SOSIAL MEDIA', '<a class=\"social-media-icon\" href=\"https://www.facebook.com/RISETGONDOL/\"><span class=\"fa fa-facebook\"></span></a>\r\n<a class=\"social-media-icon\" href=\"https://twitter.com/riset_gondol?lang=en\"><span class=\"fa fa-twitter\"></span></a>\r\n<a class=\"social-media-icon\" href=\"https://www.instagram.com/riset.gondol/?hl=en\"><span class=\"fa fa-instagram\"></span></a>\r\n<a class=\"social-media-icon\" href=\"https://www.youtube.com/channel/UCItPTXIcspw7luY958XzwdQ\"><span class=\"fa fa-youtube\"></span></a>', '2021-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nm_siswa` varchar(150) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` int(2) NOT NULL,
  `anak_ke` int(2) NOT NULL,
  `jml_sdr` int(2) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `kodepos` varchar(7) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tmp_tinggal` varchar(25) NOT NULL,
  `nm_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` varchar(150) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `nm_ayah` varchar(100) NOT NULL,
  `tmp_lahir_ayah` varchar(50) NOT NULL,
  `tgl_lahir_ayah` date NOT NULL,
  `alamat_ayah` varchar(100) NOT NULL,
  `pekerjaan_ayah` int(2) NOT NULL,
  `instansi_ayah` varchar(100) NOT NULL,
  `penghasilan_ayah` int(9) NOT NULL,
  `pendidikan_ayah` int(2) NOT NULL,
  `org_ayah` varchar(100) NOT NULL,
  `jbt_ayah` varchar(100) NOT NULL,
  `hp_ayah` varchar(25) NOT NULL,
  `email_ayah` varchar(50) NOT NULL,
  `nm_ibu` varchar(100) NOT NULL,
  `tmp_lahir_ibu` varchar(50) NOT NULL,
  `tgl_lahir_ibu` date NOT NULL,
  `alamat_ibu` varchar(100) NOT NULL,
  `pekerjaan_ibu` int(2) NOT NULL,
  `instansi_ibu` varchar(100) NOT NULL,
  `penghasilan_ibu` int(9) NOT NULL,
  `pendidikan_ibu` int(2) NOT NULL,
  `org_ibu` varchar(50) NOT NULL,
  `jbt_ibu` varchar(50) NOT NULL,
  `hp_ibu` varchar(25) NOT NULL,
  `email_ibu` varchar(50) NOT NULL,
  `nm_wali` varchar(100) NOT NULL,
  `tmp_lahir_wali` varchar(50) NOT NULL,
  `tgl_lahir_wali` date NOT NULL,
  `alamat_wali` varchar(100) NOT NULL,
  `pekerjaan_wali` int(2) NOT NULL,
  `instansi_wali` varchar(50) NOT NULL,
  `penghasilan_wali` int(9) NOT NULL,
  `pendidikan_wali` int(2) NOT NULL,
  `org_wali` varchar(50) NOT NULL,
  `jbt_wali` varchar(50) NOT NULL,
  `hp_wali` varchar(25) NOT NULL,
  `email_wali` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  `ip` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nm_siswa`, `jk`, `tmp_lahir`, `tgl_lahir`, `agama`, `anak_ke`, `jml_sdr`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `kodepos`, `hp`, `email`, `tmp_tinggal`, `nm_sekolah`, `alamat_sekolah`, `nisn`, `nm_ayah`, `tmp_lahir_ayah`, `tgl_lahir_ayah`, `alamat_ayah`, `pekerjaan_ayah`, `instansi_ayah`, `penghasilan_ayah`, `pendidikan_ayah`, `org_ayah`, `jbt_ayah`, `hp_ayah`, `email_ayah`, `nm_ibu`, `tmp_lahir_ibu`, `tgl_lahir_ibu`, `alamat_ibu`, `pekerjaan_ibu`, `instansi_ibu`, `penghasilan_ibu`, `pendidikan_ibu`, `org_ibu`, `jbt_ibu`, `hp_ibu`, `email_ibu`, `nm_wali`, `tmp_lahir_wali`, `tgl_lahir_wali`, `alamat_wali`, `pekerjaan_wali`, `instansi_wali`, `penghasilan_wali`, `pendidikan_wali`, `org_wali`, `jbt_wali`, `hp_wali`, `email_wali`, `status`, `tgl_daftar`, `ip`, `file`) VALUES
(1, 'SANUSI HAMZAH', 'P', 'SUKABUMI', '1999-05-05', 1, 2, 2, 'CIMANGGU', '02', '01', 'CIKEMBANG', 'CARINGIN', 'SUKABUMI', '0', '09572050812', '', 'Orang Tua', 'SMK FAUZIAH', '2-13-02-24-011-012-5', '', 'NANANG', 'SUKABUMI', '1975-05-13', 'CISARUA', 2, '', 800000, 7, '', '', '08572050812', '', 'NUNUNG', 'SUKABUMI', '1987-05-07', 'CIAMPEA', 3, '', 0, 5, '', '', '09560810823', '', '', '', '0000-00-00', '', 1, '', 0, 10, '', '', '', '', 'DAFTAR', '2019-05-12 19:57:10', '115.178.220.82', 'SANUSI HAMZAH-20190512195710.pdf'),
(2, 'SANUSI HAMZAH', 'L', 'SUKABUMI', '1999-05-05', 1, 2, 2, 'CIMANGGU', '02', '01', 'CIKEMBANG', 'CARINGIN', 'SUKABUMI', '0', '09572050812', '', 'Orang Tua', 'SMK FAUZIAH', '2-13-02-24-011-012-5', '', 'NANANG', 'SUKABUMI', '1975-05-13', 'CISARUA', 2, '', 800000, 7, '', '', '08572050812', '', 'NUNUNG', 'SUKABUMI', '1987-05-07', 'CIAMPEA', 3, '', 0, 5, '', '', '09560810823', '', '', '', '0000-00-00', '', 1, '', 0, 10, '', '', '', '', 'DAFTAR', '2019-05-12 20:16:42', '115.178.220.82', 'SANUSI HAMZAH-20190512201642.pdf'),
(3, 'SANUSI HAMZAH', 'L', 'SUKABUMI', '1999-05-05', 1, 2, 2, 'CIMANGGU', '02', '01', 'CIKEMBANG', 'CARINGIN', 'SUKABUMI', '0', '09572050812', '', 'Orang Tua', 'SMK FAUZIAH', '2-13-02-24-011-012-5', '', 'NANANG', 'SUKABUMI', '1975-05-13', 'CISARUA', 2, '', 800000, 7, '', '', '08572050812', '', 'NUNUNG', 'SUKABUMI', '1987-05-07', 'CIAMPEA', 3, '', 0, 5, '', '', '09560810823', '', '', '', '0000-00-00', '', 1, '', 0, 10, '', '', '', '', 'DAFTAR', '2019-05-12 20:53:14', '115.178.220.82', 'SANUSI HAMZAH-20190512205314.pdf'),
(7, 'MAHMUD MA\'ARIF', 'L', 'SUKABUMI', '2002-05-06', 1, 1, 3, 'CIMANGGU', '01', '02', 'CIKEMBANG', 'CIAMPEA', 'SUKAMANAH', '0', '08562050812', '', 'Orang Tua', 'SMPN MAHMUD', '2-13-02-24-011-012-5', '2-13-02-24-011-012-5', 'SAMSUNG', 'SUKABUMI', '1976-05-08', 'CIMANGGU', 2, '', 800000, 5, '', '', '08760986543', '', 'NANI', 'SUKABUMI', '1978-05-14', 'CIAMPUNG', 3, '', 0, 7, '', '', '08562050812', '', '', '', '0000-00-00', '', 1, '', 0, 10, '', '', '', '', 'DAFTAR', '2019-05-13 05:23:11', '115.178.219.41', '2-13-02-24-011-012-5-20190513052311.pdf'),
(8, 'MAHMUD MA\'ARIF', 'L', 'SUKABUMI', '2002-05-06', 1, 1, 3, 'CIMANGGU', '01', '02', 'CIKEMBANG', 'CIAMPEA', 'SUKAMANAH', '0', '08562050812', '', 'Orang Tua', 'SMPN MAHMUD', '2-13-02-24-011-012-5', '2-13-02-24-011-012-5', 'SAMSUNG', 'SUKABUMI', '1976-05-08', 'CIMANGGU', 2, '', 800000, 5, '', '', '08760986543', '', 'NANI', 'SUKABUMI', '1978-05-14', 'CIAMPUNG', 3, '', 0, 7, '', '', '08562050812', '', '', '', '0000-00-00', '', 1, '', 0, 10, '', '', '', '', 'DAFTAR', '2019-05-13 05:26:33', '115.178.219.41', '2-13-02-24-011-012-5-20190513052633.pdf'),
(9, 'SANUSI HAMZAH', 'L', 'SUKABUMI', '1999-05-05', 1, 2, 2, 'CIMANGGU', '02', '01', 'CIKEMBANG', 'CARINGIN', 'SUKABUMI', '0', '09572050812', '', 'Orang Tua', 'SMK FAUZIAH', '2-13-02-24-011-012-5', '', 'NANANG', 'SUKABUMI', '1975-05-13', 'CISARUA', 2, '', 800000, 7, '', '', '08572050812', '', 'NUNUNG', 'SUKABUMI', '1987-05-07', 'CIAMPEA', 3, '', 0, 5, '', '', '09560810823', '', '', '', '0000-00-00', '', 1, '', 0, 10, '', '', '', '', 'DITOLAK', '2019-05-13 05:27:00', '115.178.219.41', '2-13-02-24-011-012-5-20190513052700.pdf'),
(14, 'I PUTU YUDAH ERAWAN', 'L', 'SINGARAJA', '1998-06-15', 4, 1, 2, 'BANJAR DINAS WANSARI', '1', '2', 'SANGGALANGIT', 'GEROKGAK', 'BULELENG', '81155', '082247469993', '', 'Orang Tua', 'UNIVERSITAS PENDIDKAN GANESHA', 'TEKNIK INFORMATIKA', 'MANAJAEMEN INFORMATIKA', 'ARJANA', 'SINGARAJA', '1995-08-03', 'BULELENG', 4, '', 4000000, 7, '', '', '081337444917', '', 'ERAWATI', 'SINGARAJA', '1987-08-07', 'GEROKGAK', 4, '', 3500000, 9, '', '', '081337444927', '', '', '', '0000-00-00', '', 1, '', 0, 10, '', '', '', '', 'CADANGAN', '2021-09-28 08:37:46', '::1', 'TEKNIK INFORMATIKA-20210928083746.pdf'),
(15, 'I PUTU YUDAH ERAWAN', 'L', 'SINGARAJA', '1998-06-15', 4, 1, 2, 'BANJAR DINAS WANSARI', '1', '2', 'SANGGALANGIT', 'GEROKGAK', 'BULELENG', '81155', '082247469993', '', 'Orang Tua', 'UNIVERSITAS PENDIDKAN GANESHA', 'TEKNIK INFORMATIKA', 'MANAJAEMEN INFORMATIKA', 'ARJANA', 'SINGARAJA', '1995-08-03', 'BULELENG', 4, '', 4000000, 7, '', '', '081337444917', '', 'ERAWATI', 'SINGARAJA', '1987-08-07', 'GEROKGAK', 4, '', 3500000, 9, '', '', '081337444927', '', '', '', '0000-00-00', '', 1, '', 0, 10, '', '', '', '', 'DITERIMA', '2021-09-28 08:44:26', '::1', 'TEKNIK INFORMATIKA-20210928084426.pdf'),
(16, 'DEVI PRATIWI', 'P', 'GEROKGAK', '1997-12-17', 4, 1, 4, 'BANJAR KAYUPUTIH', '1', '2', 'SANGGALANGIT', 'GEROKGAK', 'BULELENG', '81155', '082247469993', 'PRATIWIDEVI551@GMAIL.COM', 'Orang Tua', 'UNDIKHSA', 'FHIS', 'PERPUSTAKAAN', 'GIRI', 'BULELENG', '1995-08-03', 'SINGARAJA', 5, '', 2000000, 9, '', '', '082655667633', '', 'BIBI', 'SINGARAJA', '1998-06-16', 'SINGARAJA', 7, '', 3000000, 9, '', '', '081227333677', '', '', '', '0000-00-00', '', 1, '', 0, 10, '', '', '', '', 'DAFTAR', '2021-09-28 09:54:30', '::1', 'FHIS-20210928095430.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` enum('admin','user') COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `id_session`, `id_user`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'BBRBLPP Gondol', 'yudhaerawan17@gmail.com', '082247469993', 'admin', 'N', 'dvrshb26p4enmn45agbuekti45', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `sidebar`
--
ALTER TABLE `sidebar`
  ADD PRIMARY KEY (`id_sidebar`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  MODIFY `id_halaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sidebar`
--
ALTER TABLE `sidebar`
  MODIFY `id_sidebar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
