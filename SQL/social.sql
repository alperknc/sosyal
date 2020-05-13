-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 12:28 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_body` text COLLATE utf8_turkish_ci NOT NULL,
  `posted_by` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `posted_to` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) COLLATE utf8_turkish_ci NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(1, 'hi ', 'denemeye_devwam', 'qarizma_78', '2020-05-02 23:38:10', 'no', 26),
(2, 'mrb', 'denemeye_devwam', 'qarizma_78', '2020-05-02 23:39:02', 'no', 26),
(3, 'wtf', 'denemeye_devwam', 'alper_akinci', '2020-05-02 23:39:09', 'no', 25),
(4, 'mal', 'alper_akinci', 'alper_akinci', '2020-05-03 15:50:42', 'no', 24),
(5, 'vay mk', 'memati_bas', 'alper_akinci', '2020-05-03 19:54:05', 'no', 14),
(6, 'deneme\r\n', 'alper_akinci', 'alper_akinci', '2020-05-06 14:07:34', 'no', 32),
(7, 'İlk yorum', 'kazim_danaci', 'kazim_danaci', '2020-05-06 15:28:25', 'no', 41),
(8, 'sasadadssd', 'memati_bas', 'alper_akinci', '2020-05-06 15:41:38', 'no', 40),
(9, 'asdasd', 'memati_bas', 'alper_akinci', '2020-05-06 15:41:39', 'no', 40),
(10, 'zz<xzx<', 'alper_akinci', 'alper_akinci', '2020-05-06 17:31:30', 'no', 40),
(11, 'sadsdaasd', 'alper_akinci', 'alper_akinci', '2020-05-06 17:31:38', 'no', 40),
(12, 'deneme', 'alper_akinci', 'alper_akinci', '2020-05-06 18:49:07', 'no', 43),
(13, 'as', 'qarizma_78', 'qarizma_78', '2020-05-06 20:45:03', 'no', 46),
(14, 'sa', 'qarizma_78', 'qarizma_78', '2020-05-06 20:52:07', 'no', 46),
(15, 'asdasd', 'alper_akinci', 'memati_bas', '2020-05-10 20:33:40', 'no', 77),
(16, 'asdasd', 'alper_akinci', 'memati_bas', '2020-05-10 20:33:57', 'no', 77);

-- --------------------------------------------------------

--
-- Table structure for table `deneme`
--

CREATE TABLE `deneme` (
  `userId` int(11) NOT NULL,
  `userName` varchar(111) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(111) COLLATE utf8_turkish_ci NOT NULL,
  `firstName` varchar(111) COLLATE utf8_turkish_ci NOT NULL,
  `lastName` varchar(111) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `user_to` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `user_from` varchar(60) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `user_to`, `user_from`) VALUES
(3, 'kazim_danaci', 'memati_bas'),
(4, 'alper_akinci', 'yusuf_alyuvar');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `username`, `post_id`) VALUES
(16, 'alper_akinci', 24),
(18, 'alper_akinci', 27),
(19, 'memati_bas', 25),
(20, 'memati_bas', 24),
(21, 'memati_bas', 23),
(22, 'memati_bas', 22),
(23, 'memati_bas', 21),
(24, 'memati_bas', 20),
(25, 'memati_bas', 15),
(26, 'memati_bas', 14),
(28, 'memati_bas', 9),
(29, 'memati_bas', 8),
(30, 'memati_bas', 7),
(31, 'memati_bas', 6),
(32, 'memati_bas', 5),
(33, 'alper_akinci', 28),
(34, 'alper_akinci', 17),
(37, 'alper_akinci', 31),
(38, 'kazim_danaci', 41),
(40, 'alper_akinci', 39),
(41, 'alper_akinci', 40),
(43, 'alper_akinci', 45),
(44, 'alper_akinci', 44),
(45, 'alper_akinci', 43),
(46, 'qarizma_78', 46),
(47, 'qarizma_78', 60),
(48, 'qarizma_78', 59),
(50, 'alper_akinci', 59),
(51, 'memati_bas', 64),
(52, 'memati_bas', 43),
(53, 'memati_bas', 40),
(54, 'memati_bas', 39),
(55, 'alper_akinci', 63),
(61, 'alper_akinci', 77);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_to` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `user_from` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `body` text COLLATE utf8_turkish_ci NOT NULL,
  `date` datetime NOT NULL,
  `opened` varchar(3) COLLATE utf8_turkish_ci NOT NULL,
  `viewed` varchar(3) COLLATE utf8_turkish_ci NOT NULL,
  `deleted` varchar(3) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_to`, `user_from`, `body`, `date`, `opened`, `viewed`, `deleted`) VALUES
(1, 'memati_bas', 'alper_akinci', 'ilk mesaj', '2020-05-06 00:00:00', 'yes', 'yes', 'no'),
(2, 'memati_bas', 'alper_akinci', 'iki', '2020-05-06 16:51:30', 'yes', 'yes', 'no'),
(3, 'memati_bas', 'alper_akinci', 'üç', '2020-05-06 16:51:38', 'yes', 'yes', 'no'),
(4, 'memati_bas', 'alper_akinci', '4', '2020-05-06 16:51:41', 'yes', 'yes', 'no'),
(5, 'alper_akinci', 'memati_bas', 'ilk mesaj', '2020-05-06 17:02:59', 'yes', 'yes', 'no'),
(6, 'alper_akinci', 'memati_bas', '2', '2020-05-06 17:03:01', 'yes', 'yes', 'no'),
(7, 'alper_akinci', 'memati_bas', '3', '2020-05-06 17:03:02', 'yes', 'yes', 'no'),
(8, 'alper_akinci', 'memati_bas', '4', '2020-05-06 17:03:04', 'yes', 'yes', 'no'),
(9, 'memati_bas', 'alper_akinci', 'devam', '2020-05-06 17:04:49', 'yes', 'yes', 'no'),
(10, 'memati_bas', 'alper_akinci', 'et', '2020-05-06 17:04:57', 'yes', 'yes', 'no'),
(11, 'memati_bas', 'alper_akinci', 'de', '2020-05-06 17:05:26', 'yes', 'yes', 'no'),
(12, 'memati_bas', 'alper_akinci', 'de', '2020-05-06 17:05:30', 'yes', 'yes', 'no'),
(13, 'memati_bas', 'alper_akinci', 'de', '2020-05-06 17:05:33', 'yes', 'yes', 'no'),
(14, 'alper_akinci', 'qarizma_78', 'Sa', '2020-05-06 00:13:00', 'yes', 'yes', 'no'),
(15, 'qarizma_78', 'alper_akinci', 'as', '2020-05-06 17:08:20', 'yes', 'yes', 'no'),
(16, 'qarizma_78', 'alper_akinci', 'nbr', '2020-05-06 17:08:24', 'yes', 'yes', 'no'),
(17, 'memati_bas', 'alper_akinci', 'Uzun Mesaj Uzun Mesaj Uzun Mesaj Uzun Mesaj Uzun Mesaj Uzun Mesaj Uzun Mesaj Uzun Mesaj Uzun Mesaj Uzun Mesaj Uzun Mesaj Uzun Mesaj ', '2020-05-06 17:19:47', 'yes', 'yes', 'no'),
(18, 'memati_bas', 'alper_akinci', 'Uzun Mesaj Uzun Mesaj Uzun Mesaj Uzun Mesaj ', '2020-05-06 17:19:54', 'yes', 'yes', 'no'),
(19, 'memati_bas', 'alper_akinci', 'Uzun Mesaj Uzun Mesaj Uzun Mesaj Uzun Mesaj Uzun Mesaj Uzun Mesaj ', '2020-05-06 17:19:58', 'yes', 'yes', 'no'),
(20, 'memati_bas', 'alper_akinci', 'sa', '2020-05-06 17:20:46', 'yes', 'yes', 'no'),
(21, 'memati_bas', 'alper_akinci', 'as', '2020-05-06 17:20:52', 'yes', 'yes', 'no'),
(22, 'memati_bas', 'alper_akinci', 'SA', '2020-05-06 17:21:09', 'yes', 'yes', 'no'),
(23, 'memati_bas', 'alper_akinci', 'as', '2020-05-06 17:21:11', 'yes', 'yes', 'no'),
(24, 'hayin_kostok', 'alper_akinci', 'Maraba salam', '2020-05-06 17:48:54', 'no', 'no', 'no'),
(25, 'memati_bas', 'alper_akinci', 'DNEME', '2020-05-06 18:12:25', 'yes', 'yes', 'no'),
(26, 'hayin_kostok', 'alper_akinci', 'lan maraba', '2020-05-06 18:25:49', 'no', 'no', 'no'),
(27, 'qarizma_78', 'memati_bas', 'Bir mesaj benden sana', '2020-05-06 19:55:50', 'yes', 'yes', 'no'),
(28, 'qarizma_78', 'memati_bas', 'Bir mesaj benden sana', '2020-05-06 19:55:50', 'yes', 'yes', 'no'),
(29, 'qarizma_78', 'memati_bas', 'Benden sana bir mesaj', '2020-05-06 20:03:44', 'yes', 'yes', 'no'),
(30, 'qarizma_78', 'memati_bas', 'Benden sana bir mesaj', '2020-05-06 20:03:44', 'yes', 'yes', 'no'),
(31, 'alper_akinci', 'memati_bas', 'Sanada', '2020-05-06 20:03:52', 'yes', 'no', 'no'),
(32, 'alper_akinci', 'memati_bas', 'Sanada', '2020-05-06 20:03:52', 'yes', 'no', 'no'),
(33, 'alper_akinci', 'memati_bas', 'çift gidiya', '2020-05-06 20:04:22', 'yes', 'no', 'no'),
(34, 'alper_akinci', 'memati_bas', 'gitmeya', '2020-05-06 20:04:28', 'yes', 'no', 'no'),
(35, 'qarizma_78', 'memati_bas', 'Benden ', '2020-05-06 20:05:54', 'yes', 'yes', 'no'),
(36, 'alper_akinci', 'qarizma_78', 'ii sn', '2020-05-06 20:45:28', 'yes', 'no', 'no'),
(37, 'memati_bas', 'memati_bas', 'Maraba abi', '2020-05-08 14:15:24', 'yes', 'no', 'no'),
(38, 'qarizma_78', 'memati_bas', 'Deneme', '2020-05-08 14:15:45', 'no', 'no', 'no'),
(39, 'alper_akinci', 'memati_bas', 'Deneme', '2020-05-08 14:15:54', 'yes', 'no', 'no'),
(40, 'alper_akinci', 'memati_bas', 'sa', '2020-05-10 20:20:24', 'yes', 'no', 'no'),
(41, 'memati_bas', 'alper_akinci', 'as', '2020-05-10 20:20:49', 'yes', 'no', 'no'),
(42, 'memati_bas', 'alper_akinci', 'sa', '2020-05-10 20:35:34', 'yes', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `body` text COLLATE utf8_turkish_ci NOT NULL,
  `added_by` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `user_to` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `date_added` datetime NOT NULL,
  `user_closed` varchar(3) COLLATE utf8_turkish_ci NOT NULL,
  `deleted` varchar(3) COLLATE utf8_turkish_ci NOT NULL,
  `likes` int(11) NOT NULL,
  `image` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `added_by`, `user_to`, `date_added`, `user_closed`, `deleted`, `likes`, `image`) VALUES
(5, 'S..tir olup gitmek kolaysa senin için, el sallamak sorun değil benim için!', 'alper_akinci', 'none', '2020-05-01 21:46:02', 'no', 'yes', 1, ''),
(6, 'Ne kadar içersen iç, sadece başın döner. Gidenler değil.', 'alper_akinci', 'none', '2020-05-01 21:49:24', 'no', 'yes', 1, ''),
(7, 'Çektiğim dumana benziyorsun, bedenime girince azıtıyosun', 'alper_akinci', 'none', '2020-05-01 21:49:32', 'no', 'yes', 1, ''),
(8, 'Ben gülüşüne öldüm, o ölüşüme güldü farklıydık işte....', 'alper_akinci', 'none', '2020-05-01 21:50:46', 'no', 'yes', 1, ''),
(9, 'Masada birakilmis çay gibiyim gittikçe soguyorum hayattan..', 'alper_akinci', 'none', '2020-05-01 21:59:56', 'no', 'yes', 1, ''),
(13, 'Arkamdan beste yapıcağına yüzme söylede düet yapalım', 'alper_akinci', 'none', '2020-05-02 17:40:16', 'no', 'yes', 0, ''),
(14, '-Kanka saat kaç?\r\n+Kemiği et qeçiyor.\r\n-Eti kemik geçiyo deil miydi o ya ?\r\n+ Saatler geri alındı ya gerizekalı !', 'alper_akinci', 'none', '2020-05-02 17:41:49', 'no', 'yes', 1, ''),
(15, '-Cenneti merak ediyorlarmış, bi gülsene aşkım:)\r\n+Zaaa xdxd\r\n-Tamam sus Allah\'ın belası, defol git.', 'alper_akinci', 'none', '2020-05-02 17:42:03', 'no', 'yes', 1, ''),
(16, 'buralar şuan dutluk', 'hayin_kostok', 'none', '2020-05-02 17:43:38', 'no', 'no', 0, ''),
(17, 'Dursun bir gün temeli sikayet etmek icin karakola gider .\r\n-komser bey ben bu temelden sikayetciyim.\r\nkomser: Peki neden?\r\n-Bana bu temel hep salak diyor.\r\ntemeli almislar komser sormus\r\n... komser : sen bu cocugua niye salak diyorsun .\r\ntemel : kanitlayim dursun git bak bakim ben kahvedemiyim .\r\nDursun kosarak cikmis\r\nkomser : Wayy salak telefon etmek varken', 'denemeye_devwam', 'none', '2020-05-02 17:57:39', 'no', 'no', 1, ''),
(18, 'Ajax çalış oc', 'denemeye_devwam', 'none', '2020-05-02 18:14:01', 'no', 'no', 0, ''),
(20, 'Afferim', 'alper_akinci', 'none', '2020-05-02 19:10:46', 'no', 'yes', 1, ''),
(21, 'İlişkiler 5 Aşamadan Oluşur.. :\r\n1- Göz Göze\r\n2- El Ele\r\n3- Et Ete\r\n4- Göt Göte\r\n5- Git Öte ', 'alper_akinci', 'none', '2020-05-02 19:15:58', 'no', 'yes', 1, ''),
(22, '- Alo baba kayboldum.\r\n+ Nerdesin ?\r\n- Kapat baba kapat.', 'alper_akinci', 'none', '2020-05-02 19:16:02', 'no', 'yes', 1, ''),
(23, '\"Saat 8 yönünde\"dediklernde bi saate bakıyorm saat mi diye,bide 8e bakıyorm yön mü diye,bide kendime bakıyorm,ne diyom lan diye.', 'alper_akinci', 'none', '2020-05-02 19:17:11', 'no', 'yes', 1, ''),
(24, 'Somethimh', 'alper_akinci', 'none', '2020-05-02 18:49:53', 'no', 'yes', 2, ''),
(25, 'Somethimh', 'alper_akinci', 'none', '2020-05-02 18:51:21', 'no', 'yes', 1, ''),
(26, 'Selam qızLar.!.', 'qarizma_78', 'none', '2020-05-02 21:14:53', 'no', 'no', 0, ''),
(27, 'Ben bir şey yapmadım kaşındı kaşıdım', 'memati_bas', 'none', '2020-05-03 18:10:13', 'no', 'no', 1, ''),
(28, 'Benim doğum günüm senin ölüm günün kutlu olsun -Polat Alemdar', 'memati_bas', 'none', '2020-05-03 18:10:53', 'no', 'no', 1, ''),
(30, 'Popupuppup', 'alper_akinci', 'none', '2020-05-03 20:49:45', 'no', 'yes', 0, ''),
(31, 'Popup ho', 'alper_akinci', 'none', '2020-05-03 20:55:16', 'no', 'yes', 1, ''),
(32, 'sa', 'alper_akinci', 'none', '2020-05-05 13:39:05', 'no', 'yes', 0, ''),
(33, 'Mrb', 'alper_akinci', 'qarizma_78', '2020-05-05 13:39:18', 'no', 'yes', 0, ''),
(34, 'silmelik post', 'alper_akinci', 'none', '2020-05-06 14:45:45', 'no', 'yes', 0, ''),
(35, 'silmelik post', 'alper_akinci', 'none', '2020-05-06 14:45:50', 'no', 'yes', 0, ''),
(36, 'post var dediler geldik', 'alper_akinci', 'none', '2020-05-06 14:46:07', 'no', 'yes', 0, ''),
(37, 'pes 2008 e gel knk\r\n', 'alper_akinci', 'memati_bas', '2020-05-06 14:46:21', 'no', 'yes', 0, ''),
(38, 'adasdds', 'alper_akinci', 'memati_bas', '2020-05-06 14:56:23', 'no', 'yes', 0, ''),
(39, 'sa', 'alper_akinci', 'memati_bas', '2020-05-06 14:56:38', 'no', 'no', 2, ''),
(40, 'maraba', 'alper_akinci', 'none', '2020-05-06 15:19:08', 'no', 'no', 2, ''),
(41, 'Ben yeni geldim', 'kazim_danaci', 'none', '2020-05-06 15:28:10', 'no', 'no', 1, ''),
(42, 'Ben gidiyorum', 'kazim_danaci', 'none', '2020-05-06 15:29:11', 'no', 'no', 0, ''),
(43, 'asdsadsad', 'alper_akinci', 'none', '2020-05-06 18:13:55', 'no', 'no', 2, ''),
(44, 'deneme', 'alper_akinci', 'none', '2020-05-06 18:49:18', 'no', 'yes', 1, ''),
(45, 'deneme', 'alper_akinci', 'none', '2020-05-06 18:49:44', 'no', 'yes', 1, ''),
(46, 'selam', 'qarizma_78', 'alper_akinci', '2020-05-06 20:44:56', 'no', 'no', 1, ''),
(47, 'sads', 'qarizma_78', 'alper_akinci', '2020-05-06 20:45:45', 'no', 'yes', 0, ''),
(48, 'sadsdadas', 'qarizma_78', 'none', '2020-05-06 20:45:51', 'no', 'yes', 0, ''),
(49, 'sadsdadas', 'qarizma_78', 'none', '2020-05-06 20:45:53', 'no', 'yes', 0, ''),
(50, 'sadsdadas', 'qarizma_78', 'none', '2020-05-06 20:45:57', 'no', 'yes', 0, ''),
(51, 'dsasadsd', 'qarizma_78', 'none', '2020-05-06 20:46:19', 'no', 'yes', 0, ''),
(52, 'dsasadsd', 'qarizma_78', 'none', '2020-05-06 20:46:22', 'no', 'yes', 0, ''),
(53, 'as', 'qarizma_78', 'none', '2020-05-06 20:51:42', 'no', 'yes', 0, ''),
(54, 'as', 'qarizma_78', 'none', '2020-05-06 20:51:44', 'no', 'yes', 0, ''),
(55, 'as', 'qarizma_78', 'none', '2020-05-06 20:51:47', 'no', 'yes', 0, ''),
(56, 'as', 'qarizma_78', 'none', '2020-05-06 20:51:49', 'no', 'yes', 0, ''),
(57, 'as', 'qarizma_78', 'none', '2020-05-06 20:51:51', 'no', 'yes', 0, ''),
(58, 'sa', 'qarizma_78', 'none', '2020-05-06 20:52:24', 'no', 'yes', 0, ''),
(59, 'sadsda', 'qarizma_78', 'none', '2020-05-06 20:53:07', 'no', 'no', 2, ''),
(60, 'asdadsads', 'qarizma_78', 'none', '2020-05-06 20:53:08', 'no', 'yes', 1, ''),
(61, 'saasdads', 'qarizma_78', 'none', '2020-05-06 20:53:09', 'no', 'yes', 0, ''),
(62, 'saddsaasd', 'qarizma_78', 'none', '2020-05-06 20:53:10', 'no', 'yes', 0, ''),
(63, 'Gösterilecek başka bir şey yok! ', 'ahmet_demir', 'none', '2020-05-08 03:09:35', 'no', 'no', 1, ''),
(64, 'usta', 'memati_bas', 'none', '2020-05-08 14:38:43', 'no', 'yes', 1, 'assets/images/posts/5eb544c3b7769unnamed.jpg'),
(65, 'sa', 'memati_bas', 'none', '2020-05-08 14:41:06', 'no', 'yes', 0, 'assets/images/posts/5eb54552e1eecWhatsApp Image 2019-05-11 at 17.06.55.jpeg'),
(66, 'sa', 'memati_bas', 'none', '2020-05-08 14:41:29', 'no', 'yes', 0, 'assets/images/posts/5eb5456941729WhatsApp Image 2019-05-29 at 00.23.01.jpeg'),
(67, 'sa', 'memati_bas', 'none', '2020-05-08 14:41:53', 'no', 'yes', 0, 'assets/images/posts/5eb54581e9893WhatsApp Image 2019-05-29 at 00.39.14.jpeg'),
(70, 'are you you are', 'memati_bas', 'alper_akinci', '2020-05-08 14:54:50', 'no', 'yes', 0, 'assets/images/posts/5eb54552e1eecWhatsApp Image 2019-05-11 at 17.06.55.jpeg'),
(71, 'sa', 'memati_bas', 'none', '2020-05-08 15:03:32', 'no', 'yes', 0, 'assets/images/posts/5eb54a9427780unnamed.jpg'),
(72, 'sa', 'memati_bas', 'alper_akinci', '2020-05-08 15:04:26', 'no', 'yes', 0, ''),
(73, 'as', 'memati_bas', 'alper_akinci', '2020-05-08 15:08:50', 'no', 'yes', 0, ''),
(74, 's', 'memati_bas', 'none', '2020-05-08 15:10:05', 'no', 'yes', 0, 'assets/images/posts/5eb54c1da35edWhatsApp Image 2020-05-08 at 13.40.36.jpeg'),
(75, '.', 'memati_bas', 'none', '2020-05-09 17:26:06', 'no', 'yes', 0, 'assets/images/posts/5eb6bd7e71b5eindir.jpg'),
(76, '.', 'memati_bas', 'none', '2020-05-09 17:26:10', 'no', 'yes', 0, 'assets/images/posts/5eb6bd8260cbdindir.jpg'),
(77, 'are you you are?', 'memati_bas', 'alper_akinci', '2020-05-09 17:26:58', 'no', 'yes', 1, 'assets/images/posts/5eb6de14497e4WhatsApp Image 2019-05-11 at 17.06.55.jpeg'),
(78, 'deneme1', 'memati_bas', 'alper_akinci', '2020-05-09 00:00:00', 'no', 'yes', 0, ''),
(79, 'deneme', 'memati_bas', 'alper_akinci', '2020-05-09 00:00:00', 'no', 'yes', 0, ''),
(80, 'asd', 'asd', 'asd', '2020-05-09 00:00:00', 'no', 'yes', 0, 'assets/images/posts/5eb6ede387786WhatsApp Image 2019-05-29 at 00.39.14.jpeg'),
(81, 'deneme', 'memati_bas', 'alper_akinci', '2020-05-09 00:00:00', 'no', 'yes', 0, 'assets/images/posts/5eb6edfbdc029WhatsApp Image 2019-05-11 at 17.06.55.jpeg'),
(82, 'deneme', 'memati_bas', 'alper_akinci', '2020-05-09 00:00:00', 'no', 'yes', 0, 'assets/images/posts/5eb6ee1d142f5WhatsApp Image 2019-05-29 at 00.23.01.jpeg'),
(83, 'deneme2', 'alper_akinci', 'none', '2020-05-12 00:00:00', 'no', 'no', 0, ''),
(84, 'deneme3', 'alper_akinci', '', '2020-05-12 00:00:00', 'no', 'yes', 0, ''),
(85, 'deneme4', 'alper_akinci', 'none', '2020-05-12 00:00:00', 'no', 'no', 0, ''),
(86, '.', 'alper_akinci', 'none', '2020-05-12 19:03:05', 'no', 'no', 0, 'assets/images/posts/5ebac8b94ce16EX0dijOWAAA5k7i.jpg'),
(87, 'xd', 'alper_akinci', 'none', '2020-05-12 19:03:14', 'no', 'no', 0, 'assets/images/posts/5ebac8c23f9dcEX06jn2XsAADf-Y.jpg'),
(88, '.', 'memati_bas', 'none', '2020-05-12 19:03:54', 'no', 'no', 0, 'assets/images/posts/5ebac8ea250bfEXqC6x-XYAE7YP0.jpg'),
(89, '.', 'memati_bas', 'none', '2020-05-12 19:04:02', 'no', 'no', 0, 'assets/images/posts/5ebac8f2b79ebEXrGUyGX0AUdeuK.jpg'),
(90, 'sonnnnnnnnnnnnnnnnnn', 'memati_bas', 'none', '2020-05-12 19:04:27', 'no', 'no', 0, ''),
(91, 'dnemednemednemednemednemedneme', 'memati_bas', 'none', '2020-05-12 19:04:37', 'no', 'no', 0, ''),
(92, '.', 'yusuf_alyuvar', 'none', '2020-05-12 19:05:11', 'no', 'no', 0, 'assets/images/posts/5ebac93712ed4EXsDBrKX0AcveNl.jpg'),
(93, '.', 'yusuf_alyuvar', 'none', '2020-05-12 19:05:14', 'no', 'no', 0, 'assets/images/posts/5ebac93a804d6EXw0V36XQAAAlWr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `signup_date` date NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `num_posts` int(11) NOT NULL,
  `num_likes` int(11) NOT NULL,
  `user_closed` varchar(5) COLLATE utf8_turkish_ci NOT NULL,
  `friend_array` text COLLATE utf8_turkish_ci NOT NULL,
  `admin` varchar(3) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `num_posts`, `num_likes`, `user_closed`, `friend_array`, `admin`) VALUES
(1, 'Alper', 'Akıncı', 'alper_akıncı', 'A@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-03-01', 'assets/images/profile_pics/default/head_sun_flower.png', 0, 0, 'yes', ',', 'no'),
(2, 'Alper', 'Akıncı', 'alper_akinci_1', 'Aa@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-03-01', 'assets/images/profile_pics/default/head_sun_flower.png', 6, 0, 'yes', ',', 'no'),
(3, 'Aaa', 'Akıncı', '', 'Abcd@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-03-01', 'assets/images/profile_pics/default/head_sun_flower.png', 0, 0, 'yes', ',', 'no'),
(4, 'Alper', 'Abdulrezzak', 'alper_abdulrezzak', 'Alper@akinci.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-03-01', 'assets/images/profile_pics/default/head_carrot.png', 0, 0, 'yes', ',', 'no'),
(5, 'Alper', 'Abdulrezzak', 'alper_abdulrezzak_1', 'Ad@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-03-01', 'assets/images/profile_pics/default/head_carrot.png', 0, 0, 'yes', ',', 'no'),
(7, 'Alper', 'Akıncı', 'alper_akıncı_2', 'Aaaa@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-01', 'assets/images/profile_pics/default/head_sun_flower.png', 0, 0, 'no', ',', 'no'),
(8, 'Alper', 'Akıncı', 'alper_akıncı_3', 'Aaaaaa@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-01', 'assets/images/profile_pics/default/head_sun_flower.png', 0, 0, 'no', ',', 'no'),
(9, 'Alper', 'Akıncı', 'alper_akinci', 'Aws@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-01', 'assets/images/profile_pics/alper_akincifb8a2b5baf6df38970b9ba286c42789bn.jpeg', 31, 23, 'no', ',hayin_kostok,qarizma_78,memati_bas,ahmet_demir,kazim_danaci,', 'yes'),
(10, 'Alper', 'Ak', 'alper_ak', 'Fak@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-02', 'assets/images/profile_pics/default/head_pete_river.png', 0, 0, 'yes', ',qarizma_78,', 'no'),
(11, 'Hayin', 'Kostok', 'hayin_kostok', 'Tokmakla@gmail.com', '3d2172418ce305c7d16d4b05597c6a59', '2020-05-02', 'assets/images/profile_pics/default/head_sun_flower.png', 1, 0, 'no', ',alper_akinci,qarizma_78,', 'no'),
(12, 'Denemeye', 'Devwam', 'denemeye_devwam', 'Dewam@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-02', 'assets/images/profile_pics/default/head_alizarin.png', 3, 1, 'no', ',qarizma_78,', 'no'),
(13, 'Qarizma', '78', 'qarizma_78', '78@gmail.com', 'b7bc2a2f5bb6d521e64c8974c143e9a0', '2020-05-02', 'assets/images/profile_pics/qarizma_7823bcfedb667724862962b18df98b1834n.jpeg', 18, 4, 'no', ',alper_akinci,hayin_kostok,denemeye_devwam,alper_ak,', 'no'),
(14, 'Haktan', 'Kaçık', 'memati_bas', 'Memeti@gmail.com', 'a3d147542a1700447d6a625f4055d143', '2020-05-03', 'assets/images/profile_pics/memati_bas4ad4d9b56bbd5fef5e7ea6d86964b535n.jpeg', 21, 0, 'no', ',alper_akinci,', 'no'),
(15, 'Kazım', 'Danacı', 'kazim_danaci', 'Danaci@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-06', 'assets/images/profile_pics/default/head_deep_blue.png', 2, 1, 'no', ',alper_akinci,', 'no'),
(16, 'Alper', 'Akaaa', 'alper_akaaa', 'Wolkada781@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-07', 'assets/images/profile_pics/default/head_alizarin.png', 0, 0, 'yes', ',', 'no'),
(17, 'Alper', 'Ak', 'alper_ak_1', 'Wolkada78@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-07', 'assets/images/profile_pics/default/head_belize_hole.png', 0, 0, 'no', ',', 'no'),
(18, 'Alper', 'Ak', 'alper_ak_2', 'Wolkada78@gmail.com2', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-07', 'assets/images/profile_pics/default/head_carrot.png', 0, 0, 'no', ',', 'no'),
(19, 'Alper', 'Ak', 'alper_ak_3', 'Wolkada783@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-07', 'assets/images/profile_pics/default/head_alizarin.png', 0, 0, 'yes', ',', 'no'),
(20, 'Alper', 'Ak', 'alper_ak_4', 'Wolkada784@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-07', 'assets/images/profile_pics/default/head_nephritis.png', 0, 0, 'no', ',', 'no'),
(21, 'Alper', 'Ak', 'alper_ak_5', 'Wolkada785@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-07', 'assets/images/profile_pics/default/head_deep_blue.png', 0, 0, 'no', ',', 'no'),
(22, 'Alper', 'Ak', 'alper_ak_6', 'Wolkada786@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-07', 'assets/images/profile_pics/default/head_emerald.png', 0, 0, 'no', ',', 'no'),
(23, 'Alper', 'Ak', 'alper_ak_7', 'Wolkada787@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-07', 'assets/images/profile_pics/default/head_belize_hole.png', 0, 0, 'yes', ',', 'no'),
(24, 'Alper', 'Ak', 'alper_ak_8', 'Wolkada788@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-07', 'assets/images/profile_pics/default/head_amethyst.png', 0, 0, 'no', ',', 'no'),
(25, 'Sinan', 'Canyakar', 'sinan_canyakar', 'Canyakar@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-07', 'assets/images/profile_pics/default/head_emerald.png', 0, 0, 'yes', ',', 'no'),
(26, 'Niyazi', 'Yarmayan', 'niyazi_yarmayan', 'Niyazi@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-07', 'assets/images/profile_pics/default/head_belize_hole.png', 0, 0, 'no', ',', 'no'),
(27, 'Rüstem', 'Kardashian', 'rustem_kardashian', 'Rustem@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-07', 'assets/images/profile_pics/default/head_deep_blue.png', 0, 0, 'no', ',', 'no'),
(28, 'Ahmet', 'Demir', 'ahmet_demir', 'demir@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-08', 'assets/images/profile_pics/default/head_pete_river.png', 1, 1, 'yes', ',alper_akinci,', 'no'),
(29, 'Yusuf', 'Alyuvar', 'yusuf_alyuvar', 'yusuf@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-08', 'assets/images/profile_pics/yusuf_alyuvar304077500b5f0c77adf2a2e62383233cn.jpeg', 2, 0, 'no', ',', 'no'),
(30, 'Kardelen', 'Ayşe', 'kardelen_ayse', 'ayse@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-08', 'assets/images/profile_pics/default/head_green_sea.png', 0, 0, 'no', ',', 'no'),
(41, 'Çetin', 'Çizmeli', 'cetin_cizmeli', 'Cetin@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-08', 'assets/images/profile_pics/default/head_deep_blue.png', 0, 0, 'no', ',', 'no'),
(42, 'Ismail', 'Kuşuöten', 'ismail_kusuoten', 'Ismail@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-08', 'assets/images/profile_pics/default/head_alizarin.png', 0, 0, 'no', ',', 'no'),
(43, 'Cemal', 'Gönlüdar', 'cemal_gonludar', 'Cemal@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-08', 'assets/images/profile_pics/default/head_green_sea.png', 0, 0, 'no', ',', 'no'),
(44, 'Haydar', 'Teksas', 'haydar_teksas', 'Haydar@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-08', 'assets/images/profile_pics/default/head_pomegranate.png', 0, 0, 'no', ',', 'no'),
(45, 'Berkant', 'Kantar', 'berkant_kantar', 'Berkant@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-08', 'assets/images/posts/5eb681ec1c9a9WhatsApp Image 2020-05-08 at 13.40.36.jpeg', 0, 0, 'no', ',', 'no'),
(98, 'Deneme1', 'Veri1', 'deneme_ad1', 'dnememail1@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-10', 'assets/images/profile_pics/default/head_pomegranate.png', 0, 0, 'yes', ',', 'no'),
(99, 'Deneme2', 'Veri2', 'deneme_ad2', 'dnememail2@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-10', 'assets/images/profile_pics/default/head_pomegranate.png', 0, 0, 'no', ',', 'no'),
(100, 'Deneme3', 'Veri3', 'deneme_ad3', 'dnememail3@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-10', 'assets/images/profile_pics/default/head_pomegranate.png', 0, 0, 'no', ',', 'no'),
(101, 'Deneme4', 'Veri4', 'deneme_ad4', 'dnememail4@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-10', 'assets/images/profile_pics/default/head_pomegranate.png', 0, 0, 'no', ',', 'no'),
(104, 'Deneme4', 'Veri6', 'deneme_ad6', 'dnememail6@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '2020-05-10', 'assets/images/profile_pics/default/head_pomegranate.png', 0, 0, 'yes', ',', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `yonetim`
--

CREATE TABLE `yonetim` (
  `id` int(11) NOT NULL,
  `kulad` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` int(11) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `yonetim`
--

INSERT INTO `yonetim` (`id`, `kulad`, `sifre`, `yetki`, `aktif`) VALUES
(1, 'alp', '123', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deneme`
--
ALTER TABLE `deneme`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yonetim`
--
ALTER TABLE `yonetim`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `deneme`
--
ALTER TABLE `deneme`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `yonetim`
--
ALTER TABLE `yonetim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
