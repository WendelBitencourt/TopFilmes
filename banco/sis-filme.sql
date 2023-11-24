-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/11/2023 às 22:00
-- Versão do servidor: 10.4.13-MariaDB
-- Versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sis-filme`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `diretor`
--

CREATE TABLE `diretor` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) DEFAULT NULL,
  `minibio` longtext DEFAULT NULL,
  `ano_nascimento` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `diretor`
--

INSERT INTO `diretor` (`id`, `nome`, `minibio`, `ano_nascimento`) VALUES
(1, 'Steven Spielberg', 'Sua carreira começou para valer aos treze anos de idade, quando venceu um concurso de curtas com um filme de 40 minutos que falava sobre guerra. A partir daí foi só sucesso: aos dezesseis anos teve o seu primeiro filme, Amblin (1963) premiado no Festival de Veneza e com vinte cinco anos de idade já trabalhava em Hollywood.', '1946'),
(2, 'Stanley Kubrick', 'Kubrick cresceu no Bronx, EUA, e compartilhou os gostos do pai, médico, por xadrez e fotografia. Seu trabalho com câmeras começou como fotojornalista para uma revista chamada Look, quando ele tinha apenas dezessete anos de idade.\r\nQuando tinha vinte e dois anos, dirigiu um pequeno documentário de apenas doze minutos que acompanhou o lutador de boxe Walter Cartier por um dia. Foi o seu primeiro trabalho profissional, lançado pela produtora RKO como Dia de Luta (1951).', '1928'),
(3, 'Quentin Tarantino', 'Nascido no Tennessee e criado pela mãe e o pai adotivo na Califórnia, Quentin Tarantino sempre gostou de cinema, chegando a abandonar o ensino médio porque preferia ver filmes e ler quadrinhos. \r\n\r\nFrequentou algumas aulas de teatro no final da adolescência, mas foi com o emprego como balconista na Video Archives, uma famosa locadora de filmes em Manhattan Beach, que Quentin ficou ainda mais viciado em filmes e usava parte do seu tempo escrevendo roteiros. Um desses roteiros foi justamente o de Cães de Aluguel, comprado por um produtor e gravado em 1992', '1963'),
(4, 'Martin Scorsese', 'Quando tinha por volta de vinte anos de idade, Martins produziu um pequeno curta-metragem de comédia que lhe rendeu uma bolsa de estudos de US $ 500 dólares para estudar cinema Universidade de Nova York. Aos vinte e quatro anos já havia concluído seu mestrado em cinema e aos vinte e seis completou o seu primeiro longa, chamado Quem está batendo na minha porta? (1966).', '1942'),
(6, 'Francis Ford Coppola', 'Crescido no bairro de Queens em Nova Iorque, filho de pai músico e compositor e mãe atriz, Coppolla foi atingido por uma poliomielite quando criança, e enquanto ficou acamado, encontrou na produção de pequenas peças de marionetes um jeito de se entreter. ', '1939'),
(8, 'George Lucas', 'George Walton Lucas Jr. é um produtor cinematográfico, filantropista, roteirista e diretor de cinema americano. Mundialmente famoso como criador das franquias Star Wars e Indiana Jones, Lucas está entre as pessoas mais ricas e influentes do mundo, com fortuna estimada em 5 bilhões de dólares.', '1944');

-- --------------------------------------------------------

--
-- Estrutura para tabela `filme`
--

CREATE TABLE `filme` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `sinopse` text DEFAULT NULL,
  `ano_lancamento` year(4) DEFAULT NULL,
  `duracao` int(11) DEFAULT NULL,
  `nota_imdb` float DEFAULT NULL,
  `img_cartaz` varchar(255) DEFAULT NULL,
  `fk_diretor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `filme`
--

INSERT INTO `filme` (`id`, `titulo`, `sinopse`, `ano_lancamento`, `duracao`, `nota_imdb`, `img_cartaz`, `fk_diretor_id`) VALUES
(1, 'Tubarão', 'Um terrível ataque a banhistas é o sinal de que a praia da pequena cidade de Amity, na Nova Inglaterra, virou refeitório de um gigantesco tubarão branco. O chefe de polícia Martin Brody quer fechar as praias, mas o prefeito Larry Vaughn não permite, com medo de que o faturamento com a receita dos turistas deixe a cidade sem recursos.', '1975', 2, 8.3, '1c9ed84ddf2400f93cff1fa5db8253c0', 1),
(2, 'Bastardos Inglórios', 'Durante a Segunda Guerra Mundial, na França, judeus americanos espalham o terror entre o terceiro Reich. Ao mesmo tempo, Shosanna, uma judia que fugiu dos nazistas, planeja vingança quando um evento em seu cinema reunirá os líderes do partido.', '2009', 2, 8.4, '7dc5d2356efe7a80bb5c2a4b6de924cf', 3),
(4, 'O poderoso chefão', 'A série de filmes The Godfather consiste em três filmes de drama e suspense policial dirigidos por Francis Ford Coppola com base no romance homônimo do ítalo-americano Mario Puzo.', '1972', 3, 9.2, '1fa041dc5427f4df210c7d0914e9e703', 6),
(6, 'Taxy Driver', 'O motorista de táxi de Nova York Travis Bickle, veterano da Guerra do Vietnã, reflete constantemente sobre a corrupção da vida ao seu redor e sente-se cada vez mais perturbado com a própria solidão e alienação.', '1977', 2, 7.5, 'c28cd65f86401ceccb838406290f2d5c', 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `diretor`
--
ALTER TABLE `diretor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_diretor_id` (`fk_diretor_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `diretor`
--
ALTER TABLE `diretor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `filme`
--
ALTER TABLE `filme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `filme`
--
ALTER TABLE `filme`
  ADD CONSTRAINT `filme_ibfk_1` FOREIGN KEY (`fk_diretor_id`) REFERENCES `diretor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
