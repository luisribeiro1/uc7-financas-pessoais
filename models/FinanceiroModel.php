<?php

    require_once "DataBase.php";

    class Financeiro{

        private $db;

        public function __construct(){
            $this->db = DataBase::getConexao();
        }

        public function getAll(){
            $resultadoDaConsulta = $this->db->query("SELECT * FROM financeiro_pessoal");
            return $resultadoDaConsulta->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getById($id){
            $resultadoDaConsulta = $this->db->prepare("SELECT * FROM financeiro_pessoal WHERE id_financeiro = ?");
            $resultadoDaConsulta->execute([$id]);
            return $resultadoDaConsulta->fetch(PDO::FETCH_ASSOC);
        }

        public function insert($data,$descricao,$valor,$dep_cred,$status){
            $sql = $this->db->prepare(
                "INSERT INTO financeiro_pessoal (data,descricao,valor,dep_cred,status) VALUE (?,?,?,?,?)"
            );
            return $sql->execute([$data,$descricao,$valor,$dep_cred,$status]);
        }

        public function update($id,$data,$descricao,$valor,$dep_cred,$status){
            $sql = $this->db->prepare(
                "UPDATE financeiro_pessoal SET data = ?,descricao = ?,valor = ?,dep_cred = ?, status = ? WHERE id_financeiro = ?"
            );
            return $sql->execute([$data,$descricao,$valor,$dep_cred,$status,$id]);
        }

        public function cancelar($id){
            $sql = $this->db->prepare("UPDATE financeiro_pessoal SET status = ? WHERE id_financeiro = ?");
            return $sql->execute(["Cancelado",$id]);
        }

    }