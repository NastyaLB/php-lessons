-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 10 2019 г., 19:50
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
-- База данных: `les2-6`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id_basket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_good` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `price` double NOT NULL,
  `is_in_order` tinyint(4) NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id_basket`, `id_user`, `id_good`, `number`, `price`, `is_in_order`, `id_order`) VALUES
(1, 1, 4, 1, 300, 1, 1),
(2, 1, 2, 1, 350, 1, 1),
(3, 1, 1, 1, 400, 1, 2),
(4, 1, 3, 1, 450, 1, 2),
(5, 1, 5, 1, 500, 1, 3),
(6, 2, 3, 1, 450, 1, 4),
(7, 2, 4, 1, 300, 1, 4),
(8, 2, 2, 2, 350, 1, 5),
(9, 2, 4, 1, 300, 1, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_category`, `status`, `cat_name`, `parent_id`) VALUES
(1, 1, 'Плюшевые игрушки', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id_good` int(11) NOT NULL,
  `good_name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `id_category` int(11) NOT NULL,
  `charact` text NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_good`, `good_name`, `price`, `id_category`, `charact`, `id_status`) VALUES
(1, 'Плюшевый пёс', 400, 1, 'Мягкий пушистый щеночек с наивной мордочкой', 1),
(2, 'Плюшевый заяц', 350, 1, 'Трогательный плюшевый зайчик с длинными ушами', 1),
(3, 'Плюшевый медведь', 450, 1, 'Большой дружелюбный мишка. Мягкий и пушистый', 1),
(4, 'Бархатный кролик', 300, 1, 'Приятный на ощупь бархатный крошка-кролик ', 1),
(5, 'Плюшевый слон', 500, 1, 'Плюшевый слон с огромными мягкими ушами', 1),
(6, 'Плюшевый котенок', 320, 1, 'Плюшевый котенок  Озорной котёнок. Мягкие лапки, игривая мордочка, пушистый хвост', 0),
(7, 'Плюшевый дельфин', 420, 1, 'Весёлый плюшевый дельфинчик с белым брюшком', 1),
(8, 'Плюшевая коала', 370, 1, 'Плюшевая коала с меховыми щечками', 1),
(9, 'Плюшевый хомяк', 270, 1, 'Плюшевый кроха-хомяк с цепкими, но мягкими лапками', 1),
(10, 'Плюшевая сова', 300, 1, 'Плюшевая совушка. Мягкая, но мудрая красотка с бантиком', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `amount` double NOT NULL,
  `datetime_create` datetime NOT NULL,
  `id_ordrstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `amount`, `datetime_create`, `id_ordrstatus`) VALUES
(1, 1, 750, '0000-00-00 00:00:00', 2),
(2, 1, 950, '0000-00-00 00:00:00', 1),
(3, 1, 500, '0000-00-00 00:00:00', 1),
(4, 2, 750, '0000-00-00 00:00:00', 0),
(5, 2, 1000, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `order_status`
--

CREATE TABLE `order_status` (
  `id_orderstatus` int(11) NOT NULL,
  `order_status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_status`
--

INSERT INTO `order_status` (`id_orderstatus`, `order_status_name`) VALUES
(0, 'new'),
(1, 'inprocess'),
(2, 'sended'),
(3, 'done');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id_page` int(11) NOT NULL,
  `page_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_login` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `address` varchar(128) DEFAULT NULL,
  `user_lastact` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `user_login`, `user_pass`, `address`, `user_lastact`) VALUES
(0, 'admin', 'admin', 'admin', NULL, '0000-00-00 00:00:00'),
(1, 'Соня Механикова', 'Some', 'SomeSome', '', '0000-00-00 00:00:00'),
(2, 'Рита Таурова', 'Ruta', 'RutaRuta', 'ул.Калинина,25', '0000-00-00 00:00:00'),
(3, '', 'u45079', 'u45079', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE `user_role` (
  `id_userole` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id_basket`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_good` (`id_good`),
  ADD KEY `basket_ibfk_3` (`id_order`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_good`),
  ADD KEY `id_good` (`id_good`),
  ADD KEY `id_good_2` (`id_good`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `orders_ibfk_1` (`id_ordrstatus`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id_orderstatus`),
  ADD KEY `id` (`id_orderstatus`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id_page`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `id_role` (`id_role`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_userole`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id_basket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id_good` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id_orderstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_userole` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`id_good`) REFERENCES `goods` (`id_good`),
  ADD CONSTRAINT `basket_ibfk_3` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_ordrstatus`) REFERENCES `order_status` (`id_orderstatus`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
