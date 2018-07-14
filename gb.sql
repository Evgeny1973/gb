-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 14 2018 г., 14:05
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `author`, `date`) VALUES
(1, 'Яростная схватка питона и сколопендры попала на видео', 'Во Вьетнаме питон сразился со сколопендрой и проиграл. На видео с их схваткой обратило внимание издание Daily Mail.\r\nНа кадрах видно, как членистоногое обхватило змею и пытается ее ужалить, та же всеми силами пытается сбросить многоножку. Рептилия старается перекусить сколопендру, но та ухитряется перевернуть питона на спину. В итоге у змеи заканчиваются силы и сколопендра кусает ее за шею и одерживает верх в драке, убивая соперницу.\r\nПо данным издания, комментаторы назвали схватку «зрелищем из ночных кошмаров». Один из пользователей отметил, что глядя на видео, «впервые посочувствовал змее».', 'Daily Mail', '2018-05-22 12:57:29'),
(2, 'Тадж-Махал внезапно позеленел', 'Внешние стены одной из главных достопримечательностей Индии — мавзолея-мечети Тадж-Махал — постепенно становятся зелено-желтыми. Об этом сообщает Reuters.\r\nПамятник архитектуры, построенный из белого мрамора, может навсегда утратить изначальный вид из-за экологических проблем в городе Агре, где он расположен. Как отмечают специалисты по охране окружающей среды, стены Тадж-Махала загрязняются, прежде всего, выхлопными газами и выбросами с местных производств.\r\nКроме того, изменению цвета здания способствует высыхание реки Джамны, протекающей рядом. Около водоема, куда сливаются отходы, расплодились мелкие насекомые. Они врезаются в стены мавзолея, оставляя на них тяжело смываемые следы.', ' Reuters', '2018-05-22 12:57:29'),
(3, 'SpaceX показала замену «Союзу»', 'Глава и основатель американской компании SpaceX Илон Маск в своем Twitter показал финальный дизайн пилотируемого корабля Crew Dragon (Dragon 2), предназначенного для отправки астронавтов к Международной космической станции (МКС).\r\nАппарат Dragon 2 является глубоко модернизированной версией грузовика Dragon, успешно летающего к МКС. Корабль имеет практически моноблочную конструкцию, в грузопассажирском режиме позволяющую, вместе с полезной нагрузкой в 2,5 тонны, отправлять к МКС до четырех человек. В пассажирском режиме корабль берет на борт до семи человек (российский «Союз» — до трех).', 'Elon Musk', '2018-05-22 13:01:56'),
(4, 'Обнаружен признак существования новой крупной планеты Солнечной системы', 'Международная группа астрономов нашла новое доказательство существования девятой планеты Солнечной системы. Им стал транснептуновый объект 2015 BP519, удаленный от Солнца на 55 астрономических единиц (одна астрономическая единица равна расстоянию от Солнца до Земли). Об этом сообщает издание Science Alert.\r\n2015 BP519 зарегистрировал телескоп имени Виктора Бланко в Чили в рамках проекта Dark Energy Survey, предназначенного для изучения расширения Вселенной и поиска темной энергии. Сверхчувствительная камера DECam используется для поиска тусклых объектов, располагающихся вне Млечного Пути, однако также подходит для регистрации небесных тел Солнечной системы, находящихся за орбитой Нептуна.\r\nНаблюдения за 2015 BP519, проводившиеся в течение 1110 дней, позволили определить характеристики орбиты объекта. Оказалось, что максимальная удаленность тела от Солнца составляет 450 астрономических единиц (минимальная — 36 астрономических единиц), эксцентриситет орбиты равен 0,92, а наклон — 54 градуса.', NULL, '2018-05-22 13:01:56');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'Вася', '$2y$10$zZUFC/gr7Eaqvhyl2.McIetrNZJ7lncR.uhgttyuQ0bXFSTWCb7Tq'),
(2, 'Петя', '$2y$10$zZUFC/gr7Eaqvhyl2.McIetrNZJ7lncR.uhgttyuQ0bXFSTWCb7Tq'),
(3, 'Маша', '$2y$10$zZUFC/gr7Eaqvhyl2.McIetrNZJ7lncR.uhgttyuQ0bXFSTWCb7Tq');

-- --------------------------------------------------------

--
-- Структура таблицы `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `hash`) VALUES
(1, 1, 'f9bdac25076e20d21b4bf5c2e057f40707f9c1c62b624efe356f6fb15be7f1c5'),
(2, 1, 'e78c43816ddb353a204c87d65cdf0bc78f11e59d9b7a4a36a0fb4f9655ca26de'),
(3, 1, 'd237ccbb6ffbc42152b10db39fab912f83398b0a8153774d4128b77d5dd2fbb9'),
(4, 1, 'd81d6d72adca516ee35131b032433f5bad5af069b657f2fd82ed6211ec0f417d'),
(5, 1, 'fd6c4cc1f6524e95a73c09233f989fd915e30ea32ff166e6c5b344d503ce912e'),
(6, 1, '074304389069eea2bc070f964299d8608d258c893c7eb0e6b4623fa952c63070'),
(7, 1, '93588563b597a998f0f52d7e5b445db8c3654fb5cbb0931e161c611ccab45130'),
(8, 1, '436aa27b1dbd285dd9171bab4d40e68071e514330fa72d3822cdfa8f71938f2b'),
(9, 1, '278d577107178d1aabe2c592e21b9d6e8c62058d3587cea16da4a523e611b4a4'),
(10, 1, 'a5dc959bbe49a4e6d826f00426585f08904e435c1e6f4993c672620ad17be1da'),
(11, 1, 'dd8534f38a7783e5b5475a33d3035b28201791bf0100c5b5a8d63f5c1969cd1d'),
(12, 1, 'd749147b97f6637672f58c3d4327015506326a55559bdea320235c0ec6d5f4d9');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
