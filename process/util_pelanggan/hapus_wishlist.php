<?php
// Include koneksi ke database
require_once "../../koneksi.php";

// Cek apakah ID barang sudah diterima dari permintaan POST
if(isset($_POST["id_barang"]) && !empty($_POST["id_barang"])){
    // Siapkan statement hapus
    $sql = "DELETE FROM wishlist WHERE id_barang = ?";
    
    if($stmt = $koneksi->prepare($sql)){
        // Bind parameter ke statement
        $stmt->bind_param("i", $param_id_barang);
        
        // Set nilai parameter
        $param_id_barang = $_POST["id_barang"];
        
        // Cobalah untuk menjalankan statement yang telah disiapkan
        if($stmt->execute()){
            // Jika berhasil dihapus, kembalikan respons berhasil
            header("Location: ../../views/pelanggan/pages/semua_barang.php");
            exit();
        } else{
            // Jika terjadi kesalahan, kembalikan pesan kesalahan
            echo "Terjadi kesalahan. Silakan coba lagi nanti.";
        }
    }
    
    // Tutup statement
    $stmt->close();
    
    // Tutup koneksi
    $koneksi->close();
} else{
    // Jika ID barang tidak diterima, kembalikan pesan kesalahan
    echo "ID barang tidak diterima. Silakan coba lagi.";
}
?>
