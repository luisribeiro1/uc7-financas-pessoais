CREATE DATABASE financeiro_pessoal;

USE DATABASE financeiro_pessoal;

CREATE TABLE financeiro_pessoal(
    id_financeiro int auto_increment,
    data date,
    descricao varchar(200),
    valor decimal(10,2),
    dep_cred varchar(50),
    status varchar(50)
) ENGINE=INNODB;