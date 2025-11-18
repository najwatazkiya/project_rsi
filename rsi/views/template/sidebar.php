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

        /* Sidebar */
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #254D70 0%, #1a3d5c 100%);
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: fixed;
            left: 0;
            top: 0;
        }

        .sidebar .logo {
            text-align: center;
            padding: 30px 20px;
        }

        .sidebar .logo img {
            width: 100%;
            max-width: 150px;
            height: auto;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .sidebar .logo h3 {
            font-size: 20px;
            font-weight: 600;
        }

        .sidebar ul {
            list-style: none;
            padding: 0 15px;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 12px 20px;
            border-radius: 12px;
            transition: 0.3s;
            font-size: 15px;
        }

        .sidebar ul li a.active,
        .sidebar ul li a:hover {
            background-color: white;
            color: #254D70;
        }

        .sidebar ul li a i {
            margin-right: 12px;
            font-size: 18px;
        }

        .logout {
            background-color: #A91212;
            color: white;
            text-align: center;
            padding: 12px 30px;
            cursor: pointer;
            text-decoration: none;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px;
            font-size: 16px;
            transition: 0.3s;
        }

        .logout:hover {
            background-color: #c9302c;
        }

    </style>
</head>

<body>
    <div class="sidebar">
        <div>
        <div class="logo">
            <img src="assets/uploads/lokerin.png" class="logo-img">
        </div>

        <ul>
            <li class="menu-item <?= ($page == 'dashboard') ? 'active' : '' ?>">
                <a href="index.php?page=dashboard">
                    <span class="icon">🏠</span>
                    Dashboard
                </a>
            </li>

            <li class="menu-item <?= ($page == 'cari-lowongan') ? 'active' : '' ?>">
                <a href="index.php?page=cari-lowongan">
                    <span class="icon">🔍 </span>
                    Cari Lowongan
                </a>
            </li>

            <li class="menu-item <?= ($page == 'lamaran-saya') ? 'active' : '' ?>">
                <a href="index.php?page=lamaran-saya">
                    <span class="icon">📄</span>
                    Riwayat Lamaran
                </a>
            </li>

            <li class="menu-item <?= ($page == 'profil') ? 'active' : '' ?>">
                <a href="index.php?page=profil">
                    <span class="icon">👤</span>
                    Profil
                </a>
            </li>
        </ul>
        </div>

        <a href="index.php?page=logout" class="logout"><strong>⬅ Keluar</strong></a>
    </div>
    
</body>
</html>
