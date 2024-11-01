CREATE DATABASE financas_pessoais;

CREATE TABLE financeiro_pessoal (
    `id_financeiro` INT AUTO_INCREMENT,
    `data` date,
    `descricao` varchar(100),
    `valor` decimal(10, 2),
    `deb_cred` varchar(100),
    `status` varchar(100)
);

INSERT INTO `financeiro_pessoal` (`data`, `descricao`, `valor`, `deb_cred`, `status`) 
VALUES ('2024-11-01', 'Pagamento de Novembro.', '4000,00', 'Crédito', 'Ativo');