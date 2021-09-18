-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Sep 2021 pada 17.37
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_giantfashion`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `admin_kode` varchar(50) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_gambar` varchar(255) NOT NULL,
  `admin_tanggal_dibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`adminid`, `admin_kode`, `admin_nama`, `admin_password`, `admin_gambar`, `admin_tanggal_dibuat`) VALUES
(2, 'ADM0002', 'Ardhi Ramadhan', '21232f297a57a5a743894a0e4a801fc3', 'admin1562504847.png', '2019-07-07 17:32:09'),
(4, 'ADM0004', 'Sara Doe', '21232f297a57a5a743894a0e4a801fc3', 'admin1562495617.png', '2019-07-07 17:33:37'),
(6, 'ADM0005', 'Zendaya', 'd41d8cd98f00b204e9800998ecf8427e', 'admin1562497737.png', '2019-07-07 18:05:44'),
(14, 'ADM0006', 'indah', '21232f297a57a5a743894a0e4a801fc3', 'admin1606492730.jpg', '2020-11-27 22:56:03'),
(15, 'ADM0007', 'test', '202cb962ac59075b964b07152d234b70', 'admin1606539087.jpg', '2020-11-28 11:51:27'),
(16, 'ADM0008', 'test1', 'b2ca678b4c936f905fb82f2733f5297f', 'admin1606539743.jpg', '2020-11-28 12:02:23'),
(17, 'ADM0009', 'indah', 'b2ca678b4c936f905fb82f2733f5297f', 'admin1606539792.jpg', '2020-11-28 12:03:12'),
(19, 'ADM0010', 'indah', 'b2ca678b4c936f905fb82f2733f5297f', 'admin1606540901.jpg', '2020-11-28 12:21:41'),
(20, 'ADM0011', 'test', 'bcbe3365e6ac95ea2c0343a2395834dd', 'admin1606541448.png', '2020-11-28 12:30:48'),
(21, 'ADM0012', 'admin', 'admin', 'admin1631247342.png', '0000-00-00 00:00:00'),
(22, 'ADM0013', 'dims', '5927205243f12cdc70612cba6dc874fa', 'admin1631247319.png', '2021-09-10 11:11:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` int(11) NOT NULL,
  `no_pesanan` varchar(255) NOT NULL,
  `produkid` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `opKirim` varchar(50) NOT NULL,
  `opsiLayanan` varchar(50) NOT NULL,
  `size_product` varchar(5) NOT NULL,
  `isi_pesan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `no_pesanan`, `produkid`, `jumlah`, `weight`, `opKirim`, `opsiLayanan`, `size_product`, `isi_pesan`, `gambar`, `harga`, `sub_total`, `ongkir`) VALUES
(1, 'ORDARD1907100002', '23', 45, 0, '', '', '', 'Desain Lain', 'desain1562705132.jpg', 3500, 157500, 0),
(2, 'ORDARD1907100002', '23', 20, 0, '', '', '', 'Buat Banyak', 'desain1562704951.jpg', 3500, 70000, 0),
(3, 'ORDARD1907100002', '9', 1000, 0, '', '', '', 'Bikin yang rapih', 'desain1562705969.jpg', 1000, 1000000, 0),
(4, 'ORDARD1907100003', '25', 500, 0, '', '', '', 'Biasa aja', 'desain1562710543.jpg', 6000, 3000000, 0),
(5, 'ORDARD1907100003', '12', 2, 0, '', '', '', 'Yang Warna Kuning', 'desain1562707840.jpg', 700, 1400, 0),
(6, 'ORDARD1907100004', '26', 2, 0, '', '', '', 'sad', 'desain1562710719.jpg', 8000, 16000, 0),
(7, 'ORDARD1907100005', '26', 2, 0, '', '', '', 'Keterangan\r\n', 'desain1562725432.jpg', 8000, 16000, 0),
(8, 'ORDARD1907100006', '20', 2, 0, '', '', '', 'Kartu Nama', 'desain1562725518.jpg', 25000, 50000, 0),
(9, 'ORDARD1907100007', '24', 50, 0, '', '', '', 'Kartu 2', 'desain1562725617.jpg', 4000, 200000, 0),
(10, 'ORDARD1907100007', '10', 204, 0, '', '', '', 'Nama Kartu', 'desain1562725601.jpg', 1500, 306000, 0),
(11, 'ORDADM1907100008', '26', 4, 0, '', '', '', 'Warnanya yang jelas yaa', 'desain1562725735.jpg', 8000, 32000, 0),
(12, 'ORDADM1907100008', '18', 2, 0, '', '', '', 'Samain Kaya Desain', 'desain1562703951.jpg', 50000, 100000, 0),
(13, 'ORDADM1907100009', '26', 2, 0, '', '', '', 'asdasda', 'desain1562726388.jpg', 8000, 16000, 0),
(14, 'ORDSAR1907100008', '27', 5000, 0, '', '', '', 'Saya Beli Banyak\r\n', 'desain1562750000.jpg', 500, 2500000, 0),
(15, 'ORDARD2011250009', '21', 2, 0, '', '', '', 'Nama : John', 'desain1562739493.jpg', 30000, 60000, 0),
(16, 'ORDARD2011250009', '27', 3, 0, '', '', '', 'asd', 'desain1562739469.jpg', 500, 1500, 0),
(17, 'ORDIND2011290010', '12', 200, 0, '', '', '', 'gsdgasdybsna', 'desain1606634318.png', 700, 140000, 0),
(18, 'ORDIND2012080011', '26', 100, 0, '', '', '', 'ukuran A4 ya', 'desain1607362047.jpg', 8000, 800000, 0),
(19, 'ORDIND2012080012', '27', 101, 0, '', '', '', 'Test', '', 500, 50500, 0),
(20, 'ORDIND2012080013', '27', 100, 0, '', '', '', 'Cepat', 'desain1607409904.jpg', 500, 50000, 0),
(21, 'ORDIND2012080014', '27', 500, 0, '', '', '', 'New', 'desain1607409749.jpg', 500, 758000, 0),
(22, 'ORDDIM2012080014', '31', 100, 0, '', '', '', 'newwww', 'desain1607410156.jpg', 1001, 258000, 0),
(23, 'ORDDIM2012080015', '27', 100, 0, '', '', '', 'newwww1', 'desain1607410212.jpg', 500, 208000, 0),
(24, 'ORDDIM2012080017', '31', 100, 0, '', '', '', 'test new new', 'desain1607411216.jpg', 1001, 258000, 0),
(25, 'ORDDIM2012080019', '27', 100, 0, '', '', '', 'test 123', 'desain1607411378.jpg', 500, 208000, 0),
(26, 'ORDDIM2012080021', '31', 100, 0, '', '', '', 'Final Cetak DIgital', 'desain1607411477.jpg', 1001, 208000, 0),
(27, 'ORDDIM2012080023', '31', 100, 0, '', '', '', 'Final Cetak Offset', 'desain1607411540.jpg', 1001, 258000, 0),
(28, 'ORDDIM2012080025', '27', 100, 0, '', '', '', 'Final Cetak Undangan Digital', 'desain1607411601.jpg', 500, 158000, 0),
(29, 'ORDDIM2012080027', '27', 100, 0, '', '', '', 'Final Cetak Undangan Offset', 'desain1607411659.jpg', 500, 208000, 0),
(30, 'ORDIND2012080029', '27', 100, 0, '', '', '', 'Order Normal', 'desain1607410949.jpg', 500, 608000, 0),
(31, 'ORDDIM2109100029', '42', 2, 0, '', '', '', '6777', '', 120000, 267000, 0),
(32, 'ORDDIM2109100031', '41', 1, 0, '', '', '', 'ya', '', 120000, 130000, 0),
(33, 'ORDDIM2109100033', '34', 2, 0, '', '', '', 'yaa', '', 100000, 208000, 0),
(34, 'ORDDIM2109100035', '35', 2, 0, '', '', '', 'udah', '', 170000, 356000, 0),
(35, 'ORDDIM2109120035', '40', 1, 0, '', '', 'Pilih', 'yeee', '', 200000, 215000, 15000),
(36, 'ORDDIM2109120037', '40', 2, 0, '', '', '40', 'wee', '', 200000, 419000, 19000),
(37, 'ORDDIM2109130039', '32', 1, 0, '', '', 's', 'yeee', '', 200000, 212000, 12000),
(38, 'ORDDIM2109150041', '41', 2, 0, '', '', 'm', 'jklll', '', 120000, 250000, 10000),
(39, 'ORDDIM2109150043', '40', 2, 1000, 'jne', 'OKE Estimasi 2-3 hari Harga 9000', '42', 'kllll', '', 200000, 409000, 9000),
(40, 'ORDDIM2109150043', '41', 1, 1000, 'pos', 'Paket Kilat Khusus Estimasi 6 HARI hari Harga 4250', 's', 'kllllllll', '', 120000, 162500, 42500),
(41, 'ORDDIM2109180043', '41', 1, 1000, 'jne', 'OKE Estimasi 5-7 hari Harga 61000', 'l', 'hjjjj', '', 120000, 181000, 61000),
(42, 'ORDDIM2109180043', '42', 2, 1000, 'jne', 'CTC Estimasi 1-2 hari Harga 9000', 's', 'ggg', '', 120000, 249000, 9000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Baju'),
(2, 'Sepatu'),
(3, 'Celana'),
(5, 'Flanel'),
(6, 'Baju Anak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `produkid` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `size_product` varchar(5) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `tipe_lokasi` varchar(15) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `nama_penerima` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `weight` int(11) NOT NULL,
  `opKirim` varchar(20) NOT NULL,
  `opsiLayanan` varchar(100) NOT NULL,
  `isi_pesan` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `plg_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `produkid`, `jumlah`, `size_product`, `lokasi`, `tipe_lokasi`, `kota`, `no_telp`, `nama_penerima`, `alamat`, `weight`, `opKirim`, `opsiLayanan`, `isi_pesan`, `gambar`, `sub_total`, `ongkir`, `plg_id`) VALUES
(69, 41, 2, 's', 'Jawa Barat', 'Kabupaten', 'Ciamis', '08132444444', 'dims', 'jln bima', 1000, 'pos', 'Paket Kilat Khusus Estimasi 2 HARI hari Harga 14000', 'hhh', '', 254000, 14000, 'PLG2109100008');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `plg_id` varchar(50) NOT NULL,
  `plg_nama` varchar(150) NOT NULL,
  `plg_email` varchar(100) NOT NULL,
  `plg_username` varchar(100) NOT NULL,
  `plg_password` varchar(255) NOT NULL,
  `plg_kelamin` varchar(50) NOT NULL,
  `plg_alamat` text NOT NULL,
  `plg_lokasi` varchar(50) NOT NULL,
  `plg_typeLokasi` varchar(15) NOT NULL,
  `plg_kota` varchar(50) NOT NULL,
  `plg_telepon` varchar(100) NOT NULL,
  `plg_foto` varchar(255) NOT NULL,
  `plg_tanggal_dibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`plg_id`, `plg_nama`, `plg_email`, `plg_username`, `plg_password`, `plg_kelamin`, `plg_alamat`, `plg_lokasi`, `plg_typeLokasi`, `plg_kota`, `plg_telepon`, `plg_foto`, `plg_tanggal_dibuat`) VALUES
('PLG1907100002', 'Ardhi Ramadhan', 'ardhiramadhan98@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Laki - Laki', 'Kalimantan Utara,Indonesia', '', '', '', '082113222883s', 'pelanggan1562699153.png', '2019-07-10 01:16:15'),
('PLG1907100003', 'Sarah Doe', 'rmdhan95@gmail.com', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'Perempuan', 'Jl Cikarang Baratr no 37,Bekasi , Indonesia', '', '', '', '082113222883', 'pelanggan1562696269.png', '2019-07-10 01:17:49'),
('PLG1907100004', 'admin3', 'rmdhan10@gmail.com', 'admin3', '32cacb2f994f6b42183a1300d9a3e8d6', 'Laki - Laki', 'Kalimantan Utara,Indonesia', '', '', '', '082113222883', 'pelanggan1562728239.png', '2019-07-10 01:18:17'),
('PLG2011020005', 'Indah Rizkiani', 'Indahrizkiani.ir67@gmail.com', 'Indah', 'indah', 'Perempuan', 'tambun selatan', '', '', '', '09998099', 'pelanggan1604328523.JPG', '2020-11-02 21:48:43'),
('PLG2011250006', 'indaah', 'indaaaaaah@gmail.com', 'indaah', 'ccfd33a3b12b147b1434d042a6ca8671', 'Perempuan', 'tambun selatan', '', '', '', '09998099', 'pelanggan1606482379.png', '2020-11-25 21:05:24'),
('PLG2011280007', 'Danang', 'danang@gmail.com', '123', '202cb962ac59075b964b07152d234b70', 'Laki - Laki', 'tambun selatan', '', '', '', '09998099', 'pelanggan1606541154.jpg', '2020-11-28 12:25:54'),
('PLG2109100008', 'dims', 'nurulraws@gmail.com', 'dims', '5927205243f12cdc70612cba6dc874fa', 'Laki - Laki', 'jln bima ', 'Jawa Barat', 'Kota', 'Bekasi', '081324444442', 'pelanggan1631246174.png', '2021-09-10 10:56:14'),
('PLG2109180009', 'Et dignissimos repel', 'tonoxe@mailinator.com', 'remyj', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Laki - Laki', 'Similique quod sit ', '', '', '', 'Labore enim quia nem', '', '2021-09-18 22:01:37'),
('PLG2109180010', 'Sit eum et magna nes', 'bosyjafo@mailinator.com', 'kiheve', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Laki - Laki', 'Rerum ut explicabo ', 'Sumatera Barat', 'Kota', 'Bukittinggi', 'Vel ratione temporib', '', '2021-09-18 22:21:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `bayar_id` int(11) NOT NULL,
  `no_pesanan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `bayar_nominal` int(11) NOT NULL,
  `bayar_gambar` varchar(255) NOT NULL,
  `bayar_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`bayar_id`, `no_pesanan`, `keterangan`, `bayar_nominal`, `bayar_gambar`, `bayar_tanggal`) VALUES
(1, 'ORDARD1907100004', 'Saya Udh bayar Nich', 16000, 'konfirmasi1562725388.png', '2019-07-10 09:05:26'),
(2, 'ORDARD1907100003', 'Saya Udh bayar Nih wois', 3001400, 'konfirmasi1562724791.png', '2019-07-10 09:13:11'),
(3, 'ORDARD1907100002', 'Bayar Order 02', 1645000, 'konfirmasi1562725295.jpg', '2019-07-10 09:21:35'),
(4, 'ORDARD1907100005', 'Keterang', 16000, 'konfirmasi1562725449.png', '2019-07-10 09:24:09'),
(5, 'ORDADM1907100008', 'Bayar Order', 132000, 'konfirmasi1562726360.jpg', '2019-07-10 09:37:28'),
(6, 'ORDADM1907100009', 'Keterang', 16000, 'konfirmasi1562726712.png', '2019-07-10 09:45:12'),
(7, 'ORDARD2011250009', '', 61500, '', '2020-11-25 20:51:12'),
(8, 'ORDIND2011290010', '', 140000, '', '2020-11-29 14:19:32'),
(9, 'ORDIND2012080012', 'Cepet', 50500, 'konfirmasi1607408885.jpg', '2020-12-08 13:25:23'),
(10, 'ORDIND2012080014', '', 758000, 'konfirmasi1607408596.jpg', '2020-12-08 13:23:16'),
(11, 'ORDDIM2012080014', '', 258000, 'konfirmasi1607410170.jpg', '2020-12-08 13:49:30'),
(12, 'ORDDIM2012080015', '', 208000, 'konfirmasi1607411164.jpg', '2020-12-08 14:06:04'),
(13, 'ORDDIM2012080017', '', 258000, 'konfirmasi1607411229.jpg', '2020-12-08 14:07:09'),
(14, 'ORDDIM2012080019', '', 208000, 'konfirmasi1607411390.jpg', '2020-12-08 14:09:50'),
(15, 'ORDDIM2012080021', '', 208000, 'konfirmasi1607411491.jpg', '2020-12-08 14:11:31'),
(16, 'ORDDIM2012080023', '', 258000, 'konfirmasi1607411553.jpg', '2020-12-08 14:12:33'),
(17, 'ORDDIM2012080025', '', 158000, 'konfirmasi1607411614.jpg', '2020-12-08 14:13:34'),
(18, 'ORDDIM2012080027', '', 208000, 'konfirmasi1607411672.jpg', '2020-12-08 14:14:32'),
(19, 'ORDIND2012080029', '', 608000, 'konfirmasi1607410972.jpg', '2020-12-08 14:02:52'),
(20, 'ORDDIM2109100029', 'Cepet', 0, 'konfirmasi1631246878.jpg', '2021-09-10 11:07:58'),
(21, 'ORDDIM2109100031', 'Cepet', 130000, 'konfirmasi1631247122.jpg', '2021-09-10 11:12:02'),
(22, 'ORDDIM2109100033', 'Cepet', 208000, 'konfirmasi1631249092.jpg', '2021-09-10 11:44:52'),
(23, 'ORDDIM2109100035', 'Cepet', 356000, 'konfirmasi1631246993.jpg', '2021-09-10 11:09:53'),
(24, 'ORDDIM2109130039', 'Cepet', 212000, 'konfirmasi1631542166.jpg', '2021-09-13 21:09:26'),
(25, 'ORDDIM2109150043', 'Cepet', 571500, 'konfirmasi1631717635.jpg', '2021-09-15 21:53:55'),
(26, 'ORDDIM2109180043', 'Cepet', 430000, 'konfirmasi1631976738.png', '2021-09-18 21:52:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `no_pesanan` varchar(255) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `plg_id` varchar(100) NOT NULL,
  `status_pesanan` int(11) NOT NULL,
  `nama_penerima` varchar(200) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `grandtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`no_pesanan`, `tgl_transaksi`, `plg_id`, `status_pesanan`, `nama_penerima`, `lokasi`, `kota`, `alamat`, `notelp`, `email`, `grandtotal`) VALUES
('ORDADM1907100008', '2019-07-09 09:35:47', 'PLG1907100003', 4, 'admin2', '', '', 'Jl Cikarang Baratr no 37,Bekasi , Indonesia', '082113222883', 'rmdhan95@gmail.com', 132000),
('ORDADM1907100009', '2019-07-08 09:44:12', 'PLG1907100003', 3, 'admin2', '', '', 'Jl Cikarang Baratr no 37,Bekasi , Indonesia', '082113222883', 'rmdhan95@gmail.com', 16000),
('ORDARD1907100002', '2019-07-07 04:27:40', 'PLG1907100002', 1, 'Ardhi Ramadhan', '', '', 'Kalimantan Utara,Indonesia', '082113222883s', 'ardhiramadhan98@gmail.com', 1645000),
('ORDARD1907100003', '2019-07-04 05:15:49', 'PLG1907100002', 4, 'Ardhi Ramadhan', '', '', 'Kalimantan Utara,Indonesia', '082113222883s', 'ardhiramadhan98@gmail.com', 3001400),
('ORDARD1907100005', '2019-07-05 09:23:56', 'PLG1907100002', 2, 'Ardhi Ramadhan', '', '', 'Kalimantan Utara,Indonesia', '082113222883s', 'ardhiramadhan98@gmail.com', 16000),
('ORDARD1907100006', '2019-07-06 09:25:21', 'PLG1907100002', 0, 'Ardhi Ramadhan', '', '', 'Kalimantan Utara,Indonesia', '082113222883s', 'ardhiramadhan98@gmail.com', 50000),
('ORDARD2011250009', '2020-11-25 20:50:45', 'PLG1907100002', 1, 'Ardhi Ramadhan', '', '', 'Kalimantan Utara,Indonesia', '082113222883s', 'ardhiramadhan98@gmail.com', 61500),
('ORDDIM2012080014', '2020-12-08 13:49:21', 'PLG2012080008', 1, 'dims', '', '', 'jln bima', '08132444444', 'nurulraws@gmail.com', 258000),
('ORDDIM2012080015', '2020-12-08 14:05:55', 'PLG2012080008', 1, 'dims', '', '', 'jln bima', '08132444444', 'nurulraws@gmail.com', 208000),
('ORDDIM2012080017', '2020-12-08 14:07:01', 'PLG2012080008', 1, 'dims', '', '', 'jln bima', '08132444444', 'nurulraws@gmail.com', 258000),
('ORDDIM2012080019', '2020-12-08 14:09:43', 'PLG2012080008', 1, 'dims', '', '', 'jln bima', '08132444444', 'nurulraws@gmail.com', 208000),
('ORDDIM2012080021', '2020-12-08 14:11:22', 'PLG2012080008', 1, 'dims', '', '', 'jln bima', '08132444444', 'nurulraws@gmail.com', 208000),
('ORDDIM2012080023', '2020-12-08 14:12:25', 'PLG2012080008', 1, 'dims', '', '', 'jln bima', '08132444444', 'nurulraws@gmail.com', 258000),
('ORDDIM2012080025', '2020-12-08 14:13:26', 'PLG2012080008', 1, 'dims', '', '', 'jln bima', '08132444444', 'nurulraws@gmail.com', 158000),
('ORDDIM2012080027', '2020-12-08 14:14:24', 'PLG2012080008', 1, 'dims', '', '', 'jln bima', '08132444444', 'nurulraws@gmail.com', 208000),
('ORDDIM2109100029', '2021-09-10 10:58:24', 'PLG2109100008', 1, 'dims', '', '', 'jln bima', '08132444444', 'nurulraws@gmail.com', 267000),
('ORDDIM2109100031', '2021-09-10 11:11:53', 'PLG2109100008', 4, 'dims', '', '', 'jln bima', '08132444444', 'nurulraws@gmail.com', 130000),
('ORDDIM2109100033', '2021-09-10 11:44:39', 'PLG2109100008', 4, 'dims', '', '', 'jln bima', '08132444444', 'nurulraws@gmail.com', 208000),
('ORDDIM2109100035', '2021-09-10 11:09:32', 'PLG2109100008', 4, 'dims', '', '', 'jln bima', '08132444444', 'nurulraws@gmail.com', 356000),
('ORDDIM2109120035', '2021-09-12 11:01:42', 'PLG2109100008', 0, 'dims', '', '', 'jln bima', '08132444444', 'nurulraws@gmail.com', 215000),
('ORDDIM2109120037', '2021-09-12 21:20:14', 'PLG2109100008', 0, 'dims', '', '', 'jln bima', '08132444444', 'nurulraws@gmail.com', 419000),
('ORDDIM2109130039', '2021-09-13 21:09:06', 'PLG2109100008', 1, 'dims', '', '', 'jln bima', '08132444444', 'nurulraws@gmail.com', 212000),
('ORDDIM2109150041', '2021-09-15 22:36:30', 'PLG2109100008', 0, 'dims', '', '', 'jln bima', '08132444444', 'nurulraws@gmail.com', 250000),
('ORDDIM2109150043', '2021-09-15 21:41:53', 'PLG2109100008', 4, 'klll', 'Kalimantan Selatan', 'Banjar', 'kloooo', '0812333', '', 571500),
('ORDDIM2109180043', '2021-09-18 22:50:17', 'PLG2109100008', 4, 'dims', 'Jawa Barat', 'Bekasi', 'jln bima', '08132444444', '', 430000),
('ORDIND2011290010', '2020-11-29 14:18:59', 'PLG2011250006', 5, 'indaah', '', '', 'tambun selatan', '09998099', 'indaaaaaah@gmail.com', 140000),
('ORDIND2012080011', '2020-12-08 00:27:42', 'PLG2011250006', 0, 'indaah', '', '', 'tambun selatan', '09998099', 'indaaaaaah@gmail.com', 800000),
('ORDIND2012080012', '2020-12-08 13:25:02', 'PLG2011250006', 1, 'indaah', '', '', 'tambun selatan', '09998099', 'indaaaaaah@gmail.com', 50500),
('ORDIND2012080013', '2020-12-08 13:49:59', 'PLG2011250006', 0, 'indaah', '', '', 'tambun selatan', '09998099', 'indaaaaaah@gmail.com', 50000),
('ORDIND2012080014', '2020-12-08 13:16:55', 'PLG2011250006', 1, 'indaah', '', '', 'tambun selatan', '09998099', 'indaaaaaah@gmail.com', 758000),
('ORDIND2012080029', '2020-12-08 14:02:42', 'PLG2011250006', 1, 'indaah', '', '', 'tambun selatan', '09998099', 'indaaaaaah@gmail.com', 608000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `produkid` int(11) NOT NULL,
  `produk_kode` varchar(255) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `produk_nama` varchar(255) NOT NULL,
  `produk_harga` varchar(255) NOT NULL,
  `jenis_bahan` varchar(100) NOT NULL,
  `produk_gambar` varchar(255) NOT NULL,
  `produk_deskripsi` text NOT NULL,
  `produk_status` int(11) NOT NULL,
  `produk_tanggal_dibuat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`produkid`, `produk_kode`, `kategori_id`, `produk_nama`, `produk_harga`, `jenis_bahan`, `produk_gambar`, `produk_deskripsi`, `produk_status`, `produk_tanggal_dibuat`) VALUES
(28, 'KLI1907100027', 1, 'Klip Kertas', '1000', '', 'produk1562727171.jpg', 'Klip Untuk Kertas', 0, '2019-07-10 09:52:51'),
(32, 'H&M2109100028', 6, 'H&M 2 cotton set', '200000', 'Cotton', 'produk1631246502.jpg', 'Bahan adem dengan desain trend', 1, '2021-09-10 11:01:42'),
(33, 'H&M2109100029', 6, 'H&M Kaos Orange', '150000', 'Cotton', 'produk1631246374.jpg', 'Baju dengan bahan adem dan nyaman', 1, '2021-09-10 10:59:34'),
(34, 'H&M2109100029', 6, 'H&M Polo Biru', '100000', 'Drill Cotton', 'produk1631246518.jpg', 'Dengan bahan adem dan model terkini', 1, '2021-09-10 11:01:58'),
(35, 'FLA2109100030', 5, 'Flanel 17 Seven', '170000', 'Cotton', 'produk1631246871.jpg', 'Motif terbaru dengan bahan adem', 1, '2021-09-10 11:07:51'),
(36, 'FLA2109100031', 5, 'Flanel Triple', '170000', 'Cotton', 'produk1631247932.jpg', 'Flanel dengan bahan premium dan mewah', 1, '2021-09-10 11:25:32'),
(37, 'JEA2109100032', 3, 'Jeans Lois ', '300000', 'Jeans', 'produk1631248276.jpg', 'Dengan ukuran reguler fit dan bahan tidak melar', 1, '2021-09-10 11:31:16'),
(38, 'JEA2109100033', 3, 'Jeans Lois Land', '400000', 'Jeans', 'produk1631248323.jpg', 'Dengan bahan bagus', 1, '2021-09-10 11:32:03'),
(39, 'SEP2109100034', 2, 'Sepatu Nevada Ts12', '180000', 'Mesh', 'produk1631248496.jpg', 'Cocok untuk kegiatan olahraga', 1, '2021-09-10 11:34:56'),
(40, 'SEP2109100035', 2, 'Sepatu Nevada Ts008', '200000', 'Mesh', 'produk1631248552.jpg', 'Cocok untuk kegiatan olahraga', 1, '2021-09-10 11:35:52'),
(41, 'KAO2109100036', 1, 'Kaos Spider  Top', '120000', 'Cotton', 'produk1631248713.jpg', 'Bahan adem', 1, '2021-09-10 11:38:33'),
(42, 'KAO2109100037', 1, 'Kaos Spider Top 1', '120000', 'Cotton', 'produk1631248752.jpg', 'Bahan adem', 1, '2021-09-10 11:39:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id` int(11) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tentang_kami`
--

INSERT INTO `tentang_kami` (`id`, `isi`) VALUES
(3, '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 25px; padding: 0px; text-align: justify;\" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;\"=\"\"><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `idtesti` int(11) NOT NULL,
  `plg_id` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `isi_testi` text NOT NULL,
  `status_testi` int(11) NOT NULL,
  `tgl_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`idtesti`, `plg_id`, `email`, `isi_testi`, `status_testi`, `tgl_post`) VALUES
(1, 'PLG1907100002', 'ardhiramadhan98@gmail.com', 'Mantap Kali ini', 1, '2019-07-10 08:52:57'),
(2, 'PLG1907100003', 'rmdhan95@gmail.com', 'Betul Pelayanannnya Mantap', 1, '2019-07-10 09:20:40'),
(4, 'PLG2109100008', 'nurulraws@gmail.com', 'Bagus bahannya dan pengirimannya cepat', 1, '2021-09-10 06:02:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`plg_id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`bayar_id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`no_pesanan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produkid`);

--
-- Indeks untuk tabel `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`idtesti`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `bayar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `produkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `idtesti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
