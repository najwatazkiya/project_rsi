<?php
require_once "models/Lamaran.php";
require_once "models/Lowongan.php";
require_once "config/database.php";

class LamaranController {

    public function formTambah() {
        $db = new Database();
        $conn = $db->connect();
        
        $low = (new Lowongan($conn))->getById($_GET['id']);
        include "views/lamaran/tambah.php";
    }

    public function store() {

        // Upload CV
        $cv = "uploads/" . basename($_FILES['cv']['name']);
        move_uploaded_file($_FILES['cv']['tmp_name'], $cv);

        // Upload Dokumen
        $dok = "uploads/" . basename($_FILES['dokumen']['name']);
        move_uploaded_file($_FILES['dokumen']['tmp_name'], $dok);

        $model = new Lamaran();
        $model->insertLamaran([
            'id_lowongan' => $_POST['id_lowongan'],
            'nama' => $_POST['nama'],
            'ttl' => $_POST['ttl'],
            'jk' => $_POST['jk'],
            'alamat' => $_POST['alamat'],
            'cv' => $cv,
            'dok' => $dok
        ]);

        header("Location: index.php");
    }

    public function detail() {
        $db = new Database();
        $conn = $db->connect();
        
        $id = $_GET['id'];

        $lamaranModel = new Lamaran();
        $data = $lamaranModel->getById($id);

        $lowonganModel = new Lowongan($conn);
        $low = $lowonganModel->getById($data['id_lowongan']);

        include "views/lamaran/detail.php";
    }

    public function edit() {
        $db = new Database();
        $conn = $db->connect();
        
        $id = $_GET['id'];

        $model = new Lamaran();
        $data = $model->getById($id);

        $lowModel = new Lowongan($conn);
        $low = $lowModel->getById($data['id_lowongan']);

        include "views/lamaran/edit.php";
    }

        public function update() {
        $id = $_POST['id'];

        // cek jika user upload file baru
        $cv = $_POST['cv_lama'];
        if (!empty($_FILES['cv']['name'])) {
            $cv = "uploads/" . basename($_FILES['cv']['name']);
            move_uploaded_file($_FILES['cv']['tmp_name'], $cv);
        }

        $dok = $_POST['dok_lama'];
        if (!empty($_FILES['dokumen']['name'])) {
            $dok = "uploads/" . basename($_FILES['dokumen']['name']);
            move_uploaded_file($_FILES['dokumen']['tmp_name'], $dok);
        }

        $model = new Lamaran();
        $model->updateLamaran([
            'id' => $id,
            'nama' => $_POST['nama'],
            'ttl' => $_POST['ttl'],
            'jk' => $_POST['jk'],
            'alamat' => $_POST['alamat'],
            'cv' => $cv,
            'dok' => $dok
        ]);

        header("Location: index.php?page=detail-lamaran&id=" . $id);
    }


}
