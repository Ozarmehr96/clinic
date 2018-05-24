-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 24 2018 г., 15:45
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

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`%` PROCEDURE `getUslugi`()
    NO SQL
SELECT * FROM uslugi$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id_country` int(11) NOT NULL COMMENT 'Идентификатор страны',
  `name_country` varchar(100) DEFAULT NULL COMMENT 'Название страны',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id_country`, `name_country`, `status`) VALUES
(1, 'Азербайджан', 1),
(2, 'Армения', 1),
(3, 'Грузия', 1),
(4, 'Россия', 1),
(5, 'Таджикистан', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `cabinet` varchar(20) DEFAULT NULL,
  `id_special` int(11) DEFAULT NULL,
  `schedule` varchar(100) NOT NULL COMMENT 'График работы врача'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `doctor`
--

INSERT INTO `doctor` (`id`, `id_doctor`, `cabinet`, `id_special`, `schedule`) VALUES
(1, 4, '122', 1, '10:00-12:00,12:00-17:00,08:00-12:00,08:00-17:00,08:00-17:00,08:15-10:00'),
(2, 56, '302', 3, '10:00-17:00,12:00-17:00,08:00-17:00,08:00-17:00,08:00-17:00'),
(3, 57, '119', 1, '10:00-17:00,11:00-17:00,08:00-17:00,08:00-17:00,08:00-17:00,08:15-10:00'),
(4, 58, '303', 3, '10:00-12:00,14:00-17:00,08:00-17:00,08:00-17:00,08:00-17:00'),
(5, 59, '307', 3, '08:00-17:00,08:00-17:00,08:00-17:00,08:00-17:00,08:00-17:00'),
(6, 60, '312', 3, '08:00-17:00,08:00-17:00,08:00-17:00,08:00-17:00,08:00-17:00'),
(7, 61, '214', 5, '08:00-17:00,08:00-17:00,08:00-17:00,08:00-17:00,08:00-17:00'),
(8, 62, '121', 7, '08:00-13:00,08:00-17:00,08:00-17:00,08:00-17:00,08:00-13:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id`, `id_user_type`, `id_special`, `name`, `surname`, `patronymic`, `dbirth`, `phone`, `login`, `pass`) VALUES
(1, 2, '3', 'Васильев', 'Василий', 'Васильевич', '2018-04-11', '89134546988', '', NULL),
(3, 2, '1', '111', '222', '333', NULL, NULL, NULL, NULL),
(4, 2, '3', 'Илья', 'Махмудов', 'Набиевич', NULL, NULL, NULL, NULL),
(5, 2, '3', 'Анастасия', 'Дмитрова', 'Дмитриевна', NULL, NULL, NULL, NULL),
(6, 2, '3', 'Анна', 'Данилова', 'Владимировна', '2018-04-05', NULL, '234авы', '435'),
(7, 2, '5', 'qqq', 'www', 'eee', NULL, NULL, NULL, NULL),
(8, 3, '1', 'Анастасия', 'Клименко', 'Андреевна', NULL, NULL, NULL, NULL);

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
-- Структура таблицы `insurance`
--

CREATE TABLE IF NOT EXISTS `insurance` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `insurance`
--

INSERT INTO `insurance` (`id`, `title`, `status`) VALUES
(1, 'СИБИРСКИЙ ДОМ СТРАХОВАНИЯ', 1),
(2, 'МСК СТРАЖ', 1),
(3, 'РОСГОССТРАХ', 1),
(4, 'ИНГОССТРАХ', 1),
(5, 'СИБИРСКИЙ СПАС', 1);

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
-- Структура таблицы `myGo`
--

CREATE TABLE IF NOT EXISTS `myGo` (
  `id` int(11) NOT NULL,
  `passport` varchar(100) NOT NULL,
  `police_number` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `myGo`
--

INSERT INTO `myGo` (`id`, `passport`, `police_number`) VALUES
(17, '111', '555'),
(26, '87', '77'),
(27, '88', '777'),
(28, '747', '747'),
(30, '1', '11'),
(34, '12', '12');

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
  `patient_card_num` varchar(50) DEFAULT NULL COMMENT 'Номер амбулаторной карты пациента',
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
  `id_added_operator` int(11) DEFAULT NULL COMMENT 'Идентификатор добавленного пользователя',
  `id_special` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `patient`
--

INSERT INTO `patient` (`id_pacient`, `name`, `surname`, `patronymic`, `sex`, `date_of_birth`, `passport_num`, `phone`, `patient_card_num`, `invalidnost`, `adress`, `social_status`, `id_citizenship`, `id_region`, `email`, `snils`, `work_place`, `data_vidachi_pass`, `inn`, `type_medical_policy`, `police_number`, `start_medical_policy`, `end_medical_policy`, `Id_insurance_company`, `id_doctor`, `fixing_date`, `id_university`, `user_type`, `password`, `login`, `id_added_operator`, `id_special`) VALUES
(1, 'Иван', 'Иванов', 'Иванович', 1, '1996-09-09', '444444', '1111', '235', 0, '45645', 3, 1, 2, 'odilov090996@mail.ru', 34535, 'Универ', '2018-04-08', '34534534523235423', 1, '1111', '2018-04-15', '2018-04-15', 1, 1, '2018-04-15', 1, 1, '1234561', 'odilov090996@mail.ru', 5, NULL),
(3, 'Владимир', 'Владимиров ', 'Владимирович', 1, '1996-09-09', '11111', '89134344711', '11111111', 0, 'Кемерово, ул.Мичурина, дом 57, 909 комната', 3, 1, 1, 'odilov090996@mail.ru', 23425345, 'Есть', '2006-04-20', '3242323423423', 0, '4444', '2005-04-20', '2006-04-20', 1, 4, '2005-04-20', 1, 1, '1234567', 'odilov090996@mail.ru', 5, NULL),
(4, 'Иван', 'Михайлов', 'Михайлович', 1, '1968-09-09', '222222', '89456365254', '22', 0, 'sad@mail.ru', 2, 1, 1, '', 0, '', '0000-00-00', '3242323423423', 1, '1111', '0000-00-00', '0000-00-00', NULL, 2, '2018-05-16', 1, 2, '11111', '111111', 69, NULL),
(5, 'Анна', 'Владимирова', 'Владимировна', 1, NULL, NULL, NULL, '12', 0, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '11111', 'operator@mail.ru', NULL, NULL),
(10, 'Илья', 'Шипилов', 'Константинович', 1, '1996-05-10', '66666', '89089417819', '242213', 0, '34534553', 1, 1, 1, '', 0, 'нету', '0000-00-00', '345345', 1, '25', '0000-00-00', '0000-00-00', 1, 1, '2018-05-10', 1, 1, '', '', 5, NULL),
(11, 'Озармехр', 'Одилов', 'Умриллоевич', 1, '2018-05-10', '33333', '89134344711', '242203', 0, 'Кемерово, ул.Мичурина, дом 57, 909 комната', 1, 1, 1, '', 0, '', '0000-00-00', '', 1, '25', '0000-00-00', '0000-00-00', 1, 1, '2018-05-10', 1, 1, '', '', 5, NULL),
(14, 'Амиржон', 'Обидов', 'Обидович', 1, '1995-03-16', '55555', '892564896', '242204', 0, 'Мичури', 3, 1, 1, '', 0, '', '0000-00-00', '', 1, '242203', '0000-00-00', '0000-00-00', 1, 3, '2018-05-12', 1, 1, '', '', 5, NULL),
(45, 'ppp', 'ppp', 'ppp', 1, '2018-05-14', '234456', '5646', '242232', 0, '45645', 1, 1, 1, '', 0, '', '0000-00-00', '', 1, NULL, '0000-00-00', '0000-00-00', 1, 1, '2018-05-14', 1, 1, '', '', 5, NULL),
(54, 'zzz', 'aaa', 'qqq', 1, '2018-05-14', '23445', '234', '242339', 0, 'erwe', 1, 1, 1, '', 0, '', '0000-00-00', '', 1, NULL, '0000-00-00', '0000-00-00', 1, 1, '2018-05-14', 1, 1, '', '', 5, NULL),
(56, 'Васильев', 'Василий', 'Васильевич', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, 2, '11111', 'doctor@mail.ru', NULL, 3),
(57, '111', '222', '333', 1, '2018-05-24', '234', '234', NULL, 0, '324234', 2, 1, 1, '', 0, '', '0000-00-00', '', 1, NULL, '0000-00-00', '0000-00-00', NULL, 3, '2018-05-24', 0, 2, '', '', 69, 1),
(58, 'Илья', 'Махмудов', 'Набиевич', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 4, NULL, NULL, 2, '', '', NULL, 3),
(59, 'Анастасия', 'Дмитрова', 'Дмитриевна', NULL, NULL, '258963', NULL, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 5, NULL, NULL, 2, '', '', NULL, 3),
(60, 'Анна', 'Данилова', 'Владимировна', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 6, NULL, NULL, 2, '', '', NULL, 3),
(61, 'Анна', 'www', 'eee', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 7, NULL, NULL, 2, '', '', NULL, 5),
(62, 'Анастасия', 'Клименко', 'Андреевна', NULL, NULL, '', NULL, NULL, 0, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 8, NULL, NULL, 2, '', '', NULL, 0),
(65, 'wre', '345', '5345', 1, '2018-05-15', '44444', '245', '242306', 0, '234535', 1, 1, 1, '', 0, '', '0000-00-00', '', 1, NULL, '0000-00-00', '0000-00-00', 1, 1, '2018-05-15', 1, 1, '', '', 5, NULL),
(67, 'ewqrw', 'wer', 'wet', 1, '2018-05-15', '555551', '52353', '242245', 0, '34534', 1, 1, 1, '', 0, '', '0000-00-00', '', 1, NULL, '0000-00-00', '0000-00-00', 1, 1, '2018-05-15', 1, 1, '', '', 5, NULL),
(68, '1111', '1111', '111', 1, '2018-05-19', '2134', '2134', '242274', 1, '234214', 3, 1, 1, '', 0, '', '0000-00-00', '', 1, NULL, '0000-00-00', '0000-00-00', 1, 4, '2018-05-19', 1, 1, '', '', 5, NULL),
(69, 'Наталья ', 'Клименко', 'Леонидовна', 0, '1965-09-09', NULL, '89134548699', '2342342341134', 0, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '111111', 'head@mail.ru', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`id`, `title`, `status`) VALUES
(1, 'Кемеровская область', 1),
(2, 'Новосибирская область', 1),
(3, 'Омская область', 1),
(4, 'Томская область', 1),
(5, 'Иркутская область', 1);

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
  `notes` varchar(400) DEFAULT NULL COMMENT 'Заметки',
  `articul` varchar(50) DEFAULT NULL COMMENT 'uniqueArticul - название индекса. Артикул записи. Не повторяется'
) ENGINE=InnoDB AUTO_INCREMENT=385 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `id_add_user`, `date_priema`, `time_priema`, `id_doctor`, `id_pacient`, `id_uslugi`, `is_payed`, `cost`, `notes`, `articul`) VALUES
(319, 1, '2018-05-19', '14:15:00', 57, 4, 1, NULL, 345, 'Наконец-то!!!!!!\r\n', '20185191415574'),
(325, 5, '2018-05-22', '09:00:00', 4, 3, 3, NULL, 34, '00000000000', '2018522090043'),
(326, 1, '2018-05-17', '08:15:00', 61, 1, 2, NULL, 562.45, 'цукцйук', '20185170815611'),
(328, 1, '2018-05-17', '08:00:00', 57, 1, 1, NULL, 156.14, 'Все хорошо идет', '20185170800571'),
(332, 1, '2018-05-17', '08:00:00', 60, 14, 3, NULL, 543, '32424szdasfass v', '201851708006014'),
(334, 1, '2018-05-21', '08:15:00', 58, 3, 3, NULL, 334, 'sfsdfsdz', '20185210815583'),
(335, 3, '2018-05-21', '13:45:00', 56, 3, 4, NULL, 32, '23423424', '20185211345563'),
(337, 3, '2018-05-21', '08:00:00', 4, 3, 3, NULL, 590.45, 'Забрать карточку', '2018521080043'),
(339, 1, '2018-05-18', '08:00:00', 62, 14, 3, NULL, 456, '334525345564', '201851808006214'),
(341, 1, '2018-05-18', '08:15:00', 62, 1, 2, NULL, 345, '34534534dfgdfgfgfsdfgfsdg', '20185180815621'),
(343, 1, '2018-05-18', '08:30:00', 62, 14, 1, NULL, 74, 'regsgfgdfgsfg', '201851808306214'),
(345, 1, '2018-05-18', '08:45:00', 62, 10, 2, NULL, 76, 'adsdfsfsdf', '201851808456210'),
(347, 1, '2018-05-21', '08:00:00', 62, 3, 4, NULL, 456, '111111111', '20185210800623'),
(349, 1, '2018-05-18', '08:15:00', 58, 3, 2, NULL, 53, '34535', '20185180815583'),
(351, 1, '2018-05-18', '08:30:00', 61, 14, 2, NULL, 54, '34535', '201851808306114'),
(353, 1, '2018-05-18', '08:45:00', 61, 1, 1, NULL, 344, '3454235345', '20185180845611'),
(355, 1, '2018-05-18', '08:00:00', 59, 3, 2, NULL, 68, '657568', '20185180800593'),
(357, 1, '2018-05-18', '08:00:00', 57, 3, 1, NULL, 34, '3453543245', '20185180800573'),
(359, 1, '2018-05-18', '08:15:00', 57, 3, 1, NULL, 3, '345345', '20185180815573'),
(361, 1, '2018-05-19', '13:45:00', 61, 11, 2, NULL, 23, '2342', '201851913456111'),
(363, 1, '2018-05-19', '08:00:00', 56, 3, 3, NULL, 2222, 'Хорошо', '20185190800563'),
(364, 1, '2018-05-21', '08:00:00', 57, 3, 4, NULL, 888, 'fsdgsdg', '20185210800573'),
(365, 1, '2018-05-21', '13:15:00', 56, 11, 3, NULL, 123, 'Все идет хорошо', '20185211315563'),
(375, 3, '2018-05-25', '08:00:00', 4, 3, 3, NULL, 256.45, 'Позвонить за 10 минут до приема', '2018525080043'),
(379, 5, '2018-05-22', '08:00:00', 4, 14, 1, NULL, 0, 'ert', '20185220800414'),
(381, 5, '2018-05-21', '10:00:00', 4, 3, 2, NULL, 12, '12312', '2018521100043'),
(382, 3, '2018-05-22', '12:00:00', 4, 3, 2, NULL, 154, '2564546', '2018522120043'),
(383, 5, '2018-05-24', '08:00:00', 4, 3, 1, NULL, 132, 'ГУууууд', '2018524080043');

-- --------------------------------------------------------

--
-- Структура таблицы `socilaStatus`
--

CREATE TABLE IF NOT EXISTS `socilaStatus` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `socilaStatus`
--

INSERT INTO `socilaStatus` (`id`, `title`, `status`) VALUES
(1, 'Служащий', 1),
(2, 'Рабочий', 1),
(3, 'Студент', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `specialities`
--

CREATE TABLE IF NOT EXISTS `specialities` (
  `id_special` int(11) NOT NULL,
  `title` varchar(70) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `specialities`
--

INSERT INTO `specialities` (`id_special`, `title`, `status`) VALUES
(1, 'Терапевт', 1),
(3, 'Уролог\r\n', 1),
(5, 'Лор', 1),
(7, 'Инфекционист', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `university`
--

INSERT INTO `university` (`id`, `title`, `status`) VALUES
(1, 'Кемеровский технологический институт пищевой промышленности', 1),
(2, 'Кемеровский государственный университет', 1),
(3, 'Кузбасский государственный технический университет им. Т.Ф. Горбачева', 1),
(4, 'Российский экономический университет им. Г.В. Плеханова — филиал в г. Кемерово', 1),
(5, 'Кемеровский государственный институт культуры', 1),
(6, 'Кемеровский государственный медицинский университет', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(10) unsigned NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_type`
--

INSERT INTO `user_type` (`id`, `type`) VALUES
(1, 'patient'),
(2, 'doctor'),
(3, 'operator'),
(4, 'heads-doctor');

-- --------------------------------------------------------

--
-- Структура таблицы `uslugi`
--

CREATE TABLE IF NOT EXISTS `uslugi` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'Состояние услуги'
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
-- Индексы таблицы `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `myGo`
--
ALTER TABLE `myGo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `passport` (`passport`),
  ADD UNIQUE KEY `eniq` (`police_number`);

--
-- Индексы таблицы `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_pacient`),
  ADD UNIQUE KEY `uniquePassport` (`passport_num`),
  ADD UNIQUE KEY `uniqueCardNum` (`patient_card_num`);

--
-- Индексы таблицы `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`),
  ADD UNIQUE KEY `uniqueArticul` (`articul`);

--
-- Индексы таблицы `socilaStatus`
--
ALTER TABLE `socilaStatus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id_special`);

--
-- Индексы таблицы `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор страны',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор ',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `history_visit`
--
ALTER TABLE `history_visit`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор ';
--
-- AUTO_INCREMENT для таблицы `insurance`
--
ALTER TABLE `insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `myGo`
--
ALTER TABLE `myGo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT для таблицы `patient`
--
ALTER TABLE `patient`
  MODIFY `id_pacient` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор ',AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=385;
--
-- AUTO_INCREMENT для таблицы `socilaStatus`
--
ALTER TABLE `socilaStatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id_special` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `university`
--
ALTER TABLE `university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `uslugi`
--
ALTER TABLE `uslugi`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
