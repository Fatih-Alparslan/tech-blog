-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 06 Eyl 2022, 13:51:48
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `techblog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

DROP TABLE IF EXISTS `ayarlar`;
CREATE TABLE IF NOT EXISTS `ayarlar` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_url` varchar(500) NOT NULL,
  `site_title` varchar(500) NOT NULL,
  `site_desc` varchar(1000) NOT NULL,
  `site_keyw` varchar(1000) NOT NULL,
  `site_logo` varchar(500) NOT NULL,
  `site_favicon` varchar(500) NOT NULL,
  `site_facebook` varchar(500) NOT NULL,
  `site_google` varchar(500) NOT NULL,
  `site_instagram` varchar(500) NOT NULL,
  `site_twitter` varchar(500) NOT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`site_id`, `site_url`, `site_title`, `site_desc`, `site_keyw`, `site_logo`, `site_favicon`, `site_facebook`, `site_google`, `site_instagram`, `site_twitter`) VALUES
(1, 'http://localhost/tech-blog/tech-index.php', 'Kafayaal - Kişisel Web Blogu', 'Tech Blog, teknoloji hakkında ve gündemdeki haberler hakkında makalelerin bulunduğu bir blogdur.', 'Fatih, Alparslan, Blog, Yazılım, Bilişim, Haberler', 'tech-logo.png', 'favicon.ico', 'https://www.facebook.com/', 'https://google.com/', 'https://www.instagram.com/fatihalparslan0/', 'https://twitter.com/fatihalparslan0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE IF NOT EXISTS `kategoriler` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_title` varchar(500) NOT NULL,
  `kategori_url` varchar(500) NOT NULL,
  `kategori_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kategori_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategori_id`, `kategori_title`, `kategori_url`, `kategori_tarih`) VALUES
(1, 'Yazılım', 'yazilim', '2022-09-01 16:23:15'),
(2, 'Sosyal Medya', 'sosyal-medya', '2022-09-01 16:23:15'),
(3, 'Teknoloji', 'teknoloji', '2022-09-01 16:23:51'),
(4, 'Bilim', 'bilim', '2022-09-01 16:24:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reklamlar`
--

DROP TABLE IF EXISTS `reklamlar`;
CREATE TABLE IF NOT EXISTS `reklamlar` (
  `reklam_id` int(11) NOT NULL AUTO_INCREMENT,
  `reklam_banner` varchar(500) NOT NULL,
  `reklam_link` varchar(1000) NOT NULL,
  PRIMARY KEY (`reklam_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `reklamlar`
--

INSERT INTO `reklamlar` (`reklam_id`, `reklam_banner`, `reklam_link`) VALUES
(1, 'banner_07.jpg', 'https://www.instagram.com/fatihalparslan0/'),
(2, 'banner_03.jpg', 'https://www.instagram.com/fatihalparslan0/'),
(3, 'banner_01.jpg', 'https://www.instagram.com/fatihalparslan0/');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazar`
--

DROP TABLE IF EXISTS `yazar`;
CREATE TABLE IF NOT EXISTS `yazar` (
  `yazar_id` int(11) NOT NULL AUTO_INCREMENT,
  `yazar_foto` varchar(500) NOT NULL,
  `yazar_adi` varchar(500) NOT NULL,
  `yazar_aciklama` text NOT NULL,
  `yazar_facebook` varchar(500) NOT NULL,
  `yazar_youtube` varchar(500) NOT NULL,
  `yazar_pinterest` varchar(500) NOT NULL,
  `yazar_twitter` varchar(500) NOT NULL,
  `yazar_instagram` varchar(500) NOT NULL,
  `yazar_website` varchar(500) NOT NULL,
  PRIMARY KEY (`yazar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yazar`
--

INSERT INTO `yazar` (`yazar_id`, `yazar_foto`, `yazar_adi`, `yazar_aciklama`, `yazar_facebook`, `yazar_youtube`, `yazar_pinterest`, `yazar_twitter`, `yazar_instagram`, `yazar_website`) VALUES
(1, 'yazar1.jpg', 'Fatih Alparslan', 'Quisque sed tristique felis. Lorem visit my website amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Tech Blog!', 'https://www.facebook.com', 'https://www.youtube.com', 'https://www.pinterest.com', 'https://www.twitter.com', 'https://www.instagram.com', '#'),
(2, 'yazar2.jpg', 'Kürşat Kalemoğlu', 'Quisque sed tristique felis. Lorem visit my website amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Tech Blog!', 'https://www.facebook.com', 'https://www.youtube.com', 'https://www.pinterest.com', 'https://www.twitter.com', 'https://www.instagram.com', '#');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilar`
--

DROP TABLE IF EXISTS `yazilar`;
CREATE TABLE IF NOT EXISTS `yazilar` (
  `yazi_id` int(11) NOT NULL AUTO_INCREMENT,
  `yazi_foto` varchar(500) NOT NULL,
  `yazi_title` varchar(500) NOT NULL,
  `yazi_icerik` text NOT NULL,
  `yazi_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `yazi_kategori_id` int(11) NOT NULL,
  `yazi_okunma` int(11) NOT NULL,
  `yazi_seolink` varchar(500) NOT NULL,
  `yazi_yazar_id` int(11) NOT NULL,
  PRIMARY KEY (`yazi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yazilar`
--

INSERT INTO `yazilar` (`yazi_id`, `yazi_foto`, `yazi_title`, `yazi_icerik`, `yazi_tarih`, `yazi_kategori_id`, `yazi_okunma`, `yazi_seolink`, `yazi_yazar_id`) VALUES
(1, 'haber1.jpeg', 'En iyi 10 telefon uygulaması', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 1, 123, 'top-10-phone-applications-and-2017-mobile-design-awards', 1),
(2, 'haber2.png', 'A device you can use both headphones and usb', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 2, 12, 'a-device-you-can-use-both-headphones-and-usb', 2),
(3, 'haber3.jpeg', 'iPhone 14 Renk Seçenekleri Sızdırıldı!', 'Yakın zamanda tanıtılması beklenen iPhone 14 için sızıntılar yayınlanmaya devam ediyor. Apple’a ait sızıntıları ile bilinen Twitter hesabı Jioriku iPhone 14’ün hangi renk opsiyonlarına sahip olacağını paylaştı.', '2022-09-01 17:08:03', 3, 45, 'iphone-14-renk-secenekleri-sizdirildi', 1),
(4, 'haber4.jpg', 'Adobe Photoshop’ı İnternet Üzerinde Bedava Yapmayı Planlıyor', 'Adobe Photoshop’ın ilk tarayıcı versiyonunu ekim ayında yayınladı. Bu bedava versiyonu şu an Kanada’da test edilmekte. Uygulamanın internet üzerindeki bu sürümü başlangıçta basit düzenleme işlemlerini gerçekleştirebiliyordu. Tabakalar ve çekirdek düzenleme araçları da daha sonra bu versiyondaki yerini aldı. ', '2022-09-01 17:08:03', 4, 65, 'adobe-photoshopu-internet-uzerinde-bedava-yapmayı-planliyor', 2),
(5, 'haber2.png', 'A device you can use both headphones and usb', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 2, 31, 'a-device-you-can-use-both-headphones-and-usb', 2),
(6, 'haber1.jpeg', 'Top 10 phone applications and 2017 mobile design awards', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 2, 32, 'top-10-phone-applications-and-2017-mobile-design-awards', 1),
(7, 'haber2.png', 'Top 10 phone applications and 2017 mobile design awards', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 1, 41, 'top-10-phone-applications-and-2017-mobile-design-awards', 2),
(8, 'haber1.jpeg', 'Top 10 phone applications and 2017 mobile design awards', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 4, 42, 'top-10-phone-applications-and-2017-mobile-design-awards', 2),
(9, 'haber2.png', 'Top 10 phone applications and 2017 mobile design awards', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 2, 43, 'top-10-phone-applications-and-2017-mobile-design-awards', 2),
(10, 'haber1.jpeg', 'Top 10 phone applications and 2017 mobile design awards', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 2, 44, 'top-10-phone-applications-and-2017-mobile-design-awards', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
