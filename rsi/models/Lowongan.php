<?php
require_once "config/database.php";

class Lowongan {
    private $conn;
    private $table = "lowongan";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM lowongan ORDER BY id DESC";
        $result = $this->conn->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function search($keyword) {
        $key = "%$keyword%";
        
        $query = "SELECT * FROM lowongan 
                  WHERE perusahaan LIKE ? 
                     OR posisi LIKE ?
                  ORDER BY id DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $key, $key);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM lowongan WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
}
