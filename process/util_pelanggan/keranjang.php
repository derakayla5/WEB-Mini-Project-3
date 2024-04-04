<?php
require("../../koneksi.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["beli"])) {
    $jumlah_barang = $_POST["stok"];
    $id_barang = $_POST["id"];

    if (!empty($jumlah_barang) && is_numeric($jumlah_barang) && $jumlah_barang > 0) {
        // Retrieve product details including name and image
        $query_barang = "SELECT nama, gambar, harga FROM barang WHERE id = ?";
        $stmt_barang = mysqli_prepare($koneksi, $query_barang);
        mysqli_stmt_bind_param($stmt_barang, "i", $id_barang);
        mysqli_stmt_execute($stmt_barang);
        $result_barang = mysqli_stmt_get_result($stmt_barang);

        if ($result_barang && mysqli_num_rows($result_barang) > 0) {
            $row_barang = mysqli_fetch_assoc($result_barang);
            $nama_barang = $row_barang['nama'];
            $gambar_barang = $row_barang['gambar'];
            $harga_barang = $row_barang['harga'];
            $total_harga = $jumlah_barang * $harga_barang;

            // Check if item exists in cart
            $query_check = "SELECT jumlah_barang FROM keranjang WHERE id = ?";
            $stmt_check = mysqli_prepare($koneksi, $query_check);
            mysqli_stmt_bind_param($stmt_check, "i", $id_barang);
            mysqli_stmt_execute($stmt_check);
            $result_check = mysqli_stmt_get_result($stmt_check);

            if ($result_check && mysqli_num_rows($result_check) > 0) {
                $row_check = mysqli_fetch_assoc($result_check);
                $jumlah_barang_existing = $row_check['jumlah_barang'];
                $new_jumlah_barang = $jumlah_barang_existing + $jumlah_barang;
                $new_total_harga = $new_jumlah_barang * $harga_barang;

                // Update item quantity and total price in cart
                $query_update = "UPDATE keranjang SET jumlah_barang = ?, harga_barang = ? WHERE id = ?";
                $stmt_update = mysqli_prepare($koneksi, $query_update);
                mysqli_stmt_bind_param($stmt_update, "iii", $new_jumlah_barang, $new_total_harga, $id_barang);
                mysqli_stmt_execute($stmt_update);
                $_SESSION['flash_message'] = "Jumlah barang di keranjang berhasil diperbarui.";
            } else {
                // Insert new item into cart
                $query_insert = "INSERT INTO keranjang (id, nama_barang, gambar_barang, jumlah_barang, harga_barang) VALUES (?, ?, ?, ?, ?)";
                $stmt_insert = mysqli_prepare($koneksi, $query_insert);
                mysqli_stmt_bind_param($stmt_insert, "isssi", $id_barang, $nama_barang, $gambar_barang, $jumlah_barang, $total_harga);
                mysqli_stmt_execute($stmt_insert);
                $_SESSION['flash_message'] = "Barang berhasil ditambahkan ke keranjang.";
            }
        } else {
            $_SESSION['flash_message'] = "Barang tidak ditemukan.";
        }
    } else {
        $_SESSION['flash_message'] = "Jumlah barang tidak valid.";
    }

    // Redirect to prevent form resubmission
    header("Location: ../../views/pelanggan/pages/beranda.php");
    exit();
}
?>
