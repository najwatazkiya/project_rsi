<?php include "views/template/sidebar.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Dashboard - Lokerin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            background-color: #f5f5f5;
        }

        /* Main Content */
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
            margin-bottom: 30px;
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
            color: #666;
            display: inline-block;
            margin-bottom: 10px;
            font-size : 16px;
        }

        .job-card {
            background-color: white;
            border-radius: 15px;
            padding: 28px;
            box-shadow: 0px 3px 8px rgba(0,0,0,0.1);
            font-size : 16px;
            margin-top: 10px;
            margin-left: 80px;
            margin-right: 80px;
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

        .add-btn {
            background-color: #1E4C8B;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-container {
            text-align: right;
            margin-bottom: 20px;
        }

        .add-btn:hover {
            background-color: #153a6a;
        }

        .section-title {
            font-weight: bold;
            margin-top: 10px;
        }

        .job-detail {
            color: #333;
            font-size: 16px;
        }

        .job-detail ul {
            margin-left: 20px;
            margin-top: 5px;
        }

        .footer-info {
            margin-top: 20px;
            font-size: 16px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="header">
            <h1>Dashboard</h1>
            <a href="profil.php" style="text-decoration: none;">
                <img src="profile1.jpg" class="profile-icon">
            </a>
        </div>

        <a href="index.php" class="back">← Kembali</a>

        <div class="btn-container">
            <a href="index.php?page=tambah-lamaran&id=<?= $data['id'] ?>" class="add-btn">➕ Tambah Lamaran</a>
        </div>

        <div class="job-header">
            <img src="<?= $data['logo'] ?>" alt="logo">
            <div>
                <h2><?= $data['perusahaan'] ?></h2>
                <p><?= $data['posisi'] ?></p>
            </div>
        </div>

        <div class="job-card">
            <div class="job-detail">
                <h3>Deskripsi :</h3>
                <ul>
                    <p><?= nl2br($data['deskripsi']) ?></p>
                </ul>
                <br>

                <h3>Kualifikasi yang Dibutuhkan:</h3>
                <ul>
                    <p class="section-tittle"><?= nl2br($data['kualifikasi']) ?></p>
                </ul>
                <br>

                <h3>Gaji :</h3>
                <ul>
                    <p><?= $data['gaji'] ?></p>
                </ul>
                <br>

                <h3>Lokasi :</h3>
                <ul>
                    <p><?= nl2br($data['lokasi']) ?></p>
                </ul>
                <br>

                <h3>Kontak :</h3>
                <ul>
                    <p><?= nl2br($data['kontak']) ?></p>
                </ul>
                <br>
            </div>
        </div>
    </div>
</body>
</html>