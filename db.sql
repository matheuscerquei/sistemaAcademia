create database academia;
use academia;

CREATE TABLE usuario (
    id_usuario  INT  PRIMARY KEY  AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo VARCHAR(255) NOT NULL
    
);

CREATE TABLE professor (
    id_professor INT PRIMARY KEY AUTO_INCREMENT,
    nome_professor VARCHAR(255) NOT NULL,
    email_professor varchar(255) not null
   
);

CREATE TABLE agenda_aulas (
    id_aula INT PRIMARY KEY AUTO_INCREMENT,
    id_professor INT NOT NULL ,
    id_usuario INT ,
    turno_inicio DATETIME NOT NULL,
    turno_fim INT NOT NULL,
    assunto VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_professor) REFERENCES professor(id_professor),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);
INSERT INTO usuario (nome, senha, email, tipo) VALUES
('João Silva', '123456', 'joao.silva@email.com', 'aluno'),
('Maria Oliveira', '123456', 'maria.oliveira@email.com', 'aluno'),
('Professor 1', '123456', 'professor1@email.com', 'professor'),
('Professor 2', '123456', 'professor2@email.com', 'professor');


INSERT INTO agenda_aulas (id_professor, id_aluno, assunto) VALUES
(1, 1, 'Aula de Matemática'),
(1, 2, 'Aula de Português'),
(2, 1, 'Aula de Física'),
(2, 2, 'Aula de Química'),
(3, 1, 'Aula de Biologia'),
(3, 2, 'Aula de Geografia'),
(4, 1, 'Aula de História'),
(4, 2, 'Aula de Filosofia');
 
 INSERT INTO professor (nome_professor) VALUES ('matheus');
 
