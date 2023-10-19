# SistemaSaude
 
Projeto desenvolvido de forma individual para a matéria de Linguagem de Programação e Paradigmas.
Neste projeto foi desenvolvido um sistema de monitoramento de pacientes para uma unidade de saúde, utilizando os princípios da Programação Orientada a Eventos (POE). 
O sistema permite o acompanhamento em tempo real dos sinais vitais dos pacientes, alertando a equipe médica em caso de variações críticas e facilitando a tomada de decisões clínicas.

SQL - MySql

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/10/2023 às 03:40
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemasaude`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbpaciente`
--

CREATE TABLE `tbpaciente` (
  `Id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sexo` char(1) NOT NULL,
  `idade` int(11) NOT NULL,
  `cidade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbpaciente`
--
ALTER TABLE `tbpaciente`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbpaciente`
--
ALTER TABLE `tbpaciente`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;