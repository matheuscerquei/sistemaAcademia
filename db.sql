create database academia;
use academia;

create table usuario(
id int primary key auto_increment,
nome varchar(200),
senha varchar(200),
email varchar(200)
);

create table professor(
id int primary key auto_increment,
nome_professor varchar(200),
semana enum ("segunda","terça","quarta","quinta","sexta","sabado","domingo"),
turno_inicio datetime,
turno_fim datetime
);

