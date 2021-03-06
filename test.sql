-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 18 2020 г., 13:49
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `info` varchar(100) DEFAULT NULL,
  `town_id` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`author_id`, `name`, `info`, `town_id`) VALUES
(1, 'Петров Е.К.', 'Почётный журналист Волгоградской области', 5),
(2, 'Иванова О.Е.', NULL, 7),
(4, 'Сидоров А.А.', NULL, 4),
(6, 'Улебеков Е.Ю.', NULL, 5),
(7, 'Акылбекова С.Е.', NULL, 6),
(8, 'Олейникова Т.Ф.', NULL, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `departments`
--

CREATE TABLE `departments` (
  `dep_id` int(12) NOT NULL,
  `adress` varchar(100) CHARACTER SET utf8 NOT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `town_id` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `departments`
--

INSERT INTO `departments` (`dep_id`, `adress`, `time_start`, `time_end`, `town_id`) VALUES
(2, '400026, г. Волгоград, ул. Доценко, д. 43', '08:00:00', '18:00:00', 5),
(4, '119136 г. Москва, 3-й Сетуньский проезд, д.16', '08:00:00', '18:00:00', 4),
(5, '344011, г.Ростов-на-Дону, ул. Лермонтовская, д. 38', '08:00:00', '18:00:00', 7),
(6, '454091, ул. Свободы, 82, Челябинск, Челябинская обл.', '08:00:00', '18:00:00', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `event_id` int(12) NOT NULL,
  `info` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `time` datetime DEFAULT NULL,
  `dep_id` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`event_id`, `info`, `time`, `dep_id`) VALUES
(1, 'Дискуссия о современном журналистском антикоррупционном расследовании ', '2020-10-18 10:00:00', 4),
(4, 'Встреча с главой партии', '2020-10-26 13:00:00', 6),
(5, 'Обсуждение ситуации с Казимиром Петровым', '2020-10-29 09:00:00', 5),
(6, 'Обсуждение экологической ситуации на юге Волгограда', '2020-10-22 11:00:00', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(12) NOT NULL,
  `genre_info` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_info`) VALUES
(1, 'Расследование'),
(2, 'Криминал'),
(3, 'Выборы'),
(4, 'Экология'),
(5, 'Посещения');

-- --------------------------------------------------------

--
-- Структура таблицы `ips`
--

CREATE TABLE `ips` (
  `ip_id` int(12) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `agent` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `ips`
--

INSERT INTO `ips` (`ip_id`, `ip_address`, `agent`) VALUES
(12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `news_id` int(12) NOT NULL,
  `news_title` varchar(200) NOT NULL,
  `news_text` varchar(5000) NOT NULL,
  `picture` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `author_id` int(12) NOT NULL,
  `town_id` int(12) DEFAULT NULL,
  `genre_id` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_text`, `picture`, `date`, `author_id`, `town_id`, `genre_id`) VALUES
(5, '«Всё, что происходит в стране, зависит от вас»: Артём Олейник поздравил учеников гимназии «Согол» с началом учебного года.', 'Председатель партии «ДА» Артем Олейник посетил 1 сентября гимназию «Согол» в подмосковном Дмитрове, входящую в число лучших учебных заведений в стране. Во время выступления на линей в честь начала нового учебного года, Артем Олейник пожелал ученикам свободы и уважения к свободе других людей.\r\n\r\n«Уважения очень часто не хватает в нашем обществе и в нашей стране. Учитесь уважать товарищей, несмотря на то что они могут быть очень разными, очень неудобными для вас, но в этом и есть уникальность и ценность союза совершенно разных людей», - сказал во время выступления глава «ДА».\r\n\r\nВ конце выступления он подарил школе книги Дмитрия Лихачева («Письма о добром и прекрасном»).', 'uploads/16017102641.jpeg', '2020-09-28', 1, 5, 5),
(6, 'Требуем прекратить преследование эколога Казимира Петрова', 'Казимир Петров уже на протяжении года преследуется пронационалистскими партиями, сегодня состоялся митинг в его поддержку, на который пришло более 100 тысяч человек.', 'uploads/16017104592.jpeg', '2020-09-29', 2, 7, 2),
(7, 'Глава «ДА» посетил города Миасс, Чебаркуль и Златоуст в Челябинской области', 'Председатель «ДА» в рамках предвыборного визита в регионы провел два дня в Челябинской области. Он посетил Миасс, Чебаркуль и Златоуст, а также важные природные места рядом с этими городами. Кандидаты от партии примут участие в выборах собраний депутатов городов Чебаркуль, Златоуст, Копейск, Магнитогорск, Миасс, а также советов Ленинского, Металлургического, Тракторозаводского районов города Челябинска и Лазурненского сельского поселения. \r\n\r\n\r\nВизит начался с поездки на озеро Тургояк – популярное туристическое место, которое также называют «жемчужиной Урала», и встречи с местными экоактивистами, в том числе кандидатом от партии на выборах Валентиной Монковой. Активисты рассказали председателю «ДА», что строительство (часто неразрешенное) вокруг озера коттеджей и баз отдыха сказывается на состоянии водоема, а незаконный слив канализации в озеро негативно сказывается на здоровье отдыхающих. \r\n\r\nЭкоактивисты отметили, что хотя озеру и присвоен статус особо охраняемой природной территории, он распространяется лишь в пределах 20 м от кромки воды. Николай Рыбаков поддержал активистов в том, чтобы добиться распространения статуса на территорию в пределах как минимум 500 м от кромки воды.', 'uploads/16017106223.jpeg', '2020-09-30', 7, 6, 5),
(8, 'В «ДА» пройдёт открытая дискуссия о современном журналистском расследовании', 'Будет обсуждаться журналистское расследование,касающегося незаконного образования мусорного полигона на юге Волгограда. ', 'uploads/16017107734.jpeg', '2020-10-01', 4, 4, 1),
(9, 'Выборы 13 сентября. Голосуйте за наших кондидатов.', 'Волгоград (Андрей Коломин), Москва (Алексей Коников), Санкт-Петербург(Виталий Рагоза)', 'uploads/16017108475.jpeg', '2020-10-02', 8, 4, 3),
(10, 'В Волгоградской области наши волонтеры очистили леса от более чем 25 тонн мусора.', 'Сегодня участники слета очищали берег Волги и сортировали собранный мусор по материалу. Волонтерство в жизни Богдана Хмельницкого появилось 1,5 года назад. Сегодня он — лидер добровольческого объединения в своем колледже, участник акций многочисленных волонтерских движений — от социальных до событийных. Из перечня направлений программы слета больше всего привлекло экологическое. Собранные на пляже отходы студенты рассортировали и отвезли на специализированное предприятие. Там для ребят провели мини-семинар по разновидностям бытовых отходов и их утилизации. Слет длится всего 4 дня — за это время его участники узнают о тонкостях работы в специализированных информационных системах, знакомятся с деятельностью волонтеров общероссийских движений в регионе и участвуют в программах по экологической культуре и разумному природопользованию.', 'uploads/16017110726.jpeg', '2020-10-03', 6, 5, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `towns`
--

CREATE TABLE `towns` (
  `town_id` int(12) NOT NULL,
  `town_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `info` varchar(500) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `towns`
--

INSERT INTO `towns` (`town_id`, `town_name`, `info`) VALUES
(4, 'Москва', 'Столица России'),
(5, 'Волгоград', ''),
(6, 'Челябинск', 'Второй по величине культурный, экономический, деловой и политический центр УрФО'),
(7, 'Ростов-на-Дону', 'Крупнейший город на юго-западе России, административный центр Южного федерального округа и Ростовской области');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(355) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`) VALUES
(1, 'Тестировщик Евгений Александрович', 'test1', 'test1@test.ru', '5a105e8b9d40e1329780d62ea2265d8a'),
(4, 'admin', 'admin', 'admin@admin', '21232f297a57a5a743894a0e4a801fc3'),
(26, '1', '1', 'aq@ar.ru', 'e10adc3949ba59abbe56e057f20f883e'),
(27, 'Евгений Кувшинов', '947169796', 'eakuvshin@yandex.ru', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `visits`
--

CREATE TABLE `visits` (
  `visit_id` int(12) NOT NULL,
  `date` date NOT NULL,
  `hosts` int(12) NOT NULL,
  `views` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `visits`
--

INSERT INTO `visits` (`visit_id`, `date`, `hosts`, `views`) VALUES
(7, '2020-09-26', 1, 4),
(8, '2020-10-01', 1, 6),
(9, '2020-10-03', 2, 95),
(10, '2020-10-08', 2, 24),
(11, '2020-10-10', 1, 44),
(12, '2020-10-11', 1, 16),
(13, '2020-10-14', 1, 13),
(14, '2020-10-15', 1, 4),
(15, '2020-10-18', 1, 32);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);
ALTER TABLE `authors` ADD FULLTEXT KEY `name` (`name`);

--
-- Индексы таблицы `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dep_id`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Индексы таблицы `ips`
--
ALTER TABLE `ips`
  ADD PRIMARY KEY (`ip_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);
ALTER TABLE `news` ADD FULLTEXT KEY `news_title` (`news_title`,`news_text`);

--
-- Индексы таблицы `towns`
--
ALTER TABLE `towns`
  ADD PRIMARY KEY (`town_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`visit_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `departments`
--
ALTER TABLE `departments`
  MODIFY `dep_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `ips`
--
ALTER TABLE `ips`
  MODIFY `ip_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `towns`
--
ALTER TABLE `towns`
  MODIFY `town_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `visits`
--
ALTER TABLE `visits`
  MODIFY `visit_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
