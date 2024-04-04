<?php
session_start();

if (isset($_SESSION['login'])) {
  if ($_SESSION['role'] == 'admin') {
    header("Location: ../../admin/pages/dashboard.php");
    exit();
  } elseif ($_SESSION['role'] == 'pegawai_toko') {
    header("Location: ../../pegawai_toko/pages/semua_barang.php");
    exit();
  } elseif ($_SESSION['role'] == 'pelanggan') {
    header("Location: ../../pelanggan/pages/beranda.php");
    exit();
  }
}
?>


<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | Tamusic</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
</head>

<body class="bg-body-tertiary">
  <main class="d-flex justify-content-center align-items-center flex-column" style="height: 100vh;">
    <h2 class="card-title text-center mb-5 fw-bold">INI LOGO</h2>

    <div class="card shadow rounded border-0 rounded-3" style="width: 22rem">
      <div class="card-body m-3">
        <h4 class="card-subtitle mb-4 fw-bold" id="card-subtitle">REGISTER</h4>

        <form method="POST" action="../../../process/auth/register.php" id="loginForm">
          <!-- Nama -->
          <div class="mb-3">
            <label for="nama" class="form-label fw-semibold text-body-secondary">Nama</label>
            <input type="text" class="form-control" name="nama">
          </div>

          <!-- Username-->
          <div class="mb-3">
            <label for="username" class="form-label fw-semibold text-body-secondary">Username</label>
            <input type="text" class="form-control" name="username">
          </div>

          <!-- Password-->
          <div class="mb-4">
            <label for="password" class="form-label fw-semibold text-body-secondary">Password</label>
            <input type="password" class="form-control" name="password">
          </div>

          <!-- Konfirmasi password-->
          <div class="mb-4">
            <label for="konfirmasi_password" class="form-label fw-semibold text-body-secondary">Konfirmasi Password</label>
            <input type="password" class="form-control" name="konfirmasi_password">
          </div>

          <!-- Tombol register -->
          <button class="btn btn-primary w-100 py-2 mb-3" type="submit" name="login">Register</button>

          <p class="m-0">Sudah punya akun? Silakan <a href="login.php">login</a></p>
        </form>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>