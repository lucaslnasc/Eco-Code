CREATE DATABASE eco_code;

USE eco_code;

CREATE TABLE citizen(
	id_citizen INT PRIMARY KEY AUTO_INCREMENT,
    nome_completo VARCHAR (100) NOT NULL,
    email VARCHAR (100) NOT NULL UNIQUE,
    cpf CHAR (14) NOT NULL UNIQUE,
    ddd VARCHAR (3) NOT NULL,
    telefone VARCHAR (11) NOT NULL,
    senha VARCHAR (20) NOT NULL,
    cep VARCHAR (8) NOT NULL,
    endereco VARCHAR(50) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    num INT(3) NOT NULL,
    cidade VARCHAR(20) NOT NULL
);
