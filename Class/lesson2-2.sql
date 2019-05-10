-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 10 2019 г., 21:14
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
-- База данных: `lesson2-2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `fotoname` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `path` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `foto`
--

INSERT INTO `foto` (`id`, `fotoname`, `text`, `path`) VALUES
(1, '0001.jpg', 'Фрагмент №1', 'files/full/0001.jpg'),
(2, '0002.jpg', 'Фрагмент №2', 'files/full/0002.jpg'),
(3, '0003.jpg', 'Фрагмент №3', 'files/full/0003.jpg'),
(4, '0004.jpg', 'Фрагмент №4', 'files/full/0004.jpg'),
(5, '0005.jpg', 'Фрагмент №5', 'files/full/0005.jpg'),
(6, '0006.jpg', 'Фрагмент №6', 'files/full/0006.jpg'),
(7, '0007.jpg', 'Фрагмент №7', 'files/full/0007.jpg'),
(8, '0008.jpg', 'Фрагмент №8', 'files/full/0008.jpg'),
(9, '0009.jpg', 'Фрагмент №9', 'files/full/0009.jpg'),
(10, '0010.jpg', 'Фрагмент №10', 'files/full/0010.jpg'),
(11, '0011.jpg', 'Фрагмент №11', 'files/full/0011.jpg'),
(12, '0012.jpg', 'Фрагмент №12', 'files/full/0012.jpg'),
(13, '0013.jpg', 'Фрагмент №13', 'files/full/0013.jpg'),
(14, '0014.jpg', 'Фрагмент №14', 'files/full/0014.jpg'),
(15, '0015.jpg', 'Фрагмент №15', 'files/full/0015.jpg'),
(16, '0016.jpg', 'Фрагмент №16', 'files/full/0016.jpg'),
(17, '0017.jpg', 'Фрагмент №17', 'files/full/0017.jpg'),
(18, '0018.jpg', 'Фрагмент №18', 'files/full/0018.jpg'),
(19, '0019.jpg', 'Фрагмент №19', 'files/full/0019.jpg'),
(20, '0020.jpg', 'Фрагмент №20', 'files/full/0020.jpg'),
(21, '0021.jpg', 'Фрагмент №21', 'files/full/0021.jpg'),
(22, '0022.jpg', 'Фрагмент №22', 'files/full/0022.jpg'),
(23, '0023.jpg', 'Фрагмент №23', 'files/full/0023.jpg'),
(24, '0024.jpg', 'Фрагмент №24', 'files/full/0024.jpg'),
(25, '0025.jpg', 'Фрагмент №25', 'files/full/0025.jpg'),
(26, '0026.jpg', 'Фрагмент №26', 'files/full/0026.jpg'),
(27, '0027.jpg', 'Фрагмент №27', 'files/full/0027.jpg'),
(28, '0028.jpg', 'Фрагмент №28', 'files/full/0028.jpg'),
(29, '0029.jpg', 'Фрагмент №29', 'files/full/0029.jpg'),
(30, '0030.jpg', 'Фрагмент №30', 'files/full/0030.jpg'),
(31, '0031.jpg', 'Фрагмент №31', 'files/full/0031.jpg'),
(32, '0032.jpg', 'Фрагмент №32', 'files/full/0032.jpg'),
(33, '0033.jpg', 'Фрагмент №33', 'files/full/0033.jpg'),
(34, '0034.jpg', 'Фрагмент №34', 'files/full/0034.jpg'),
(35, '0035.jpg', 'Фрагмент №35', 'files/full/0035.jpg'),
(36, '0036.jpg', 'Фрагмент №36', 'files/full/0036.jpg'),
(37, '0037.jpg', 'Фрагмент №37', 'files/full/0037.jpg'),
(38, '0038.jpg', 'Фрагмент №38', 'files/full/0038.jpg'),
(39, '0039.jpg', 'Фрагмент №39', 'files/full/0039.jpg'),
(40, '0040.jpg', 'Фрагмент №40', 'files/full/0040.jpg'),
(41, '0041.jpg', 'Фрагмент №41', 'files/full/0041.jpg'),
(42, '0042.jpg', 'Фрагмент №42', 'files/full/0042.jpg'),
(43, '0043.jpg', 'Фрагмент №43', 'files/full/0043.jpg'),
(44, '0044.jpg', 'Фрагмент №44', 'files/full/0044.jpg'),
(45, '0045.jpg', 'Фрагмент №45', 'files/full/0045.jpg'),
(46, '0046.jpg', 'Фрагмент №46', 'files/full/0046.jpg'),
(47, '0047.jpg', 'Фрагмент №47', 'files/full/0047.jpg'),
(48, '0048.jpg', 'Фрагмент №48', 'files/full/0048.jpg'),
(49, '0049.jpg', 'Фрагмент №49', 'files/full/0049.jpg'),
(50, '0050.jpg', 'Фрагмент №50', 'files/full/0050.jpg'),
(51, '0051.jpg', 'Фрагмент №51', 'files/full/0051.jpg'),
(52, '0052.jpg', 'Фрагмент №52', 'files/full/0052.jpg'),
(53, '0053.jpg', 'Фрагмент №53', 'files/full/0053.jpg'),
(54, '0054.jpg', 'Фрагмент №54', 'files/full/0054.jpg'),
(55, '0055.jpg', 'Фрагмент №55', 'files/full/0055.jpg'),
(56, '0056.jpg', 'Фрагмент №56', 'files/full/0056.jpg'),
(57, '0057.jpg', 'Фрагмент №57', 'files/full/0057.jpg'),
(58, '0058.jpg', 'Фрагмент №58', 'files/full/0058.jpg'),
(59, '0059.jpg', 'Фрагмент №59', 'files/full/0059.jpg'),
(60, '0060.jpg', 'Фрагмент №60', 'files/full/0060.jpg'),
(61, '0001.jpg', 'Фрагмент №61', 'files/full/0001.jpg'),
(62, '0002.jpg', 'Фрагмент №62', 'files/full/0002.jpg'),
(63, '0003.jpg', 'Фрагмент №63', 'files/full/0003.jpg'),
(64, '0004.jpg', 'Фрагмент №64', 'files/full/0004.jpg'),
(65, '0005.jpg', 'Фрагмент №65', 'files/full/0005.jpg'),
(66, '0006.jpg', 'Фрагмент №66', 'files/full/0006.jpg'),
(67, '0007.jpg', 'Фрагмент №67', 'files/full/0007.jpg'),
(68, '0008.jpg', 'Фрагмент №68', 'files/full/0008.jpg'),
(69, '0009.jpg', 'Фрагмент №69', 'files/full/0009.jpg'),
(70, '0010.jpg', 'Фрагмент №70', 'files/full/0010.jpg'),
(71, '0011.jpg', 'Фрагмент №71', 'files/full/0011.jpg'),
(72, '0012.jpg', 'Фрагмент №72', 'files/full/0012.jpg'),
(73, '0013.jpg', 'Фрагмент №73', 'files/full/0013.jpg'),
(74, '0014.jpg', 'Фрагмент №74', 'files/full/0014.jpg'),
(75, '0015.jpg', 'Фрагмент №75', 'files/full/0015.jpg'),
(76, '0016.jpg', 'Фрагмент №76', 'files/full/0016.jpg'),
(77, '0017.jpg', 'Фрагмент №77', 'files/full/0017.jpg'),
(78, '0018.jpg', 'Фрагмент №78', 'files/full/0018.jpg'),
(79, '0019.jpg', 'Фрагмент №79', 'files/full/0019.jpg'),
(80, '0020.jpg', 'Фрагмент №80', 'files/full/0020.jpg'),
(81, '0021.jpg', 'Фрагмент №81', 'files/full/0021.jpg'),
(82, '0022.jpg', 'Фрагмент №82', 'files/full/0022.jpg'),
(83, '0023.jpg', 'Фрагмент №83', 'files/full/0023.jpg'),
(84, '0024.jpg', 'Фрагмент №84', 'files/full/0024.jpg'),
(85, '0025.jpg', 'Фрагмент №85', 'files/full/0025.jpg'),
(86, '0026.jpg', 'Фрагмент №86', 'files/full/0026.jpg'),
(87, '0027.jpg', 'Фрагмент №87', 'files/full/0027.jpg'),
(88, '0028.jpg', 'Фрагмент №88', 'files/full/0028.jpg'),
(89, '0029.jpg', 'Фрагмент №89', 'files/full/0029.jpg'),
(90, '0030.jpg', 'Фрагмент №90', 'files/full/0030.jpg'),
(91, '0031.jpg', 'Фрагмент №91', 'files/full/0031.jpg'),
(92, '0032.jpg', 'Фрагмент №92', 'files/full/0032.jpg'),
(93, '0033.jpg', 'Фрагмент №93', 'files/full/0033.jpg'),
(94, '0034.jpg', 'Фрагмент №94', 'files/full/0034.jpg'),
(95, '0035.jpg', 'Фрагмент №95', 'files/full/0035.jpg'),
(96, '0036.jpg', 'Фрагмент №96', 'files/full/0036.jpg'),
(97, '0037.jpg', 'Фрагмент №97', 'files/full/0037.jpg'),
(98, '0038.jpg', 'Фрагмент №98', 'files/full/0038.jpg'),
(99, '0039.jpg', 'Фрагмент №99', 'files/full/0039.jpg'),
(100, '0040.jpg', 'Фрагмент №100', 'files/full/0040.jpg'),
(101, '0041.jpg', 'Фрагмент №101', 'files/full/0041.jpg'),
(102, '0042.jpg', 'Фрагмент №102', 'files/full/0042.jpg'),
(103, '0043.jpg', 'Фрагмент №103', 'files/full/0043.jpg'),
(104, '0044.jpg', 'Фрагмент №104', 'files/full/0044.jpg'),
(105, '0045.jpg', 'Фрагмент №105', 'files/full/0045.jpg'),
(106, '0046.jpg', 'Фрагмент №106', 'files/full/0046.jpg'),
(107, '0047.jpg', 'Фрагмент №107', 'files/full/0047.jpg'),
(108, '0048.jpg', 'Фрагмент №108', 'files/full/0048.jpg'),
(109, '0049.jpg', 'Фрагмент №109', 'files/full/0049.jpg'),
(110, '0050.jpg', 'Фрагмент №110', 'files/full/0050.jpg'),
(111, '0051.jpg', 'Фрагмент №111', 'files/full/0051.jpg'),
(112, '0052.jpg', 'Фрагмент №112', 'files/full/0052.jpg'),
(113, '0053.jpg', 'Фрагмент №113', 'files/full/0053.jpg'),
(114, '0054.jpg', 'Фрагмент №114', 'files/full/0054.jpg'),
(115, '0055.jpg', 'Фрагмент №115', 'files/full/0055.jpg'),
(116, '0056.jpg', 'Фрагмент №116', 'files/full/0056.jpg'),
(117, '0057.jpg', 'Фрагмент №117', 'files/full/0057.jpg'),
(118, '0058.jpg', 'Фрагмент №118', 'files/full/0058.jpg'),
(119, '0059.jpg', 'Фрагмент №119', 'files/full/0059.jpg'),
(120, '0060.jpg', 'Фрагмент №120', 'files/full/0060.jpg'),
(121, '0001.jpg', 'Фрагмент №121', 'files/full/0001.jpg'),
(122, '0002.jpg', 'Фрагмент №122', 'files/full/0002.jpg'),
(123, '0003.jpg', 'Фрагмент №123', 'files/full/0003.jpg'),
(124, '0004.jpg', 'Фрагмент №124', 'files/full/0004.jpg'),
(125, '0005.jpg', 'Фрагмент №125', 'files/full/0005.jpg'),
(126, '0006.jpg', 'Фрагмент №126', 'files/full/0006.jpg'),
(127, '0007.jpg', 'Фрагмент №127', 'files/full/0007.jpg'),
(128, '0008.jpg', 'Фрагмент №128', 'files/full/0008.jpg'),
(129, '0009.jpg', 'Фрагмент №129', 'files/full/0009.jpg'),
(130, '0010.jpg', 'Фрагмент №130', 'files/full/0010.jpg'),
(131, '0011.jpg', 'Фрагмент №131', 'files/full/0011.jpg'),
(132, '0012.jpg', 'Фрагмент №132', 'files/full/0012.jpg'),
(133, '0013.jpg', 'Фрагмент №133', 'files/full/0013.jpg'),
(134, '0014.jpg', 'Фрагмент №134', 'files/full/0014.jpg'),
(135, '0015.jpg', 'Фрагмент №135', 'files/full/0015.jpg'),
(136, '0016.jpg', 'Фрагмент №136', 'files/full/0016.jpg'),
(137, '0017.jpg', 'Фрагмент №137', 'files/full/0017.jpg'),
(138, '0018.jpg', 'Фрагмент №138', 'files/full/0018.jpg'),
(139, '0019.jpg', 'Фрагмент №139', 'files/full/0019.jpg'),
(140, '0020.jpg', 'Фрагмент №140', 'files/full/0020.jpg'),
(141, '0021.jpg', 'Фрагмент №141', 'files/full/0021.jpg'),
(142, '0022.jpg', 'Фрагмент №142', 'files/full/0022.jpg'),
(143, '0023.jpg', 'Фрагмент №143', 'files/full/0023.jpg'),
(144, '0024.jpg', 'Фрагмент №144', 'files/full/0024.jpg'),
(145, '0025.jpg', 'Фрагмент №145', 'files/full/0025.jpg'),
(146, '0026.jpg', 'Фрагмент №146', 'files/full/0026.jpg'),
(147, '0027.jpg', 'Фрагмент №147', 'files/full/0027.jpg'),
(148, '0028.jpg', 'Фрагмент №148', 'files/full/0028.jpg'),
(149, '0029.jpg', 'Фрагмент №149', 'files/full/0029.jpg'),
(150, '0030.jpg', 'Фрагмент №150', 'files/full/0030.jpg'),
(151, '0031.jpg', 'Фрагмент №151', 'files/full/0031.jpg'),
(152, '0032.jpg', 'Фрагмент №152', 'files/full/0032.jpg'),
(153, '0033.jpg', 'Фрагмент №153', 'files/full/0033.jpg'),
(154, '0034.jpg', 'Фрагмент №154', 'files/full/0034.jpg'),
(155, '0035.jpg', 'Фрагмент №155', 'files/full/0035.jpg'),
(156, '0036.jpg', 'Фрагмент №156', 'files/full/0036.jpg'),
(157, '0037.jpg', 'Фрагмент №157', 'files/full/0037.jpg'),
(158, '0038.jpg', 'Фрагмент №158', 'files/full/0038.jpg'),
(159, '0039.jpg', 'Фрагмент №159', 'files/full/0039.jpg'),
(160, '0040.jpg', 'Фрагмент №160', 'files/full/0040.jpg'),
(161, '0041.jpg', 'Фрагмент №161', 'files/full/0041.jpg'),
(162, '0042.jpg', 'Фрагмент №162', 'files/full/0042.jpg'),
(163, '0043.jpg', 'Фрагмент №163', 'files/full/0043.jpg'),
(164, '0044.jpg', 'Фрагмент №164', 'files/full/0044.jpg'),
(165, '0045.jpg', 'Фрагмент №165', 'files/full/0045.jpg'),
(166, '0046.jpg', 'Фрагмент №166', 'files/full/0046.jpg'),
(167, '0047.jpg', 'Фрагмент №167', 'files/full/0047.jpg'),
(168, '0048.jpg', 'Фрагмент №168', 'files/full/0048.jpg'),
(169, '0049.jpg', 'Фрагмент №169', 'files/full/0049.jpg'),
(170, '0050.jpg', 'Фрагмент №170', 'files/full/0050.jpg'),
(171, '0051.jpg', 'Фрагмент №171', 'files/full/0051.jpg'),
(172, '0052.jpg', 'Фрагмент №172', 'files/full/0052.jpg'),
(173, '0053.jpg', 'Фрагмент №173', 'files/full/0053.jpg'),
(174, '0054.jpg', 'Фрагмент №174', 'files/full/0054.jpg'),
(175, '0055.jpg', 'Фрагмент №175', 'files/full/0055.jpg'),
(176, '0056.jpg', 'Фрагмент №176', 'files/full/0056.jpg'),
(177, '0057.jpg', 'Фрагмент №177', 'files/full/0057.jpg'),
(178, '0058.jpg', 'Фрагмент №178', 'files/full/0058.jpg'),
(179, '0059.jpg', 'Фрагмент №179', 'files/full/0059.jpg'),
(180, '0060.jpg', 'Фрагмент №180', 'files/full/0060.jpg'),
(181, '0001.jpg', 'Фрагмент №181', 'files/full/0001.jpg'),
(182, '0002.jpg', 'Фрагмент №182', 'files/full/0002.jpg'),
(183, '0003.jpg', 'Фрагмент №183', 'files/full/0003.jpg'),
(184, '0004.jpg', 'Фрагмент №184', 'files/full/0004.jpg'),
(185, '0005.jpg', 'Фрагмент №185', 'files/full/0005.jpg'),
(186, '0006.jpg', 'Фрагмент №186', 'files/full/0006.jpg'),
(187, '0007.jpg', 'Фрагмент №187', 'files/full/0007.jpg'),
(188, '0008.jpg', 'Фрагмент №188', 'files/full/0008.jpg'),
(189, '0009.jpg', 'Фрагмент №189', 'files/full/0009.jpg'),
(190, '0010.jpg', 'Фрагмент №190', 'files/full/0010.jpg'),
(191, '0011.jpg', 'Фрагмент №191', 'files/full/0011.jpg'),
(192, '0012.jpg', 'Фрагмент №192', 'files/full/0012.jpg'),
(193, '0013.jpg', 'Фрагмент №193', 'files/full/0013.jpg'),
(194, '0014.jpg', 'Фрагмент №194', 'files/full/0014.jpg'),
(195, '0015.jpg', 'Фрагмент №195', 'files/full/0015.jpg'),
(196, '0016.jpg', 'Фрагмент №196', 'files/full/0016.jpg'),
(197, '0017.jpg', 'Фрагмент №197', 'files/full/0017.jpg'),
(198, '0018.jpg', 'Фрагмент №198', 'files/full/0018.jpg'),
(199, '0019.jpg', 'Фрагмент №199', 'files/full/0019.jpg'),
(200, '0020.jpg', 'Фрагмент №200', 'files/full/0020.jpg'),
(201, '0021.jpg', 'Фрагмент №201', 'files/full/0021.jpg'),
(202, '0022.jpg', 'Фрагмент №202', 'files/full/0022.jpg'),
(203, '0023.jpg', 'Фрагмент №203', 'files/full/0023.jpg'),
(204, '0024.jpg', 'Фрагмент №204', 'files/full/0024.jpg'),
(205, '0025.jpg', 'Фрагмент №205', 'files/full/0025.jpg'),
(206, '0026.jpg', 'Фрагмент №206', 'files/full/0026.jpg'),
(207, '0027.jpg', 'Фрагмент №207', 'files/full/0027.jpg'),
(208, '0028.jpg', 'Фрагмент №208', 'files/full/0028.jpg'),
(209, '0029.jpg', 'Фрагмент №209', 'files/full/0029.jpg'),
(210, '0030.jpg', 'Фрагмент №210', 'files/full/0030.jpg'),
(211, '0031.jpg', 'Фрагмент №211', 'files/full/0031.jpg'),
(212, '0032.jpg', 'Фрагмент №212', 'files/full/0032.jpg'),
(213, '0033.jpg', 'Фрагмент №213', 'files/full/0033.jpg'),
(214, '0034.jpg', 'Фрагмент №214', 'files/full/0034.jpg'),
(215, '0035.jpg', 'Фрагмент №215', 'files/full/0035.jpg'),
(216, '0036.jpg', 'Фрагмент №216', 'files/full/0036.jpg'),
(217, '0037.jpg', 'Фрагмент №217', 'files/full/0037.jpg'),
(218, '0038.jpg', 'Фрагмент №218', 'files/full/0038.jpg'),
(219, '0039.jpg', 'Фрагмент №219', 'files/full/0039.jpg'),
(220, '0040.jpg', 'Фрагмент №220', 'files/full/0040.jpg'),
(221, '0041.jpg', 'Фрагмент №221', 'files/full/0041.jpg'),
(222, '0042.jpg', 'Фрагмент №222', 'files/full/0042.jpg'),
(223, '0043.jpg', 'Фрагмент №223', 'files/full/0043.jpg'),
(224, '0044.jpg', 'Фрагмент №224', 'files/full/0044.jpg'),
(225, '0045.jpg', 'Фрагмент №225', 'files/full/0045.jpg'),
(226, '0046.jpg', 'Фрагмент №226', 'files/full/0046.jpg'),
(227, '0047.jpg', 'Фрагмент №227', 'files/full/0047.jpg'),
(228, '0048.jpg', 'Фрагмент №228', 'files/full/0048.jpg'),
(229, '0049.jpg', 'Фрагмент №229', 'files/full/0049.jpg'),
(230, '0050.jpg', 'Фрагмент №230', 'files/full/0050.jpg'),
(231, '0051.jpg', 'Фрагмент №231', 'files/full/0051.jpg'),
(232, '0052.jpg', 'Фрагмент №232', 'files/full/0052.jpg'),
(233, '0053.jpg', 'Фрагмент №233', 'files/full/0053.jpg'),
(234, '0054.jpg', 'Фрагмент №234', 'files/full/0054.jpg'),
(235, '0055.jpg', 'Фрагмент №235', 'files/full/0055.jpg'),
(236, '0056.jpg', 'Фрагмент №236', 'files/full/0056.jpg'),
(237, '0057.jpg', 'Фрагмент №237', 'files/full/0057.jpg'),
(238, '0058.jpg', 'Фрагмент №238', 'files/full/0058.jpg'),
(239, '0059.jpg', 'Фрагмент №239', 'files/full/0059.jpg'),
(240, '0060.jpg', 'Фрагмент №240', 'files/full/0060.jpg'),
(241, '0001.jpg', 'Фрагмент №241', 'files/full/0001.jpg'),
(242, '0002.jpg', 'Фрагмент №242', 'files/full/0002.jpg'),
(243, '0003.jpg', 'Фрагмент №243', 'files/full/0003.jpg'),
(244, '0004.jpg', 'Фрагмент №244', 'files/full/0004.jpg'),
(245, '0005.jpg', 'Фрагмент №245', 'files/full/0005.jpg'),
(246, '0006.jpg', 'Фрагмент №246', 'files/full/0006.jpg'),
(247, '0007.jpg', 'Фрагмент №247', 'files/full/0007.jpg'),
(248, '0008.jpg', 'Фрагмент №248', 'files/full/0008.jpg'),
(249, '0009.jpg', 'Фрагмент №249', 'files/full/0009.jpg'),
(250, '0010.jpg', 'Фрагмент №250', 'files/full/0010.jpg'),
(251, '0011.jpg', 'Фрагмент №251', 'files/full/0011.jpg'),
(252, '0012.jpg', 'Фрагмент №252', 'files/full/0012.jpg'),
(253, '0013.jpg', 'Фрагмент №253', 'files/full/0013.jpg'),
(254, '0014.jpg', 'Фрагмент №254', 'files/full/0014.jpg'),
(255, '0015.jpg', 'Фрагмент №255', 'files/full/0015.jpg'),
(256, '0016.jpg', 'Фрагмент №256', 'files/full/0016.jpg'),
(257, '0017.jpg', 'Фрагмент №257', 'files/full/0017.jpg'),
(258, '0018.jpg', 'Фрагмент №258', 'files/full/0018.jpg'),
(259, '0019.jpg', 'Фрагмент №259', 'files/full/0019.jpg'),
(260, '0020.jpg', 'Фрагмент №260', 'files/full/0020.jpg'),
(261, '0021.jpg', 'Фрагмент №261', 'files/full/0021.jpg'),
(262, '0022.jpg', 'Фрагмент №262', 'files/full/0022.jpg'),
(263, '0023.jpg', 'Фрагмент №263', 'files/full/0023.jpg'),
(264, '0024.jpg', 'Фрагмент №264', 'files/full/0024.jpg'),
(265, '0025.jpg', 'Фрагмент №265', 'files/full/0025.jpg'),
(266, '0026.jpg', 'Фрагмент №266', 'files/full/0026.jpg'),
(267, '0027.jpg', 'Фрагмент №267', 'files/full/0027.jpg'),
(268, '0028.jpg', 'Фрагмент №268', 'files/full/0028.jpg'),
(269, '0029.jpg', 'Фрагмент №269', 'files/full/0029.jpg'),
(270, '0030.jpg', 'Фрагмент №270', 'files/full/0030.jpg'),
(271, '0031.jpg', 'Фрагмент №271', 'files/full/0031.jpg'),
(272, '0032.jpg', 'Фрагмент №272', 'files/full/0032.jpg'),
(273, '0033.jpg', 'Фрагмент №273', 'files/full/0033.jpg'),
(274, '0034.jpg', 'Фрагмент №274', 'files/full/0034.jpg'),
(275, '0035.jpg', 'Фрагмент №275', 'files/full/0035.jpg'),
(276, '0036.jpg', 'Фрагмент №276', 'files/full/0036.jpg'),
(277, '0037.jpg', 'Фрагмент №277', 'files/full/0037.jpg'),
(278, '0038.jpg', 'Фрагмент №278', 'files/full/0038.jpg'),
(279, '0039.jpg', 'Фрагмент №279', 'files/full/0039.jpg'),
(280, '0040.jpg', 'Фрагмент №280', 'files/full/0040.jpg'),
(281, '0041.jpg', 'Фрагмент №281', 'files/full/0041.jpg'),
(282, '0042.jpg', 'Фрагмент №282', 'files/full/0042.jpg'),
(283, '0043.jpg', 'Фрагмент №283', 'files/full/0043.jpg'),
(284, '0044.jpg', 'Фрагмент №284', 'files/full/0044.jpg'),
(285, '0045.jpg', 'Фрагмент №285', 'files/full/0045.jpg'),
(286, '0046.jpg', 'Фрагмент №286', 'files/full/0046.jpg'),
(287, '0047.jpg', 'Фрагмент №287', 'files/full/0047.jpg'),
(288, '0048.jpg', 'Фрагмент №288', 'files/full/0048.jpg'),
(289, '0049.jpg', 'Фрагмент №289', 'files/full/0049.jpg'),
(290, '0050.jpg', 'Фрагмент №290', 'files/full/0050.jpg'),
(291, '0051.jpg', 'Фрагмент №291', 'files/full/0051.jpg'),
(292, '0052.jpg', 'Фрагмент №292', 'files/full/0052.jpg'),
(293, '0053.jpg', 'Фрагмент №293', 'files/full/0053.jpg'),
(294, '0054.jpg', 'Фрагмент №294', 'files/full/0054.jpg'),
(295, '0055.jpg', 'Фрагмент №295', 'files/full/0055.jpg'),
(296, '0056.jpg', 'Фрагмент №296', 'files/full/0056.jpg'),
(297, '0057.jpg', 'Фрагмент №297', 'files/full/0057.jpg'),
(298, '0058.jpg', 'Фрагмент №298', 'files/full/0058.jpg'),
(299, '0059.jpg', 'Фрагмент №299', 'files/full/0059.jpg'),
(300, '0060.jpg', 'Фрагмент №300', 'files/full/0060.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `product` varchar(128) NOT NULL,
  `descript` text NOT NULL,
  `measure` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `product`, `descript`, `measure`, `price`) VALUES
(1, 'Футболка', 'Женская футболка из хлопка с короткими-рукавами воланами. Цвета: белый, меланж, голубой, розовый, сиреневый', 1, 150),
(2, 'Пайетки', 'Пайетки диаметром 5 мм, мягкие из полиамида. Цвета: золото, серебро, голубой, розовый, сиреневый. Оборотная сторона серебристая', 0, 200),
(3, 'Шорты Dolphin', 'Шорты женские из хлопка, отороченные серебристым кантом, с вставками, расшитыми пайетками. Цвета: белый, меланж, голубой, розовый, сиреневый', 1, 250);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
