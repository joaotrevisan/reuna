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
  cep int(8) NOT NULL,
  cidade varchar(100) NOT NULL,
  estado varchar(100) NOT NULL,
  telefone int(15) NOT NULL,
  celular int(15) NOT NULL,
  email int(255) NOT NULL,
  created datetime NOT NULL,
  modified datetime NOT NULL
);

ALTER TABLE alunos
  ADD PRIMARY KEY (id);
  
ALTER TABLE alunos
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;