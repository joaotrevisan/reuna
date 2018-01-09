/* ALUNOS ================================================== */

DROP TABLE IF EXISTS alunos;

CREATE TABLE alunos (
  id int(11) NOT NULL,
  nome_completo varchar(255) NOT NULL,  
  data_nascimento date NOT NULL,
  hora_nascimento time NOT NULL,
  signo varchar(25) NOT NULL,
  estado_civil varchar(100) NOT NULL,
  profissao varchar(150) NOT NULL,
  endereco_residencial varchar(255) NOT NULL,
  bairro varchar(100) NOT NULL,
  cep varchar(10) NOT NULL,
  cidade varchar(100) NOT NULL,
  estado varchar(100) NOT NULL,
  telefone varchar(25) NOT NULL,
  celular varchar(25) NOT NULL,
  email varchar(255) NOT NULL,
  curso_atual varchar(255) NOT NULL,
  created datetime NOT NULL,
  modified datetime NOT NULL
);

ALTER TABLE alunos
  ADD PRIMARY KEY (id);
  
ALTER TABLE alunos
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
  
/* USUARIOS ================================================== */

DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
  id int(11) NOT NULL,
  usuario varchar(255) NOT NULL,  
  senha varchar(255) NOT NULL,  
  permissao varchar(100) NOT NULL,
  created datetime NOT NULL,
  modified datetime NOT NULL
);

ALTER TABLE usuarios
  ADD PRIMARY KEY (id);
  
ALTER TABLE usuarios
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  
  
/* CURSOS ================================================== */

DROP TABLE IF EXISTS cursos;

CREATE TABLE cursos (
  id int(11) NOT NULL,
  nome varchar(255) NOT NULL,  
  letra varchar(5) NOT NULL,  
  tipo varchar(100) NOT NULL,  
  nome_monitor varchar(255) NOT NULL,
  id_monitor int(11) NOT NULL,
  estado varchar(100) NOT NULL,
  created datetime NOT NULL,
  modified datetime NOT NULL
);

ALTER TABLE cursos
  ADD PRIMARY KEY (id);
  
ALTER TABLE cursos
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
  

/* MATRICULAS ================================================== */

DROP TABLE IF EXISTS matriculas;

CREATE TABLE matriculas (
  id int(11) NOT NULL,
  id_aluno int(11) NOT NULL,
  id_curso int(11) NOT NULL,
  data_inicio date NOT NULL,
  data_termino date NOT NULL,
  estado varchar(100) NOT NULL,
  cadeira int(5) NOT NULL,
  created datetime NOT NULL,
  modified datetime NOT NULL
);

ALTER TABLE matriculas
  ADD PRIMARY KEY (id);
  
ALTER TABLE matriculas
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;