<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $user;

    public function __construct() {
        $db = new Database();
        $conn = $db->connect();

        // Cek koneksi error
        if ($conn->connect_errno) {
            die("Database connection failed: " . $conn->connect_error);
        }

        $this->user = new User($conn);

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // ============================
    // PROSES REGISTER
    // ============================
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nama = trim($_POST["nama"]);
            $email = trim($_POST["email"]);
            $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
            $role = $_POST["role"]; // pelamar/perusahaan

            // Cek apakah email sudah digunakan
            $cekEmail = $this->user->login($email);
            if ($cekEmail) {
                echo "Email sudah terdaftar!";
                return;
            }

            if ($this->user->register($nama, $email, $password, $role)) {
                header("Location: index.php?page=login");
                exit;
            } else {
                echo "Gagal registrasi";
            }
        }
    }

    // ============================
    // PROSES LOGIN
    // ============================
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $email = trim($_POST["email"]);
            $password = $_POST["password"];

            $akun = $this->user->login($email);

            if ($akun && password_verify($password, $akun["password"])) {

                $_SESSION["user_id"] = $akun["id"];
                $_SESSION["role"] = $akun["role"];

                // Redirect berdasarkan role
                if ($akun["role"] == "pelamar") {
                    header("Location: index.php?page=dashboard_pelamar");
                } else {
                    header("Location: index.php?page=dashboard_perusahaan");
                }
                exit;

            } else {
                echo "Email atau password salah!";
            }
        }
    }

    // ============================
    // LOGOUT
    // ============================
    public function logout() {
        session_destroy();
        header("Location: index.php?page=login");
        exit;
    }
}
