<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nama Barang | Tamusic</title>

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
    <!-- Nama dan rating -->
    <div>
      <h2 class="fw-bold">Alat Musik Paling Gacor</h2>

      <div class="">
        <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
        4.69/5 | <a href="" class="text-black">Tambahkan Ulasan</a>
      </div>
    </div>

    <!-- Foto dan pilih barang -->
    <div class="d-flex mt-4">
      <div class="w-75">
        <div class="text-center">
          <img src="https://dummyimage.com/360x360/000/ffffff" alt="">
        </div>
      </div>

      <div class="w-25 d-flex align-items-center">
        <div class="card rounded-3 border-0">
          <div class="card-body">
            <div class="border-bottom border-black mb-3">
              <h3 class="card-title fw-bold mb-3">Rp69.000.000</h3>
            </div>

            <h5 class="card-title fw-semibold mb-3">Atur jumlah barang</h5>
            <!-- Quantity -->
            <div class="d-flex align-items-center mb-2">
              <div class="input-group w-50 border border-black rounded-3">
                <button class="btn fs-5" type="button" id="btn-minus">-</button>
                <input type="number" class="form-control text-center " value="1" min="1" max="10" id="quantity">
                <button class="btn fs-5" type="button" id="btn-plus">+</button>
              </div>
            </div>

            <!-- Subtotal -->
            <div class="mb-3">
              Subtotal: <span class="fw-bold fs-5">Rp69.690.000</span>
            </div>

            <a href="#" class="btn btn-warning d-grid rounded-3 fw-semibold d-flex align-items-center justify-content-center mb-3">
              <i class="fa-solid fa-cart-shopping me-2 fa-lg"></i> Masukkan ke Keranjang
            </a>

            <a href="#" class="btn d-grid rounded-3 border-black fw-semibold d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-heart me-2 fa-lg"></i> Tambahkan ke Wishlist
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Deskripsi barang -->
    <div class="mt-5 mb-5">
      <h4 class="fw-bold">Tentang Produk Ini</h4>

      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores architecto voluptatum non! Cum id adipisci facilis, possimus nostrum perspiciatis fugit dignissimos reiciendis corporis dicta odio explicabo exercitationem sunt amet corrupti nemo dolore animi accusantium inventore fuga rem vitae suscipit. Earum hic nam, odio, aut possimus accusantium nihil laboriosam dignissimos ullam ut fugiat eius aliquid enim ipsam a numquam natus. Architecto consectetur reprehenderit molestias rem voluptas, eum cum libero. Id et consequuntur nesciunt natus odit, maxime voluptates dolorem earum ullam amet molestiae cupiditate facere libero ut provident nemo vero odio, officia soluta ea. Et quaerat temporibus dolores officia, sunt nemo quia itaque unde harum facilis nostrum ad in iste suscipit? Debitis minima accusantium quae alias aut, suscipit laudantium voluptatum quibusdam sint dolorem. Repellendus non quos soluta officia? Fugiat totam nobis nihil, voluptates ipsa dicta enim ut culpa fuga, voluptas aut deleniti laboriosam inventore nulla? Quasi ea deserunt suscipit soluta, tempore voluptates!</p>
    </div>

    <!-- Produk terkait -->
    <div class="mt-5">
      <h4 class="fw-bold horizontal-line">ALAT MUSIK TERKAIT</h4>

      <a href="semua_barang.php" class="text-decoration-none text-black">Lihat Semua Barang <i class="fa-solid fa-chevron-right"></i></a>

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

  <!-- Footbar -->
  <?php
  require "../partials/footbar.php";
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <script src="../../../assets/js/numeric-stepper.js"></script>
</body>

</html>