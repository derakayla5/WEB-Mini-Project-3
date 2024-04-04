<?php
if (isset($_GET['kategori'])) {
	$kategori = $_GET['kategori'];
} else {
	$kategori = '';
}

session_start();

if (!($_SESSION['role'] == "pelanggan")) {
  header('Location: ../../../views/auth/pages/login.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Semua Barang | Tamusic</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="../../../assets/css/main.css">
</head>

<body>
	<!-- Navbar -->
	<?php require "../partials/navbar.php"; ?>

	<div class="container d-flex">
		<!-- Filter barang -->
		<div class="w-25 d-flex flex-column me-3">
			<h5 class="fw-bold mb-3">FILTER BARANG</h5>

			<!-- Kategori -->
			<div class="mb-2">
				<p class="d-grid gap-1 mb-0">
					<a class="btn btn-secondary text-start rounded-0 d-flex justify-content-between" data-bs-toggle="collapse" href="#collapseKategori" role="button" aria-expanded="false" aria-controls="collapseKategori">
						Kategori
						<i class="fa-solid fa-chevron-down my-auto"></i>
					</a>
				</p>
				<div class="collapse" id="collapseKategori">
					<div class="card card-body border-0 py-2 ps-1">
						<!-- Gitar -->
						<div class="form-check">
							<input class="form-check-input filter-checkbox" type="checkbox" value="Gitar" id="flexCheckGitar">
							<label class="form-check-label" for="flexCheckGitar">
								Gitar
							</label>
						</div>

						<!-- Drum -->
						<div class="form-check">
							<input class="form-check-input filter-checkbox" type="checkbox" value="Drum" id="flexCheckDrum">
							<label class="form-check-label" for="flexCheckDrum">
								Drum
							</label>
						</div>

						<!-- Trompet -->
						<div class="form-check">
							<input class="form-check-input filter-checkbox" type="checkbox" value="Trompet" id="flexCheckTrompet">
							<label class="form-check-label" for="flexCheckTrompet">
								Trompet
							</label>
						</div>

						<!-- Biola -->
						<div class="form-check">
							<input class="form-check-input filter-checkbox" type="checkbox" value="Biola" id="flexCheckBiola">
							<label class="form-check-label" for="flexCheckBiola">
								Biola
							</label>
						</div>

						<!-- Keyboard -->
						<div class="form-check">
							<input class="form-check-input filter-checkbox" type="checkbox" value="Keyboard" id="flexCheckKeyboard">
							<label class="form-check-label" for="flexCheckKeyboard">
								Keyboard
							</label>
						</div>

						<!-- Tambahkan checkbox untuk kategori lainnya -->
						<div class="form-check">
							<input class="form-check-input filter-checkbox" type="checkbox" value="KategoriLain1" id="flexCheckKategoriLain1">
							<label class="form-check-label" for="flexCheckKategoriLain1">
								Kategori Lain 1
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input filter-checkbox" type="checkbox" value="KategoriLain2" id="flexCheckKategoriLain2">
							<label class="form-check-label" for="flexCheckKategoriLain2">
								Kategori Lain 2
							</label>
						</div>
						<!-- Tambahkan checkbox untuk kategori lainnya di sini sesuai kebutuhan -->
					</div>
				</div>
			</div>

			<!-- Kisaran harga -->
			<div class="mb-2">
				<p class="d-grid gap-1 mb-0">
					<a class="btn btn-secondary text-start rounded-0 d-flex justify-content-between" data-bs-toggle="collapse" href="#collapseKisaranHarga" role="button" aria-expanded="false" aria-controls="collapseKisaranHarga">
						Kisaran Harga
						<i class="fa-solid fa-chevron-down my-auto"></i>
					</a>
				</p>
				<div class="collapse" id="collapseKisaranHarga">
					<div class="card card-body border-0 py-2 ps-1">
						<!-- Harga 1 -->
						<div class="form-check">
							<input class="form-check-input filter-checkbox" type="checkbox" value="0-99999" id="flexCheckHarga1">
							<label class="form-check-label" for="flexCheckHarga1">
								Rp0 - Rp99.999
							</label>
						</div>
						<!-- Harga 2 -->
						<div class="form-check">
							<input class="form-check-input filter-checkbox" type="checkbox" value="100000-399000" id="flexCheckHarga2">
							<label class="form-check-label" for="flexCheckHarga2">
								Rp100.000 - Rp399.000
							</label>
						</div>
						<!-- Harga 3 -->
						<div class="form-check">
							<input class="form-check-input filter-checkbox" type="checkbox" value="400000-699000" id="flexCheckHarga3">
							<label class="form-check-label" for="flexCheckHarga3">
								Rp400.000 - Rp699.000
							</label>
						</div>
						<!-- Harga 4 -->
						<div class="form-check">
							<input class="form-check-input filter-checkbox" type="checkbox" value="700000-999000" id="flexCheckHarga4">
							<label class="form-check-label" for="flexCheckHarga4">
								Rp700.000 - Rp999.000
							</label>
						</div>
						<!-- Harga 5 -->
						<div class="form-check">
							<input class="form-check-input filter-checkbox" type="checkbox" value="1000000-2499000" id="flexCheckHarga5">
							<label class="form-check-label" for="flexCheckHarga5">
								Rp1.000.000 - Rp2.499.000
							</label>
						</div>
						<!-- Harga 6 -->
						<div class="form-check">
							<input class="form-check-input filter-checkbox" type="checkbox" value="2500000-4999000" id="flexCheckHarga6">
							<label class="form-check-label" for="flexCheckHarga6">
								Rp2.500.000 - Rp4.999.000
							</label>
						</div>
						<!-- Harga 7 -->
						<div class="form-check">
							<input class="form-check-input filter-checkbox" type="checkbox" value="5000000-9999000" id="flexCheckHarga7">
							<label class="form-check-label" for="flexCheckHarga7">
								Rp5.000.000 - Rp9.999.000
							</label>
						</div>
						<!-- Harga 8 -->
						<div class="form-check">
							<input class="form-check-input filter-checkbox" type="checkbox" value="10000000-20000000" id="flexCheckHarga8">
							<label class="form-check-label" for="flexCheckHarga8">
								Rp10.000.000 - Rp20.000.000
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Daftar barang -->
		<div class="w-75">
			<?php
			// Include the database connection file
			require "../../../koneksi.php";

			// Check if search keyword is provided
			if (isset($_GET['keyword'])) {
				$keyword = $_GET['keyword'];
				// Initial SQL query to fetch products based on search keyword
				$sql = "SELECT barang.*, COALESCE(AVG(ulasan.rating), 0) AS rating_avg
                FROM barang
                LEFT JOIN ulasan ON barang.id = ulasan.id_barang
                WHERE nama LIKE '%$keyword%'
                GROUP BY barang.id";
			} else {
				// Initial SQL query to fetch all products if no search keyword provided
				$sql = "SELECT barang.*, COALESCE(AVG(ulasan.rating), 0) AS rating_avg
                FROM barang
                LEFT JOIN ulasan ON barang.id = ulasan.id_barang
                GROUP BY barang.id";
			}

			// Execute the SQL query
			$result = $koneksi->query($sql);

			// Check if there are any products available
			if ($result && $result->num_rows > 0) {
				// Display products
				echo '<div class="row row-cols-1 row-cols-md-4 g-4" id="product-list">';
				while ($row = $result->fetch_assoc()) {
					// Display product details
					echo '<div class="col product-item" data-category="' . $row["jenis_barang"] . '" data-price="' . $row["harga"] . '">
                <div class="card border-0 shadow">
                    <a href="detail_barang.php?id=' . $row["id"] . '">
                        <img src="../../../storage/img_barang/' . $row["gambar"] . '" class="card-img-top square-img" alt="...">
                    </a>
                    <div class="card-body">
                        <h6 class="card-title mb-2">' . $row["nama"] . '</h6>
                        <div class="mb-2">';
					// Display star ratings
					$rating = $row["rating_avg"];
					for ($i = 0; $i < 5; $i++) {
						if ($rating > $i) {
							echo '<i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i>';
						} else {
							echo '<i class="far fa-star fa-sm" style="color: #ddd;"></i>';
						}
					}
					echo '<span class="small ms-1">' . number_format($row["rating_avg"], 1) . '/5</span>
                        </div>
                        <p class="m-0 fw-bold">Rp' . number_format($row["harga"], 0, ',', '.') . '</p>
                    </div>
                </div>
            </div>';
				}
				echo '</div>';
			} else {
				// If no products found
				echo "Tidak ada barang yang tersedia.";
			}
			?>
		</div>

		<!-- Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

		<!-- Custom JavaScript for filtering -->
		<script src="../../../assets/js/filter.js"></script>
</body>

</html>