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
        
        .container-cari-lowongan {
            margin-left: 0;          /* hapus jarak kiri */
            padding: 0;
            width: 100%;
        }

        .form-cari {
            width:100%;`
            max-width: 700px; 
            display: flex;
            gap: 10px;
        }

        .form-wrapper {
            width: 100%;
            display: flex;
            justify-content: center; /* form di tengah */
            margin-bottom: 30px;
        }


        .input-cari {
            width: 100%;
            flex: 1;
            padding: 14px 18px;
            border-radius: 12px;
            border: 1px solid #bbb;
            font-size: 17px;
        }

        .btn-cari {
            background: #0d6efd;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
        }

        .subtitle {
            margin-top: 35px;
            margin-bottom: 20px;
            font-size: 22px;
            font-weight: 600;
        }

        .list-lowongan {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card-lowongan {
            width: 260px;
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
        }

        .logo-lowongan {
            width: 60px;
            margin-bottom: 10px;
        }

        .nama-perusahaan {
            font-size: 16px;
            margin: 0;
            font-weight: 600;
        }

        .posisi {
            margin: 5px 0 0;
        }

        .tipe {
            color: gray;
            font-size: 13px;
            margin-top: 5px;
        }

        .btn-detail {
            background: #0d6efd;
            color: white;
            padding: 8px 20px;
            border-radius: 8px;
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
        }

        .no-result {
            font-size: 16px;
            color: gray;
        }

    </style>
</head>

<body>

<div class="main">

    <!-- HEADER -->
    <div class="header">
        <h1>Cari Lowongan</h1>
        <div class="profile-icon">👤</div>
    </div>

    <div class="container-cari-lowongan">

        <!-- FORM PENCARIAN -->
         <div class="form-wrapper">
            <form method="GET" action="index.php" class="form-cari">
                <input type="hidden" name="page" value="cari-lowongan">

                <input 
                    type="text" 
                    name="keyword" 
                    placeholder="nama perusahaan atau posisi"
                    value="<?= $_GET['keyword'] ?? '' ?>"
                    class="input-cari"
                >

                <button type="submit" class="btn-cari">Cari</button>
            </form>
        </div>

        <!-- LIST LOWONGAN -->
        <h3 class="subtitle">Lowongan Tersedia</h3>

        <div class="list-lowongan">

            <?php if (!empty($lowongan)) : ?>
                <?php foreach ($lowongan as $row) : ?>

                    <div class="card-lowongan">

                        <img src="assets/img/no-logo.png" class="logo-lowongan">

                        <h4 class="nama-perusahaan"><?= $row['perusahaan'] ?></h4>

                        <p class="posisi"><?= $row['posisi'] ?></p>

                        <p class="tipe"><?= strtoupper($row['tipe']) ?></p>

                        <a href="index.php?page=detail-lowongan&id=<?= $row['id'] ?>" class="btn-detail">
                            Detail
                        </a>

                    </div>

                <?php endforeach; ?>
            <?php else: ?>

                <p class="no-result">Tidak ada lowongan ditemukan.</p>

            <?php endif; ?>

        </div>
       </div>
   </body>
</html>
