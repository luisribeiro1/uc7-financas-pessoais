-- Criar o banco de dados
CREATE DATABASE financas_pessoais;

-- Usar o banco de dados recém-criado
USE financas_pessoais;

-- Criar a tabela financeiro_pessoal
CREATE TABLE financeiro_pessoal (
    id_financeiro INT AUTO_INCREMENT PRIMARY KEY,
    data DATE NOT NULL,
    descricao VARCHAR(255),
    valor DECIMAL(10, 2),
    deb_cred VARCHAR(10),
    status VARCHAR(20)
);