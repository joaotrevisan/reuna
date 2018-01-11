/* Cria o curso "ALUNO_NOVO" */

INSERT INTO `cursos` (`id`, `nome`, `letra`, `tipo`, `nome_monitor`, `id_monitor`, `estado`, `data_inicio`, `data_termino`, `created`, `modified`) 
VALUES (NULL, 'ALUNO_NOVO', '0', 'Curso', '', '', 'Concluido', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

/* Cria o usuario DESENVOLVEDOR */

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `permissao`, `created`, `modified`) 
VALUES (NULL, 'DESENVOLVEDOR', '2121ab', 'PROGRAMADOR', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);