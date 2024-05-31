-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 May 2024, 04:05:40
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kutuphane`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adminn`
--

CREATE TABLE `adminn` (
  `id` int(2) NOT NULL,
  `kullanici_adi` varchar(30) DEFAULT NULL,
  `sifre` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `adminn`
--

INSERT INTO `adminn` (`id`, `kullanici_adi`, `sifre`) VALUES
(101, 'admin', '1234');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

CREATE TABLE `kitaplar` (
  `barkod` int(14) NOT NULL,
  `kitap_adi` varchar(255) DEFAULT NULL,
  `yazar` varchar(255) DEFAULT NULL,
  `yayin_evi` varchar(255) DEFAULT NULL,
  `sayfa_sayisi` int(4) DEFAULT NULL,
  `adet` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`barkod`, `kitap_adi`, `yazar`, `yayin_evi`, `sayfa_sayisi`, `adet`) VALUES
(202, 'Suç ve Ceza', 'Fyodor Dostoyevski', 'Türkiye İş Bankası Kültür Yayınları', 1541, 5),
(203, 'Kuyucaklı yusuf', 'Sabahattin Ali', 'Yapı Kredi Yayınları', 221, 10),
(204, 'Tutunamayanlar', 'Oğuz Atay', 'Beyaz Yayın Evi', 240, 3),
(205, 'Tutunamayanlar', 'Oğuz Atay', 'Beyaz Yayın Evi', 240, 3),
(206, 'Tutunamayanlar', 'Oğuz Atay', 'Beyaz Yayın Evi', 240, 3),
(207, 'Tutunamayanlar', 'Oğuz Atay', 'Beyaz Yayın Evi', 240, 3),
(208, 'Tutunamayanlar', 'Oğuz Atay', 'Beyaz Yayın Evi', 240, 3),
(209, 'Tutunamayanlar', 'Oğuz Atay', 'Beyaz Yayın Evi', 240, 3),
(210, 'Tutunamayanlar', 'Oğuz Atay', 'Beyaz Yayın Evi', 240, 3),
(211, 'Tutunamayanlar', 'Oğuz Atay', 'Beyaz Yayın Evi', 240, 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `tc` int(11) NOT NULL,
  `ad` varchar(40) DEFAULT NULL,
  `soyad` varchar(25) DEFAULT NULL,
  `dogum_tarihi` date DEFAULT NULL,
  `cinsiyet` varchar(5) DEFAULT NULL,
  `telefon` varchar(14) DEFAULT NULL,
  `adres` varchar(100) DEFAULT NULL,
  `e-posta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adminn`
--
ALTER TABLE `adminn`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`barkod`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`tc`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adminn`
--
ALTER TABLE `adminn`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Tablo için AUTO_INCREMENT değeri `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `barkod` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `tc` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
