-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 13 2019 г., 11:03
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10


--
-- База данных: `new_savior_of_this_world`
--
CREATE DATABASE IF NOT EXISTS `new_savior_of_this_world` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `new_savior_of_this_world`;

-- --------------------------------------------------------

--
-- Структура таблицы `employeekonts`
--
-- Создание: Май 02 2019 г., 19:25
--

DROP TABLE IF EXISTS `employeekonts`;
CREATE TABLE `employeekonts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `corp_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pers_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corp_number` bigint(20) UNSIGNED DEFAULT NULL,
  `pers_number` bigint(20) UNSIGNED DEFAULT NULL,
  `country` varchar(58) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(167) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(146) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house` varchar(146) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- ССЫЛКИ ТАБЛИЦЫ `employeekonts`:
--   `employee_id`
--       `employees` -> `id`
--

--
-- Дамп данных таблицы `employeekonts`
--

INSERT INTO `employeekonts` (`id`, `employee_id`, `corp_email`, `pers_email`, `corp_number`, `pers_number`, `country`, `city`, `street`, `house`, `apartment`) VALUES
(2, 13, 'example@work.mail.com', 'mail@mail.com', 22811488666, 1234567890, 'Russia', 'Чугуевка', 'Кровавого Пастора', '14/88', 1),
(3, 19, 'admin@admin.loc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 20, 'some@email.loc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 21, 'fuckin@bugs.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 22, 'ldgzx@xduow.glf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 22, 'ldgzx@xduow.glf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `employeeorgs`
--
-- Создание: Май 02 2019 г., 17:23
-- Последнее обновление: Май 13 2019 г., 07:47
--

DROP TABLE IF EXISTS `employeeorgs`;
CREATE TABLE `employeeorgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `sex` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `passport` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- ССЫЛКИ ТАБЛИЦЫ `employeeorgs`:
--   `employee_id`
--       `employees` -> `id`
--

--
-- Дамп данных таблицы `employeeorgs`
--

INSERT INTO `employeeorgs` (`id`, `employee_id`, `sex`, `birth`, `passport`, `organization`, `position`) VALUES
(1, 13, 'male', '2019-05-17', 'ен 2281488', 'JmihAirlines', 'лётчик испытатель'),
(2, 19, NULL, NULL, NULL, NULL, NULL),
(3, 20, NULL, NULL, NULL, NULL, NULL),
(4, 21, NULL, NULL, NULL, NULL, NULL),
(5, 22, NULL, NULL, NULL, NULL, NULL),
(6, 22, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--
-- Создание: Май 05 2019 г., 04:33
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `roles` enum('worker','manager','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'worker',
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patronymic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `head_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `employees`:
--   `user_id`
--       `users` -> `id`
--

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `roles`, `first_name`, `last_name`, `patronymic`, `head_id`) VALUES
(13, 39, 'admin', 'Валера', 'Валерьев', 'Олегович', NULL),
(19, 38, 'worker', 'Владик', 'Оладик', 'Отчество', 13),
(20, 40, 'worker', 'Иван', 'Иванов', 'Ноне', 13),
(21, 41, 'manager', 'Иван', 'Тестович', 'Ноне', 13),
(22, 42, 'worker', 'Вячеслав', 'Украинцев', 'Жмышкович', 21),
(23, 42, 'worker', 'Вячеслав', 'Украинцев', 'Жмышкович', 21);

-- --------------------------------------------------------

--
-- Структура таблицы `grouped`
--
-- Создание: Май 10 2019 г., 09:01
--

DROP TABLE IF EXISTS `grouped`;
CREATE TABLE `grouped` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `grouped`:
--   `employee_id`
--       `employees` -> `id`
--   `group_id`
--       `groups` -> `id`
--

--
-- Дамп данных таблицы `grouped`
--

INSERT INTO `grouped` (`id`, `employee_id`, `group_id`) VALUES
(33, 19, 17),
(34, 20, 17),
(35, 21, 17),
(36, 19, 18),
(37, 20, 18),
(38, 20, 19),
(39, 21, 19),
(40, 19, 20),
(41, 21, 20),
(42, 22, 21),
(43, 23, 21);

-- --------------------------------------------------------

--
-- Структура таблицы `groupresults`
--
-- Создание: Май 12 2019 г., 09:30
--

DROP TABLE IF EXISTS `groupresults`;
CREATE TABLE `groupresults` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `head_id` bigint(20) UNSIGNED NOT NULL,
  `done_tasks` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `failed_tasks` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `process_tasks` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `avarage_mark` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- ССЫЛКИ ТАБЛИЦЫ `groupresults`:
--   `head_id`
--       `groups` -> `head_id`
--

--
-- Дамп данных таблицы `groupresults`
--

INSERT INTO `groupresults` (`id`, `group_id`, `head_id`, `done_tasks`, `failed_tasks`, `process_tasks`, `avarage_mark`) VALUES
(1, 17, 13, 0, 0, 0, 0),
(2, 18, 13, 0, 0, 0, 0),
(3, 19, 13, 0, 0, 0, 0),
(4, 20, 13, 0, 0, 0, 0),
(5, 21, 21, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--
-- Создание: Май 09 2019 г., 11:47
-- Последнее обновление: Май 13 2019 г., 07:52
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `head_id` bigint(20) UNSIGNED NOT NULL,
  `groupname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `groups`:
--   `head_id`
--       `employees` -> `head_id`
--

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `head_id`, `groupname`) VALUES
(17, 13, 'mygroup'),
(18, 13, 'group1'),
(19, 13, 'group2'),
(20, 13, 'group3'),
(21, 21, 'group5');

-- --------------------------------------------------------

--
-- Структура таблицы `persresults`
--
-- Создание: Май 12 2019 г., 07:53
-- Последнее обновление: Май 12 2019 г., 08:56
--

DROP TABLE IF EXISTS `persresults`;
CREATE TABLE `persresults` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `done_tasks` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `failed_tasks` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `process_tasks` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `avarage_mark` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- ССЫЛКИ ТАБЛИЦЫ `persresults`:
--   `employee_id`
--       `employees` -> `id`
--

--
-- Дамп данных таблицы `persresults`
--

INSERT INTO `persresults` (`id`, `employee_id`, `done_tasks`, `failed_tasks`, `process_tasks`, `avarage_mark`) VALUES
(3, 22, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--
-- Создание: Май 11 2019 г., 09:03
-- Последнее обновление: Май 12 2019 г., 09:37
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_id` bigint(20) UNSIGNED NOT NULL,
  `deadline` timestamp NULL DEFAULT NULL,
  `priority` enum('extra','main','primary') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'primary',
  `status` enum('new','in_process','done','failed','rejected','remaking','checking') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `tags` json DEFAULT NULL,
  `done_at` timestamp NULL DEFAULT NULL,
  `mark` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `tasks`:
--   `manager_id`
--       `employees` -> `head_id`
--

--
-- Триггеры `tasks`
--
DROP TRIGGER IF EXISTS `fail_task`;
DELIMITER $$
CREATE TRIGGER `fail_task` BEFORE UPDATE ON `tasks` FOR EACH ROW BEGIN
           IF OLD.deadline < OLD.done_at OR OLD.deadline < NOW() THEN
           SET NEW.status='failed', NEW.mark = 0;
           END IF;
       END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `tasksemployess`
--
-- Создание: Май 10 2019 г., 09:01
-- Последнее обновление: Май 12 2019 г., 07:20
--

DROP TABLE IF EXISTS `tasksemployess`;
CREATE TABLE `tasksemployess` (
  `id` bigint(20) NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- ССЫЛКИ ТАБЛИЦЫ `tasksemployess`:
--   `employee_id`
--       `employees` -> `id`
--   `task_id`
--       `tasks` -> `id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasksgroups`
--
-- Создание: Май 10 2019 г., 09:00
--

DROP TABLE IF EXISTS `tasksgroups`;
CREATE TABLE `tasksgroups` (
  `id` bigint(20) NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- ССЫЛКИ ТАБЛИЦЫ `tasksgroups`:
--   `task_id`
--       `tasks` -> `id`
--   `group_id`
--       `groups` -> `id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Апр 21 2019 г., 13:02
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `users`:
--

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(38, 'admin', 'admin@admin.loc', '$2y$10$kF9zvroS6kl1eukWesrFnunBqtRHVdeg/FNPp1YwLU2qd0lGQgFim'),
(39, 'pepper', 'example@work.mail.com', '$2y$10$WmzB9I0mik1PNn5VMQ7tUuLkXsYDkzfkFf19Fr4hLNGbbM5oV2.Zm'),
(40, 'hero', 'some@email.loc', '$2y$10$a5laf8XovPzYjqEH3hrC9uBkeMxfQc4ueIyYHaH78wXQoFH.VwLVi'),
(41, 'slave2', 'fuckin@bugs.com', '$2y$10$J7hILTc8.xZQ3/3Ev8UhtufPMcx6nuZv0Doe.TpRfPxjzAH8MXIcK'),
(42, 'dlnaf', 'ldgzx@xduow.glf', '$2y$10$YF1ba331dXgek15wRVWWMe7OcBXvyIQv9CWVGdXEeXincpbuMKcI6'),
(43, 'ytkwg', 'vewhc@nhtsd.erf', '$2y$10$9uTbabnTo1f6baKfmNEx8Ogy8uPxgr0jMirXuYDGQUntkW8UsMFXu');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `employeekonts`
--
ALTER TABLE `employeekonts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_??onts_employee_id_index` (`employee_id`);

--
-- Индексы таблицы `employeeorgs`
--
ALTER TABLE `employeeorgs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee__orgs_passport_unique` (`passport`),
  ADD KEY `employee__orgs_employee_id_index` (`employee_id`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_user_id_index` (`user_id`),
  ADD KEY `employees_head_id_index` (`head_id`);

--
-- Индексы таблицы `grouped`
--
ALTER TABLE `grouped`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `employee_id` (`employee_id`) USING BTREE;

--
-- Индексы таблицы `groupresults`
--
ALTER TABLE `groupresults`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_results_group_id_index` (`group_id`),
  ADD KEY `group_results_head_id_index` (`head_id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_head_id_index` (`head_id`);

--
-- Индексы таблицы `persresults`
--
ALTER TABLE `persresults`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pers_results_employee_id_index` (`employee_id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_manager_id_index` (`manager_id`);

--
-- Индексы таблицы `tasksemployess`
--
ALTER TABLE `tasksemployess`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `task_id` (`task_id`);

--
-- Индексы таблицы `tasksgroups`
--
ALTER TABLE `tasksgroups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `employeekonts`
--
ALTER TABLE `employeekonts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `employeeorgs`
--
ALTER TABLE `employeeorgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `grouped`
--
ALTER TABLE `grouped`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `groupresults`
--
ALTER TABLE `groupresults`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `persresults`
--
ALTER TABLE `persresults`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `tasksemployess`
--
ALTER TABLE `tasksemployess`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT для таблицы `tasksgroups`
--
ALTER TABLE `tasksgroups`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `employeekonts`
--
ALTER TABLE `employeekonts`
  ADD CONSTRAINT `employeekonts_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Ограничения внешнего ключа таблицы `employeeorgs`
--
ALTER TABLE `employeeorgs`
  ADD CONSTRAINT `employee__orgs_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `grouped`
--
ALTER TABLE `grouped`
  ADD CONSTRAINT `grouped_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `grouped_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Ограничения внешнего ключа таблицы `groupresults`
--
ALTER TABLE `groupresults`
  ADD CONSTRAINT `group_results_head_id_foreign` FOREIGN KEY (`head_id`) REFERENCES `groups` (`head_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_head_id_foreign` FOREIGN KEY (`head_id`) REFERENCES `employees` (`head_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `persresults`
--
ALTER TABLE `persresults`
  ADD CONSTRAINT `pers_results_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `employees` (`head_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tasksemployess`
--
ALTER TABLE `tasksemployess`
  ADD CONSTRAINT `tasksemployess_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `tasksemployess_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`);

--
-- Ограничения внешнего ключа таблицы `tasksgroups`
--
ALTER TABLE `tasksgroups`
  ADD CONSTRAINT `tasksgroups_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `tasksgroups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);


--
-- Метаданные
--
USE `phpmyadmin`;

--
-- Метаданные для таблицы employeekonts
--

--
-- Метаданные для таблицы employeeorgs
--

--
-- Дамп данных таблицы `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('mysql', 'new_savior_of_this_world', 'employeeorgs', '{\"CREATE_TIME\":\"2019-05-02 20:23:52\",\"col_order\":[0,1,2,3,4,5,6],\"col_visib\":[1,1,1,1,1,1,1]}', '2019-05-03 07:00:41');

--
-- Метаданные для таблицы employees
--

--
-- Дамп данных таблицы `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('mysql', 'new_savior_of_this_world', 'employees', '{\"CREATE_TIME\":\"2019-05-05 07:33:24\",\"col_order\":[0,1,2,3,4,5,6],\"col_visib\":[1,1,1,1,1,1,1],\"sorted_col\":\"`employees`.`id`  DESC\"}', '2019-05-11 12:07:15');

--
-- Метаданные для таблицы grouped
--

--
-- Метаданные для таблицы groupresults
--

--
-- Метаданные для таблицы groups
--

--
-- Метаданные для таблицы persresults
--

--
-- Метаданные для таблицы tasks
--

--
-- Метаданные для таблицы tasksemployess
--

--
-- Метаданные для таблицы tasksgroups
--

--
-- Метаданные для таблицы users
--

--
-- Метаданные для базы данных new_savior_of_this_world
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
