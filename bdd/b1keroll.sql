-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2023 a las 14:06:22
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `b1keroll`
--
CREATE DATABASE IF NOT EXISTS `b1keroll` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `b1keroll`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insurances`
--

CREATE TABLE `insurances` (
  `id` int(10) UNSIGNED NOT NULL,
  `cif` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `price_per_race` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `insurances`
--

INSERT INTO `insurances` (`id`, `cif`, `name`, `address`, `price_per_race`, `active`, `created_at`, `updated_at`) VALUES
(7, '08915', 'Liberty Seguros', 'Seguros de la Libertad', 24, 1, '2023-03-10 08:03:28', '2023-03-10 08:03:28'),
(8, '08917', 'Repsol Seguros', 'Seguros de Repsol', 20, 1, '2023-03-10 08:03:28', '2023-03-10 08:03:28'),
(9, '08918', 'Mapfre Seguros', 'Seguros de Mapfre', 28, 1, '2023-03-10 08:03:28', '2023-03-10 08:03:28'),
(10, '154263', 'Seguros Axa', 'Calle Fontaneda, SN', 14, 1, '2023-04-07 09:55:35', '2023-04-07 09:55:35'),
(11, '12546', 'Seguros Reale', 'Avenida Concordia, 4', 24, 1, '2023-04-07 09:56:04', '2023-04-07 09:56:04'),
(12, '4515', 'Seguros Ocaso', 'Calle San Juan', 25, 1, '2023-04-07 09:56:21', '2023-04-07 09:56:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_10_12_000003_create_races_table', 1),
(4, '2022_10_12_000004_create_insurances_table', 1),
(5, '2022_10_12_000005_create_sponsors_table', 1),
(6, '2022_10_13_000007_create_sponsored_table', 1),
(7, '2022_10_13_000008_create_race_insurance_table', 1),
(8, '2022_10_13_000009_create_photos_race_table', 1),
(9, '2022_10_13_000010_create_runner_number_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photos_race`
--

CREATE TABLE `photos_race` (
  `id` int(10) UNSIGNED NOT NULL,
  `race_id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `races`
--

CREATE TABLE `races` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `unevenness` varchar(255) NOT NULL,
  `map_frame` varchar(1000) NOT NULL,
  `number_of_competitors` int(11) NOT NULL,
  `length` double(8,2) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `start_point` varchar(255) NOT NULL,
  `promotional_poster` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `races`
--

INSERT INTO `races` (`id`, `name`, `description`, `unevenness`, `map_frame`, `number_of_competitors`, `length`, `start_date`, `start_time`, `start_point`, `promotional_poster`, `price`, `active`, `created_at`, `updated_at`) VALUES
(7, 'Holy Run', 'Carrera de la HolyRun', '3', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d11957.113888086778!2d2.205203891325467!3d41.476562144809336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e1!4m3!3m2!1d41.4789396!2d2.1930018!4m3!3m2!1d41.469293199999996!2d2.2330848!5e0!3m2!1sca!2ses!4v1678439834234!5m2!1sca!2ses', 51, 5.00, '2023-05-03', '08:00:00', 'Plaça de la Vila', 'image/races/GOXdKogYbwsbeTfGO3R7GScUIJUMbigIX8OuOUia.jpg', 23.00, 1, '2023-03-10 08:03:28', '2023-03-10 08:17:34'),
(8, 'Cursa Bimbo', 'Carrera de la Bimbo', '5', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d11957.113888086778!2d2.205203891325467!3d41.476562144809336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e1!4m3!3m2!1d41.4789396!2d2.1930018!4m3!3m2!1d41.469293199999996!2d2.2330848!5e0!3m2!1sca!2ses!4v1678439834234!5m2!1sca!2ses', 23, 5.00, '2023-04-23', '09:00:00', 'Plaça de les Olives', 'image/races/SIAHCGqAXZlBfXWOARVGkfT4bibxgD8FPHx5UPYF.png', 20.00, 1, '2023-03-10 08:03:28', '2023-03-10 08:17:46'),
(9, 'Automobile Park Run', 'Carrera del Automobile Park Run', '13', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d11957.113888086778!2d2.205203891325467!3d41.476562144809336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e1!4m3!3m2!1d41.4789396!2d2.1930018!4m3!3m2!1d41.469293199999996!2d2.2330848!5e0!3m2!1sca!2ses!4v1678439834234!5m2!1sca!2ses', 91, 5.00, '2024-05-03', '07:00:00', 'Plaça del Diamant', 'image/races/35R945hg1PmOeLhZU5feKF3g40ndusEqO2U9pEMe.png', 57.00, 1, '2023-03-10 08:03:28', '2023-03-10 08:17:56'),
(10, 'Citroën', 'Desde 1919, la marca Citroën ha mostrado audacia y un punto de vista humano inquebrantable. Tiene más de 100 años de patrimonio y más de 300 modelos, algunos de los cuales han pasado a la historia. Te invitamos a adentrarte en esta historia épica que comenzó con el genio visionario de André Citroën.', '24', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d23923.744407105387!2d2.1945510192620463!3d41.45076273894547!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e1!4m3!3m2!1d41.441012099999995!2d2.222839!4m3!3m2!1d41.4646858!2d2.2049811!5e0!3m2!1sca!2ses!4v1680073279407!5m2!1sca!2ses', 12, 5.40, '2023-03-07', '10:00:00', 'Carretera de les Aigües', 'image/races/tN98DgcVBjWCL8Nq3kjbX6twF837WAOtJ05rCTFb.png', 12.00, 1, '2023-03-29 05:02:43', '2023-03-29 05:32:16'),
(11, 'Hyundai', 'Hyundai Motor Company es el mayor fabricante surcoreano de automóviles. Su sede principal está en la prefectura de Yangjae-Dong en la ciudad de Seocho-Gu en Seúl. Es el sexto fabricante de automóviles más grande del mundo.', '12', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d47841.03686756129!2d2.1710909983589417!3d41.45950976456693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e1!4m3!3m2!1d41.441012099999995!2d2.222839!4m3!3m2!1d41.481992!2d2.2100492!5e0!3m2!1sca!2ses!4v1680074755360!5m2!1sca!2ses', 34, 14.60, '2023-04-30', '09:00:00', 'Carrer dels Mil Dimonis', 'image/races/WKrh0xrKE4cdlTYoLmNMQ8iJuhZ4r2ZGcPd6RK9B.svg', 23.00, 1, '2023-03-29 05:29:04', '2023-03-29 05:29:04'),
(12, 'La Marató', 'Cursa de TV3 destinada a la recaudación para poder ayudar a los más necesitados', '25', 'https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d23920.47787243618!2d2.226076169282727!3d41.4596197345024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e1!4m3!3m2!1d41.4447196!2d2.2384512!4m5!1s0x12a4bba4debcca15%3A0xf1fed24e4fa55e3f!2sPitch%20and%20Putt%20Badalona!3m2!1d41.47459!2d2.24527!5e0!3m2!1sca!2ses!4v1680868983932!5m2!1sca!2ses', 34, 26.00, '2023-04-20', '08:00:00', 'Centre', 'image/races/Ta832uupbkTBgKakw7uNdd251yRtaLcG7K2vDKr8.jpg', 10.00, 1, '2023-04-07 10:03:46', '2023-04-07 10:03:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `race_insurance`
--

CREATE TABLE `race_insurance` (
  `id` int(10) UNSIGNED NOT NULL,
  `insurance_id` int(10) UNSIGNED NOT NULL,
  `race_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `runner_number`
--

CREATE TABLE `runner_number` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `race_id` int(10) UNSIGNED NOT NULL,
  `insurance_id` int(10) UNSIGNED NOT NULL,
  `runner_number` int(11) DEFAULT NULL,
  `elapsed_time` time DEFAULT NULL,
  `is_paid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sponsored`
--

CREATE TABLE `sponsored` (
  `id` int(10) UNSIGNED NOT NULL,
  `sponsor_id` int(10) UNSIGNED NOT NULL,
  `race_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(10) UNSIGNED NOT NULL,
  `cif` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `main_plain` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sponsors`
--

INSERT INTO `sponsors` (`id`, `cif`, `name`, `logo`, `address`, `main_plain`, `active`, `created_at`, `updated_at`) VALUES
(10, '741852963', 'Mini España', 'image/sponsors/GA4cKfVtR8sCRcZBnoy624REN1G05LLxgH0gc4NQ.png', 'Calle de los Coches Pequeños', 1, 1, '2023-03-10 08:03:28', '2023-04-07 09:57:40'),
(11, '7471852963', 'Hyundai España', 'image/sponsors/I42g12594dznOXkZLLO5nC46xi5vzs6Mqz9XiMF1.svg', 'Calle de los Coches Coreanos', 1, 1, '2023-03-10 08:03:28', '2023-04-07 09:58:09'),
(12, '7417362963', 'Bimbo Ibérica', 'image/sponsors/YDg1YM2rgXMLMzep1lacxgBqtMsQJDsafMuHfBq0.png', 'Calle del buen pan', 1, 1, '2023-03-10 08:03:28', '2023-04-07 09:58:20'),
(13, '154663', 'Bergamont SP', 'image/sponsors/KxSwcnZBbG9sJGFtxi1FyiGWzVCSlU2lTxrEW3O0.png', 'Calle Arbustos', 0, 1, '2023-04-07 09:57:21', '2023-04-07 09:57:21'),
(14, '5142', 'Citroën SP', 'image/sponsors/idxD3wA0PblASSVP41KnKosarbWCrEZBpdHcZcE9.png', 'Calle Alhambra', 1, 1, '2023-04-07 09:58:47', '2023-04-07 09:58:47'),
(15, '741852', 'BridgeStone Ibérica', 'image/sponsors/t4drCQsvbZqnvOaIxG11FtGMWZrWe90UpKtWZoDr.png', 'Calle de los rodillos', 1, 1, '2023-04-07 09:59:34', '2023-04-07 09:59:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `dni` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `birth_date` date NOT NULL,
  `skill` varchar(255) NOT NULL,
  `federate_number` varchar(255) DEFAULT NULL,
  `insurance` tinyint(1) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `dni`, `name`, `sex`, `age`, `address`, `role`, `birth_date`, `skill`, `federate_number`, `insurance`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `email_verified_at`) VALUES
(28, '1234', 'admin', 'male', 21, 'admin', 1, '2002-01-01', 'open', NULL, NULL, 'admin@gmail.com', '$2y$10$v6xNqqhb1jcW5rXdqVItxeBEcNsjmSh6QsEVNzx4DHKp4jW5mTaCS', NULL, '2023-03-10 08:13:17', '2023-03-10 08:13:17', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `insurances_cif_unique` (`cif`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `photos_race`
--
ALTER TABLE `photos_race`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_race_race_id_foreign` (`race_id`);

--
-- Indices de la tabla `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `race_insurance`
--
ALTER TABLE `race_insurance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `race_insurance_insurance_id_foreign` (`insurance_id`),
  ADD KEY `race_insurance_race_id_foreign` (`race_id`);

--
-- Indices de la tabla `runner_number`
--
ALTER TABLE `runner_number`
  ADD PRIMARY KEY (`id`),
  ADD KEY `runner_number_user_id_foreign` (`user_id`),
  ADD KEY `runner_number_race_id_foreign` (`race_id`),
  ADD KEY `runner_number_insurance_id_foreign` (`insurance_id`);

--
-- Indices de la tabla `sponsored`
--
ALTER TABLE `sponsored`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sponsored_sponsor_id_foreign` (`sponsor_id`),
  ADD KEY `sponsored_race_id_foreign` (`race_id`);

--
-- Indices de la tabla `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sponsors_cif_unique` (`cif`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_dni_unique` (`dni`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `insurances`
--
ALTER TABLE `insurances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `photos_race`
--
ALTER TABLE `photos_race`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `races`
--
ALTER TABLE `races`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `race_insurance`
--
ALTER TABLE `race_insurance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `runner_number`
--
ALTER TABLE `runner_number`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sponsored`
--
ALTER TABLE `sponsored`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `photos_race`
--
ALTER TABLE `photos_race`
  ADD CONSTRAINT `photos_race_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`);

--
-- Filtros para la tabla `race_insurance`
--
ALTER TABLE `race_insurance`
  ADD CONSTRAINT `race_insurance_insurance_id_foreign` FOREIGN KEY (`insurance_id`) REFERENCES `insurances` (`id`),
  ADD CONSTRAINT `race_insurance_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`);

--
-- Filtros para la tabla `runner_number`
--
ALTER TABLE `runner_number`
  ADD CONSTRAINT `runner_number_insurance_id_foreign` FOREIGN KEY (`insurance_id`) REFERENCES `insurances` (`id`),
  ADD CONSTRAINT `runner_number_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`),
  ADD CONSTRAINT `runner_number_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `sponsored`
--
ALTER TABLE `sponsored`
  ADD CONSTRAINT `sponsored_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`),
  ADD CONSTRAINT `sponsored_sponsor_id_foreign` FOREIGN KEY (`sponsor_id`) REFERENCES `sponsors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
