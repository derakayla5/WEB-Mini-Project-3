<?php
require_once "../../../koneksi.php";

session_start();

if (!($_SESSION['role'] == "admin")) {
  header('Location: ../../../views/auth/pages/login.php');
  exit;
}

// Daftar peran
$roles = ["admin", "pelanggan", "pegawai_toko"]; // Ganti dengan daftar peran yang sesuai

// Tambahkan akun jika formulir disubmit
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password
  $role = $_POST['role'];

  $sql_insert = "INSERT INTO users (Nama, username, password, role) VALUES ('$nama', '$username', '$password', '$role')";

  if ($koneksi->query($sql_insert) === TRUE) {
    header("Location: ");
  } else {
    echo "Error: " . $sql_insert . "<br>" . $koneksi->error;
  }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User List - Admin Panel | Tamusic</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../../assets/css/main.css">
</head>

<body class="">
  <!-- Navbar -->
  <?php
  require "../partials/navbar.php";
  ?>
  <div class="container mt-4">
    <h2>Tambah Akun</h2>
    <form method="POST">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select class="form-select" id="role" name="role" required>
          <option value="" selected disabled>Pilih Role</option>
          <?php foreach ($roles as $role) : ?>
            <option value="<?php echo $role; ?>"><?php echo $role; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Tambah Akun</button>
    </form>
  </div>
  <!-- Footbar -->
  <?php
  require "../partials/footbar.php";
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>