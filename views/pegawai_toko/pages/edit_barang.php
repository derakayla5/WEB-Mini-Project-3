<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Barang | Tamusic</title>

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
    <h2 class="fw-bold">Edit Barang</h2>
    <p>Isilah formulir di bawah ini untuk mengedit informasi barang. Pastikan untuk memperbarui semua detail sesuai kebutuhan.</p>

    <hr>
    
    <form action="proses_tambah_barang.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
      </div>

      <div class="d-flex">
        <div class="mb-3 me-3 w-50">
          <label for="jenis_barang" class="form-label">Kategori Barang</label>
          <select class="form-select" id="jenis_barang" name="jenis_barang" required>
            <option value="">Pilih Kategori</option>
            <option value="Gitar">Gitar</option>
            <option value="Drum">Drum</option>
            <option value="Trompet">Trompet</option>
            <option value="Biola">Biola</option>
            <option value="Keyboard">Keyboard</option>
          </select>
        </div>

        <div class="mb-3 me-3" style="width: 38%;">
          <label for="harga" class="form-label">Harga</label>
          <input type="number" class="form-control" id="harga" name="harga" required>
        </div>

        <div class="mb-3" style="width: 12%;">
          <label for="quantity" class="form-label">Stok</label>
          <div class="input-group border border-black rounded-3 ">
            <button class="btn" type="button" id="btn-minus">-</button>
            <input type="number" class="form-control text-center m-0 p-0" value="1" min="1" max="10" id="quantity">
            <button class="btn" type="button" id="btn-plus">+</button>
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
      </div>

      <div class="mb-4">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar" required>
      </div>

      <button type="submit" class="btn btn-primary">Tambahkan</button>
    </form>
  </div>

  <!-- Footbar -->
  <?php
  require "../partials/footbar.php";
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="../../../assets/js/numeric-stepper.js"></script>
</body>

</html>