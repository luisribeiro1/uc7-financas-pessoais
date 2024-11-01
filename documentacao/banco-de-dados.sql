CREATE DATABASE financas_pessoais;

USE DATABASE financas_pessoais;

CREATE TABLE financeiro_pessoal(
    id_financeiro int auto_increment,
    data date,
    descricao varchar(200),
    valor decimal(10,2),
    deb_cred varchar(30),
    status varchar(50) 
)ENGINE=INNODB;