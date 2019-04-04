-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Апр 04 2019 г., 18:38
-- Версия сервера: 5.6.41
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shoeshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `login` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `timepost` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `login`, `text`, `timepost`) VALUES
(1, 'anon', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia perspiciatis, beatae deleniti in nemo illo.', '0'),
(3, 'Лисичка', 'Очень хорошие туфельки. Покупайте, не сомневайтесь', '1554356544'),
(4, 'admin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia perspiciatis, beatae deleniti in nemo illo.\r\nVoluptatem soluta dolorem animi. Sit saepe provident asperiores. Quas odio harum dolor voluptates, velit eum impedit ea.', '1554359752'),
(5, 'Вепрь', 'Понравились эти туфли и высоким прямым каблуком, и тракторная подошва (в подобных туфлях тоже показалась оригинальной),\r\nно больше всего мне понравился цвет градиент черно-бордовый. Я как раз ждала бархатное платье такого оттенка. Вот это платье. Туфли действительно идеально подходят.', '1554359821'),
(6, 'Лошадка', 'Спасибо огромнейшее за замечательные туфли. Это моя первая Покупка ... Но точно не последняя, сандалии - Восторг!', '1554360232');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `item` varchar(128) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `descript` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `clicktime` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `item`, `price`, `image`, `descript`, `status`, `clicktime`) VALUES
(1, 'красные туфли из&nbsp;замши', 3567, '0001.jpg', '0001.txt', '1', '1554149548'),
(2, 'красные кожаные босоножки', 2805, '0002.jpg', '0002.txt', '1', '1554320767'),
(3, 'красные туфли со стразами', 3120, '0003.jpg', '0003.txt', '1', '1554322953'),
(4, 'красные туфли на платформе', 2890, '0004.jpg', '0004.txt', '1', '1554172959'),
(5, 'красные плетеные босоножки', 1970, '0005.jpg', '0005.txt', '1', '1554173739'),
(6, 'открытые красные босоножки', 3400, '0006.jpg', '0006.txt', '1', '1554174243'),
(7, 'закрытые красные туфли', 3650, '0007.jpg', '0007.txt', '0', '1554174622'),
(8, 'красные туфли на шпильке', 2645, '0008.jpg', '0008.txt', '1', '1554174862'),
(9, 'элегантные красные туфли', 3705, '0009.jpg', '0009.txt', '1', '1554175073'),
(10, 'красные туфли с пайетками', 3200, '0010.jpg', '0010.txt', '0', '1554304625');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` varchar(128) NOT NULL,
  `user` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `dest` varchar(128) NOT NULL,
  `worth` int(11) NOT NULL,
  `basket` text NOT NULL,
  `client` int(11) NOT NULL,
  `making` int(11) NOT NULL,
  `clicktime` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user`, `phone`, `dest`, `worth`, `basket`, `client`, `making`, `clicktime`) VALUES
('S-1554386982', 'Лисичка', '8(900)9009090', 'г.Город, ул.Улица, 1-10', 14640, '[\"2\",\"красные кожаные босоножки - 2 шт\",\"3\",\"красные туфли со стразами - 1 шт\",\"5\",\"красные плетеные босоножки - 3 шт\"]', 1, 1, '1554390803'),
('S-1554387573', 'Лошадка', '8(350)6506050', 'г.Новгород, ул.Новая, 1-10', 16377, '[\"4\",\"красные туфли на платформе - 1 шт\",\"3\",\"красные туфли со стразами - 1 шт\",\"1\",\"красные туфли из замши - 1 шт\",\"6\",\"открытые красные босоножки - 2 шт\"]', 0, 2, '1554390803');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `avatar` varchar(128) DEFAULT NULL,
  `clicktime` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `phone`, `avatar`, `clicktime`) VALUES
(0, 'anon', 'anon', '', 'anon.jpg', ''),
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 'admin.jpg', ''),
(2, 'Лисичка', '827ccb0eea8a706c4c34a16891f84e7b', '8(900)9009090', '0002.jpg', '1554354710'),
(3, 'Вепрь', '7f841df2894883b91a5f1a2388c7c24b', '88008008080', '0003.jpg', '1554354659'),
(4, 'Лошадка', 'ff111e4a5406ed4024a901c57e811167', '8(350)6506050', '0004.jpg', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
