-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 10:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayo`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_pemain`
--

CREATE TABLE `m_pemain` (
  `id` int(11) NOT NULL,
  `nomer_punggung` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  `id_tim` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_pemain`
--

INSERT INTO `m_pemain` (`id`, `nomer_punggung`, `nama`, `tinggi_badan`, `berat_badan`, `posisi`, `id_tim`, `foto`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 121, 'asdasd1', 123231, 1232131, 1, 1, 'WhatsApp Image 2021-08-10 at 4.05.13 PM.jpeg', 1, '2021-08-14 15:34:06', '2021-08-14 15:52:49', NULL),
(2, 123, 'asdadsasd', 123, 21321, 1, 1, 'WhatsApp Image 2021-08-10 at 2.35.04 PM.jpeg', 1, '2021-08-14 15:35:03', '2021-08-14 15:35:03', NULL),
(3, 27, 'Hendra Wijaya', 170, 60, 1, 3, 'MObqE9lt8X2DtSzuPz5Y.jpg', 1, '2021-08-15 17:52:52', '2021-08-15 18:13:29', '2021-08-15 18:13:29'),
(4, 27, 'Hendra Wijaya', 123, 124, 2, 4, 'GGkBMvOt65I8CXxGoNo3.jpg', 1, '2021-08-15 18:14:15', '2021-08-15 18:14:26', NULL),
(5, 23, 'ray nanda pamungkas', 234, 2234, 1, 3, 'NM9447VtdXVTFgOhPd9O.jpg', 1, '2021-08-15 21:57:28', '2021-08-15 21:57:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_score`
--

CREATE TABLE `m_score` (
  `id` int(11) NOT NULL,
  `id_tanding` int(11) NOT NULL,
  `id_pemain` int(11) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_score`
--

INSERT INTO `m_score` (`id`, `id_tanding`, `id_pemain`, `waktu`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '1', '2021-08-15 22:18:47', '2021-08-15 22:18:47'),
(2, 1, 5, '3', '2021-08-15 22:18:47', '2021-08-15 22:18:47'),
(3, 1, 4, '2', '2021-08-15 22:18:47', '2021-08-15 22:18:47'),
(4, 1, 5, '23', '2021-08-15 23:46:17', '2021-08-15 23:46:17'),
(5, 1, 5, '46', '2021-08-15 23:46:17', '2021-08-15 23:46:17'),
(6, 1, 4, '12', '2021-08-15 23:46:17', '2021-08-15 23:46:17'),
(7, 1, 4, '13', '2021-08-15 23:46:17', '2021-08-15 23:46:17'),
(8, 1, 5, '2', '2021-08-15 23:46:39', '2021-08-15 23:46:39'),
(9, 1, 4, '2', '2021-08-15 23:46:39', '2021-08-15 23:46:39'),
(10, 2, 5, '23', '2021-08-15 23:48:32', '2021-08-15 23:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `m_tanding`
--

CREATE TABLE `m_tanding` (
  `id` int(11) NOT NULL,
  `tim_kandang` int(11) NOT NULL,
  `tim_tandang` int(11) NOT NULL,
  `score_tim_kandang` int(11) NOT NULL DEFAULT 0,
  `score_tim_tandang` int(11) NOT NULL DEFAULT 0,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_tanding`
--

INSERT INTO `m_tanding` (`id`, `tim_kandang`, `tim_tandang`, `score_tim_kandang`, `score_tim_tandang`, `tanggal`, `waktu`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 1, 1, '2021-08-25', '09:49:00', 2, '2021-08-15 15:53:34', '2021-08-15 23:46:39'),
(2, 3, 4, 1, 0, '2021-10-07', '23:33:00', 2, '2021-08-15 23:34:08', '2021-08-15 23:48:32'),
(3, 4, 3, 0, 0, '2021-10-20', '20:17:00', 1, '2021-08-16 01:17:47', '2021-08-16 01:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `m_tim`
--

CREATE TABLE `m_tim` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `tahun_berdiri` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `id_kota` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_tim`
--

INSERT INTO `m_tim` (`id`, `nama`, `logo`, `tahun_berdiri`, `alamat`, `id_kota`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asd', '1627886679alat presensi.png', 123123, 'asdadasd', 3215, 1, '2021-08-14 07:19:20', '2021-08-15 16:47:27', '2021-08-15 16:47:27'),
(2, 'sdsa1', '1627886679alat presensi.png', 1232131, 'asdasdasd1', 3175, 1, '2021-08-14 07:20:21', '2021-08-15 16:47:42', '2021-08-15 16:47:42'),
(3, 'Cilego FC', 'cilegon.jfif', 2021, 'adsadsad', 3672, 1, '2021-08-15 16:04:13', '2021-08-15 18:12:25', NULL),
(4, 'Pelita jaya', 'd3pUcGisq2t0v7L0apcm.jpg', 231, 'sadsadsadasd', 3215, 1, '2021-08-15 16:15:07', '2021-08-15 20:14:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posisi_pemain`
--

CREATE TABLE `posisi_pemain` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posisi_pemain`
--

INSERT INTO `posisi_pemain` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Penyerang', '2021-08-14 22:01:29', '2021-08-14 22:01:29'),
(2, 'Gelandang', '2021-08-14 22:01:29', '2021-08-14 22:01:29'),
(3, 'Bertahan', '2021-08-14 22:01:44', '2021-08-14 22:01:44'),
(4, 'Penjaga Gawang', '2021-08-14 22:01:44', '2021-08-14 22:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `regencies`
--

CREATE TABLE `regencies` (
  `id` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `regencies`
--

INSERT INTO `regencies` (`id`, `name`) VALUES
('1101', 'KABUPATEN SIMEULUE'),
('1102', 'KABUPATEN ACEH SINGKIL'),
('1103', 'KABUPATEN ACEH SELATAN'),
('1104', 'KABUPATEN ACEH TENGGARA'),
('1105', 'KABUPATEN ACEH TIMUR'),
('1106', 'KABUPATEN ACEH TENGAH'),
('1107', 'KABUPATEN ACEH BARAT'),
('1108', 'KABUPATEN ACEH BESAR'),
('1109', 'KABUPATEN PIDIE'),
('1110', 'KABUPATEN BIREUEN'),
('1111', 'KABUPATEN ACEH UTARA'),
('1112', 'KABUPATEN ACEH BARAT DAYA'),
('1113', 'KABUPATEN GAYO LUES'),
('1114', 'KABUPATEN ACEH TAMIANG'),
('1115', 'KABUPATEN NAGAN RAYA'),
('1116', 'KABUPATEN ACEH JAYA'),
('1117', 'KABUPATEN BENER MERIAH'),
('1118', 'KABUPATEN PIDIE JAYA'),
('1171', 'KOTA BANDA ACEH'),
('1172', 'KOTA SABANG'),
('1173', 'KOTA LANGSA'),
('1174', 'KOTA LHOKSEUMAWE'),
('1175', 'KOTA SUBULUSSALAM'),
('1201', 'KABUPATEN NIAS'),
('1202', 'KABUPATEN MANDAILING NATAL'),
('1203', 'KABUPATEN TAPANULI SELATAN'),
('1204', 'KABUPATEN TAPANULI TENGAH'),
('1205', 'KABUPATEN TAPANULI UTARA'),
('1206', 'KABUPATEN TOBA SAMOSIR'),
('1207', 'KABUPATEN LABUHAN BATU'),
('1208', 'KABUPATEN ASAHAN'),
('1209', 'KABUPATEN SIMALUNGUN'),
('1210', 'KABUPATEN DAIRI'),
('1211', 'KABUPATEN KARO'),
('1212', 'KABUPATEN DELI SERDANG'),
('1213', 'KABUPATEN LANGKAT'),
('1214', 'KABUPATEN NIAS SELATAN'),
('1215', 'KABUPATEN HUMBANG HASUNDUTAN'),
('1216', 'KABUPATEN PAKPAK BHARAT'),
('1217', 'KABUPATEN SAMOSIR'),
('1218', 'KABUPATEN SERDANG BEDAGAI'),
('1219', 'KABUPATEN BATU BARA'),
('1220', 'KABUPATEN PADANG LAWAS UTARA'),
('1221', 'KABUPATEN PADANG LAWAS'),
('1222', 'KABUPATEN LABUHAN BATU SELATAN'),
('1223', 'KABUPATEN LABUHAN BATU UTARA'),
('1224', 'KABUPATEN NIAS UTARA'),
('1225', 'KABUPATEN NIAS BARAT'),
('1271', 'KOTA SIBOLGA'),
('1272', 'KOTA TANJUNG BALAI'),
('1273', 'KOTA PEMATANG SIANTAR'),
('1274', 'KOTA TEBING TINGGI'),
('1275', 'KOTA MEDAN'),
('1276', 'KOTA BINJAI'),
('1277', 'KOTA PADANGSIDIMPUAN'),
('1278', 'KOTA GUNUNGSITOLI'),
('1301', 'KABUPATEN KEPULAUAN MENTAWAI'),
('1302', 'KABUPATEN PESISIR SELATAN'),
('1303', 'KABUPATEN SOLOK'),
('1304', 'KABUPATEN SIJUNJUNG'),
('1305', 'KABUPATEN TANAH DATAR'),
('1306', 'KABUPATEN PADANG PARIAMAN'),
('1307', 'KABUPATEN AGAM'),
('1308', 'KABUPATEN LIMA PULUH KOTA'),
('1309', 'KABUPATEN PASAMAN'),
('1310', 'KABUPATEN SOLOK SELATAN'),
('1311', 'KABUPATEN DHARMASRAYA'),
('1312', 'KABUPATEN PASAMAN BARAT'),
('1371', 'KOTA PADANG'),
('1372', 'KOTA SOLOK'),
('1373', 'KOTA SAWAH LUNTO'),
('1374', 'KOTA PADANG PANJANG'),
('1375', 'KOTA BUKITTINGGI'),
('1376', 'KOTA PAYAKUMBUH'),
('1377', 'KOTA PARIAMAN'),
('1401', 'KABUPATEN KUANTAN SINGINGI'),
('1402', 'KABUPATEN INDRAGIRI HULU'),
('1403', 'KABUPATEN INDRAGIRI HILIR'),
('1404', 'KABUPATEN PELALAWAN'),
('1405', 'KABUPATEN S I A K'),
('1406', 'KABUPATEN KAMPAR'),
('1407', 'KABUPATEN ROKAN HULU'),
('1408', 'KABUPATEN BENGKALIS'),
('1409', 'KABUPATEN ROKAN HILIR'),
('1410', 'KABUPATEN KEPULAUAN MERANTI'),
('1471', 'KOTA PEKANBARU'),
('1473', 'KOTA D U M A I'),
('1501', 'KABUPATEN KERINCI'),
('1502', 'KABUPATEN MERANGIN'),
('1503', 'KABUPATEN SAROLANGUN'),
('1504', 'KABUPATEN BATANG HARI'),
('1505', 'KABUPATEN MUARO JAMBI'),
('1506', 'KABUPATEN TANJUNG JABUNG TIMUR'),
('1507', 'KABUPATEN TANJUNG JABUNG BARAT'),
('1508', 'KABUPATEN TEBO'),
('1509', 'KABUPATEN BUNGO'),
('1571', 'KOTA JAMBI'),
('1572', 'KOTA SUNGAI PENUH'),
('1601', 'KABUPATEN OGAN KOMERING ULU'),
('1602', 'KABUPATEN OGAN KOMERING ILIR'),
('1603', 'KABUPATEN MUARA ENIM'),
('1604', 'KABUPATEN LAHAT'),
('1605', 'KABUPATEN MUSI RAWAS'),
('1606', 'KABUPATEN MUSI BANYUASIN'),
('1607', 'KABUPATEN BANYU ASIN'),
('1608', 'KABUPATEN OGAN KOMERING ULU SELATAN'),
('1609', 'KABUPATEN OGAN KOMERING ULU TIMUR'),
('1610', 'KABUPATEN OGAN ILIR'),
('1611', 'KABUPATEN EMPAT LAWANG'),
('1612', 'KABUPATEN PENUKAL ABAB LEMATANG ILIR'),
('1613', 'KABUPATEN MUSI RAWAS UTARA'),
('1671', 'KOTA PALEMBANG'),
('1672', 'KOTA PRABUMULIH'),
('1673', 'KOTA PAGAR ALAM'),
('1674', 'KOTA LUBUKLINGGAU'),
('1701', 'KABUPATEN BENGKULU SELATAN'),
('1702', 'KABUPATEN REJANG LEBONG'),
('1703', 'KABUPATEN BENGKULU UTARA'),
('1704', 'KABUPATEN KAUR'),
('1705', 'KABUPATEN SELUMA'),
('1706', 'KABUPATEN MUKOMUKO'),
('1707', 'KABUPATEN LEBONG'),
('1708', 'KABUPATEN KEPAHIANG'),
('1709', 'KABUPATEN BENGKULU TENGAH'),
('1771', 'KOTA BENGKULU'),
('1801', 'KABUPATEN LAMPUNG BARAT'),
('1802', 'KABUPATEN TANGGAMUS'),
('1803', 'KABUPATEN LAMPUNG SELATAN'),
('1804', 'KABUPATEN LAMPUNG TIMUR'),
('1805', 'KABUPATEN LAMPUNG TENGAH'),
('1806', 'KABUPATEN LAMPUNG UTARA'),
('1807', 'KABUPATEN WAY KANAN'),
('1808', 'KABUPATEN TULANGBAWANG'),
('1809', 'KABUPATEN PESAWARAN'),
('1810', 'KABUPATEN PRINGSEWU'),
('1811', 'KABUPATEN MESUJI'),
('1812', 'KABUPATEN TULANG BAWANG BARAT'),
('1813', 'KABUPATEN PESISIR BARAT'),
('1871', 'KOTA BANDAR LAMPUNG'),
('1872', 'KOTA METRO'),
('1901', 'KABUPATEN BANGKA'),
('1902', 'KABUPATEN BELITUNG'),
('1903', 'KABUPATEN BANGKA BARAT'),
('1904', 'KABUPATEN BANGKA TENGAH'),
('1905', 'KABUPATEN BANGKA SELATAN'),
('1906', 'KABUPATEN BELITUNG TIMUR'),
('1971', 'KOTA PANGKAL PINANG'),
('2101', 'KABUPATEN KARIMUN'),
('2102', 'KABUPATEN BINTAN'),
('2103', 'KABUPATEN NATUNA'),
('2104', 'KABUPATEN LINGGA'),
('2105', 'KABUPATEN KEPULAUAN ANAMBAS'),
('2171', 'KOTA B A T A M'),
('2172', 'KOTA TANJUNG PINANG'),
('3101', 'KABUPATEN KEPULAUAN SERIBU'),
('3171', 'KOTA JAKARTA SELATAN'),
('3172', 'KOTA JAKARTA TIMUR'),
('3173', 'KOTA JAKARTA PUSAT'),
('3174', 'KOTA JAKARTA BARAT'),
('3175', 'KOTA JAKARTA UTARA'),
('3201', 'KABUPATEN BOGOR'),
('3202', 'KABUPATEN SUKABUMI'),
('3203', 'KABUPATEN CIANJUR'),
('3204', 'KABUPATEN BANDUNG'),
('3205', 'KABUPATEN GARUT'),
('3206', 'KABUPATEN TASIKMALAYA'),
('3207', 'KABUPATEN CIAMIS'),
('3208', 'KABUPATEN KUNINGAN'),
('3209', 'KABUPATEN CIREBON'),
('3210', 'KABUPATEN MAJALENGKA'),
('3211', 'KABUPATEN SUMEDANG'),
('3212', 'KABUPATEN INDRAMAYU'),
('3213', 'KABUPATEN SUBANG'),
('3214', 'KABUPATEN PURWAKARTA'),
('3215', 'KABUPATEN KARAWANG'),
('3216', 'KABUPATEN BEKASI'),
('3217', 'KABUPATEN BANDUNG BARAT'),
('3218', 'KABUPATEN PANGANDARAN'),
('3271', 'KOTA BOGOR'),
('3272', 'KOTA SUKABUMI'),
('3273', 'KOTA BANDUNG'),
('3274', 'KOTA CIREBON'),
('3275', 'KOTA BEKASI'),
('3276', 'KOTA DEPOK'),
('3277', 'KOTA CIMAHI'),
('3278', 'KOTA TASIKMALAYA'),
('3279', 'KOTA BANJAR'),
('3301', 'KABUPATEN CILACAP'),
('3302', 'KABUPATEN BANYUMAS'),
('3303', 'KABUPATEN PURBALINGGA'),
('3304', 'KABUPATEN BANJARNEGARA'),
('3305', 'KABUPATEN KEBUMEN'),
('3306', 'KABUPATEN PURWOREJO'),
('3307', 'KABUPATEN WONOSOBO'),
('3308', 'KABUPATEN MAGELANG'),
('3309', 'KABUPATEN BOYOLALI'),
('3310', 'KABUPATEN KLATEN'),
('3311', 'KABUPATEN SUKOHARJO'),
('3312', 'KABUPATEN WONOGIRI'),
('3313', 'KABUPATEN KARANGANYAR'),
('3314', 'KABUPATEN SRAGEN'),
('3315', 'KABUPATEN GROBOGAN'),
('3316', 'KABUPATEN BLORA'),
('3317', 'KABUPATEN REMBANG'),
('3318', 'KABUPATEN PATI'),
('3319', 'KABUPATEN KUDUS'),
('3320', 'KABUPATEN JEPARA'),
('3321', 'KABUPATEN DEMAK'),
('3322', 'KABUPATEN SEMARANG'),
('3323', 'KABUPATEN TEMANGGUNG'),
('3324', 'KABUPATEN KENDAL'),
('3325', 'KABUPATEN BATANG'),
('3326', 'KABUPATEN PEKALONGAN'),
('3327', 'KABUPATEN PEMALANG'),
('3328', 'KABUPATEN TEGAL'),
('3329', 'KABUPATEN BREBES'),
('3371', 'KOTA MAGELANG'),
('3372', 'KOTA SURAKARTA'),
('3373', 'KOTA SALATIGA'),
('3374', 'KOTA SEMARANG'),
('3375', 'KOTA PEKALONGAN'),
('3376', 'KOTA TEGAL'),
('3401', 'KABUPATEN KULON PROGO'),
('3402', 'KABUPATEN BANTUL'),
('3403', 'KABUPATEN GUNUNG KIDUL'),
('3404', 'KABUPATEN SLEMAN'),
('3471', 'KOTA YOGYAKARTA'),
('3501', 'KABUPATEN PACITAN'),
('3502', 'KABUPATEN PONOROGO'),
('3503', 'KABUPATEN TRENGGALEK'),
('3504', 'KABUPATEN TULUNGAGUNG'),
('3505', 'KABUPATEN BLITAR'),
('3506', 'KABUPATEN KEDIRI'),
('3507', 'KABUPATEN MALANG'),
('3508', 'KABUPATEN LUMAJANG'),
('3509', 'KABUPATEN JEMBER'),
('3510', 'KABUPATEN BANYUWANGI'),
('3511', 'KABUPATEN BONDOWOSO'),
('3512', 'KABUPATEN SITUBONDO'),
('3513', 'KABUPATEN PROBOLINGGO'),
('3514', 'KABUPATEN PASURUAN'),
('3515', 'KABUPATEN SIDOARJO'),
('3516', 'KABUPATEN MOJOKERTO'),
('3517', 'KABUPATEN JOMBANG'),
('3518', 'KABUPATEN NGANJUK'),
('3519', 'KABUPATEN MADIUN'),
('3520', 'KABUPATEN MAGETAN'),
('3521', 'KABUPATEN NGAWI'),
('3522', 'KABUPATEN BOJONEGORO'),
('3523', 'KABUPATEN TUBAN'),
('3524', 'KABUPATEN LAMONGAN'),
('3525', 'KABUPATEN GRESIK'),
('3526', 'KABUPATEN BANGKALAN'),
('3527', 'KABUPATEN SAMPANG'),
('3528', 'KABUPATEN PAMEKASAN'),
('3529', 'KABUPATEN SUMENEP'),
('3571', 'KOTA KEDIRI'),
('3572', 'KOTA BLITAR'),
('3573', 'KOTA MALANG'),
('3574', 'KOTA PROBOLINGGO'),
('3575', 'KOTA PASURUAN'),
('3576', 'KOTA MOJOKERTO'),
('3577', 'KOTA MADIUN'),
('3578', 'KOTA SURABAYA'),
('3579', 'KOTA BATU'),
('3601', 'KABUPATEN PANDEGLANG'),
('3602', 'KABUPATEN LEBAK'),
('3603', 'KABUPATEN TANGERANG'),
('3604', 'KABUPATEN SERANG'),
('3671', 'KOTA TANGERANG'),
('3672', 'KOTA CILEGON'),
('3673', 'KOTA SERANG'),
('3674', 'KOTA TANGERANG SELATAN'),
('5101', 'KABUPATEN JEMBRANA'),
('5102', 'KABUPATEN TABANAN'),
('5103', 'KABUPATEN BADUNG'),
('5104', 'KABUPATEN GIANYAR'),
('5105', 'KABUPATEN KLUNGKUNG'),
('5106', 'KABUPATEN BANGLI'),
('5107', 'KABUPATEN KARANG ASEM'),
('5108', 'KABUPATEN BULELENG'),
('5171', 'KOTA DENPASAR'),
('5201', 'KABUPATEN LOMBOK BARAT'),
('5202', 'KABUPATEN LOMBOK TENGAH'),
('5203', 'KABUPATEN LOMBOK TIMUR'),
('5204', 'KABUPATEN SUMBAWA'),
('5205', 'KABUPATEN DOMPU'),
('5206', 'KABUPATEN BIMA'),
('5207', 'KABUPATEN SUMBAWA BARAT'),
('5208', 'KABUPATEN LOMBOK UTARA'),
('5271', 'KOTA MATARAM'),
('5272', 'KOTA BIMA'),
('5301', 'KABUPATEN SUMBA BARAT'),
('5302', 'KABUPATEN SUMBA TIMUR'),
('5303', 'KABUPATEN KUPANG'),
('5304', 'KABUPATEN TIMOR TENGAH SELATAN'),
('5305', 'KABUPATEN TIMOR TENGAH UTARA'),
('5306', 'KABUPATEN BELU'),
('5307', 'KABUPATEN ALOR'),
('5308', 'KABUPATEN LEMBATA'),
('5309', 'KABUPATEN FLORES TIMUR'),
('5310', 'KABUPATEN SIKKA'),
('5311', 'KABUPATEN ENDE'),
('5312', 'KABUPATEN NGADA'),
('5313', 'KABUPATEN MANGGARAI'),
('5314', 'KABUPATEN ROTE NDAO'),
('5315', 'KABUPATEN MANGGARAI BARAT'),
('5316', 'KABUPATEN SUMBA TENGAH'),
('5317', 'KABUPATEN SUMBA BARAT DAYA'),
('5318', 'KABUPATEN NAGEKEO'),
('5319', 'KABUPATEN MANGGARAI TIMUR'),
('5320', 'KABUPATEN SABU RAIJUA'),
('5321', 'KABUPATEN MALAKA'),
('5371', 'KOTA KUPANG'),
('6101', 'KABUPATEN SAMBAS'),
('6102', 'KABUPATEN BENGKAYANG'),
('6103', 'KABUPATEN LANDAK'),
('6104', 'KABUPATEN MEMPAWAH'),
('6105', 'KABUPATEN SANGGAU'),
('6106', 'KABUPATEN KETAPANG'),
('6107', 'KABUPATEN SINTANG'),
('6108', 'KABUPATEN KAPUAS HULU'),
('6109', 'KABUPATEN SEKADAU'),
('6110', 'KABUPATEN MELAWI'),
('6111', 'KABUPATEN KAYONG UTARA'),
('6112', 'KABUPATEN KUBU RAYA'),
('6171', 'KOTA PONTIANAK'),
('6172', 'KOTA SINGKAWANG'),
('6201', 'KABUPATEN KOTAWARINGIN BARAT'),
('6202', 'KABUPATEN KOTAWARINGIN TIMUR'),
('6203', 'KABUPATEN KAPUAS'),
('6204', 'KABUPATEN BARITO SELATAN'),
('6205', 'KABUPATEN BARITO UTARA'),
('6206', 'KABUPATEN SUKAMARA'),
('6207', 'KABUPATEN LAMANDAU'),
('6208', 'KABUPATEN SERUYAN'),
('6209', 'KABUPATEN KATINGAN'),
('6210', 'KABUPATEN PULANG PISAU'),
('6211', 'KABUPATEN GUNUNG MAS'),
('6212', 'KABUPATEN BARITO TIMUR'),
('6213', 'KABUPATEN MURUNG RAYA'),
('6271', 'KOTA PALANGKA RAYA'),
('6301', 'KABUPATEN TANAH LAUT'),
('6302', 'KABUPATEN KOTA BARU'),
('6303', 'KABUPATEN BANJAR'),
('6304', 'KABUPATEN BARITO KUALA'),
('6305', 'KABUPATEN TAPIN'),
('6306', 'KABUPATEN HULU SUNGAI SELATAN'),
('6307', 'KABUPATEN HULU SUNGAI TENGAH'),
('6308', 'KABUPATEN HULU SUNGAI UTARA'),
('6309', 'KABUPATEN TABALONG'),
('6310', 'KABUPATEN TANAH BUMBU'),
('6311', 'KABUPATEN BALANGAN'),
('6371', 'KOTA BANJARMASIN'),
('6372', 'KOTA BANJAR BARU'),
('6401', 'KABUPATEN PASER'),
('6402', 'KABUPATEN KUTAI BARAT'),
('6403', 'KABUPATEN KUTAI KARTANEGARA'),
('6404', 'KABUPATEN KUTAI TIMUR'),
('6405', 'KABUPATEN BERAU'),
('6409', 'KABUPATEN PENAJAM PASER UTARA'),
('6411', 'KABUPATEN MAHAKAM HULU'),
('6471', 'KOTA BALIKPAPAN'),
('6472', 'KOTA SAMARINDA'),
('6474', 'KOTA BONTANG'),
('6501', 'KABUPATEN MALINAU'),
('6502', 'KABUPATEN BULUNGAN'),
('6503', 'KABUPATEN TANA TIDUNG'),
('6504', 'KABUPATEN NUNUKAN'),
('6571', 'KOTA TARAKAN'),
('7101', 'KABUPATEN BOLAANG MONGONDOW'),
('7102', 'KABUPATEN MINAHASA'),
('7103', 'KABUPATEN KEPULAUAN SANGIHE'),
('7104', 'KABUPATEN KEPULAUAN TALAUD'),
('7105', 'KABUPATEN MINAHASA SELATAN'),
('7106', 'KABUPATEN MINAHASA UTARA'),
('7107', 'KABUPATEN BOLAANG MONGONDOW UTARA'),
('7108', 'KABUPATEN SIAU TAGULANDANG BIARO'),
('7109', 'KABUPATEN MINAHASA TENGGARA'),
('7110', 'KABUPATEN BOLAANG MONGONDOW SELATAN'),
('7111', 'KABUPATEN BOLAANG MONGONDOW TIMUR'),
('7171', 'KOTA MANADO'),
('7172', 'KOTA BITUNG'),
('7173', 'KOTA TOMOHON'),
('7174', 'KOTA KOTAMOBAGU'),
('7201', 'KABUPATEN BANGGAI KEPULAUAN'),
('7202', 'KABUPATEN BANGGAI'),
('7203', 'KABUPATEN MOROWALI'),
('7204', 'KABUPATEN POSO'),
('7205', 'KABUPATEN DONGGALA'),
('7206', 'KABUPATEN TOLI-TOLI'),
('7207', 'KABUPATEN BUOL'),
('7208', 'KABUPATEN PARIGI MOUTONG'),
('7209', 'KABUPATEN TOJO UNA-UNA'),
('7210', 'KABUPATEN SIGI'),
('7211', 'KABUPATEN BANGGAI LAUT'),
('7212', 'KABUPATEN MOROWALI UTARA'),
('7271', 'KOTA PALU'),
('7301', 'KABUPATEN KEPULAUAN SELAYAR'),
('7302', 'KABUPATEN BULUKUMBA'),
('7303', 'KABUPATEN BANTAENG'),
('7304', 'KABUPATEN JENEPONTO'),
('7305', 'KABUPATEN TAKALAR'),
('7306', 'KABUPATEN GOWA'),
('7307', 'KABUPATEN SINJAI'),
('7308', 'KABUPATEN MAROS'),
('7309', 'KABUPATEN PANGKAJENE DAN KEPULAUAN'),
('7310', 'KABUPATEN BARRU'),
('7311', 'KABUPATEN BONE'),
('7312', 'KABUPATEN SOPPENG'),
('7313', 'KABUPATEN WAJO'),
('7314', 'KABUPATEN SIDENRENG RAPPANG'),
('7315', 'KABUPATEN PINRANG'),
('7316', 'KABUPATEN ENREKANG'),
('7317', 'KABUPATEN LUWU'),
('7318', 'KABUPATEN TANA TORAJA'),
('7322', 'KABUPATEN LUWU UTARA'),
('7325', 'KABUPATEN LUWU TIMUR'),
('7326', 'KABUPATEN TORAJA UTARA'),
('7371', 'KOTA MAKASSAR'),
('7372', 'KOTA PAREPARE'),
('7373', 'KOTA PALOPO'),
('7401', 'KABUPATEN BUTON'),
('7402', 'KABUPATEN MUNA'),
('7403', 'KABUPATEN KONAWE'),
('7404', 'KABUPATEN KOLAKA'),
('7405', 'KABUPATEN KONAWE SELATAN'),
('7406', 'KABUPATEN BOMBANA'),
('7407', 'KABUPATEN WAKATOBI'),
('7408', 'KABUPATEN KOLAKA UTARA'),
('7409', 'KABUPATEN BUTON UTARA'),
('7410', 'KABUPATEN KONAWE UTARA'),
('7411', 'KABUPATEN KOLAKA TIMUR'),
('7412', 'KABUPATEN KONAWE KEPULAUAN'),
('7413', 'KABUPATEN MUNA BARAT'),
('7414', 'KABUPATEN BUTON TENGAH'),
('7415', 'KABUPATEN BUTON SELATAN'),
('7471', 'KOTA KENDARI'),
('7472', 'KOTA BAUBAU'),
('7501', 'KABUPATEN BOALEMO'),
('7502', 'KABUPATEN GORONTALO'),
('7503', 'KABUPATEN POHUWATO'),
('7504', 'KABUPATEN BONE BOLANGO'),
('7505', 'KABUPATEN GORONTALO UTARA'),
('7571', 'KOTA GORONTALO'),
('7601', 'KABUPATEN MAJENE'),
('7602', 'KABUPATEN POLEWALI MANDAR'),
('7603', 'KABUPATEN MAMASA'),
('7604', 'KABUPATEN MAMUJU'),
('7605', 'KABUPATEN MAMUJU UTARA'),
('7606', 'KABUPATEN MAMUJU TENGAH'),
('8101', 'KABUPATEN MALUKU TENGGARA BARAT'),
('8102', 'KABUPATEN MALUKU TENGGARA'),
('8103', 'KABUPATEN MALUKU TENGAH'),
('8104', 'KABUPATEN BURU'),
('8105', 'KABUPATEN KEPULAUAN ARU'),
('8106', 'KABUPATEN SERAM BAGIAN BARAT'),
('8107', 'KABUPATEN SERAM BAGIAN TIMUR'),
('8108', 'KABUPATEN MALUKU BARAT DAYA'),
('8109', 'KABUPATEN BURU SELATAN'),
('8171', 'KOTA AMBON'),
('8172', 'KOTA TUAL'),
('8201', 'KABUPATEN HALMAHERA BARAT'),
('8202', 'KABUPATEN HALMAHERA TENGAH'),
('8203', 'KABUPATEN KEPULAUAN SULA'),
('8204', 'KABUPATEN HALMAHERA SELATAN'),
('8205', 'KABUPATEN HALMAHERA UTARA'),
('8206', 'KABUPATEN HALMAHERA TIMUR'),
('8207', 'KABUPATEN PULAU MOROTAI'),
('8208', 'KABUPATEN PULAU TALIABU'),
('8271', 'KOTA TERNATE'),
('8272', 'KOTA TIDORE KEPULAUAN'),
('9101', 'KABUPATEN FAKFAK'),
('9102', 'KABUPATEN KAIMANA'),
('9103', 'KABUPATEN TELUK WONDAMA'),
('9104', 'KABUPATEN TELUK BINTUNI'),
('9105', 'KABUPATEN MANOKWARI'),
('9106', 'KABUPATEN SORONG SELATAN'),
('9107', 'KABUPATEN SORONG'),
('9108', 'KABUPATEN RAJA AMPAT'),
('9109', 'KABUPATEN TAMBRAUW'),
('9110', 'KABUPATEN MAYBRAT'),
('9111', 'KABUPATEN MANOKWARI SELATAN'),
('9112', 'KABUPATEN PEGUNUNGAN ARFAK'),
('9171', 'KOTA SORONG'),
('9401', 'KABUPATEN MERAUKE'),
('9402', 'KABUPATEN JAYAWIJAYA'),
('9403', 'KABUPATEN JAYAPURA'),
('9404', 'KABUPATEN NABIRE'),
('9408', 'KABUPATEN KEPULAUAN YAPEN'),
('9409', 'KABUPATEN BIAK NUMFOR'),
('9410', 'KABUPATEN PANIAI'),
('9411', 'KABUPATEN PUNCAK JAYA'),
('9412', 'KABUPATEN MIMIKA'),
('9413', 'KABUPATEN BOVEN DIGOEL'),
('9414', 'KABUPATEN MAPPI'),
('9415', 'KABUPATEN ASMAT'),
('9416', 'KABUPATEN YAHUKIMO'),
('9417', 'KABUPATEN PEGUNUNGAN BINTANG'),
('9418', 'KABUPATEN TOLIKARA'),
('9419', 'KABUPATEN SARMI'),
('9420', 'KABUPATEN KEEROM'),
('9426', 'KABUPATEN WAROPEN'),
('9427', 'KABUPATEN SUPIORI'),
('9428', 'KABUPATEN MAMBERAMO RAYA'),
('9429', 'KABUPATEN NDUGA'),
('9430', 'KABUPATEN LANNY JAYA'),
('9431', 'KABUPATEN MAMBERAMO TENGAH'),
('9432', 'KABUPATEN YALIMO'),
('9433', 'KABUPATEN PUNCAK'),
('9434', 'KABUPATEN DOGIYAI'),
('9435', 'KABUPATEN INTAN JAYA'),
('9436', 'KABUPATEN DEIYAI'),
('9471', 'KOTA JAYAPURA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, 1, '$2y$10$iPUaBgyUBbOEzYfEPxef7eMkYLfg2NZpogJn32/T7PUXEntuka2ri', NULL, '2021-08-14 06:06:51', '2021-08-14 06:06:51'),
(2, 'User', 'user@user.com', NULL, 0, '$2y$10$6/iapPbHoiIpCAx06GjSieI/IZpQZHsl/ou6yhUd6vhWkAmYjwix.', NULL, '2021-08-14 06:06:52', '2021-08-14 06:06:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_pemain`
--
ALTER TABLE `m_pemain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_score`
--
ALTER TABLE `m_score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_tanding`
--
ALTER TABLE `m_tanding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_tim`
--
ALTER TABLE `m_tim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posisi_pemain`
--
ALTER TABLE `posisi_pemain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regencies`
--
ALTER TABLE `regencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_pemain`
--
ALTER TABLE `m_pemain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_score`
--
ALTER TABLE `m_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `m_tanding`
--
ALTER TABLE `m_tanding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_tim`
--
ALTER TABLE `m_tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posisi_pemain`
--
ALTER TABLE `posisi_pemain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
