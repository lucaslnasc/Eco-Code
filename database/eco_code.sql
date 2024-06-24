CREATE DATABASE eco_code;

USE eco_code;

CREATE TABLE citizen(
	id_citizen INT PRIMARY KEY AUTO_INCREMENT,
    nome_completo VARCHAR (100) NOT NULL,
    email VARCHAR (100) NOT NULL UNIQUE,
    cpf CHAR (14) NOT NULL UNIQUE,
    ddd VARCHAR (3) NOT NULL,
    telefone VARCHAR (11) NOT NULL,
    senha VARCHAR (255) NOT NULL,
    cep VARCHAR (9) NOT NULL,
    endereco VARCHAR(50) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    num INT(3) NOT NULL,
    cidade VARCHAR(20) NOT NULL
);

CREATE VIEW VW_CONTA AS SELECT id_citizen, nome_completo, cpf, email, telefone, cidade, bairro, cep, num FROM citizen;

SELECT * FROM VW_CONTA;
SELECT * FROM citizen;

CREATE TABLE city_hall(
	id_city_hall INT AUTO_INCREMENT PRIMARY KEY,
    razao_social VARCHAR(150) NOT NULL,
    email VARCHAR (100) NOT NULL UNIQUE,
    cnpj VARCHAR (18) NOT NULL UNIQUE,
    ddd VARCHAR (3) NOT NULL,
    telefone VARCHAR (11) NOT NULL,
	senha VARCHAR (255) NOT NULL,
    cep VARCHAR(9) NOT NULL,
    endereco VARCHAR(50) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    num_city_hall INT(3) NOT NULL,
    cidade VARCHAR(20) NOT NULL
);

SELECT * FROM city_hall;
UPDATE city_hall SET senha = 'TESTE' WHERE cnpj = '12345678901234';

CREATE TABLE repoAcontecimento (
	id_aco VARCHAR(100) PRIMARY KEY,
    coluna_aco VARCHAR(100) NOT NULL
);

INSERT INTO repoAcontecimento (id_aco, coluna_aco) VALUES ('ACÚMULO DE LIXO','ACÚMULO DE LIXO'), ('DESABAMENTO','DESABAMENTO'), ('ALAGAMENTO','ALAGAMENTO'), ('ENTULHO','ENTULHO'), ('FIAÇÃO','FIAÇÃO');

CREATE TABLE repoUF (
	id_uf VARCHAR(100) PRIMARY KEY,
    coluna_uf VARCHAR(100) NOT NULL
);
INSERT INTO repoUF (id_uf, coluna_uf)
VALUES
('AC','AC'), ('AL','AL'), ('AP','AP'), ('AM','AM'), ('BA','BA'), ('CE','CE'), ('DF','DF'), ('ES','ES'), ('GO','GO'), ('MA','MA'), ('MT','MT'), ('MS','MS'), ('MG','MG'), ('PA','PA'),
('PB','PB'), ('PR','PR'), ('PE','PE'), ('PI','PI'), ('RJ','RJ'), ('RN','RN'), ('RS','RS'), ('RO','RO'), ('RR','RR'), ('SC','SC'), ('SP','SP'), ('SE','SE'), ('TO','TO');
CREATE TABLE report (
    ID_REPORT INT AUTO_INCREMENT PRIMARY KEY,
    SELECIONE_OCORRIDO VARCHAR(100) NOT NULL,
    CEP_LOCAL VARCHAR(9) NOT NULL,
    UF VARCHAR(10) NOT NULL,
    ENDERECO VARCHAR(200) NOT NULL,
    BAIRRO VARCHAR(180) NOT NULL,
    N INT NOT NULL,
    CIDADE VARCHAR(200) NOT NULL,
    DESCREVA_OCORRIDO VARCHAR(255) NOT NULL,
    IMAGEM VARCHAR(150) NOT NULL,
    VIDEO VARCHAR(150) NOT NULL,
    CRITICIDADE VARCHAR(100),
    CONSTRAINT FK_repoAcontecimento_report FOREIGN KEY (SELECIONE_OCORRIDO) REFERENCES repoAcontecimento (id_aco),
    CONSTRAINT FK_repoUF_report FOREIGN KEY (UF) REFERENCES repoUF (id_uf)
);

-- INSERÇÃO DE TIPO DE REPORTE QUE SERÁ FEITO E CADA UMA DELAS TERÁ UM GRAU DE CRITICIDADE
-- ACÚMULO DE LIXO {MÉDIA}
-- DESABAMENTO {ALTA}
-- ALAGAMENTO {ALTA}
-- ENTULHO {MÉDIA}
-- FIAÇÃO {BAIXA}

SELECT * FROM report;