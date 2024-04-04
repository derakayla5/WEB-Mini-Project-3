<div class="container">
  <nav class="navbar navbar-expand-lg sticky-top my-3">
    <div class="w-100">
      <!-- Atas -->
      <div class="d-flex justify-content-between mb-3">
        <!-- Kiri -->
        <div class="">
          <ul class="navbar-nav">
            <!-- Logo -->
            <li class="nav-item">
              <a class="navbar-brand fw-bold fs-3 ps-2" href="beranda.php">LOGO</a>
            </li>

            <!-- Search -->
            <li class="nav-item d-flex align-items-center">
              <form action="semua_barang.php" method="GET" role="search">
                <input class="form-control me-2 rounded-1 bg-secondary-subtle" type="search" name="keyword" placeholder="Cari produk kami di sini" aria-label="Search" style="width: 80vh;">
              </form>
            </li>
          </ul>
        </div>

        <!-- Kanan -->
        <div>
          <ul class="navbar-nav">
            <!-- Wishlist -->
            <li class="nav-item">
              <a class="nav-link" href="../pages/wishlist.php"><i class="fa-solid fa-heart"></i></a>
            </li>

            <!-- Keranjang -->
            <li class="nav-item">
              <a class="nav-link" href="../pages/keranjang.php"><i class="fa-solid fa-cart-shopping"></i></a>
            </li>

            <!-- Akun -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg-end">
                <li><a class="dropdown-item" href="../../../process/auth/logout.php">Log out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>

      <!-- Bawah -->
      <div class="">
        <ul class="navbar-nav">
          <!-- Barang terbaik -->
          <li class="nav-item me-4">
            <a class="nav-link fw-bold text-black" href="beranda.php#pilihanTop">PILIHAN PALING TOP</a>
          </li>

          <!-- Semua barang -->
          <li class="nav-item me-4">
            <a class="nav-link fw-bold text-black" href="semua_barang.php">SEMUA BARANG</a>
          </li>

          <!-- Kategori barang -->
          <li class="nav-item me-4">
            <a class="nav-link fw-bold text-black" href="beranda.php#kategoriBarang">KATEGORI BARANG</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>

<hr>