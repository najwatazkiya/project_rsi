<?php include "views/template/sidebar.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>

    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: #f7f7f7;
            margin: 0;
        }

        .main {
            padding: 40px;
            margin-left: 260px;
        }

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
        .back-link {
            text-decoration: none;
            color: #1f3558;
            font-size: 14px;
        }

        .profile-wrapper {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-top: 20px;
        }

        .profile-card {
            background: #ffffff;
            width: 650px;
            padding: 35px 40px;
            border-radius: 18px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .profile-top {
            text-align: center;
        }

        .profile-photo {
            width: 95px;
            height: 95px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #e5e5e5;
        }

        .profile-name {
            margin-top: 12px;
            color: #1f3558;
            font-size: 22px;
            font-weight: 600;
        }

        .divider {
            margin: 20px 0;
            border: none;
            height: 1px;
            background: #e0e0e0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 25px;
            font-size: 20px;
            font-weight: 600;
            color: #1f3558;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            font-size: 14px;
            margin-bottom: 6px;
            display: block;
            color: #444;
        }

        .form-group input[type="text"],
        .form-group input[type="email"] {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ddd;
            background: #f3f3f3;
        }

        .form-group input[type="file"] {
            padding: 8px;
            width: 100%;
        }

        .update-btn {
            width: 100%;
            margin-top: 15px;
            padding: 14px;
            border: none;
            background: #1f3558;
            color: white;
            font-size: 15px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.2s;
        }

        .update-btn:hover {
            background: #162742;
        }
    </style>
</head>

<body>

<div class="main">

    <div class="header">
        <h1>Profil</h1>
    </div>

    <!-- KEMBALI -->
    <a href="index.php?page=lamaran-saya" class="back">← Kembali</a>

    <div class="profile-wrapper">

        <div class="profile-card">

            <div class="profile-top">
                <img 
                    src="<?= $user['photo'] ? $user['photo'] : 'assets/default_profile.png' ?>" 
                    class="profile-photo"
                    alt="Foto Profil"
                >
                <h2 class="profile-name"><?= htmlspecialchars($user['nama']) ?></h2>
            </div>

            <hr class="divider">

            <h3 class="section-title">Profil Saya</h3>

            <!-- ========================= -->
            <!-- FORM UPDATE FOTO + DATA -->
            <!-- ========================= -->
            <form action="index.php?page=update-photo" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label>Nama :</label>
                    <input type="text" value="<?= htmlspecialchars($user['nama']) ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Email :</label>
                    <input type="email" value="<?= htmlspecialchars($user['email']) ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Role :</label>
                    <input type="text" value="<?= htmlspecialchars($user['role']) ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Foto Profil Baru :</label>
                    <input type="file" name="photo" accept="image/*">
                </div>

                <button type="submit" class="update-btn">Perbarui Foto</button>

            </form>

        </div>

    </div>
</div>

</body>
</html>
