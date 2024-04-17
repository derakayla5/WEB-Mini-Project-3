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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">

  <link rel="stylesheet" href="../../../assets/css/main.css">

  <style>
    .custom-font {
      font-family: "Montserrat";
    }
  </style>
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
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $indicatorIndex ?>"
              class="<?= $active ?>" aria-current="true" aria-label="Slide <?= $indicatorIndex + 1 ?>"></button>
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
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>

  <!-- Kategori barang -->
  <div class="mt-5">
    <div class="container">
      <div class="card shadow-lg border border-black border-2">
        <div class="card-body">
          <h4 class="card-title text-center pb-3 custom-font">Temukan Berbagai Pilihan Alat Musik di Toko Kami</h4>

          <div class="container mt-4">
            <div class="row row-cols-1 row-cols-md-5 g-4">

              <!-- Gitar -->
              <div class="col d-flex justify-content-center">
                <div class="card border-0">
                  <img src="../../../assets/icons/gitar.png" class="card-img-top" alt="..." style="width: 100px;">
                  <div class="card-body pt-2">
                    <h5 class="card-title text-center">Gitar</h5>
                  </div>
                </div>
              </div>

              <!-- Drum -->
              <div class="col d-flex justify-content-center">
                <div class="card border-0">
                  <img src="../../../assets/icons/drum.png" class="card-img-top" alt="..." style="width: 100px;">
                  <div class="card-body pt-2">
                    <h5 class="card-title text-center">Drum</h5>
                  </div>
                </div>
              </div>

              <!-- Trompet -->
              <div class="col d-flex justify-content-center">
                <div class="card border-0">
                  <img src="../../../assets/icons/trumpet.png" class="card-img-top" alt="..." style="width: 100px;">
                  <div class="card-body pt-2">
                    <h5 class="card-title text-center">Trompet</h5>
                  </div>
                </div>
              </div>

              <!-- Biola-->
              <div class="col d-flex justify-content-center">
                <div class="card border-0">
                  <img src="../../../assets/icons/violin.png" class="card-img-top" alt="..." style="width: 100px;">
                  <div class="card-body pt-2">
                    <h5 class="card-title text-center">Biola</h5>
                  </div>
                </div>
              </div>

              <!-- Keyboard -->
              <div class="col d-flex justify-content-center">
                <div class="card border-0">
                  <img src="../../../assets/icons/keyboard.png" class="card-img-top mx-auto" alt="..."
                    style="width: 100px;">
                  <div class="card-body pt-2">
                    <h5 class="card-title text-center">Keyboard</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
          $queryTop = "SELECT b.*, AVG(u.rating) AS avg_rating, COUNT(u.rating) AS total_ulasan 
             FROM barang b 
             LEFT JOIN ulasan u ON b.id = u.id_barang 
             GROUP BY b.id 
             ORDER BY avg_rating DESC 
             LIMIT 5";

          $resultTop = mysqli_query($koneksi, $queryTop);

          while ($rowTop = mysqli_fetch_assoc($resultTop)) {
            ?>
            <div class="col">
              <a href="detail_barang.php?id=<?= $rowTop["id"] ?>" class="text-decoration-none text-black">

                <div class="card border-0 shadow">
                  <img src="../../../storage/img_barang/<?= $rowTop["gambar"] ?>" class="card-img-top square-img"
                    alt="...">
                  <div class="card-body">
                    <!-- Nama barang -->
                    <h5 class="card-title mb-2">
                      <?= $rowTop["nama"] ?>
                    </h5>

                    <!-- Rating -->
                    <div class="mb-2">
                      <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                      <?= round($rowTop["avg_rating"], 1) ?>/5 (
                      <?= $rowTop["total_ulasan"] ?> ulasan)
                    </div>
                  </div>
                </div>
              </a>
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
      <a href="semua_barang.php" class="text-decoration-none text-black">
        <h6>Lihat Semua Barang <i class="fa-solid fa-chevron-right"></i></h6>
      </a>

      <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-5 g-4">
          <?php
          $queryNew = "SELECT b.*, AVG(u.rating) AS avg_rating, COUNT(u.rating) AS total_ulasan 
             FROM barang b 
             LEFT JOIN ulasan u ON b.id = u.id_barang 
             GROUP BY b.id 
             ORDER BY b.created_at DESC 
             LIMIT 5";
          $resultNew = mysqli_query($koneksi, $queryNew);

          while ($rowNew = mysqli_fetch_assoc($resultNew)) {
            ?>
            <div class="col">
              <a href="detail_barang.php?id=<?= $rowNew["id"] ?>" class="text-decoration-none text-black">
                <div class="card border-0 shadow">
                  <img src="../../../storage/img_barang/<?= $rowNew["gambar"] ?>" class="card-img-top square-img"
                    alt="...">
                  <div class="card-body">
                    <!-- Nama barang -->
                    <h5 class="card-title mb-2">
                      <?= $rowNew["nama"] ?>
                    </h5>

                    <!-- Rating -->
                    <div class="mb-2">
                      <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                      <?= round($rowNew["avg_rating"], 1) ?>/5 (
                      <?= $rowNew["total_ulasan"] ?> ulasan)
                    </div>

                    <!-- Harga -->
                    <p class="m-0 fw-bold fs-5">
                      <?= number_format($rowNew["harga"], 0, ',', '.') ?>
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Footbar -->
  <?php
  require "../partials/footbar.php";
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
</body>

</html>