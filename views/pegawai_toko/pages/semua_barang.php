<?php
require "../../../koneksi.php";

session_start();

if (!($_SESSION['role'] == "pegawai_toko")) {
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
            <!-- PHP code to fetch products from database -->
            <?php
            $query = "SELECT * FROM barang";
            $result = mysqli_query($koneksi, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                echo '<div id="product-list" class="row row-cols-1 row-cols-md-4 g-4">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col product-item" data-category="' . $row['jenis_barang'] . '" data-price="' . $row['harga'] . '">
                            <div class="card border-0 shadow">
                                <img class="square-img" src="../../../storage/img_barang/' . $row['gambar'] . '" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h6 class="card-title mb-2">' . $row['nama'] . '</h6>
                                    <div class="mb-2">
                                        <!-- You can display ratings here if available -->
                                    </div>
                                    <p class="m-0 fw-bold mb-3">Rp' . number_format($row['harga'], 0, ',', '.') . '</p>
                                    <div class="d-flex justify-content-between">
                                        <!-- Action buttons -->
                                        <a href="edit_barang.php?id=' . $row['id'] . '" class="btn btn-primary"><i class="fa-solid fa-pen"></i></a>
                                        <a href="../pages/detail_barang.php?id=' . $row['id'] . '" class="btn btn-warning"><i class="fa-solid fa-eye"></i></a>
                                        <button type="button" class="btn btn-danger m-0" data-bs-toggle="modal" data-bs-target="#konfirmasiHapus' . $row['id'] . '"><i class="fa-solid fa-trash-can"></i></button>

                                        <!-- Delete confirmation modal -->
                                        <div class="modal fade" id="konfirmasiHapus' . $row['id'] . '" tabindex="-1" aria-labelledby="konfirmasiHapus' . $row['id'] . '" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="konfirmasiHapus' . $row['id'] . '">Konfirmasi hapus</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-start">
                                                        Apakah Anda yakin ingin menghapus <span class="fw-bold">' . $row['nama'] . '</span>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- Tombol batal -->
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                                                        <!-- Tombol hapus -->
                                                        <form action="../../../process/util_pegawai/hapus_barang.php" method="POST" style="display: inline-block;">
                                                            <input type="hidden" name="id" value="' . $row['id'] . '">
                                                            <button type="submit" class="btn btn-danger" name="hapus_barang">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
                echo '</div>';
            } else {
                echo '<p>Tidak ada barang yang ditemukan.</p>';
            }
            ?>
        </div>
    </div>

    <!-- Footbar -->
    <?php require "../partials/footbar.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../../assets/js/filter.js"></script>
</body>

</html>