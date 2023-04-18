-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Abr-2023 às 01:26
-- Versão do servidor: 5.7.40
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `laraclothes`
--
CREATE DATABASE IF NOT EXISTS `laraclothes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `laraclothes`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `name`, `created_at`, `updated_at`) VALUES
(42, 'Calçados', '2023-04-13 15:58:15', '2023-04-13 15:58:15'),
(44, 'Camisas', '2023-04-13 16:19:57', '2023-04-13 16:19:57'),
(45, 'Bolsas', '2023-04-13 19:32:57', '2023-04-13 19:32:57'),
(46, 'Óculos', '2023-04-13 19:44:34', '2023-04-13 19:44:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_11_001502_create_categorias_table', 2),
(6, '2023_04_11_001623_create_produtos_table', 2),
(8, '2023_04_11_131723_add_picture_to_produtos_table', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `produtos_id_categoria_foreign` (`id_category`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `titulo`, `preco`, `description`, `id_category`, `created_at`, `updated_at`, `picture`) VALUES
(21, 'Camisa Celebridade', '60,00', 'Camisa de quem ama celebridade.', 44, '2023-04-13 17:25:20', '2023-04-13 17:25:20', '643810d0ec023.jpg'),
(22, 'Rock no Sangue', '80,00', 'Pra quem curte um som!', 44, '2023-04-13 17:25:48', '2023-04-13 17:25:48', '643810eca8dc7.jpg'),
(23, 'Botas Mountain', '300,00', 'Vamos combinar que é muito difícil não ter um estilo de bota que seja a sua cara, esse é um calçado que oferece vários estilos diferentes e sempre terá um modelo que irá atender os gostos pessoais de cada um. As botas femininas oferecem modelos bem diferentes e cada um com estilo próprio, podendo ser usado tanto no inverno quanto no verão.\r\nConforto e Moda em uma bota só!', 42, '2023-04-13 17:26:46', '2023-04-13 17:26:46', '64381126ecd95.jpg'),
(27, 'Kit Verão', '560,00', 'Guarde suas coisa em bolsas confiáveis e de qualidade, experimente o melhor do mercado.', 45, '2023-04-13 19:34:32', '2023-04-13 19:34:32', '64382f18c5f77.jpg'),
(26, 'Bolsa Dark', '240,00', 'Ideal para uma noite calma e tranquila!', 45, '2023-04-13 19:33:28', '2023-04-13 19:33:28', '64382ed8d11a8.jpg'),
(28, 'Salto Luxo', '130,00', 'Um sapato de Sucesso para uma mulher de sucesso!', 42, '2023-04-13 19:35:16', '2023-04-13 19:35:16', '64382f449a3d2.jpg'),
(30, 'Óculos Casual', '30,00', 'Feito para o seu dia à dia.', 46, '2023-04-13 19:46:34', '2023-04-13 19:46:34', '643831ea3e27d.jpg'),
(32, 'Sapatilhas Simples', '90,00', 'Simples e elegante ideal para passeios e lugares para sair!', 42, '2023-04-17 15:59:48', '2023-04-17 15:59:48', '643d42c37ffd4.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'ADMIN', 'Romes', 'admin@gmail.com', NULL, '$2y$10$7.N1.KVtIx3Fhi0bDGkJzuNmSZZtoyw4HX9xkEtBW5xdUIEsXdi0C', NULL, '2023-04-06 23:43:13', '2023-04-06 23:43:13'),
(3, 'Paulo', 'Melo', 'roger@gmail.com', NULL, '$2y$10$6cQIoAGgS.5/XERH5blby.AVnDwIj/Oa2Um9e04bAunq9i1GiJHs6', NULL, '2022-05-07 00:26:33', '2023-04-07 00:26:33'),
(4, 'Rosa', 'Antunes', 'rosa@gmail.com', NULL, '$2y$10$8Nl55SVHV5IQOFadIZxuaO4bP95Kvn8yrY/P9iPXU605/W9T27NEO', NULL, '2020-05-07 00:29:24', '2023-04-07 00:29:24'),
(5, 'Pedro', 'Rosa', 'pedro@gmail.com', NULL, '$2y$10$gCuJKgSH9cVeOq0eExStL.7cJd3y.mc.fsYsXFucQMtYdvjqQ.f9y', NULL, '2021-06-07 16:26:43', '2023-04-07 16:26:43'),
(6, 'Pedro', 'Mendes', 'mendes@gmail.com', NULL, '$2y$10$cLZG38nZkLx24DOX33exS.w0KxtjQeyx1h0mdlx8jJsMXyWmaYmZW', NULL, '2022-07-07 19:43:52', '2023-04-07 19:43:52'),
(10, 'Usuario', 'usuario', 'usuario@gmail.com', NULL, '$2y$10$QHPwDCARdvI95oQyZBWvN.iTbCOz66jrbRqcQziz4f/q9Zq7/uaBG', NULL, '2023-04-17 16:07:24', '2023-04-17 16:07:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
