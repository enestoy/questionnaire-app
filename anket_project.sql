-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Ara 2022, 19:03:11
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `anket_project`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anket`
--

CREATE TABLE `anket` (
  `id` int(10) UNSIGNED NOT NULL,
  `soru` varchar(100) NOT NULL,
  `cevap_bir` varchar(50) NOT NULL,
  `cevap_iki` varchar(50) NOT NULL,
  `cevap_uc` varchar(50) NOT NULL,
  `oysayisi_bir` int(10) UNSIGNED NOT NULL,
  `oysayisi_iki` int(10) UNSIGNED NOT NULL,
  `oysayisi_uc` int(10) UNSIGNED NOT NULL,
  `oysayisi_toplam` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `anket`
--

INSERT INTO `anket` (`id`, `soru`, `cevap_bir`, `cevap_iki`, `cevap_uc`, `oysayisi_bir`, `oysayisi_iki`, `oysayisi_uc`, `oysayisi_toplam`) VALUES
(1, 'Web Sitesinin Tasarımını Nasıl Buldunuz?', 'Güzel', 'Normal', 'Kötü', 31, 40, 20, 91);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oy_kullananlar`
--

CREATE TABLE `oy_kullananlar` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_adresi` varchar(16) NOT NULL,
  `tarih` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `oy_kullananlar`
--

INSERT INTO `oy_kullananlar` (`id`, `ip_adresi`, `tarih`) VALUES
(0, '::1', 1669047002);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `anket`
--
ALTER TABLE `anket`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `oy_kullananlar`
--
ALTER TABLE `oy_kullananlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `anket`
--
ALTER TABLE `anket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
