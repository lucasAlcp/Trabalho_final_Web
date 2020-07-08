-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06-Jul-2020 às 02:37
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escola`
--



--
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `sexo` varchar(15) DEFAULT NULL,
  `rg` double DEFAULT NULL,
  `cpf` double DEFAULT NULL,
  `naturalidade` varchar(30) DEFAULT NULL,
  `estado_civil` varchar(25) DEFAULT NULL,
  `trabalho_atual` varchar(100) DEFAULT NULL,
  `telefone` double DEFAULT NULL,
  `nivel_de_escolaridade` varchar(100) DEFAULT NULL,
  `obs_medicas` varchar(450) DEFAULT NULL,
  `endereco` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aula`
--

DROP TABLE IF EXISTS `tb_aula`;
CREATE TABLE IF NOT EXISTS `tb_aula` (
  `CD_CODIGO` int(3) NOT NULL AUTO_INCREMENT,
  `DT_DATA` date NOT NULL,
  `DS_FEEDBACK` varchar(800) NOT NULL,
  `DS_CONTEUDO` varchar(100) NOT NULL,
  `CD_TURMA` int(3) NOT NULL,
  PRIMARY KEY (`CD_CODIGO`),
  KEY `CD_TURMA` (`CD_TURMA`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_aula`
--

INSERT INTO `tb_aula` (`CD_CODIGO`, `DT_DATA`, `DS_FEEDBACK`, `DS_CONTEUDO`, `CD_TURMA`) VALUES
(2, '0131-03-12', '12312', '213312', 123123);

-- --------------------------------------------------------

-- criando tabela do semestre
   DROP TABLE IF EXISTS `tb_semestre`;
   CREATE TABLE IF NOT EXISTS `tb_semestre` (
      `CD_CODIGO` int(3) NOT NULL AUTO_INCREMENT,
      `DT_DATA` date NOT NULL,
      PRIMARY KEY (`CD_CODIGO`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- criando tabela do endereço
DROP TABLE IF EXISTS `tb_endereco`;
CREATE TABLE IF NOT EXISTS `tb_endereco` (
  `CD_CODIGO` int(3) NOT NULL AUTO_INCREMENT,
  `NM_CIDADE` varchar(50) NOT NULL,
  `NM_BAIRRO` varchar(150) NOT NULL,
  `NM_RUA` varchar(150) NOT NULL,
  `NB_CEP` int(10) NOT NULL,
  `CD_ALUNO` int(10) NOT NULL,
  PRIMARY KEY (`CD_CODIGO`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Estrutura da tabela `presença`
--
DROP TABLE IF EXISTS `tb_presença`;
CREATE TABLE IF NOT EXISTS `tb_presença` (
  `CD_CODIGO` int(3) NOT NULL AUTO_INCREMENT,
  `NM_NOME_DOS_ALUNOS` varchar(300) NOT NULL,
  `DS_TEMA_DA_AULA` varchar(300) NOT NULL,
  `DT_DATA` date NOT NULL,
  `CD_ALUNO` int(3) NOT NULL,
  `CD_AULA` int(3) NOT NULL,
  PRIMARY KEY (`CD_CODIGO`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Estrutura da tabela `turma`
--
DROP TABLE IF EXISTS `tb_turma`;
CREATE TABLE IF NOT EXISTS `tb_turma` (
  `CD_CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `CD_SEMESTRE` int(25) NOT NULL,
  `CD_PROFESSOR` varchar(30) NOT NULL,
  PRIMARY KEY (`CD_CODIGO`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Estrutura da tabela `tb_professor`
--
DROP TABLE IF EXISTS `tb_professor`;
CREATE TABLE IF NOT EXISTS `tb_professor` (
  `CD_CODIGO` int(3) NOT NULL AUTO_INCREMENT,
  `NB_TELEFONE` int(25) NOT NULL,
  `DT_NASCIMENTO` date NOT NULL,
  `NM_NOME` varchar(35) NOT NULL,
  `NB_RA` int(14) NOT NULL,
  `DS_CURSO` varchar(50) NOT NULL,
  `DS_TURNO` varchar(35) NOT NULL,
  `DS_SEXO` varchar(15) NOT NULL,
  PRIMARY KEY (`CD_CODIGO`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_professor`
--

INSERT INTO `tb_professor` (`CD_CODIGO`, `NB_TELEFONE`, `DT_NASCIMENTO`, `NM_NOME`, `NB_RA`, `DS_CURSO`, `DS_TURNO`, `DS_SEXO`) VALUES
(1, 1233123, '0123-03-12', 'fasfasfasfa', 21424142, 'ADS', 'DIURNO', 'Masc');
COMMIT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `plano`;
CREATE TABLE IF NOT EXISTS `plano` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `tema_aula` varchar(50) NOT NULL,
  `conteudo` varchar(80) NOT NULL,
  `plano_aula` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
