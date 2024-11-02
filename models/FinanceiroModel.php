<?php


require_once "DataBase.php";

class Financeiro

{

    private $db;

   
    public function __construct(){


        $this->db = DataBase::getConexao();
    }
   





    public function getAll(){
       $resultadoDaConsulta = $this->db->query("SELECT * FROM financeiro_pessoal");  
       return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getById($id_financeiro){
        $sql = $this->db->prepare("SELECT * FROM financeiro_pessoal WHERE id_financeiro = ?");
        $sql->execute([$id_financeiro]);
        return $sql->fetch(PDO::FETCH_ASSOC);
     }

    
    public function cancelar($id_financeiro) {
        $sql = $this->db->prepare("DELETE FROM financeiro_pessoal WHERE id_financeiro = ?");
        return $sql->execute([$id_financeiro]);
    }

    public function insert($data,$descricao,$valor,$deb_cred,$status){
        $sql = $this->db->prepare(
            "INSERT INTO financeiro_pessoal (data,descricao,valor,deb_cred,status)
            VALUES (?,?,?,?,?,?)"
            );
            return $sql->execute( [$data,$descricao,$valor,$deb_cred,$status]);
    }

public function update($id_financeiro, $status){
    $sql = $this->db->prepare("UPDATE financeiro_pessoal SET status=?
    WHERE id_financeiro=?"
    );
    return $sql->execute([$id_financeiro, $status]);
  }

}

