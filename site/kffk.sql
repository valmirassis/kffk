-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Dez-2019 às 22:12
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `kffk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empreendimento`
--

CREATE TABLE `empreendimento` (
  `cod` int(11) NOT NULL,
  `nome` text NOT NULL,
  `descricao` text NOT NULL,
  `localizacao` text NOT NULL,
  `concluido` int(11) NOT NULL,
  `status` text NOT NULL,
  `publicar` int(11) NOT NULL,
  `log` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empreendimento`
--

INSERT INTO `empreendimento` (`cod`, `nome`, `descricao`, `localizacao`, `concluido`, `status`, `publicar`, `log`) VALUES
(1, 'Predio de frente para o mar', '<p><!--StartFragment-->Do mesmo modo, o princ&iacute;pio da extensionalidade tem como componentes elementos indiscern&iacute;veis das novas teorias propostas. A pr&aacute;tica cotidiana prova que a consolida&ccedil;&atilde;o das estruturas psico-l&oacute;gicas assume importantes posi&ccedil;&otilde;es no estabelecimento das dire&ccedil;&otilde;es preferenciais no sentido do progresso filos&oacute;fico. Nunca &eacute; demais lembrar o peso e o significado destes problemas, uma vez que o acompanhamento das prefer&ecirc;ncias de consumo se apresenta como experi&ecirc;ncia metapsicol&oacute;gica, devido &agrave; impermeabiliza&ccedil;&atilde;o do sistema de forma&ccedil;&atilde;o de quadros que corresponde &agrave;s necessidades l&oacute;gico-estruturais.<!--EndFragment--></p>\r\n', 'Piçarras Beach', 0, '20', 1, '06/12/2019 19:10:43'),
(2, 'Empreendimento 2', '<p>Mais um empreendimento cadastrado como teste</p>\r\n', 'Schroeder City', 0, '25', 1, '10/12/2019 13:15:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emp_fotos`
--

CREATE TABLE `emp_fotos` (
  `cod` int(11) NOT NULL,
  `cod_emp` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descricao` text NOT NULL,
  `nome_foto` text NOT NULL,
  `nome_thumb` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `emp_fotos`
--

INSERT INTO `emp_fotos` (`cod`, `cod_emp`, `titulo`, `descricao`, `nome_foto`, `nome_thumb`) VALUES
(3, 1, 'Nome da foto', 'Descrição para a foto 1', '1A10-sk.png', '1A10-sk_thumb.png'),
(4, 1, 'Nome da foto', 'Descrição para a foto 2', '1Instalação SDK.png', '1Instalação SDK_thumb.png'),
(5, 1, 'Nome da foto', 'Descrição para a foto 3', '1formulas_contabilidade-II.png', '1formulas_contabilidade-II_thumb.png'),
(6, 2, 'Nome da foto', 'Descrição para a foto 1', '2PHOTO-2019-10-16-18-03-59.jpg', '2PHOTO-2019-10-16-18-03-59_thumb.jpg'),
(7, 2, 'Nome da foto', 'Descrição para a foto 2', '2PHOTO-2019-10-22-15-15-09 (1).jpg', '2PHOTO-2019-10-22-15-15-09 (1)_thumb.jpg'),
(8, 2, 'Nome da foto', 'Descrição para a foto 3', '2PHOTO-2019-10-23-16-46-03.jpg', '2PHOTO-2019-10-23-16-46-03_thumb.jpg'),
(9, 2, 'Nome da foto', 'Descrição para a foto 4', '2PHOTO-2019-10-22-15-15-09.jpg', '2PHOTO-2019-10-22-15-15-09_thumb.jpg'),
(10, 2, 'Nome da foto', 'Descrição para a foto 5', '2PHOTO-2019-10-25-14-45-45.jpg', '2PHOTO-2019-10-25-14-45-45_thumb.jpg'),
(11, 2, 'é uma foto de teste', 'Uma descrição um pouco mais longa para verificar a quebra de linha na galeria', '2PHOTO-2019-10-22-15-15-08.jpg', '2PHOTO-2019-10-22-15-15-08_thumb.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emp_videos`
--

CREATE TABLE `emp_videos` (
  `cod` int(11) NOT NULL,
  `cod_emp` int(11) NOT NULL,
  `nome` text NOT NULL,
  `descricao` text NOT NULL,
  `id_youtube` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `emp_videos`
--

INSERT INTO `emp_videos` (`cod`, `cod_emp`, `nome`, `descricao`, `id_youtube`) VALUES
(2, 1, 'Vídeo 2', 'Isso é outro teste', 'sOapWuBtMMc');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oportunidade`
--

CREATE TABLE `oportunidade` (
  `cod` int(11) NOT NULL,
  `nome` text NOT NULL,
  `descricao` text NOT NULL,
  `localizacao` text NOT NULL,
  `publicar` int(11) NOT NULL,
  `log` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `oportunidade`
--

INSERT INTO `oportunidade` (`cod`, `nome`, `descricao`, `localizacao`, `publicar`, `log`) VALUES
(1, 'Terreno', '<p>Isso &eacute; um teste de oportunidade ok</p>\r\n', 'Jaraguá do Sul', 1, '17/12/2019 16:55:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oport_fotos`
--

CREATE TABLE `oport_fotos` (
  `cod` int(11) NOT NULL,
  `cod_oport` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descricao` text NOT NULL,
  `nome_foto` text NOT NULL,
  `nome_thumb` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `oport_fotos`
--

INSERT INTO `oport_fotos` (`cod`, `cod_oport`, `titulo`, `descricao`, `nome_foto`, `nome_thumb`) VALUES
(0, 1, 'é uma foto de teste', 'Descrição para a foto 1', '1quimica_tecnologica_q39.png', '1quimica_tecnologica_q39_thumb.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oport_videos`
--

CREATE TABLE `oport_videos` (
  `cod` int(11) NOT NULL,
  `cod_oport` int(11) NOT NULL,
  `nome` text NOT NULL,
  `descricao` text NOT NULL,
  `id_youtube` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas`
--

CREATE TABLE `paginas` (
  `cod` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `conteudo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `paginas`
--

INSERT INTO `paginas` (`cod`, `nome`, `conteudo`) VALUES
(1, 'Empresa', '<p style=\"text-align:justify\"><!--StartFragment-->Ainda assim, existem d&uacute;vidas a respeito de como a infinita diversidade da realidade &uacute;nica institui o Complexo de &Eacute;dipo, ordenando o sujeito com seu desejo e o interdito, em fun&ccedil;&atilde;o das condi&ccedil;&otilde;es epistemol&oacute;gicas e cognitivas exigidas. Contudo, a cr&iacute;tica contundente de Deleuze/Guatarri - dupla implac&aacute;vel - nos mostra que a complexidade dos estudos efetuados cumpre um papel essencial na formula&ccedil;&atilde;o da fundamenta&ccedil;&atilde;o metaf&iacute;sica das representa&ccedil;&otilde;es. Assim mesmo, a estrutura atual da idea&ccedil;&atilde;o sem&acirc;ntica prepara-nos para enfrentar situa&ccedil;&otilde;es at&iacute;picas decorrentes dos m&eacute;todos utilizados na busca da verdade. O dualismo ineg&aacute;vel de numerosos pontos evidencia o quanto o novo modelo estruturalista aqui preconizado auxilia a prepara&ccedil;&atilde;o e a composi&ccedil;&atilde;o das posturas dos fil&oacute;sofos divergentes com rela&ccedil;&atilde;o &agrave;s atribui&ccedil;&otilde;es conceituais.</p>\r\n\r\n<p style=\"text-align:justify\">Do mesmo modo, o princ&iacute;pio da extensionalidade tem como componentes elementos indiscern&iacute;veis das novas teorias propostas. A pr&aacute;tica cotidiana prova que a consolida&ccedil;&atilde;o das estruturas psico-l&oacute;gicas assume importantes posi&ccedil;&otilde;es no estabelecimento das dire&ccedil;&otilde;es preferenciais no sentido do progresso filos&oacute;fico. Nunca &eacute; demais lembrar o peso e o significado destes problemas, uma vez que o acompanhamento das prefer&ecirc;ncias de consumo se apresenta como experi&ecirc;ncia metapsicol&oacute;gica, devido &agrave; impermeabiliza&ccedil;&atilde;o do sistema de forma&ccedil;&atilde;o de quadros que corresponde &agrave;s necessidades l&oacute;gico-estruturais. Como Deleuze eloquentemente mostrou, o in&iacute;cio da atividade geral de forma&ccedil;&atilde;o de conceitos obstaculiza a aprecia&ccedil;&atilde;o da import&acirc;ncia dos paradigmas filos&oacute;ficos. Acabei de provar que o desafiador cen&aacute;rio globalizado compromete ontologicamente a teoria &agrave; exist&ecirc;ncia dos relacionamentos verticais entre as hierarquias conceituais.</p>\r\n\r\n<p style=\"text-align:justify\">Se estivesse vivo, Foucault diria que o constante retorno do recalcado acarreta um processo de reformula&ccedil;&atilde;o e moderniza&ccedil;&atilde;o das ilus&otilde;es transcendentais presentes na obra de Condillac.</p>\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod` int(2) NOT NULL,
  `login` text NOT NULL,
  `senha` text NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `tipo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cod`, `login`, `senha`, `nome`, `email`, `tipo`) VALUES
(1, 'assis', '123456', 'Assis', 'assis@rediscover.com.br', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empreendimento`
--
ALTER TABLE `empreendimento`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `emp_fotos`
--
ALTER TABLE `emp_fotos`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `emp_videos`
--
ALTER TABLE `emp_videos`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `oportunidade`
--
ALTER TABLE `oportunidade`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `oport_fotos`
--
ALTER TABLE `oport_fotos`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `oport_videos`
--
ALTER TABLE `oport_videos`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empreendimento`
--
ALTER TABLE `empreendimento`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `emp_fotos`
--
ALTER TABLE `emp_fotos`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `emp_videos`
--
ALTER TABLE `emp_videos`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `oportunidade`
--
ALTER TABLE `oportunidade`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `paginas`
--
ALTER TABLE `paginas`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
