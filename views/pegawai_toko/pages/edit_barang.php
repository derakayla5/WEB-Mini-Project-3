<?php
require '../../../koneksi.php';

session_start();

if (!($_SESSION['role'] == "pegawai_toko")) {
  header('Location: ../../../views/auth/pages/login.php');
  exit;
}

// Cek apakah ada ID barang yang diterima dari query string
if(isset($_GET['id'])) {
    $id_barang = $_GET['id'];

    // Query untuk mengambil informasi barang dari database
    $query = "SELECT * FROM barang WHERE id = $id_barang";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        // Ambil data barang dari hasil query
        $barang = $result->fetch_assoc();
    } else {
        // Jika tidak ada barang dengan ID yang sesuai, redirect atau tampilkan pesan kesalahan
        echo "Barang tidak ditemukan";
        exit();
    }
} else {
    // Jika tidak ada ID barang yang diteruskan, redirect atau tampilkan pesan kesalahan
    echo "ID barang tidak ditemukan";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../../assets/css/main.css">
</head>

<body>
    <!-- Navbar -->
    <?php require "../partials/navbar.php"; ?>

    <div class="container mt-4">
        <h2 class="fw-bold">Edit Barang</h2>
        <p>Isilah formulir di bawah ini untuk mengedit informasi barang. Pastikan untuk memperbarui semua detail sesuai kebutuhan.</p>
        <hr>
        <form action="../../../process/util_pegawai/edit_barang.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_barang" value="<?php echo $barang['id']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $barang['nama']; ?>" required>
            </div>
            <div class="d-flex">
                <div class="mb-3 me-3 w-50">
                    <label for="jenis_barang" class="form-label">Kategori Barang</label>
                    <select class="form-select" id="jenis_barang" name="jenis_barang" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Gitar" <?php if($barang['jenis_barang'] == 'Gitar') echo 'selected'; ?>>Gitar</option>
                        <option value="Drum" <?php if($barang['jenis_barang'] == 'Drum') echo 'selected'; ?>>Drum</option>
                        <option value="Trompet" <?php if($barang['jenis_barang'] == 'Trompet') echo 'selected'; ?>>Trompet</option>
                        <option value="Biola" <?php if($barang['jenis_barang'] == 'Biola') echo 'selected'; ?>>Biola</option>
                        <option value="Keyboard" <?php if($barang['jenis_barang'] == 'Keyboard') echo 'selected'; ?>>Keyboard</option>
                    </select>
                </div>
                <div class="mb-3 me-3" style="width: 38%;">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $barang['harga']; ?>" required>
                </div>
                <div class="mb-3" style="width: 12%;">
                    <label for="quantity" class="form-label">Stok</label>
                    <div class="input-group border border-black rounded-3">
                        <button class="btn" type="button" id="btn-minus">-</button>
                        <input type="number" class="form-control text-center m-0 p-0" value="<?php echo $barang['stok']; ?>" min="1" max="10" id="stok" name="stok">
                        <button class="btn" type="button" id="btn-plus">+</button>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo $barang['deskripsi']; ?></textarea>
            </div>
            <div class="mb-4">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambahkan</button>
        </form>
    </div>
    <!-- Footbar -->
    <?php require "../partials/footbar.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../../assets/js/numeric-stepper.js"></script>
</body>

</html>
