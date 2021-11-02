-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 31 Eki 2021, 21:30:12
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `basitblog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_baslik` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `blog_text` text COLLATE utf8_turkish_ci NOT NULL,
  `blog_etiketler` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `blog_yazarid` int(11) NOT NULL,
  `blog_zaman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_baslik`, `blog_text`, `blog_etiketler`, `blog_yazarid`, `blog_zaman`) VALUES
(1, 'Lorem İpsum', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'lorem, ipsum, gg, naber', 1, '2021-10-31 21:42:37'),
(5, 'Yazi 23', '                        \r\nHASAN\r\n**            \r\n        Donec non ex lectus. Integer ullamcorper volutpat euismod. Quisque quis gravida dui. Aliquam molestie odio a sollicitudin semper. Proin gravida sapien nec condimentum tempus. Maecenas id porta urna. Sed malesuada tincidunt ultricies. Nullam non risus tortor. Nulla facilisi. Donec facilisis libero vitae vehicula faucibus. Nullam in elit at quam porttitor iaculis. Integer gravida suscipit nunc.\r\n--\r\n     Maecenas mauris sem, pharetra a nunc non, accumsan pellentesque purus. Maecenas venenatis orci ac nulla finibus, quis molestie ligula congue. Aenean et lorem vel tellus vulputate vulputate. Suspendisse posuere elit sit amet vulputate mattis. Phasellus porttitor tortor orci, et sollicitudin urna tincidunt id. Nam placerat, ligula sit amet lacinia euismod, nisi elit porttitor enim, pharetra semper felis nisl in augue. Fusce rhoncus ligula ut mauris pretium auctor. Fusce nisi tortor, laoreet vel lorem eget, tincidunt bibendum odio. Sed at convallis neque, et auctor mauris. Nulla vel turpis ornare, mattis neque eu, semper justo. Mauris eget eros a felis feugiat interdum quis at metus. Aenean viverra arcu nec odio scelerisque, sit amet pellentesque mi dictum.\r\n--\r\n Etiam eget finibus enim. Donec congue fermentum purus, in placerat ex posuere ut. Sed lacinia nunc in dui facilisis, ut tincidunt orci egestas. Suspendisse ornare vel neque eget laoreet. Aenean viverra diam non erat bibendum sollicitudin. Mauris luctus felis tortor, ac efficitur arcu pulvinar sed. In at arcu arcu. Donec malesuada, nisi fringilla consectetur semper, purus metus fringilla urna, in cursus ligula erat nec dolor. Nulla ornare porta ante, non aliquam libero eleifend eget. Cras aliquet mollis leo ac tincidunt. Aliquam vitae finibus neque, ac viverra orci. Morbi imperdiet mi tempus bibendum laoreet. Sed venenatis leo eu orci rutrum laoreet. Curabitur cursus ligula sem, non bibendum ex ultricies in. Donec at pretium nisi. Fusce convallis ullamcorper ipsum sodales pretium.                                ', 'etiket, atarız, anam, HEHE', 1, '2021-11-01 00:09:52'),
(6, 'Lorem New', 'Curabitur risus elit, scelerisque ac vestibulum non, malesuada at velit. Proin condimentum, nisl consequat pharetra bibendum, ipsum magna cursus mi, sit amet pulvinar risus nisi id massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque tristique vestibulum vehicula. Praesent tincidunt risus erat, in ornare felis venenatis vel. Proin quis justo at erat finibus consequat. Donec facilisis efficitur sapien, ut volutpat ipsum tempor nec. Aenean tincidunt ex vel urna pharetra tristique.\r\n\r\nEtiam ut risus enim. Nulla vehicula leo vel nisi hendrerit, non facilisis nunc accumsan. Mauris odio nibh, malesuada vitae mattis sagittis, tincidunt sit amet metus. Etiam rutrum lacus id urna eleifend malesuada. Nulla lobortis magna vel sodales porttitor. Fusce lacinia tempor volutpat. Donec fermentum, arcu eleifend semper vestibulum, augue massa convallis nulla, sed porta justo nisl ut dui. Nam sit amet lacus vel libero mollis consectetur. Sed fermentum leo id dui laoreet, vel elementum justo tincidunt. Curabitur nunc diam, pharetra eu arcu ac, cursus lobortis ipsum.\r\n\r\nNulla imperdiet vestibulum velit, dignissim dapibus lorem. Phasellus et massa maximus, porta eros id, molestie est. Maecenas volutpat eget ipsum ac sodales. Aliquam sed quam volutpat, rhoncus odio quis, hendrerit arcu. Ut ultrices fringilla egestas. Sed ornare, lorem sit amet blandit pellentesque, tellus felis lacinia diam, a laoreet nisi urna quis nisi. Mauris eleifend feugiat lobortis. Aliquam tristique, neque sit amet aliquet iaculis, libero purus porttitor justo, nec porttitor ante ante pretium nisi. Aenean a volutpat magna. Integer felis felis, vehicula nec condimentum vitae, sagittis sed risus. Pellentesque nec ullamcorper lacus, et convallis ipsum.\r\n\r\nPellentesque nec congue leo. Praesent eget nunc elit. Vivamus varius sit amet quam vel viverra. Vivamus hendrerit ex non mauris eleifend tempus. Sed feugiat ac sem et faucibus. Pellentesque imperdiet aliquam tellus sed malesuada. Pellentesque pellentesque eros vitae odio auctor egestas. Donec blandit odio ac dapibus vulputate. Etiam blandit pellentesque venenatis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Ut bibendum quam erat, in imperdiet orci commodo nec. Donec sed congue risus, a gravida nulla. Donec laoreet ut neque vitae ullamcorper. Praesent laoreet ultricies leo et rutrum. Phasellus scelerisque enim id diam dictum commodo.\r\n\r\nMaecenas bibendum luctus imperdiet. In imperdiet ipsum quis ullamcorper scelerisque. Nunc lacinia ligula vel quam volutpat, vitae commodo nibh tincidunt. Mauris placerat metus congue, venenatis sapien quis, ultrices metus. Nulla commodo erat ac tellus bibendum, sit amet rhoncus ipsum euismod. Cras id nisi auctor, rutrum quam vulputate, vestibulum sem. Aliquam imperdiet mattis felis, sit amet convallis turpis tempus sit amet. Vivamus laoreet neque id tellus tincidunt feugiat eget nec neque. Nam tempor nibh luctus, aliquam nibh eu, gravida dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam auctor lacus dolor, sit amet suscipit dolor consectetur non.\r\n\r\nInteger convallis condimentum quam id ornare. Mauris feugiat purus vel neque commodo egestas. Fusce ex nisl, commodo quis mauris vel, tempus malesuada tellus. Ut ut porta risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec ultrices sagittis enim ut rhoncus. Cras pellentesque nec erat facilisis tristique. Nunc blandit, elit sit amet egestas consequat, sem ligula accumsan est, nec ultricies diam justo sollicitudin mauris. Fusce consectetur sodales elit, ut finibus purus fringilla sit amet. Proin a lacus tincidunt, vestibulum tortor nec, vestibulum risus. Vivamus non ante in tellus consequat sagittis non eget odio. Nullam eu congue tellus. Praesent ut lacus eros. Proin finibus a erat vel tincidunt. Nulla fermentum, purus ac rhoncus efficitur, augue tortor dignissim mauris, non interdum tortor erat eu augue.\r\n\r\nPhasellus eu lectus felis. Curabitur mattis semper tortor, ultricies cursus ipsum condimentum lobortis. Etiam neque arcu, vulputate nec metus ut, eleifend euismod sapien. Donec tincidunt efficitur scelerisque. Cras metus turpis, blandit sit amet tincidunt vitae, elementum sed nisl. Duis gravida lacus eget varius luctus. Sed consequat lobortis massa, in sagittis libero sagittis sit amet. Suspendisse potenti. Curabitur ultricies vel diam eu convallis. Morbi augue neque, iaculis ut ullamcorper non, faucibus ac lorem. Morbi mollis maximus turpis vitae accumsan. Suspendisse viverra tortor dictum porta rutrum.\r\n\r\nPellentesque pretium cursus tortor quis auctor. Quisque finibus ligula at ligula posuere aliquam. Nullam ut tincidunt nulla. Morbi varius eros quis ex molestie mattis. In sollicitudin justo elementum magna elementum, ac faucibus leo euismod. Duis volutpat molestie justo, at molestie nisl efficitur sit amet. Aenean tincidunt sapien ac ligula euismod, nec sollicitudin ligula tincidunt. Ut at efficitur quam, ac iaculis urna. Phasellus nec interdum eros. Nullam faucibus nunc sit amet nisi aliquam maximus. Ut eu dolor lacinia, dignissim nibh in, ultricies tellus. Fusce lacinia diam et augue pretium, ac sagittis risus rutrum. Fusce vehicula dolor ex, sit amet imperdiet lacus maximus eu. Nunc tempor aliquam urna in egestas. Donec tempus eros eros, id viverra tortor cursus non. Donec tempus non ligula in gravida.\r\n\r\nDonec non turpis a ligula euismod interdum. Cras non nulla ut urna mollis dignissim in consectetur mi. Ut facilisis scelerisque velit eget ullamcorper. Mauris rutrum sodales tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis fermentum ac dui auctor tempus. Nunc rutrum nisl dui, sit amet vehicula libero congue vitae. Praesent porttitor tincidunt odio, non semper arcu sagittis eget. Suspendisse nisl ex, euismod ac felis in, congue ultrices ipsum.\r\n\r\nProin mollis, augue a rutrum ultrices, arcu lorem ornare nibh, nec fermentum est est vitae odio. Proin pulvinar faucibus nunc eu faucibus. Donec dictum semper orci, quis aliquam tortor lobortis et. Nunc porta rhoncus purus vitae porta. Phasellus porttitor leo eu enim convallis maximus. Duis at ligula cursus, viverra diam eu, euismod odio. Etiam non ex nisi. Vivamus ullamcorper imperdiet bibendum. Morbi aliquet commodo nunc, sed tincidunt eros luctus at.\r\n\r\nCras id tincidunt nisi, eget vulputate sem. Nunc convallis orci a quam pharetra, et convallis nibh tempor. Nulla molestie vitae purus at vulputate. Etiam euismod libero quis leo convallis, sit amet auctor enim pretium. Mauris sit amet mauris euismod libero venenatis semper et ut massa. Praesent pulvinar congue accumsan. Ut sapien neque, venenatis at purus pulvinar, consequat dapibus urna. Phasellus vitae cursus dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse convallis purus a lobortis tincidunt. Donec sodales ligula non dui fringilla eleifend. Cras nec consectetur nibh. Cras mollis ipsum ac dignissim blandit.\r\n\r\nDonec quam nunc, congue quis velit at, ornare consequat leo. Donec ac dolor urna. Nunc sapien leo, mattis et felis quis, aliquet elementum magna. Duis pulvinar blandit ultrices. Mauris at lacus arcu. Nunc pharetra, tellus et egestas semper, ipsum lorem mattis leo, a aliquam diam massa vitae ante. Praesent ornare, metus porttitor condimentum semper, nibh lacus faucibus ex, in viverra sem neque nec nisl. Ut in facilisis dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 'new, lorem, naber', 1, '2021-11-01 00:29:17');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_mail` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `user_name` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `user_authority` enum('0','1') COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`user_id`, `user_mail`, `user_password`, `user_name`, `user_authority`) VALUES
(1, 'hasanpolat60official@gmail.com', '3ed5975ca9d75352375e36efb42164c2', 'HASAN', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
