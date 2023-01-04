-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 02 Oca 2015, 14:38:34
-- Sunucu sürümü: 5.1.73-cll
-- PHP Sürümü: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `pelikanw_blogdemo`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `kullanici` varchar(255) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`kullanici`, `sifre`, `id`) VALUES
('admin', 'admin', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE IF NOT EXISTS `ayarlar` (
  `id` int(11) NOT NULL,
  `site_adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `keyworld` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `logo` varchar(5555) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_adi`, `aciklama`, `keyworld`, `logo`) VALUES
(1, 'PelikanWeb Blog Scripti', 'Pelikanweb''in yapmÄ±ÅŸ olduÄŸu SEO uyumlu, sade, ÅŸÄ±k ve geliÅŸmiÅŸ yÃ¶netim panelli blog scripti', 'pelikanweb, blog, gÃ¼ncel blog', 'resimler/logo.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE IF NOT EXISTS `iletisim` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `face` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `plus` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `rss` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `mail`, `face`, `twitter`, `plus`, `youtube`, `rss`) VALUES
(1, 'info@pelikanweb.com', 'http://facebook.com', 'http://twitter.com', 'http://plus.google.com', 'http://youtube.com', 'http://siteismi.com/feed');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim-formu`
--

CREATE TABLE IF NOT EXISTS `iletisim-formu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `isim` varchar(55) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `iletisim-formu`
--

INSERT INTO `iletisim-formu` (`id`, `baslik`, `isim`, `mail`, `mesaj`) VALUES
(1, 'dasd', 'dasdasd', 'aasdas', 'asdasd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(255) NOT NULL,
  `icon` varchar(5555) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`id`, `ad`, `icon`) VALUES
(3, 'WEB ARAÃ‡LARI', 'resimler/ico3.png'),
(4, 'WORDPRESS', 'resimler/wpicon.png'),
(5, 'SEO', 'resimler/ico5.png'),
(6, 'GRAFÄ°K TASARIM', 'resimler/ico4.png'),
(7, 'SOSYAL MEDYA', 'resimler/ico3.png'),
(9, 'GENEL', 'resimler/icog.png'),
(10, 'TEKNOLOJÄ°', 'resimler/ico2.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE IF NOT EXISTS `mesajlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isim` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mesaj` varchar(5555) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` (`id`, `isim`, `mail`, `mesaj`, `baslik`) VALUES
(4, 'Mehmeh', 'mehmet@mhmttt.com', 'Lorem ipsum ipsum ipsum ipsum ipsum ipsum ipsum ipsum ipsum ipsum ipsum ipsum ipsum ', 'Siteniz Ã‡ok GÃ¼zel'),
(6, 'Lorem Ä°psum', 'Lorem Ä°psum', 'Lorem Ä°psumLorem Ä°psumLorem Ä°psumLorem Ä°psumLorem Ä°psumLorem Ä°psumLorem Ä°psumLorem Ä°psumLorem Ä°psumLorem Ä°psumLorem Ä°psumLorem ', 'Lorem Ä°psum'),
(7, 'Hasan', 'hasan@hasannn.com', 'Siteniz iÃ§in Ã§ok teÅŸekkÃ¼r ederim.', 'TeÅŸekkÃ¼rler'),
(8, 'Fatih', 'fatigh@dasd.com', 'Makalelerinizi beÄŸenerek takip ediyorum.  ', 'Makaleler GÃ¼zel');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfa`
--

CREATE TABLE IF NOT EXISTS `sayfa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icerik` text NOT NULL,
  `baslik` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `sayfa`
--

INSERT INTO `sayfa` (`id`, `icerik`, `baslik`) VALUES
(2, '<p>&Ccedil;aÄŸÄ±mÄ±z olan teknoloji ve internet &ccedil;aÄŸÄ±nÄ±n bize saÄŸladÄ±ÄŸÄ± imkanlarÄ±, yenilikleri siz deÄŸerli okuyucularÄ±mÄ±za aktarabilmek i&ccedil;in 1 aÄŸustos 2014 tarihinde kurulan sitemiz, teknoloji, internet, web tasarÄ±m, bilgisayar ve diÄŸer kategorilerde g&uuml;ncel makaleleri ile &ccedil;aÄŸÄ±mÄ±za k&uuml;&ccedil;&uuml;k bir Ä±ÅŸÄ±k tutuyor&nbsp;<img alt=":)" src="http://www.webyazar.net/wp-includes/images/smilies/icon_smile.gif" /></p>\r\n\r\n<p>Misyonumuz, siz deÄŸerli Webyazar takip&ccedil;ilerine hÄ±zlÄ±, g&uuml;venilir ve &ouml;z haberleri sunup, bilgi edinmek istediÄŸiniz konularda bilgi sahibi olmanÄ±zÄ± saÄŸlamaktÄ±r.</p>\r\n', 'HakkÄ±mÄ±zda'),
(4, '<p>K&uuml;nye sayfasÄ±&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>\r\n', 'KÃ¼nye'),
(5, '<p>Reklam sayfasÄ± lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;lorem ipsum&nbsp;</p>\r\n', 'Reklam & Sponsorluk');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `url` varchar(2552) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`id`, `img`, `url`) VALUES
(6, 'slider/resimler/5.png', '#'),
(7, 'slider/resimler/4.png', '#'),
(8, 'slider/resimler/3.png', '#'),
(9, 'slider/resimler/2.png', '#'),
(10, 'slider/resimler/1.png', '##'),
(11, 'slider/resimler/ilk.png', '#');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilar`
--

CREATE TABLE IF NOT EXISTS `yazilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) NOT NULL,
  `icerik` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `tarih` varchar(255) NOT NULL,
  `kat` varchar(255) CHARACTER SET latin1 NOT NULL,
  `img` varchar(2555) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Tablo döküm verisi `yazilar`
--

INSERT INTO `yazilar` (`id`, `baslik`, `icerik`, `tarih`, `kat`, `img`) VALUES
(14, 'YAZILIMCININ BÄ°R GÃœNÃœ !', '<p>Bir yazÄ±lÄ±mcÄ± sabah yarÄ± ayÄ±k yarÄ± uykulu bir ÅŸekilde kalkar bilgisayarÄ±n g&uuml;&ccedil; tuÅŸuna basÄ±p tuvalete giderler orada kendilerine bir &ccedil;eki d&uuml;zen verip bilgisayarÄ±n baÅŸÄ±na ge&ccedil;erler g&ouml;zl&uuml;ÄŸ&uuml;n&uuml; de takmayÄ± unutmazlar cep telefonu kontrol edilir.Ä°lk &ouml;nce maillere bakÄ±lÄ±r iÅŸler i&ccedil;in sonra siteye bakÄ±lÄ±r.Biraz yayÄ±lÄ±r kendine gelmeye &ccedil;alÄ±ÅŸÄ±lÄ±r,KahvaltÄ± bilgisayar baÅŸÄ±nda yapÄ±lÄ±r sonra kahve alÄ±nÄ±lÄ±r ve uzun maraton baÅŸlar m&uuml;ÅŸterinin ne istediÄŸini bir t&uuml;rl&uuml; bilmez yazÄ±lÄ±mcÄ± delirir kafayÄ± yer ve sonra bir isteÄŸi alÄ±r ve onu yapmaya koyulur uzun saatler boyunca kod yazdÄ±ktan sonra bir hata o hata yazÄ±lÄ±mcÄ±yÄ± delirtir farklÄ± iÅŸlere odaklanmaya &ccedil;alÄ±ÅŸsa da o hata baÅŸÄ±nÄ±n etini yer o hatayÄ± bulmaya &ccedil;alÄ±ÅŸÄ±r ve sonra sadece bir virg&uuml;l&uuml; koymayÄ± unuttuÄŸunu g&ouml;r&uuml;r hem sinirlenir hem de hatayÄ± &ccedil;&ouml;z&uuml;p programÄ±n &ccedil;alÄ±ÅŸmasÄ±na mutlu olur o mutluluk paha bi&ccedil;ilemez onun rahatlÄ±ÄŸÄ± ile yayÄ±lÄ±r fakat daha iÅŸi bitmemiÅŸtir .</p>\r\n', '20-12-2014', '1', 'resimler/1280x1024.jpg'),
(15, 'ANDROÄ°D TELEFONUNUZU HIZLANDIRIN !', '<p>&Ccedil;oÄŸu telefonda olduÄŸu gibi ilk kullanmaya baÅŸladÄ±ÄŸÄ±nÄ±zda telefonunuz hÄ±zlÄ±dÄ±r ve bundan memnunsunuzdur.Fakat zaman ilerledik&ccedil;e,&nbsp;<strong>Android</strong>&nbsp;cihazÄ±nÄ±za yeni uygulamalar, oyunlar kurduktan sonra hayliyle bir yavaÅŸlama olacaktÄ±r.Bu yavaÅŸlamalardan kurtulmak i&ccedil;in format atmak gibi &ccedil;&ouml;z&uuml;mlere baÅŸvurabilirsiniz fakat format atmak istemiyorsanÄ±z aÅŸaÄŸÄ±daki adÄ±mlar tam size g&ouml;re.YavaÅŸlamalar sonucunda cihazÄ±nÄ±z Ä±sÄ±nabilir &nbsp;ve baÅŸka sÄ±kÄ±ntÄ±larÄ± da beraberinde getirebilir.Bu yavaÅŸlama donanÄ±msal nedenlerden kaynaklanabileceÄŸi gibi yazÄ±lÄ±msal nedenlerden de kaynaklanÄ±r.Ä°ÅŸte bu makalemizde yazÄ±lÄ±msal nedenlerden yavaÅŸlamalarÄ± bir miktar olsada kaldÄ±racaÄŸÄ±z.Bu adÄ±mlarÄ± uyguladÄ±ÄŸÄ±nÄ±zda g&ouml;zle g&ouml;r&uuml;l&uuml;r bir fark ve b&uuml;y&uuml;k bir rahatlama olacaktÄ±r.</p>\r\n\r\n<p><strong>CihazÄ±nÄ±zÄ±n YazÄ±lÄ±mÄ±nÄ± G&uuml;ncelleÅŸtirin</strong></p>\r\n\r\n<p>Telefonunuzun yapÄ±mcÄ± firmasÄ± size belli aralÄ±klarla size yazÄ±lÄ±m g&uuml;ncellemeleri sunar.EÄŸer cihazÄ±nÄ±zÄ±n daha g&uuml;venli ve daha hÄ±zlÄ± olmasÄ±nÄ± istiyorsanÄ±z (ki bu konuya girdiÄŸinize g&ouml;re istiyorsunuz) bu g&uuml;ncelleÅŸtirmeleri sakÄ±n g&ouml;z ardÄ± etmeyin.CihazÄ±nÄ±za faydasÄ± olmasa adamlar uÄŸraÅŸÄ±p bu g&uuml;ncelleÅŸtirmeleri &ccedil;Ä±karmaz herhalde.G&uuml;ncelleÅŸtirmeleri ÅŸu ana kadar &ouml;nemsemeyip ÅŸimdi y&uuml;klemeye karar verdiyseniz hemen ayarlardan&nbsp;<strong>Telefon HakkÄ±nda&nbsp;</strong>se&ccedil;eneÄŸinden bu g&uuml;ncellemelere ulaÅŸÄ±p bunlarÄ± telefonunuza &nbsp;y&uuml;kleyebilirsiniz.</p>\r\n\r\n<p><strong>AnimasyonlarÄ± KapatÄ±n</strong></p>\r\n\r\n<p>Android telefonunuzun bu &ouml;zelliÄŸi a&ccedil;Ä±k olabilir ve bundan sizin haberiniz olmayabilir.Gizli bir &ouml;zellik olarak eklenmiÅŸ bu &ouml;zellik arkaplanda sizin ne olduÄŸunu dahi bilemediÄŸiniz fonksiyonlarÄ±n &ccedil;alÄ±ÅŸmasÄ±na izin verir.&rdquo;GeliÅŸtirici Se&ccedil;enekleri&rdquo; b&ouml;l&uuml;m&uuml;nden yapÄ±lan bu ayarlarda dikkat edilmesi gereken husus ise bunun ne olduÄŸunu bilmiyorsanÄ±z bu adÄ±mÄ± atlayÄ±n ve diÄŸer adÄ±ma ge&ccedil;in.&Ccedil;&uuml;nk&uuml; bu &ouml;zelliÄŸi kapattÄ±ÄŸÄ±nÄ±z taktirde oyunlarÄ±nÄ±zdaki grafik kalitesi d&uuml;ÅŸecektir.EÄŸer &ccedil;ok oyun oynayan birisi deÄŸilseniz tavsiye ediyoruz.</p>\r\n', '20-12-2014', '10', 'resimler/04-Android-Wallpaper-Full-HD-liberal - Kopya.jpg'),
(16, 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam velit erat, ultrices vel mauris sit amet, cursus hendrerit turpis. Pellentesque id mauris dignissim, suscipit velit sit amet, varius nulla. Integer id malesuada metus. Ut egestas sagittis nisl. Suspendisse sollicitudin orci id eros venenatis volutpat. Nullam efficitur quam quis quam elementum consequat. Maecenas fringilla lectus vel placerat aliquam.</p>\r\n\r\n<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed non lacus leo. Maecenas vestibulum accumsan arcu eget condimentum. Aenean non felis sem. Suspendisse tempus diam quis ipsum accumsan congue. Etiam leo purus, tincidunt vitae nisi at, ullamcorper aliquet magna. In quis condimentum ante. Pellentesque aliquam mi non tempus dignissim. Morbi rutrum cursus eros et porta. Nam sed dapibus urna, ut elementum augue. Vestibulum pulvinar egestas enim nec suscipit.</p>\r\n\r\n<p>Vestibulum posuere convallis elit in cursus. Suspendisse potenti. Duis pharetra placerat blandit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed eros diam, aliquam eu elit nec, elementum dictum mi. Nunc mauris nibh, gravida ac aliquam ut, pellentesque vel velit. Sed varius enim ac arcu maximus, nec laoreet nunc volutpat. Aliquam iaculis, elit ut tempus fermentum, enim justo ultrices urna, ac varius enim nibh nec quam. Vivamus dolor neque, auctor eget nisi vel, pulvinar dictum turpis.</p>\r\n\r\n<p>Integer leo leo, iaculis sed eros vel, elementum condimentum erat. In sodales facilisis orci, quis vulputate odio sollicitudin condimentum. Proin semper magna in velit congue bibendum. Integer placerat ac turpis ullamcorper porttitor. Aliquam egestas nulla ac libero pellentesque, in fringilla sapien viverra. Fusce eget purus at ipsum ultrices ornare. In ac sem vitae leo lacinia efficitur ac in quam. Integer gravida ligula nec ante scelerisque, quis varius arcu gravida. In eget tristique purus. Morbi venenatis, quam sit amet dignissim tristique, felis massa convallis lacus, sed cursus erat metus nec ligula. Duis non tellus justo. In sit amet consequat augue. Nam tortor sapien, fermentum quis metus tincidunt, consectetur lacinia velit. Nullam non ipsum tellus. Fusce eget porttitor ligula. Morbi sapien justo, bibendum in neque id, ornare lobortis lacus.</p>\r\n\r\n<p>Mauris massa nisi, viverra ut gravida sed, congue eu ante. Vestibulum luctus enim a magna lacinia, id tempor ex accumsan. Ut tellus sapien, pulvinar vel efficitur non, tincidunt maximus erat. Suspendisse dictum, eros nec semper sodales, ex lorem fermentum orci, quis bibendum urna libero id risus. Suspendisse ante libero, rhoncus at placerat vitae, blandit ac tellus. Vivamus consectetur neque neque, ut vestibulum leo viverra at. Aenean tincidunt lectus et accumsan fermentum. Sed hendrerit id odio ac mattis. Nunc elementum semper mi, nec sagittis ipsum. In hac habitasse platea dictumst. Mauris facilisis sapien vel ornare vestibulum. Pellentesque pulvinar turpis sem, at varius elit tincidunt at.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '20-12-2014', '10', 'resimler/1712839.jpg'),
(17, 'Cras ullamcorper ultricies', '<p>Nullam id metus purus. Vivamus vehicula in lorem ut eleifend. Quisque auctor sagittis lectus in convallis. In elementum odio sit amet purus posuere, auctor venenatis dolor porttitor. Aenean non mi neque. Nam congue vulputate pharetra. Vivamus eget sodales tellus. Morbi ac nisl vitae dui consequat posuere sit amet nec urna. Morbi vitae leo faucibus, aliquet tortor vitae, scelerisque urna. Nunc lectus massa, sollicitudin quis velit in, varius vehicula dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fringilla luctus vulputate. Morbi congue auctor risus, et congue nulla tincidunt sit amet. Proin at erat nec risus facilisis auctor.</p>\r\n\r\n<p>Maecenas rutrum nisi eu augue auctor, a iaculis mi consectetur. Sed nulla quam, blandit id diam eu, dictum aliquam felis. Quisque eros turpis, aliquam nec molestie eu, consequat ut velit. Mauris vel faucibus ex, at iaculis lectus. Sed neque mi, molestie eu quam ut, sodales ultricies massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec libero magna, tempor in vulputate a, accumsan vitae massa. Duis convallis dui vitae ipsum congue, fermentum interdum massa sollicitudin. Vivamus iaculis eget ex ac commodo. Integer pulvinar, lectus non lacinia congue, erat orci elementum mauris, nec tincidunt tellus magna at nunc. Ut justo velit, volutpat sit amet finibus auctor, molestie nec magna.</p>\r\n\r\n<p>Curabitur et purus in sem blandit tristique. Donec laoreet risus a turpis aliquet egestas. In hac habitasse platea dictumst. Fusce nec elit ex. Praesent tincidunt, dui sed ultricies commodo, arcu lectus fermentum metus, a vestibulum purus felis eget dui. Mauris ut pellentesque sem, a maximus dolor. Nunc gravida ligula tellus, quis tristique metus bibendum nec. Morbi nec pharetra enim. Sed in fermentum massa. Mauris ut diam vitae est accumsan finibus et nec quam.</p>\r\n\r\n<p>Quisque finibus sem sit amet rhoncus sodales. Sed aliquet nulla ut suscipit mattis. Quisque suscipit cursus cursus. Mauris aliquet, dolor vitae posuere elementum, metus risus pellentesque tortor, eget convallis nunc nunc at sem. Cras eu nisl quis ipsum venenatis auctor in nec neque. Praesent vitae neque mollis, tempus nisl quis, molestie dui. Maecenas nec enim neque. In nec velit ultricies, aliquam erat nec, consectetur mauris. Donec consectetur eleifend felis vel elementum. Duis eget elit id erat placerat congue sit amet eu turpis. Vivamus id elit sed est rhoncus gravida. Ut sit amet sapien maximus, laoreet mauris eu, commodo sem. Vivamus diam eros, pellentesque a neque luctus, ornare elementum neque. Vestibulum eu dignissim risus.</p>\r\n\r\n<p>Curabitur eu maximus tortor. Cras ullamcorper ultrices blandit. Sed in mi congue, accumsan lacus nec, vulputate dui. Maecenas ac dapibus est, vel elementum urna. Morbi sit amet mi pharetra purus varius dignissim. Integer eu ullamcorper eros. Suspendisse eget quam id odio faucibus finibus eget ac nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec eget blandit libero. Aliquam sit amet velit a lacus vulputate iaculis eu tristique ipsum.</p>\r\n\r\n<p>Aliquam sollicitudin neque ligula, ac blandit turpis scelerisque in. Sed commodo ipsum a nisi sagittis venenatis. Suspendisse vel mauris sit amet arcu vestibulum dictum. Donec in lectus a turpis pellentesque tincidunt. Fusce tortor nisi, consectetur in dolor fermentum, congue bibendum dui. Phasellus finibus iaculis convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porta dignissim vulputate. Fusce justo dui, pretium eget sodales quis, bibendum id turpis. Praesent eleifend ornare nulla, sit amet posuere ipsum viverra eu. Nunc id enim at turpis accumsan scelerisque ullamcorper non nulla. Maecenas et dui arcu.</p>\r\n', '20-12-2014', '10', 'resimler/pink-flowers-tumblr-quotes-background-1.jpg'),
(18, 'Sed egestas libero a erat tincidunt', '<p>Sed egestas libero a erat tincidunt, et lacinia est rhoncus. Proin a felis consectetur, tempor libero et, rhoncus risus. Cras tincidunt arcu lectus, ut pretium quam luctus nec. Quisque varius at elit id efficitur. Nullam mollis dui tortor, at sodales urna pellentesque id. Etiam tempor sem tellus, a dictum quam consequat sed. Nulla faucibus semper risus tincidunt lacinia. Aliquam quis ante eu lectus fermentum vestibulum. Etiam nec interdum nulla. In scelerisque ex eu nunc finibus feugiat. Pellentesque nisi dui, lacinia nec mi eleifend, scelerisque mollis augue. Donec a leo congue, ornare orci in, feugiat ex. Aenean suscipit molestie sodales. Quisque laoreet, elit ut vestibulum sagittis, nulla turpis pulvinar augue, vitae cursus elit lectus vel arcu. Cras id condimentum ante, consequat pulvinar eros.</p>\r\n\r\n<p>Vivamus id consequat quam. Mauris interdum lorem dui, et gravida velit elementum ut. Nulla auctor est in odio porta, ut sagittis nisl elementum. Donec nulla nisl, auctor in dignissim vitae, mollis vel eros. Nam euismod, justo vel tempor pretium, sem augue posuere ligula, sit amet lobortis elit tortor mattis augue. Duis id maximus massa, et vehicula urna. Vivamus eget orci leo. Nunc lobortis ut nulla ut rhoncus. Pellentesque sed tempor tortor, non bibendum odio. Sed ac nibh posuere, tincidunt ligula a, volutpat enim. Donec at scelerisque nulla.</p>\r\n\r\n<p>Duis imperdiet lacus non lorem porttitor ornare. In commodo blandit mauris, imperdiet commodo nulla bibendum non. Cras porta pellentesque pretium. Phasellus egestas quam sed mauris bibendum, et fringilla arcu posuere. Pellentesque et pellentesque ante. Nunc hendrerit tempus nisi in sagittis. Morbi facilisis tempor porttitor. Proin semper mattis neque id ornare. Vivamus dui odio, porttitor ac congue dignissim, dapibus non tortor. Sed lobortis tincidunt justo, rhoncus viverra magna malesuada eu.</p>\r\n\r\n<p>Fusce posuere pulvinar purus, a porttitor est faucibus vestibulum. Sed consectetur malesuada tellus, id aliquet eros luctus a. Etiam semper justo vitae ipsum ornare aliquet. Vivamus tincidunt ligula vel condimentum dapibus. In volutpat facilisis nunc, eget mattis lacus pulvinar a. Sed lobortis purus eget turpis finibus, vel luctus neque elementum. Etiam ultricies neque lacus, vitae luctus lectus bibendum at. Nam tempor venenatis orci, vel dapibus dolor dapibus vitae. Proin ut massa leo. Aenean dignissim, diam vel posuere suscipit, eros felis euismod urna, quis tincidunt dui dolor semper nisl. Nunc rhoncus placerat sapien, ac congue dui vestibulum ut. Praesent sit amet viverra mauris. Sed consequat purus vel mi vulputate consectetur.</p>\r\n\r\n<p>Sed egestas libero a erat tincidunt, et lacinia est rhoncus. Proin a felis consectetur, tempor libero et, rhoncus risus. Cras tincidunt arcu lectus, ut pretium quam luctus nec. Quisque varius at elit id efficitur. Nullam mollis dui tortor, at sodales urna pellentesque id. Etiam tempor sem tellus, a dictum quam consequat sed. Nulla faucibus semper risus tincidunt lacinia. Aliquam quis ante eu lectus fermentum vestibulum. Etiam nec interdum nulla. In scelerisque ex eu nunc finibus feugiat. Pellentesque nisi dui, lacinia nec mi eleifend, scelerisque mollis augue. Donec a leo congue, ornare orci in, feugiat ex. Aenean suscipit molestie sodales. Quisque laoreet, elit ut vestibulum sagittis, nulla turpis pulvinar augue, vitae cursus elit lectus vel arcu. Cras id condimentum ante, consequat pulvinar eros.</p>\r\n\r\n<p>Vivamus id consequat quam. Mauris interdum lorem dui, et gravida velit elementum ut. Nulla auctor est in odio porta, ut sagittis nisl elementum. Donec nulla nisl, auctor in dignissim vitae, mollis vel eros. Nam euismod, justo vel tempor pretium, sem augue posuere ligula, sit amet lobortis elit tortor mattis augue. Duis id maximus massa, et vehicula urna. Vivamus eget orci leo. Nunc lobortis ut nulla ut rhoncus. Pellentesque sed tempor tortor, non bibendum odio. Sed ac nibh posuere, tincidunt ligula a, volutpat enim. Donec at scelerisque nulla.</p>\r\n\r\n<p>Duis imperdiet lacus non lorem porttitor ornare. In commodo blandit mauris, imperdiet commodo nulla bibendum non. Cras porta pellentesque pretium. Phasellus egestas quam sed mauris bibendum, et fringilla arcu posuere. Pellentesque et pellentesque ante. Nunc hendrerit tempus nisi in sagittis. Morbi facilisis tempor porttitor. Proin semper mattis neque id ornare. Vivamus dui odio, porttitor ac congue dignissim, dapibus non tortor. Sed lobortis tincidunt justo, rhoncus viverra magna malesuada eu.</p>\r\n\r\n<p>Fusce posuere pulvinar purus, a porttitor est faucibus vestibulum. Sed consectetur malesuada tellus, id aliquet eros luctus a. Etiam semper justo vitae ipsum ornare aliquet. Vivamus tincidunt ligula vel condimentum dapibus. In volutpat facilisis nunc, eget mattis lacus pulvinar a. Sed lobortis purus eget turpis finibus, vel luctus neque elementum. Etiam ultricies neque lacus, vitae luctus lectus bibendum at. Nam tempor venenatis orci, vel dapibus dolor dapibus vitae. Proin ut massa leo. Aenean dignissim, diam vel posuere suscipit, eros felis euismod urna, quis tincidunt dui dolor semper nisl. Nunc rhoncus placerat sapien, ac congue dui vestibulum ut. Praesent sit amet viverra mauris. Sed consequat purus vel mi vulputate consectetur.</p>\r\n', '20-12-2014', '3', 'resimler/first_blossoms_wallpaper_by_vanerich.jpg'),
(19, 'Praesent nec quam felis', '<p>Aenean eu enim dapibus arcu varius ultrices. Donec molestie neque sit amet leo facilisis sagittis. Praesent molestie libero in nisi ullamcorper, et malesuada augue elementum. Sed eu varius neque. Nulla gravida, urna sit amet mattis tincidunt, sapien tortor tincidunt orci, et lacinia ipsum risus et augue. Suspendisse dictum arcu elit, ac posuere nisi blandit at. Donec varius arcu vel dolor molestie consectetur. Morbi erat quam, laoreet ac libero in, fringilla rutrum sapien. Sed lobortis vestibulum tortor eget elementum.</p>\r\n\r\n<p>Donec volutpat, diam nec gravida vestibulum, leo elit maximus mauris, a convallis ex lacus quis risus. Donec faucibus lectus et tristique efficitur. Nam laoreet tortor nec sagittis ullamcorper. Curabitur scelerisque diam quis lorem laoreet pretium. In at enim orci. Ut dictum neque elit, elementum congue risus tempor non. Aenean est mauris, eleifend quis congue at, convallis ut erat. Integer eleifend felis in mi tincidunt laoreet. Etiam ullamcorper mauris mi, vel pulvinar ex mattis sed. Morbi massa libero, interdum eget mattis at, efficitur et lectus. Cras lacus massa, semper at nisl sit amet, lobortis condimentum dui. Suspendisse placerat auctor purus, vitae imperdiet orci bibendum vel. Phasellus quis lectus mauris.</p>\r\n\r\n<p>Cras ullamcorper ultricies lacinia. Integer varius sit amet diam eget semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum ultrices euismod aliquam. Nam iaculis, tellus vel fringilla pretium, sapien dui consectetur ex, quis hendrerit mi arcu vel orci. Praesent a luctus nisl. Curabitur in nibh eget lacus eleifend accumsan a nec magna. Nullam leo est, convallis eget justo in, pellentesque mattis quam. Pellentesque tincidunt ex a odio rhoncus, eget vulputate orci luctus. Ut ac pellentesque orci, non vulputate tellus. Nunc viverra suscipit quam. Quisque mi ligula, scelerisque a feugiat vitae, blandit a sem.</p>\r\n\r\n<p>Nullam id metus purus. Vivamus vehicula in lorem ut eleifend. Quisque auctor sagittis lectus in convallis. In elementum odio sit amet purus posuere, auctor venenatis dolor porttitor. Aenean non mi neque. Nam congue vulputate pharetra. Vivamus eget sodales tellus. Morbi ac nisl vitae dui consequat posuere sit amet nec urna. Morbi vitae leo faucibus, aliquet tortor vitae, scelerisque urna. Nunc lectus massa, sollicitudin quis velit in, varius vehicula dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fringilla luctus vulputate. Morbi congue auctor risus, et congue nulla tincidunt sit amet. Proin at erat nec risus facilisis auctor.</p>\r\n\r\n<p>Maecenas rutrum nisi eu augue auctor, a iaculis mi consectetur. Sed nulla quam, blandit id diam eu, dictum aliquam felis. Quisque eros turpis, aliquam nec molestie eu, consequat ut velit. Mauris vel faucibus ex, at iaculis lectus. Sed neque mi, molestie eu quam ut, sodales ultricies massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec libero magna, tempor in vulputate a, accumsan vitae massa. Duis convallis dui vitae ipsum congue, fermentum interdum massa sollicitudin. Vivamus iaculis eget ex ac commodo. Integer pulvinar, lectus non lacinia congue, erat orci elementum mauris, nec tincidunt tellus magna at nunc. Ut justo velit, volutpat sit amet finibus auctor, molestie nec magna.</p>\r\n\r\n<p>Curabitur et purus in sem blandit tristique. Donec laoreet risus a turpis aliquet egestas. In hac habitasse platea dictumst. Fusce nec elit ex. Praesent tincidunt, dui sed ultricies commodo, arcu lectus fermentum metus, a vestibulum purus felis eget dui. Mauris ut pellentesque sem, a maximus dolor. Nunc gravida ligula tellus, quis tristique metus bibendum nec. Morbi nec pharetra enim. Sed in fermentum massa. Mauris ut diam vitae est accumsan finibus et nec quam.</p>\r\n\r\n<p>Quisque finibus sem sit amet rhoncus sodales. Sed aliquet nulla ut suscipit mattis. Quisque suscipit cursus cursus. Mauris aliquet, dolor vitae posuere elementum, metus risus pellentesque tortor, eget convallis nunc nunc at sem. Cras eu nisl quis ipsum venenatis auctor in nec neque. Praesent vitae neque mollis, tempus nisl quis, molestie dui. Maecenas nec enim neque. In nec velit ultricies, aliquam erat nec, consectetur mauris. Donec consectetur eleifend felis vel elementum. Duis eget elit id erat placerat congue sit amet eu turpis. Vivamus id elit sed est rhoncus gravida. Ut sit amet sapien maximus, laoreet mauris eu, commodo sem. Vivamus diam eros, pellentesque a neque luctus, ornare elementum neque. Vestibulum eu dignissim risus.</p>\r\n\r\n<p>Curabitur eu maximus tortor. Cras ullamcorper ultrices blandit. Sed in mi congue, accumsan lacus nec, vulputate dui. Maecenas ac dapibus est, vel elementum urna. Morbi sit amet mi pharetra purus varius dignissim. Integer eu ullamcorper eros. Suspendisse eget quam id odio faucibus finibus eget ac nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec eget blandit libero. Aliquam sit amet velit a lacus vulputate iaculis eu tristique ipsum.</p>\r\n\r\n<p>Aliquam sollicitudin neque ligula, ac blandit turpis scelerisque in. Sed commodo ipsum a nisi sagittis venenatis. Suspendisse vel mauris sit amet arcu vestibulum dictum. Donec in lectus a turpis pellentesque tincidunt. Fusce tortor nisi, consectetur in dolor fermentum, congue bibendum dui. Phasellus finibus iaculis convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porta dignissim vulputate. Fusce justo dui, pretium eget sodales quis, bibendum id turpis. Praesent eleifend ornare nulla, sit amet posuere ipsum viverra eu. Nunc id enim at turpis accumsan scelerisque ullamcorper non nulla. Maecenas et dui arcu.</p>\r\n', '20-12-2014', '4', 'resimler/1646924.jpg'),
(20, 'Curabitur et purus in sem', '<p>Quisque finibus sem sit amet rhoncus sodales. Sed aliquet nulla ut suscipit mattis. Quisque suscipit cursus cursus. Mauris aliquet, dolor vitae posuere elementum, metus risus pellentesque tortor, eget convallis nunc nunc at sem. Cras eu nisl quis ipsum venenatis auctor in nec neque. Praesent vitae neque mollis, tempus nisl quis, molestie dui. Maecenas nec enim neque. In nec velit ultricies, aliquam erat nec, consectetur mauris. Donec consectetur eleifend felis vel elementum. Duis eget elit id erat placerat congue sit amet eu turpis. Vivamus id elit sed est rhoncus gravida. Ut sit amet sapien maximus, laoreet mauris eu, commodo sem. Vivamus diam eros, pellentesque a neque luctus, ornare elementum neque. Vestibulum eu dignissim risus.</p>\r\n\r\n<p>Curabitur eu maximus tortor. Cras ullamcorper ultrices blandit. Sed in mi congue, accumsan lacus nec, vulputate dui. Maecenas ac dapibus est, vel elementum urna. Morbi sit amet mi pharetra purus varius dignissim. Integer eu ullamcorper eros. Suspendisse eget quam id odio faucibus finibus eget ac nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec eget blandit libero. Aliquam sit amet velit a lacus vulputate iaculis eu tristique ipsum.</p>\r\n\r\n<p>Aliquam sollicitudin neque ligula, ac blandit turpis scelerisque in. Sed commodo ipsum a nisi sagittis venenatis. Suspendisse vel mauris sit amet arcu vestibulum dictum. Donec in lectus a turpis pellentesque tincidunt. Fusce tortor nisi, consectetur in dolor fermentum, congue bibendum dui. Phasellus finibus iaculis convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porta dignissim vulputate. Fusce justo dui, pretium eget sodales quis, bibendum id turpis. Praesent eleifend ornare nulla, sit amet posuere ipsum viverra eu. Nunc id enim at turpis accumsan scelerisque ullamcorper non nulla. Maecenas et dui arcu.</p>\r\n\r\n<p>Morbi pulvinar convallis diam et faucibus. Curabitur tempor dictum dolor a euismod. Morbi ut odio sed eros bibendum tempus. Phasellus condimentum ante id pulvinar tempus. Ut iaculis dui vitae risus accumsan, eget porttitor leo ultrices. In vitae odio eu ipsum molestie fringilla vel eu nisi. Maecenas efficitur, erat in volutpat euismod, lorem quam mattis est, nec tempus arcu elit id odio. Curabitur suscipit sollicitudin ante. Nulla facilisi. Vestibulum vel ullamcorper massa, nec imperdiet lacus. Praesent et luctus neque. Vivamus blandit orci eget sollicitudin auctor. Praesent sed nisl neque.</p>\r\n\r\n<p>Sed posuere auctor metus a ultrices. Quisque et ipsum at nisi semper dignissim quis id lectus. Praesent vitae ex augue. Phasellus arcu dui, faucibus id egestas et, accumsan sed nulla. Suspendisse volutpat vitae metus quis dignissim. Donec luctus finibus lorem id tempor. Proin lorem enim, commodo nec lobortis in, pellentesque eu ex. Etiam ultrices tortor vel tortor ultricies, sed aliquam enim finibus. Donec ac diam id orci posuere sollicitudin.</p>\r\n\r\n<p>Sed et purus vitae mauris varius tristique quis non nibh. Fusce at diam in nulla hendrerit efficitur. Sed viverra congue nisl, et mattis sapien consectetur tincidunt. Nulla libero neque, euismod placerat cursus sit amet, rhoncus et ligula. Nam et nibh ante. Maecenas imperdiet quam erat, vel viverra lectus gravida non. Proin ultricies aliquam nisl, placerat porta ipsum egestas nec. Nulla dictum efficitur est nec tincidunt. Donec varius, mauris eget fringilla vehicula, dolor purus commodo massa, vel volutpat nulla mauris vel lectus.</p>\r\n\r\n<p>Sed egestas libero a erat tincidunt, et lacinia est rhoncus. Proin a felis consectetur, tempor libero et, rhoncus risus. Cras tincidunt arcu lectus, ut pretium quam luctus nec. Quisque varius at elit id efficitur. Nullam mollis dui tortor, at sodales urna pellentesque id. Etiam tempor sem tellus, a dictum quam consequat sed. Nulla faucibus semper risus tincidunt lacinia. Aliquam quis ante eu lectus fermentum vestibulum. Etiam nec interdum nulla. In scelerisque ex eu nunc finibus feugiat. Pellentesque nisi dui, lacinia nec mi eleifend, scelerisque mollis augue. Donec a leo congue, ornare orci in, feugiat ex. Aenean suscipit molestie sodales. Quisque laoreet, elit ut vestibulum sagittis, nulla turpis pulvinar augue, vitae cursus elit lectus vel arcu. Cras id condimentum ante, consequat pulvinar eros.</p>\r\n', '20-12-2014', '5', 'resimler/spring-wallpaper-tumblr-hd-pictures-41.jpg'),
(21, 'Class aptent taciti sociosqu ad litora', '<p>Duis convallis dui vitae ipsum congue, fermentum interdum massa sollicitudin. Vivamus iaculis eget ex ac commodo. Integer pulvinar, lectus non lacinia congue, erat orci elementum mauris, nec tincidunt tellus magna at nunc. Ut justo velit, volutpat sit amet finibus auctor, molestie nec magna.</p>\r\n\r\n<p>Curabitur et purus in sem blandit tristique. Donec laoreet risus a turpis aliquet egestas. In hac habitasse platea dictumst. Fusce nec elit ex. Praesent tincidunt, dui sed ultricies commodo, arcu lectus fermentum metus, a vestibulum purus felis eget dui. Mauris ut pellentesque sem, a maximus dolor. Nunc gravida ligula tellus, quis tristique metus bibendum nec. Morbi nec pharetra enim. Sed in fermentum massa. Mauris ut diam vitae est accumsan finibus et nec quam.</p>\r\n\r\n<p>Quisque finibus sem sit amet rhoncus sodales. Sed aliquet nulla ut suscipit mattis. Quisque suscipit cursus cursus. Mauris aliquet, dolor vitae posuere elementum, metus risus pellentesque tortor, eget convallis nunc nunc at sem. Cras eu nisl quis ipsum venenatis auctor in nec neque. Praesent vitae neque mollis, tempus nisl quis, molestie dui. Maecenas nec enim neque. In nec velit ultricies, aliquam erat nec, consectetur mauris. Donec consectetur eleifend felis vel elementum. Duis eget elit id erat placerat congue sit amet eu turpis. Vivamus id elit sed est rhoncus gravida. Ut sit amet sapien maximus, laoreet mauris eu, commodo sem. Vivamus diam eros, pellentesque a neque luctus, ornare elementum neque. Vestibulum eu dignissim risus.</p>\r\n\r\n<p>Curabitur eu maximus tortor. Cras ullamcorper ultrices blandit. Sed in mi congue, accumsan lacus nec, vulputate dui. Maecenas ac dapibus est, vel elementum urna. Morbi sit amet mi pharetra purus varius dignissim. Integer eu ullamcorper eros. Suspendisse eget quam id odio faucibus finibus eget ac nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec eget blandit libero. Aliquam sit amet velit a lacus vulputate iaculis eu tristique ipsum.</p>\r\n\r\n<p>Aliquam sollicitudin neque ligula, ac blandit turpis scelerisque in. Sed commodo ipsum a nisi sagittis venenatis. Suspendisse vel mauris sit amet arcu vestibulum dictum. Donec in lectus a turpis pellentesque tincidunt. Fusce tortor nisi, consectetur in dolor fermentum, congue bibendum dui. Phasellus finibus iaculis convallis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porta dignissim vulputate. Fusce justo dui, pretium eget sodales quis, bibendum id turpis. Praesent eleifend ornare nulla, sit amet posuere ipsum viverra eu. Nunc id enim at turpis accumsan scelerisque ullamcorper non nulla. Maecenas et dui arcu.</p>\r\n\r\n<p>Morbi pulvinar convallis diam et faucibus. Curabitur tempor dictum dolor a euismod. Morbi ut odio sed eros bibendum tempus. Phasellus condimentum ante id pulvinar tempus. Ut iaculis dui vitae risus accumsan, eget porttitor leo ultrices. In vitae odio eu ipsum molestie fringilla vel eu nisi. Maecenas efficitur, erat in volutpat euismod, lorem quam mattis est, nec tempus arcu elit id odio. Curabitur suscipit sollicitudin ante. Nulla facilisi. Vestibulum vel ullamcorper massa, nec imperdiet lacus. Praesent et luctus neque. Vivamus blandit orci eget sollicitudin auctor. Praesent sed nisl neque.</p>\r\n\r\n<p>Sed posuere auctor metus a ultrices. Quisque et ipsum at nisi semper dignissim quis id lectus. Praesent vitae ex augue. Phasellus arcu dui, faucibus id egestas et, accumsan sed nulla. Suspendisse volutpat vitae metus quis dignissim. Donec luctus finibus lorem id tempor. Proin lorem enim, commodo nec lobortis in, pellentesque eu ex. Etiam ultrices tortor vel tortor ultricies, sed aliquam enim finibus. Donec ac diam id orci posuere sollicitudin.</p>\r\n', '20-12-2014', '6', 'resimler/paris_eiffel_tower_tumblr_hd_wallpaper-1024x640.jpg'),
(22, 'Suspendisse volutpat vitae metus', '<p>Curabitur suscipit sollicitudin ante. Nulla facilisi. Vestibulum vel ullamcorper massa, nec imperdiet lacus. Praesent et luctus neque. Vivamus blandit orci eget sollicitudin auctor. Praesent sed nisl neque.</p>\r\n\r\n<p>Sed posuere auctor metus a ultrices. Quisque et ipsum at nisi semper dignissim quis id lectus. Praesent vitae ex augue. Phasellus arcu dui, faucibus id egestas et, accumsan sed nulla. Suspendisse volutpat vitae metus quis dignissim. Donec luctus finibus lorem id tempor. Proin lorem enim, commodo nec lobortis in, pellentesque eu ex. Etiam ultrices tortor vel tortor ultricies, sed aliquam enim finibus. Donec ac diam id orci posuere sollicitudin.</p>\r\n\r\n<p>Sed et purus vitae mauris varius tristique quis non nibh. Fusce at diam in nulla hendrerit efficitur. Sed viverra congue nisl, et mattis sapien consectetur tincidunt. Nulla libero neque, euismod placerat cursus sit amet, rhoncus et ligula. Nam et nibh ante. Maecenas imperdiet quam erat, vel viverra lectus gravida non. Proin ultricies aliquam nisl, placerat porta ipsum egestas nec. Nulla dictum efficitur est nec tincidunt. Donec varius, mauris eget fringilla vehicula, dolor purus commodo massa, vel volutpat nulla mauris vel lectus.</p>\r\n\r\n<p>Sed egestas libero a erat tincidunt, et lacinia est rhoncus. Proin a felis consectetur, tempor libero et, rhoncus risus. Cras tincidunt arcu lectus, ut pretium quam luctus nec. Quisque varius at elit id efficitur. Nullam mollis dui tortor, at sodales urna pellentesque id. Etiam tempor sem tellus, a dictum quam consequat sed. Nulla faucibus semper risus tincidunt lacinia. Aliquam quis ante eu lectus fermentum vestibulum. Etiam nec interdum nulla. In scelerisque ex eu nunc finibus feugiat. Pellentesque nisi dui, lacinia nec mi eleifend, scelerisque mollis augue. Donec a leo congue, ornare orci in, feugiat ex. Aenean suscipit molestie sodales. Quisque laoreet, elit ut vestibulum sagittis, nulla turpis pulvinar augue, vitae cursus elit lectus vel arcu. Cras id condimentum ante, consequat pulvinar eros.</p>\r\n\r\n<p>Vivamus id consequat quam. Mauris interdum lorem dui, et gravida velit elementum ut. Nulla auctor est in odio porta, ut sagittis nisl elementum. Donec nulla nisl, auctor in dignissim vitae, mollis vel eros. Nam euismod, justo vel tempor pretium, sem augue posuere ligula, sit amet lobortis elit tortor mattis augue. Duis id maximus massa, et vehicula urna. Vivamus eget orci leo. Nunc lobortis ut nulla ut rhoncus. Pellentesque sed tempor tortor, non bibendum odio. Sed ac nibh posuere, tincidunt ligula a, volutpat enim. Donec at scelerisque nulla.</p>\r\n\r\n<p>Duis imperdiet lacus non lorem porttitor ornare. In commodo blandit mauris, imperdiet commodo nulla bibendum non. Cras porta pellentesque pretium. Phasellus egestas quam sed mauris bibendum, et fringilla arcu posuere. Pellentesque et pellentesque ante. Nunc hendrerit tempus nisi in sagittis. Morbi facilisis tempor porttitor. Proin semper mattis neque id ornare.</p>\r\n\r\n<p>Sed et purus vitae mauris varius tristique quis non nibh. Fusce at diam in nulla hendrerit efficitur. Sed viverra congue nisl, et mattis sapien consectetur tincidunt. Nulla libero neque, euismod placerat cursus sit amet, rhoncus et ligula. Nam et nibh ante. Maecenas imperdiet quam erat, vel viverra lectus gravida non. Proin ultricies aliquam nisl, placerat porta ipsum egestas nec. Nulla dictum efficitur est nec tincidunt. Donec varius, mauris eget fringilla vehicula, dolor purus commodo massa, vel volutpat nulla mauris vel lectus.</p>\r\n', '20-12-2014', '7', 'resimler/tumblr_static_wallpaper-2483440.jpg'),
(23, 'Vivamus dui odio, porttitor ac', '<p>Pellentesque nisi dui, lacinia nec mi eleifend, scelerisque mollis augue. Donec a leo congue, ornare orci in, feugiat ex. Aenean suscipit molestie sodales. Quisque laoreet, elit ut vestibulum sagittis, nulla turpis pulvinar augue, vitae cursus elit lectus vel arcu. Cras id condimentum ante, consequat pulvinar eros.</p>\r\n\r\n<p>Vivamus id consequat quam. Mauris interdum lorem dui, et gravida velit elementum ut. Nulla auctor est in odio porta, ut sagittis nisl elementum. Donec nulla nisl, auctor in dignissim vitae, mollis vel eros. Nam euismod, justo vel tempor pretium, sem augue posuere ligula, sit amet lobortis elit tortor mattis augue. Duis id maximus massa, et vehicula urna. Vivamus eget orci leo. Nunc lobortis ut nulla ut rhoncus. Pellentesque sed tempor tortor, non bibendum odio. Sed ac nibh posuere, tincidunt ligula a, volutpat enim. Donec at scelerisque nulla.</p>\r\n\r\n<p>Duis imperdiet lacus non lorem porttitor ornare. In commodo blandit mauris, imperdiet commodo nulla bibendum non. Cras porta pellentesque pretium. Phasellus egestas quam sed mauris bibendum, et fringilla arcu posuere. Pellentesque et pellentesque ante. Nunc hendrerit tempus nisi in sagittis. Morbi facilisis tempor porttitor. Proin semper mattis neque id ornare. Vivamus dui odio, porttitor ac congue dignissim, dapibus non tortor. Sed lobortis tincidunt justo, rhoncus viverra magna malesuada eu.</p>\r\n', '20-12-2014', '9', 'resimler/tumblr-wallpaper-13748-14162-hd-wallpapers.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
