-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 09 2023 г., 22:23
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shogo_test_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pivot_product_param_variant`
--

CREATE TABLE `pivot_product_param_variant` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `param_variant_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `pivot_product_param_variant`
--

INSERT INTO `pivot_product_param_variant` (`id`, `product_id`, `param_variant_id`) VALUES
(1, 11, 5),
(2, 12, 6),
(3, 11, 1),
(4, 12, 2),
(5, 16, 4),
(6, 13, 3),
(7, 14, 3),
(8, 15, 3),
(9, 25, 2),
(10, 25, 4),
(11, 26, 8),
(12, 26, 10),
(13, 26, 4),
(14, 27, 8),
(15, 27, 10),
(16, 27, 5),
(17, 28, 8),
(18, 28, 9),
(19, 28, 4),
(20, 29, 2),
(21, 29, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `pivot_product_section_param_name`
--

CREATE TABLE `pivot_product_section_param_name` (
  `section_id` int UNSIGNED NOT NULL,
  `param_name_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `pivot_product_section_param_name`
--

INSERT INTO `pivot_product_section_param_name` (`section_id`, `param_name_id`) VALUES
(1, 1),
(1, 2),
(4, 3),
(4, 4),
(4, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int UNSIGNED NOT NULL,
  `position` int DEFAULT '0',
  `url` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `articul` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `currency_id` int UNSIGNED DEFAULT NULL,
  `price_old` decimal(10,2) NOT NULL,
  `notice` text,
  `content` text,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `position`, `url`, `name`, `articul`, `price`, `currency_id`, `price_old`, `notice`, `content`, `visible`) VALUES
(1, 5, '1.webp', 'product 1', 'H-LED50QBU7500', '100500.00', 1, '10050.00', '0', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1),
(2, 6, '2.webp', 'product 2', 'A-LED50QBU7500', '250.00', 1, '300.00', '0', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 1),
(3, 10, '3.jpg', 'product 3', 'B-LED50QBU7500', '999.00', 1, '1050.00', '1', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0),
(4, 8, '4.png', 'product 4', 'C-LED50QBU7500', '1500.00', 1, '2000.00', '0', 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.', 1),
(5, 3, '5.jpg', 'product 5', 'D-LED50QBU7500', '1700.00', 1, '5000.00', '0', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. ', 1),
(6, 1, '11.jpg', 'product 6', 'E-LED50QBU7500', '2000.00', 1, '1999.00', '0', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.', 1),
(7, 2, '7.png', 'product 7', 'F-LED50QBU7500', '2999.00', 1, '3000.00', '1', 'Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.', 0),
(8, 4, '12.jpg', 'product 8', 'G-LED50QBU7500', '4000.00', 1, '4500.00', '0', 'Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', 1),
(9, 7, '9.png', 'product 9', 'H-LED50QBU7500', '99.00', 1, '100.00', '0', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"', 1),
(10, 0, '13.png', 'product 10', 'I-LED50QBU7500', '599.00', 1, '600.00', '0', 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.', 1),
(11, 11, 'poco.jpg', 'Смартфон POCO С40 4/64GB Желтый', 'X38646', '8990.00', 1, '12990.00', '0', 'Большая диагональ дисплея, современный разъем для зарядки usb type-c, пластик тактильно напоминающий кожу, большая емкость аккумулятора, NFC на борту присутствует, можно увеличить память до 1Tb с помощью дополнительной карты.', 1),
(12, 12, 'redmi9a.png', 'Смартфон Xiaomi Redmi 9A 2/32GB Зеленый', 'X29238', '5490.00', 1, '8990.00', '0', 'Самый приемлемый вариант смартфона за небольшие деньги. Качественный экран удобная программная оболочка без особых излишеств. Крепкий пластик корпуса, удобное расположение кнопок корпуса.', 1),
(13, 13, 'renova.jpg', 'Стиральная машина Renova WS-30ET', 'Renova WS-30ET', '4690.00', 1, '6000.00', '0', 'Замечательный вариант для дачи. Лёгкая, мобильная, компактная. Ничего не рвёт, растягивает вещи немного, это да. Но на даче и вещи в основном для огорода, а не для выхода в свет. Конечно шёлк и парчу в ней не постираешь, а вот джинсы, футболки, постельное бельё, чтобы на себе не тащить в город постирать, очень даже зачёт!', 1),
(14, 0, 'indesit.jpg', 'Стиральная машина Indesit IWUB 4085', '869990629150', '17990.00', 1, '18990.00', '0', 'Известный бренд по привлекательной цене. Компактного размера. Хорошо отстирывает, не портит белье. Не прыгает от вибраций при отжиме. Есть режим экспресс- стирки.', 1),
(15, 4, 'weis.jpg', 'Стиральная машина Weissgauff WM 4947 DC Inverter Steam', 'WM 4947 DC Inverter Steam', '38990.00', 1, '40000.00', '0', 'Инверторный двигатель, вместительная, тихая. Красивая стиральная машина. В режиме отжима ведет себя тихо. Качество исполнения на высоте.', 1),
(16, 1, 'hoover.jpg', 'Стиральная машина Hoover AWMPD4 47LH3R-07', '31008638', '41190.00', 1, '42000.00', '0', 'Дизайн - пожалуй это самое главное достоинство и вживую она смотрится гораздо лучше, чем на фото. Управляется со смартфона (нужно будет скачать фирменное приложение, в инструкции всё подробно описано). Качество стирки великолепное.', 1),
(17, 0, 'canon.jpg', 'Цифровой фотоаппарат Canon Digital IXUS 185 Black', '1803C001', '24900.00', 1, '25000.00', '0', 'Популярный и хорошо знакомый бренд. Отличные технические характеристики, восьмикратный оптический зум и практически все современные функциональные возможности в сочетании с миниатюрными размерами и приятным дизайном камеры. Наличие режима автоматической настройки параметров съемки. Гарантия 2 года.', 1),
(18, 5, 'nikon.jpg', 'Цифровой фотоаппарат NIKON Coolpix B500 Black', 'VNA951E1', '29000.00', 1, '0.00', '0', 'Цифровой фотоаппарат NIKON Coolpix B500 Black выполнен достаточно оригинально и качественно. На улице фотографирует четко и ярко. Много функций, позволяющих изменить параметры съемки. Работает от батареек.', 1),
(19, 3, 'panasonic.jpg', 'Цифровой фотоаппарат Panasonic Lumix DMC-TZ80 silver', 'DMC-TZ80EE-S', '47990.00', 1, '0.00', '0', 'Для тех кто много путешествует и любит фотографировать здесь и сейчас очень рекомендую приобрести данную модель, так как получаете два в одном - хороший легкий, удобный фотоаппарат и видеокамеру для съемки очень неплохих фильмов в формате HD.', 1),
(20, 5, 'canon2.jpg', 'Цифровой фотоаппарат Canon PowerShot SX70 HS Black', '3071C002', '62990.00', 1, '0.00', '0', 'Отличный вариант для тех, кому недостаточно камеры смартфона, но еще лень носить с собой зеркалку и несколько объективов. Аппарат надежен, универсален и прост в эксплуатации. Уровень зума заслуживает отдельных похвал, он невероятен.', 1),
(21, 555, 'image/1', 'grgdgdfgdfgfdgfd', 'gfgdfgdfgdfgfdg', '5555.00', 1, '555.00', 'dgsdggsg', 'ggdgdgdsg', 1),
(23, 4444, 'gxfgfdgfgfdgfd', 'gxfgfdgfgfdgfd', 'dfgdgdfgfd', '444.00', 1, '444.00', '44444', '44444', 1),
(24, 55, 'test 2', 'test 2', 'test 2', '4444.00', 1, '5555.00', 'sdsdsds', 'dsdsdsdsd', 1),
(25, 5, 'test 3', 'test 3', 'sdsds', '5.00', 1, '5.00', '5555', '55555', 1),
(26, 6, 'test 4', 'test 4', 'ffdfdfdsf', '666.00', 1, '666.00', 'tyttytyty', 'ytytyty', 1),
(27, 5, 'test1(1).jpg', 'fgdfgdfgfd', 'dfgdfgfdg', '555.00', 1, '555.00', 'gggg', 'fsdfdfsdf', 1),
(28, 444, 'test4.png', 'test 7', 'test 77777', '444.00', 1, '444.00', '5454545', '444444', 1),
(29, 3, 'test2.png', 'test product', 'test product', '333.00', 1, '3334.00', 'dfdfdfd', 'erererer', 1),
(30, 3, 'purple.jpg', 'Фотокамера моментальной печати Fujifilm Instax Mini 11 Purple', '16654994', '10490.00', 1, '11000.00', 'test test', 'Мощная вспышка и автоматический расчет яркости фона позволяют камере автоматически устанавливать выдержку — никаких специальных настроек.', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_assignment`
--

CREATE TABLE `product_assignment` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `section_id` int UNSIGNED NOT NULL,
  `type_id` int UNSIGNED NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `product_assignment`
--

INSERT INTO `product_assignment` (`id`, `product_id`, `section_id`, `type_id`, `visible`) VALUES
(2, 1, 1, 2, 1),
(3, 11, 1, 3, 1),
(4, 12, 1, 3, 1),
(8, 13, 4, 4, 1),
(9, 14, 4, 5, 1),
(10, 15, 4, 6, 1),
(11, 16, 4, 3, 1),
(12, 17, 2, 5, 1),
(13, 18, 2, 5, 1),
(14, 19, 2, 4, 1),
(15, 20, 2, 6, 1),
(16, 25, 1, 6, 1),
(17, 26, 4, 4, 1),
(18, 27, 4, 5, 1),
(19, 28, 4, 2, 1),
(20, 29, 1, 2, 1),
(21, 30, 2, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_param_name`
--

CREATE TABLE `product_param_name` (
  `id` int UNSIGNED NOT NULL,
  `position` int DEFAULT '0',
  `visible` tinyint(1) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `english_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `product_param_name`
--

INSERT INTO `product_param_name` (`id`, `position`, `visible`, `name`, `english_name`) VALUES
(1, 1, 1, 'Водостойкий корпус', 'waterproof'),
(2, 2, 1, 'Цвет', 'color'),
(3, 3, 1, 'Максимальная загрузка белья', ''),
(4, 4, 1, 'Защита от протечек', '');

-- --------------------------------------------------------

--
-- Структура таблицы `product_param_variant`
--

CREATE TABLE `product_param_variant` (
  `id` int UNSIGNED NOT NULL,
  `param_id` int UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `position` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `product_param_variant`
--

INSERT INTO `product_param_variant` (`id`, `param_id`, `name`, `position`) VALUES
(1, 1, 'Да', 1),
(2, 1, 'Нет', 2),
(3, 2, 'Белый', 3),
(4, 2, 'Чёрный', 4),
(5, 2, 'Жёлтый', 5),
(6, 2, 'Зелёный', 5),
(7, 3, '5 кг', 6),
(8, 3, '6 кг', 7),
(9, 4, 'Есть', 8),
(10, 4, 'Нет', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `product_section`
--

CREATE TABLE `product_section` (
  `id` int UNSIGNED NOT NULL,
  `position` int DEFAULT '0',
  `url` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `notice` text,
  `visible` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `product_section`
--

INSERT INTO `product_section` (`id`, `position`, `url`, `name`, `notice`, `visible`) VALUES
(1, 5, 'sections/8.svg', 'Смартфоны', '0', 1),
(2, 2, 'sections/6.svg', 'Фотоаппараты', '0', 1),
(4, 1, 'sections/3.svg', 'Стиральные машины', '0', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_type`
--

CREATE TABLE `product_type` (
  `id` int UNSIGNED NOT NULL,
  `position` int DEFAULT '0',
  `url` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `notice` text,
  `visible` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `product_type`
--

INSERT INTO `product_type` (`id`, `position`, `url`, `name`, `notice`, `visible`) VALUES
(2, 1, 'type', 'новинка', '1', 1),
(3, 2, 'type', 'акция', '1', 1),
(4, 3, 'type', 'скидка', '1', 1),
(5, 4, 'type', 'хит', '1', 1),
(6, 5, 'type', 'уценка', '0', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE `User` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`id`, `name`, `email`, `password`) VALUES
(1, 'tester1', 'tester1@gmail.com', '123456'),
(2, 'tester2', 'tester2@gmail.com', '123456'),
(3, 'tester3', 'tester3@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `view_table`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `view_table` (
`articul` varchar(255)
,`content` text
,`id` int unsigned
,`name` varchar(255)
,`position` int
,`price` decimal(10,2)
,`price_old` decimal(10,2)
,`section_name` varchar(255)
,`type_name` varchar(255)
,`url` varchar(255)
);

-- --------------------------------------------------------

--
-- Структура для представления `view_table`
--
DROP TABLE IF EXISTS `view_table`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_table`  AS SELECT `p`.`id` AS `id`, `p`.`position` AS `position`, `p`.`url` AS `url`, `p`.`name` AS `name`, `p`.`articul` AS `articul`, `p`.`price` AS `price`, `p`.`price_old` AS `price_old`, `p`.`content` AS `content`, `pt`.`name` AS `type_name`, `ps`.`name` AS `section_name` FROM (((`product` `p` join `product_assignment` `pa` on((`p`.`id` = `pa`.`product_id`))) join `product_section` `ps` on((`ps`.`id` = `pa`.`section_id`))) join `product_type` `pt` on((`pt`.`id` = `pa`.`type_id`)))  ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pivot_product_param_variant`
--
ALTER TABLE `pivot_product_param_variant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `pivot_product_param_variant_ibfk_1` (`param_variant_id`);

--
-- Индексы таблицы `pivot_product_section_param_name`
--
ALTER TABLE `pivot_product_section_param_name`
  ADD KEY `param_name_id` (`param_name_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `currency_id` (`currency_id`);

--
-- Индексы таблицы `product_assignment`
--
ALTER TABLE `product_assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `visible` (`visible`);

--
-- Индексы таблицы `product_param_name`
--
ALTER TABLE `product_param_name`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_param_variant`
--
ALTER TABLE `product_param_variant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `value` (`param_id`,`name`(64)),
  ADD KEY `param_id` (`param_id`);

--
-- Индексы таблицы `product_section`
--
ALTER TABLE `product_section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url` (`url`);

--
-- Индексы таблицы `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url` (`url`);

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pivot_product_param_variant`
--
ALTER TABLE `pivot_product_param_variant`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `product_assignment`
--
ALTER TABLE `product_assignment`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `product_param_name`
--
ALTER TABLE `product_param_name`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `product_param_variant`
--
ALTER TABLE `product_param_variant`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `product_section`
--
ALTER TABLE `product_section`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `pivot_product_param_variant`
--
ALTER TABLE `pivot_product_param_variant`
  ADD CONSTRAINT `pivot_product_param_variant_ibfk_1` FOREIGN KEY (`param_variant_id`) REFERENCES `product_param_variant` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `pivot_product_param_variant_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `pivot_product_section_param_name`
--
ALTER TABLE `pivot_product_section_param_name`
  ADD CONSTRAINT `pivot_product_section_param_name_ibfk_1` FOREIGN KEY (`param_name_id`) REFERENCES `product_param_name` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `pivot_product_section_param_name_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `product_section` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `product_assignment`
--
ALTER TABLE `product_assignment`
  ADD CONSTRAINT `product_assignment_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_assignment_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `product_section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_assignment_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `product_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_param_variant`
--
ALTER TABLE `product_param_variant`
  ADD CONSTRAINT `product_param_variant_ibfk_1` FOREIGN KEY (`param_id`) REFERENCES `product_param_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
