-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2023 a las 09:26:56
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
(1, '7412', 'Liberty Seguros', 'Seguros de la Libertad', 25, 1, '2023-04-28 04:26:08', '2023-04-28 04:26:08'),
(2, '78845', 'Repsol Seguros', 'Calle de la Gasolina', 14, 1, '2023-04-28 04:26:30', '2023-04-28 04:26:30'),
(3, '74152', 'Mapfre Seguros', 'Seguros de Mapfre', 23, 1, '2023-04-28 04:26:49', '2023-04-28 04:26:49'),
(4, '874562', 'Axa Seguros', 'Seguros de Axa', 15, 1, '2023-04-28 04:27:16', '2023-04-28 04:27:16'),
(5, '784512', 'Seguros Ocaso', 'Seguros del Ocaso', 14, 1, '2023-04-28 04:27:30', '2023-04-28 04:27:30'),
(6, '741852', 'Seguros Reale', 'Seguros de Reale', 47, 1, '2023-04-28 04:27:44', '2023-04-28 04:27:44'),
(7, '123321', 'Olga', 'mi casa', 3000, 1, '2023-04-28 05:18:08', '2023-04-28 05:18:08');

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
(9, '2022_10_13_000010_create_runner_number_table', 1),
(10, '2023_04_26_205118_create_payments_table', 1),
(11, '2023_04_27_200203_create_transactions_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `description` varchar(255) NOT NULL,
  `unevenness` varchar(255) NOT NULL,
  `map_frame` varchar(1000) NOT NULL,
  `number_of_competitors` int(11) NOT NULL,
  `length` double(8,2) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `start_point` varchar(255) NOT NULL,
  `promotional_poster` varchar(255) NOT NULL,
  `sponsor_price` double(8,2) NOT NULL,
  `price` double(8,2) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `races`
--

INSERT INTO `races` (`id`, `name`, `description`, `unevenness`, `map_frame`, `number_of_competitors`, `length`, `start_date`, `start_time`, `start_point`, `promotional_poster`, `sponsor_price`, `price`, `active`, `created_at`, `updated_at`) VALUES
(1, 'HolyRun', 'Carrera de la Holy Run', 'uneveness/1/uneveness.png', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d23918.981762077085!2d2.2150522614504666!3d41.46367582267532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e1!4m3!3m2!1d41.449823699999996!2d2.2332742999999997!4m3!3m2!1d41.4804908!2d2.2278621999999997!5e0!3m2!1sca!2ses!4v1682662476200!5m2!1sca!2ses', 24, 5.00, '2023-05-28', '08:15:00', 'Carrer Balmes', 'image/races/ML2g1YWSNZITH8TzXtJXIbnOO2XiXO60avbI2bbo.jpg', 4.00, 23.00, 1, '2023-04-28 04:16:33', '2023-04-28 05:17:19'),
(2, 'Cursa Bimbo', 'Cursa de la Bimbo', 'uneveness/2/uneveness.png', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d23918.981762077085!2d2.2150522614504666!3d41.46367582267532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e1!4m3!3m2!1d41.449823699999996!2d2.2332742999999997!4m3!3m2!1d41.4804908!2d2.2278621999999997!5e0!3m2!1sca!2ses!4v1682662476200!5m2!1sca!2ses', 12, 6.00, '2023-05-24', '10:25:00', 'Carrer de la Vila', 'image/races/mkVypTrs6M9V3FPTrMYGn3sMdPmiFaE7WMdWAms7.png', 6.00, 12.00, 1, '2023-04-28 04:17:31', '2023-04-28 04:17:31'),
(3, 'Automobile Park Run', 'Cursa del Salón del Automóvil', 'uneveness/3/uneveness.png', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d23918.981762077085!2d2.2150522614504666!3d41.46367582267532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e1!4m3!3m2!1d41.449823699999996!2d2.2332742999999997!4m3!3m2!1d41.4804908!2d2.2278621999999997!5e0!3m2!1sca!2ses!4v1682662476200!5m2!1sca!2ses', 52, 12.00, '2023-05-13', '10:00:00', 'Torres Petronas', 'image/races/vaZjm11Oh3IG2XVTLlzie3XSVYCdx8vomaPh7lD4.png', 14.00, 26.00, 1, '2023-04-28 04:18:30', '2023-04-28 04:18:30'),
(4, 'Curse du Citroën', 'Cursa de la Citroën', 'uneveness/4/uneveness.png', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d23918.981762077085!2d2.2150522614504666!3d41.46367582267532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e1!4m3!3m2!1d41.449823699999996!2d2.2332742999999997!4m3!3m2!1d41.4804908!2d2.2278621999999997!5e0!3m2!1sca!2ses!4v1682662476200!5m2!1sca!2ses', 47, 25.00, '2023-04-14', '15:00:00', 'Carrer de la Concòrdia', 'image/races/8vlyGyI2lmHQyazjSScOVkJrCvrQ428vISzAUmg5.png', 14.00, 23.00, 1, '2023-04-28 04:19:31', '2023-04-28 04:19:31'),
(5, 'Hyundai España', 'Carrera de la Hyundai', 'uneveness/5/uneveness.png', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d23918.981762077085!2d2.2150522614504666!3d41.46367582267532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e1!4m3!3m2!1d41.449823699999996!2d2.2332742999999997!4m3!3m2!1d41.4804908!2d2.2278621999999997!5e0!3m2!1sca!2ses!4v1682662476200!5m2!1sca!2ses', 14, 69.00, '2023-04-29', '12:00:00', 'Carrer d\'Aragó', 'image/races/uxppFKG5YGvvcpr2d4TlKt4iZ7cXA5I3sutAwNpu.svg', 15.00, 20.00, 1, '2023-04-28 04:20:38', '2023-04-28 04:20:38'),
(6, 'La Marató', 'Carrera de La Marató de TV3', 'uneveness/6/uneveness.png', 'https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d23918.981762077085!2d2.2150522614504666!3d41.46367582267532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e1!4m3!3m2!1d41.449823699999996!2d2.2332742999999997!4m3!3m2!1d41.4804908!2d2.2278621999999997!5e0!3m2!1sca!2ses!4v1682662476200!5m2!1sca!2ses', 124, 25.00, '2023-05-01', '14:20:00', 'Carrer Prim', 'image/races/VestzpfK8iEp0aAWtTnMn5hepZdpFjbAu0QKkxya.jpg', 14.00, 25.00, 1, '2023-04-28 04:21:47', '2023-04-28 04:21:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `race_insurance`
--

CREATE TABLE `race_insurance` (
  `id` int(10) UNSIGNED NOT NULL,
  `insurance_id` int(10) UNSIGNED NOT NULL,
  `race_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `race_insurance`
--

INSERT INTO `race_insurance` (`id`, `insurance_id`, `race_id`) VALUES
(1, 1, 1),
(2, 4, 1),
(3, 2, 3),
(4, 6, 3),
(5, 1, 2),
(6, 2, 2),
(7, 3, 2),
(8, 4, 2),
(9, 5, 2),
(10, 6, 2),
(11, 1, 4),
(12, 2, 4),
(13, 3, 4),
(14, 4, 4),
(15, 5, 4),
(16, 2, 5),
(17, 3, 5),
(18, 4, 5),
(19, 5, 5),
(20, 1, 6),
(21, 2, 6),
(22, 3, 6),
(23, 4, 6),
(24, 2, 1),
(25, 7, 1);

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

--
-- Volcado de datos para la tabla `runner_number`
--

INSERT INTO `runner_number` (`id`, `user_id`, `race_id`, `insurance_id`, `runner_number`, `elapsed_time`, `is_paid`) VALUES
(1, 2, 5, 3, 1, '19:05:08', 1),
(2, 2, 6, 4, 1, NULL, 1),
(3, 3, 1, 7, 1, '23:06:58', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sponsored`
--

CREATE TABLE `sponsored` (
  `id` int(10) UNSIGNED NOT NULL,
  `sponsor_id` int(10) UNSIGNED NOT NULL,
  `race_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sponsored`
--

INSERT INTO `sponsored` (`id`, `sponsor_id`, `race_id`) VALUES
(1, 1, 2),
(2, 1, 4),
(3, 1, 5),
(4, 3, 3),
(5, 5, 1),
(6, 5, 2);

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
(1, '4154252', 'Hyundai', 'image/sponsors/o7A35gWwr5Tp1FBNrX2BMhhRY70IQcOFbTosRoc1.svg', 'Hyundai España como Sponsor', 1, 1, '2023-04-28 04:22:35', '2023-04-28 04:22:35'),
(2, '7894', 'BridgeStone Ibérica', 'image/sponsors/wFybQIPd6NwQENabmkUF8ZpgGTiO2eTJQNMal9CZ.png', 'Carrer dels Arbres', 1, 1, '2023-04-28 04:23:33', '2023-04-28 04:23:33'),
(3, '7498', 'Citroën SP', 'image/sponsors/d55oZ7gRFniYlpiK8ubhK3Jzf3j266Pa2vdYKMjj.png', 'Calle Ibérica', 1, 1, '2023-04-28 04:23:56', '2023-04-28 04:57:15'),
(4, '85263', 'Bimbo Ibérica', 'image/sponsors/DIOCJUPK4Y08wqXSIrjJpYilmD2c9Sw6N1DfrIDK.png', 'Calle Concordia', 1, 1, '2023-04-28 04:24:33', '2023-04-28 04:24:33'),
(5, '96321', 'Bergamont SP', 'image/sponsors/nuYejogOZG8ofar5mjm2ZqlgI8mcXm1CDRI8nUkF.png', 'Avenida Augusta', 1, 1, '2023-04-28 04:25:02', '2023-04-28 04:25:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `race_id` int(11) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `transactions`
--

INSERT INTO `transactions` (`id`, `token`, `user_id`, `race_id`, `insurance_id`, `amount`, `is_paid`, `created_at`, `updated_at`) VALUES
(1, 'Bzhx2VZZQehrcVjmiKf2NZf77YZPXiQa', 2, 5, 3, 43.00, 0, NULL, NULL),
(2, 'pN4rJQa6AA46xyZhz1LY8UBjSSbBaO4U', 2, 6, 4, 40.00, 0, NULL, NULL),
(3, 'zaXRBjv9ymjAHGb3aV4WbLG7mefyFbIM', 3, 1, 7, 3023.00, 0, NULL, NULL);

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
(1, '1234', 'admin', 'male', 23, 'admin', 1, '2000-02-20', 'pro', NULL, NULL, 'admin@gmail.com', '$2y$10$W/wBDOOOUicCxnmiCTWOH.5IJ8twPqlkxxqbm4WgtqsY2J6QwAIF.', NULL, '2023-04-28 04:11:56', '2023-04-28 04:11:56', NULL),
(2, '48133467X', 'Gerard', 'male', 21, 'Nelson Mandela', 0, '2002-03-20', 'pro', NULL, NULL, 'gerard@gmail.com', '$2y$10$nk4Dq3/tfTv2BvBKmT8hkeykS02FtKVpp35fUuFFQ8mOVMobKVeh.', NULL, '2023-04-28 04:29:10', '2023-04-28 04:29:10', NULL),
(3, '123321', 'Olga', 'female', 32, 'Nelson Mandela', 0, '1990-09-17', 'pro', NULL, NULL, 'olga@gmail.com', '$2y$10$dvvQ7o8OXhaxGa3Mp0kKmeJtwRbLkCWsSODG2.yeJl8bSvsSRx4zW', NULL, '2023-04-28 05:19:15', '2023-04-28 05:19:15', NULL);

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
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
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
-- Indices de la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `race_insurance`
--
ALTER TABLE `race_insurance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `runner_number`
--
ALTER TABLE `runner_number`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sponsored`
--
ALTER TABLE `sponsored`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
