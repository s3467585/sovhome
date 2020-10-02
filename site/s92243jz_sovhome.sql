-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 02 2020 г., 14:19
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `s92243jz_sovhome`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sensor`
--
-- Создание: Сен 04 2020 г., 18:01
-- Последнее обновление: Сен 04 2020 г., 18:01
--

DROP TABLE IF EXISTS `sensor`;
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
-- Создание: Сен 04 2020 г., 18:01
-- Последнее обновление: Окт 02 2020 г., 11:03
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` varchar(50) NOT NULL,
  `value` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `value`) VALUES
('connection', '1601636590'),
('reboot', '1599742145'),
('ram', '1024');

-- --------------------------------------------------------

--
-- Структура таблицы `stat`
--
-- Создание: Сен 04 2020 г., 18:01
-- Последнее обновление: Окт 02 2020 г., 11:03
--

DROP TABLE IF EXISTS `stat`;
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
(6617, 14, 23, 25, 1601617962),
(6616, 14, 23, 25, 1601616759),
(6615, 14, 23, 25, 1601615556),
(6630, 19, 29, 30, 1601636590),
(6629, 19, 29, 31, 1601635386),
(6628, 18, 29, 29, 1601632710),
(6627, 18, 37, 28, 1601631193),
(6626, 18, 29, 29, 1601629990),
(6625, 17, 28, 29, 1601627584),
(6624, 17, 35, 28, 1601626381),
(6623, 17, 28, 29, 1601625178),
(6622, 16, 27, 28, 1601623976),
(6621, 16, 22, 24, 1601622773),
(6620, 16, 22, 24, 1601621570),
(6619, 15, 22, 24, 1601620367),
(6618, 14, 22, 24, 1601619164);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6631;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
