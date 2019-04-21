-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 21 2019 г., 16:12
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `work_pr`
--
CREATE DATABASE IF NOT EXISTS `work_pr` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `work_pr`;

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Структура таблицы `employee__orgs`
--

CREATE TABLE `employee__orgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `sex` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `passport` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `employee__orgs`:
--   `employee_id`
--       `employees` -> `id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `employee_сonts`
--

CREATE TABLE `employee_сonts` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `employee_сonts`:
--   `employee_id`
--       `tasks` -> `id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `head_id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `groups`:
--   `head_id`
--       `employees` -> `head_id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `group_results`
--

CREATE TABLE `group_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `head_id` bigint(20) UNSIGNED DEFAULT NULL,
  `done_tasks` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `intime_tasks` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `failed_tasks` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `process_tasks` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `rating` bigint(20) NOT NULL DEFAULT '0',
  `productivity` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `avarage_mark` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `group_results`:
--   `group_id`
--       `groups` -> `id`
--   `head_id`
--       `groups` -> `head_id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pers_results`
--

CREATE TABLE `pers_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `done_tasks` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `intime_tasks` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `failed_tasks` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `process_tasks` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `rating` bigint(20) NOT NULL DEFAULT '0',
  `productivity` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `avarage_mark` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `pers_results`:
--   `employee_id`
--       `employees` -> `id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `manager_id` bigint(20) UNSIGNED NOT NULL,
  `deadline` timestamp NULL DEFAULT NULL,
  `priority` enum('extra','main','primary') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'primary',
  `status` enum('new','in_process','done','failed','rejected','remaking') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `tags` json DEFAULT NULL,
  `done_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- ССЫЛКИ ТАБЛИЦЫ `tasks`:
--   `employee_id`
--       `employees` -> `id`
--   `group_id`
--       `groups` -> `id`
--   `manager_id`
--       `employees` -> `head_id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

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
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_user_id_index` (`user_id`),
  ADD KEY `employees_group_id_index` (`group_id`),
  ADD KEY `employees_head_id_index` (`head_id`);

--
-- Индексы таблицы `employee__orgs`
--
ALTER TABLE `employee__orgs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee__orgs_passport_unique` (`passport`),
  ADD KEY `employee__orgs_employee_id_index` (`employee_id`);

--
-- Индексы таблицы `employee_сonts`
--
ALTER TABLE `employee_сonts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_??onts_employee_id_index` (`employee_id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_head_id_index` (`head_id`);

--
-- Индексы таблицы `group_results`
--
ALTER TABLE `group_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_results_group_id_index` (`group_id`),
  ADD KEY `group_results_head_id_index` (`head_id`);

--
-- Индексы таблицы `pers_results`
--
ALTER TABLE `pers_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pers_results_employee_id_index` (`employee_id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_employee_id_index` (`employee_id`),
  ADD KEY `tasks_group_id_index` (`group_id`),
  ADD KEY `tasks_manager_id_index` (`manager_id`);

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
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `employee__orgs`
--
ALTER TABLE `employee__orgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `employee_сonts`
--
ALTER TABLE `employee_сonts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `group_results`
--
ALTER TABLE `group_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pers_results`
--
ALTER TABLE `pers_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `employee__orgs`
--
ALTER TABLE `employee__orgs`
  ADD CONSTRAINT `employee__orgs_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `employee_сonts`
--
ALTER TABLE `employee_сonts`
  ADD CONSTRAINT `employee_сonts_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `tasks` (`id`);

--
-- Ограничения внешнего ключа таблицы `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_head_id_foreign` FOREIGN KEY (`head_id`) REFERENCES `employees` (`head_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `group_results`
--
ALTER TABLE `group_results`
  ADD CONSTRAINT `group_results_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_results_head_id_foreign` FOREIGN KEY (`head_id`) REFERENCES `groups` (`head_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `pers_results`
--
ALTER TABLE `pers_results`
  ADD CONSTRAINT `pers_results_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `employees` (`head_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
