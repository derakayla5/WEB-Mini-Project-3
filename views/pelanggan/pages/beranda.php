<?php
require_once "../../../koneksi.php";

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
  <title>Beranda | Tamusic</title>

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

  <!-- Slide -->
  <div class="mt-4">
    <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <?php
          // Query untuk mendapatkan data carousel
          $queryCarousel = "SELECT * FROM carousel_images";
          $resultCarousel = mysqli_query($koneksi, $queryCarousel);
          $indicatorIndex = 0;

          // Iterasi melalui hasil query untuk menampilkan indicator
          while ($rowCarousel = mysqli_fetch_assoc($resultCarousel)) {
            // Menampilkan indicator untuk setiap gambar carousel
            $active = $indicatorIndex == 0 ? 'active' : '';
          ?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $indicatorIndex ?>" class="<?= $active ?>" aria-current="true" aria-label="Slide <?= $indicatorIndex + 1 ?>"></button>
          <?php
            $indicatorIndex++;
          }
          ?>
        </div>
        <div class="carousel-inner">
          <?php
          // Set ulang indeks untuk mengatur gambar pertama sebagai aktif
          mysqli_data_seek($resultCarousel, 0);
          $carouselIndex = 0;

          // Iterasi melalui hasil query untuk menampilkan gambar carousel
          while ($rowCarousel = mysqli_fetch_assoc($resultCarousel)) {
            // Menampilkan gambar carousel dalam tag <img>
            $active = $carouselIndex == 0 ? 'active' : '';
          ?>
            <div class="carousel-item <?= $active ?>">
              <img src="../../../storage/carousel/<?= $rowCarousel["image_url"] ?>" class="d-block w-100" alt="...">
            </div>
          <?php
            $carouselIndex++;
          }
          ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>

  <!-- Barang paling top -->
  <div class="mt-5" id="pilihanTop">
    <div class="container">
      <h4 class="fw-bold horizontal-line">ALAT MUSIK PALING TOP</h4>

      <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-5 g-4">
          <?php
          $queryTop = "SELECT * FROM barang ORDER BY rating DESC LIMIT 5";
          $resultTop = mysqli_query($koneksi, $queryTop);

          while ($rowTop = mysqli_fetch_assoc($resultTop)) {
          ?>
            <div class="col">
              <div class="card">
                <img src="../<?= $rowTop["gambar"] ?>" class="card-img-top square-img" alt="...">
                <div class="card-body">
                  <!-- Nama barang -->
                  <h5 class="card-title mb-2"><?= $rowTop["nama"] ?></h5>

                  <!-- Rating -->
                  <div class="mb-2">
                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                    <?= $rowTop["rating"] ?>
                  </div>

                  <!-- Harga -->
                  <p class="m-0 fw-bold fs-5"><?= number_format($rowTop["harga"], 0, ',', '.')  ?></p>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Barang terbaru -->
  <div class="mt-5">
    <div class="container">
      <h4 class="fw-bold horizontal-line">ALAT MUSIK TERBARU</h4>
      <h6>Lihat Semua Barang <i class="fa-solid fa-chevron-right"></i></h6>

      <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-5 g-4">
          <?php
          $queryNew = "SELECT * FROM barang ORDER BY created_at DESC LIMIT 5";
          $resultNew = mysqli_query($koneksi, $queryNew);

          while ($rowNew = mysqli_fetch_assoc($resultNew)) {
          ?>
            <div class="col">
              <div class="card">
                <img src="../<?= $rowNew["gambar"] ?>" class="card-img-top square-img" alt="...">
                <div class="card-body">
                  <!-- Nama barang -->
                  <h5 class="card-title mb-2"><?= $rowNew["nama"] ?></h5>

                  <!-- Rating -->
                  <div class="mb-2">
                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                    <?= $rowNew["rating"] ?>
                  </div>

                  <!-- Harga -->
                  <p class="m-0 fw-bold fs-5"><?= number_format($rowNew["harga"], 0, ',', '.')  ?></p>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Kategori barang -->
  <!-- Kategori barang -->
  <div class="mt-5" id="kategoriBarang">
    <div class="container">
      <h4 class="fw-bold horizontal-line">KATEGORI ALAT MUSIK</h4>

      <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-5 g-4">

          <!-- Gitar -->
          <div class="col">
            <div class="card border-0">
              <img src="../../../assets/icons/gitar.png" class="card-img-top" alt="...">
              <div class="card-body pt-2">
                <h5 class="card-title mb-2 text-center">Gitar</h5>
              </div>
            </div>
          </div>

          <!-- Drum -->
          <div class="col">
            <div class="card border-0">
              <img src="../../../assets/icons/drum.png" class="card-img-top" alt="...">
              <div class="card-body pt-2">
                <h5 class="card-title mb-2 text-center">Drum</h5>
              </div>
            </div>
          </div>

          <!-- Trompet -->
          <div class="col">
            <div class="card border-0">
              <img src="../../../assets/icons/trumpet.png" class="card-img-top" alt="...">
              <div class="card-body pt-2">
                <h5 class="card-title mb-2 text-center">Trompet</h5>
              </div>
            </div>
          </div>

          <!-- Biola -->
          <div class="col">
            <div class="card border-0">
              <img src="../../../assets/icons/violin.png" class="card-img-top" alt="...">
              <div class="card-body pt-2">
                <h5 class="card-title mb-2 text-center">Biola</h5>
              </div>
            </div>
          </div>

          <!-- Keyboard -->
          <div class="col">
            <div class="card border-0">
              <img src="../../../assets/icons/keyboard.png" class="card-img-top" alt="...">
              <div class="card-body pt-2">
                <h5 class="card-title mb-2 text-center">Keyboard</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footbar -->
  <?php
  require "../partials/footbar.php";
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>