CREATE DATABASE financas_pessoais;

CREATE TABLE financeiro_pessoal (
    id_financeiro INT AUTO_INCREMENT,
    data date,
    descricao varchar(100),
    valor decimal(10, 2),
    deb_cred varchar(100),
    status varchar(100)
);