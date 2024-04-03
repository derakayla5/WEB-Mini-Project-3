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
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://dummyimage.com/1680x720/000/fff" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://dummyimage.com/1680x720/000/dead45" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://dummyimage.com/1680x720/000/36d64b" class="d-block w-100" alt="...">
          </div>
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
          for ($i = 0; $i < 5; $i++) {
          ?>
            <div class="col">
              <div class="card">
                <img src="https://dummyimage.com/360x360/000/ffffff" class="card-img-top" alt="...">
                <div class="card-body">
                  <!-- Nama barang -->
                  <h5 class="card-title mb-2">Nama Alat Musik Keren Banget</h5>

                  <!-- Rating -->
                  <div class="mb-2">
                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                    4.69/5
                  </div>

                  <!-- Harga -->
                  <p class="m-0 fw-bold fs-5">Rp29.000.000</p>
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
          for ($i = 0; $i < 5; $i++) {
          ?>
            <div class="col">
              <div class="card">
                <img src="https://dummyimage.com/360x360/000/ffffff" class="card-img-top" alt="...">
                <div class="card-body">
                  <!-- Nama barang -->
                  <h5 class="card-title mb-2">Nama Alat Musik Keren Banget</h5>

                  <!-- Rating -->
                  <div class="mb-2">
                    <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                    4.2/5
                  </div>

                  <!-- Harga -->
                  <p class="m-0 fw-bold fs-5">Rp18.000.000</p>
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
  <div class="mt-5" id="kategoriBarang">
    <div class="container">
      <h4 class="fw-bold horizontal-line">KATEGORI ALAT MUSIK</h4>

      <div class="container mt-4">
        <div class="row row-cols-1 row-cols-md-5 g-4">
          <?php
          for ($i = 0; $i < 5; $i++) {
          ?>
            <div class="col">
              <div class="card border-0">
                <img src="https://dummyimage.com/360x360/000/ffffff" class="card-img-top rounded-circle" alt="...">
                <div class="card-body pt-2">
                  <h5 class="card-title mb-2 text-center">Gitar</h5>
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
  
  <!-- Footbar -->
  <?php
  require "../partials/footbar.php";
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>