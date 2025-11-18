<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lokerin – Daftar (Pelamar)</title>
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

    .circle {
      position: absolute;
      border-radius: 50%;
      filter: blur(12px);
      opacity: 0.9;
      z-index: 1;
    }
    .c1 { width: 120px; height:120px; background:#254D70; top:520px; right:20px; }
    .c2 { width:170px; height:170px; background:#254D70; bottom:210px; left:70px; }
    .c3 { width:140px; height:140px; background:#B4B6BF; bottom:140px; right:110px; }
    .c4 { width:90px; height:90px; background:#B4B6BF; top:160px; left:60px; }

    .login-wrapper {
      position: relative;
      display: flex;
      width: 830px;
      height: 560px;
      background: #fff;
      border-radius: 38px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.18);
      overflow: hidden;
      z-index: 5;
    }

    .left {
      flex: 1;
      background: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    .blob {
      position: absolute;
      width: 360px;
      height: 360px;
      background: #131D4F;
      border-radius: 60% 50% 70% 52% / 55% 45% 65% 50%;
      opacity: 0.95;
      animation: float 6s ease-in-out infinite;
    }

    .blob::after {
      content: '';
      position: absolute;
      inset: 45px;
      background: #1f2f57;
      border-radius: 55% 45% 60% 45% / 50% 40% 60% 45%;
      opacity: 0.85;
    }

    @keyframes float {
      0%,100% { transform: translateY(0px) scale(1); }
      50% { transform: translateY(-18px) scale(1.03); }
    }

    .left img { width: 280px; z-index: 2; }

    .right {
      flex: 1;
      background: #1f476b;
      color: #fff;
      display: flex;
      flex-direction: column;
      padding: 45px 60px;
      border-top-left-radius: 80px;
    }

    h2 { line-height: 1.2; font-size: 22px; font-weight: 700; margin-bottom: 6px; }

    .toggle-btn-box {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin: 18px 0 28px;
    }

    .toggle-btn {
      padding: 8px 22px;
      border-radius: 20px;
      border: 2px solid transparent;
      cursor: pointer;
      font-weight: 600;
      font-size: 14px;
      transition: 0.3s;
    }

    .active {
      background: #fff;
      color: #1f476b;
      box-shadow: 0 3px 8px rgba(0,0,0,0.15);
    }

    .inactive {
      background: transparent;
      color: #d0d8f0;
      border: 2px solid #d0d8f0;
    }

    .form-group { margin-bottom: 16px; }

    label { font-size: 14px; font-weight: 500; }

    input {
      width: 100%;
      padding: 10px 15px;
      border: none;
      border-radius: 25px;
      margin-top: 6px;
      font-size: 14px;
      outline: none;
      color: #fff;
      background: rgba(255, 255, 255, 0.18);
      backdrop-filter: blur(5px);
    }

    input::placeholder { color: rgba(255,255,255,0.75); }

    .btn-submit {
      width: 100%;
      margin-top: 12px;
      background: linear-gradient(90deg, #254D70, #173b6a);
      padding: 11px;
      border-radius: 25px;
      font-size: 15px;
      color: #fff;
      border: none;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.25); }

    .bottom-text { font-size: 12px; text-align: center; margin-top: 12px; }

    .bottom-text a {
      color: #a5c8ff;
      font-weight: 600;
      text-decoration: none;
    }

  </style>
</head>
<body>

  <div class="circle c1"></div>
  <div class="circle c2"></div>
  <div class="circle c3"></div>
  <div class="circle c4"></div>

  <div class="login-wrapper">

    <div class="left">
      <div class="blob"></div>
      <img src="/lokerin/logo.png" alt="Logo Lokerin" />
    </div>

    <div class="right">
      <h2>Hai!</h2>
      <h2>Senang bertemu denganmu</h2>

      <div class="toggle-btn-box">
        <button type="button" class="toggle-btn active" id="btnPelamar">Pelamar</button>
        <button type="button" class="toggle-btn inactive" id="btnPerusahaan">Perusahaan</button>
      </div>

      <form action="index.php?page=register_action" method="POST">

        <!-- input hidden role -->
        <input type="hidden" name="role" id="roleInput" value="pelamar">

        <div style="display: flex; gap: 15px;">
          <div class="form-group" style="flex: 1;">
            <label>Nama Pengguna</label>
            <input type="text" name="nama" placeholder="Masukkan nama pengguna" required />
          </div>

          <div class="form-group" style="flex: 1;">
            <label>Email</label>
            <input type="email" name="email" placeholder="Masukkan email mu" required />
          </div>
        </div>

        <div style="display: flex; gap: 15px;">
          <div class="form-group" style="flex: 1;">
            <label>Kata Sandi</label>
            <input type="password" name="password" placeholder="Masukkan kata sandi" required />
          </div>

          <div class="form-group" style="flex: 1;">
            <label>Ulangi Kata Sandi</label>
            <input type="password" name="password2" placeholder="Ulangi kata sandi" required />
          </div>
        </div>

        <button class="btn-submit" type="submit">Daftar</button>

        <div class="bottom-text">Sudah punya akun?<br><a href="index.php?page=login">Masuk</a></div>
      </form>
    </div>
  </div>

  <script>
  const btnPelamar = document.getElementById("btnPelamar");
  const btnPerusahaan = document.getElementById("btnPerusahaan");
  const roleInput = document.getElementById("roleInput");

  btnPelamar.addEventListener("click", function () {
    btnPelamar.classList.add("active");
    btnPelamar.classList.remove("inactive");

    btnPerusahaan.classList.add("inactive");
    btnPerusahaan.classList.remove("active");

    roleInput.value = "pelamar";
  });

  btnPerusahaan.addEventListener("click", function () {
    btnPerusahaan.classList.add("active");
    btnPerusahaan.classList.remove("inactive");

    btnPelamar.classList.add("inactive");
    btnPelamar.classList.remove("active");

    roleInput.value = "perusahaan";
  });
</script>

  </body>
</html>
