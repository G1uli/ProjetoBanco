
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `cliente` (
  `id` bigint(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `funcionario` (
  `id` bigint(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `dias` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `vendas` (
  `id` bigint(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `produto` varchar(50) NOT NULL,
  `quantidade` INT(20) NOT NULL,
  `valor` float(20) NOT NULL,
  `cliente` BIGINT(20) NOT NULL,
  `funcionario` BIGINT(20) NOT NULL,
  FOREIGN KEY (cliente) REFERENCES cliente(id),
  FOREIGN KEY (funcionario) REFERENCES funcionario(id)
) 
