-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Oca 2024, 17:37:15
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
-- Veritabanı: `zanda`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anne`
--

CREATE TABLE `anne` (
  `anne_id` int(20) NOT NULL,
  `anne_name` varchar(120) NOT NULL,
  `anne_brand` varchar(100) NOT NULL,
  `anne_price` decimal(8,2) NOT NULL,
  `anne_size` char(20) NOT NULL,
  `anne_color` varchar(50) NOT NULL,
  `anne_image` varchar(100) NOT NULL,
  `anne_quantity` mediumint(5) NOT NULL,
  `anne_status` enum('0','1') NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `anne`
--

INSERT INTO `anne` (`anne_id`, `anne_name`, `anne_brand`, `anne_price`, `anne_size`, `anne_color`, `anne_image`, `anne_quantity`, `anne_status`) VALUES
(1, '437-Q Akülü Araba Beyaz', 'Babyhope', 9400.00, '20 Kg', 'Beyaz', 'image-57.jpeg', 10, '1'),
(2, 'Temassız Ateş Ölçer Alından Mavi Jpd- Fr202', 'Jumper', 400.00, 'Ölçüsüz', 'Beyaz', 'image-58.jpeg', 10, '1'),
(3, 'Araba Seti - Geniş Ürün Yelpazesi, Oyuncak Araba Koleksiyonu, 1:64 Ölçek H7045', 'Hot Wheels', 1000.00, '20 Adet', 'Mavi', 'image-59.jpeg', 10, '1'),
(4, 'Bebek Bezi 6 Beden Extra Large Aylık Fırsat Paketi 104 Adet', 'Molfix', 400.00, 'XL', 'Mavi', 'image-60.jpeg', 10, '1'),
(5, 'Gümüş Göğüs Ucu Kapakları', 'Babyduck', 780.00, 'Ölçüsüz', 'Gümüş', 'image-61.jpeg', 10, '1'),
(6, 'Avent Natural Response Cam Biberon, 240ML, 1+ Ay,doğal Tepkili Biberon Emziği', 'Philips', 460.00, '240 Ml', 'Beyaz', 'image-62.jpeg', 10, '1'),
(7, 'Bebek Saç ve Vücut Şampuanı - Baby Bee Shampoo Body Wash 235ML+BEBEK Banyo Köpüğü 350ML', 'Burts Bees', 1900.00, '585 Ml', 'Beyaz', 'image-63.jpeg', 10, '1'),
(8, 'Hellobaby Basic Kozmonot Kız Çocuk', 'Hello Baby', 400.00, '1 Yaş', 'Pembe', 'image-64.jpeg', 10, '1'),
(9, '2li Hamile Emzirme Atleti Siyah-Beyaz', 'Par Lingerie', 185.00, 'M', 'Siyah', 'image-65.jpeg', 10, '1'),
(10, 'Fix Mama Sandalyesi Ecofix', 'Kanz Eco', 500.00, '130 Cm', 'Gri', 'image-66.jpeg', 10, '1'),
(11, 'Avent Dect Bebek Telsizi SCD502/26', 'Philips', 2000.00, 'Ölçüsüz', 'Beyaz', 'image-67.jpeg', 10, '1'),
(12, 'Elite 2.0 Commander', 'Nerf', 485.00, '50 Cm', 'Mavi', 'image-68.jpeg', 10, '1'),
(13, 'Süper İnce Alt Değiştirme Örtüsü 60 X 90 Cm 40 Adet', 'Baby Me', 485.00, '40 Adet', 'Beyaz', 'image-69.jpeg', 10, '1'),
(14, 'Bebek Banyo Oyuncağı Ördek Temalı Termometre Özellikli', 'Munchkin', 300.00, '5 Cm', 'Sarı', 'image-70.jpeg', 10, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `elektronik`
--

CREATE TABLE `elektronik` (
  `elektronik_id` int(20) NOT NULL,
  `elektronik_name` varchar(120) NOT NULL,
  `elektronik_brand` varchar(100) NOT NULL,
  `elektronik_price` decimal(8,2) NOT NULL,
  `elektronik_ram` char(5) NOT NULL,
  `elektronik_storage` varchar(50) NOT NULL,
  `elektronik_camera` varchar(20) NOT NULL,
  `elektronik_image` varchar(100) NOT NULL,
  `elektronik_quantity` mediumint(5) NOT NULL,
  `elektronik_status` enum('0','1') NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `elektronik`
--

INSERT INTO `elektronik` (`elektronik_id`, `elektronik_name`, `elektronik_brand`, `elektronik_price`, `elektronik_ram`, `elektronik_storage`, `elektronik_camera`, `elektronik_image`, `elektronik_quantity`, `elektronik_status`) VALUES
(1, 'Honor 9 Lite (Sapphire Blue, 64 GB)  (4 GB RAM)', 'Honor', 14499.00, '4', '64', '13', 'image-1.jpeg', 10, '1'),
(2, '\r\nInfinix Hot S3 (Sandstone Black, 32 GB)  (3 GB RAM)', 'Infinix', 8999.00, '3', '32', '13', 'image-2.jpeg', 10, '1'),
(3, 'VIVO V9 Youth (Gold, 32 GB)  (4 GB RAM)', 'VIVO', 16990.00, '4', '32', '16', 'image-3.jpeg', 10, '1'),
(4, 'Moto E4 Plus (Fine Gold, 32 GB)  (3 GB RAM)', 'Moto', 11499.00, '3', '32', '8', 'image-4.jpeg', 10, '1'),
(5, 'Lenovo K8 Plus (Venom Black, 32 GB)  (3 GB RAM)', 'Lenevo', 9999.00, '3', '32', '13', 'image-5.jpg', 10, '1'),
(6, 'Samsung Galaxy On Nxt (Gold, 16 GB)  (3 GB RAM)', 'Samsung', 10990.00, '3', '16', '13', 'image-6.jpeg', 10, '1'),
(7, 'Moto C Plus (Pearl White, 16 GB)  (2 GB RAM)', 'Moto', 7799.00, '2', '16', '8', 'image-7.jpeg', 10, '1'),
(8, 'Panasonic P77 (White, 16 GB)  (1 GB RAM)', 'Panasonic', 5999.00, '1', '16', '8', 'image-8.jpeg', 10, '1'),
(9, 'OPPO F5 (Black, 64 GB)  (6 GB RAM)', 'OPPO', 19990.00, '6', '64', '16', 'image-9.jpeg', 10, '1'),
(10, 'Honor 7A (Gold, 32 GB)  (3 GB RAM)', 'Honor', 8999.00, '3', '32', '13', 'image-10.jpeg', 10, '1'),
(11, 'Asus ZenFone 5Z (Midnight Blue, 64 GB)  (6 GB RAM)', 'Asus', 29999.00, '6', '128', '12', 'image-12.jpeg', 10, '1'),
(12, 'Redmi 5A (Gold, 32 GB)  (3 GB RAM)', 'MI', 5999.00, '3', '32', '13', 'image-12.jpeg', 10, '1'),
(13, 'Intex Indie 5 (Black, 16 GB)  (2 GB RAM)', 'Intex', 4999.00, '2', '16', '8', 'image-13.jpeg', 10, '1'),
(14, 'Google Pixel 2 XL (18:9 Display, 64 GB) White', 'Google', 61990.00, '4', '64', '12', 'image-14.jpeg', 10, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hesaplar`
--

CREATE TABLE `hesaplar` (
  `id` int(10) UNSIGNED NOT NULL,
  `ad` varchar(100) NOT NULL,
  `soyad` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telno` bigint(11) NOT NULL,
  `adres` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `hesaplar`
--

INSERT INTO `hesaplar` (`id`, `ad`, `soyad`, `email`, `telno`, `adres`, `password`) VALUES
(1, 'Alparslan', 'Burhan', 'alparslan.burhan@gmail.com', 5380537849, 'Amasya/merkez', '$2y$10$20G3bR6T58lAVY./hBNW8uuN3DuGyRuEds90Ehk0QeC9V6NSnj9c.'),
(49, 'Ahmet Kaan', 'Şahin', 'ahmetkaansahin06@gmail.com', 5550020274, 'Çorum/İskilip', '$2y$10$CKPtQ0kkFJLEwKdoMGtlt.QCqpVzUYt6w6.mdrv2C/U4gstV.9j6e'),
(50, 'Yahya', 'Altun', 'ya@gmail.com', 0, '', '$2y$10$YZeWnuOpPf3frdG.EWshOustS4By2zjbQM2ntv4OZc2IH.dorYq6W'),
(51, 'a', 'b', 'a@a.con', 0, '', '$2y$10$3JodsskPPqQUgNh.iNyc8udATkaM7BlNIyEbvJOYwaVCaGoJehxcy');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `moda`
--

CREATE TABLE `moda` (
  `moda_id` int(20) NOT NULL,
  `moda_name` varchar(120) NOT NULL,
  `moda_brand` varchar(100) NOT NULL,
  `moda_price` decimal(8,2) NOT NULL,
  `moda_size` char(5) NOT NULL,
  `moda_gender` varchar(50) NOT NULL,
  `moda_image` varchar(100) NOT NULL,
  `moda_quantity` mediumint(5) NOT NULL,
  `moda_status` enum('0','1') NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `moda`
--

INSERT INTO `moda` (`moda_id`, `moda_name`, `moda_brand`, `moda_price`, `moda_size`, `moda_gender`, `moda_image`, `moda_quantity`, `moda_status`) VALUES
(15, 'Erkek Polo Yaka Sweatshirt Yarım Fermuar Sweatshirt', 'Genius', 380.00, 'XL', 'Erkek', 'image-15.jpeg', 10, '1'),
(16, 'Kadın Polar Yelek Tam Fermuarlı Outdoor Spor Yelek 3 Cepli', 'Genius', 318.00, 'M', 'Kadın', 'image-16.jpeg', 10, '1'),
(17, 'Fit Nba Golden State Warriors Fit Kapüşonlu Kalın Sweatshirt', 'Defacto', 890.00, 'XXL', 'Erkek', 'image-17.jpeg', 10, '1'),
(18, 'Yale University Fit Bisiklet Yaka Kalın Sweatshirt', 'Defacto', 450.00, 'S', 'Kadın', 'image-18.jpeg', 10, '1'),
(19, 'Mavi Logo Baskılı Siyah Sweatshirt', 'Mavi', 800.00, 'XXXL', 'Erkek', 'image-19.jpeg', 10, '1'),
(20, 'Manhattan Baskılı Polo Yaka Sweatshirt', 'Mavi', 800.00, 'M', 'Kadın', 'image-20.jpeg', 10, '1'),
(21, 'Kumaş Pantolon Ekoseli Beli Lastikli Düğmeli Dar Kesim Cepli', 'Koton', 490.00, 'XL', 'Erkek', 'image-21.jpeg', 10, '1'),
(22, 'Pantolon Yüksek Bel Rahat Kalıp Dokulu Normal Paça', 'Koton', 280.00, 'S', 'Kadın', 'image-22.jpeg', 10, '1'),
(23, 'İspanyol Paça Lastikli Bel Camel Kadın Pantolon', 'Ekol', 810.00, 'XL', 'Kadın', 'image-23.jpeg', 10, '1'),
(24, 'Dilimli Kaşe Midi Etek', 'Ekol', 1900.00, 'XXL', 'Kadın', 'image-24.jpeg', 10, '1'),
(25, 'Nike Aır Monarch', 'Nike', 2500.00, '46', 'Erkek', 'image-25.jpeg', 10, '1'),
(26, 'Air Force 1 \'07', 'Nike', 3000.00, '44', 'Erkek', 'image-26.jpeg', 10, '1'),
(27, 'Grand Court 2.0 K', 'Adidas', 1200.00, '36', 'Kadın', 'image-27.jpeg', 10, '1'),
(28, 'Yeezy Foam RNNR Carbon', 'Adidas', 7000.00, '35', 'Kadın', 'image-28.jpeg', 10, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oto`
--

CREATE TABLE `oto` (
  `oto_id` int(20) NOT NULL,
  `oto_name` varchar(120) NOT NULL,
  `oto_brand` varchar(100) NOT NULL,
  `oto_price` decimal(8,2) NOT NULL,
  `oto_color` varchar(50) NOT NULL,
  `oto_image` varchar(100) NOT NULL,
  `oto_quantity` mediumint(5) NOT NULL,
  `oto_status` enum('0','1') NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `oto`
--

INSERT INTO `oto` (`oto_id`, `oto_name`, `oto_brand`, `oto_price`, `oto_color`, `oto_image`, `oto_quantity`, `oto_status`) VALUES
(1, 'Yangın Tüpü 2 kg', 'Seçkin', 450.00, 'Kırmızı', 'image-43.jpeg', 10, '1'),
(2, '\r\n6lı şok / Akım Korumalı topraklı + çocuk korumalı grup piriz', 'Viko', 400.00, 'Beyaz', 'image-44.jpeg', 10, '1'),
(3, '360 ° Dönen Tavan Vantilatörü Işık E27 Akıllı Fan Uzaktan Kumandalı LED Fan Işık Oturma Odası Yatak Odası Üst 48 W', 'Decisive', 1080.00, 'Beyaz', 'image-45.jpeg', 10, '1'),
(4, 'AAP-3500 Benzinli Jeneratör 3kVA', 'Aksa', 10500.00, 'Sarı', 'image-46.jpeg', 10, '1'),
(5, 'Titanium Seramik Wax', 'Moto Gross', 600.00, 'Gri', 'image-47.jpeg', 10, '1'),
(6, 'Kapalı Motosiklet Kaskı', 'Oalyip', 1500.00, 'Siyah', 'image-48.jpeg', 10, '1'),
(7, 'Root Square A4273234ENR Blueco Lavabo Bataryası, Fırçalı Nikel', 'Artema', 5000.00, 'Bej', 'image-49.jpeg', 10, '1'),
(8, 'Sp 6000 Vida Ayarlı Kırmızı Madenci Bareti', 'Bbu', 500.00, 'Kırmızı', 'image-50.jpeg', 10, '1'),
(9, 'Helix HX6 10W-40 4 Litre Motor Yağı', 'Shell', 480.00, 'Sarı', 'image-51.jpeg', 10, '1'),
(10, 'Outline 5991B483-0016 Asimetrik Lavabo, VitrA Clean, 56 cm', 'VitrA', 11500.00, 'Siyah', 'image-52.jpeg', 10, '1'),
(11, 'Sx-Pw5500.5 Max Power 5500W Amplıfıer', 'Soundmax', 4500.00, 'Gri', 'image-53.jpeg', 10, '1'),
(12, 'Chelsea 420 G Yeni Nesil Lpg\'li Barbekü', 'Aygaz', 9500.00, 'Siyah', 'image-54.jpeg', 10, '1'),
(13, 'Ayak Altı 9 LED Araç Içi Sese Duyarlı Rgb LED Kumandalı', 'Superlight', 150.00, 'Rgb', 'image-55.jpeg', 10, '1'),
(14, 'Orta Mukavemetli Vida Sabitleyici 50 ml.', 'Loctite', 450.00, 'Kırmızı', 'image-56.jpeg', 10, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Honor 9 Lite (Sapphire Blue, 64 GB)  (4 GB RAM)', 14499.00, 'image-1.jpeg'),
(2, '\r\nInfinix Hot S3 (Sandstone Black, 32 GB)  (3 GB RAM)', 8999.00, 'image-2.jpeg'),
(3, 'VIVO V9 Youth (Gold, 32 GB)  (4 GB RAM)', 16990.00, 'image-3.jpeg'),
(4, 'Moto E4 Plus (Fine Gold, 32 GB)  (3 GB RAM)', 11499.00, 'image-4.jpeg'),
(5, 'Lenovo K8 Plus (Venom Black, 32 GB)  (3 GB RAM)', 9999.00, 'image-5.jpeg'),
(6, 'Samsung Galaxy On Nxt (Gold, 16 GB)  (3 GB RAM)', 10990.00, 'image-6.jpeg'),
(7, 'Moto C Plus (Pearl White, 16 GB)  (2 GB RAM)', 7799.00, 'image-7.jpeg'),
(8, 'Panasonic P77 (White, 16 GB)  (1 GB RAM)', 5999.00, 'image-8.jpeg'),
(9, 'OPPO F5 (Black, 64 GB)  (6 GB RAM)', 19990.00, 'image-9.jpeg'),
(10, 'Honor 7A (Gold, 32 GB)  (3 GB RAM)', 8999.00, 'image-10.jpeg'),
(11, 'Asus ZenFone 5Z (Midnight Blue, 64 GB)  (6 GB RAM)', 29999.00, 'image-11.jpeg'),
(12, 'Redmi 5A (Gold, 32 GB)  (3 GB RAM)', 5999.00, 'image-12.jpeg'),
(13, 'Intex Indie 5 (Black, 16 GB)  (2 GB RAM)', 4999.00, 'image-13.jpeg'),
(14, 'Google Pixel 2 XL (18:9 Display, 64 GB) White', 61990.00, 'image-14.jpeg'),
(15, 'Erkek Polo Yaka Sweatshirt Yarım Fermuar Sweatshirt', 380.00, 'image-15.jpeg'),
(16, 'Kadın Polar Yelek Tam Fermuarlı Outdoor Spor Yelek 3 Cepli', 318.00, 'image-16.jpeg'),
(17, 'Fit Nba Golden State Warriors Fit Kapüşonlu Kalın Sweatshirt', 890.00, 'image-17.jpeg'),
(18, 'Yale University Fit Bisiklet Yaka Kalın Sweatshirt', 450.00, 'image-18.jpeg'),
(19, 'Mavi Logo Baskılı Siyah Sweatshirt', 800.00, 'image-19.jpeg'),
(20, 'Manhattan Baskılı Polo Yaka Sweatshirt', 800.00, 'image-20.jpeg'),
(21, 'Kumaş Pantolon Ekoseli Beli Lastikli Düğmeli Dar Kesim Cepli', 490.00, 'image-21.jpeg'),
(22, 'Pantolon Yüksek Bel Rahat Kalıp Dokulu Normal Paça', 280.00, 'image-22.jpeg'),
(23, 'İspanyol Paça Lastikli Bel Camel Kadın Pantolon', 810.00, 'image-23.jpeg'),
(24, 'Dilimli Kaşe Midi Etek', 1900.00, 'image-24.jpeg'),
(25, 'Nike Aır Monarch', 2500.00, 'image-25.jpeg'),
(26, 'Air Force 1 \'07', 3000.00, 'image-26.jpeg'),
(27, 'Grand Court 2.0 K', 1200.00, 'image-27.jpeg'),
(28, 'Yeezy Foam RNNR Carbon', 7000.00, 'image-28.jpeg'),
(29, 'Pembe Plastik Dambıl Seti 1 Kg 2 Adet', 90.00, 'image-29.jpeg'),
(30, '108 kg Z Barlı Halter Seti Ve Dambıl Seti Ağırlık Fitness Seti', 1500.00, 'image-30.jpeg'),
(31, '28 Jant 21 Vites Double Jant Bisiklet', 4000.00, 'image-31.jpeg'),
(32, 'Zengo Fat Bike 26hd Zengo', 16000.00, 'image-32.jpeg'),
(33, 'Wtb7500xb07 Nba 7 No Basketbol Maç Topu', 10500.00, 'image-33.jpeg'),
(34, 'Plastik Futbol Topu', 55.00, 'image-34.jpeg'),
(35, 'Longboard – 31 inç küçük Longboard Cruising Kaykay', 10400.00, 'image-35.jpeg'),
(36, 'Fr2 Urban Paten', 14700.00, 'image-36.jpeg'),
(37, 'Klasik Trigger-action Termos Turuncu', 1500.00, 'image-37.jpeg'),
(38, '2 Litre Çift Kat Paslanmaz Çelik Termos Ckr2005', 400.00, 'image-38.jpeg'),
(39, 'Kreatin %100 Mikronize 300 gr', 570.00, 'image-39.jpeg'),
(40, 'Forclaz Outdoor Trekking Uyku Tulumu', 2700.00, 'image-40.jpeg'),
(41, '75cm Stability Gymball Pilates Topu', 3800.00, 'image-41.jpeg'),
(42, 'Siyah Kadın Spor Tayt Çift Cepli Sıkılaştırıcı Toparlayıcı Sporcu Taytı Leggings', 380.00, 'image-42.jpeg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `spor`
--

CREATE TABLE `spor` (
  `spor_id` int(20) NOT NULL,
  `spor_name` varchar(120) NOT NULL,
  `spor_brand` varchar(100) NOT NULL,
  `spor_price` decimal(8,2) NOT NULL,
  `spor_size` char(20) NOT NULL,
  `spor_color` varchar(50) NOT NULL,
  `spor_image` varchar(100) NOT NULL,
  `spor_quantity` mediumint(5) NOT NULL,
  `spor_status` enum('0','1') NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `spor`
--

INSERT INTO `spor` (`spor_id`, `spor_name`, `spor_brand`, `spor_price`, `spor_size`, `spor_color`, `spor_image`, `spor_quantity`, `spor_status`) VALUES
(29, 'Pembe Plastik Dambıl Seti 1 Kg 2 Adet', 'Cosfer', 90.00, '1 Kg', 'Pembe', 'image-29.jpeg', 10, '1'),
(30, '108 kg Z Barlı Halter Seti Ve Dambıl Seti Ağırlık Fitness Seti', 'Fitset', 1500.00, '108 Kg', 'Siyah', 'image-30.jpeg', 10, '1'),
(31, '28 Jant 21 Vites Double Jant Bisiklet', 'Serraro', 4000.00, '28 Jant', 'Siyah', 'image-31.jpeg', 10, '1'),
(32, 'Zengo Fat Bike 26hd Zengo', 'Corelli', 16000.00, '26 Jant', 'Yeşil', 'image-32.jpeg', 10, '1'),
(33, 'Wtb7500xb07 Nba 7 No Basketbol Maç Topu', 'Wilson', 10500.00, 'L', 'Turuncu', 'image-33.jpeg', 10, '1'),
(34, 'Plastik Futbol Topu', 'Gözde', 55.00, 'M', 'Beyaz', 'image-34.jpeg', 10, '1'),
(35, 'Longboard – 31 inç küçük Longboard Cruising Kaykay', 'Whome', 10400.00, '31 İnç', 'Siyah', 'image-35.jpeg', 10, '1'),
(36, 'Fr2 Urban Paten', 'Seba', 14700.00, '37', 'Siyah', 'image-37.jpeg', 10, '1'),
(37, 'Klasik Trigger-action Termos Turuncu', 'Stanley', 1500.00, '0.35 Lt', 'Turuncu', 'image-37.jpeg', 10, '1'),
(38, '2 Litre Çift Kat Paslanmaz Çelik Termos Ckr2005', 'Cooker', 400.00, '2 Lt', 'Gri', 'image-38.jpeg', 10, '1'),
(39, 'Kreatin %100 Mikronize 300 gr', 'Hardline', 570.00, '300 Gr', 'Siyah', 'image-39.jpeg', 10, '1'),
(40, 'Forclaz Outdoor Trekking Uyku Tulumu', 'Decathlon', 2700.00, 'L', 'Haki', 'image-40.jpeg', 10, '1'),
(41, '75cm Stability Gymball Pilates Topu', 'Reebok', 3800.00, '75 Cm', 'Gri', 'image-41.jpeg', 10, '1'),
(42, 'Siyah Kadın Spor Tayt Çift Cepli Sıkılaştırıcı Toparlayıcı Sporcu Taytı Leggings', 'Emfure', 380.00, 'XL', 'Siyah', 'image-42.jpeg', 10, '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `anne`
--
ALTER TABLE `anne`
  ADD PRIMARY KEY (`anne_id`);

--
-- Tablo için indeksler `elektronik`
--
ALTER TABLE `elektronik`
  ADD PRIMARY KEY (`elektronik_id`);

--
-- Tablo için indeksler `hesaplar`
--
ALTER TABLE `hesaplar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `moda`
--
ALTER TABLE `moda`
  ADD PRIMARY KEY (`moda_id`);

--
-- Tablo için indeksler `oto`
--
ALTER TABLE `oto`
  ADD PRIMARY KEY (`oto_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `spor`
--
ALTER TABLE `spor`
  ADD PRIMARY KEY (`spor_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `anne`
--
ALTER TABLE `anne`
  MODIFY `anne_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `elektronik`
--
ALTER TABLE `elektronik`
  MODIFY `elektronik_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `hesaplar`
--
ALTER TABLE `hesaplar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Tablo için AUTO_INCREMENT değeri `moda`
--
ALTER TABLE `moda`
  MODIFY `moda_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `oto`
--
ALTER TABLE `oto`
  MODIFY `oto_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `spor`
--
ALTER TABLE `spor`
  MODIFY `spor_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
