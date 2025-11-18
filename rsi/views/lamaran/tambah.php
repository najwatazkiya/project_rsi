<?php include "views/template/sidebar.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Tambah Lamaran - Lokerin</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            background-color: #E5E7EB;
        }

        /* MAIN CONTENT */
        .main {
            flex: 1;
            margin-left: 250px;
            padding: 30px 40px;
            background-color: #f5f5f5;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 2px solid #ddd;
        }

        .header h1 {
            font-size: 32px;
            color: #2C5F8D;
            font-weight: 700;
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

        .back {
            text-decoration: none;
            color: #555;
            font-size: 16px;
            margin-top: 10px;
            display: inline-block;
        }

        .job-header {
            display: flex;
            align-items: center;
            margin-bottom: 32px;
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

        /* FORM WRAPPER */
        .form-box {
            background: #ffffff;
            padding: 40px;
            border-radius: 22px;
            width: 80%;
            margin: 30px auto;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
        }

        .form-box h2 {
            text-align: center;
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #143C6D;
        }

        label {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        select,
        input[type="file"] {
            width: 100%;
            padding: 14px 24px;
            background: #E5E7EB;
            border-radius: 30px;
            border: none;
            margin-bottom: 20px;
            font-size: 15px;
        }

        /* BUTTONS */
        .button {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .btn-green,
        .btn-red {
            padding: 12px 40px;
            border-radius: 25px;
            font-size: 16px;
            text-decoration: none;
            border: none;
            color: white;
            cursor: pointer;
        }

        .btn-green { background-color: #16A34A; }
        .btn-red { background-color: #B91C1C; }

        .btn-green:hover { background-color: #0f7a38; }
        .btn-red:hover { background-color: #8c1414; }
    </style>
</head>

<body>
    <div class="main">

        <!-- HEADER -->
        <div class="header">
            <h1>Dashboard</h1>
            <a href="profil.php">
                <img src="profile1.jpg" class="profile-icon">
            </a>
        </div>

        <!-- LINK KEMBALI -->
        <a href="index.php?page=detail-lowongan&id=<?= $low['id'] ?>" class="back">← Kembali</a>

        <!-- FORM -->
        <div class="job-header">
            <img src="<?= $low['logo'] ?>" alt="logo">
            <div>
                <h2><?= $low['perusahaan'] ?></h2>
                <p><?= $low['posisi'] ?></p>
            </div>
        </div>

        <div class="form-box">
            <h2>Tambah Lamaran</h2>

            <form action="index.php?page=store-lamaran" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id_lowongan" value="<?= $low['id'] ?>">

                <label>Nama Lengkap :</label>
                <input type="text" name="nama" required>

                <label>Tempat, Tanggal Lahir :</label>
                <input type="text" name="ttl" required>

                <label>Jenis Kelamin :</label>
                <select name="jk" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>

                <label>Alamat :</label>
                <input type="text" name="alamat" required>

                <label>Surat Lamaran :</label>
                <input type="file" name="cv" required>

                <label>Curriculum Vitae :</label>
                <input type="file" name="dokumen" required>

                <div class="button">
                    <button type="submit" class="btn-green">Kirim</button>
                    <a href="index.php?page=detail-lowongan&id=<?= $low['id'] ?>" class="btn-red">Batal</a>
                </div>

            </form>
        </div>

    </div>
</body>
</html>
