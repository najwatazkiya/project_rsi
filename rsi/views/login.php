<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lokerin – Masuk</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }

    body {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: radial-gradient(circle at 40% 50%, #162245 20%, #dfe3ea 40%, #ffffff 75%);
      overflow: hidden;
    }

    /* Soft floating circles */
    .circle {
      position: absolute;
      border-radius: 50%;
      filter: blur(12px);
      opacity: 0.9;
      z-index: 1;
    }
    .c1 { width: 120px; height:120px; background:#254D70; top: 500px; right: 20px; }
    .c2 { width: 160px; height:160px; background:#254D70; left:70px; bottom:240px; }
    .c3 { width:130px; height:130px; background:#B4B6BF; right:100px; bottom:160px; }
    .c4 { width:90px; height:90px; background:#B4B6BF; left:40px; top:160px; }

    .login-wrapper {
      position: relative;
      display: flex;
      width: 830px;
      height: 500px;
      background: #fff;
      border-radius: 38px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.18);
      overflow: hidden;
      z-index: 5;
    }

    /* Left */
    .left {
      flex: 1.2;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #fff;
      position: relative;
      overflow: hidden;
    }

    .blob {
      position: absolute;
      width: 330px;
      height: 330px;
      background: #131D4F;
      border-radius: 60% 50% 70% 52% / 55% 45% 65% 50%;
      opacity: 0.95;
      animation: float 6s ease-in-out infinite;
    }

    .blob::after {
      content: '';
      position: absolute;
      inset: 38px;
      background: #1f2f57;
      border-radius: 55% 45% 60% 45% / 50% 40% 60% 45%;
      opacity: 0.85;
    }

    @keyframes float {
      0%,100% { transform: translateY(0px) scale(1); }
      50% { transform: translateY(-18px) scale(1.03); }
    }

    .left img { width: 260px; z-index: 2; }

    /* Right */
    .right {
      flex: 1;
      background: #1f476b;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 0 60px;
      border-top-left-radius: 80px;
    }

    h2 {
      font-size: 26px;
      font-weight: 700;
      margin-bottom: 30px;
    }

    .form-group { margin-bottom: 18px; }

    label { font-size: 14px; font-weight: 500; }

    input {
      width: 100%;
      padding: 10px 15px;
      margin-top: 5px;
      border-radius: 25px;
      border: none;
      font-size: 14px;
      outline: none;
      color: #fff;
      background: rgba(255,255,255,0.18);
      backdrop-filter: blur(5px);
    }

    input::placeholder { color: rgba(255,255,255,0.75); }

    .btn {
      width: 100%;
      margin-top: 10px;
      padding: 11px;
      border-radius: 25px;
      border: none;
      background: linear-gradient(90deg, #254D70, #173b6a);
      color: #fff;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.25); }

    .bottom-text { margin-top: 15px; text-align: center; font-size: 12px; }

    .bottom-text a { color: #a5c8ff; font-weight: 600; text-decoration: none; }

    .bottom-text a:hover { text-decoration: underline; }

  </style>
</head>
<body>

  <div class="circle c1"></div>
  <div class="circle c2"></div>
  <div class="circle c3"></div>
  <div class="circle c4"></div>

  <div class="login-wrapper">

    <!-- Left -->
    <div class="left">
      <div class="blob"></div>
      <img src="/lokerin/logo.png" alt="Logo Lokerin">
    </div>

    <!-- Right -->
    <div class="right">
      <h2>Masuk</h2>

      <form action="index.php?page=login_action" method="POST">
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" placeholder="Masukkan email mu" required />
        </div>

        <div class="form-group">
          <label>Kata Sandi</label>
          <input type="password" name="password" placeholder="Masukkan kata sandi" required />
        </div>

        <button type="submit" class="btn">Masuk</button>

        <div class="bottom-text">
          Belum punya akun?<br>
          <a href="index.php?page=register">Daftar Sekarang</a>
        </div>
      </form>
    </div>

  </div>

</body>
</html>