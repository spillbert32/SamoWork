-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 29 2022 г., 22:26
-- Версия сервера: 5.5.50
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `marinichev_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `category` enum('Обувь','Костюм','Снаряжение','Приборы') NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` longtext NOT NULL,
  `property` text NOT NULL,
  `price` float NOT NULL,
  `Gender` varchar(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category`, `name`, `description`, `img`, `property`, `price`, `Gender`) VALUES
(1, 'Обувь', 'Ботинки мужские Hanwag Tatra II Gtx Brown', 'Материал - Кожа\r\nМембрана - Gore-Tex\r\nКласс обуви - туризм', '', '{"name":[],"value":[]}', 25000, 'м'),
(2, 'Обувь', 'Ботинки La Sportiva Aequilibrium', 'Материал - Синтетика\r\nМембрана - Gore-Tex\r\nКласс обуви - туризм', '', '{"name":[],"value":[]}', 35000, 'м'),
(3, 'Костюм', 'Костюм Huntsman Yukon Ice', 'Сезон - зимний\r\nТемпературный режим - до -45°C\r\nНепромокаемый - да', '', '{"name":[],"value":[]}', 12000, 'м'),
(4, 'Костюм', 'Костюм Huntsman Полюс (Cell) Хаки', 'Сезон - зимний\r\nТемпературный режим - до -40°C\r\nНепромокаемый - да', '', '{"name":[],"value":[]}', 6000, 'м'),
(5, 'Снаряжение', 'Горные лыжи Head Supershape E-Original', 'Конструкция лыж - Гибрид\r\nШирина талии (мм) - 66\r\nРадиус лыж - 12,1 (170)', '', '{"name":[],"value":[]}', 55992, 'м'),
(6, 'Снаряжение', 'Рюкзак Fjallraven Kaipak 58 Navy', 'Глубина (см) - 30\r\nФиксация палок - да\r\nФиксация ледоруба - да', '', '{"name":[],"value":[]}', 15120, 'м'),
(7, 'Приборы', 'Набор складных столовых приборов 3 в 1 ', 'Бренд - Опмир\r\nСостав: вилка, ложка, нож', '', '{"name":[],"value":[]}', 500, 'у'),
(8, 'Приборы', 'Набор туристической посуды KOVEA SS-027', 'Производитель: KOVEA\r\nТип: набор', '', '{"name":[],"value":[]}', 4000, 'у');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `status` enum('admin','employee','user') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `salt`, `status`) VALUES
(1, 'admin@mail.local', '0cb3b15e35eae136da39972c90ab5b9ed222ba9e174132a960e87f5736070eb8', 'b69f98816783f9c488421b00aa94a54d', 'admin'),
(2, 'user@mail.local', '64917b33c5d9157575d951cf6c5a73aa71b614aa9e092883e95a0cbf48b7ee82', '35baa5ec41750105b020c54e2e066152', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
