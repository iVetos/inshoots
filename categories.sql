-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Чрв 07 2016 р., 09:07
-- Версія сервера: 5.5.45-cll-lve
-- Версія PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `inshoots`
--

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(128) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `sort` int(11) NOT NULL,
  `actual` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Категории товаров' AUTO_INCREMENT=24 ;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `id_parent`, `name`, `text`, `img`, `title`, `description`, `keywords`, `sort`, `actual`) VALUES
(1, 0, 'Nature collection. Autumn.', '<p>Incredible nature. Incredible season. Amazing Australia.&nbsp;</p>\r\n', 'a70c82039d53cbf3fbb603637b5535a1.jpg', 'Australian Autumn', '', 'Autumn, Australia, Nature, Sydney, Season', 1, 1),
(15, 0, 'People Collection. Art.', '<p>Incredible nature. Incredible season. Amazing Australia.&nbsp;</p>\r\n', 'a05e6aa6a6b5e28161331a4ec687c767.jpg', 'People Collection. Art.', '', 'Spring, Australia, Nature, Sydney, Season', 0, 1),
(2, 0, 'Nature collection. Australia.', '<p>Incredible nature. Incredible colors. Green theme. Australia.&nbsp;</p>\r\n', '4b056a4d2de2f5fec016acff701d7c73.jpg', 'New Zeland', '', 'Autumn, Australia, Nature, Sydney, Season', 5, 1),
(16, 0, 'People collection. My portfolio.', '<p>This collection is my portfolio as a photographer. All the photos here have been taken by me. You are very welcome to enjoy it. Please remember that these photos can&#39;t be downloaded for any personal or commercial use.&nbsp;</p>\r\n', 'b60dde38f160f46884344f12cf8b15b0.jpg', 'People collection. My portfolio.', '', 'People, Portfolio, Love Story, Wedding, Photography, Inshoots, photobyalexv, alex v, sydney, australia', 0, 1),
(17, 0, 'City collection. Australia and New Zealand.', '<p>City Style. Australia and New Zealand&#39;s megapolises.&nbsp;</p>\r\n', '36a9622568790c52dacb3b792b5cd792.jpg', 'City collection. Australia and New Zealand.', '', 'City, Sydney, Australia, Melbourne, Auckland', 0, 1),
(5, 0, 'City style collection. Night. ', '<p>This collection presents how I see the night. Beauty of reflections, lights and a number of mustery spirits sorrounding the places of joy, relax and comfort. This is the collection of art.&nbsp;</p>\r\n', '4ce2a582fc45d7873c72d20bd7d163c6.jpg', 'Beauty of the Night. ', '', 'city, beauty, night, CBD, sydney, melbourne, megapolis, night view, reflection, print', 4, 1),
(18, 0, 'City collection. Europe.', '<p>City Style. European Legends...&nbsp;</p>\r\n', '4a98bf56d077d967272da6ff3e32436a.jpg', 'City collection. Europe.', '', 'City, France, Europe, Switzerland, Austria, Spain, Italy, Paris, Barcelona, Davos, Zurich, Geneva, Rome, Salsburg, Gratz, Germany', 0, 1),
(19, 0, ' Nature Collection', '<p>Nature around us. Australia.&nbsp;</p>\r\n', 'ee84241bfb1c09719f470c9d33197e30.jpg', 'Nature collection. Fauna.', '', 'Nature, Fauna, Kangaroo, Parrots, Koala, Australia', 0, 1),
(20, 0, 'Nature collection. Sunsets and Sunrises.', '<p>Beauty of the orange sunlight. Nature collection.</p>\r\n', 'a434f85a552881d8216e2567b510b056.jpg', 'Nature collection. Sunsets and Sunrises.', '', 'Sunset, Sunrise, Nature', 0, 1),
(21, 0, 'Nature collection. Europe.', '<p>European Nature collection .&nbsp;</p>\r\n', '5cc6e659dc78c6e287fe077019d7631a.jpg', 'Nature collection. Europe.', '', 'Europe, Nature, Collection', 0, 1),
(22, 0, 'Nature collection. New Zealand.', '<p>One of the most incredible Land at the Earth... Beautiful New Zealand.&nbsp;</p>\r\n', '569139ddec677247cdd30e6909cdad95.jpg', 'Nature collection. New Zealand.', '', 'New Zealand, Nature, Amazing', 0, 1),
(23, 0, 'Commercial Photography', '<p>Commercial photography. That&#39;s something what could improve your business and I am really happy to assist you with this!&nbsp;</p>\r\n', '7c913e67f7061791fbe16db2ed4697a4.jpg', 'Commercial Photography', 'Commercial photography. That''s something what could improve your business and I am really happy to assist you with this! ', 'Commercial, Photography, photo by Alex V., inshoots, Australia, photoshoot, advertisement, commercial photography ', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
