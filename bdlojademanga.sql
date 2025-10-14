-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/03/2025 às 10:01
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdlojademanga`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato`
--

CREATE TABLE `contato` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_03_12_105428_create_contato_table', 1),
(6, '2025_03_12_105543_create_tb_manga_table', 1),
(7, '2025_03_12_105940_create_tbcategoria_table', 1),
(8, '2025_03_12_110108_create_tb_categoria_manga_table', 1),
(9, '2025_03_13_104129_create_tb_cliente_table', 1),
(10, '2025_03_13_104251_create_tbfone_cliente_table', 1),
(11, '2025_03_13_111425_create_tbpedido_table', 1),
(12, '2025_03_13_112059_create_tbitem_pedido_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcategoria`
--

CREATE TABLE `tbcategoria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomeCategoria` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tbcategoria`
--

INSERT INTO `tbcategoria` (`id`, `nomeCategoria`, `created_at`, `updated_at`) VALUES
(2, 'heroi', '2025-03-26 11:00:32', '2025-03-26 11:00:32'),
(3, 'shounen', '2025-03-26 11:59:07', '2025-03-26 11:59:07');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcategoriamanga`
--

CREATE TABLE `tbcategoriamanga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idcategoria` bigint(20) UNSIGNED NOT NULL,
  `idmanga` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tbcategoriamanga`
--

INSERT INTO `tbcategoriamanga` (`id`, `idcategoria`, `idmanga`, `created_at`, `updated_at`) VALUES
(14, 2, 2, NULL, NULL),
(16, 3, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomeCliente` varchar(255) NOT NULL,
  `emailCliente` varchar(255) NOT NULL,
  `senhaCliente` varchar(255) NOT NULL,
  `enderecoCliente` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbfonecliente`
--

CREATE TABLE `tbfonecliente` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numeroFone` int(11) NOT NULL,
  `idcliente` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbitempedido`
--

CREATE TABLE `tbitempedido` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idPedido` bigint(20) UNSIGNED NOT NULL,
  `idManga` bigint(20) UNSIGNED NOT NULL,
  `quantidade` int(11) NOT NULL,
  `precoUnitario` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbmanga`
--

CREATE TABLE `tbmanga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomeManga` varchar(255) NOT NULL,
  `caminhoImagemManga` varchar(255) NOT NULL,
  `sinopseManga` varchar(255) NOT NULL,
  `autorManga` varchar(255) NOT NULL,
  `valorManga` double(15,2) NOT NULL,
  `dataDeLancamentoManga` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tbmanga`
--

INSERT INTO `tbmanga` (`id`, `nomeManga`, `caminhoImagemManga`, `sinopseManga`, `autorManga`, `valorManga`, `dataDeLancamentoManga`, `created_at`, `updated_at`) VALUES
(1, 'gantz', 'gantz.jpg', 'Dois adolescentes morrem no metrô de Tóquio. Kurono e Kato não se deparam com o céu ou inferno: eles encontram uma esfera negra que disponibiliza armas para exterminação de seres malignos. Após cumprirem a missão, os jovens poderão fazer uma escolha.', 'Hiroya Oku', 50.55, '2025-03-21', NULL, NULL),
(2, 'naruto', 'naruto.jpg', 'Naruto Uzumaki, um jovem ninja que constantemente procura por reconhecimento e sonha em se tornar Hokage, o ninja líder de sua vila.', 'Masashi Kishimoto', 40.00, '2025-03-22', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbpedido`
--

CREATE TABLE `tbpedido` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idcliente` bigint(20) UNSIGNED NOT NULL,
  `dataPedido` datetime NOT NULL,
  `statusPedido` varchar(255) NOT NULL,
  `valortotal` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbcategoriamanga`
--
ALTER TABLE `tbcategoriamanga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbcategoriamanga_idcategoria_foreign` (`idcategoria`),
  ADD KEY `tbcategoriamanga_idmanga_foreign` (`idmanga`);

--
-- Índices de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbfonecliente`
--
ALTER TABLE `tbfonecliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbfonecliente_idcliente_foreign` (`idcliente`);

--
-- Índices de tabela `tbitempedido`
--
ALTER TABLE `tbitempedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbitempedido_idpedido_foreign` (`idPedido`),
  ADD KEY `tbitempedido_idmanga_foreign` (`idManga`);

--
-- Índices de tabela `tbmanga`
--
ALTER TABLE `tbmanga`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbpedido`
--
ALTER TABLE `tbpedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbpedido_idcliente_foreign` (`idcliente`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbcategoria`
--
ALTER TABLE `tbcategoria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbcategoriamanga`
--
ALTER TABLE `tbcategoriamanga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbfonecliente`
--
ALTER TABLE `tbfonecliente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbitempedido`
--
ALTER TABLE `tbitempedido`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbmanga`
--
ALTER TABLE `tbmanga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tbpedido`
--
ALTER TABLE `tbpedido`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbcategoriamanga`
--
ALTER TABLE `tbcategoriamanga`
  ADD CONSTRAINT `tbcategoriamanga_idcategoria_foreign` FOREIGN KEY (`idcategoria`) REFERENCES `tbcategoria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbcategoriamanga_idmanga_foreign` FOREIGN KEY (`idmanga`) REFERENCES `tbmanga` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `tbfonecliente`
--
ALTER TABLE `tbfonecliente`
  ADD CONSTRAINT `tbfonecliente_idcliente_foreign` FOREIGN KEY (`idcliente`) REFERENCES `tbcliente` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `tbitempedido`
--
ALTER TABLE `tbitempedido`
  ADD CONSTRAINT `tbitempedido_idmanga_foreign` FOREIGN KEY (`idManga`) REFERENCES `tbmanga` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbitempedido_idpedido_foreign` FOREIGN KEY (`idPedido`) REFERENCES `tbpedido` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `tbpedido`
--
ALTER TABLE `tbpedido`
  ADD CONSTRAINT `tbpedido_idcliente_foreign` FOREIGN KEY (`idcliente`) REFERENCES `tbcliente` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
