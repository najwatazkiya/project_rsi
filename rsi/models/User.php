<?php
class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db; // sudah berupa mysqli connection
    }

    // =============================
    // REGISTER USER
    // =============================
    public function register($nama, $email, $password, $role) {

        $query = "INSERT INTO users (nama, email, password, role) VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("ssss", $nama, $email, $password, $role);

        return $stmt->execute();
    }

    // =============================
    // LOGIN USER
    // =============================
    public function login($email) {

        $query = "SELECT * FROM users WHERE email = ? LIMIT 1";

        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc(); // return array (atau null jika tidak ada)
    }

        public function updatePhoto($user_id, $filename) {
        $query = "UPDATE users SET photo = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $filename, $user_id);
        return $stmt->execute();
    }

    public function getById($user_id) {
        $query = "SELECT * FROM users WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

}
