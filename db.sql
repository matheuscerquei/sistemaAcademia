create database academia;
use academia;

create table usuario(
id_aluno int primary key auto_increment,
nome varchar(200),
senha varchar(200),
email varchar(200),
tipo enum ("aluno","professor")
);

create table professor(
id_professor int primary key auto_increment,
nome_professor varchar(200),
semana enum ("segunda","terça","quarta","quinta","sexta","sabado","domingo"),
turno_inicio datetime,
turno_fim datetime
);

create table agenda_aulas (
    id_aula INT AUTO_INCREMENT PRIMARY KEY,
    id_professor INT NOT NULL,
    id_aluno INT NOT NULL,
    assunto VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_professor) REFERENCES professor(id_professor),
    FOREIGN KEY (id_aluno) REFERENCES usuario(id_aluno) 
);

