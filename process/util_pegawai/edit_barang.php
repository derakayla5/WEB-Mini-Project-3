<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../../koneksi.php";

    $id_barang = $_POST["id_barang"];
    $nama_barang = $_POST["nama"];
    $jenis_barang = $_POST["jenis_barang"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $deskripsi = $_POST["deskripsi"];

    // Proses file gambar jika ada yang diunggah
    if ($_FILES["gambar"]["error"] == 0) {
        $gambar_barang = "../../storage/img_barang" . basename($_FILES["gambar"]["name"]);

        // Pindahkan file gambar ke lokasi yang ditentukan
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $gambar_barang)) {
            // Query untuk mengupdate data barang beserta gambarnya
            $sql = "UPDATE barang SET nama = ?, jenis_barang = ?, harga = ?, stok = ?, deskripsi = ?, gambar = ? WHERE id = ?";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("ssdissi", $nama_barang, $jenis_barang, $harga, $stok, $deskripsi, $gambar_barang, $id_barang);
        } else {
            echo "Terjadi kesalahan saat mengunggah gambar.";
            exit();
        }
    } else {
        // Jika tidak ada file gambar yang diunggah, lakukan update tanpa memperbarui gambar
        $sql = "UPDATE barang SET nama = ?, jenis_barang = ?, harga = ?, stok = ?, deskripsi = ? WHERE id = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("ssdisi", $nama_barang, $jenis_barang, $harga, $stok, $deskripsi, $id_barang);
    }

    // Eksekusi statement SQL
    if ($stmt->execute()) {
        // Redirect ke halaman daftar barang setelah berhasil
        header("Location: ../../views/pegawai_toko/pages/semua_barang.php");
        exit();
    } else {
        // Tampilkan pesan error jika terjadi masalah saat eksekusi statement
        echo "Error: " . $koneksi->error;
    }

    // Tutup statement
    $stmt->close();
    // Tutup koneksi database
    $koneksi->close();
} else {
    // Tampilkan pesan akses ditolak jika tidak ada permintaan POST
    echo "Akses Ditolak!";
}
?>
