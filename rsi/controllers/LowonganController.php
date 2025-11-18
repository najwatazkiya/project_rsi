<?php
require_once "models/Lowongan.php";

class LowonganController {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // DETAIL LOWONGAN
    public function detail() {
        $model = new Lowongan($this->conn);
        $data = $model->getById($_GET['id']);

        include "views/lowongan/detail.php";
    }

    // HALAMAN CARI LOWONGAN
    public function cari() {
        $lowongan = new Lowongan($this->conn);

        $keyword = $_GET['keyword'] ?? '';

        if (!empty($keyword)) {
            $data = $lowongan->search($keyword);
        } else {
            $data = $lowongan->getAll();
        }

        // variabel yang dipakai di view
        $lowongan = $data;

        include "views/lowongan/cari.php";
    }
}
