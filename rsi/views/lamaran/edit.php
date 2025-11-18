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
    <a href="index.php?page=detail-lamaran&id=<?= $data['id'] ?>" class="back">← Kembali</a>

    <!-- JOB HEADER (SAMA DENGAN detail.php) -->
    <div class="job-header">
        <img src="<?= $low['logo'] ?>" alt="logo">
        <div>
            <h2><?= $low['perusahaan'] ?></h2>
            <p><?= $low['posisi'] ?></p>
        </div>
    </div>

    <!-- FORM BOX -->
    <div class="form-box">

        <h2>Ubah Lamaran</h2>

        <form action="index.php?page=update-lamaran" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <input type="hidden" name="cv_lama" value="<?= $data['cv'] ?>">
            <input type="hidden" name="dok_lama" value="<?= $data['dokumen'] ?>">

            <div class="form-row">
                <label>Nama Lengkap :</label>
                <input type="text" name="nama" value="<?= $data['nama'] ?>" class="input-box" required>
            </div>

            <div class="form-row">
                <label>Tempat, Tanggal Lahir :</label>
                <input type="text" name="ttl" value="<?= $data['ttl'] ?>" class="input-box" required>
            </div>

            <div class="form-row">
                <label>Jenis Kelamin :</label>
                <select name="jk" class="input-box" required>
                    <option value="Laki-laki" <?= $data['jenis_kelamin']=="Laki-laki" ? "selected":"" ?>>Laki-laki</option>
                    <option value="Perempuan" <?= $data['jenis_kelamin']=="Perempuan" ? "selected":"" ?>>Perempuan</option>
                </select>
            </div>

            <div class="form-row">
                <label>Alamat :</label>
                <input type="text" name="alamat" value="<?= $data['alamat'] ?>" class="input-box" require>
            </div>

            <div class="form-row">
                <label>Curriculum Vitae :</label>
                <input type="file" name="cv" class="input-file">
                <small>CV sekarang: <?= $data['cv'] ?></small>
            </div>

            <div class="form-row">
                <label>Dokumen Pendukung :</label>
                <input type="file" name="dokumen" class="input-file">
                <small>Dokumen sekarang: <?= $data['dokumen'] ?></small>
            </div>

            <!-- BUTTON (SAMA FORMAT DENGAN detail.php) -->
            <div class="button">
                <button type="submit" class="btn-blue">Simpan</button>
                <a href="index.php?page=detail-lamaran&id=<?= $data['id'] ?>" class="btn-red">Batal</a>
            </div>

        </form>

    </div>
</div>


<!-- =============== STYLE SAMA PERSIS DENGAN detail.php =============== -->
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

/* JOB HEADER */
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
    box-shadow: 0px 4px 10px rgba(0,0,0,0.3);
}

.job-header h2 {
    font-size: 22px;
    margin-bottom: 5px;
}

.job-header p {
    color: #777;
}

/* FORM BOX */
.form-box {
    background: #fff;
    padding: 40px;
    border-radius: 22px;
    width: 80%;
    margin: 30px auto;
    box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
}

.form-box h2 {
    font-size: 30px;
    color: #143C6D;
    font-weight: 700;
    text-align: center;
    margin-bottom: 25px;
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

.input-box {
    width: 100%;
    padding: 14px 24px;
    border-radius: 30px;
    border: 1px solid #ccc;
    background: #E5E7EB;
    font-size: 16px;
}

.input-file {
    padding: 14px;
    background: #E5E7EB;
    border-radius: 22px;
    width: 30%;
}

/* BUTTON */
.button {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 30px;
}

.btn-blue {
    background: #143C6D;
    padding: 12px 40px;
    border-radius: 25px;
    color: #fff;
    text-decoration: none;
    border: none;
    font-size: 16px;
}

.btn-red {
    background: #B91C1C;
    padding: 12px 40px;
    border-radius: 25px;
    color: #fff;
    text-decoration: none;
    font-size: 16px;
}

.btn-blue:hover { background: #295ea0ff }
.btn-red:hover { background: #8c1414 }
</style>
