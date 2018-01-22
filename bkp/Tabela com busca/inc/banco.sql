CREATE DATABASE banco;

CREATE TABLE usuarios (
    id INT(11) NOT NULL,
    usuario VARCHAR(20) NOT NULL,
    senha VARCHAR(20) NOT NULL,
);

ALTER TABLE usuarios 
    ADD PRIMARY KEY(id);
;

ALTER TABLE usuarios 	  
    MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
;

INSERT INTO usuarios (usuario,senha) VALUES ('1','1');