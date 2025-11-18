<?php include "views/template/sidebar.php"; ?>

<?php
// Pastikan $lamaran dan $lowongan dikirim dari controller
?>

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

        .main {
            flex: 1;
            margin-left: 250px;
            padding: 30px 40px;
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
        }

        .section {
            margin-bottom: 40px;
        }

        .section-header {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .job-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0px 2px 8px rgba(0,0,0,0.1);
            padding: 24px;
            transition: 0.2s;
        }

        .job-card:hover {
            transform: translateY(-3px);
            box-shadow: 0px 4px 15px rgba(0,0,0,0.15);
        }

        .company-logo {
            width: 120px;
            height: 120px;
            object-fit: contain;
            margin: auto;
            display: block;
            margin-bottom: 12px;
        }

        .company-name {
            font-size: 15px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 4px;
        }

        .job-title {
            font-size: 14px;
            text-align: center;
            margin-bottom: 8px;
        }

        .job-type, .job-location {
            font-size: 12px;
            text-align: center;
            color: #888;
        }

        .status {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            background-color: #FFF3CD;
            color: #856404;
            text-align: center;
        }

        .detail-btn {
            display: block;
            background-color: #2C5F8D;
            padding: 10px 20px;
            text-align: center;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            margin-top: 12px;
        }
    </style>
</head>

<body>

<div class="main">

    <!-- HEADER -->
    <div class="header">
        <h1>Dashboard</h1>
        <div class="profile-icon">👤</div>
    </div>

    <!-- LAMARAN SAYA -->
    <div class="section">
        <div class="section-header">Lamaran Saya</div>

        <div class="cards-container">

            <?php if ($lamaran->num_rows == 0): ?>
                <p>Belum ada lamaran.</p>
            <?php endif; ?>

            <?php while ($row = $lamaran->fetch_assoc()): ?>
            <div class="job-card">
                <img src="assets/uploads/<?= $row['logo'] ?>" class="company-logo">

                <div class="company-name"><?= $row['perusahaan'] ?></div>
                <div class="job-title"><?= $row['posisi'] ?></div>

                <div class="status"><?= $row['status'] ?></div>

                <a href="index.php?page=detail-lamaran&id=<?= $row['id'] ?>" class="detail-btn">
                    Detail
                </a>
            </div>
            <?php endwhile; ?>

        </div>
    </div>

    <!-- LOWONGAN TERSEDIA -->
    <div class="section">
        <div class="section-header">Lowongan Tersedia</div>

        <div class="cards-container">

            <?php foreach ($lowongan as $job): ?>
            <div class="job-card">
                <img src="assets/uploads/<?= $job['logo'] ?>" class="company-logo">

                <div class="company-name"><?= $job['perusahaan'] ?></div>
                <div class="job-title"><?= $job['posisi'] ?></div>

                <div class="job-type"><?= $job['jenis_pekerjaan'] ?></div>
                <div class="job-location"><?= $job['lokasi'] ?></div>

                <a href="index.php?page=detail-lowongan&id=<?= $job['id'] ?>" class="detail-btn">
                    Detail
                </a>
            </div>
            <?php endforeach; ?>

        </div>

</div>

</body>
</html>
