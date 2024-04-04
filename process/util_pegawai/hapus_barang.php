<?php
// Menghubungkan ke file koneksi.php
require '../../koneksi.php';

// Memeriksa apakah parameter 'id' telah diterima dari form
if(isset($_POST['id'])) {
    // Mengambil nilai ID barang dari form
    $id = $_POST['id'];

    // Membuat query SQL untuk menghapus barang dari tabel 'barang'
    $sql = "DELETE FROM barang WHERE id='$id'";

    // Menjalankan query
    if(mysqli_query($koneksi, $sql)) {
        // Jika penghapusan berhasil, redirect ke halaman utama (semua_barang.php)
        header("Location: ../../views/pegawai_toko/pages/semua_barang.php");
        exit(); // Menghentikan eksekusi skrip setelah melakukan redirect
    } else {
        // Jika terjadi kesalahan saat menjalankan query
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
} else {
    // Jika parameter 'id' tidak diterima
    echo "ID barang tidak ditemukan.";
}
?>
