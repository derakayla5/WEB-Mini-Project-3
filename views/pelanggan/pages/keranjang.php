<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nama Barang | Tamusic</title>

  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <?php for ($i = 0; $i < 8; $i++) { ?>
          <div class="d-flex">
            <div class="me-3">
              <img src="https://dummyimage.com/144x144/000/ffffff" alt="" style="height: 100px;">
            </div>

            <div class="">
              <h5>Ini Nama Alat Musik Aneh</h5>

              <!-- Quantity -->
              <div class="d-flex align-items-center mb-2">
                <div class="input-group w-50 border border-black rounded-3 input-group-sm">
                  <button class="btn" type="button" id="btn-minus">-</button>
                  <input type="number" class="form-control text-center m-0 p-0" value="1" min="1" max="10" id="quantity">
                  <button class="btn" type="button" id="btn-plus">+</button>
                </div>
              </div>

              <!-- Harga -->
              <div class="fw-bold">
                Rp69.000.000
              </div>
            </div>
          </div>

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
              Total: <span class="fw-bold fs-5">Rp69.690.000</span>
            </div>

            <!-- Beli -->
            <a href="#" class="btn btn-warning rounded-3 fw-semibold d-flex align-items-center justify-content-center mb-3">
              <i class="fa-solid fa-bag-shopping me-2 fa-lg"></i> Beli
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footbar -->
  <?php require "../partials/footbar.php"; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="../../../assets/js/numeric-stepper.js"></script>
</body>

</html>
