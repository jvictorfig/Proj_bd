-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3388
-- Tempo de geração: 21-Out-2021 às 00:38
-- Versão do servidor: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- versão do PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE produto ( 
  `produto_id` INT(5) NOT NULL AUTO_INCREMENT ,
  `produto_nome` VARCHAR(20) NOT NULL , 
  `produto_valor` DOUBLE(10,2) NOT NULL , 
  PRIMARY KEY (`produto_id`)
  ) ENGINE = InnoDB;

  CREATE TABLE categoria ( 
    `categoria_id` INT(5) NOT NULL AUTO_INCREMENT , 
    `categoria_nome` VARCHAR(20) NOT NULL , 
    PRIMARY KEY (`categoria_id`)
    ) ENGINE = InnoDB;

CREATE TABLE `projeto`.`produto_categoria` ( 
  `produto_categoria_id` INT(5) NOT NULL AUTO_INCREMENT , 
  `produto_id` INT(5) NOT NULL , 
  `categoria_id` INT(5) NOT NULL , 
  PRIMARY KEY (`produto_categoria_id`)) ENGINE = InnoDB;
