-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 14 Eyl 2022, 21:21:03
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
  `site_github` varchar(500) NOT NULL,
  `site_instagram` varchar(500) NOT NULL,
  `site_twitter` varchar(500) NOT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`site_id`, `site_url`, `site_title`, `site_desc`, `site_keyw`, `site_logo`, `site_favicon`, `site_facebook`, `site_github`, `site_instagram`, `site_twitter`) VALUES
(1, 'http://localhost/tech-blog/tech-index.php', 'Kafayaal - Kişisel Web Blogu', 'Tech Blog, teknoloji hakkında ve gündemdeki haberler hakkında makalelerin bulunduğu bir blogdur.', 'Fatih, Alparslan, Blog, Yazılım, Bilişim, Haberler', 'tech-logo.png', 'favicon.ico', 'https://www.facebook.com/fatihalparslan', 'https://github.com/Fatih-Alparslan', 'https://www.instagram.com/fatihalparslan0/', 'https://twitter.com/fatihalparslan0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

DROP TABLE IF EXISTS `hakkimizda`;
CREATE TABLE IF NOT EXISTS `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL AUTO_INCREMENT,
  `hakkimizda_baslik` varchar(500) NOT NULL,
  `hakkimizda_icerik` text NOT NULL,
  `hakkimizda_adres` varchar(1000) NOT NULL,
  `hakkimizda_telefon` varchar(500) NOT NULL,
  PRIMARY KEY (`hakkimizda_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`, `hakkimizda_adres`, `hakkimizda_telefon`) VALUES
(1, 'HAKKIMIZDA', 'Tech Blog is a personal blog for handcrafted, cameramade photography content, fashion styles from independent creatives around the world.\n\nEtiam vulputate urna id libero auctor maximus. Nulla dignissim ligula diam, in sollicitudin ligula congue quis turpis dui urna nibhs.', '                                    <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3007.6714640061664!2d28.991601250268104!3d41.07617352309252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab6f12499c9ad%3A0x89e628daa7884874!2zS3VtcnUgU2suLCDFnmnFn2xpL8Swc3RhbmJ1bA!5e0!3m2!1str!2str!4v1662902591068!5m2!1str!2str\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '0850 67 89');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

DROP TABLE IF EXISTS `iletisim`;
CREATE TABLE IF NOT EXISTS `iletisim` (
  `iletisim_id` int(11) NOT NULL AUTO_INCREMENT,
  `iletisim_ad` varchar(500) NOT NULL,
  `iletisim_eposta` varchar(500) NOT NULL,
  `iletisim_konu` varchar(500) NOT NULL,
  `iletisim_mesaj` text NOT NULL,
  `iletisim_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `iletisim_okunma` varchar(500) NOT NULL DEFAULT '0',
  PRIMARY KEY (`iletisim_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`iletisim_id`, `iletisim_ad`, `iletisim_eposta`, `iletisim_konu`, `iletisim_mesaj`, `iletisim_tarih`, `iletisim_okunma`) VALUES
(1, 'fatih', 'alparslan@gmail.com', 'ben kim miyim', 'sen kimsin', '2022-09-09 09:59:01', '0'),
(2, 'fatih', 'sdada@gmail.com', 'böyle devamm', 'haber', '2022-09-09 09:59:01', '0'),
(3, 'dsad', 'sdada@gmail.com', 'konu', 'mesaj', '2022-09-09 09:59:01', '0'),
(4, 'neva', 'neva@gmail.com', 'siten hakkında', 'siten çok güzel olmuş abi', '2022-09-09 09:59:01', '0'),
(5, 'hayat', 'hayat@gmail.com', 'Reklam', 'Sitenizde ürünlerim hakkında reklam vermek istiyorum.', '2022-09-09 10:00:03', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

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
(10, 'haber1.jpeg', 'Top 10 phone applications and 2017 mobile design awards', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 2, 44, 'top-10-phone-applications-and-2017-mobile-design-awards', 2),
(11, 'haber1.jpeg', 'En iyi 10 telefon uygulaması', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 1, 123, 'top-10-phone-applications-and-2017-mobile-design-awards', 1),
(12, 'haber2.png', 'A device you can use both headphones and usb', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 2, 12, 'a-device-you-can-use-both-headphones-and-usb', 2),
(13, 'haber3.jpeg', 'iPhone 14 Renk Seçenekleri Sızdırıldı!', 'Yakın zamanda tanıtılması beklenen iPhone 14 için sızıntılar yayınlanmaya devam ediyor. Apple’a ait sızıntıları ile bilinen Twitter hesabı Jioriku iPhone 14’ün hangi renk opsiyonlarına sahip olacağını paylaştı.', '2022-09-01 17:08:03', 3, 45, 'iphone-14-renk-secenekleri-sizdirildi', 1),
(14, 'haber4.jpg', 'Adobe Photoshop’ı İnternet Üzerinde Bedava Yapmayı Planlıyor', 'Adobe Photoshop’ın ilk tarayıcı versiyonunu ekim ayında yayınladı. Bu bedava versiyonu şu an Kanada’da test edilmekte. Uygulamanın internet üzerindeki bu sürümü başlangıçta basit düzenleme işlemlerini gerçekleştirebiliyordu. Tabakalar ve çekirdek düzenleme araçları da daha sonra bu versiyondaki yerini aldı. ', '2022-09-01 17:08:03', 4, 65, 'adobe-photoshopu-internet-uzerinde-bedava-yapmayı-planliyor', 2),
(15, 'haber2.png', 'A device you can use both headphones and usb', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 2, 31, 'a-device-you-can-use-both-headphones-and-usb', 2),
(16, 'haber1.jpeg', 'Top 10 phone applications and 2017 mobile design awards', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 2, 32, 'top-10-phone-applications-and-2017-mobile-design-awards', 1),
(17, 'haber2.png', 'Top 10 phone applications and 2017 mobile design awards', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 1, 41, 'top-10-phone-applications-and-2017-mobile-design-awards', 2),
(18, 'haber1.jpeg', 'Top 10 phone applications and 2017 mobile design awards', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 4, 42, 'top-10-phone-applications-and-2017-mobile-design-awards', 2),
(19, 'haber2.png', 'Top 10 phone applications and 2017 mobile design awards', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 2, 43, 'top-10-phone-applications-and-2017-mobile-design-awards', 2),
(20, 'haber1.jpeg', 'Top 10 phone applications and 2017 mobile design awards', 'Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.', '2022-09-01 17:08:03', 2, 44, 'top-10-phone-applications-and-2017-mobile-design-awards', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE IF NOT EXISTS `yorumlar` (
  `yorum_id` int(11) NOT NULL AUTO_INCREMENT,
  `yorum_ekleyen` varchar(500) NOT NULL,
  `yorum_eposta` varchar(500) NOT NULL,
  `yorum_icerik` text NOT NULL,
  `yorum_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `yorum_yazi_id` int(11) NOT NULL,
  `yorum_durum` int(11) NOT NULL DEFAULT '0',
  `yorum_ust` int(11) NOT NULL,
  `yorum_cevap` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`yorum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `yorum_ekleyen`, `yorum_eposta`, `yorum_icerik`, `yorum_tarih`, `yorum_yazi_id`, `yorum_durum`, `yorum_ust`, `yorum_cevap`) VALUES
(1, 'Fatih Alparslan', 'alparslan.190357@gmail.com', 'haberleriniz çok güzel', '2022-09-09 11:22:14', 1, 1, 0, 1),
(2, 'Berkay', 'yaylaci@gmail.com', 'ses kes', '2022-09-08 13:04:36', 10, 1, 0, 0),
(3, 'Kadir Yaylacı', 'yaylaci@gmail.com', 'kankaaaa bunee', '2022-09-08 13:12:22', 10, 1, 0, 0),
(4, 'Erdem', 'yaylaci@gmail.comsdad', 'tabiii', '2022-09-08 13:54:45', 10, 1, 0, 0),
(5, 'Erkin Koray', 'yaylaci@gmail.com', 'Nasılsınnn ', '2022-09-08 14:20:32', 1, 1, 0, 0),
(6, 'Erkin Koray', 'yaylaci@gmail.com', 'Böyle gelmiş böyle gidecek', '2022-09-08 17:06:23', 9, 1, 0, 0),
(7, 'Şebnem', 'sebo@gmail.com', 'iyi günler', '2022-09-08 21:29:43', 10, 1, 0, 0),
(8, 'Ceren', 'ceren@gmail.com', 'bu haberi gördüğüme sevindim', '2022-09-08 22:15:48', 9, 1, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
