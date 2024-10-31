create database financas_pessoais;

create table finaceiro_pessoal(
    id_financeiro (int and auto_increment),
    data (date),
    descricao (varchar),
    valor (decimal),
    deb_cred(varchar),
    status(varchar)
);