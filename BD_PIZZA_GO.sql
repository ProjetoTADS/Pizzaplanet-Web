-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Nov-2017 às 02:19
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzago`
--
CREATE DATABASE IF NOT EXISTS `pizzago` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pizzago`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `emp_id` int(11) NOT NULL,
  `emp_razao_social` varchar(200) NOT NULL,
  `emp_nome_fantasia` varchar(200) NOT NULL,
  `emp_cnpj` varchar(18) NOT NULL,
  `emp_rua` varchar(100) NOT NULL,
  `emp_numero` int(11) NOT NULL,
  `emp_bairro` varchar(100) NOT NULL,
  `emp_cidade` varchar(100) NOT NULL,
  `emp_estado` varchar(100) NOT NULL,
  `emp_cep` varchar(9) NOT NULL,
  `emp_logradouro` varchar(100) NOT NULL,
  `emp_data_criacao` date NOT NULL,
  `emp_ativo` varchar(1) DEFAULT NULL,
  `emp_tel` varchar(30) NOT NULL,
  `emp_cel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`emp_id`, `emp_razao_social`, `emp_nome_fantasia`, `emp_cnpj`, `emp_rua`, `emp_numero`, `emp_bairro`, `emp_cidade`, `emp_estado`, `emp_cep`, `emp_logradouro`, `emp_data_criacao`, `emp_ativo`, `emp_tel`, `emp_cel`) VALUES
(1, 'Empresa Teste', 'Empresa Teste', '16.183.810/0001-60', 'Rua Teste', 123, 'Bairro Teste', 'Cidade Teste', 'Estado Teste', '05579-010', 'Logradouro Teste', '2017-10-21', 'S', '(11) 1111-1111', '(11) 1 1111-1111'),
(2, 'Empresa Teste 2', 'Empresa Teste 2', '123123123123', 'Rua Teste 2', 123, 'Bairro Teste 2', 'Cidade Teste 2', 'SP', '123123', 'Logradouro Teste 2', '2017-10-28', 'S', '', ''),
(3, 'Empresa Teste 3', 'Empresa Teste 3', '1231231231231', 'Rua Teste 2', 123, 'Bairro Teste 2', 'Cidade Teste 2', 'SP', '123123', 'Logradouro Teste 2', '2017-10-28', 'S', '', ''),
(4, 'Teste 4', 'Teste 4', '1213545455', 'Teste 4', 4, 'Teste 4', 'Teste 4', 'Teste 4', '123', 'Teste 4', '2017-10-28', 'S', '', ''),
(5, 'Empresa Teste 4', 'Nome Fantasia Teste 4', '12.312.312/3123-12', 'Teste', 123, 'Teste', 'Teste', 'Teste', '00000-000', 'Teste', '2017-11-05', 'S', '(11) 1111-1111', '(11) 1 1111-1111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingrediente`
--

CREATE TABLE `ingrediente` (
  `ingr_id` int(11) NOT NULL,
  `ingr_nome` varchar(100) NOT NULL,
  `ingr_obs` varchar(200) NOT NULL,
  `ingr_data_criacao` date NOT NULL,
  `ingr_ativo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pizza_empresa`
--

CREATE TABLE `pizza_empresa` (
  `pe_id` int(11) NOT NULL,
  `pe_ph_id` int(11) NOT NULL,
  `pe_empr_id` int(11) NOT NULL,
  `pe_data_criacao` date NOT NULL,
  `pe_ativo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pizza_header`
--

CREATE TABLE `pizza_header` (
  `ph_id` int(11) NOT NULL,
  `ph_nome` varchar(50) DEFAULT NULL,
  `ph_valor_medio` int(5) DEFAULT NULL,
  `ph_data_criacao` date DEFAULT NULL,
  `ph_ativo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pizza_lines`
--

CREATE TABLE `pizza_lines` (
  `pl_id` int(11) NOT NULL,
  `pl_ph_id` int(11) NOT NULL,
  `pl_num` int(5) NOT NULL,
  `pl_ingr_id` int(11) NOT NULL,
  `pl_data_criacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_senha` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_emp_id` int(11) NOT NULL,
  `user_data_criacao` date NOT NULL,
  `user_ativo` varchar(1) DEFAULT NULL,
  `user_admin` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`user_id`, `user_name`, `user_senha`, `user_email`, `user_emp_id`, `user_data_criacao`, `user_ativo`, `user_admin`) VALUES
(2, 'gpais', 'c5fcd1981d12339bd3265e848b97f5ac', 'gpais@teste.com', 1, '2017-10-21', 'S', 'S'),
(3, 'gpais2', 'f3d928a65c7cac2c32e5ab18469e8080', 'gpais2@teste.com', 1, '2017-10-21', 'N', 'S'),
(4, 'teste', '698dc19d489c4e4db73e28a713eab07b', 'teste', 1, '2017-10-21', 'S', 'N'),
(5, 'teste2', '38851536d87701d2191990e24a7f8d4e', 'teste2', 1, '2017-10-28', 'S', 'N'),
(6, 'teste23', '5a43425aa99822fdd17c41ee46ee3bfb', 'teste23', 1, '2017-10-28', 'S', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`ingr_id`);

--
-- Indexes for table `pizza_empresa`
--
ALTER TABLE `pizza_empresa`
  ADD PRIMARY KEY (`pe_id`),
  ADD KEY `pe_ph_fk` (`pe_ph_id`),
  ADD KEY `pe_empr_fk` (`pe_empr_id`);

--
-- Indexes for table `pizza_header`
--
ALTER TABLE `pizza_header`
  ADD PRIMARY KEY (`ph_id`);

--
-- Indexes for table `pizza_lines`
--
ALTER TABLE `pizza_lines`
  ADD PRIMARY KEY (`pl_id`),
  ADD KEY `pl_ph_fk` (`pl_ph_id`),
  ADD KEY `pl_ingr_fk` (`pl_ingr_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_emp_fk` (`user_emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `ingr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pizza_empresa`
--
ALTER TABLE `pizza_empresa`
  MODIFY `pe_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pizza_header`
--
ALTER TABLE `pizza_header`
  MODIFY `ph_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pizza_lines`
--
ALTER TABLE `pizza_lines`
  MODIFY `pl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pizza_empresa`
--
ALTER TABLE `pizza_empresa`
  ADD CONSTRAINT `pe_empr_fk` FOREIGN KEY (`pe_empr_id`) REFERENCES `empresa` (`emp_id`),
  ADD CONSTRAINT `pe_ph_fk` FOREIGN KEY (`pe_ph_id`) REFERENCES `pizza_header` (`ph_id`);

--
-- Limitadores para a tabela `pizza_lines`
--
ALTER TABLE `pizza_lines`
  ADD CONSTRAINT `pl_ingr_fk` FOREIGN KEY (`pl_ingr_id`) REFERENCES `ingrediente` (`ingr_id`),
  ADD CONSTRAINT `pl_ph_fk` FOREIGN KEY (`pl_ph_id`) REFERENCES `pizza_header` (`ph_id`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `user_emp_fk` FOREIGN KEY (`user_emp_id`) REFERENCES `empresa` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
