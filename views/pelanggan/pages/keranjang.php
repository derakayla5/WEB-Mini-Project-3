<?php
require ("../../../koneksi.php");

$query = "SELECT k.*, b.harga AS harga_satuan FROM keranjang k JOIN barang b ON k.nama_barang = b.nama";

$result = mysqli_query($koneksi, $query);

session_start();

if (!($_SESSION['role'] == "pelanggan")) {
  header('Location: ../../../views/auth/pages/login.php');
  exit;
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nama Barang | Tamusic</title>

  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../../assets/css/main.css">
</head>

<body class="">
  <!-- Navbar -->
  <?php require "../partials/navbar.php"; ?>

  <div class="container mt-4">
    <h2 class="fw-bold mb-5">Keranjang</h2>

    <div class="d-flex mt-4">
      <!-- Isi keranjang -->
      <div class="w-75 me-4">
        <?php
        // Perulangan untuk menampilkan daftar barang
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <form action="../../../process/util_pelanggan/hapus_barang.php" method="post">
            <div class="d-flex align-items-center">
              <div class="me-3">
                <?php
                echo '<img class="square-img" src="../../../storage/img_barang/' . $row['gambar_barang'] . '" alt="Product Image" style="max-width: 175px; height: auto;">';
                ?>
              </div>

              <div class="d-flex align-items-start flex-column">
                <h5>
                  <?= $row['nama_barang'] ?>
                </h5>

                <!-- Quantity -->
                <div class="d-flex align-items-center mb-2">
                  Qty:
                  <div class="ms-2">
                    <input type="number" class="form-control form-control-sm text-center" value=<?= $row['jumlah_barang'] ?> min="1"
                      max="10" id="stok" name="stok" data-harga="<?= $row['harga_satuan'] ?>">
                  </div>
                </div>

                <!-- Harga -->
                <div class="mb-2">
                  <div>Harga satuan: <span class="fw-bold">
                      <?= $row['harga_satuan'] ?>
                    </span></div>
                </div>
                <!-- Isi form -->
                <button type="submit" name="aksi" value="hapus" class="btn btn-danger">Hapus</button>
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
              </div>
            </div>
          </form>
          <hr>
        <?php } ?>
      </div>

      <!-- Ringkasan Belanja -->
      <div class="w-25">
        <div class="card rounded-3 border-0 position-sticky" style="top: 40px;">
          <div class="card-body pt-0">
            <h4 class="card-title fw-semibold mb-3 fw-bold">Ringkasan Belanja</h4>

            <!-- Total -->
            <div class="mb-3">
              Total: <span id="subtotal" class="fw-bold fs-5">Rp0</span>
            </div>

            <!-- Beli -->
            <a href="#"
              class="btn btn-warning rounded-3 fw-semibold d-flex align-items-center justify-content-center mb-3">
              <i class="fa-solid fa-bag-shopping me-2 fa-lg"></i> Beli
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footbar -->
  <?php require "../partials/footbar.php"; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <script src="../../../assets/js/numeric-stepper.js"></script>
  <script src="../../../assets/js/keranjang.js"></script>
</body>

</html>
