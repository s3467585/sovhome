-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Сен 04 2020 г., 13:50
-- Версия сервера: 5.7.30-cll-lve
-- Версия PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sovhomec_sovhome`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sensor`
--

CREATE TABLE `sensor` (
  `pir1` int(2) NOT NULL,
  `pir2` int(2) NOT NULL,
  `rele1` int(2) NOT NULL,
  `light` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sensor`
--

INSERT INTO `sensor` (`pir1`, `pir2`, `rele1`, `light`) VALUES
(0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` varchar(50) NOT NULL,
  `value` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `value`) VALUES
('connection', '1592386470'),
('reboot', '1581588209'),
('ram', '1024');

-- --------------------------------------------------------

--
-- Структура таблицы `stat`
--

CREATE TABLE `stat` (
  `id` int(20) NOT NULL,
  `temp0` int(5) NOT NULL,
  `temp1` int(5) NOT NULL,
  `temp2` int(5) NOT NULL,
  `time` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stat`
--

INSERT INTO `stat` (`id`, `temp0`, `temp1`, `temp2`, `time`) VALUES
(4906, 13, 23, 24, 1592375643),
(4905, 13, 23, 24, 1592374440),
(4904, 12, 23, 24, 1592373236),
(4903, 12, 23, 24, 1592372034),
(4902, 11, 23, 24, 1592370831),
(4901, 10, 23, 24, 1592369628),
(4900, 10, 24, 24, 1592368427),
(4907, 15, 23, 24, 1592376847),
(4908, 14, 23, 24, 1592378049),
(4909, 14, 23, 24, 1592379252),
(4910, 14, 23, 24, 1592380455),
(4911, 15, 23, 24, 1592381661),
(4912, 14, 23, 24, 1592382862),
(4913, 14, 23, 24, 1592384064),
(4914, 15, 23, 24, 1592385267),
(4915, 15, 23, 24, 1592386470);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `stat`
--
ALTER TABLE `stat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `stat`
--
ALTER TABLE `stat`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4916;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
