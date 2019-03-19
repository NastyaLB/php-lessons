-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Мар 19 2019 г., 10:34
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
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `charact` text NOT NULL,
  `desript` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `image`, `charact`, `desript`, `price`) VALUES
(1, 'Scissors1', 'Scissors1.jpg', '<li>Lorem ipsum dolor sit amet</li><li>Consectetur adipisicing elit</li><li>Veritatis, voluptates recusandae asperiores</li><li>Recusandae tempora iusto labore</li>', 'Scissors1 Perspiciatis inventore odit, quaerat laboriosam facere repellat est ea, eius quos reprehenderit ut quam quae fugit. Sit, in quisquam dicta similique ducimus aspernatur repellendus accusamus voluptates alias soluta aperiam ipsum asperiores ipsam reprehenderit quidem non cum? Asperiores distinctio magni voluptates id, earum autem error praesentium fugiat sunt, pariatur aspernatur magnam consequatur adipisci! Impedit eveniet minus culpa dignissimos placeat, cupiditate obcaecati dolorem magni tenetur expedita soluta nostrum architecto sequi. Ea asperiores assumenda praesentium cumque dolores laudantium, a placeat fugit, beatae pariatur tenetur distinctio harum! Error repellendus accusamus eligendi possimus doloribus, mollitia quisquam maxime perspiciatis, odio quod dolores cum dignissimos. Commodi debitis provident nihil, deserunt harum perferendis facilis ea dolorem a ipsum sunt quo, eos quibusdam quasi architecto cupiditate nesciunt suscipit possimus saepe obcaecati. At quo repellat doloribus aspernatur dolore fuga vero atque iste quisquam, adipisci totam eaque sed, eveniet hic obcaecati delectus facere molestiae tempore molestias nam quia! Repellat, quod, labore?', 111),
(2, 'Scissors2', 'Scissors2.jpg', '<li>Recusandae tempora iusto labore</li><li>Impedit officiis cumque</li><li>Distinctio vitae similique</li><li>Harum inventore rem</li>', 'Scissors2 perspiciatis inventore odit, quaerat laboriosam facere repellat est ea, eius quos reprehenderit ut quam quae fugit. Sit, in quisquam dicta similique ducimus aspernatur repellendus accusamus voluptates alias soluta aperiam ipsum asperiores ipsam reprehenderit quidem non cum? Asperiores distinctio magni voluptates id, earum autem error praesentium fugiat sunt, pariatur aspernatur magnam consequatur adipisci! Impedit eveniet minus culpa dignissimos placeat, cupiditate obcaecati dolorem magni tenetur expedita soluta nostrum architecto sequi. Ea asperiores assumenda praesentium cumque dolores laudantium, a placeat fugit, beatae pariatur tenetur distinctio harum! Error repellendus accusamus eligendi possimus doloribus, mollitia quisquam maxime perspiciatis, odio quod dolores cum dignissimos. Commodi debitis provident nihil, deserunt harum perferendis facilis ea dolorem a ipsum sunt quo, eos quibusdam quasi architecto cupiditate nesciunt suscipit possimus saepe obcaecati. At quo repellat doloribus aspernatur dolore fuga vero atque iste quisquam, adipisci totam eaque sed, eveniet hic obcaecati delectus facere molestiae tempore molestias nam quia! Repellat, quod, labore?', 210),
(3, 'Scissors3', 'Scissors3.jpg', '<li>Harum inventore rem</li><li>Veritatis et odit quis ipsam corporis aspernatur</li><li>Aque nobis a facere</li><li>Ea sit quibusdam</li>', 'Scissors3 perspiciatis inventore odit, quaerat laboriosam facere repellat est ea, eius quos reprehenderit ut quam quae fugit. Sit, in quisquam dicta similique ducimus aspernatur repellendus accusamus voluptates alias soluta aperiam ipsum asperiores ipsam reprehenderit quidem non cum? Asperiores distinctio magni voluptates id, earum autem error praesentium fugiat sunt, pariatur aspernatur magnam consequatur adipisci! Impedit eveniet minus culpa dignissimos placeat, cupiditate obcaecati dolorem magni tenetur expedita soluta nostrum architecto sequi. Ea asperiores assumenda praesentium cumque dolores laudantium, a placeat fugit, beatae pariatur tenetur distinctio harum! Error repellendus accusamus eligendi possimus doloribus, mollitia quisquam maxime perspiciatis, odio quod dolores cum dignissimos. Commodi debitis provident nihil, deserunt harum perferendis facilis ea dolorem a ipsum sunt quo, eos quibusdam quasi architecto cupiditate nesciunt suscipit possimus saepe obcaecati. At quo repellat doloribus aspernatur dolore fuga vero atque iste quisquam, adipisci totam eaque sed, eveniet hic obcaecati delectus facere molestiae tempore molestias nam quia! Repellat, quod, labore?', 340),
(4, 'Scissors4', 'Scissors4.jpg', '<li>Ea sit quibusdam</li><li>Quae minus, sequi velit</li><li>Necessitatibus itaque</li><li>Similique harum hic consectetur numquam</li>', 'Scissors4 perspiciatis inventore odit, quaerat laboriosam facere repellat est ea, eius quos reprehenderit ut quam quae fugit. Sit, in quisquam dicta similique ducimus aspernatur repellendus accusamus voluptates alias soluta aperiam ipsum asperiores ipsam reprehenderit quidem non cum? Asperiores distinctio magni voluptates id, earum autem error praesentium fugiat sunt, pariatur aspernatur magnam consequatur adipisci! Impedit eveniet minus culpa dignissimos placeat, cupiditate obcaecati dolorem magni tenetur expedita soluta nostrum architecto sequi. Ea asperiores assumenda praesentium cumque dolores laudantium, a placeat fugit, beatae pariatur tenetur distinctio harum! Error repellendus accusamus eligendi possimus doloribus, mollitia quisquam maxime perspiciatis, odio quod dolores cum dignissimos. Commodi debitis provident nihil, deserunt harum perferendis facilis ea dolorem a ipsum sunt quo, eos quibusdam quasi architecto cupiditate nesciunt suscipit possimus saepe obcaecati. At quo repellat doloribus aspernatur dolore fuga vero atque iste quisquam, adipisci totam eaque sed, eveniet hic obcaecati delectus facere molestiae tempore molestias nam quia! Repellat, quod, labore?', 457);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
