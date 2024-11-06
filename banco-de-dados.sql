CREATE DATABASE financas_pessoais;

USE financas_pessoais;

CREATE TABLE financeiro_pessoal (
    id_financeiro INT AUTO_INCREMENT PRIMARY KEY,
    data DATE,
    descricao VARCHAR(255),
    valor DECIMAL(10, 2),
    deb_cred VARCHAR(10),
    status VARCHAR(20)
);
