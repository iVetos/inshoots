-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2016 at 04:30 PM
-- Server version: 5.5.45
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alex`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_level` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL COMMENT 'Кто добавил',
  `name` varchar(128) NOT NULL,
  `login` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `date` datetime NOT NULL,
  `last_date` datetime NOT NULL,
  `last_ip` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Администраторы' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `id_level`, `id_parent`, `name`, `login`, `pass`, `date`, `last_date`, `last_ip`) VALUES
(1, 1, 0, 'Admin', 'admin', 'admin13', '2013-09-17 17:12:14', '2016-06-01 21:28:08', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `addr` varchar(128) NOT NULL,
  `text_s` text NOT NULL,
  `text` text NOT NULL,
  `tags` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `cover` varchar(64) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Новости' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `aside`
--

CREATE TABLE IF NOT EXISTS `aside` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `city` varchar(64) NOT NULL,
  `date_to` varchar(64) NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Отложенные товары' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `canvas`
--

CREATE TABLE IF NOT EXISTS `canvas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `img` varchar(128) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `canvas`
--

INSERT INTO `canvas` (`id`, `name`, `img`, `price`) VALUES
(1, 'First canvas', '3829caf12c4272d6e53e2ac71f32f689.jpg', 19.99),
(2, 'Second canvas', '94d62903a8fe86f043d49ac08722e156.jpg', 49.99),
(3, 'Third canvas', '02be1bf23df0033f77ba6b80b90971a4.jpg', 99.99),
(4, '90 * 60 Canvas', '962baa89b9a9f585d62cdeb6a63eed21.jpg', 599.99);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Категории товаров' AUTO_INCREMENT=14 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `id_parent`, `name`, `text`, `img`, `title`, `description`, `keywords`, `sort`, `actual`) VALUES
(1, 0, 'Test Collection', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n', '3e3177fbb7f97966729fa8f6f9dedec6.jpg', 'Test collection', 'Desc here', 'Keywords here', 1, 1),
(2, 0, 'New Zealand', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n', 'bb870ba8c768152f013283f91dbabd5b.jpg', 'New Zeland', '', '', 6, 1),
(3, 0, 'Switzerland', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n', '08a311265c301261a4dd4492e8ab673b.jpg', 'Switzerland', '', '', 3, 1),
(4, 0, 'Ocean', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n', '1523efcc05d48361387797e957254a87.jpg', 'Ocean', '', '', 4, 1),
(5, 0, 'People', '', '9e9af5bec63d742e610fab7582fe9adc.jpg', '', '', '', 5, 1),
(7, 5, 'Women', '', 'e26a3e34ac863a4cecddd35cf5b07d80.jpg', '', '', '', 0, 1),
(8, 5, 'Kids', '', '5de6c8f3507a040e651c9eb60df36a36.jpg', '', '', '', 0, 1),
(9, 5, 'Love', '', '5df3e44bc906179f29cd814646db9ee9.jpg', '', '', '', 0, 1),
(10, 0, 'Animals', '', '52c40ee6a4ccf014c508657243054fc0.jpg', '', '', '', 2, 1),
(11, 10, 'Cats', '', '3ed5dd3c38ac3182d1682bf76dc172e7.jpg', 'Cats', '', '', 0, 1),
(12, 10, 'Dogs', '', '433229b76613128178dad44062b516fe.jpg', '', '', '', 0, 1),
(13, 10, 'Mice', '', '586fbfed8cfd854ed101d78e658fca4b.jpg', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(64) NOT NULL,
  `kol_photo` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `actual` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Галерея' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_photo`
--

CREATE TABLE IF NOT EXISTS `gallery_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `datetime` datetime NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Фото галереи' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `pages` int(11) NOT NULL COMMENT 'Редактор страниц',
  `articles` int(11) NOT NULL COMMENT 'Статьи',
  `news` int(11) NOT NULL COMMENT 'Новости',
  `catalog` int(11) NOT NULL COMMENT 'Каталог товаров',
  `orders` int(11) NOT NULL COMMENT 'Заказы',
  `users` int(11) NOT NULL COMMENT 'Покупатели',
  `slider` int(11) NOT NULL COMMENT 'Слайдер на главной',
  `gallery` int(11) NOT NULL COMMENT 'Галерея',
  `services` int(11) NOT NULL COMMENT 'Пользователи',
  `options` int(11) NOT NULL COMMENT 'Настройки',
  `canvas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Уровни администраторов' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `pages`, `articles`, `news`, `catalog`, `orders`, `users`, `slider`, `gallery`, `services`, `options`, `canvas`) VALUES
(1, 'Administrator', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'Moderator', 1, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `link` varchar(256) NOT NULL,
  `sort` int(11) NOT NULL,
  `actual` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Редактор меню' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `id_parent`, `name`, `link`, `sort`, `actual`) VALUES
(1, 0, 'Home', '../', 1, 0),
(2, 0, 'Gallery', 'gallery', 2, 0),
(3, 0, 'Shop', 'shop', 3, 0),
(4, 0, 'About me', 'about_me', 4, 0),
(5, 0, 'Blog', 'blog', 5, 0),
(6, 0, 'Contact me', 'contacts', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `var` varchar(64) NOT NULL,
  `value` int(11) NOT NULL,
  `link` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `var`, `value`, `link`) VALUES
(1, 'Редактор меню и страниц', '__MOD_EDIT', 1, 'pages'),
(2, 'Статьи', '__MOD_ARTICLES', 1, 'articles'),
(3, 'Новости', '__MOD_NEWS', 1, 'news'),
(4, 'Магазин', '__MOD_SHOP', 1, 'catalog'),
(5, 'Заказы в магазине', '__MOD_SHOP_ORDERS', 1, 'orders'),
(6, 'Зарегистрированные покупатели', '__MOD_SHOP_USERS', 1, 'users'),
(7, 'Редактирование пользователей и их прав', '__MOD_USERS', 1, 'admins'),
(8, 'Слайдер', '__MOD_SLIDER', 1, 'slider'),
(9, 'Галерея', '__MOD_GALLERY', 1, 'gallery'),
(10, 'Настройки', '__MOD_OPTIONS', 1, 'options'),
(11, 'Администрирование', '__MOD_SERVICES', 1, 'services');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `addr` varchar(128) NOT NULL,
  `text_s` text NOT NULL,
  `text` text NOT NULL,
  `tags` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `cover` varchar(64) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Новости' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL COMMENT 'ИД зарегистрированого пользователя',
  `id_status` int(11) NOT NULL COMMENT 'Статус заказа',
  `date` datetime NOT NULL COMMENT 'Дата заказа',
  `sum` double(10,2) NOT NULL COMMENT 'Сумма заказа',
  `user_name` varchar(128) NOT NULL COMMENT 'Имя пользователя',
  `phone` varchar(128) NOT NULL COMMENT 'Телефон',
  `email` varchar(128) NOT NULL COMMENT 'Почта',
  `text` text NOT NULL COMMENT 'Дополнительно',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Заказы' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE IF NOT EXISTS `order_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NOT NULL COMMENT 'ИД заказа',
  `id_product` int(11) NOT NULL COMMENT 'ИД товара',
  `count` int(11) NOT NULL COMMENT 'Количество',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Товары в заказе' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `addr` varchar(64) NOT NULL COMMENT 'url',
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `actual` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Редактор страниц' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `id_parent`, `name`, `text`, `addr`, `title`, `description`, `keywords`, `actual`) VALUES
(1, 0, 'Main', '<p>Text at the main page</p>\r\n', '', 'Alex photographer', '', '', 1),
(2, 0, 'Gallery', '', 'Gallery', 'Gallery', '', '', 1),
(3, 0, 'Services', '', 'services', 'Services', '', '', 1),
(4, 0, 'About me', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n', 'About_me', 'About me', '', '', 1),
(5, 0, 'Blog', '', 'Blog', 'Blog', '', '', 1),
(6, 0, 'Contact me', '<p>Contacts here</p>\r\n', 'Contact_me', 'Contact me', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `params`
--

CREATE TABLE IF NOT EXISTS `params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat` int(11) NOT NULL,
  `param1_name` varchar(128) NOT NULL,
  `param1_type` varchar(128) NOT NULL,
  `param1_step` varchar(128) NOT NULL,
  `param2_name` varchar(128) NOT NULL,
  `param2_type` varchar(128) NOT NULL,
  `param2_step` varchar(128) NOT NULL,
  `param3_name` varchar(128) NOT NULL,
  `param3_type` varchar(128) NOT NULL,
  `param3_step` varchar(128) NOT NULL,
  `param4_name` varchar(128) NOT NULL,
  `param4_type` varchar(128) NOT NULL,
  `param4_step` varchar(128) NOT NULL,
  `param5_name` varchar(128) NOT NULL,
  `param5_type` varchar(128) NOT NULL,
  `param5_step` varchar(128) NOT NULL,
  `param6_name` varchar(128) NOT NULL,
  `param6_type` varchar(128) NOT NULL,
  `param6_step` varchar(128) NOT NULL,
  `param7_name` varchar(128) NOT NULL,
  `param7_type` varchar(128) NOT NULL,
  `param7_step` varchar(128) NOT NULL,
  `param8_name` varchar(128) NOT NULL,
  `param8_type` varchar(128) NOT NULL,
  `param8_step` varchar(128) NOT NULL,
  `param9_name` varchar(128) NOT NULL,
  `param9_type` varchar(128) NOT NULL,
  `param9_step` varchar(128) NOT NULL,
  `param10_name` varchar(128) NOT NULL,
  `param10_type` varchar(128) NOT NULL,
  `param10_step` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Параметры для категорий' AUTO_INCREMENT=14 ;

--
-- Dumping data for table `params`
--

INSERT INTO `params` (`id`, `id_cat`, `param1_name`, `param1_type`, `param1_step`, `param2_name`, `param2_type`, `param2_step`, `param3_name`, `param3_type`, `param3_step`, `param4_name`, `param4_type`, `param4_step`, `param5_name`, `param5_type`, `param5_step`, `param6_name`, `param6_type`, `param6_step`, `param7_name`, `param7_type`, `param7_step`, `param8_name`, `param8_type`, `param8_step`, `param9_name`, `param9_type`, `param9_step`, `param10_name`, `param10_type`, `param10_step`) VALUES
(1, 1, 'Color', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', ''),
(2, 2, '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', ''),
(3, 3, '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', ''),
(4, 4, 'Color', '1', '', 'Type', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', ''),
(5, 5, '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', ''),
(7, 7, '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', ''),
(8, 8, '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', ''),
(9, 9, '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', ''),
(10, 10, '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', ''),
(11, 11, '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', ''),
(12, 12, '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', ''),
(13, 13, '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '', '', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat` int(11) NOT NULL COMMENT 'Категория товаров',
  `id_parent` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `nft` int(11) NOT NULL COMMENT 'Новинка',
  `orient` int(11) NOT NULL,
  `img_1` varchar(128) NOT NULL,
  `img_2` varchar(128) NOT NULL,
  `img_3` varchar(128) NOT NULL,
  `img_4` varchar(128) NOT NULL,
  `param1` varchar(64) NOT NULL,
  `param2` varchar(64) NOT NULL,
  `param3` varchar(64) NOT NULL,
  `param4` varchar(64) NOT NULL,
  `param5` varchar(64) NOT NULL,
  `param6` varchar(64) NOT NULL,
  `param7` varchar(64) NOT NULL,
  `param8` varchar(64) NOT NULL,
  `param9` varchar(64) NOT NULL,
  `param10` varchar(64) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Товары' AUTO_INCREMENT=53 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_cat`, `id_parent`, `name`, `text`, `price`, `nft`, `orient`, `img_1`, `img_2`, `img_3`, `img_4`, `param1`, `param2`, `param3`, `param4`, `param5`, `param6`, `param7`, `param8`, `param9`, `param10`, `title`, `description`, `keywords`) VALUES
(1, 1, 0, 'Istambul', '<p>About photo 1</p>\r\n', 0.99, 0, 1, 'eb2c6af582e01d5ff505d46194657cc5.jpg', 'e6809df297fae0bc356bf31a143b0f42.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Istambul', 'Descr photo 1', 'Key for photo 1'),
(2, 1, 0, 'Tbilisi', '<p>About photo 2</p>\r\n', 4.99, 0, 1, '6c10126271d6fb09d9370280b95ab57d.jpg', 'a583fcf7acc127590fc41e80299f1fbf.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Vitaly', 'Descr photo 2', 'Key for photo 2'),
(4, 2, 0, 'Photo 1 New Zealand', '', 0.00, 1, 0, 'f29082af8a663be7f87b0e96852bb4b6.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Photo 1 New Zealand', '', ''),
(5, 2, 0, 'Photo 2 New Zealand', '', 0.00, 1, 0, 'a10c47b4b1bc1cac9d58249fe9a5de09.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Photo 2 New Zealand', '', ''),
(6, 3, 0, 'Photo 1', '', 0.00, 1, 0, '335c72ac55858d31fb02fbaf06bb6dd9.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Photo 1', '', ''),
(7, 3, 0, 'Photo 2', '', 0.00, 1, 0, '02e4f1f1d932f55f3cb486d676215136.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Photo 2', '', ''),
(9, 1, 0, 'Istanbul 2', '', 0.00, 0, 1, '4957fb48a55ae72148fc5b7abb698064.jpg', 'aa52cf3350f124b56f0e2ae3974a6df1.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Istanbul 2', '', ''),
(10, 1, 0, 'Beach', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n', 29.99, 0, 1, 'f388c56d0f624923e79b8afd7d339a4e.jpg', '5637212b1ba8e5bf106568a43f00f28c.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Beach', '', ''),
(11, 4, 0, 'Photo 1', '<p>asdas da sd asd</p>\r\n', 0.00, 1, 0, 'd408550bec52b092f4c6593626ded365.jpg', '', '', '', 'Red', 'Macro', '', '', '', '', '', '', '', '', 'Photo 1', '', ''),
(12, 4, 0, 'Photo 2', '<p>asdas da sd asd</p>\r\n', 0.00, 1, 0, '8f65c2368ac2a64d36918290bbe7601b.jpg', '', '', '', 'Red', 'Macro', '', '', '', '', '', '', '', '', 'Photo 2', '', ''),
(14, 1, 0, 'Galata Tower', '', 19.99, 0, 1, '5810aae6eb8d560bb9e4ef52e85c3fa2.jpg', '10997609a1371394e9f4f590514fb0bf.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Galata Tower', '', ''),
(15, 1, 0, 'Road', '<p>Road</p>\r\n', 12.00, 0, 1, 'acaa6fad3ceb4157ad541f7858ec919f.jpg', '55e68bd821e5dd8849537cd630190d05.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Road', '', ''),
(16, 1, 0, 'Some Picture', '', 0.00, 0, 1, 'e72a5dc3bc717f091b1e5d99fd3b3681.jpg', '33a88eb72c23f97ba84455560e27e4eb.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Some Picture', '', ''),
(41, 1, 0, 'Santa', '', 19.99, 0, 2, 'daaf73e2692fd1d53136031d22aaeed8.jpg', 'f25091c9642653042ad3ccad47950a8e.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Santa', '', ''),
(18, 1, 0, 'Tbilisi', '', 4.99, 0, 2, '30692f23eff77cf1e742243cb5c0c1bc.jpg', '201829b9b1b6082bed2defbdfd0f6f8e.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Tbilisi', '', ''),
(19, 1, 0, 'Test Vertical Image', '', 19.99, 0, 2, '13fd7633a6748e9acbdae913663a75e5.jpg', '38af1d5b3415959a086d0a253097c97a.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Test Vertical Image', '', ''),
(42, 1, 0, 'Street', '', 4.99, 0, 2, 'a80d10a28539e32b58e941cb04d4810d.jpg', '1f542d1815095c6ec65f451aaa344f5c.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Street', '', ''),
(43, 1, 0, 'House', '', 1.99, 0, 2, 'ff4800f6dd955ac68f0033095164e501.jpg', 'd3a41bdbc6f411a90157dcb3c5465cd9.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'House', '', ''),
(30, 1, 0, 'Night Tbilisi', '<p>About this new product</p>\r\n', 1.99, 0, 1, '04b602971aae18d3da2dcb11568bd63d.jpg', '820d59dcd7930a9d9d3e195dc03ac234.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Night Tbilisi', '', ''),
(40, 1, 0, 'New product', '', 19.99, 0, 1, '98ec184b1d85ee1817866e78cdd9e641.jpg', '384bd08643dfb9749cab93020c595211.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'New product', '', ''),
(44, 1, 0, 'Church', '', 19.99, 0, 2, '26eba8c71b8060f893c657ea6d6c27a3.jpg', '6679c11b6c3e48a9fcc4b503a9b34b5c.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Church', '', ''),
(45, 1, 0, 'Test Image', '', 19.99, 1, 1, 'fabd4199a06e7b1645928d6efb505512.jpg', '7c026c7a8dac4bbc77015dfefa43cb43.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Test Image', '', ''),
(46, 1, 0, 'Catania', '', 19.99, 0, 1, '4c9b3673c7687acf13a64830b43a0074.jpg', '3b53a54f64666302ab1c52e2666a928f.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Catania, Sicily, Italy', '', ''),
(48, 1, 0, 'Girl', '', 0.00, 1, 1, '', '95e4f11280e93711f6730c8262ddf46a.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Girl', '', ''),
(49, 1, 0, 'Somewhere in Ukraine', '', 0.00, 1, 2, '81152227e9403174c966fbd73801e94c.jpg', '08e103834f59418bce7bb74c271585dc.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'Somewhere in Ukraine', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `text_s` text NOT NULL,
  `text` text NOT NULL,
  `img` varchar(128) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `text_s`, `text`, `img`, `title`, `description`, `keywords`) VALUES
(1, 'Love Story', '<p>Love Story s t</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n\r\n<h2>Examples</h2>\r\n\r\n<table id="service_examples">\r\n	<tbody>\r\n		<tr>\r\n			<td><img src="/admin/img/services/ls1.jpg" /></td>\r\n			<td><img src="/admin/img/services/ls2.jpg" /></td>\r\n			<td><img src="/admin/img/services/ls3.jpg" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '9bf05a4377d1900391aca6b09452cd3c.png', 'Love Story', 'Love Story d', 'Love Story k'),
(2, 'Engagement', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n', 'ec4ce8a4576190b7c2e2102fe33cf7b8.png', 'Engagement', '', ''),
(3, 'Wedding', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n', 'f3e80caa38db7c11576e5533cb8c4f99.png', 'Wedding', '', ''),
(4, 'Commercial', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n', '0f5020540267517e7f8f57d32d4eac27.png', 'Commercial', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL COMMENT 'Имя изображение',
  `link` varchar(512) NOT NULL COMMENT 'Ссылка',
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Слайдер на главной' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Статусы заказов' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Теги' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tms`
--

CREATE TABLE IF NOT EXISTS `tms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Торговые марки' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `city` varchar(64) NOT NULL,
  `last_date` datetime NOT NULL,
  `reg_ip` varchar(64) NOT NULL,
  `last_ip` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Покупатели' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
