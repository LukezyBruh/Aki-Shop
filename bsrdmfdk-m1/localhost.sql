-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 20 2023 г., 02:28
-- Версия сервера: 5.7.24-0ubuntu0.16.04.1
-- Версия PHP: 7.1.24-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `localhost`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'Мужчинам'),
(2, 'Женщинам');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `user_id`, `number`, `count`, `status`, `reason`, `created_at`, `updated_at`) VALUES
(2, 0, 8, 1634464455, 4, 'Подтверждённый', NULL, '2023-11-10 11:26:10', '2023-11-10 11:26:10'),
(6, 0, 8, 1688362075, 3, 'новый', NULL, '2023-11-10 15:55:32', '2023-11-10 15:55:32');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `model` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `path` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `country`, `year`, `model`, `category`, `count`, `path`, `created_at`) VALUES
(1, '\"Человек-Бензопила\" том 1', 600, 'Япония', 2018, 'Манга', 'Комиксы', 100, 'images/tom1.png', '2023-11-07 10:43:41'),
(2, '\"Человек-Бензопила\" том 2', 600, 'Япония', 2018, 'Манга', 'Комиксы', 106, 'images/tom2.png', '2023-11-10 11:48:36'),
(3, 'Аки', 25500, 'Япония', 2022, 'Completed models', 'Коллекционирование', 99, 'images/figureaki.png', '2023-11-07 15:14:38'),
(4, 'Сатору Годжо', 14500, 'Япония', 2024, 'Completed models', 'Предзаказы', 100, 'images/gojo.jpg', '2023-11-10 11:52:52'),
(5, '\"Человек-Бензопила\" том 3\n', 600, 'Япония', 2018, 'Манга', 'Комиксы', 1, 'images/tom3.png', '2023-10-24 15:16:35'),
(6, '\"Человек-Бензопила\" том 4\r\n', 600, 'Япония', 2018, 'Манга', 'Комиксы', 1, 'images/tom4.jpg', '2023-10-24 15:16:30'),
(7, 'Стелла Промис', 13500, 'Япония', 2024, 'Completed models', 'Предзаказы', 1, 'images/figure2.jpg', '2023-10-24 15:16:27'),
(8, 'Хошино Руби', 15500, 'Япония', 2023, 'Completed models', 'Коллекционирование', 1, 'images/ruby.jpg', '2023-10-24 15:16:22'),
(9, 'Хатсунэ Мику', 4800, 'Япония', 2024, 'Nendoroid ', 'Предзаказы', 8, 'images/miky.jpg', '2023-11-07 10:37:11'),
(10, 'Макима', 2100, 'Japan', 2023, 'Game Prize', 'Коллекционирование', 1, 'images/makima.jpg', '2023-10-24 15:16:12'),
(11, 'Куруми', 2300, 'Япония', 2020, 'Game Prize', 'Коллекционирование', 98, 'images/kurumi.webp', '2023-11-10 15:55:30'),
(13, 'Геральт', 5500, 'Китай', 2019, 'Nendoroid', 'Коллекционирование', 100, 'images/geralt.jpg', '2023-11-10 15:27:14'),
(15, 'Моника', 5600, 'Япония', 2023, 'Pop Up Parade', 'Коллекционирование', 100, 'images/monika.jpg', '2023-11-10 15:22:07'),
(16, 'Леви', 7200, 'Япония', 2015, 'Pop Up Parade', 'Коллекционирование', 100, 'images/figure_levi.jpg', '2023-11-10 15:30:03'),
(17, 'Питу', 3100, 'Япония', 2023, 'Pop Up Parade', 'Коллекционирование', 100, 'images/pity.jpg', '2023-11-10 15:14:33'),
(19, 'Хатсунэ Мику Черлидер', 6300, 'Япония', 2020, 'Pop Up Parade', 'Коллекционирование', 100, 'images/miky_sport.jpg', '2023-11-10 15:32:58'),
(21, 'Рюко Матой', 7900, 'Япония', 2024, 'Pop Up Parade', 'Предзаказ', 100, 'images/ryuko.jpg', '2023-11-10 15:18:16'),
(22, 'Гаур Гура', 9100, 'Япония', 2024, 'Pop Up Parade', 'Предзаказ', 99, 'images/Gawr_Gura.jpg', '2023-11-10 15:54:15');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `role`) VALUES
(1, 'Ад', 'мини', 'стратор', 'admin', '1@1', 'admin11', 'admin'),
(2, 'Ирина', 'Гуреева', 'Дмитриевна', 'irina', 'ir@a', 'irina1', 'client'),
(3, 'Игнат', 'игнатов', 'михайлович', 'iga12', 'iga12@yandex.ru', '123456', 'client'),
(5, 'Анастасия', 'Виденина', 'Алексеевна', 'nasta2', 'iga12@yandex.ru', '123456', 'client'),
(6, 'Анастасия', 'Виденина', 'Александровична', 'vetany', 'sddfsdf@yandex.ru', '123456', 'client'),
(7, 'варвр', 'врвар', 'вараврар', 'sdfsdf', 'maksim1@yandex.ru', '123456', 'client'),
(8, 'Пётор', 'Федульчев', 'Макарович', 'fedor', 'PetrVedula@mail.com', '$2y$10$XfAtlDNSj4r4xWoWDUMFSOyyEtKJCHb6z.xbVSb9lCSrPKUBtWFh6', 'admin'),
(9, 'Пупка', 'Залупка', 'Залупыш', 'zalypka', 'zalypka@yandex.ru', '$2y$10$s4PNXUwcox5mIJlzOgKsxO9La6cZGyMyljvkF07GOulb9fecEy9ye', 'client');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
