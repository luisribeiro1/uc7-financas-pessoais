<?php
// models/FinanceiroModel.php
require_once 'Database.php';

class FinanceiroModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM financeiro_pessoal ORDER BY data";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM financeiro_pessoal WHERE id_financeiro = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data, $descricao, $valor, $deb_cred, $status) {
        $query = "INSERT INTO financeiro_pessoal (data, descricao, valor, deb_cred, status) VALUES (:data, :descricao, :valor, :deb_cred, :status)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':deb_cred', $deb_cred);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }

    public function cancelar($id) {
        $query = "UPDATE financeiro_pessoal SET status = 'cancelado' WHERE id_financeiro = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
