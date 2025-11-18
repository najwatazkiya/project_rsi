<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "Najwa151105";
    private $db   = "loker";
    private $port = 8111;

    public $conn;

    public function connect() {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->db,
            $this->port
        );

        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}
