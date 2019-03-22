-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Мар 22 2019 г., 11:32
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
-- База данных: `lesson05`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_num` varchar(128) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `item` varchar(128) NOT NULL,
  `summa` int(11) NOT NULL,
  `clicktime` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `order_num`, `user_name`, `item`, `summa`, `clicktime`) VALUES
(1, '3i3n64r9r5ve', 'Вепрь', 'Ножницы радужные', 1, '1553227434 '),
(8, '029gl6e4jj6l', 'Лиса', 'Ножницы сувенирные - Птицы', 2, '1553242505'),
(9, '029gl6e4jj6l', 'Лиса', 'Ножницы радужные', 1, '1553242510'),
(10, '029gl6e4jj6l', 'Лиса', 'Ножницы парикмахерские с гравировкой', 3, '1553242834'),
(11, '029gl6e4jj6l', 'Лиса', 'Ножницы парикмахерские', 1, '1553243095');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
