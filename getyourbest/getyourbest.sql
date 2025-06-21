
-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS getyourbest;
USE getyourbest;

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL UNIQUE,
  `senha` varchar(255) NOT NULL,
  `treinou` enum('sim','nao') NOT NULL,
  `peso` decimal(5,2) NOT NULL,
  `altura` int(11) NOT NULL,
  `idade` int(11) NOT NULL,
  `disponibilidade` enum('3x','4x','5x') NOT NULL,
  `biotipo` enum('ectomorfo','mesomorfo','endomorfo') NOT NULL,
  `objetivo` enum('perder_peso','ganhar_musculo','ambos') NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabela de treinos
CREATE TABLE IF NOT EXISTS `treinos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario_id` INT NOT NULL,
  `dados` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`usuario_id`) REFERENCES `usuarios`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserindo dados de exemplo (opcional)
INSERT INTO `usuarios` (`nome`, `celular`, `email`, `senha`, `treinou`, `peso`, `altura`, `idade`, `disponibilidade`, `biotipo`, `objetivo`) VALUES
('João Silva', '11999999999', 'joao@email.com', '$2y$10$eIXTKs6cfexuHrTtArjNru27WZ7KjCLybzHFkXEiUqTYTxsMNvmAi', 'sim', 75.0, 175, 25, '4x', 'mesomorfo', 'ganhar_musculo');
