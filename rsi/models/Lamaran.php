<?php
require_once "config/database.php";

class Lamaran {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->connect();
    }

    public function insertLamaran($data) {
        $id_low = $data['id_lowongan'];
        $nama = $data['nama'];
        $ttl = $data['ttl'];
        $jk = $data['jk'];
        $alamat = $data['alamat'];
        $cv = $data['cv'];
        $dok = $data['dok'];

        $sql = "INSERT INTO lamaran (id_lowongan, nama, ttl, jenis_kelamin, alamat, cv, dokumen)
                VALUES ('$id_low', '$nama', '$ttl', '$jk', '$alamat', '$cv', '$dok')";
        return $this->conn->query($sql);
    }

    public function getAll() {
        return $this->conn->query("
            SELECT lamaran.*, lowongan.posisi, lowongan.perusahaan 
            FROM lamaran 
            JOIN lowongan ON lamaran.id_lowongan = lowongan.id
        ");
    }

    public function getById($id) {
    $query = "SELECT lamaran.*, lowongan.perusahaan, lowongan.posisi
              FROM lamaran
              JOIN lowongan ON lamaran.id_lowongan = lowongan.id
              WHERE lamaran.id = '$id'";

    return $this->conn->query($query)->fetch_assoc();
    }

    public function updateLamaran($data) {
        $id = $data['id'];
        $nama = $data['nama'];
        $ttl = $data['ttl'];
        $jk = $data['jk'];
        $alamat = $data['alamat'];
        $cv = $data['cv'];
        $dok = $data['dok'];

        $sql = "UPDATE lamaran SET 
                nama='$nama',
                ttl='$ttl',
                jenis_kelamin='$jk',
                alamat='$alamat',
                cv='$cv',
                dokumen='$dok'
                WHERE id='$id'";

        return $this->conn->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM lamaran WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

}
