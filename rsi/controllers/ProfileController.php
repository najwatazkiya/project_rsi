<?php
require_once "models/User.php";
require_once "config/database.php";

class ProfileController {

    private $user;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

        $db = new Database();
        $conn = $db->connect();

        $this->user = new User($conn);
    }

    public function index() {
        if (!isset($_SESSION["user_id"])) {
            header("Location: index.php?page=login");
            exit;
        }

        $user = $this->user->getById($_SESSION["user_id"]);

        include "views/profil.php";
    }

    public function updatePhoto() {

        if (!isset($_SESSION["user_id"])) {
            header("Location: index.php?page=login");
            exit;
        }

        if (!empty($_FILES["photo"]["name"])) {

            $file = "uploads/" . time() . "_" . basename($_FILES["photo"]["name"]);
            move_uploaded_file($_FILES["photo"]["tmp_name"], $file);

            $this->user->updatePhoto($_SESSION["user_id"], $file);
        }

        header("Location: index.php?page=profil");
    }
}
