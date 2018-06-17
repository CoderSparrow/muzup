-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 17 2018 г., 12:50
-- Версия сервера: 10.1.28-MariaDB
-- Версия PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `muzcoin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auctions`
--

CREATE TABLE `auctions` (
  `id` int(11) NOT NULL,
  `id_goods` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `current_price` decimal(15,2) NOT NULL,
  `status` set('0','1') NOT NULL,
  `period` int(11) NOT NULL,
  `date_start` datetime NOT NULL,
  `commission` decimal(8,2) NOT NULL DEFAULT '1.00',
  `datetime_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auctions`
--

INSERT INTO `auctions` (`id`, `id_goods`, `id_user`, `current_price`, `status`, `period`, `date_start`, `commission`, `datetime_add`) VALUES
(2, 1, 2, '1000.00', '0', 48, '2018-06-19 10:18:00', '1.00', '2018-06-17 11:11:52'),
(3, 2, 3, '5000.00', '0', 48, '2018-06-18 00:00:00', '1.00', '2018-06-17 11:12:18'),
(4, 3, 1, '2000.00', '0', 72, '2018-06-19 07:00:00', '1.00', '2018-06-17 12:13:48'),
(6, 4, 4, '500.00', '0', 72, '2018-06-18 07:18:00', '1.00', '2018-06-17 13:23:40'),
(7, 5, 5, '7000.00', '0', 48, '2018-06-21 09:00:00', '1.00', '2018-06-17 13:24:01'),
(8, 6, 6, '5400.00', '0', 120, '2018-06-22 20:22:00', '1.00', '2018-06-17 13:24:29'),
(9, 7, 7, '3500.00', '0', 48, '2018-06-18 23:00:00', '1.00', '2018-06-17 13:24:49'),
(10, 8, 8, '6000.00', '0', 72, '2018-06-21 22:00:00', '1.00', '2018-06-17 13:25:14');

-- --------------------------------------------------------

--
-- Структура таблицы `bets`
--

CREATE TABLE `bets` (
  `id` int(11) NOT NULL,
  `id_auction` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `value` decimal(15,2) NOT NULL,
  `datetime_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bets`
--

INSERT INTO `bets` (`id`, `id_auction`, `id_user`, `value`, `datetime_add`) VALUES
(1, 3, 7, '5100.00', '2018-06-17 15:56:47'),
(2, 3, 5, '5250.00', '2018-06-17 15:57:00'),
(3, 3, 4, '5400.00', '2018-06-17 16:23:17'),
(17, 3, 5, '5600.00', '2018-06-17 16:36:09'),
(18, 3, 5, '5800.00', '2018-06-17 16:36:27'),
(23, 3, 5, '6000.00', '2018-06-17 16:48:36'),
(24, 3, 5, '6100.00', '2018-06-17 16:48:41'),
(25, 3, 1, '6200.00', '2018-06-17 17:10:46'),
(26, 3, 9, '6300.00', '2018-06-17 17:11:31');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `category` varchar(64) NOT NULL,
  `datetime_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `period` varchar(10) NOT NULL,
  `percent` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `description`, `img`, `category`, `datetime_add`, `period`, `percent`) VALUES
(1, 'МС Егор', 'Начинающий певец. Собираю деньги на новую гитару. В планах запись альбома.', 'egor.jpg', 'Новички', '2018-06-17 10:48:34', '2 года', '50.00'),
(2, 'Dj Alban', 'Приветствую, меня зовут диджей Албан. Хочу независимость от лейблов, посему продаю 30% прибыли от своих треков сроком на 1 год, взамен на сиюминутную выгоду. Нужны деньги на покрытие кредита на дом.', 'djalban.jpg', 'Известные исполнители', '2018-06-17 10:52:47', '6 месяцев', '30.00'),
(3, 'Ляля', 'Мои песни точно станут хитами, нужны деньги на запись в студии', 'lyalya.jpg', 'Новички', '2018-06-17 12:13:02', '2 года', '20.00'),
(4, 'Мелани', 'Я джаз-исполнительница, играю на рояле, выступаю в андерграунд ресторане. Хочу организовать сольный концерт на 10000 человек.', 'melani.jpg', 'Опытные исполнители', '2018-06-17 12:58:32', '3 мес', '30.00'),
(5, 'Light', 'Салют! Мы группа молодых и талантливых поп-певцов, хотим записать клип. Верим, что он взорвет все топ-чарты.', 'light.jpg', 'Новички', '2018-06-17 12:59:21', '1 год', '40.00'),
(6, 'Витя не Ак', 'Йоу, я крутой рэпер, нужны деньги для участия в баттле с призовым фондом 300 тысяч рублей. Соперники слабые, точно всех порву.', 'yanix.jpg', 'Новички', '2018-06-17 13:00:06', '5 мес', '50.00'),
(7, 'Дарья', 'Привет, мне 20 лет. Я начинающий музыкант, сама пишу тексты, играю на скрипке. Хочу делать новый шоу-бизнес и полна идей. Вместе мы сможем изменить этот мир :)', 'darya.jpg', 'Новички', '2018-06-17 13:01:08', '2 года', '20.00'),
(8, 'Назима 2.0', 'Хэй, я представляю редкий вид исполнителей: я девушка-рэпер. Занимаюсь творчеством с 14 лет, пишу тексты, свожу музыку. На моем счету 23 баттла и 16 побед, участие в \"X-фактор\" и высокая оценка жюри. Хочу добиться больших результатов и попасть в BlackStar. Чем я хуже Назимы?', 'nazima20.jpg', 'Опытные исполнители', '2018-06-17 13:01:37', '5 лет', '25.00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` set('0','1','2','3') NOT NULL DEFAULT '0',
  `datetime_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `password`, `email`, `role`, `datetime_add`) VALUES
(1, 'Кречун Егор Максимович', 'user1', '8cb2237d0679ca88db6464eac60da96345513964', 'qwe@qwe.ru', '1', '2018-06-17 10:43:07'),
(2, 'Золин Иосиф Титович ', 'user2', '8cb2237d0679ca88db6464eac60da96345513964', 'qwe@qe.ru', '1', '2018-06-17 10:43:48'),
(3, 'Гусенков Семён Агапович ', 'user3', '8cb2237d0679ca88db6464eac60da96345513964', 'qwe@wer.ru', '1', '2018-06-17 10:44:08'),
(4, 'Васильева Мелани Андреевна', 'user4', '8cb2237d0679ca88db6464eac60da96345513964', 'qwe@ewr.ru', '1', '2018-06-17 13:19:53'),
(5, 'Иванова Лидия Витальевна', 'user5', '8cb2237d0679ca88db6464eac60da96345513964', '', '1', '2018-06-17 13:21:06'),
(6, 'Максимов Виктор Максимович', 'user6', '8cb2237d0679ca88db6464eac60da96345513964', 'wqe@dg.rt', '1', '2018-06-17 13:21:41'),
(7, 'Кифирова Дарья Владимировна', 'user7', '8cb2237d0679ca88db6464eac60da96345513964', 'asd@erw.rt', '1', '2018-06-17 13:22:08'),
(8, 'Сидорова Екатерина Андреевна', 'user8', '8cb2237d0679ca88db6464eac60da96345513964', 'safd@ywer.tu', '1', '2018-06-17 13:22:50'),
(9, 'аыфлывоа', 'qwe', '056eafe7cf52220de2df36845b8ed170c67e23e3', 'qwq@fds.tu', '0', '2018-06-17 17:11:16');

-- --------------------------------------------------------

--
-- Структура таблицы `winners`
--

CREATE TABLE `winners` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_auction` int(11) NOT NULL,
  `id_contract` int(11) NOT NULL,
  `datetime_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `winners_contracts`
--

CREATE TABLE `winners_contracts` (
  `id` int(11) NOT NULL,
  `id_auction` int(11) NOT NULL,
  `id_winner` int(11) NOT NULL,
  `id_goods` int(11) NOT NULL,
  `datetime_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auctions`
--
ALTER TABLE `auctions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_good` (`id_goods`);

--
-- Индексы таблицы `bets`
--
ALTER TABLE `bets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_auction` (`id_auction`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_auction` (`id_auction`),
  ADD UNIQUE KEY `id_contract` (`id_contract`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `winners_contracts`
--
ALTER TABLE `winners_contracts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_auction` (`id_auction`),
  ADD UNIQUE KEY `id_winner` (`id_winner`),
  ADD UNIQUE KEY `id_goods` (`id_goods`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auctions`
--
ALTER TABLE `auctions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `bets`
--
ALTER TABLE `bets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `winners`
--
ALTER TABLE `winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `winners_contracts`
--
ALTER TABLE `winners_contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auctions`
--
ALTER TABLE `auctions`
  ADD CONSTRAINT `auctions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `auctions_ibfk_2` FOREIGN KEY (`id_goods`) REFERENCES `goods` (`id`);

--
-- Ограничения внешнего ключа таблицы `bets`
--
ALTER TABLE `bets`
  ADD CONSTRAINT `bets_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bets_ibfk_2` FOREIGN KEY (`id_auction`) REFERENCES `auctions` (`id`);

--
-- Ограничения внешнего ключа таблицы `winners`
--
ALTER TABLE `winners`
  ADD CONSTRAINT `winners_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `winners_ibfk_2` FOREIGN KEY (`id_auction`) REFERENCES `auctions` (`id`),
  ADD CONSTRAINT `winners_ibfk_3` FOREIGN KEY (`id_contract`) REFERENCES `winners_contracts` (`id`);

--
-- Ограничения внешнего ключа таблицы `winners_contracts`
--
ALTER TABLE `winners_contracts`
  ADD CONSTRAINT `winners_contracts_ibfk_1` FOREIGN KEY (`id_auction`) REFERENCES `auctions` (`id`),
  ADD CONSTRAINT `winners_contracts_ibfk_2` FOREIGN KEY (`id_winner`) REFERENCES `winners` (`id`),
  ADD CONSTRAINT `winners_contracts_ibfk_3` FOREIGN KEY (`id_goods`) REFERENCES `goods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
