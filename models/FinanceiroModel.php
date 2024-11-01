<?php

class Financeiro{
    private $db;

    public function getAllFinanceiro(){
        $sql = $this->db->query("SELECT * FROM financeiro_pessoal");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByid($id_financeiro){
        $sql = $this->db->prepare("SELECT * FROM financeiro_pessoal WHERE id_financeiro = ?");
        $sql->execute([$id_financeiro]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data,$descricao,$valor,$deb_cred,$status){
        $sql = $this->db->prepare(
            "INSERT INTO financeiro_pessoal (data,descricao,valor,deb_cred,status)
            VALUES (?, ?, ?, ?, ?)"
        );
       return $sql->execute([$data,$descricao,$valor,$deb_cred,$status]);
    }

    public function update($status,$id_financeiro){
        $sql = $this->db->prepare("UPDATE financeiro_pessoal SET status=? WHERE id_financeiro=?");
        return $sql->execute([$status,$id_financeiro]);
    }

}

