<?php
require("../../../koneksi.php");

session_start();

if (!($_SESSION['role'] == "pegawai_toko")) {
  header('Location: ../../../views/auth/pages/login.php');
  exit;
}

// Fetch product details from the database
if (isset($_GET['id'])) {
  $product_id = mysqli_real_escape_string($koneksi, $_GET['id']);
  $query = "SELECT * FROM barang WHERE id = $product_id";
  $result = mysqli_query($koneksi, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  } else {
    // Handle product not found
    echo "<p>Product not found.</p>";
    exit(); // Exit script if product not found
  }
} else {
  // Handle missing product ID
  echo "<p>Product ID is missing.</p>";
  exit(); // Exit script if product ID is missing
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $row['nama']; ?> | Tamusic</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../../assets/css/main.css">
</head>

<body>
  <!-- Navbar -->
  <?php require "../partials/navbar.php"; ?>

  <div class="container mt-4">
    <!-- Product Name and Rating -->
    <div>
      <h2 class="fw-bold"><?php echo $row['nama']; ?></h2>
      <h5 class="card-title fw-bold mb-3">Rp
        <?php echo number_format($row['harga'], 0, ',', '.');
        $hargaPerBarang = $row['harga']; ?>
      </h5>
      <!-- Rating -->
      <?php
      // Query untuk mendapatkan rata-rata rating dari ulasan produk
      $query_rating = "SELECT AVG(rating) AS avg_rating FROM ulasan WHERE id_barang = $product_id";
      $result_rating = mysqli_query($koneksi, $query_rating);
      $row_rating = mysqli_fetch_assoc($result_rating);
      $avg_rating = round($row_rating['avg_rating'], 1); // Membulatkan rata-rata rating ke satu desimal
      ?>

      <div>
        <?php
        // Tampilkan bintang sesuai dengan rata-rata rating
        $full_stars = intval($avg_rating); // Jumlah bintang penuh
        $half_star = $avg_rating - $full_stars; // Bagian desimal dari rata-rata rating

        // Tampilkan bintang penuh
        for ($i = 0; $i < $full_stars; $i++) {
          echo '<i class="fa-solid fa-star" style="color: #FFD43B;"></i>';
        }

        // Tampilkan bintang setengah jika ada
        if ($half_star >= 0.5) {
          echo '<i class="fa-solid fa-star-half" style="color: #FFD43B;"></i>';
          $full_stars++; // Tambah satu ke jumlah bintang penuh karena ada setengah bintang
        }

        // Tampilkan bintang kosong untuk melengkapi 5 bintang
        for ($i = $full_stars; $i < 5; $i++) {
          echo '<i class="fa-regular fa-star" style="color: #FFD43B;"></i>';
        }
        ?>
        <?php echo $avg_rating; ?>/5 | <a href="#" class="text-black" data-bs-toggle="modal" data-bs-target="#ulasanModal">Tambahkan Ulasan</a>
      </div>
    </div>

    <!-- Product Image and Selection -->
    <div class="d-flex mt-4">
      <div class="w-100">
        <div class="text-center">
          <?php
          echo '<img class="square-img" src="../../../storage/img_barang/' . $row['gambar'] . '" alt="Product Image" style="max-width: 350px; height: auto;">';
          ?>
        </div>
      </div>
    </div>

    <!-- Product Description -->
    <div class="mt-5 mb-5">
      <h4 class="fw-bold">Tentang Produk Ini</h4>
      <p>
        <?php echo $row['deskripsi']; ?>
      </p>
    </div>
  </div>

  <!-- Footbar -->
  <?php require "../partials/footbar.php"; ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="../../../assets/js/numeric-stepper.js"></script>
  <script src="../../../assets/js/detail_barang.js"></script>
  <script>
    const hargaPerBarang = <?php echo $hargaPerBarang; ?>;
  </script>

  <!-- Modal -->
  <div class="modal fade" id="ulasanModal" tabindex="-1" aria-labelledby="ulasanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../../../process/util_pelanggan/tambah_ulasan.php" method="POST">
            <div class="mb-3">
              <label for="rating" class="form-label">Rating:</label>
              <select class="form-select" id="rating" name="rating">
                <?php
                // Generate options for ratings
                for ($i = 1; $i <= 5; $i++) {
                  echo "<option value='$i'>$i</option>";
                }
                ?>
              </select>
            </div>
            <input type="hidden" name="id_barang" value="<?php echo $row['id']; ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>