<?php
require("../../koneksi.php"); // Pastikan path ini sesuai dengan lokasi koneksi.php Anda

// Periksa apakah form telah disubmit dan variabel 'id' ada
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && $_POST['aksi'] === 'hapus') {
    $id = $_POST['id'];

    // Query untuk menghapus barang dari tabel 'keranjang' berdasarkan 'id'
    $query = "DELETE FROM keranjang WHERE id = ?";
    
    // Persiapan query untuk eksekusi
    if ($stmt = $koneksi->prepare($query)) {
        $stmt->bind_param("i", $id); // 'i' menunjukkan tipe data integer
        
        // Eksekusi query
        if ($stmt->execute()) {
            // Jika berhasil, redirect kembali ke keranjang.php
            header("Location: ../../views/pelanggan/pages/keranjang.php");
            exit();
        } else {
            echo "Terjadi kesalahan saat menghapus barang.";
        }

        // Tutup statement
        $stmt->close();
    } else {
        echo "Tidak dapat menyiapkan query: " . $koneksi->error;
    }
}

// Tutup koneksi
$koneksi->close();
?>
