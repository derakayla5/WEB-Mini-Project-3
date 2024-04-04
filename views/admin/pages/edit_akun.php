<?php
require_once "../../../koneksi.php";

session_start();

if (!($_SESSION['role'] == "admin")) {
  header('Location: ../../../views/auth/pages/login.php');
  exit;
}

// Daftar peran
$roles = ["admin", "pelanggan", "pegawai_toko"]; // Ganti dengan daftar peran yang sesuai

// Ambil ID akun yang akan diedit
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Ambil data akun dari database
  $sql_select = "SELECT * FROM users WHERE id = $id";
  $result = $koneksi->query($sql_select);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama = $row['Nama'];
    $username = $row['username'];
    $role = $row['role'];
  } else {
    echo "Data akun tidak ditemukan.";
  }
}

// Update akun jika formulir disubmit
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $role = $_POST['role'];

  // Perbarui data akun ke dalam database
  $sql_update = "UPDATE users SET Nama='$nama', username='$username', role='$role' WHERE id=$id";

  if ($koneksi->query($sql_update) === TRUE) {
    header("Location: dashboard.php");
  } else {
    echo "Error: " . $sql_update . "<br>" . $koneksi->error;
  }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Akun - Admin Panel | Tamusic</title>

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
    <h2>Edit Akun</h2>
    <form method="POST">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
      </div>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" required>
      </div>
      <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select class="form-select" id="role" name="role" required>
          <?php foreach ($roles as $r) : ?>
            <option value="<?php echo $r; ?>" <?php if ($role == $r) echo 'selected'; ?>><?php echo $r; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Simpan Perubahan</button>
    </form>
  </div>
  <!-- Footbar -->
  <?php
  require "../partials/footbar.php";
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>