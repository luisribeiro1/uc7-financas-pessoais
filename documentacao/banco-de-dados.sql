create table financeiro_pessoal(
    id_financeiro int PRIMARY KEY AUTO_INCREMENT,
    data date,
    descricao varchar(100),
    valor decimal,
    deb_cred varchar(100),
    status varchar(100)
);