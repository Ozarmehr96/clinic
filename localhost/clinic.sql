-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 11 2018 г., 15:22
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
  `id_country` int(11) NOT NULL COMMENT 'Идентификатор страны',
  `name_country` varchar(100) DEFAULT NULL COMMENT 'Название страны'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(11) NOT NULL,
  `cabinet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL COMMENT 'Идентификатор ',
  `id_user_type` int(11) DEFAULT NULL COMMENT 'Тип сотрудника',
  `id_special` varchar(20) DEFAULT NULL COMMENT 'Идентификатор профессии. У пользователя может быть несколько профессий и разделяются через запятую.',
  `name` varchar(200) DEFAULT NULL COMMENT 'Имя сотрудника',
  `surname` varchar(200) DEFAULT NULL COMMENT 'Фамилия сотрудника',
  `patronymic` varchar(200) DEFAULT NULL COMMENT 'Отчество сотрудника',
  `dbirth` date DEFAULT NULL COMMENT 'Дата рождения',
  `phone` varchar(20) DEFAULT NULL COMMENT 'Телефон',
  `login` varchar(200) DEFAULT NULL COMMENT 'Логин',
  `pass` varchar(200) DEFAULT NULL COMMENT 'Пароль'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id`, `id_user_type`, `id_special`, `name`, `surname`, `patronymic`, `dbirth`, `phone`, `login`, `pass`) VALUES
(1, 2, '2', 'Васильев', 'Василий', 'Васильевич', '2018-04-11', '89134546988', '', NULL),
(2, 1, '1', 'Анна', 'Данилова', 'Владимировна', '2018-04-05', NULL, '234авы', '435'),
(3, 3, '1', 'Анастасия', 'Клименко', 'Андреевна', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `history_visit`
--

CREATE TABLE IF NOT EXISTS `history_visit` (
  `id_history` int(11) NOT NULL COMMENT 'Идентификатор ',
  `id_patient` int(11) NOT NULL COMMENT 'Идентификатор пациента',
  `date_visit` date NOT NULL COMMENT 'Дата визита',
  `id_doctor` int(11) NOT NULL COMMENT 'Идентификатор доктора'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `LogAndPass`
--

CREATE TABLE IF NOT EXISTS `LogAndPass` (
  `id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `login` varchar(300) NOT NULL,
  `passwd` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id_pacient` int(10) unsigned NOT NULL COMMENT 'Идентификатор ',
  `name` varchar(50) DEFAULT NULL COMMENT 'Имя',
  `surname` varchar(50) DEFAULT NULL COMMENT 'Фамилия',
  `patronymic` varchar(50) DEFAULT NULL COMMENT 'Отчество',
  `sex` tinyint(1) DEFAULT NULL COMMENT 'Если true-> мужской, false->женской',
  `date_of_birth` date DEFAULT NULL COMMENT 'Дата рождения',
  `passport_num` varchar(50) DEFAULT NULL COMMENT 'Номер паспорта',
  `phone` varchar(300) DEFAULT NULL COMMENT 'Телефон',
  `patient_card_num` varchar(300) DEFAULT NULL COMMENT 'Номер амбулаторной карты пациента',
  `invalidnost` int(11) DEFAULT '0' COMMENT '1->Инвалид первой группы 2->Вторая группа 3->Третья группа',
  `adress` varchar(300) DEFAULT NULL COMMENT '1-рабочий;2 - служащий, 3 - студент',
  `social_status` int(11) DEFAULT NULL COMMENT 'Социальный статус',
  `id_citizenship` int(11) DEFAULT '1' COMMENT 'Идентификатор страны',
  `id_region` int(11) DEFAULT '1' COMMENT 'Идентификатор региона ',
  `email` varchar(300) DEFAULT NULL COMMENT 'Адрес электронной почты',
  `snils` int(1) DEFAULT NULL COMMENT '1-обязательный, 2-необязательный',
  `work_place` varchar(500) DEFAULT NULL COMMENT 'Место работы',
  `data_vidachi_pass` date DEFAULT NULL COMMENT 'Даты выдачи паспорта',
  `inn` varchar(50) DEFAULT NULL COMMENT 'ИНН',
  `type_medical_policy` tinyint(1) DEFAULT '1' COMMENT '1->обязательный, 2->добровольный',
  `police_number` varchar(100) DEFAULT NULL COMMENT 'Номер медицинского полиса',
  `start_medical_policy` date DEFAULT NULL COMMENT 'Дата выдачи полиса',
  `end_medical_policy` date DEFAULT NULL COMMENT 'Срок окончания медицинского полиса',
  `Id_insurance_company` int(11) DEFAULT NULL COMMENT 'Страховая компания',
  `id_doctor` int(11) DEFAULT NULL COMMENT 'Идентификатор доктор',
  `fixing_date` date DEFAULT NULL COMMENT 'Дата закрепления',
  `id_university` int(11) DEFAULT NULL COMMENT 'Идентификатор университета',
  `user_type` int(11) DEFAULT NULL COMMENT 'Идентификатор типа пользователя',
  `password` varchar(200) NOT NULL COMMENT 'Пароль',
  `login` varchar(200) NOT NULL COMMENT 'Логин',
  `id_added_operator` int(11) DEFAULT NULL COMMENT 'Идентификатор добавленного пользователя'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patient`
--

INSERT INTO `patient` (`id_pacient`, `name`, `surname`, `patronymic`, `sex`, `date_of_birth`, `passport_num`, `phone`, `patient_card_num`, `invalidnost`, `adress`, `social_status`, `id_citizenship`, `id_region`, `email`, `snils`, `work_place`, `data_vidachi_pass`, `inn`, `type_medical_policy`, `police_number`, `start_medical_policy`, `end_medical_policy`, `Id_insurance_company`, `id_doctor`, `fixing_date`, `id_university`, `user_type`, `password`, `login`, `id_added_operator`) VALUES
(1, 'Иван', 'Иванов', 'Иванович', 1, '1996-09-09', '456456', '1111', '22', 0, '45645', 3, 1, 2, 'odilov090996@mail.ru', 34535, 'Универ', '2018-04-08', '34534534523235423', 1, '1111', '2018-04-15', '2018-04-15', 1, 1, '2018-04-15', 1, 1, '1234561', 'odilov090996@mail.ru', 5),
(3, 'Владимир', 'Владимиров ', 'Владимирович', 1, '1996-09-09', '11111111', '89134344711', '11111111', 0, 'Кемерово, ул.Мичурина, дом 57, 909 комната', 2, 1, 1, 'odilov090996@mail.ru', 23425345, 'Есть', '2006-04-20', '3242323423423', 1, '4444', '2005-04-20', '2006-04-20', 1, 2, '2005-04-20', 1, 1, '1234567', 'odilov090996@mail.ru', 5),
(4, 'Иван', 'Михайлов', 'Михайлович', 1, '1968-09-09', '11111111', '89456365254', '11111111', 0, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, '1111', NULL, NULL, NULL, NULL, NULL, NULL, 2, '11111', '111111', NULL),
(5, 'Анна', 'Владимирова', 'Владимировна', 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '11111', 'operator@mail.ru', NULL),
(10, 'Илья', 'Шипилов', 'Константинович', 1, '1996-05-10', '32423425', '89089417819', '345345', 0, '34534553', 1, 1, 1, '', 0, 'нету', '0000-00-00', '345345', 1, NULL, '0000-00-00', '0000-00-00', 1, 1, '2018-05-10', 1, 1, '', '', 5),
(11, 'Озармехр', 'Одилов', 'Умриллоевич', 1, '2018-05-10', '452121215', '89134344711', '1232423', 0, 'Кемерово, ул.Мичурина, дом 57, 909 комната', 1, 1, 1, '', 0, '', '0000-00-00', '', 1, NULL, '0000-00-00', '0000-00-00', 1, 1, '2018-05-10', 1, 1, '', '', 5),
(12, 'Озармехр', 'Одилов', 'Умриллоевич', 1, '2018-05-10', '452121215', '89134344711', '1232423', 0, 'Кемерово, ул.Мичурина, дом 57, 909 комната', 1, 1, 1, '', 0, '', '0000-00-00', '', 1, NULL, '0000-00-00', '0000-00-00', 1, 1, '2018-05-10', 1, 1, '', '', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id_schedule` int(10) unsigned NOT NULL,
  `id_add_user` int(11) DEFAULT NULL COMMENT 'Идентификатор добавленного пользователя',
  `date_priema` date DEFAULT NULL COMMENT 'Дата приема',
  `time_priema` time DEFAULT NULL COMMENT 'Время приема',
  `id_doctor` int(10) unsigned DEFAULT NULL COMMENT 'Идентификатор доктора',
  `id_pacient` int(10) unsigned DEFAULT NULL COMMENT 'Идентификатор пациента',
  `id_uslugi` int(10) unsigned DEFAULT NULL COMMENT 'Идентификатор услуги',
  `is_payed` tinyint(1) DEFAULT NULL COMMENT 'Оплачено',
  `cost` float DEFAULT NULL COMMENT 'Стоимость',
  `notes` varchar(400) DEFAULT NULL COMMENT 'Заметки'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `id_add_user`, `date_priema`, `time_priema`, `id_doctor`, `id_pacient`, `id_uslugi`, `is_payed`, `cost`, `notes`) VALUES
(1, 0, '2018-05-11', '09:15:00', 2, 1, 1, 1, 400, 'Нет заметки'),
(13, 3, '2018-05-11', '15:30:00', 2, 3, 4, NULL, 124.25, 'This is good'),
(15, 1, '2018-05-11', '08:00:00', 4, 1, 1, NULL, 444, 'zcsdcsc');

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
  `name` varchar(60) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Состояние услуги'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `uslugi`
--

INSERT INTO `uslugi` (`id`, `name`, `status`) VALUES
(1, 'Консультация врача', 1),
(2, 'Плановая диспансеризация, вакцинация', 1),
(3, 'Направления на консультацию к смежным специалистам', 1),
(4, 'Постановка диагноза', 1);

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
-- Индексы таблицы `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор страны';
--
-- AUTO_INCREMENT для таблицы `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор ',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `history_visit`
--
ALTER TABLE `history_visit`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор ';
--
-- AUTO_INCREMENT для таблицы `patient`
--
ALTER TABLE `patient`
  MODIFY `id_pacient` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор ',AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
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
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `specialities`
--
ALTER TABLE `specialities`
  ADD CONSTRAINT `id_special` FOREIGN KEY (`id_special`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
