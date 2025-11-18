<?php

// ============ ROUTING AUTH ============
// Harus ada di paling atas agar tidak tertimpa switch-case
require_once "controllers/AuthController.php";
$auth = new AuthController();

if (isset($_GET["page"])) {

    if ($_GET["page"] == "register_action") {
        $auth->register();
        exit; // Hentikan agar tidak lanjut ke switch-case
    }

    if ($_GET["page"] == "login_action") {
        $auth->login();
        exit;
    }

    if ($_GET["page"] == "logout") {
        $auth->logout();
        exit;
    }
}

// ======================================
// ROUTING LAINNYA
$page = $_GET['page'] ?? 'dashboard';

require_once "config/database.php";
$db = new Database();
$conn = $db->connect();


switch ($page) {

    case "login":
        require "views/login.php";
        break;

    case "register":
        require "views/register.php";
        break;

    case "detail-lowongan":
        require "controllers/LowonganController.php";
        (new LowonganController($conn))->detail();
        break;

    case "tambah-lamaran":
        require "controllers/LamaranController.php";
        (new LamaranController())->formTambah();
        break;

    case "store-lamaran":
        require "controllers/LamaranController.php";
        (new LamaranController())->store();
        break;

    case "detail-lamaran":
        require "controllers/LamaranController.php";
        (new LamaranController())->detail();
        break;

    case "edit-lamaran":
        require "controllers/LamaranController.php";
        (new LamaranController())->edit();
        break;

    case "update-lamaran":
        require "controllers/LamaranController.php";
        (new LamaranController())->update();
        break;

    case 'hapus-lamaran':
        require "controllers/HapusLamaranController.php";
        $ctrl = new HapusLamaranController();
        $ctrl->index();
        break;

    case "cari-lowongan":
        require "controllers/LowonganController.php";
        (new LowonganController($conn))->cari();
        break;

    case "profil":
        require "controllers/ProfileController.php";
        (new ProfileController())->index();
        break;

    case "update-photo":
        require "controllers/ProfileController.php";
        (new ProfileController())->updatePhoto();
        break;

    default:
        require "controllers/DashboardController.php";
        (new DashboardController())->index();
}
