-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 20 2018 г., 15:04
-- Версия сервера: 5.5.48
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `clinic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id_country` int(11) NOT NULL,
  `name_country` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL,
  `id_user_type` int(11) DEFAULT NULL COMMENT 'Тип сотрудника',
  `id_special` varchar(20) DEFAULT NULL COMMENT 'ID профессии. У пользователя может быть несколько профессий и разделяются через запятую.',
  `name` varchar(200) DEFAULT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `patronymic` varchar(200) DEFAULT NULL,
  `dbirth` date DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `login` varchar(200) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id`, `id_user_type`, `id_special`, `name`, `surname`, `patronymic`, `dbirth`, `phone`, `login`, `pass`) VALUES
(1, 2, '2', 'Иван', 'Иванов', 'Иванович', '2018-04-11', '89134546988', '', NULL),
(2, 1, '1', 'Анна', 'Данилова', 'Владимировна', '2018-04-05', NULL, '234авы', '435'),
(3, NULL, '1', 'Анастасия', 'Клименко', 'Андреевна', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `history_visit`
--

CREATE TABLE IF NOT EXISTS `history_visit` (
  `id_history` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `date_visit` date NOT NULL,
  `id_doctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id_pacient` int(10) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `patronymic` varchar(50) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL COMMENT 'Если true-> мужской, false->женской',
  `date_of_birth` date DEFAULT NULL,
  `passport_num` int(11) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `patient_card_num` varchar(50) DEFAULT NULL,
  `invalidnost` int(11) DEFAULT '0' COMMENT '1->Инвалид первой группы 2->Вторая группа 3->Третья группа',
  `adress` varchar(300) DEFAULT NULL COMMENT '1-рабочий;2 - служащий, 3 - студент',
  `social_status` int(11) DEFAULT NULL,
  `id_citizenship` int(11) DEFAULT '1',
  `id_region` int(11) DEFAULT '1',
  `email` varchar(300) DEFAULT NULL,
  `snils` int(1) DEFAULT NULL COMMENT '1-обязательный, 2-необязательный',
  `work_place` varchar(500) DEFAULT NULL,
  `data_vidachi_pass` date DEFAULT NULL,
  `inn` varchar(50) DEFAULT NULL,
  `type_medical_policy` tinyint(1) DEFAULT '1' COMMENT '1->обязательный, 2->добровольный',
  `start_medical_policy` date DEFAULT NULL COMMENT 'Дата выдачи полиса',
  `end_medical_policy` date DEFAULT NULL COMMENT 'Срок окончания медицинского полиса',
  `Id_insurance_company` int(11) DEFAULT NULL COMMENT 'Страховая компания',
  `id_doctor` int(11) DEFAULT NULL,
  `fixing_date` date DEFAULT NULL COMMENT 'Дата закрепления',
  `id_university` int(11) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `id_added_operator` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patient`
--

INSERT INTO `patient` (`id_pacient`, `name`, `surname`, `patronymic`, `sex`, `date_of_birth`, `passport_num`, `phone`, `patient_card_num`, `invalidnost`, `adress`, `social_status`, `id_citizenship`, `id_region`, `email`, `snils`, `work_place`, `data_vidachi_pass`, `inn`, `type_medical_policy`, `start_medical_policy`, `end_medical_policy`, `Id_insurance_company`, `id_doctor`, `fixing_date`, `id_university`, `user_type`, `password`, `login`, `id_added_operator`) VALUES
(1, 'Махмуд', 'Фозилов', 'Набиевич', 1, '1996-09-09', 400340250, '345', '456456', 0, '45645', 3, 1, 1, 'odilov090996@mail.ru', 34535, 'Универ', '2018-04-08', '34534534523235423', 1, '2018-04-15', '2018-04-15', 1, 1, '2018-04-15', 1, 2, '1234561', 'odilov090996@mail.ru', 3),
(3, 'Озар', 'Одилов', 'Умриллоевич', 1, '1996-09-09', 400340504, '89134344711', '11111111', 0, 'Кемерово, ул.Мичурина, дом 57, 909 комната', 3, 1, 1, 'odilov090996@mail.ru', 23425345, 'Нет', '2006-04-20', '3242323423423', 1, '2005-04-20', '2006-04-20', 1, 2, '2005-04-20', 2, 3, '1234567', 'odilov090996@mail.ru', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id_schedule` int(10) unsigned NOT NULL,
  `id_add_user` int(11) NOT NULL COMMENT 'ID добавленного пользователя',
  `date_priema` date DEFAULT NULL,
  `time_priema` time DEFAULT NULL,
  `id_doctor` int(10) unsigned DEFAULT NULL,
  `id_pacient` int(10) unsigned DEFAULT NULL,
  `id_uslugi` int(10) unsigned DEFAULT NULL,
  `is_payed` tinyint(1) DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `notes` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `id_add_user`, `date_priema`, `time_priema`, `id_doctor`, `id_pacient`, `id_uslugi`, `is_payed`, `cost`, `notes`) VALUES
(1, 0, '2018-04-16', '10:00:00', 1, 1, 1, 1, 20.3, 'Это первая запись'),
(3, 0, '2018-04-17', '16:00:00', 3, 3, 2, 3, 32, '33efsd'),
(4, 1, '2018-04-16', '13:00:00', 1, 1, 1, 0, 0, 'dgdfg');

-- --------------------------------------------------------

--
-- Структура таблицы `specialities`
--

CREATE TABLE IF NOT EXISTS `specialities` (
  `id_special` int(11) NOT NULL,
  `title` varchar(70) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `specialities`
--

INSERT INTO `specialities` (`id_special`, `title`) VALUES
(1, 'Терапевт'),
(2, 'Лор');

-- --------------------------------------------------------

--
-- Структура таблицы `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(10) unsigned NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_type`
--

INSERT INTO `user_type` (`id`, `type`) VALUES
(1, 'patient'),
(2, 'doctor'),
(3, 'operator');

-- --------------------------------------------------------

--
-- Структура таблицы `uslugi`
--

CREATE TABLE IF NOT EXISTS `uslugi` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id_country`),
  ADD UNIQUE KEY `id_country` (`id_country`);

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `history_visit`
--
ALTER TABLE `history_visit`
  ADD PRIMARY KEY (`id_history`);

--
-- Индексы таблицы `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_pacient`);

--
-- Индексы таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Индексы таблицы `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id_special`);

--
-- Индексы таблицы `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `uslugi`
--
ALTER TABLE `uslugi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `history_visit`
--
ALTER TABLE `history_visit`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `patient`
--
ALTER TABLE `patient`
  MODIFY `id_pacient` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id_special` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `uslugi`
--
ALTER TABLE `uslugi`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
