-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 12:46 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita`
--

-- --------------------------------------------------------

--
-- Table structure for table `databerita`
--

CREATE TABLE `databerita` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` longtext NOT NULL,
  `writer` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `databerita`
--

INSERT INTO `databerita` (`id`, `title`, `category`, `image`, `writer`, `date`, `content`) VALUES
(1, 'Manfaat Kopi Hitam Tanpa Gula', 'Lifestyle', 'manfaat-kopi.jpg', 'Nabilla Tashandra', '01 Oktober 2021', 'Manfaat kopi hitam tak sekadar membantu kita untuk tetap terjaga dan lebih segar.\r\nDi antara sederet manfaat kopi hitam untuk kesehatan adalah membantu mengelola gejala dan bahkan mencegah beberapa penyakit.\r\nMeskipun kopi hitam dalam jumlah moderat baik bagi kesehatan, cara menyajikannya juga memengaruhi efeknya terhadap tubuh.\r\nMinum kopi tanpa gula menjadi salah satu cara sehat minum kopi.\r\nMenurut Healthline, gula, terutama karena jumlah fruktosanya yang tinggi, berkaitan dengan banyaj jenis penyakit serius, seperti obesitas dan diabetes.\r\nJika tidak bisa minum kopi hitam dan ingin sedikit pemanis, kita bisa menggunakan pemanis alami seperti stevia, menambahkan susu tanpa lemak, atau menyajikan buah potong untuk dimakan sambil minum kopi hitam.\r\n\r\nKopi hitam kaya akan antioksidan, yang dapat melawan kerusakan sel dan mengurangi risiko kondisi kesehatan serius seperti kanker dan penyakit jantung.\r\n\r\nDirektur terapi fisik dari FlexIt, Dr Helen Goldstein menjelaskan kepada Eat This Not That, sebuah penelitian mendukung anggapan tentang manfaat kopi hitam sebagai mood booster atau peningkat suasana hati.\r\nPeserta penelitian yang minum kopi ditemukan memiliki suasana hati yang lebih baik dan kewaspadaan yang lebih tinggi secara keseluruhan sekaligus memiliki tingkat kelelahan mental yang lebih rendah.\r\nSebabnya, kafein yang terkandung dalam kopi memblokir reseptor adenosin di otak kita, sehingga mencegah rasa lelah yang disebabkan oleh adenosin.\r\nNamun, penting untuk mempertimbangkan bahwa konsumsi kopi rutin juga bisa menyebabkan kecanduan.\r\n\r\nSeseorang yang mengalami kecanduan kopi mungkin bisa merasakan kelelahan atau sakit kepala ketika tidak meminumnya sehari saja.\r\nSeiring bertambahnya usia, kekuatan memori dan skill kognitif kita menurun, sehingga lebih rentan terkena demensia dan Parkinson.\r\nManfaat kopi hitam termasuk membantu meningkatkan aliran darah ke otak, yang dapat bermanfaat bagi fungsi kognitif serta memiliki efek perlindungan terhadap gangguan memori.\r\nMenurut Doctor NDTV, minum kopi hitam dapat membantu otak dan saraf kita tetap aktif sepanjang hari, yang pada akhirnya dapat menurunkan risiko demensia. Asupan kopi hitam rutin diketahui dapat menurunkan risiko Parkinson hingga 60 persen.\r\n'),
(2, 'Jokowi Resmikan Terminal Baru Bandara Mopah Merauke', 'Economy', 'bandara-mopah.jpeg', 'Wella Andany', '03 Oktober 2021', 'Presiden Joko Widodo meresmikan terminal baru Bandara Mopah di Kabupaten Merauke, Papua dengan menandatangani prasasti sebagai tanda peresmian pada Minggu (3/9).\r\n\r\n\"Bandara Mopah Merauke yang berada di ujung paling timur Indonesia ini terus kita kembangkan,\" ujar Jokowi, dalam sambutannya, Minggu (3/10).\r\n\r\nPengembangan bandara sendiri merupakan bentuk dukungan Kementerian Perhubungan dalam rangka menyukseskan pelaksanaan Pekan Olahraga Nasional (PON) XX 2021 dan Pekan Paralimpiade Nasional (Papernas) XVI di Papua.\r\n\r\nSaat ini, bandara telah memiliki terminal penumpang yang baru seluas 7.200 meter persegi dengan kapasitas sekitar 638 ribu penumpang per tahun.\r\n\r\nJokowi berharap, keberadaan terminal baru ini dapat meningkatkan pelayanan kualitas untuk penumpang. Ke depan, lanjutnya, kapasitas terminal bandara akan terus ditingkatkan untuk mengantisipasi peningkatan mobilitas masyarakat dan aktivitas ekonomi yang ada.\r\n\r\nPeresmian ditandai dengan pemukulan tifa, alat musik tradisional Papua, dan penandatangan prasasti.\r\n\r\nSelain menghadiri peresmian terminal baru Bandara Mopah, Jokowi juga dijadwalkan untuk meresmikan Pos Lintas Batas Negara Sota di Kabupaten Merauke.\r\n\r\nSelain itu, Jokowi juga dijadwalkan meninjau pelaksanaan vaksinasi Covid-19 bagi masyarakat dan pelajar di Merauke dan meresmikan RS Jenderal TNI L.B Moerdani.\r\n\r\nSerangkaian kegiatan Kepala Negara hari ini dilakukan usai Jokowi resmi membuka gelaran PON Papua ke-20 yang berlangsung di Stadion Lukas Enembe, Sentani, Jayapura, Sabtu (2/10) malam.\r\n\r\nDalam pidatonya, Jokowi mengaku bangga karena PON untuk kali pertama bisa digelar di tanah Papua.\r\n\r\nMenurutnya, hal itu menunjukkan kemajuan Papua dalam hal infrastruktur dan kemampuan menyelenggarakan acara besar di kancah nasional dan internasional.\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `databerita`
--
ALTER TABLE `databerita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `databerita`
--
ALTER TABLE `databerita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
