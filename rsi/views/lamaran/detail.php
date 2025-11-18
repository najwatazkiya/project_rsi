<?php include "views/template/sidebar.php"; ?>

<div class="main">

    <!-- HEADER -->
    <div class="header">
        <h1>Dashboard</h1>
        <a href="profil.php">
            <img src="profile1.jpg" class="profile-icon">
        </a>
    </div>

    <!-- KEMBALI -->
    <a href="index.php?page=lamaran-saya" class="back">← Kembali</a>

    <div class="job-header">
            <img src="<?= $low['logo'] ?>" alt="logo">
            <div>
                <h2><?= $low['perusahaan'] ?></h2>
                <p><?= $low['posisi'] ?></p>
            </div>
    </div>

    <!-- DETAIL LAMARAN -->
    <div class="status-row">
        <p class="status-badge">Status : <?= $data['status'] ?? "Berkas Belum Ditinjau" ?></p>
    </div>

    <div class="form-box">
        
        <h2>Detail Lamaran</h2>

        <!-- ISI FORM (READ ONLY) -->
        <div class="form-row">
            <label>Nama Lengkap :</label>
            <div class="value-box"><?= $data['nama'] ?></div>
        </div>

        <div class="form-row">
            <label>Tempat, Tanggal Lahir :</label>
            <div class="value-box"><?= $data['ttl'] ?></div>
        </div>

        <div class="form-row">
            <label>Jenis Kelamin :</label>
            <div class="value-box"><?= $data['jenis_kelamin'] ?></div>
        </div>

        <div class="form-row">
            <label>Alamat :</label>
            <div class="value-box"><?= $data['alamat'] ?></div>
        </div>

        <div class="form-row">
            <label>Curriculum Vitae :</label>
            <a href="<?= $data['cv'] ?>" target="_blank" class="file-btn">Lihat CV</a>
        </div>

        <div class="form-row">
            <label>Dokumen Pendukung :</label>
            <a href="<?= $data['dokumen'] ?>" target="_blank" class="file-btn">Lihat Dokumen</a>
        </div>

        <!-- BUTTON -->
        <div class="button">
            <a href="index.php?page=edit-lamaran&id=<?= $data['id'] ?>" class="btn-green">Ubah</a>

            <a href="#" class="btn-red" onclick="openDeleteModal(<?= $data['id'] ?>)">Hapus</a>
        </div>

    </div>

</div>


<!-- ================== STYLE (SAMA DENGAN TAMBAH.PHP) ================== -->
<style>
.main {
    flex: 1;
    margin-left: 250px;
    padding: 30px 40px;
    background-color: #f5f5f5;
}

/* HEADER */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 20px;
    margin-bottpm: 20px;
    border-bottom: 2px solid #ddd;
}

.header h1 {
    font-size: 32px;
    font-weight: 700;
    color: #2C5F8D;
}

.profile-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #2C5F8D;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    cursor: pointer;
}

/* BACK */
.back {
    text-decoration: none;
    color: #555;
    font-size: 16px;
    margin-top: 30px;
    display: inline-block;
}

.status-row {
    width: 80%;
    margin: 0 auto;
    display: flex;
    justify-content: flex-end; /* geser ke kanan */
}

/* FORM BOX */
.form-box {
    background: #fff;
    padding: 40px;
    border-radius: 22px;
    width: 80%;
    margin: 10px auto;
    box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
}

.form-box h2 {
    font-size: 30px;
    color: #143C6D;
    font-weight: 700;
    text-align: center;
    margin-bottom: 25px;
}

/* Perusahaan & Logo */
.job-header {
    display: flex;
    align-items: center;
    margin-bottom: 16px;
    font-size: 20px;
    margin-left: 240px;
}

.job-header img {
    width: 160px;
    height: 160px;
    margin-right: 60px;
    border-radius: 100%;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
}

.job-header h2 {
    font-size: 22px;
    margin-bottom: 5px;
}

.job-header p {
    color: #777;
}

/* STATUS */
.status-badge {
    display: inline-block;
    margin: 10px;
    padding: 8px 16px;
    background: #F0E68C;
    border-radius: 12px;
}

/* FORM ROW */
.form-row {
    margin-bottom: 20px;
}

label {
    font-size: 16px;
    font-weight: 500;
    display: block;
    margin-bottom: 6px;
}

/* VALUE BOX (READ ONLY) */
.value-box {
    padding: 14px 24px;
    background: #E5E7EB;
    border-radius: 30px;
}

/* FILE BUTTON */
.file-btn {
    padding: 10px 20px;
    background: #E5E7EB;
    border-radius: 30px;
    color: #222;
    text-decoration: none;
}

/* BUTTON BOX */
.button {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 30px;
}

.btn-green,
.btn-red {
    padding: 12px 40px;
    border-radius: 25px;
    font-size: 16px;
    color: white;
    text-decoration: none;
}

.btn-green { background: #16A34A; }
.btn-red   { background: #B91C1C; }

.btn-green:hover { background: #0f7a38; }
.btn-red:hover   { background: #8c1414; }

.modal {
    display: none; 
    position: fixed;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.6);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: white;
    padding: 30px;
    width: 400px;
    border-radius: 20px;
    text-align: center;
}

.modal-buttons {
    margin-top: 32px;
    display: flex;
    justify-content: center;
    gap: 15px;
}

</style>

<script>
    let deleteId = null;

    function openDeleteModal(id) {
        console.log("openDeleteModal id =", id);
        deleteId = id;
        document.getElementById("deleteModal").style.display = "flex";
    }

    function closeDeleteModal() {
        document.getElementById("deleteModal").style.display = "none";
    }

    document.getElementById("confirmDelete").onclick = function() {
        console.log("confirmDelete, deleteId =", deleteId);
        window.location.href = "index.php?page=hapus-lamaran&id=" + deleteId;
    };
</script>

<div id="deleteModal" class="modal">
    <div class="modal-content">
        <h3>Konfirmasi Hapus</h3>
        <p>Apakah Anda yakin ingin menghapus lamaran ini?</p>

        <div class="modal-buttons">
            <button class="btn-green" id="confirmDelete">Ya</button>
            <button class="btn-red" onclick="closeDeleteModal()">Tidak</button>
        </div>
    </div>
</div>


