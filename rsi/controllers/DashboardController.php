<?php
require_once "models/Lamaran.php";
require_once "models/Lowongan.php";
require_once "config/database.php";

class DashboardController {
    public function index() {

        $db = new Database();
        $conn = $db->connect();

        $model = new Lamaran();
        $lamaran = $model->getAll();

        $lowonganModel = new Lowongan($conn);
        $lowongan = $lowonganModel->getAll();
        
        include "views/dashboard.php";
    }
}
